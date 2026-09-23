# Yksinkertainen IDS

Chamilo sisältää kevyen, sovelluksen sisäisen tunkeutumisen havaitsemisjärjestelmän (IDS). Jokaisella pyynnöllä se skannaa URL-kyselyparametrit, pyynnön polun ja muutaman otsikon (`User-Agent`, `Referer`) yleisten hyökkäysallekirjoitusten varalta — esimerkiksi XSS-hyötykuormat tai polun läpikäynnin mallit — ja kirjaa kaiken epäilyttävän. Yksinkertainen IDS -sivu antaa tarkastella, mitä se on merkinnyt.

Pyynnön **runkoja** ei tarkoituksella skannata, jotta vältetään vääriä positiivisia rikastekstieditorin sisällöstä (kurssiteksti sisältää oikeutetusti HTML-/JavaScript-tyyppistä merkintää).

## Yksinkertaisen IDS:n avaaminen

Hallintapaneelista napsauta **Turvallisuus > Yksinkertainen IDS**.

## Mitä se näyttää

![Yksinkertainen IDS -sivu, jossa on kaaviot tapahtumista päivittäin, tapahtumista tyypin mukaan ja eniten hyökkäävistä IP-osoitteista, sekä taulukko merkittyistä IDS-tapahtumista päivämäärällä, IP:llä, havaitsemistyypillä, parametrilla, URI:lla ja yksityiskohdilla](../../.gitbook/assets/admin-security-simple-ids.png)

* **Tapahtumat päivittäin (viimeiset 7 päivää)**, **Tapahtumat tyypin mukaan (viimeiset 30 päivää)** ja **Eniten hyökkäävät IP-osoitteet (viimeiset 30 päivää)** — Yhteenvetokaaviot
* **Merkittyjen IDS-tapahtumien taulukko** — Jokainen rivi näyttää päivämäärän, lähde-IP:n, havaitsemistyypin (esimerkiksi `XSS`), vaikutetun parametrin, pyynnön URI:n ja lyhyen kuvauksen siitä, mitä havaittiin

Käytä kaavioiden yläpuolella olevia **IP**-osoitteen, tapahtumatyypin ja päivämääräalueen suodattimia tulosten rajaamiseen.

## Miten se toimii

* Jokainen pyyntö skannataan sisääntulossa; osumat liitetään tiedostoon `var/logs/ids/ids_events.log`
* Ulostulossa sama tilaaja lisää OWASP:n suosittelemat suojausotsikot vastaukseen
* Jos esto on käytössä, allekirjoitukseen täsmäävä pyyntö pysäytetään heti HTTP 400 -vastauksella sen sijaan, että se pääsisi sovelluskoodiin

## Määritys

Yksinkertaista IDS:ää ohjataan ympäristömuuttujilla, jotka asetetaan tiedostossa `config/packages/chamilo_ids.yaml`:

| Muuttuja | Tarkoitus |
|----------|---------|
| `IDS_ENABLED` | Ottaa pyyntöjen skannauksen ja lokituksen käyttöön tai pois käytöstä |
| `IDS_BLOCK` | Kun käytössä, havaittu pyyntö hylätään (HTTP 400) sen sijaan, että se vain lokitettaisiin |
| `IDS_SECURITY_HEADERS` | Ohjaa, lisätäänkö OWASP:n suosittelemat vastausotsikot |

Tämä on kevyt, parhaan yrityksen mukainen tunnistin, joka on tarkoitettu ilmeisten skannaus- ja hyväksikäyttöyritysten kiinni saamiseen — se ei korvaa omistettua web-sovelluspalomuuria (WAF) korkean riskin käyttöönottoissa.