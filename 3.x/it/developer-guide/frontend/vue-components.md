# Componenti Vue

Chamilo dispone di un ampio insieme di componenti Vue organizzati per area funzionale in `assets/vue/components/`.

## Componenti Base

La famiglia `Base*` in `assets/vue/components/basecomponents/` avvolge i primitivi PrimeVue con impostazioni predefinite specifiche di Chamilo (layout FloatLabel, icone MDI tramite `chamiloIconToClass`, messaggi di validazione coerenti, dimensionamento Tailwind). Utilizzare sempre un componente `Base*` prima di importare il primitivo PrimeVue sottostante: è così che l'interfaccia resta coerente in tutta la SPA e che le modifiche di design possono essere applicate da un unico punto.

I componenti **non** sono registrati globalmente (l'unico primitivo PrimeVue registrato globalmente è `Column`, usato all'interno di `BaseTable`). Importare ciascuno esplicitamente:

```js
import BaseButton from "@/components/basecomponents/BaseButton.vue"
import BaseDialog from "@/components/basecomponents/BaseDialog.vue"
```

### Campi di input dei form

La maggior parte accetta il valore tramite `v-model`, espone le props `id` + `label` per l'accessibilità e il binding della floating-label, e rende visibile la validazione tramite la coppia `isInvalid` / `errorText` (o `messageText`).

