# Git-Workflow

## Repository

Der Quellcode von Chamilo wird auf GitHub gehostet: [github.com/chamilo/chamilo-lms](https://github.com/chamilo/chamilo-lms)

## Branching

* **`master`** — Hauptentwicklungszweig
* Feature-Branches werden aus `master` für neue Entwicklungen erstellt
* Release-Branches werden für stabile Versionen erstellt

## Beitrag zu einer Änderung

1. **Forken** Sie das Repository auf GitHub
2. **Klonen** Sie Ihren Fork lokal
3. **Erstellen Sie einen Branch** für Ihre Änderung: `git checkout -b feature/my-feature`
4. **Nehmen Sie Ihre Änderungen vor** und befolgen Sie dabei die Kodierungsrichtlinien
5. **Committen** Sie mit klaren, beschreibenden Commit-Nachrichten
6. **Pushen** Sie zu Ihrem Fork: `git push origin feature/my-feature`
7. **Erstellen Sie einen Pull Request** gegen den `master`-Branch

## Commit-Nachrichten

Schreiben Sie klare Commit-Nachrichten, die **was** und **warum** erklären:

```
Glossar: Hinzufügen von KI-unterstützter Begriffsgenerierung

Lehrer können nun Glossarbegriffe mithilfe konfigurierter KI-Anbieter generieren. Unterstützt konfigurierbare Eingabeaufforderungen und Begriffsanzahl.
```

### Konvention für Tool-Präfixe

Die Betreffzeile wird mit dem **Tool oder Bereich**, den die Änderung betrifft, und einem Doppelpunkt vorangestellt. Wir verwenden eine kurze, einheitliche Terminologie, damit das Changelog und `git log --oneline` nach Tool durchgesehen werden können. Das Präfix ist immer die **Singularform** des kanonischen Namens des Tools.

Format: `<Präfix>: <Zusammenfassung im Imperativ im Präsens>`

Beispiele:

```
Dokument: Fehlerbehebung bei der Listenansicht für Schüler
Übung: Verhindern von doppelten Fragetiteln innerhalb eines Quiz
Lernpfad: Ermöglichen der Neuordnung von Kapiteln per Drag-and-Drop
Intern: Refactoring der ResourceNode-Hydration im API-Normalizer
CI: Cachen von Composer-Downloads im GitHub Actions-Workflow
```

Wenn eine Änderung mehrere Tools betrifft, wählen Sie das am stärksten betroffene aus; wirklich übergreifende Änderungen, die nur die Code-Struktur betreffen (kein Endbenutzer-Tool), fallen unter `Intern`. Änderungen, die ausschließlich Dokumentation betreffen (diese Seite, das Changelog, inline-Docblocks, die rein als Referenz dienen), fallen unter `Dokumentation`.

#### Erlaubte Präfixe

| Präfix               | Bereich / Anmerkungen                                                               |
|----------------------|-------------------------------------------------------------------------------------|
| `Admin`              |                                                                                     |
| `Announcement`       |                                                                                     |
| `Attendance`         |                                                                                     |
| `Authentication`     |                                                                                     |
| `Blog`               |                                                                                     |
| `Calendar`           | Nicht "Agenda"                                                                      |
| `Career`             |                                                                                     |
| `Catalogue`          | Kurs- und Sitzungskatalog, einschließlich "beliebter Kurse" auf der Startseite      |
| `Chat`               |                                                                                     |
| `CI`                 | Continuous Integration, automatisierte Tests usw.                                   |
| `Course description` |                                                                                     |
| `Course Progress`    | Nicht "Thematischer Fortschritt"                                                    |
| `Course settings`    |                                                                                     |
| `Cron`               |                                                                                     |
| `Dashboard`          |                                                                                     |
| `Display`            |                                                                                     |
| `Document`           |                                                                                     |
| `Documentation`      | Alles, was ausschließlich mit der Dokumentation von Chamilo oder dem Code, dem Changelog usw. zusammenhängt |
| `Dropbox`            |                                                                                     |
| `Exercise`           | Nicht "Quiz"                                                                        |
| `Extra Fields`       |                                                                                     |
| `Forum`              |                                                                                     |
| `Glossary`           |                                                                                     |
| `Gradebook`          | Umfasst Zertifikate                                                                 |
| `Group`              | Umfasst Kursgruppen, globale Gruppen und Klassen                                    |
| `Help`               |                                                                                     |
| `Hook`               | Für den internen Hook-Mechanismus                                                   |
| `Install`            | Umfasst Upgrade-Angelegenheiten                                                     |
| `Internal`           | Für Änderungen und Korrekturen, die hauptsächlich den Code selbst betreffen oder sehr globaler Natur sind |
| `Language`           |                                                                                     |
| `Link`               |                                                                                     |
| `Learnpath`          | Für LP / Lernpfade                                                                  |
| `Maintenance`        | Das Kurswartungstool: Kurskopien, Backup, Wiederherstellung usw.                    |
| `Message`            |                                                                                     |
| `Notebook`           |                                                                                     |
| `Optimization`       |                                                                                     |
| `Portfolio`          |                                                                                     |
| `Privacy`            |                                                                                     |
| `Script`             | Für Inhalte in `tests/scripts/`                                                     |
| `Search`             | Volltextsuche                                                                       |
| `Security`           |                                                                                     |
| `Session`            |                                                                                     |
| `Skill`              |                                                                                     |
| `Social`             | Soziales Netzwerk                                                                   |
| `SSO`                | Single Sign-On-Methoden                                                             |
| `Survey`             |                                                                                     |
| `System`             | Dinge, die hauptsächlich mit Hosting und Feinabstimmung auf Serverebene zu tun haben |
| `Template`           |                                                                                     |
| `Ticket`             |                                                                                     |
| `Tracking`           |                                                                                     |
| `User`               |                                                                                     |
| `Webservice`         |                                                                                     |
| `Wiki`               |                                                                                     |
| `Work`               |                                                                                     |
| `WYSIWYG`            |                                                                                     |
| `XAPI`               |                                                                                     |

---
## Code-Review

Pull Requests werden vom Maintainer-Team überprüft. Seien Sie darauf vorbereitet:

* Feedback zu berücksichtigen und Überarbeitungen vorzunehmen
* Ihren Branch mit `master` auf dem neuesten Stand zu halten
* Sicherzustellen, dass die Tests bestanden werden

## Probleme melden

Melden Sie Fehler und Funktionswünsche im GitHub-Issue-Tracker.