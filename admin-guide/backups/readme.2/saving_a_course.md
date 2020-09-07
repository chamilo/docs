# Een cursus opslaan

De platformbeheerder kan elke cursus opslaan vanuit (onder andere methoden) de administratieve interface.

1. Ga naar: «Administratie» → «Lijst met cursussen» :

![](../../../.gitbook/assets/images13%20%288%29.png)Afbeelding 18: Ade back-up. Klik op *Back-up genereren* .

1. Klik op het cd-pictogram om de cursus te exporteren.

![](../../../.gitbook/assets/graficos33%20%286%29.png) Afbeelding 19: Administratie - Lijst met cursussen - Back-up

1. Chamilo stelt dan voor om "Maak een back-up" of "Importeer back-upinformatie" van de back-up. Klik op *Back-up genereren* .

![](../../../.gitbook/assets/sauvegardecours_-backup%20%281%29.png) Afbeelding 20: Beheer - Back-up

1. U kunt kiezen tussen een volledige back-up en een specifieke selectie (afhankelijk van uw behoeften). Laten we voor het voorbeeld *Volledige* back-up kiezen.

![](../../../.gitbook/assets/sauvegardegenerer_-backup%20%283%29.png) Afbeelding 21: Beheer - Back-upinstellingen

1. De back-up wordt gegenereerd en u hoeft alleen maar op de zip-bestandknop te klikken om deze te downloaden.

![](../../../.gitbook/assets/sauvegardebackup_-ok%20%283%29.png) Afbeelding 22: Beheer - Back-up, resultaten van het genereren van back-ups

1. Door op de knop *Back-up genereren te* klikken, maakt Chamilo een back-upbestand dat standaard in de *map chamilo / archive terechtkomt* . U kunt het dus door directe toegang herstellen, maar dat betekent dat andere mensen er ook toegang toe hebben. Dit betekent dat je als admin allebei een normaal proces zou moeten hebben om deze directory op te schonen (we bieden er een aan in de *main / cron* directory maar je moet het uitvoeren) **en** dat je je configuratie moet instellen (via .htaccess of VirtualHost config ) om directe navigatie binnen de *hoofd- / archiefmap* te vermijden.

Er is ook een andere manier om back-ups te maken ...

Klik als admin of docent op het tabblad *Mijn cursussen* en vervolgens op een van de beschikbare cursussen. Dan is het mogelijk om op ongeveer dezelfde manier een backup te maken door op de *Onderhoudstool te* klikken.

![](../../../.gitbook/assets/administrationmaintenance%20%283%29.png) Afbeelding 23: Interface - Tools voor cursusbeheer

De interface is iets anders ...

![](../../../.gitbook/assets/proprietemaintenance%20%283%29.png) Afbeelding 24: Interface - Opties voor back-up van de cursus

Met de opties voor cursusback-up kunt u nog drie andere functies uitvoeren:

- **Met Cursuskopie** kunt u een cursus geheel of gedeeltelijk dupliceren naar een andere (bij voorkeur lege) cursus. De enige vereiste toestand hiervoor is om een eerste cursus te hebben met iets om te kopiëren, en een andere cursus die de elementen van de eerste niet bevat.
- **Met lege cursus** kunt u de hele inhoud van een cursus leegmaken. Stel dat u een nieuwe cursus wilt starten in dezelfde "shell" als de vorige ... klik gewoon op deze link en alle eerder gemaakte bronnen zijn verdwenen, zonder de kans om ze te herstellen. Voordat u dat doet, wilt u natuurlijk het cursuselement misschien herstellen via een *cursusback-up* .
- **Met Verwijderen** kunt u de hele cursus verwijderen, dit betekent ook dat u de lege schaal verwijdert. Een bevestiging is vereist, maar als het eenmaal is verwijderd, verwacht dan niet dat het ergens als veilige kopie beschikbaar is ...

**Note** : when opening the backup's .zip file, you will find a close similarity with the *Documents* tool documents hierarchy.

Ter informatie: het standaard .zip-bestand voor een cursus die oorspronkelijk met voorbeeldinhoud is gemaakt, weegt ongeveer 8,9 MB.

Het bevat :

- een intern structuurbestand met de naam course_info.dat
- een map genaamd *Document*
- een reeks bestanden en mappen met de cursusdocumenten, alles wat niet aan de gebruikers is gekoppeld (opdrachten en andere gebruikersgerelateerde zaken worden niet opgeslagen)

De *documentdirectory* heeft een structuur die lijkt op de structuur die wordt weergegeven in afbeelding 25, die de structuur van de documenttool reproduceert zoals weergegeven in afbeelding 26.

![](../../../.gitbook/assets/structuredoc%20%283%29.png) Afbeelding 25: Back-up - Structuur van back-upbestanden

![](../../../.gitbook/assets/graficos34%20%286%29.png) Afbeelding 26: Interface - Documentenlijst

Deze documenten zijn de standaardinhoud van de cursus.

Bovendien herstelt de back-up alleen documenten (afbeeldingen, video's, enz.) Die betrekking hebben op de cursus.
