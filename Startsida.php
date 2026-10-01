<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Red Bull Shop</title>
    <!-- Kopplar css till sidan -->
    <link rel="stylesheet"
          href="css/style.css">
</head>
<body>
<?php
require_once 'assets/header.php';
?>
<section class="hero">
    <h2>
        Alla dina favorit-smaker av Red Bull
    </h2>
    <p>
        Utforska vårt sortiment med över 20 olika smaker.
    </p>
</section>
<section class="search">
    <!-- Sökruta -->
    <form action="Alla_produkter.php"
          method="GET">
        <input type="text"
               name="search"
               placeholder="Sök efter smak...">
        <button type="submit">Sök</button>
    </form>
</section>
<section class="products">
    <h2>Populära smaker</h2>
    <div class="product-container">
        <div class="product-card">
            <img src=""
                 alt="Red Bull Original">
            <h3>Red Bull Original</h3>
            <p>19 kr</p>
            <a href="Produktsida.php">Visa produkt</a>
        </div>
        <div class="product-card">
            <img src=""
                 alt="Red Bull Tropical">
            <h3>Red Bull Tropical</h3>
            <p>21 kr</p>
            <a href="Produktsida.php">Visa produkt</a>
        </div>
        <div class="product-card">
            <img src=""
                 alt="Red Bull Watermelon">
            <h3>Red Bull Watermelon</h3>
            <p>21 kr</p>
            <a href="Produktsida.php">Visa produkt</a>
        </div>
        <div class="product-card">
            <img src=""
                 alt="Red Bull Peach Edition">
            <h3>Red Bull Peach Edition</h3>
            <p>21 kr</p>
            <a href="Produktsida.php">Visa produkt</a>
        </div>
    </div>
</section>
<?php
require_once 'assets/footer.php';
?>
</body>
</html>