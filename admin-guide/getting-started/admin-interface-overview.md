# Overzicht van de Beheerdersinterface

Het beheerderspaneel is uw controlecentrum voor het beheren van het Chamilo-platform. U krijgt toegang door te klikken op **Beheer** <img src="/.gitbook/assets/icons/mdi-cogs.svg" alt="Beheer" data-size="line"> in de zijbalk.

## Beheerdersdashboard

![Het beheerdersdashboard met functionele blokken voor Gebruikers, Cursussen, Sessies en Instellingen](/.gitbook/assets/admin-dashboard-overview.png)

Het beheerdersdashboard is georganiseerd in functionele blokken. Elk blok groepeert gerelateerde beheertools:

### Gebruikers

* **Gebruikerslijst** — Bekijk, zoek, bewerk en beheer alle gebruikers op het platform
* **Gebruiker toevoegen** — Maak individuele gebruikersaccounts aan
* **Gebruikersgroepen** — Beheer groepen gebruikers voor organisatorische doeleinden
* **Klassen** — Beheer gebruikersklassen voor bulkinschrijving in sessies

### Cursussen

* **Cursuslijst** — Bekijk en beheer alle cursussen op het platform
* **Cursus aanmaken** — Maak een nieuwe cursus aan
* **Cursuscategorieën** — Organiseer cursussen in categorieën voor de catalogus

### Sessies

* **Sessielijst** — Bekijk en beheer trainingssessies
* **Sessie aanmaken** — Stel een nieuwe sessie in met cursussen en inschrijvingen
* **Sessiecategorieën** — Organiseer sessies in categorieën
* **Carrières en promoties** — Beheer loopbaanpaden en promotieworkflows

### Platforminstellingen

* **Configuratie-instellingen** — Toegang tot het uitgebreide instellingenpaneel van het platform met categorieën voor portaal, cursussen, sessies, gebruikers, beveiliging en meer

### Plugins

* **Plugins beheren** — Installeer, activeer, configureer en deactiveer platformplugins

### Systeem

* **Systeemstatus** — Controleer de PHP-configuratie, databasestatus en servergezondheid
* **Archiefopruiming** — Beheer tijdelijke bestanden en caches

### Branding

* **Kleuren** — Pas het visuele uiterlijk van het platform aan
* **Portaalaanpassing** — Configureer de startpagina van het portaal, nieuws en brandingelementen

Elk onderdeel wordt in detail behandeld in het bijbehorende hoofdstuk van deze handleiding.

Authenticatiemethoden zoals OAuth2, LDAP, CAS en andere externe authenticatieproviders worden niet geconfigureerd in het beheerdersdashboard, maar in `config/authentication.yaml`.