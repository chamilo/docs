# Vue-komponenter

Chamilo har et stort sæt Vue-komponenter organiseret efter funktionsområde i `assets/vue/components/`.

## Base-komponenter

Familien `Base*` i `assets/vue/components/basecomponents/` indpakker PrimeVue-primitiver med Chamilo-specifikke standarder (FloatLabel-layout, MDI-ikoner via `chamiloIconToClass`, ensartede valideringsbeskeder, Tailwind-størrelser). Brug altid en `Base*`-komponent, før du importerer den underliggende PrimeVue-komponent — det er sådan, brugergrænsefladen forbliver konsistent på tværs af SPA'en, og hvordan designændringer kan udrulles fra ét sted.

Komponenter er **ikke** globalt registreret (den eneste globalt registrerede PrimeVue-primitiv er `Column`, som bruges inde i `BaseTable`). Importér hver enkelt eksplicit:

```js
import BaseButton from "@/components/basecomponents/BaseButton.vue"
import BaseDialog from "@/components/basecomponents/BaseDialog.vue"
```

### Formularfelter

De fleste accepterer værdien via `v-model`, eksponerer `id` + `label`-props til tilgængelighed/binding af flydende etiket og viser validering via et par `isInvalid` / `errorText` (eller `messageText`).

| Komponent                        | Indpakker                                            | Formål                                                                                                                                                                                             |
|----------------------------------|------------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseInputText.vue`              | `InputText` + `FloatLabel`                           | Enlinjet tekstfelt. Skifter til en statisk etiket for `date`/`time`/`datetime-local`-felter (hvor den flydende etiket ville overlappe den native pladsholder).                                     |
| `BaseInputTextWithVuelidate.vue` | `BaseInputText`                                      | Tynd Vuelidate-adapter: videresender `$error` til `isInvalid` og renderer `$errors[].$message` i `errors`-slottet. Par den med et Vuelidate-feltobjekt.                                            |
| `BaseTextArea.vue`               | `Textarea` + `FloatLabel`                            | Flerlinjet tekstfelt.                                                                                                                                                                              |
| `BaseTextAreaWithVuelidate.vue`  | `BaseTextArea`                                       | Samme Vuelidate-adaptermønster som `BaseInputTextWithVuelidate`.                                                                                                                                   |
| `BaseInputNumber.vue`            | `InputNumber`                                        | Numerisk felt med `min` / `max` / `step` og spinner-knapper.                                                                                                                                       |
| `BaseInputTags.vue`              | (custom)                                             | Fritekst-tag-chips; tags tilføjes ved enter/komma og fjernes ved backspace.                                                                                                                        |
| `BaseInputGroup.vue`             | `InputGroup` + `BaseButton`                          | Tekstfelt parret med en handlingsknap (søgestil).                                                                                                                                                  |
| `BaseCheckbox.vue`               | `Checkbox`                                           | Binært eller værdibundet afkrydsningsfelt med etiket.                                                                                                                                              |
| `BaseRadioButtons.vue`           | `RadioButton`                                        | Gruppe af radioknapper styret af et `options: [{label, value}]`-array.                                                                                                                             |
| `BaseToggleButton.vue`           | `BaseButton`                                         | Toknaps-knap (on / off-etiketter og ikoner) bundet via `v-model`.                                                                                                                                  |
| `BaseCalendar.vue`               | `DatePicker` + `FloatLabel`                          | Dato- / dato-tidsvælger. Respekterer `platform.timepicker_increment` og brugerens sprog via `calendarLocales`.                                                                                     |
| `BaseColorPicker.vue`            | native `<input type="color">` + `InputText`          | Farvevælger med hex-tekst som fallback; bruger `colorjs.io` til at validere manuel hex-input.                                                                                                      |
| `BaseRating.vue`                 | `Rating`                                             | Stjernebedømmelsesfelt.                                                                                                                                                                            |
| `BaseFileUpload.vue`             | native `<input type="file">` + `BaseButton`          | Enkeltfilvælger, der udløser en vedhæftningslignende knap.                                                                                                                                         |
| `BaseFileUploadMultiple.vue`     | native `<input type="file" multiple>` + `BaseButton` | Flerfilsvariant af `BaseFileUpload`.                                                                                                                                                               |
| `BaseUploader.vue`               | Uppy `Dashboard`                                     | Fuld Uppy-uploader (webcam, lyd, billededitor, XHR-upload) med locales knyttet til den aktuelle `appLocale`. Brug denne til rige uploads med fremgang; brug `BaseFileUpload*` til simple vedhæftninger. |

### Valg og autoudfyldning

| Component              | Wraps                        | Purpose                                                                                                                           |
|------------------------|------------------------------|-----------------------------------------------------------------------------------------------------------------------------------|
| `BaseSelect.vue`       | `Dropdown` + `FloatLabel`    | Dropdown med enkeltvalg og valgfri ryd-knap.                                                                                |
| `BaseMultiSelect.vue`  | `MultiSelect` + `FloatLabel` | Dropdown med flervalg, der viser valgte elementer som chips.                                                                      |
| `BaseSearchSelect.vue` | `Dropdown` with `filter`     | Dropdown med enkeltvalg og indbygget søgefelt, valgfri virtuel scrolling og skabelon til to-linjers valg (`label` + `sublabel`). |
| `BaseAutocomplete.vue` | `AutoComplete`               | Asynkron autoudfyldning (minimum 3 tegn). Understøtter enkelt- eller flervalg og en `chip`-slot til at tilpasse chips.                  |
| `BaseUserFinder.vue`   | `BaseTable` + `userService`  | Pagineringstabel til brugersøgning med rækkemarkering. Brug den, når en funktion har brug for en bruger-vælger i administratorstil.                           |

### Knapper og handlinger

| Component                        | Wraps               | Purpose                                                                                                                                                                                                                                                                                                                                                     |
|----------------------------------|---------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseButton.vue`                 | `Button` (PrimeVue) | Standard Chamilo-knap. Opløser ikoner via `chamiloIconToClass`, normaliserer `type` til PrimeVues `severity`/`variant` og renderer et internt `BaseAppLink`, når `route` eller `toUrl` er angivet (så den samme komponent håndterer router-link, anker og almindelig knap). Accepterede `type`-værdier er listet i `validators.js` → `buttonTypeValidator`. |
| `BaseAdvancedSettingsButton.vue` | `BaseButton`        | Afsløringsknap, der via `v-model` slår et slotted panel med "avancerede indstillinger" til og fra.                                                                                                                                                                                                                                                                           |
| `BaseToolbar.vue`                | `Toolbar`           | Handlingsværktøjslinje med `start`- / `end`-slots (eller en enkelt standard-slot). Valgfri `showTopBorder` til separator-styling.                                                                                                                                                                                                                                       |

