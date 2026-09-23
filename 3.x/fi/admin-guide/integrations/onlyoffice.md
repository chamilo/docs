# OnlyOffice

**OnlyOffice**-integraatio mahdollistaa asiakirjojen (Word, Excel, PowerPoint) muokkaamisen suoraan selaimessa Chamilossa ilman niiden lataamista.

## Mitä OnlyOffice tarjoaa

* **Asiakirjojen muokkaus** — Muokkaa .docx-, .xlsx- ja .pptx-tiedostoja selaimessa
* **Muotoyhteensopivuus** — Täysi yhteensopivuus Microsoft Office -muotojen kanssa
* **Ei tarvita työpöytäohjelmistoa** — Kaikki toimii selaimessa

> Reaaliaikainen yhteiskäyttöinen muokkaus riippuu itse OnlyOffice Document Serveristä; Chamilon liitännäinen avaa ja tallentaa asiakirjat palvelimen kautta, mutta ei lisää eikä rajoita tätä ominaisuutta.

## Määritys

1. Asenna **OnlyOffice Document Server** palvelimellesi (tai käytä OnlyOfficen pilvipalvelua)
2. Määritä Chamilon alustan asetuksissa:
   * **OnlyOffice Document Server URL** — OnlyOffice-palvelimesi osoite
   * **Secret key** — Turvalliseen viestintään Chamilon ja OnlyOfficen välillä
3. Ota integraatio käyttöön

## Miten se toimii

Kun määritys on tehty, käyttäjät näkevät **Muokkaa OnlyOfficella** -vaihtoehdon, kun he tarkastelevat tuettuja asiakirjatyyppejä Asiakirjat-työkalussa. Sitä napsauttamalla asiakirja avautuu OnlyOffice-editorissa Chamilon käyttöliittymässä.

Muutokset tallennetaan automaattisesti takaisin Chamilon asiakirjavarastoon.

## Vinkkejä

* **Erillinen palvelin suositeltava** — Kuten BigBlueButton, OnlyOffice Document Server kannattaa ajaa omalla palvelimellaan parhaan suorituskyvyn saavuttamiseksi
* **HTTPS vaaditaan** — Sekä Chamilo että OnlyOffice tulee palvella HTTPS:n yli, jotta integraatio toimii
* **Tarkista muodot** — OnlyOffice toimii parhaiten Office-muotojen (.docx, .xlsx, .pptx) kanssa. Muilla muodoilla muokkaustuki voi olla rajallinen.