# Configuración de competencias

Comportamiento del sistema de **Competencias** — árbol de competencias, reglas de otorgamiento, integración con el perfil.

Acceda a estos ajustes en **Administración > Configuración > Competencias**. Esta categoría contiene **13 ajustes**, listados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `allow_hr_skills_management`

**Permitir la gestión de competencias por RR. HH.**

Permite que RR. HH. gestione las competencias

*Predeterminado: `true`*


### `allow_private_skills`

**Ocultar las competencias a los estudiantes**

Si está habilitado, las competencias solo serán visibles para administradores, profesores (relacionados con un usuario a través de un curso) y usuarios de RR. HH. (si están relacionados con un usuario).

*Predeterminado: `false`*


### `allow_skill_rel_items`

**Habilitar la vinculación de competencias con elementos**

Esto activa una funcionalidad importante que permite vincular cualquier elemento a (y, por tanto, permitir la adquisición de) una competencia. La funcionalidad sigue requiriendo que el profesor confirme la adquisición de la competencia, por lo que la adquisición no es automática.

*Predeterminado: `false`*


### `allow_skills_tool`

**Permitir la herramienta Competencias**

Los usuarios pueden ver sus competencias en la red social y en un bloque de la página de inicio.

*Predeterminado: `true`*

### `allow_teacher_access_student_skills`

**Permitir que los profesores accedan a las competencias de los estudiantes**

[inferido] Permite a los instructores ver y supervisar las competencias adquiridas por los estudiantes en sus cursos.

*Predeterminado: `false`*


### `badge_assignation_notification`

**Enviar notificación al estudiante cuando se ha adquirido una competencia/insignia**

[inferido] Enviar notificaciones a los estudiantes cuando adquieren una nueva competencia o un logro de insignia.

*Predeterminado: `false`*


### `hide_skill_levels`

**Ocultar la funcionalidad de niveles de competencia**

[inferido] Ocultar la jerarquía de niveles de competencia y las etiquetas de nivel en las vistas relacionadas con competencias.

*Predeterminado: `false`*


### `manual_assignment_subskill_autoload`

**Asignación de competencias a un usuario: carga automática de subcompetencias**

Al asignar competencias a un usuario de forma manual, el formulario puede configurarse para ofrecerle automáticamente asignar una subcompetencia en lugar de la competencia que seleccionó.

*Predeterminado: `false`*


### `openbadges_backpack`

**URL de la mochila OpenBadges**

La URL del servidor de mochila OpenBadges que se usará de forma predeterminada para todos los usuarios que deseen exportar sus insignias. El valor predeterminado es el repositorio de mochila abierto y gratuito de la Mozilla Foundation: https://backpack.openbadges.org/

### `show_full_skill_name_on_skill_wheel`

**Mostrar el nombre completo de la competencia en la rueda de competencias**

En la rueda de competencias, muestra el nombre de la competencia cuando esta tiene un código corto.

*Predeterminado: `false`*


### `skill_levels_names`

**Nombres de los niveles de competencia**

Defina nombres para los niveles de competencias como un array de id => name.

### `skills_hierarchical_view_in_user_tracking`

**Mostrar las competencias como una tabla jerárquica**

[inferido] Mostrar las competencias del estudiante como una estructura de árbol jerárquica en las páginas de progreso e informes.

*Predeterminado: `false`*


### `skills_teachers_can_assign_skills`

**Permitir que los profesores definan qué competencias se adquieren a través de sus cursos**

De forma predeterminada, solo los administradores pueden decidir qué competencias se pueden adquirir a través de cada curso.

*Predeterminado: `false`*