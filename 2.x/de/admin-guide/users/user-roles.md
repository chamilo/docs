# Benutzerrollen

Chamilo verwendet ein rollenbasiertes Berechtigungssystem. Jedem Benutzer wird eine Rolle zugewiesen, die bestimmt, was er auf der Plattform sehen und tun kann.

## Plattformweite Rollen

Diese Rollen steuern den Zugriff auf plattformweite Funktionen:

| Rolle | Beschreibung |
|------|--------------|
| **Lernender (Student)** | Die Standardrolle. Kann sich in Kurse einschreiben, auf Lerninhalte zugreifen, Aufgaben einreichen und Übungen absolvieren. |
| **Lehrer (Trainer)** | Kann Kurse erstellen und verwalten, Inhalte hinzufügen, Schüler bewerten und kursbezogene Berichte einsehen. |
| **Sitzungsadministrator** | Kann Sitzungen (d.h. zeitgebundene Kurspakete) erstellen und verwalten, Benutzer in Sitzungen einschreiben und Tutoren zuweisen. Hat keinen Zugriff auf allgemeine Plattformeinstellungen. |
| **Personalmanager (HRM)** | Kann Tracking- und Berichtsdaten für zugewiesene Benutzer einsehen. Wird für Vorgesetzte verwendet, die die Schulung von Mitarbeitern überwachen müssen, ohne Inhalte oder die Plattform zu verwalten. |
| **Portaladministrator** | Voller Zugriff auf alle Plattform-Administrationsfunktionen. Kann Benutzer, Kurse, Sitzungen, Plugins und alle Einstellungen verwalten. |
| **Globaler Administrator** | Wie der Portaladministrator, jedoch mit Zugriff auf alle Zugriffs-URLs in einer Multi-URL- (d.h. Multi-Tenant-) Umgebung. |
| **Anonym** | Eine spezielle Rolle für Besucher, die nicht eingeloggt sind. Kann auf öffentliche Kurse und Inhalte zugreifen, falls aktiviert. |

## Kursbezogene Rollen

Innerhalb eines Kurses haben Benutzer spezifische Rollen:

| Rolle | Beschreibung |
|------|--------------|
| **Student** | Standardrolle im Kurs. Kann auf Inhalte zugreifen, Übungen absolvieren und Aufgaben einreichen. |
| **Kursassistent** | Hat eingeschränkte Verwaltungsberechtigungen innerhalb des Kurses. Kann bei der Verwaltung von Inhalten und der Moderation von Foren helfen. |
| **Lehrer** | Volle Kontrolle über den Kurs: Verwaltung von Inhalten, Tools, Einstellungen und Einschreibungen. |

## Sitzungsbezogene Rollen

Innerhalb einer Sitzung gibt es zusätzliche Rollen:

| Rolle | Beschreibung |
|------|--------------|
| **Sitzungstutor** | Überwacht alle Kurse innerhalb einer Sitzung. Kann das Tracking über alle Kurse in der Sitzung einsehen. |
| **Kur tutor** | Unterrichtet einen bestimmten Kurs innerhalb einer Sitzung. Kann Inhalte verwalten und Lernende für diesen Kurs in dieser Sitzung verfolgen. |

Hinweis: Die Begriffe Coach und Tutor sind inhaltlich sehr ähnlich und hängen im Allgemeinen von der Organisation ab. In Chamilo 2.0 verwenden wir beide Begriffe austauschbar, aber meistens meinen wir Tutor, eine Person, die beim Lernen im Kurs hilft, und nicht einen persönlichen Coach. In Zukunft könnten wir ausschließlich "Tutor" verwenden.

## Rollenzuweisung

Beim Erstellen oder Bearbeiten eines Benutzerkontos im Administrationsbereich wählen Sie die plattformweite Rolle aus. Kurs- und Sitzungsrollen werden zugewiesen, wenn Benutzer in Kurse oder Sitzungen eingeschrieben werden.

## Rollenhierarchie

Rollen mit höheren Privilegien erben die Fähigkeiten von Rollen mit niedrigeren Privilegien:

* Ein Administrator kann alles tun, was ein Lehrer tun kann
* Ein Lehrer kann alles tun, was ein Student tun kann
* Sitzungsbezogene Rollen (Tutor) bieten zusätzliche Fähigkeiten nur innerhalb der zugewiesenen Sitzung

## Tipps

* **Verwenden Sie das Prinzip der minimalen Rechte** — Weisen Sie Benutzern die minimale Rolle zu, die sie für ihre Aufgaben benötigen
* **Nutzen Sie Sitzungsadministratoren für delegierte Verwaltung** — Wenn Sie Mitarbeiter haben, die Schulungssitzungen verwalten müssen, aber nicht die gesamte Plattform, geben Sie ihnen die Rolle des Sitzungsadministrators anstelle eines vollständigen Administratorzugriffs
* **Nutzen Sie HRM für Vorgesetzte** — Personalmanager können den Fortschritt bei Schulungen überwachen, ohne Zugriff auf die Änderung von Kursen oder Plattformeinstellungen zu haben
* **Rollen erstellen** — Chamilo 2.x hat die interne Struktur für die Erstellung neuer Rollen vorbereitet, aber die Funktion benötigt noch mehr Tests für eine breite Veröffentlichung. Sie kann über [Official providers of Chamilo](https://chamilo.org/providers) aktiviert werden.