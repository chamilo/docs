# Vue-componenten

Chamilo heeft een grote set Vue-componenten, georganiseerd per functioneel gebied in `assets/vue/components/`.

## Basiscomponenten

De `Base*`-familie in `assets/vue/components/basecomponents/` omhult PrimeVue-primitieven met Chamilo-specifieke standaardwaarden (FloatLabel-layout, MDI-iconen via `chamiloIconToClass`, consistente validatieberichten, Tailwind-afmetingen). Gebruik altijd eerst een `Base*`-component voordat u de onderliggende PrimeVue-component importeert — zo blijft de UI consistent in de SPA en kunnen ontwerpwijzigingen vanuit één plek worden uitgerold.

Componenten zijn **niet** globaal geregistreerd (de enige globaal geregistreerde PrimeVue-primitief is `Column`, gebruikt in `BaseTable`). Importeer elke component expliciet:

```js
import BaseButton from "@/components/basecomponents/BaseButton.vue"
import BaseDialog from "@/components/basecomponents/BaseDialog.vue"
```

### Formuliervelden

De meeste accepteren de waarde via `v-model`, stellen `id` + `label`-props bloot voor toegankelijkheid/binding van zwevende labels, en tonen validatie via een paar `isInvalid` / `errorText` (of `messageText`).

| Component                        | Wraps                                                | Doel                                                                                                                                                                                               |
|----------------------------------|------------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseInputText.vue`              | `InputText` + `FloatLabel`                           | Tekstinvoer op één regel. Schakelt over naar een statisch label voor `date`/`time`/`datetime-local`-invoer (waar het zwevende label de native placeholder zou overlappen).                         |
| `BaseInputTextWithVuelidate.vue` | `BaseInputText`                                      | Dunne Vuelidate-adapter: stuurt `$error` door naar `isInvalid` en rendert `$errors[].$message` in de `errors`-slot. Koppel het aan een Vuelidate-veldobject.                                       |
| `BaseTextArea.vue`               | `Textarea` + `FloatLabel`                            | Tekstinvoer over meerdere regels.                                                                                                                                                                  |
| `BaseTextAreaWithVuelidate.vue`  | `BaseTextArea`                                       | Hetzelfde Vuelidate-adapterpatroon als `BaseInputTextWithVuelidate`.                                                                                                                               |
| `BaseInputNumber.vue`            | `InputNumber`                                        | Numerieke invoer met `min` / `max` / `step` en spinnerknoppen.                                                                                                                                     |
| `BaseInputTags.vue`              | (custom)                                             | Vrije-tekst-tagchips; tags worden toegevoegd bij enter/komma en verwijderd bij backspace.                                                                                                          |
| `BaseInputGroup.vue`             | `InputGroup` + `BaseButton`                          | Tekstinvoer gekoppeld aan een actieknop (zoekstijl).                                                                                                                                               |
| `BaseCheckbox.vue`               | `Checkbox`                                           | Binaire of waardegebonden checkbox met label.                                                                                                                                                      |
| `BaseRadioButtons.vue`           | `RadioButton`                                        | Groep radioknoppen aangestuurd door een array `options: [{label, value}]`.                                                                                                                         |
| `BaseToggleButton.vue`           | `BaseButton`                                         | Knop met twee toestanden (aan-/uitlabels en -iconen) gebonden via `v-model`.                                                                                                                       |
| `BaseCalendar.vue`               | `DatePicker` + `FloatLabel`                          | Datum- / datum-tijdkiezer. Respecteert `platform.timepicker_increment` en de locale van de gebruiker via `calendarLocales`.                                                                        |
| `BaseColorPicker.vue`            | native `<input type="color">` + `InputText`          | Kleurenkiezer met hex-tekst als fallback; gebruikt `colorjs.io` om handmatige hex-invoer te valideren.                                                                                             |
| `BaseRating.vue`                 | `Rating`                                             | Sterbeoordelingsinvoer.                                                                                                                                                                            |
| `BaseFileUpload.vue`             | native `<input type="file">` + `BaseButton`          | Enkelvoudige bestandskiezer die een bijlage-achtige knop activeert.                                                                                                                                |
| `BaseFileUploadMultiple.vue`     | native `<input type="file" multiple>` + `BaseButton` | Meervoudige-bestandsvariant van `BaseFileUpload`.                                                                                                                                                  |
| `BaseUploader.vue`               | Uppy `Dashboard`                                     | Volledige Uppy-uploader (webcam, audio, afbeeldingseditor, XHR-upload) met locales gekoppeld aan de huidige `appLocale`. Gebruik dit voor rijke uploads met voortgang; gebruik `BaseFileUpload*` voor eenvoudige bijlagen. |

### Selectie & autocomplete

| Component              | Wraps                        | Purpose                                                                                                                           |
|------------------------|------------------------------|-----------------------------------------------------------------------------------------------------------------------------------|
| `BaseSelect.vue`       | `Dropdown` + `FloatLabel`    | Dropdown voor één keuze met optionele knop om te wissen.                                                                                |
| `BaseMultiSelect.vue`  | `MultiSelect` + `FloatLabel` | Dropdown voor meerdere keuzes die geselecteerde items als chips toont.                                                                      |
| `BaseSearchSelect.vue` | `Dropdown` with `filter`     | Dropdown voor één keuze met ingebouwd zoekvak, optioneel virtueel scrollen, en een optiesjabloon van twee regels (`label` + `sublabel`). |
| `BaseAutocomplete.vue` | `AutoComplete`               | Asynchrone autocomplete (minimaal 3 tekens). Ondersteunt enkele of meervoudige selectie en een `chip`-slot om chips aan te passen.                  |
| `BaseUserFinder.vue`   | `BaseTable` + `userService`  | Gepagineerde gebruikerzoektabel met rijselectie. Gebruik dit wanneer een functie een gebruikerskiezer in adminstijl nodig heeft.                           |

### Knoppen & acties

| Component                        | Wraps               | Purpose                                                                                                                                                                                                                                                                                                                                                     |
|----------------------------------|---------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseButton.vue`                 | `Button` (PrimeVue) | Standaard Chamilo-knop. Lost pictogrammen op via `chamiloIconToClass`, normaliseert `type` naar PrimeVue's `severity`/`variant`, rendert intern een `BaseAppLink` wanneer een `route` of `toUrl` is opgegeven (zodat dezelfde component router-link, anker en gewone knop afhandelt). Geaccepteerde `type`-waarden staan in `validators.js` → `buttonTypeValidator`. |
| `BaseAdvancedSettingsButton.vue` | `BaseButton`        | Disclosure-knop die via `v-model` een ingesloten paneel "geavanceerde instellingen" in- of uitschakelt.                                                                                                                                                                                                                                                                           |
| `BaseToolbar.vue`                | `Toolbar`           | Actietoolbar met slots `start` / `end` (of één standaardslot). Optioneel `showTopBorder` voor scheidingsstyling.                                                                                                                                                                                                                                       |

