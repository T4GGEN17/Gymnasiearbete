<?php
session_start();
// Hämtar favoritlistan
$favorites = $_SESSION['favorites'] ?? [];
// Hämtar alla produkter från produktsidan
$products = [
    1 => ['name' => 'Red Bull Original', 'price' => 19, 'image' => 'bilder/Redbull-Orginal.avif'],
    2 => ['name' => 'Red Bull Tropical', 'price' => 21, 'image' => 'bilder/Redbull-Tropical.jpeg'],
    3 => ['name' => 'Red Bull Watermelon', 'price' => 21, 'image' => 'bilder/Redbull-Watermelon.webp'],
    4 => ['name' => 'Red Bull Peach', 'price' => 21, 'image' => 'bilder/Redbull-Peach.webp'],
    5 => ['name' => 'Red Bull Sugarfree', 'price' => 19, 'image' => 'bilder/Redbull-Sugarfree.avif'],
    6 => ['name' => 'Red Bull Zero', 'price' => 19, 'image' => 'bilder/Redbull-Zero.webp'],
    7 => ['name' => 'Red Bull Coconut', 'price' => 21, 'image' => 'bilder/Redbull-Coconut.webp'],
    8 => ['name' => 'Red Bull Blue Edition', 'price' => 21, 'image' => 'bilder/Redbull-BlueEdition.jpg'],
    9 => ['name' => 'Red Bull Apricot Edition', 'price' => 21, 'image' => 'bilder/Redbull-ApricotEdition.jpg'],
    10 => ['name' => 'Red Bull Strawberry Edition', 'price' => 21, 'image' => 'bilder/Redbull-StrawberryEdition.webp'],
    11 => ['name' => 'Red Bull Curuba Elderflower', 'price' => 22, 'image' => 'bilder/Redbull-CurubaElderflower.jpg'],
    12 => ['name' => 'Red Bull Sea Blue Edition', 'price' => 22, 'image' => 'bilder/Redbull-SeaBlue.jpg'],
    13 => ['name' => 'Red Bull Green Edition', 'price' => 21, 'image' => 'bilder/Redbull-GreenEdition.png'],
    14 => ['name' => 'Red Bull Red Edition', 'price' => 21, 'image' => 'bilder/Redbull-RedEdition.jpg'],
    15 => ['name' => 'Red Bull Yellow Edition', 'price' => 21, 'image' => 'bilder/Redbull-YellowEdition.webp'],
    16 => ['name' => 'Red Bull Purple Edition', 'price' => 22, 'image' => 'bilder/Redbull-PurpleEdition.webp'],
    17 => ['name' => 'Red Bull Lime Edition', 'price' => 22, 'image' => 'bilder/Redbull-LimeEdition.webp'],
    18 => ['name' => 'Red Bull Lilac Edition', 'price' => 22, 'image' => 'bilder/Redbull-LilacEdition.png'],
    19 => ['name' => 'Red Bull Summer Edition', 'price' => 22, 'image' => 'bilder/Redbull-SummerEdition.png'],
    20 => ['name' => 'Red Bull Winter Edition', 'price' => 22, 'image' => 'bilder/Redbull-WinterEdition.webp']
];
// Ta bort favorit
if (isset($_POST['remove_favorite'])) {
    $id = (int) $_POST['product_id'];
    // Tar bort produkten från favoritlistan
    $_SESSION['favorites'] = array_values(
        array_diff($_SESSION['favorites'] ?? [], [$id])
    );
    // Uppdaterar favoritlistan
    header("Location: Favoriter.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favoriter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
require_once 'assets/header.php';
?>
<section class="products">
    <h2>Mina favoriter</h2>
    <div class="product-container">
        <?php if (empty($favorites)): ?>
            <p>Du har inga favoriter ännu.</p>
        <?php else: ?>
            <?php foreach ($favorites as $id): ?>
                <?php if (isset($products[$id])): ?>
                    <div class="product-card">
                        <img src="<?php echo htmlspecialchars($products[$id]['image']); ?>"
                             alt="<?php echo htmlspecialchars($products[$id]['name']); ?>">
                        <h3>
                            <?php echo htmlspecialchars($products[$id]['name']); ?>
                        </h3>
                        <p>
                            <?php echo $products[$id]['price']; ?> kr
                        </p>
                        <a href="Produktsida.php?id=<?php echo $id; ?>">
                            Visa produkt
                        </a>
                        <form action="Favoriter.php" method="POST">
                            <input type="hidden"
                                   name="product_id"
                                   value="<?php echo $id; ?>">
                            <button type="submit" name="remove_favorite">
                                Ta bort favorit
                            </button>
                        </form>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>
<?php
require_once 'assets/footer.php';
?>
</body>
</html>