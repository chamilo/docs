# Git-Workflow

## Repository

Der Chamilo-Quellcode wird auf GitHub gehostet: [github.com/chamilo/chamilo-lms](https://github.com/chamilo/chamilo-lms)

## Branching

* **`master`** — Hauptentwicklungsbranch
* Feature-Branches werden von `master` für neue Entwicklungen erstellt
* Release-Branches werden für stabile Releases erstellt

## Eine Änderung beitragen

1. **Forken** Sie das Repository auf GitHub
2. **Klonen** Sie Ihren Fork lokal
3. **Erstellen Sie einen Branch** für Ihre Änderung: `git checkout -b feature/my-feature`
4. **Nehmen Sie Ihre Änderungen** gemäß den Coding Conventions vor
5. **Committen** Sie mit klaren, beschreibenden Commit-Nachrichten
6. **Pushen** Sie zu Ihrem Fork: `git push origin feature/my-feature`
7. **Erstellen Sie einen Pull Request** gegen den Branch `master`

## Commit-Nachrichten

Schreiben Sie klare Commit-Nachrichten, die **was** und **warum** erklären:

```
Glossary: Add AI-assisted term generation

Teachers can now generate glossary terms using configured AI
providers. Supports configurable prompt and term count.
```

### Konvention für Tool-Präfixe

Die Betreffzeile wird mit dem **Tool oder Bereich** präfixiert, den die Änderung betrifft, gefolgt von einem Doppelpunkt. Wir verwenden eine kurze gemeinsame Terminologie, damit das Changelog und `git log --oneline` nach Tool überflogen werden können. Das Präfix ist stets die **Singularform** des kanonischen Namens des Tools.

Format: `<Prefix>: <Imperative summary in the present tense>`

Beispiele:

```
Document: Fix list for student view
Exercise: Prevent duplicate question titles within a quiz
Learnpath: Allow reordering chapters via drag and drop
Internal: Refactor ResourceNode hydration in the API normalizer
CI: Cache Composer downloads in the GitHub Actions workflow
```

Betrifft eine Änderung mehrere Tools, wählen Sie das am stärksten betroffene; wirklich querschnittliche Änderungen, die nur die Codestruktur betreffen (kein Endbenutzer-Tool), fallen unter `Internal`. Rein dokumentarische Änderungen (diese Site, das Changelog, Inline-Docblocks, die ausschließlich als Referenz dienen) fallen unter `Documentation`.

#### Zulässige Präfixe

| Prefix               | Scope / notes                                                                        |
|----------------------|--------------------------------------------------------------------------------------|
| `Admin`              |                                                                                      |
| `Announcement`       |                                                                                      |
| `Attendance`         |                                                                                      |
| `Authentication`     |                                                                                      |
| `Blog`               |                                                                                      |
| `Calendar`           | Nicht „Agenda“                                                                       |
| `Career`             |                                                                                      |
| `Catalogue`          | Katalog der Kurse und Sitzungen, einschließlich der „Hot Courses“ auf der Startseite |
| `Chat`               |                                                                                      |
| `CI`                 | Continuous Integration, automatisierte Tests usw.                                    |
| `Course description` |                                                                                      |
| `Course Progress`    | Nicht „Thematic advance“                                                             |
| `Course settings`    |                                                                                      |
| `Cron`               |                                                                                      |
| `Dashboard`          |                                                                                      |
| `Display`            |                                                                                      |
| `Document`           |                                                                                      |
| `Documentation`      | Alles, was ausschließlich der Dokumentation von Chamilo oder des Codes, dem Changelog usw. dient |
| `Dropbox`            |                                                                                      |
| `Exercise`           | Nicht „Quiz“                                                                         |
| `Extra Fields`       |                                                                                      |
| `Forum`              |                                                                                      |
| `Glossary`           |                                                                                      |
| `Gradebook`          | Einschließlich Zertifikate                                                           |
| `Group`              | Einschließlich Kursgruppen, globaler Gruppen und Klassen                             |
| `Help`               |                                                                                      |
| `Hook`               | Für den internen Hook-Mechanismus                                                    |
| `Install`            | Einschließlich Upgrade-Angelegenheiten                                               |
| `Internal`           | Für Änderungen und Korrekturen, die überwiegend den Code selbst betreffen oder von Natur aus sehr global sind |
| `Language`           |                                                                                      |
| `Link`               |                                                                                      |
| `Learnpath`          | Für LP / Learning Paths                                                              |
| `Maintenance`        | Das Kurswartungswerkzeug: Kurskopien, Sicherung, Wiederherstellung usw.              |
| `Message`            |                                                                                      |
| `Notebook`           |                                                                                      |
| `Optimization`       |                                                                                      |
| `Portfolio`          |                                                                                      |
| `Privacy`            |                                                                                      |
| `Script`             | Für Inhalte in `tests/scripts/`                                                      |
| `Search`             | Volltextsuche                                                                        |
| `Security`           |                                                                                      |
| `Session`            |                                                                                      |
| `Skill`              |                                                                                      |
| `Social`             | Soziales Netzwerk                                                                    |
| `SSO`                | Single-Sign-On-Verfahren                                                             |
| `Survey`             |                                                                                      |
| `System`             | Dinge, die überwiegend Hosting und Feinabstimmung auf Serverebene betreffen          |
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

Pull Requests werden vom Maintainer-Team geprüft. Seien Sie darauf vorbereitet:

* Feedback umzusetzen und Überarbeitungen vorzunehmen
* Ihren Branch mit `master` aktuell zu halten
* sicherzustellen, dass die Tests erfolgreich durchlaufen

## Reporting Issues

Melden Sie Fehler und Feature-Anfragen im GitHub-Issue-Tracker.