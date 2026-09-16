# Videokonferenzen

Chamilo integriert sich mit Videokonferenzplattformen, um Live-Sitzungen innerhalb von Kursen zu ermöglichen.

## Unterstützte Plattformen

### BigBlueButton

**BigBlueButton** (BBB) ist ein Open-Source-Webkonferenzsystem, das für Online-Lernen entwickelt wurde. Es ist die am häufigsten verwendete Videokonferenzlösung mit Chamilo.

#### Konfiguration

1. Installieren Sie BigBlueButton auf einem separaten Server (siehe [BigBlueButton-Dokumentation](https://docs.bigbluebutton.org/))
2. Verwenden Sie `bbb-conf --salt` auf dem BBB-Server, um die Integrationsdetails zu erhalten
3. In den Chamilo-Plattformeinstellungen unter **Plugins** das Videoconference-Plugin installieren und die Konfiguration wie folgt setzen:
   * **BBB-Server-URL** — Die Adresse Ihres BBB-Servers
   * **BBB-Salt/Secret** — Das API-Geheimnis von Ihrem BBB-Server
4. Speichern
5. **Aktivieren** Sie das Videoconference-Plugin
6. Einige spezielle Funktionen sind für Administratoren verfügbar, stellen Sie daher sicher, dass Sie es in der Region *admin_page* aktivieren

#### Verfügbare Funktionen in Chamilo

* Starten/Beitreten von Meetings direkt aus einem Kurs heraus
* Automatische Raumerstellung pro Kurs
* Meeting-Aufzeichnungen (falls aktiviert)
* Bildschirmfreigabe, Whiteboard, Breakout-Räume
* Chat neben dem Video

### Zoom

Chamilo kann auch mit **Zoom** für Videokonferenzen integriert werden.

#### Konfiguration

1. Erstellen Sie eine Zoom-App im Zoom Marketplace
2. Konfigurieren Sie in Chamilo die Zoom-API-Zugangsdaten
3. Aktivieren Sie die Zoom-Integration

#### Funktionsweise

Wenn Zoom konfiguriert ist, können Lehrkräfte Zoom-Meetings direkt aus ihrem Kurs heraus erstellen und starten. Lernende treten über die Chamilo-Oberfläche bei.

## Auswahl zwischen BBB und Zoom

| Funktion | BigBlueButton | Zoom |
|----------|--------------|------|
| Kosten | Kostenlos (Open-Source), erfordert jedoch einen eigenen Server | Erfordert ein Zoom-Abonnement |
| Hosting | Selbst gehostet | Cloud-gehostet von Zoom |
| Integrationsgrad | Tief (für LMS-Nutzung entwickelt) | Standard |
| Aufzeichnung | Serverseitig, auf Ihrer Infrastruktur gespeichert | Zoom-Cloud oder lokal |
| Whiteboard | Integriert | Integriert |
| Breakout-Räume | Ja | Ja |

## Tipps

* **Separater Server für BBB** — BigBlueButton sollte zur optimalen Leistung auf einem eigenen dedizierten Server laufen, nicht auf demselben Server wie Chamilo
* **Vor den Kursen testen** — Testen Sie die Videokonferenz-Einrichtung immer vor einer Live-Sitzung
* **Bandbreite prüfen** — Stellen Sie sicher, dass Ihr Server und Ihr Netzwerk die erwartete Anzahl gleichzeitiger Benutzer bewältigen können