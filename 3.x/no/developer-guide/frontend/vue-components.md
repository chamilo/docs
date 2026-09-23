# Vue-komponenter

Chamilo har et stort sett Vue-komponenter organisert etter funksjonsområde i `assets/vue/components/`.

## Base-komponenter

Familien `Base*` i `assets/vue/components/basecomponents/` pakker inn PrimeVue-primitiver med Chamilo-spesifikke standarder (FloatLabel-layout, MDI-ikoner via `chamiloIconToClass`, konsistente valideringsmeldinger, Tailwind-størrelser). Bruk alltid en `Base*`-komponent før du importerer den underliggende PrimeVue-komponenten — slik forblir brukergrensesnittet konsistent på tvers av SPA-en, og designendringer kan rulles ut fra ett sted.

Komponenter er **ikke** globalt registrert (den eneste globalt registrerte PrimeVue-primitiven er `Column`, brukt inne i `BaseTable`). Importer hver enkelt eksplisitt:

```js
import BaseButton from "@/components/basecomponents/BaseButton.vue"
import BaseDialog from "@/components/basecomponents/BaseDialog.vue"
```

### Skjemainndata

De fleste tar imot verdien via `v-model`, eksponerer `id` + `label`-props for tilgjengelighet/binding av flytende etikett, og viser validering gjennom et par av `isInvalid` / `errorText` (eller `messageText`).

