# OnlyOffice

**OnlyOffice**-integratie stelt gebruikers in staat om documenten (Word, Excel, PowerPoint) direct in de browser binnen Chamilo te bewerken, zonder deze te hoeven downloaden.

## Wat OnlyOffice Biedt

* **Documentbewerking** — Bewerk .docx, .xlsx, .pptx-bestanden in de browser
* **Formaatcompatibiliteit** — Volledige compatibiliteit met Microsoft Office-formaten
* **Geen desktopsoftware nodig** — Alles draait in de browser

> Realtime collaboratieve bewerking is afhankelijk van de OnlyOffice Document Server zelf; de plugin van Chamilo opent en slaat documenten op via de server, maar voegt geen extra functionaliteit toe of beperkt deze mogelijkheid niet.

## Configuratie

1. Installeer **OnlyOffice Document Server** op uw server (of gebruik de OnlyOffice cloudservice)
2. Configureer in de platforminstellingen van Chamilo:
   * **OnlyOffice Document Server URL** — Het adres van uw OnlyOffice-server
   * **Geheime sleutel** — Voor veilige communicatie tussen Chamilo en OnlyOffice
3. Schakel de integratie in

## Hoe Het Werkt

Na configuratie zien gebruikers een optie **Bewerken met OnlyOffice** wanneer ze ondersteunde documenttypen bekijken in de Documenten-tool. Door hierop te klikken, wordt het document geopend in de OnlyOffice-editor binnen de Chamilo-interface.

Wijzigingen worden automatisch opgeslagen in de documentopslag van Chamilo.

## Tips

* **Aparte server aanbevolen** — Net als bij BigBlueButton wordt aanbevolen om OnlyOffice Document Server op een eigen server te draaien voor optimale prestaties
* **HTTPS vereist** — Zowel Chamilo als OnlyOffice moeten via HTTPS worden aangeboden om de integratie te laten werken
* **Controleer formaten** — OnlyOffice werkt het beste met Office-formaten (.docx, .xlsx, .pptx). Andere formaten kunnen beperkte bewerkingsondersteuning hebben.