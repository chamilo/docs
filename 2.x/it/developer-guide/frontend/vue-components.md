# Componenti Vue

Chamilo dispone di un ampio set di componenti Vue organizzati per area di funzionalità in `assets/vue/components/`.

## Componenti di Base

La famiglia `Base*` in `assets/vue/components/basecomponents/` avvolge i primitivi di PrimeVue con impostazioni predefinite specifiche di Chamilo (layout FloatLabel, icone MDI tramite `chamiloIconToClass`, messaggi di validazione coerenti, dimensionamento Tailwind). Utilizza sempre un componente `Base*` prima di importare il corrispondente componente PrimeVue sottostante — questo è il modo in cui l'interfaccia utente rimane coerente attraverso la SPA e in cui le modifiche al design possono essere implementate da un unico punto.

I componenti **non** sono registrati globalmente (l'unico primitivo PrimeVue registrato globalmente è `Column`, utilizzato all'interno di `BaseTable`). Importa ciascuno esplicitamente:

```js
import BaseButton from "@/components/basecomponents/BaseButton.vue"
import BaseDialog from "@/components/basecomponents/BaseDialog.vue"
```

---
### Input per moduli

La maggior parte accetta il valore tramite `v-model`, espone le proprietà `id` e `label` per l'accessibilità e l'associazione con etichette flottanti, e gestisce la validazione tramite una coppia `isInvalid` / `errorText` (o `messageText`).

