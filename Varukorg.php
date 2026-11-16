<?php
session_start();
// Ta bort eller ändra antal på en produkt
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Hämta produktens ID
    $id = (int) ($_POST['product_id'] ?? 0);
    if (isset($_SESSION['cart'][$id])) {
        // Minska antalet med 1
        if (isset($_POST['decrease'])) {
            $_SESSION['cart'][$id]['quantity']--;
            if ($_SESSION['cart'][$id]['quantity'] <= 0) {
                unset($_SESSION['cart'][$id]);
            }
        }
        // Öka antalet med 1
        elseif (isset($_POST['increase'])) {
            $_SESSION['cart'][$id]['quantity']++;
        }
        // Minska antalet med 10
        elseif (isset($_POST['decrease10'])) {
            $_SESSION['cart'][$id]['quantity'] -= 10;
            if ($_SESSION['cart'][$id]['quantity'] <= 0) {
                unset($_SESSION['cart'][$id]);
            }
        }
        // Öka antalet med 10
        elseif (isset($_POST['increase10'])) {
            $_SESSION['cart'][$id]['quantity'] += 10;
        }
        // Ta bort alla exemplar av produkten
        elseif (isset($_POST['remove_product'])) {
            unset($_SESSION['cart'][$id]);
        }
    }
    // Ladda om varukorgen
    header('Location: Varukorg.php');
    exit;
}
// Hämta varukorgen
$cart = $_SESSION['cart'] ?? [];
// Hämta meddelande
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
                <div class="cart-quantity">
                    <form action="Varukorg.php" method="POST">
                        <input type="hidden" name="product_id" value="<?php echo (int) $id; ?>">
                        <button type="submit" name="decrease10">-10</button>
                    </form>
                    <form action="Varukorg.php" method="POST">
                        <input type="hidden" name="product_id" value="<?php echo (int) $id; ?>">
                        <button type="submit" name="decrease">−</button>
                    </form>
                        <span><?php echo (int) $item['quantity']; ?></span>
                    <form action="Varukorg.php" method="POST">
                        <input type="hidden" name="product_id" value="<?php echo (int) $id; ?>">
                        <button type="submit" name="increase">+</button>
                    </form>
                    <form action="Varukorg.php" method="POST">
                        <input type="hidden" name="product_id" value="<?php echo (int) $id; ?>">
                        <button type="submit" name="increase10">+10</button>
                    </form>
                </div>
                    <p>
                        Delsumma:
                        <?php echo number_format(
                            $item['price'] * $item['quantity'],
                            2,
                            ',',
                            ' '
                        ); ?> kr
                    </p>
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
