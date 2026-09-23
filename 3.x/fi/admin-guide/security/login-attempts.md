# Kirjautumisyritykset

Kirjautumisyritykset-raportti näyttää epäonnistuneiden kirjautumisyritysten historian sekä kaavioita, joiden avulla voit havaita brute-force- tai credential stuffing -malleja.

## Kirjautumisyritysten avaaminen

Hallintapaneelista valitse **Turvallisuus > Kirjautumisyritykset**.

## Mitä se näyttää

![Kirjautumisyritykset-sivu, jossa on kaavioita päivittäisistä yrityksistä, eniten yrityksiä tehneistä IP-osoitteista, kuukausittaisista epäonnistuneista yrityksistä, onnistuneista ja epäonnistuneista kirjautumisista, tunneittaisista yrityksistä ja uniikeista IP-osoitteista päivässä sekä taulukko epäonnistuneista kirjautumisyrityksistä](/.gitbook/assets/admin-security-login-attempts.png)

* **Yritykset päivittäin (viimeiset 7 päivää)** — Epäonnistuneiden yritysten päivittäinen määrä
* **Eniten yrityksiä tehneet IP-osoitteet (viimeiset 30 päivää)** — Mitkä IP-osoitteet tuottivat eniten yrityksiä
* **Epäonnistuneet yritykset kuukausittain (viimeiset 12 kuukautta)** — Pidemmän aikavälin kehitys
* **Onnistuneet vs. epäonnistuneet (viimeiset 30 päivää)** — Onnistuneiden ja epäonnistuneiden kirjautumisten päivittäinen erittely
* **Yritykset tunneittain (viimeiset 7 päivää)** — Vuorokaudenajan jakauma, hyödyllinen automatisoitujen/skriptattujen yritysten havaitsemiseen
* **Uniikit IP-osoitteet päivässä (viimeiset 30 päivää)** — Kuinka monta eri IP-osoitetta yritti kirjautua kunkin päivän aikana
* **Epäonnistuneet kirjautumisyritykset -taulukko** — Jokainen epäonnistunut yritys päivämäärän, IP-osoitteen ja kokeillun käyttäjänimen kera

Käytä kaavioiden yläpuolella olevia **Käyttäjänimi**-, **IP**- ja aikavälikenttiä raportin suodattamiseen.

## Liittyvät asetukset

Tämä raportti on seurantatyökalu; varsinaiset brute-force-suojaukset määritetään kohdassa [Turvallisuusasetukset](../platform-settings/security-settings.md):

* **Enimmäiskirjautumisyritykset ennen lukitusta** (`login_max_attempt_before_blocking_account`) — Lukitsee tilin liian monen epäonnistuneen yrityksen jälkeen
* **CAPTCHA** (`allow_captcha`) ja **CAPTCHA-virheiden sallittu määrä** (`captcha_number_mistakes_to_block_account`) — Hidastaa automatisoituja yrityksiä ja lukitsee tilit, jotka epäonnistuvat CAPTCHA-tarkistuksessa toistuvasti

Katso myös [Turvallisuusopas](../appendix/security-guide.md) palvelintason brute-force-suojauksesta (fail2ban).