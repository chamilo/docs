# Git Workflow

## Repository

De broncode van Chamilo wordt gehost op GitHub: [github.com/chamilo/chamilo-lms](https://github.com/chamilo/chamilo-lms)

## Branching

* **`master`** — Hoofdontwikkelbranch
* Feature-branches worden gemaakt vanuit `master` voor nieuwe ontwikkelingen
* Release-branches worden gemaakt voor stabiele releases

## Een wijziging bijdragen

1. **Fork** de repository op GitHub
2. **Kloon** je fork lokaal
3. **Maak een branch** voor je wijziging: `git checkout -b feature/my-feature`
4. **Voer je wijzigingen door** volgens de coderingsconventies
5. **Commit** met duidelijke, beschrijvende commitberichten
6. **Push** naar je fork: `git push origin feature/my-feature`
7. **Maak een pull request** aan tegen de `master`-branch

## Commitberichten

Schrijf duidelijke commitberichten die uitleggen **wat** en **waarom**:

```
Glossary: Voeg AI-ondersteunde termgeneratie toe

Docenten kunnen nu glossariumtermen genereren met behulp van geconfigureerde AI-providers. Ondersteunt configureerbare prompts en aantal termen.
```

### Conventie voor toolprefix

De onderwerpregel begint met de **tool of het gebied** dat door de wijziging wordt beïnvloed, gevolgd door een dubbele punt. We gebruiken een korte, gedeelde terminologie zodat de changelog en `git log --oneline` snel per tool kunnen worden doorlopen. Het prefix is altijd de **enkelvoudsvorm** van de canonieke naam van de tool.

Formaat: `<Prefix>: <Samenvatting in gebiedende wijs in de tegenwoordige tijd>`

Voorbeelden:

```
Document: Herstel lijstweergave voor studenten
Exercise: Voorkom dubbele vraagtitels binnen een quiz
Learnpath: Sta het herschikken van hoofdstukken toe via slepen en neerzetten
Internal: Refactor ResourceNode-hydratatie in de API-normalizer
CI: Cache Composer-downloads in de GitHub Actions-workflow
```

Als een wijziging meerdere tools omvat, kies dan de tool die het meest wordt beïnvloed; echt allesomvattende wijzigingen die alleen de codestructuur raken (geen eindgebruikerstool) vallen onder `Internal`. Wijzigingen die alleen documentatie betreffen (deze site, de changelog, inline docblocks die puur als referentie dienen) vallen onder `Documentation`.

---
#### Toegestane voorvoegsels

| Voorvoegsel          | Bereik / opmerkingen                                                                 |
|----------------------|--------------------------------------------------------------------------------------|
| `Admin`              |                                                                                      |
| `Announcement`       |                                                                                      |
| `Attendance`         |                                                                                      |
| `Authentication`     |                                                                                      |
| `Blog`               |                                                                                      |
| `Calendar`           | Niet "Agenda"                                                                        |
| `Career`             |                                                                                      |
| `Catalogue`          | Cursus- en sessiecatalogus, inclusief "populaire cursussen" op de homepage          |
| `Chat`               |                                                                                      |
| `CI`                 | Continuous Integration, geautomatiseerde tests, enz.                                 |
| `Course description` |                                                                                      |
| `Course Progress`    | Niet "Thematische vooruitgang"                                                       |
| `Course settings`    |                                                                                      |
| `Cron`               |                                                                                      |
| `Dashboard`          |                                                                                      |
| `Display`            |                                                                                      |
| `Document`           |                                                                                      |
| `Documentation`      | Alles wat uitsluitend betrekking heeft op het documenteren van Chamilo of de code, het changelog, enz. |
| `Dropbox`            |                                                                                      |
| `Exercise`           | Niet "Quiz"                                                                          |
| `Extra Fields`       |                                                                                      |
| `Forum`              |                                                                                      |
| `Glossary`           |                                                                                      |
| `Gradebook`          | Inclusief certificaten                                                               |
| `Group`              | Inclusief cursusgroepen, globale groepen en klassen                                  |
| `Help`               |                                                                                      |
| `Hook`               | Voor het interne hook-mechanisme                                                     |
| `Install`            | Inclusief upgrade-zaken                                                              |
| `Internal`           | Voor wijzigingen en fixes die voornamelijk de code zelf beïnvloeden of zeer globaal van aard zijn |
| `Language`           |                                                                                      |
| `Link`               |                                                                                      |
| `Learnpath`          | Voor LP / Leertrajecten                                                              |
| `Maintenance`        | Het cursusonderhoudsgereedschap: cursus kopieën, back-up, herstel, enz.              |
| `Message`            |                                                                                      |
| `Notebook`           |                                                                                      |
| `Optimization`       |                                                                                      |
| `Portfolio`          |                                                                                      |
| `Privacy`            |                                                                                      |
| `Script`             | Voor wat zich bevindt in `tests/scripts/`                                            |
| `Search`             | Volledige tekstzoekopdracht                                                          |
| `Security`           |                                                                                      |
| `Session`            |                                                                                      |
| `Skill`              |                                                                                      |
| `Social`             | Sociaal netwerk                                                                      |
| `SSO`                | Single Sign-On methoden                                                              |
| `Survey`             |                                                                                      |
| `System`             | Dingen die voornamelijk te maken hebben met hosting en fijn-tuning op serverniveau   |
| `Template`           |                                                                                      |
| `Ticket`             |                                                                                      |
| `Tracking`           |                                                                                      |
| `User`               |                                                                                      |
| `Webservice`         |                                                                                      |
| `Wiki`               |                                                                                      |
| `Work`               |                                                                                      |
| `WYSIWYG`            |                                                                                      |
| `XAPI`               |                                                                                      |

---
## Codebeoordeling

Pull requests worden beoordeeld door het onderhoudsteam. Wees voorbereid om:

* Feedback te verwerken en aanpassingen te doen
* Je branch up-to-date te houden met `master`
* Ervoor te zorgen dat tests slagen

## Problemen Melden

Meld bugs en functie-aanvragen op de GitHub issue tracker.