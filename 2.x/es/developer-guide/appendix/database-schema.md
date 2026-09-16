# Esquema de la Base de Datos

Chamilo 2.0 mapea un amplio conjunto de entidades de Doctrine a tablas de base de datos. Los conteos exactos varían entre versiones; consulta los directorios de entidades listados a continuación para conocer el estado actual.

## Ubicación de las Entidades

| Bundle | Dónde | Prefijo |
|--------|-------|---------|
| CoreBundle | `src/CoreBundle/Entity/` | Ninguno (por ejemplo, `user`, `course`, `session`) |
| CourseBundle | `src/CourseBundle/Entity/` | `c_` (por ejemplo, `c_document`, `c_quiz`, `c_lp`) |
| LtiBundle | `src/LtiBundle/Entity/` | `lti_` |

## Tablas Clave

### Usuario y Autenticación

| Tabla | Propósito |
|-------|-----------|
| `user` | Cuentas de usuario |
| `access_url` | Portales multi-URL |
| `access_url_rel_user` | Asignaciones de usuario-portal |
| `usergroup` | Grupos de usuarios a nivel de plataforma |

### Cursos

| Tabla | Propósito |
|-------|-----------|
| `course` | Cursos |
| `course_category` | Categorías de cursos |
| `course_rel_user` | Inscripciones a cursos |

### Sesiones

| Tabla | Propósito |
|-------|-----------|
| `session` | Sesiones de formación |
| `session_rel_user` | Inscripciones a sesiones |
| `session_rel_course` | Cursos en sesiones |
| `session_rel_course_rel_user` | Inscripción de usuarios por sesión-curso |

### Sistema de Recursos

| Tabla | Propósito |
|-------|-----------|
| `resource_node` | Abstracción unificada de contenido |
| `resource_file` | Archivos adjuntos |
| `resource_link` | Visibilidad/acceso por contexto |
| `resource_type` | Registro de tipos de recursos |

### Contenido del Curso (prefijo c_)

| Tabla | Propósito |
|-------|-----------|
| `c_document` | Documentos |
| `c_quiz` | Ejercicios/pruebas |
| `c_quiz_question` | Preguntas de cuestionarios |
| `c_quiz_answer` | Respuestas a preguntas |
| `c_lp` | Rutas de aprendizaje |
| `c_lp_item` | Elementos de rutas de aprendizaje |
| `c_forum_category` | Categorías de foros |
| `c_forum_forum` | Foros |
| `c_forum_thread` | Hilos de foros |
| `c_forum_post` | Publicaciones en foros |
| `c_student_publication` | Tareas/entregas |
| `c_survey` | Encuestas |
| `c_glossary` | Términos de glosario |
| `c_calendar_event` | Eventos de calendario |
| `c_attendance` | Hojas de asistencia |

### Seguimiento

| Tabla | Propósito |
|-------|-----------|
| `track_e_login` | Seguimiento de inicios de sesión |
| `track_e_online` | Seguimiento de usuarios en línea |
| `track_e_default` | Seguimiento de actividad genérica |
| `gradebook_category` | Categorías de libro de calificaciones |
| `gradebook_result` | Calificaciones |

### Configuraciones

| Tabla | Propósito |
|-------|-----------|
| `settings` | Configuraciones de la plataforma |
| `settings_options` | Definiciones de opciones de configuración |

## Migraciones

Los cambios en el esquema de la base de datos se gestionan a través de Doctrine Migrations en `src/CoreBundle/Migrations/`. Ejecuta las migraciones con:

```bash
php bin/console doctrine:migrations:migrate
```