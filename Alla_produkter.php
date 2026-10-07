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
                "id" => 1,
                "name" => "Red Bull Original",
                "price" => 19,
                "image" => "bilder/Redbull-Orginal.avif"
            ],
            [
                "id" => 2,
                "name" => "Red Bull Tropical",
                "price" => 21,
                "image" => "bilder/Redbull-Tropical.jpeg"
            ],
            [
                "id" => 3,
                "name" => "Red Bull Watermelon",
                "price" => 21,
                "image" => "bilder/Redbull-Watermelon.webp"
            ],
            [
                "id" => 4,
                "name" => "Red Bull Peach",
                "price" => 21,
                "image" => "bilder/Redbull-Peach.webp"
            ],
            [
                "id" => 5,
                "name" => "Red Bull Sugarfree",
                "price" => 19,
                "image" => "bilder/Redbull-Sugarfree.avif"
            ],
            [
                "id" => 6,
                "name" => "Red Bull Zero",
                "price" => 19,
                "image" => "bilder/Redbull-Zero.webp"
            ],
            [
                "id" => 7,
                "name" => "Red Bull Coconut",
                "price" => 21,
                "image" => "bilder/Redbull-Coconut.webp"
            ],
            [
                "id" => 8,
                "name" => "Red Bull Blue Edition",
                "price" => 21,
                "image" => "bilder/Redbull-BlueEdition.jpg"
            ],
            [
                "id" => 9,
                "name" => "Red Bull Apricot Edition",
                "price" => 21,
                "image" => "bilder/Redbull-ApricotEdition.jpg"
            ],
            [
                "id" => 10,
                "name" => "Red Bull Strawberry Edition",
                "price" => 21,
                "image" => "bilder/Redbull-StrawberryEdition.webp"
            ],
            [
                "id" => 11,
                "name" => "Red Bull Curuba Elderflower",
                "price" => 22,
                "image" => "bilder/Redbull-CurubaElderflower.jpg"
            ],
            [
                "id" => 12,
                "name" => "Red Bull Sea Blue Edition",
                "price" => 22,
                "image" => "bilder/Redbull-SeaBlue.jpg"
            ],
            [
                "id" => 13,
                "name" => "Red Bull Green Edition",
                "price" => 21,
                "image" => "bilder/Redbull-GreenEdition.png"
            ],
            [
                "id" => 14,
                "name" => "Red Bull Red Edition",
                "price" => 21,
                "image" => "bilder/Redbull-RedEdition.jpg"
            ],
            [
                "id" => 15,
                "name" => "Red Bull Yellow Edition",
                "price" => 21,
                "image" => "bilder/Redbull-YellowEdition.webp"
            ],
            [
                "id" => 16,
                "name" => "Red Bull Purple Edition",
                "price" => 22,
                "image" => "bilder/Redbull-PurpleEdition.webp"
            ],
            [
                "id" => 17,
                "name" => "Red Bull Lime Edition",
                "price" => 22,
                "image" => "bilder/Redbull-LimeEdition.webp"
            ],
            [
                "id" => 18,
                "name" => "Red Bull Lilac Edition",
                "price" => 22,
                "image" => "bilder/Redbull-LilacEdition.png"
            ],
            [
                "id" => 19,
                "name" => "Red Bull Summer Edition",
                "price" => 22,
                "image" => "bilder/Redbull-SummerEdition.png"
            ],
            [
                "id" => 20,
                "name" => "Red Bull Winter Edition",
                "price" => 22,
                "image" => "bilder/Redbull-WinterEdition.webp"
            ]
        ];
 /*
        Går igenom alla produkter en i taget.
        */
        foreach ($products as $product) {

            /*
            Om användaren har sökt kontrolleras om produktens namn
            innehåller sökordet. stripos gör sökningen okänslig
            för stora och små bokstäver.
            */
            if (
                $search == '' ||
                stripos($product['name'], $search) !== false
            ) {
        ?>
            <div class="product-card">
                <img
                    src="<?php echo $product['image']; ?>"
                    alt="<?php echo htmlspecialchars($product['name']); ?>">
                <h3>
                    <?php echo htmlspecialchars($product['name']); ?>
                </h3>
                <p>
                    <?php echo $product['price']; ?> kr
                </p>
                <a href="Produktsida.php?id=<?php echo $product['id']; ?>">Visa produkt</a>
            </div>
        <?php
            }
        }
        ?>
    </div>
</section>
<?php
require_once 'assets/footer.php';
?>
</body>
</html>