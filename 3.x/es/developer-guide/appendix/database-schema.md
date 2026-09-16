# Esquema de la base de datos

Chamilo 3.0 asigna un amplio conjunto de entidades de Doctrine a tablas de la base de datos. Los recuentos exactos varían entre versiones: consulte los directorios de entidades indicados a continuación para conocer el estado actual.

## Ubicaciones de las entidades

| Bundle | Dónde | Prefijo |
|--------|-------|--------|
| CoreBundle | `src/CoreBundle/Entity/` | Ninguno (p. ej., `user`, `course`, `session`) |
| CourseBundle | `src/CourseBundle/Entity/` | `c_` (p. ej., `c_document`, `c_quiz`, `c_lp`) |
| LtiBundle | `src/LtiBundle/Entity/` | `lti_` |

## Tablas clave

### Usuario y autenticación

| Tabla | Propósito |
|-------|---------|
| `user` | Cuentas de usuario |
| `access_url` | Portales multi-URL |
| `access_url_rel_user` | Asignaciones usuario-portal |
| `usergroup` | Grupos de usuarios de toda la plataforma |

### Cursos

| Tabla | Propósito |
|-------|---------|
| `course` | Cursos |
| `course_category` | Categorías de cursos |
| `course_rel_user` | Inscripciones en cursos |

### Sesiones

| Tabla | Propósito |
|-------|---------|
| `session` | Sesiones de formación |
| `session_rel_user` | Inscripciones en sesiones |
| `session_rel_course` | Cursos en sesiones |
| `session_rel_course_rel_user` | Inscripción de usuario por sesión-curso |

### Sistema de recursos

| Tabla | Propósito |
|-------|---------|
| `resource_node` | Abstracción unificada de contenido |
| `resource_file` | Archivos adjuntos |
| `resource_link` | Visibilidad/acceso por contexto |
| `resource_type` | Registro de tipos de recurso |

### Contenido de curso (prefijo c_)

| Tabla | Propósito |
|-------|---------|
| `c_document` | Documentos |
| `c_quiz` | Ejercicios/pruebas |
| `c_quiz_question` | Preguntas de cuestionario |
| `c_quiz_answer` | Respuestas a las preguntas |
| `c_lp` | Itinerarios de aprendizaje |
| `c_lp_item` | Elementos de itinerario de aprendizaje |
| `c_forum_category` | Categorías de foro |
| `c_forum_forum` | Foros |
| `c_forum_thread` | Hilos de foro |
| `c_forum_post` | Mensajes de foro |
| `c_student_publication` | Tareas/entregas |
| `c_survey` | Encuestas |
| `c_glossary` | Términos del glosario |
| `c_calendar_event` | Eventos de calendario |
| `c_attendance` | Hojas de asistencia |

### Seguimiento

| Tabla | Propósito |
|-------|---------|
| `track_e_login` | Seguimiento de inicios de sesión |
| `track_e_online` | Seguimiento de usuarios en línea |
| `track_e_default` | Seguimiento genérico de actividad |
| `gradebook_category` | Categorías del libro de calificaciones |
| `gradebook_result` | Calificaciones |

### Configuración

| Tabla | Propósito |
|-------|---------|
| `settings` | Ajustes de la plataforma |
| `settings_options` | Definiciones de opciones de ajuste |

## Migraciones

Los cambios en el esquema de la base de datos se gestionan mediante Doctrine Migrations en `src/CoreBundle/Migrations/`. Ejecute las migraciones con:

```bash
php bin/console doctrine:migrations:migrate
```