| Komponent                        | Omslutter                                            | Formål                                                                                                                                                                                             |
|----------------------------------|------------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseInputText.vue`              | `InputText` + `FloatLabel`                           | Enlinjet tekstfelt. Bytter til statisk etikett for `date`/`time`/`datetime-local`-inndata (der den flytende etiketten ville overlappe den native plassholderen).                                   |
| `BaseInputTextWithVuelidate.vue` | `BaseInputText`                                      | Tynn Vuelidate-adapter: videresender `$error` til `isInvalid` og viser `$errors[].$message` i `errors`-slottet. Brukes sammen med et Vuelidate-feltobjekt.                                          |
| `BaseTextArea.vue`               | `Textarea` + `FloatLabel`                            | Flerlinjet tekstfelt.                                                                                                                                                                              |
| `BaseTextAreaWithVuelidate.vue`  | `BaseTextArea`                                       | Samme Vuelidate-adaptermønster som `BaseInputTextWithVuelidate`.                                                                                                                                    |
| `BaseInputNumber.vue`            | `InputNumber`                                        | Numerisk inndata med `min` / `max` / `step` og spinnerknapper.                                                                                                                                     |
| `BaseInputTags.vue`              | (egendefinert)                                       | Fritekst-taggbrikker; tagger legges til ved enter/komma og fjernes med backspace.                                                                                                                  |
| `BaseInputGroup.vue`             | `InputGroup` + `BaseButton`                          | Tekstfelt kombinert med en handlingsknapp (søkestil).                                                                                                                                              |
| `BaseCheckbox.vue`               | `Checkbox`                                           | Binær eller verdibundet avmerkingsboks med etikett.                                                                                                                                                |
| `BaseRadioButtons.vue`           | `RadioButton`                                        | Gruppe av radioknapper styrt av en `options: [{label, value}]`-tabell.                                                                                                                             |
| `BaseToggleButton.vue`           | `BaseButton`                                         | Toknapp (på / av-etiketter og ikoner) bundet via `v-model`.                                                                                                                                        |
| `BaseCalendar.vue`               | `DatePicker` + `FloatLabel`                          | Dato- / dato-tid-velger. Respekterer `platform.timepicker_increment` og brukerens locale via `calendarLocales`.                                                                                    |
| `BaseColorPicker.vue`            | native `<input type="color">` + `InputText`          | Fargevelger med heksadesimal tekst som fallback; bruker `colorjs.io` til å validere manuell heksinndata.                                                                                           |
| `BaseRating.vue`                 | `Rating`                                             | Stjernevurdering.                                                                                                                                                                                  |
| `BaseFileUpload.vue`             | native `<input type="file">` + `BaseButton`          | Enkeltfilvelger som utløser en vedleggsstilknapp.                                                                                                                                                  |
| `BaseFileUploadMultiple.vue`     | native `<input type="file" multiple>` + `BaseButton` | Flerfilvariant av `BaseFileUpload`.                                                                                                                                                                |
| `BaseUploader.vue`               | Uppy `Dashboard`                                     | Full Uppy-opplaster (webkamera, lyd, bilderedigering, XHR-opplasting) med locales knyttet til gjeldende `appLocale`. Bruk denne for rike opplastinger med fremdrift; bruk `BaseFileUpload*` for enkle vedlegg. |

### Valg og autofullføring

| Komponent              | Omslutter                    | Formål                                                                                                                           |
|------------------------|------------------------------|-----------------------------------------------------------------------------------------------------------------------------------|
| `BaseSelect.vue`       | `Dropdown` + `FloatLabel`    | Nedtrekksliste for enkeltvalg med valgfri tømmeknapp.                                                                                |
| `BaseMultiSelect.vue`  | `MultiSelect` + `FloatLabel` | Nedtrekksliste for flervalg som viser valgte elementer som brikker.                                                                      |
| `BaseSearchSelect.vue` | `Dropdown` with `filter`     | Nedtrekksliste for enkeltvalg med innebygd søkefelt, valgfri virtuell rulling og mal for to-linjers alternativ (`label` + `sublabel`). |
| `BaseAutocomplete.vue` | `AutoComplete`               | Asynkron autofullføring (minimum 3 tegn). Støtter enkelt- eller flervalg og en `chip`-sliss for å tilpasse brikker.                  |
| `BaseUserFinder.vue`   | `BaseTable` + `userService`  | Paginert brukersøketabell med radvalg. Bruk den når en funksjon trenger en brukervelger i administrasjonsstil.                           |

### Knapper og handlinger

| Komponent                        | Omslutter           | Formål                                                                                                                                                                                                                                                                                                                                                     |
|----------------------------------|---------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseButton.vue`                 | `Button` (PrimeVue) | Standard Chamilo-knapp. Løser ikoner via `chamiloIconToClass`, normaliserer `type` til PrimeVues `severity`/`variant`, renderer en intern `BaseAppLink` når `route` eller `toUrl` er angitt (slik at samme komponent håndterer router-lenke, anker og vanlig knapp). Godkjente `type`-verdier er listet i `validators.js` → `buttonTypeValidator`. |
| `BaseAdvancedSettingsButton.vue` | `BaseButton`        | Avsløringsknapp som veksler et innslisset panel for «avanserte innstillinger» via `v-model`.                                                                                                                                                                                                                                                                           |
| `BaseToolbar.vue`                | `Toolbar`           | Handlingsverktøylinje med `start`- / `end`-slisser (eller én standardsliss). Valgfri `showTopBorder` for skillelinjestil.                                                                                                                                                                                                                                       |

### Visning og data

