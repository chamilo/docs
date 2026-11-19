# Configuración del chat

Comportamiento de la herramienta **Chat** del curso.

Acceda a estos ajustes en **Administración > Parámetros de configuración > Chat**. Esta categoría contiene **5 ajustes**, que se enumeran a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Utilícelo al automatizar mediante la API o cuando necesite modificar estos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `allow_global_chat`

**Permitir el chat global**

Los usuarios pueden conversar entre sí

*Valor predeterminado: `false`*

### `course_chat_restrict_to_coach`

**Restringir el chat del curso a los tutores**

Permitir únicamente que los estudiantes hablen con los tutores del curso (no con otros estudiantes).

*Valor predeterminado: `false`*

### `hide_chat_video`

**Ocultar la opción de videollamada en el chat global**

Cuando está activado, la funcionalidad de videollamada se deshabilita y no está disponible en la herramienta de chat global.

*Valor predeterminado: `true`*

El valor predeterminado `true` oculta la acción **Iniciar videollamada** en el **chat flotante de la plataforma**. Establézcalo en `false` para habilitar las llamadas WebRTC uno a uno en los navegadores compatibles; los usuarios también deben tener acceso al chat de la plataforma, haber iniciado sesión y disponer de permisos de cámara y micrófono en funcionamiento. Esto **no** es la integración de videoconferencia de curso de BigBlueButton ni de Zoom. Consulte [Videollamadas uno a uno](../../student-guide/video-calls.md) para el flujo de trabajo del estudiante (incidencia [#3777](https://github.com/chamilo/chamilo-lms/issues/3777)).


### `save_private_conversations_in_documents`

**Guardar las conversaciones privadas en documentos**

Si está activado, los mensajes del chat privado 1:1 se reflejarán en los documentos del historial del chat del curso. Se recomienda mantenerlo desactivado por motivos de privacidad.

*Valor predeterminado: `false`*

### `show_chat_folder`

**Mostrar la carpeta de historial de las conversaciones del chat**

Esto mostrará al docente la carpeta que contiene todas las sesiones realizadas en el chat; el docente puede hacerlas visibles o no para los estudiantes y utilizarlas como recurso

*Valor predeterminado: `true`*