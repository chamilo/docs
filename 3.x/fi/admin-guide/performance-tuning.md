# Suorituskyvyn viritys

Suorituskykyasetukset auttavat optimoimaan Chamiloa nopeampia sivulatauksia ja parempaa resurssien käyttöä varten, erityisesti alustoilla, joilla on paljon samanaikaisia käyttäjiä.

> **Lisäviite**: Chamilo-asennukseesi sisältyy laajennettu optimointiopas. Avaa selaimessa `/documentation/optimization.html` (esim. `https://your-chamilo-site/documentation/optimization.html`) saadaksesi versiosi mukaiset palvelintason suositukset.

## Symfony-välimuisti

Chamilo 3.0 on rakennettu Symfonyn päälle, joka käyttää käännettyä välimuistia reititykseen, riippuvuusinjektioon ja mallipohjiin. Tämän välimuistin hallinta on suorituskyvyn kannalta olennaista.

### Välimuistin tyhjennys

Konfiguraatiomuutosten, käyttöönoton tai päivitysten jälkeen tyhjennä Symfony-välimuisti:

```bash
# Clear cache for the current environment
php bin/console cache:clear

# For production environments specifically
php bin/console cache:clear --env=prod
```

Tuotannossa varmista aina, että `APP_ENV=prod` on asetettu `.env.local`-tiedostossasi. Kehitysympäristö (`APP_ENV=dev`) sisältää runsaasti virheenkorjauskuormaa, eikä sitä saa koskaan käyttää tuotannossa.

### Välimuistin esilämmitys

Välimuistin tyhjennyksen jälkeen lämmitä se esikääntääksesi mallipohjat ja konfiguraation:

```bash
php bin/console cache:warmup --env=prod
```

## Välimuististrategiat

| Strategia | Kuvaus |
|----------|-------------|
| **OPcache** | PHP:n sisäänrakennettu opcode-välimuisti. Varmista, että se on käytössä `php.ini`-tiedostossa riittävällä muistilla (`opcache.memory_consumption=256`). Tämä on yksittäisenä toimenpiteenä vaikuttavin suorituskykyoptimointi. |
| **APCu** | Symfony käyttää muistissa olevaa avain–arvo-välimuistia metatietojen tallentamiseen. Asenna APCu PHP -laajennus ja määritä se Symfony-välimuistikonfiguraatiossa. |
| **Redis / Memcached** | Vilkkaasti liikennöidyillä alustoilla määritä ulkoinen välimuistitausta. Aseta välimuistisovitin tiedostossa `config/packages/cache.yaml`. |

### Suositellut OPcache-asetukset

```ini
opcache.enable=1
opcache.memory_consumption=256
opcache.max_accelerated_files=20000
opcache.validate_timestamps=0   ; Set to 0 in production for best performance
opcache.revalidate_freq=0
```

Kun `validate_timestamps` on asetettu arvoon 0, OPcache on tyhjennettävä uuden koodin käyttöönoton jälkeen (käynnistä PHP-FPM uudelleen tai kutsu `opcache_reset()`).

## Laiska lataus

| Asetus | Kuvaus |
|---------|-------------|
| **Kuvien laiska lataus** | Ottaa käyttöön kuvien `loading="lazy"`-attribuutin, jotta näkymän ulkopuoliset kuvat ladataan vasta, kun ne vieritetään näkyviin. Lyhentää alkuperäistä sivun latausaikaa. |
| **JavaScriptin viivästetty lataus** | Lataa ei-kriittiset JavaScript-tiedostot asynkronisesti, jotta sivun renderöinti ei esty. |

## CDN (sisällönjakeluverkko)

Alustoilla, jotka palvelevat käyttäjiä useilla maantieteellisillä alueilla, CDN voi merkittävästi parantaa staattisten resurssien (CSS, JavaScript, kuvat) latausaikoja.

CDN:n määrittäminen:

1. Luo CDN-jakelu (esim. CloudFront, Cloudflare tai muu palveluntarjoaja), joka osoittaa Chamilo-palvelimeesi.
2. Määritä resurssien perus-URL ympäristössäsi tai Symfony-konfiguraatiossa, jotta staattiset resurssit palvellaan CDN:n kautta.
3. Aseta staattisille tiedostoille sopivat välimuistiotsakkeet (pitkä vanhenemisaika versioiduille resursseille).

## Tietokannan optimointi

| Toimenpide | Kuvaus |
|--------|-------------|
| **Käytä tietokantayhteyksien poolingia** | Korkean rinnakkaisuuden alustoilla määritä yhteyksien pooling vähentääksesi tietokantayhteyksien avaamisen aiheuttamaa kuormaa. |
| **Optimoi kyselyt** | Chamilo sisältää tietokantaindeksit yleisille kyselyille. Suorita `ANALYZE TABLE` säännöllisesti MySQL-/MariaDB-ympäristössä, jotta kyselysuunnittelijan tilastot pysyvät ajan tasalla. |
| **Erillinen tietokantapalvelin** | Suurissa asennuksissa aja tietokanta omalla palvelimellaan sen sijaan, että jaat resurssit WWW-palvelimen kanssa. |

## WWW-palvelimen konfiguraatio

| Optimointi | Kuvaus |
|--------------|-------------|
| **Ota gzip-/brotli-pakkaus käyttöön** | Pakkaa HTML-, CSS- ja JavaScript-vastaukset. Useimmat WWW-palvelimet tukevat tätä natiivisti. |
| **Staattisten tiedostojen välimuistitus** | Aseta staattisille resursseille pitkät `Cache-Control`- ja `Expires`-otsakkeet. |
| **PHP-FPM:n viritys** | Säädä `pm.max_children`, `pm.start_servers` ja `pm.max_requests` käytettävissä olevan RAM-muistin ja odotetun rinnakkaisuuden mukaan. |
| **HTTP/2** | Ota HTTP/2 käyttöön WWW-palvelimessasi multipleksoituja yhteyksiä ja otsakkeiden pakkausta varten. |

## Vinkkejä

* **OPcache on yksittäisenä toimenpiteenä suurin voitto** -- Varmista, että se on käytössä ja oikein mitoitettu, ennen kuin etenet muihin optimointeihin.
* **Älä koskaan aja tuotantoa asetuksella `APP_ENV=dev`** -- Virheenkorjauspalkki ja profilointityökalu lisäävät merkittävää kuormaa jokaiseen pyyntöön.
* **Seuraa ennen viritystä** -- Käytä työkaluja, kuten New Relic, Blackfire tai Symfonyn sisäänrakennettu profilointityökalu (kehitystilassa), tunnistaaksesi todelliset pullonkaulat arvailun sijaan.
* **Lämmitä välimuisti jokaisen käyttöönoton jälkeen**, jotta ensimmäinen käyttäjä ei osu hitaaseen, välimuistittomaan pyyntöön.