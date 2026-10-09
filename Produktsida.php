<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produktsida - Red Bull Shop</title>
    <!-- Kopplar ihop sidan med den gemensamma css-filen -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
require_once 'assets/header.php';
/*
Visar olika produkter beroende på vilket id som skickas från Alla_produkter.php
*/
/*
Hämtar produktens id från länken.
Om inget id skickas används id 1.
*/
$id = isset($_GET['id']) ? (int)$_GET['id'] : 1;
$products = [
    1 => [
        "name" => "Red Bull Original",
        "price" => 19,
        "image" => "bilder/Redbull-Orginal.avif",
        "description" => "Den klassiska smaken av Red Bull.",
        "stock" => 150
    ],
    2 => [
        "name" => "Red Bull Tropical",
        "price" => 21,
        "image" => "bilder/Redbull-Tropical.jpeg",
        "description" => "En tropisk och fruktig smak.",
        "stock" => 120
    ],
    3 => [
        "name" => "Red Bull Watermelon",
        "price" => 21,
        "image" => "bilder/Redbull-Watermelon.webp",
        "description" => "En uppfriskande smak av vattenmelon.",
        "stock" => 95
    ],
    4 => [
        "name" => "Red Bull Peach",
        "price" => 21,
        "image" => "bilder/Redbull-Peach.webp",
        "description" => "En söt smak av persika.",
        "stock" => 80
    ],
    5 => [
        "name" => "Red Bull Sugarfree",
        "price" => 19,
        "image" => "bilder/Redbull-Sugarfree.avif",
        "description" => "Sockerfri Red Bull.",
        "stock" => 100
    ],
    6 => [
        "name" => "Red Bull Zero",
        "price" => 19,
        "image" => "bilder/Redbull-Zero.webp",
        "description" => "Zero Sugar Edition.",
        "stock" => 100
    ],
    7 => [
        "name" => "Red Bull Coconut",
        "price" => 21,
        "image" => "bilder/Redbull-Coconut.webp",
        "description" => "Smak av kokos och bär.",
        "stock" => 75
    ],
    8 => [
        "name" => "Red Bull Blue Edition",
        "price" => 21,
        "image" => "bilder/Redbull-BlueEdition.jpg",
        "description" => "Blue Edition.",
        "stock" => 70
    ],
    9 => [
        "name" => "Red Bull Apricot Edition",
        "price" => 21,
        "image" => "bilder/Redbull-ApricotEdition.jpg",
        "description" => "Aprikos-smak.",
        "stock" => 60
    ],
    10 => [
        "name" => "Red Bull Strawberry Edition",
        "price" => 21,
        "image" => "bilder/Redbull-StrawberryEdition.webp",
        "description" => "Jordgubbssmak.",
        "stock" => 65
    ],
    11 => [
        "name" => "Red Bull Curuba Elderflower",
        "price" => 22,
        "image" => "bilder/Redbull-CurubaElderflower.jpg",
        "description" => "Curuba och fläderblomma.",
        "stock" => 50
    ],
    12 => [
        "name" => "Red Bull Sea Blue Edition",
        "price" => 22,
        "image" => "bilder/Redbull-SeaBlue.jpg",
        "description" => "Sea Blue Edition.",
        "stock" => 45
    ],
    13 => [
        "name" => "Red Bull Green Edition",
        "price" => 21,
        "image" => "bilder/Redbull-GreenEdition.png",
        "description" => "Green Edition.",
        "stock" => 70
    ],
    14 => [
        "name" => "Red Bull Red Edition",
        "price" => 21,
        "image" => "bilder/Redbull-RedEdition.jpg",
        "description" => "Red Edition.",
        "stock" => 70
    ],
    15 => [
        "name" => "Red Bull Yellow Edition",
        "price" => 21,
        "image" => "bilder/Redbull-YellowEdition.webp",
        "description" => "Yellow Edition.",
        "stock" => 70
    ],
    16 => [
        "name" => "Red Bull Purple Edition",
        "price" => 22,
        "image" => "bilder/Redbull-PurpleEdition.webp",
        "description" => "Purple Edition.",
        "stock" => 60
    ],
    17 => [
        "name" => "Red Bull Lime Edition",
        "price" => 22,
        "image" => "bilder/Redbull-LimeEdition.webp",
        "description" => "Lime Edition.",
        "stock" => 55
    ],
    18 => [
        "name" => "Red Bull Lilac Edition",
        "price" => 22,
        "image" => "bilder/Redbull-LilacEdition.png",
        "description" => "Lilac Edition.",
        "stock" => 55
    ],
    19 => [
        "name" => "Red Bull Summer Edition",
        "price" => 22,
        "image" => "bilder/Redbull-SummerEdition.png",
        "description" => "Summer Edition.",
        "stock" => 40
    ],
    20 => [
        "name" => "Red Bull Winter Edition",
        "price" => 22,
        "image" => "bilder/Redbull-WinterEdition.webp",
        "description" => "Winter Edition.",
        "stock" => 35
    ]
];

/*
Kontrollerar om produkten finns.
Om inte visas produkt 1.
*/
$product = isset($products[$id]) ? $products[$id] : $products[1];
?>
<section class="product-page">
    <div class="product-image">
        <img
            src="<?php echo htmlspecialchars($product['image']); ?>"
            alt="<?php echo htmlspecialchars($product['name']); ?>">
    </div>
    <div class="product-info">
        <h2>
            <?php echo htmlspecialchars($product['name']); ?>
        </h2>
        <p class="price">
            Pris: <?php echo $product['price']; ?> kr
        </p>
        <p>
            <?php echo htmlspecialchars($product['description']); ?>
        </p>
        <p>
            Lager: <?php echo $product['stock']; ?> st
        </p>
        <!-- Dessa knappar får funktion senare när backend byggs -->
        <button>Lägg i varukorg</button>
        <button>Lägg till favorit</button>
    </div>
</section>
<section class="reviews">
    <h2>Recensioner</h2>
    <!-- Exempelrecensioner tills databasen används -->
    <div class="review">
        <h3>Erik</h3>
        <p>Betyg: 5/5</p>
        <p>Min favorit av alla Red Bull-smaker.</p>
    </div>
    <div class="review">
        <h3>Anna</h3>
        <p>Betyg: 4/5</p>
        <p>God smak och bra energi.</p>
    </div>
</section>
<?php
require_once 'assets/footer.php';
?>
</body>
</html>