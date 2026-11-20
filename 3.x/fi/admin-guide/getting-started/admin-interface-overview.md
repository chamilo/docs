# Hallintakäyttöliittymän yleiskatsaus

Hallintapaneeli on komentokeskuksesi Chamilo-alustan hallintaan. Pääset siihen napsauttamalla sivupalkissa **Hallinta** <img src="/.gitbook/assets/icons/mdi-cogs.svg" alt="Hallinta" data-size="line">.

## Hallinnan kojausnäkymä

![Hallinnan kojausnäkymä, jossa näkyvät toiminnalliset lohkot: Käyttäjät, Kurssit, Istunnot ja Asetukset](/.gitbook/assets/admin-dashboard-overview.png)

Hallinnan kojausnäkymä on jaettu toiminnallisiin lohkoihin. Kukin lohko kokoaa yhteen toisiinsa liittyvät hallintatyökalut:

### Käyttäjät

* **Käyttäjäluettelo** — Tarkastele, hae, muokkaa ja hallitse kaikkia alustan käyttäjiä
* **Lisää käyttäjä** — Luo yksittäisiä käyttäjätilejä
* **Luokat** — Hallitse käyttäjäluokkia istuntojen joukkoilmoittautumista varten

Lisätietoja on luvussa [Käyttäjät](../users/README.md).

### Kurssit

* **Kurssiluettelo** — Tarkastele ja hallitse kaikkia alustan kursseja
* **Luo kurssi** — Luo uusi kurssi
* **Kurssikategoriat** — Järjestä kurssit kategorioihin katalogia varten

Lisätietoja on luvussa [Kurssit](../courses/README.md).

### Istunnot

* **Istuntoluettelo** — Tarkastele ja hallitse koulutustilaisuuksia
* **Luo istunto** — Määritä uusi istunto kursseineen ja ilmoittautumisineen
* **Istuntokategoriat** — Järjestä istunnot kategorioihin
* **Urat ja ylennykset** — Hallitse urapolkuja ja ylennystyönkulkuja

Lisätietoja on luvussa [Istunnot](../sessions/README.md).

### Alusta

* **Määritysasetukset**, **Kielet**, **Portaalin uutiset**, **Yleinen agenda**, **Sivut**, **Lisäkentät**, **Sähköpostipohjat**, **Yhteydenottolomakkeen kategoriat** ja muuta — lisätietoja on luvussa [Alusta](../platform/README.md). Linkki ”Määritysasetukset” on sisäänkäynti erilliseen lukuun [Alustan asetukset](../platform-settings/README.md).

### Analytiikka

* **Yleiset tilastot**, **Raporttikatalogi**, **Oppimisanalytiikka**, **Neljännesvuosiraportti**, **Opettajien aikaraportti**, **Yritysraportti**, **Erityisviennit**, **Tiketit** — Alustan tilastot ja raportointi; lisätietoja on luvussa [Analytiikka](../analytics/README.md)

### Taidot

* **Taitopyörä**, **Taitojen tuonti**, **Hallitse taitoja**, **Hallitse taitotasoja**, **Taitojen sijoitus**, **Taidot ja arvioinnit** — Arviointikirjan tuloksiin kytketyt osaamismerkit; lisätietoja on luvussa [Taidot](../skills/README.md)

### Järjestelmä

* **Puhdista väliaikaistiedostot**, **Järjestelmän tila**, **Järjestelmäpäivitys**, **Värit**, **Tiedostotiedot**, **Resurssit tyypin mukaan**, **Kuvakeluettelo** — Palvelimen ylläpito, itsepäivitys ja brändäys; lisätietoja on luvussa [Järjestelmä](../system/README.md)

### Tilat

* **Toimipisteet**, **Tilat**, **Tilojen saatavuushaku** — Fyysiset sijainnit ja varattavat koulutustilat; lisätietoja on luvussa [Tilat](../rooms/README.md)

### Tietoturva

* **Toimintojen auditointi**, **Kirjautumisyritykset**, **Yksinkertainen IDS**, **Salasanan vahvuuden tarkistus**, **Tiedostojen eheys** — Tietoturvan valvonta- ja auditointityökalut; lisätietoja on luvussa [Tietoturva](../security/README.md)

### Liitännäiset

* Pikakuvakkeet asennettuihin liitännäisiin, jotka ilmoittavat hallintavalikkosivun, sekä yleinen liitännäisten hallinta — lisätietoja on luvussa [Liitännäiset](../plugins/README.md)

### Terveystarkistus

* Live-läpäisy-/hylkäystarkistukset (sähköpostiasetukset, hallinta-URL:n määritys, tiedosto-oikeudet) — lisätietoja on sivulla [Terveystarkistus](../health-check.md)

### Muut lohkot

* **Chamilo.org**, **Version tarkistus**, **Ammattilainen tuki**, **Uutisia Chamilosta** — linkkejä ja tilapaneeleja, jotka noutavat sisältöä Chamilo-hankkeesta; lisätietoja on kohdassa [Muut hallintalohkot](../other-admin-blocks/README.md)

Kukin osio käsitellään yksityiskohtaisesti tämän oppaan vastaavassa luvussa.

Todennusmenetelmiä, kuten OAuth2, LDAP, CAS ja muita ulkoisia todennuspalveluntarjoajia, ei määritetä hallinnan kojausnäkymässä vaan tiedostossa `config/authentication.yaml`.