# Componentes Vue

Chamilo cuenta con un amplio conjunto de componentes Vue organizados por área de funcionalidad en `assets/vue/components/`.

## Componentes Base

La familia `Base*` en `assets/vue/components/basecomponents/` envuelve los primitivos de PrimeVue con configuraciones predeterminadas específicas de Chamilo (diseño FloatLabel, íconos MDI a través de `chamiloIconToClass`, mensajes de validación consistentes, dimensionamiento con Tailwind). Siempre opta por un componente `Base*` antes de importar el componente subyacente de PrimeVue; así se mantiene la consistencia de la interfaz de usuario en toda la SPA y los cambios de diseño pueden implementarse desde un solo lugar.

Los componentes **no** están registrados globalmente (el único primitivo de PrimeVue registrado globalmente es `Column`, utilizado dentro de `BaseTable`). Importa cada uno de manera explícita:

```js
import BaseButton from "@/components/basecomponents/BaseButton.vue"
import BaseDialog from "@/components/basecomponents/BaseDialog.vue"
```

---
### Campos de formulario

La mayoría acepta el valor a través de `v-model`, expone las propiedades `id` + `label` para accesibilidad y vinculación de etiquetas flotantes, y muestra la validación mediante un par `isInvalid` / `errorText` (o `messageText`).

| Componente                        | Envuelve                                             | Propósito                                                                                                                                                                                            |
|-----------------------------------|------------------------------------------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseInputText.vue`              | `InputText` + `FloatLabel`                           | Entrada de texto de una sola línea. Cambia a una etiqueta estática para entradas de tipo `date`/`time`/`datetime-local` (donde la etiqueta flotante se superpondría al marcador de posición nativo). |
| `BaseInputTextWithVuelidate.vue` | `BaseInputText`                                      | Adaptador ligero para Vuelidate: reenvía `$error` a `isInvalid` y renderiza `$errors[].$message` en el slot `errors`. Úselo con un objeto de campo de Vuelidate.                                    |
| `BaseTextArea.vue`               | `Textarea` + `FloatLabel`                            | Entrada de texto de varias líneas.                                                                                                                                                                   |
| `BaseTextAreaWithVuelidate.vue`  | `BaseTextArea`                                       | Mismo patrón de adaptador de Vuelidate que `BaseInputTextWithVuelidate`.                                                                                                                             |
| `BaseInputNumber.vue`            | `InputNumber`                                        | Entrada numérica con `min` / `max` / `step` y botones de incremento/decremento.                                                                                                                      |
| `BaseInputTags.vue`              | (personalizado)                                      | Etiquetas de texto libre; las etiquetas se añaden al presionar enter o coma y se eliminan con retroceso.                                                                                            |
| `BaseInputGroup.vue`             | `InputGroup` + `BaseButton`                          | Entrada de texto combinada con un botón de acción (estilo búsqueda).                                                                                                                                |
| `BaseCheckbox.vue`               | `Checkbox`                                           | Casilla de verificación binaria o vinculada a un valor con etiqueta.                                                                                                                                 |
| `BaseRadioButtons.vue`           | `RadioButton`                                        | Grupo de botones de radio impulsado por un arreglo `options: [{label, value}]`.                                                                                                                      |
| `BaseToggleButton.vue`           | `BaseButton`                                         | Botón de dos estados (etiquetas e iconos de encendido/apagado) vinculado a través de `v-model`.                                                                                                     |
| `BaseCalendar.vue`               | `DatePicker` + `FloatLabel`                          | Selector de fecha o fecha-hora. Respeta `platform.timepicker_increment` y la configuración regional del usuario a través de `calendarLocales`.                                                      |
| `BaseColorPicker.vue`            | nativo `<input type="color">` + `InputText`          | Selector de color con respaldo de texto hexadecimal; utiliza `colorjs.io` para validar la entrada manual de hexadecimal.                                                                            |
| `BaseRating.vue`                 | `Rating`                                             | Entrada de calificación con estrellas.                                                                                                                                                               |
| `BaseFileUpload.vue`             | nativo `<input type="file">` + `BaseButton`          | Selector de un solo archivo que activa un botón de estilo adjunto.                                                                                                                                   |
| `BaseFileUploadMultiple.vue`     | nativo `<input type="file" multiple>` + `BaseButton` | Variante de múltiples archivos de `BaseFileUpload`.                                                                                                                                                  |
| `BaseUploader.vue`               | Uppy `Dashboard`                                     | Cargador completo de Uppy (cámara web, audio, editor de imágenes, carga XHR) con configuraciones regionales vinculadas al `appLocale` actual. Úselo para cargas enriquecidas con progreso; use `BaseFileUpload*` para adjuntos simples. |

---
### Selección y autocompletado

| Componente              | Envuelve                        | Propósito                                                                                                                           |
|-------------------------|---------------------------------|-------------------------------------------------------------------------------------------------------------------------------------|
| `BaseSelect.vue`        | `Dropdown` + `FloatLabel`       | Menú desplegable de selección única con botón de limpieza opcional.                                                                 |
| `BaseMultiSelect.vue`   | `MultiSelect` + `FloatLabel`    | Menú desplegable de selección múltiple que muestra los elementos seleccionados como fichas.                                        |
| `BaseSearchSelect.vue`  | `Dropdown` con `filter`         | Menú desplegable de selección única con cuadro de búsqueda integrado, desplazamiento virtual opcional y plantilla de opción de dos líneas (`label` + `sublabel`). |
| `BaseAutocomplete.vue`  | `AutoComplete`                  | Autocompletado asíncrono (mínimo de 3 caracteres). Admite selección única o múltiple y un slot `chip` para personalizar las fichas. |
| `BaseUserFinder.vue`    | `BaseTable` + `userService`     | Tabla de búsqueda de usuarios paginada con selección de filas. Úselo cuando una funcionalidad requiera un selector de usuarios estilo administrador. |

### Botones y acciones

| Componente                        | Envuelve               | Propósito                                                                                                                                                                                                                                                                                                                                                     |
|-----------------------------------|---------------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseButton.vue`                  | `Button` (PrimeVue) | Botón estándar de Chamilo. Resuelve iconos a través de `chamiloIconToClass`, normaliza `type` a `severity`/`variant` de PrimeVue, renderiza un `BaseAppLink` interno cuando se proporciona un `route` o `toUrl` (por lo que el mismo componente maneja casos de router-link, anchor y botón simple). Los valores aceptados para `type` están listados en `validators.js` → `buttonTypeValidator`. |
| `BaseAdvancedSettingsButton.vue`  | `BaseButton`        | Botón de divulgación que alterna un panel de "configuraciones avanzadas" mediante `v-model`.                                                                                                                                                                                                                                                                 |
| `BaseToolbar.vue`                 | `Toolbar`           | Barra de herramientas de acción con slots `start` / `end` (o un slot predeterminado único). Opcional `showTopBorder` para estilo de separador.                                                                                                                                                                                                               |

