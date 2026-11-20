# Sicherer Export der Konfigurationsdiagnose

Chamilo 3.1 stellt einen herunterladbaren JSON-Bericht zur Diagnose von Konfigurationsproblemen bereit, ohne vertrauliche Einstellungswerte absichtlich zu exportieren. Der Bericht ist auf die **aktuelle Zugriffs-URL** beschränkt und erfordert eine Administratorrolle.

## Bericht herunterladen

1. Öffnen Sie **Verwaltung > Einstellungen** auf dem Portal, das Sie prüfen möchten.
2. Wählen Sie **Konfiguration zum Debuggen herunterladen**.
3. Speichern Sie die erzeugte Datei `chamilo-configuration-dump.json` sicher.
4. **Prüfen Sie die gesamte Datei, bevor Sie sie an jemanden senden**, auch wenn sie bereinigt zu sein scheint.

Der Bericht enthält einen Exportzeitstempel, den Geltungsbereich der Zugriffs-URL, bereinigte Plattformeinstellungen sowie den Installations- und Aktivierungsstatus von Plugins und die bereinigte Plugin-Konfiguration. Es handelt sich um einen schreibgeschützten Export; das Herunterladen ändert keine Systemeinstellungen.

## Vertraulichkeit und Grenzen der Zugriffs-URL

Sensible Werte werden durch die Bereinigungsschicht unkenntlich gemacht. Plugin-Einstellungen werden standardmäßig als vertraulich behandelt, sofern sie nicht ausdrücklich für einen sicheren Export klassifiziert sind. Dennoch können Einstellungsnamen, Plugin-Namen und andere Diagnosemetadaten Implementierungsdetails preisgeben. Verteilen Sie die Datei daher nur an vertrauenswürdiges Supportpersonal.

Bei Installationen mit mehreren URLs prüft das Backend, dass die aufgelöste Zugriffs-URL mit dem Anfrage-Host übereinstimmt, anstatt stillschweigend die Konfiguration eines anderen Portals zu exportieren. Bestätigen Sie die Portaladresse vor dem Herunterladen.

## Fehlerbehebung

Wenn der Export nicht verfügbar ist, stellen Sie sicher, dass das Konto über Administratorrechte verfügt und dass das angeforderte Portal auf seine eigene Zugriffs-URL aufgelöst wird. Prüfen Sie die Protokolle des Webservers und der Anwendung, ohne Anmeldedaten oder personenbezogene Informationen in Support-Tickets zu kopieren.

Siehe [Systemwerkzeuge](system-tools.md) und [Sicherheitseinstellungen](../platform-settings/security-settings.md). Implementierung: [PR #9476](https://github.com/chamilo/chamilo-lms/pull/9476).