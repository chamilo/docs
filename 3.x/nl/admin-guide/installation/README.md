# Installatie

Deze sectie behandelt alles wat u nodig hebt om Chamilo 3.0 op uw server te installeren en te configureren.

Chamilo 3.0 is een PHP-toepassing gebouwd op het Symfony-framework. Het kan draaien op de meeste Linux-gebaseerde servers, is geïnstalleerd en draait op Windows Server met IIS, en ondersteunt MySQL- en MariaDB-backends.

## Installatiestappen

1. **[Serververeisten](server-requirements.md)** — Controleer of uw server voldoet aan de minimale vereisten
2. **[Installatiewizard](installation-wizard.md)** — Voer de webbased installatiewizard uit
3. **[Configuratie](configuration.md)** — Configureer omgevingsvariabelen en Symfony-instellingen
4. **[Cloudopslag](cloud-storage.md)** — Stel cloudopslag-backends in (optioneel)
5. **[E-mailconfiguratie](email-configuration.md)** — Configureer e-mailbezorging
6. **[Upgraden](upgrading.md)** — Upgrade vanaf een vorige versie

## Kort overzicht

Het basisinstallatieproces is:

1. Download of clone de Chamilo-broncode
2. Installeer PHP-afhankelijkheden met Composer indien u vanuit de broncode voorbereidt
3. Installeer JavaScript-afhankelijkheden met npm/yarn en bouw frontend-assets
4. Maak een leeg `.env`-bestand aan om later uw databasegegevens en andere instellingen in op te slaan
5. Wijzig de rechten (beschrijfbaar door de webserver) op *var/*, *config/* en *.env*
6. Voer de webbased installatiewizard uit
7. Verbind met uw eerste beheerdersaccount
8. Zet de rechten op *config/* en *.env* weer terug

Gedetailleerde instructies voor elke stap staan op de hierboven gekoppelde pagina's.