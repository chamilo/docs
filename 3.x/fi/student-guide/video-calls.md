# Kahdenväliset videopuhelut

Chamilo sisältää valinnaisen **kahdenvälisen videopuhelun** **kelluvan alustakeskustelun** sisällä. Se käyttää selaimen WebRTC-tukea yhdistääkseen kaksi Chamiloa käyttävää henkilöä. Tämä eroaa **kurssin Chat-työkalusta** sekä BigBlueButtonilla tai Zoomilla luoduista kokouksista.

Tämä ominaisuus otettiin käyttöön ja sitä parannettiin [ongelmassa #3777](https://github.com/chamilo/chamilo-lms/issues/3777) pull requesteissä [#9102](https://github.com/chamilo/chamilo-lms/pull/9102), [#9110](https://github.com/chamilo/chamilo-lms/pull/9110), [#9112](https://github.com/chamilo/chamilo-lms/pull/9112), [#9127](https://github.com/chamilo/chamilo-lms/pull/9127) ja [#9128](https://github.com/chamilo/chamilo-lms/pull/9128).

## Ennen aloittamista

* Ylläpitäjän on sallittava kelluvan alustakeskustelun käyttö ja asetettava **Piilota videokeskusteluvaihtoehto yleisessä keskustelussa** (`chat.hide_chat_video`) arvoon **Ei**. Se on oletuksena piilotettu. Katso [Keskusteluasetukset](../admin-guide/platform-settings/chat-settings.md).
* Käytä selainta, joka tukee WebRTC:tä ja jolle on myönnetty lupa käyttää kameraa ja mikrofonia. Selaimen mediakäyttö edellyttää tyypillisesti HTTPS-yhteyttä (tai luotettua paikallista kehitysympäristöä).
* Ole kirjautuneena ja aseta keskustelutilasi arvoon **verkossa**. Valitse tavallinen käyttäjäyhteyshenkilö; videopainike ei näy botille eikä silloin, kun ominaisuus on poistettu käytöstä.
* Toisen käyttäjän on oltava tavoitettavissa vastaanottamaan ja hyväksymään puhelu.

## Puhelun aloittaminen

1. Avaa **kelluva keskustelupaneeli** Chamilon alareunassa (ei kurssin omaa Chat-sivua).
2. Valitse henkilö, johon haluat ottaa yhteyttä.
3. Napsauta keskustelun otsikossa **Aloita videopuhelu** -kamerakuvaketta.
4. Myönnä kameran ja mikrofonin käyttöoikeus, kun selain pyytää sitä.
5. Puhelu näyttää tilan **Soitetaan...**, kun Chamilo odottaa toista käyttäjää. Kun hän hyväksyy puhelun, tila muuttuu **Yhdistetään...** -tilan kautta tilaan **Yhdistetty**, kun vertaisyhteys on muodostunut.

Vastaamaton puhelu aikakatkaistaan sen sijaan, että se jatkuisi loputtomasti. Jos toinen käyttäjä kieltäytyy tai peruuttaa, keskustelu näyttää selittävän tilaviestin.

## Puhelun vastaanottaminen ja hallinta

Kun yhteyshenkilö soittaa, kelluva keskustelu näyttää **Saapuva videopuhelu** -valintaikkunan. Valitse **Hyväksy** liittyäksesi tai **Hylkää** kieltäytyäksesi. Hyväksyminen voi myös pyytää lupaa käyttää kameraa ja mikrofonia.

Puhelun aikana voit **mykistää mikrofonin tai poistaa mykistyksen**, **kytkeä kameran päälle tai pois** ja **lopettaa puhelun**. Pieni esikatselu näyttää paikallisen videosi, kun pääalue näyttää toisen henkilön. Puhelun sulkeminen tai lopettaminen vapauttaa paikalliset ääni- ja videovirrat.

Tämä on **yksityinen puhelu kahden käyttäjän välillä**, ei koko kurssin kokous. Ajastetun ryhmäistunnon pitämiseen tallennuksella tai yhteistyötyökaluilla käytä organisaatiosi [videoneuvottelu](../teacher-guide/collaboration-and-communication/video-conferencing.md)-integraatiota.

## Jos videopuhelu ei ole käytettävissä

* **Ei Aloita videopuhelu -kuvaketta:** Tarkista alustan `chat.hide_chat_video`-asetus, onko kelluva keskustelu käytettävissä, verkossa-tilasi ja selaimen WebRTC-tuki.
* **Kamera- tai mikrofonivirhe:** Salli median käyttöoikeudet selaimessa ja tarkista, että laitteisto on käytettävissä eikä toisen sovelluksen varaama.
* **Ei vastausta:** Pyydä yhteyshenkilöäsi avaamaan Chamilo ja tarkistamaan saatavuutensa. Lähtevällä pyynnöllä on aikakatkaisu.
* **Yhteys epäonnistuu hyväksymisen jälkeen:** Kokeile toista verkkoa ja tarkista selaimen käyttöoikeudet tai palomuurirajoitukset. Nykyinen WebRTC-toteutus käyttää julkista STUN-palvelinta eikä määritä TURN-välityspalvelinta, joten yhteys voi epäonnistua rajoittavissa verkoissa. Tekstikeskustelu voi silti toimia, jos videosignalointi epäonnistuu.

Tätä suoraa puheluominaisuutta varten ei tarvitse määrittää BigBlueButtonia tai Zoomia; nämä integraatiot tarjoavat erillisen kokoustyypin.