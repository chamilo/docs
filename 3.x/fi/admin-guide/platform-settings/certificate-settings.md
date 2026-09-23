# Todistusten asetukset

Oletukset, joita sovelletaan, kun oppija saa todistuksen arviointikirjasta.

Näihin asetuksiin pääsee kohdasta **Hallinta > Määritysasetukset > Todistukset**. Tässä kategoriassa on **11 asetusta**, jotka on lueteltu alla otsikon ja kommentin kanssa sellaisina kuin ne toimitetaan alustan asetusten fixtureissa (`SettingsCurrentFixtures.php`).

> Muuttujan nimi koodissa näytetään tasalevyisellä fontilla. Käytä sitä, kun skriptaat API:n kautta tai kun sinun on muutettava näitä asetuksia globaalilla tasolla muokkaamalla tiedostoa [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Asetukset

### `add_certificate_pdf_footer`

**Lisää alatunniste PDF-todistusvientiin**

Kun käytössä, PDF-todistusvientiin lisätään alatunniste.

*Oletus: `false`*

### `add_gradebook_certificates_cron_task_enabled` **v3**

**Todistusten automaattinen luonti WS-kutsussa**

Kun käytössä ja kun käytetään WSCertificatesList-verkkopalvelua, tämä asetus varmistaa, että kaikki todistukset on luotu käyttäjille, jos he ovat saavuttaneet riittävän pistemäärän kaikissa arviointikirjoissa määritellyissä kohteissa kaikilla kursseilla ja sessioilla (tämä voi kuluttaa huomattavasti palvelimesi prosessointiresursseja).

*Oletus: `false`*

### `allow_certificates_search` **v3**

**Salli todistusten haku**

Salli käyttäjien ja vierailijoiden hakea luotuja todistuksia yläpalkin valikosta.

*Oletus: `false`*

### `allow_general_certificate`

**Ota käyttöön yleinen todistus**

Yleinen todistus on todistus, joka kokoaa yhteen kaikki käyttäjän saavutukset kursseilla, joita hän on seurannut.

*Oletus: `false`*

### `allow_public_certificates`

**Salli julkiset todistukset**

Käyttäjien todistuksia voivat tarkastella rekisteröitymättömät käyttäjät.

*Oletus: `false`*

### `certificate_filter_by_official_code`

**Todistusten suodatus virallisella koodilla**

Lisää opiskelijoiden viralliseen koodiin perustuva suodatin todistusluetteloon.

*Oletus: `false`*

### `certificate_pdf_orientation`

**PDF-suunta todistuksille**

Aseta ‘portrait’ tai ‘landscape’ (tekniset termit) PDF-todistuksille.

*Oletus: `landscape`*

### `hide_certificate_export_link`

**Todistukset: piilota PDF-vientilinkki kaikilta**

Ota käyttöön poistaaksesi kokonaan mahdollisuuden viedä todistuksia PDF-muotoon (kaikilta käyttäjiltä). Jos käytössä, tämä sisältää sen piilottamisen opiskelijoilta.

*Oletus: `false`*

### `hide_certificate_export_link_students`

**Todistukset: piilota vientilinkki opiskelijoilta**

Jos käytössä, opiskelijat eivät voi viedä todistuksiaan PDF-muotoon. Tämä asetus on saatavilla, koska todistuspohjan tarkan HTML-rakenteen mukaan PDF-vienti voi olla heikkolaatuista. Tällöin on parasta näyttää opiskelijoille vain HTML-todistus.

*Oletus: `false`*

### `hide_my_certificate_link`

**Piilota ‘oma todistus’ -linkki**

Piilota todistussivu muilta kuin ylläpitäjäkäyttäjiltä.

*Oletus: `false`*

### `session_admin_can_download_all_certificates`

**Salli session ylläpitäjien ladata yksityisiä todistuksia**

Jos käytössä, session ylläpitäjät voivat ladata todistuksia, vaikka niitä ei olisi julkaistu julkisesti.

*Oletus: `false`*

## Katso myös

Todistuksille voidaan nyt antaa voimassaoloaika ja vanhenemispäivä, automaattisin tai manuaalisin vanhenemismuistutuksin. Tätä ei määritetä täällä — voimassaoloaika on opettajalle näkyvä arviointikirjan asetus, ja muistutuksen cronin päälle/pois-kytkin sijaitsee kategoriassa **Cron-työt**. Katso [Todistukset ja taidot](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry) ja [Cron-töiden asetukset](crons-settings.md#certificate-expiry-reminders).