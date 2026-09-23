# Tietoturvaopas

Tämä opas käsittelee tietoturvan parhaita käytäntöjä Chamilo 3.0 -alustan tuotantokäyttöön. Tietoturva on jaettu vastuu alustan ohjelmiston, palvelimen määritysten ja jatkuvien operatiivisten käytäntöjen kesken.

Tässä oppaassa viitattuihin sisäänrakennettuihin valvonta- ja auditointityökaluihin (kirjautumisyrityslokit, tunkeutumisen havaitseminen, salasanan vahvuuden tarkistukset ja tiedostojen eheyden tarkistukset) tutustu lukuun [Tietoturva](../security/README.md).

## Pidä Chamilo ajan tasalla

Tärkein tietoturvakäytäntö on pitää Chamilo-asennus ajan tasalla.

* Tilaa Chamilon tietoturva-X-tili (@chamilosecurity) tai seuraa GitHub-repositoriota julkistusilmoitusten varalta.
* Ota tietoturvakorjaukset käyttöön viipymättä. 3.0-haaran pienet päivitykset on suunniteltu turvallisiksi ottaa käyttöön.
* Nouda kunkin päivityksen [päivitysprosessia](../installation/upgrading.md).

## HTTPS

Palvele Chamiloa tuotannossa aina HTTPS:n yli.

