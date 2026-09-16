# Vue-Komponenten

Chamilo verfügt über eine umfangreiche Sammlung von Vue-Komponenten, die nach Funktionsbereichen in `assets/vue/components/` organisiert sind.

## Basis-Komponenten

Die Familie `Base*` in `assets/vue/components/basecomponents/` kapselt PrimeVue-Primitive mit Chamilo-spezifischen Vorgaben (FloatLabel-Layout, MDI-Icons über `chamiloIconToClass`, einheitliche Validierungsmeldungen, Tailwind-Größen). Greifen Sie stets zuerst auf eine `Base*`-Komponente zurück, bevor Sie die zugrunde liegende PrimeVue-Komponente importieren – so bleibt die Benutzeroberfläche in der SPA konsistent und Designänderungen können von einer einzigen Stelle aus ausgerollt werden.

Komponenten sind **nicht** global registriert (das einzige global registrierte PrimeVue-Primitiv ist `Column`, das innerhalb von `BaseTable` verwendet wird). Importieren Sie jede Komponente explizit:

```js
import BaseButton from "@/components/basecomponents/BaseButton.vue"
import BaseDialog from "@/components/basecomponents/BaseDialog.vue"
```

### Formulareingaben

Die meisten übernehmen den Wert über `v-model`, stellen die Props `id` + `label` für Barrierefreiheit und die Anbindung schwebender Beschriftungen bereit und geben Validierung über ein Paar `isInvalid` / `errorText` (oder `messageText`) weiter.

