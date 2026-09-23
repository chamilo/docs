# Terveystarkistus

Terveystarkistus on hallintapaneelin pieni lohko, joka suorittaa muutaman reaaliaikaisen tarkistuksen asennuksellesi ja merkitsee kaiken, mikä vaatii huomiota — yleisiä virhekonfiguraatioita ei tarvitse etsiä konfiguraatiotiedostoista.

![Terveystarkistus-lohko hallintapaneelissa, jossa näkyy sähköpostiasetusten, ylläpitäjän URL-määrityksen ja tiedostooikeustarkistusten onnistuminen/epäonnistuminen](/.gitbook/assets/admin-health-check-block.png)

## Terveystarkistuksen avaaminen

Hallintapaneelissa **Terveystarkistus**-lohko näkyy muiden kojitusnäkymän lohkojen rinnalla — klikkausta ei tarvita, tulokset näytetään suoraan.

## Tarkistukset

* **Sähköpostiasetukset** — Varmistaa, että sähköpostipalvelimen yhteysmerkkijono sekä lähettäjän ("from") sähköpostiosoite/nimi on määritetty. Jos ei, tarjoaa linkin Sähköpostiasetuksiin korjausta varten.
* **Kaikilla URL-osoitteilla on vähintään yksi ylläpitäjä** — Moni-URL-asennuksessa tarkistaa, että jokaisella käyttö-URL:llä on vähintään yksi ylläpitäjä, joka voi hallita sitä. Jos jollakin ei ole, tarjoaa linkin käyttö-URL:n/käyttäjän määrityssivulle.
* **`.env` ei ole kirjoitettavissa** — `.env` sisältää salaisuuksia, eikä sen pitäisi olla verkkopalvelimen kirjoitettavissa asennuksen jälkeen. Merkitään virheeksi, jos se on; linkki Tietoturvaoppaaseen.
* **`config/` ei ole kirjoitettavissa** — Sama perustelu kuin `.env`:n kohdalla: tämän hakemiston ei pitäisi olla verkkokirjoitettavissa normaalissa käytössä. Linkki Tietoturvaoppaaseen.
* **`var/cache` on kirjoitettavissa** — Päinvastainen tarkistus: Symfony tarvitsee kirjoitusoikeuden välimuistihakemistoonsa, joten tämä merkitään virheeksi, jos se *ei* ole kirjoitettavissa. Linkki suorituskyvyn virityksen / optimoinnin oppaaseen.
* **Asennuskansiota ei ole** — `public/main/install`-kansio tarvitaan vain asennuksen aikana, ja se tulisi poistaa sen jälkeen. Tämä merkitään varoitukseksi (ei vakavaksi virheeksi), jos kansio on yhä olemassa, koska riski on lievempi kuin kahdessa yllä olevassa kirjoitettavuustarkistuksessa. Linkki Tietoturvaoppaaseen.

## Mitä tehdä

Jokainen tarkistus linkittää suoraan paikkaan, jossa taustalla oleva ongelma korjataan — joko asetussivulle tai asiaankuuluvaan oppaaseen. Käy tämä lista läpi heti asennuksen jälkeen ja sen jälkeen säännöllisesti (esimerkiksi manuaalisen tiedostosiirron tai oikeuksien muutoksen jälkeen), sillä tänään onnistunut tarkistus ei takaa, että tilanne säilyy. Laajempaa tuotantokäytön kovennuslistaa näiden kuuden tarkistuksen lisäksi on [Tietoturvaoppaassa](appendix/security-guide.md).