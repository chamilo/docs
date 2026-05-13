# Configuraciones de Tareas (Trabajos)

Valores predeterminados y comportamiento de la herramienta **Tareas (Publicaciones de Estudiantes)**.

Acceda a estas configuraciones en **Administración > Configuraciones de configuración > Tareas (Trabajos)**. Esta categoría contiene **12 configuraciones**, enumeradas a continuación con el título y el comentario incluidos en los datos de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en fuente monoespaciada. Úselo cuando realice scripts a través de la API o cuando necesite cambiar estas configuraciones a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configuraciones

### `allow_compilatio_tool`

**Habilitar Compilatio**

Compilatio es un servicio anti-trampas que compara texto entre dos entregas y reporta si existe una alta probabilidad de que el contenido (generalmente tareas) no sea auténtico.

*Predeterminado: `false`*

### `allow_my_student_publication_page`

**Habilitar página de Mis tareas**

[inferido] Habilita una página dedicada para que los estudiantes vean y gestionen sus tareas enviadas.

*Predeterminado: `false`*

### `allow_only_one_student_publication_per_user`

**Los estudiantes solo pueden subir una tarea**

[inferido] Restringe a los estudiantes a enviar solo una tarea por actividad, evitando múltiples entregas.

*Predeterminado: `false`*

### `allow_redirect_to_main_page_after_work_upload`

**Redirigir a la página principal de la herramienta de tareas después de subir o comentar**

Redirige a la lista de tareas después de subir una tarea o agregar un comentario.

*Predeterminado: `false`*

### `assignment_prevent_duplicate_upload`

**Evitar subidas duplicadas en tareas**

[inferido] Impide que los estudiantes suban archivos idénticos para la misma entrega de tarea.

*Predeterminado: `false`*

### `block_student_publication_add_documents`

**Impedir agregar documentos a las tareas**

[inferido] Impide que los estudiantes añadan o adjunten documentos al enviar tareas.

*Predeterminado: `false`*

### `block_student_publication_edition`

**Impedir la edición de tareas**

[inferido] Impide que los estudiantes modifiquen o actualicen sus tareas enviadas después de la entrega inicial.

*Predeterminado: `false`*

### `block_student_publication_score_edition`

**Impedir que el profesor modifique las calificaciones de las tareas**

[inferido] Impide que los instructores cambien las calificaciones de las tareas después de haberlas registrado.

*Predeterminado: `false`*

### `compilatio_tool`

**Configuraciones de Compilatio**

Configure los detalles de conexión de Compilatio aquí.

### `considered_working_time`

**Habilitar esfuerzo de tiempo para tareas**

Esto permitirá a los profesores asignar un tiempo estimado de esfuerzo (en formato hh:mm:ss) para completar la tarea. Al enviar la tarea y ser aprobada por el profesor (la tarea recibe una calificación), al estudiante se le asignará automáticamente el tiempo correspondiente.

*Predeterminado: `work_time`*

### `force_download_doc_before_upload_work`

**Forzar la descarga del documento antes de subir la tarea**

Obliga a los usuarios a descargar el documento proporcionado en la definición de la tarea antes de que puedan subir su tarea.

*Predeterminado: `true`*

### `my_courses_show_pending_work`

**Mostrar enlace a tareas 'pendientes' desde la página de Mis cursos**

[inferido] Muestra un enlace o conteo de tareas pendientes en la página de Mis Cursos del estudiante para un acceso rápido.

*Predeterminado: `false`*