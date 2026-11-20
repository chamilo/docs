# Hot Potatoes-activiteiten

Chamilo 3.1 ondersteunt het importeren van Hot Potatoes-HTML-activiteiten in het moderne hulpmiddel Oefeningen en het gebruik van afzonderlijke activiteiten in leerpaden.

## Een activiteit importeren

1. Open het hulpmiddel **Oefeningen** van de cursus en ga naar **Hot Potatoes**.
2. Selecteer in **Hot Potatoes importeren** een Hot Potatoes-**ZIP**-pakket of een zelfstandige **HTML**-export.
3. Wanneer een activiteit afhankelijk is van gekoppelde afbeeldingen, media of andere bestanden, neem die bronnen dan op in het ZIP-bestand.
4. Selecteer **Importeren** en controleer of de geïmporteerde activiteit correct opent en wordt weergegeven.

## Activiteiten beheren en hergebruiken

Gebruik in de Hot Potatoes-lijst **Openen** om de activiteit te bekijken, **Bewerken** om de titel te wijzigen, **Publiceren** of **Verbergen** om de zichtbaarheid te regelen, en **Verwijderen** om deze te verwijderen wanneer dat is toegestaan. De leerpadbouwer kan afzonderlijke Hot Potatoes-activiteiten opnemen onder zijn bronnen.

## Pogingen van cursisten beoordelen

De actie **Pogingen** toont bijgehouden pogingen ter beoordeling door de docent. Docenten kunnen een beoordeeld percentage van 0 tot 100 toekennen. Het scherm toont momenteel maximaal de laatste 100 pogingen. Gebruik het daadwerkelijk weergegeven resultaat van de activiteit als ondersteunend bewijs bij het beoordelen van een cursist.

**Automatische scoring en synchronisatie met het cijferboek zijn niet geïmplementeerd.** Scores die door een Hot Potatoes-pakket zelf worden getoond, mogen niet worden beschouwd als geverifieerde cijfers aan de serverzijde. Door de docent beoordeelde resultaten worden afzonderlijk opgeslagen.

## Probleemoplossing

Als media ontbreken, exporteer de activiteit dan opnieuw met alle gekoppelde bronnen in het ZIP-bestand. Als een HTML-export op een lokale computer werkt maar niet in Chamilo, controleer dan op externe bestandsverwijzingen of incompatibele ingesloten inhoud. Test de zichtbaarheid van de activiteit zowel met een studentenaccount als met een docentenaccount.

Zie [Oefeningen](exercises.md) en [Leerpaden](../adding-content/learning-paths.md). Implementatie: [PR #9380](https://github.com/chamilo/chamilo-lms/pull/9380).