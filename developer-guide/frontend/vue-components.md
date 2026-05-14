# Vue-Komponenten

Chamilo verfügt über eine umfangreiche Sammlung von Vue-Komponenten, die nach Funktionsbereichen in `assets/vue/components/` organisiert sind.

## Basis-Komponenten

Die `Base*`-Familie in `assets/vue/components/basecomponents/` umschließt PrimeVue-Grundelemente mit Chamilo-spezifischen Standardeinstellungen (FloatLabel-Layout, MDI-Icons über `chamiloIconToClass`, einheitliche Validierungsmeldungen, Tailwind-Größen). Greifen Sie immer zuerst zu einer `Base*`-Komponente, bevor Sie die zugrunde liegende PrimeVue-Komponente importieren – so bleibt die Benutzeroberfläche über die gesamte SPA hinweg konsistent und Designänderungen können zentral an einer Stelle ausgerollt werden.

Komponenten sind **nicht** global registriert (die einzige global registrierte PrimeVue-Grundkomponente ist `Column`, die innerhalb von `BaseTable` verwendet wird). Importieren Sie jede Komponente explizit:

```js
import BaseButton from "@/components/basecomponents/BaseButton.vue"
import BaseDialog from "@/components/basecomponents/BaseDialog.vue"
```

---
### Formulareingaben

Die meisten akzeptieren den Wert über `v-model`, stellen `id`- und `label`-Props für Barrierefreiheit und die Bindung von schwebenden Labels zur Verfügung und zeigen Validierung durch ein `isInvalid`-/`errorText`- (oder `messageText`-) Paar an.

