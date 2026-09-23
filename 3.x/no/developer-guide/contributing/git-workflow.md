# Git-arbeidsflyt

## Depot

Chamilo-kildekoden ligger på GitHub: [github.com/chamilo/chamilo-lms](https://github.com/chamilo/chamilo-lms)

## Forgrening

* **`master`** — Hovedgren for utvikling
* Funksjonsgrener opprettes fra `master` for ny utvikling
* Utgivelsesgrener opprettes for stabile utgivelser

## Bidra med en endring

1. **Fork** depotet på GitHub
2. **Klon** din fork lokalt
3. **Opprett en gren** for endringen din: `git checkout -b feature/my-feature`
4. **Gjør endringene** i tråd med kodestandardene
5. **Commit** med tydelige, beskrivende commit-meldinger
6. **Push** til din fork: `git push origin feature/my-feature`
7. **Opprett en pull request** mot grenen `master`

## Commit-meldinger

Skriv tydelige commit-meldinger som forklarer **hva** og **hvorfor**:

```
Glossary: Add AI-assisted term generation

Teachers can now generate glossary terms using configured AI
providers. Supports configurable prompt and term count.
```

### Konvensjon for verktøyprefiks

Emnelinjen prefikses med **verktøyet eller området** endringen berører, etterfulgt av kolon. Vi bruker en kort, felles terminologi slik at endringsloggen og `git log --oneline` kan skannes etter verktøy. Prefikset er alltid **entallsformen** av verktøyets kanoniske navn.

Format: `<Prefix>: <Imperative summary in the present tense>`

Eksempler:

```
Document: Fix list for student view
Exercise: Prevent duplicate question titles within a quiz
Learnpath: Allow reordering chapters via drag and drop
Internal: Refactor ResourceNode hydration in the API normalizer
CI: Cache Composer downloads in the GitHub Actions workflow
```

Hvis en endring spenner over flere verktøy, velg det som er mest berørt; virkelig tverrgående endringer som kun berører kodestruktur (ingen sluttbrukerverktøy) går under `Internal`. Endringer som kun gjelder dokumentasjon (dette nettstedet, endringsloggen, innebygde docblocks som kun er ment som referanse) går under `Documentation`.

#### Tillatte prefiks

| Prefiks              | Omfang / merknader                                                                   |
|----------------------|--------------------------------------------------------------------------------------|
| `Admin`              |                                                                                      |
| `Announcement`       |                                                                                      |
| `Attendance`         |                                                                                      |
| `Authentication`     |                                                                                      |
| `Blog`               |                                                                                      |
| `Calendar`           | Ikke «Agenda»                                                                        |
| `Career`             |                                                                                      |
| `Catalogue`          | Katalog for kurs og økter, inkludert «hot courses» på startsiden                     |
| `Chat`               |                                                                                      |
| `CI`                 | Kontinuerlig integrasjon, automatiserte tester osv.                                  |
| `Course description` |                                                                                      |
| `Course Progress`    | Ikke «Thematic advance»                                                              |
| `Course settings`    |                                                                                      |
| `Cron`               |                                                                                      |
| `Dashboard`          |                                                                                      |
| `Display`            |                                                                                      |
| `Document`           |                                                                                      |
| `Documentation`      | Alt som utelukkende gjelder dokumentasjon av Chamilo eller koden, endringsloggen osv. |
| `Dropbox`            |                                                                                      |
| `Exercise`           | Ikke «Quiz»                                                                          |
| `Extra Fields`       |                                                                                      |
| `Forum`              |                                                                                      |
| `Glossary`           |                                                                                      |
| `Gradebook`          | Inkluderer sertifikater                                                              |
| `Group`              | Inkluderer kursgrupper, globale grupper og klasser                                   |
| `Help`               |                                                                                      |
| `Hook`               | For den interne hook-mekanismen                                                      |
| `Install`            | Inkluderer oppgraderingsrelatert                                                     |
| `Internal`           | For endringer og fikser som hovedsakelig påvirker koden selv eller er svært globale av natur |
| `Language`           |                                                                                      |
| `Link`               |                                                                                      |
| `Learnpath`          | For LP / læringsstier                                                                |
| `Maintenance`        | Verktøyet for kursvedlikehold: kurskopier, sikkerhetskopi, gjenoppretting osv.       |
| `Message`            |                                                                                      |
| `Notebook`           |                                                                                      |
| `Optimization`       |                                                                                      |
| `Portfolio`          |                                                                                      |
| `Privacy`            |                                                                                      |
| `Script`             | For det som ligger i `tests/scripts/`                                                |
| `Search`             | Fulltekstsøk                                                                         |
| `Security`           |                                                                                      |
| `Session`            |                                                                                      |
| `Skill`              |                                                                                      |
| `Social`             | Sosialt nettverk                                                                     |
| `SSO`                | Metoder for Single Sign-On                                                           |
| `Survey`             |                                                                                      |
| `System`             | Ting som hovedsakelig gjelder hosting og finjustering på servernivå                  |
| `Template`           |                                                                                      |
| `Ticket`             |                                                                                      |
| `Tracking`           |                                                                                      |
| `User`               |                                                                                      |
| `Webservice`         |                                                                                      |
| `Wiki`               |                                                                                      |
| `Work`               |                                                                                      |
| `WYSIWYG`            |                                                                                      |
| `XAPI`               |                                                                                      |

## Kodegjennomgang

Pull requests gjennomgås av vedlikeholderteamet. Vær forberedt på å:

* Håndtere tilbakemeldinger og gjøre revisjoner
* Holde grenen din oppdatert mot `master`
* Sørge for at tester består

## Rapportering av saker

Rapporter feil og funksjonsønsker i GitHub-sakssporeren.