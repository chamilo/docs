# Installasjon

Denne delen dekker alt du trenger for å installere og konfigurere Chamilo 3.0 på serveren din.

Chamilo 3.0 er en PHP-applikasjon bygget på Symfony-rammeverket. Den kan kjøre på de fleste Linux-baserte servere, har blitt installert og kjører på Windows Server med IIS, og støtter MySQL- og MariaDB-backends.

## Installasjonstrinn

1. **[Serverkrav](server-requirements.md)** — Kontroller at serveren oppfyller minimumskravene
2. **[Installasjonsveiviser](installation-wizard.md)** — Kjør den nettbaserte installasjonsveiviseren
3. **[Konfigurasjon](configuration.md)** — Konfigurer miljøvariabler og Symfony-innstillinger
4. **[Skylagring](cloud-storage.md)** — Sett opp skylagringsbackends (valgfritt)
5. **[E-postkonfigurasjon](email-configuration.md)** — Konfigurer e-postlevering
6. **[Oppgradering](upgrading.md)** — Oppgrader fra en tidligere versjon

## Rask oversikt

Den grunnleggende installasjonsprosessen er:

1. Last ned eller klon Chamilo-kildekoden
2. Installer PHP-avhengigheter med Composer hvis du forbereder fra kildekode
3. Installer JavaScript-avhengigheter med npm/yarn og bygg frontend-ressurser
4. Opprett en tom `.env`-fil for å lagre databaselegitimasjon og andre innstillinger senere
5. Endre tillatelser (skrivbare for webserveren) på *var/*, *config/* og *.env*
6. Kjør den nettbaserte installasjonsveiviseren
7. Logg inn med din første administratorkonto
8. Endre tillatelsene tilbake på *config/* og *.env*

Detaljerte instruksjoner for hvert trinn finner du på sidene som er lenket over.