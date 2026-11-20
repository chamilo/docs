# Pagina's

Pages is de ingebouwde, CMS-achtige tool van Chamilo voor de inhoudsblokken die de publieke delen van uw portaal vormen — de startpagina, de voettekst, navigatiemenu's en vergelijkbare plaatsingen — zonder dat u een sjabloonbestand hoeft te bewerken.

## Pagina's openen

Klik in het beheerpaneel op **Platform > Pages**.

## Hoe Pages werkt

Elke pagina heeft:

* **Titel** en rich-text **inhoud**
* Een **slug**, automatisch gegenereerd op basis van de titel
* **Ingeschakeld** — of de pagina momenteel zichtbaar is
* **Positie** — volgorde via slepen en neerzetten binnen de categorie
* **Locale** — inhoud is per taal: dezelfde plaatsing kan één pagina per taal bevatten, en de site valt terug op de standaardtaal van het platform als er geen pagina bestaat voor de taal van een bezoeker
* Een **categorie** — dit bepaalt *waar* de pagina wordt weergegeven (bijvoorbeeld `index`, `home`, `footer_public` of `menu_links`); Chamilo maakt de benodigde categorieën automatisch aan

Bij een installatie met meerdere URL's (meerdere portalen) zijn pagina's ook beperkt tot de toegangs-URL, zodat elk portaal zijn eigen inhoud beheert.

## Waar elke categorie verschijnt

Het formulier voor het aanmaken en bewerken van pagina's eindigt met twee diagrammen die tonen waar de pagina's van elke categorie worden weergegeven. Gebruik ze om de juiste **Categorie** te kiezen voordat u de inhoud schrijft.

![Het formulier voor het bewerken van pagina's, met de velden titel, vriendelijke URL, ingeschakeld, categorie, taal en inhoud, gevolgd door twee diagrammen van de aanmeldpagina en van de interface van aangemelde gebruikers, waarvan de blauwe gebieden zijn gelabeld met de paginacategorieën index, faq, demo, footer_public, home, menu_links en footer_private](../../.gitbook/assets/admin-pages-form.png)

* **Aanmeldpagina (bezoekers die niet zijn aangemeld)** — de `index`-pagina's vullen het hoofdgebied naast het aanmeldformulier, en de `footer_public`-pagina's worden in de voettekst getoond. De categorieën `index`, `faq` en `demo` verschijnen ook als items in de bovenste balk.
* **Interface van aangemelde gebruikers** — de `home`-pagina's vullen het hoofdgebied van de startpagina. De `menu_links`-pagina's staan in het zijmenu en de `footer_private`-pagina's worden in de voettekst getoond.

De gemarkeerde blauwe gebieden zijn de plaatsen die een pagina kan innemen; de grijze blokken zijn de eigen interface van Chamilo, die pagina's niet vervangen.

## Categorieën voor menukoppelingen

Twee categorieën zetten hun ingeschakelde pagina's om in een lijst met koppelingen (elke koppeling toont de paginatitel en opent de pagina) in plaats van hun inhoud ter plaatse weer te geven:

* **`menu_links`** — koppelingen die voor iedereen zichtbaar zijn: onder het aanmeldformulier voor anonieme bezoekers, en onderaan de linkerzijbalk voor aangemelde gebruikers. Gebruik dit voor inhoud die elke gebruiker nodig kan hebben, zoals juridische mededelingen of gebruiksvoorwaarden.
* **`menu_public_links`** — koppelingen die **alleen aan anonieme bezoekers** worden getoond, onder het aanmeldformulier op de startpagina en op de aanmeldpagina. Ze verdwijnen zodra de gebruiker zich aanmeldt. Gebruik dit voor inhoud gericht op potentiële gebruikers, zoals een presentatie van het platform of hoe u een account aanvraagt.

Wanneer beide categorieën pagina's hebben, worden de `menu_links`-koppelingen als eerste vermeld.

## De introductiepagina voor registratie

**Platform > Setting the registration page** is een snelkoppeling naar hetzelfde Pages-systeem voor één specifieke plaatsing: de inleidende tekst die boven het openbare registratieformulier wordt getoond. Dit is beperkt tot portaalbeheerders. Als u erop klikt, gebeurt het volgende:

* De bestaande introductiepagina wordt geopend om te bewerken, als er al een bestaat voor uw toegangs-URL en taal, of
* De plaatsing wordt ter plekke aangemaakt en u gaat direct naar het aanmaken van de inhoud

Wat u hier opslaat, wordt weergegeven als een infovak direct boven het registratieformulier — een natuurlijke plaats voor instructies, voorwaarden die specifiek zijn voor uw organisatie, of context die potentiële gebruikers moeten lezen voordat ze zich registreren. Laat het uitgeschakeld (of maak het nooit aan) om het gewone registratieformulier zonder inleidende tekst te tonen.

## Een pagina in alle talen publiceren

Kies in de taalkiezer van de pagina-editor **Alle talen** wanneer dezelfde pagina zichtbaar moet zijn ongeacht de interfacetaal van de bezoeker. Gebruik in plaats daarvan een specifieke taal voor gelokaliseerde inhoud. Bestaande taalspecifieke pagina's en het terugvalgedrag van locales blijven behouden; deze functie vertaalt een pagina niet automatisch.

Zie [all-languages pages PR #9398](https://github.com/chamilo/chamilo-lms/pull/9398).

## Meerdere pagina's of gerelateerde taalversies verwijderen

De lijst Pages ondersteunt het selecteren van meerdere items en het kiezen van **Geselecteerde pagina's verwijderen**. Controleer de bevestigingslijst zorgvuldig voordat u ze verwijdert. Bij het verwijderen van een afzonderlijke pagina kan Chamilo ook kandidaatpagina's in andere talen tonen, zodat u gerelateerde versies expliciet kunt selecteren om te verwijderen.

Pagina's in verschillende talen zijn **niet automatisch gekoppeld**. Selecteer geen pagina met een vergelijkbare naam tenzij u hebt gecontroleerd dat het de juiste vertaling of tegenhanger is. Verwijderingen zijn destructief, dus controleer de selectie en bewaar eerst een kopie van belangrijke CMS-inhoud. Zie [bulk and multilingual page deletion PR #9331](https://github.com/chamilo/chamilo-lms/pull/9331).