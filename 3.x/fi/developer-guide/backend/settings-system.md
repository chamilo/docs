# Asetusjärjestelmä

Chamilon konfiguraatiota hallitaan joukolla asetusmalleja (noin 40 kappaletta, määrä vaihtelee julkaisujen välillä), jotka määrittävät alustan kaikki konfiguroitavat osa-alueet. Ne sijaitsevat hakemistossa `src/CoreBundle/Settings/` — siellä oleva tarkka luettelo on totuuden lähde.

## Miten se toimii

Asetukset:

1. **Määritellään** malliluokissa (`src/CoreBundle/Settings/*SettingsSchema.php`)
2. **Tallennetaan** tietokantaan (`settings_current`-taulu)
3. **Haetaan** `SettingsManager`-palvelun kautta
4. **Hallitaan** hallintakäyttöliittymän kautta

## Asetusmallit

Kukin mallitiedosto määrittää yhden asetuskategorian. Keskeiset mallit:

| Malli | Tarkoitus |
|--------|---------|
| `PlatformSettingsSchema` | Organisaation tiedot, aikavyöhyke, palvelintyyppi, portaalin ominaisuudet |
| `SecuritySettingsSchema` | Kirjautumisyritykset, CAPTCHA, salasanakäytäntö, HTTP-otsakkeet, 2FA |
| `RegistrationSettingsSchema` | Itseilmoittautuminen, pakolliset kentät, automaattinen tilaus |
| `CourseSettingsSchema` | Kurssin luonnin oletukset, työkalut, katalogi |
| `SessionSettingsSchema` | Istunnon oletukset, näkyvyys |
| `MailSettingsSchema` | Sähköpostin konfiguraatio, DKIM, ilmoitukset |
| `AiHelpersSettingsSchema` | Tekoälypalveluntarjoajat, ominaisuuksien kytkimet tekoälytyökaluittain |
| `ExerciseSettingsSchema` | Tentin pisteytys, palaute, kysymysasetukset |
| `LearningPathSettingsSchema` | Oppimispolun näyttö, esitiedot, SCORM-asetukset |
| `DocumentSettingsSchema` | Latausrajat, sallitut tiedostotyypit, tallennus |
| `DisplaySettingsSchema` | Käyttöliittymän välilehdet, sivupalkin kohteet, teema |
| `LanguageSettingsSchema` | Saatavilla olevat kielet, oletuslokaali |
| `AdminSettingsSchema` | Ylläpitäjän sähköposti, ylläpitäjäkohtaiset asetukset |

## Asetusten käyttäminen

PHP-koodissa:

```php
// Via SettingsManager service
$value = $settingsManager->getSetting('platform.site_name');

// In legacy code
$value = api_get_setting('platform.site_name');
```

Mallipohjissa:

```twig
{# Read a single setting #}
{{ chamilo_settings_get('platform.site_name') }}

{# Check whether a setting exists #}
{% if chamilo_settings_has('platform.allow_registration') %}
    ...
{% endif %}

{# Get all settings as an array #}
{% set settings = chamilo_settings_all() %}
```

## Asetuksen rakenne

Jokaisella asetuksella on:

* **Nimiavaruus** — Mallin kategoria (esim. `platform`, `security`, `ai_helpers`)
* **Muuttuja** — Asetuksen nimi (esim. `site_name`, `allow_registration`)
* **Arvo** — Nykyinen arvo
* **Tyyppi** — Tietotyyppi (merkkijono, totuusarvo, taulukko jne.)

## Kurssitason asetukset

Joitakin asetuksia voidaan ylikirjoittaa kurssitasolla. Nämä määritellään hakemistossa `src/CourseBundle/Settings/` ja niihin kuuluvat:

* Tenttiasetukset kurssikohtaisesti
* Tehtäväasetukset kurssikohtaisesti
* Tekoälyominaisuuksien kytkimet kurssikohtaisesti

## Moni-URL-asetukset

Moni-URL-asennuksissa osa asetuksista voidaan räätälöidä käyttö-URL-kohtaisesti, jolloin samasta asennuksesta voidaan tarjota erilaisia portaalin konfiguraatioita.

Nämä asetukset esiintyvät `settings`-taulussa useaan kertaan eri `access_url`-arvoilla. Oletuksena kaikki asetukset liittyvät arvoon `access_url=1`.

## Uuden asetuksen lisääminen

1. Lisää asetuksen määritelmä sopivaan malliluokkaan
2. Anna oletusarvo
3. Suorita tietokantamigraatiot tarvittaessa
4. Käytä asetusta `SettingsManager`-palvelun kautta