| Component                        | Wraps                                                | Purpose                                                                                                                                                                                            |
|----------------------------------|------------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseInputText.vue`              | `InputText` + `FloatLabel`                           | Campo di testo a riga singola. Passa a un'etichetta statica per gli input `date`/`time`/`datetime-local` (dove la floating label si sovrapporrebbe al placeholder nativo).                                      |
| `BaseInputTextWithVuelidate.vue` | `BaseInputText`                                      | Adattatore Vuelidate sottile: inoltra `$error` a `isInvalid` e rende `$errors[].$message` nello slot `errors`. Abbinarlo a un oggetto campo Vuelidate.                                             |
| `BaseTextArea.vue`               | `Textarea` + `FloatLabel`                            | Campo di testo multilinea.                                                                                                                                                                             |
| `BaseTextAreaWithVuelidate.vue`  | `BaseTextArea`                                       | Stesso schema di adattatore Vuelidate di `BaseInputTextWithVuelidate`.                                                                                                                                    |
| `BaseInputNumber.vue`            | `InputNumber`                                        | Campo numerico con `min` / `max` / `step` e pulsanti spinner.                                                                                                                                     |
| `BaseInputTags.vue`              | (custom)                                             | Chip di tag a testo libero; i tag vengono aggiunti con Invio/virgola e rimossi con Backspace.                                                                                                                       |
| `BaseInputGroup.vue`             | `InputGroup` + `BaseButton`                          | Campo di testo abbinato a un pulsante di azione (stile ricerca).                                                                                                                                            |
| `BaseCheckbox.vue`               | `Checkbox`                                           | Checkbox binaria o vincolata a un valore, con etichetta.                                                                                                                                                         |
| `BaseRadioButtons.vue`           | `RadioButton`                                        | Gruppo di radio button guidato da un array `options: [{label, value}]`.                                                                                                                             |
| `BaseToggleButton.vue`           | `BaseButton`                                         | Pulsante a due stati (etichette e icone on / off) vincolato tramite `v-model`.                                                                                                                              |
| `BaseCalendar.vue`               | `DatePicker` + `FloatLabel`                          | Selettore di data / data-ora. Rispetta `platform.timepicker_increment` e la locale dell'utente tramite `calendarLocales`.                                                                                       |
| `BaseColorPicker.vue`            | native `<input type="color">` + `InputText`          | Selettore colore con fallback testuale esadecimale; usa `colorjs.io` per validare l'input esadecimale manuale.                                                                                                               |
| `BaseRating.vue`                 | `Rating`                                             | Campo di valutazione a stelle.                                                                                                                                                                                 |
| `BaseFileUpload.vue`             | native `<input type="file">` + `BaseButton`          | Selettore di file singolo che attiva un pulsante in stile allegato.                                                                                                                                       |
| `BaseFileUploadMultiple.vue`     | native `<input type="file" multiple>` + `BaseButton` | Variante multifile di `BaseFileUpload`.                                                                                                                                                            |
| `BaseUploader.vue`               | Uppy `Dashboard`                                     | Uploader Uppy completo (webcam, audio, editor di immagini, upload XHR) con le locale collegate all'`appLocale` corrente. Usarlo per upload avanzati con avanzamento; usare `BaseFileUpload*` per allegati semplici. |

### Selezione e autocompletamento

| Component              | Wraps                        | Purpose                                                                                                                           |
|------------------------|------------------------------|-----------------------------------------------------------------------------------------------------------------------------------|
| `BaseSelect.vue`       | `Dropdown` + `FloatLabel`    | Menu a discesa a scelta singola con pulsante di cancellazione opzionale.                                                                                |
| `BaseMultiSelect.vue`  | `MultiSelect` + `FloatLabel` | Menu a discesa a scelta multipla che mostra gli elementi selezionati come chip.                                                                      |
| `BaseSearchSelect.vue` | `Dropdown` with `filter`     | Menu a discesa a scelta singola con casella di ricerca integrata, scorrimento virtuale opzionale e modello di opzione su due righe (`label` + `sublabel`). |
| `BaseAutocomplete.vue` | `AutoComplete`               | Autocompletamento asincrono (minimo 3 caratteri). Supporta la selezione singola o multipla e uno slot `chip` per personalizzare i chip.                  |
| `BaseUserFinder.vue`   | `BaseTable` + `userService`  | Tabella di ricerca utenti paginata con selezione delle righe. Usarla quando una funzionalità richiede un selettore utenti in stile amministrativo.                           |

### Pulsanti e azioni

| Component                        | Wraps               | Purpose                                                                                                                                                                                                                                                                                                                                                     |
|----------------------------------|---------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseButton.vue`                 | `Button` (PrimeVue) | Pulsante standard di Chamilo. Risolve le icone tramite `chamiloIconToClass`, normalizza `type` in `severity`/`variant` di PrimeVue, renderizza un `BaseAppLink` interno quando è fornito un `route` o `toUrl` (così lo stesso componente gestisce i casi di router-link, ancoraggio e pulsante semplice). I valori accettati di `type` sono elencati in `validators.js` → `buttonTypeValidator`. |
| `BaseAdvancedSettingsButton.vue` | `BaseButton`        | Pulsante di disclosure che attiva/disattiva un pannello slotted di "impostazioni avanzate" tramite `v-model`.                                                                                                                                                                                                                                                                           |
| `BaseToolbar.vue`                | `Toolbar`           | Barra degli strumenti di azione con slot `start` / `end` (oppure un unico slot predefinito). `showTopBorder` opzionale per lo stile del separatore.                                                                                                                                                                                                                                       |

### Visualizzazione e dati

