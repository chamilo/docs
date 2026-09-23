# Git-arbetsflöde

## Repository

Chamilo-källkoden finns på GitHub: [github.com/chamilo/chamilo-lms](https://github.com/chamilo/chamilo-lms)

## Branching

* **`master`** — Huvudsaklig utvecklingsgren
* Funktionsgrenar skapas från `master` för ny utveckling
* Releasegrenar skapas för stabila releaser

## Bidra med en ändring

1. **Forka** repositoryt på GitHub
2. **Klona** din fork lokalt
3. **Skapa en gren** för din ändring: `git checkout -b feature/my-feature`
4. **Gör dina ändringar** enligt kodkonventionerna
5. **Committa** med tydliga, beskrivande commit-meddelanden
6. **Pusha** till din fork: `git push origin feature/my-feature`
7. **Skapa en pull request** mot grenen `master`

## Commit-meddelanden

Skriv tydliga commit-meddelanden som förklarar **vad** och **varför**:

```
Glossary: Add AI-assisted term generation

Teachers can now generate glossary terms using configured AI
providers. Supports configurable prompt and term count.
```

### Konvention för verktygsprefix

Ämnesraden prefixas med det **verktyg eller område** som ändringen berör, följt av kolon. Vi använder en kort gemensam terminologi så att ändringsloggen och `git log --oneline` kan överblickas per verktyg. Prefixet är alltid **singularformen** av verktygets kanoniska namn.

Format: `<Prefix>: <Imperative summary in the present tense>`

Exempel:

```
Document: Fix list for student view
Exercise: Prevent duplicate question titles within a quiz
Learnpath: Allow reordering chapters via drag and drop
Internal: Refactor ResourceNode hydration in the API normalizer
CI: Cache Composer downloads in the GitHub Actions workflow
```

Om en ändring spänner över flera verktyg, välj det som påverkas mest; verkligt genomgående ändringar som endast berör kodstruktur (inget slutanvändarverktyg) hamnar under `Internal`. Ändringar som endast gäller dokumentation (denna webbplats, ändringsloggen, infogade docblocks avsedda enbart som referens) hamnar under `Documentation`.

#### Tillåtna prefix

| Prefix               | Omfattning / anmärkningar                                                            |
|----------------------|--------------------------------------------------------------------------------------|
| `Admin`              |                                                                                      |
| `Announcement`       |                                                                                      |
| `Attendance`         |                                                                                      |
| `Authentication`     |                                                                                      |
| `Blog`               |                                                                                      |
| `Calendar`           | Inte "Agenda"                                                                        |
| `Career`             |                                                                                      |
| `Catalogue`          | Katalog över kurser och sessioner, inklusive "hot courses" på startsidan             |
| `Chat`               |                                                                                      |
| `CI`                 | Continuous Integration, automatiserade tester etc.                                   |
| `Course description` |                                                                                      |
| `Course Progress`    | Inte "Thematic advance"                                                              |
| `Course settings`    |                                                                                      |
| `Cron`               |                                                                                      |
| `Dashboard`          |                                                                                      |
| `Display`            |                                                                                      |
| `Document`           |                                                                                      |
| `Documentation`      | Allt som uteslutande rör dokumentation av Chamilo eller koden, ändringsloggen etc.   |
| `Dropbox`            |                                                                                      |
| `Exercise`           | Inte "Quiz"                                                                          |
| `Extra Fields`       |                                                                                      |
| `Forum`              |                                                                                      |
| `Glossary`           |                                                                                      |
| `Gradebook`          | Inkluderar certifikat                                                                |
| `Group`              | Inkluderar kursgrupper, globala grupper och klasser                                  |
| `Help`               |                                                                                      |
| `Hook`               | För den interna hook-mekanismen                                                      |
| `Install`            | Inkluderar uppgraderingsrelaterat                                                    |
| `Internal`           | För ändringar och rättningar som mestadels påverkar koden i sig eller är mycket globala till sin natur |
| `Language`           |                                                                                      |
| `Link`               |                                                                                      |
| `Learnpath`          | För LP / Learning Paths                                                              |
| `Maintenance`        | Verktyget för kursunderhåll: kurskopior, säkerhetskopiering, återställning etc.      |
| `Message`            |                                                                                      |
| `Notebook`           |                                                                                      |
| `Optimization`       |                                                                                      |
| `Portfolio`          |                                                                                      |
| `Privacy`            |                                                                                      |
| `Script`             | För det som finns i `tests/scripts/`                                                 |
| `Search`             | Fulltextsökning                                                                      |
| `Security`           |                                                                                      |
| `Session`            |                                                                                      |
| `Skill`              |                                                                                      |
| `Social`             | Socialt nätverk                                                                      |
| `SSO`                | Metoder för Single Sign-On                                                           |
| `Survey`             |                                                                                      |
| `System`             | Saker som mestadels har att göra med hosting och finjustering på servernivå          |
| `Template`           |                                                                                      |
| `Ticket`             |                                                                                      |
| `Tracking`           |                                                                                      |
| `User`               |                                                                                      |
| `Webservice`         |                                                                                      |
| `Wiki`               |                                                                                      |
| `Work`               |                                                                                      |
| `WYSIWYG`            |                                                                                      |
| `XAPI`               |                                                                                      |

## Kodgranskning

Pull requests granskas av underhållarteamet. Var beredd på att:

* Hantera återkoppling och göra ändringar
* Hålla din gren uppdaterad mot `master`
* Säkerställa att testerna går igenom

## Rapportera ärenden

Rapportera buggar och funktionsönskemål i GitHubs ärendespårare.