# Platformhulpmiddelen

Deze pagina behandelt de overige, kleinere onderdelen in het blok Platformbeheer.

## Extra velden

**Platform > Extra velden** is een typeselector, geen veldlijst op zich — het toont elk objecttype dat aangepaste velden ondersteunt, en een klik op een type brengt u naar de eigen veldeneditor van dat type. Beschikbare typen zijn onder meer: gebruiker, cursus, sessie, vraag, leerpad (en leerpaditem/weergave), vaardigheid, opdracht (werk), carrière, gebruikerscertificaat, enquête, algemene voorwaarden, forumcategorie, forumbericht, oefening, oefeningstracking, cursusaankondiging, bericht, document, aanwezigheidskalender, woordenlijst, commentaar bij werkcorrectie, agenda-evenement en portfolio (plus geplande aankondigingen, als die functie is ingeschakeld).

Voor het meest gebruikte geval — aangepaste gebruikersprofielvelden — zie [Gebruikersprofilering](../users/user-profiling.md), dat dezelfde onderliggende functie vanuit de gebruikersbeheerzijde behandelt.

## E-mailsjablonen

**Platform > E-mailsjablonen** laat u de bewoording van specifieke systeem-e-mails (registratiebevestiging, inschrijvingsmeldingen en dergelijke) overschrijven zonder serverbestanden aan te raken. Elk sjabloon heeft een titel, een **type** dat overeenkomt met de specifieke ingebouwde e-mail die het overschrijft, de sjabloontekst zelf (platte tekst/Twig, geen rich editor) en een vlag "als standaard instellen" — per type kan slechts één sjabloon de actieve standaard zijn. Sjablonen zijn scoped per toegang-URL; er is geen apart veld per taal, dus de taalafhandeling voor deze e-mails is wat de omringende code al doet.

Sjablonen worden gerenderd via een **sandboxed** Twig-omgeving om veiligheidsredenen: slechts een kleine set tags en filters is toegestaan, en de enige beschikbare gegevens zijn het `User`-object van de ontvanger, aangeduid als `user.getEmail()`, `user.getFirstname()` en vergelijkbare getters (`getId`, `getUsername`, `getLastname`, `getStatus`, `getOfficialCode`, `getPhone`). Alles buiten die allowlist geeft geen luide fout — het wordt stil leeg gerenderd, waarna wordt teruggevallen op het oorspronkelijke ingebouwde sjabloon. Houd uw aangepaste sjablonen eenvoudig en test ze (met een echte registratie of meldingsaanleiding) na bewerking.

## Categorieën van het contactformulier

**Platform > Categorieën van het contactformulier** beheert de keuzelijst die op het openbare formulier **Contacteer ons** van uw portaal wordt getoond. Elke categorie is slechts een titel en een bestemmings-e-mailadres — welke categorie een bezoeker kiest, bepaalt naar welke inbox het bericht wordt gestuurd. Gebruik dit om verschillende onderwerpen (ondersteuning, verkoop, toelating) naar verschillende teams te leiden zonder aparte formulieren te bouwen.

## Snelkoppelingen naar instellingencategorieën

Enkele blokonderdelen zijn eenvoudigweg directe koppelingen naar specifieke categorieën van [Platforminstellingen](../platform-settings/README.md), in plaats van aparte hulpmiddelen:

* **Plugins** en **Systeemsjablonen** openen Configuratie-instellingen vooraf gefilterd op die categorieën
* **Regio's** doet hetzelfde, voor platformregio-instellingen

## Af en toe zichtbare onderdelen

Een handvol onderdelen verschijnt alleen wanneer de relevante instelling of plugin actief is, zodat u ze mogelijk niet op uw installatie ziet:

* **Algemene voorwaarden** — verschijnt wanneer **Algemene voorwaarden toestaan** is ingeschakeld, voor het beheren van de tekst die gebruikers moeten accepteren
* **Meldingen** — verschijnt wanneer de platformfunctie voor meldingsgebeurtenissen is ingeschakeld
* **CMS**, **Woordenboek**, **Justificatie** — elk gekoppeld aan de eigen optionele plugin die is geïnstalleerd en ingeschakeld