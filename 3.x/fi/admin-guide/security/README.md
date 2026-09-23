# Tietoturva

Hallintapaneelin **Tietoturva**-lohko kokoaa alustan sisäänrakennetut tietoturvan valvonta- ja auditointityökalut. Se on erillinen [Tietoturva-asetuksista](../platform-settings/security-settings.md), jotka määrittävät tietoturva*käytännön* (salasanasäännöt, CAPTCHA, HTTP-tietoturvaotsakkeet ja niin edelleen) — tämä lohko tarjoaa *raportit ja työkalut*, jotka valvovat alustaa epäilyttävän toiminnan ja ei-toivottujen muutosten varalta.

![Hallintapaneelin Tietoturva-lohko, jossa luetellaan Tapahtumien auditointi, Kirjautumisyritykset, Simple IDS, Salasanan vahvuuden tarkistus ja Tiedostojen eheys](../../.gitbook/assets/admin-security-block.png)

Lohko otettiin käyttöön Chamilo 2.0:ssa neljällä työkalulla ja laajennettiin Chamilo 3.0:ssa viidennellä, **Tiedostojen eheys**.

## Tietoturva-lohkon avaaminen

Hallintapaneelissa **Tietoturva**-lohko näkyy muiden hallintapaneelin lohkojen rinnalla (Käyttäjät, Kurssit, Alustan hallinta, Järjestelmä ja niin edelleen). Avaa vastaava työkalu napsauttamalla mitä tahansa sen linkeistä.

## Mitä lohkossa on

* **[Tapahtumien auditointi](activities-audit.md)** — Selaa tärkeitä hallinnollisia ja alustatapahtumia (käyttäjä-, kurssi-, sessio- ja muita muutoksia) tapahtumatyypin mukaan
* **[Kirjautumisyritykset](login-attempts.md)** — Tarkastele epäonnistuneita ja onnistuneita kirjautumisyrityksiä kaavioineen ja haettavine lokitietoineen
* **[Simple IDS](simple-ids.md)** — Näytä Chamilon sisäänrakennetun, kevyen tunkeutumisen havaitsemisjärjestelmän merkitsemät pyynnöt
* **[Salasanan vahvuuden tarkistus](password-strength-checker.md)** — Skannaa aktiiviset käyttäjät salasanojen varalta, jotka vastaavat yleisesti käytettyjen salasanojen luetteloa
* **[Tiedostojen eheys](file-integrity.md)** *(uusi Chamilo 3.0:ssa)* — Havaitse odottamattomat lisäykset, muutokset, poistot tai käyttöoikeuksien muutokset asennetuissa tiedostoissa

## Kuka voi käyttää sitä

Kaikki viisi työkalua edellyttävät **portaalin ylläpitäjän** käyttöoikeutta. Tiedostojen eheyden skannaus-, keskeytys- ja uuden perustason asettamistoiminnot edellyttävät lisäksi **globaalin ylläpitäjän** käyttöoikeutta, ja hälytysten keskeyttäminen tai uuden perustason määrittäminen edellyttää oman salasanan syöttämistä uudelleen — katso lisätiedot kohdasta [Tiedostojen eheys](file-integrity.md#actions).