| Component            | Wraps                       | Purpose                                                                                                                                                                                         |
|----------------------|-----------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTable.vue`      | `DataTable` (PrimeVue)      | Tabella dati standard di Chamilo. Supporta la modalità lato server (`lazy`), l’ordinamento su più colonne, il filtro globale, la selezione delle righe e la paginazione. Passare le colonne come figli `<Column>` (registrati globalmente). |
| `BaseCard.vue`       | `Card`                      | Wrapper di card che inoltra gli slot `header`, `title`, `subtitle`, `footer` e quello predefinito (contenuto).                                                                                                |
| `BaseChart.vue`      | `Chart`                     | Preset per grafici a torta. Passare un oggetto `data` compatibile con Chart.js.                                                                                                                                     |
| `BaseChip.vue`       | `Chip`                      | Chip reso a partire da un oggetto `{value, labelField, imageField}`, con pulsante di rimozione opzionale.                                                                                                     |
| `BaseTag.vue`        | `Tag`                       | Etichetta colorata. Mappa il `warning` di Chamilo sul `warn` di PrimeVue.                                                                                                                               |
| `BaseAvatarList.vue` | `Avatar` + `BaseUserAvatar` | Riga di avatar con contatore di overflow (ad es. "+3"); guidata da `useAvatarList`.                                                                                                                        |
| `BaseUserAvatar.vue` | `Avatar`                    | Avatar utente con fallback dell’immagine, stato di caricamento ed etichetta accessibile.                                                                                                                           |
| `BaseIcon.vue`       | `<i class="mdi …">`         | Renderer di icone Chamilo. Aggiunge un badge opzionale (testo o icona), un tooltip e un modificatore di dimensione. Passare sempre un nome semantico Chamilo (ad es. `"edit"`), non una classe MDI grezza.                             |
| `BaseIconField.vue`  | `IconField` + `InputText`   | Campo di ricerca con icona della lente in testa.                                                                                                                                                     |
| `BaseDivider.vue`    | `Divider`                   | Separatore orizzontale o verticale, con titolo e allineamento opzionali.                                                                                                                              |

### Navigazione e menu

| Component                  | Wraps                   | Purpose                                                                                                                                                                                 |
|----------------------------|-------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseMenu.vue`             | `Menu` (popup)          | Menu a comparsa che interpreta le route del router all’interno degli elementi di `model[]`.                                                                                                                       |
| `BaseDropdownMenu.vue`     | (custom)                | Trigger di dropdown leggero con coordinamento a apertura singola (aprirne uno chiude gli altri).                                                                                             |
| `BaseContextMenu.vue`      | (custom)                | Menu contestuale al clic destro / posizionato, controllato da `visible` + `position`.                                                                                                            |
| `BaseSidebarPanelMenu.vue` | `PanelMenu`             | Menu di navigazione in stile accordion usato nelle barre laterali; tiene traccia automaticamente delle chiavi espanse a partire dal model.                                                                                             |
| `BaseRouteTabs.vue`        | `BaseAppLink` row       | Barra di schede in cui ogni scheda è un collegamento del router. La scheda attiva viene evidenziata automaticamente in base alla route corrente.                                                                        |
| `BaseAppLink.vue`          | `RouterLink` *or* `<a>` | Collegamento intelligente: rende un `<a>` quando è impostato `url` (esterno/legacy), altrimenti un `<RouterLink>` di Vue Router. Usarlo al posto di entrambi i primitivi così i collegamenti interni/esterni restano uniformi. |

### Dialoghi

`BaseDialog` è la base; gli altri si compongono su di esso per i flussi comuni di conferma/annullamento ed eliminazione.

| Component                     | Wraps                     | Purpose                                                                                                                             |
|-------------------------------|---------------------------|-------------------------------------------------------------------------------------------------------------------------------------|
| `BaseDialog.vue`              | `Dialog`                  | Finestra di dialogo modale con intestazione titolata (`headerIcon` opzionale) e corpo/piè di pagina tramite slot. Lo stato di apertura è un `defineModel("isVisible")`.      |
| `BaseDialogConfirmCancel.vue` | `BaseDialog`              | Modale di conferma/annullamento con due pulsanti. `type` (severity) e `icon` di conferma configurabili; emette `confirmClicked` / `cancelClicked`. |
| `BaseDialogDelete.vue`        | `BaseDialogConfirmCancel` | Modale predefinita «Sei sicuro di voler eliminare questo elemento?» con pulsante di conferma in stile danger.                                   |

### Editor e contenuti ricchi

