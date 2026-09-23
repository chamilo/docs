# LTI 1.3

**LTI** (Learning Tools Interoperability) on standardi, jonka avulla ulkoisia oppimistyökaluja voidaan upottaa Chamiloon. Versio 1.3 on standardin uusin ja turvallisin versio.

Tämä työkalu on myös saatavilla hallintapaneelin [Alusta](../platform/README.md) -lohkosta nimellä **Ulkoiset työkalut (LTI)**.

## Mitä LTI mahdollistaa

LTI:n avulla voit upottaa ulkoisia työkaluja Chamilo-kursseihin. Esimerkkejä:

* Interaktiiviset simulaatiot
* Erikoistuneet arviointityökalut
* Sisällöntuotantotyökalut
* Virtuaalilaboratoriot
* Kolmannen osapuolen sisältökirjastot

Ulkoinen työkalu näkyy saumattomasti Chamilon käyttöliittymässä.

## LTI-työkalun määrittäminen

### Ylläpitäjänä

1. Siirry LTI-asetuksiin hallintapaneelissa
2. **Rekisteröi ulkoinen työkalu** antamalla:
   * **Työkalun nimi** — Kuvaava nimi
   * **Login URL** — Ulkoisen työkalun OIDC-kirjautumisen aloitus-URL
   * **Redirect URL** — Käynnistys-URL, johon työkalu palaa kirjautumisen jälkeen
   * **Client ID** — Työkalutoimittajan toimittama
   * **Public keyset URL (JWKS URL)** — Työkalun JWKS-päätepiste turva-avainten vaihtoa varten
3. Määritä **arvosanojen palautus (grade passback)** — Voiko työkalu lähettää arvosanoja takaisin Chamiloon
4. Tallenna

### Opettajana

Kun ylläpitäjä on rekisteröinyt LTI-työkalun, opettajat voivat lisätä sen kursseilleen:

1. Etsi kurssilta vaihtoehto ulkoisen työkalun lisäämiseksi
2. Valitse rekisteröidyistä LTI-työkaluista
3. Työkalu näkyy kurssityökaluna etusivulla

## Tietoturva

LTI 1.3 käyttää:

* **OAuth 2.0** -protokollaa todennukseen
* **JSON Web Tokens (JWT)** -tokeneita viestien allekirjoittamiseen
* **Julkisen ja yksityisen avaimen pareja** varmistukseen

Tämä tarkoittaa, että tunnistetietoja ei jaeta suoraan Chamilon ja ulkoisen työkalun välillä.

## Arvosanojen palautus

LTI-työkalut voivat lähettää arvosanoja takaisin Chamiloon, ja ne voidaan integroida kurssin arviointikirjaan. Tämä määritetään työkalukohtaisesti rekisteröinnin yhteydessä.

## Vinkkejä

* **Varmista työkalun yhteensopivuus** — Varmista, että ulkoinen työkalu tukee LTI 1.3:a (ei vain vanhempia versioita)
* **Testaa hiekkalaatikossa** — Testaa LTI-integraatio testikurssilla ennen tuotantokäyttöä
* **Seuraa suorituskykyä** — Ulkoiset työkalut lisäävät verkkoriippuvuuksia. Varmista, että työkalu on reagoiva ja luotettava.