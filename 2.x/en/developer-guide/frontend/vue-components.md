# Vue Components

Chamilo has a large set of Vue components organized by feature area in `assets/vue/components/`.

## Base Components

The `Base*` family in `assets/vue/components/basecomponents/` wraps PrimeVue primitives with Chamilo-specific defaults (FloatLabel layout, MDI icons via `chamiloIconToClass`, consistent validation messages, Tailwind sizing). Always reach for a `Base*` component before importing the underlying PrimeVue one — that's how the UI stays consistent across the SPA and how design changes can be rolled out from a single place.

Components are **not** globally registered (the only globally registered PrimeVue primitive is `Column`, used inside `BaseTable`). Import each one explicitly:

```js
import BaseButton from "@/components/basecomponents/BaseButton.vue"
import BaseDialog from "@/components/basecomponents/BaseDialog.vue"
```

### Form inputs

Most accept the value through `v-model`, expose `id` + `label` props for accessibility/floating-label binding, and surface validation through an `isInvalid` / `errorText` (or `messageText`) pair.

| Component                        | Wraps                                                | Purpose                                                                                                                                                                                            |
|----------------------------------|------------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseInputText.vue`              | `InputText` + `FloatLabel`                           | Single-line text input. Switches to a static label for `date`/`time`/`datetime-local` inputs (where the floating label would overlap the native placeholder).                                      |
| `BaseInputTextWithVuelidate.vue` | `BaseInputText`                                      | Thin Vuelidate adapter: forwards `$error` to `isInvalid` and renders `$errors[].$message` in the `errors` slot. Pair it with a Vuelidate field object.                                             |
| `BaseTextArea.vue`               | `Textarea` + `FloatLabel`                            | Multi-line text input.                                                                                                                                                                             |
| `BaseTextAreaWithVuelidate.vue`  | `BaseTextArea`                                       | Same Vuelidate adapter pattern as `BaseInputTextWithVuelidate`.                                                                                                                                    |
| `BaseInputNumber.vue`            | `InputNumber`                                        | Numeric input with `min` / `max` / `step` and spinner buttons.                                                                                                                                     |
| `BaseInputTags.vue`              | (custom)                                             | Free-text tag chips; tags are added on enter/comma and removed on backspace.                                                                                                                       |
| `BaseInputGroup.vue`             | `InputGroup` + `BaseButton`                          | Text input paired with an action button (search-style).                                                                                                                                            |
| `BaseCheckbox.vue`               | `Checkbox`                                           | Binary or value-bound checkbox with label.                                                                                                                                                         |
| `BaseRadioButtons.vue`           | `RadioButton`                                        | Group of radio buttons driven by an `options: [{label, value}]` array.                                                                                                                             |
| `BaseToggleButton.vue`           | `BaseButton`                                         | Two-state button (on / off labels and icons) bound through `v-model`.                                                                                                                              |
| `BaseCalendar.vue`               | `DatePicker` + `FloatLabel`                          | Date / date-time picker. Honors `platform.timepicker_increment` and the user's locale via `calendarLocales`.                                                                                       |
| `BaseColorPicker.vue`            | native `<input type="color">` + `InputText`          | Color picker with hex text fallback; uses `colorjs.io` to validate manual hex input.                                                                                                               |
| `BaseRating.vue`                 | `Rating`                                             | Star rating input.                                                                                                                                                                                 |
| `BaseFileUpload.vue`             | native `<input type="file">` + `BaseButton`          | Single-file picker that triggers an attachment-style button.                                                                                                                                       |
| `BaseFileUploadMultiple.vue`     | native `<input type="file" multiple>` + `BaseButton` | Multi-file variant of `BaseFileUpload`.                                                                                                                                                            |
| `BaseUploader.vue`               | Uppy `Dashboard`                                     | Full Uppy uploader (webcam, audio, image editor, XHR upload) with locales wired to the current `appLocale`. Use this for rich uploads with progress; use `BaseFileUpload*` for simple attachments. |

### Selection & autocomplete

| Component              | Wraps                        | Purpose                                                                                                                           |
|------------------------|------------------------------|-----------------------------------------------------------------------------------------------------------------------------------|
| `BaseSelect.vue`       | `Dropdown` + `FloatLabel`    | Single-choice dropdown with optional clear button.                                                                                |
| `BaseMultiSelect.vue`  | `MultiSelect` + `FloatLabel` | Multi-choice dropdown that displays selected items as chips.                                                                      |
| `BaseSearchSelect.vue` | `Dropdown` with `filter`     | Single-choice dropdown with built-in search box, optional virtual scrolling, and two-line option template (`label` + `sublabel`). |
| `BaseAutocomplete.vue` | `AutoComplete`               | Async autocomplete (3-char minimum). Supports single or multiple selection and a `chip` slot to customize chips.                  |
| `BaseUserFinder.vue`   | `BaseTable` + `userService`  | Paginated user-search table with row selection. Use it when a feature needs an admin-style user picker.                           |

### Buttons & actions

| Component                        | Wraps               | Purpose                                                                                                                                                                                                                                                                                                                                                     |
|----------------------------------|---------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseButton.vue`                 | `Button` (PrimeVue) | Standard Chamilo button. Resolves icons through `chamiloIconToClass`, normalizes `type` to PrimeVue's `severity`/`variant`, renders an internal `BaseAppLink` when a `route` or `toUrl` is given (so the same component handles router-link, anchor, and plain button cases). Accepted `type` values are listed in `validators.js` → `buttonTypeValidator`. |
| `BaseAdvancedSettingsButton.vue` | `BaseButton`        | Disclosure button that toggles a slotted "advanced settings" panel via `v-model`.                                                                                                                                                                                                                                                                           |
| `BaseToolbar.vue`                | `Toolbar`           | Action toolbar with `start` / `end` slots (or a single default slot). Optional `showTopBorder` for separator styling.                                                                                                                                                                                                                                       |

