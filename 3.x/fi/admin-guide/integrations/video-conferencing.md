# Videoneuvottelu

Chamilo integroituu videoneuvottelualustoihin, jotta kursseilla voidaan järjestää live-istuntoja.

## Tuetut alustat

### BigBlueButton

**BigBlueButton** (BBB) on avoimen lähdekoodin web-neuvottelujärjestelmä, joka on suunniteltu verkko-oppimiseen. Se on yleisimmin käytetty videoneuvotteluratkaisu Chamilon kanssa.

#### Määritys

1. Asenna BigBlueButton erilliselle palvelimelle (ks. [BigBlueButton-dokumentaatio](https://docs.bigbluebutton.org/))
2. Käytä bbb-conf --salt BBB-palvelimella saadaksesi integrointitiedot
3. Chamilon alusta-asetuksissa, **Plugins**, asenna Videoconference-lisäosa ja syötä sen asetukset:
   * **BBB server URL** — BBB-palvelimesi osoite
   * **BBB salt/secret** — API-salaisuus BBB-palvelimeltasi
4. Tallenna
5. **Ota käyttöön** Videoconference-lisäosa
6. Joitakin erikoistoimintoja on saatavilla ylläpitäjille, joten varmista, että otat sen käyttöön *admin_page*-alueella

#### Chamilossa käytettävissä olevat ominaisuudet

* Kokousten aloittaminen/liittyminen kurssin sisältä
* Automaattinen huoneen luonti kurssia kohden
* Kokousten tallennukset (jos käytössä)
* Näytön jako, valkotaulu, pienryhmähuoneet
* Chat videon rinnalla

### Zoom

Chamilo voi integroitua myös **Zoom**-palveluun videoneuvottelua varten.

#### Määritys

1. Luo Zoom-sovellus Zoom Marketplacessa
2. Määritä Chamilossa Zoom API -tunnukset
3. Ota Zoom-integraatio käyttöön

#### Miten se toimii

Kun Zoom on määritetty, opettajat voivat luoda ja käynnistää Zoom-kokouksia kurssinsa sisältä. Oppijat liittyvät Chamilon käyttöliittymän kautta.

## Valinta BBB:n ja Zoomin välillä

| Ominaisuus | BigBlueButton | Zoom |
|---------|--------------|------|
| Kustannus | Ilmainen (avoimen lähdekoodin), mutta vaatii oman palvelimen | Vaatii Zoom-tilauksen |
| Hostaus | Itse isännöity | Zoomin pilvi-isännöinti |
| Integraation syvyys | Syvä (rakennettu LMS-käyttöön) | Vakio |
| Tallennus | Palvelinpuolella, tallennetaan omaan infrastruktuuriin | Zoomin pilvi tai paikallinen |
| Valkotaulu | Sisäänrakennettu | Sisäänrakennettu |
| Pienryhmähuoneet | Kyllä | Kyllä |

## Vinkkejä

* **Erillinen palvelin BBB:lle** — BigBlueButton kannattaa ajaa omalla omistetulla palvelimellaan parhaan suorituskyvyn saavuttamiseksi, ei samalla palvelimella kuin Chamilo
* **Testaa ennen oppitunteja** — Testaa videoneuvottelun asetukset aina ennen live-istuntoa
* **Tarkista kaistanleveys** — Varmista, että palvelimesi ja verkkosi kestävät odotetun samanaikaisten käyttäjien määrän