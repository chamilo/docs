# Haarojen pohjapiirrokset ja huonekartoitukset

Chamilo 3.1 voi liittää haaraan pohjapiirroskuvan ja merkitä huoneiden sijainnit kuvaan vuorovaikutteisilla monikulmioilla. Ominaisuus auttaa oppijoita löytämään heille osoitetut huoneet; se **ei** ole maantieteellinen GPS-kartta.

## Liitä haaran pohjapiirros

1. Avaa **Haarat**-hallinta-alue ja muokkaa haluttua haaraa.
2. Etsi **Pohjapiirros**-paneeli.
3. Valitse tai lataa kuva ja valitse **Liitä pohjapiirros** (tai **Vaihda pohjapiirros**, jos sellainen on jo olemassa).
4. Tallenna tai vahvista haaran muutokset tarvittaessa ja varmista, että pohjapiirroskuva latautuu.

Jos pohjapiirros ei ole enää voimassa, käytä **Poista pohjapiirros** -toimintoa sen jälkeen, kun olet tarkistanut, mitkä huoneet viittaavat siihen. Lataa vain luotettavaa sisältöä ja noudata haaran hallintanäytön käyttöoikeuksia.

## Rajaa huoneet

1. Muokkaa kyseiseen haaraan liitettyä huonetta.
2. Etsi huonelomakkeesta **Huone pohjapiirroksessa**.
3. Käytä monikulmiotyökalua huoneen rajan piirtämiseen. Käytä **Muokkaa**-toimintoa kärkipisteiden säätämiseen; kaikkien pisteiden on pysyttävä kuvan sisällä.
4. Valitse **Tallenna huonealue** ja tallenna sitten huonelomake, jotta muutokset säilyvät.
5. Avaa huoneen katselu vahvistaaksesi oikean sijainnin. Käytä **Tyhjennä huonealue**, jos kartoitus halutaan poistaa.

Huoneella on kerrallaan yksi muokattava monikulmio. Huonekartoitus on erillinen haaratason kuvasta, joten kuvan päivittäminen voi edellyttää olemassa olevien huonerajojen tarkistamista.

## Missä kartat näkyvät

Valtuutetut käyttäjät voivat tarkastella huoneiden pohjapiirroksia, kun huoneet valitaan tai näytetään kurssitiedoissa, kalenteritapahtumissa ja läsnäoloon liittyvissä työnkuluissa. Varmista näkyvyys niillä rooleilla, jotka todella tarkastelevat tietoja, erityisesti opiskelijoilla ja istunnon osallistujilla.

Haaran ja huoneen käyttöoikeudet koskevat myös pohjapiirrosresursseja. Usean URL-osoitteen asennuksissa varmista oikea portaalin ja haaran eristys ennen karttojen julkaisemista.

Katso [Huoneiden hallinta](managing-rooms.md) ja [Huoneiden saatavuuden haku](room-availability-finder.md). Toteutukset: [PR #9321](https://github.com/chamilo/chamilo-lms/pull/9321), [PR #9451](https://github.com/chamilo/chamilo-lms/pull/9451).