| Component            | Wraps                                           | Purpose                                                                                                                                                              |
|----------------------|-------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTinyEditor.vue` | TinyMCE (via the project's `components/Editor`) | Editor di testo ricco con `FloatLabel`, tracciamento dello stato di focus/vuoto e integrazione con il contesto del corso corrente (`cidReq`). Usarlo per qualsiasi campo HTML redatto dall'utente. |

### Helper

| File              | Purpose                                                                                                                                                                                                                                                          |
|-------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `ChamiloIcons.js` | Mappa i nomi semantici delle icone (`edit`, `delete`, `eye-on`, `courses`, …) alle classi CSS MDI. Circa 127 voci. Consultarle su `/admin/list-icons` in un'istanza in esecuzione.                                                                                                  |
| `validators.js`   | Validatori di prop condivisi: `iconValidator` (deve essere un nome di icona Chamilo noto), `sizeValidator` (`normal` / `small` / `large`), `buttonTypeValidator` (tipi `BaseButton` consentiti). Importarli quando si definiscono nuovi componenti `Base*` che rispecchiano queste convenzioni. |

### Convenzioni tra i componenti Base

* **v-model tramite `defineModel()`** — il valore (e di frequente `isVisible`, `filters`, `selectedItems`) è esposto come model; passarli con `v-model[:name]` anziché `:prop` + `@update:prop`.
* **Etichette flottanti** — la maggior parte dei campi modulo avvolge l'input in PrimeVue `FloatLabel variant="on"`. Fornire `label` (il testo visualizzato) e `id` (usato per associare il `<label for>`).
* **Messaggi di validazione** — i campi espongono `isInvalid` e un piccolo messaggio sotto l'input (`errorText`, `messageText` o `smallText` a seconda del componente). Esistono varianti consapevoli di Vuelidate per i più comuni.
* **Icone** — passare i nomi semantici Chamilo, non le classi MDI grezze. I componenti le risolvono tramite `chamiloIconToClass`.
* **Dimensionamento** — `size="normal" | "small" | "large"` è la prop di dimensionamento convenzionale (vedere `sizeValidator`).
* **Composizione invece della duplicazione** — `BaseDialogDelete` avvolge `BaseDialogConfirmCancel`, che avvolge `BaseDialog`; `BaseToggleButton` e `BaseAdvancedSettingsButton` avvolgono `BaseButton`. Quando serve una variante ricorrente di un componente esistente, preferire la composizione di un nuovo `Base*` piuttosto che reimplementarlo in una cartella di funzionalità.

## Componenti di layout

Situati in `components/layout/`:

| Component | Purpose |
|-----------|---------|
| `DashboardLayout.vue` | Layout principale: barra superiore + barra laterale + area contenuto |
| `Sidebar.vue` | Pannello di navigazione sinistro (comprimibile) |
| `TopbarLoggedIn.vue` | Barra superiore con logo, casella di posta, avatar |

## Componenti per Area Funzionale

| Directory | Componenti | Scopo |
|-----------|-----------|---------|
| `course/` | Course cards, catalog filters, course forms | Elenco e gestione dei corsi |
| `session/` | Session cards, catalog | Elenco delle sessioni |
| `assignments/` | Submission lists, grading modals, forms | Flusso di lavoro dei compiti |
| `chat/` | DockedChat, chat messages | Chat in tempo reale e tutor IA |
| `filemanager/` | CourseDocuments, PersonalFiles | Esplorazione e gestione dei file |
| `installer/` | Step1-Step7, EmailSettings | Procedura guidata di installazione |
| `social/` | GroupInfoCard, social posts | Funzionalità di rete sociale |
| `attendance/` | AttendanceTable | Rilevazione delle presenze |
| `usergroup/` | GroupMembers | Gestione dei gruppi di utenti |

## Sistema di Icone

Le icone utilizzano **Material Design Icons (MDI)** come unica libreria di icone: `<i class="mdi mdi-pencil"></i>`

Il file `ChamiloIcons.js` fornisce una mappatura semantica:

```javascript
export const chamiloIconToClass = {
  "edit": "mdi mdi-pencil",
  "delete": "mdi mdi-delete",
  "eye-on": "mdi mdi-eye",
  "courses": "mdi mdi-book-open-page-variant",
  // ... 127 mappings
}
```

I componenti utilizzano `BaseIcon` o fanno riferimento a `chamiloIconToClass` per visualizzare le icone in modo coerente.

Un riferimento consultabile di tutte le icone disponibili nella piattaforma si trova all'indirizzo `/admin/list-icons` in qualsiasi istanza Chamilo in esecuzione.

## Pattern dei Componenti

* **Composition API** — I componenti utilizzano la sintassi `<script setup>` di Vue 3
* **Integrazione PrimeVue** — Ampio utilizzo di componenti PrimeVue (Button, DataTable, Dialog, Menu, ecc.)
* **Axios per le chiamate API** — Richieste HTTP verso l'API del backend
* **Vue I18n** — Tutto il testo visibile all'utente utilizza chiavi di traduzione