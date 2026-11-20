# Enquêtesjablonen

Beheerders kunnen herbruikbare enquêtevragenlijsten samenstellen en deze aan docenten aanbieden of rechtstreeks toewijzen aan cursussen en sessies. Deze functionaliteit is geïmplementeerd in [PR #9208](https://github.com/chamilo/chamilo-lms/pull/9208) voor [issue #8760](https://github.com/chamilo/chamilo-lms/issues/8760).

## Sjablonen aanmaken en onderhouden

1. Open in het beheerpaneel **Enquêtesjablonen** en kies **Aanmaken**.
2. Voer een titel en een optionele ondertitel in; configureer anonimiteit, vraagindeling, willekeurige volgorde, duur, introductietekst en bedanktekst.
3. Sla op en voeg herbruikbare vragen toe of bewerk ze in de vraageditor van het sjabloon.
4. Schakel **Zichtbaar als sjabloon** in als docenten het moeten kunnen zien en hergebruiken. Een onzichtbaar sjabloon blijft beschikbaar voor de beheerder.

Sjablonen behoren tot de huidige toegangs-URL. Alleen platformbeheerders mogen het hoofdsjabloon aanmaken, bewerken of verwijderen. Docenten kunnen zichtbare sjablonen gebruiken, maar kunnen de hoofddefinitie ervan niet wijzigen.

## Een sjabloon hergebruiken in een cursus of sessie

In een geautoriseerde cursus of sessie kan een docent een zichtbaar sjabloon kiezen bij het aanmaken van een nieuwe enquête. Het resultaat is een enquête in die cursuscontext, geen wijziging van het herbruikbare hoofdsjabloon. De docent kan de vragen controleren en de gebruikelijke workflow voor publicatie en uitnodiging volgen.

Vanuit de sjabloonlijst in het beheer kan een beheerder in plaats daarvan een sjabloon rechtstreeks toewijzen aan een geselecteerde **cursus** en, optioneel, aan een van de **sessies** van die cursus. Chamilo controleert of de cursus tot het huidige portaal behoort en of de geselecteerde sessie de cursus daadwerkelijk bevat. De docenteninterface kan niet worden gebruikt om een sjabloon toe te wijzen aan de cursus of sessie van iemand anders.

De nieuwe enquête wordt niet automatisch gepubliceerd alleen omdat ze vanuit een sjabloon is aangemaakt; controleer ze voordat u deelnemers uitnodigt. Zie [Enquêtes](../teacher-guide/assessing-learners/surveys.md) voor de standaardworkflow voor enquêtes.

## Gevoelige resultaten verbergen voor docenten of tutors

Bij het bewerken van een daadwerkelijke enquête kan een platformbeheerder **Resultaten verborgen voor docent/tutor** inschakelen. Deze beperking per enquête is bedoeld voor gevoelige vragenlijsten, zoals evaluaties van onderwijzend personeel. Docenten en tutors kunnen nog steeds het aantal antwoorden bekijken en herinneringen versturen, maar **kunnen rapportageweergaven niet openen of de resultaten exporteren**. Platformbeheerders behouden toegang tot de rapportage, onder voorbehoud van andere platforminstellingen.

Deze optie verschilt van het normale veld **Zichtbaarheid van resultaten** en van de platformbrede instelling **Knop voor enquêterapportage verbergen**. Alleen een beheerder kan de vlag voor beperkte resultaten wijzigen.

## Machtigingen en bereik

* **Beheerder:** sjablonen beheren, sjabloonzichtbaarheid instellen, toewijzen aan in aanmerking komende cursussen/sessies en de toegang tot beperkte resultaten beheren.
* **Docent / sessiedocent:** alleen zichtbare sjablonen zien en instantiëren binnen hun geautoriseerde cursuscontext.
* **Toegangs-URL's:** de sjablooncatalogus en de toewijzing handhaven de huidige toegangs-URL; sjablonen van andere portalen kunnen niet over de grens heen worden geïnstantieerd.

Als sjablonen niet voor docenten verschijnen, controleer dan **Zichtbaar als sjabloon** en hun cursus-/sessiecontext. Als een sjabloon niet kan worden geïnstantieerd, controleer dan de globale beperkingen voor het aanmaken van enquêtes en de beoogde doelcursus/-sessie.