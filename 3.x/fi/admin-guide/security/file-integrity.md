# Tiedostojen eheys

*Uutta Chamilo 3.0:ssa.*

Tiedostojen eheys vertaa palvelimellesi asennettuja tiedostoja luotettuun perustilaan ja havaitsee odottamattomat lisäykset, muutokset, poistot ja käyttöoikeuksien muutokset — sellaiset jäljet, joita onnistunut tunkeutuminen, vaarantunut riippuvuus tai virheellinen manuaalinen muokkaus jättäisi.

## Tiedostojen eheyden avaaminen

Hallintapaneelista valitse **Turvallisuus > Tiedostojen eheys**.

## Mitä näkymä näyttää

![Tiedostojen eheyden sivu, jossa näkyvät viimeisimmän tarkistuksen tiedot, paneelit Lisätyt, Muutetut, Poistetut ja Käyttöoikeudet muuttuneet -tiedostoille, Hälytyshistoria-luettelo sekä Toiminnot tarkistuksen suorittamiseen, hälytysten keskeyttämiseen tai uuden perustilan asettamiseen](../../.gitbook/assets/admin-security-file-integrity.png)

* **Viimeisin tarkistus** — Milloin viimeisin tarkistus suoritettiin ja kuinka monta tiedostoa se tarkisti
* **Lisätyt / Muutetut / Poistetut** — Tiedostot, jotka poikkeavat perustilasta, tunnistettu vertaamalla SHA-256-tarkistussummia (kukin luettelo on rajattu 500 polkuun, ja huomautus annetaan, jos täydellinen luettelo on pidempi — katso täydellinen luettelo alla olevasta CEF-lokista)
* **Käyttöoikeudet muuttuneet** — Tiedostot, joiden käyttöoikeudet poikkeavat perustilasta. Linuxissa tämä vertaa POSIX-tilabittejä suoraan (esimerkiksi tiedosto, josta tulee kaikille kirjoitettava, merkitään); Windowsissa seurataan vain vain-luku-attribuuttia, koska `fileperms()` ei heijasta todellisia NTFS-ACL-oikeuksia
* **Hälytyshistoria** — Kestävä, vain liitettävä loki jokaisesta tarkistuksesta, joka löysi jotain (enintään viimeiset 50). Toisin kuin yllä oleva raportti, tätä luetteloa ei koskaan tyhjennetä puhtaalla tarkistuksella tai uudella perustilalla, joten aiemmat hälytykset pysyvät näkyvissä silloinkin, kun niiden ilmoittama poikkeama on jo korjattu

Tarkistus kulkee koko asennetun tiedostopuun läpi lukuun ottamatta hakemistoja `var/` ja `.git/` — yhdellä poikkeuksella: `.git/config` tarkistetaan silti erikseen, erityisesti sen havaitsemiseksi, että Git-etävarasto on hiljaa osoitettu uudelleen vihamieliselle palvelimelle. Symbolisia linkkejä ei koskaan seurata, jotta vältetään kiertosilmukat tai asennushakemistosta poistuminen.

Koska suuren asennuksen täysi tarkistus voi kestää useita minuutteja, kulku jaetaan osiin (yksi ylimmän tason hakemisto kerrallaan) ja sen edistyminen tallennetaan lukitustiedostoon — joten sivun voi turvallisesti ladata uudelleen edistymisen tarkistamiseksi, eikä kaatunutta tai keskeytettyä tarkistusta luulla yhä käynnissä olevaksi.

## Toiminnot

* **Suorita tarkistus nyt** — Vertaa nykyistä tiedostopuuta perustilaan välittömästi
* **Keskeytä 1 tunniksi** — Keskeyttää hälytykset tilapäisesti (esimerkiksi päivityksen käyttöönoton ajaksi). Vaatii oman salasanan syöttämisen uudelleen. Keskeytyksen aikana tarkistus omaksuu nykyisen puun hiljaa uudeksi perustilaksi hälyttämisen sijaan, joten keskeytysikkuna sulkeutuu ilman jäljelle jääviä hälytyksiä. Enimmäiskeskeytys on 24 tuntia
* **Aseta uusi perustila** — Omaksuu nykyisen tiedostopuun uudeksi luotetuksi viitteeksi. Vaatii oman salasanan syöttämisen uudelleen

Hälytysten keskeyttäminen tai uuden perustilan asettaminen voi peittää käynnissä olevan tunkeutumisen, minkä vuoksi molemmat vaativat salasanan uudelleen — kaapattu ylläpitäjäistunto ei yksin riitä vaientamaan havaitsemista, kun tiedostoja manipuloidaan.

## Suorittaminen cronista

Samat tarkistukset ovat käytettävissä konsolikomentoin, jotka on tarkoitettu ajoitettaviksi cronilla sen sijaan, että niitä suoritettaisiin hallintasivulta aikataululla:

```bash
# Scan for drift and alert admins if anything changed
0 3 * * * cd /var/www/chamilo/master && php bin/console app:file-integrity:scan

# Generate or regenerate the baseline (run once after install, or after a manual update)
php bin/console app:file-integrity:baseline

# Pause alerting from the command line (prompts for a global administrator's username and password)
php bin/console app:file-integrity:snooze
```

Jos keskeytys on aktiivinen, `app:file-integrity:scan` asettaa perustilan uudelleen hiljaa hälyttämisen sijaan, mikä vastaa hallintasivulta käynnistetyn tarkistuksen toimintaa.

## Asetukset

Yksi liittyvä asetus on kohdassa **Määritysasetukset > Turvallisuus**:

* **`file_integrity_check_notify_admins`** — Luettelo sähköpostiosoitteista, joille ilmoitetaan, kun poikkeama löytyy; jos kenttä jätetään tyhjäksi, ilmoitus lähetetään kaikille globaaleille ylläpitäjille

## SIEM-integraatio

Jokainen tarkistus kirjoittaa myös CEF-lokirivejä (Common Event Format) tiedostoon `var/logs/security/file_integrity.log`, jotka sopivat SIEM-järjestelmän (Wazuh, Splunk, QRadar, ArcSight, Elastic/Filebeat ja vastaavat työkalut) vastaanotettaviksi. Jokainen rivi merkitään allekirjoitustunnisteella, joka yksilöi muutoksen tyypin:

| Allekirjoitus | Merkitys |
|-----------|---------|
| `FIM-ADDED` | Uusi tiedosto ilmestyi |
| `FIM-MODIFIED` | Tiedoston sisältö muuttui |
| `FIM-DELETED` | Tiedosto katosi |
| `FIM-GITCONFIG` | `.git/config` muuttui (mahdollisesti kaapattu etävarasto) |
| `FIM-PERMS` | Tiedoston käyttöoikeudet muuttuivat |
| `FIM-TRUNCATED` | Luokan raportti rajattiin; katso täydellinen luettelo lokista |

## Suositeltu käyttö

1. Luo perusviiva heti asennuksen jälkeen ja uudelleen jokaisen manuaalisen päivityksen tai käyttöönoton jälkeen
2. Ajoita `app:file-integrity:scan` croniin (esimerkiksi öisin)
3. Ennen suunniteltua huoltoikkunaa, joka muuttaa tiedostoja (päivitys, migraatio), käytä **Keskeytä 1 tunniksi** sen sijaan, että poistaisit cron-työn kokonaan
4. Syötä `var/logs/security/file_integrity.log` olemassa olevaan lokivalvontaan tai SIEM-järjestelmään, jos sellainen on käytössä