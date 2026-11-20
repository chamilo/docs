# Namen und Symbole von Kurswerkzeugen anpassen

Chamilo 3.1 ermöglicht autorisierten Kursbearbeitern, den **Namen** und das **SVG-Symbol** anzupassen, die für ein Werkzeug auf der Kursstartseite angezeigt werden. Diese Änderungen gelten nur für den jeweiligen Kurs und behalten die bestehenden Ziele der Werkzeuge bei.

## Ein Werkzeug anpassen

1. Öffnen Sie die Kursstartseite als Benutzer mit Berechtigung zur Kursbearbeitung.
2. Aktivieren Sie den Modus **Anpassen** im Werkzeugraster.
3. Öffnen Sie das Anpassungsformular für das Werkzeug, das Sie ändern möchten.
4. Geben Sie den gewünschten **Namen** ein und wählen Sie bei Bedarf eine SVG-Datei als **Symbol** aus.
5. Wählen Sie **Speichern** und überprüfen Sie das aktualisierte Werkzeug im Raster der Startseite.

Die Werkzeuganpassung unterscheidet sich von den Rastermodi **Sortieren**, **Alle anzeigen** und **Alle ausblenden**. Das Ändern der Bezeichnung oder des Symbols eines Werkzeugs erzeugt kein neues Werkzeug, ändert nicht dessen zugrunde liegende URL und gewährt Lernenden keinen zusätzlichen Zugriff.

## SVG-Anforderungen und Sicherheit

Verwenden Sie eine SVG-Datei aus einer vertrauenswürdigen Quelle. Chamilo prüft hochgeladene SVG-Inhalte und lehnt unsichere Dateien ab. Wird eine Datei abgelehnt, vereinfachen oder exportieren Sie sie erneut als saubere SVG-Datei, anstatt die Validierung zu umgehen.

Bestätigen Sie das resultierende Symbol und den Namen sowohl als Lehrkraft als auch als Lernender und prüfen Sie, dass ein anderer Kurs unverändert bleibt. Lernende können Werkzeuge nicht anpassen, sofern sie nicht über die erforderlichen Kursbearbeitungsrechte verfügen.

Siehe [Kursstartseite](course-homepage.md). Implementierung: [PR #9374](https://github.com/chamilo/chamilo-lms/pull/9374).