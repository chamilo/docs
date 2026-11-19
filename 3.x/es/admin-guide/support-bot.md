# Bot de soporte (asistente de árbol de decisiones)

El **bot de soporte** es un asistente de ayuda configurable construido a partir de un árbol de decisiones fijo. Se implementó en [PR #9224](https://github.com/chamilo/chamilo-lms/pull/9224) para la [incidencia #8754](https://github.com/chamilo/chamilo-lms/issues/8754). **No es un chatbot de IA generativa**: los administradores redactan preguntas y respuestas seleccionables que guían a los usuarios hacia una explicación, una página o un ticket de soporte.

## Activarlo

1. En **Administración > Parámetros de configuración > Tickets**, active `ticket.ticket_support_bot_enabled` (desactivado de forma predeterminada).
2. Abra **Administración > Bot de soporte** y cree un árbol de decisiones en **borrador**. Indique un título y al menos un nodo de entrada con opciones.
3. Defina la pregunta o la información de cada nodo y vincule las opciones con la acción siguiente.
4. Publique un árbol válido. Solo un árbol publicado con un nodo de entrada válido y opciones seleccionables está disponible para los usuarios.

El motor selecciona el árbol publicado para la URL de acceso actual; su disponibilidad queda, por tanto, limitada al portal. Un administrador debe tener `ROLE_ADMIN` para gestionar los árboles.

## Diseñar un flujo de soporte

Cada opción puede ejecutar una de estas cuatro acciones:

| Acción | Resultado |
| --- | --- |
| **Ir a otro nodo** | Continuar la conversación en otra pregunta del mismo árbol |
| **Abrir un enlace** | Enlazar a una página de Chamilo mediante una ruta relativa del mismo sitio, por ejemplo `/tickets` |
| **Finalizar la conversación** | Marcar el problema como resuelto y, opcionalmente, mostrar un mensaje de cierre |
| **Crear ticket de soporte** | Escalar la conversación al sistema de Tickets |

Para la escalada de tickets, seleccione un **proyecto de tickets predeterminado** y una categoría perteneciente a ese proyecto. Las categorías que requieren un curso no pueden utilizarse para esta escalada del bot de soporte. El ticket creado contiene la transcripción del árbol de decisiones del usuario, de modo que el personal de soporte pueda ver las opciones que condujeron a la escalada.

El editor valida la estructura del árbol antes de la publicación. Las versiones **Publicada** y **Archivada** son de solo lectura; utilice **Duplicar** para crear un nuevo borrador editable. Publicar un reemplazo archiva la versión publicada anteriormente en el mismo ámbito. Desde la lista, los administradores también pueden importar o exportar un árbol y revisar su historial de conversaciones. Un árbol publicado debe archivarse antes de eliminarlo, y un árbol con historial de conversaciones no puede eliminarse.

## Importar ejemplos y revisar conversaciones

Abra **Administración > Bot de soporte** y seleccione **Importar**. El cuadro de diálogo de importación ofrece **Descargar ejemplo JSON** y **Descargar ejemplo CSV**. Descargue una muestra, sustituya sus preguntas y opciones por las suyas, seleccione el archivo `.json` o `.csv` editado e impórtelo. Todo árbol importado comienza como un **nuevo borrador**; revíselo y publíquelo de forma explícita cuando esté listo.

Los ejemplos no requieren un proyecto de tickets existente. Si su flujo de trabajo debe crear tickets, configure el proyecto requerido y la categoría admisible después de importar.

En la lista de árboles, utilice **Ver conversaciones** para inspeccionar los registros de conversación de un árbol concreto, incluidos los árboles cuyo recuento de conversaciones es cero. Los historiales de conversación permanecen limitados al usuario y al portal correspondientes. Véase [PR #9419](https://github.com/chamilo/chamilo-lms/pull/9419).

## Cómo acceden los usuarios

Cuando el parámetro está activado y el portal dispone de un árbol publicado válido, los usuarios que han iniciado sesión ven un contacto de **Bot de soporte** en el chat acoplado. Responden eligiendo las opciones ofrecidas. El bot puede resolver la conversación, abrir una página del mismo sitio o crear un ticket y mostrar el enlace correspondiente. Los usuarios pueden iniciar una nueva conversación después de que finalice una anterior.

Esto es independiente del **Tutor de IA**, que responde a preguntas de aprendizaje abiertas. El bot de soporte sigue únicamente las rutas y las opciones configuradas por los administradores.

## Resolución de problemas y seguridad

* **No aparece el bot en el chat:** compruebe el parámetro de Tickets, que haya un árbol publicado para el portal actual y que su nodo de entrada tenga opciones.
* **No se puede publicar:** revise los nodos ausentes, los nodos de destino no resueltos y las acciones no válidas del borrador.
* **No se puede crear el ticket:** compruebe el proyecto y la categoría de tickets seleccionados. No utilice una categoría de tickets que requiera un curso.
* **Faltan conversaciones anteriores:** los administradores pueden revisar el historial de conversaciones desde el árbol correspondiente; las conversaciones están vinculadas a un usuario y a una URL de acceso.

Para el parámetro relacionado, consulte [Parámetros de tickets](platform-settings/ticket-settings.md).