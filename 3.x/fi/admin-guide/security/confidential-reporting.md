# Luottamuksellinen ilmoittaminen

Chamilo sisältää valinnaisen **luottamuksellisen ilmoittamisen** työnkulun, jolla voi toimittaa toista käyttäjää koskevia huolia valtuutetuille tutkijoille. Tämä ei ole tavallinen tukipyyntötyökalu eikä julkinen keskustelufoorumi.

## Ota ominaisuus käyttöön

Avaa **Hallinta > Määritysasetukset > Tietoturva** ja määritä:

| Asetus | Oletus | Tarkoitus |
|---|---|---|
| `security.confidential_reporting_enabled` | `false` | Ota luottamuksellisen ilmoittamisen työnkulku käyttöön |
| `security.confidential_reporting_min_reporters` | `2` | Vähimmäismäärä eri ilmoittajia (2–10), ennen kuin tutkinta tulee näkyviin |
| `security.confidential_reporting_attachments_enabled` | `true` | Salli todistusaineiston liitteet |
| `security.confidential_reporting_notifications_enabled` | `false` | Näytä sisäiset ilmaisimet kelvollisille tutkinnoille (ei sähköposteja) |

Käyttöönotto edellyttää myös, että palvelimen luottamuksellisen ilmoittamisen salaus ja yksityinen tallennus ovat valmiina. Chamilo käyttää PHP Sodium -salausfunktioita ja yksityistä salausavainta; **säilytä ja varmuuskopioi avain turvallisesti**. Avaimen katoaminen voi tehdä tallennetuista ilmoituksista lukukelvottomia. Älä kopioi avainta Git-tietovarastoon. Älä ota ominaisuutta käyttöön, ennen kuin olet varmistanut, että yksityisen avaimen tallennus ja tarvittavat tietokantamigraatiot toimivat.

## Ilmoituksen lähettäminen

1. Kirjaudu suoraan Chamiloon ja avaa **Luottamuksellinen ilmoittaminen** (kun se on otettu käyttöön portaalissa).
2. Valitse asianomainen henkilö, kirjoita aihe ja kuvaile tapahtuma.
3. Lisää todistusaineistoa, jos liitteet on otettu käyttöön.
4. Päätä, saavatko tutkijat nähdä **nimesi ja sähköpostiosoitteesi** tämän ilmoituksen osalta. Tämän luvan voi myöhemmin peruuttaa.
5. Lähetä ilmoitus. Seuraa tapausta ja vaihda viestejä tutkijan kanssa kohdassa **Omat luottamukselliset ilmoitukseni**.

Ilmoittajan henkilöllisyyttä **ei näytetä tutkijoille oletuksena**. Tämä on luottamuksellisuuden hallintakeino, ei lupaus täydellisestä anonymiteetistä järjestelmän ylläpitäjien suhteen.

## Tutkintaoikeudet ja kynnysarvot

Tutkinnot edellyttävät erillistä `welfare:investigate`-oikeutta sekä kelvollista ylläpitäjän tai HR-roolia. Tapaus tulee tutkittavaksi vasta, kun samaa kohdetta koskevien **eri ilmoittajien** määritetty määrä on saavutettu. Tutkija ei voi tutkia itseään koskevaa ilmoitusta. HR-käyttöoikeus rajoittuu käyttäjiin, joita HR-päällikkö seuraa.

Tutkijat käyttävät kohtaa **Luottamukselliset tutkinnot** tarkastellakseen kelvollisia tapauksia, arvioidakseen todistusaineistoa ja vaihtaakseen viestejä. Kynnysarvon alittavia tai luvattomia tapauksia ei paljasteta tutkinnan API:n kautta. Hallinnollinen **esiintyminen toisena käyttäjänä** ei anna pääsyä luottamukselliseen ilmoittamiseen.

## Tietosuoja ja toiminnallinen huolellisuus

Ilmoitukset ja liitetty todistusaineisto sisältävät arkaluonteisia henkilötietoja. Rajoita tutkijoiden oikeuksia, rajaa varmuuskopioiden käyttöoikeutta, määritä asianmukainen organisaation säilytyskäytäntö ja testaa työnkulku erillisillä ilmoittajan, kohteen ja tutkijan tileillä. Vältä kokonaisten ilmoitusten kopioimista teknisiin lokeihin tai tikettijärjestelmiin.

Toteutus: [Luottamuksellinen ilmoittaminen #9310](https://github.com/chamilo/chamilo-lms/pull/9310).