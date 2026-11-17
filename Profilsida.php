<?php
session_start();
require_once 'assets/db.php';
if (!isset($_SESSION["user_id"])) {// Kontrollera om användaren är inloggad
    header("Location: Inloggning.php");// Skicka användaren till inloggningssidan om den inte är inloggad
    exit;
}
// Hämta användarens uppgifter från databasen
$stmt = $conn->prepare(
    "SELECT namn, `användarnamn`, email, adress, postnummer, ort, telefon
    FROM users WHERE user_id = ?"
);
$stmt->bind_param("i", $_SESSION["user_id"]);// Koppla användarens ID till SQL-frågan
$stmt->execute();// Kör SQL-frågan
$result = $stmt->get_result();// Hämta resultatet från databasen
$user = $result->fetch_assoc();// Spara användarens uppgifter i variabeln $user
$stmt->close();// Stäng SQL-frågan

if (isset($_POST["logout"])) {// Kontrollera om användaren har tryckt på logga ut
    session_unset();// Ta bort all sessionsinformation
    session_destroy();// Avsluta sessionen
    header("Location: Inloggning.php");// Skicka användaren till inloggningssidan
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
            <!-- Visa användarens namn -->
            <p><strong>Namn:</strong>
                <?php echo htmlspecialchars($user["namn"]); ?>
            </p>
            <!-- Visa användarnamnet -->
            <p><strong>Användarnamn:</strong>
                <?php echo htmlspecialchars($user["användarnamn"]); ?>
            </p>
            <!-- Visa användarens e-postadress -->
            <p><strong>E-post:</strong>
                <?php echo htmlspecialchars($user["email"]); ?>
            </p>
            <!-- Visa användarens adress -->
            <p><strong>Adress:</strong>
                <?php echo htmlspecialchars($user["adress"]); ?>
            </p>
            <!-- Visa användarens postnummer -->
            <p><strong>Postnummer:</strong>
                <?php echo htmlspecialchars($user["postnummer"]); ?>
            </p>
            <!-- Visa användarens ort -->
            <p><strong>Ort:</strong>
                <?php echo htmlspecialchars($user["ort"]); ?>
            </p>
            <!-- Visa användarens telefonnummer -->
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
