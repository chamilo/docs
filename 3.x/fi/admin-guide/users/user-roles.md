# Käyttäjäroolit

Chamilo käyttää roolipohjaista käyttöoikeusjärjestelmää. Jokaiselle käyttäjälle määritetään rooli, joka määrää, mitä hän voi nähdä ja tehdä alustalla.

## Alustatason roolit

Nämä roolit hallitsevat pääsyä alustan laajuisisiin ominaisuuksiin:

| Rooli |  Kuvaus |
|------|------------|
| **Oppija (opiskelija)** | Oletusrooli. Voi ilmoittautua kursseille, käyttää oppimissisältöä, palauttaa tehtäviä ja suorittaa harjoituksia. |
| **Opettaja (kouluttaja)** | Voi luoda ja hallita kursseja, lisätä sisältöä, arvioida opiskelijoita ja tarkastella kurssitason raportteja. |
| **Istuntojen ylläpitäjä** | Voi luoda ja hallita istuntoja (eli aikaperusteisia kurssipaketteja), ilmoittaa käyttäjiä istuntoihin ja määrittää tutoreita. Ei pääse yleisiin alustan asetuksiin. |
| **Henkilöstöjohtaja (HRM)** | Voi tarkastella seuranta- ja raportointitietoja määritetyille käyttäjille. Käytetään esimiehille, joiden on seurattava työntekijöiden koulutusta mutta ei hallita sisältöä eikä alustaa. |
| **Portaalin ylläpitäjä** | Täysi pääsy kaikkiin alustan ylläpito-ominaisuuksiin. Voi hallita käyttäjiä, kursseja, istuntoja, liitännäisiä ja kaikkia asetuksia. |
| **Globaali ylläpitäjä** | Sama kuin portaalin ylläpitäjä, mutta pääsy kaikkiin käyttö-URL-osoitteisiin moni-URL- (eli monivuokralais-) asennuksessa — tai, jos rekisteröity ei-juuri-URL-osoitteeseen, rajattu vain kyseisen URL-osoitteen haaraan. Katso [Alipuun ylläpitäjät](../multi-url/access-urls.md#subtree-administrators). |
| **Anonyymi** | Erityisrooli vierailijoille, jotka eivät ole kirjautuneet sisään. Voi käyttää julkisia kursseja ja sisältöä, jos se on käytössä. |

## Kurssitason roolit

Kurssin sisällä käyttäjillä on tietyt roolit:

| Rooli | Kuvaus |
|------|-------------|
| **Opiskelija** | Kurssin oletusrooli. Voi käyttää sisältöä, suorittaa harjoituksia, palauttaa tehtäviä. |
| **Kurssiavustaja** | Rajoitetut hallintaoikeudet kurssin sisällä. Voi auttaa sisällön hallinnassa ja keskustelualueiden moderoinnissa. |
| **Opettaja** | Täysi hallinta kurssista: sisällön, työkalujen, asetusten ja ilmoittautumisen hallinta. |

## Istuntotason roolit

Istunnon sisällä on lisärooleja:

| Rooli | Kuvaus |
|------|-------------|
| **Istuntotutori** | Valvoo kaikkia istunnon kursseja. Voi tarkastella seurantaa kaikissa istunnon kursseissa. |
| **Kurssitutori** | Opettaa tiettyä kurssia istunnossa. Voi hallita sisältöä ja seurata oppijoita kyseisellä kurssilla kyseisessä istunnossa. |

Huomautus: Tätä roolia kutsuttiin "valmentajaksi" (coach) Chamilo-versioissa ennen 3.0:aa. Chamilo 3.0:sta lähtien "coach" on korvattu "tutorilla" kaikkialla alustan käyttöliittymässä ja dokumentaatiossa — tutori on henkilö, joka auttaa oppijoita kurssin läpi, ei henkilökohtainen valmentaja. Taustalla olevat asetusnimet kohdassa `Configuration settings` sisältävät yhä "coach"-sanan taaksepäin yhteensopivuuden vuoksi (esimerkiksi `add_users_by_coach`), mutta niiden otsikot lukevat nyt "tutor".

## Roolien määrittäminen

Kun luot tai muokkaat käyttäjätiliä hallintapaneelissa, valitset hänen alustatason roolinsa. Kurssi- ja istuntoroolit määritetään, kun käyttäjiä ilmoitetaan kursseille tai istuntoihin.

## Roolihierarkia

Korkeamman oikeustason roolit perivät alemman oikeustason roolien kyvyt:

* Ylläpitäjä voi tehdä kaiken, mitä opettaja voi tehdä
* Opettaja voi tehdä kaiken, mitä opiskelija voi tehdä
* Istuntotason roolit (tutori) tarjoavat lisäkykyjä vain heidän määritetyssä istunnossaan

## Vinkkejä

* **Käytä vähimmän oikeuden periaatetta** — Määritä käyttäjille vähimmäisrooli, jonka he tarvitsevat tehtäviensä suorittamiseen
* **Käytä istuntojen ylläpitäjiä hajautettuun hallintaan** — Jos sinulla on henkilöstöä, jonka on hallittava koulutustilaisuuksia mutta ei koko alustaa, anna heille istuntojen ylläpitäjän rooli täyden ylläpitäjäoikeuden sijaan
* **Käytä HRM:ää esimiehille** — Henkilöstöjohtajat voivat seurata koulutuksen edistymistä ilman pääsyä kurssien tai alustan asetusten muokkaamiseen
* **Roolien luominen** — Chamilo 3.x:llä on sisäinen rakenne valmiina uusien roolien luomiseen, mutta ominaisuus kaipaa lisää testausta laajaa julkaisua varten. Se voidaan ottaa käyttöön [Chamilon virallisten palveluntarjoajien](https://chamilo.org/providers) kautta.