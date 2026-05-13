# Configuración de la Red Social

Comportamiento de la **Red Social** — amigos, grupos, publicaciones en el muro, álbumes de fotos.

Acceda a estas configuraciones en **Administración > Configuraciones > Red Social**. Esta categoría contiene **7 configuraciones**, listadas a continuación con el título y el comentario incluidos en los datos predefinidos de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en fuente monoespaciada. Úselo cuando realice scripts a través de la API o cuando necesite cambiar estas configuraciones a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configuraciones

### `allow_social_tool`

**Herramienta de red social (similar a Facebook)**

La herramienta de red social permite a los usuarios definir relaciones con otros usuarios y, al hacerlo, crear grupos de amigos. Combinada con la herramienta de mensajería interna, esta herramienta permite una comunicación estrecha con amigos dentro del entorno del portal.

*Predeterminado: `true`*

### `allow_students_to_create_groups_in_social`

**Permitir a los estudiantes crear grupos en la red social**

Permite a los estudiantes crear grupos en la red social.

*Predeterminado: `false`*

### `disable_dislike_option`

**Desactivar la opción de 'no me gusta' para publicaciones sociales**

Elimina la opción de pulgar hacia abajo para la retroalimentación de publicaciones sociales. Solo se mantiene la opción de pulgar hacia arriba (me gusta).

*Predeterminado: `false`*

### `hide_social_groups_block`

**Ocultar el bloque de grupos en la red social**

Elimina la sección de grupos de la vista de la red social.

*Predeterminado: `false`*

### `social_enable_messages_feedback`

**Me gusta/No me gusta para publicaciones sociales**

Permite a los usuarios agregar retroalimentación (me gusta o no me gusta) a las publicaciones en el muro social.

*Predeterminado: `false`*

### `social_make_teachers_friend_all`

**Los profesores y administradores aparecen como amigos de los estudiantes en la red social**

Hace que los instructores y administradores aparezcan automáticamente como amigos de todos los estudiantes en el módulo de red social.

*Predeterminado: `false`*

### `social_show_language_flag_in_profile`

**Mostrar bandera de idioma junto al avatar en la red social**

Muestra la preferencia de idioma del usuario como un ícono de bandera junto a su avatar en los perfiles de la red social.

*Predeterminado: `false`*