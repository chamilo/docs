# Sikkerhedsvejledning

Denne vejledning dækker sikkerhedsmæssige bedste praksisser for at køre en Chamilo 3.0-platform i produktion. Sikkerhed er et delt ansvar mellem platformsoftwaren, din serverkonfiguration og løbende driftspraksis.

For de indbyggede overvågnings- og revisionsværktøjer, der henvises til i hele denne vejledning (logfiler over login-forsøg, indbrudsdetektion, scanning af adgangskodestyrke og kontrol af filintegritet), se kapitlet [Sikkerhed](../security/README.md).

## Hold Chamilo opdateret

Den vigtigste sikkerhedspraksis er at holde din Chamilo-installation opdateret.

* Abonnér på Chamilo-sikkerheds-X-kontoen (@chamilosecurity), eller følg GitHub-repositoriet for udgivelsesmeddelelser.
* Anvend sikkerhedsopdateringer omgående. Mindre opdateringer inden for 3.0-grenen er designet til at være sikre at anvende.
* Følg [opgraderingsprocessen](../installation/upgrading.md) for hver opdatering.

## HTTPS

Servér altid Chamilo over HTTPS i produktion.

* Indhent et SSL/TLS-certifikat (Let's Encrypt leverer gratis certifikater via Certbot).
* Konfigurér din webserver til at omdirigere al HTTP-trafik til HTTPS.
* Aktivér HSTS-headeren (HTTP Strict Transport Security) for at forhindre nedgraderingsangreb:

  ```
  Strict-Transport-Security: max-age=31536000; includeSubDomains
  ```

Uden HTTPS transmitteres loginoplysninger, sessionscookies og alle brugerdata i klartekst og kan opsnappes på netværket.

## Filrettigheder

Begræns filrettigheder til det absolut nødvendige.

| Sti | Ejer | Rettigheder | Bemærkninger |
|------|-------|-------------|-------|
| Applikationsfiler (kildekode) | root eller deploy-bruger | 755 (mapper), 644 (filer) | Webserveren har brug for skrivebeskyttet adgang. |
| `var/` | webserverbruger | 775 | Skal være skrivbar for Symfony-cache, logfiler og filuploads |
| `.env` | root eller deploy-bruger | 640 | Indeholder hemmeligheder. Webserveren har kun brug for læseadgang under normal brug, men har brug for skriveadgang under installation. |
| `config/` | root eller deploy-bruger | 750 | Indeholder hemmeligheder. Webserveren har kun brug for læseadgang under normal brug, men har brug for skriveadgang under installation. |

Sæt aldrig rettigheder til 777. Kør aldrig webserveren som root.

## Adgangskodepolitikker

Konfigurér strenge adgangskodekrav i [Sikkerhedsindstillinger](../platform-settings/security-settings.md):

* Minimumslængde på 8 tegn (12+ anbefales).
* Kræv en blanding af store bogstaver, små bogstaver, tal og specialtegn.
* Overvej at aktivere udløb af adgangskoder i miljøer drevet af overholdelseskrav.
* Oplys brugerne om at vælge stærke, unikke adgangskoder.

## Ratebegrænsning og beskyttelse mod brute-force

### Applikationsniveau

* Sæt **Maksimalt antal login-forsøg før kontoen blokeres** (`login_max_attempt_before_blocking_account`) til en lille værdi (for eksempel 5).
* Aktivér **CAPTCHA** på loginsiden. CAPTCHA er til/fra — den tændes ikke automatisk efter N mislykkede logins. Kombinér den med **CAPTCHA-fejl før blokering** (`captcha_number_mistakes_to_block_account`) for at låse en konto, der bliver ved med at fejle CAPTCHA.
* Gennemgå rapporten [Login-forsøg](../security/login-attempts.md) periodisk for at opdage brute-force-mønstre, og rapporten [Simple IDS](../security/simple-ids.md) for andre markerede anmodninger (XSS-forsøg, path traversal og lignende).

### Serverniveau

Brug **fail2ban** til at overvåge loginfejl og blokere de pågældende IP-adresser:

```ini
# /etc/fail2ban/jail.d/chamilo.conf
[chamilo]
enabled = true
port = http,https
filter = chamilo-auth
logpath = /path/to/chamilo/var/log/prod.log
maxretry = 5
bantime = 900
```

Opret et matchende filter i `/etc/fail2ban/filter.d/chamilo-auth.conf` til at matche logposter om autentificeringsfejl.

## Sessionsstyring

* Sæt en rimelig **sessionstid** (f.eks. 3600 sekunder / 1 time) i sikkerhedsindstillingerne.
* Konfigurér **session cookie flags** i din Symfony-konfiguration:

  ```yaml
  # config/packages/framework.yaml
  framework:
      session:
          cookie_secure: true      # Only send over HTTPS
          cookie_httponly: true     # Not accessible via JavaScript
          cookie_samesite: lax     # CSRF protection
  ```

* Overvej at deaktivere "Husk mig" på platforme med følsomt indhold.

## HTTP-sikkerhedsoverskrifter

Konfigurer din webserver til at sende sikkerhedsoverskrifter:

| Overskrift | Værdi | Formål |
|--------|-------|---------|
| `X-Content-Type-Options` | `nosniff` | Forhindrer MIME-type-sniffing. |
| `X-Frame-Options` | `SAMEORIGIN` | Forhindrer clickjacking via iframes. |
| `X-XSS-Protection` | `1; mode=block` | Ældre XSS-beskyttelse til ældre browsere. |
| `Referrer-Policy` | `strict-origin-when-cross-origin` | Styrer lækage af referrer-information. |
| `Content-Security-Policy` | Varierer | Styrer, hvilke ressourcer der kan indlæses. Kræver omhyggelig tilpasning til Chamilo. |

Eksempel til Apache:

```apache
Header always set X-Content-Type-Options "nosniff"
Header always set X-Frame-Options "SAMEORIGIN"
Header always set Referrer-Policy "strict-origin-when-cross-origin"
```

Eksempel til Nginx:

```nginx
add_header X-Content-Type-Options "nosniff" always;
add_header X-Frame-Options "SAMEORIGIN" always;
add_header Referrer-Policy "strict-origin-when-cross-origin" always;
```

## Sikkerhed ved filupload

* Bloker eksekverbare filendelser (exe, bat, sh, php, phtml, cgi) under [Sikkerhedsindstillinger](../platform-settings/security-settings.md).
* Konfigurer din webserver til **aldrig at eksekvere uploadede filer**. For Apache skal du tilføje følgende til hele var/-mappen:

  ```apache
  <Directory /path/to/chamilo/var>
      php_admin_flag engine off
      RemoveHandler .php .phtml .php3 .php5
  </Directory>
  ```

* Scan uploadede filer med et antivirusprogram (ClamAV), hvis dit miljø kræver det.

## Databasesikkerhed

* Brug en **dedikeret databasebruger** til Chamilo med kun de privilegier, den har brug for (SELECT, INSERT, UPDATE, DELETE, CREATE, ALTER, DROP, INDEX på Chamilo-databasen).
* Brug ikke root-databasekontoen.
* Sørg for, at databasen ikke er tilgængelig fra det offentlige internet. Bind den til localhost eller et privat netværk.
* Aktivér database-auditlogning i overholdelsesfølsomme miljøer.

## Sikkerhedskopier

* Planlæg **daglige automatiserede sikkerhedskopier** af både databasen og uploadede filer.
* Gem sikkerhedskopier et andet sted end serveren (offsite eller cloud-lager).
* Test periodisk gendannelse af sikkerhedskopier for at verificere, at de kan bruges.
* Krypter sikkerhedskopier, hvis de indeholder følsomme data.

Se [Sikkerhedskopier](../maintenance/backups.md) for detaljerede instruktioner.

## Overvågning

* Overvåg Chamilo-logfiler i `var/log/prod.log` for fejl og mistænkelig aktivitet.
* Opsæt serverovervågning (CPU, hukommelse, disk) for at opdage ressourceudtømning.
* Konfigurer advarsler ved gentagne autentificeringsfejl.
* Gennemgå periodisk brugerkonti for uautoriserede eller inaktive konti.
* Planlæg [Filintegritet](../security/file-integrity.md)-tjek (Chamilo 3.0+) i cron for at blive underrettet, når installerede filer ændres uventet, og kør [Adgangskodestyrkekontrol](../security/password-strength-checker.md) periodisk, især efter masseimport af brugere.

## Tjekliste

Brug denne tjekliste ved udrulning eller revision af en Chamilo-installation:

- [ ] HTTPS aktiveret med gyldigt certifikat
- [ ] HTTP til HTTPS-omdirigering konfigureret
- [ ] `APP_ENV=prod` og `APP_DEBUG=0` i `.env`
- [ ] Unik `APP_SECRET` genereret
- [ ] Filrettigheder begrænset (ingen 777)
- [ ] Adgangskodepolitik konfigureret
- [ ] Maksimalt antal loginforsøg og CAPTCHA aktiveret
- [ ] Eksekverbare filendelser blokeret
- [ ] Sikkerhedsoverskrifter konfigureret på webserveren
- [ ] Session cookie-flag sat (secure, httponly, samesite)
- [ ] Databasebruger har minimale privilegier
- [ ] Automatiserede sikkerhedskopier planlagt og testet
- [ ] Filintegritetsbaseline etableret og scanning planlagt i cron (Chamilo 3.0+)
- [ ] Logovervågning er på plads
- [ ] Chamilo-versionen er aktuel