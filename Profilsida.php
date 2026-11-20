<?php
session_start();
require_once 'assets/db.php';
// Kontrollera om användaren är inloggad
if (!isset($_SESSION["user_id"])) {
    header("Location: Inloggning.php");
    exit;
}
$userId = $_SESSION["user_id"];
$error = "";
$success = "";
// Hanterar när användaren loggar ut
if (isset($_POST["logout"])) {
    session_unset();
    session_destroy();
    header("Location: Inloggning.php");
    exit;
}
// Hanterar när användaren sparar sina nya uppgifter
if (isset($_POST["update_profile"])) {
    $anvandarnamn = trim($_POST["anvandarnamn"]);
    $adress = trim($_POST["adress"]);
    $postnummer = trim($_POST["postnummer"]);
    $ort = trim($_POST["ort"]);
    $telefon = trim($_POST["telefon"]);
    $losenord = $_POST["losenord"];
    // Kontrollerar om användarnamnet redan används av någon annan
    $kontroll = $conn->prepare(
        "SELECT user_id FROM users
        WHERE `användarnamn` = ? AND user_id != ?"
    );
    $kontroll->bind_param("si", $anvandarnamn, $userId);
    $kontroll->execute();
    $resultat = $kontroll->get_result();
    if ($resultat->num_rows > 0) {
        $error = "Användarnamnet används redan.";
    } else {
        // Uppdaterar användarens vanliga uppgifter
        $stmt = $conn->prepare(
            "UPDATE users SET
            `användarnamn` = ?, adress = ?, postnummer = ?,
            ort = ?, telefon = ?
            WHERE user_id = ?"
        );
        $stmt->bind_param(
            "sssssi",
            $anvandarnamn,
            $adress,
            $postnummer,
            $ort,
            $telefon,
            $userId
        );
        if ($stmt->execute()) {
            // Uppdaterar lösenordet om användaren har skrivit ett nytt
            if ($losenord !== "") {
                $hashatLosenord = password_hash(
                    $losenord,
                    PASSWORD_DEFAULT
                );
                $losenordStmt = $conn->prepare(
                    "UPDATE users SET `lösenord` = ?
                    WHERE user_id = ?"
                );
                $losenordStmt->bind_param(
                    "si",
                    $hashatLosenord,
                    $userId
                );
                $losenordStmt->execute();
                $losenordStmt->close();
            }
            // Uppdaterar användarnamnet i sessionen
            $_SESSION["anvandarnamn"] = $anvandarnamn;
            $success = "Dina uppgifter har uppdaterats!";
        } else {
            $error = "Det gick inte att uppdatera dina uppgifter.";
        }
        $stmt->close();
    }
    $kontroll->close();
}
// Hämtar användarens aktuella uppgifter från databasen
$stmt = $conn->prepare(
    "SELECT namn, `användarnamn`, email, adress,
    postnummer, ort, telefon
    FROM users WHERE user_id = ?"
);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Red Bull Shop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php require_once 'assets/header.php'; ?>
<main class="profile-container">
    <h1>Min profil</h1>
    <?php if ($error !== ""): ?>
        <p style="color: red;">
            <?php echo htmlspecialchars($error); ?>
        </p>
    <?php endif; ?>
    <?php if ($success !== ""): ?>
        <p style="color: green;">
            <?php echo htmlspecialchars($success); ?>
        </p>
    <?php endif; ?>
    <?php if ($user): ?>
        <div class="profile-info">
            <!-- Visar användarens namn -->
            <p><strong>Namn:</strong>
                <?php echo htmlspecialchars($user["namn"]); ?>
            </p>
            <!-- Visar användarens e-postadress -->
            <p><strong>E-post:</strong>
                <?php echo htmlspecialchars($user["email"]); ?>
            </p>
        </div>
        <!-- Formulär för att ändra användarens uppgifter -->
        <h2>Ändra mina uppgifter</h2>
        <form method="POST" action="Profilsida.php" class="profile-edit-form">
            <label for="anvandarnamn">Användarnamn:</label>
            <input
                type="text"
                id="anvandarnamn"
                name="anvandarnamn"
                value="<?php echo htmlspecialchars($user["användarnamn"]); ?>"
                required>
            <label for="losenord">Nytt lösenord:</label>
            <input
                type="password"
                id="losenord"
                name="losenord"
                placeholder="Lämna tomt om du inte vill byta">
            <label for="adress">Adress:</label>
            <input
                type="text"
                id="adress"
                name="adress"
                value="<?php echo htmlspecialchars($user["adress"]); ?>"
                required>
            <label for="postnummer">Postnummer:</label>
            <input
                type="text"
                id="postnummer"
                name="postnummer"
                value="<?php echo htmlspecialchars($user["postnummer"]); ?>"
                required>
            <label for="ort">Ort:</label>
            <input
                type="text"
                id="ort"
                name="ort"
                value="<?php echo htmlspecialchars($user["ort"]); ?>"
                required>
            <label for="telefon">Telefonnummer:</label>
            <input
                type="tel"
                id="telefon"
                name="telefon"
                value="<?php echo htmlspecialchars($user["telefon"]); ?>"
                required>
            <button type="submit" name="update_profile">
                Spara ändringar
            </button>
        </form>
        <!-- Formulär för att logga ut -->
        <form method="POST" class="profile-logout-form">
            <button type="submit" name="logout">Logga ut</button>
        </form>
    <?php else: ?>
        <p>Kunde inte hitta dina användaruppgifter.</p>
    <?php endif; ?>
</main>
<?php require_once 'assets/footer.php'; ?>
</body>
</html>