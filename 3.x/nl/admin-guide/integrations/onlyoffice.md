# OnlyOffice

**OnlyOffice**-integratie stelt gebruikers in staat documenten (Word, Excel, PowerPoint) rechtstreeks in de browser binnen Chamilo te bewerken, zonder ze te downloaden.

## Wat OnlyOffice biedt

* **Documentbewerking** — Bewerk .docx-, .xlsx- en .pptx-bestanden in de browser
* **Formaatcompatibiliteit** — Volledige compatibiliteit met Microsoft Office-formaten
* **Geen desktopsoftware nodig** — Alles draait in de browser

> Realtime collaboratief bewerken hangt af van de OnlyOffice Document Server zelf; de plugin van Chamilo opent en slaat documenten op via de server, maar voegt die mogelijkheid niet toe of beperkt deze niet.

## Configuratie

1. Installeer **OnlyOffice Document Server** op uw server (of gebruik de OnlyOffice-clouddienst)
2. Configureer in de platforminstellingen van Chamilo:
   * **OnlyOffice Document Server URL** — Het adres van uw OnlyOffice-server
   * **Secret key** — Voor beveiligde communicatie tussen Chamilo en OnlyOffice
3. Schakel de integratie in

## Hoe het werkt

Eenmaal geconfigureerd zien gebruikers een optie **Bewerken met OnlyOffice** wanneer ze ondersteunde documenttypen bekijken in de tool Documenten. Door erop te klikken wordt het document geopend in de OnlyOffice-editor binnen de Chamilo-interface.

Wijzigingen worden automatisch terug opgeslagen in de documentopslag van Chamilo.

## Tips

* **Aparte server aanbevolen** — Net als BigBlueButton zou OnlyOffice Document Server voor de beste prestaties op een eigen server moeten draaien
* **HTTPS vereist** — Zowel Chamilo als OnlyOffice moeten via HTTPS worden aangeboden om de integratie te laten werken
* **Controleer formaten** — OnlyOffice werkt het best met Office-formaten (.docx, .xlsx, .pptx). Andere formaten kunnen beperkte bewerkingsondersteuning hebben.