| Komponente                        | Umhüllt                                              | Zweck                                                                                                                                                                                              |
|-----------------------------------|------------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseInputText.vue`               | `InputText` + `FloatLabel`                           | Einzeilige Texteingabe. Wechselt zu einem statischen Label für `date`/`time`/`datetime-local`-Eingaben (wo das schwebende Label den nativen Platzhalter überlagern würde).                       |
| `BaseInputTextWithVuelidate.vue`  | `BaseInputText`                                      | Dünner Vuelidate-Adapter: leitet `$error` an `isInvalid` weiter und rendert `$errors[].$message` im `errors`-Slot. Kombinieren Sie es mit einem Vuelidate-Feldobjekt.                             |
| `BaseTextArea.vue`                | `Textarea` + `FloatLabel`                            | Mehrzeilige Texteingabe.                                                                                                                                                                           |
| `BaseTextAreaWithVuelidate.vue`   | `BaseTextArea`                                       | Derselbe Vuelidate-Adapter-Muster wie bei `BaseInputTextWithVuelidate`.                                                                                                                            |
| `BaseInputNumber.vue`             | `InputNumber`                                        | Numerische Eingabe mit `min` / `max` / `step` und Spinner-Buttons.                                                                                                                                 |
| `BaseInputTags.vue`               | (benutzerdefiniert)                                  | Freitext-Tag-Chips; Tags werden bei Enter/Komma hinzugefügt und bei Rücktaste entfernt.                                                                                                           |
| `BaseInputGroup.vue`              | `InputGroup` + `BaseButton`                          | Texteingabe kombiniert mit einem Aktionsbutton (Suchstil).                                                                                                                                         |
| `BaseCheckbox.vue`                | `Checkbox`                                           | Binäres oder wertgebundenes Kontrollkästchen mit Label.                                                                                                                                            |
| `BaseRadioButtons.vue`            | `RadioButton`                                        | Gruppe von Optionsschaltflächen, gesteuert durch ein `options: [{label, value}]`-Array.                                                                                                            |
| `BaseToggleButton.vue`            | `BaseButton`                                         | Zweizustands-Button (Ein-/Aus-Labels und Icons), gebunden über `v-model`.                                                                                                                          |
| `BaseCalendar.vue`                | `DatePicker` + `FloatLabel`                          | Datum-/Datum-Uhrzeit-Auswahl. Berücksichtigt `platform.timepicker_increment` und die Benutzerlokalisierung über `calendarLocales`.                                                                |
| `BaseColorPicker.vue`             | natives `<input type="color">` + `InputText`         | Farbwähler mit Hex-Text-Rückfall; verwendet `colorjs.io` zur Validierung manueller Hex-Eingaben.                                                                                                  |
| `BaseRating.vue`                  | `Rating`                                             | Sternbewertungseingabe.                                                                                                                                                                            |
| `BaseFileUpload.vue`              | natives `<input type="file">` + `BaseButton`         | Einzeldatei-Auswahl, die einen Anhang-Stil-Button auslöst.                                                                                                                                         |
| `BaseFileUploadMultiple.vue`      | natives `<input type="file" multiple>` + `BaseButton` | Mehrdatei-Variante von `BaseFileUpload`.                                                                                                                                                           |
| `BaseUploader.vue`                | Uppy `Dashboard`                                     | Vollständiger Uppy-Uploader (Webcam, Audio, Bildeditor, XHR-Upload) mit Lokalisierungen, die an die aktuelle `appLocale` gebunden sind. Verwenden Sie dies für umfangreiche Uploads mit Fortschrittsanzeige; verwenden Sie `BaseFileUpload*` für einfache Anhänge. |

---
### Auswahl & Autovervollständigung

| Komponente              | Umhüllt                        | Zweck                                                                                                                           |
|-------------------------|-------------------------------|---------------------------------------------------------------------------------------------------------------------------------|
| `BaseSelect.vue`        | `Dropdown` + `FloatLabel`     | Dropdown für Einzelwahl mit optionalem Löschen-Button.                                                                          |
| `BaseMultiSelect.vue`   | `MultiSelect` + `FloatLabel`  | Dropdown für Mehrfachwahl, das ausgewählte Elemente als Chips anzeigt.                                                         |
| `BaseSearchSelect.vue`  | `Dropdown` mit `filter`       | Dropdown für Einzelwahl mit integrierter Suchleiste, optionalem virtuellem Scrollen und zweizeiligem Optionstemplate (`label` + `sublabel`). |
| `BaseAutocomplete.vue`  | `AutoComplete`                | Asynchrone Autovervollständigung (Mindestlänge 3 Zeichen). Unterstützt Einzel- oder Mehrfachauswahl und einen `chip`-Slot zur Anpassung der Chips. |
| `BaseUserFinder.vue`    | `BaseTable` + `userService`   | Paginierte Benutzersuchtabelle mit Zeilenauswahl. Verwenden Sie diese, wenn eine Funktion einen Benutzerauswähler im Admin-Stil benötigt. |

### Schaltflächen & Aktionen

| Komponente                        | Umhüllt               | Zweck                                                                                                                                                                                                                                                                                                                                                     |
|-----------------------------------|---------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseButton.vue`                  | `Button` (PrimeVue) | Standard-Chamilo-Schaltfläche. Löst Icons über `chamiloIconToClass` auf, normalisiert `type` zu PrimeVue's `severity`/`variant`, rendert einen internen `BaseAppLink`, wenn ein `route` oder `toUrl` angegeben ist (so dass dieselbe Komponente router-link, anchor und einfache Schaltflächenfälle behandelt). Akzeptierte `type`-Werte sind in `validators.js` → `buttonTypeValidator` aufgelistet. |
| `BaseAdvancedSettingsButton.vue`  | `BaseButton`        | Offenlegungsschaltfläche, die über `v-model` ein geschachteltes Panel für "Erweiterte Einstellungen" ein- und ausblendet.                                                                                                                                                                                                                              |
| `BaseToolbar.vue`                 | `Toolbar`           | Aktionsleiste mit `start` / `end` Slots (oder einem einzelnen Standard-Slot). Optionales `showTopBorder` für Trennlinien-Styling.                                                                                                                                                                                                                      |

---
### Anzeige & Daten

