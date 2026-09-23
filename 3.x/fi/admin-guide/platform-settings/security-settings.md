# Tietoturva-asetukset

Kirjautumissuoja, salasanakäytäntö, sisältöturvaotsakkeet, kaksivaiheinen tunnistautuminen ja kevyt tunkeutumisen havaitsemisjärjestelmä.

Tämä sivu käsittelee tietoturva*käytäntöä*. Valvontatyökaluista, jotka seuraavat alustaa tämän käytännön perusteella (kirjautumisyrityslokit, tunkeutumisen havaitsemistapahtumat, salasanan vahvuuden tarkistukset ja tiedostojen eheyden tarkistukset), katso [Tietoturva](../security/README.md).

Näihin asetuksiin pääset kohdasta **Hallinta > Määritysasetukset > Tietoturva**. Tässä kategoriassa on **32 asetusta**, jotka on lueteltu alla alustan asetusten fixture-tiedostoissa (`SettingsCurrentFixtures.php`) toimitetuilla otsikoilla ja kommenteilla.

> Muuttujan nimi koodissa näytetään tasalevyisellä fontilla. Käytä sitä, kun skriptaat API:n kautta tai kun sinun on muutettava näitä asetuksia globaalilla tasolla muokkaamalla tiedostoa [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Asetukset

### `2fa_enable`

**Ota 2FA käyttöön**

Lisää salasanan päivityssivulle kentät 2FA:n käyttöönottoa varten TOTP-todennussovelluksella. Kun asetus on globaalisti pois käytöstä, käyttäjät eivät näe 2FA-kenttiä eikä heiltä pyydetä 2FA:ta kirjautumisen yhteydessä, vaikka he olisivat ottaneet sen aiemmin käyttöön.

*Oletus: `false`*

### `access_to_personal_file_for_all`

**Pääsy henkilökohtaiseen tiedostoon kaikille**

Sallii pääsyn kaikkiin henkilökohtaisiin tiedostoihin ilman rajoituksia

*Oletus: `false`*


### `admins_can_set_users_pass`

**Ylläpitäjät voivat asettaa käyttäjien salasanat manuaalisesti**

[päätelty] Kun käytössä, ylläpitäjät voivat asettaa käyttäjien salasanat suoraan manuaalisesti ilman, että käyttäjien tarvitsee nollata niitä.

### `allow_captcha`

**CAPTCHA**

Ota CAPTCHA käyttöön kirjautumislomakkeessa, ilmoittautumislomakkeessa ja unohtuneen salasanan lomakkeessa salasanan hakkaamisen estämiseksi

*Oletus: `false`*

### `allow_online_users_by_status`

**Suodata käyttäjät, jotka voidaan nähdä online-tilassa**

Rajoittaa online-käyttäjien näkyvyyden tiettyihin käyttäjärooleihin.

### `allow_strength_pass_checker`

**Salasanan vahvuuden tarkistin**

Ota tämä asetus käyttöön lisätäksesi visuaalisen indikaattorin salasanan vahvuudesta, kun käyttäjä vaihtaa salasanansa. Tämä EI estä heikkojen salasanojen lisäämistä, vaan toimii vain visuaalisena apuna.

*Oletus: `true`*


### `anonymous_autoprovisioning`

**Luo automaattisesti lisää anonyymejä käyttäjiä**

Luo dynaamisesti uusia anonyymejä käyttäjiä suuren kävijäliikenteen tukemiseksi.

*Oletus: `false`*


### `captcha_number_mistakes_to_block_account`

**CAPTCHA-virheiden sallittu määrä**

Kuinka monta kertaa käyttäjä voi tehdä virheen CAPTCHA-kentässä ennen kuin tili lukitaan.

### `captcha_time_to_block`

**CAPTCHA-tilin lukitusaika**

Jos käyttäjä saavuttaa kirjautumisvirheiden enimmäismäärän (CAPTCHA:a käytettäessä), tili lukitaan tälle minuuttimäärälle.

### `check_password`

**Tarkista salasanavaatimukset**

Ota käyttöön yllä määritettyjen salasanavaatimusten validointi salasanan luonnin tai päivityksen yhteydessä.

*Oletus: `false`*


### `file_integrity_check_notify_admins` **v3**

**Tiedostojen eheyden tarkistuksen ilmoitusten vastaanottajat**

Pilkuilla erotettu luettelo sähköpostiosoitteista, joille ilmoitetaan, kun tiedostojen eheyden tarkistus havaitsee muutoksen. Jätä tyhjäksi, jos ilmoitus lähetetään kaikille globaaleille ylläpitäjille.

### `filter_terms`

**Suodatettavat termit**

Anna luettelo termeistä, yksi per rivi, jotka suodatetaan pois verkkosivuilta ja sähköposteista. Nämä termit korvataan merkeillä ***.

### `force_renew_password_at_first_login`

**Pakota salasanan uusiminen ensimmäisellä kirjautumisella**

Tämä on yksinkertainen toimenpide portaalin tietoturvan parantamiseksi: käyttäjiä pyydetään vaihtamaan salasanansa heti, jotta sähköpostitse toimitettu salasana ei ole enää voimassa ja he käyttävät sen jälkeen itse keksimäänsä salasanaa, jonka vain he tietävät.

*Oletus: `false`*


### `hide_breadcrumb_if_not_allowed`

**Piilota murupolku, jos 'ei sallittu'**

Jos käyttäjällä ei ole oikeutta tietylle sivulle, piilota myös murupolku. Tämä parantaa tietoturvaa välttämällä tarpeettoman tiedon näyttämistä.

*Oletus: `false`*


### `login_max_attempt_before_blocking_account`

**Enimmäiskirjautumisyritykset ennen lukitusta**

Epäonnistuneiden kirjautumisyritysten määrä, joka sallitaan ennen kuin käyttäjätili lukitaan ja ylläpitäjän on avattava se.

*Oletus: `0`*

### `password_requirements`

**Salasanan minimisyntaksivaatimukset**

Määrittää käyttäjien salasanojen vaaditun rakenteen. Esimerkki: {"min":{"length":8,"lowercase":1,"uppercase":1,"numeric":1,"specials":1}}. Käytä avainta "specials" (monikko) vaatiaksesi erikoismerkkejä.

### `password_rotation_days`

**Salasanan kiertojakso (päivää)**

Päivien määrä, jonka jälkeen käyttäjien on vaihdettava salasanansa (0 = pois käytöstä).

*Oletus: `0`*


### `prevent_multiple_simultaneous_login`

**Estä samanaikainen kirjautuminen**

Estä käyttäjiä kirjautumasta samalla tilillä useammin kuin kerran. Tämä on hyvä vaihtoehto maksullisissa portaaleissa, mutta voi olla rajoittavaa testauksessa, koska vain yksi selain voi olla yhteydessä millä tahansa annetulla tilillä.

*Oletus: `false`*

### `proxy_settings`

**Välityspalvelinasetukset**

Jotkin Chamilon ominaisuudet muodostavat yhteyden ulkomaailmaan palvelimelta. Esimerkiksi varmistaakseen, että ulkoinen sisältö on olemassa linkkiä luotaessa tai upotettua sivua näytettäessä oppimispolussa. Jos Chamilo-palvelimesi käyttää välityspalvelinta päästäkseen ulos verkostaan, se määritetään tässä.

### `security_block_inactive_users_immediately`

**Estä poistetut käyttäjät välittömästi**

Estä välittömästi käyttäjät, jotka ylläpitäjä on poistanut käytöstä käyttäjähallinnan kautta. Muussa tapauksessa poistetut käyttäjät säilyttävät aiemmat oikeutensa, kunnes he kirjautuvat ulos.

*Oletus: `false`*


### `security_content_policy`

**Content Security Policy**

Content Security Policy on tehokas keino suojata sivustoa XSS-hyökkäyksiltä. Hyväksyttyjen sisältölähteiden salliminen estää selainta lataamasta haitallisia resursseja. Tämä asetus on erityisen monimutkainen WYSIWYG-editorien kanssa, mutta jos lisäät kaikki verkkotunnukset, joille haluat sallia iframe-upotuksen, child-src-lauseeseen, tämän esimerkin pitäisi toimia. Voit estää JavaScriptin suorittamisen ulkoisista lähteistä (mukaan lukien SVG-kuvien sisältä) käyttämällä tiukkaa luetteloa 'script-src'-argumentissa. Jätä tyhjäksi poistaaksesi käytöstä. Esimerkkiasetus: default-src 'self'; script-src 'self' 'unsafe-eval' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; child-src 'self' *.youtube.com yt.be *.vimeo.com *.slideshare.com;

### `security_content_policy_report_only`

**Content Security Policy vain raportointi**

Tämä asetus mahdollistaa kokeilun raportoimalla mutta ei pakottamalla osaa Content Security Policy -käytännöstä.

### `security_public_key_pins`

**HTTP Public Key Pinning**

HTTP Public Key Pinning suojaa sivustoa MiTM-hyökkäyksiltä, jotka käyttävät väärennettyjä X.509-varmenteita. Sallimalla vain ne identiteetit, joihin selaimen tulisi luottaa, käyttäjät ovat suojassa, jos varmenteen myöntäjä vaarantuu.

### `security_public_key_pins_report_only`

**HTTP Public Key Pinning vain raportointi**

Tämä asetus mahdollistaa kokeilun raportoimalla mutta ei pakottamalla osaa HTTP Public Key Pinning -käytännöstä.

### `security_referrer_policy`

**Security Referrer Policy**

Referrer Policy on uusi otsake, jonka avulla sivusto voi hallita, kuinka paljon tietoja selain sisällyttää siirryttäessä pois asiakirjasta, ja sen tulisi olla asetettuna kaikilla sivustoilla.

*Oletus: `origin-when-cross-origin`*


### `security_session_cookie_samesite_none`

**Istuntocookien samesite**

Ota käyttöön samesite:None-parametri istuntocookielle. Lisätietoja: https://www.chromium.org/updates/same-site ja https://developers.google.com/search/blog/2020/01/get-ready-for-new-samesitenone-secure

*Oletus: `false`*

### `security_strict_transport`

**HTTP Strict Transport Security**

HTTP Strict Transport Security on erinomainen ominaisuus sivustollesi, ja se vahvistaa TLS-toteutustasi saamalla User Agentin pakottamaan HTTPS:n käytön. Suositeltu arvo: 'strict-transport-security: max-age=63072000; includeSubDomains'. Katso https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Strict-Transport-Security. Voit sisällyttää 'preload'-liitteen, mutta tällä on seurauksia ylätason verkkotunnukseen (TLD), joten sitä ei kannata tehdä kevyin perustein. Katso https://hstspreload.org/. Jätä tyhjäksi poistaaksesi käytöstä.

### `security_x_content_type_options`

**X-Content-Type-Options**

X-Content-Type-Options estää selainta yrittämästä MIME-sniffata sisältötyyppiä ja pakottaa sen pysymään ilmoitetussa content-type-arvossa. Ainoa kelvollinen arvo tälle otsakkeelle on 'nosniff'.

*Oletus: `nosniff`*


### `security_x_frame_options`

**X-Frame-Options**

X-Frame-Options kertoo selaimelle, haluatko sallia sivustosi kehystämisen vai et. Estämällä selainta kehystämästä sivustoasi voit puolustautua hyökkäyksiltä, kuten clickjackingilta. Jos määrität tähän URL-osoitteen, sen tulisi määritellä URL-osoite(t), joista sisältösi pitäisi olla näkyvissä, ei URL-osoitteita, joista sivustosi hyväksyy sisältöä. Esimerkiksi jos pää-URL-osoitteesi (root_web yllä) on https://11.chamilo.org/, tämän asetuksen tulisi olla: 'ALLOW-FROM https://11.chamilo.org'. Nämä otsakkeet koskevat vain sivuja, joilla Chamilo vastaa HTTP-otsakkeiden luonnista (eli '.php'-tiedostoja). Ne eivät koske staattisia tiedostoja. Jos kokeilet tätä ominaisuutta, varmista, että päivität myös verkkopalvelimen kokoonpanon lisäämällä oikeat otsakkeet staattisille tiedostoille. Katso CDN-kokoonpanon dokumentaatio yllä (hae 'add_header') saadaksesi lisätietoja. Suositeltu (tiukka) arvo tälle asetukselle, jos se on käytössä: 'SAMEORIGIN'.

*Oletus: `SAMEORIGIN`*


### `security_xss_protection`

**X-XSS-Protection**

X-XSS-Protection asettaa kokoonpanon useimpiin selaimiin sisäänrakennetulle cross-site scripting -suodattimelle. Suositeltu arvo '1; mode=block'.

*Oletus: `1; mode=block`*


### `user_reset_password`

**Ota käyttöön salasanan nollauksen tunnus**

Tämä vaihtoehto mahdollistaa vanhenevan kertakäyttöisen tunnuksen luomisen, joka lähetetään käyttäjälle sähköpostitse salasanan nollaamista varten.

*Oletus: `false`*

### `user_reset_password_token_limit`

**Salasanan nollauksen tunnisteen aikaraja**

Sekuntien määrä, jonka jälkeen luotu tunniste vanhenee automaattisesti eikä sitä voi enää käyttää (uusi tunniste on luotava).

*Oletus: `3600`*