<?php
session_start();
require_once 'assets/db.php';
// Kontrollera om användaren är inloggad
if (!isset($_SESSION["user_id"])) {
    header("Location: Inloggning.php");
    exit;
}
// Hämta användarens uppgifter från databasen
$stmt = $conn->prepare(
    "SELECT namn, `användarnamn`, email, adress, postnummer, ort, telefon
    FROM users WHERE user_id = ?"
);
$stmt->bind_param("i", $_SESSION["user_id"]);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();
// Logga ut användaren
if (isset($_POST["logout"])) {
    session_unset();
    session_destroy();
    header("Location: Inloggning.php");
    exit;
}
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
    <?php if ($user): ?>
        <div class="profile-info">
            <p><strong>Namn:</strong>
                <?php echo htmlspecialchars($user["namn"]); ?>
            </p>
            <p><strong>Användarnamn:</strong>
                <?php echo htmlspecialchars($user["användarnamn"]); ?>
            </p>
            <p><strong>E-post:</strong>
                <?php echo htmlspecialchars($user["email"]); ?>
            </p>
            <p><strong>Adress:</strong>
                <?php echo htmlspecialchars($user["adress"]); ?>
            </p>
            <p><strong>Postnummer:</strong>
                <?php echo htmlspecialchars($user["postnummer"]); ?>
            </p>
            <p><strong>Ort:</strong>
                <?php echo htmlspecialchars($user["ort"]); ?>
            </p>
            <p><strong>Telefon:</strong>
                <?php echo htmlspecialchars($user["telefon"]); ?>
            </p>
        </div>
        <form method="POST">
            <button type="submit" name="logout">Logga ut</button>
        </form>
    <?php else: ?>
        <p>Kunde inte hitta dina användaruppgifter.</p>
    <?php endif; ?>
</main>   
</body>
</html>

<?php require_once 'assets/footer.php'; ?>
