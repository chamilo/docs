# Verwaltung von Plugins

## Zugriff auf den Plugin-Manager

![Der Plugin-Manager zeigt eine Liste der verfügbaren Plugins mit Aktivierungsschaltern und Konfigurationsoptionen](/.gitbook/assets/admin-plugin-manager.png)

Klicken Sie im Verwaltungsbereich auf **Plugins verwalten**, um die Liste der verfügbaren Plugins anzuzeigen.

## Plugin-Status

Jedes Plugin hat einen von zwei Zuständen:

* **Aktiv** — Das Plugin ist aktiviert und seine Funktionen sind auf der Plattform verfügbar
* **Inaktiv** — Das Plugin ist installiert, aber deaktiviert

## Aktivieren eines Plugins

1. Suchen Sie das Plugin in der Liste
2. Klicken Sie auf **Installieren**, dann auf **Aktivieren** oder schalten Sie es ein
3. Konfigurieren Sie die Plugin-Einstellungen (falls zutreffend, suchen Sie den Button **Konfigurieren**)
4. Speichern Sie die Einstellungen
5. Falls im README empfohlen, aktivieren Sie es in einer bestimmten **Region**

Einige Plugins fügen Kursen Werkzeuge hinzu, erstellen neue Seiten auf der Plattform oder erweitern bestehende Funktionen um zusätzliche Möglichkeiten.

## Konfigurieren eines Plugins

Viele Plugins bieten Konfigurationsoptionen. Nach der Aktivierung eines Plugins:

1. Klicken Sie auf den Button **Konfigurieren** neben dem Plugin
2. Füllen Sie die erforderlichen Konfigurationen aus (API-Schlüssel, URLs, Optionen usw.)
3. Speichern Sie die Einstellungen

## Deaktivieren eines Plugins

1. Suchen Sie das Plugin in der Liste
2. Klicken Sie auf **Deaktivieren** oder schalten Sie es aus
3. Die Funktionen des Plugins werden sofort von der Plattform entfernt, aber das Plugin bleibt installiert und behält seine Konfiguration, bis Sie es **Deinstallieren**

Das Deaktivieren eines Plugins löscht dessen Daten nicht. Wenn Sie es später wieder aktivieren, sind die Daten weiterhin verfügbar.

## Tipps

* **Aktivieren Sie nur, was Sie benötigen** — Jedes aktive Plugin verursacht einen gewissen Overhead. Halten Sie ungenutzte Plugins deaktiviert.
* **Testen Sie vor dem Produktiveinsatz** — Aktivieren Sie neue Plugins zunächst in einer Testumgebung
* **Überprüfen Sie die Kompatibilität** — Nach einem Upgrade von Chamilo stellen Sie sicher, dass alle aktiven Plugins weiterhin korrekt funktionieren