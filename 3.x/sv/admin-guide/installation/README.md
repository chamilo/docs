# Installation

Detta avsnitt täcker allt du behöver för att installera och konfigurera Chamilo 3.0 på din server.

Chamilo 3.0 är en PHP-applikation byggd på Symfony-ramverket. Den kan köras på de flesta Linux-baserade servrar, har installerats och körs på Windows Server med IIS, och stöder MySQL- och MariaDB-backends.

## Installation Steps

1. **[Serverkrav](server-requirements.md)** — Kontrollera att din server uppfyller minimikraven
2. **[Installationsguiden](installation-wizard.md)** — Kör den webbaserade installationsguiden
3. **[Konfiguration](configuration.md)** — Konfigurera miljövariabler och Symfony-inställningar
4. **[Molnlagring](cloud-storage.md)** — Konfigurera molnlagringsbackends (valfritt)
5. **[E-postkonfiguration](email-configuration.md)** — Konfigurera e-postleverans
6. **[Uppgradering](upgrading.md)** — Uppgradera från en tidigare version

## Quick Overview

Den grundläggande installationsprocessen är:

1. Ladda ner eller klona Chamilo-källkoden
2. Installera PHP-beroenden med Composer om du förbereder från källkod
3. Installera JavaScript-beroenden med npm/yarn och bygg frontend-tillgångar
4. Skapa en tom `.env`-fil för att senare lagra dina databasuppgifter och andra inställningar
5. Ändra behörigheter (skrivbar av webbservern) på *var/*, *config/* och *.env*
6. Kör den webbaserade installationsguiden
7. Anslut med ditt första administratörskonto
8. Ändra tillbaka behörigheterna på *config/* och *.env*

Detaljerade instruktioner för varje steg finns på sidorna som länkas ovan.