| Component            | Wraps                       | Purpose                                                                                                                                                                                         |
|----------------------|-----------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTable.vue`      | `DataTable` (PrimeVue)      | Standard Chamilo-datatabell. Støtter servermodus (`lazy`), sortering på flere kolonner, globalt filter, radvalg og paginering. Send kolonner som `<Column>`-barn (globalt registrert). |
| `BaseCard.vue`       | `Card`                      | Kortomslag som videresender `header`, `title`, `subtitle`, `footer` og standard (innholds)slots.                                                                                                |
| `BaseChart.vue`      | `Chart`                     | Forhåndsinnstilling for kakediagram. Send et Chart.js-kompatibelt `data`-objekt.                                                                                                                                     |
| `BaseChip.vue`       | `Chip`                      | Chip gjengitt fra et `{value, labelField, imageField}`-objekt, med valgfri fjern-knapp.                                                                                                     |
| `BaseTag.vue`        | `Tag`                       | Farget merkelapp. Mapper Chamilos `warning` til PrimeVues `warn`.                                                                                                                               |
| `BaseAvatarList.vue` | `Avatar` + `BaseUserAvatar` | Avatar-rad med overflytsteller (f.eks. «+3»); styrt av `useAvatarList`.                                                                                                                        |
| `BaseUserAvatar.vue` | `Avatar`                    | Brukeravatar med bildereserve, lastetilstand og tilgjengelig merkelapp.                                                                                                                           |
| `BaseIcon.vue`       | `<i class="mdi …">`         | Chamilo-ikongjengiver. Legger til valgfritt merke (tekst eller ikon), verktøytips og størrelsesmodifikator. Send alltid et semantisk Chamilo-navn (f.eks. `"edit"`), ikke en rå MDI-klasse.                             |
| `BaseIconField.vue`  | `IconField` + `InputText`   | Søkeinput med et foranstilt forstørrelsesglass-ikon.                                                                                                                                                     |
| `BaseDivider.vue`    | `Divider`                   | Horisontal eller vertikal skillelinje, med valgfri tittel og justering.                                                                                                                              |

### Navigasjon og menyer

| Component                  | Wraps                   | Purpose                                                                                                                                                                                 |
|----------------------------|-------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseMenu.vue`             | `Menu` (popup)          | Sprettoppmeny som forstår ruter i `model[]`-elementer.                                                                                                                       |
| `BaseDropdownMenu.vue`     | (custom)                | Lettvekts nedtrekksutløser med koordinering for én åpen om gangen (åpning av én lukker de andre).                                                                                             |
| `BaseContextMenu.vue`      | (custom)                | Høyreklikk- / posisjonert kontekstmeny, styrt av `visible` + `position`.                                                                                                            |
| `BaseSidebarPanelMenu.vue` | `PanelMenu`             | Navigasjonsmeny i trekkspillstil brukt i sidepaneler; sporer automatisk utvidede nøkler fra modellen.                                                                                             |
| `BaseRouteTabs.vue`        | `BaseAppLink` row       | Fanelinje der hver fane er en ruterlenke. Den aktive fanen utheves automatisk basert på gjeldende rute.                                                                        |
| `BaseAppLink.vue`          | `RouterLink` *or* `<a>` | Smart lenke: gjengir en `<a>` når `url` er satt (ekstern/eldre), ellers en Vue Router `<RouterLink>`. Bruk den i stedet for enten primitiv, slik at intern/ekstern lenking forblir ensartet. |

### Dialoger

`BaseDialog` er grunnlaget; de andre bygger oppå den for de vanlige bekreft/avbryt- og sletteflytene.

| Komponent                     | Wrappes                   | Formål                                                                                                                             |
|-------------------------------|---------------------------|-------------------------------------------------------------------------------------------------------------------------------------|
| `BaseDialog.vue`              | `Dialog`                  | Modaldialog med tittelhode (valgfri `headerIcon`) og slotted body/footer. Åpen tilstand er en `defineModel("isVisible")`.      |
| `BaseDialogConfirmCancel.vue` | `BaseDialog`              | Bekreft/avbryt-modal med to knapper. Konfigurerbar bekreft-`type` (alvorlighetsgrad) og `icon`; emitterer `confirmClicked` / `cancelClicked`. |
| `BaseDialogDelete.vue`        | `BaseDialogConfirmCancel` | Forhåndsbygd «Er du sikker på at du vil slette dette elementet?»-modal med en fare-stilisert bekreftknapp.                                   |

### Redaktør og rikt innhold

