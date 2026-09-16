# Flujo de trabajo con Git

## Repositorio

El código fuente de Chamilo se aloja en GitHub: [github.com/chamilo/chamilo-lms](https://github.com/chamilo/chamilo-lms)

## Ramificación

* **`master`** — Rama principal de desarrollo
* Las ramas de funcionalidad se crean a partir de `master` para el desarrollo nuevo
* Las ramas de publicación se crean para las versiones estables

## Cómo contribuir un cambio

1. **Haga un fork** del repositorio en GitHub
2. **Clone** su fork en local
3. **Cree una rama** para su cambio: `git checkout -b feature/my-feature`
4. **Realice sus cambios** siguiendo las convenciones de código
5. **Haga commit** con mensajes claros y descriptivos
6. **Haga push** a su fork: `git push origin feature/my-feature`
7. **Cree una pull request** contra la rama `master`

## Mensajes de commit

Escriba mensajes de commit claros que expliquen **qué** y **por qué**:

```
Glossary: Add AI-assisted term generation

Teachers can now generate glossary terms using configured AI
providers. Supports configurable prompt and term count.
```

### Convención de prefijo de herramienta

La línea de asunto se antepone con la **herramienta o área** que el cambio afecta, seguida de dos puntos. Utilizamos una terminología breve y compartida para que el registro de cambios y `git log --oneline` puedan consultarse por herramienta. El prefijo es siempre la forma **singular** del nombre canónico de la herramienta.

Formato: `<Prefix>: <Imperative summary in the present tense>`

Ejemplos:

```
Document: Fix list for student view
Exercise: Prevent duplicate question titles within a quiz
Learnpath: Allow reordering chapters via drag and drop
Internal: Refactor ResourceNode hydration in the API normalizer
CI: Cache Composer downloads in the GitHub Actions workflow
```

Si un cambio abarca varias herramientas, elija la más afectada; los cambios realmente transversales que solo tocan la estructura del código (sin herramienta de usuario final) van bajo `Internal`. Los cambios solo de documentación (este sitio, el registro de cambios, los docblocks en línea pensados puramente como referencia) van bajo `Documentation`.

#### Prefijos permitidos

| Prefix               | Scope / notes                                                                        |
|----------------------|--------------------------------------------------------------------------------------|
| `Admin`              |                                                                                      |
| `Announcement`       |                                                                                      |
| `Attendance`         |                                                                                      |
| `Authentication`     |                                                                                      |
| `Blog`               |                                                                                      |
| `Calendar`           | No «Agenda»                                                                          |
| `Career`             |                                                                                      |
| `Catalogue`          | Catálogo de cursos y sesiones, incluidos los «cursos destacados» de la página de inicio |
| `Chat`               |                                                                                      |
| `CI`                 | Integración continua, pruebas automatizadas, etc.                                    |
| `Course description` |                                                                                      |
| `Course Progress`    | No «Thematic advance»                                                                |
| `Course settings`    |                                                                                      |
| `Cron`               |                                                                                      |
| `Dashboard`          |                                                                                      |
| `Display`            |                                                                                      |
| `Document`           |                                                                                      |
| `Documentation`      | Todo lo relacionado exclusivamente con documentar Chamilo o el código, el changelog, etc. |
| `Dropbox`            |                                                                                      |
| `Exercise`           | No «Quiz»                                                                            |
| `Extra Fields`       |                                                                                      |
| `Forum`              |                                                                                      |
| `Glossary`           |                                                                                      |
| `Gradebook`          | Incluye certificados                                                                 |
| `Group`              | Incluye grupos de curso, grupos globales y clases                                    |
| `Help`               |                                                                                      |
| `Hook`               | Para el mecanismo interno de hooks                                                   |
| `Install`            | Incluye lo relativo a actualizaciones                                                |
| `Internal`           | Para cambios y correcciones que afectan principalmente al propio código o son de naturaleza muy global |
| `Language`           |                                                                                      |
| `Link`               |                                                                                      |
| `Learnpath`          | Para LP / itinerarios de aprendizaje                                                 |
| `Maintenance`        | La herramienta de mantenimiento de cursos: copias de curso, copia de seguridad, restauración, etc. |
| `Message`            |                                                                                      |
| `Notebook`           |                                                                                      |
| `Optimization`       |                                                                                      |
| `Portfolio`          |                                                                                      |
| `Privacy`            |                                                                                      |
| `Script`             | Para lo que reside en `tests/scripts/`                                               |
| `Search`             | Búsqueda de texto completo                                                           |
| `Security`           |                                                                                      |
| `Session`            |                                                                                      |
| `Skill`              |                                                                                      |
| `Social`             | Red social                                                                           |
| `SSO`                | Métodos de inicio de sesión único                                                    |
| `Survey`             |                                                                                      |
| `System`             | Aspectos relacionados principalmente con el alojamiento y el ajuste fino a nivel de servidor |
| `Template`           |                                                                                      |
| `Ticket`             |                                                                                      |
| `Tracking`           |                                                                                      |
| `User`               |                                                                                      |
| `Webservice`         |                                                                                      |
| `Wiki`               |                                                                                      |
| `Work`               |                                                                                      |
| `WYSIWYG`            |                                                                                      |
| `XAPI`               |                                                                                      |

## Revisión de código

Las *pull requests* son revisadas por el equipo de responsables del mantenimiento. Esté preparado para:

* Atender los comentarios y realizar las revisiones
* Mantener su rama actualizada con `master`
* Asegurarse de que las pruebas se superen

## Informe de incidencias

Informe de errores y solicitudes de funcionalidades en el rastreador de incidencias de GitHub.