### Weergave & gegevens

| Component            | Wraps                       | Purpose                                                                                                                                                                                         |
|----------------------|-----------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTable.vue`      | `DataTable` (PrimeVue)      | Standaard Chamilo-gegevenstabel. Ondersteunt server-side modus (`lazy`), sorteren op meerdere kolommen, globaal filter, rijselectie en paginering. Geef kolommen door als `<Column>`-kinderen (globaal geregistreerd). |
| `BaseCard.vue`       | `Card`                      | Kaartwrapper die de slots `header`, `title`, `subtitle`, `footer` en de standaard (inhouds)slot doorgeeft.                                                                                                |
| `BaseChart.vue`      | `Chart`                     | Voorinstelling voor cirkeldiagrammen. Geef een Chart.js-compatibel `data`-object door.                                                                                                                                     |
| `BaseChip.vue`       | `Chip`                      | Chip weergegeven vanuit een object `{value, labelField, imageField}`, met optionele verwijderknop.                                                                                                     |
| `BaseTag.vue`        | `Tag`                       | Gekleurd labeltag. Mapt Chamilo's `warning` naar PrimeVue's `warn`.                                                                                                                               |
| `BaseAvatarList.vue` | `Avatar` + `BaseUserAvatar` | Avatarrij met overloopteller (bijv. "+3"); aangestuurd door `useAvatarList`.                                                                                                                        |
| `BaseUserAvatar.vue` | `Avatar`                    | Gebruikersavatar met afbeeldingsfallback, laadstatus en toegankelijk label.                                                                                                                           |
| `BaseIcon.vue`       | `<i class="mdi …">`         | Chamilo-pictogramrenderer. Voegt een optionele badge (tekst of pictogram), tooltip en groottemodificator toe. Geef altijd een semantische Chamilo-naam door (bijv. `"edit"`), geen ruwe MDI-klasse.                             |
| `BaseIconField.vue`  | `IconField` + `InputText`   | Zoekinvoer met een voorafgaand vergrootglaspictogram.                                                                                                                                                     |
| `BaseDivider.vue`    | `Divider`                   | Horizontale of verticale scheidingslijn, met optionele titel en uitlijning.                                                                                                                              |

### Navigatie & menu's

| Component                  | Wraps                   | Purpose                                                                                                                                                                                 |
|----------------------------|-------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseMenu.vue`             | `Menu` (popup)          | Pop-upmenu dat routerroutes in `model[]`-items begrijpt.                                                                                                                       |
| `BaseDropdownMenu.vue`     | (custom)                | Lichtgewicht dropdown-trigger met coördinatie voor één geopend menu (het openen van één sluit de andere).                                                                                             |
| `BaseContextMenu.vue`      | (custom)                | Contextmenu via rechtsklik / positionering, aangestuurd door `visible` + `position`.                                                                                                            |
| `BaseSidebarPanelMenu.vue` | `PanelMenu`             | Navigatiemenu in accordeonstijl voor zijbalken; volgt automatisch uitgevouwen sleutels vanuit het model.                                                                                             |
| `BaseRouteTabs.vue`        | `BaseAppLink` row       | Tabbalk waarin elk tabblad een routerlink is. Het actieve tabblad wordt automatisch gemarkeerd op basis van de huidige route.                                                                        |
| `BaseAppLink.vue`          | `RouterLink` *or* `<a>` | Slimme link: rendert een `<a>` wanneer `url` is ingesteld (extern/legacy), anders een Vue Router `<RouterLink>`. Gebruik dit in plaats van een van beide primitieven zodat interne/externe links uniform blijven. |