### Display & data

| Component            | Wraps                       | Purpose                                                                                                                                                                                         |
|----------------------|-----------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTable.vue`      | `DataTable` (PrimeVue)      | Standard Chamilo data table. Supports server-side mode (`lazy`), multi-column sorting, global filter, row selection, and pagination. Pass columns as `<Column>` children (globally registered). |
| `BaseCard.vue`       | `Card`                      | Card wrapper that forwards `header`, `title`, `subtitle`, `footer`, and default (content) slots.                                                                                                |
| `BaseChart.vue`      | `Chart`                     | Pie-chart preset. Pass a Chart.js–compatible `data` object.                                                                                                                                     |
| `BaseChip.vue`       | `Chip`                      | Chip rendered from a `{value, labelField, imageField}` object, with optional remove button.                                                                                                     |
| `BaseTag.vue`        | `Tag`                       | Colored label tag. Maps Chamilo's `warning` to PrimeVue's `warn`.                                                                                                                               |
| `BaseAvatarList.vue` | `Avatar` + `BaseUserAvatar` | Avatar row with overflow counter (e.g. "+3"); driven by `useAvatarList`.                                                                                                                        |
| `BaseUserAvatar.vue` | `Avatar`                    | User avatar with image fallback, loading state, and accessible label.                                                                                                                           |
| `BaseIcon.vue`       | `<i class="mdi …">`         | Chamilo icon renderer. Adds an optional badge (text or icon), tooltip, and size modifier. Always pass a Chamilo semantic name (e.g. `"edit"`), not a raw MDI class.                             |
| `BaseIconField.vue`  | `IconField` + `InputText`   | Search input with a leading magnifier icon.                                                                                                                                                     |
| `BaseDivider.vue`    | `Divider`                   | Horizontal or vertical divider, with optional title and alignment.                                                                                                                              |

### Navigation & menus

| Component                  | Wraps                   | Purpose                                                                                                                                                                                 |
|----------------------------|-------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseMenu.vue`             | `Menu` (popup)          | Popup menu that understands router routes inside `model[]` items.                                                                                                                       |
| `BaseDropdownMenu.vue`     | (custom)                | Lightweight dropdown trigger with single-open coordination (opening one closes the others).                                                                                             |
| `BaseContextMenu.vue`      | (custom)                | Right-click / positioned context menu, controlled by `visible` + `position`.                                                                                                            |
| `BaseSidebarPanelMenu.vue` | `PanelMenu`             | Accordion-style navigation menu used in sidebars; auto-tracks expanded keys from the model.                                                                                             |
| `BaseRouteTabs.vue`        | `BaseAppLink` row       | Tab bar where each tab is a router link. The active tab is highlighted automatically based on the current route.                                                                        |
| `BaseAppLink.vue`          | `RouterLink` *or* `<a>` | Smart link: renders an `<a>` when `url` is set (external/legacy), otherwise a Vue Router `<RouterLink>`. Use it instead of either primitive so internal/external linking stays uniform. |

### Dialogs

`BaseDialog` is the foundation; the others compose on top of it for the common confirm/cancel and delete flows.