* Hanki SSL/TLS-varmenne (Let's Encrypt tarjoaa ilmaisia varmenteita Certbotin kautta).
* Määritä verkkopalvelin ohjaamaan kaikki HTTP-liikenne HTTPS:ään.
* Ota käyttöön HSTS-otsake (HTTP Strict Transport Security) estämään alennushyökkäykset:

  ```
  Strict-Transport-Security: max-age=31536000; includeSubDomains
  ```

Ilman HTTPS:ää kirjautumistunnukset, istuntocookiet ja kaikki käyttäjätiedot siirretään selväkielisenä ja ne voidaan siepata verkossa.

## Tiedosto-oikeudet

Rajoita tiedosto-oikeudet minimiin, joka on välttämätön.

| Polku | Omistaja | Oikeudet | Huomautukset |
|------|-------|-------------|-------|
| Sovellustiedostot (lähdekoodi) | root tai deploy-käyttäjä | 755 (hakemistot), 644 (tiedostot) | Verkkopalvelin tarvitsee vain luku -oikeuden. |
| `var/` | verkkopalvelimen käyttäjä | 775 | Täytyy olla kirjoitettavissa Symfony-välimuistia, lokeja ja tiedostolatauksia varten |
| `.env` | root tai deploy-käyttäjä | 640 | Sisältää salaisuuksia. Verkkopalvelin tarvitsee vain luku -oikeuden normaalikäytössä, mutta kirjoitusoikeuden asennuksen aikana. |
| `config/` | root tai deploy-käyttäjä | 750 | Sisältää salaisuuksia. Verkkopalvelin tarvitsee vain luku -oikeuden normaalikäytössä, mutta kirjoitusoikeuden asennuksen aikana. |

Älä koskaan aseta oikeuksia arvoon 777. Älä koskaan suorita verkkopalvelinta root-käyttäjänä.

## Salasanakäytännöt

Määritä vahvat salasanavaatimukset kohdassa [Tietoturva-asetukset](../platform-settings/security-settings.md):

* Vähimmäispituus 8 merkkiä (suositus 12+).
* Vaadi isoja ja pieniä kirjaimia, numeroita ja erikoismerkkejä.
* Harkitse salasanan vanhenemisen käyttöönottoa vaatimustenmukaisuuslähtöisissä ympäristöissä.
* Opasta käyttäjiä valitsemaan vahvoja, yksilöllisiä salasanoja.

## Nopeusrajoitus ja brute-force-suojaus

### Sovellustaso

* Aseta **Enimmäiskirjautumisyritykset ennen tilin estämistä** (`login_max_attempt_before_blocking_account`) pieneksi arvoksi (esimerkiksi 5).
* Ota **CAPTCHA** käyttöön kirjautumissivulla. CAPTCHA on päällä/pois — sitä ei kytketä automaattisesti N epäonnistuneen kirjautumisen jälkeen. Yhdistä se asetukseen **CAPTCHA-virheet ennen estämistä** (`captcha_number_mistakes_to_block_account`) lukitaksesi tilin, joka epäonnistuu CAPTCHAssa toistuvasti.
* Tarkista [Kirjautumisyritykset](../security/login-attempts.md) -raportti säännöllisesti brute-force-kuvioiden havaitsemiseksi ja [Simple IDS](../security/simple-ids.md) -raportti muista merkittyistä pyynnöistä (XSS-yritykset, polun läpikäynti ja vastaavat).

### Palvelintaso

Käytä **fail2ban**-työkalua kirjautumisvirheiden valvontaan ja hyökkäävien IP-osoitteiden estämiseen:

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

Luo vastaava suodatin tiedostoon `/etc/fail2ban/filter.d/chamilo-auth.conf` tunnistamaan todennuksen epäonnistumisen lokimerkinnät.

## Istuntojen hallinta

* Aseta kohtuullinen **istunnon elinikä** (esim. 3600 sekuntia / 1 tunti) tietoturva-asetuksissa.
* Määritä **istuntocookien liput** Symfony-määrityksessäsi:

  ```yaml
  # config/packages/framework.yaml
  framework:
      session:
          cookie_secure: true      # Only send over HTTPS
          cookie_httponly: true     # Not accessible via JavaScript
          cookie_samesite: lax     # CSRF protection
  ```

* Harkitse "Muista minut" -toiminnon poistamista käytöstä alustoilla, joilla on arkaluonteista sisältöä.

## HTTP-turvaotsakkeet

Määritä verkkopalvelimesi lähettämään turvaotsakkeet:

| Otsake | Arvo | Tarkoitus |
|--------|-------|---------|
| `X-Content-Type-Options` | `nosniff` | Estää MIME-tyypin nuuskimisen. |
| `X-Frame-Options` | `SAMEORIGIN` | Estää clickjacking-hyökkäykset iframe-kehyksillä. |
| `X-XSS-Protection` | `1; mode=block` | Vanhempien selainten perinteinen XSS-suojaus. |
| `Referrer-Policy` | `strict-origin-when-cross-origin` | Hallitsee viittaajatietojen vuotamista. |
| `Content-Security-Policy` | Vaihtelee | Hallitsee, mitä resursseja voidaan ladata. Vaatii huolellista säätöä Chamiloa varten. |

Esimerkki Apachelle:

```apache
Header always set X-Content-Type-Options "nosniff"
Header always set X-Frame-Options "SAMEORIGIN"
Header always set Referrer-Policy "strict-origin-when-cross-origin"
```

Esimerkki Nginxille:

```nginx
add_header X-Content-Type-Options "nosniff" always;
add_header X-Frame-Options "SAMEORIGIN" always;
add_header Referrer-Policy "strict-origin-when-cross-origin" always;
```

## Tiedostojen latauksen tietoturva

* Estä suoritettavat tiedostopäätteet (exe, bat, sh, php, phtml, cgi) kohdassa [Tietoturva-asetukset](../platform-settings/security-settings.md).
* Määritä verkkopalvelimesi **älä koskaan suorittamaan ladattuja tiedostoja**. Apachella lisää koko var/-hakemistoon:

  ```apache
  <Directory /path/to/chamilo/var>
      php_admin_flag engine off
      RemoveHandler .php .phtml .php3 .php5
  </Directory>
  ```

* Skannaa ladatut tiedostot virustorjuntaohjelmalla (ClamAV), jos ympäristösi sitä edellyttää.

## Tietokannan tietoturva

* Käytä Chamilolle **erillistä tietokantakäyttäjää**, jolla on vain tarvittavat oikeudet (SELECT, INSERT, UPDATE, DELETE, CREATE, ALTER, DROP, INDEX Chamilo-tietokantaan).
* Älä käytä root-tietokantatiliä.
* Varmista, ettei tietokanta ole saavutettavissa julkisesta internetistä. Sido se localhostiin tai yksityiseen verkkoon.
* Ota käyttöön tietokannan auditointiloki vaatimustenmukaisuudelle herkissä ympäristöissä.

## Varmuuskopiot

* Ajoita **päivittäiset automaattiset varmuuskopiot** sekä tietokannasta että ladatuista tiedostoista.
* Säilytä varmuuskopiot erillisessä sijainnissa palvelimesta (offsite tai pilvitallennus).
* Testaa varmuuskopioiden palautusta säännöllisesti varmistaaksesi, että varmuuskopiot ovat käyttökelpoisia.
* Salaa varmuuskopiot, jos ne sisältävät arkaluonteista dataa.

Katso yksityiskohtaiset ohjeet kohdasta [Varmuuskopiot](../maintenance/backups.md).

## Seuranta

* Seuraa Chamilon lokeja polussa `var/log/prod.log` virheiden ja epäilyttävän toiminnan varalta.
* Ota käyttöön palvelinseuranta (CPU, muisti, levy) resurssien loppumisen havaitsemiseksi.
* Määritä hälytykset toistuville todennusvirheille.
* Tarkista käyttäjätilit säännöllisesti luvattomien tai käyttämättömien tilien varalta.
* Ajoita [Tiedostojen eheyden](../security/file-integrity.md) tarkistukset (Chamilo 3.0+) croniin, jotta saat ilmoituksen, kun asennetut tiedostot muuttuvat odottamatta, ja suorita [Salasanan vahvuuden tarkistin](../security/password-strength-checker.md) säännöllisesti, erityisesti joukkokäyttäjätuontien jälkeen.

## Tarkistuslista

Käytä tätä tarkistuslistaa Chamilo-asennuksen käyttöönotossa tai auditoinnissa:

- [ ] HTTPS käytössä voimassa olevalla varmenteella
- [ ] HTTP–HTTPS-uudelleenohjaus määritetty
- [ ] `APP_ENV=prod` ja `APP_DEBUG=0` tiedostossa `.env`
- [ ] Yksilöllinen `APP_SECRET` luotu
- [ ] Tiedosto-oikeudet rajoitettu (ei 777)
- [ ] Salasanakäytäntö määritetty
- [ ] Kirjautumisyritysten enimmäismäärä ja CAPTCHA käytössä
- [ ] Suoritettavat tiedostopäätteet estetty
- [ ] Turvaotsakkeet määritetty verkkopalvelimelle
- [ ] Istuntocookien liput asetettu (secure, httponly, samesite)
- [ ] Tietokantakäyttäjällä on minimioikeudet
- [ ] Automaattiset varmuuskopiot ajoitettu ja testattu
- [ ] Tiedostojen eheyden perusviiva luotu ja skannaus ajoitettu croniin (Chamilo 3.0+)
- [ ] Lokiseuranta käytössä
- [ ] Chamilo-versio on ajan tasalla