| Komponente                       | Umschließt                                           | Zweck                                                                                                                                                                                              |
|----------------------------------|------------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseInputText.vue`              | `InputText` + `FloatLabel`                           | Einzeilige Texteingabe. Wechselt bei `date`/`time`/`datetime-local`-Eingaben zu einer statischen Beschriftung (wo die schwebende Beschriftung den nativen Platzhalter überdecken würde).            |
| `BaseInputTextWithVuelidate.vue` | `BaseInputText`                                      | Dünner Vuelidate-Adapter: leitet `$error` an `isInvalid` weiter und rendert `$errors[].$message` im Slot `errors`. Mit einem Vuelidate-Feldobjekt kombinieren.                                     |
| `BaseTextArea.vue`               | `Textarea` + `FloatLabel`                            | Mehrzeilige Texteingabe.                                                                                                                                                                           |
| `BaseTextAreaWithVuelidate.vue`  | `BaseTextArea`                                       | Dasselbe Vuelidate-Adapter-Muster wie bei `BaseInputTextWithVuelidate`.                                                                                                                            |
| `BaseInputNumber.vue`            | `InputNumber`                                        | Numerische Eingabe mit `min` / `max` / `step` und Spinner-Schaltflächen.                                                                                                                           |
| `BaseInputTags.vue`              | (custom)                                             | Freitext-Tag-Chips; Tags werden mit Enter/Komma hinzugefügt und mit Rücktaste entfernt.                                                                                                            |
| `BaseInputGroup.vue`             | `InputGroup` + `BaseButton`                          | Texteingabe kombiniert mit einer Aktionsschaltfläche (Suchstil).                                                                                                                                   |
| `BaseCheckbox.vue`               | `Checkbox`                                           | Binäres oder wertgebundenes Kontrollkästchen mit Beschriftung.                                                                                                                                     |
| `BaseRadioButtons.vue`           | `RadioButton`                                        | Gruppe von Optionsfeldern, gesteuert durch ein Array `options: [{label, value}]`.                                                                                                                  |
| `BaseToggleButton.vue`           | `BaseButton`                                         | Zweistufige Schaltfläche (Ein-/Aus-Beschriftungen und -Symbole), gebunden über `v-model`.                                                                                                          |
| `BaseCalendar.vue`               | `DatePicker` + `FloatLabel`                          | Datums- / Datums-Zeit-Auswahl. Berücksichtigt `platform.timepicker_increment` und die Locale des Benutzers über `calendarLocales`.                                                                 |
| `BaseColorPicker.vue`            | natives `<input type="color">` + `InputText`         | Farbauswahl mit Hex-Text-Fallback; verwendet `colorjs.io` zur Validierung manueller Hex-Eingaben.                                                                                                  |
| `BaseRating.vue`                 | `Rating`                                             | Sternebewertungseingabe.                                                                                                                                                                           |
| `BaseFileUpload.vue`             | natives `<input type="file">` + `BaseButton`         | Einzeldateiauswahl, die eine anhangsartige Schaltfläche auslöst.                                                                                                                                   |
| `BaseFileUploadMultiple.vue`     | natives `<input type="file" multiple>` + `BaseButton` | Mehrdateivariante von `BaseFileUpload`.                                                                                                                                                            |
| `BaseUploader.vue`               | Uppy `Dashboard`                                     | Vollständiger Uppy-Uploader (Webcam, Audio, Bildeditor, XHR-Upload) mit Locales, die an die aktuelle `appLocale` angebunden sind. Für umfangreiche Uploads mit Fortschritt verwenden; `BaseFileUpload*` für einfache Anhänge. |

### Auswahl & Autovervollständigung

| Component              | Wraps                        | Purpose                                                                                                                           |
|------------------------|------------------------------|-----------------------------------------------------------------------------------------------------------------------------------|
| `BaseSelect.vue`       | `Dropdown` + `FloatLabel`    | Einfachauswahl-Dropdown mit optionaler Löschen-Schaltfläche.                                                                                |
| `BaseMultiSelect.vue`  | `MultiSelect` + `FloatLabel` | Mehrfachauswahl-Dropdown, das ausgewählte Einträge als Chips anzeigt.                                                                      |
| `BaseSearchSelect.vue` | `Dropdown` with `filter`     | Einfachauswahl-Dropdown mit integriertem Suchfeld, optionalem virtuellem Scrollen und zweizeiliger Optionsvorlage (`label` + `sublabel`). |
| `BaseAutocomplete.vue` | `AutoComplete`               | Asynchrone Autovervollständigung (mindestens 3 Zeichen). Unterstützt Einzel- oder Mehrfachauswahl sowie einen `chip`-Slot zur Anpassung der Chips.                  |
| `BaseUserFinder.vue`   | `BaseTable` + `userService`  | Paginierte Benutzersuchtabelle mit Zeilenauswahl. Verwenden Sie sie, wenn eine Funktion einen benutzerauswahl im Admin-Stil benötigt.                           |

### Schaltflächen & Aktionen

| Component                        | Wraps               | Purpose                                                                                                                                                                                                                                                                                                                                                     |
|----------------------------------|---------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseButton.vue`                 | `Button` (PrimeVue) | Standard-Schaltfläche von Chamilo. Löst Icons über `chamiloIconToClass` auf, normalisiert `type` auf PrimeVues `severity`/`variant` und rendert intern ein `BaseAppLink`, wenn `route` oder `toUrl` angegeben ist (sodass dieselbe Komponente Router-Link-, Anker- und einfache Schaltflächenfälle abdeckt). Zulässige `type`-Werte sind in `validators.js` → `buttonTypeValidator` aufgeführt. |
| `BaseAdvancedSettingsButton.vue` | `BaseButton`        | Aufklapp-Schaltfläche, die über `v-model` ein eingeschobenes Panel „erweiterte Einstellungen“ umschaltet.                                                                                                                                                                                                                                                                           |
| `BaseToolbar.vue`                | `Toolbar`           | Aktionsleiste mit den Slots `start` / `end` (oder einem einzelnen Standard-Slot). Optionales `showTopBorder` für Trennlinien-Styling.                                                                                                                                                                                                                                       |

### Anzeige & Daten