### Dialogen

`BaseDialog` is de basis; de andere componenten bouwen hierop voort voor de gangbare bevestigen/annuleren- en verwijderstromen.

| Component                     | Wraps                     | Purpose                                                                                                                             |
|-------------------------------|---------------------------|-------------------------------------------------------------------------------------------------------------------------------------|
| `BaseDialog.vue`              | `Dialog`                  | Modaal dialoogvenster met een getitelde header (optionele `headerIcon`) en slotted body/footer. De open-status is een `defineModel("isVisible")`.      |
| `BaseDialogConfirmCancel.vue` | `BaseDialog`              | Bevestigen/annuleren-modaal met twee knoppen. Configureerbaar bevestigings-`type` (ernst) en `icon`; emitteert `confirmClicked` / `cancelClicked`. |
| `BaseDialogDelete.vue`        | `BaseDialogConfirmCancel` | Vooraf gebouwd modaal "Weet u zeker dat u dit item wilt verwijderen?" met een gevaar-gestileerde bevestigingsknop.                                   |

### Editor & rijke inhoud

| Component            | Wraps                                           | Purpose                                                                                                                                                              |
|----------------------|-------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTinyEditor.vue` | TinyMCE (via the project's `components/Editor`) | Rich-texteditor met `FloatLabel`, tracking van focus/lege status, en integratie met de huidige cursuscontext (`cidReq`). Gebruik deze voor elk door de gebruiker geschreven HTML-veld. |

### Helpers

| File              | Purpose                                                                                                                                                                                                                                                          |
|-------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `ChamiloIcons.js` | Koppelt semantische icoonnamen (`edit`, `delete`, `eye-on`, `courses`, …) aan MDI-CSS-klassen. ~127 vermeldingen. Blader erdoor op `/admin/list-icons` op een draaiende instantie.                                                                                                  |
| `validators.js`   | Gedeelde prop-validators: `iconValidator` (moet een bekende Chamilo-icoonnaam zijn), `sizeValidator` (`normal` / `small` / `large`), `buttonTypeValidator` (toegestane `BaseButton`-types). Importeer ze bij het definiëren van nieuwe `Base*`-componenten die deze conventies volgen. |

### Conventies voor Base-componenten

* **v-model via `defineModel()`** — value (en vaak `isVisible`, `filters`, `selectedItems`) worden als models blootgesteld; geef ze door met `v-model[:name]` in plaats van `:prop` + `@update:prop`.
* **Zwevende labels** — de meeste formuliervelden wrappen hun invoer in PrimeVue `FloatLabel variant="on"`. Geef `label` (de weergegeven tekst) en `id` (gebruikt om de `<label for>` te binden).
* **Validatieberichten** — velden stellen `isInvalid` bloot en een klein bericht onder de invoer (`errorText`, `messageText` of `smallText` afhankelijk van de component). Er bestaan Vuelidate-bewuste varianten voor de meest voorkomende.
* **Iconen** — geef semantische Chamilo-namen door, geen ruwe MDI-klassen. De componenten lossen ze op via `chamiloIconToClass`.
* **Grootte** — `size="normal" | "small" | "large"` is de conventionele sizing-prop (zie `sizeValidator`).
* **Compositie boven duplicatie** — `BaseDialogDelete` wrapt `BaseDialogConfirmCancel`, die `BaseDialog` wrapt; `BaseToggleButton` en `BaseAdvancedSettingsButton` wrappen `BaseButton`. Wanneer u een terugkerende variant van een bestaande component nodig hebt, geef dan de voorkeur aan het componeren van een nieuwe `Base*` erbovenop in plaats van deze opnieuw te implementeren in een feature-map.

## Layout Components

Located in `components/layout/`:

| Component | Purpose |
|-----------|---------|
| `DashboardLayout.vue` | Hoofdlayout: topbalk + zijbalk + inhoudsgebied |
| `Sidebar.vue` | Linker navigatiepaneel (inklaptbaar) |
| `TopbarLoggedIn.vue` | Bovenbalk met logo, inbox, avatar |

## Componenten per functioneel gebied

| Directory | Componenten | Doel |
|-----------|-----------|---------|
| `course/` | Cursuskaarten, catalogusfilters, cursusformulieren | Cursusoverzicht en -beheer |
| `session/` | Sessiekaarten, catalogus | Sessieoverzicht |
| `assignments/` | Inzendingenlijsten, beoordelingsmodals, formulieren | Opdrachtworkflow |
| `chat/` | DockedChat, chatberichten | Realtimechat en AI-tutor |
| `filemanager/` | CourseDocuments, PersonalFiles | Bestandsbrowser en -beheer |
| `installer/` | Step1-Step7, EmailSettings | Installatiewizard |
| `social/` | GroupInfoCard, sociale berichten | Functies van het sociale netwerk |
| `attendance/` | AttendanceTable | Aanwezigheidsregistratie |
| `usergroup/` | GroupMembers | Beheer van gebruikersgroepen |

## Icoonsysteem

Iconen gebruiken **Material Design Icons (MDI)** als enige icoonbibliotheek: `<i class="mdi mdi-pencil"></i>`

Het bestand `ChamiloIcons.js` biedt een semantische mapping:

```javascript
export const chamiloIconToClass = {
  "edit": "mdi mdi-pencil",
  "delete": "mdi mdi-delete",
  "eye-on": "mdi mdi-eye",
  "courses": "mdi mdi-book-open-page-variant",
  // ... 127 mappings
}
```

Componenten gebruiken `BaseIcon` of verwijzen naar `chamiloIconToClass` om iconen consistent weer te geven.

Een doorzoekbare referentie van alle iconen die in het platform beschikbaar zijn, is te vinden op `/admin/list-icons` in elke draaiende Chamilo-instantie.

## Componentpatronen

* **Composition API** — Componenten gebruiken de `<script setup>`-syntaxis van Vue 3
* **PrimeVue-integratie** — Intensief gebruik van PrimeVue-componenten (Button, DataTable, Dialog, Menu, enz.)
* **Axios voor API-aanroepen** — HTTP-verzoeken naar de backend-API
* **Vue I18n** — Alle voor de gebruiker zichtbare tekst gebruikt vertaalsleutels