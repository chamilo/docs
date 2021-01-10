# Videokonferenz

Wie bereits im Abschnitt „_plugins_“ dieses Handbuchs angegeben \(siehe Kapitel 4.1.16 auf Seite 37\) wird das Videokonferenz-Tool nicht zusammen mit Chamilo ausgeliefert. Sie können Chamilo dank des _BigBlueButton_ Plugins einfach installieren und damit verknüpfen, aber dies erfordert einen dedizierten Server \(oder zumindest einen Server, der für etwas bestimmt ist, das nicht kritisch ist\).

Um den _BigBlueButton_ Videokonferenzserver zu installieren, empfehlen wir Ihnen, den Anweisungen auf der Homepage des Projekts zu folgen: [http://code.google.com/p/bigbluebutton/wiki/InstallationUbuntu](http://code.google.com/p/bigbluebutton/wiki/InstallationUbuntu)

Sobald die Videokonferenz installiert und funktionsfähig ist, müssen Sie die öffentliche URL \(manchmal nur eine IP-Adresse\) und den geheimen Schlüssel kennen.

Sie finden den geheimen Schlüssel tp in der Chamilo Plugin-Konfiguration in /var/lib/tomcat6/webapps/bigbluebutton/WEB-INF/classes/bigbluebutton.properties \(suchen Sie nach _Salt_\) oder verwenden Sie das bbb-conf-Skript auf dem Videokonferenzserver.

Sobald sich diese beiden Informationen in Ihrem Besitz befinden, gehen Sie zu den Chamilo-Einstellungen, _Plugins_. Aktiviere das _BigBlueButton_ Plugin und speichere. **Lade die Seite neu laden** so dass die neue “Extra” -Einstellungskategorie in der Aktionsleiste oben auf der Seite erscheint \(ein Zauberstab\) und klicke darauf. Geben Sie die Informationen Ihres Videokonferenzservers ein. Jetzt müssen Sie nur noch die Integration überprüfen, indem Sie in einen Kurs gehen und auf den Link _Videokonferenz_ klicken.

![](../../.gitbook/assets/images48%20%283%29.png)Illustration 84: Das Videokonferenz-Tool in einem Kurs

Kurslehrer und Coaches sind die einzigen, die einen Videokonferenzraum starten können. Sie sind auch die einzigen, die den Moderatorenstatus innerhalb der Konferenz haben.

![](../../.gitbook/assets/images62%20%284%29.png)Illustration 85: Seite des Videokonferenz-Tools mit einer Aufzeichnungsliste

Die Lernenden können sich bei Videokonferenzen nicht verbinden, wenn ihr Lehrer zuvor einen Raum gestartet hat \(andernfalls wird durch Klicken auf den Videokonferenz-Link die Kurs-Homepage einfach neu geladen\).

Wenn Sie Aufzeichnungen aktivieren möchten \(die viel Platz auf Ihrem Videokonferenzserver benötigen\), müssen Sie zum Tool für die Kurseinstellungen gehen und die Funktion aktivieren.

![](../../.gitbook/assets/images63%20%284%29.png)Illustration 86: Videokonferenz-Kurs-Setting für die Aufnahme

Wenn Sie es nicht installieren können, zögern Sie nicht, sich an die offiziellen Anbieter von Chamilo zu wenden, die Ihnen gerne einen Zugang zu ihren vorkonfigurierten Videokonferenzservern zuweisen.

Hinweis: In Chamilo bis Version 1.9.4 gab es einen Fehler im Plugin, der die Verwendung von Audio verhinderte. In nachfolgenden Versionen bis 1.9.6 verhinderte ein weiterer kleinerer Fehler, dass die Videokonferenz länger als 30 Minuten funktionierte. Dies wurde in Version 1.9.8 behoben und auf 5 Stunden erhöht \(suche nach “300” in plugin/bbb/lib/bbb.lib.php zum Anpassen\).

