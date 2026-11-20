# Kurssin automatisointi (manuaaliset käynnistykset)

Kurssiraportoinnin **Automatisointi**-osio antaa valtuutetuille opettajille mahdollisuuden määrittää toimintoja kurssin alkuun ja loppuun. Nykyisessä Chamilo 3.1 -toteutuksessa toiminnot **käynnistetään manuaalisesti**: älä oleta, että ne suoritetaan automaattisesti kalenteripäivänä tai cronin kautta.

## Määritä toiminnot

1. Avaa kurssi opettajana tai toisena käyttäjänä, jolla on oikeus hallita kurssiraportointia.
2. Avaa **Raportointi** ja etsi **Automatisointi**-osio.
3. Valitse tapahtuma (**Kurssi avautuu nyt** tai **Kurssi päättyy nyt**) ja toimintotyyppi.
4. Anna toiminnon edellyttämä kohde ja valitse sitten **Lisää toiminto**.
5. Tarkista **Määritetyt toiminnot** -luettelo; poista ei-toivottu merkintä sen **Poista**-toiminnolla.

Tuetut toiminnot sisältävät kurssiresurssien julkaisemisen tai piilottamisen, kyselykutsujen lähettämisen, olemassa olevien todistusten toimittamisen ja kurssin näkyvyyden muuttamisen. Käytettävissä olevat resurssit, kyselyt, Gradebook-asetukset ja näkyvyysarvot riippuvat kurssista ja nykyisen käyttäjän oikeuksista.

## Suorita määritetty tapahtuma

Valitse **Kurssi avautuu nyt** tai **Kurssi päättyy nyt** ja vahvista toiminto. Tarkista ilmoitettu tulos. Chamilo seuraa suoritettuja ajoja, estää päällekkäiset määritykset ja ohittaa myöhemmissä ajoissa toiminnot, jotka on jo suoritettu onnistuneesti. Toista napsautusta ei tule pitää keinona lähettää uudelleen jo suoritettu toiminto.

Todistusten toimittamista varten valmistele ja testaa ensin kyseinen todistus. Kyselykutsuja varten varmista, että kysely on määritetty ja että tarkoitetut oppijat kuuluvat nykyiseen kurssi- tai istuntokontekstiin.

## Tärkeät rajoitukset

- Tämä käyttöliittymä tarjoaa **manuaalisen suorituksen**, ei ajastettua automatisointia.
- Toiminnot toimivat nykyisessä kurssi-/istuntokontekstissa; testaa käyttöoikeudet ja kohteet molemmissa konteksteissa tarvittaessa.
- Onnistuneesti suoritetut toiminnot eivät toistu automaattisesti myöhemmissä ajoissa.
- Ominaisuuden PR:n ajankohtana todistusten toimittaminen, kurssin näkyvyyden muutokset ja istuntokohtainen suoritus oli koodikatselmoitu, mutta niitä ei ollut toiminnallisesti varmennettu kyseisessä PR:ssä. Testaa ne asennuksessasi ennen kuin luotat niihin operatiivisesti.

Katso [Kurssiraportit](course-reports.md) ja [Todistukset ja osaamiset](certificates-and-skills.md). Toteutus: [PR #9464](https://github.com/chamilo/chamilo-lms/pull/9464).