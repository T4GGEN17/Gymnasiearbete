<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alla produkter - Red Bull Shop</title>
    <!-- Använder samma CSS-fil som resten av webbplatsen -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
require_once 'assets/header.php';
/*
Hämtar det användaren har skrivit i sökfältet.
Om inget har sökts efter blir variabeln tom.
*/
$search = isset($_GET['search']) ? $_GET['search'] : '';
?>
<section class="products-page">
    <h2>Alla Red Bull-smaker</h2>
    <!-- Sökruta även på produktsidan -->
    <form class="product-search" action="Alla_produkter.php" method="GET">
        <input
            type="text"
            name="search"
            placeholder="Sök efter smak..."
            value="<?php echo htmlspecialchars($search); ?>"
        >
        <button type="submit">
            Sök
        </button>
    </form>
    <div class="product-container">
        <?php
        /*
        Tillfällig lista med produkter.
        Senare kan produkterna istället hämtas från databasen.
        */
        $products = [
            [
                "name" => "Red Bull Original",
                "price" => 19,
                "image" => "bilder/Redbull-Orginal.avif"
            ],
            [
                "name" => "Red Bull Tropical",
                "price" => 21,
                "image" => "bilder/Redbull-Tropical.jpeg"
            ],
            [
                "name" => "Red Bull Watermelon",
                "price" => 21,
                "image" => "bilder/Redbull-Watermelon.webp"
            ],
            [
                "name" => "Red Bull Peach",
                "price" => 21,
                "image" => "bilder/Redbull-Peach.webp"
            ],
            [
                "name" => "Red Bull Sugarfree",
                "price" => 19,
                "image" => "bilder/Redbull-Sugarfree.avif"
            ],
            [
                "name" => "Red Bull Zero",
                "price" => 19,
                "image" => "bilder/Redbull-Zero.webp"
            ],
            [
                "name" => "Red Bull Coconut",
                "price" => 21,
                "image" => "bilder/Redbull-Coconut.webp"
            ],
            [
                "name" => "Red Bull Blue Edition",
                "price" => 21,
                "image" => "bilder/Redbull-BlueEdition.jpg"
            ],
            [
                "name" => "Red Bull Apricot Edition",
                "price" => 21,
                "image" => "bilder/Redbull-ApricotEdition.jpg"
            ],
            [
                "name" => "Red Bull Strawberry Edition",
                "price" => 21,
                "image" => "bilder/Redbull-StrawberryEdition.webp"
            ],
            [
                "name" => "Red Bull Curuba Elderflower",
                "price" => 22,
                "image" => "bilder/Redbull-CurubaElderflower.jpg"
            ],
            [
                "name" => "Red Bull Sea Blue Edition",
                "price" => 22,
                "image" => "bilder/Redbull-SeaBlue.jpg"
            ],
            [
                "name" => "Red Bull Green Edition",
                "price" => 21,
                "image" => "bilder/Redbull-GreenEdition.png"
            ],
            [
                "name" => "Red Bull Red Edition",
                "price" => 21,
                "image" => "bilder/Redbull-RedEdition.jpg"
            ],
            [
                "name" => "Red Bull Yellow Edition",
                "price" => 21,
                "image" => "bilder/Redbull-YellowEdition.webp"
            ],
            [
                "name" => "Red Bull Purple Edition",
                "price" => 22,
                "image" => "bilder/Redbull-PurpleEdition.webp"
            ],
            [
                "name" => "Red Bull Lime Edition",
                "price" => 22,
                "image" => "bilder/Redbull-LimeEdition.webp"
            ],
            [
                "name" => "Red Bull Lilac Edition",
                "price" => 22,
                "image" => "bilder/Redbull-LilacEdition.png"
            ],
            [
                "name" => "Red Bull Summer Edition",
                "price" => 22,
                "image" => "bilder/Redbull-SummerEdition.png"
            ],
            [
                "name" => "Red Bull Winter Edition",
                "price" => 22,
                "image" => "bilder/Redbull-WinterEdition.webp"
            ]
        ];
?>
</body>
</html>