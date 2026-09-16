# Tickets de soporte

La herramienta **Tickets** es un sistema de helpdesk integrado que permite a los usuarios enviar solicitudes de soporte y hacer seguimiento de su resolución. Según cómo esté configurada su plataforma, puede usarla como **solicitante** (enviando tickets en su nombre o en el de sus alumnos) o como **agente de soporte** (respondiendo a los tickets asignados a su categoría).

## Cómo está organizado el sistema

Los tickets pertenecen a **proyectos**, que a su vez se dividen en **categorías**. Cada categoría puede tener uno o más agentes de soporte asignados. Cuando se envía un ticket, se enruta automáticamente a un agente disponible de la categoría seleccionada.

Las categorías predeterminadas incluyen:

| Categoría | Descripción |
|----------|-------------|
| Enrollment | Preguntas e incidencias sobre la inscripción en cursos o sesiones |
| General information | Preguntas generales sobre la plataforma |
| Requests and paperwork | Solicitudes administrativas y documentación |
| Academic Incidents | Incidencias relacionadas con exámenes, tareas o actividades |
| Virtual campus | Problemas técnicos con la plataforma |
| Online evaluation | Incidencias con una evaluación concreta de un curso (requiere seleccionar un curso) |

## Acceso a la herramienta de tickets

Si el administrador ha habilitado el enlace de tickets, aparece un icono de ticket <img src="/.gitbook/assets/icons/mdi-ticket-account.svg" alt="Ticket" data-size="line"> en la barra de navegación superior. Haga clic en él para ir directamente al formulario de envío de tickets.

También puede acceder a sus tickets desde el menú principal en **Soporte** o **Tickets**, según la configuración de su plataforma.

## Envío de un ticket

Para abrir una nueva solicitud de soporte:

1. Haga clic en **New ticket** (o en el icono de ticket de la barra superior).
2. Seleccione la **categoría** que mejor se ajuste a su incidencia.
3. Si la categoría lo requiere (por ejemplo, Online evaluation), seleccione el **curso** correspondiente.
4. Introduzca un **asunto**: un resumen breve de la incidencia.
5. Escriba su **mensaje** describiendo el problema con detalle.
6. Opcionalmente, adjunte archivos (capturas de pantalla, documentos) para ayudar al agente de soporte a comprender la incidencia.
7. Haga clic en **Submit**.

Al ticket se le asigna un ID y se enruta a un agente de soporte. Recibirá una notificación cuando el agente responda.

## Seguimiento de sus tickets

Desde la lista de tickets puede ver todos los tickets que ha enviado y su estado actual:

| Estado | Significado |
|--------|---------|
| New | Recién enviado, aún no revisado |
| Pending | En revisión por un agente de soporte |
| Unconfirmed | Pendiente de confirmación o de información adicional |
| Forwarded | Transferido a otro equipo o agente |
| Closed | Resuelto |

Haga clic en cualquier ticket para leer el hilo completo de la conversación y añadir una respuesta.

## Responder a un ticket

Una vez abierto un ticket, usted y el agente de soporte intercambian mensajes en el mismo hilo. Para añadir una respuesta:

1. Abra el ticket desde su lista.
2. Desplácese hasta el campo de respuesta en la parte inferior.
3. Escriba su respuesta y adjunte archivos si es necesario.
4. Haga clic en **Send**.

Ambas partes reciben notificaciones cuando se añade un nuevo mensaje al hilo.

## Gestión de tickets como agente de soporte

Si el administrador le ha asignado a una o más categorías de tickets, verá en su cola los tickets entrantes de alumnos o colegas.

Para responder a un ticket asignado:

1. Abra su lista de tickets: los tickets asignados aparecen junto a los que usted ha enviado.
2. Haga clic en un ticket para leer el mensaje del solicitante.
3. Escriba una respuesta y haga clic en **Send**. El estado del ticket se actualiza automáticamente.
4. Cuando la incidencia esté resuelta, cambie el estado a **Closed**.

También puede cambiar la **prioridad** de un ticket (Low, Normal, High) para ayudar a clasificar su cola.

> El acceso a las categorías de tickets lo controla el administrador de la plataforma. Si necesita que le añadan como agente de soporte de una categoría, contacte con su administrador. Consulte [Configuración de tickets](../admin-guide/platform-settings/ticket-settings.md) de la Guía de administración para las opciones de configuración.