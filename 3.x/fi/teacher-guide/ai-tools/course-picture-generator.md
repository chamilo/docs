# Kurssikuvan generaattori

Tekoälypohjainen kurssikuvan generaattori antaa sinun luoda pikkukuvan kurssillesi suoraan kurssin asetusten näkymästä, sen sijaan että hankkisit tai suunnittelisit sen itse. Tämä kuva näytetään kurssistasi listauksissa ja [kurssiluettelossa](../assessing-learners/subscribing-users.md#self-enrollment-via-the-course-catalog).

## Generaattorin avaaminen

**Luo tekoälyllä** <img src="/.gitbook/assets/icons/mdi-robot.svg" alt="Luo tekoälyllä" data-size="line"> -painike on käytettävissä **Kurssikuva**-kentän vieressä, edellyttäen että:

1. Tekoälyavustajat on otettu käyttöön alustatasolla
2. Vähintään yksi alustallesi määritetty tekoälypalveluntarjoaja tukee kuvan luontia
3. Ominaisuus on sallittu kurssissasi (ks. **Tekoälyavustajien asetukset** kohdassa [Kurssin asetukset](../creating-your-course/course-settings.md))

Avaa kurssisi **Asetukset** <img src="/.gitbook/assets/icons/mdi-cog.svg" alt="Asetukset" data-size="line"> ja vieritä **Kurssikuva**-kenttään:

![Kurssikuva-kenttä kurssin asetuksissa, jossa on Valitse tiedosto -painike ja Luo tekoälyllä -painike sen alla](/.gitbook/assets/course-picture-ai-button.png)

## Kuvan luominen

1. Napsauta **Luo tekoälyllä**
2. Avautuu valintaikkuna, jossa **Kehote**-kenttä on esitäytetty oletuskuvauksella; muokkaa sitä kuvaamaan haluamaasi kuvitusta tai jätä oletus ennalleen

![Luo tekoälyllä -valintaikkuna, jossa näkyy Kehote-kenttä oletusteksteineen sekä Peruuta- ja Luo-painikkeet](/.gitbook/assets/course-picture-ai-modal.png)

3. Napsauta **Luo** ja odota — kuvan luonti voi kestää muutaman sekunnin
4. Luotu kuva sijoitetaan automaattisesti **Kurssikuva**-kenttään ja korvaa kaiken, minkä olit sinne valinnut
5. Esikatsele sitä **Esikatselu**-paneelissa ja napsauta sitten lomakkeen **Tallenna**-painiketta, jotta kuva todella otetaan käyttöön kurssillasi — kuvan luominen ei tallenna sitä itsessään

Jos et pidä tuloksesta, voit luoda kuvan uudelleen eri kehotteella niin monta kertaa kuin haluat ennen tallentamista.

## Mitä kehotteeseen sisältyy

Kirjoittamasi lisäksi Chamilo lisää automaattisesti kontekstia, jotta tekoäly tuottaa relevantin, brändin mukaisen kuvan:

* Kurssisi otsikko
* Kurssisi [Kurssikuvauksen](../creating-your-course/course-description.md) ensimmäinen osio, jos olet täyttänyt sen — näin tekoäly saa käsityksen varsinaisesta aiheesta
* Alustasi väriteema (ensisijainen, toissijainen, tertiäärinen), jotta kuvitus käyttää portaalin kanssa yhdenmukaisia värejä

Kuva luodaan litteänä, laajakuva- (16:9) kuvitustyylinä ilman luettavaa tekstiä, logoja tai valokuvamaisia ihmisiä — vastaamaan kurssin pikkukuvalta odotettua muotoa.

## Vinkkejä

* **Täytä ensin kurssikuvaus** — koska se syötetään kehotteeseen, kurssi, jolla on aito kuvaus, saa yleensä osuvamman kuvituksen kuin kurssi ilman kuvausta
* **Ole tarkka tyylistä, ei sisällöstä** — kurssin otsikko ja kuvaus ankkuroivat jo aiheen; käytä kehotetta tyylivihjeisiin (väritunnelma, metafora, sommittelu) sen sijaan, että kuvaisit aiheen uudelleen
* **Luo uudelleen sen sijaan että tyytyisit** — jokainen napsautus tuottaa uuden yrityksen ilman lisävaiheita; kokeile muutamaa muunnelmaa ennen valintaa
* **Muista tallentaa** — painike täyttää vain kuvakentän; jos poistut tallentamatta, luotu kuva katoaa
* **Jos luonti epäonnistuu, kysy ylläpitäjältäsi** — poistettu käytöstä oleva ominaisuus, määrittämätön kuvapalveluntarjoaja tai kuukausittainen tekoälyn käyttökiintiö, joka on täynnä, tuottavat kaikki virheilmoituksen tässä; ylläpitäjäsi voi tarkistaa [Tekoälyn määrityksen](../../admin-guide/integrations/ai-configuration.md)