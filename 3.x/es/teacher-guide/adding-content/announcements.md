# Anuncios

La herramienta de anuncios le permite enviar mensajes a todos los estudiantes inscritos en su curso, o a personas o grupos concretos.

Los mensajes enviidos mediante anuncios se envían a los estudiantes tanto por correo electrónico *como* a su bandeja de entrada de Chamilo.

## Crear un anuncio

1. Abra la herramienta **Anuncios** <img src="../../.gitbook/assets/icons/mdi-bullhorn.svg" alt="Anuncios" data-size="line"> desde la página de inicio del curso
2. Haga clic de nuevo en el icono **Añadir un anuncio** <img src="../../.gitbook/assets/icons/mdi-bullhorn.svg" alt="Anuncios" data-size="line">
3. Complete:
   * **Destinatarios** — Elija quién recibe el anuncio:
     * Todos los estudiantes inscritos
     * Estudiantes concretos
     * Grupos concretos
   * **Asunto** — Una línea de asunto para el anuncio
   * **Descripción** — El cuerpo del mensaje (admite texto enriquecido con formato, enlaces e imágenes)
   * **Adjunto** — Un archivo adjunto opcional que se envía junto con el correo electrónico
   * **Opciones de envío** — Los anuncios se enviarán por correo electrónico de forma predeterminada, pero también puede elegir (si dispone de los permisos) enviarlo a través de todas las sesiones que incluyan este curso, enviarse una copia a usted mismo o asociar este anuncio a un evento del calendario del curso.
     * Cuando marque **Añadir evento en el calendario del curso**, establezca la **Fecha de inicio** y la **Fecha de fin** del evento. Cada clic en **Añadir recordatorio** añade una línea en la que indica cuánto tiempo antes del evento se envía el recordatorio (en minutos, horas o días). Los recordatorios pueden modificarse más adelante editando el evento en la agenda del curso.
4. Guardar

El botón **Etiquetas** le permite identificar una serie de marcadores que se sustituirán de forma dinámica en el **Contenido** del anuncio. Son relativamente intuitivos, por lo que le dejamos adivinar qué hacen.

El botón **Vista previa** no es muy intuitivo: le permite ver a quién se enviará este anuncio. Actúa como confirmación de la selección de destinatarios que realizó anteriormente.

## Gestionar anuncios

* **Editar** <img src="../../.gitbook/assets/icons/mdi-pencil.svg" alt="Editar" data-size="line"> — Modificar un anuncio existente
* **Eliminar** <img src="../../.gitbook/assets/icons/mdi-delete.svg" alt="Eliminar" data-size="line"> — Quitar un anuncio
* **Visibilidad** <img src="../../.gitbook/assets/icons/mdi-eye.svg" alt="Visibilidad" data-size="line"> — Ocultar o mostrar anuncios

Los anuncios se muestran en orden cronológico inverso (los más recientes primero).

## Configuración del envío de correo masivo

Los administradores pueden configurar un transporte de correo independiente para las difusiones de anuncios del curso y de la plataforma. Cuando está habilitado, esto afecta a la forma en que se envían los correos electrónicos de los anuncios; no modifica el editor de anuncios, las opciones de destinatarios ni el transporte habitual utilizado por las notificaciones individuales.

Si la entrega difiere entre los mensajes individuales y los anuncios, pida a un administrador de la plataforma que compruebe **Administración > Parámetros de configuración > Correo > DSN de correo masivo** (`mail.mailer_dsn_massmailing`). Si este parámetro opcional está vacío, los anuncios utilizan el transporte de correo electrónico principal. Consulte [PR n.º 9406 sobre el transporte de correo masivo](https://github.com/chamilo/chamilo-lms/pull/9406).

## Consejos

* **Mensaje de bienvenida** — Cree un anuncio al inicio del curso para dar la bienvenida a los estudiantes y ofrecerles orientación
* **Utilice el envío por correo electrónico** — Para los anuncios urgentes, active la opción de correo electrónico para que los estudiantes reciban el mensaje aunque no hayan iniciado sesión en la plataforma en ese momento
* **Anuncios dirigidos** — Envíe anuncios concretos a grupos o personas cuando el mensaje no sea pertinente para toda la clase