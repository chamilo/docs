# OnlyOffice

Dankzij de integratie met **OnlyOffice** kunnen gebruikers documenten (Word, Excel, PowerPoint) rechtstreeks in de browser binnen Chamilo bewerken, zonder ze te downloaden.

## Wat OnlyOffice biedt

* **Documentbewerking** — Bewerk .docx-, .xlsx- en .pptx-bestanden in de browser
* **Formaatcompatibiliteit** — Volledige compatibiliteit met Microsoft Office-formaten
* **Geen desktopsoftware nodig** — Alles draait in de browser

> Realtime samenwerken bij het bewerken hangt af van de OnlyOffice Document Server zelf; de plugin van Chamilo opent en slaat documenten op via de server, maar voegt die mogelijkheid niet toe en beperkt die ook niet.

## Configuratie

1. Installeer **OnlyOffice Document Server** op uw server (of gebruik de cloudservice van OnlyOffice)
2. Configureer in de platforminstellingen van Chamilo:
   * **OnlyOffice Document Server URL** — Het adres van uw OnlyOffice-server
   * **Secret key** — Voor beveiligde communicatie tussen Chamilo en OnlyOffice
3. Schakel de integratie in

## Hoe het werkt

Na de configuratie zien gebruikers een optie **Bewerken met OnlyOffice** wanneer ze ondersteunde documenttypen bekijken in het hulpmiddel Documenten. Door erop te klikken wordt het document geopend in de OnlyOffice-editor binnen de interface van Chamilo.

Wijzigingen worden automatisch teruggeschreven naar de documentopslag van Chamilo.

## Vernieuwen van documentversies en opslaan

Wanneer de documentserver aangeeft dat een nieuwere opgeslagen versie beschikbaar is, kan de editor van Chamilo een bijgewerkte **ondertekende documentconfiguratie** opvragen en de mogelijkheid voor het vernieuwen van bestanden van OnlyOffice gebruiken, zonder dat de gebruiker een ander document hoeft te openen. Chamilo controleert of de vernieuwde configuratie bij hetzelfde document hoort voordat de editor naar de nieuwe versie overschakelt.

Een **force-save** terwijl het bewerken nog bezig is, verhoogt de documentversiesleutel niet. De callback voor de definitieve opslag werkt de metagegevens van het opgeslagen document bij, zodat bij de volgende opening de voltooide versie kan worden gebruikt. Dit onderscheid voorkomt dat een opslag die nog bezig is als een afzonderlijke documentversie wordt behandeld.

Als een vernieuwing mislukt, controleer dan of OnlyOffice Document Server de bestands- en callback-URL's van Chamilo kan bereiken, en raadpleeg de logboeken van de editor en de server. Open het document pas opnieuw nadat u hebt bevestigd dat het werk is opgeslagen; een onderbroken of verouderde editorsessie is geen bewijs dat de definitieve versie Chamilo heeft bereikt.

Dit gedrag is gecorrigeerd in [PR #9178](https://github.com/chamilo/chamilo-lms/pull/9178).

## Tips

* **Aparte server aanbevolen** — Net als BigBlueButton moet OnlyOffice Document Server voor de beste prestaties op een eigen server draaien
* **HTTPS vereist** — Zowel Chamilo als OnlyOffice moeten via HTTPS worden aangeboden om de integratie te laten werken
* **Controleer de formaten** — OnlyOffice werkt het best met Office-formaten (.docx, .xlsx, .pptx). Andere formaten hebben mogelijk beperkte ondersteuning voor bewerking.