# Configuración de Tareas (Work)

Valores predeterminados y comportamiento de la herramienta **Tareas (Publicaciones de estudiantes)**.

Acceda a estos ajustes en **Administración > Configuración > Tareas (Work)**. Esta categoría contiene **12 ajustes**, enumerados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `allow_compilatio_tool`

**Habilitar Compilatio**

Compilatio es un servicio antiplagio que compara el texto entre dos entregas e informa si existe una alta probabilidad de que el contenido (normalmente las tareas) no sea original.

*Predeterminado: `false`*

### `allow_my_student_publication_page`

**Habilitar la página Mis tareas**

[inferido] Habilita una página dedicada para que los estudiantes vean y gestionen sus propias tareas entregadas.

*Predeterminado: `false`*

### `allow_only_one_student_publication_per_user`

**Los estudiantes solo pueden subir una tarea**

[inferido] Restringe a los estudiantes a entregar solo una tarea por actividad, impidiendo múltiples entregas.

*Predeterminado: `false`*

### `allow_redirect_to_main_page_after_work_upload`

**Redirigir a la página principal de la herramienta de tareas tras la subida o un comentario**

Redirige a la lista de tareas después de subir una tarea o de añadir un comentario

*Predeterminado: `false`*

### `assignment_prevent_duplicate_upload`

**Impedir subidas duplicadas en las tareas**

[inferido] Impide que los estudiantes suban archivos idénticos para la misma entrega de tarea.

*Predeterminado: `false`*

### `block_student_publication_add_documents`

**Impedir añadir documentos a las tareas**

[inferido] Impide que los estudiantes añadan o adjunten documentos al entregar las tareas.

*Predeterminado: `false`*

### `block_student_publication_edition`

**Impedir la edición de las tareas**

[inferido] Impide que los estudiantes modifiquen o actualicen sus tareas entregadas después de la entrega inicial.

*Predeterminado: `false`*

### `block_student_publication_score_edition`

**Impedir que el profesor modifique las calificaciones de las tareas**

[inferido] Impide que los docentes cambien las calificaciones de las tareas una vez registradas.

*Predeterminado: `false`*

### `compilatio_tool`

**Configuración de Compilatio**

Configure aquí los datos de conexión de Compilatio.

### `considered_working_time`

**Habilitar el tiempo de esfuerzo para las tareas**

Esto permitirá a los profesores indicar un tiempo de esfuerzo estimado (en formato hh:mm:ss) para completar la tarea. Tras la entrega de la tarea y la aprobación del profesor (se asigna una calificación a la tarea), se asignará automáticamente al estudiante el tiempo correspondiente.

*Predeterminado: `work_time`*

### `force_download_doc_before_upload_work`

**Forzar la descarga del documento antes de subir la tarea**

Obliga a los usuarios a descargar el documento proporcionado en la definición de la tarea antes de poder subir su tarea.

*Predeterminado: `true`*

### `my_courses_show_pending_work`

**Mostrar un enlace a las tareas «pendientes» desde la página Mis cursos**

[inferido] Muestra un enlace o un recuento de las tareas pendientes en la página Mis cursos del estudiante para un acceso rápido.

*Predeterminado: `false`*