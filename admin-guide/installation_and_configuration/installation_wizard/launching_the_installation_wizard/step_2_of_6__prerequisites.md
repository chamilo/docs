# Schritt 2 von 6: Voraussetzungen

In diesem Schritt wird überprüft, ob Ihr Server über alle erforderlichen Elemente für eine vollständige und korrekte Installation von Chamilo verfügt.

![](../../../../.gitbook/assets/images3%20%288%29.png)
Illustration 4: Installation - Voraussetzungen

Die Voraussetzungen, die Ihr System bereits erfüllt hat, sind in **Grün** gekennzeichnet, die obligatorischen, aber nicht zufriedenen sind in **rot** gekennzeichnet und diejenigen, die nicht zufrieden, aber auch nicht obligatorisch sind in orange** gekennzeichnet.

Fast alle Voraussetzungen beziehen sich auf die PHP-Installation und bieten Links zu weiteren Details. Die empfohlenen Parameter stellen Variablen dar, die Sie in Ihrer PHP-Konfiguration \(_php.ini_\) oder in der VirtualHost-Konfiguration ändern können.

Am Ende der Seite „Voraussetzungen“ finden Sie den Abschnitt _Permissions für Verzeichnisse und Dateien_.

![](../../../../.gitbook/assets/images5%20%288%29.png)
Illustration 5: Installation - Voraussetzungen \(end\)

Standardmäßig ist unter GNU/Linux das Schreiben für Verzeichnisse nicht autorisiert. Sie müssen die Dateizugriffe ändern, um die Sicherheit zu optimieren und dem Benutzer, der den Webserver ausführt, die ausreichenden Berechtigungen zu erteilen. Diese stellen die Beschränkung der Berechtigungen während der Ausführung eines Dienstes sicher \(in diesem Fall _Apache_\) und vermeiden, dass ein Cracker zu einfach die Kontrolle über Ihren Server übernehmen kann.

Unter Windows ist dies im Allgemeinen standardmäßig einfacher \(aber viel weniger sicher\) und die Berechtigungen reichen bereits aus \(aber zu freudig\).

**Hinweis**: Chamilo wird häufig \(mindestens einmal im Jahr\) gegen Sicherheitslücken überprüft, die Ihren Server gefährden würden. Sie können auf die neuesten Sicherheitslücken aufmerksam gemacht und behoben werden, indem Sie unsere spezielle Sicherheits-Mailingliste abonnieren: [http://lists.chamilo.org/listinfo/](http://lists.chamilo.org/listinfo/security) [security](http://lists.chamilo.org/listinfo/security) oder auf [http://support.chamilo.org/projects/chamilo-18/wiki/Security\_issues](http://support.chamilo.org/projects/chamilo-18/wiki/Security_issues). Alternativ haben wir einen Twitter-Feed für die sicherheitsrelevanten Nachrichten von Chamilo: [http://twitter.com/chamilosecurity](http://twitter.com/chamilosecurity)Chamilo hat eine hervorragende Erfolgsbilanz bei der Behebung aller Sicherheitslücken und der Veröffentlichung von Patches für seine Benutzer innerhalb von 4 Tagen nach der Meldung. Sie können unsere öffentlichen Aufzeichnungen auf der Website von Secunia einsehen

Wechseln Sie lokal auf Ubuntu in das Verzeichnis, in dem sich das Verzeichnis _Chamilo_ befindet. Geben Sie dem Benutzer _www-data_ (dem Webserver-Benutzer unter Ubuntu\) ausreichende Berechtigungen und laden Sie die Seite in Ihren Browser neu. Wenn Sie ein anderes Betriebssystem verwenden, müssen Sie möglicherweise den folgenden Befehl ein wenig aktualisieren.

Beispiel: user @server: /var/www$ chown -R www-data:www-data chamilo/

Diese Berechtigungen sind nicht annähernd sicher, und wir gehen davon aus, dass Sie sich an einen ordnungsgemäß qualifizierten Linux-Administrator wenden werden. Sicherheit sollte für Sie wichtig sein, aber wir können unmöglich alle Fälle von Berechtigungen und Servern nur mit diesem Handbuch abdecken.

Klicke auf « + New installation ».

_**Hinweis**_: Wenn du ein Update einer früheren Version von Chamilo ausführst, ist dieses Kapitel nicht das Richtige für dich. Sie sollten sich lieber Kapitel 2.3: Aktualisierung von Chamilo ansehen. Wir empfehlen Ihnen auch, die Installations- und Aktualisierungsanleitung von Chamilo zu lesen, die im Verzeichnis**Dokumentation** Ihres Chamilo-Pakets verfügbar ist.