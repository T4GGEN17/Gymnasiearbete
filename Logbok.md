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


 
# 9 november 2026
## Vad har jag gjort idag
Idag har jag arbetat med registreringssidan till min Red Bull Shop. Jag har kopplat sidan till databasen och skapat ett registreringsformulär där användaren kan fylla i namn, användarnamn, e-post, lösenord, adress, postnummer, ort och telefonnummer. Jag har även lagt till en kontroll som ser till att lösenorden matchar och att lösenordet sparas krypterat (hashat) i databasen.

## Problem jag stötte på
- Jag hade råkat lägga in två formulärtaggar (`<form>`) i varandra och behövde ta bort den ena.

- Jag fick ett HTTP Error 500 när jag försökte öppna registreringssidan.Efter felsökning upptäckte jag att problemet låg i databasanslutningen. Jag rättade databasanslutningen och kunde sedan lösa problemet.



# 10 november 2026
## Vad har jag gjort idag?
Idag har jag arbetat med inloggningssidan och profilsidan till min Red Bull-webbshop. Jag har skapat en inloggningsfunktion där användaren kan logga in med sitt användarnamn eller sin e-postadress och sitt lösenord. Jag har även lagt till CSS för att göra inloggningssidan snyggare precis resten av hemsidan.

## Problem jag stötte på
Ett problem var att få inloggningen att fungera tillsammans med databasen och kontrollera att användarens lösenord stämmer. Jag behövde också se till att rätt användare hämtas från databasen. Jag löste detta genom att använda PHP-sessioner och kontrollera lösenordet med `password_verify()`.



# 13 november 2026
## Vad har jag gjort idag?
Idag har jag gjort klart profilsidan till Red Bull Shopen. Jag har gjort så man kan se alla sina inloggnings uppgifter samt css. Jag har även gjort så man kan bara lägga till saker till favortiter och varukorg om man är inloggad. Dock så sparas inte en användares favoriter och varukorg när man loggat ut.

## Problem jag stötte på 
Ett problem jag hade var när jag skulle göra så man bara kan lägga till saker till favortiter och varukorg om man är inloggad. Där jag behövde ändra en del i produktsidan för att det skulle funka.

## Minimum kvar att göra
- Favoriter och varukorg sparas för användare.
- Göra om navigatorn till tre streck man kan trycka på i hörnet så det kommer ut från sidan.
- Knappar + och - 10 i varukorg.
- Inte skickas till toppen av hemsidan när man lägger till saker i varukorgen när man trycker på knapparna.
- Fixa footer så den inte hamnar mitt på skärmen när sidan är tom. 
- Göra så man inte kan logga in när man redan är inloggad. 
- Fixa Red Bull Lime Edition bilden.



# 16 November 2026
## Vad har jag gjort idag?
Idag har jag lagt till en ny bild på Red Bull Lime Edition, knappar för + och -10 i varukorgen ifall man ska ha fler så man enklare kan få fler. Jag har även gjort så när man loggar in och om man redan är inloggad så kommer man till startsidan istället för att komma till profilen. Sen har jag även lagt till en ny navigator (en hamburgarmeny) så att det ska se bättre ut. 

## Problem jag stötte på
Idag hade jag problem med varukorgen, där jag försökte lägga till knappar för att öka och minska antalet produkter med 10. Jag behövde rätta till PHP-koden och HTML-strukturen. Jag hade även problem med att få navigationsmenyn att fungera på alla sidor eftersom HTML-koden i header.php behövde anpassas till sidornas befintliga HTML-struktur. 

## Minimum kvar att göra
- Favoriter och varukorg sparas för användare.
- Lägg till en tömma alla på en produkt knapp i varukorg och skriva in själv hur många man vill ha.
- Inte skickas till toppen av hemsidan när man lägger till saker i varukorgen när man trycker på knapparna.
- Fixa footer så den inte hamnar mitt på skärmen när sidan är tom.
- Fixa vissa produktbilder som är små. 
- Flytta på kryset för att gå ut ur navigatorn till höger.
- Göra så man kan köpa. 
- När man loggat in ska det komma upp Hej och sen användarnamnet på startsidan.



# 17 November 2026
## Vad har jag gjort idag?
Idag har jag fixat välkomsthälsningen på startsidan, ändrat navigeringsmenyn och arbetat med footern på favoritsidan. Jag har även förbättrat varukorgen så att man behåller sin position på sidan när man ändrar antal eller tar bort produkter.

## Problem jag stötte på
Välkomsttexten hamnade fel och hade fel färg. Jag löste det genom att ändra HTML- och CSS-koden. Varukorgen skickade användaren högst upp efter varje ändring. Jag löste detta med JavaScript som sparar och återställer scrollpositionen efter omladdning.

## Minimum kvar att göra
- Favoriter och varukorg sparas för användare.
- Inte skickas till toppen av hemsidan när man lägger till saker i varukorgen när man trycker på knapparna. typ klar
- Fixa vissa produktbilder som är små. 
- Göra så man kan köpa. 
- När man lägger in för många så blir det minus ta bort det.
- Fixa footer på loggin sidan när man är utloggad.
- Kunna skriva egna recensioner.
- Ta bort välkomst medelandet när man inte är inloggad. 



# 18 November 2026
## Vad har jag gjort idag?
Idag har jag fixat så footern är längst ner när man är utloggad på login-sidan och när man sökt upp produkter, jag har även gjort så välkomstmeddelandet bara syns när man är inloggad. Därefter har jag gjort så man kan max lägga till saker i varukorgen det som finns i lager, samt kodkommentarer.

## Problem jag stötte på
Jag hade problem med att begränsa antalet produkter i varukorgen så att kunden inte kunde lägga till fler produkter än vad som finns i lager. Jag behövde därför lägga till kontroller som jämför antalet i varukorgen med produktens lagersaldo. 

## Minimum kvar att göra
- Favoriter och varukorg sparas för användare.
- Inte skickas till toppen av hemsidan när man lägger till saker i varukorgen när man trycker på knapparna. typ klar
- Fixa vissa produktbilder som är små. 
- Göra så man kan köpa. 
- Kunna skriva egna recensioner.
- Göra så man inte faktiskt kan skriva något negativt i varukorgen och om man skriver 0 och enter så ska produkten försvinna.
- Göra så man kan se historiken av vad man har beställt för varje användare.
- Göra så man kan ändra sina uppgifter så som användarnamn, lösernod, ort, adress, postnummer och telefonnummer
