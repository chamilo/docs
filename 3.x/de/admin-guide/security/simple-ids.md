# Simple IDS

Chamilo enthält ein leichtgewichtiges, anwendungsinternes Intrusion-Detection-System (IDS). Bei jeder Anfrage prüft es die URL-Query-Parameter, den Anfragepfad und einige Header (`User-Agent`, `Referer`) auf gängige Angriffssignaturen — beispielsweise XSS-Payloads oder Path-Traversal-Muster — und protokolliert alles Verdächtige. Die Seite Simple IDS ermöglicht die Überprüfung der erkannten Ereignisse.

Anfrage-**Bodies** werden bewusst nicht gescannt, um Fehlalarme durch Inhalte des Rich-Text-Editors zu vermeiden (Kursinhalte enthalten legitim HTML-/JavaScript-ähnliches Markup).

## Zugriff auf Simple IDS

Klicken Sie im Administrationsbereich auf **Sicherheit > Simple IDS**.

## Angezeigte Informationen

![Die Seite Simple IDS mit Diagrammen zu Ereignissen nach Tag, Ereignissen nach Typ und den häufigsten angreifenden IPs, gefolgt von einer Tabelle der markierten IDS-Ereignisse mit Datum, IP, Erkennungstyp, Parameter, URI und Detail](/.gitbook/assets/admin-security-simple-ids.png)

* **Ereignisse nach Tag (letzte 7 Tage)**, **Ereignisse nach Typ (letzte 30 Tage)** und **Häufigste angreifende IPs (letzte 30 Tage)** — Übersichtsdiagramme
* **Tabelle der markierten IDS-Ereignisse** — Jeder Eintrag zeigt Datum, Quell-IP, Erkennungstyp (beispielsweise `XSS`), den betroffenen Parameter, die Anfrage-URI und eine kurze Beschreibung des Erkannten

Verwenden Sie die Filter **IP**, Ereignistyp und Datumsbereich oberhalb der Diagramme, um die Ergebnisse einzugrenzen.

## Funktionsweise

* Jede Anfrage wird beim Eingang gescannt; Treffer werden an `var/logs/ids/ids_events.log` angehängt
* Beim Ausgang fügt derselbe Subscriber die von OWASP empfohlenen Sicherheitsheader zur Antwort hinzu
* Ist das Blockieren aktiviert, wird eine Anfrage, die einer Signatur entspricht, sofort mit einer HTTP-400-Antwort gestoppt, ohne den Anwendungscode zu erreichen

## Konfiguration

Simple IDS wird über Umgebungsvariablen gesteuert, die in `config/packages/chamilo_ids.yaml` gesetzt werden:

| Variable | Zweck |
|----------|---------|
| `IDS_ENABLED` | Schaltet das Scannen und Protokollieren von Anfragen ein oder aus |
| `IDS_BLOCK` | Wenn aktiviert, wird eine erkannte Anfrage abgelehnt (HTTP 400) statt nur protokolliert |
| `IDS_SECURITY_HEADERS` | Steuert, ob die von OWASP empfohlenen Antwort-Header hinzugefügt werden |

Dies ist ein leichtgewichtiger Detektor nach dem Best-Effort-Prinzip, der offensichtliche Scan- und Exploit-Versuche erkennen soll — er ersetzt bei risikoreichen Installationen keine dedizierte Web Application Firewall (WAF).