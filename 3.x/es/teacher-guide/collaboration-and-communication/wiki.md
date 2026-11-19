# Wiki

La herramienta wiki le permite a usted y a sus estudiantes crear y editar de forma colaborativa páginas web dentro del curso. Resulta útil para proyectos grupales, bases de conocimiento compartidas y ejercicios de escritura colaborativa.

## Cómo funciona el wiki

Un wiki es una colección de páginas web interconectadas que cualquier persona con permiso puede editar. En Chamilo:

* Cada curso tiene su propio wiki
* Las páginas pueden enlazarse entre sí mediante enlaces de estilo wiki
* Todas las ediciones se registran con un historial de revisiones
* Las versiones anteriores pueden compararse y restaurarse

## Crear una página wiki

1. Abra la herramienta **Wiki** desde la página de inicio del curso
2. Haga clic en **Añadir una nueva página**
3. Introduzca un **título de página**
4. Redacte el contenido de la página con el editor de texto enriquecido
5. Guarde

Para enlazar a otra página wiki desde el editor, cree un enlace utilizando el título de la página de destino.

## Editar páginas

Cualquier persona con permisos de edición puede modificar una página wiki:

1. Abra la página que desea editar
2. Haga clic en el botón **Editar** <img src="../../.gitbook/assets/icons/mdi-pencil.svg" alt="Editar" data-size="line">
3. Realice los cambios en el editor
4. Añada una entrada opcional de **Comentarios** que describa lo que ha cambiado
5. Guarde

## Edición colaborativa con Etherpad (opcional)

Cuando un administrador habilita la integración con Etherpad, la edición de una página wiki **existente** abre un editor Etherpad compartido en lugar del campo habitual de texto enriquecido. Varios colaboradores autorizados pueden trabajar en la misma página al mismo tiempo.

1. Abra una página wiki y seleccione **Editar**.
2. Trabajen juntos en el editor colaborativo integrado. Sus colaboradores también deben tener permiso para editar esta página wiki.
3. Seleccione **Guardar** en Chamilo para crear una nueva revisión del wiki a partir del contenido actual de Etherpad.
4. Utilice el **Historial de revisiones** del wiki para comparar o restaurar versiones guardadas anteriormente.

Los cambios realizados en Etherpad no crean automáticamente revisiones individuales de Chamilo. **Guardar** es el paso explícito de instantánea. El administrador debe exponer Etherpad en el **mismo origen que Chamilo** (por ejemplo, mediante una ruta de proxy inverso) para admitir sesiones integradas seguras. El editor wiki habitual permanece disponible cuando la integración está deshabilitada. La creación de páginas nuevas utiliza el formulario habitual antes de que la página tenga un pad colaborativo asociado.

Un administrador configura `editor.etherpad_enabled`, `editor.etherpad_url` y `editor.etherpad_api_key` en **Administración > Configuración > Editor**. Consulte [Configuración del editor](../../admin-guide/platform-settings/editor-settings.md).

## Historial de revisiones

Cada edición crea una nueva revisión. Puede:

* **Ver el historial** — Consultar una lista de todas las revisiones con marcas de tiempo y autores
* **Comparar versiones** — Ver qué cambió entre dos revisiones
* **Restaurar una versión** — Revertir la página a una revisión anterior si es necesario

## Gestionar el wiki

Como docente del curso, puede:

* **Ver todas las páginas** — Consultar una lista de todas las páginas wiki del curso
* **Encontrar páginas huérfanas** — Identificar páginas que no están enlazadas desde ninguna otra página
* **Encontrar páginas solicitadas** — Ver páginas a las que se enlaza pero que aún no existen
* **Bloquear una página para edición** — Impedir todas las ediciones de una página mientras la finaliza
* **Alternar la visibilidad** — Ocultar una página a los estudiantes
* **Eliminar páginas** — Quitar páginas que ya no son necesarias
* **Supervisar las contribuciones** — Revisar estadísticas por usuario: editores más activos, páginas más editadas, páginas más visitadas
* **Exportar** — Exportar una página wiki a PDF o enviarla a la herramienta Documentos

## Consejos

* **Utilice el wiki para proyectos grupales** — Asigne a cada grupo una página wiki para elaborar de forma colaborativa su entregable
* **Cree una base de conocimiento del curso** — Construya un wiki de referencia con conceptos clave e invite a los estudiantes a contribuir
* **Revise el historial de ediciones** — El historial de revisiones le permite evaluar las contribuciones individuales en el trabajo colaborativo