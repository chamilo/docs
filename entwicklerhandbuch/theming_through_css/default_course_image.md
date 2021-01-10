# Standardkursbild

Ähnlich wie die im vorherigen Abschnitt beschriebene Standardersetzung für Symbole kann das Standardbild für den Kurs, das im Katalog oder in der Ansicht des Kursrasters angezeigt wird, ersetzt werden.

Um dies zu tun, müssen Sie die Abmessungen main/img/session\_default.png \(400x224 in v1.11.10\) und main/img/session\_default\_small.png \(85x48 in v1.11.10\) als Ausgangspunkt für Bilder verwenden und ein neues Bild entwickeln, das in diese passt.

Anstatt die Bilder dann direkt in main/img/ zu ersetzen \(wodurch die Anpassung bei jedem hinteren Chamilo-Upgrade entfernt wurde\), können Sie diese beiden neuen Bilder einfach in den Stammordner Ihres benutzerdefinierten CSS legen.

Wenn Sie beispielsweise \(wie in den vorherigen Abschnitten vorgeschlagen\) Ihr CSS in einem Ordner namens "myCustomCSS/" platziert haben, werden die beiden Bilder jeweils in "myCustomCSS/session\_default.png" und "myCustomCSS/session\_default\_small.png" abgelegt.

