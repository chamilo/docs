# Järjestelmän tila

Järjestelmän tila -sivu auttaa varmistamaan, että Chamilo-palvelimesi on määritetty oikein, ja tunnistamaan mahdolliset ongelmat.

## Järjestelmän tilan avaaminen

Hallintapaneelista napsauta **Järjestelmän tila** (tai **Järjestelmätiedot**).

## Mitä se näyttää

![Järjestelmän tila -sivu, jossa näkyvät PHP-määritykset, tietokannan tila, tiedosto-oikeudet ja palvelintiedot](../../.gitbook/assets/admin-system-status.png)

### PHP-määritykset

* **PHP-versio** — Chamilo 3.0 tukee PHP-versioita 8.3, 8.4 ja 8.5
* **Vaaditut laajennukset** — Tarkistaa, että kaikki tarvittavat PHP-laajennukset on asennettu
* **PHP-asetukset** — Varmistaa tärkeät PHP-asetukset, kuten muistirajan, latausrajat ja suoritusaika

### Tietokannan tila

* **Tietokantayhteys** — Vahvistaa, että tietokanta on käytettävissä
* **Tietokantaversio** — Näyttää tietokantapalvelimen version

### Tiedosto-oikeudet

* **Kirjoitettavat hakemistot** — Tarkistaa, että Chamilo voi kirjoittaa tarvittaviin hakemistoihin (välimuisti, lataukset, lokit)

### Palvelintiedot

* **Käyttöjärjestelmä** — Palvelimen käyttöjärjestelmän tiedot
* **Verkkopalvelin** — Apache, Nginx tai muu
* **Levytila** — Käytettävissä oleva tallennustila

## Suositellut tarkistukset

Tee nämä tarkistukset säännöllisesti:

* **Asennuksen jälkeen** — Varmista, että kaikki vaatimukset täyttyvät
* **Päivitysten jälkeen** — Varmista, että PHP-versio ja laajennukset ovat edelleen yhteensopivia
* **Ongelmien ilmetessä** — Tarkista järjestelmän tila ensin, kun vianmääritystä tehdään