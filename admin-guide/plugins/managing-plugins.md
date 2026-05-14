# Beheer van Plugins

## Toegang tot de Pluginbeheerder

![De pluginbeheerder toont een lijst met beschikbare plugins met activeringsknoppen en configuratie-opties](/.gitbook/assets/admin-plugin-manager.png)

Klik vanuit het beheerderspaneel op **Plugins beheren** om de lijst met beschikbare plugins te bekijken.

## Status van Plugins

Elke plugin heeft een van de volgende twee statussen:

* **Actief** — De plugin is ingeschakeld en de functies zijn beschikbaar op het platform
* **Inactief** — De plugin is geïnstalleerd maar uitgeschakeld

## Een Plugin Activeren

1. Zoek de plugin in de lijst
2. Klik op **Installeren**, vervolgens op **Inschakelen** of schakel deze in via de toggle
3. Configureer de plugin-instellingen (indien van toepassing, zoek de knop **Configureren**)
4. Sla op
5. Indien aanbevolen in de README, schakel de plugin in voor een specifieke **regio**

Sommige plugins voegen tools toe aan cursussen, nieuwe pagina's aan het platform, of extra functionaliteit aan bestaande functies.

## Een Plugin Configureren

Veel plugins hebben configuratie-opties. Na het activeren van een plugin:

1. Klik op de knop **Configureren** naast de plugin
2. Vul de vereiste configuratie in (API-sleutels, URL's, opties, enz.)
3. Sla op

## Een Plugin Deactiveren

1. Zoek de plugin in de lijst
2. Klik op **Uitschakelen** of schakel deze uit via de toggle
3. De functies van de plugin worden onmiddellijk van het platform verwijderd, maar de plugin blijft geïnstalleerd en behoudt zijn configuratie totdat je deze **Verwijdert**

Het uitschakelen van een plugin verwijdert de gegevens niet. Als je de plugin later weer inschakelt, zijn de gegevens nog steeds beschikbaar.

## Tips

* **Activeer alleen wat je nodig hebt** — Elke actieve plugin voegt enige overhead toe. Houd ongebruikte plugins gedeactiveerd.
* **Test vóór productie** — Activeer nieuwe plugins eerst in een testomgeving
* **Controleer compatibiliteit** — Na het upgraden van Chamilo, controleer of alle actieve plugins nog steeds correct werken