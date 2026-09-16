# Vue Componenten

Chamilo beschikt over een uitgebreide set Vue-componenten, georganiseerd per functiegebied in `assets/vue/components/`.

## Basiscomponenten

De `Base*`-familie in `assets/vue/components/basecomponents/` omvat PrimeVue-primitieven met Chamilo-specifieke standaardinstellingen (FloatLabel-indeling, MDI-iconen via `chamiloIconToClass`, consistente validatieberichten, Tailwind-groottebepaling). Gebruik altijd eerst een `Base*`-component voordat je de onderliggende PrimeVue-component importeert — zo blijft de gebruikersinterface consistent over de SPA en kunnen ontwerpwijzigingen vanuit één centrale plek worden doorgevoerd.

Componenten worden **niet** globaal geregistreerd (de enige globaal geregistreerde PrimeVue-primitief is `Column`, gebruikt binnen `BaseTable`). Importeer elk component expliciet:

```js
import BaseButton from "@/components/basecomponents/BaseButton.vue"
import BaseDialog from "@/components/basecomponents/BaseDialog.vue"
```

---
### Formulierinvoervelden

De meeste accepteren de waarde via `v-model`, bieden `id` + `label` props voor toegankelijkheid en binding met zwevende labels, en tonen validatie via een `isInvalid` / `errorText` (of `messageText`) combinatie.

