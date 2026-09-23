# Version Check

Version Check kertoo, onko Chamilo-asennuksesi ajan tasalla, ja — jos valitset sen — rekisteröi alustasi Chamilo-projektiin, jotta se voidaan laskea mukaan kootuihin käyttötilastoihin.

## Kaksi tarkistustasoa

**Rekisteröimätön (oletustila):** Chamilo yrittää silti ottaa yhteyttä osoitteeseen `version.chamilo.org` vertaillakseen asennettua versiotasi uusimpaan julkaisuun käyttäen vain itse pyyntöä — alustan tietoja ei lähetetä. Lohkossa näkyy rekisteröintilomake, jossa selitetään, mitä rekisteröinti lisää, sekä **"Enable version check"** -painike ja **"Hide campus from public platforms list"** -valintaruutu.

**Rekisteröity:** "Enable version check" -painikkeen napsauttaminen vaihtaa vain kahta paikallista asetusta — se ei itsessään lähetä mitään. Siitä lähtien aina, kun tämä hallintapaneelin lohko latautuu, alustasi lähettää pyynnön osoitteeseen `version.chamilo.org`, joka sisältää:

| Lähetetty tieto | Ilmoitettu tarkoitus |
|-----------|-----------------|
| Alustasi URL ja sivuston nimi | Tunnistaa, mikä portaali ilmoittautuu |
| Ylläpitäjän yhteyssähköposti | Nimenomaan siksi, että Chamilo-tiimi voi tavoittaa ylläpitäjät kriittisissä tietoturva-asioissa |
| Asennettu versio | Selvittääkseen, oletko ajan tasalla |
| Kurssien, käyttäjien, aktiivisten käyttäjien ja sessioiden määrät | Koostetaan ei-henkilökohtaisiksi kootuiksi tilastoiksi osoitteessa `stats.chamilo.org` |
| Organisaation nimi ja käyttöliittymän kieli | Vain demografista aggregointia varten |
| Ylläpitäjän nimi | Lähetetään, vaikka sen tarkoitusta ei ole selkeästi dokumentoitu itse koodissa |
| Palvelimesi IP-osoite | Käytetään alustasi sijainnin arviointiin asennusten maailmankarttaa varten |
| "Do not list campus" -lippu, paketoija ja yksilöllinen instanssitunnus | Hallitsee, näytäänkö julkisessa hakemistossa, ja tunnistaa saman asennuksen toistuvat ilmoittautumiset |

Jos jätät **"Hide campus from public platforms list"** -valinnan pois, alustasi näkyy myös julkisessa yhteisöluettelossa osoitteessa `version.chamilo.org/community.php`.

## Version Checkin käyttäminen

Tämä lohko näkyy suoraan hallinnan kojitusnäkymässä — erillistä sivua ei ole.

## Pitäisikö se ottaa käyttöön?

Tämä on nimenomainen opt-in, ja kompromissi on suoraviivainen: yllä olevien tietojen jakamista vastaan saat automaattisen ilmoituksen, kun uusi versio (mukaan lukien tietoturvakorjaukset) on saatavilla, ja osallistut Chamilon julkisiin käyttöönottotilastoihin. Jos et halua jakaa alustan tietoja, älä napsauta "Enable version check" — perustason ajan tasalla -tarkistus toimii silti ilman rekisteröintiä. Jos haluat päivitysilmoituksen mutta et julkista listaa, rekisteröidy ja valitse "Hide campus from public platforms list."