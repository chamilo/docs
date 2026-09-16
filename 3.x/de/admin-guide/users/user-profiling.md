# Benutzerprofile

Chamilo ermöglicht die Definition benutzerdefinierter Profilfelder (Extrafelder), um über den Standardnamen, die E-Mail-Adresse und die Rolle hinaus zusätzliche Informationen zu Benutzern zu erfassen.

## Extra-Profilfelder

![Die Liste der Extra-Profilfelder mit benutzerdefinierten Feldern, Name, Typ und Sichtbarkeitseinstellungen](/.gitbook/assets/admin-extra-fields-list.png)

Extrafelder ermöglichen die Speicherung organisationsspezifischer Metadaten, beispielsweise:

* Mitarbeiter-ID
* Abteilung
* Stellenbezeichnung
* Standort/Büro
* Telefonnummer
* Benutzerdefinierte Kennungen

## Extrafelder anlegen

1. Navigieren Sie im Administrationsbereich zu **Extra fields** oder **Profile fields**
2. Klicken Sie auf **Add**
3. Konfigurieren Sie das Feld:
   * **Name** — Der den Benutzern angezeigte Feldtitel
   * **Description** — Optionale Beschreibung
   * **Helper text** — Wird unter dem Feld in jedem Formular angezeigt, das es enthält
   * **Field type** — Text, Dropdown, Datum, Kontrollkästchen usw.
   * **Field label** — Der interne Name des Feldes, für die Integration von Plugins 
   * **Possible values** — Wenn das Feld eine Auswahl zwischen diesen Werten ist 
   * **Default value** — Ein optionaler Standardwert
   * **Visible to self** — Ob das Feld auf dem Benutzerprofil für den Benutzer selbst sichtbar ist
   * **Visible to others** — Ob das Feld für andere Benutzer der Plattform sichtbar ist
   * **Can change** — Ob der Benutzer sein eigenes Feld selbst ändern kann (oder ob nur Administratoren dies können)
   * **Filter** — Wenn es sich um ein Auswahlfeld handelt, ob es als Filter auf Administrationsseiten einbezogen werden soll (z. B. zum Einschreiben von Benutzern in Kurse oder Sessions)
   * **Order** — Wenn Sie die Anzeigereihenfolge der Felder steuern möchten, müssen Sie jedem Feld eine numerische Reihenfolge zuweisen
   * **Remove on anonymization** — Wichtig für Datenschutzregeln und -gesetze: Wenn der Benutzer anonymisiert, aber nicht gelöscht wird, soll dieses Feld als möglicher Träger personenbezogener Daten gelten? 
4. Speichern

## Feldtypen

Die Extrafeld-Engine unterstützt eine breite Palette von Eingabetypen. Zu den gängigen gehören:

| Type | Description |
|------|-------------|
| **Text** | Eine einzeilige Texteingabe |
| **Textarea** | Eine mehrzeilige Texteingabe |
| **Radio** | Eine Einfachauswahl-Radiogruppe |
| **Dropdown / Dropdown multiple** | Eine Liste vordefinierter Optionen (Einzel- oder Mehrfachauswahl) |
| **Double select** | Zwei abhängige Dropdowns (z. B. Land → Stadt) |
| **Checkbox** | Ein Ja/Nein-Schalter |
| **Date / Date and time** | Datums- oder Datums-und-Uhrzeit-Auswahl |
| **Integer** | Eine numerische Eingabe |
| **Tag** | Mehrere frei formulierte Tag-Werte |
| **File** | Datei-Upload-Feld |
| **Video URL** | Eine URL, die auf ein Video verweist |
| **Mobile phone number** | Ein formatiertes Telefonnummernfeld |
| **Timezone** | Eine Zeitzonenauswahl |
| **Social profile** | Ein Link zu einem Profil in einem sozialen Netzwerk |
| **Divider** | Eine visuelle Trennlinie im Formular (kein Wert) |

Der genaue Satz nutzbarer Typen hängt von der Chamilo-Version ab; das Dropdown für den Feldtyp auf der Administrationsseite **Extra fields** ist maßgeblich.

## Extrafelder verwenden

Extrafelder erscheinen:

* In den Formularen zum Anlegen (falls für den Benutzer selbst sichtbar) und Bearbeiten von Benutzern
* Auf Benutzerprofilseiten (falls für den Benutzer selbst sichtbar)
* Bei Benutzerimporten (Sie können Extrafeldwerte in CSV-Importen angeben)
* In Exporten und Berichten (Filtern oder Gruppieren nach Extrafeldwerten)

## Tipps

* **Vor dem Anlegen planen** — Legen Sie fest, welche Informationen Sie benötigen, bevor Sie Felder anlegen, da das Ändern von Feldtypen nach der Dateneingabe problematisch sein kann
* **Dropdowns für Konsistenz nutzen** — Wenn ein Feld einen bekannten Satz möglicher Werte hat, verwenden Sie ein Dropdown statt Freitext, um Datenkonsistenz sicherzustellen
* **Für Berichte nutzen** — Extrafelder eignen sich zum Filtern von Berichten (z. B. „alle Benutzer in Abteilung X anzeigen, die Schulung Y abgeschlossen haben“)