| Component                        | Omvat                                                | Doel                                                                                                                                                                                               |
|----------------------------------|------------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseInputText.vue`              | `InputText` + `FloatLabel`                           | Invoerveld voor enkele regel tekst. Schakelt over naar een statisch label voor `date`/`time`/`datetime-local` invoervelden (waar het zwevende label de native placeholder zou overlappen).         |
| `BaseInputTextWithVuelidate.vue` | `BaseInputText`                                      | Dunne Vuelidate-adapter: stuurt `$error` door naar `isInvalid` en rendert `$errors[].$message` in de `errors` slot. Koppel dit aan een Vuelidate-veldobject.                                       |
| `BaseTextArea.vue`               | `Textarea` + `FloatLabel`                            | Invoerveld voor meerdere regels tekst.                                                                                                                                                             |
| `BaseTextAreaWithVuelidate.vue`  | `BaseTextArea`                                       | Dezelfde Vuelidate-adapterpatroon als `BaseInputTextWithVuelidate`.                                                                                                                                |
| `BaseInputNumber.vue`            | `InputNumber`                                        | Numeriek invoerveld met `min` / `max` / `step` en spinnerknoppen.                                                                                                                                  |
| `BaseInputTags.vue`              | (aangepast)                                          | Vrijetekst tag-chips; tags worden toegevoegd bij enter/komma en verwijderd bij backspace.                                                                                                         |
| `BaseInputGroup.vue`             | `InputGroup` + `BaseButton`                          | Tekstinvoerveld gekoppeld aan een actieknop (zoekstijl).                                                                                                                                           |
| `BaseCheckbox.vue`               | `Checkbox`                                           | Binaire of waardegebonden checkbox met label.                                                                                                                                                      |
| `BaseRadioButtons.vue`           | `RadioButton`                                        | Groep radioknoppen aangedreven door een `options: [{label, value}]` array.                                                                                                                         |
| `BaseToggleButton.vue`           | `BaseButton`                                         | Twee-standenschakelknop (aan/uit labels en iconen) gebonden via `v-model`.                                                                                                                         |
| `BaseCalendar.vue`               | `DatePicker` + `FloatLabel`                          | Datum- / datum-tijd kiezer. Respecteert `platform.timepicker_increment` en de locale van de gebruiker via `calendarLocales`.                                                                       |
| `BaseColorPicker.vue`            | native `<input type="color">` + `InputText`          | Kleurkiezer met hex-tekst als fallback; gebruikt `colorjs.io` om handmatige hex-invoer te valideren.                                                                                               |
| `BaseRating.vue`                 | `Rating`                                             | Sterrenbeoordelingsinvoer.                                                                                                                                                                         |
| `BaseFileUpload.vue`             | native `<input type="file">` + `BaseButton`          | Enkelvoudige bestandskiezer die een bijlage-stijl knop activeert.                                                                                                                                  |
| `BaseFileUploadMultiple.vue`     | native `<input type="file" multiple>` + `BaseButton` | Meervoudige bestandsvariant van `BaseFileUpload`.                                                                                                                                                  |
| `BaseUploader.vue`               | Uppy `Dashboard`                                     | Volledige Uppy-uploader (webcam, audio, afbeeldingseditor, XHR-upload) met locales gekoppeld aan de huidige `appLocale`. Gebruik dit voor uitgebreide uploads met voortgang; gebruik `BaseFileUpload*` voor eenvoudige bijlagen. |

---
### Selectie & autocompleteren

| Component              | Omvat                        | Doel                                                                                                                              |
|------------------------|------------------------------|-----------------------------------------------------------------------------------------------------------------------------------|
| `BaseSelect.vue`       | `Dropdown` + `FloatLabel`    | Dropdown voor enkele keuze met optionele wis-knop.                                                                                |
| `BaseMultiSelect.vue`  | `MultiSelect` + `FloatLabel` | Dropdown voor meerdere keuzes die geselecteerde items als chips weergeeft.                                                        |
| `BaseSearchSelect.vue` | `Dropdown` met `filter`      | Dropdown voor enkele keuze met ingebouwde zoekbalk, optionele virtuele scrolling en een sjabloon voor opties met twee regels (`label` + `sublabel`). |
| `BaseAutocomplete.vue` | `AutoComplete`               | Asynchrone autocompletering (minimaal 3 tekens). Ondersteunt enkele of meerdere selecties en een `chip`-slot om chips aan te passen. |
| `BaseUserFinder.vue`   | `BaseTable` + `userService`  | Gepagineerde zoektafel voor gebruikers met rijselectie. Gebruik dit wanneer een functie een gebruikerskiezer in admin-stijl nodig heeft. |

### Knoppen & acties

| Component                        | Omvat               | Doel                                                                                                                                                                                                                                                                                                                                                     |
|----------------------------------|---------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseButton.vue`                 | `Button` (PrimeVue) | Standaard Chamilo-knop. Converteert iconen via `chamiloIconToClass`, normaliseert `type` naar PrimeVue's `severity`/`variant`, rendert een interne `BaseAppLink` wanneer een `route` of `toUrl` wordt opgegeven (zodat hetzelfde component router-link, anchor en gewone knopgevallen afhandelt). Geaccepteerde `type`-waarden staan in `validators.js` → `buttonTypeValidator`. |
| `BaseAdvancedSettingsButton.vue` | `BaseButton`        | Openklapknop die een ingesloten paneel voor "geavanceerde instellingen" schakelt via `v-model`.                                                                                                                                                                                                                                                                 |
| `BaseToolbar.vue`                | `Toolbar`           | Actiebalk met `start` / `end` slots (of een enkele standaard slot). Optionele `showTopBorder` voor scheidingsstyling.                                                                                                                                                                                                                                       |

---
### Weergave & gegevens

