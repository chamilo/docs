# Salasanan vahvuuden tarkistin

Salasanan vahvuuden tarkistin vertaa aktiivisten käyttäjien tallennettuja salasanatiivisteitä lyhyeen luetteloon yleisesti käytettyjä salasanoja (`123456`, `password`, `qwerty123` ja vastaavat). Se ei koskaan näytä eikä lähetä itse salasanoja — ainoastaan sen, vastaako käyttäjän nykyinen salasana jotakin tunnetuista heikoista ehdokkaista.

## Salasanan vahvuuden tarkistimen avaaminen

Hallintapaneelista valitse **Turvallisuus > Salasanan vahvuuden tarkistin**.

## Tarkistuksen suorittaminen

![Salasanan vahvuuden tarkistimen sivu, jossa on kenttä tarkistettaville käyttäjä-ID:ille ja painike tarkistuksen suorittamiseen](/.gitbook/assets/admin-security-password-strength.png)

* Jätä **Tarkistettavat käyttäjä-ID:t** tyhjäksi, jos haluat tarkistaa kaikki aktiiviset käyttäjät, tai syötä pilkuilla erotettu luettelo käyttäjä-ID:istä osajoukon tarkistamiseksi
* Valitse **Suorita salasanan vahvuustarkistus**

Tarkistus suoritetaan asynkronisesti taustalla, jotta sivu ei jumitu, ja se näyttää edistymisen livenä (tähän mennessä tarkistetut käyttäjät suhteessa kokonaismäärään sekä löydettyjen heikkojen salasanojen määrä). Koska jokainen ehdokassalasana on tarkistettava jokaista valitun käyttäjän tiivistettä vasten, kaikkien käyttäjien tarkistus suurella alustalla voi kestää hetken — ehdokasluettelo pidetään tarkoituksella lyhyenä tämän kustannuksen rajoittamiseksi.

## Toimenpiteet tulosten perusteella

![Valmiit tarkistustulokset, joissa luetellaan merkitty käyttäjä sarakkeilla Nimi, Käyttäjätunnus ja Sähköposti sekä rivi-kohtaiset toiminnot salasanan vaihdon pyytämiseen tai salasanan nollauksen pakottamiseen](/.gitbook/assets/admin-security-password-strength-results.png)

Kun tarkistus on valmis, merkityt käyttäjät luetellaan kahdella käytettävissä olevalla toiminnolla, joko käyttäjäkohtaisesti tai joukkotoimintona kaikille valituille käyttäjille:

* **Pyydä salasanan vaihtoa** (kirjekuori-kuvake) — Lähettää käyttäjälle sähköpostin, jossa pyydetään vaihtamaan salasana
* **Pakota salasanan nollaus** (nollauskuvake) — Mitätöi käyttäjän nykyisen salasanan välittömästi ja lähettää hänelle uuden sähköpostitse

Molemmat toiminnot tarkistavat valitut käyttäjät uudelleen heikkojen salasanojen luetteloa vasten ennen toimeenpanoa, joten vanhentunutta tai väärennettyä pyyntöä ei voida käyttää tilin nollaamiseen, jolla ei enää ole heikkoa salasanaa.

## Suositeltu käyttö

* Suorita tämä tarkistus säännöllisesti, erityisesti joukkokäyttäjätuonnin jälkeen (tuoduilla tileillä on joskus yksinkertaiset oletussalasanat)
* Yhdistä se **Salasanan minimisyntaksivaatimukset**- ja **Salasanan vaihtoväli**-asetuksiin kohdassa [Turvallisuusasetukset](../platform-settings/security-settings.md), jotta heikkoja salasanoja ei aseteta alun perinkään, sen sijaan että ne vain havaittaisiin jälkikäteen