---
### Visualización y datos

| Componente            | Envuelve                    | Propósito                                                                                                                                                                                         |
|-----------------------|-----------------------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTable.vue`       | `DataTable` (PrimeVue)      | Tabla de datos estándar de Chamilo. Soporta modo de servidor (`lazy`), ordenación por múltiples columnas, filtro global, selección de filas y paginación. Pasa las columnas como hijos `<Column>` (registrados globalmente). |
| `BaseCard.vue`        | `Card`                      | Envoltura de tarjeta que reenvía los slots `header`, `title`, `subtitle`, `footer` y el slot predeterminado (contenido).                                                                          |
| `BaseChart.vue`       | `Chart`                     | Preajuste de gráfico circular. Pasa un objeto `data` compatible con Chart.js.                                                                                                                    |
| `BaseChip.vue`        | `Chip`                      | Chip renderizado a partir de un objeto `{value, labelField, imageField}`, con botón de eliminación opcional.                                                                                     |
| `BaseTag.vue`         | `Tag`                       | Etiqueta de color. Mapea el `warning` de Chamilo al `warn` de PrimeVue.                                                                                                                         |
| `BaseAvatarList.vue`  | `Avatar` + `BaseUserAvatar` | Fila de avatares con contador de desbordamiento (por ejemplo, "+3"); impulsado por `useAvatarList`.                                                                                             |
| `BaseUserAvatar.vue`  | `Avatar`                    | Avatar de usuario con imagen de respaldo, estado de carga y etiqueta accesible.                                                                                                                 |
| `BaseIcon.vue`        | `<i class="mdi …">`         | Renderizador de iconos de Chamilo. Añade una insignia opcional (texto o icono), tooltip y modificador de tamaño. Siempre pasa un nombre semántico de Chamilo (por ejemplo, `"edit"`), no una clase MDI directa. |
| `BaseIconField.vue`   | `IconField` + `InputText`   | Campo de búsqueda con un icono de lupa al inicio.                                                                                                                                               |
| `BaseDivider.vue`     | `Divider`                   | Divisor horizontal o vertical, con título y alineación opcionales.                                                                                                                              |

### Navegación y menús

| Componente                 | Envuelve                | Propósito                                                                                                                                                                                 |
|----------------------------|-------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseMenu.vue`             | `Menu` (popup)          | Menú emergente que entiende rutas de enrutador dentro de los elementos `model[]`.                                                                                                         |
| `BaseDropdownMenu.vue`     | (personalizado)         | Desencadenador de menú desplegable ligero con coordinación de apertura única (abrir uno cierra los demás).                                                                               |
| `BaseContextMenu.vue`      | (personalizado)         | Menú contextual de clic derecho / posicionado, controlado por `visible` + `position`.                                                                                                    |
| `BaseSidebarPanelMenu.vue` | `PanelMenu`             | Menú de navegación estilo acordeón utilizado en barras laterales; rastrea automáticamente las claves expandidas desde el modelo.                                                          |
| `BaseRouteTabs.vue`        | Fila de `BaseAppLink`   | Barra de pestañas donde cada pestaña es un enlace de enrutador. La pestaña activa se resalta automáticamente según la ruta actual.                                                       |
| `BaseAppLink.vue`          | `RouterLink` *o* `<a>` | Enlace inteligente: renderiza un `<a>` cuando se establece `url` (externo/legado), de lo contrario un `<RouterLink>` de Vue Router. Úsalo en lugar de cualquiera de los primitivos para que el enlace interno/externo sea uniforme. |