| Komponent            | Wrappes                                           | Formål                                                                                                                                                              |
|----------------------|-------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTinyEditor.vue` | TinyMCE (via prosjektets `components/Editor`) | Riktekstredaktør med `FloatLabel`, sporing av fokus/tom tilstand, og integrasjon med gjeldende kurskontekst (`cidReq`). Bruk den for alle brukerforfattede HTML-felt. |

### Hjelpere

| Fil              | Formål                                                                                                                                                                                                                                                          |
|-------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `ChamiloIcons.js` | Mapper semantiske ikonnavn (`edit`, `delete`, `eye-on`, `courses`, …) til MDI CSS-klasser. ~127 oppføringer. Bla gjennom dem på `/admin/list-icons` på en kjørende instans.                                                                                                  |
| `validators.js`   | Delte prop-validatorer: `iconValidator` (må være et kjent Chamilo-ikonnavn), `sizeValidator` (`normal` / `small` / `large`), `buttonTypeValidator` (tillatte `BaseButton`-typer). Importer dem når du definerer nye `Base*`-komponenter som speiler disse konvensjonene. |

### Konvensjoner på tvers av Base-komponenter

* **v-model via `defineModel()`** — verdi (og ofte `isVisible`, `filters`, `selectedItems`) eksponeres som modeller; send dem med `v-model[:name]` i stedet for `:prop` + `@update:prop`.
* **Flytende etiketter** — de fleste skjemafelt wrapper inndataen i PrimeVue `FloatLabel variant="on"`. Oppgi `label` (den viste teksten) og `id` (brukes til å binde `<label for>`).
* **Valideringsmeldinger** — felt eksponerer `isInvalid` og en liten melding under inndataen (`errorText`, `messageText` eller `smallText` avhengig av komponenten). Vuelidate-bevisste varianter finnes for de vanligste.
* **Ikoner** — send Chamilo-semantiske navn, ikke rå MDI-klasser. Komponentene løser dem via `chamiloIconToClass`.
* **Størrelse** — `size="normal" | "small" | "large"` er den konvensjonelle størrelsespropen (se `sizeValidator`).
* **Komposisjon fremfor duplisering** — `BaseDialogDelete` wrapper `BaseDialogConfirmCancel`, som wrapper `BaseDialog`; `BaseToggleButton` og `BaseAdvancedSettingsButton` wrapper `BaseButton`. Når du trenger en gjentakende variant av en eksisterende komponent, foretrekk å komponere en ny `Base*` oppå den i stedet for å reimplementere den i en funksjonsmappe.

## Layoutkomponenter

Plassert i `components/layout/`:

| Komponent | Formål |
|-----------|---------|
| `DashboardLayout.vue` | Hovedlayout: toppfelt + sidemeny + innholdsområde |
| `Sidebar.vue` | Venstre navigasjonspanel (sammenleggbar) |
| `TopbarLoggedIn.vue` | Toppfelt med logo, innboks, avatar |

## Komponenter etter funksjonsområde

| Katalog | Komponenter | Formål |
|-----------|-----------|---------|
| `course/` | Kurskort, katalogfiltre, kursskjemaer | Kurslisting og administrasjon |
| `session/` | Øktkort, katalog | Øktlisting |
| `assignments/` | Innleveringslister, vurderingsmodaler, skjemaer | Arbeidsflyt for oppgaver |
| `chat/` | DockedChat, chatmeldinger | Sanntidschat og AI-veileder |
| `filemanager/` | CourseDocuments, PersonalFiles | Filutforsker og filhåndtering |
| `installer/` | Step1-Step7, EmailSettings | Installasjonsveiviser |
| `social/` | GroupInfoCard, sosiale innlegg | Funksjoner for sosialt nettverk |
| `attendance/` | AttendanceTable | Fraværsregistrering |
| `usergroup/` | GroupMembers | Administrasjon av brukergrupper |

## Ikonssystem

Ikoner bruker **Material Design Icons (MDI)** som eneste ikonbibliotek: `<i class="mdi mdi-pencil"></i>`

Filen `ChamiloIcons.js` gir en semantisk tilordning:

```javascript
export const chamiloIconToClass = {
  "edit": "mdi mdi-pencil",
  "delete": "mdi mdi-delete",
  "eye-on": "mdi mdi-eye",
  "courses": "mdi mdi-book-open-page-variant",
  // ... 127 mappings
}
```

Komponenter bruker `BaseIcon` eller refererer til `chamiloIconToClass` for å vise ikoner konsekvent.

En bla-bar oversikt over alle ikoner som er tilgjengelige i plattformen finnes på `/admin/list-icons` i enhver kjørende Chamilo-instans.

## Komponentmønstre

* **Composition API** — Komponenter bruker Vue 3s syntaks `<script setup>`
* **PrimeVue-integrasjon** — Omfattende bruk av PrimeVue-komponenter (Button, DataTable, Dialog, Menu, osv.)
* **Axios for API-kall** — HTTP-forespørsler mot backend-API-et
* **Vue I18n** — All brukervendt tekst bruker oversettelsesnøkler