| Komponente            | Umhüllt                     | Zweck                                                                                                                                                                                         |
|-----------------------|-----------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTable.vue`       | `DataTable` (PrimeVue)      | Standard-Chamilo-Datentabelle. Unterstützt Server-seitigen Modus (`lazy`), Mehrspaltensortierung, globalen Filter, Zeilenauswahl und Paginierung. Spalten als `<Column>`-Kinder übergeben (global registriert). |
| `BaseCard.vue`        | `Card`                      | Karten-Wrapper, der die Slots `header`, `title`, `subtitle`, `footer` und Standard (Inhalt) weiterleitet.                                                                                     |
| `BaseChart.vue`       | `Chart`                     | Voreinstellung für Kreisdiagramme. Übergeben Sie ein Chart.js-kompatibles `data`-Objekt.                                                                                                      |
| `BaseChip.vue`        | `Chip`                      | Chip, das aus einem `{value, labelField, imageField}`-Objekt gerendert wird, mit optionalem Entfernen-Button.                                                                                 |
| `BaseTag.vue`         | `Tag`                       | Farbiges Etikett-Tag. Mappt Chamilos `warning` auf PrimeVues `warn`.                                                                                                                          |
| `BaseAvatarList.vue`  | `Avatar` + `BaseUserAvatar` | Avatar-Reihe mit Überlaufzähler (z. B. "+3"); gesteuert durch `useAvatarList`.                                                                                                                |
| `BaseUserAvatar.vue`  | `Avatar`                    | Benutzer-Avatar mit Bild-Fallback, Ladezustand und barrierefreiem Label.                                                                                                                      |
| `BaseIcon.vue`        | `<i class="mdi …">`         | Chamilo-Icon-Renderer. Fügt optional ein Abzeichen (Text oder Icon), Tooltip und Größenmodifikator hinzu. Immer einen semantischen Chamilo-Namen (z. B. `"edit"`) übergeben, keine rohe MDI-Klasse. |
| `BaseIconField.vue`   | `IconField` + `InputText`   | Suchfeld mit einem führenden Lupen-Icon.                                                                                                                                                      |
| `BaseDivider.vue`     | `Divider`                   | Horizontaler oder vertikaler Trenner, mit optionalem Titel und Ausrichtung.                                                                                                                   |

### Navigation & Menüs

| Komponente                 | Umhüllt                 | Zweck                                                                                                                                                                                 |
|----------------------------|-------------------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseMenu.vue`             | `Menu` (Popup)          | Popup-Menü, das Router-Routen innerhalb von `model[]`-Elementen versteht.                                                                                                             |
| `BaseDropdownMenu.vue`     | (benutzerdefiniert)     | Leichter Dropdown-Trigger mit Einzelöffnungs-Koordination (das Öffnen eines schließt die anderen).                                                                                    |
| `BaseContextMenu.vue`      | (benutzerdefiniert)     | Rechtsklick- / positioniertes Kontextmenü, gesteuert durch `visible` + `position`.                                                                                                   |
| `BaseSidebarPanelMenu.vue` | `PanelMenu`             | Akkordeon-ähnliches Navigationsmenü, das in Seitenleisten verwendet wird; verfolgt automatisch erweiterte Schlüssel aus dem Modell.                                                  |
| `BaseRouteTabs.vue`        | `BaseAppLink`-Reihe     | Tab-Leiste, bei der jeder Tab ein Router-Link ist. Der aktive Tab wird automatisch basierend auf der aktuellen Route hervorgehoben.                                                  |
| `BaseAppLink.vue`          | `RouterLink` *oder* `<a>` | Intelligenter Link: Rendert ein `<a>`, wenn `url` gesetzt ist (extern/legacy), ansonsten ein Vue Router `<RouterLink>`. Verwenden Sie diesen statt der primitiven, um einheitliches internes/externes Linking zu gewährleisten. |

### Dialoge

`BaseDialog` ist die Grundlage; die anderen bauen darauf auf für die gängigen Bestätigungs-/Abbruch- und Löschabläufe.

| Komponente                     | Umhüllt                   | Zweck                                                                                                                               |
|-------------------------------|---------------------------|-------------------------------------------------------------------------------------------------------------------------------------|
| `BaseDialog.vue`              | `Dialog`                  | Modal-Dialog mit einem betitelten Header (optionales `headerIcon`) und geschlitzten Body/Footer. Der Öffnungszustand ist ein `defineModel("isVisible")`. |
| `BaseDialogConfirmCancel.vue` | `BaseDialog`              | Bestätigungs-/Abbruch-Modal mit zwei Schaltflächen. Konfigurierbarer Bestätigungs-`type` (Schweregrad) und `icon`; sendet `confirmClicked` / `cancelClicked`. |
| `BaseDialogDelete.vue`        | `BaseDialogConfirmCancel` | Vorgefertigter "Sind Sie sicher, dass Sie dieses Element löschen möchten?"-Modal mit einer danger-stylisierten Bestätigungsschaltfläche. |

### Editor & reichhaltiger Inhalt

