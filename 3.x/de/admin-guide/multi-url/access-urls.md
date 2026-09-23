# Access URLs

Access URLs ermöglichen es, mit einer einzigen Chamilo-Installation mehrere voneinander getrennte Portale bereitzustellen.

Dieses Werkzeug ist auch über den Block [Plattform](../platform/README.md) im Administrations-Dashboard erreichbar, als **Mehrere Access-URLs konfigurieren**.


## Anwendungsfälle

* **Mandantenfähige Bereitstellungen** — Getrennte Schulungsportale für verschiedene Organisationen auf einem einzigen Server hosten
* **Abteilungsportale** — Jeder Abteilung ein eigenes gebrandetes Portal geben (z. B. `hr.training.company.com`, `it.training.company.com`)
* **Regionale Portale** — Getrennte Portale für verschiedene Regionen oder Sprachen

## Funktionsweise

Jede Access-URL ist ein eigener Einstiegspunkt in dieselbe Chamilo-Installation:

* Benutzer können einer oder mehreren Access-URLs zugeordnet werden
* Kurse und Sessions gehören zu bestimmten Access-URLs
* Plattformeinstellungen können pro Access-URL angepasst werden
* Branding und Themes können sich pro URL unterscheiden
* Benutzer eines Portals sehen weder Benutzer noch Kurse eines anderen Portals (sofern sie nicht ausdrücklich geteilt werden)

## Konfiguration

### Multi-URL aktivieren

Multi-URL muss in der Chamilo-Konfiguration aktiviert werden (üblicherweise in den Umgebungseinstellungen). Dies geschieht in der Regel während der Erstinstallation.

### Eine Access-URL anlegen

1. Navigieren Sie im Administrationsbereich zu **Access URLs**
2. Klicken Sie auf **Add URL**
3. Geben Sie die URL ein (z. B. `https://portal2.yoursite.com`) sowie eine Beschreibung
4. Optional wählen Sie eine **Parent URL**, um diese URL unter einer anderen einzuordnen — siehe [URL-Hierarchie](#url-hierarchy) weiter unten
5. Speichern

### Benutzer und Kurse zuordnen

* **Benutzer** — Benutzer bestimmten Access-URLs zuordnen. Ein Benutzer kann mehreren URLs angehören.
* **Kurse** — Kurse bestimmten Access-URLs zuordnen
* **Sessions** — Sessions bestimmten Access-URLs zuordnen

### Einstellungen pro URL

Jede Access-URL kann über eigene verfügen:

* **Farbthema** — Unterschiedliches visuelles Branding
* **Plattformname und Logo** — Eigene Identität
* **Einstellungsüberschreibungen** — Bestimmte Plattformeinstellungen können pro URL angepasst werden

## URL-Hierarchie

Access-URLs können statt in einer flachen Liste in einem Eltern-/Kind-Baum organisiert werden. Beim Anlegen oder Bearbeiten einer URL kann ein uneingeschränkter Global Administrator (siehe [Teilbaum-Administratoren](#subtree-administrators) weiter unten) eine beliebige andere URL als **Parent URL** wählen:

![Dialog „URL bearbeiten“ mit geöffnetem Dropdown „Parent URL“, das die anderen als Eltern verfügbaren Access-URLs auflistet](../../.gitbook/assets/admin-access-url-parent-select.png)

* Das Dropdown bietet niemals die gerade bearbeitete URL oder einen ihrer eigenen Nachkommen als möglichen Elternknoten an — so wird ein Zyklus verhindert. Das Backend prüft dies unabhängig davon, was die Oberfläche anzeigt, erneut.
* Wird eine URL ohne Wahl eines Elternknotens angelegt, gilt standardmäßig die **login-only URL**, sofern eine existiert (siehe [Einstellungen pro URL](#per-url-settings) oben), andernfalls die erste Access-URL — dasselbe Standardverhalten wie vor dieser Funktion.
* Die oberste URL eines Baums — die ohne Elternknoten — ist die **Wurzel** dieses Baums. Eine einzelne Chamilo-Installation kann mehr als einen unabhängigen Baum hosten.

Überall, wo Access-URLs aufgelistet werden — im Multi-URL-Dashboard und auf der Verwaltungsseite Access URLs — wird der Baum durch Einrückung dargestellt, ein Elternknoten unmittelbar gefolgt von seinen eigenen Kindern (Geschwister alphabetisch sortiert), statt einer eigenen Spalte „Parent“:

![Liste der Access-URLs mit einer Wurzel-URL und zwei Kind-URLs, von denen eine eine eigene Kind-URL hat, eingerückt zur Darstellung der Hierarchie](../../.gitbook/assets/admin-access-url-hierarchy-list.png)

## Teilbaum-Administratoren

Die URL-Hierarchie bestimmt auch, was ein [Global Administrator](../users/user-roles.md) verwalten kann:

* Wer auf der **Wurzel**-URL eines Baums registriert ist, ist **uneingeschränkt**: er verwaltet jede Access-URL, genau wie vor dieser Funktion.
* Wer nur auf einer **Nicht-Wurzel**-URL registriert ist, ist **eingeschränkt**: die Seiten Multi-URL und Access URLs zeigen nur diese URL und ihre Nachkommen, und das Anmelde-Diagramm im Multi-URL-Dashboard lautet „Logins (your URLs)“ statt „Logins (all URLs combined)“.

Unabhängig vom Geltungsbereich bleiben die folgenden Aktionen einem **uneingeschränkten** Global Administrator vorbehalten — ein eingeschränkter Administrator kann sie auch für URLs im eigenen Teilbaum nicht ausführen:

* Anlegen einer neuen Access-URL
* Bearbeiten der eigenen URL, Beschreibung oder des Elternknotens einer Access-URL
* Aktivieren oder Deaktivieren einer Access-URL
* Löschen einer Access-URL (die Wurzel-URL der gesamten Installation kann von niemandem gelöscht werden)
* Sich selbst auf einmal in jede Access-URL eintragen

Ein eingeschränkter Administrator kann weiterhin alles verwalten, was den URLs in seinem Teilbaum *zugeordnet* ist — Benutzer, Kurse, Sessions, Branding und Einstellungen — nur nicht die Access-URL-Einträge selbst.

## Tipps

* **Früh entscheiden** — Wenn Sie sich für eine Multi-URL-Einrichtung entscheiden, sollten Sie das zu Beginn Ihres Chamilo-Projekts tun, da die erste URL relativ inhaltsleer bleiben muss. Die nachträgliche Aktivierung von Multi-URL ist aufwändiger (erfordert manuelle Datenbankänderungen).
* **URL-Struktur planen** — Legen Sie Ihr URL-Schema fest, bevor Sie Access-URLs anlegen, da spätere URL-Änderungen alle bestehenden Links und Lesezeichen betreffen
* **DNS-Konfiguration** — Jede Access-URL muss auf denselben Chamilo-Server auflösen. Konfigurieren Sie die DNS-Einträge entsprechend.
* **Globaler Administrator** — Nutzen Sie die Rolle Global Administrator, um über alle Access-URLs hinweg zu verwalten. Um stattdessen nur die Verwaltung eines Zweigs zu delegieren, registrieren Sie den Administrator auf einer Nicht-Root-URL — siehe [Subtree-Administratoren](#subtree-administrators)