| Component            | Wraps                       | Purpose                                                                                                                                                                                         |
|----------------------|-----------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTable.vue`      | `DataTable` (PrimeVue)      | Standard-Datentabelle von Chamilo. Unterstützt den serverseitigen Modus (`lazy`), mehrspaltige Sortierung, globalen Filter, Zeilenauswahl und Paginierung. Spalten als `<Column>`-Kinder übergeben (global registriert). |
| `BaseCard.vue`       | `Card`                      | Karten-Wrapper, der die Slots `header`, `title`, `subtitle`, `footer` sowie den Standard-Slot (Inhalt) weiterleitet.                                                                                                |
| `BaseChart.vue`      | `Chart`                     | Voreinstellung für Kreisdiagramme. Ein Chart.js-kompatibles `data`-Objekt übergeben.                                                                                                                                     |
| `BaseChip.vue`       | `Chip`                      | Chip, der aus einem Objekt `{value, labelField, imageField}` gerendert wird, mit optionaler Entfernen-Schaltfläche.                                                                                                     |
| `BaseTag.vue`        | `Tag`                       | Farbiges Beschriftungs-Tag. Ordnet Chamilos `warning` PrimeVues `warn` zu.                                                                                                                               |
| `BaseAvatarList.vue` | `Avatar` + `BaseUserAvatar` | Avatar-Zeile mit Überlaufzähler (z. B. „+3“); gesteuert über `useAvatarList`.                                                                                                                        |
| `BaseUserAvatar.vue` | `Avatar`                    | Benutzer-Avatar mit Bild-Fallback, Ladezustand und barrierefreiem Label.                                                                                                                           |
| `BaseIcon.vue`       | `<i class="mdi …">`         | Chamilo-Icon-Renderer. Fügt ein optionales Badge (Text oder Icon), Tooltip und Größenmodifikator hinzu. Immer einen semantischen Chamilo-Namen übergeben (z. B. `"edit"`), keine rohe MDI-Klasse.                             |
| `BaseIconField.vue`  | `IconField` + `InputText`   | Sucheingabe mit führendem Lupen-Icon.                                                                                                                                                     |
| `BaseDivider.vue`    | `Divider`                   | Horizontale oder vertikale Trennlinie, mit optionalem Titel und Ausrichtung.                                                                                                                              |

### Navigation & Menüs

| Component                  | Wraps                   | Purpose                                                                                                                                                                                 |
|----------------------------|-------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseMenu.vue`             | `Menu` (popup)          | Popup-Menü, das Router-Routen in `model[]`-Einträgen versteht.                                                                                                                       |
| `BaseDropdownMenu.vue`     | (custom)                | Leichtgewichtiges Dropdown-Trigger-Element mit Koordination für einzelnes Öffnen (das Öffnen eines Menüs schließt die anderen).                                                                                             |
| `BaseContextMenu.vue`      | (custom)                | Kontextmenü per Rechtsklick bzw. positioniert, gesteuert über `visible` + `position`.                                                                                                            |
| `BaseSidebarPanelMenu.vue` | `PanelMenu`             | Navigationsmenü im Akkordeon-Stil für Seitenleisten; verfolgt automatisch die aufgeklappten Schlüssel aus dem Modell.                                                                                             |
| `BaseRouteTabs.vue`        | `BaseAppLink` row       | Tab-Leiste, in der jeder Tab ein Router-Link ist. Der aktive Tab wird automatisch anhand der aktuellen Route hervorgehoben.                                                                        |
| `BaseAppLink.vue`          | `RouterLink` *or* `<a>` | Intelligenter Link: rendert ein `<a>`, wenn `url` gesetzt ist (extern/Legacy), andernfalls ein Vue-Router-`<RouterLink>`. Statt der jeweiligen Primitive verwenden, damit interne und externe Verlinkung einheitlich bleiben. |

### Dialogs

`BaseDialog` ist die Grundlage; die übrigen Komponenten setzen darauf auf, um die üblichen Bestätigen/Abbrechen- und Löschabläufe abzubilden.

| Component                     | Wraps                     | Purpose                                                                                                                             |
|-------------------------------|---------------------------|-------------------------------------------------------------------------------------------------------------------------------------|
| `BaseDialog.vue`              | `Dialog`                  | Modaler Dialog mit betiteltem Header (optional `headerIcon`) und eingeschobenem Body/Footer. Der Öffnungszustand ist ein `defineModel("isVisible")`.      |
| `BaseDialogConfirmCancel.vue` | `BaseDialog`              | Bestätigen/Abbrechen-Modal mit zwei Schaltflächen. Konfigurierbarer Bestätigen-`type` (Schweregrad) und `icon`; emittiert `confirmClicked` / `cancelClicked`. |
| `BaseDialogDelete.vue`        | `BaseDialogConfirmCancel` | Vorgefertigtes Modal „Sind Sie sicher, dass Sie dieses Element löschen möchten?“ mit einer danger-gestylten Bestätigen-Schaltfläche.                                   |

### Editor & rich content

