# Cron-töiden asetukset

Chamilon mukana toimitettujen ajastettujen töiden (cron-tehtävien) määritys.

Näihin asetuksiin pääset kohdasta **Hallinta > Määritysasetukset > Cron-työt**. Tässä kategoriassa on **5 asetusta**, jotka on lueteltu alla otsikoineen ja kommenteineen sellaisina kuin ne on toimitettu alustan asetusten fixtureissa (`SettingsCurrentFixtures.php`).

> Muuttujan nimi koodissa näytetään tasalevyisellä fontilla. Käytä sitä, kun skriptaat API:n kautta tai kun sinun on muutettava näitä asetuksia globaalilla tasolla muokkaamalla tiedostoa [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Asetukset

### `cron_remind_course_expiration_activate`

**Kurssin vanhenemisen muistutus -cron**

Ota käyttöön kurssin vanhenemisen muistutus -cron

*Oletus: `false`*

### `cron_remind_course_expiration_frequency`

**Kurssin vanhenemisen muistutus -cronin tiheys**

Päivien määrä ennen kurssin vanhenemista, jonka perusteella muistutusviesti lähetetään

### `cron_remind_course_finished_activate`

**Lähetä ilmoitus kurssin päättymisestä**

Lähetetäänkö opiskelijoille sähköposti, kun heidän kurssinsa (istuntonsa) on päättynyt. Tämä edellyttää, että cron-tehtävät on määritetty (ks. hakemisto main/cron/).

*Oletus: `false`*

### `cron_certificate_expiry_reminder_activate`

**Todistuksen vanhenemisen muistutus -cron**

Ota käyttöön `app:send-certificate-expiry-reminders` -cron, joka muistuttaa oppijoita, joiden todistukset ovat vanhentuneet tai ovat vanhenemassa.

*Oletus: `false`*

### `cron_certificate_expiry_reminder_days`

**Todistuksen vanhenemisen muistutusikkuna (päiviä)**

Oletusarvoinen päivien määrä eteenpäin, jolta skannataan vanhenemassa olevia todistuksia, ellei cronia ajeta parametrilla `--days-ahead`.

*Oletus: `30`*

## Todistuksen vanhenemisen muistutukset

Arviointikirjan todistuksille voidaan antaa voimassaoloaika (päivinä), joka määritetään arviointikirjan kategoriaa kohden — ks. [Todistukset ja taidot](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md). Kun todistuksella on vanhenemispäivä, Chamilo voi muistuttaa oppijaa sähköpostilla ja sisäisellä viestillä, kun vanhenemispäivä lähestyy (tai sen jälkeen, kun se on mennyt).

Asetuksen `cron_certificate_expiry_reminder_activate` käyttöönotto yllä vain kytkee *ominaisuuden* päälle; muistutus lähetetään itse asiassa konsolikomennolla, joka on edelleen ajastettava käyttöjärjestelmätasolla (esim. `crontab`-tiedoston kautta), koska Chamilo ei aja omaa tausta-ajastinta:

```bash
php bin/console app:send-certificate-expiry-reminders
```

Hyödyllisiä valitsimia:

| Valitsin | Vaikutus |
|--------|--------|
| `--days-ahead=N` | Kuinka monta päivää ennen vanhenemista sisällytetään (oletuksena `cron_certificate_expiry_reminder_days`) |
| `--force` | Lähetä muistutukset tosiasiassa. Ilman tätä komento vain raportoi, mitä se *lähettäisi* — turvallista ajaa tarkistuksena ennen croniin kytkemistä |
| `--resend` | Lähetä muistutukset uudelleen myös todistus/vanhenemispäivä-parille, josta on jo ilmoitettu |
| `--access-url-id=N` | Rajoita skannaus yhteen portaaliin (usean URL:n asennukset) |
| `--include-unsubscribed-users` | Ilmoita myös oppijoille, jotka ovat peruneet alustan sähköpostit |

Opettajat voivat lähettää samat muistutukset manuaalisesti ilman tätä cronia — ks. [Todistukset ja taidot](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry).