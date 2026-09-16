# Configuración del Chat

Comportamiento de la herramienta de **Chat** del curso.

Acceda a estas configuraciones en **Administración > Configuraciones de configuración > Chat**. Esta categoría contiene **5 configuraciones**, enumeradas a continuación con el título y el comentario incluidos en los datos de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monospace. Úselo cuando programe a través de la API o cuando necesite cambiar estas configuraciones a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configuraciones

### `allow_global_chat`

**Permitir chat global**

Los usuarios pueden chatear entre sí

*Predeterminado: `false`*

### `course_chat_restrict_to_coach`

**Restringir el chat del curso a los tutores**

Solo permite a los estudiantes hablar con los tutores del curso (no con otros estudiantes).

*Predeterminado: `false`*

### `hide_chat_video`

**Ocultar la opción de videochat en el chat global**

Cuando está habilitada, la funcionalidad de videochat se desactiva y no está disponible en la herramienta de chat global.

*Predeterminado: `true`*

### `save_private_conversations_in_documents`

**Guardar conversaciones privadas en documentos**

Si está habilitado, los mensajes de chat privado 1:1 se reflejarán en los documentos del historial de chat del curso. Se recomienda mantenerlo desactivado por privacidad.

*Predeterminado: `false`*

### `show_chat_folder`

**Mostrar la carpeta de historial de conversaciones de chat**

Esto mostrará al profesor la carpeta que contiene todas las sesiones realizadas en el chat; el profesor puede hacerlas visibles o no a los estudiantes y usarlas como recurso.

*Predeterminado: `true`*