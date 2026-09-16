# Configuración del chat

Comportamiento de la herramienta **Chat** del curso.

Acceda a estos ajustes en **Administración > Configuración > Chat**. Esta categoría contiene **5 ajustes**, enumerados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `allow_global_chat`

**Permitir el chat global**

Los usuarios pueden chatear entre sí

*Valor predeterminado: `false`*

### `course_chat_restrict_to_coach`

**Restringir el chat del curso a los tutores**

Solo permite que los estudiantes hablen con los tutores del curso (no con otros estudiantes).

*Valor predeterminado: `false`*

### `hide_chat_video`

**Ocultar la opción de videollamada en el chat global**

Cuando está activado, la funcionalidad de videollamada se deshabilita y no está disponible en la herramienta de chat global.

*Valor predeterminado: `true`*

### `save_private_conversations_in_documents`

**Guardar las conversaciones privadas en documentos**

Si está activado, los mensajes de chat privado 1:1 se replicarán en los documentos del historial de chat del curso. Se recomienda mantenerlo desactivado por privacidad.

*Valor predeterminado: `false`*

### `show_chat_folder`

**Mostrar la carpeta de historial de las conversaciones de chat**

Esto mostrará al profesor la carpeta que contiene todas las sesiones que se han realizado en el chat; el profesor puede hacerlas visibles o no para los alumnos y usarlas como recurso

*Valor predeterminado: `true`*