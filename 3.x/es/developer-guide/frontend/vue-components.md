# Componentes Vue

Chamilo dispone de un amplio conjunto de componentes Vue organizados por área funcional en `assets/vue/components/`.

## Componentes base

La familia `Base*` en `assets/vue/components/basecomponents/` envuelve primitivas de PrimeVue con valores predeterminados específicos de Chamilo (diseño FloatLabel, iconos MDI mediante `chamiloIconToClass`, mensajes de validación coherentes, dimensionado con Tailwind). Recurra siempre a un componente `Base*` antes de importar el de PrimeVue subyacente: así se mantiene la coherencia de la interfaz en toda la SPA y los cambios de diseño pueden desplegarse desde un único lugar.

Los componentes **no** se registran de forma global (la única primitiva de PrimeVue registrada globalmente es `Column`, utilizada dentro de `BaseTable`). Impórtelos de forma explícita:

```js
import BaseButton from "@/components/basecomponents/BaseButton.vue"
import BaseDialog from "@/components/basecomponents/BaseDialog.vue"
```

### Campos de formulario

La mayoría aceptan el valor mediante `v-model`, exponen las props `id` + `label` para la accesibilidad y el enlace de etiqueta flotante, y muestran la validación a través de un par `isInvalid` / `errorText` (o `messageText`).

