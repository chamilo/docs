# Cursus importeren en exporteren

Chamilo ondersteunt het importeren en exporteren van cursussen voor back-up, migratie en het delen van inhoud.

Deze functies bevinden zich binnen de cursus, in de tool **Onderhoud** die te vinden is onder het tandwielpictogram bovenaan de cursusstartpagina.

## Een cursus exporteren

Docenten kunnen hun eigen cursussen exporteren via de tool voor cursusonderhoud. Als beheerder kunt u elke cursus exporteren:

1. Ga naar de cursus
2. Open de tool **Cursusonderhoud**
3. Selecteer **Een back-up maken**
4. Kies wat u wilt opnemen (inhoud, gebruikersgegevens, enz.)
5. Download het exportbestand

De export creëert een pakket met de documenten, oefeningen, forums, leerpaden en configuratie van de cursus.

## Een cursus importeren

Om een cursus te importeren vanuit een Chamilo-exportbestand:

1. Ga naar de cursus
2. Open de tool **Cursusonderhoud**
3. Upload het exportbestand in de sectie **Back-up importeren**
4. Kies wat u wilt opnemen (inhoud, gebruikersgegevens, enz.)
5. Configureer de importopties:
   * Of bestaande inhoud moet worden overschreven
   * Of gebruikersgegevens moeten worden opgenomen
6. Voer de import uit

## Een cursus kopiëren

Om de inhoud van een andere cursus naar uw cursus te kopiëren, moet u eerst een broncursus en een doelcursus hebben aangemaakt.

1. Ga naar de doelcursus
2. Open de tool **Cursusonderhoud**
3. Selecteer in de sectie **Cursus kopiëren** de **Bron**-cursus
4. Valideer de opties
5. Klik op **Doorgaan** en volg de instructies

## Common Cartridge

Chamilo ondersteunt de **IMS Common Cartridge 1.3** (IMS CC 1.3) standaard voor interoperabiliteit met andere leerbeheersystemen. U kunt:

* **Importeren** van Common Cartridge-pakketten (.imscc-bestanden)
* **Exporteren** van cursusinhoud in Common Cartridge-formaat

Dit maakt het mogelijk om inhoud uit te wisselen met andere platforms die de Common Cartridge-standaard ondersteunen (Moodle, Canvas, Blackboard, enz.).

## Een cursus recyclen

De functie voor het recyclen van een cursus stelt u in staat om de structuur van de cursus te behouden, maar de inhoud ervan te wissen.

## Een cursus verwijderen

Hiermee verwijdert u uw cursus volledig, inclusief alle inhoud en gebruikersactiviteit erin.

Om een cursus permanent te verwijderen:

1. Ga naar de doelcursus
2. Open de tool **Cursusonderhoud**
3. Voer in de sectie **Deze cursus volledig verwijderen** handmatig de code van de cursus in om uw intentie te bevestigen
4. Valideer

U wordt vervolgens doorgestuurd naar de startpagina van het portaal, omdat de cursus niet meer bestaat.

## Moodle-import

Chamilo kan cursusback-ups van **Moodle** importeren. De importfunctie converteert de inhoudsstructuur van Moodle naar het formaat van Chamilo, inclusief quizzes, documenten en cursusinstellingen.

> **Werk in uitvoering.** Hoewel het al een breed scala dekt, ondersteunt de Moodle-importfunctie momenteel niet elk type Moodle-activiteit en inhoudsformaat. Beschouw het als een startpunt dat mogelijk nog handmatige aanpassingen vereist na voltooiing van de import. Als u een ontbrekend of falend element opmerkt bij het importeren of exporteren, meld dit dan aan ons via onze [Github-ruimte](https://github.com/chamilo/chamilo-lms/issues) door bovenaan op **New issue** te klikken en zoveel mogelijk details te geven (inclusief de cursusback-up zelf als deze niet vertrouwelijk is).

## Tips

* **Regelmatige back-ups** — Moedig docenten aan om hun cursussen periodiek te exporteren als back-up
* **Testimports** — Bij het importeren van inhoud van een ander platform, test de import eerst in een proefcursus om te controleren of alles correct is overgedragen
* **Inhoudscompatibiliteit** — Gebruik het Common Cartridge-formaat wanneer u inhoud wilt delen met andere LMS-platforms