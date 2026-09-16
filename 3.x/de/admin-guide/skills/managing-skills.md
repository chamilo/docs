# Kompetenzen verwalten

Diese Seite behandelt die drei Dashboard-Einträge, mit denen der Kompetenzkatalog der Plattform aufgebaut wird: das Massenimportieren von Kompetenzen, die Verwaltung der Kompetenzdefinitionen selbst und die Zuordnung jeder Kompetenz zu einer Stufenskala.

## Kompetenzen importieren

**Kompetenzen > Kompetenzen importieren** ermöglicht das Massenanlegen einer Kompetenzhierarchie aus einer CSV- oder XML-Datei, anstatt Kompetenzen einzeln zu erstellen. Jede Zeile benötigt mindestens eine `id`, eine `parent_id` (zum Aufbau des Baums) und einen `title`. Eine Beispielvorlage steht zur Verfügung, an der Sie Ihre Datei ausrichten können.

## Kompetenzen verwalten

**Kompetenzen > Kompetenzen verwalten** ist der zentrale Kompetenzkatalog: Kompetenzen anlegen, bearbeiten, aktivieren/deaktivieren und löschen. Jede Kompetenz hat einen Titel, einen Kurzcode, eine Beschreibung, ein Symbol und optional eine Kriterienbeschreibung (was ein Lernender tun muss, um sie zu erwerben). Kompetenzen können verschachtelt werden — eine Kompetenz kann untergeordnete Kompetenzen haben —, was das [Kompetenzrad](skills-wheel.md) visualisiert.

## Kompetenzstufen verwalten

**Kompetenzen > Kompetenzstufen verwalten** ist ein eigener, kleinerer Bildschirm: Er listet vorhandene Kompetenzen auf und ermöglicht die Zuordnung jeder einzelnen zu einem **Stufenprofil** — einer benannten, geordneten Menge von Stufen (zum Beispiel Bronze/Silber/Gold), an der die Kompetenz gemessen wird. Kurz gesagt: Nutzen Sie **Kompetenzen verwalten**, um festzulegen, was eine Kompetenz *ist*, und **Kompetenzstufen verwalten**, um festzulegen, auf welcher Skala sie gemessen wird.

## Wie Kompetenzen vergeben werden

Eine Kompetenz wird einem Benutzer vergeben (als ausgestellte Kompetenz mit Datum erfasst) über einen der folgenden Wege:

* Automatisch, wenn ein Lernender den Schwellenwert einer Notenbuch-Kategorie erreicht — konfiguriert auf der Seite [Kompetenzen und Bewertungen](skills-assessments.md)
* Automatisch beim Abschluss bestimmter Kurse, mit denen die Kompetenz verknüpft ist
* Manuell durch eine Lehrkraft (wenn **Lehrkräfte können Kompetenzen zuweisen** aktiviert ist) oder durch einen Administrator