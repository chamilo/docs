# Overzicht van de beheerinterface

Het beheerpaneel is uw commandocentrum voor het beheren van het Chamilo-platform. Open het door in de zijbalk op **Beheer** <img src="../../.gitbook/assets/icons/mdi-cogs.svg" alt="Beheer" data-size="line"> te klikken.

## Beheerdashboard

![Het beheerdashboard met functionele blokken voor Gebruikers, Cursussen, Sessies en Instellingen](../../.gitbook/assets/admin-dashboard-overview.png)

Het beheerdashboard is ingedeeld in functionele blokken. Elk blok groepeert gerelateerde beheerhulpmiddelen:

### Gebruikers

* **Gebruikerslijst** — Alle gebruikers op het platform bekijken, zoeken, bewerken en beheren
* **Gebruiker toevoegen** — Individuele gebruikersaccounts aanmaken
* **Klassen** — Gebruikersklassen beheren voor bulkinschrijving in sessies

Zie het hoofdstuk [Gebruikers](../users/README.md) voor details.

### Cursussen

* **Cursuslijst** — Alle cursussen op het platform bekijken en beheren
* **Cursus aanmaken** — Een nieuwe cursus aanmaken
* **Cursuscategorieën** — Cursussen indelen in categorieën voor de catalogus

Zie het hoofdstuk [Cursussen](../courses/README.md) voor details.

### Sessies

* **Sessielijst** — Trainingssessies bekijken en beheren
* **Sessie aanmaken** — Een nieuwe sessie opzetten met cursussen en inschrijving
* **Sessiecategorieën** — Sessies indelen in categorieën
* **Loopbanen en promoties** — Loopbaantrajecten en promotieworkflows beheren

Zie het hoofdstuk [Sessies](../sessions/README.md) voor details.

### Platform

* **Configuratie-instellingen**, **Talen**, **Portaalnieuws**, **Globale agenda**, **Pagina's**, **Extra velden**, **E-mailsjablonen**, **Contactformuliercategorieën** en meer — zie het hoofdstuk [Platform](../platform/README.md) voor details. De koppeling "Configuratie-instellingen" is het toegangspunt tot het afzonderlijke hoofdstuk [Platforminstellingen](../platform-settings/README.md).

### Analyse

* **Globale statistieken**, **Rapportencatalogus**, **Leeranalyse**, **Kwartaalrapport**, **Tijdsrapport van docenten**, **Bedrijfsrapport**, **Speciale exports**, **Tickets** — Platformstatistieken en rapportage; zie het hoofdstuk [Analyse](../analytics/README.md) voor details

### Vaardigheden

* **Vaardighedenwiel**, **Vaardigheden importeren**, **Vaardigheden beheren**, **Vaardigheidsniveaus beheren**, **Vaardighedenrangschikking**, **Vaardigheden en beoordelingen** — Competentiebadges gekoppeld aan resultaten in het cijferboek; zie het hoofdstuk [Vaardigheden](../skills/README.md) voor details

### Systeem

* **Tijdelijke bestanden opschonen**, **Systeemstatus**, **Systeemupdate**, **Kleuren**, **Bestandsinfo**, **Bronnen per type**, **Pictogrammen weergeven** — Serveronderhoud, zelfupdate en huisstijl; zie het hoofdstuk [Systeem](../system/README.md) voor details

### Ruimtes

* **Vestigingen**, **Ruimtes**, **Zoeker naar beschikbaarheid van ruimtes** — Fysieke locaties en reserveerbare trainingsruimtes; zie het hoofdstuk [Ruimtes](../rooms/README.md) voor details

### Beveiliging

* **Activiteitencontrole**, **Aanmeldpogingen**, **Simple IDS**, **Wachtwoordsterktecontrole**, **Bestandsintegriteit** — Hulpmiddelen voor beveiligingsmonitoring en auditing; zie het hoofdstuk [Beveiliging](../security/README.md) voor details

### Plugins

* Snelkoppelingen naar geïnstalleerde plugins die een beheerpagina in het menu declareren, plus algemeen pluginbeheer — zie het hoofdstuk [Plugins](../plugins/README.md) voor details

### Gezondheidscontrole

* Live controles met geslaagd/mislukt (e-mailinstellingen, toewijzing van de beheer-URL, bestandsrechten) — zie de pagina [Gezondheidscontrole](../health-check.md) voor details

### Overige blokken

* **Chamilo.org**, **Versiecontrole**, **Professionele ondersteuning**, **Nieuws van Chamilo** — koppelingen en statuspanelen die inhoud ophalen van het Chamilo-project; zie [Overige beheerblokken](../other-admin-blocks/README.md) voor details

Elke sectie wordt in detail behandeld in het bijbehorende hoofdstuk van deze handleiding.

Authenticatiemethoden zoals OAuth2, LDAP, CAS en andere externe authenticatieproviders worden niet geconfigureerd in het beheerdashboard, maar in `config/authentication.yaml`.