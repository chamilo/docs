# Configuración de Dropbox

Comportamiento de la herramienta de intercambio de archivos **Dropbox**.

Acceda a estos ajustes en **Administración > Configuración > Dropbox**. Esta categoría contiene **8 ajustes**, enumerados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `dropbox_allow_group`

**Dropbox: permitir grupo**

Los usuarios pueden enviar archivos a grupos

*Predeterminado: `true`*

### `dropbox_allow_just_upload`

**Dropbox: ¿Subir al propio espacio de Dropbox?**

Permitir a formadores y usuarios subir documentos a su Dropbox sin enviarse los documentos a sí mismos

*Predeterminado: `true`*

### `dropbox_allow_mailing`

**Dropbox: Permitir envío por correo**

Con la funcionalidad de envío por correo puede enviar a cada alumno un documento personal

*Predeterminado: `false`*

### `dropbox_allow_overwrite`

**Dropbox: ¿Se pueden sobrescribir los documentos?**

¿Puede sobrescribirse el documento original cuando un usuario o formador sube un documento con el nombre de un documento que ya existe? Si responde que sí, pierde el mecanismo de versionado.

*Predeterminado: `true`*

### `dropbox_allow_student_to_student`

**Dropbox: Alumno <-> Alumno**

Permitir a los usuarios enviar documentos a otros usuarios (de igual a igual). Los usuarios podrían usar esto también para documentos menos relevantes (mp3, soluciones de exámenes, ...). Si lo desactiva, los usuarios solo podrán enviar documentos al formador.

*Predeterminado: `true`*

### `dropbox_hide_course_coach`

**Dropbox: ocultar tutor del curso**

Ocultar el tutor del curso de la sesión en Dropbox cuando un documento es enviado por el tutor a los estudiantes

*Predeterminado: `false`*

### `dropbox_hide_general_coach`

**Ocultar tutor general en Dropbox**

Ocultar el nombre del tutor general en la herramienta Dropbox cuando el tutor general subió el archivo

*Predeterminado: `false`*


### `dropbox_max_filesize`

**Dropbox: Tamaño máximo de archivo de un documento**

¿De qué tamaño (en MB) puede ser un documento de Dropbox?

*Predeterminado: `100000000`*