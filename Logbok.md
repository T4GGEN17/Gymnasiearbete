# Loggbok 1 oktober 2026
## Vad jag har gjort idag
Idag har jag arbetat med planeringen och uppbyggnaden av mitt gymnasiearbete, som är en webbshop för försäljning av olika Red Bull-smaker.
Jag började med att planera webbplatsens funktioner och innehåll. Jag bestämde att webbplatsen ska innehålla:
- Registrering och inloggning
- Produktsidor för olika Red Bull-smaker
- Sökfunktion
- Recensioner och kommentarer
- Favoriter
- Varukorg
- Profilsida

Efter det designade jag databasen. Jag skapade tabeller för användare, produkter, recensioner, favoriter, varukorg, beställningar, orderrader och kategorier. Jag bestämde även primärnycklar (PK), främmandenycklar (FK) och lämpliga datatyper för tabellerna.

När databasen var klar skapade jag projektets filstruktur i Visual Studio Code. Jag skapade bland annat följande filer och mappar:
- assets
- css
- files
- Startsida.php
- Alla_produkter.php
- Produktsida.php
- Inloggning.php
- Registrering.php
- Profilsida.php
- Favoriter.php
- Varukorg.php

Jag skapade även filerna:
- assets/header.php
- assets/footer.php
- css/style.css



# 2 oktober 2026
## Vad har jag gjort idag
Idag har jag fortsätt med css, fixat med header och fotter, samt lagt till några bilder.

## Problem jag stötte på
Ett problem jag stötte på var att min nya css inte funkade så jag testade några saker och det enda sättet jag hitta
att få in den nya koden i css in på hemsidan var att göra en ny css utanför foldern css och ta bort den foldern helt, samt den gamla css filen. Så jag la in den koden jag skrivit i den nya css filen och det funkade.



# 5 oktober 2026
## Vad har jag gjort idag
Idag har jag forstätt med css så att den är ganska redo för de andra php filerna, sedan har jag arbetat i Alla_Produkter.php filen så man kan se alla de olika smakerna som finns i webbsidan. 

## Problem jag stötte på
Ett problem jag stötte på var att planera hur jag skulle göra koden för att vissa alla smakerna men efter en stund av planering så lyckades jag hitta ett sätt att göra det på ett smidigt sätt, det enda jobbiga är att lägga till alla bilderna nästa gång.



# 6 oktober 2026
## Vad har jag gjort idag
Idag har jag laddat ner en massa bilder på olika redbull-smaker och lagt in länkarna till bilderna i Alla_produkter filen, så att man kan se dem på hemsidan senare när jag börjar bli klar med Alla_produkter filen. Jag har även lagt till några rader i style.css för Alla_produkter filen, så att det ska se bättre ut på den delen av hemsidan, däremot mest för search delen.



# 7 oktober 2026
## Vad har jag gjort idag
Idag har jag gjort klart Alla_Produkter filen, gjort css delen och på börjat produktsidan.

## Problem jag stötte på
Ett problem var hur jag skulle länka alla produkterna till var sin produktsida, men jag tror att jag har hittat en lösning, det får jag se vid ett senare tillfälle.



# 9 oktober 2026
## Vad har jag gjort idag
Idag har jag arbetat med min produktsida så man kan gå in och så informationen om den, som pris, antal, vilken smak och en liten beskrivning kring smaken. Jag har arbetat i min css så bilderna och texten blir bra och ser bra ut.

## Problem jag stötte på idag
Ett stort problem var bilderna vissa var för stora, vissa för små, vissa hade texten med information på bilden, detta tog ett tag att fixa och var krongligt. Men efter en lång stund med många försök så lyckades jag nästan klara det, allt var perfekt bild platesen, storleken, texten men med ett problem, det blev dubbleter på alla bilder så varje produkt sida hade 2 bilder av samma smak men det var enkelt att fixa. Jag hade bara råkat lägga till:
<!--<div class="product-image">
    <img
        src="<?php echo htmlspecialchars($product['image']); ?>"
        alt="<?php echo htmlspecialchars($product['name']); ?>"
        style="transform: scale(<?php echo $imageSize; ?>);">
</div>-->
två gånger vilket skapa dubbleter, så det var bara att ta bort den ena och allt funka.



# 16 oktober 2026
## Vad har jag gjort idag
Idag har jag påbörjat med varukorg.php och försökt göra ändringar i produktsidan och css för att göra så man tex får någon visuellt meddelande när man lägger något i varukorgen och så man kan lägga till saker i varukorgen.

## Problem jag stötte på 
Problem som jag har stött på idag är att knappen varukorg på produktsidan har flyttats till höger men det blir problem till nästa gång. Och sen fick jag inte till så man kan lägga till saker i varukorgen men det är löst nu.



# 20 oktober 2026
## Vad har jag gjort idag
Idag har jag fortsatt arbeta med varukorgen i min Red Bull Shop. Jag har fixat så att man kan öka och minska antalet produkter direkt i varukorgen och ta bort en produkt eller alla exemplar av samma produkt. Jag har också ändrat CSS-koden för att förbättra utseendet och placeringen av produkterna och knapparna. Sedan har jag fixat länkarna på startsidan så att knappen ”Visa produkt” leder till rätt smak. Jag har även tagit bort ett grönt meddelande som visades på produktsidan.

## Problem jag stötte på
Ett problem jag stötte på var att knapparna i varukorgen låg ojämnt och att det inte gick att ändra antalet direkt på sidan. När jag försökte ta bort en produkt försvann alla exemplar av samma produkt. Jag hade också problem med att alla populära smaker på startsidan ledde till Red Bull Original. Till sist upptäckte jag en grön rektangel på produktsidorna. Jag löste problemen genom att ändra PHP-koden och CSS-koden, så att varukorgen fungerar bättre och länkarna leder till rätt produkter.



# 23 oktober 2026
## Vad har jag gjort idag
Idag har först fixat så "Populära smaker" på Startsida.php ligger i mitten centrerat istället för på kanten, sedan så har jag fixat med favoritfunktionen så att alla 20 produkter kan läggas till och tas bort. Jag har även lagt till notifikationer när en produkt läggs till som favorit.

## Problem jag stötte på
Favoritsidan visade bara fyra produkter och det saknades notifikationer. Jag löste detta genom att lägga till alla produkter och använda sessioner för meddelanden.



# 