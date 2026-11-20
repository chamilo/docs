# AI Toolbox

De **AI Toolbox** is een cursustool die interactieve educatieve toepassingen genereert op basis van de instructies van een docent. Chamilo verpakt elke gegenereerde toepassing als **SCORM 1.2**, zodat de voortgang, de score en de hervattingsgegevens van de cursist door het platform worden bijgehouden.

> De beheerder moet zowel `ai_helpers.enable_ai_helpers` als `ai_helpers.toolbox` inschakelen onder **Beheer > Configuratie-instellingen > AI-helpers**, en er moet ten minste één tekst-AI-provider zijn geconfigureerd.

## Een interactieve toepassing maken

1. Open **AI Toolbox** in de cursus.
2. Klik op **Maken**.
3. Voer een **Titel** in en eventueel een **Beschrijving**.
4. Beschrijf bij **Wat moet de toepassing doen?** de volledige activiteit die u wilt. Vermeld het leerdoel, de regels, de niveaus, de scoring en wat er moet gebeuren wanneer de cursist klaar is.
5. Kies de **AI-provider** wanneer er meer dan één beschikbaar is.
6. Klik op **Genereren**.

De eerste generatie wordt opgeslagen als **versie 1**. Deze begint als concept, zodat u een voorbeeld kunt bekijken voordat u deze zichtbaar maakt voor cursisten.

## Verbeteren en versiebeheer

Open de **Instellingen** van een toepassing om deze te beheren. U kunt:

* een voorbeeld van de huidige toepassing bekijken of deze downloaden;
* **Verbeteren met AI** gebruiken om een wijziging te beschrijven en een nieuwe versie te genereren;
* de **Versiegeschiedenis** bekijken;
* een eerdere versie bekijken, downloaden of herstellen;
* de toepassing publiceren of verbergen;
* **Rapportage** openen om de tracking van cursisten te bekijken.

Het genereren van een verbetering verwijdert eerdere versies niet. Het herstellen van een eerdere versie maakt die versie opnieuw de huidige versie.

## Een toepassing toevoegen aan een leerpad

In de [Leerpadbouwer](../adding-content/learning-paths.md) kunnen docenten een gegenereerde AI Toolbox-toepassing als bron selecteren. De toepassing moet een gegenereerde versie hebben, maar hoeft niet te zijn gepubliceerd voordat de docent deze aan het leerpad toevoegt. Een niet-gepubliceerde toepassing is pas beschikbaar voor cursisten nadat deze is gepubliceerd.

Wanneer een bevoegde docent de Toolbox-inhoud opent in de **Voorbeeldmodus**, toont Chamilo **“Voortgang en score worden niet opgeslagen in de voorbeeldmodus.”** Het op deze manier testen van de activiteit maakt geen tracking van cursisten aan en werkt geen score bij. Gebruik de normale cursistervaring om de SCORM-voortgang en scores na publicatie te controleren.

## Validatie van generatie en probleemoplossing

Na AI-generatie controleert Chamilo de bron van de gegenereerde toepassing voordat een versie beschikbaar wordt gemaakt. Dit omvat controles op de syntaxis of structuur van JavaScript en beperkingen op onveilige browser-API's. Als de validatie mislukt, vraagt Chamilo de AI-provider om **het resultaat eenmaal te herstellen**; als de herstelde versie nog steeds mislukt, stopt de generatie met een fout. Een geslaagde validatie is geen vervanging voor het testen van de leerregels, de toegankelijkheid en de SCORM-scoring van de activiteit vóór publicatie.

Als de generatie **HTTP 504** meldt, is de webserver of gateway gestopt met wachten op het verzoek. Dit verschilt van een time-out die door de AI-tekstprovider wordt opgelegd. De fout kan de geschatte verstreken tijd bevatten; probeer een eenvoudiger activiteitsverzoek en vraag de beheerder de time-outs van de gateway, PHP/webserver en provider te controleren. Bij een time-out of rate-limitfout van de provider moeten in plaats daarvan het geconfigureerde model en de providerinstellingen worden gecontroleerd. Ga er niet van uit dat de toepassing na een fout succesvol is opgeslagen.

Deze validatie- en diagnostische verbeteringen zijn geïntroduceerd in [PR #9198](https://github.com/chamilo/chamilo-lms/pull/9198).

## Cursistervaring

Cursisten zien alleen toepassingen die zijn gepubliceerd. Vanuit de Toolbox kunnen zij een toepassing openen, verdergaan vanaf hun laatste SCORM-status en hun **Voortgang** en **Score** bekijken. Wanneer een nieuwe poging is toegestaan, start **Opnieuw proberen** een nieuwe poging.

Toolbox-toepassingen draaien binnen de leerpadruntime in een beperkt iframe en rapporteren hun SCORM-status terug aan Chamilo. Ze worden beheerd vanuit de Toolbox en niet vanuit de normale lijst met leerpaden.

Bevoegde MCP-clients kunnen ook Toolbox-toepassingen maken of bijwerken wanneer dezelfde AI Toolbox-instellingen zijn ingeschakeld.