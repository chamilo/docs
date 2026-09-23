# Sikkerhetsveiledning

Denne veiledningen dekker sikkerhetsmessige beste praksiser for å kjøre en Chamilo 3.0-plattform i produksjon. Sikkerhet er et delt ansvar mellom plattformprogramvaren, serverkonfigurasjonen din og løpende driftspraksis.

For de innebygde overvåkings- og revisjonsverktøyene som det vises til gjennom hele denne veiledningen (logger over innloggingsforsøk, inntrengingsdeteksjon, skanning av passordstyrke og kontroll av filintegritet), se kapitlet [Sikkerhet](../security/README.md).

## Hold Chamilo oppdatert

Den viktigste sikkerhetspraksisen er å holde Chamilo-installasjonen oppdatert.

* Abonner på Chamilo-sikkerhetskontoen på X (@chamilosecurity) eller følg GitHub-repositoriet for kunngjøringer om utgivelser.
* Bruk sikkerhetsoppdateringer raskt. Mindre oppdateringer innen 3.0-grenen er utformet for å være trygge å bruke.
* Følg [oppgraderingsprosessen](../installation/upgrading.md) for hver oppdatering.

## HTTPS

Server alltid Chamilo over HTTPS i produksjon.

* Skaff et SSL/TLS-sertifikat (Let's Encrypt tilbyr gratis sertifikater via Certbot).
* Konfigurer webserveren slik at all HTTP-trafikk omdirigeres til HTTPS.
* Aktiver HSTS-hodet (HTTP Strict Transport Security) for å forhindre nedgraderingsangrep:

  ```
  Strict-Transport-Security: max-age=31536000; includeSubDomains
  ```

Uten HTTPS overføres innloggingsopplysninger, øktinformasjonskapsler og all brukerdata i klartekst og kan avlyttes på nettverket.

## Filrettigheter

Begrens filrettighetene til det som er strengt nødvendig.

| Bane | Eier | Rettigheter | Merknader |
|------|-------|-------------|-------|
| Applikasjonsfiler (kildekode) | root eller deploy-bruker | 755 (mapper), 644 (filer) | Webserveren trenger skrivebeskyttet tilgang. |
| `var/` | webserverbruker | 775 | Må være skrivbar for Symfony-hurtigbuffer, logger og filopplastinger |
| `.env` | root eller deploy-bruker | 640 | Inneholder hemmeligheter. Webserveren trenger kun lesetilgang under normal bruk, men trenger skrivetilgang under installasjon. |
| `config/` | root eller deploy-bruker | 750 | Inneholder hemmeligheter. Webserveren trenger kun lesetilgang under normal bruk, men trenger skrivetilgang under installasjon. |

Sett aldri rettighetene til 777. Kjør aldri webserveren som root.

## Passordpolicyer

Konfigurer strenge passordkrav i [Sikkerhetsinnstillinger](../platform-settings/security-settings.md):

* Minimumslengde på 8 tegn (12+ anbefales).
* Krev en blanding av store bokstaver, små bokstaver, tall og spesialtegn.
* Vurder å aktivere passordutløp i miljøer drevet av samsvarskrav.
* Opplær brukerne i å velge sterke, unike passord.

## Hastighetsbegrensning og beskyttelse mot brute-force

### Applikasjonsnivå

* Sett **Maksimalt antall innloggingsforsøk før kontoen blokkeres** (`login_max_attempt_before_blocking_account`) til en lav verdi (for eksempel 5).
* Aktiver **CAPTCHA** på innloggingssiden. CAPTCHA er av/på — den slås ikke automatisk på etter N mislykkede innlogginger. Kombiner den med **CAPTCHA-feil før blokkering** (`captcha_number_mistakes_to_block_account`) for å låse en konto som fortsetter å feile CAPTCHA.
* Gå jevnlig gjennom rapporten [Innloggingsforsøk](../security/login-attempts.md) for å oppdage brute-force-mønstre, og rapporten [Simple IDS](../security/simple-ids.md) for andre flaggede forespørsler (XSS-forsøk, path traversal og lignende).

### Servernivå

Bruk **fail2ban** til å overvåke innloggingsfeil og blokkere aktuelle IP-adresser:

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

Opprett et tilsvarende filter i `/etc/fail2ban/filter.d/chamilo-auth.conf` som matcher loggoppføringer for autentiseringsfeil.

## Øktadministrasjon

* Sett en rimelig **øktlevetid** (f.eks. 3600 sekunder / 1 time) i sikkerhetsinnstillingene.
* Konfigurer **flagg for øktinformasjonskapsler** i Symfony-konfigurasjonen:

  ```yaml
  # config/packages/framework.yaml
  framework:
      session:
          cookie_secure: true      # Only send over HTTPS
          cookie_httponly: true     # Not accessible via JavaScript
          cookie_samesite: lax     # CSRF protection
  ```

* Vurder å deaktivere «Husk meg» på plattformer med sensitivt innhold.

## HTTP-sikkerhetshoder

Konfigurer webserveren til å sende sikkerhetshoder:

| Header | Value | Purpose |
|--------|-------|---------|
| `X-Content-Type-Options` | `nosniff` | Hindrer sniffing av MIME-type. |
| `X-Frame-Options` | `SAMEORIGIN` | Hindrer clickjacking via iframes. |
| `X-XSS-Protection` | `1; mode=block` | Eldre XSS-beskyttelse for eldre nettlesere. |
| `Referrer-Policy` | `strict-origin-when-cross-origin` | Styrer lekkasje av referrer-informasjon. |
| `Content-Security-Policy` | Varierer | Styrer hvilke ressurser som kan lastes. Krever nøye tilpasning for Chamilo. |

Eksempel for Apache:

```apache
Header always set X-Content-Type-Options "nosniff"
Header always set X-Frame-Options "SAMEORIGIN"
Header always set Referrer-Policy "strict-origin-when-cross-origin"
```

Eksempel for Nginx:

```nginx
add_header X-Content-Type-Options "nosniff" always;
add_header X-Frame-Options "SAMEORIGIN" always;
add_header Referrer-Policy "strict-origin-when-cross-origin" always;
```

## Sikkerhet for filopplasting

* Blokker kjørbare filendelser (exe, bat, sh, php, phtml, cgi) i [Sikkerhetsinnstillinger](../platform-settings/security-settings.md).
* Konfigurer webserveren til **aldri å kjøre opplastede filer**. For Apache, legg til for hele var/-katalogen:

  ```apache
  <Directory /path/to/chamilo/var>
      php_admin_flag engine off
      RemoveHandler .php .phtml .php3 .php5
  </Directory>
  ```

* Skann opplastede filer med et antivirusprogram (ClamAV) dersom miljøet krever det.

## Databasesikkerhet

* Bruk en **dedikert databasebruker** for Chamilo med kun de privilegiene den trenger (SELECT, INSERT, UPDATE, DELETE, CREATE, ALTER, DROP, INDEX på Chamilo-databasen).
* Ikke bruk root-databasekontoen.
* Sørg for at databasen ikke er tilgjengelig fra det offentlige internett. Bind den til localhost eller et privat nettverk.
* Aktiver revisjonslogging for databasen i miljøer med samsvarskrav.

## Sikkerhetskopier

* Planlegg **daglige automatiserte sikkerhetskopier** av både databasen og opplastede filer.
* Lagre sikkerhetskopier på et annet sted enn serveren (eksternt eller skylagring).
* Test gjenoppretting av sikkerhetskopier jevnlig for å verifisere at de er brukbare.
* Krypter sikkerhetskopier dersom de inneholder sensitive data.

Se [Sikkerhetskopier](../maintenance/backups.md) for detaljerte instruksjoner.

## Overvåking

* Overvåk Chamilo-logger på `var/log/prod.log` for feil og mistenkelig aktivitet.
* Sett opp serverovervåking (CPU, minne, disk) for å oppdage ressursutmattelse.
* Konfigurer varsler for gjentatte autentiseringsfeil.
* Gå jevnlig gjennom brukerkontoer for uautoriserte eller inaktive kontoer.
* Planlegg [Filintegritet](../security/file-integrity.md)-sjekker (Chamilo 3.0+) i cron for å bli varslet når installerte filer endres uventet, og kjør [Passordstyrkesjekker](../security/password-strength-checker.md) jevnlig, særlig etter masseimport av brukere.

## Sjekkliste

Bruk denne sjekklisten ved utrulling eller revisjon av en Chamilo-installasjon:

- [ ] HTTPS aktivert med gyldig sertifikat
- [ ] HTTP til HTTPS-omdirigering konfigurert
- [ ] `APP_ENV=prod` og `APP_DEBUG=0` i `.env`
- [ ] Unik `APP_SECRET` generert
- [ ] Filrettigheter begrenset (ikke 777)
- [ ] Passordpolicy konfigurert
- [ ] Maksimalt antall innloggingsforsøk og CAPTCHA aktivert
- [ ] Kjørbare filendelser blokkert
- [ ] Sikkerhetshoder konfigurert på webserveren
- [ ] Flagg for øktinformasjonskapsler satt (secure, httponly, samesite)
- [ ] Databasebruker har minimale privilegier
- [ ] Automatiserte sikkerhetskopier planlagt og testet
- [ ] Filintegritetsgrunnlag etablert og skanning planlagt i cron (Chamilo 3.0+)
- [ ] Loggovervåking på plass
- [ ] Chamilo-versjonen er oppdatert