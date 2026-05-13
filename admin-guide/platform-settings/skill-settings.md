# Configuración de Habilidades

Comportamiento del sistema de **Habilidades** — árbol de habilidades, reglas de asignación, integración con el perfil.

Acceda a estas configuraciones en **Administración > Configuraciones > Habilidades**. Esta categoría contiene **13 configuraciones**, listadas a continuación con el título y el comentario incluidos en los datos predefinidos de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monospace. Úselo cuando realice scripts a través de la API o cuando necesite cambiar estas configuraciones a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configuraciones

### `allow_hr_skills_management`

**Permitir la gestión de habilidades por RRHH**

Permite a Recursos Humanos gestionar habilidades.

*Predeterminado: `true`*

### `allow_private_skills`

**Ocultar habilidades a los estudiantes**

Si está habilitado, las habilidades solo serán visibles para administradores, profesores (relacionados con un usuario a través de un curso) y usuarios de RRHH (si están relacionados con un usuario).

*Predeterminado: `false`*

### `allow_skill_rel_items`

**Habilitar la vinculación de habilidades a elementos**

Esto activa una función importante que permite vincular cualquier elemento a una habilidad (y, como tal, permitir su adquisición). La función aún requiere que el profesor confirme la adquisición de la habilidad, por lo que la adquisición no es automática.

*Predeterminado: `false`*

### `allow_skills_tool`

**Permitir la herramienta de Habilidades**

Los usuarios pueden ver sus habilidades en la red social y en un bloque en la página de inicio.

*Predeterminado: `true`*

### `allow_teacher_access_student_skills`

**Permitir a los profesores acceder a las habilidades de los estudiantes**

[inferido] Permite a los instructores ver y monitorear las habilidades adquiridas por los estudiantes en sus cursos.

*Predeterminado: `false`*

### `badge_assignation_notification`

**Enviar notificación al estudiante cuando se adquiere una habilidad/insignia**

[inferido] Envía notificaciones a los estudiantes cuando adquieren una nueva habilidad o logro de insignia.

*Predeterminado: `false`*

### `hide_skill_levels`

**Ocultar la función de niveles de habilidad**

[inferido] Oculta la jerarquía de niveles de habilidad y las etiquetas de nivel en las vistas relacionadas con habilidades.

*Predeterminado: `false`*

### `manual_assignment_subskill_autoload`

**Asignación de habilidades a usuarios: carga automática de subhabilidades**

Al asignar manualmente habilidades a un usuario, el formulario puede configurarse para ofrecer automáticamente asignar una subhabilidad en lugar de la habilidad seleccionada.

*Predeterminado: `false`*

### `openbadges_backpack`

**URL del mochila de OpenBadges**

La URL del servidor de mochila de OpenBadges que se usará por defecto para todos los usuarios que deseen exportar sus insignias. Por defecto, se utiliza el repositorio gratuito y abierto de la Fundación Mozilla: https://backpack.openbadges.org/

### `show_full_skill_name_on_skill_wheel`

**Mostrar el nombre completo de la habilidad en la rueda de habilidades**

En la rueda de habilidades, muestra el nombre de la habilidad cuando tiene un código corto.

*Predeterminado: `false`*

### `skill_levels_names`

**Nombres de los niveles de habilidad**

Define nombres para los niveles de habilidades como un arreglo de id => nombre.

### `skills_hierarchical_view_in_user_tracking`

**Mostrar habilidades como una tabla jerárquica**

[inferido] Muestra las habilidades de los estudiantes como una estructura de árbol jerárquico en las páginas de progreso e informes.

*Predeterminado: `false`*

### `skills_teachers_can_assign_skills`

**Permitir a los profesores definir qué habilidades se adquieren a través de sus cursos**

Por defecto, solo los administradores pueden decidir qué habilidades se pueden adquirir a través de qué curso.

*Predeterminado: `false`*