| Component            | Omhult                      | Doel                                                                                                                                                                                         |
|----------------------|-----------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTable.vue`      | `DataTable` (PrimeVue)      | Standaard Chamilo-gegevenstabel. Ondersteunt server-side modus (`lazy`), sortering op meerdere kolommen, globale filter, rijselectie en paginering. Geef kolommen door als `<Column>`-kinderen (globaal geregistreerd). |
| `BaseCard.vue`       | `Card`                      | Kaartomhulsel dat `header`, `title`, `subtitle`, `footer` en standaard (inhoud) slots doorgeeft.                                                                                                |
| `BaseChart.vue`      | `Chart`                     | Vooringestelde taartdiagram. Geef een Chart.js-compatibel `data`-object door.                                                                                                                                     |
| `BaseChip.vue`       | `Chip`                      | Chip weergegeven vanuit een `{value, labelField, imageField}`-object, met optionele verwijderknop.                                                                                                     |
| `BaseTag.vue`        | `Tag`                      | Gekleurd labeltag. Koppelt Chamilo's `warning` aan PrimeVue's `warn`.                                                                                                                               |
| `BaseAvatarList.vue` | `Avatar` + `BaseUserAvatar` | Avatarrij met overloop teller (bijv. "+3"); aangedreven door `useAvatarList`.                                                                                                                        |
| `BaseUserAvatar.vue` | `Avatar`                    | Gebruikersavatar met terugvalafbeelding, laadstatus en toegankelijke label.                                                                                                                           |
| `BaseIcon.vue`       | `<i class="mdi …">`         | Chamilo-icoonweergave. Voegt een optionele badge (tekst of icoon), tooltip en grootte-aanpasser toe. Geef altijd een Chamilo-semantische naam door (bijv. `"edit"`), geen ruwe MDI-klasse.                             |
| `BaseIconField.vue`  | `IconField` + `InputText`   | Zoekinvoer met een voorlopend vergrootglasicoon.                                                                                                                                                     |
| `BaseDivider.vue`    | `Divider`                   | Horizontale of verticale scheidingslijn, met optionele titel en uitlijning.                                                                                                                              |

### Navigatie & menu's

| Component                  | Omhult                   | Doel                                                                                                                                                                                 |
|----------------------------|-------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseMenu.vue`             | `Menu` (popup)          | Pop-upmenu dat routerroutes begrijpt binnen `model[]`-items.                                                                                                                       |
| `BaseDropdownMenu.vue`     | (aangepast)             | Lichtgewicht dropdown-trigger met coördinatie voor enkelvoudig openen (het openen van één sluit de anderen).                                                                                             |
| `BaseContextMenu.vue`      | (aangepast)             | Rechtsklik / gepositioneerd contextmenu, bestuurd door `visible` + `position`.                                                                                                            |
| `BaseSidebarPanelMenu.vue` | `PanelMenu`             | Navigatiemenu in accordeonstijl gebruikt in zijbalken; volgt automatisch uitgeklapte sleutels uit het model.                                                                                             |
| `BaseRouteTabs.vue`        | `BaseAppLink` rij       | Tabbladbalk waarbij elke tab een routerlink is. De actieve tab wordt automatisch gemarkeerd op basis van de huidige route.                                                                        |
| `BaseAppLink.vue`          | `RouterLink` *of* `<a>` | Slimme link: rendert een `<a>` wanneer `url` is ingesteld (extern/legacy), anders een Vue Router `<RouterLink>`. Gebruik deze in plaats van een primitief zodat intern/extern linken uniform blijft. |

---
### Dialogen

`BaseDialog` vormt de basis; de andere bouwen hierop voort voor de gebruikelijke bevestigings-/annulerings- en verwijderstromen.

| Component                     | Omvat                     | Doel                                                                                                                             |
|-------------------------------|---------------------------|---------------------------------------------------------------------------------------------------------------------------------|
| `BaseDialog.vue`              | `Dialog`                  | Modale dialoog met een getitelde kop (optionele `headerIcon`) en een ingesloten body/footer. Open toestand is een `defineModel("isVisible")`. |
| `BaseDialogConfirmCancel.vue` | `BaseDialog`              | Bevestig/annuleer modaal met twee knoppen. Configureerbare bevestigings-`type` (ernst) en `icon`; verzendt `confirmClicked` / `cancelClicked`. |
| `BaseDialogDelete.vue`        | `BaseDialogConfirmCancel` | Vooraf gebouwde "Weet u zeker dat u dit item wilt verwijderen?" modaal met een gevaar-gestileerde bevestigingsknop.             |

### Editor & rijke inhoud

