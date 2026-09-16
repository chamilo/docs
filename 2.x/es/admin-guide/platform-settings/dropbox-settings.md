# Configuración de Dropbox

Comportamiento de la herramienta de intercambio de archivos **Dropbox**.

Acceda a estas configuraciones en **Administración > Configuraciones de configuración > Dropbox**. Esta categoría contiene **8 configuraciones**, enumeradas a continuación con el título y el comentario incluidos en los datos de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en fuente monoespaciada. Úselo cuando realice scripts a través de la API o cuando necesite cambiar estas configuraciones a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configuraciones

### `dropbox_allow_group`

**Dropbox: permitir grupo**

Los usuarios pueden enviar archivos a grupos

*Predeterminado: `true`*

### `dropbox_allow_just_upload`

**Dropbox: ¿Subir al espacio personal de Dropbox?**

Permitir a los formadores y usuarios subir documentos a su Dropbox sin enviar los documentos a sí mismos

*Predeterminado: `true`*

### `dropbox_allow_mailing`

**Dropbox: Permitir envío por correo**

Con la funcionalidad de correo, puede enviar a cada aprendiz un documento personal

*Predeterminado: `false`*

### `dropbox_allow_overwrite`

**Dropbox: ¿Se pueden sobrescribir los documentos?**

¿Se puede sobrescribir el documento original cuando un usuario o formador sube un documento con el nombre de un documento que ya existe? Si responde sí, perderá el mecanismo de versionado.

*Predeterminado: `true`*

### `dropbox_allow_student_to_student`

**Dropbox: Aprendiz <-> Aprendiz**

Permitir a los usuarios enviar documentos a otros usuarios (peer to peer). Los usuarios podrían usar esto también para documentos menos relevantes (mp3, soluciones de pruebas, ...). Si desactiva esta opción, los usuarios solo podrán enviar documentos al formador.

*Predeterminado: `true`*

### `dropbox_hide_course_coach`

**Dropbox: ocultar entrenador del curso**

Ocultar al entrenador del curso de la sesión en Dropbox cuando un documento es enviado por el entrenador a los estudiantes

*Predeterminado: `false`*

### `dropbox_hide_general_coach`

**Ocultar entrenador general en Dropbox**

Ocultar el nombre del entrenador general en la herramienta Dropbox cuando el entrenador general haya subido el archivo

*Predeterminado: `false`*

### `dropbox_max_filesize`

**Dropbox: Tamaño máximo de archivo de un documento**

¿Cuál es el tamaño máximo (en MB) que puede tener un documento en Dropbox?

*Predeterminado: `100000000`*