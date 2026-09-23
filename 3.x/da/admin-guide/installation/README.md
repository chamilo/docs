# Installation

Dette afsnit dækker alt, du skal bruge for at installere og konfigurere Chamilo 3.0 på din server.

Chamilo 3.0 er en PHP-applikation bygget på Symfony-frameworket. Den kan køre på de fleste Linux-baserede servere, er blevet installeret og kører på Windows Server med IIS, og understøtter MySQL- og MariaDB-backends.

## Installation Steps

1. **[Serverkrav](server-requirements.md)** — Kontrollér, at din server opfylder minimumskravene
2. **[Installationsguide](installation-wizard.md)** — Kør den webbaserede installationsguide
3. **[Konfiguration](configuration.md)** — Konfigurér miljøvariabler og Symfony-indstillinger
4. **[Cloud Storage](cloud-storage.md)** — Opsæt cloud storage-backends (valgfrit)
5. **[E-mailkonfiguration](email-configuration.md)** — Konfigurér e-maillevering
6. **[Opgradering](upgrading.md)** — Opgradér fra en tidligere version

## Quick Overview

Den grundlæggende installationsproces er:

1. Download eller klon Chamilo-kildekoden
2. Installér PHP-afhængigheder med Composer, hvis du forbereder fra kildekode
3. Installér JavaScript-afhængigheder med npm/yarn, og byg frontend-assets
4. Opret en tom `.env`-fil til at gemme dine databaseoplysninger og andre indstillinger senere
5. Ændr tilladelser (skrivbar for webserveren) på *var/*, *config/* og *.env*
6. Kør den webbaserede installationsguide
7. Log ind med din første administratorkonto
8. Ændr tilladelserne tilbage på *config/* og *.env*

Detaljerede instruktioner for hvert trin findes på de sider, der er linket til ovenfor.