| Componente                        | Incapsula                                            | Scopo                                                                                                                                                                                            |
|-----------------------------------|------------------------------------------------------|--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseInputText.vue`               | `InputText` + `FloatLabel`                           | Input di testo a riga singola. Passa a un'etichetta statica per input di tipo `date`/`time`/`datetime-local` (dove l'etichetta flottante sovrapporrebbe il placeholder nativo).                 |
| `BaseInputTextWithVuelidate.vue`  | `BaseInputText`                                      | Adattatore sottile per Vuelidate: inoltra `$error` a `isInvalid` e rende `$errors[].$message` nello slot `errors`. Abbinalo a un oggetto campo di Vuelidate.                                    |
| `BaseTextArea.vue`                | `Textarea` + `FloatLabel`                            | Input di testo multilinea.                                                                                                                                                                       |
| `BaseTextAreaWithVuelidate.vue`   | `BaseTextArea`                                       | Stesso modello di adattatore Vuelidate di `BaseInputTextWithVuelidate`.                                                                                                                          |
| `BaseInputNumber.vue`             | `InputNumber`                                        | Input numerico con `min` / `max` / `step` e pulsanti spinner.                                                                                                                                    |
| `BaseInputTags.vue`               | (personalizzato)                                     | Chip di tag di testo libero; i tag vengono aggiunti con invio/virgola e rimossi con backspace.                                                                                                  |
| `BaseInputGroup.vue`              | `InputGroup` + `BaseButton`                          | Input di testo abbinato a un pulsante di azione (stile ricerca).                                                                                                                                 |
| `BaseCheckbox.vue`                | `Checkbox`                                           | Casella di controllo binaria o legata a un valore con etichetta.                                                                                                                                 |
| `BaseRadioButtons.vue`            | `RadioButton`                                        | Gruppo di pulsanti radio guidati da un array `options: [{label, value}]`.                                                                                                                        |
| `BaseToggleButton.vue`            | `BaseButton`                                         | Pulsante a due stati (etichette e icone on/off) legato tramite `v-model`.                                                                                                                        |
| `BaseCalendar.vue`                | `DatePicker` + `FloatLabel`                          | Selettore di data/ora. Rispetta `platform.timepicker_increment` e la lingua dell'utente tramite `calendarLocales`.                                                                              |
| `BaseColorPicker.vue`             | nativo `<input type="color">` + `InputText`          | Selettore di colore con fallback di testo esadecimale; utilizza `colorjs.io` per validare l'input manuale esadecimale.                                                                          |
| `BaseRating.vue`                  | `Rating`                                             | Input di valutazione a stelle.                                                                                                                                                                   |
| `BaseFileUpload.vue`              | nativo `<input type="file">` + `BaseButton`          | Selettore di singolo file che attiva un pulsante in stile allegato.                                                                                                                              |
| `BaseFileUploadMultiple.vue`      | nativo `<input type="file" multiple>` + `BaseButton` | Variante multi-file di `BaseFileUpload`.                                                                                                                                                         |
| `BaseUploader.vue`                | Uppy `Dashboard`                                     | Caricatore completo Uppy (webcam, audio, editor di immagini, upload XHR) con localizzazioni collegate al corrente `appLocale`. Usalo per upload ricchi con progresso; usa `BaseFileUpload*` per allegati semplici. |

---
### Selezione e completamento automatico

| Componente              | Incapsula                    | Scopo                                                                                                                             |
|-------------------------|------------------------------|-----------------------------------------------------------------------------------------------------------------------------------|
| `BaseSelect.vue`        | `Dropdown` + `FloatLabel`    | Menu a tendina per scelta singola con pulsante di cancellazione opzionale.                                                       |
| `BaseMultiSelect.vue`   | `MultiSelect` + `FloatLabel` | Menu a tendina per scelta multipla che mostra gli elementi selezionati come chip.                                                |
| `BaseSearchSelect.vue`  | `Dropdown` con `filter`      | Menu a tendina per scelta singola con casella di ricerca integrata, scorrimento virtuale opzionale e modello di opzione a due righe (`label` + `sublabel`). |
| `BaseAutocomplete.vue`  | `AutoComplete`               | Completamento automatico asincrono (minimo 3 caratteri). Supporta selezione singola o multipla e uno slot `chip` per personalizzare i chip. |
| `BaseUserFinder.vue`    | `BaseTable` + `userService`  | Tabella di ricerca utenti paginata con selezione delle righe. Utilizzabile quando una funzionalità richiede un selettore di utenti in stile amministratore. |

### Pulsanti e azioni

| Componente                        | Incapsula           | Scopo                                                                                                                                                                                                                                                                                                                                                     |
|-----------------------------------|---------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseButton.vue`                  | `Button` (PrimeVue) | Pulsante standard di Chamilo. Risolve le icone tramite `chamiloIconToClass`, normalizza `type` in `severity`/`variant` di PrimeVue, rende un `BaseAppLink` interno quando viene fornito un `route` o `toUrl` (quindi lo stesso componente gestisce i casi di router-link, anchor e pulsante semplice). I valori accettati per `type` sono elencati in `validators.js` → `buttonTypeValidator`. |
| `BaseAdvancedSettingsButton.vue`  | `BaseButton`        | Pulsante di раскрытие che attiva/disattiva un pannello di "impostazioni avanzate" tramite `v-model`.                                                                                                                                                                                                                                                       |
| `BaseToolbar.vue`                 | `Toolbar`           | Barra degli strumenti per azioni con slot `start` / `end` (o un singolo slot predefinito). Opzione `showTopBorder` per lo stile del separatore.                                                                                                                                                                                                             |

---
### Visualizzazione e dati

