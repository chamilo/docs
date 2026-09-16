# Cursus importeren en exporteren

Chamilo ondersteunt het importeren en exporteren van cursussen voor back-up, migratie en het delen van inhoud.

Deze functies bevinden zich in de cursus, in de tool **Onderhoud** onder het tandwielpictogram bovenaan de startpagina van de cursus.

## Een cursus exporteren

Docenten kunnen hun eigen cursussen exporteren vanuit de tool Onderhoud van de cursus. Als beheerder kunt u elke cursus exporteren:

1. Ga de cursus binnen
2. Open de tool **Cursusonderhoud**
3. Selecteer **Een back-up maken**
4. Kies wat u wilt opnemen (inhoud, gebruikersgegevens, enz.)
5. Download het exportbestand

De export maakt een pakket aan dat de documenten, oefeningen, forums, leerpaden en configuratie van de cursus bevat.

## Een cursus importeren

Om een cursus te importeren vanuit een Chamilo-exportbestand:

1. Ga de cursus binnen
2. Open de tool **Cursusonderhoud**
3. Upload in de sectie **Back-up importeren** het exportbestand
4. Kies wat u wilt opnemen (inhoud, gebruikersgegevens, enz.)
5. Configureer de importopties:
   * Of bestaande inhoud moet worden overschreven
   * Of gebruikersgegevens moeten worden opgenomen
6. Voer de import uit

## Een cursus kopiëren

Om de inhoud van een andere cursus naar uw cursus te kopiëren, hebt u eerst een broncursus en een doelcursus nodig.

1. Ga de doelcursus binnen
2. Open de tool **Cursusonderhoud**
3. Selecteer in de sectie **Cursus kopiëren** de **Bron**cursus
4. Bevestig de opties
5. Klik op **Doorgaan** en volg de instructies

## Common Cartridge

Chamilo ondersteunt de standaard **IMS Common Cartridge 1.3** (IMS CC 1.3) voor interoperabiliteit met andere leerbeheersystemen. U kunt:

* Common Cartridge-pakketten (.imscc-bestanden) **importeren**
* Cursusinhoud in Common Cartridge-formaat **exporteren**

Dit maakt inhoudsuitwisseling mogelijk met andere platformen die de Common Cartridge-standaard ondersteunen (Moodle, Canvas, Blackboard, enz.).

## Een cursus recyclen

De functie voor het recyclen van een cursus laat u eenvoudig de schil van de cursus behouden, maar de inhoud wissen.

## Een cursus verwijderen

Dit wist uw cursus volledig, inclusief alle inhoud en de gebruikersactiviteit daarin.

Om een cursus definitief te verwijderen:

1. Ga de doelcursus binnen
2. Open de tool **Cursusonderhoud**
3. Voer in de sectie **Deze cursus volledig verwijderen** de code van de cursus handmatig in om uw intentie te bevestigen
4. Bevestig

U wordt vervolgens doorgestuurd naar de startpagina van het portaal, omdat de cursus niet meer bestaat.

## Moodle-import

Chamilo kan cursusback-ups van **Moodle** importeren. De importeur zet de inhoudsstructuur van Moodle om naar het formaat van Chamilo, inclusief toetsen, documenten en cursusinstellingen.

> **Werk in uitvoering.** Hoewel het al een brede basis dekt, dekt de Moodle-importeur momenteel niet elk Moodle-activiteitstype en inhoudsformaat. Behandel het als een startpunt dat na afronding van de import mogelijk nog handmatige aanpassing vereist. Als u een falend of ontbrekend element in de import of export ontdekt, meld dit dan via onze [Github-ruimte](https://github.com/chamilo/chamilo-lms/issues) door bovenaan op **New issue** te klikken en zoveel mogelijk details te geven (inclusief de cursusback-up zelf als die niet vertrouwelijk is).

## Tips

* **Regelmatige back-ups** — Moedig docenten aan om hun cursussen periodiek te exporteren als back-up
* **Import testen** — Test bij het importeren van inhoud van een ander platform de import eerst in een proefcursus om te controleren of alles correct is overgezet
* **Overdraagbaarheid van inhoud** — Gebruik het Common Cartridge-formaat wanneer u inhoud moet delen met andere LMS-platformen