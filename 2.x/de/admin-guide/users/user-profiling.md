# Benutzerprofilierung

Chamilo ermöglicht es Ihnen, benutzerdefinierte Profilfelder (zusätzliche Felder) zu definieren, um über die Standardinformationen wie Name, E-Mail und Rolle hinaus zusätzliche Informationen über Benutzer zu erfassen.

## Zusätzliche Profilfelder

![Die Liste der zusätzlichen Profilfelder zeigt benutzerdefinierte Felder mit Name, Typ und Sichtbarkeitseinstellungen](/.gitbook/assets/admin-extra-fields-list.png)

Zusätzliche Felder erlauben es Ihnen, organisationsspezifische Metadaten zu speichern, wie zum Beispiel:

* Mitarbeiter-ID
* Abteilung
* Berufsbezeichnung
* Standort/Büro
* Telefonnummer
* Benutzerdefinierte Identifikatoren

## Erstellen von zusätzlichen Feldern

1. Navigieren Sie im Verwaltungspanel zu **Zusätzliche Felder** oder **Profilfelder**
2. Klicken Sie auf **Hinzufügen**
3. Konfigurieren Sie das Feld:
   * **Name** — Der Feldtitel, der den Benutzern angezeigt wird
   * **Beschreibung** — Optionale Beschreibung
   * **Hilfetext** — Wird unter dem Feld in jedem Formular angezeigt, das es enthält
   * **Feldtyp** — Text, Dropdown, Datum, Checkbox usw.
   * **Feldbezeichnung** — Der interne Name des Feldes, für die Integration von Plugins
   * **Mögliche Werte** — Wenn das Feld eine Auswahl zwischen diesen Werten ist
   * **Standardwert** — Ein optionaler Standardwert
   * **Sichtbar für sich selbst** — Ob das Feld im Benutzerprofil für den Benutzer selbst sichtbar ist
   * **Sichtbar für andere** — Ob das Feld für andere Benutzer der Plattform sichtbar ist
   * **Änderbar** — Ob der Benutzer sein eigenes Feld selbst ändern kann (oder ob nur Administratoren dies können)
   * **Filter** — Wenn es sich um ein Auswahlfeld handelt, ob es als Filter auf administrativen Seiten verwendet werden soll (z. B. um Benutzer zu Kursen oder Sitzungen hinzuzufügen)
   * **Reihenfolge** — Wenn Sie die Anzeigereihenfolge der Felder verwalten möchten, müssen Sie jedem Feld eine numerische Reihenfolge zuweisen
   * **Bei Anonymisierung entfernen** — Wichtig für Datenschutzregeln und -gesetze: Soll dieses Feld als potenzieller Träger personenbezogener Daten betrachtet werden, wenn der Benutzer anonymisiert, aber nicht gelöscht wird?
4. Speichern

## Feldtypen

Die Engine für zusätzliche Felder unterstützt eine breite Palette von Eingabetypen. Häufige Typen sind:

| Typ | Beschreibung |
|------|-------------|
| **Text** | Eine einzeilige Texteingabe |
| **Textarea** | Eine mehrzeilige Texteingabe |
| **Radio** | Eine Einzelwahl-Radiogruppe |
| **Dropdown / Dropdown Mehrfachauswahl** | Eine Liste vordefinierter Optionen (Einzel- oder Mehrfachauswahl) |
| **Doppelte Auswahl** | Zwei abhängige Dropdowns (z. B. Land → Stadt) |
| **Checkbox** | Ein Ja/Nein-Schalter |
| **Datum / Datum und Uhrzeit** | Datum- oder Datum+Uhrzeit-Auswahl |
| **Ganzzahl** | Eine numerische Eingabe |
| **Tag** | Mehrere frei definierbare Tag-Werte |
| **Datei** | Datei-Upload-Feld |
| **Video-URL** | Eine URL, die auf ein Video verweist |
| **Mobiltelefonnummer** | Ein formatiertes Telefonnummernfeld |
| **Zeitzone** | Eine Zeitzonenauswahl |
| **Soziales Profil** | Ein Link zu einem sozialen Netzwerkprofil |
| **Trennlinie** | Ein visueller Trenner im Formular (ohne Wert) |

Die genaue Auswahl der verfügbaren Typen hängt von der Chamilo-Version ab; das Dropdown für den Feldtyp auf der Admin-Seite **Zusätzliche Felder** ist die maßgebliche Quelle.

## Verwendung von zusätzlichen Feldern

Zusätzliche Felder erscheinen:

* Bei der Benutzererstellung (falls für sich selbst sichtbar) und in Bearbeitungsformularen
* Auf Benutzerprofilseiten (falls für sich selbst sichtbar)
* Bei Benutzerimporten (Sie können Werte für zusätzliche Felder in CSV-Importen einfügen)
* In Exporten und Berichten (Filtern oder Gruppieren nach Werten zusätzlicher Felder)

## Tipps

* **Planen Sie vor der Erstellung** — Definieren Sie, welche Informationen Sie benötigen, bevor Sie Felder erstellen, da das Ändern von Feldtypen nach der Dateneingabe problematisch sein kann
* **Verwenden Sie Dropdowns für Konsistenz** — Wenn ein Feld eine bekannte Menge an möglichen Werten hat, verwenden Sie ein Dropdown anstelle von Freitext, um Datenkonsistenz zu gewährleisten
* **Nutzen Sie sie für Berichte** — Zusätzliche Felder sind nützlich, um Berichte zu filtern (z. B. „Zeige alle Benutzer in Abteilung X, die Schulung Y abgeschlossen haben“)