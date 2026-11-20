# Wiki

Mit dem Wiki-Werkzeug können Sie und Ihre Lernenden gemeinsam Webseiten innerhalb des Kurses erstellen und bearbeiten. Es eignet sich für Gruppenprojekte, gemeinsame Wissensbasen und kollaborative Schreibübungen.

## Funktionsweise des Wikis

Ein Wiki ist eine Sammlung miteinander verknüpfter Webseiten, die jede Person mit entsprechender Berechtigung bearbeiten kann. In Chamilo gilt:

* Jeder Kurs verfügt über ein eigenes Wiki
* Seiten können mithilfe von Wiki-Links miteinander verknüpft werden
* Alle Bearbeitungen werden in einer Versionshistorie erfasst
* Frühere Versionen können verglichen und wiederhergestellt werden

## Eine Wiki-Seite erstellen

1. Öffnen Sie das Werkzeug **Wiki** auf der Kursstartseite
2. Klicken Sie auf **Neue Seite hinzufügen**
3. Geben Sie einen **Seitentitel** ein
4. Verfassen Sie den Seiteninhalt im Rich-Text-Editor
5. Speichern Sie

Um im Editor auf eine andere Wiki-Seite zu verlinken, erstellen Sie einen Link mit dem Titel der Zielseite.

## Seiten bearbeiten

Jede Person mit Bearbeitungsrechten kann eine Wiki-Seite ändern:

1. Öffnen Sie die Seite, die Sie bearbeiten möchten
2. Klicken Sie auf die Schaltfläche **Bearbeiten** <img src="../../.gitbook/assets/icons/mdi-pencil.svg" alt="Bearbeiten" data-size="line">
3. Nehmen Sie Ihre Änderungen im Editor vor
4. Fügen Sie optional einen Eintrag unter **Kommentare** hinzu, der beschreibt, was Sie geändert haben
5. Speichern Sie

## Kollaboratives Bearbeiten mit Etherpad (optional)

Wenn eine Administration die Etherpad-Integration aktiviert, öffnet das Bearbeiten einer **bestehenden** Wiki-Seite einen gemeinsamen Etherpad-Editor anstelle des üblichen Rich-Text-Feldes. Mehrere berechtigte Mitwirkende können gleichzeitig an derselben Seite arbeiten.

1. Öffnen Sie eine Wiki-Seite und wählen Sie **Bearbeiten**.
2. Arbeiten Sie gemeinsam im eingebetteten kollaborativen Editor. Ihre Mitwirkenden müssen ebenfalls die Berechtigung haben, diese Wiki-Seite zu bearbeiten.
3. Wählen Sie in Chamilo **Speichern**, um aus dem aktuellen Etherpad-Inhalt eine neue Wiki-Revision zu erstellen.
4. Nutzen Sie die **Versionshistorie** des Wikis, um zuvor gespeicherte Versionen zu vergleichen oder wiederherzustellen.

Änderungen in Etherpad erzeugen nicht automatisch einzelne Chamilo-Revisionen. **Speichern** ist der ausdrückliche Schritt zur Erstellung eines Snapshots. Die Administration muss Etherpad auf dem **selben Origin wie Chamilo** bereitstellen (beispielsweise über einen Reverse-Proxy-Pfad), um sichere eingebettete Sitzungen zu unterstützen. Der gewöhnliche Wiki-Editor bleibt verfügbar, wenn die Integration deaktiviert ist. Das Erstellen neuer Seiten verwendet das reguläre Formular, bevor der Seite ein zugehöriges kollaboratives Pad zugeordnet ist.

Eine Administration konfiguriert `editor.etherpad_enabled`, `editor.etherpad_url` und `editor.etherpad_api_key` unter **Administration > Konfigurationseinstellungen > Editor**. Siehe [Editor-Einstellungen](../../admin-guide/platform-settings/editor-settings.md).

## Versionshistorie

Jede Bearbeitung erzeugt eine neue Revision. Sie können:

* **Historie anzeigen** — Eine Liste aller Revisionen mit Zeitstempeln und Autorinnen und Autoren einsehen
* **Versionen vergleichen** — Sehen, was sich zwischen zwei Revisionen geändert hat
* **Eine Version wiederherstellen** — Die Seite bei Bedarf auf eine frühere Revision zurücksetzen

## Das Wiki verwalten

Als Kurslehrkraft können Sie:

* **Alle Seiten anzeigen** — Eine Liste aller Wiki-Seiten im Kurs einsehen
* **Verwaiste Seiten finden** — Seiten identifizieren, auf die von keiner anderen Seite verlinkt wird
* **Gewünschte Seiten finden** — Seiten sehen, auf die verlinkt wird, die aber noch nicht existieren
* **Eine Seite für die Bearbeitung sperren** — Alle Bearbeitungen einer Seite blockieren, während Sie sie abschließen
* **Sichtbarkeit umschalten** — Eine Seite vor Lernenden verbergen
* **Seiten löschen** — Seiten entfernen, die nicht mehr benötigt werden
* **Beiträge überwachen** — Statistiken pro Benutzerin oder Benutzer prüfen: aktivste Bearbeitende, am häufigsten bearbeitete Seiten, am häufigsten besuchte Seiten
* **Exportieren** — Eine Wiki-Seite als PDF exportieren oder an das Dokumentenwerkzeug senden

## Tipps

* **Das Wiki für Gruppenprojekte nutzen** — Weisen Sie jeder Gruppe eine Wiki-Seite zu, auf der sie gemeinsam ihr Ergebnis erarbeitet
* **Eine Kurswissensbasis erstellen** — Erstellen Sie ein Referenz-Wiki mit zentralen Konzepten und ermutigen Sie Lernende, Beiträge zu leisten
* **Bearbeitungshistorie prüfen** — Die Versionshistorie ermöglicht es Ihnen, individuelle Beiträge in der Zusammenarbeit zu bewerten