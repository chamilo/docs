# Säkerhetsguide

Denna guide behandlar säkerhetsmässiga bästa praxis för att köra en Chamilo 3.0-plattform i produktion. Säkerhet är ett delat ansvar mellan plattformens programvara, din serverkonfiguration och löpande operativa rutiner.

För de inbyggda övervaknings- och granskningsverktyg som refereras genomgående i denna guide (loggar över inloggningsförsök, intrångsdetektering, skanningar av lösenordsstyrka och integritetskontroller av filer), se kapitlet [Säkerhet](../security/README.md).

## Håll Chamilo uppdaterat

Den viktigaste säkerhetsåtgärden är att hålla din Chamilo-installation uppdaterad.

* Prenumerera på Chamilo security-kontot på X (@chamilosecurity) eller bevaka GitHub-arkivet för versionsmeddelanden.
* Applicera säkerhetsuppdateringar omgående. Mindre uppdateringar inom 3.0-grenen är utformade för att vara säkra att tillämpa.
* Följ [uppgraderingsprocessen](../installation/upgrading.md) för varje uppdatering.

## HTTPS

Servera alltid Chamilo över HTTPS i produktion.

* Skaffa ett SSL/TLS-certifikat (Let's Encrypt tillhandahåller kostnadsfria certifikat via Certbot).
* Konfigurera din webbserver så att all HTTP-trafik omdirigeras till HTTPS.
* Aktivera HSTS-huvudet (HTTP Strict Transport Security) för att förhindra nedgraderingsattacker:

  ```
  Strict-Transport-Security: max-age=31536000; includeSubDomains
  ```

Utan HTTPS överförs inloggningsuppgifter, sessionscookies och all användardata i klartext och kan avlyssnas på nätverket.

## Filbehörigheter

Begränsa filbehörigheter till det minimum som krävs.

| Sökväg | Ägare | Behörigheter | Anmärkningar |
|------|-------|-------------|-------|
| Programfiler (källkod) | root eller deploy-användare | 755 (kataloger), 644 (filer) | Webbservern behöver endast läsåtkomst. |
| `var/` | webbserverns användare | 775 | Måste vara skrivbar för Symfony-cache, loggar och filuppladdningar |
| `.env` | root eller deploy-användare | 640 | Innehåller hemligheter. Webbservern behöver endast läsåtkomst vid normal användning, men behöver skrivåtkomst under installation. |
| `config/` | root eller deploy-användare | 750 | Innehåller hemligheter. Webbservern behöver endast läsåtkomst vid normal användning, men behöver skrivåtkomst under installation. |

Sätt aldrig behörigheter till 777. Kör aldrig webbservern som root.

## Lösenordspolicyer

Konfigurera starka lösenordskrav i [Säkerhetsinställningar](../platform-settings/security-settings.md):

* Minsta längd på 8 tecken (12+ rekommenderas).
* Kräv en blandning av versaler, gemener, siffror och specialtecken.
* Överväg att aktivera lösenordsutgång för miljöer som styrs av efterlevnadskrav.
* Utbilda användare i att välja starka, unika lösenord.

## Hastighetsbegränsning och skydd mot brute force

### Applikationsnivå

* Sätt **Max antal inloggningsförsök innan kontot blockeras** (`login_max_attempt_before_blocking_account`) till ett litet värde (till exempel 5).
* Aktivera **CAPTCHA** på inloggningssidan. CAPTCHA är på/av — den slås inte på automatiskt efter N misslyckade inloggningar. Kombinera den med **CAPTCHA-fel innan blockering** (`captcha_number_mistakes_to_block_account`) för att låsa ett konto som fortsätter att misslyckas med CAPTCHA.
* Granska rapporten [Inloggningsförsök](../security/login-attempts.md) regelbundet för att upptäcka brute force-mönster, och rapporten [Simple IDS](../security/simple-ids.md) för andra flaggade förfrågningar (XSS-försök, path traversal och liknande).

### Servernivå

Använd **fail2ban** för att övervaka inloggningsfel och blockera felande IP-adresser:

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

Skapa ett matchande filter i `/etc/fail2ban/filter.d/chamilo-auth.conf` för att matcha loggposter om autentiseringsfel.

## Sessionshantering

* Ange en rimlig **sessionstid** (t.ex. 3600 sekunder / 1 timme) i säkerhetsinställningarna.
* Konfigurera **session cookie flags** i din Symfony-konfiguration:

  ```yaml
  # config/packages/framework.yaml
  framework:
      session:
          cookie_secure: true      # Only send over HTTPS
          cookie_httponly: true     # Not accessible via JavaScript
          cookie_samesite: lax     # CSRF protection
  ```

* Överväg att inaktivera "Kom ihåg mig" på plattformar med känsligt innehåll.

## HTTP-säkerhetsrubriker

Konfigurera din webbserver så att den skickar säkerhetsrubriker:

| Rubrik | Värde | Syfte |
|--------|-------|---------|
| `X-Content-Type-Options` | `nosniff` | Förhindrar sniffning av MIME-typ. |
| `X-Frame-Options` | `SAMEORIGIN` | Förhindrar klickkapning via iframes. |
| `X-XSS-Protection` | `1; mode=block` | Äldre XSS-skydd för äldre webbläsare. |
| `Referrer-Policy` | `strict-origin-when-cross-origin` | Styr läckage av referrer-information. |
| `Content-Security-Policy` | Varierar | Styr vilka resurser som får läsas in. Kräver noggrann anpassning för Chamilo. |

Exempel för Apache:

```apache
Header always set X-Content-Type-Options "nosniff"
Header always set X-Frame-Options "SAMEORIGIN"
Header always set Referrer-Policy "strict-origin-when-cross-origin"
```

Exempel för Nginx:

```nginx
add_header X-Content-Type-Options "nosniff" always;
add_header X-Frame-Options "SAMEORIGIN" always;
add_header Referrer-Policy "strict-origin-when-cross-origin" always;
```

## Säkerhet vid filuppladdning

* Blockera körbara filändelser (exe, bat, sh, php, phtml, cgi) i [Säkerhetsinställningar](../platform-settings/security-settings.md).
* Konfigurera webbservern så att den **aldrig kör uppladdade filer**. För Apache, lägg till för hela katalogen var/:

  ```apache
  <Directory /path/to/chamilo/var>
      php_admin_flag engine off
      RemoveHandler .php .phtml .php3 .php5
  </Directory>
  ```

* Skanna uppladdade filer med ett antivirusprogram (ClamAV) om din miljö kräver det.

## Databassäkerhet

* Använd en **dedikerad databasanvändare** för Chamilo med endast de behörigheter som behövs (SELECT, INSERT, UPDATE, DELETE, CREATE, ALTER, DROP, INDEX på Chamilo-databasen).
* Använd inte root-kontot för databasen.
* Se till att databasen inte är tillgänglig från det publika internet. Bind den till localhost eller ett privat nätverk.
* Aktivera granskningsloggning för databasen i miljöer med efterlevnadskrav.

## Säkerhetskopior

* Schemalägg **dagliga automatiska säkerhetskopior** av både databasen och uppladdade filer.
* Lagra säkerhetskopior på en annan plats än servern (extern plats eller molnlagring).
* Testa återställning av säkerhetskopior regelbundet för att verifiera att de är användbara.
* Kryptera säkerhetskopior om de innehåller känsliga data.

Se [Säkerhetskopior](../maintenance/backups.md) för detaljerade instruktioner.

## Övervakning

* Övervaka Chamilo-loggarna i `var/log/prod.log` efter fel och misstänkt aktivitet.
* Sätt upp serverövervakning (CPU, minne, disk) för att upptäcka resursutmattning.
* Konfigurera larm vid upprepade autentiseringsfel.
* Granska användarkonton regelbundet efter obehöriga eller vilande konton.
* Schemalägg kontroller av [Filintegritet](../security/file-integrity.md) (Chamilo 3.0+) i cron för att få avisering när installerade filer ändras oväntat, och kör [Kontroll av lösenordsstyrka](../security/password-strength-checker.md) regelbundet, särskilt efter massimport av användare.

## Checklista

Använd denna checklista vid driftsättning eller granskning av en Chamilo-installation:

- [ ] HTTPS aktiverat med giltigt certifikat
- [ ] Omdirigering från HTTP till HTTPS konfigurerad
- [ ] `APP_ENV=prod` och `APP_DEBUG=0` i `.env`
- [ ] Unik `APP_SECRET` genererad
- [ ] Filbehörigheter begränsade (ingen 777)
- [ ] Lösenordspolicy konfigurerad
- [ ] Maximalt antal inloggningsförsök och CAPTCHA aktiverade
- [ ] Körbara filändelser blockerade
- [ ] Säkerhetsrubriker konfigurerade på webbservern
- [ ] Flaggor för sessionscookies inställda (secure, httponly, samesite)
- [ ] Databasanvändaren har minimala behörigheter
- [ ] Automatiska säkerhetskopior schemalagda och testade
- [ ] Baslinje för filintegritet etablerad och skanning schemalagd i cron (Chamilo 3.0+)
- [ ] Loggövervakning på plats
- [ ] Chamilo-versionen är aktuell