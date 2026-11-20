# Roskakorit harjoituksille ja oppimispoluille

Chamilo 3.1 voi arkistoida poistetut harjoitusyritykset ja oppimispolkujen seurantatiedot, jotta valtuutetut opettajat voivat palauttaa ne määritettyjen säilytys- ja käyttöoikeusasetusten mukaisesti. Roskakorit suojaavat seurantatietoja; ne eivät korvaa tietokannan varmuuskopioita.

## Palauta harjoitusyritys

1. Avaa kyseisen harjoituksen **Raportointi**-sivu niin, että oikea kurssi tai istunto on valittuna.
2. Valitse **Roskakori**, jotta arkistoidut yritykset tulevat näkyviin.
3. Tunnista oppija ja palautettava yritys.
4. Valitse **Palauta**, vahvista ja päivitä raportti tarkistaaksesi vastaukset ja pisteet.

Sinulla on oltava oikeus hallita harjoitustuloksia. Palautus voidaan estää, jos harjoitus on lukittu Arvosanakirjaan tai alusta rajoittaa opettajien pääsyä tuloksiin.

## Palauta oppimispolun edistyminen

1. Avaa kyseisen oppimispolun raportointinäkymä halutulle kurssille tai istunnolle.
2. Avaa sen **Roskakori**.
3. Valitse oppijan arkistoitu edistyminen ja **Palauta** se.
4. Tarkista palautettu oppitunnin edistyminen ja siihen liittyvät harjoitusyritykset.

Jos harjoitusyritys kuuluu odottavaan oppimispolun arkistoon, palauta ensin oppimispolun arkisto. Yksittäinen palautus on tarkoituksella estetty, jotta edistyminen ei jää epäjohdonmukaiseksi.

## Säilytys ja siivous (ylläpitäjät)

Asetus `tracking.recycle_bin_retention_hours` määrittää, kuinka kauan arkistot ovat palautettavissa. Alkuperäinen oletus on **30 päivää** (720 tuntia). Olemassa olevien asennusten on synkronoitava uusi asetus projektin settings-upsert-migraation kautta, ennen kuin sen voi odottaa näkyvän hallintakäyttöliittymässä.

Esikatsele siivous poistamatta mitään:

```bash
php bin/console chamilo:recycle-bin:purge
```

Pysyvä poisto edellyttää nimenomaista valitsinta:

```bash
php bin/console chamilo:recycle-bin:purge --execute
```

Komento tukee valitsimia `--hours` (säilytysajan ohitus), `--scan-limit`, `--after-lp-id` ja `--after-exercise-id` hallittua käsittelyä varten. Ajoita se vasta, kun säilytyskäytäntö ja varmuuskopiointijärjestelyt on tarkistettu. Ominaisuuden käyttöönotto **ei tarkoita implisiittistä automaattista tyhjennysaikataulua**.

Katso [Harjoitukset](exercises.md) ja [Oppimispolut](../adding-content/learning-paths.md). Toteutus: [PR #9383](https://github.com/chamilo/chamilo-lms/pull/9383).