<?php
require_once 'assets/db.php';
$error = "";
$success = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namn = trim($_POST["namn"]);
    $anvandarnamn = trim($_POST["anvandarnamn"]);
    $email = trim($_POST["email"]);
    $losenord = $_POST["losenord"];
    $bekraftaLosenord = $_POST["bekraftaLosenord"];
    $adress = trim($_POST["adress"]);
    $postnummer = trim($_POST["postnummer"]);
    $ort = trim($_POST["ort"]);
    $telefon = trim($_POST["telefon"]);
    // Kontrollerar att lösenorden matchar
if ($losenord !== $bekraftaLosenord) {
    $error = "Lösenorden matchar inte.";
} else {
    // Kontrollerar om användarnamn eller e-post redan finns
    $kontroll = $conn->prepare(
        "SELECT user_id FROM users
        WHERE `användarnamn` = ? OR email = ?"
    );
    $kontroll->bind_param("ss", $anvandarnamn, $email);
    $kontroll->execute();
    $resultat = $kontroll->get_result();
    if ($resultat->num_rows > 0) {
        $error = "Användarnamnet eller e-postadressen används redan.";
} else {
        // Krypterar lösenordet
        $hashatLosenord = password_hash($losenord, PASSWORD_DEFAULT);
        // Sparar användaren i databasen
        $sql = "INSERT INTO users
        (namn, `användarnamn`, email, `lösenord`, adress, postnummer, ort, telefon)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            "ssssssss",
            $namn,
            $anvandarnamn,
            $email,
            $hashatLosenord,
            $adress,
            $postnummer,
            $ort,
            $telefon
        );
        if ($stmt->execute()) {
            $success = "Kontot har skapats!";
        } else {
            $error = "Registreringen misslyckades. Kontrollera användarnamn och e-post.";
        }
        $stmt->close();
    }
}
}
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrering - Red Bull Shop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
require_once 'assets/header.php';
?>
<!-- Registreringsformulär -->
<div class="register-container">
    <h2>Skapa konto</h2>
        <?php if ($error != ""): ?>
            <p style="color: red;">
        <?php echo htmlspecialchars($error); ?>
            </p>
        <?php endif; ?>
        <?php if ($success != ""): ?>
            <p style="color: green;">
        <?php echo htmlspecialchars($success); ?>
            </p>
        <?php endif; ?>
    <form action="Registrering.php" method="POST">
            <label for="namn">Namn:</label>
                <input type="text" id="namn" name="namn" required>
            <label for="anvandarnamn">Användarnamn:</label>
                <input type="text" id="anvandarnamn" name="anvandarnamn" required>
            <label for="email">E-post:</label>
                <input type="email" id="email" name="email" required>
            <label for="losenord">Lösenord:</label>
                <input type="password" id="losenord" name="losenord" required>
            <label for="bekraftaLosenord">Bekräfta lösenord:</label>
                <input type="password" id="bekraftaLosenord" name="bekraftaLosenord" required>
            <label for="adress">Adress:</label>
                <input type="text" id="adress" name="adress" required>
            <label for="postnummer">Postnummer:</label>
                <input type="text" id="postnummer" name="postnummer" required>
            <label for="ort">Ort:</label>
                <input type="text" id="ort" name="ort" required>
            <label for="telefon">Telefon:</label>
                <input type="tel" id="telefon" name="telefon" required>
        <button type="submit">Registrera</button>
    </form>
    <p>Har du redan ett konto?
        <a href="Inloggning.php">Logga in här</a>
    </p>
</div>
<?php
require_once 'assets/footer.php';
?>
</body>
</html>
