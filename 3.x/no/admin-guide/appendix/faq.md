# FAQ

Ofte stilte spørsmål for administratorer av Chamilo 3.0.

## Installasjon og oppsett

**Q: Hvilken PHP-versjon krever Chamilo 3.0?**
A: PHP 8.3, 8.4 eller 8.5. Se [Serverkrav](../installation/server-requirements.md).

**Q: Kan jeg kjøre Chamilo på delt hosting?**
A: Det er mulig, men ikke anbefalt. Chamilo 3.0 krever Composer, Node.js i utviklingsmodus og kommandolinjetilgang for installasjon og vedlikehold. En VPS eller dedikert server gir en mye bedre opplevelse.

**Q: Hvilken database bør jeg bruke?**
A: MySQL 8.0+ eller MariaDB 10.4+ er de mest brukte og best testede.

**Q: Kan jeg installere Chamilo uten kommandolinjen?**
A: Ja, hvis du bruker den pakkede versjonen (.zip eller .tar.gz). Ellers trenger du kommandolinjen for å installere Composer-avhengigheter, bygge frontend-ressurser og kjøre databasemigreringer. Den nettbaserte veiviseren håndterer databaseoppsett og innledende konfigurasjon, men de omkringliggende trinnene krever skalltilgang i utviklingsmodus.

## Brukere og autentisering

**Q: Hvordan tilbakestiller jeg en brukers passord?**
A: Gå til **Administrasjon > Brukerliste**, finn brukeren, klikk rediger og sett et nytt passord. Alternativt kan brukeren bruke lenken «Glemt passord» på innloggingssiden (hvis e-post er konfigurert).

**Q: Kan jeg importere brukere i bulk?**
A: Ja. Gå til **Administrasjon > Importer brukere** og last opp en CSV- eller XML-fil med brukerdata. Importen støtter oppretting av nye brukere og oppdatering av eksisterende.

**Q: Hvordan integrerer jeg med LDAP eller Active Directory?**
A: Konfigurer LDAP-innstillinger i autentiseringskonfigurasjonen. Se [LDAP](../authentication/ldap.md). Brukere synkroniseres ved innlogging eller via planlagt synkronisering.

**Q: Kan brukere tilhøre flere økter samtidig?**
A: Ja. Brukere kan være påmeldt et vilkårlig antall økter samtidig. Hver økt sporer fremdrift uavhengig.

## Kurs og innhold

**Q: Hvordan tar jeg sikkerhetskopi av et enkelt kurs?**
A: Inne i kurset, gå til **Vedlikehold > Opprett en sikkerhetskopi**. Dette genererer et nedlastbart arkiv av kursinnhold og innstillinger. Du kan gjenopprette det på samme eller en annen Chamilo-instans.

**Q: Kan jeg kopiere et kurs?**
A: Ja. Bruk **Administrasjon > Kopier kurs** eller kursvedlikeholdsverktøyet inne i kurset. Du kan kopiere innhold mellom kurs eller opprette et nytt kurs fra et eksisterende.

**Q: Hvilke SCORM-versjoner støttes?**
A: Chamilo støtter SCORM 1.2. SCORM-pakker importeres som læringsstier.

**Q: Hvordan begrenser jeg hvem som kan opprette kurs?**
A: Gå til **Administrasjon > Konfigurasjonsinnstillinger > Kurs** og deaktiver **Tillat ikke-administratorer (lærere) å opprette nye kurs** (`allow_users_to_create_courses`). Når dette er deaktivert, kan bare administratorer opprette kurs. Alternativt kan du sette en grense for hvor mange kurs en lærer kan opprette.

## Ytelse og vedlikehold

**Q: Plattformen er treg. Hva bør jeg sjekke først?**
A: I rekkefølge etter innvirkning: (1) Sørg for `APP_ENV=prod` og `APP_DEBUG=0` i `.env`. (2) Kontroller at PHP OPcache er aktivert. (3) Sjekk databaseytelse. (4) Se [Ytelsesjustering](../platform-settings/performance-tuning.md).

**Q: Hvordan tømmer jeg hurtigbufferen?**
A: Kjør `php bin/console cache:clear --env=prod` fra kommandolinjen. Ikke slett katalogen `var/cache/` manuelt mens applikasjonen kjører.

**Q: Hvor mye diskplass trenger Chamilo?**
A: Selve applikasjonen trenger omtrent 2 GB ukomprimert. Total plass avhenger av opplastet innhold (dokumenter, videoer, SCORM-pakker). Overvåk diskbruk og planlegg deretter.

**Q: Hvordan setter jeg opp automatiserte sikkerhetskopier?**
A: Se [Sikkerhetskopier](../maintenance/backups.md). Som et minimum, planlegg en daglig databasedump og jevnlige filnivå-sikkerhetskopier av opplastingskatalogen.

## E-post

**Q: Brukere mottar ikke e-post. Hva bør jeg sjekke?**
A: (1) Kontroller `MAILER_DSN` i `.env`. (2) Kjør `php bin/console mailer:test someone@example.com` for å teste. (3) Sjekk søppelpostmapper. (4) Kontroller SPF/DKIM DNS-poster. Se [E-postkonfigurasjon](../installation/email-configuration.md).

**Q: Kan jeg bruke Gmail til å sende e-post?**
A: Ja, for små plattformer eller utvikling. Bruk et app-passord og vær oppmerksom på Gmails daglige sendegrenser (500 e-poster/dag for vanlige kontoer).

## Sikkerhet

**Q: Hvordan tvinger jeg HTTPS?**
A: Konfigurer webserveren til å omdirigere HTTP til HTTPS. Aktiver i tillegg innstillingen «Tving HTTPS» i **Administrasjon > Konfigurasjonsinnstillinger > Sikkerhet**. Se [Sikkerhetsinnstillinger](../platform-settings/security-settings.md).

**Q: Hvordan blokkerer jeg brute-force-innloggingsangrep?**
A: Konfigurer maksimalt antall innloggingsforsøk og CAPTCHA i sikkerhetsinnstillingene. Vurder også å bruke fail2ban på servernivå for ekstra beskyttelse.

**Q: En bruker har glemt passordet, og e-post fungerer ikke. Hvordan hjelper jeg dem?**
A: Som administrator, rediger brukerkontoen direkte og sett et nytt passord. Gå til **Administrasjon > Brukerliste**, finn kontoen og oppdater passordfeltet.

## Oppgraderinger

**Q: Kan jeg oppgradere direkte fra Chamilo 2.x til 3.0?**
A: Ja, men det er en større migrering, ikke en enkel oppdatering. Se [Oppgradering](../installation/upgrading.md). Test alltid først på en staging-server.

**Q: Vil pluginene mine fungere etter oppgradering til 3.0?**
A: Nei. Pluginer fra 2.x er ikke kompatible med 3.0 og må skrives om eller erstattes med tilsvarende funksjonalitet i 3.0.