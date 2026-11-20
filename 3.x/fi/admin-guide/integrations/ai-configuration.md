# Tekoälyn määritys

Chamilo 3.0 sisältää tekoälyominaisuuksia, jotka on määritettävä, ennen kuin ne ovat opettajien ja oppijoiden käytettävissä.

## Tuetut tekoälypalveluntarjoajat

Chamilo tukee useita tekoälypalveluntarjoajia:

| Palveluntarjoaja | Ominaisuudet |
|----------|-------------|
| **DeepSeek** | Tekstin tuottaminen |
| **Google Gemini** | Tekstin, kuvien ja videon tuottaminen |
| **Grok** | Tekstin, kuvien ja videon tuottaminen |
| **Mistral** | Tekstin tuottaminen |
| **OpenAI** | Tekstin, kuvien ja videon tuottaminen |

Kukin palveluntarjoaja voidaan määrittää eri tyyppisiä tekoälytehtäviä varten:

* **Teksti** — Käytetään tehtävien tuottamiseen, oppimispolkujen tuottamiseen, tekoälyarviointiin ja tekoälytutoriin
* **Kuva** — Käytetään tekoälyn kuvantuotantoon
* **Video** — Käytetään tekoälyn videontuotantoon (jos tuettu)
* **Asiakirja** — Käytetään tekoälyn asiakirja-analyysiin

## Määritysvaiheet

### 1. Hanki API-avaimet

Rekisteröidy valitsemasi tekoälypalveluntarjoajan tilille ja hanki API-avain:

* **DeepSeek**: [platform.deepseek.com](https://platform.deepseek.com/)
* **Google Gemini**: Google AI Studio tai Google Cloud
* **Grok**: [console.x.ai](https://console.x.ai/)
* **Mistral**: [console.mistral.ai](https://console.mistral.ai/)
* **OpenAI**: [platform.openai.com](https://platform.openai.com/)

### 2. Määritä palveluntarjoajat Chamilossa

![Tekoälyavustajien määrityssivu, jossa näkyvät palveluntarjoajan asetukset API-avaimen, mallin ja päätepisteen kenttineen](/.gitbook/assets/admin-ai-helpers-config.png)

Siirry alustan asetuksissa **Tekoälyavustajat**-osioon:

1. **Ota tekoälyavustajat käyttöön** — Ota tekoälyominaisuudet käyttöön globaalisti
2. **Määritä tekoälypalveluntarjoajat** — Lisää yksi tai useampi palveluntarjoaja seuraavin tiedoin:
   * **Palveluntarjoajan nimi** (deepseek, gemini, grok, mistral, openai)
   * **API-avain** — Palveluntarjoajan API-avaimesi
   * **Malli** — Käytettävä malli (esim. `gpt-4`, `gemini-pro`, `mistral-large`)
   * **API-URL** — Päätepisteen URL (esimääritetty vakio palveluntarjoajille)

Voit määrittää useita palveluntarjoajia. Määrityksen ensimmäisestä palveluntarjoajasta tulee oletus.

### 3. Ota ominaisuudet käyttöön kurssikohtaisesti

Tekoälyominaisuudet voidaan ottaa käyttöön tai poistaa käytöstä kurssitasolla. Opettajat voivat kytkeä päälle tai pois:

* **Tekoälytutori-chatbot** — Oppijoiden tekoälyavustaja
* **Tehtävien arvioija** — Tekoälyn tuottama arviointisuositus
* **Harjoitusten tuottaja** — Tekoälyn tuottamat tenttikysymykset
* **Oppimispolun tuottaja** — Tekoälyn tuottamat oppimisjaksot
* **Kuva-/videotuottaja** — Tekoälyn tuottamat kuvat ja videot asiakirjoissa

Näin eri kurssit voivat käyttää erilaisia tekoälymäärityksiä tarpeidensa mukaan.

## Kustannusnäkökohdat

Tekoälyn API-kutsuista aiheutuu kustannuksia. Huomioi:

* **Käyttörajojen asettaminen** — Seuraa ja rajoita tekoälyn API-käyttöä kustannusten hallitsemiseksi
* **Mallien harkittu valinta** — Pienemmät ja edullisemmat mallit voivat riittää moniin opetustehtäviin
* **Käytön seuranta** — Chamilo kirjaa tekoälypyynnöt, jotta kulutusta voidaan seurata

## Vinkkejä

* **Aloita yhdellä palveluntarjoajalla** — Määritä ja testaa yksi palveluntarjoaja ennen uusien lisäämistä
* **Testaa kurssilla** — Ota tekoälyominaisuudet ensin käyttöön testikurssilla ja varmista, että ne toimivat odotetusti
* **Viesti opettajille** — Kerro opettajille, mitkä tekoälyominaisuudet ovat käytettävissä ja miten niitä käytetään
* **Seuraa laatua** — Tarkista tekoälyn tuottama sisältö säännöllisesti, jotta se täyttää opetukselliset standardinne