# Git-työnkulku

## Tietovarasto

Chamilon lähdekoodi on GitHubissa: [github.com/chamilo/chamilo-lms](https://github.com/chamilo/chamilo-lms)

## Haarautuminen

* **`master`** — Pääkehityshaara
* Ominaisuushaarat luodaan `master`-haarasta uutta kehitystä varten
* Julkaisuharat luodaan vakaita julkaisuja varten

## Muutoksen tarjoaminen

1. **Haarauta (fork)** tietovarasto GitHubissa
2. **Kloonaa** haarasi paikallisesti
3. **Luo haara** muutoksellesi: `git checkout -b feature/my-feature`
4. **Tee muutokset** noudattaen koodauskäytäntöjä
5. **Commitoi** selkeillä, kuvaavilla commit-viesteillä
6. **Pushaa** haaraasi: `git push origin feature/my-feature`
7. **Luo pull request** `master`-haaraa vastaan

## Commit-viestit

Kirjoita selkeitä commit-viestejä, jotka selittävät **mitä** ja **miksi**:

```
Glossary: Add AI-assisted term generation

Teachers can now generate glossary terms using configured AI
providers. Supports configurable prompt and term count.
```

### Työkalun etuliitekäytäntö

Aihe-rivi alkaa **työkalulla tai alueella**, johon muutos kohdistuu, ja sen jälkeen kaksoispiste. Käytämme lyhyttä yhteistä terminologiaa, jotta muutosloki ja `git log --oneline` voidaan silmäillä työkalun mukaan. Etuliite on aina työkalun kanonisen nimen **yksikkömuoto**.

Muoto: `<Prefix>: <Imperative summary in the present tense>`

Esimerkkejä:

```
Document: Fix list for student view
Exercise: Prevent duplicate question titles within a quiz
Learnpath: Allow reordering chapters via drag and drop
Internal: Refactor ResourceNode hydration in the API normalizer
CI: Cache Composer downloads in the GitHub Actions workflow
```

Jos muutos koskee useita työkaluja, valitse eniten vaikuttunut; aidosti poikkileikkaavat muutokset, jotka koskevat vain koodirakennetta (ei loppukäyttäjän työkalua), merkitään `Internal`. Vain dokumentaatiota koskevat muutokset (tämä sivusto, muutosloki, puhtaasti viitteeksi tarkoitetut inline-docblockit) merkitään `Documentation`.

#### Sallitut etuliitteet

| Prefix               | Scope / notes                                                                        |
|----------------------|--------------------------------------------------------------------------------------|
| `Admin`              |                                                                                      |
| `Announcement`       |                                                                                      |
| `Attendance`         |                                                                                      |
| `Authentication`     |                                                                                      |
| `Blog`               |                                                                                      |
| `Calendar`           | Ei "Agenda"                                                                          |
| `Career`             |                                                                                      |
| `Catalogue`          | Kurssien ja sessioiden luettelo, mukaan lukien etusivun "hot courses"                |
| `Chat`               |                                                                                      |
| `CI`                 | Jatkuva integrointi, automaattiset testit jne.                                       |
| `Course description` |                                                                                      |
| `Course Progress`    | Ei "Thematic advance"                                                                |
| `Course settings`    |                                                                                      |
| `Cron`               |                                                                                      |
| `Dashboard`          |                                                                                      |
| `Display`            |                                                                                      |
| `Document`           |                                                                                      |
| `Documentation`      | Kaikki, mikä liittyy yksinomaan Chamilon tai koodin dokumentointiin, changelogiin jne. |
| `Dropbox`            |                                                                                      |
| `Exercise`           | Ei "Quiz"                                                                            |
| `Extra Fields`       |                                                                                      |
| `Forum`              |                                                                                      |
| `Glossary`           |                                                                                      |
| `Gradebook`          | Sisältää todistukset                                                                 |
| `Group`              | Sisältää kurssiryhmät, globaalit ryhmät ja luokat                                    |
| `Help`               |                                                                                      |
| `Hook`               | Sisäiselle hook-mekanismille                                                         |
| `Install`            | Sisältää päivitykseen liittyvät asiat                                                |
| `Internal`           | Muutoksille ja korjauksille, jotka vaikuttavat pääasiassa itse koodiin tai ovat luonteeltaan hyvin yleisiä |
| `Language`           |                                                                                      |
| `Link`               |                                                                                      |
| `Learnpath`          | LP / oppimispoluille                                                                 |
| `Maintenance`        | Kurssin ylläpitotyökalu: kurssikopiot, varmuuskopiointi, palautus jne.               |
| `Message`            |                                                                                      |
| `Notebook`           |                                                                                      |
| `Optimization`       |                                                                                      |
| `Portfolio`          |                                                                                      |
| `Privacy`            |                                                                                      |
| `Script`             | Sille, mikä sijaitsee polussa `tests/scripts/`                                       |
| `Search`             | Kokotekstihaku                                                                       |
| `Security`           |                                                                                      |
| `Session`            |                                                                                      |
| `Skill`              |                                                                                      |
| `Social`             | Sosiaalinen verkosto                                                                 |
| `SSO`                | Single Sign-On -menetelmät                                                           |
| `Survey`             |                                                                                      |
| `System`             | Asiat, jotka liittyvät pääasiassa hostingiin ja palvelintason hienosäätöön           |
| `Template`           |                                                                                      |
| `Ticket`             |                                                                                      |
| `Tracking`           |                                                                                      |
| `User`               |                                                                                      |
| `Webservice`         |                                                                                      |
| `Wiki`               |                                                                                      |
| `Work`               |                                                                                      |
| `WYSIWYG`            |                                                                                      |
| `XAPI`               |                                                                                      |

## Koodikatselmointi

Ylläpitotiimi katselmoi pull requestit. Ole valmis:

* käsittelemään palautetta ja tekemään muutoksia
* pitämään haarasi ajan tasalla `master`-haaran kanssa
* varmistamaan, että testit läpäisevät

## Ongelmien ilmoittaminen

Ilmoita virheistä ja ominaisuuspyynnöistä GitHubin issue-seurannassa.