# Istuntojen hallinta

## Istunnon luominen

![Istunnon luomislomake, jossa kentät nimelle, päivämäärille, tuutorille, kategorialle ja näkyvyydelle](../../.gitbook/assets/admin-session-create-form.png)

1. Napsauta hallintapaneelissa **Create a session**
2. Täytä istunnon tiedot:
   * **Session name** — Kuvaava nimi (esim. "Spring 2026 Onboarding")
   * **Start and end dates** — Milloin istunto on käynnissä (valinnainen — istunnot voivat olla avoimia). Päivämääräjoukkoja on 3: näytettävät päivämäärät, oppijoiden pääsyä rajoittavat päivämäärät ja tuutoreiden pääsyä rajoittavat päivämäärät
   * **Session tutor** — Henkilö, joka valvoo koko istuntoa
   * **Category** — Määritä istuntokategoriaan organisoinnin vuoksi
   * **Visibility** — Hallitse pääsyä ja listauskäyttäytymistä
3. **Add courses** — Valitse yksi tai useampi kurssi sisällytettäväksi istuntoon
4. **Enroll learners** — Lisää yksittäisiä käyttäjiä tai käyttäjäluokkia
5. **Assign course tutors** — Määritä kullekin kurssille opettaja (kurssituutori)
6. Tallenna

## Istunnon päivämäärät

Istunnot tukevat joustavaa päivämääräasetusta:

| Date | Purpose |
|------|---------|
| **Display start/end** | Milloin istunto näkyy oppijoiden listauksissa |
| **Access start/end** | Milloin oppijat voivat tosiasiallisesti käyttää istunnon sisältöä |
| **Tutor access start/end** | Milloin tuutorit voivat käyttää istuntoa (alkaa usein ennen oppijoiden pääsyä ja päättyy sen jälkeen) |

Näin voit valmistella istunnon ennen oppijoiden saapumista ja pitää tuutoreiden pääsyn auki istunnon päättymisen jälkeen arviointia ja raportointia varten.

## Istuntolista

![Istuntolista, jossa näkyvät kaikki istunnot nimen, päivämäärien, kurssimäärän, oppijamäärän ja tilan kanssa](../../.gitbook/assets/admin-session-list.png)

Istuntolista näyttää kaikki istunnot seuraavin tiedoin:

* Istunnon nimi
* Alku- ja loppupäivämäärät
* Tila (aktiivinen, tuleva, mennyt)

Käytä hakua ja suodattimia löytääksesi istuntoja nimen, päivämäärän, kategorian tai tilan perusteella.

## Istunnon muokkaaminen

Napsauta istuntoa muokataksesi:

* Muuta päivämääriä, nimeä tai kategoriaa
* Lisää tai poista kursseja
* Vaihda kurssituutoreita
* Lisää tai poista oppijoita
* Tarkastele istunnon seurantatietoja

## Käyttäjien ilmoittaminen

![Istunnon ilmoittautumisnäkymä yksittäisten käyttäjien, luokkien lisäämiseen tai tuontiin CSV:llä](../../.gitbook/assets/admin-session-enrollment.png)

Voit ilmoittaa käyttäjiä istuntoon seuraavasti:

* **Individual enrollment** — Hae ja lisää yksittäisiä käyttäjiä
* **Class enrollment** — Lisää koko luokka (ennalta määritelty käyttäjäryhmä) kerralla
* **CSV import** — Lataa tiedosto, jossa on käyttäjä–istunto-määritykset

## Istunnon käyttö

Oppijat käyttävät istuntojaan sivupalkin kohdasta **My sessions**. Istunnot on järjestetty seuraavasti:

* **Current sessions** — Tällä hetkellä aktiiviset
* **Past sessions** — Päättyneet
* **Upcoming sessions** — Ei vielä alkaneet

## Vinkkejä

* **Plan dates carefully** — Varmista, että tuutoreiden pääsypäivämäärät ulottuvat oppijoiden päivämäärien yli, jotta tuutorit voivat valmistella ja seurata
* **Use classes for recurring enrollment** — Jos ilmoitat usein samat ryhmät, luo luokkia ja määritä ne istuntoihin
* **Keep sessions organized** — Käytä kategorioita ja selkeitä nimeämiskäytäntöjä helppoa hallintaa varten