| Componente                       | Envuelve                                             | Propósito                                                                                                                                                                                          |
|----------------------------------|------------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseInputText.vue`              | `InputText` + `FloatLabel`                           | Campo de texto de una sola línea. Cambia a una etiqueta estática para entradas `date`/`time`/`datetime-local` (donde la etiqueta flotante se superpondría al marcador de posición nativo).         |
| `BaseInputTextWithVuelidate.vue` | `BaseInputText`                                      | Adaptador ligero de Vuelidate: reenvía `$error` a `isInvalid` y renderiza `$errors[].$message` en el slot `errors`. Úselo junto con un objeto de campo de Vuelidate.                               |
| `BaseTextArea.vue`               | `Textarea` + `FloatLabel`                            | Campo de texto de varias líneas.                                                                                                                                                                   |
| `BaseTextAreaWithVuelidate.vue`  | `BaseTextArea`                                       | El mismo patrón de adaptador de Vuelidate que `BaseInputTextWithVuelidate`.                                                                                                                        |
| `BaseInputNumber.vue`            | `InputNumber`                                        | Campo numérico con `min` / `max` / `step` y botones de incremento.                                                                                                                                 |
| `BaseInputTags.vue`              | (personalizado)                                      | Chips de etiquetas de texto libre; las etiquetas se añaden con Intro/coma y se eliminan con Retroceso.                                                                                             |
| `BaseInputGroup.vue`             | `InputGroup` + `BaseButton`                          | Campo de texto emparejado con un botón de acción (estilo búsqueda).                                                                                                                                |
| `BaseCheckbox.vue`               | `Checkbox`                                           | Casilla de verificación binaria o vinculada a un valor, con etiqueta.                                                                                                                              |
| `BaseRadioButtons.vue`           | `RadioButton`                                        | Grupo de botones de opción impulsado por un array `options: [{label, value}]`.                                                                                                                     |
| `BaseToggleButton.vue`           | `BaseButton`                                         | Botón de dos estados (etiquetas e iconos de activado / desactivado) vinculado mediante `v-model`.                                                                                                  |
| `BaseCalendar.vue`               | `DatePicker` + `FloatLabel`                          | Selector de fecha / fecha-hora. Respeta `platform.timepicker_increment` y la configuración regional del usuario mediante `calendarLocales`.                                                        |
| `BaseColorPicker.vue`            | nativo `<input type="color">` + `InputText`          | Selector de color con respaldo de texto hexadecimal; usa `colorjs.io` para validar la entrada hexadecimal manual.                                                                                  |
| `BaseRating.vue`                 | `Rating`                                             | Campo de valoración por estrellas.                                                                                                                                                                 |
| `BaseFileUpload.vue`             | nativo `<input type="file">` + `BaseButton`          | Selector de un solo archivo que activa un botón de estilo adjunto.                                                                                                                                 |
| `BaseFileUploadMultiple.vue`     | nativo `<input type="file" multiple>` + `BaseButton` | Variante de varios archivos de `BaseFileUpload`.                                                                                                                                                   |
| `BaseUploader.vue`               | Uppy `Dashboard`                                     | Cargador completo de Uppy (cámara web, audio, editor de imágenes, carga XHR) con locales conectados al `appLocale` actual. Úselo para cargas enriquecidas con progreso; use `BaseFileUpload*` para adjuntos simples. |

### Selección y autocompletado

| Component              | Wraps                        | Purpose                                                                                                                           |
|------------------------|------------------------------|-----------------------------------------------------------------------------------------------------------------------------------|
| `BaseSelect.vue`       | `Dropdown` + `FloatLabel`    | Lista desplegable de selección única con botón opcional para borrar.                                                                                |
| `BaseMultiSelect.vue`  | `MultiSelect` + `FloatLabel` | Lista desplegable de selección múltiple que muestra los elementos seleccionados como chips.                                                                      |
| `BaseSearchSelect.vue` | `Dropdown` with `filter`     | Lista desplegable de selección única con cuadro de búsqueda integrado, desplazamiento virtual opcional y plantilla de opción de dos líneas (`label` + `sublabel`). |
| `BaseAutocomplete.vue` | `AutoComplete`               | Autocompletado asíncrono (mínimo de 3 caracteres). Admite selección única o múltiple y un slot `chip` para personalizar los chips.                  |
| `BaseUserFinder.vue`   | `BaseTable` + `userService`  | Tabla paginada de búsqueda de usuarios con selección de filas. Úsela cuando una funcionalidad necesite un selector de usuarios de estilo administrativo.                           |

### Botones y acciones

| Component                        | Wraps               | Purpose                                                                                                                                                                                                                                                                                                                                                     |
|----------------------------------|---------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseButton.vue`                 | `Button` (PrimeVue) | Botón estándar de Chamilo. Resuelve los iconos mediante `chamiloIconToClass`, normaliza `type` a `severity`/`variant` de PrimeVue y renderiza un `BaseAppLink` interno cuando se proporciona `route` o `toUrl` (de modo que el mismo componente cubre los casos de enlace de enrutador, ancla y botón simple). Los valores de `type` aceptados se enumeran en `validators.js` → `buttonTypeValidator`. |
| `BaseAdvancedSettingsButton.vue` | `BaseButton`        | Botón de revelación que alterna un panel ranurado de «ajustes avanzados» mediante `v-model`.                                                                                                                                                                                                                                                                           |
| `BaseToolbar.vue`                | `Toolbar`           | Barra de herramientas de acciones con slots `start` / `end` (o un único slot por defecto). `showTopBorder` opcional para el estilo de separador.                                                                                                                                                                                                                                       |

### Visualización y datos