| Component                     | Wraps                     | Purpose                                                                                                                             |
|-------------------------------|---------------------------|-------------------------------------------------------------------------------------------------------------------------------------|
| `BaseDialog.vue`              | `Dialog`                  | Modal dialog with a titled header (optional `headerIcon`) and slotted body/footer. Open state is a `defineModel("isVisible")`.      |
| `BaseDialogConfirmCancel.vue` | `BaseDialog`              | Confirm/cancel modal with two buttons. Configurable confirm `type` (severity) and `icon`; emits `confirmClicked` / `cancelClicked`. |
| `BaseDialogDelete.vue`        | `BaseDialogConfirmCancel` | Pre-built "Are you sure you want to delete this item?" modal with a danger-styled confirm button.                                   |

### Editor & rich content

| Component            | Wraps                                           | Purpose                                                                                                                                                              |
|----------------------|-------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTinyEditor.vue` | TinyMCE (via the project's `components/Editor`) | Rich text editor with `FloatLabel`, focus/empty state tracking, and integration with the current course context (`cidReq`). Use it for any user-authored HTML field. |

### Helpers

| File              | Purpose                                                                                                                                                                                                                                                          |
|-------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `ChamiloIcons.js` | Maps semantic icon names (`edit`, `delete`, `eye-on`, `courses`, …) to MDI CSS classes. ~127 entries. Browse them at `/admin/list-icons` on a running instance.                                                                                                  |
| `validators.js`   | Shared prop validators: `iconValidator` (must be a known Chamilo icon name), `sizeValidator` (`normal` / `small` / `large`), `buttonTypeValidator` (allowed `BaseButton` types). Import them when defining new `Base*` components that mirror these conventions. |

### Conventions across Base components

* **v-model via `defineModel()`** — value (and frequently `isVisible`, `filters`, `selectedItems`) are exposed as models; pass them with `v-model[:name]` rather than `:prop` + `@update:prop`.
* **Floating labels** — most form fields wrap their input in PrimeVue `FloatLabel variant="on"`. Provide `label` (the displayed text) and `id` (used to bind the `<label for>`).
* **Validation messages** — fields expose `isInvalid` and a small message below the input (`errorText`, `messageText`, or `smallText` depending on the component). Vuelidate-aware variants exist for the most common ones.
* **Icons** — pass Chamilo semantic names, not raw MDI classes. The components resolve them through `chamiloIconToClass`.
* **Sizing** — `size="normal" | "small" | "large"` is the conventional sizing prop (see `sizeValidator`).
* **Composition over duplication** — `BaseDialogDelete` wraps `BaseDialogConfirmCancel`, which wraps `BaseDialog`; `BaseToggleButton` and `BaseAdvancedSettingsButton` wrap `BaseButton`. When you need a recurring variant of an existing component, prefer composing a new `Base*` on top instead of re-implementing it in a feature folder.

## Layout Components

Located in `components/layout/`:

| Component | Purpose |
|-----------|---------|
| `DashboardLayout.vue` | Main layout: topbar + sidebar + content area |
| `Sidebar.vue` | Left navigation panel (collapsible) |
| `TopbarLoggedIn.vue` | Top bar with logo, inbox, avatar |

## Feature-Area Components

| Directory | Components | Purpose |
|-----------|-----------|---------|
| `course/` | Course cards, catalog filters, course forms | Course listing and management |
| `session/` | Session cards, catalog | Session listing |
| `assignments/` | Submission lists, grading modals, forms | Assignment workflow |
| `chat/` | DockedChat, chat messages | Real-time chat and AI tutor |
| `filemanager/` | CourseDocuments, PersonalFiles | File browser and management |
| `installer/` | Step1-Step7, EmailSettings | Installation wizard |
| `social/` | GroupInfoCard, social posts | Social network features |
| `attendance/` | AttendanceTable | Attendance tracking |
| `usergroup/` | GroupMembers | User group management |

## Icon System

Icons use **Material Design Icons (MDI)** as the sole icon library: `<i class="mdi mdi-pencil"></i>`

The `ChamiloIcons.js` file provides a semantic mapping:

```javascript
export const chamiloIconToClass = {
  "edit": "mdi mdi-pencil",
  "delete": "mdi mdi-delete",
  "eye-on": "mdi mdi-eye",
  "courses": "mdi mdi-book-open-page-variant",
  // ... 127 mappings
}
```

Components use `BaseIcon` or reference `chamiloIconToClass` to render icons consistently.

A browsable reference of all icons available in the platform can be found at `/admin/list-icons` in any running Chamilo instance.

## Component Patterns

* **Composition API** — Components use Vue 3's `<script setup>` syntax
* **PrimeVue integration** — Heavy use of PrimeVue components (Button, DataTable, Dialog, Menu, etc.)
* **Axios for API calls** — HTTP requests to the backend API
* **Vue I18n** — All user-facing text uses translation keys