---
### Diálogos

`BaseDialog` es la base; los otros se construyen sobre él para los flujos comunes de confirmación/cancelación y eliminación.

| Componente                     | Envuelve                  | Propósito                                                                                                                             |
|-------------------------------|---------------------------|---------------------------------------------------------------------------------------------------------------------------------------|
| `BaseDialog.vue`              | `Dialog`                  | Diálogo modal con un encabezado titulado (opcional `headerIcon`) y cuerpo/pie de página insertados. El estado abierto es un `defineModel("isVisible")`. |
| `BaseDialogConfirmCancel.vue` | `BaseDialog`              | Modal de confirmación/cancelación con dos botones. Tipo de confirmación configurable (`type`, severidad) e `icon`; emite `confirmClicked` / `cancelClicked`. |
| `BaseDialogDelete.vue`        | `BaseDialogConfirmCancel` | Modal predefinido "¿Está seguro de que desea eliminar este elemento?" con un botón de confirmación estilizado como peligro.          |

### Editor y contenido enriquecido

| Componente            | Envuelve                                           | Propósito                                                                                                                                                              |
|----------------------|-------------------------------------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTinyEditor.vue` | TinyMCE (a través de `components/Editor` del proyecto) | Editor de texto enriquecido con `FloatLabel`, seguimiento de estado de enfoque/vacío e integración con el contexto del curso actual (`cidReq`). Úselo para cualquier campo HTML creado por el usuario. |

### Ayudantes

| Archivo              | Propósito                                                                                                                                                                                                                                                          |
|----------------------|--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `ChamiloIcons.js`    | Mapea nombres de íconos semánticos (`edit`, `delete`, `eye-on`, `courses`, …) a clases CSS de MDI. Aproximadamente 127 entradas. Navegue por ellos en `/admin/list-icons` en una instancia en ejecución.                                                      |
| `validators.js`      | Validadores de propiedades compartidos: `iconValidator` (debe ser un nombre de ícono conocido de Chamilo), `sizeValidator` (`normal` / `small` / `large`), `buttonTypeValidator` (tipos permitidos de `BaseButton`). Impórtelos al definir nuevos componentes `Base*` que sigan estas convenciones. |

### Convenciones en los componentes Base

* **v-model mediante `defineModel()`** — el valor (y frecuentemente `isVisible`, `filters`, `selectedItems`) se exponen como modelos; páselos con `v-model[:name]` en lugar de `:prop` + `@update:prop`.
* **Etiquetas flotantes** — la mayoría de los campos de formulario envuelven su entrada en PrimeVue `FloatLabel variant="on"`. Proporcione `label` (el texto mostrado) e `id` (usado para vincular el `<label for>`).
* **Mensajes de validación** — los campos exponen `isInvalid` y un pequeño mensaje debajo de la entrada (`errorText`, `messageText` o `smallText` dependiendo del componente). Existen variantes compatibles con Vuelidate para los más comunes.
* **Íconos** — pase nombres semánticos de Chamilo, no clases MDI sin procesar. Los componentes los resuelven a través de `chamiloIconToClass`.
* **Tamaño** — `size="normal" | "small" | "large"` es la propiedad de tamaño convencional (ver `sizeValidator`).
* **Composición sobre duplicación** — `BaseDialogDelete` envuelve a `BaseDialogConfirmCancel`, que a su vez envuelve a `BaseDialog`; `BaseToggleButton` y `BaseAdvancedSettingsButton` envuelven a `BaseButton`. Cuando necesite una variante recurrente de un componente existente, prefiera componer un nuevo `Base*` encima en lugar de reimplementarlo en una carpeta de características.

## Componentes de Diseño

Ubicados en `components/layout/`:

| Componente | Propósito |
|-----------|-----------|
| `DashboardLayout.vue` | Diseño principal: barra superior + barra lateral + área de contenido |
| `Sidebar.vue` | Panel de navegación izquierdo (colapsable) |
| `TopbarLoggedIn.vue` | Barra superior con logotipo, bandeja de entrada, avatar |

## Componentes de Áreas de Funcionalidad

| Directorio | Componentes | Propósito |
|-----------|-----------|---------|
| `course/` | Tarjetas de curso, filtros de catálogo, formularios de curso | Listado y gestión de cursos |
| `session/` | Tarjetas de sesión, catálogo | Listado de sesiones |
| `assignments/` | Listas de entregas, modales de calificación, formularios | Flujo de trabajo de tareas |
| `chat/` | DockedChat, mensajes de chat | Chat en tiempo real y tutor de IA |
| `filemanager/` | CourseDocuments, PersonalFiles | Navegador y gestión de archivos |
| `installer/` | Step1-Step7, EmailSettings | Asistente de instalación |
| `social/` | GroupInfoCard, publicaciones sociales | Funcionalidades de red social |
| `attendance/` | AttendanceTable | Seguimiento de asistencia |
| `usergroup/` | GroupMembers | Gestión de grupos de usuarios |

## Sistema de Iconos

Los iconos utilizan **Material Design Icons (MDI)** como la única biblioteca de iconos: `<i class="mdi mdi-pencil"></i>`

El archivo `ChamiloIcons.js` proporciona un mapeo semántico:

```javascript
export const chamiloIconToClass = {
  "edit": "mdi mdi-pencil",
  "delete": "mdi mdi-delete",
  "eye-on": "mdi mdi-eye",
  "courses": "mdi mdi-book-open-page-variant",
  // ... 127 mappings
}
```

Los componentes utilizan `BaseIcon` o hacen referencia a `chamiloIconToClass` para renderizar iconos de manera consistente.

Una referencia navegable de todos los iconos disponibles en la plataforma se puede encontrar en `/admin/list-icons` en cualquier instancia de Chamilo en ejecución.

## Patrones de Componentes

* **Composition API** — Los componentes utilizan la sintaxis `<script setup>` de Vue 3
* **Integración con PrimeVue** — Uso intensivo de componentes de PrimeVue (Button, DataTable, Dialog, Menu, etc.)
* **Axios para llamadas a la API** — Solicitudes HTTP a la API del backend
* **Vue I18n** — Todo el texto visible para el usuario utiliza claves de traducción