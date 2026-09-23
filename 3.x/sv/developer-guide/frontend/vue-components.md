# Vue-komponenter

Chamilo har en stor uppsättning Vue-komponenter organiserade efter funktionsområde i `assets/vue/components/`.

## Baskomponenter

Familjen `Base*` i `assets/vue/components/basecomponents/` kapslar in PrimeVue-primitiver med Chamilo-specifika standardvärden (FloatLabel-layout, MDI-ikoner via `chamiloIconToClass`, konsekventa valideringsmeddelanden, Tailwind-storlekar). Använd alltid en `Base*`-komponent innan du importerar den underliggande PrimeVue-komponenten — så hålls användargränssnittet konsekvent i hela SPA:n och designändringar kan rullas ut från ett enda ställe.

Komponenter är **inte** globalt registrerade (den enda globalt registrerade PrimeVue-primitiven är `Column`, som används inuti `BaseTable`). Importera varje komponent explicit:

```js
import BaseButton from "@/components/basecomponents/BaseButton.vue"
import BaseDialog from "@/components/basecomponents/BaseDialog.vue"
```

### Formulärfält

De flesta tar emot värdet via `v-model`, exponerar `id` + `label`-props för tillgänglighet/bindning av flytande etikett och visar validering genom paret `isInvalid` / `errorText` (eller `messageText`).

