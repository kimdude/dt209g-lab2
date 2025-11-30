<?php
$title = "Startsida";
include("includes/header.php");
?>

<h1>Webbutveckling för Wordpress</h1>
<h2>Laboration 2 - Introduktion till PHP</h2>
<p>
    Laborationen går ut på att skapa en webbplats med HTML, CSS och PHP. Webbplatsen ska uppfylla följande:
</p>
<ul>
    <li>Databas-anslutning</Li>
    <li>Responsiv design</li>
    <li>Startsida med information om laborationen</li>
    <li>Undersida om användning av AI</li>
    <li>Undersida med formulär som lägger till mål i en bucketlist</li>
    <li>Formuläret ska ha tydliga felmeddelanden</li>
    <li>Bucketlistan ska hämtas från databasen och läsas ut</li>
    <li>Möjlighet att ta bort och lägga till mål från listan ska finnas</li>
</ul>
<p>
    Databasen ska planeras med ER-diagram och anslutningen ska vara objekterienterad med klasser. Ett UML-diagram ska skapas för kasserna.
</p>
<h2>Reflektioner</h2>
<p>
    Personligen tycker jag att PHP är smidigt och jag gillar att det skrivs i HTML-koden. Det känns enklare än att ha allt i separata filer och använda DOM-manipulation 
    med JavaScript, åtminstone i mindre projekt. Dessutom verkar det generellt som ett säkrare språk än JavaScript, eftersom koden körs på servern istället för webbläsaren.
</p>
<p>
    Samtidigt har jag haft svårigheter att vänja mig vid just det. Exempelvis att man inte kan anropa funktioner när användaren trycker på en knapp på samma vis.
    Men det öppnar till möjligheten att kombinera PHP med JavaScript, vilket nog är en väldigt bra kombo.
</p>

<?php
include("includes/footer.php");