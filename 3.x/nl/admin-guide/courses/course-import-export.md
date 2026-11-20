# Cursus importeren en exporteren

Chamilo ondersteunt het importeren en exporteren van cursussen voor back-up, migratie en het delen van inhoud.

Deze functies bevinden zich in de cursus, in het hulpmiddel **Onderhoud** onder het tandwielpictogram bovenaan de startpagina van de cursus.

## Een cursus exporteren

Docenten kunnen hun eigen cursussen exporteren vanuit het hulpmiddel Cursusonderhoud. Als beheerder kunt u elke cursus exporteren:

1. Open de cursus
2. Open het hulpmiddel **Cursusonderhoud**
3. Selecteer **Een back-up maken**
4. Kies wat u wilt opnemen (inhoud, gebruikersgegevens, enz.)
5. Download het exportbestand

De export maakt een pakket met de documenten, oefeningen, forums, leerpaden en configuratie van de cursus.

## Een cursus importeren

Een cursus importeren vanuit een Chamilo-exportbestand:

1. Open de cursus
2. Open het hulpmiddel **Cursusonderhoud**
3. Upload in de sectie **Back-up importeren** het exportbestand
4. Kies wat u wilt opnemen (inhoud, gebruikersgegevens, enz.)
5. Configureer de importopties:
   * Of bestaande inhoud moet worden overschreven
   * Of gebruikersgegevens moeten worden opgenomen
6. Voer de import uit

## Een cursus kopiëren

Om de inhoud van een andere cursus naar uw cursus te kopiëren, moet u eerst een broncursus en een doelcursus aanmaken.

1. Open de doelcursus
2. Open het hulpmiddel **Cursusonderhoud**
3. Selecteer in de sectie **Cursus kopiëren** de cursus **Bron**
4. Bevestig de opties
5. Klik op **Doorgaan** en volg de instructies

## Common Cartridge

Chamilo ondersteunt de standaard **IMS Common Cartridge 1.3** (IMS CC 1.3) voor interoperabiliteit met andere leerbeheersystemen. U kunt:

* Common Cartridge-pakketten **importeren** (.imscc-bestanden)
* cursusinhoud **exporteren** in Common Cartridge-formaat

Dit maakt uitwisseling van inhoud mogelijk met andere platforms die de Common Cartridge-standaard ondersteunen (Moodle, Canvas, Blackboard, enz.).

## Een cursus recyclen

Met de functie voor het recyclen van een cursus behoudt u de structuur van de cursus, maar wist u de inhoud.

## Een cursus verwijderen

Hiermee wist u de cursus volledig, inclusief alle inhoud en de gebruikersactiviteit erin.

Een cursus permanent verwijderen:

1. Open de doelcursus
2. Open het hulpmiddel **Cursusonderhoud**
3. Voer in de sectie **Deze cursus volledig verwijderen** handmatig de code van de cursus in om uw intentie te bevestigen
4. Bevestig

U wordt vervolgens doorgestuurd naar de startpagina van het portaal, omdat de cursus niet meer bestaat.

## Moodle-import

Chamilo kan cursusback-ups importeren vanuit **Moodle**. De importeur zet de inhoudsstructuur van Moodle om naar het formaat van Chamilo, inclusief toetsen, documenten en cursusinstellingen.

