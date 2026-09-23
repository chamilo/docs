# Palvelinvaatimukset

Ennen Chamilo 3.0:n asennusta varmista, että palvelimesi täyttää seuraavat vaatimukset.

## Ohjelmistovaatimukset

### PHP

| Vaatimus | Minimi | Suositus |
|-------------|---------|-------------|
| **PHP-versio** | 8.3 | 8.5 |

### Vaaditut PHP-laajennukset

| Laajennus | Tarkoitus |
|-----------|---------|
| **bcmath** | Mielivaltaisen tarkkuuden matematiikka |
| **ctype** | Merkkityypin tarkistus |
| **curl** | HTTP-pyynnöt (API-integraatiot, ulkoiset palvelut) |
| **dom**, **libxml**, **simplexml**, **xml**, **xmlreader** | XML-jäsentäminen ja DOM-käsittely (SCORM, RSS, SOAP, LTI) |
| **exif** | Kuvien metatietojen lukeminen (esim. ladattujen valokuvien automaattinen suuntaaminen) |
| **fileinfo** | MIME-tyypin tunnistus ladatuille tiedostoille |
| **gd** | Kuvankäsittely (pikkukuvat, CAPTCHA) |
| **iconv** | Merkistömuunnos |
| **intl** | Kansainvälistäminen (päivämäärän, numeroiden ja merkkijonojen muotoilu) |
| **json** | JSON-koodaus/purku |
| **ldap** | LDAP-liitin. Vaikka et todennäköisesti käytä LDAP:ia, Chamilo vaatii sen |
| **mbstring** | Monitavuisten merkkijonojen käsittely (UTF-8-tuki) |
| **openssl** | Kryptografiset toiminnot (HTTPS, salasanan hajautus, JWT-tunnukset) |
| **pdo**, plus **pdo_mysql** tai **pdo_pgsql** | Tietokantayhteys (asenna tietokantaasi vastaava ajuri) |
| **soap** | SOAP-verkkopalveluiden käsittely |
| **zip** | ZIP-arkistojen käsittely (SCORM-paketit, joukkoon tuonnit/viennit) |
| **zlib** | Pakkaus, jota useat riippuvuudet käyttävät sisäisesti |
| **apcu** | Käyttäjätason välimuisti (suositeltu, asennusohjelma tarkistaa mutta ei vaadi) |
| **opcache** | Opcode-välimuisti (vahvasti suositeltu suorituskyvyn vuoksi, asennusohjelma tarkistaa mutta ei vaadi) |
| **xapian** | Kokotekstihaku (valinnainen, vain jos käytät hakua) |

### Tietokanta

| Tietokanta | Minimiversio | Suositus |
|----------|-----------------|-------------|
| **MariaDB** | 10.0 | 10.4 tai uudempi |
| **MySQL** | 5.7 | 8.0 tai uudempi |

MariaDB-versiot vanhemmat kuin 10.2.2 (ja MySQL-versiot vanhemmat kuin 5.7) tarvitsevat suurten indeksien/etuliitteiden tuen käyttöön manuaalisesti palvelinkonfiguraatiossa ennen Chamilon asennusta.

### Verkkopalvelin

| Palvelin | Huomautukset |
|--------|-------|
| **Apache** | Vaatii `mod_rewrite`-moduulin (sekä `ssl`, `headers`, `expires`) käyttöön. Chamilo sisältää esimerkkivhostin polussa `public/main/install/apache.dist.conf`. |
| **Nginx** | Vaatii manuaalisen konfiguraation URL-uudelleenkirjoitusta varten — Chamilo ei sisällä Nginx-esimerkkikonfiguraatiota. Katso viitekonfiguraatio Symfony Nginx -dokumentaatiosta. |

### Rakennustyökalut

| Työkalu | Tarkoitus |
|------|---------|
| **Composer** (^2.8) | PHP-riippuvuuksien hallinta. Tarvitaan Chamilon PHP-kirjastojen asennukseen. |
| **Node.js** (20+ LTS) | JavaScript-ajonaikainen ympäristö. Tarvitaan frontend-resurssien rakentamiseen. |
| **Yarn** (^4, Corepackin kautta) | JavaScript-paketinhallinta, jota käytetään frontend-resurssien rakentamiseen (`yarn install`, `yarn encore production`). |

## Laitteistovaatimukset

| Resurssi | Minimi | Suositus |
|----------|---------|-------------|
| **RAM** | 4 GB | 8 GB tai enemmän (frontend-resurssien rakentaminen lähdekoodista vaatii yksinään vähintään 4 GB) |
| **CPU** | 2 vCPU:ta | 2+ ydintä |
| **Levytila** | 4 GB (vain sovellus) | 20+ GB (mukaan lukien ladattu sisältö); lähdekoodista rakentaminen vaatii ~10 GB vapaata tilaa rakentamisen aikana |
| **Levytyyppi** | HDD | SSD (parantaa merkittävästi tietokannan ja välimuistin suorituskykyä) |

Nämä ovat Chamilon oman asennusoppaan perusluvut. Todelliset vaatimukset riippuvat samanaikaisten käyttäjien määrästä ja isännöidyn sisällön määrästä.

## Käyttöjärjestelmä

| Käyttöjärjestelmä | Huomautukset |
|----|-------|
| **Linux** | Suositeltu. Ubuntu 24.04 LTS+, Debian 12+, AlmaLinux 9+ tai vastaava. |
| **Windows** | Mahdollinen mutta ei perusteellisesti testattu. Käytä WSL2:ta kehitykseen. |
| **macOS** | Vain kehitykseen / testaamaton. |

## Verkkovaatimukset

* Verkkotunnus, joka osoittaa palvelimeesi.
* SSL/TLS-varmenne HTTPS:ää varten (Let's Encrypt tarjoaa ilmaisia varmenteita).
* Lähtevä SMTP-yhteys, jos sähköpostit lähetetään suoraan (tai käytä kolmannen osapuolen sähköpostipalvelua).
* Portti 443 (HTTPS) ja valinnaisesti portti 80 (HTTP, uudelleenohjaus HTTPS:ään).

## Vaatimusten tarkistaminen

Kun Chamilon lähdekoodi on sijoitettu palvelimelle, voit tarkistaa PHP-konfiguraatiosi suoraan:

```bash
php -m          # List installed extensions
php -i          # Full PHP info
```

## Vinkkejä

* **Käytä PHP-FPM:ää** Apachen tai Nginxin kanssa parempaan suorituskykyyn kuin mod_php.
* **Erota tietokanta** omalle palvelimelleen alustoilla, joilla odotetaan yli 500 samanaikaista käyttäjää.
* **Käytä SSD-tallennusta** -- Tietokantapainotteiset sovellukset kuten Chamilo hyötyvät merkittävästi nopeasta levyn I/O:sta.