### Visning og data

| Komponent            | Wrapper                     | Formål                                                                                                                                                                                          |
|----------------------|-----------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTable.vue`      | `DataTable` (PrimeVue)      | Standard Chamilo-datatabel. Understøtter server-side-tilstand (`lazy`), sortering på flere kolonner, globalt filter, rækkemarkering og paginering. Send kolonner som `<Column>`-børn (globalt registreret). |
| `BaseCard.vue`       | `Card`                      | Kortwrapper, der videresender slots for `header`, `title`, `subtitle`, `footer` og standard (indhold).                                                                                          |
| `BaseChart.vue`      | `Chart`                     | Forudindstilling til cirkeldiagram. Send et Chart.js-kompatibelt `data`-objekt.                                                                                                                 |
| `BaseChip.vue`       | `Chip`                      | Chip gengivet fra et `{value, labelField, imageField}`-objekt, med valgfri fjern-knap.                                                                                                          |
| `BaseTag.vue`        | `Tag`                       | Farvet etiket-tag. Mapper Chamilos `warning` til PrimeVues `warn`.                                                                                                                              |
| `BaseAvatarList.vue` | `Avatar` + `BaseUserAvatar` | Avatarrække med overflow-tæller (f.eks. "+3"); styret af `useAvatarList`.                                                                                                                       |
| `BaseUserAvatar.vue` | `Avatar`                    | Brugeravatar med billed-fallback, indlæsningstilstand og tilgængelig etiket.                                                                                                                    |
| `BaseIcon.vue`       | `<i class="mdi …">`         | Chamilo-ikongengiver. Tilføjer et valgfrit badge (tekst eller ikon), tooltip og størrelsesmodifikator. Send altid et semantisk Chamilo-navn (f.eks. `"edit"`), ikke en rå MDI-klasse.           |
| `BaseIconField.vue`  | `IconField` + `InputText`   | Søgefelt med et foranstillet forstørrelsesglas-ikon.                                                                                                                                            |
| `BaseDivider.vue`    | `Divider`                   | Vandret eller lodret skillelinje, med valgfri titel og justering.                                                                                                                               |

### Navigation og menuer

| Komponent                  | Wrapper                 | Formål                                                                                                                                                                                  |
|----------------------------|-------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseMenu.vue`             | `Menu` (popup)          | Popup-menu, der forstår router-ruter inde i `model[]`-elementer.                                                                                                                        |
| `BaseDropdownMenu.vue`     | (custom)                | Letvægts dropdown-udløser med koordinering af enkelt åben (åbning af én lukker de andre).                                                                                               |
| `BaseContextMenu.vue`      | (custom)                | Højreklik-/placeret kontekstmenu, styret af `visible` + `position`.                                                                                                                     |
| `BaseSidebarPanelMenu.vue` | `PanelMenu`             | Navigationsmenu i harmonika-stil brugt i sidepaneler; sporer automatisk udvidede nøgler fra modellen.                                                                                   |
| `BaseRouteTabs.vue`        | `BaseAppLink`-række     | Fanebladslinje, hvor hver fane er et router-link. Den aktive fane fremhæves automatisk baseret på den aktuelle rute.                                                                    |
| `BaseAppLink.vue`          | `RouterLink` *eller* `<a>` | Intelligent link: gengiver et `<a>`, når `url` er sat (eksternt/legacy), ellers et Vue Router `<RouterLink>`. Brug den i stedet for enten primitive, så intern/ekstern linking forbliver ensartet. |

