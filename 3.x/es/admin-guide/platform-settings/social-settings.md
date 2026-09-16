# Configuración de la red social

Comportamiento de la **red social**: amigos, grupos, publicaciones en el muro, álbumes de fotos.

Acceda a estos ajustes en **Administración > Configuración > Red social**. Esta categoría contiene **7 ajustes**, enumerados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `allow_social_tool`

**Herramienta de red social (similar a Facebook)**

La herramienta de red social permite a los usuarios definir relaciones con otros usuarios y, de ese modo, definir grupos de amigos. Combinada con la herramienta de mensajería interna, permite una comunicación estrecha con los amigos, dentro del entorno del portal.

*Valor predeterminado: `true`*

### `allow_students_to_create_groups_in_social`

**Permitir a los estudiantes crear grupos en la red social**

Permitir a los estudiantes crear grupos en la red social

*Valor predeterminado: `false`*


### `disable_dislike_option`

**Desactivar «no me gusta» en las publicaciones sociales**

Elimina la opción de pulgar hacia abajo en la retroalimentación de las publicaciones sociales. Conserva únicamente el pulgar hacia arriba (me gusta).

*Valor predeterminado: `false`*

### `hide_social_groups_block`

**Ocultar el bloque de grupos en la red social**

Quita la sección de grupos de la vista de la red social.

*Valor predeterminado: `false`*


### `social_enable_messages_feedback`

**Me gusta / No me gusta en las publicaciones sociales**

Permite a los usuarios añadir retroalimentación (me gusta o no me gusta) a las publicaciones del muro social.

*Valor predeterminado: `false`*

### `social_make_teachers_friend_all`

**Los profesores y administradores ven a los estudiantes como amigos en la red social**

Hace que los instructores y administradores aparezcan automáticamente como amigos de todos los estudiantes en el módulo de red social.

*Valor predeterminado: `false`*


### `social_show_language_flag_in_profile`

**Mostrar la bandera de idioma junto al avatar en la red social**

Muestra la preferencia de idioma del usuario como un icono de bandera junto a su avatar en los perfiles de la red social.

*Valor predeterminado: `false`*