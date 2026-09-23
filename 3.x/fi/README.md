# Chamilo 3.0 -dokumentaatio

Tervetuloa **Chamilo 3.0**:n, avoimen lähdekoodin e-oppimisalustan, viralliseen dokumentaatioon.

Tämä dokumentaatio on jaettu neljään oppaaseen, joista kukin on suunnattu tietylle kohderyhmälle:

* [**Opettajan opas**](teacher-guide/) — Opettajille ja kouluttajille: luo kursseja, lisää sisältöä, arvioi oppijoita ja seuraa edistymistä.
* [**Ylläpito-opas**](admin-guide/) — Alustan ylläpitäjille: asenna, määritä ja hallinnoi Chamilo-alustaa.
* [**Oppijan opas**](student-guide/) — Oppijoille: liity kursseille, seuraa oppimispolkuja, suorita testejä ja seuraa omaa edistymistäsi.
* [**Kehittäjän opas**](developer-guide/) — Kehittäjille: ymmärrä arkkitehtuuri, rakenna liitännäisiä, käytä API:a ja osallistu projektiin.

## Mitä uutta Chamilo 3.0:ssa

Chamilo 3.0 on merkittävä julkaisu, jonka painopisteinä ovat tekoälyavusteinen opetus, tietoturvan vahvistaminen ja täysin uudistettu liitännäisekosysteemi:

* **Tekoälypohjaiset opetusvälineet** — Kurssin laadun analysoija, tekoälytutori, joka vastaa alustaa koskeviin kysymyksiin, Student Success Coach oppijakohtaisine suosituksineen, tekoälyn tuottamat kurssikuvitukset ja pikatestit sekä tekoälyavusteinen arviointi
* **Model Context Protocol (MCP) -palvelin** — Mahdollistaa tekoälyasiakkaille kurssien, testien, oppimispolkujen, kyselyiden ja muun luomisen ja hallinnan suoraan
* **Tietoturvan vahvistaminen** — Natiivi tiedostojen eheyden valvonta (File Integrity Monitoring) sekä kymmeniä pääsynhallinnan korjauksia kursseissa, sessioissa ja API:ssa
* **Liitännäisekosysteemin täydellinen uudistus** — Kaikki 1.11.x-version liitännäiset otettu uudelleen käyttöön, uudistetulla liitännäisten hallintakäyttöliittymällä
* **Hierarkkiset URL-osoitteet ja monisivustohallinta** — Globaali multi-URL-paneeli sekä visuaalinen maantieteellinen karttahallinta toimipisteille ja tiloille
* **Parannetut oppimispolut ja harjoitukset** — Progressiivinen adaptiivinen testaus, OnlyOffice-ajonaikainen muokkaus, adaptiivinen hotspot-rajaus ja laajennettu SCORM 2004 -tuki
* **Arviointikirja ja todistukset** — Todistusten vanhenemispäivät muistutuksineen sekä mukautettavat arviointitavat
* **Mobiilivalmis REST API** — Uudistettu taustajärjestelmä, joka on rakennettu mobiilisovelluksia ja kolmannen osapuolen integraatioita varten