| Component            | Omvat                                           | Doel                                                                                                                                                              |
|----------------------|-------------------------------------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTinyEditor.vue` | TinyMCE (via de project's `components/Editor`) | Teksteditor voor rijke inhoud met `FloatLabel`, focus/leeg toestand tracking, en integratie met de huidige cursuscontext (`cidReq`). Gebruik het voor elk door de gebruiker geschreven HTML-veld. |

### Hulpmiddelen

| Bestand           | Doel                                                                                                                                                                                                                                                          |
|-------------------|--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `ChamiloIcons.js` | Koppelt semantische iconnamen (`edit`, `delete`, `eye-on`, `courses`, …) aan MDI CSS-klassen. Ongeveer 127 vermeldingen. Bekijk ze op `/admin/list-icons` op een draaiende instantie.                                                                       |
| `validators.js`   | Gedeelde prop-validators: `iconValidator` (moet een bekende Chamilo-iconnaam zijn), `sizeValidator` (`normal` / `small` / `large`), `buttonTypeValidator` (toegestane `BaseButton`-typen). Importeer ze bij het definiëren van nieuwe `Base*`-componenten die deze conventies volgen. |

### Conventies voor Base-componenten

* **v-model via `defineModel()`** — waarde (en vaak `isVisible`, `filters`, `selectedItems`) worden blootgesteld als modellen; geef ze door met `v-model[:name]` in plaats van `:prop` + `@update:prop`.
* **Zwevende labels** — de meeste formuliervelden omhullen hun invoer in PrimeVue `FloatLabel variant="on"`. Geef `label` (de weergegeven tekst) en `id` (gebruikt om de `<label for>` te binden).
* **Validatieberichten** — velden tonen `isInvalid` en een klein bericht onder de invoer (`errorText`, `messageText`, of `smallText` afhankelijk van de component). Vuelidate-bewuste varianten bestaan voor de meest voorkomende.
* **Iconen** — geef Chamilo semantische namen door, geen ruwe MDI-klassen. De componenten lossen ze op via `chamiloIconToClass`.
* **Grootte** — `size="normal" | "small" | "large"` is de conventionele grootte-prop (zie `sizeValidator`).
* **Compositie boven duplicatie** — `BaseDialogDelete` omvat `BaseDialogConfirmCancel`, dat `BaseDialog` omvat; `BaseToggleButton` en `BaseAdvancedSettingsButton` omvatten `BaseButton`. Wanneer u een terugkerende variant van een bestaande component nodig heeft, geef dan de voorkeur aan het componeren van een nieuwe `Base*` erbovenop in plaats van deze opnieuw te implementeren in een functie-map.

## Lay-outcomponenten

Gelegen in `components/layout/`:

| Component             | Doel                                      |
|-----------------------|-------------------------------------------|
| `DashboardLayout.vue` | Hoofdlay-out: bovenbalk + zijbalk + inhoudsgebied |
| `Sidebar.vue`         | Linker navigatiepaneel (inklapbaar)       |
| `TopbarLoggedIn.vue`  | Bovenbalk met logo, inbox, avatar         |

---
## Feature-Area Componenten

| Directory | Componenten | Doel |
|-----------|-------------|------|
| `course/` | Cursuskaartjes, catalogusfilters, cursusformulieren | Cursusoverzicht en beheer |
| `session/` | Sessiekaartjes, catalogus | Sessieoverzicht |
| `assignments/` | Inleverlijsten, beoordelingsmodals, formulieren | Opdrachtworkflow |
| `chat/` | DockedChat, chatberichten | Realtime chat en AI-tutor |
| `filemanager/` | CourseDocuments, PersonalFiles | Bestandsbrowser en beheer |
| `installer/` | Stap1-Stap7, EmailSettings | Installatiewizard |
| `social/` | GroupInfoCard, sociale berichten | Sociale netwerkfuncties |
| `attendance/` | AttendanceTable | Aanwezigheidsregistratie |
| `usergroup/` | GroupMembers | Gebruikersgroepbeheer |

## Iconensysteem

Iconen maken gebruik van **Material Design Icons (MDI)** als enige iconenbibliotheek: `<i class="mdi mdi-pencil"></i>`

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

Een doorbladerbare referentie van alle beschikbare iconen op het platform is te vinden op `/admin/list-icons` in elke actieve Chamilo-instantie.

## Componentpatronen

* **Composition API** — Componenten gebruiken de `<script setup>`-syntaxis van Vue 3
* **PrimeVue-integratie** — Intensief gebruik van PrimeVue-componenten (Button, DataTable, Dialog, Menu, enz.)
* **Axios voor API-aanroepen** — HTTP-verzoeken naar de backend API
* **Vue I18n** — Alle tekst die gebruikers zien, maakt gebruik van vertaal sleutels