| Komponente            | Umhüllt                                         | Zweck                                                                                                                                                              |
|----------------------|-------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTinyEditor.vue` | TinyMCE (über die `components/Editor` des Projekts) | Rich-Text-Editor mit `FloatLabel`, Fokus-/Leerzustandsverfolgung und Integration in den aktuellen Kurskontext (`cidReq`). Verwenden Sie ihn für jedes benutzerdefinierte HTML-Feld. |

### Hilfsprogramme

| Datei              | Zweck                                                                                                                                                                                                                                                          |
|-------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `ChamiloIcons.js` | Ordnet semantische Icon-Namen (`edit`, `delete`, `eye-on`, `courses`, …) den MDI-CSS-Klassen zu. ~127 Einträge. Durchsuchen Sie sie unter `/admin/list-icons` auf einer laufenden Instanz.                                                                 |
| `validators.js`   | Gemeinsame Prop-Validatoren: `iconValidator` (muss ein bekannter Chamilo-Icon-Name sein), `sizeValidator` (`normal` / `small` / `large`), `buttonTypeValidator` (zulässige `BaseButton`-Typen). Importieren Sie sie bei der Definition neuer `Base*`-Komponenten, die diese Konventionen widerspiegeln. |

### Konventionen bei Base-Komponenten

* **v-model über `defineModel()`** — Wert (und häufig `isVisible`, `filters`, `selectedItems`) werden als Modelle bereitgestellt; übergeben Sie sie mit `v-model[:name]` anstelle von `:prop` + `@update:prop`.
* **Schwebende Labels** — Die meisten Formularfelder umhüllen ihre Eingabe in PrimeVue `FloatLabel variant="on"`. Geben Sie `label` (den angezeigten Text) und `id` (zur Bindung des `<label for>`) an.
* **Validierungsnachrichten** — Felder zeigen `isInvalid` und eine kleine Nachricht unter der Eingabe (`errorText`, `messageText` oder `smallText`, je nach Komponente). Vuelidate-kompatible Varianten existieren für die häufigsten.
* **Icons** — Übergeben Sie Chamilo-semantische Namen, nicht rohe MDI-Klassen. Die Komponenten lösen sie über `chamiloIconToClass` auf.
* **Größenanpassung** — `size="normal" | "small" | "large"` ist die konventionelle Größen-Prop (siehe `sizeValidator`).
* **Komposition statt Duplikation** — `BaseDialogDelete` umhüllt `BaseDialogConfirmCancel`, das wiederum `BaseDialog` umhüllt; `BaseToggleButton` und `BaseAdvancedSettingsButton` umhüllen `BaseButton`. Wenn Sie eine wiederkehrende Variante einer bestehenden Komponente benötigen, bevorzugen Sie die Komposition einer neuen `Base*`-Komponente darüber, anstatt sie in einem Feature-Ordner neu zu implementieren.

## Layout-Komponenten

Befindet sich in `components/layout/`:

| Komponente | Zweck |
|-----------|---------|
| `DashboardLayout.vue` | Hauptlayout: Topbar + Sidebar + Inhaltsbereich |
| `Sidebar.vue` | Linkes Navigationspanel (einklappbar) |
| `TopbarLoggedIn.vue` | Obere Leiste mit Logo, Posteingang, Avatar |

## Feature-Bereich-Komponenten

| Verzeichnis | Komponenten | Zweck |
|-------------|-------------|-------|
| `course/` | Kurskarten, Katalogfilter, Kursformulare | Kursauflistung und -verwaltung |
| `session/` | Sitzungskarten, Katalog | Sitzungsauflistung |
| `assignments/` | Einreichungslisten, Bewertungsmodale, Formulare | Arbeitsablauf für Aufgaben |
| `chat/` | DockedChat, Chatnachrichten | Echtzeit-Chat und KI-Tutor |
| `filemanager/` | CourseDocuments, PersonalFiles | Dateibrowser und -verwaltung |
| `installer/` | Step1-Step7, EmailSettings | Installationsassistent |
| `social/` | GroupInfoCard, soziale Beiträge | Funktionen für soziale Netzwerke |
| `attendance/` | AttendanceTable | Anwesenheitsverfolgung |
| `usergroup/` | GroupMembers | Benutzergruppenverwaltung |

## Icon-System

Icons verwenden ausschließlich die **Material Design Icons (MDI)** als Icon-Bibliothek: `<i class="mdi mdi-pencil"></i>`

Die Datei `ChamiloIcons.js` bietet eine semantische Zuordnung:

```javascript
export const chamiloIconToClass = {
  "edit": "mdi mdi-pencil",
  "delete": "mdi mdi-delete",
  "eye-on": "mdi mdi-eye",
  "courses": "mdi mdi-book-open-page-variant",
  // ... 127 mappings
}
```

Komponenten verwenden `BaseIcon` oder verweisen auf `chamiloIconToClass`, um Icons einheitlich darzustellen.

Eine durchsuchbare Referenz aller auf der Plattform verfügbaren Icons finden Sie unter `/admin/list-icons` in jeder laufenden Chamilo-Instanz.

## Komponentenmuster

* **Composition API** — Komponenten verwenden die `<script setup>`-Syntax von Vue 3
* **PrimeVue-Integration** — Intensive Nutzung von PrimeVue-Komponenten (Button, DataTable, Dialog, Menu, etc.)
* **Axios für API-Aufrufe** — HTTP-Anfragen an die Backend-API
* **Vue I18n** — Alle benutzerorientierten Texte verwenden Übersetzungsschlüssel