| Component            | Wraps                       | Purpose                                                                                                                                                                                         |
|----------------------|-----------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTable.vue`      | `DataTable` (PrimeVue)      | Tabla de datos estándar de Chamilo. Admite modo del lado del servidor (`lazy`), ordenación por varias columnas, filtro global, selección de filas y paginación. Pase las columnas como hijos `<Column>` (registrados de forma global). |
| `BaseCard.vue`       | `Card`                      | Contenedor de tarjeta que reenvía los slots `header`, `title`, `subtitle`, `footer` y el slot predeterminado (contenido).                                                                                                |
| `BaseChart.vue`      | `Chart`                     | Preajuste de gráfico circular. Pase un objeto `data` compatible con Chart.js.                                                                                                                                     |
| `BaseChip.vue`       | `Chip`                      | Chip renderizado a partir de un objeto `{value, labelField, imageField}`, con botón de eliminación opcional.                                                                                                     |
| `BaseTag.vue`        | `Tag`                       | Etiqueta de color. Asigna el `warning` de Chamilo al `warn` de PrimeVue.                                                                                                                               |
| `BaseAvatarList.vue` | `Avatar` + `BaseUserAvatar` | Fila de avatares con contador de desbordamiento (p. ej., «+3»); impulsada por `useAvatarList`.                                                                                                                        |
| `BaseUserAvatar.vue` | `Avatar`                    | Avatar de usuario con imagen de respaldo, estado de carga y etiqueta accesible.                                                                                                                           |
| `BaseIcon.vue`       | `<i class="mdi …">`         | Renderizador de iconos de Chamilo. Añade una insignia opcional (texto o icono), un tooltip y un modificador de tamaño. Pase siempre un nombre semántico de Chamilo (p. ej. `"edit"`), no una clase MDI en bruto.                             |
| `BaseIconField.vue`  | `IconField` + `InputText`   | Campo de búsqueda con un icono de lupa a la izquierda.                                                                                                                                                     |
| `BaseDivider.vue`    | `Divider`                   | Separador horizontal o vertical, con título y alineación opcionales.                                                                                                                              |

### Navegación y menús

| Component                  | Wraps                   | Purpose                                                                                                                                                                                 |
|----------------------------|-------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseMenu.vue`             | `Menu` (popup)          | Menú emergente que interpreta rutas del enrutador dentro de los elementos de `model[]`.                                                                                                                       |
| `BaseDropdownMenu.vue`     | (custom)                | Disparador de menú desplegable ligero con coordinación de apertura única (al abrir uno se cierran los demás).                                                                                             |
| `BaseContextMenu.vue`      | (custom)                | Menú contextual de clic derecho / posicionado, controlado por `visible` + `position`.                                                                                                            |
| `BaseSidebarPanelMenu.vue` | `PanelMenu`             | Menú de navegación estilo acordeón usado en barras laterales; sigue automáticamente las claves expandidas a partir del modelo.                                                                                             |
| `BaseRouteTabs.vue`        | `BaseAppLink` row       | Barra de pestañas en la que cada pestaña es un enlace del enrutador. La pestaña activa se resalta automáticamente según la ruta actual.                                                                        |
| `BaseAppLink.vue`          | `RouterLink` *or* `<a>` | Enlace inteligente: renderiza un `<a>` cuando se establece `url` (externo/legado); en caso contrario, un `<RouterLink>` de Vue Router. Úselo en lugar de cualquiera de los primitivos para que los enlaces internos y externos se mantengan uniformes. |

### Diálogos

`BaseDialog` es la base; los demás se componen sobre él para los flujos habituales de confirmar/cancelar y eliminar.

| Component                     | Wraps                     | Purpose                                                                                                                             |
|-------------------------------|---------------------------|-------------------------------------------------------------------------------------------------------------------------------------|
| `BaseDialog.vue`              | `Dialog`                  | Diálogo modal con cabecera titulada (`headerIcon` opcional) y cuerpo/pie ranurados. El estado de apertura es un `defineModel("isVisible")`.      |
| `BaseDialogConfirmCancel.vue` | `BaseDialog`              | Modal de confirmar/cancelar con dos botones. `type` de confirmación configurable (severidad) e `icon`; emite `confirmClicked` / `cancelClicked`. |
| `BaseDialogDelete.vue`        | `BaseDialogConfirmCancel` | Modal preconstruido «¿Está seguro de que desea eliminar este elemento?» con un botón de confirmación con estilo de peligro.                                   |

### Editor y contenido enriquecido

