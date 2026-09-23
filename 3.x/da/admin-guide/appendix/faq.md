# FAQ

Ofte stillede spørgsmål for administratorer af Chamilo 3.0.

## Installation og opsætning

**Q: Hvilken PHP-version kræver Chamilo 3.0?**
A: PHP 8.3, 8.4 eller 8.5. Se [Serverkrav](../installation/server-requirements.md).

**Q: Kan jeg køre Chamilo på delt hosting?**
A: Det er muligt, men ikke anbefalet. Chamilo 3.0 kræver Composer, Node.js i udviklingsmodus og kommandolinjeadgang til installation og vedligeholdelse. En VPS eller en dedikeret server giver en langt bedre oplevelse.

**Q: Hvilken database skal jeg bruge?**
A: MySQL 8.0+ eller MariaDB 10.4+ er de mest anvendte og bedst testede.

**Q: Kan jeg installere Chamilo uden kommandolinjen?**
A: Ja, hvis du bruger den pakkede version (.zip eller .tar.gz). Ellers skal du bruge kommandolinjen til at installere Composer-afhængigheder, bygge frontend-assets og køre databasemigrationer. Den webbaserede guide håndterer databaseopsætning og indledende konfiguration, men de omkringliggende trin kræver shell-adgang i udviklingsmodus.

## Brugere og autentificering

**Q: Hvordan nulstiller jeg en brugers adgangskode?**
A: Gå til **Administration > Brugerliste**, find brugeren, klik på rediger, og angiv en ny adgangskode. Alternativt kan brugeren bruge linket "Glemt adgangskode" på login-siden (hvis e-mail er konfigureret).

**Q: Kan jeg importere brugere i bulk?**
A: Ja. Gå til **Administration > Importér brugere**, og upload en CSV- eller XML-fil med brugerdata. Importen understøtter oprettelse af nye brugere og opdatering af eksisterende.

**Q: Hvordan integrerer jeg med LDAP eller Active Directory?**
A: Konfigurer LDAP-indstillinger i autentificeringskonfigurationen. Se [LDAP](../authentication/ldap.md). Brugere synkroniseres ved login eller via planlagt synkronisering.

**Q: Kan brugere tilhøre flere sessioner samtidig?**
A: Ja. Brugere kan tilmeldes et vilkårligt antal sessioner samtidigt. Hver session sporer fremgang uafhængigt.

## Kurser og indhold

**Q: Hvordan tager jeg backup af et enkelt kursus?**
A: Inde i kurset skal du gå til **Vedligeholdelse > Opret en backup**. Dette genererer et downloadbart arkiv med kursusindhold og indstillinger. Du kan gendanne det på samme eller en anden Chamilo-instans.

**Q: Kan jeg kopiere et kursus?**
A: Ja. Brug **Administration > Kopiér kursus** eller kursusvedligeholdelsesværktøjet inde i kurset. Du kan kopiere indhold mellem kurser eller oprette et nyt kursus ud fra et eksisterende.

**Q: Hvilke SCORM-versioner understøttes?**
A: Chamilo understøtter SCORM 1.2. SCORM-pakker importeres som læringsstier.

**Q: Hvordan begrænser jeg, hvem der kan oprette kurser?**
A: Gå til **Administration > Konfigurationsindstillinger > Kursus**, og deaktiver **Tillad ikke-administratorer (undervisere) at oprette nye kurser** (`allow_users_to_create_courses`). Når indstillingen er deaktiveret, kan kun administratorer oprette kurser. Alternativt kan du sætte en grænse for, hvor mange kurser en underviser må oprette.

## Ydeevne og vedligeholdelse

**Q: Platformen er langsom. Hvad skal jeg tjekke først?**
A: I rækkefølge efter betydning: (1) Sørg for `APP_ENV=prod` og `APP_DEBUG=0` i `.env`. (2) Kontrollér, at PHP OPcache er aktiveret. (3) Tjek databaseydeevne. (4) Se [Ydeevneoptimering](../platform-settings/performance-tuning.md).

**Q: Hvordan rydder jeg cachen?**
A: Kør `php bin/console cache:clear --env=prod` fra kommandolinjen. Slet ikke mappen `var/cache/` manuelt, mens applikationen kører.

**Q: Hvor meget diskplads har Chamilo brug for?**
A: Selve applikationen fylder ca. 2 GB ukomprimeret. Den samlede plads afhænger af uploadet indhold (dokumenter, videoer, SCORM-pakker). Overvåg diskforbruget, og planlæg derefter.

**Q: Hvordan opsætter jeg automatiske backups?**
A: Se [Backups](../maintenance/backups.md). Som minimum bør du planlægge et dagligt databasedump og regelmæssige filbackups af upload-mappen.

## E-mail

**Q: Brugere modtager ikke e-mails. Hvad skal jeg tjekke?**
A: (1) Kontrollér `MAILER_DSN` i `.env`. (2) Kør `php bin/console mailer:test someone@example.com` for at teste. (3) Tjek spammapper. (4) Kontrollér SPF/DKIM DNS-poster. Se [E-mailkonfiguration](../installation/email-configuration.md).

**Q: Kan jeg bruge Gmail til at sende e-mails?**
A: Ja, til små platforme eller udvikling. Brug en App Password, og vær opmærksom på Gmails daglige sendegrænser (500 e-mails/dag for almindelige konti).

## Sikkerhed

**Q: Hvordan tvinger jeg HTTPS?**
A: Konfigurer din webserver til at omdirigere HTTP til HTTPS. Aktivér desuden indstillingen "Tving HTTPS" under **Administration > Konfigurationsindstillinger > Sikkerhed**. Se [Sikkerhedsindstillinger](../platform-settings/security-settings.md).

**Q: Hvordan blokerer jeg brute-force-loginangreb?**
A: Konfigurer maksimalt antal loginforsøg og CAPTCHA i sikkerhedsindstillingerne. Overvej også at bruge fail2ban på serverniveau for ekstra beskyttelse.

**Q: En bruger har glemt sin adgangskode, og e-mail virker ikke. Hvordan hjælper jeg vedkommende?**
A: Som administrator kan du redigere brugerkontoen direkte og angive en ny adgangskode. Gå til **Administration > Brugerliste**, find kontoen, og opdater adgangskodefeltet.

## Opgraderinger

**Q: Kan jeg opgradere direkte fra Chamilo 2.x til 3.0?**
A: Ja, men det er en større migrering, ikke en simpel opdatering. Se [Opgradering](../installation/upgrading.md). Test altid først på en staging-server.

**Q: Vil mine plugins virke efter opgradering til 3.0?**
A: Nej. Plugins fra 2.x er ikke kompatible med 3.0 og skal omskrives eller erstattes med tilsvarende 3.0-funktionalitet.