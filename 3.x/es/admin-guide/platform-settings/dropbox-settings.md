# Configuración de Dropbox

Comportamiento de la herramienta de intercambio de archivos **Dropbox**.

Acceda a estos ajustes en **Administración > Parámetros de configuración > Dropbox**. Esta categoría contiene **10 ajustes**, enumerados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Utilícelo al crear scripts mediante la API o cuando necesite modificar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `dropbox_allow_group`

**Dropbox: permitir grupos**

Los usuarios pueden enviar archivos a grupos

*Valor predeterminado: `true`*

### `dropbox_allow_just_upload`

**Dropbox: ¿Cargar en el propio espacio de Dropbox?**

Permitir a formadores y usuarios cargar documentos en su Dropbox sin enviárselos a sí mismos

*Valor predeterminado: `true`*

### `dropbox_allow_mailing`

**Dropbox: permitir envío personalizado**

Con la funcionalidad de envío personalizado puede enviar a cada estudiante un documento personal

*Valor predeterminado: `false`*

### `dropbox_allow_overwrite`

**Dropbox: ¿Se pueden sobrescribir los documentos?**

¿Puede sobrescribirse el documento original cuando un usuario o un formador carga un documento con el nombre de un documento que ya existe? Si responde que sí, perderá el mecanismo de versionado.

*Valor predeterminado: `true`*

### `dropbox_allow_student_to_student`

**Dropbox: Estudiante <-> Estudiante**

Permitir a los usuarios enviar documentos a otros usuarios (entre pares). Los usuarios también podrían utilizarlo para documentos menos pertinentes (mp3, soluciones de pruebas, ...). Si lo desactiva, los usuarios solo podrán enviar documentos al formador.

*Valor predeterminado: `true`*

### `dropbox_hide_course_coach`

**Dropbox: ocultar tutor del curso**

Ocultar el tutor del curso de la sesión en Dropbox cuando el tutor envía un documento a los estudiantes

*Valor predeterminado: `false`*

### `dropbox_hide_general_coach`

**Ocultar el tutor general en Dropbox**

Ocultar el nombre del tutor general en la herramienta Dropbox cuando el tutor general ha cargado el archivo

*Valor predeterminado: `false`*


### `dropbox_max_filesize`

**Dropbox: tamaño máximo de archivo de un documento**

¿Qué tamaño (en MB) puede tener un documento de Dropbox?

*Valor predeterminado: `100000000`*

### `dropbox_user_quota_mb`

**Dropbox: cuota total de almacenamiento por usuario (MB)**

Tamaño combinado máximo de los archivos cargados por un único usuario en todos los cursos. Los destinatarios no incurren en un segundo cargo.

*Valor predeterminado: `0` (ilimitado)*

### `dropbox_course_quota_mb`

**Dropbox: cuota total de almacenamiento por curso (MB)**

Tamaño combinado máximo de los archivos de Dropbox de un curso, incluidas sus sesiones. Independiente de la cuota de curso de Documentos.

*Valor predeterminado: `0` (ilimitado)*

Consulte [PR de cuotas de almacenamiento #9358](https://github.com/chamilo/chamilo-lms/pull/9358).