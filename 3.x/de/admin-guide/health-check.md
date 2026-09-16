# Health Check

Health Check ist ein kleiner Block auf dem Administrations-Dashboard, der eine Handvoll Live-Prüfungen Ihrer Installation durchführt und alles kennzeichnet, das Aufmerksamkeit erfordert — ohne dass Sie Konfigurationsdateien durchsuchen müssen, um häufige Fehlkonfigurationen zu erkennen.

![Der Health-Check-Block auf dem Administrations-Dashboard mit Bestanden/Nicht-bestanden-Status für E-Mail-Einstellungen, Admin-URL-Zuweisung und Dateiberechtigungsprüfungen](/.gitbook/assets/admin-health-check-block.png)

## Zugriff auf Health Check

Im Administrationsbereich erscheint der Block **Health check** neben den anderen Dashboard-Blöcken — kein Klick erforderlich, die Ergebnisse werden direkt angezeigt.

## Die Prüfungen

* **E-mail settings** — Prüft, ob eine Mailer-Verbindungszeichenkette sowie eine „Von“-E-Mail/ein „Von“-Name konfiguriert sind. Falls nicht, verweist der Link auf die Mail-Einstellungen zur Behebung.
* **All URLs have at least one admin assigned** — Bei einer Multi-URL-Installation wird geprüft, dass jede Zugriffs-URL mindestens einen Administrator hat, der sie verwalten kann. Fehlt einer, verweist der Link auf die Seite zur Zuweisung von Zugriffs-URL/Benutzer.
* **`.env` is not writable** — `.env` enthält Geheimnisse und sollte nach der Installation nicht vom Webserver beschreibbar sein. Wird als Fehler gekennzeichnet, wenn es beschreibbar ist; verweist auf den Security Guide.
* **`config/` is not writable** — Gleiche Begründung wie bei `.env`: Dieses Verzeichnis sollte im Normalbetrieb nicht vom Webserver beschreibbar sein. Verweist auf den Security Guide.
* **`var/cache` is writable** — Die gegenteilige Prüfung: Symfony muss in sein Cache-Verzeichnis schreiben können, daher wird dies als Fehler gekennzeichnet, wenn es *nicht* beschreibbar ist. Verweist auf den Leitfaden Performance Tuning / Optimierung.
* **Install folder is not present** — Der Ordner `public/main/install` wird nur während der Installation benötigt und sollte danach entfernt werden. Dies wird als Warnung (nicht als harter Fehler) gekennzeichnet, wenn er noch existiert, da das Risiko geringer ist als bei den beiden Schreibbarkeitsprüfungen oben. Verweist auf den Security Guide.

## Was Sie tun sollten

Jede Prüfung verweist direkt auf die Stelle, an der Sie das zugrunde liegende Problem beheben — entweder eine Einstellungsseite oder den entsprechenden Leitfaden. Gehen Sie diese Liste direkt nach der Installation durch und danach regelmäßig (zum Beispiel nach einer manuellen Dateiübertragung oder einer Änderung der Berechtigungen), da eine heute bestandene Prüfung nicht garantiert, dass sie so bleibt. Für eine umfassendere Checkliste zur Härtung in der Produktion über diese sechs Prüfungen hinaus siehe den [Security Guide](appendix/security-guide.md).