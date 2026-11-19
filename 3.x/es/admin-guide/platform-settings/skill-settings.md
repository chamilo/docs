# Configuración de competencias

Comportamiento del sistema de **Competencias**: árbol de competencias, reglas de concesión e integración en el perfil.

Acceda a estos ajustes en **Administración > Parámetros de configuración > Competencias**. Esta categoría contiene **13 ajustes**, enumerados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `allow_hr_skills_management`

**Permitir la gestión de competencias por RR. HH.**

Permite a RR. HH. gestionar las competencias

*Valor predeterminado: `true`*


### `allow_private_skills`

**Ocultar las competencias a los estudiantes**

Si está activado, las competencias solo son visibles para los administradores, los docentes (relacionados con un usuario a través de un curso) y los usuarios de RR. HH. (si están relacionados con un usuario).

*Valor predeterminado: `false`*


### `allow_skill_rel_items`

**Activar la vinculación de competencias con elementos**

Esto activa una función importante que permite vincular cualquier elemento a una competencia (y, por tanto, permitir su adquisición). La función sigue exigiendo que el docente confirme la adquisición de la competencia, por lo que la adquisición no es automática.

*Valor predeterminado: `false`*


### `allow_skills_tool`

**Permitir la herramienta Competencias**

Los usuarios pueden ver sus competencias en la red social y en un bloque de la página de inicio.

*Valor predeterminado: `true`*

### `allow_teacher_access_student_skills`

**Permitir a los docentes acceder a las competencias de los estudiantes**

[inferido] Permitir a los instructores ver y supervisar las competencias adquiridas por los estudiantes en sus cursos.

*Valor predeterminado: `false`*


### `badge_assignation_notification`

**Enviar una notificación al estudiante cuando se haya adquirido una competencia o una insignia**

[inferido] Enviar notificaciones a los estudiantes cuando adquieran una nueva competencia o un logro de insignia.

*Valor predeterminado: `false`*


### `hide_skill_levels`

**Ocultar la función de niveles de competencia**

[inferido] Ocultar la jerarquía de niveles de competencia y las etiquetas de nivel en las vistas relacionadas con las competencias.

*Valor predeterminado: `false`*


### `manual_assignment_subskill_autoload`

**Asignación de competencias a un usuario: carga automática de subcompetencias**

Al asignar competencias manualmente a un usuario, elija el nivel de competencia nivel por nivel en el árbol de competencias en lugar de en una única lista. La primera lista solo muestra las competencias del primer nivel; al seleccionar una se añade una lista con sus subcompetencias, y así sucesivamente. La competencia asignada es la más profunda seleccionada, por lo que puede detenerse en cualquier nivel. Las competencias que no son adquiribles también se enumeran, para llegar a sus subcompetencias, pero no pueden asignarse. Las listas se etiquetan con los nombres definidos en `skill_levels_names`, cuando están definidos. Consulte [Asignación manual de competencias](../skills/managing-skills.md#manual-skill-assignment).

*Valor predeterminado: `false`*


### `openbadges_backpack`

**URL de la mochila OpenBadges**

La URL del servidor de mochila OpenBadges que se utilizará de forma predeterminada para todos los usuarios que deseen exportar sus insignias. De forma predeterminada, apunta al repositorio de mochila abierto y gratuito de la Mozilla Foundation: https://backpack.openbadges.org/

### `show_full_skill_name_on_skill_wheel`

**Mostrar el nombre completo de la competencia en la rueda de competencias**

En la rueda de competencias, muestra el nombre de la competencia cuando esta tiene un código corto.

*Valor predeterminado: `false`*


### `skill_levels_names`

**Nombres de los niveles de competencia**

Defina nombres para los niveles de competencia como un array de id => nombre.

### `skills_hierarchical_view_in_user_tracking`

**Mostrar las competencias como una tabla jerárquica**

[inferido] Mostrar las competencias del estudiante como una estructura de árbol jerárquico en las páginas de progreso e informes.

*Valor predeterminado: `false`*


### `skills_teachers_can_assign_skills`

**Permitir a los docentes definir qué competencias se adquieren a través de sus cursos**

De forma predeterminada, solo los administradores pueden decidir qué competencias pueden adquirirse a través de qué curso.

*Valor predeterminado: `false`*