| Componente            | Incapsula                   | Scopo                                                                                                                                                                                         |
|-----------------------|-----------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTable.vue`       | `DataTable` (PrimeVue)      | Tabella dati standard di Chamilo. Supporta la modalità lato server (`lazy`), ordinamento multi-colonna, filtro globale, selezione delle righe e paginazione. Passa le colonne come figli di `<Column>` (registrati globalmente). |
| `BaseCard.vue`        | `Card`                      | Wrapper per card che inoltra gli slot `header`, `title`, `subtitle`, `footer` e default (contenuto).                                                                                           |
| `BaseChart.vue`       | `Chart`                     | Preset per grafico a torta. Passa un oggetto `data` compatibile con Chart.js.                                                                                                                  |
| `BaseChip.vue`        | `Chip`                      | Chip renderizzato da un oggetto `{value, labelField, imageField}`, con pulsante di rimozione opzionale.                                                                                        |
| `BaseTag.vue`         | `Tag`                       | Etichetta colorata. Mappa il `warning` di Chamilo al `warn` di PrimeVue.                                                                                                                      |
| `BaseAvatarList.vue`  | `Avatar` + `BaseUserAvatar` | Riga di avatar con contatore di overflow (ad esempio "+3"); guidato da `useAvatarList`.                                                                                                       |
| `BaseUserAvatar.vue`  | `Avatar`                    | Avatar utente con immagine di fallback, stato di caricamento ed etichetta accessibile.                                                                                                        |
| `BaseIcon.vue`        | `<i class="mdi …">`         | Renderer di icone di Chamilo. Aggiunge un badge opzionale (testo o icona), tooltip e modificatore di dimensione. Passa sempre un nome semantico di Chamilo (ad esempio `"edit"`), non una classe MDI diretta. |
| `BaseIconField.vue`   | `IconField` + `InputText`   | Campo di ricerca con icona di lente d'ingrandimento iniziale.                                                                                                                                  |
| `BaseDivider.vue`     | `Divider`                   | Divisore orizzontale o verticale, con titolo opzionale e allineamento.                                                                                                                        |

### Navigazione e menu

| Componente                 | Incapsula               | Scopo                                                                                                                                                                                 |
|----------------------------|-------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseMenu.vue`             | `Menu` (popup)          | Menu popup che riconosce le rotte del router all'interno degli elementi `model[]`.                                                                                                     |
| `BaseDropdownMenu.vue`     | (personalizzato)        | Trigger dropdown leggero con coordinamento di apertura singola (l'apertura di uno chiude gli altri).                                                                                   |
| `BaseContextMenu.vue`      | (personalizzato)        | Menu contestuale con clic destro / posizionato, controllato da `visible` + `position`.                                                                                                |
| `BaseSidebarPanelMenu.vue` | `PanelMenu`             | Menu di navigazione stile fisarmonica utilizzato nelle barre laterali; tiene traccia automaticamente delle chiavi espanse dal modello.                                                  |
| `BaseRouteTabs.vue`        | `BaseAppLink` riga      | Barra delle schede in cui ogni scheda è un collegamento del router. La scheda attiva viene evidenziata automaticamente in base alla rotta corrente.                                   |
| `BaseAppLink.vue`          | `RouterLink` *o* `<a>`  | Collegamento intelligente: rende un `<a>` quando `url` è impostato (esterno/legacy), altrimenti un `<RouterLink>` di Vue Router. Usalo al posto di entrambi i primitivi per uniformare i collegamenti interni/esterni. |

---
### Dialoghi

`BaseDialog` è la base; gli altri si compongono sopra di esso per i flussi comuni di conferma/annullamento ed eliminazione.

| Componente                     | Incapsula                 | Scopo                                                                                                                               |
|-------------------------------|---------------------------|-------------------------------------------------------------------------------------------------------------------------------------|
| `BaseDialog.vue`              | `Dialog`                  | Dialogo modale con un'intestazione titolata (icona opzionale `headerIcon`) e corpo/piè di pagina inseriti tramite slot. Lo stato di apertura è un `defineModel("isVisible")`. |
| `BaseDialogConfirmCancel.vue` | `BaseDialog`              | Modale di conferma/annullamento con due pulsanti. Tipo di conferma configurabile (`type`, gravità) e `icon`; emette `confirmClicked` / `cancelClicked`. |
| `BaseDialogDelete.vue`        | `BaseDialogConfirmCancel` | Modale predefinito "Sei sicuro di voler eliminare questo elemento?" con un pulsante di conferma stilizzato come pericoloso.         |

### Editor e contenuti ricchi

| Componente            | Incapsula                                       | Scopo                                                                                                                                                              |
|----------------------|-------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTinyEditor.vue` | TinyMCE (tramite `components/Editor` del progetto) | Editor di testo ricco con `FloatLabel`, monitoraggio dello stato di focus/vuoto e integrazione con il contesto del corso corrente (`cidReq`). Usalo per qualsiasi campo HTML creato dall'utente. |

### Aiuti

| File              | Scopo                                                                                                                                                                                                                                                          |
|-------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `ChamiloIcons.js` | Mappa nomi di icone semantiche (`edit`, `delete`, `eye-on`, `courses`, …) a classi CSS MDI. Circa 127 voci. Sfogliale su `/admin/list-icons` su un'istanza in esecuzione.                                                                                     |
| `validators.js`   | Validatori di proprietà condivisi: `iconValidator` (deve essere un nome di icona Chamilo noto), `sizeValidator` (`normal` / `small` / `large`), `buttonTypeValidator` (tipi consentiti di `BaseButton`). Importali quando definisci nuovi componenti `Base*` che seguono queste convenzioni. |

### Convenzioni nei componenti Base

* **v-model tramite `defineModel()`** — il valore (e spesso `isVisible`, `filters`, `selectedItems`) sono esposti come modelli; passali con `v-model[:name]` anziché `:prop` + `@update:prop`.
* **Etichette flottanti** — la maggior parte dei campi di modulo avvolge l'input in PrimeVue `FloatLabel variant="on"`. Fornisci `label` (il testo visualizzato) e `id` (usato per associare il `<label for>`).
* **Messaggi di validazione** — i campi espongono `isInvalid` e un piccolo messaggio sotto l'input (`errorText`, `messageText` o `smallText` a seconda del componente). Esistono varianti compatibili con Vuelidate per i casi più comuni.
* **Icone** — passa nomi semantici di Chamilo, non classi MDI grezze. I componenti le risolvono tramite `chamiloIconToClass`.
* **Dimensionamento** — `size="normal" | "small" | "large"` è la proprietà convenzionale per il dimensionamento (vedi `sizeValidator`).
* **Composizione anziché duplicazione** — `BaseDialogDelete` incapsula `BaseDialogConfirmCancel`, che a sua volta incapsula `BaseDialog`; `BaseToggleButton` e `BaseAdvancedSettingsButton` incapsulano `BaseButton`. Quando hai bisogno di una variante ricorrente di un componente esistente, preferisci comporre un nuovo `Base*` sopra anziché reimplementarlo in una cartella di funzionalità.

## Componenti di Layout

Situati in `components/layout/`:

| Componente | Scopo |
|-----------|---------|
| `DashboardLayout.vue` | Layout principale: barra superiore + barra laterale + area contenuti |
| `Sidebar.vue` | Pannello di navigazione sinistro (collassabile) |
| `TopbarLoggedIn.vue` | Barra superiore con logo, inbox, avatar |

## Componenti dell'Area Funzionale

| Directory | Componenti | Scopo |
|-----------|------------|-------|
| `course/` | Schede dei corsi, filtri del catalogo, moduli dei corsi | Elenco e gestione dei corsi |
| `session/` | Schede delle sessioni, catalogo | Elenco delle sessioni |
| `assignments/` | Elenchi di consegne, modal di valutazione, moduli | Flusso di lavoro degli incarichi |
| `chat/` | DockedChat, messaggi di chat | Chat in tempo reale e tutor AI |
| `filemanager/` | CourseDocuments, PersonalFiles | Browser e gestione dei file |
| `installer/` | Step1-Step7, EmailSettings | Procedura guidata di installazione |
| `social/` | GroupInfoCard, post sociali | Funzionalità di rete sociale |
| `attendance/` | AttendanceTable | Monitoraggio delle presenze |
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

I componenti utilizzano `BaseIcon` o fanno riferimento a `chamiloIconToClass` per rendere le icone in modo coerente.

Un riferimento navigabile di tutte le icone disponibili nella piattaforma può essere trovato su `/admin/list-icons` in qualsiasi istanza di Chamilo in esecuzione.

## Modelli di Componenti

* **Composition API** — I componenti utilizzano la sintassi `<script setup>` di Vue 3
* **Integrazione con PrimeVue** — Ampio utilizzo di componenti PrimeVue (Button, DataTable, Dialog, Menu, ecc.)
* **Axios per chiamate API** — Richieste HTTP all'API di backend
* **Vue I18n** — Tutto il testo visibile agli utenti utilizza chiavi di traduzione