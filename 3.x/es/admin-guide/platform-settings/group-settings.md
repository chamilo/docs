# Configuración de grupos

Comportamiento de la herramienta **Grupos** del curso.

Acceda a estos ajustes en **Administración > Parámetros de configuración > Grupos**. Esta categoría contiene **4 ajustes**, enumerados a continuación con el título y el comentario incluidos en los fixtures de ajustes de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `allow_group_categories`

**Categorías de grupos**

¿Permitir que los docentes creen categorías en la herramienta Grupos?

*Valor predeterminado: `false`*


### `allow_invite_non_friends_to_social_groups`

**Permitir invitar a no amigos a grupos sociales**

Solo un administrador de la plataforma o el administrador/moderador de un grupo social puede invitar personas a él (**Red social > Grupos >** el grupo **> Invitar amigos**). Este ajuste controla a quién pueden invitar.

* **Desactivado (predeterminado)** — el administrador o moderador del grupo solo puede invitar a sus propios amigos confirmados. El formulario de invitación enumera únicamente a esos amigos, y el servidor también rechaza a cualquier otro usuario, incluso si se envía manualmente: se muestra una advertencia «Algunos de los usuarios seleccionados no pueden ser invitados y se omitieron». Las solicitudes de amistad pendientes no cuentan como amigos.
* **Activado** — también pueden invitar a cualquier otro usuario de la plataforma. Aparece un campo de búsqueda adicional **Usuarios** debajo de la lista de amigos del formulario de invitación.

La misma regla se aplica a la pantalla de invitación a grupos de la nueva interfaz social.

Variable: `group.allow_invite_non_friends_to_social_groups`

**Instalaciones existentes:** la fila del ajuste se crea volviendo a ejecutar la migración de sincronización de ajustes (`doctrine:migrations:execute 'Chamilo\CoreBundle\Migrations\Schema\V310\Version20261023140000' --up`). Hasta entonces, el ajuste se comporta como «Desactivado» y no aparece en la página de administración.

*Valor predeterminado: `false`*


### `hide_course_group_if_no_tools_available`

**Ocultar el grupo del curso si no hay herramienta**

Si no hay ninguna herramienta disponible en un grupo y el usuario no está inscrito en el propio grupo, ocultar el grupo por completo en la lista de grupos.

*Valor predeterminado: `false`*


### `show_groups_to_users`

**Mostrar las clases a los usuarios**

Mostrar las clases a los usuarios. Las clases son una función que permite inscribir o dar de baja grupos de usuarios en una sesión o un curso directamente, reduciendo la carga administrativa. Al elegir esta opción, los estudiantes podrán ver a qué clase pertenecen a través de su interfaz de red social.

*Valor predeterminado: `false`*