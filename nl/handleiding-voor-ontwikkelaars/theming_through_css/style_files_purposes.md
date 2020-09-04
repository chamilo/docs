# Style files doeleinden

## Het bestand bootstrap.min.css

Bootstrap is de beruchte open CSS-stylesheet van Twitter. Het is een container voor best practices op het gebied van styling en helpt uw website een mooie uitstraling te geven door deze alleen op te nemen.

Het bestand bootstrap.min.css is een verkleinde \(gecomprimeerde\) versie van de bibliotheek.

U MOET het bestand bootstrap.css NIET wijzigen, aangezien dit het origineel is, zoals geleverd door Twitter, en omdat we het in de toekomst kunnen bijwerken met nieuwere versies van Twitter.

## Het base.css-bestand

Het bestand base.css definieert een reeks CSS-elementen die de basis vormen voor de rest \(hoewel het zelf gebaseerd is op Bootstrap 3\). Alles wat een portaal geeft dat «Chamilo touch» geeft, is hier geconcentreerd, dus het is een goed idee om \(import\) dit bestand uit een meer specifieke CSS op te nemen.

U dient dit bestand niet te wijzigen, aangezien dit het uiterlijk van andere stijlen die in Chamilo worden gebruikt, kan veranderen.

## Het \[theme\]/default.css bestand

Dit bestand is specifiek voor uw CSS-thema en definieert elementen die zeer specifiek zijn voor het algemene uiterlijk dat u voor uw portal wilt.

Dit is het bestand dat u moet bijwerken om de stijl van uw Chamilo-installatie te wijzigen.

Het bevat de stijlen voor de koptekstlogo's, de navigatiebalk, de voettekst, enz., Bovenop wat is gedefinieerd in base.css.

## Het print.css bestand

De print.css-stijl wordt zelden gebruikt in Chamilo. Het **zou** veel vaker moeten worden gebruikt, maar we moeten eerst nog wat andere dingen inhalen.

Normaal gesproken bevat het bestand print.css alle details om een webpagina afdrukbaar te maken \(zoals ... op een printer of in een pdf\). We zouden graag bijdragen van die kant krijgen.

## Andere stylesheets in je stijlmap

Enkele andere bestanden zijn te vinden in de app/Resources/public/css/themes/\[jouw-stijl\]/ map, zoals scorm.css, frames.css, dataTable.css en dat soort dingen. Deze worden alleen gebruikt voor specifieke delen van de applicatie en hebben een naam die relatief representatief is voor het kenmerk dat ze dekken.

## Functie-specifieke stylesheets

Ten slotte is er een reeks andere bestanden beschikbaar buiten de app/Resources/public/css/ map. Deze zijn functie-specifiek en komen over het algemeen samen met een nieuwe gratis softwarebibliotheek of functie die we in Chamilo hebben opgenomen.

Dit is bijvoorbeeld het geval bij markdown.css.

Deze bestanden **mogen niet** worden bijgewerkt, aangezien we ze in toekomstige versies van Chamilo waarschijnlijk zullen overschrijven met nieuwere versies. Er moet echter nog steeds iets worden gedaan op systeemniveau om hierna een aangepaste stijl te kunnen laden.
