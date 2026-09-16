# Zugriffs-URLs

Zugriffs-URLs ermöglichen es, eine einzelne Chamilo-Installation für mehrere separate Portale zu nutzen.

## Anwendungsfälle

* **Multi-Tenant-Bereitstellungen** — Hosten Sie separate Schulungsportale für verschiedene Organisationen auf einem einzigen Server
* **Abteilungsportale** — Geben Sie jeder Abteilung ihr eigenes gebrandetes Portal (z. B. `hr.training.company.com`, `it.training.company.com`)
* **Regionale Portale** — Separate Portale für verschiedene Regionen oder Sprachen

## Funktionsweise

Jede Zugriffs-URL ist ein separater Einstiegspunkt zur gleichen Chamilo-Installation:

* Benutzer können einer oder mehreren Zugriffs-URLs zugewiesen werden
* Kurse und Sitzungen gehören zu bestimmten Zugriffs-URLs
* Plattformeinstellungen können pro Zugriffs-URL angepasst werden
* Branding und Themes können sich je nach URL unterscheiden
* Benutzer eines Portals können Benutzer oder Kurse eines anderen Portals nicht sehen (es sei denn, sie werden explizit freigegeben)

## Konfiguration

### Aktivierung von Multi-URL

Multi-URL muss in der Chamilo-Konfiguration aktiviert werden (normalerweise in den Umgebungseinstellungen). Dies geschieht in der Regel während der Erstinstallation.

### Erstellen einer Zugriffs-URL

1. Navigieren Sie im Verwaltungsbereich zu **Zugriffs-URLs**
2. Klicken Sie auf **URL hinzufügen**
3. Geben Sie die URL ein (z. B. `https://portal2.yoursite.com`)
4. Konfigurieren Sie die spezifischen Einstellungen für diese URL
5. Speichern

### Zuweisung von Benutzern und Kursen

* **Benutzer** — Weisen Sie Benutzer bestimmten Zugriffs-URLs zu. Ein Benutzer kann mehreren URLs zugeordnet sein.
* **Kurse** — Weisen Sie Kurse bestimmten Zugriffs-URLs zu
* **Sitzungen** — Weisen Sie Sitzungen bestimmten Zugriffs-URLs zu

### Einstellungen pro URL

Jede Zugriffs-URL kann Folgendes haben:

* **Farbschema** — Unterschiedliches visuelles Branding
* **Plattformname und Logo** — Individuelle Identität
* **Einstellungsüberschreibungen** — Bestimmte Plattformeinstellungen können pro URL angepasst werden

## Tipps

* **Früh entscheiden** — Wenn Sie sich für eine Multi-URL-Konfiguration entscheiden, sollten Sie dies zu Beginn Ihres Chamilo-Projekts tun, da die erste URL relativ leer von Inhalten bleiben muss. Das nachträgliche Aktivieren von Multi-URL ist schwieriger (erfordert manuelle Datenbankänderungen).
* **URL-Struktur planen** — Legen Sie Ihr URL-Schema fest, bevor Sie Zugriffs-URLs erstellen, da spätere Änderungen der URLs alle bestehenden Links und Lesezeichen beeinflussen
* **DNS-Konfiguration** — Jede Zugriffs-URL muss auf denselben Chamilo-Server auflösen. Konfigurieren Sie die DNS-Einträge entsprechend.
* **Globaler Administrator** — Verwenden Sie die Rolle des Globalen Administrators, um alle Zugriffs-URLs zu verwalten