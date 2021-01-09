
# Sicherheit

Die Kategorie ![](../../../.gitbook/assets/graficos11%20%284%29.png)This ermöglicht es Ihnen, einige Dinge zu konfigurieren, die mit Sicherheit zu tun haben. Die Standardeinstellungen sind... akzeptabel, aber Sie sollten einige Dinge einschränken, um sie zu verbessern.

**Art der Filterung bei Dokumenten-Uploads** Es gibt zwei verschiedene Filtertypen:

* Blacklist ist eine Möglichkeit, Dateien mit einer bestimmten Erweiterung zu verhindern. So können Sie beispielsweise sagen, dass Sie nicht möchten, dass ausführbare Dateien \(dh “.exe” -Dateien\) hochgeladen werden. Dies gilt jedoch als die schwächste Filtermethode.
* White List ist eine Möglichkeit, “I only want files which match my authorized extensions” zu sagen, also ist es wirklich sicher: Keine lustige Datei wird dich hier überraschen. Fall \(Groß- oder Kleinbuchstaben\) spielt hier keine Rolle. Dies ist die sicherste Option, aber sie ist etwas eingeschränkt.

**Berechtigungen für neue Verzeichnis** legt fest, welche Zugriffsberechtigungen neue Verzeichnisse haben werden. Dies ist hauptsächlich eine Option für Linux-basierte Systeme und ermöglicht es Ihnen, die Sicherheit gegen Piraten zu erhöhen.

_**Warnung**:_ Der Standardwert ist « 0777 » nach einer Reihe von Problemen, die von Benutzern mit restriktiveren Berechtigungen gefunden wurden. Dieser Wert garantiert eine höhere Portabilität und nicht mehr Sicherheit und muss manchmal geändert werden, wenn das Linux-basierte System, auf dem Sie es installieren, eine strenge Sicherheitsrichtlinie erfordert. Wenn dies der Fall ist, erhalten Sie einen Serverfehler, wenn Sie versuchen, einen Kurs zu starten, den Sie gerade erstellt haben. Versuchen Sie in diesem Fall, diesen Wert alternativ auf 0777, 0775, 0755 und 0750 zu aktualisieren, und erstellen Sie jedes Mal einen neuen Kurs. Sie können die fehlgeschlagenen Kurse danach jederzeit löschen.

**OpenID-Authentifizierung** aktiviert die OpenID-Funktion. Sie müssen auch das OpenID-Feld in den Feldern zur Benutzerprofilerstellung aktivieren, damit diese Funktion die gewünschten Funktionen bereitstellen kann. Beachten Sie, dass derzeit nicht mehrere Identitäten kombiniert werden können, und Sie müssen immer noch Ihre gesamte Identitäts-URL in das Feld OpenID einfügen. Wir hoffen, diese Funktion in Zukunft verbessern zu können.

**Rechte für Trainer verlängern** lässt Lehrer den Inhalt von Kursen innerhalb des Sitzungskontextes bearbeiten \(Dokumente, Lernpfade, Übungen, Links usw. ändern\). Siehe Kapitel Kapitel 7. Sitzungsmanagement auf Seite 64.

Benutzerkursabonnement nach Kurs zulassen Admininistrator ermöglicht es dem Lehrer, Benutzer für seinen Kurs zu abonnieren. Diese Option ist standardmäßig aktiviert, aber wenn Sie dies verhindern möchten, wissen Sie, wo Sie suchen müssen...

Single Sign On ermöglicht die Verbindung ohne Anmeldung, basierend auf einer Schwester-Website, die bereits den Login verarbeitet \(zum Beispiel ein Intranet\). Diese Funktion erfordert ein wenig Customizing, und Sie sollten wirklich einen Entwickler mit Erfahrung in Single Sign On-Methoden einstellen, um dies schnell zu tun. Wenn Sie Glück haben, könnte dies jedoch funktionieren. Stellen Sie einfach sicher, dass Sie die anderen Einstellungen und das main/auth/sso/ -Verzeichnis überprüfen, um weitere Informationen zu erhalten.

Mit Filterbedingungen können Sie alle angegebenen Wörter in Foren und E-Mails automatisch nach _\*_ filtern.