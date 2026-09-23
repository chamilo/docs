# Käyttäjien ilmoittaminen kurssille

Ennen kuin voit arvioida oppijaa, hänet on ilmoitettava kurssillesi. Chamilo tarjoaa neljä tapaa saada joku mukaan riippuen siitä, kuka ilmoittautumisen tekee ja onko henkilöllä jo alustatili.

| Menetelmä | Kuka tekee sen | Tarvitaanko olemassa oleva tili? |
|--------|-------------|------------------------------|
| [Ylläpitäjän ilmoittaminen](#administrator-enrollment) | Alustan ylläpitäjä | Kyllä |
| [Itseilmoittautuminen kurssiluettelon kautta](#self-enrollment-via-the-course-catalog) | Oppija itse | Kyllä |
| [Manuaalinen ilmoittaminen Käyttäjät-työkalulla](#manual-enrollment-via-the-users-tool) | Opettaja (tai kurssin ylläpitäjä) | Kyllä |
| [Käyttäjien kutsuminen sähköpostilla](#inviting-users-by-email) | Opettaja (tai kurssin ylläpitäjä) | **Ei** |

## Ylläpitäjän ilmoittaminen

Alustan ylläpitäjä voi ilmoittaa minkä tahansa olemassa olevan käyttäjän mille tahansa kurssille suoraan hallintapaneelista — hyödyllistä joukko-onboardingissa (esim. luokkalistan tuonti) tai kun opettajalla ei ole oikeuksia hallita ilmoittautumista itse. Katso hallintaoppaan osio [Kurssit](../../admin-guide/courses/README.md).

## Itseilmoittautuminen kurssiluettelon kautta

Jos kurssisi [näkyvyys](../creating-your-course/course-settings.md#course-visibility) sen sallii, alustatilin omaavat oppijat voivat ilmoittautua itse etsimällä kurssisi kohdasta **Tutustu muihin kursseihin** ja klikkaamalla liittyäkseen — sinulta ei tarvita toimenpiteitä. Onko tämä käytettävissä ja vaatiiko se salasanan, määräytyy [Kurssiasetusten](../creating-your-course/course-settings.md#enrollment-settings) **Ilmoittautumisasetuksista**.

## Manuaalinen ilmoittaminen Käyttäjät-työkalulla

Ilmoittaaksesi henkilön, jolla on jo alustatili mutta joka ei ole liittynyt itse, avaa kurssisi **Käyttäjät**-työkalu ja klikkaa **Lisää käyttäjiä** <img src="/.gitbook/assets/icons/mdi-account-plus.svg" alt="Lisää käyttäjiä" data-size="line"> -kuvaketta.

1. Etsi henkilö nimen, käyttäjänimen, sähköpostin tai virallisen koodin perusteella
2. Klikkaa rivillä **Rekisteröi** tai valitse useita valintaruuduilla ja käytä **Toiminto**-valikkoa rekisteröidäksesi heidät kaikki kerralla

![Hakutulokset Ilmoita käyttäjiä kurssille -näytössä, jossa näkyy vastaava oppija ja Rekisteröi-painike](/.gitbook/assets/course-users-subscribe-search.png)

Tuloksissa näkyvät vain käyttäjät, jotka eivät ole jo ilmoittautuneet kurssille.

> Tämä kuvake on oletuksena opettajien käytettävissä. Alustan ylläpitäjä voi rajoittaa sen vain ylläpitäjille asetuksella **Salli käyttäjän kurssi-ilmoittautuminen kurssin ylläpitäjän toimesta** (`allow_user_course_subscription_by_course_admin`) — jos et näe **Lisää käyttäjiä** -kuvaketta, kysy ylläpitäjältäsi.

## Käyttäjien kutsuminen sähköpostilla

Kolme edellä olevaa menetelmää olettavat, että henkilöllä on jo alustatili. **Kurssikutsut** kattavat tapauksen, jossa tiliä ei ole: lähetät kutsun sähköpostiosoitteeseen, ja Chamilo lähettää kyseiselle henkilölle kertakäyttöisen linkin. Linkin avaaminen antaa luoda tilin, ja heti rekisteröinnin valmistuttua heidät ilmoitetaan automaattisesti kurssillesi — erillistä ilmoittautumisvaihetta ei tarvita.

### Työkalun avaaminen

Avaa kurssisi **Käyttäjät**-työkalu ja klikkaa sitten työkalupalkista **Kutsu sähköpostilla** <img src="/.gitbook/assets/icons/mdi-email-outline.svg" alt="Kutsu sähköpostilla" data-size="line"> -kuvaketta **Lisää käyttäjiä** -kuvakkeen vierestä:

![Käyttäjät-työkalun työkalupalkki, jossa näkyvät Lisää käyttäjiä -kuvake ja Kutsu sähköpostilla -kuvake](/.gitbook/assets/course-users-invite-icon.png)

Tämä avaa **Kurssikutsut**-sivun.

### Kuka voi lähettää kutsuja

* Alustan ylläpitäjät, aina.
* Tavallisella kurssilla (ei avattu sessiossa): opettajat ja muut käyttäjät, joilla on kurssin muokkausoikeudet.
* Sessiossa: session yleinen valmentaja tai session ylläpitäjä — ei laajempi joukko kurssivalmentajia, koska kutsun lähettäminen tässä ilmoittaa *koko sessioon*, ei vain tälle yhdelle kurssille.

### Kutsun lähettäminen

1. Syötä vastaanottajan sähköpostiosoite **Kutsu sähköpostitse** -lomakkeeseen
2. Napsauta **Lähetä kutsu**

![Kurssikutsujen sivu: kutsu-sähköpostitse-lomake ja taulukko lähetetyistä kutsuista tiloineen](/.gitbook/assets/course-invitations-list.png)

Kaikki tälle kurssille lähettämäsi kutsut näkyvät lomakkeen alla tiloineen:

| Tila | Merkitys |
|--------|---------|
| **Odottaa** | Lähetetty, ei vielä käytetty. Voimassaoloaika on yhä voimassa. |
| **Hyväksytty** | Vastaanottaja rekisteröityi ja hänet tilattiin. |
| **Peruttu** | Peruutit sen ennen käyttöä. |

Vielä odottavalle kutsulle **Toiminnot**-sarake tarjoaa:

* **Kopioi** <img src="/.gitbook/assets/icons/mdi-content-copy.svg" alt="Kopioi" data-size="line"> — kopioi kutsulinkin, jos haluat mieluummin jakaa sen itse (chatissa, kasvokkain) sen sijaan, että luottaisit sähköpostiin.
* **Peruuta** <img src="/.gitbook/assets/icons/mdi-account-cancel.svg" alt="Peruuta" data-size="line"> — peruuttaa kutsun heti; linkki lakkaa toimimasta. Jo hyväksyttyä kutsua ei voi perua.

> **Kutsutulla sähköpostiosoitteella ei saa jo olla tiliä tällä alustalla.** Jos on, kutsun lähettäminen epäonnistuu viestillä, jossa pyydetään ilmoittamaan kyseinen olemassa oleva käyttäjä suoraan — [Manuaalinen ilmoittautuminen Käyttäjät-työkalun kautta](#manual-enrollment-via-the-users-tool) yllä.

### Kutsut sessiossa

Jos avaat Käyttäjät-työkalun kurssista, joka on käynnissä sessiossa, sivu näyttää muistutuksen, että kutsu koskee koko sessiota, ei vain tätä kurssia:

> *Tämä kurssi on avattu sessiossa. Kutsun lähettäminen täällä tilaa vastaanottajan koko sessioon, ei vain tälle kurssille.*

Tämä vastaa ilmoittautumisen toimintaa muualla Chamilossa: tilaat jonkun sessioon kokonaisuutena tai itsenäiseen kurssiin, mutta et koskaan ”tähän yhteen kurssiin tämän session sisällä” erillisenä toimena.

### Mitä kutsuttu henkilö näkee

Sähköposti sisältää linkin rekisteröintisivulle. Sen avaaminen:

* Esitäyttää ja lukitsee sähköpostikentän kutsumaasi osoitteeseen — he eivät voi rekisteröityä eri osoitteella kyseisellä linkillä.
* Antaa heidän täydentää rekisteröinnin **vaikka itsepalvelurekisteröinti olisi tällä hetkellä pois käytöstä koko alustalla** — edellyttäen, että ylläpitäjäsi on ottanut käyttöön asetuksen **Salli rekisteröityminen kurssikutsulinkkien kautta** (ks. alla). Ilman sitä kutsulinkki auttaa vain, kun itsepalvelurekisteröinti on muuten auki.
* Tilaa heidät heti kurssillesi (tai sessioon), kun he lähettävät lomakkeen, ja kirjauttaa heidät sisään.

Linkki on kertakäyttöinen ja vanhenee 7 päivän kuluttua. Jos se vanhenee tai sen kohdekutsu perutaan, sen avaaminen käyttäytyy kuin linkkiä ei olisi koskaan ollut.

> Alustanlaajuinen asetus **Salli rekisteröityminen kurssikutsulinkkien kautta** (`registration.allow_invitation_registration`) määrää, voiko kutsulinkkisi avata rekisteröinnin, kun yleinen itsepalvelurekisteröinti on pois päältä. Kysy ylläpitäjältäsi, jos kutsut eivät näytä toimivan muuten suljetulla alustalla.

## Vinkkejä

* **Sovita menetelmä tilanteeseen** — ylläpitäjä tai itseilmoittautuminen jo alustaa käyttäville, manuaalinen ilmoittautuminen tunnetulle olemassa olevalle käyttäjälle, kutsut ulkopuolisille vieraille, arvioijille tai kenelle tahansa, jolla ei vielä ole tiliä.
* **Peruuta kutsut, joita et enää tarvitse** — vanha odottava kutsu on yhä voimassa oleva, käyttämätön linkki; peruuta se, jos aiottu vastaanottaja ei enää tarvitse pääsyä tai jos et ole varma, saavuttiko se heidät.
* **Tarkista ylläpitäjältäsi, jos jokin menetelmä näyttää puuttuvan** — useita näistä kulkuista (manuaalinen ilmoittautuminen, kutsut, itseilmoittautuminen) voidaan rajoittaa tai poistaa käytöstä koko alustalla.