| Komponent                        | Wrappas kring                                        | Syfte                                                                                                                                                                                            |
|----------------------------------|------------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseInputText.vue`              | `InputText` + `FloatLabel`                           | Enradigt textfält. Byter till statisk etikett för `date`/`time`/`datetime-local`-fält (där den flytande etiketten skulle överlappa den inbyggda platshållaren).                                      |
| `BaseInputTextWithVuelidate.vue` | `BaseInputText`                                      | Tunn Vuelidate-adapter: vidarebefordrar `$error` till `isInvalid` och renderar `$errors[].$message` i `errors`-sloten. Para den med ett Vuelidate-fältobjekt.                                             |
| `BaseTextArea.vue`               | `Textarea` + `FloatLabel`                            | Flerradigt textfält.                                                                                                                                                                             |
| `BaseTextAreaWithVuelidate.vue`  | `BaseTextArea`                                       | Samma Vuelidate-adaptermönster som `BaseInputTextWithVuelidate`.                                                                                                                                    |
| `BaseInputNumber.vue`            | `InputNumber`                                        | Numeriskt fält med `min` / `max` / `step` och spinnerknappar.                                                                                                                                     |
| `BaseInputTags.vue`              | (anpassad)                                           | Fritext-taggchips; taggar läggs till vid enter/komma och tas bort med backsteg.                                                                                                                       |
| `BaseInputGroup.vue`             | `InputGroup` + `BaseButton`                          | Textfält parat med en åtgärdsknapp (sökstil).                                                                                                                                            |
| `BaseCheckbox.vue`               | `Checkbox`                                           | Binär eller värde-bunden kryssruta med etikett.                                                                                                                                                         |
| `BaseRadioButtons.vue`           | `RadioButton`                                        | Grupp av radioknappar styrd av en `options: [{label, value}]`-array.                                                                                                                             |
| `BaseToggleButton.vue`           | `BaseButton`                                         | Tvålägesknapp (på-/av-etiketter och ikoner) bunden via `v-model`.                                                                                                                              |
| `BaseCalendar.vue`               | `DatePicker` + `FloatLabel`                          | Datum- / datum-tid-väljare. Respekterar `platform.timepicker_increment` och användarens locale via `calendarLocales`.                                                                                       |
| `BaseColorPicker.vue`            | inbyggt `<input type="color">` + `InputText`          | Färgväljare med hex-text som fallback; använder `colorjs.io` för att validera manuell hex-inmatning.                                                                                                               |
| `BaseRating.vue`                 | `Rating`                                             | Stjärnbetygsfält.                                                                                                                                                                                 |
| `BaseFileUpload.vue`             | inbyggt `<input type="file">` + `BaseButton`          | Enfils-väljare som utlöser en bilage-stilknapp.                                                                                                                                       |
| `BaseFileUploadMultiple.vue`     | inbyggt `<input type="file" multiple>` + `BaseButton` | Flerfilsvariant av `BaseFileUpload`.                                                                                                                                                            |
| `BaseUploader.vue`               | Uppy `Dashboard`                                     | Fullständig Uppy-uppladdare (webbkamera, ljud, bildredigerare, XHR-uppladdning) med locales kopplade till aktuell `appLocale`. Använd denna för rika uppladdningar med förlopp; använd `BaseFileUpload*` för enkla bilagor. |

### Urval och autokomplettering

| Component              | Wraps                        | Purpose                                                                                                                           |
|------------------------|------------------------------|-----------------------------------------------------------------------------------------------------------------------------------|
| `BaseSelect.vue`       | `Dropdown` + `FloatLabel`    | Envalsrullgardin med valfri rensningsknapp.                                                                                |
| `BaseMultiSelect.vue`  | `MultiSelect` + `FloatLabel` | Flervalsrullgardin som visar valda objekt som chips.                                                                      |
| `BaseSearchSelect.vue` | `Dropdown` with `filter`     | Envalsrullgardin med inbyggd sökruta, valfri virtuell rullning och tvåradigt alternativmall (`label` + `sublabel`). |
| `BaseAutocomplete.vue` | `AutoComplete`               | Asynkron autokomplettering (minst 3 tecken). Stöder enkelt eller flera val och en `chip`-slot för att anpassa chips.                  |
| `BaseUserFinder.vue`   | `BaseTable` + `userService`  | Sidindelad användarsökningstabell med radval. Använd den när en funktion behöver en användarväljare i administratörsstil.                           |

### Knappar och åtgärder

| Component                        | Wraps               | Purpose                                                                                                                                                                                                                                                                                                                                                     |
|----------------------------------|---------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseButton.vue`                 | `Button` (PrimeVue) | Standardknapp i Chamilo. Löser ikoner via `chamiloIconToClass`, normaliserar `type` till PrimeVues `severity`/`variant`, renderar en intern `BaseAppLink` när `route` eller `toUrl` anges (så att samma komponent hanterar router-länk, ankare och vanlig knapp). Godkända `type`-värden listas i `validators.js` → `buttonTypeValidator`. |
| `BaseAdvancedSettingsButton.vue` | `BaseButton`        | Utfällningsknapp som växlar en inslitsad panel för "avancerade inställningar" via `v-model`.                                                                                                                                                                                                                                                                           |
| `BaseToolbar.vue`                | `Toolbar`           | Åtgärdsverktygsfält med slotarna `start` / `end` (eller en enda standardslot). Valfri `showTopBorder` för avgränsarstil.                                                                                                                                                                                                                                       |

### Visning och data

