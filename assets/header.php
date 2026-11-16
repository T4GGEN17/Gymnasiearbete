<header>
    <div class="logo">
        <h1>Red Bull Shop</h1>
    </div>
    <!-- Knappen med tre streck -->
    <button class="menu-button" onclick="oppnaMeny()" aria-label="Öppna meny">
        <span></span>
        <span></span>
        <span></span>
    </button>
</header>
<!-- Bakgrund bakom menyn -->
<div id="menyBakgrund" class="menu-background" onclick="stangMeny()"></div>
<!-- Menyn som glider ut från höger -->
<nav id="sidomeny" class="side-menu">
    <button class="close-button" onclick="stangMeny()" aria-label="Stäng meny">
        &times; 
    </button>
    <ul>
        <li><a href="Startsida.php">Hem</a></li>
        <li><a href="Alla_produkter.php">Produkter</a></li>
        <li><a href="Favoriter.php">Favoriter</a></li>
        <li><a href="Varukorg.php">Varukorg</a></li>
        <li><a href="Profilsida.php">Profil</a></li>
        <li><a href="Inloggning.php">Logga in</a></li>
        <li><a href="Registrering.php">Registrera</a></li>
    </ul>
</nav>
<script>
function oppnaMeny() {
    document.getElementById("sidomeny").classList.add("open");
    document.getElementById("menyBakgrund").classList.add("show");
}
function stangMeny() {
    document.getElementById("sidomeny").classList.remove("open");
    document.getElementById("menyBakgrund").classList.remove("show");
}
</script>