| Component            | Wraps                                           | Purpose                                                                                                                                                              |
|----------------------|-------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTinyEditor.vue` | TinyMCE (via the project's `components/Editor`) | Rich-Text-Editor mit `FloatLabel`, Nachverfolgung von Fokus-/Leerzustand und Integration in den aktuellen Kurskontext (`cidReq`). Verwenden Sie ihn für jedes von Nutzern verfasste HTML-Feld. |

### Helpers

| File              | Purpose                                                                                                                                                                                                                                                          |
|-------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `ChamiloIcons.js` | Ordnet semantische Icon-Namen (`edit`, `delete`, `eye-on`, `courses`, …) MDI-CSS-Klassen zu. Ca. 127 Einträge. Durchsuchen Sie sie unter `/admin/list-icons` auf einer laufenden Instanz.                                                                                                  |
| `validators.js`   | Gemeinsame Prop-Validatoren: `iconValidator` (muss ein bekannter Chamilo-Icon-Name sein), `sizeValidator` (`normal` / `small` / `large`), `buttonTypeValidator` (zulässige `BaseButton`-Typen). Importieren Sie sie, wenn Sie neue `Base*`-Komponenten definieren, die diese Konventionen nachbilden. |

### Conventions across Base components

* **v-model via `defineModel()`** — value (und häufig `isVisible`, `filters`, `selectedItems`) werden als Models bereitgestellt; übergeben Sie sie mit `v-model[:name]` statt `:prop` + `@update:prop`.
* **Floating labels** — die meisten Formularfelder umschließen ihre Eingabe in PrimeVue `FloatLabel variant="on"`. Geben Sie `label` (den angezeigten Text) und `id` (zum Binden von `<label for>`) an.
* **Validation messages** — Felder stellen `isInvalid` und eine kleine Meldung unter der Eingabe bereit (`errorText`, `messageText` oder `smallText` je nach Komponente). Für die gängigsten Varianten gibt es Vuelidate-fähige Versionen.
* **Icons** — übergeben Sie semantische Chamilo-Namen, keine rohen MDI-Klassen. Die Komponenten lösen sie über `chamiloIconToClass` auf.
* **Sizing** — `size="normal" | "small" | "large"` ist die übliche Größen-Prop (siehe `sizeValidator`).
* **Composition over duplication** — `BaseDialogDelete` umschließt `BaseDialogConfirmCancel`, das `BaseDialog` umschließt; `BaseToggleButton` und `BaseAdvancedSettingsButton` umschließen `BaseButton`. Wenn Sie eine wiederkehrende Variante einer bestehenden Komponente benötigen, bevorzugen Sie das Zusammensetzen einer neuen `Base*` darüber, statt sie in einem Feature-Ordner neu zu implementieren.

## Layout Components

Located in `components/layout/`:

| Component | Purpose |
|-----------|---------|
| `DashboardLayout.vue` | Hauptlayout: Topbar + Sidebar + Inhaltsbereich |
| `Sidebar.vue` | Linkes Navigationspanel (einklappbar) |
| `TopbarLoggedIn.vue` | Obere Leiste mit Logo, Posteingang, Avatar |

## Komponenten nach Funktionsbereich

| Verzeichnis | Komponenten | Zweck |
|-----------|-----------|---------|
| `course/` | Kurskarten, Katalogfilter, Kursformulare | Kursauflistung und -verwaltung |
| `session/` | Sitzungskarten, Katalog | Sitzungsauflistung |
| `assignments/` | Abgabelisten, Bewertungsmodale, Formulare | Aufgaben-Workflow |
| `chat/` | DockedChat, Chat-Nachrichten | Echtzeit-Chat und KI-Tutor |
| `filemanager/` | CourseDocuments, PersonalFiles | Dateibrowser und -verwaltung |
| `installer/` | Step1-Step7, EmailSettings | Installationsassistent |
| `social/` | GroupInfoCard, soziale Beiträge | Funktionen des sozialen Netzwerks |
| `attendance/` | AttendanceTable | Anwesenheitserfassung |
| `usergroup/` | GroupMembers | Verwaltung von Benutzergruppen |

## Icon-System

Icons verwenden **Material Design Icons (MDI)** als einzige Icon-Bibliothek: `<i class="mdi mdi-pencil"></i>`

Die Datei `ChamiloIcons.js` stellt eine semantische Zuordnung bereit:

```javascript
export const chamiloIconToClass = {
  "edit": "mdi mdi-pencil",
  "delete": "mdi mdi-delete",
  "eye-on": "mdi mdi-eye",
  "courses": "mdi mdi-book-open-page-variant",
  // ... 127 mappings
}
```

Komponenten nutzen `BaseIcon` oder greifen auf `chamiloIconToClass` zurück, um Icons einheitlich darzustellen.

Eine durchsuchbare Referenz aller in der Plattform verfügbaren Icons finden Sie unter `/admin/list-icons` in jeder laufenden Chamilo-Instanz.

## Komponentenmuster

* **Composition API** — Komponenten verwenden die Vue-3-Syntax `<script setup>`
* **PrimeVue-Integration** — intensive Nutzung von PrimeVue-Komponenten (Button, DataTable, Dialog, Menu usw.)
* **Axios für API-Aufrufe** — HTTP-Anfragen an die Backend-API
* **Vue I18n** — sämtlicher benutzerseitiger Text verwendet Übersetzungsschlüssel