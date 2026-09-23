# xAPI

**xAPI** (Experience API, tunnetaan myös nimellä Tin Can API) on standardi oppimiskokemusten seurantaan. Chamilo voi sekä tuottaa että vastaanottaa xAPI-lauseita.

## Mitä xAPI tekee

xAPI seuraa oppimistoimintoja **lauseina** muodossa: "Toimija teki Verbin Objektille." Esimerkiksi:

* "Jane suoritti Moduulin 1"
* "John sai 85 % loppukokeesta"
* "Maria katsoi johdantovideon"

Nämä lauseet tallennetaan **Learning Record Storeen (LRS)**, joka tarjoaa kattavan kirjauksen oppimistoiminnasta.

## Määritys

1. Määritä alustan asetuksissa **LRS-päätepiste**:
   * **LRS URL** — Learning Record Storen osoite
   * **LRS-todennus** — Tunnistetiedot tietojen lähettämiseen LRS:ään
2. Ota xAPI-seuranta käyttöön halutuille toiminnoille

## Mitä Chamilo seuraa xAPI:n kautta

Chamilo voi tuottaa xAPI-lauseita seuraavista:

* Kurssin käyttö ja suorittaminen
* Harjoitusyritykset ja pisteet
* Oppimispolun osioiden edistyminen
* Portfoliokohteet

Muista työkaluista (kuten Asiakirjat ja Foorumit) liitännäinen ei tällä hetkellä lähetä xAPI-tapahtumia.

## Käyttötapaukset

* **Alustojen välinen seuranta** — Seuraa oppimistoimintaa useissa työkaluissa ja alustoissa yhdessä LRS:ssä
* **Edistynyt analytiikka** — Käytä LRS:n analytiikkatyökaluja näkemysten tuottamiseen, jotka ylittävät Chamilon sisäänrakennetun raportoinnin
* **Vaatimustenmukaisuusraportointi** — Tuota koulutuksen suorittamisen auditointijälkiä sääntelyvaatimuksia varten