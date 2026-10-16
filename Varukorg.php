<?php
session_start();
// Ta bort en produkt från varukorgen
if ($_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_POST['remove_product'])) {
    $id = (int) $_POST['remove_product'];
    if (isset($_SESSION['cart'][$id])) {
        unset($_SESSION['cart'][$id]);
    }
    header('Location: Varukorg.php');
    exit;
}
// Hämta den uppdaterade varukorgen EFTER borttagningen
$cart = $_SESSION['cart'] ?? [];
// Hämta ett meddelande om en produkt lagts till
$message = $_SESSION['cart_message'] ?? '';
unset($_SESSION['cart_message']);
// Räkna ut totalpriset
$total = 0;
foreach ($cart as $item) {
    $total += $item['price'] * $item['quantity'];
}
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Varukorg - Red Bull Shop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php require_once 'assets/header.php'; ?>
<main class="cart-page">
    <h1>Min varukorg</h1>
    <?php if (empty($cart)): ?>
        <p>Din varukorg är tom.</p>
        <a href="Alla_produkter.php">Fortsätt handla</a>
    <?php else: ?>
        <?php foreach ($cart as $id => $item): ?>
            <div class="cart-item">
                <img
                    src="<?php echo htmlspecialchars($item['image']); ?>"
                    alt="<?php echo htmlspecialchars($item['name']); ?>"
                    width="120">
                <div class="cart-item-info">
                    <h2>
                        <?php echo htmlspecialchars($item['name']); ?>
                    </h2>
                    <p>
                        Styckpris:
                        <?php echo number_format($item['price'], 2, ',', ' '); ?> kr
                    </p>
                    <p>
                        Antal: <?php echo (int) $item['quantity']; ?>
                    </p>
                    <p>
                        Delsumma:
                        <?php echo number_format(
                            $item['price'] * $item['quantity'],
                            2,
                            ',',
                            ' '
                        ); ?> kr
                    </p>
                    <form action="Varukorg.php" method="POST">
                        <button
                            type="submit"
                            name="remove_product"
                            value="<?php echo (int) $id; ?>">Ta bort
                        </button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
        <h2>
            Totalt:
            <?php echo number_format($total, 2, ',', ' '); ?> kr
        </h2>
        <a href="Alla_produkter.php">Fortsätt handla</a>
    <?php endif; ?>
</main>
<?php require_once 'assets/footer.php'; ?>
</body>
</html>