| Komponent            | Wrappas                     | Syfte                                                                                                                                                                                           |
|----------------------|-----------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTable.vue`      | `DataTable` (PrimeVue)      | Standard datatabell i Chamilo. Stöder serverläge (`lazy`), sortering i flera kolumner, globalt filter, radmarkering och paginering. Skicka kolumner som `<Column>`-barn (globalt registrerade). |
| `BaseCard.vue`       | `Card`                      | Kortomslag som vidarebefordrar `header`, `title`, `subtitle`, `footer` och standardslot (innehåll).                                                                                             |
| `BaseChart.vue`      | `Chart`                     | Förinställning för cirkeldiagram. Skicka ett Chart.js-kompatibelt `data`-objekt.                                                                                                                |
| `BaseChip.vue`       | `Chip`                      | Chip som renderas från ett objekt `{value, labelField, imageField}`, med valfri ta bort-knapp.                                                                                                  |
| `BaseTag.vue`        | `Tag`                       | Färgad etikett. Mappar Chamilos `warning` till PrimeVues `warn`.                                                                                                                                |
| `BaseAvatarList.vue` | `Avatar` + `BaseUserAvatar` | Avatar-rad med overflow-räknare (t.ex. "+3"); styrs av `useAvatarList`.                                                                                                                         |
| `BaseUserAvatar.vue` | `Avatar`                    | Användaravatar med bildreserv, laddningstillstånd och tillgänglig etikett.                                                                                                                      |
| `BaseIcon.vue`       | `<i class="mdi …">`         | Ikonrenderare för Chamilo. Lägger till valfri badge (text eller ikon), tooltip och storleksmodifierare. Skicka alltid ett semantiskt Chamilo-namn (t.ex. `"edit"`), inte en rå MDI-klass.       |
| `BaseIconField.vue`  | `IconField` + `InputText`   | Sökfält med en förstoringsglasikon till vänster.                                                                                                                                                |
| `BaseDivider.vue`    | `Divider`                   | Horisontell eller vertikal avdelare, med valfri titel och justering.                                                                                                                            |

### Navigering och menyer

| Komponent                  | Wrappas                 | Syfte                                                                                                                                                                                              |
|----------------------------|-------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseMenu.vue`             | `Menu` (popup)          | Popup-meny som förstår router-rutter i `model[]`-objekt.                                                                                                                                           |
| `BaseDropdownMenu.vue`     | (anpassad)              | Lättviktig dropdown-utlösare med samordning för en öppen i taget (när en öppnas stängs de andra).                                                                                                  |
| `BaseContextMenu.vue`      | (anpassad)              | Högerklicks-/positionerad kontextmeny, styrd av `visible` + `position`.                                                                                                                            |
| `BaseSidebarPanelMenu.vue` | `PanelMenu`             | Navigationsmeny i dragspelsstil som används i sidofält; spårar automatiskt expanderade nycklar från modellen.                                                                                      |
| `BaseRouteTabs.vue`        | `BaseAppLink`-rad       | Flikfält där varje flik är en router-länk. Den aktiva fliken markeras automatiskt utifrån den aktuella rutten.                                                                                     |
| `BaseAppLink.vue`          | `RouterLink` *eller* `<a>` | Smart länk: renderar en `<a>` när `url` är satt (extern/äldre), annars en Vue Router `<RouterLink>`. Använd den i stället för någon av primitiverna så att intern/extern länkning förblir enhetlig. |

### Dialoger

`BaseDialog` är grunden; de övriga bygger ovanpå den för de vanliga flödena bekräfta/avbryt och ta bort.

| Component                     | Wraps                     | Purpose                                                                                                                             |
|-------------------------------|---------------------------|-------------------------------------------------------------------------------------------------------------------------------------|
| `BaseDialog.vue`              | `Dialog`                  | Modaldialog med en titelrubrik (valfri `headerIcon`) och slottad body/footer. Öppet tillstånd är en `defineModel("isVisible")`.      |
| `BaseDialogConfirmCancel.vue` | `BaseDialog`              | Bekräfta/avbryt-modal med två knappar. Konfigurerbar bekräftelse-`type` (allvarlighetsgrad) och `icon`; emitterar `confirmClicked` / `cancelClicked`. |
| `BaseDialogDelete.vue`        | `BaseDialogConfirmCancel` | Förbyggd modal ”Är du säker på att du vill ta bort det här objektet?” med en bekräftelseknapp i danger-stil.                                   |

### Redigerare och rikt innehåll

