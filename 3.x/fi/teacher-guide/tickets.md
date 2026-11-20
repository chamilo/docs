# Tukipyynnöt

**Tickets**-työkalu on sisäänrakennettu helpdesk-järjestelmä, jonka avulla käyttäjät voivat lähettää tukipyyntöjä ja seurata niiden käsittelyä. Alustan asetuksista riippuen voit käyttää sitä **pyytäjänä** (lähettämällä tikettejä omasta tai oppijoidesi puolesta) tai **tukihenkilönä** (vastaamalla kategoriaasi osoitettuihin tiketteihin).

## Miten järjestelmä on organisoitu

Tiketit kuuluvat **projekteihin**, jotka on jaettu edelleen **kategorioihin**. Kuhunkin kategoriaan voidaan liittää yksi tai useampi tukihenkilö. Kun tiketti lähetetään, se ohjataan automaattisesti valitun kategorian vapaalle tukihenkilölle.

Oletuskategoriat ovat:

| Kategoria | Kuvaus |
|----------|-------------|
| Enrollment | Kysymykset ja ongelmat kurssi- tai sessioilmoittautumisesta |
| General information | Yleiset alustaa koskevat kysymykset |
| Requests and paperwork | Hallinnolliset pyynnöt ja dokumentaatio |
| Academic Incidents | Tentteihin, tehtäviin tai töihin liittyvät ongelmat |
| Virtual campus | Alustan tekniset ongelmat |
| Online evaluation | Tiettyyn kurssiarviointiin liittyvät ongelmat (edellyttää kurssin valintaa) |

## Tikettityökalun avaaminen

Jos ylläpitäjä on ottanut tikettilinkin käyttöön, yläpalkissa näkyy tiketti-ikoni <img src="/.gitbook/assets/icons/mdi-ticket-account.svg" alt="Tiketti" data-size="line">. Napsauta sitä siirtyäksesi suoraan tiketin lähetyslomakkeeseen.

Voit avata tiketisi myös päävalikosta kohdasta **Tuki** tai **Tickets** alustan asetuksista riippuen.

## Tiketin lähettäminen

Uuden tukipyynnön avaaminen:

1. Napsauta **New ticket** (tai yläpalkin tiketti-ikonia).
2. Valitse **kategoria**, joka parhaiten vastaa ongelmaasi.
3. Jos kategoria sitä edellyttää (esimerkiksi Online evaluation), valitse asiaankuuluva **kurssi**.
4. Kirjoita **aihe** — lyhyt yhteenveto ongelmasta.
5. Kirjoita **viesti**, jossa kuvaat ongelman yksityiskohtaisesti.
6. Voit halutessasi liittää tiedostoja (kuvakaappauksia, asiakirjoja), jotka auttavat tukihenkilöä ymmärtämään ongelman.
7. Napsauta **Submit**.

Tiketille annetaan tunnus ja se ohjataan tukihenkilölle. Saat ilmoituksen, kun tukihenkilö vastaa.

## Omien tikettien seuranta

Tikettluettelosta näet kaikki lähettämäsi tiketit ja niiden nykyisen tilan:

| Tila | Merkitys |
|--------|---------|
| New | Juuri lähetetty, ei vielä käsitelty |
| Pending | Tukihenkilön käsittelyssä |
| Unconfirmed | Odottaa vahvistusta tai lisätietoja |
| Forwarded | Siirretty toiselle tiimille tai tukihenkilölle |
| Closed | Ratkaistu |

Napsauta mitä tahansa tikettiä lukeaksesi koko keskusteluketjun ja lisätäksesi vastauksen.

## Tikettiin vastaaminen

Kun tiketti on avoinna, sinä ja tukihenkilö vaihdatte viestejä samassa ketjussa. Vastauksen lisääminen:

1. Avaa tiketti luettelostasi.
2. Siirry alareunan vastauskenttään.
3. Kirjoita vastauksesi ja liitä tarvittaessa tiedostoja.
4. Napsauta **Send**.

Molemmat osapuolet saavat ilmoituksen, kun ketjuun lisätään uusi viesti.

## Tikettien käsittely tukihenkilönä

Jos ylläpitäjä on liittänyt sinut yhteen tai useampaan tikettikategoriaan, näet jonossasi oppijoilta tai kollegoilta tulevat tiketit.

Osoitetun tiketin käsittely:

1. Avaa tikettluettelosi — osoitetut tiketit näkyvät lähettämiesi tikettien rinnalla.
2. Napsauta tikettiä lukeaksesi pyytäjän viestin.
3. Kirjoita vastaus ja napsauta **Send**. Tiketin tila päivittyy automaattisesti.
4. Kun ongelma on ratkaistu, vaihda tilaksi **Closed**.

Voit myös muuttaa tiketin **prioriteettia** (Low, Normal, High) jonon priorisoimiseksi.

> Pääsy tikettikategorioihin on alustan ylläpitäjän hallinnassa. Jos sinut pitää lisätä kategorian tukihenkilöksi, ota yhteyttä ylläpitäjään. Katso Admin Guiden [Tickets Settings](../admin-guide/platform-settings/ticket-settings.md) määritysasetuksista.