| Component            | Wraps                                           | Purpose                                                                                                                                                              |
|----------------------|-------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTinyEditor.vue` | TinyMCE (via the project's `components/Editor`) | Editor de texto enriquecido con `FloatLabel`, seguimiento de foco/estado vacío e integración con el contexto del curso actual (`cidReq`). Úselo para cualquier campo HTML de autoría del usuario. |

### Ayudantes

| File              | Purpose                                                                                                                                                                                                                                                          |
|-------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `ChamiloIcons.js` | Asocia nombres semánticos de iconos (`edit`, `delete`, `eye-on`, `courses`, …) a clases CSS de MDI. ~127 entradas. Consúltelos en `/admin/list-icons` en una instancia en ejecución.                                                                                                  |
| `validators.js`   | Validadores de props compartidos: `iconValidator` (debe ser un nombre de icono de Chamilo conocido), `sizeValidator` (`normal` / `small` / `large`), `buttonTypeValidator` (tipos permitidos de `BaseButton`). Impórtelos al definir nuevos componentes `Base*` que sigan estas convenciones. |

### Convenciones en los componentes Base

* **v-model mediante `defineModel()`** — el valor (y con frecuencia `isVisible`, `filters`, `selectedItems`) se expone como modelos; páselos con `v-model[:name]` en lugar de `:prop` + `@update:prop`.
* **Etiquetas flotantes** — la mayoría de los campos de formulario envuelven su entrada en PrimeVue `FloatLabel variant="on"`. Proporcione `label` (el texto mostrado) e `id` (usado para vincular el `<label for>`).
* **Mensajes de validación** — los campos exponen `isInvalid` y un mensaje breve bajo la entrada (`errorText`, `messageText` o `smallText` según el componente). Existen variantes conscientes de Vuelidate para los más habituales.
* **Iconos** — pase nombres semánticos de Chamilo, no clases MDI en bruto. Los componentes los resuelven mediante `chamiloIconToClass`.
* **Tamaño** — `size="normal" | "small" | "large"` es la prop convencional de tamaño (véase `sizeValidator`).
* **Composición frente a duplicación** — `BaseDialogDelete` envuelve `BaseDialogConfirmCancel`, que envuelve `BaseDialog`; `BaseToggleButton` y `BaseAdvancedSettingsButton` envuelven `BaseButton`. Cuando necesite una variante recurrente de un componente existente, prefiera componer un nuevo `Base*` encima en lugar de reimplementarlo en una carpeta de funcionalidad.

## Componentes de diseño

Ubicados en `components/layout/`:

| Component | Purpose |
|-----------|---------|
| `DashboardLayout.vue` | Diseño principal: barra superior + barra lateral + área de contenido |
| `Sidebar.vue` | Panel de navegación izquierdo (plegable) |
| `TopbarLoggedIn.vue` | Barra superior con logotipo, bandeja de entrada y avatar |

## Componentes por área funcional

| Directory | Components | Purpose |
|-----------|-----------|---------|
| `course/` | Tarjetas de curso, filtros de catálogo, formularios de curso | Listado y gestión de cursos |
| `session/` | Tarjetas de sesión, catálogo | Listado de sesiones |
| `assignments/` | Listas de entregas, modales de calificación, formularios | Flujo de trabajo de tareas |
| `chat/` | DockedChat, mensajes de chat | Chat en tiempo real y tutor de IA |
| `filemanager/` | CourseDocuments, PersonalFiles | Explorador y gestión de archivos |
| `installer/` | Step1-Step7, EmailSettings | Asistente de instalación |
| `social/` | GroupInfoCard, publicaciones sociales | Funciones de red social |
| `attendance/` | AttendanceTable | Control de asistencia |
| `usergroup/` | GroupMembers | Gestión de grupos de usuarios |

## Sistema de iconos

Los iconos utilizan **Material Design Icons (MDI)** como única biblioteca de iconos: `<i class="mdi mdi-pencil"></i>`

El archivo `ChamiloIcons.js` proporciona una correspondencia semántica:

```javascript
export const chamiloIconToClass = {
  "edit": "mdi mdi-pencil",
  "delete": "mdi mdi-delete",
  "eye-on": "mdi mdi-eye",
  "courses": "mdi mdi-book-open-page-variant",
  // ... 127 mappings
}
```

Los componentes utilizan `BaseIcon` o hacen referencia a `chamiloIconToClass` para renderizar los iconos de forma coherente.

Puede consultarse una referencia navegable de todos los iconos disponibles en la plataforma en `/admin/list-icons` en cualquier instancia de Chamilo en ejecución.

## Patrones de componentes

* **Composition API** — Los componentes utilizan la sintaxis `<script setup>` de Vue 3
* **Integración con PrimeVue** — Uso intensivo de componentes de PrimeVue (Button, DataTable, Dialog, Menu, etc.)
* **Axios para llamadas a la API** — Peticiones HTTP a la API del backend
* **Vue I18n** — Todo el texto visible para el usuario utiliza claves de traducción