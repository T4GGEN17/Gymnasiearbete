<?php
session_start();

// Skapar en favoritlista om den inte finns
if (!isset($_SESSION['favorites'])) {
    $_SESSION['favorites'] = [];
}
$id = isset($_GET['id']) ? (int)$_GET['id'] : 1;/*Hämtar produktens id från länken. Om inget id skickas används id 1.*/

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
        "image" => "bilder/Redbull-LimeEdition.jpg",
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

$product = isset($products[$id]) ? $products[$id] : $products[1];// Hämtar produkten med rätt id eller väljer produkt 1 om id saknas
// Hanterar när kunden lägger till en favorit
if (isset($_POST['add_favorite'])) {
    if (!isset($_SESSION['user_id'])) {
        header("Location: Inloggning.php");
        exit;
    }
    if (!in_array($id, $_SESSION['favorites'])) {// Kontrollerar om produkten inte redan finns bland favoriterna
        $_SESSION['favorites'][] = $id;// Lägger till produktens id i favoritlistan

        // Sparar ett meddelande om att produkten har lagts till
        $_SESSION['favorite_message'] = $product['name']
            . ' har lagts till i favoriter!';
    } else {
        // Sparar ett meddelande om att produkten redan finns bland favoriterna
        $_SESSION['favorite_message'] = $product['name']
            . ' finns redan i favoriter!';
    }
    header("Location: Produktsida.php?id=" . $id);// Skickar tillbaka kunden till produktsidan för samma produkt
    exit;
}
// Hanterar när kunden lägger en produkt i varukorgen
if ($_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_POST['add_to_cart'])) {
    
    if (!isset($_SESSION['user_id'])) {// Kontrollera om användaren är inloggad
        header("Location: Inloggning.php");// Skicka användaren till inloggningssidan
        exit;
    }
    $cartId = $id;// Hämtar produktens id
    // Skapar varukorgen om den inte redan finns
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Hämtar hur många exemplar som redan finns i varukorgen
$antal = $_SESSION['cart'][$cartId]['quantity'] ?? 0;

if ($antal >= $product['stock']) {// Kontrollera om produkten finns i lager

    // Visa meddelande om att maxantalet har uppnåtts
    $_SESSION['cart_message'] = 'Finns inte i lager. Maxantalet är '
        . $product['stock'] . ' st.';
} else {
    // Öka antalet om produkten redan finns
    if (isset($_SESSION['cart'][$cartId])) {
        $_SESSION['cart'][$cartId]['quantity']++;
    } else {
        // Lägg till produkten i varukorgen
        $_SESSION['cart'][$cartId] = [
            'name' => $product['name'],
            'price' => $product['price'],
            'image' => $product['image'],
            'quantity' => 1
        ];
    }
    // Visa meddelande om att produkten har lagts till
    $_SESSION['cart_message'] = $product['name']
        . ' har lagts till i varukorgen!';
}
    header('Location: Varukorg.php');// Skickar användaren till varukorgen
    exit;
}
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produktsida - Red Bull Shop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
require_once 'assets/header.php';
?>
<!-- Visar produktens bild och information -->
<section class="product-page">
    <!-- Visar produktens bild -->
    <div class="product-image">
        <img
            src="<?php echo htmlspecialchars($product['image']); ?>"
            alt="<?php echo htmlspecialchars($product['name']); ?>">
    </div>
    <!-- Visar produktens information -->
    <div class="product-info">
        <h2>
            <?php echo htmlspecialchars($product['name']); ?>
        </h2>
        <?php
        // Hämtar meddelandet om favoriten
        $favoriteMessage = $_SESSION['favorite_message'] ?? '';
        // Tar bort meddelandet efter att det hämtats
        unset($_SESSION['favorite_message']);
        ?>
<!-- Visar favoritmeddelandet om det finns -->
<?php if ($favoriteMessage !== ''): ?>
    <p class="favorite-message">
        <?php echo htmlspecialchars($favoriteMessage); ?>
    </p>
<?php endif; ?>
        <!-- Visar produktens pris -->
        <p class="price">
            Pris: <?php echo $product['price']; ?> kr
        </p>
        <!-- Visar produktens beskrivning -->
        <p>
            <?php echo htmlspecialchars($product['description']); ?>
        </p>
        <!-- Visar hur många produkter som finns i lager -->
        <p>
            Lager: <?php echo $product['stock']; ?> st
        </p>
        <!-- Formulär för att lägga produkten i varukorgen -->
        <form action="Produktsida.php?id=<?php echo $id; ?>" method="POST">
            <button type="submit" name="add_to_cart">Lägg i varukorg</button>
        </form>
        <!-- Formulär för att lägga produkten bland favoriter -->
        <form action="Produktsida.php?id=<?php echo $id; ?>"
              method="POST">
                <button type="submit" name="add_favorite">
                    Lägg till favorit
                </button>
</form>
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