# Benutzerrollen

Chamilo verwendet ein rollenbasiertes Berechtigungssystem. Jedem Benutzer wird eine Rolle zugewiesen, die bestimmt, was er auf der Plattform sehen und tun kann.

## Plattformweite Rollen

Diese Rollen steuern den Zugriff auf plattformweite Funktionen:

| Rolle |  Beschreibung |
|------|------------|
| **Learner (Student)** | Die Standardrolle. Kann sich in Kurse einschreiben, Lerninhalte aufrufen, Aufgaben einreichen und Übungen absolvieren. |
| **Teacher (Trainer)** | Kann Kurse erstellen und verwalten, Inhalte hinzufügen, Studierende bewerten und kursbezogene Berichte einsehen. |
| **Sessions Administrator** | Kann Sessions (d. h. zeitlich begrenzte Kurspakete) erstellen und verwalten, Benutzer in Sessions einschreiben und Tutoren zuweisen. Hat keinen Zugriff auf allgemeine Plattformeinstellungen. |
| **Human Resources Manager (HRM)** | Kann Tracking- und Berichtsdaten für zugewiesene Benutzer einsehen. Wird für Vorgesetzte verwendet, die die Schulung von Mitarbeitenden überwachen müssen, ohne Inhalte oder die Plattform zu verwalten. |
| **Portal Administrator** | Voller Zugriff auf alle Administrationsfunktionen der Plattform. Kann Benutzer, Kurse, Sessions, Plugins und alle Einstellungen verwalten. |
| **Global Administrator** | Entspricht dem Portal Administrator, jedoch mit Zugriff über alle Zugriffs-URLs in einer Multi-URL-Umgebung (d. h. Multi-Tenant) — oder, bei Registrierung auf einer Nicht-Root-URL, beschränkt auf den Zweig dieser URL. Siehe [Subtree Administrators](../multi-url/access-urls.md#subtree-administrators). |
| **Anonymous** | Eine spezielle Rolle für Besucher, die nicht angemeldet sind. Kann auf öffentliche Kurse und Inhalte zugreifen, sofern dies aktiviert ist. |

## Kursbezogene Rollen

Innerhalb eines Kurses haben Benutzer spezifische Rollen:

| Rolle | Beschreibung |
|------|-------------|
| **Student** | Standardmäßige Kursrolle. Kann Inhalte aufrufen, Übungen absolvieren und Aufgaben einreichen. |
| **Course assistant** | Verfügt über eingeschränkte Verwaltungsrechte innerhalb des Kurses. Kann bei der Inhaltsverwaltung helfen und Foren moderieren. |
| **Teacher** | Volle Kontrolle über den Kurs: Verwaltung von Inhalten, Werkzeugen, Einstellungen und Einschreibungen. |

## Sessionbezogene Rollen

Innerhalb einer Session gibt es zusätzliche Rollen:

| Rolle | Beschreibung |
|------|-------------|
| **Session tutor** | Beaufsichtigt alle Kurse innerhalb einer Session. Kann Tracking über alle Kurse der Session hinweg einsehen. |
| **Course tutor** | Unterrichtet einen bestimmten Kurs innerhalb einer Session. Kann Inhalte verwalten und Lernende für diesen Kurs in dieser Session nachverfolgen. |

Hinweis: Diese Rolle wurde in Chamilo-Versionen vor 3.0 als „coach“ bezeichnet. Ab Chamilo 3.0 wurde „coach“ in der gesamten Benutzeroberfläche und Dokumentation der Plattform durch „tutor“ ersetzt — ein Tutor ist eine Person, die Lernende durch einen Kurs begleitet, kein persönlicher Coach. Die zugrunde liegenden Einstellungsnamen in `Configuration settings` enthalten aus Gründen der Abwärtskompatibilität weiterhin „coach“ (zum Beispiel `add_users_by_coach`), ihre Bezeichnungen lauten jedoch nun „tutor“.

## Rollen zuweisen

Beim Erstellen oder Bearbeiten eines Benutzerkontos im Administrationsbereich wählen Sie die plattformweite Rolle. Kurs- und Sessionrollen werden zugewiesen, wenn Benutzer in Kurse oder Sessions eingeschrieben werden.

## Rollenhierarchie

Rollen mit höheren Rechten erben die Fähigkeiten von Rollen mit geringeren Rechten:

* Ein Administrator kann alles tun, was ein Lehrender tun kann
* Ein Lehrender kann alles tun, was ein Studierender tun kann
* Sessionbezogene Rollen (Tutor) bieten zusätzliche Fähigkeiten nur innerhalb der zugewiesenen Session

## Tipps

* **Wenden Sie das Prinzip der geringsten Privilegien an** — Weisen Sie Benutzern die minimale Rolle zu, die sie zur Erfüllung ihrer Aufgaben benötigen
* **Nutzen Sie Sessions Administrators für delegierte Verwaltung** — Wenn Mitarbeitende Schulungssessions verwalten müssen, aber nicht die gesamte Plattform, geben Sie ihnen die Rolle Sessions Administrator statt vollen Administratorzugriff
* **Nutzen Sie HRM für Vorgesetzte** — Human Resources Managers können den Schulungsfortschritt überwachen, ohne Kurse oder Plattformeinstellungen ändern zu können
* **Rollenerstellung** — Chamilo 3.x verfügt intern über die Struktur zur Erstellung neuer Rollen, die Funktion bedarf jedoch noch weiterer Tests für eine breite Freigabe. Sie kann über [Official providers of Chamilo](https://chamilo.org/providers) aktiviert werden.