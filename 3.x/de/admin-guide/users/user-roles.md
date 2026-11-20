# Benutzerrollen

Chamilo verwendet ein rollenbasiertes Berechtigungssystem. Jedem Benutzer wird eine Rolle zugewiesen, die bestimmt, was er auf der Plattform sehen und tun kann.

## Rollen auf Plattformebene

Diese Rollen steuern den Zugriff auf plattformweite Funktionen:

| Rolle |  Beschreibung |
|------|------------|
| **Lernender (Student)** | Die Standardrolle. Kann sich in Kurse einschreiben, auf Lerninhalte zugreifen, Aufgaben einreichen und Übungen absolvieren. |
| **Lehrkraft (Trainer)** | Kann Kurse erstellen und verwalten, Inhalte hinzufügen, Studierende bewerten und Berichte auf Kursebene einsehen. |
| **Sitzungsadministrator** | Kann Sitzungen (d. h. zeitbasierte Kurspakete) erstellen und verwalten, Benutzer in Sitzungen einschreiben und Tutoren zuweisen. Kann nicht auf allgemeine Plattformeinstellungen zugreifen. |
| **Personalmanager (HRM)** | Kann Tracking- und Berichtsdaten für zugewiesene Benutzer einsehen. Wird für Vorgesetzte verwendet, die die Schulung von Mitarbeitenden überwachen, aber weder Inhalte noch die Plattform verwalten müssen. |
| **Portaladministrator** | Vollständiger Zugriff auf alle Funktionen der Plattformadministration. Kann Benutzer, Kurse, Sitzungen, Plugins und alle Einstellungen verwalten. |
| **Globaler Administrator** | Entspricht dem Portaladministrator, verfügt jedoch über Zugriff auf alle Zugriffs-URLs in einer Multi-URL-Einrichtung (d. h. mandantenfähig) — oder, falls auf einer Nicht-Root-URL registriert, auf den Zweig genau dieser URL beschränkt. Siehe [Teilbaumadministratoren](../multi-url/access-urls.md#subtree-administrators). |
| **Anonym** | Eine besondere Rolle für Besucher, die nicht angemeldet sind. Kann auf öffentliche Kurse und Inhalte zugreifen, sofern dies aktiviert ist. |

## Rollen auf Kursebene

Innerhalb eines Kurses haben Benutzer spezifische Rollen:

| Rolle | Beschreibung |
|------|-------------|
| **Student** | Standardrolle im Kurs. Kann auf Inhalte zugreifen, Übungen absolvieren und Aufgaben einreichen. |
| **Kursassistent** | Verfügt über eingeschränkte Verwaltungsberechtigungen innerhalb des Kurses. Kann bei der Verwaltung von Inhalten helfen und Foren moderieren. |
| **Lehrkraft** | Vollständige Kontrolle über den Kurs: Inhalte, Werkzeuge, Einstellungen und Einschreibungen verwalten. |

## Rollen auf Sitzungsebene

Innerhalb einer Sitzung gibt es zusätzliche Rollen:

| Rolle | Beschreibung |
|------|-------------|
| **Sitzungstutor** | Beaufsichtigt alle Kurse innerhalb einer Sitzung. Kann das Tracking über alle Kurse der Sitzung hinweg einsehen. |
| **Kurstutor** | Unterrichtet einen bestimmten Kurs innerhalb einer Sitzung. Kann Inhalte verwalten und Lernende für diesen Kurs in dieser Sitzung nachverfolgen. |

Hinweis: Diese Rolle hieß in Chamilo-Versionen vor 3.0 „coach“. Ab Chamilo 3.0 wurde „coach“ überall in der Benutzeroberfläche und Dokumentation der Plattform durch „tutor“ ersetzt — ein Tutor ist eine Person, die Lernende durch einen Kurs begleitet, kein persönlicher Coach. Die zugrunde liegenden Einstellungsnamen in `Configuration settings` enthalten aus Gründen der Abwärtskompatibilität weiterhin „coach“ (zum Beispiel `add_users_by_coach`), ihre Bezeichnungen lauten jedoch nun „tutor“.

## HRM-Terminologie und Kompatibilität

Chamilo 3.x verwendet **HRM** (Human Resources Manager) anstelle der älteren Bezeichnung **DRH**. Bestehende HR-Beziehungen und Sitzungszuweisungen behalten ihre gespeicherten Werte; die Änderung erzeugt keine andere Rolle und erfordert keine Neuzuweisung von Benutzern. Einige ältere Integrationen und Konfigurationseinträge verwenden möglicherweise weiterhin `DRH` oder `ROLE_DRH`; die aktuelle Rolle ist `ROLE_HR`, mit Kompatibilitätsbehandlung für ältere Verweise.

Für neue Konfigurationen verwenden Sie `HRM` in rollenbezogenen Einstellungen wie `registration.redirect_after_login` und `security.mcp_allowed_roles`. Der ältere Schlüssel `DRH` wird für bestehende Konfigurationen weiterhin akzeptiert, `HRM` hat jedoch Vorrang, wenn beide Schlüssel angegeben sind. Die kanonischen Plattformeinstellungen sind `registration.hrm_autosubscribe`, `session.hrm_can_access_all_session_content` und `workflows.hrm_allow_access_to_all_students`; ältere Schlüssel `drh_*` werden aus Kompatibilitätsgründen weiterhin erkannt.

Siehe [Registrierungseinstellungen](../platform-settings/registration-settings.md), [Sitzungseinstellungen](../platform-settings/session-settings.md) und [Workflow-Einstellungen](../platform-settings/workflows-settings.md) für Konfigurationsdetails.

## Rollen zuweisen

Beim Erstellen oder Bearbeiten eines Benutzerkontos im Administrationsbereich wählen Sie die Rolle auf Plattformebene aus. Kurs- und Sitzungsrollen werden zugewiesen, wenn Benutzer in Kurse oder Sitzungen eingeschrieben werden.

## Rollenhierarchie

Rollen mit höheren Berechtigungen erben die Fähigkeiten von Rollen mit geringeren Berechtigungen:

* Ein Administrator kann alles tun, was eine Lehrkraft tun kann
* Eine Lehrkraft kann alles tun, was ein Student tun kann
* Rollen auf Sitzungsebene (Tutor) bieten zusätzliche Fähigkeiten nur innerhalb der ihnen zugewiesenen Sitzung

## Tipps

* **Wenden Sie das Prinzip der geringsten Berechtigung an** — Weisen Sie Benutzern die minimale Rolle zu, die sie zur Erfüllung ihrer Aufgaben benötigen
* **Verwenden Sie Sitzungsadministratoren** für die delegierte Verwaltung — Wenn Sie Mitarbeitende haben, die Schulungssitzungen verwalten müssen, aber nicht die gesamte Plattform, weisen Sie ihnen die Rolle „Sitzungsadministrator“ zu, anstatt vollen Administratorzugriff zu gewähren
* **Verwenden Sie HRM für Vorgesetzte** — Personalverantwortliche können den Schulungsfortschritt überwachen, ohne Zugriff auf die Änderung von Kursen oder Plattformeinstellungen zu haben
* **Rollenerstellung** — Chamilo 3.x verfügt über die interne Struktur für die Erstellung neuer Rollen, die Funktion benötigt jedoch weitere Tests für eine breite Veröffentlichung. Sie kann über [Offizielle Anbieter von Chamilo](https://chamilo.org/providers) aktiviert werden.