# IMS/LTI-asiakas

IMS/LTI-asiakas <img src="../../.gitbook/assets/icons/mdi-link-variant.svg" alt="IMS/LTI-asiakas" data-size="line"> mahdollistaa ulkoisen työkalun tai sisältöpalvelun käynnistämisen kurssin sisältä LTI-standardin (versiot 1.1 ja 1.3) avulla — esimerkiksi kustantajan interaktiivisen oppikirjan, erikoistuneen simulaatiotyökalun tai toisen LTI:tä tukevan alustan. Chamilo toimii käynnistävänä alustana; ulkoinen palvelu on ”työkalu”.

## Työkalun käyttäminen

Kun ominaisuus on käytössä, kurssin **Asetuksissa** <img src="../../.gitbook/assets/icons/mdi-cog.svg" alt="Asetukset" data-size="line"> näkyy **Määritä ulkoiset työkalut** -painike. Sieltä voit joko:

* **Lisätä uuden ulkoisen työkalun** — Rekisteröi se itse: nimi, käynnistys-URL, LTI-versio ja ulkoisen palvelun antamat tunnisteet (asiakas-ID/avaimet LTI 1.3:lle tai kuluttaja-avain ja salaisuus LTI 1.1:lle)
* **Lisätä olemassa olevan globaalin työkalun** — Jos ylläpitäjä on jo rekisteröinyt alustanlaajuisen työkalun, lisää se kurssillesi sen sijaan, että loisit oman yhteyden

Lisäämisen jälkeen työkalu näkyy tavallisena työkaluna/pikakuvakkeena kurssin etusivulla.

## Mitä voit määrittää

Itse rekisteröimällesi työkalulle: avautuuko se iframe-kehyksessä vai uudessa ikkunassa, jaetaanko oppijan nimi, sähköposti ja kuva ulkoisen palvelun kanssa, mukautetut käynnistysparametrit sekä (LTI 1.3:lle) Deep Linking -tuki. Jos työkalu tukee Assignment and Grades Service -palvelua, voit myös luoda linkitetyn arviointikirjasarakkeen, jotta sen takaisin raportoimat pisteet siirtyvät Chamilon arviointikirjaan.

Alustanlaajuisesta ”globaalista” määritelmästä lisätylle työkalulle voit säätää vain näitä kurssitason esitys- ja tietosuoja-asetuksia — yhteystunnisteet kuuluvat sille, joka rekisteröi perustyökalun (yleensä ylläpitäjällesi).

## Vinkkejä

* **Hanki tunnisteet työkalun tarjoajalta ensin** — Tarvitset käynnistys-URL:n sekä joko LTI 1.3:n asiakas-/avaintiedot tai LTI 1.1:n kuluttaja-avaimen ja salaisuuden, ennen kuin voit rekisteröidä uuden työkalun
* **Ole harkittu sen suhteen, mitä jaat** — Ota oppijan nimen, sähköpostin tai kuvan jakaminen ulkoisen palvelun kanssa käyttöön vain, jos työkalu todella tarvitsee niitä
* **Kysy ylläpitäjältä globaaleista työkaluista** — Jos samaa ulkoista työkalua käytetään monilla kursseilla, alustanlaajuinen rekisteröinti välttää sen, että jokainen opettaja määrittäisi oman yhteytensä erikseen