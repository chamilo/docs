# Plugins verwalten

## Zugriff auf den Plugin-Manager

![Der Plugin-Manager mit einer Liste verfügbarer Plugins, Aktivierungsschaltern und Konfigurationsoptionen](/.gitbook/assets/admin-plugin-manager.png)

Klicken Sie im Administrationsbereich auf **Plugins verwalten**, um die Liste der verfügbaren Plugins anzuzeigen.

## Plugin-Zustände

Jedes Plugin hat einen von zwei Zuständen:

* **Aktiv** — Das Plugin ist aktiviert und seine Funktionen stehen auf der Plattform zur Verfügung
* **Inaktiv** — Das Plugin ist installiert, aber deaktiviert

## Ein Plugin aktivieren

1. Suchen Sie das Plugin in der Liste
2. Klicken Sie auf **Installieren**, anschließend auf **Aktivieren** oder schalten Sie es ein
3. Konfigurieren Sie die Plugin-Einstellungen (falls zutreffend, finden Sie die Schaltfläche **Konfigurieren**)
4. Speichern
5. Falls in der README empfohlen, aktivieren Sie es in einer bestimmten **Region**

Einige Plugins fügen Kursen Werkzeuge, der Plattform neue Seiten oder bestehenden Funktionen zusätzliche Funktionalität hinzu.

## Ein Plugin konfigurieren

Viele Plugins verfügen über Konfigurationsoptionen. Nach dem Aktivieren eines Plugins:

1. Klicken Sie neben dem Plugin auf die Schaltfläche **Konfigurieren**
2. Füllen Sie die erforderliche Konfiguration aus (API-Schlüssel, URLs, Optionen usw.)
3. Speichern

## Ein Plugin deaktivieren

1. Suchen Sie das Plugin in der Liste
2. Klicken Sie auf **Deaktivieren** oder schalten Sie es aus
3. Die Funktionen des Plugins werden sofort von der Plattform entfernt, das Plugin bleibt jedoch installiert und behält seine Konfiguration, bis Sie es **Deinstallieren**

Das Deaktivieren eines Plugins löscht dessen Daten nicht. Wenn Sie es später wieder aktivieren, stehen die Daten weiterhin zur Verfügung.

## Tipps

* **Aktivieren Sie nur, was Sie benötigen** — Jedes aktive Plugin verursacht einen gewissen Overhead. Lassen Sie ungenutzte Plugins deaktiviert.
* **Vor der Produktion testen** — Aktivieren Sie neue Plugins zuerst in einer Testumgebung
* **Kompatibilität prüfen** — Überprüfen Sie nach einem Upgrade von Chamilo, ob alle aktiven Plugins weiterhin korrekt funktionieren