# Kompetenzen verwalten

Diese Seite behandelt die drei Dashboard-Einträge, mit denen der Kompetenzkatalog der Plattform aufgebaut wird: Kompetenzen in großen Mengen importieren, die Kompetenzdefinitionen selbst verwalten und jeder Kompetenz eine Stufenskala zuweisen.

## Kompetenzen importieren

**Skills > Skills import** ermöglicht es, eine Kompetenzhierarchie aus einer CSV- oder XML-Datei in großen Mengen anzulegen, anstatt Kompetenzen einzeln zu erstellen. Jede Zeile benötigt mindestens eine `id`, eine `parent_id` (zum Aufbau der Baumstruktur) und einen `title`. Eine Beispielvorlage steht zur Verfügung, auf der Sie Ihre Datei aufbauen können.

## Kompetenzen verwalten

**Skills > Manage skills** ist der zentrale Kompetenzkatalog: Kompetenzen erstellen, bearbeiten, aktivieren/deaktivieren und löschen. Jede Kompetenz hat einen Titel, einen Kurzcode, eine Beschreibung, ein Symbol und eine optionale Kriterienbeschreibung (was eine lernende Person tun muss, um sie zu erwerben). Kompetenzen können verschachtelt werden — eine Kompetenz kann untergeordnete Kompetenzen haben —, was das [Kompetenzrad](skills-wheel.md) visualisiert.

### Erwerbbare Kompetenzen und strukturelle Kompetenzen

Verwenden Sie beim Erstellen oder Bearbeiten einer Kompetenz **Acquirable**, um anzugeben, ob Lernende sie tatsächlich erwerben dürfen. Die Option ist standardmäßig aktiviert. Deaktivieren Sie sie für eine übergeordnete oder organisatorische Kategorie, die nur dazu dient, andere Kompetenzen zu gruppieren: Eine solche Kompetenz bleibt in der Hierarchie, kann aber nicht durch manuelle Zuweisung oder über die Workflows Übung, Lernpfad oder Notenbuch vergeben werden. Bestehende Kompetenzbeziehungen und deren Verlauf bleiben erhalten. Dieses Verhalten wurde in [PR #9206](https://github.com/chamilo/chamilo-lms/pull/9206) (Issue #8179) hinzugefügt.

## Manuelle Kompetenzzuweisung

Wenn die manuelle Kompetenzzuweisung für Ihre Rolle verfügbar ist, öffnen Sie **Assign skill** für die Benutzerin oder den Benutzer, wählen Sie die **Skill**, wählen Sie bei Verwendung von Stufen eine **Level acquired** und geben Sie die erforderliche **Argumentation** an, die erläutert, warum die Kompetenz vergeben wird.

Wenn **Assigning skills to user: sub-skills auto-loading** (`manual_assignment_subskill_autoload`) aktiviert ist, zeigt die Liste **Skill** nur die Kompetenzen der ersten Ebene der Baumstruktur. Die Auswahl einer Kompetenz zeigt eine zweite Liste mit ihren untergeordneten Kompetenzen, dann eine dritte und so weiter. Halten Sie auf der Ebene der Kompetenz an, die Sie zuweisen möchten, und lassen Sie die nächste Liste leer; um eine Ebene nach oben zurückzukehren, leeren Sie die Liste. Eine Kompetenz, die nicht **Acquirable** ist, kann ausgewählt werden, um ihre untergeordneten Kompetenzen zu erreichen, das Formular weist jedoch darauf hin, dass sie nicht erworben werden kann, und lässt das Speichern nicht zu.

Wählen Sie bei einer bestehenden manuellen Zuweisung, die entfernt werden kann, die Kompetenz aus und klicken Sie auf **Remove**, und bestätigen Sie anschließend die Aktion. Entfernte Zuweisungen zählen nicht mehr als erworbene Kompetenzen. Zuweisungen, deren Quelle eine manuelle Entfernung nicht zulässt, bieten diese Aktion nicht an.

Aus den Berichtsdetails einer lernenden Person kann eine berechtigte Benutzerin oder ein berechtigter Benutzer dem **skill badge/link** zu den Zuweisungsdetails folgen und anschließend die vorhandene Entfernungsaktion verwenden, wenn die Kompetenz manuell zugewiesen wurde. Der Zuweisungsverlauf bleibt nach Entfernung und erneuter Zuweisung verfügbar; das Entfernen einer Kompetenz löscht ihren Prüfpfad nicht. Kehren Sie über den verfügbaren Navigationslink zum Bericht der lernenden Person zurück.

## Kompetenzstufen verwalten

**Skills > Manage skills levels** ist ein separater, kleinerer Bildschirm: Er listet vorhandene Kompetenzen auf und ermöglicht es, jede einem **level profile** zuzuweisen — einer benannten, geordneten Menge von Stufen (zum Beispiel Bronze/Silber/Gold), anhand derer die Kompetenz gemessen wird. Kurz gesagt: Verwenden Sie **Manage skills**, um zu definieren, was eine Kompetenz *ist*, und **Manage skills levels**, um zu definieren, auf welcher Skala sie gemessen wird.

### Stufenbeschreibungen und verfügbare Profile

Einzelne Stufen in einem Stufenprofil haben nun ein Feld **Description**, das unter **Manage skills levels** zusätzlich zum Stufentitel und Kurztitel bearbeitet werden kann. Die mitgelieferten Fixtures für Kompetenzstufen definieren Beispielskalen mit Beschreibungen für **CEFR**, das **Dreyfus-Modell**, **Blooms Taxonomie** und **SFIA**. Bei einer bestehenden Installation hängt es vom Fixture- und Upgrade-Status ab, welche Profile vorhanden sind; gehen Sie nicht davon aus, dass das Hinzufügen des Feldes vorhandene Profile automatisch erstellt oder ersetzt.

## Wie Kompetenzen vergeben werden

Eine Kompetenz wird einer Benutzerin oder einem Benutzer vergeben (als ausgestellte Kompetenz mit einem Datum erfasst) über einen von mehreren Wegen:

* Automatisch, wenn eine lernende Person den Schwellenwert einer Notenbuchkategorie erreicht — konfiguriert auf der Seite [Kompetenzen und Bewertungen](skills-assessments.md)
* Automatisch beim Abschluss bestimmter Kurse, mit denen die Kompetenz verknüpft ist
* Manuell durch eine Lehrkraft (wenn **Teachers can assign skills** aktiviert ist) oder eine Administratorin bzw. einen Administrator