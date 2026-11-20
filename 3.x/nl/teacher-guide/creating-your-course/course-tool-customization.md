# Namen en pictogrammen van cursustools aanpassen

Met Chamilo 3.1 kunnen geautoriseerde cursusbewerkers de **naam** en het **SVG-pictogram** aanpassen die voor een tool op de startpagina van een cursus worden weergegeven. Deze wijzigingen gelden alleen voor de cursus en behouden de bestaande bestemmingen van tools.

## Een tool aanpassen

1. Open de startpagina van de cursus als gebruiker die de cursus mag bewerken.
2. Schakel de modus **Aanpassen** in het toolraster in.
3. Open het aanpassingsformulier voor de tool die u wilt wijzigen.
4. Voer de gewenste **Naam** in en selecteer indien nodig een SVG-bestand als **Pictogram**.
5. Selecteer **Opslaan** en controleer de bijgewerkte tool in het raster op de startpagina.

Het aanpassen van tools verschilt van de rastermodi **Sorteren**, **Alles tonen** en **Alles verbergen**. Het wijzigen van het label of pictogram van een tool maakt geen nieuwe tool aan, wijzigt de onderliggende URL niet en verleent cursisten geen extra toegang.

## SVG-vereisten en beveiliging

Gebruik een SVG-bestand van een betrouwbare bron. Chamilo valideert geüploade SVG-inhoud en weigert onveilige bestanden. Als een bestand wordt geweigerd, vereenvoudig of exporteer het opnieuw als een schone SVG in plaats van te proberen de validatie te omzeilen.

Controleer het resulterende pictogram en de naam zowel als docent als als cursist, en verifieer dat een andere cursus ongewijzigd blijft. Cursisten kunnen tools niet aanpassen tenzij zij de vereiste rechten voor cursusbewerking hebben.

Zie [Startpagina van de cursus](course-homepage.md). Implementatie: [PR #9374](https://github.com/chamilo/chamilo-lms/pull/9374).