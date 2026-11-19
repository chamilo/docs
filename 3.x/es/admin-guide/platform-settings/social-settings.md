# Configuración de la red social

Comportamiento de la **red social**: amigos, grupos, publicaciones en el muro y álbumes de fotos.

Acceda a estos ajustes en **Administración > Parámetros de configuración > Red social**. Esta categoría contiene **7 ajustes**, que se enumeran a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Relaciones múltiples entre usuarios

Un par de usuarios puede tener **más de un tipo de relación** al mismo tiempo. Por ejemplo, una amistad puede coexistir con una relación de supervisión (`BOSS`); registrar un tipo no debe sustituir al otro, y añadir la misma relación dos veces no debe crear registros duplicados. Esto se corrigió en el [PR #9202](https://github.com/chamilo/chamilo-lms/pull/9202) (incidencia #2246).

No se trata de un nuevo ajuste de la red social ni de una promoción automática de los privilegios de usuario. Los tipos de relación, el rol del usuario en la plataforma y los permisos de acceso son conceptos distintos. Al investigar contactos sociales o vínculos de supervisión ausentes tras una actualización, compruebe el tipo de relación adecuado en lugar de asumir que solo puede existir una relación entre dos cuentas.

## Ajustes

### `allow_social_tool`

**Herramienta de red social (similar a Facebook)**

La herramienta de red social permite a los usuarios definir relaciones con otros usuarios y, de este modo, definir grupos de amigos. Combinada con la herramienta de mensajería interna, esta herramienta permite una comunicación estrecha con los amigos, dentro del entorno del portal.

*Valor predeterminado: `true`*

### `allow_students_to_create_groups_in_social`

**Permitir a los estudiantes crear grupos en la red social**

Permitir a los estudiantes crear grupos en la red social

*Valor predeterminado: `false`*


### `disable_dislike_option`

**Desactivar «no me gusta» en las publicaciones sociales**

Elimina la opción de pulgar hacia abajo para la valoración de las publicaciones sociales. Solo se conserva el pulgar hacia arriba (me gusta).

*Valor predeterminado: `false`*

### `hide_social_groups_block`

**Ocultar el bloque de grupos en la red social**

Elimina la sección de grupos de la vista de la red social.

*Valor predeterminado: `false`*


### `social_enable_messages_feedback`

**Me gusta/No me gusta en las publicaciones sociales**

Permite a los usuarios añadir valoraciones (me gusta o no me gusta) a las publicaciones del muro social.

*Valor predeterminado: `false`*

### `social_make_teachers_friend_all`

**Los docentes y administradores aparecen como amigos de los estudiantes en la red social**

Hace que los docentes y administradores aparezcan automáticamente como amigos de todos los estudiantes en el módulo de red social.

*Valor predeterminado: `false`*


### `social_show_language_flag_in_profile`

**Mostrar la bandera del idioma junto al avatar en la red social**

Muestra la preferencia de idioma del usuario como un icono de bandera junto a su avatar en los perfiles de la red social.

*Valor predeterminado: `false`*