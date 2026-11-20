# Beveiligingsgids

Deze gids behandelt beveiligingsbest practices voor het draaien van een Chamilo 3.0-platform in productie. Beveiliging is een gedeelde verantwoordelijkheid tussen de platformsoftware, uw serverconfiguratie en doorlopende operationele praktijken.

Voor de ingebouwde monitoring- en audittools waarnaar in deze gids wordt verwezen (logboeken van aanmeldpogingen, inbraakdetectie, scans van wachtwoordsterkte en controles van bestandsintegriteit), zie het hoofdstuk [Beveiliging](../security/README.md).

## De installatiemap verwijderen

De installatiemap (`public/main/install`) heeft zeer specifieke vereisten, omdat deze Chamilo moet kunnen installeren en bijwerken, soms op een platform dat nog niet volledig is geconfigureerd. Om deze reden is het historisch gezien een doelwit van aanvallen geweest.

Zodra Chamilo is geïnstalleerd, hebt u deze niet nodig voor de dagelijkse werking. Het is beter om deze volledig te verwijderen:

```
rm -rf public/main/install
```

Dit is ook de reden waarom het blok [Health Check](../health-check.md) op de beheerpagina u waarschuwt zolang de map nog aanwezig is. Wanneer u een update moet uitvoeren, herstelt u de map vanuit een verse kopie van het pakket en verwijdert u deze daarna opnieuw.

## Chamilo bijgewerkt houden

De belangrijkste beveiligingspraktijk is het bijgewerkt houden van uw Chamilo-installatie.

* Abonneer u op het Chamilo-beveiligingsaccount op X (@chamilosecurity) of volg de GitHub-repository voor aankondigingen van releases.
* Pas beveiligingspatches tijdig toe. Kleine updates binnen de 3.0-branch zijn ontworpen om veilig te kunnen worden toegepast.
* Volg het [upgradeproces](../installation/upgrading.md) voor elke update.

## HTTPS

Serveer Chamilo in productie altijd via HTTPS.

