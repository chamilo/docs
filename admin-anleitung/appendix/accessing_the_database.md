# Zugriff auf die Datenbank

Wir empfehlen Ihnen dringend, auf die Datenbank nie direkt zugreifen\*\* und verwenden Sie Chamilos Admin-Tools immer, um Ihre Daten zu ändern. Dies gewährleistet die Datenintegrität und ermöglicht es jedem Administrator, Ihre Daten im Falle eines Problems schnell zu analysieren.

Wir erkennen jedoch an, dass unter bestimmten Umständen auf die Datenbank zugegriffen werden muss, um große Operationen schneller auszuführen.

Um dies zu tun, empfehlen wir die Verwendung von Anwendungen, die nicht zu viel Arbeit für die Installation und Konfiguration erfordern, wie adminer.php. Adminer ist eine kleine Anwendung mit einem Skript, mit der Sie eine Verbindung zu Ihrer Datenbank herstellen, SQL-Vorgänge ausführen und die Datei dann entfernen können, wenn Sie fertig sind. Auf diese Weise machen Sie Ihren Datenbankserver nicht länger als erforderlich anfällig für Remote-Angriffe und erhöhen nicht die Komplexität Ihres Systems.

