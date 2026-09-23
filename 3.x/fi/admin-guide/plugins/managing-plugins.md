# Liitännäisten hallinta

## Liitännäisten hallintaan siirtyminen

![Liitännäisten hallinta, jossa näkyy luettelo käytettävissä olevista liitännäisistä aktivointikytkimineen ja määritysasetuksineen](../../.gitbook/assets/admin-plugin-manager.png)

Siirry hallintapaneelista kohtaan **Manage plugins** nähdäksesi luettelon käytettävissä olevista liitännäisistä.

## Liitännäisten tilat

Jokaisella liitännäisellä on yksi kahdesta tilasta:

* **Active** — Liitännäinen on käytössä ja sen ominaisuudet ovat saatavilla alustalla
* **Inactive** — Liitännäinen on asennettu mutta pois käytöstä

## Liitännäisen aktivointi

1. Etsi liitännäinen luettelosta
2. Napsauta **Install** ja sitten **Enable** tai kytke se päälle
3. Määritä liitännäisen asetukset (jos sovellettavissa, etsi **Configure**-painike)
4. Tallenna
5. Jos README suosittelee, ota se käyttöön tietyssä **region**-alueessa

Jotkin liitännäiset lisäävät työkaluja kursseihin, uusia sivuja alustalle tai lisätoimintoja olemassa oleviin ominaisuuksiin.

## Liitännäisen määritys

Monilla liitännäisillä on määritysasetuksia. Liitännäisen aktivoinnin jälkeen:

1. Napsauta liitännäisen vieressä olevaa **Configure**-painiketta
2. Täytä vaadittu määritys (API-avaimet, URL-osoitteet, asetukset jne.)
3. Tallenna

## Liitännäisen deaktivointi

1. Etsi liitännäinen luettelosta
2. Napsauta **Disable** tai kytke se pois päältä
3. Liitännäisen ominaisuudet poistetaan alustalta välittömästi, mutta liitännäinen on edelleen asennettuna ja säilyttää määrityksensä, kunnes **Uninstall** sen

Liitännäisen poistaminen käytöstä ei poista sen tietoja. Jos otat sen myöhemmin uudelleen käyttöön, tiedot ovat edelleen saatavilla.

## Vinkkejä

* **Aktivoi vain tarvitsemasi** — Jokainen aktiivinen liitännäinen lisää jonkin verran kuormitusta. Pidä käyttämättömät liitännäiset pois käytöstä.
* **Testaa ennen tuotantoa** — Aktivoi uudet liitännäiset ensin testiympäristössä
* **Tarkista yhteensopivuus** — Chamilo-päivityksen jälkeen varmista, että kaikki aktiiviset liitännäiset toimivat edelleen oikein