| Component            | Wraps                                           | Purpose                                                                                                                                                              |
|----------------------|-------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTinyEditor.vue` | TinyMCE (via the project's `components/Editor`) | Rikt textredigerare med `FloatLabel`, spårning av fokus/tomt tillstånd och integration med aktuellt kurskontext (`cidReq`). Använd den för alla HTML-fält som användaren skriver. |

### Hjälpfunktioner

| File              | Purpose                                                                                                                                                                                                                                                          |
|-------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `ChamiloIcons.js` | Mappar semantiska ikonnamn (`edit`, `delete`, `eye-on`, `courses`, …) till MDI CSS-klasser. ~127 poster. Bläddra bland dem på `/admin/list-icons` på en körande instans.                                                                                                  |
| `validators.js`   | Delade prop-validatorer: `iconValidator` (måste vara ett känt Chamilo-ikonnamn), `sizeValidator` (`normal` / `small` / `large`), `buttonTypeValidator` (tillåtna `BaseButton`-typer). Importera dem när du definierar nya `Base*`-komponenter som följer dessa konventioner. |

### Konventioner för Base-komponenter

* **v-model via `defineModel()`** — value (och ofta `isVisible`, `filters`, `selectedItems`) exponeras som modeller; skicka dem med `v-model[:name]` i stället för `:prop` + `@update:prop`.
* **Flytande etiketter** — de flesta formulärfält omsluter sin inmatning i PrimeVue `FloatLabel variant="on"`. Ange `label` (den visade texten) och `id` (används för att binda `<label for>`).
* **Valideringsmeddelanden** — fält exponerar `isInvalid` och ett litet meddelande under inmatningen (`errorText`, `messageText` eller `smallText` beroende på komponent). Vuelidate-medvetna varianter finns för de vanligaste.
* **Ikoner** — skicka semantiska Chamilo-namn, inte råa MDI-klasser. Komponenterna löser dem via `chamiloIconToClass`.
* **Storlek** — `size="normal" | "small" | "large"` är den konventionella storlekspropen (se `sizeValidator`).
* **Komposition framför duplicering** — `BaseDialogDelete` omsluter `BaseDialogConfirmCancel`, som omsluter `BaseDialog`; `BaseToggleButton` och `BaseAdvancedSettingsButton` omsluter `BaseButton`. När du behöver en återkommande variant av en befintlig komponent, föredra att komponera en ny `Base*` ovanpå i stället för att implementera om den i en funktionsmapp.

## Layoutkomponenter

Located in `components/layout/`:

| Component | Purpose |
|-----------|---------|
| `DashboardLayout.vue` | Huvudlayout: topbar + sidofält + innehållsområde |
| `Sidebar.vue` | Vänster navigeringspanel (kollapsbar) |
| `TopbarLoggedIn.vue` | Topplist med logotyp, inkorg, avatar |

## Komponenter per funktionsområde

| Katalog | Komponenter | Syfte |
|-----------|-----------|---------|
| `course/` | Kurskort, katalogfilter, kursformulär | Kurslistning och hantering |
| `session/` | Sessionskort, katalog | Sessionslistning |
| `assignments/` | Inlämningslistor, betygsmodaler, formulär | Uppgiftsflöde |
| `chat/` | DockedChat, chattmeddelanden | Realtidschatt och AI-handledare |
| `filemanager/` | CourseDocuments, PersonalFiles | Filbläddrare och filhantering |
| `installer/` | Step1-Step7, EmailSettings | Installationsguide |
| `social/` | GroupInfoCard, sociala inlägg | Funktioner för socialt nätverk |
| `attendance/` | AttendanceTable | Närvaroregistrering |
| `usergroup/` | GroupMembers | Hantering av användargrupper |

## Ikonssystem

Ikoner använder **Material Design Icons (MDI)** som enda ikonbibliotek: `<i class="mdi mdi-pencil"></i>`

Filen `ChamiloIcons.js` tillhandahåller en semantisk mappning:

```javascript
export const chamiloIconToClass = {
  "edit": "mdi mdi-pencil",
  "delete": "mdi mdi-delete",
  "eye-on": "mdi mdi-eye",
  "courses": "mdi mdi-book-open-page-variant",
  // ... 127 mappings
}
```

Komponenter använder `BaseIcon` eller refererar till `chamiloIconToClass` för att rendera ikoner konsekvent.

En bläddringsbar referens över alla ikoner som finns i plattformen finns på `/admin/list-icons` i varje körande Chamilo-instans.

## Komponentmönster

* **Composition API** — Komponenter använder Vue 3:s syntax `<script setup>`
* **PrimeVue-integration** — Omfattande användning av PrimeVue-komponenter (Button, DataTable, Dialog, Menu, m.fl.)
* **Axios för API-anrop** — HTTP-förfrågningar till backend-API:t
* **Vue I18n** — All användarvänd text använder översättningsnycklar