> **Werk in uitvoering.** Hoewel het al een breed scala dekt, dekt de Moodle-importeur momenteel niet elk type Moodle-activiteit en inhoudsformaat. Beschouw het als een startpunt dat na voltooiing van de import nog handmatige aanpassing kan vereisen. Als u een ontbrekend of falend element in de import of export vaststelt, meld dit dan via onze [Github-ruimte](https://github.com/chamilo/chamilo-lms/issues) door bovenaan op **New issue** te klikken en zo veel mogelijk details te geven (inclusief de cursusback-up zelf als deze niet vertrouwelijk is).

---

## Controleren van afhankelijkheden bij cursusback-up en -herstel (september 2026)

Recente correcties in de cursusback-up van Chamilo en de Moodle-compatibele MBZ-import/export verbeteren het herstel van **gerelateerde bronnen**, niet alleen de lijst met activiteiten. Controleer bij het testen van een back-up heen en terug zowel de geïmporteerde inhoud als de koppelingen tussen bronnen:

1. **Oefeningen:** Open herstelde quizzen en controleer of de vragen die door de quiz worden gebruikt aanwezig zijn en in de verwachte volgorde staan. Het exportproces houdt nu rekening met afhankelijkheden tussen quiz en vragen, in plaats van ervan uit te gaan dat elke gerefereerde vraag onafhankelijk is geselecteerd ([PR #9114](https://github.com/chamilo/chamilo-lms/pull/9114)).
2. **Documenten en video's in leerpaden:** Speel het herstelde leerpad af en open de stappen met documenten, HTML en video. Bronverwijzingen worden vergeleken met de geïmporteerde bronnen; een leerpad kan verwijzen naar een document dat niet in de gewone selectie van cursusdocumenten stond ([PR #9114](https://github.com/chamilo/chamilo-lms/pull/9114)).
3. **Volgorde van het laatste item:** Als het oorspronkelijke leerpad een afsluitend **Laatste item** heeft (bijvoorbeeld een afsluitende pagina met certificaatinformatie), controleer dan of dit **na de gewone stappen** blijft staan. Archieven van verouderde inhoud kunnen de laatste stap met een verouderde positie coderen; de export-/importstroom normaliseert die positie ([PR #9121](https://github.com/chamilo/chamilo-lms/pull/9121)).
4. **Forum- en Gradebook-verwijzingen:** Open herstelde forumdiscussies en berichten en controleer vervolgens de items in **Beoordelingen (Gradebook)** die gekoppeld zijn aan forumthreads of deelname. De herstelde koppelingen moeten naar de **doelthread** wijzen, niet naar een identificatie van de broncursus. Dit is verbeterd in de MBZ-forumimporteur ([PR #9143](https://github.com/chamilo/chamilo-lms/pull/9143)).
5. **Voorwaarden en afbeeldingen:** Controleer eventuele voorwaarden van het leerpad en verifieer dat afbeeldingsbestanden als afbeeldingen worden weergegeven en niet ten onrechte als HTML worden herkend. Importcorrecties behandelen het opnieuw toewijzen van ID's en de classificatie van documenten. Een afzonderlijke migratie herstelt geselecteerde **meegeleverde democursussen**; ga er niet van uit dat deze willekeurige aangepaste cursussen automatisch herstelt ([PR #9137](https://github.com/chamilo/chamilo-lms/pull/9137)).

**Aanbevolen verificatie:** Exporteer een representatieve cursus, bewaar het oorspronkelijke archief, herstel het in een **afzonderlijke testcursus** en vergelijk oefenvragen, navigatie in het leerpad, het gedrag van voorwaarden, forumdiscussies en gekoppelde Gradebook-bronnen. Overschrijf geen productiecursus om de overdraagbaarheid te testen. Interne ID's van bron en bestemming kunnen legitiem verschillen; beoordeel het resultaat aan de hand van de herstelde bron en de werkende koppelingen. Moodle-import dekt nog steeds niet elk activiteitstype, dus controleer niet-ondersteunde items handmatig en meld een reproduceerbaar geval van een ontbrekende bron met een **opgeschoond** testarchief.

## Tips

* **Regelmatige back-ups** — Moedig docenten aan om hun cursussen periodiek te exporteren als back-up
* **Importen testen** — Test bij het importeren van inhoud van een ander platform de import eerst in een proefcursus om te controleren of alles correct is overgezet
* **Overdraagbaarheid van inhoud** — Gebruik het Common Cartridge-formaat wanneer u inhoud wilt delen met andere LMS-platforms