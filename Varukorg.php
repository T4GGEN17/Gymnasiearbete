<?php
session_start();
// Hämtar produkternas lagersaldo
$stock = [
    1 => 150,
    2 => 120,
    3 => 95,
    4 => 80,
    5 => 100,
    6 => 100,
    7 => 75,
    8 => 70,
    9 => 60,
    10 => 65,
    11 => 50,
    12 => 45,
    13 => 70,
    14 => 70,
    15 => 70,
    16 => 60,
    17 => 55,
    18 => 55,
    19 => 40,
    20 => 35
];
// Ta bort eller ändra antal på en produkt
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int) ($_POST['product_id'] ?? 0);
    if (isset($_SESSION['cart'][$id])) {
        $maxLager = $stock[$id] ?? 0;
        $nuvarandeAntal = $_SESSION['cart'][$id]['quantity'];
        if (isset($_POST['decrease'])) {
            $_SESSION['cart'][$id]['quantity']--;
        }
        elseif (isset($_POST['increase'])) {
            if ($nuvarandeAntal < $maxLager) {
                $_SESSION['cart'][$id]['quantity']++;
            } else {
                $_SESSION['cart_message'] = 'Maxantalet är '
                    . $maxLager . ' st.';
            }
        }
        elseif (isset($_POST['decrease10'])) {
            $_SESSION['cart'][$id]['quantity'] -= 10;
        }
        elseif (isset($_POST['increase10'])) {
            $nyttAntal = $nuvarandeAntal + 10;
            if ($nyttAntal > $maxLager) {
                $_SESSION['cart'][$id]['quantity'] = $maxLager;
                $_SESSION['cart_message'] = 'Maxantalet är '
                    . $maxLager . ' st.';
            } else {
                $_SESSION['cart'][$id]['quantity'] = $nyttAntal;
            }
        }
        // Ändra till ett eget antal
        elseif (isset($_POST['update_quantity'])) {
            $antal = (int) ($_POST['quantity'] ?? 1);
            if ($antal > 0) {
                if ($antal > $maxLager) {
                    $_SESSION['cart'][$id]['quantity'] = $maxLager;
                    $_SESSION['cart_message'] = 'Maxantalet är '
                        . $maxLager . ' st.';
                } else {
                    $_SESSION['cart'][$id]['quantity'] = $antal;
                }
            }
        }
        // Ta bort alla exemplar av produkten
        elseif (isset($_POST['remove_product'])) {
            unset($_SESSION['cart'][$id]);
        }
        // Ta bort produkten om antalet blir 0 eller mindre
        if (isset($_SESSION['cart'][$id])
            && $_SESSION['cart'][$id]['quantity'] <= 0) {
            unset($_SESSION['cart'][$id]);
        }
    }
    header('Location: Varukorg.php');
    exit;
}
$cart = $_SESSION['cart'] ?? [];
$message = $_SESSION['cart_message'] ?? '';
unset($_SESSION['cart_message']);
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
    <?php if ($message !== ''): ?>
    <p class="cart-message">
        <?php echo htmlspecialchars($message); ?>
    </p>
<?php endif; ?>
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
                    <form action="Varukorg.php" method="POST">
                        <input type="hidden" name="product_id"
                               value="<?php echo (int) $id; ?>">
                        <button type="submit" name="remove_product">
                            Töm alla
                        </button>
                    </form>
                </div>
                <!-- Ändra till valfritt antal -->
                <form action="Varukorg.php" method="POST">
                    <input type="hidden" name="product_id"
                           value="<?php echo (int) $id; ?>">

                    <input type="number" name="quantity"
                           min="1" value="<?php echo (int) $item['quantity']; ?>">
                    <button type="submit" name="update_quantity">
                        Uppdatera antal
                    </button>
                </form>
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
<script>
    // Spara sidans position innan formuläret skickas
    document.querySelectorAll('form').forEach(function(form) {
        form.addEventListener('submit', function() {
            sessionStorage.setItem('scrollPosition', window.scrollY);
        });
    });
    // Återställ positionen efter omladdning
    window.addEventListener('load', function() {
        const position = sessionStorage.getItem('scrollPosition');
        if (position !== null) {
            window.scrollTo(0, parseInt(position));
            sessionStorage.removeItem('scrollPosition');
        }
    });
</script>
</body>
</html>
