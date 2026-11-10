<?php
session_start();
require_once 'assets/db.php';
$felmeddelande = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inloggning = trim($_POST["inloggning"]);
    $losenord = $_POST["losenord"];
    // Hitta användaren med användarnamn eller e-post
    $stmt = $conn->prepare(
        "SELECT * FROM users WHERE `användarnamn` = ? OR email = ?"
    );
    $stmt->bind_param("ss", $inloggning, $inloggning);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        // Kontrollera lösenordet
        if (password_verify($losenord, $user["lösenord"])) {
            $_SESSION["user_id"] = $user["user_id"];
            $_SESSION["namn"] = $user["namn"];
            $_SESSION["anvandarnamn"] = $user["användarnamn"];
            header("Location: Profilsida.php");
            exit;
        } else {
            $felmeddelande = "Fel användarnamn eller lösenord.";
        }
    } else {
        $felmeddelande = "Fel användarnamn eller lösenord.";
    }
    $stmt->close();
}
?>
<?php require_once 'assets/header.php'; ?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logga in - Red Bull Shop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="login-container">
        <h1>Logga in</h1>
        <?php if ($felmeddelande != ""): ?>
            <p class="error-message">
                <?php echo htmlspecialchars($felmeddelande); ?>
            </p>
        <?php endif; ?>
        <form action="Inloggning.php" method="POST">
            <label for="inloggning">Användarnamn eller e-post</label>
            <input type="text" id="inloggning" name="inloggning" required>
            <label for="losenord">Lösenord</label>
            <input type="password" id="losenord" name="losenord" required>
            <button type="submit">Logga in</button>
        </form>
        <p>Har du inget konto? 
            <a href="Registrering.php">Registrera dig här</a>
        </p>
    </main>    
</body>
</html>

<?php require_once 'assets/footer.php'; ?>
