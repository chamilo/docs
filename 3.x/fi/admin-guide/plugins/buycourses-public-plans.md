# BuyCoursesin julkiset ja kampanjasuunnitelmat

**BuyCourses**-lisäosa voi näyttää julkisen maksuttoman suunnitelman kampanjakorttien rinnalla, jotka johtavat ulkoisiin tarjouksiin. Tämä on erillään lisäosan maksullisten kurssien ja istuntojen ostoprosessista sekä toistuvien palvelumaksujen määrityksestä.

## Julkisten suunnitelmien määrittäminen

1. Avaa BuyCoursesin hallinta-alue ja sen julkisten suunnitelmien korttieditori.
2. **Maksuton**-suunnitelman alla valitse, onko **Näytä maksuton** käytössä.
3. Syötä maksuttoman suunnitelman käännetty otsikko, kuvaus ja ominaisuusluettelo kielivälilehtien avulla.
4. Lisää kampanjakortteja tarpeen mukaan. Määritä kunkin kortin käyttöönottotila, sijainti, kohde-URL, valinnainen kuvan URL sekä käännetty otsikko, kuvaus, ominaisuudet ja painikkeen teksti.
5. Tallenna ja käytä sitten käytettävissä olevaa esikatselu- tai luettelolinkkiä tarkistaaksesi julkisen esityksen kullakin määritetyllä kielellä.

Editori tallentaa käännetyn sisällön useille kielille. Kampanjakortti on **linkki ulkoiseen tarjoukseen**, ei todiste suoritetusta maksusta tai automaattisesta tilauksesta Chamilossa.

## Kurssien luontirajoitukset

Maksuton suunnitelma käyttää alustan vakiomuotoisia kurssien luontirajoituksia. BuyCourses erottaa vakiomuotoiset kurssikiintiöt maksullisista kurssikiintiöistä. Kun rajallinen raja on määritetty, kurssin luontikäyttöliittymä voi näyttää käytön ja edistymisen; rajoittamattomat suunnitelmat eivät tarvitse prosentti-indikaattoria.

Testaa rajoituksia tilillä, jolla on vain vakiokiintiö, ja tilillä, jolla on sovellettava maksullinen kiintiö. Julkinen kampanjakortti ei saa koskaan ohittaa palvelinpuolen kurssien luontioikeuksia.

## Maksukäyttäytyminen

Julkisten suunnitelmien kortit eivät korvaa BTCPayta, Stripea, PayPalia tai lisäosan vakiintuneita kurssien osto- ja toistuvien palvelujen prosesseja. Jatka maksuyhdyskäytävien hallintaa ja testausta olemassa olevassa BuyCourses-määrityksessä.

Katso [BuyCourses: Maksut ja toistuvat palvelut](buycourses.md). Toteutus: [PR #9369](https://github.com/chamilo/chamilo-lms/pull/9369).