# Grundrisse von Zweigen und Raumkarten

Chamilo 3.1 kann einem Zweig ein Grundrissbild zuordnen und Raumpositionen auf diesem Bild mit interaktiven Polygonen markieren. Die Funktion hilft Lernenden, zugewiesene Räume zu finden; es handelt sich **nicht** um eine geografische GPS-Karte.

## Grundriss eines Zweigs anhängen

1. Öffnen Sie den Administrationsbereich für **Zweige** und bearbeiten Sie den gewünschten Zweig.
2. Suchen Sie den Bereich **Grundriss**.
3. Wählen oder laden Sie das Bild hoch und wählen Sie **Grundriss anhängen** (oder **Grundriss ändern**, falls bereits einer vorhanden ist).
4. Speichern oder bestätigen Sie die Zweigänderungen wie erforderlich und prüfen Sie anschließend, ob das Grundrissbild geladen wird.

Wenn ein Plan nicht mehr gültig ist, verwenden Sie **Grundriss entfernen**, nachdem Sie geprüft haben, welche Räume darauf verweisen. Laden Sie nur vertrauenswürdige Inhalte hoch und beachten Sie die Berechtigungen des Zweigadministrationsbildschirms.

## Räume umreißen

1. Bearbeiten Sie einen diesem Zweig zugewiesenen Raum.
2. Suchen Sie im Raumformular **Raum im Grundriss**.
3. Verwenden Sie das Polygonwerkzeug, um die Raumgrenze nachzuzeichnen. Verwenden Sie **Bearbeiten**, um Eckpunkte anzupassen; alle Punkte müssen innerhalb des Bildes bleiben.
4. Wählen Sie **Raumbereich speichern** und speichern Sie anschließend das Raumformular, um die Änderungen zu übernehmen.
5. Öffnen Sie eine Raumansicht, um die korrekte Position zu bestätigen. Verwenden Sie **Raumbereich löschen**, wenn die Zuordnung entfernt werden soll.

Ein Raum hat jeweils nur ein bearbeitbares Polygon. Die Raumzuordnung ist vom Bild auf Zweigebene getrennt, sodass beim Aktualisieren des Bildes vorhandene Raumgrenzen geprüft werden müssen.

## Wo Karten angezeigt werden

Autorisierte Benutzer können Raumgrundrisse anzeigen, wenn Räume in Kursinformationen, Kalenderereignissen und anwesenheitsbezogenen Abläufen ausgewählt oder angezeigt werden. Prüfen Sie die Sichtbarkeit mit den Rollen, die die Informationen tatsächlich sehen, insbesondere Studierende und Sitzungsteilnehmer.

Die Zugriffsrechte für Zweige und Räume gelten auch für Grundrissressourcen. Prüfen Sie in Multi-URL-Installationen die korrekte Portal-/Zweigisolation, bevor Sie Karten veröffentlichen.

Siehe [Räume verwalten](managing-rooms.md) und [Raumverfügbarkeitssuche](room-availability-finder.md). Implementierungen: [PR #9321](https://github.com/chamilo/chamilo-lms/pull/9321), [PR #9451](https://github.com/chamilo/chamilo-lms/pull/9451).