* Verkrijg een SSL/TLS-certificaat (Let's Encrypt biedt gratis certificaten via Certbot).
* Configureer uw webserver zodat al het HTTP-verkeer wordt omgeleid naar HTTPS.
* Schakel de HSTS-header (HTTP Strict Transport Security) in om downgrade-aanvallen te voorkomen:

  ```
  Strict-Transport-Security: max-age=31536000; includeSubDomains
  ```

Zonder HTTPS worden aanmeldgegevens, sessiecookies en alle gebruikersgegevens in platte tekst verzonden en kunnen ze op het netwerk worden onderschept.

## Bestandsrechten

Beperk bestandsrechten tot het strikt noodzakelijke.

| Pad | Eigenaar | Rechten | Opmerkingen |
|------|-------|-------------|-------|
| Applicatiebestanden (broncode) | root of deploy-gebruiker | 755 (mappen), 644 (bestanden) | De webserver heeft alleen-lezen toegang nodig. |
| `var/` | webservergebruiker | 775 | Moet schrijfbaar zijn voor Symfony-cache, logboeken en bestandsuploads |
| `.env` | root of deploy-gebruiker | 640 | Bevat geheimen. De webserver heeft alleen leestoegang nodig tijdens normaal gebruik, maar schrijftoegang tijdens de installatie. |
| `config/` | root of deploy-gebruiker | 750 | Bevat geheimen. De webserver heeft alleen leestoegang nodig tijdens normaal gebruik, maar schrijftoegang tijdens de installatie. |

Stel rechten nooit in op 777. Draai de webserver nooit als root.

## Wachtwoordbeleid

Configureer strenge wachtwoordvereisten in [Beveiligingsinstellingen](../platform-settings/security-settings.md):

* Minimale lengte van 8 tekens (12+ aanbevolen).
* Vereis een mix van hoofdletters, kleine letters, cijfers en speciale tekens.
* Overweeg het inschakelen van wachtwoordverloop voor omgevingen die door compliance worden gestuurd.
* Leer gebruikers sterke, unieke wachtwoorden te kiezen.

## Snelheidsbeperking en bescherming tegen brute force

### Applicatieniveau

* Stel **Maximaal aantal aanmeldpogingen voordat het account wordt geblokkeerd** (`login_max_attempt_before_blocking_account`) in op een kleine waarde (bijvoorbeeld 5).
* Schakel **CAPTCHA** in op de aanmeldpagina. CAPTCHA is aan/uit — het wordt niet automatisch ingeschakeld na N mislukte aanmeldingen. Combineer het met **CAPTCHA-fouten voordat wordt geblokkeerd** (`captcha_number_mistakes_to_block_account`) om een account te vergrendelen dat de CAPTCHA blijft falen.
* Bekijk het rapport [Aanmeldpogingen](../security/login-attempts.md) periodiek om brute-forcepatronen te herkennen, en het rapport [Simple IDS](../security/simple-ids.md) voor andere gemarkeerde verzoeken (XSS-pogingen, path traversal en vergelijkbare).

### Serverniveau

Gebruik **fail2ban** om mislukte aanmeldingen te monitoren en overtredende IP-adressen te blokkeren:

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

Maak een bijpassend filter in `/etc/fail2ban/filter.d/chamilo-auth.conf` om logregels van mislukte authenticatie te matchen.

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

---
## HTTP-beveiligingsheaders

Configureer uw webserver om beveiligingsheaders te verzenden:

| Header | Waarde | Doel |
|--------|-------|---------|
| `X-Content-Type-Options` | `nosniff` | Voorkomt MIME-type sniffing. |
| `X-Frame-Options` | `SAMEORIGIN` | Voorkomt clickjacking via iframes. |
| `X-XSS-Protection` | `1; mode=block` | Verouderde XSS-bescherming voor oudere browsers. |
| `Referrer-Policy` | `strict-origin-when-cross-origin` | Beperkt het lekken van referrerinformatie. |
| `Content-Security-Policy` | Varieert | Bepaalt welke bronnen kunnen worden geladen. Vereist zorgvuldige afstemming voor Chamilo. |

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
* Configureer uw webserver zodat geüploade bestanden **nooit worden uitgevoerd**. Voeg voor Apache het volgende toe aan de volledige var/-map:

  ```apache
  <Directory /path/to/chamilo/var>
      php_admin_flag engine off
      RemoveHandler .php .phtml .php3 .php5
  </Directory>
  ```

* Scan geüploade bestanden met een antivirusprogramma (ClamAV) als uw omgeving dit vereist.

## Databasebeveiliging

* Gebruik een **toegewezen databasegebruiker** voor Chamilo met alleen de benodigde rechten (SELECT, INSERT, UPDATE, DELETE, CREATE, ALTER, DROP, INDEX op de Chamilo-database).
* Gebruik niet het root-databaseaccount.
* Zorg ervoor dat de database niet toegankelijk is vanaf het openbare internet. Bind deze aan localhost of een privénetwerk.
* Schakel database-auditlogging in voor omgevingen met strikte nalevingsvereisten.

## Back-ups

* Plan **dagelijkse geautomatiseerde back-ups** van zowel de database als de geüploade bestanden.
* Bewaar back-ups op een andere locatie dan de server (extern of in cloudopslag).
* Test het herstellen van back-ups periodiek om te controleren of de back-ups bruikbaar zijn.
* Versleutel back-ups als deze gevoelige gegevens bevatten.

Zie [Back-ups](../maintenance/backups.md) voor gedetailleerde instructies.

## Monitoring

* Controleer Chamilo-logboeken in `var/log/prod.log` op fouten en verdachte activiteit.
* Stel servermonitoring in (CPU, geheugen, schijf) om uitputting van resources te detecteren.
* Configureer waarschuwingen voor herhaalde authenticatiefouten.
* Controleer gebruikersaccounts periodiek op ongeautoriseerde of inactieve accounts.
* Plan controles van de [Bestandsintegriteit](../security/file-integrity.md) (Chamilo 3.0+) in cron om een melding te ontvangen wanneer geïnstalleerde bestanden onverwacht wijzigen, en voer de [Controle van wachtwoordsterkte](../security/password-strength-checker.md) periodiek uit, vooral na bulkimport van gebruikers.

## Checklist

Gebruik deze checklist bij het implementeren of controleren van een Chamilo-installatie:

- [ ] HTTPS ingeschakeld met een geldig certificaat
- [ ] Omleiding van HTTP naar HTTPS geconfigureerd
- [ ] `APP_ENV=prod` en `APP_DEBUG=0` in `.env`
- [ ] Unieke `APP_SECRET` gegenereerd
- [ ] Bestandsrechten beperkt (geen 777)
- [ ] Wachtwoordbeleid geconfigureerd
- [ ] Maximum aantal aanmeldpogingen en CAPTCHA ingeschakeld
- [ ] Uitvoerbare bestandsextensies geblokkeerd
- [ ] Beveiligingsheaders geconfigureerd op de webserver
- [ ] Sessiecookievlaggen ingesteld (secure, httponly, samesite)
- [ ] Databasegebruiker heeft minimale rechten
- [ ] Geautomatiseerde back-ups gepland en getest
- [ ] Basislijn voor bestandsintegriteit vastgesteld en scan gepland in cron (Chamilo 3.0+)
- [ ] Logboekmonitoring ingesteld
- [ ] Chamilo-versie is actueel