# Alustatyökalut

Tämä sivu käsittelee Platform management -lohkon jäljellä olevia, pienempiä kohteita.

## Extra Fields

**Platform > Extra fields** on tyypin valitsin, ei itse kenttäluettelo — se näyttää jokaisen objektityypin, joka tukee mukautettuja kenttiä, ja yhden napsauttaminen vie kyseisen tyypin omaan kenttäeditoriin. Saatavilla olevia tyyppejä ovat: user, course, session, question, learning path (sekä learning path item/view), skill, assignment (work), career, user certificate, survey, terms and conditions, forum category, forum post, exercise, exercise tracking, course announcement, message, document, attendance calendar, glossary, work correction comment, calendar event ja portfolio (sekä scheduled announcements, jos kyseinen ominaisuus on käytössä).

Yleisimmin käytetystä tapauksesta — mukautetuista käyttäjäprofiilikentistä — ks. [Käyttäjäprofiilointi](../users/user-profiling.md), joka käsittelee samaa taustalla olevaa ominaisuutta käyttäjähallinnan näkökulmasta.

## Mail Templates

**Platform > Mail templates** antaa korvata tiettyjen järjestelmäsähköpostien (rekisteröintivahvistus, tilausilmoitukset ja vastaavat) sanamuodon koskematta palvelintiedostoihin. Jokaisella mallilla on otsikko, **type**, joka vastaa tiettyä sisäänrakennettua sähköpostia, jonka se korvaa, itse mallin runko (pelkkä teksti/Twig, ei rikasta editoria) sekä "set as default" -lippu — vain yksi malli tyyppiä kohden voi olla aktiivinen oletus. Mallit ovat rajattuja access URL -kohtaisesti; erillistä kielikohtaista kenttää ei ole, joten näiden sähköpostien kielikäsittely on se, mitä ympäröivä koodi jo tekee.

Mallit renderöidään **hiekkalaatikoidussa** Twig-ympäristössä tietoturvan vuoksi: vain pieni joukko tageja ja suodattimia on sallittu, ja ainoa saatavilla oleva data on vastaanottajan `User`-objekti, johon viitataan muodossa `user.getEmail()`, `user.getFirstname()` ja vastaavilla gettereillä (`getId`, `getUsername`, `getLastname`, `getStatus`, `getOfficialCode`, `getPhone`). Mikään sallitun listan ulkopuolella ei aiheuta äänekästä virhettä — se renderöityy hiljaa tyhjäksi, jolloin palataan alkuperäiseen sisäänrakennettuun malliin. Pidä mukautetut mallit yksinkertaisina ja testaa ne (todellisella rekisteröinti- tai ilmoituslaukaisimella) muokkauksen jälkeen.

## Contact Form Categories

**Platform > Contact form categories** hallinnoi portaalin julkisessa **Contact us** -lomakkeessa näytettävää avattavaa valikkoa. Jokainen kategoria on vain otsikko ja kohdesähköpostiosoite — minkä kategorian vierailija valitsee, se määrää, mihin postilaatikkoon viesti ohjataan. Käytä tätä ohjaamaan eri aiheet (tuki, myynti, hakemukset) eri tiimeille ilman erillisten lomakkeiden rakentamista.

## Settings-Category Shortcuts

Muutama lohkon kohde on yksinkertaisesti suora linkki tiettyihin [Platform Settings](../platform-settings/README.md) -kategorioihin erillisten työkalujen sijaan:

* **Plugins** ja **System templates** avaavat Configuration Settings -näkymän esisuodatettuna näihin kategorioihin
* **Regions** tekee saman alustan alueasetuksille

## Occasionally-Visible Items

Kourallinen kohteita näkyy vain, kun asiaankuuluva asetus tai liitännäinen on aktiivinen, joten et ehkä näe niitä asennuksessasi:

* **Terms and Conditions** — näkyy, kun **Allow terms and conditions** on käytössä, käyttäjien hyväksyttävän tekstin hallintaan
* **Notifications** — näkyy, kun alustan notification-events -ominaisuus on käytössä
* **CMS**, **Dictionary**, **Justification** — kukin sidottu omaan valinnaiseen liitännäiseensä, joka on asennettu ja otettu käyttöön