# Git-workflow

## Repository

De broncode van Chamilo wordt gehost op GitHub: [github.com/chamilo/chamilo-lms](https://github.com/chamilo/chamilo-lms)

## Branching

* **`master`** — Hoofdontwikkelingsbranch
* Feature-branches worden vanaf `master` aangemaakt voor nieuwe ontwikkeling
* Release-branches worden aangemaakt voor stabiele releases

## Een wijziging bijdragen

1. **Fork** de repository op GitHub
2. **Clone** je fork lokaal
3. **Maak een branch** voor je wijziging: `git checkout -b feature/my-feature`
4. **Voer je wijzigingen door** volgens de codeerconventies
5. **Commit** met duidelijke, beschrijvende commitberichten
6. **Push** naar je fork: `git push origin feature/my-feature`
7. **Maak een pull request** aan tegen de `master`-branch

## Commitberichten

Schrijf duidelijke commitberichten die **wat** en **waarom** uitleggen:

```
Glossary: Add AI-assisted term generation

Teachers can now generate glossary terms using configured AI
providers. Supports configurable prompt and term count.
```

### Conventie voor toolprefix

De onderwerpregel wordt voorafgegaan door de **tool of het gebied** waarop de wijziging betrekking heeft, gevolgd door een dubbele punt. We gebruiken een korte gedeelde terminologie zodat de changelog en `git log --oneline` per tool kunnen worden doorgenomen. Het prefix is altijd de **enkelvoudsvorm** van de canonieke naam van de tool.

Formaat: `<Prefix>: <Imperative summary in the present tense>`

Voorbeelden:

```
Document: Fix list for student view
Exercise: Prevent duplicate question titles within a quiz
Learnpath: Allow reordering chapters via drag and drop
Internal: Refactor ResourceNode hydration in the API normalizer
CI: Cache Composer downloads in the GitHub Actions workflow
```

Als een wijziging meerdere tools bestrijkt, kies dan de meest getroffen tool; echte dwarsdoorsnijdende wijzigingen die alleen de codestructuur raken (geen eindgebruikerstool) vallen onder `Internal`. Wijzigingen die alleen documentatie betreffen (deze site, de changelog, inline docblocks die puur als naslag bedoeld zijn) vallen onder `Documentation`.

#### Toegestane voorvoegsels

| Prefix               | Bereik / opmerkingen                                                                        |
|----------------------|--------------------------------------------------------------------------------------|
| `Admin`              |                                                                                      |
| `Announcement`       |                                                                                      |
| `Attendance`         |                                                                                      |
| `Authentication`     |                                                                                      |
| `Blog`               |                                                                                      |
| `Calendar`           | Niet "Agenda"                                                                         |
| `Career`             |                                                                                      |
| `Catalogue`          | Catalogus van cursussen en sessies, inclusief "hot courses" op de homepage              |
| `Chat`               |                                                                                      |
| `CI`                 | Continuous Integration, geautomatiseerde tests, enz.                                        |
| `Course description` |                                                                                      |
| `Course Progress`    | Niet "Thematic advance"                                                               |
| `Course settings`    |                                                                                      |
| `Cron`               |                                                                                      |
| `Dashboard`          |                                                                                      |
| `Display`            |                                                                                      |
| `Document`           |                                                                                      |
| `Documentation`      | Alles wat uitsluitend betrekking heeft op het documenteren van Chamilo of de code, de changelog, enz. |
| `Dropbox`            |                                                                                      |
| `Exercise`           | Niet "Quiz"                                                                           |
| `Extra Fields`       |                                                                                      |
| `Forum`              |                                                                                      |
| `Glossary`           |                                                                                      |
| `Gradebook`          | Inclusief certificaten                                                                |
| `Group`              | Inclusief cursusgroepen, globale groepen en klassen                                   |
| `Help`               |                                                                                      |
| `Hook`               | Voor het interne hook-mechanisme                                                      |
| `Install`            | Inclusief upgrade-gerelateerde zaken                                                               |
| `Internal`           | Voor wijzigingen en fixes die vooral de code zelf betreffen of van nature zeer globaal zijn    |
| `Language`           |                                                                                      |
| `Link`               |                                                                                      |
| `Learnpath`          | Voor LP / leerpaden                                                              |
| `Maintenance`        | De cursusonderhoudstool: cursuskopieën, back-up, herstel, enz.                    |
| `Message`            |                                                                                      |
| `Notebook`           |                                                                                      |
| `Optimization`       |                                                                                      |
| `Portfolio`          |                                                                                      |
| `Privacy`            |                                                                                      |
| `Script`             | Voor wat zich in `tests/scripts/` bevindt                                                   |
| `Search`             | Volledige-tekstzoekfunctie                                                                     |
| `Security`           |                                                                                      |
| `Session`            |                                                                                      |
| `Skill`              |                                                                                      |
| `Social`             | Sociaal netwerk                                                                       |
| `SSO`                | Single Sign-On-methoden                                                               |
| `Survey`             |                                                                                      |
| `System`             | Zaken die vooral te maken hebben met hosting en fijnregeling op serverniveau           |
| `Template`           |                                                                                      |
| `Ticket`             |                                                                                      |
| `Tracking`           |                                                                                      |
| `User`               |                                                                                      |
| `Webservice`         |                                                                                      |
| `Wiki`               |                                                                                      |
| `Work`               |                                                                                      |
| `WYSIWYG`            |                                                                                      |
| `XAPI`               |                                                                                      |

## Code Review

Pull requests worden beoordeeld door het team van maintainers. Wees voorbereid om:

* Feedback te verwerken en herzieningen door te voeren
* Je branch up-to-date te houden met `master`
* Te zorgen dat tests slagen

## Issues rapporteren

Meld bugs en feature requests via de GitHub issue tracker.