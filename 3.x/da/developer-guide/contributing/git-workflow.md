# Git-arbejdsgang

## Arkiv

Chamilo-kildekoden hostes på GitHub: [github.com/chamilo/chamilo-lms](https://github.com/chamilo/chamilo-lms)

## Forgrening

* **`master`** — Primær udviklingsgren
* Funktionsgrene oprettes fra `master` til ny udvikling
* Udgivelsesgrene oprettes til stabile udgivelser

## Bidrag med en ændring

1. **Fork** arkivet på GitHub
2. **Klon** din fork lokalt
3. **Opret en gren** til din ændring: `git checkout -b feature/my-feature`
4. **Foretag dine ændringer** i overensstemmelse med kodningskonventionerne
5. **Commit** med klare, beskrivende commit-beskeder
6. **Push** til din fork: `git push origin feature/my-feature`
7. **Opret en pull request** mod grenen `master`

## Commit-beskeder

Skriv klare commit-beskeder, der forklarer **hvad** og **hvorfor**:

```
Glossary: Add AI-assisted term generation

Teachers can now generate glossary terms using configured AI
providers. Supports configurable prompt and term count.
```

### Konvention for værktøjspræfiks

Emnelinjen præfikseres med det **værktøj eller område**, som ændringen berører, efterfulgt af et kolon. Vi bruger en kort fælles terminologi, så changelog og `git log --oneline` kan skannes efter værktøj. Præfikset er altid den **entalsform** af værktøjets kanoniske navn.

Format: `<Prefix>: <Imperative summary in the present tense>`

Eksempler:

```
Document: Fix list for student view
Exercise: Prevent duplicate question titles within a quiz
Learnpath: Allow reordering chapters via drag and drop
Internal: Refactor ResourceNode hydration in the API normalizer
CI: Cache Composer downloads in the GitHub Actions workflow
```

Hvis en ændring spænder over flere værktøjer, vælges det mest berørte; reelt tværgående ændringer, der kun berører kodestruktur (intet slutbrugerværktøj), hører under `Internal`. Ændringer, der kun vedrører dokumentation (dette site, changelog, inline docblocks, der udelukkende er tænkt som reference), hører under `Documentation`.

#### Tilladte præfikser

| Prefix               | Scope / notes                                                                        |
|----------------------|--------------------------------------------------------------------------------------|
| `Admin`              |                                                                                      |
| `Announcement`       |                                                                                      |
| `Attendance`         |                                                                                      |
| `Authentication`     |                                                                                      |
| `Blog`               |                                                                                      |
| `Calendar`           | Ikke "Agenda"                                                                        |
| `Career`             |                                                                                      |
| `Catalogue`          | Katalog over kurser og sessioner, inklusive "hot courses" på startsiden              |
| `Chat`               |                                                                                      |
| `CI`                 | Continuous Integration, automatiserede tests osv.                                    |
| `Course description` |                                                                                      |
| `Course Progress`    | Ikke "Thematic advance"                                                              |
| `Course settings`    |                                                                                      |
| `Cron`               |                                                                                      |
| `Dashboard`          |                                                                                      |
| `Display`            |                                                                                      |
| `Document`           |                                                                                      |
| `Documentation`      | Alt, der udelukkende vedrører dokumentation af Chamilo eller koden, changelog osv.   |
| `Dropbox`            |                                                                                      |
| `Exercise`           | Ikke "Quiz"                                                                          |
| `Extra Fields`       |                                                                                      |
| `Forum`              |                                                                                      |
| `Glossary`           |                                                                                      |
| `Gradebook`          | Inkluderer certifikater                                                              |
| `Group`              | Inkluderer kursusgrupper, globale grupper og klasser                                 |
| `Help`               |                                                                                      |
| `Hook`               | Til den interne hook-mekanisme                                                       |
| `Install`            | Inkluderer opgraderingsrelateret                                                     |
| `Internal`           | Til ændringer og rettelser, der primært påvirker selve koden eller er meget globale af natur |
| `Language`           |                                                                                      |
| `Link`               |                                                                                      |
| `Learnpath`          | Til LP / læringsstier                                                                |
| `Maintenance`        | Værktøjet til kursusvedligeholdelse: kursuskopier, backup, gendannelse osv.          |
| `Message`            |                                                                                      |
| `Notebook`           |                                                                                      |
| `Optimization`       |                                                                                      |
| `Portfolio`          |                                                                                      |
| `Privacy`            |                                                                                      |
| `Script`             | Til det, der ligger i `tests/scripts/`                                               |
| `Search`             | Fuldtekstsøgning                                                                     |
| `Security`           |                                                                                      |
| `Session`            |                                                                                      |
| `Skill`              |                                                                                      |
| `Social`             | Socialt netværk                                                                      |
| `SSO`                | Single Sign-On-metoder                                                               |
| `Survey`             |                                                                                      |
| `System`             | Ting, der primært vedrører hosting og finjustering på serverniveau                   |
| `Template`           |                                                                                      |
| `Ticket`             |                                                                                      |
| `Tracking`           |                                                                                      |
| `User`               |                                                                                      |
| `Webservice`         |                                                                                      |
| `Wiki`               |                                                                                      |
| `Work`               |                                                                                      |
| `WYSIWYG`            |                                                                                      |
| `XAPI`               |                                                                                      |

## Kodegennemgang

Pull requests gennemgås af vedligeholderteamet. Vær forberedt på at:

* Tage imod feedback og foretage rettelser
* Holde din branch opdateret med `master`
* Sikre at tests består

## Rapportering af problemer

Rapportér fejl og funktionsønsker i GitHub-issue trackeren.