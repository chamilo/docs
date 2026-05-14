# Installatie

Deze sectie behandelt alles wat u nodig heeft om Chamilo 2.0 op uw server te installeren en te configureren.

Chamilo 2.0 is een PHP-applicatie gebouwd op het Symfony-framework. Het kan draaien op de meeste Linux-gebaseerde servers, is geïnstalleerd en werkt op Windows Server met IIS, en ondersteunt MySQL- en MariaDB-backends.

## Installatiestappen

1. **[Serververeisten](server-requirements.md)** — Controleer of uw server voldoet aan de minimale vereisten
2. **[Installatiewizard](installation-wizard.md)** — Voer de webgebaseerde installatiewizard uit
3. **[Configuratie](configuration.md)** — Configureer omgevingsvariabelen en Symfony-instellingen
4. **[Cloudopslag](cloud-storage.md)** — Stel cloudopslag-backends in (optioneel)
5. **[E-mailconfiguratie](email-configuration.md)** — Configureer e-mailbezorging
6. **[Upgraden](upgrading.md)** — Upgrade vanaf een eerdere versie

## Snel Overzicht

Het basisinstallatieproces is als volgt:

1. Download of kloon de Chamilo-broncode
2. Installeer PHP-afhankelijkheden met Composer als u vanaf de bron voorbereidt
3. Installeer JavaScript-afhankelijkheden met npm/yarn en bouw frontend-assets
4. Maak een leeg `.env`-bestand aan om later uw databasegegevens en andere instellingen op te slaan
5. Wijzig de rechten (beschrijfbaar door de webserver) op *var/*, *config/* en *.env*
6. Voer de webgebaseerde installatiewizard uit
7. Maak verbinding met uw eerste beheerdersaccount
8. Wijzig de rechten terug op *config/* en *.env*

Gedetailleerde instructies voor elke stap vindt u in de bovenstaande gelinkte pagina's.