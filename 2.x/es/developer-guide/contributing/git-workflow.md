# Flujo de Trabajo con Git

## Repositorio

El código fuente de Chamilo está alojado en GitHub: [github.com/chamilo/chamilo-lms](https://github.com/chamilo/chamilo-lms)

## Ramas

* **`master`** — Rama principal de desarrollo
* Las ramas de características se crean a partir de `master` para nuevos desarrollos
* Las ramas de lanzamiento se crean para versiones estables

## Contribuir con un Cambio

1. **Bifurcar** el repositorio en GitHub
2. **Clonar** tu bifurcación localmente
3. **Crear una rama** para tu cambio: `git checkout -b feature/my-feature`
4. **Realizar tus cambios** siguiendo las convenciones de codificación
5. **Confirmar** con mensajes de commit claros y descriptivos
6. **Enviar** a tu bifurcación: `git push origin feature/my-feature`
7. **Crear una solicitud de extracción** contra la rama `master`

## Mensajes de Commit

Escribe mensajes de commit claros que expliquen **qué** y **por qué**:

```
Glosario: Añadir generación de términos asistida por IA

Los profesores ahora pueden generar términos de glosario utilizando
proveedores de IA configurados. Soporta prompts configurables y conteo de términos.
```

### Convención de prefijo de herramienta

La línea de asunto se prefija con la **herramienta o área** que el cambio afecta, seguida de dos puntos. Usamos una terminología compartida breve para que el registro de cambios y `git log --oneline` puedan ser revisados rápidamente por herramienta. El prefijo siempre está en la forma **singular** del nombre canónico de la herramienta.

Formato: `<Prefijo>: <Resumen imperativo en tiempo presente>`

Ejemplos:

```
Documento: Corregir lista para vista de estudiante
Ejercicio: Evitar títulos de preguntas duplicados dentro de un cuestionario
Ruta de aprendizaje: Permitir reordenar capítulos mediante arrastrar y soltar
Interno: Refactorizar la hidratación de ResourceNode en el normalizador de la API
CI: Almacenar en caché descargas de Composer en el flujo de trabajo de GitHub Actions
```

Si un cambio abarca varias herramientas, elige la más afectada; los cambios verdaderamente transversales que solo afectan la estructura del código (sin impacto en herramientas de usuario final) se clasifican bajo `Interno`. Los cambios exclusivos de documentación (este sitio, el registro de cambios, bloques de documentación en línea destinados únicamente como referencia) se clasifican bajo `Documentación`.

---
#### Prefijos permitidos

| Prefijo              | Ámbito / notas                                                                       |
|----------------------|--------------------------------------------------------------------------------------|
| `Admin`              |                                                                                      |
| `Announcement`       |                                                                                      |
| `Attendance`         |                                                                                      |
| `Authentication`     |                                                                                      |
| `Blog`               |                                                                                      |
| `Calendar`           | No "Agenda"                                                                          |
| `Career`             |                                                                                      |
| `Catalogue`          | Catálogo de cursos y sesiones, incluyendo "cursos destacados" en la página principal |
| `Chat`               |                                                                                      |
| `CI`                 | Integración Continua, pruebas automatizadas, etc.                                    |
| `Course description` |                                                                                      |
| `Course Progress`    | No "Avance temático"                                                                 |
| `Course settings`    |                                                                                      |
| `Cron`               |                                                                                      |
| `Dashboard`          |                                                                                      |
| `Display`            |                                                                                      |
| `Document`           |                                                                                      |
| `Documentation`      | Todo lo relacionado exclusivamente con la documentación de Chamilo o el código, el registro de cambios, etc. |
| `Dropbox`            |                                                                                      |
| `Exercise`           | No "Quiz"                                                                            |
| `Extra Fields`       |                                                                                      |
| `Forum`              |                                                                                      |
| `Glossary`           |                                                                                      |
| `Gradebook`          | Incluye Certificados                                                                 |
| `Group`              | Incluye grupos de cursos, grupos globales y clases                                   |
| `Help`               |                                                                                      |
| `Hook`               | Para el mecanismo interno de ganchos (hooks)                                         |
| `Install`            | Incluye aspectos de actualización                                                    |
| `Internal`           | Para cambios y correcciones que afectan principalmente al código mismo o son de naturaleza muy global |
| `Language`           |                                                                                      |
| `Link`               |                                                                                      |
| `Learnpath`          | Para LP / Rutas de Aprendizaje                                                       |
| `Maintenance`        | La herramienta de mantenimiento de cursos: copias de cursos, respaldo, restauración, etc. |
| `Message`            |                                                                                      |
| `Notebook`           |                                                                                      |
| `Optimization`       |                                                                                      |
| `Portfolio`          |                                                                                      |
| `Privacy`            |                                                                                      |
| `Script`             | Para lo que se encuentra en `tests/scripts/`                                         |
| `Search`             | Búsqueda de texto completo                                                           |
| `Security`           |                                                                                      |
| `Session`            |                                                                                      |
| `Skill`              |                                                                                      |
| `Social`             | Red social                                                                           |
| `SSO`                | Métodos de Inicio de Sesión Único (Single Sign-On)                                   |
| `Survey`             |                                                                                      |
| `System`             | Aspectos relacionados principalmente con el alojamiento y ajustes finos a nivel de servidor |
| `Template`           |                                                                                      |
| `Ticket`             |                                                                                      |
| `Tracking`           |                                                                                      |
| `User`               |                                                                                      |
| `Webservice`         |                                                                                      |
| `Wiki`               |                                                                                      |
| `Work`               |                                                                                      |
| `WYSIWYG`            |                                                                                      |
| `XAPI`               |                                                                                      |

---
## Revisión de Código

Las solicitudes de extracción son revisadas por el equipo de mantenedores. Prepárate para:

* Responder a los comentarios y realizar revisiones
* Mantener tu rama actualizada con `master`
* Asegurarte de que las pruebas se aprueben

## Informe de Problemas

Reporta errores y solicita nuevas funcionalidades en el rastreador de problemas de GitHub.