### Dialoger

`BaseDialog` er fundamentet; de øvrige bygger ovenpå den til de almindelige bekræft/annuller- og slet-forløb.

| Component                     | Wraps                     | Purpose                                                                                                                             |
|-------------------------------|---------------------------|-------------------------------------------------------------------------------------------------------------------------------------|
| `BaseDialog.vue`              | `Dialog`                  | Modal dialog med en overskrift i headeren (valgfri `headerIcon`) og slotted body/footer. Åben tilstand er en `defineModel("isVisible")`.      |
| `BaseDialogConfirmCancel.vue` | `BaseDialog`              | Bekræft/annuller-modal med to knapper. Konfigurerbar bekræft-`type` (alvorlighed) og `icon`; udsender `confirmClicked` / `cancelClicked`. |
| `BaseDialogDelete.vue`        | `BaseDialogConfirmCancel` | Forudbygget modal med teksten "Er du sikker på, at du vil slette dette element?" og en fare-stylet bekræftelsesknap.                                   |

### Editor og rigt indhold

| Component            | Wraps                                           | Purpose                                                                                                                                                              |
|----------------------|-------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTinyEditor.vue` | TinyMCE (via the project's `components/Editor`) | Rich text-editor med `FloatLabel`, sporing af fokus/tom tilstand og integration med den aktuelle kursuskontekst (`cidReq`). Brug den til ethvert brugerforfattet HTML-felt. |

### Hjælpere

| File              | Purpose                                                                                                                                                                                                                                                          |
|-------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `ChamiloIcons.js` | Mapper semantiske ikonnavne (`edit`, `delete`, `eye-on`, `courses`, …) til MDI CSS-klasser. Ca. 127 poster. Gennemse dem på `/admin/list-icons` på en kørende instans.                                                                                                  |
| `validators.js`   | Delte prop-validatorer: `iconValidator` (skal være et kendt Chamilo-ikonnavn), `sizeValidator` (`normal` / `small` / `large`), `buttonTypeValidator` (tilladte `BaseButton`-typer). Importér dem, når du definerer nye `Base*`-komponenter, der spejler disse konventioner. |

### Konventioner på tværs af Base-komponenter

* **v-model via `defineModel()`** — value (og ofte `isVisible`, `filters`, `selectedItems`) eksponeres som modeller; send dem med `v-model[:name]` i stedet for `:prop` + `@update:prop`.
* **Flydende labels** — de fleste formularfelter pakker deres input ind i PrimeVue `FloatLabel variant="on"`. Angiv `label` (den viste tekst) og `id` (bruges til at binde `<label for>`).
* **Valideringsmeddelelser** — felter eksponerer `isInvalid` og en lille meddelelse under inputtet (`errorText`, `messageText` eller `smallText` afhængigt af komponenten). Vuelidate-bevidste varianter findes for de mest almindelige.
* **Ikoner** — send Chamilo-semantiske navne, ikke rå MDI-klasser. Komponenterne resolverer dem via `chamiloIconToClass`.
* **Størrelse** — `size="normal" | "small" | "large"` er den konventionelle sizing-prop (se `sizeValidator`).
* **Komposition frem for duplikering** — `BaseDialogDelete` wrapper `BaseDialogConfirmCancel`, som wrapper `BaseDialog`; `BaseToggleButton` og `BaseAdvancedSettingsButton` wrapper `BaseButton`. Når du har brug for en tilbagevendende variant af en eksisterende komponent, så foretræk at komponere en ny `Base*` ovenpå i stedet for at genimplementere den i en feature-mappe.

## Layoutkomponenter

Placeret i `components/layout/`:

| Component | Purpose |
|-----------|---------|
| `DashboardLayout.vue` | Hovedlayout: topbar + sidebar + indholdsområde |
| `Sidebar.vue` | Venstre navigationspanel (sammenklappeligt) |
| `TopbarLoggedIn.vue` | Topbjælke med logo, indbakke, avatar |

## Funktionsområde-komponenter

| Directory | Components | Purpose |
|-----------|-----------|---------|
| `course/` | Course cards, catalog filters, course forms | Kursusoversigt og -administration |
| `session/` | Session cards, catalog | Sessionsliste |
| `assignments/` | Submission lists, grading modals, forms | Afleveringsworkflow |
| `chat/` | DockedChat, chat messages | Realtidschat og AI-tutor |
| `filemanager/` | CourseDocuments, PersonalFiles | Filbrowser og -administration |
| `installer/` | Step1-Step7, EmailSettings | Installationsguide |
| `social/` | GroupInfoCard, social posts | Sociale netværksfunktioner |
| `attendance/` | AttendanceTable | Fremmøderegistrering |
| `usergroup/` | GroupMembers | Administration af brugergrupper |

## Ikon-system

Ikoner bruger **Material Design Icons (MDI)** som det eneste ikonbibliotek: `<i class="mdi mdi-pencil"></i>`

Filen `ChamiloIcons.js` stiller en semantisk mapping til rådighed:

```javascript
export const chamiloIconToClass = {
  "edit": "mdi mdi-pencil",
  "delete": "mdi mdi-delete",
  "eye-on": "mdi mdi-eye",
  "courses": "mdi mdi-book-open-page-variant",
  // ... 127 mappings
}
```

Komponenter bruger `BaseIcon` eller refererer til `chamiloIconToClass` for at gengive ikoner ensartet.

En gennemseelig reference over alle ikoner, der er tilgængelige på platformen, findes på `/admin/list-icons` i enhver kørende Chamilo-instans.

## Komponentmønstre

* **Composition API** — Komponenter bruger Vue 3's `<script setup>`-syntaks
* **PrimeVue-integration** — Omfattende brug af PrimeVue-komponenter (Button, DataTable, Dialog, Menu osv.)
* **Axios til API-kald** — HTTP-forespørgsler til backend-API'et
* **Vue I18n** — Al brugerrettet tekst bruger oversættelsesnøgler