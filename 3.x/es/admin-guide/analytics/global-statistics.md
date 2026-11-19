# Estadísticas globales

Estadísticas globales es el centro de estadísticas de la plataforma: un menú de informes de ámbito global agrupados por tema, y no un único informe.

## Acceso a Estadísticas globales

Desde el panel de administración, haga clic en **Analítica > Estadísticas globales**.

## Cómo está organizado

Al abrir la página sin ningún informe seleccionado, se muestra un menú de estadísticas disponibles, agrupadas en Cursos, Usuarios, Sistema, Social y Sesión. Al seleccionar una entrada del menú, se carga ese informe concreto en la misma página. Cada uno es una vista de ámbito global y exclusiva para administradores: aquí no hay delimitación por curso ni por sesión; para ello, consulte [Analítica del aprendizaje](learning-analytics.md).

## Cursos

* **Cursos** — Número total de cursos, desglosado por categoría de curso
* **Acceso a herramientas** — Recuento de ámbito global de eventos de acceso a herramientas (anuncios, documentos, foros, cuestionarios, chat, etc.)
* **Recuento de recursos por herramienta** — Seleccione una o varias herramientas y vea cada curso/sesión que las utiliza, con un recuento de recursos y la fecha de última actualización, ordenados por uso
* **Último acceso** — Cursos con su fecha de último acceso, limitados a los visitados dentro de un número configurable de días (60 de forma predeterminada)
* **Número de cursos por idioma** — Cursos agrupados por el idioma de su interfaz
* **Uso de cursos** — Recuentos de visitas por curso a lo largo de periodos móviles (hoy, esta semana, este mes, 6 meses, 1 año, 2 años, histórico), divididos entre visitas dentro y fuera de sesiones

## Usuarios

* **Número de usuarios** — Total de formadores y estudiantes en toda la plataforma, y el mismo desglose por categoría de curso
* **Inicios de sesión** — Recuentos de inicios de sesión de hoy, de los últimos 7 días, de los últimos 31 días y del histórico, tanto para el total de inicios de sesión como para usuarios distintos; se puede filtrar por una duración mínima de sesión
* **Inicios de sesión (mes)** — Los mismos datos de inicio de sesión totalizados por mes natural a lo largo de todo el historial
* **Inicios de sesión (día)** — Totales de inicios de sesión por día de la semana, más un desglose independiente solo de los últimos 7 días
* **Inicios de sesión (hora)** — Totales de inicios de sesión por hora del día, más un desglose independiente solo de las últimas 24 horas
* **Número de usuarios (imagen)** — Cuántas cuentas activas han subido una foto de perfil frente a cuántas no lo han hecho
* **Inicios de sesión por fecha** — Tiempo total conectado de cada usuario (del inicio al cierre de sesión) en un intervalo de fechas elegido, exportable a XLS
* **Sin iniciar sesión desde hace algún tiempo** — Cuántos usuarios no han iniciado sesión en ventanas retrospectivas (hoy, 7 días, 31 días, 6 meses) y cuántos no han iniciado sesión nunca
* **Zombis** — Cuentas cuyo último inicio de sesión es igual o anterior a una fecha límite que usted elige (no hay un umbral fijo: selecciona la fecha cada vez), opcionalmente restringidas a cuentas activas, con botones para activar, desactivar o eliminar directamente las cuentas listadas
* **Estadísticas de usuarios** — Usuarios registrados en un intervalo de fechas elegido, con los datos completos del perfil y gráficos de resumen, exportables a XLS
* **Usuarios en línea** — Recuentos en tiempo real de usuarios actualmente en línea y de usuarios que están realizando un cuestionario, cada uno mostrado en cuatro ventanas temporales (3, 5, 30 y 120 minutos)
* **Registros de nuevos usuarios** — Nuevos registros en un intervalo de fechas elegido (diarios si el intervalo es de un mes o menos; mensuales con desglose en caso contrario), más un desglose de quién creó cada cuenta
* **Suscripciones a curso/sesión por día** — Suscripciones frente a bajas por día en un intervalo de fechas elegido
* **Usuarios duplicados** — Localiza cuentas que comparten el mismo nombre, correo electrónico o el valor de un campo de perfil elegido; permite desactivar, activar o unificar (fusionar) duplicados: la fusión elimina de forma permanente las cuentas incorporadas a la que se conserva

## Sistema

* **Estadísticas de sesión de usuario del portal** — Una cuadrícula de recuentos de usuarios desglosados por URL de acceso (en portales multi-URL), sesión y curso, para un intervalo de fechas elegido, exportable a XLS

La entrada **Informe trimestral**, que también aparece en Sistema, se trata por separado en [Informes corporativos](corporate-reports.md).

## Social

* **Número de mensajes recibidos** — Mensajes internos recibidos, por usuario
* **Número de mensajes enviados** — Mensajes internos enviados, por usuario
* **Recuento de contactos** — Contactos de la red social por usuario (excluidas las relaciones de tipo RR. HH./supervisor)

## Sesión

* **Sesiones por fecha** — Sesiones que comienzan o terminan dentro de un intervalo de fechas elegido (opcionalmente filtradas por estado): recuento, media de sesiones por semana, media de usuarios por sesión, media de sesiones por tutor, desgloses por categoría/idioma/estado y una tabla de recuento de sesiones por curso

## Informes adicionales en Chamilo 3.1

### Usuarios por idioma

La estadística **Usuarios por idioma** agrupa a los usuarios de la plataforma según su idioma configurado. Úsela para comprender la distribución lingüística al planificar la comunicación o el contenido localizados. Es un informe del idioma de los usuarios, no un recuento del idioma de los cursos (que figura por separado en Cursos). Consulte [PR de usuarios por idioma n.º 9397](https://github.com/chamilo/chamilo-lms/pull/9397).

### Certificados caducados (Informes globales)

El informe de administrador **Certificados caducados** está disponible desde Informes globales y no como una lista de certificados limitada al curso del docente. Filtre por palabra clave, sesión de curso, curso, mes o año e inspeccione la fecha de caducidad y el enlace del certificado. Esta vista está pensada para la revisión de certificados a nivel de portal y es distinta de los recordatorios de certificados que caducarán pronto. Consulte [PR de certificados caducados globales #9372](https://github.com/chamilo/chamilo-lms/pull/9372) y [Certificados y competencias](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md).