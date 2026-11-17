<header>
    <div class="logo">
        <h1>Red Bull Shop</h1>
    </div>
    <!-- Knapp för att öppna navigeringsmenyn -->
    <button class="menu-button" onclick="oppnaMeny()" aria-label="Öppna meny">
        <span></span>
        <span></span>
        <span></span>
    </button>
</header>
<!-- Mörk bakgrund som visas bakom menyn -->
<div id="menyBakgrund" class="menu-background" onclick="stangMeny()"></div>

<!-- Navigeringsmenyn som glider ut från höger -->
<nav id="sidomeny" class="side-menu">

    <!-- Knapp för att stänga menyn -->
    <button class="close-button" onclick="stangMeny()" aria-label="Stäng meny">
        &times;<!-- Stängknappens symbol -->
    </button>
    <!-- Länkar till webbplatsens olika sidor -->
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
function oppnaMeny() {// Funktion som öppnar navigeringsmenyn
    document.getElementById("sidomeny").classList.add("open");// Hämta navigeringsmenyn och lägg till klassen open
    document.getElementById("menyBakgrund").classList.add("show");// Hämta bakgrunden bakom menyn och lägg till klassen show
}
function stangMeny() {// Funktion som stänger navigeringsmenyn
    document.getElementById("sidomeny").classList.remove("open");// Hämta navigeringsmenyn och ta bort klassen open
    document.getElementById("menyBakgrund").classList.remove("show");// Hämta bakgrunden bakom menyn och ta bort klassen show
}
</script>
