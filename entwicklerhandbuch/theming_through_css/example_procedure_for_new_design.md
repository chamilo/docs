# Beispielvorgehensweise für neues Design

Wie würden Sie mit all den Informationen, die Sie durchgemacht haben, jetzt vorankommen und ein neues Design \(basierend auf einem bestehenden\) mit neuen Farben erstellen, einschließlich neuer Kurswerkzeugsymbole, eines neuen Logos und eines Standardbilds für Kurse?

Dies ist eine Checkliste, die Sie Schritt für Schritt tun müssen:

1. Verbinde dich mit Chamilo
2. Gehe zu Administration -&gt; Plattform -&gt; Konfigurationseinstellungen -&gt; Stylesheets
3. Wählen Sie den Namen des Stils, den Sie als Basis verwenden möchten \(dies ist _viel_ einfacher als ein neues von Grund auf neu zu starten\)
4. Klicken Sie auf `Download`
5. Entpacken Sie die Datei auf Ihrem Computer
6. Benennen Sie den Ordner um, da Sie ihn nicht erneut unter dem gleichen Namen hochladen können
7. Geben Sie den Ordner ein und bearbeiten Sie default.css
8. Verwenden Sie in Ihrem Browser \(Firefox oder Chrome\) die Entwickler-Symbolleiste und die "Inspect" -Funktion, um Elemente zu finden, deren Farben Sie ändern möchten
9. Notieren Sie sich den aktuellen Farbcode und die Farbe, in die Sie ihn ändern möchten \(eine gute Idee könnte sein, eine Tabelle mit der Übereinstimmung zwischen der alten und der neuen Farbe zu erstellen\)
10. Zurück zu default.css, suche nach den Farbcodes \(suche nach Kleinbuchstaben und Großbuchstaben\) und ersetze sie überall durch die neuen Farben
11. Speichern Sie default.css
12. Fügen Sie im `images/` Ihr Logo als header-logo.png hinzu. Dieses Bild kann transparent sein und _sein_ eine maximale Höhe von 70px haben. In neueren Versionen können Sie auch ein SVG-Logo verwenden, dies wird jedoch hier nicht behandelt
13. Erstellen Sie im Ordner `icons/` eine Datei namens `session_default.png` mit genau 400x224 Pixeln, um das Standardbild der Kurse zu ersetzen
14. Erstellen Sie im Ordner `icons/` die Verzeichnisse `22` und `64`, um sich auf die Symbole für benutzerdefinierte Kurswerkzeuge vorzubereiten
15. Sie benötigen die folgenden Symbole in _exakt_ 64x64 Pixel, um die Standardwerkzeuge von Chamilo zu ersetzen: `agenda.png`, `attendance.png`, `chat.png`, `course_progress.png`, `dropbox.png`, `folder_documents.png`, `forum.png`, `glossary.png`, SO `gradebook.png` `group.png` `info.png` `links.png` `members.png` `notebook.png` `quiz.png`, `scorms.png`, `survey.png`, `valves.png`, `wiki.png`, `works.png`
16. Da jedes Tool deaktiviert werden kann und eine ausgegrausame Version des Werkzeugsymbols angezeigt wird, müssen Sie für jedes der vorherigen Symbole auch eine ausgegrausgelassene Version mit demselben Namen hinzufügen, die von "\_na" \(für "not available"\) angehängt wird: z. B. `agenda_na.png` Sie können dies in einer Software wie Gimp tun, indem Sie die Option `Image` -&gt; \#INLINECODE -&gt; \#INLINECODE verwenden und sie dann mit dem Namen \_na exportieren. Wenn Ihr Originalsymbol sehr dunkle Farben verwendet, müssen Sie möglicherweise die Helligkeit der Graustufenversion erhöhen \(`Mode` -&gt;'Helligkeit & Kontrast\`-&gt; Helligkeit auf +50% einstellen\)
17. Da diese Symbole \(nur in der aktiven Farbversion\) auf der Seite `Greyscale` verwendet werden, um den Benutzer zu benachrichtigen, wenn sich etwas geändert hat, benötigen Sie sie auch in einer 22x22 Pixel-Version. Kopieren Sie dazu alle Bilder \(außer den Versionen von \_na.png\) von 64/ auf 22/, bearbeiten Sie sie dann und ändern Sie die Größe auf 22 x 22
18. Verlassen Sie den Stylesheet-Ordner \(den Sie in Schritt 6 umbenannt haben\)
19. Generieren einer Zip-Datei
20. Gehe zu deinem Chamilo und lade die neue Zip-Datei im `Colors` Tab hoch
21. Wechseln Sie zurück zum Tab `My Courses` und wählen Sie das neue Stylesheet aus \(Sie können die Schaltfläche `New stylesheet file` verwenden, damit sich nicht sofort auf alle Ihre Benutzer auswirkt\)
22. Möglicherweise müssen Sie STRG+F5 verwenden, um etwas Cache-Speicher in Ihrem Browser zu aktualisieren, aber das sollte nicht der Fall sein

Das ist es!

## Verbotene Dateiendungen

Aus Sicherheitsgründen erlauben wir nur das Hochladen einer Reihe von Dateierweiterungen:

* CSS
* Reissverschluss
* JPEG
* jpg
* png
* gif
* Ico
* psd
* xcf
* Svg
* webp
* woff
* woff2
* MD

Diese Liste kann sich ändern. Sie finden es in der Funktion getAllowedFileTypes \(\) um [https://github.com/chamilo/chamilo-lms/blob/1.11.x/main/admin/settings.lib.php\#L2072](https://github.com/chamilo/chamilo-lms/blob/1.11.x/main/admin/settings.lib.php#L2072)

Wenn Sie diese Einschränkungen vermeiden möchten, können Sie den neuen Stil auch direkt über SFTP in `Update` hochladen, aber Sie müssen\* die `Preview` -Option auf der Administrationsseite verwenden \(Block `app/Resources/public/css/themes/`\), sonst wird das Stylesheet nicht auf den endgültigen öffentlichen Ordner `Cache clean-up` übertragen.

