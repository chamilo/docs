# Beveiligingsgids

Deze gids behandelt de beste praktijken voor beveiliging bij het draaien van een Chamilo 2.0-platform in productie. Beveiliging is een gedeelde verantwoordelijkheid tussen de platformsoftware, uw serverconfiguratie en doorlopende operationele praktijken.

## Houd Chamilo Bijgewerkt

De belangrijkste beveiligingspraktijk is het up-to-date houden van uw Chamilo-installatie.

* Abonneer u op het Chamilo beveiligingsaccount op X (@chamilosecurity) of volg de GitHub-repository voor aankondigingen van releases.
* Pas beveiligingspatches snel toe. Kleine updates binnen de 2.0-branch zijn ontworpen om veilig toe te passen.
* Volg het [upgradeproces](../installation/upgrading.md) voor elke update.

## HTTPS

Serveer Chamilo altijd via HTTPS in productie.

* Verkrijg een SSL/TLS-certificaat (Let's Encrypt biedt gratis certificaten via Certbot).
* Configureer uw webserver om al het HTTP-verkeer om te leiden naar HTTPS.
* Schakel de HSTS (HTTP Strict Transport Security) header in om downgrade-aanvallen te voorkomen:

  ```
  Strict-Transport-Security: max-age=31536000; includeSubDomains
  ```

Zonder HTTPS worden inloggegevens, sessiecookies en alle gebruikersgegevens in platte tekst verzonden en kunnen ze op het netwerk worden onderschept.

## Bestandsrechten

Beperk bestandsrechten tot het minimaal noodzakelijke.

| Pad | Eigenaar | Rechten | Opmerkingen |
|------|-------|-------------|-------|
| Applicatiebestanden (broncode) | root of deploy-gebruiker | 755 (mappen), 644 (bestanden) | Webserver heeft alleen leesrechten nodig. |
| `var/` | webservergebruiker | 775 | Moet schrijfbaar zijn voor Symfony cache, logs en bestandsuploads |
| `.env` | root of deploy-gebruiker | 640 | Bevat geheimen. Webserver heeft alleen leesrechten nodig tijdens normaal gebruik, maar schrijfrechten tijdens installatie. |
| `config/` | root of deploy-gebruiker | 750 | Bevat geheimen. Webserver heeft alleen leesrechten nodig tijdens normaal gebruik, maar schrijfrechten tijdens installatie. |

Stel rechten nooit in op 777. Draai de webserver nooit als root.

## Wachtwoordbeleid

Configureer sterke wachtwoordvereisten in [Beveiligingsinstellingen](../platform-settings/security-settings.md):

* Minimale lengte van 8 tekens (12+ aanbevolen).
* Vereis een mix van hoofdletters, kleine letters, cijfers en speciale tekens.
* Overweeg het inschakelen van wachtwoordverloop voor omgevingen waar naleving vereist is.
* Informeer gebruikers over het kiezen van sterke, unieke wachtwoorden.

## Beperking van Verzoeken en Bescherming tegen Brute-Force

### Applicatieniveau

* Stel **Maximaal aantal inlogpogingen voordat account wordt geblokkeerd** (`login_max_attempt_before_blocking_account`) in op een kleine waarde (bijvoorbeeld 5).
* Schakel **CAPTCHA** in op de inlogpagina. CAPTCHA is aan/uit — het wordt niet automatisch ingeschakeld na N mislukte inlogpogingen. Combineer het met **CAPTCHA-fouten voordat account wordt geblokkeerd** (`captcha_number_mistakes_to_block_account`) om een account te blokkeren dat steeds de CAPTCHA niet haalt.

### Serverniveau

Gebruik **fail2ban** om inlogfouten te monitoren en aanvallende IP-adressen te blokkeren:

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

Maak een bijpassend filter in `/etc/fail2ban/filter.d/chamilo-auth.conf` om authenticatiefouten in logbestanden te matchen.

## Sessiebeheer

* Stel een redelijke **sessieleeftijd** in (bijvoorbeeld 3600 seconden / 1 uur) in de beveiligingsinstellingen.
* Configureer **sessiecookie-vlaggen** in uw Symfony-configuratie:

  ```yaml
  # config/packages/framework.yaml
  framework:
      session:
          cookie_secure: true      # Alleen verzenden via HTTPS
          cookie_httponly: true     # Niet toegankelijk via JavaScript
          cookie_samesite: lax     # CSRF-bescherming
  ```

* Overweeg het uitschakelen van "Onthoud mij" op platforms met gevoelige inhoud.

## HTTP Beveiligingsheaders

Configureer uw webserver om beveiligingsheaders te verzenden:

| Header | Waarde | Doel |
|--------|-------|---------|
| `X-Content-Type-Options` | `nosniff` | Voorkomt MIME-type sniffing. |
| `X-Frame-Options` | `SAMEORIGIN` | Voorkomt clickjacking via iframes. |
| `X-XSS-Protection` | `1; mode=block` | Verouderde XSS-bescherming voor oudere browsers. |
| `Referrer-Policy` | `strict-origin-when-cross-origin` | Beheert lekken van referrer-informatie. |
| `Content-Security-Policy` | Varieert | Beheert welke bronnen geladen kunnen worden. Vereist zorgvuldige afstemming voor Chamilo. |

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

## Beveiliging van Bestandsuploads

* Blokkeer uitvoerbare bestandsextensies (exe, bat, sh, php, phtml, cgi) in [Beveiligingsinstellingen](../platform-settings/security-settings.md).
* Configureer uw webserver om **nooit geüploade bestanden uit te voeren**. Voor Apache, voeg toe aan de gehele var/-map:

  ```apache
  <Directory /path/to/chamilo/var>
      php_admin_flag engine off
      RemoveHandler .php .phtml .php3 .php5
  </Directory>
  ```

* Scan geüploade bestanden met een antivirusprogramma (ClamAV) als uw omgeving dit vereist.

## Databasebeveiliging

* Gebruik een **specifieke databasegebruiker** voor Chamilo met alleen de benodigde rechten (SELECT, INSERT, UPDATE, DELETE, CREATE, ALTER, DROP, INDEX op de Chamilo-database).
* Gebruik niet het root-databaseaccount.
* Zorg ervoor dat de database niet toegankelijk is vanaf het openbare internet. Bind deze aan localhost of een privénetwerk.
* Schakel database-auditlogging in voor omgevingen waar naleving cruciaal is.

## Back-ups

* Plan **dagelijkse geautomatiseerde back-ups** van zowel de database als de geüploade bestanden.
* Sla back-ups op een aparte locatie op van de server (offsite of cloudopslag).
* Test periodiek het herstellen van back-ups om te verifiëren dat ze bruikbaar zijn.
* Versleutel back-ups als ze gevoelige gegevens bevatten.

Zie [Back-ups](../maintenance/backups.md) voor gedetailleerde instructies.

## Monitoring

* Controleer Chamilo-logboeken op `var/log/prod.log` voor fouten en verdachte activiteiten.
* Stel servermonitoring in (CPU, geheugen, schijf) om uitputting van bronnen te detecteren.
* Configureer waarschuwingen voor herhaalde authenticatiefouten.
* Controleer periodiek gebruikersaccounts op ongeautoriseerde of inactieve accounts.

## Checklist

Gebruik deze checklist bij het implementeren of controleren van een Chamilo-installatie:

- [ ] HTTPS ingeschakeld met geldig certificaat
- [ ] HTTP naar HTTPS-omleiding geconfigureerd
- [ ] `APP_ENV=prod` en `APP_DEBUG=0` in `.env`
- [ ] Unieke `APP_SECRET` gegenereerd
- [ ] Bestandsrechten beperkt (geen 777)
- [ ] Wachtwoordbeleid geconfigureerd
- [ ] Maximaal aantal inlogpogingen en CAPTCHA ingeschakeld
- [ ] Uitvoerbare bestandsextensies geblokkeerd
- [ ] Beveiligingsheaders geconfigureerd op webserver
- [ ] Sessiecookie-vlaggen ingesteld (secure, httponly, samesite)
- [ ] Databasegebruiker heeft minimale rechten
- [ ] Geautomatiseerde back-ups gepland en getest
- [ ] Logmonitoring ingesteld
- [ ] Chamilo-versie is actueel