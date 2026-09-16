# Beveiligingsgids

Deze gids behandelt beveiligingsbest practices voor het draaien van een Chamilo 3.0-platform in productie. Beveiliging is een gedeelde verantwoordelijkheid tussen de platformsoftware, uw serverconfiguratie en doorlopende operationele praktijken.

Voor de ingebouwde monitoring- en audittools waarnaar in deze gids wordt verwezen (logs van inlogpogingen, inbraakdetectie, scans van wachtwoordsterkte en controles van bestandsintegriteit), zie het hoofdstuk [Beveiliging](../security/README.md).

## Houd Chamilo bijgewerkt

De belangrijkste beveiligingspraktijk is het up-to-date houden van uw Chamilo-installatie.

* Abonneer u op het Chamilo-beveiligingsaccount op X (@chamilosecurity) of volg de GitHub-repository voor release-aankondigingen.
* Pas beveiligingspatches snel toe. Kleine updates binnen de 3.0-tak zijn ontworpen om veilig te kunnen worden toegepast.
* Volg het [upgradeproces](../installation/upgrading.md) voor elke update.

## HTTPS

Serveer Chamilo in productie altijd via HTTPS.

* Verkrijg een SSL/TLS-certificaat (Let's Encrypt biedt gratis certificaten via Certbot).
* Configureer uw webserver om al het HTTP-verkeer naar HTTPS om te leiden.
* Schakel de HSTS-header (HTTP Strict Transport Security) in om downgrade-aanvallen te voorkomen:

  ```
  Strict-Transport-Security: max-age=31536000; includeSubDomains
  ```

Zonder HTTPS worden inloggegevens, sessiecookies en alle gebruikersgegevens in platte tekst verzonden en kunnen ze op het netwerk worden onderschept.

## Bestandsrechten

Beperk bestandsrechten tot het minimum dat nodig is.

| Pad | Eigenaar | Rechten | Opmerkingen |
|------|-------|-------------|-------|
| Applicatiebestanden (broncode) | root of deploy-gebruiker | 755 (mappen), 644 (bestanden) | De webserver heeft alleen-lezen toegang nodig. |
| `var/` | webservergebruiker | 775 | Moet schrijfbaar zijn voor Symfony-cache, logs en bestandsuploads |
| `.env` | root of deploy-gebruiker | 640 | Bevat geheimen. De webserver heeft tijdens normaal gebruik alleen leestoegang nodig, maar tijdens de installatie schrijftoegang. |
| `config/` | root of deploy-gebruiker | 750 | Bevat geheimen. De webserver heeft tijdens normaal gebruik alleen leestoegang nodig, maar tijdens de installatie schrijftoegang. |

Stel nooit rechten in op 777. Draai de webserver nooit als root.

## Wachtwoordbeleid

Configureer sterke wachtwoordvereisten in [Beveiligingsinstellingen](../platform-settings/security-settings.md):

* Minimale lengte van 8 tekens (12+ aanbevolen).
* Vereis een mix van hoofdletters, kleine letters, cijfers en speciale tekens.
* Overweeg wachtwoordverloop in te schakelen voor omgevingen die door compliance worden gedreven.
* Licht gebruikers voor over het kiezen van sterke, unieke wachtwoorden.

## Rate limiting en bescherming tegen brute force

### Applicatieniveau

* Stel **Max. inlogpogingen voordat account wordt geblokkeerd** (`login_max_attempt_before_blocking_account`) in op een kleine waarde (bijvoorbeeld 5).
* Schakel **CAPTCHA** in op de inlogpagina. CAPTCHA is aan/uit — het wordt niet automatisch ingeschakeld na N mislukte logins. Combineer het met **CAPTCHA-fouten voordat blokkeren** (`captcha_number_mistakes_to_block_account`) om een account te vergrendelen dat de CAPTCHA blijft falen.
* Bekijk periodiek het rapport [Inlogpogingen](../security/login-attempts.md) om brute-forcepatronen te herkennen, en het rapport [Simple IDS](../security/simple-ids.md) voor andere gemarkeerde verzoeken (XSS-pogingen, path traversal en vergelijkbaar).

### Serverniveau

Gebruik **fail2ban** om inlogfouten te monitoren en aanstootgevende IP-adressen te blokkeren:

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

Maak een bijbehorend filter in `/etc/fail2ban/filter.d/chamilo-auth.conf` om logregels van authenticatiefouten te matchen.

## Sessiebeheer

* Stel een redelijke **sessieduur** in (bijv. 3600 seconden / 1 uur) in de beveiligingsinstellingen.
* Configureer **sessiecookievlaggen** in uw Symfony-configuratie:

  ```yaml
  # config/packages/framework.yaml
  framework:
      session:
          cookie_secure: true      # Only send over HTTPS
          cookie_httponly: true     # Not accessible via JavaScript
          cookie_samesite: lax     # CSRF protection
  ```

* Overweeg "Onthoud mij" uit te schakelen op platforms met gevoelige inhoud.

## HTTP-beveiligingsheaders

Configureer uw webserver om beveiligingsheaders te verzenden:

| Header | Waarde | Doel |
|--------|-------|---------|
| `X-Content-Type-Options` | `nosniff` | Voorkomt MIME-type sniffing. |
| `X-Frame-Options` | `SAMEORIGIN` | Voorkomt clickjacking via iframes. |
| `X-XSS-Protection` | `1; mode=block` | Legacy XSS-bescherming voor oudere browsers. |
| `Referrer-Policy` | `strict-origin-when-cross-origin` | Beheert het lekken van referrer-informatie. |
| `Content-Security-Policy` | Varieert | Bepaalt welke resources mogen worden geladen. Vereist zorgvuldige afstemming voor Chamilo. |

Voorbeeld voor Apache:

```apache
Header always set X-Content-Type-Options "nosniff"
Header always set X-Frame-Options "SAMEORIGIN"
Header always set Referrer-Policy "strict-origin-when-cross-origin"
```

Voorbeeld voor Nginx:

```nginx
add_header X-Content-Type-Options "nosniff" always;
add_header X-Frame-Options "SAMEORIGIN" always;
add_header Referrer-Policy "strict-origin-when-cross-origin" always;
```

## Beveiliging van bestandsuploads

* Blokkeer uitvoerbare bestandsextensies (exe, bat, sh, php, phtml, cgi) in [Beveiligingsinstellingen](../platform-settings/security-settings.md).
* Configureer uw webserver zodat deze **nooit geüploade bestanden uitvoert**. Voor Apache, voeg toe voor de volledige var/-directory:

  ```apache
  <Directory /path/to/chamilo/var>
      php_admin_flag engine off
      RemoveHandler .php .phtml .php3 .php5
  </Directory>
  ```

* Scan geüploade bestanden met een antivirusprogramma (ClamAV) als uw omgeving dat vereist.

## Databasebeveiliging

* Gebruik een **toegewijde databasegebruiker** voor Chamilo met alleen de benodigde rechten (SELECT, INSERT, UPDATE, DELETE, CREATE, ALTER, DROP, INDEX op de Chamilo-database).
* Gebruik niet het root-databaseaccount.
* Zorg dat de database niet toegankelijk is vanaf het openbare internet. Bind deze aan localhost of een privénetwerk.
* Schakel database-auditlogging in voor omgevingen met compliance-eisen.

## Back-ups

* Plan **dagelijkse geautomatiseerde back-ups** van zowel de database als geüploade bestanden.
* Bewaar back-ups op een andere locatie dan de server (offsite of cloudopslag).
* Test het herstellen van back-ups periodiek om te verifiëren dat back-ups bruikbaar zijn.
* Versleutel back-ups als ze gevoelige gegevens bevatten.

Zie [Back-ups](../maintenance/backups.md) voor gedetailleerde instructies.

## Monitoring

* Monitor Chamilo-logs in `var/log/prod.log` op fouten en verdachte activiteit.
* Stel servermonitoring in (CPU, geheugen, schijf) om uitputting van resources te detecteren.
* Configureer waarschuwingen voor herhaalde authenticatiefouten.
* Controleer periodiek gebruikersaccounts op ongeautoriseerde of inactieve accounts.
* Plan [Bestandsintegriteit](../security/file-integrity.md)-controles (Chamilo 3.0+) in cron om te worden gewaarschuwd wanneer geïnstalleerde bestanden onverwacht wijzigen, en voer de [Wachtwoordsterktecontrole](../security/password-strength-checker.md) periodiek uit, vooral na bulkimports van gebruikers.

## Checklist

Gebruik deze checklist bij het uitrollen of auditen van een Chamilo-installatie:

- [ ] HTTPS ingeschakeld met geldig certificaat
- [ ] HTTP-naar-HTTPS-omleiding geconfigureerd
- [ ] `APP_ENV=prod` en `APP_DEBUG=0` in `.env`
- [ ] Unieke `APP_SECRET` gegenereerd
- [ ] Bestandsrechten beperkt (geen 777)
- [ ] Wachtwoordbeleid geconfigureerd
- [ ] Maximaal aantal inlogpogingen en CAPTCHA ingeschakeld
- [ ] Uitvoerbare bestandsextensies geblokkeerd
- [ ] Beveiligingsheaders geconfigureerd op de webserver
- [ ] Sessiecookie-vlaggen ingesteld (secure, httponly, samesite)
- [ ] Databasegebruiker heeft minimale rechten
- [ ] Geautomatiseerde back-ups gepland en getest
- [ ] Bestandsintegriteitsbaseline vastgesteld en scan gepland in cron (Chamilo 3.0+)
- [ ] Logmonitoring aanwezig
- [ ] Chamilo-versie is actueel