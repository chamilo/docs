# Videokonferenzen

Chamilo integriert Videokonferenzplattformen, um Live-Sitzungen innerhalb von Kursen zu ermöglichen.

## Unterstützte Plattformen

### BigBlueButton

**BigBlueButton** (BBB) ist ein Open-Source-Webkonferenzsystem, das für das Online-Lernen konzipiert ist. Es ist die am häufigsten mit Chamilo verwendete Videokonferenzlösung.

#### Konfiguration

1. Installieren Sie BigBlueButton auf einem separaten Server (siehe [BigBlueButton-Dokumentation](https://docs.bigbluebutton.org/))
2. Verwenden Sie bbb-conf --salt auf dem BBB-Server, um die Integrationsdaten zu erhalten
3. Installieren Sie in den Chamilo-Plattformeinstellungen unter **Plugins** das Videoconference-Plugin und geben Sie dessen Konfiguration ein, um Folgendes festzulegen:
   * **BBB server URL** — Die Adresse Ihres BBB-Servers
   * **BBB salt/secret** — Das API-Geheimnis Ihres BBB-Servers
4. Speichern
5. **Aktivieren** Sie das Videoconference-Plugin
6. Einige Sonderfunktionen stehen Administratoren zur Verfügung; stellen Sie daher sicher, dass Sie es in der Region *admin_page* aktivieren

#### In Chamilo verfügbare Funktionen

* Meetings aus einem Kurs heraus starten/beitreten
* Automatische Raumerstellung pro Kurs
* Meeting-Aufzeichnungen (falls aktiviert)
* Bildschirmfreigabe, Whiteboard, Breakout-Räume
* Chat parallel zum Video

### Zoom

Chamilo kann auch mit **Zoom** für Videokonferenzen integriert werden.

#### Konfiguration

1. Erstellen Sie eine Zoom-App im Zoom Marketplace
2. Konfigurieren Sie in Chamilo die Zoom-API-Zugangsdaten
3. Aktivieren Sie die Zoom-Integration

#### Funktionsweise

Wenn Zoom konfiguriert ist, können Lehrende Zoom-Meetings aus ihrem Kurs heraus erstellen und starten. Lernende treten über die Chamilo-Oberfläche bei.

## Wahl zwischen BBB und Zoom

| Funktion | BigBlueButton | Zoom |
|---------|--------------|------|
| Kosten | Kostenlos (Open Source), erfordert jedoch einen eigenen Server | Erfordert ein Zoom-Abonnement |
| Hosting | Selbst gehostet | Cloud-gehostet von Zoom |
| Integrationstiefe | Tief (für LMS-Einsatz entwickelt) | Standard |
| Aufzeichnung | Serverseitig, Speicherung auf Ihrer Infrastruktur | Zoom-Cloud oder lokal |
| Whiteboard | Integriert | Integriert |
| Breakout-Räume | Ja | Ja |

## Tipps

* **Separater Server für BBB** — BigBlueButton sollte für beste Leistung auf einem eigenen dedizierten Server laufen, nicht auf demselben Server wie Chamilo
* **Vor dem Unterricht testen** — Testen Sie die Videokonferenz-Einrichtung stets vor einer Live-Sitzung
* **Bandbreite prüfen** — Stellen Sie sicher, dass Server und Netzwerk die erwartete Anzahl gleichzeitiger Nutzer bewältigen können