# Certificados y competencias

Chamilo le permite otorgar certificados a los alumnos que cumplen criterios de logro específicos y validar las competencias asociadas a esos logros.

## Cómo funcionan los certificados

Los certificados están vinculados a las **Evaluaciones** (también llamadas Gradebook). Cuando la calificación de un alumno alcanza o supera el umbral mínimo que usted define, el certificado queda disponible para su descarga.

El flujo de trabajo es:

1. Configure las [Evaluaciones](../assessing-learners/gradebook.md) con sus ejercicios, tareas y otras actividades calificadas
2. Defina una **puntuación mínima de certificación** (p. ej., 70 %)
3. Cuando un alumno alcanza esa puntuación, puede descargar su certificado (ya sea desde la propia herramienta de Evaluaciones o desde una lección si ha configurado el paso final para ello). Como docente, también puede usar la acción **Generar certificados** en el libro de calificaciones para crear los PDF en lote para todos los alumnos elegibles.

## Plantillas de certificado

Los certificados utilizan plantillas definidas por el administrador de la plataforma. La plantilla suele incluir:

* El nombre del alumno
* El nombre del curso
* La fecha de finalización
* La puntuación obtenida
* Un código QR o una URL para la verificación en línea

## Validez y caducidad de los certificados

Los certificados pueden configurarse para que caduquen transcurrido un número determinado de días. En la configuración de las [Evaluaciones](../assessing-learners/gradebook.md) de la categoría raíz, una vez activada la opción **Generar certificados**, aparece el campo **Validez del certificado (días)**. Déjelo en `0` (el valor predeterminado) para certificados que no caducan nunca, o indique un número de días para que el certificado caduque ese número de días después de su emisión.

La fecha de caducidad de cada certificado se calcula automáticamente a partir de esa configuración cuando se genera (o se regenera): no se establece certificado por certificado. La lista de **Certificados** muestra una columna **Fecha de caducidad** para cada alumno, con el texto **Nunca caduca** cuando no aplica ningún periodo de validez.

Si la categoría no tiene configurado un periodo de validez, aún puede establecer (o modificar) a mano la fecha de caducidad de un alumno concreto: pulse el botón de lápiz **Editar fecha de caducidad** junto a su entrada y elija una fecha. Este botón solo está disponible cuando la propia categoría no tiene periodo de validez; una vez definido un periodo de validez, las fechas de caducidad se gestionan automáticamente y ya no pueden editarse certificado por certificado.

![La lista de certificados mostrando la columna Fecha de caducidad para tres alumnos](/.gitbook/assets/gradebook-certificates-expiry-dates.png)

### Recordar a los alumnos una caducidad próxima o ya pasada

Abra la lista de **Certificados** de su evaluación y pulse el botón **Certificados que caducan** <img src="/.gitbook/assets/icons/mdi-calendar-clock.svg" alt="Certificados que caducan" data-size="line"> para ver qué certificados de los alumnos han caducado o están a punto de caducar. La página muestra, por alumno: la **Fecha de caducidad** del certificado, su **Estado** (**Caducado** o **Caduca pronto**) y cuándo se envió el **Último recordatorio** al respecto (o **Nunca**). Use **Días de antelación** para ampliar o reducir hasta qué punto en el futuro se considera «caduca pronto».

![La página Certificados que caducan listando un certificado caducado y uno a punto de caducar](/.gitbook/assets/gradebook-certificate-expirations.png)

Para notificar usted mismo a los alumnos:

1. Seleccione los alumnos a los que desea recordar (o selecciónelos todos)
2. Pulse **Enviar notificación**
3. Revise la vista previa del correo electrónico que se enviará: se muestran vistas previas distintas para el texto de «caduca pronto» y el de «caducado», según en cuál de los dos casos se encuentren los alumnos seleccionados
4. Confirme pulsando de nuevo **Enviar notificación** en el diálogo

![El diálogo de confirmación Enviar notificación con la vista previa del texto de los correos de caducidad próxima y caducado](/.gitbook/assets/gradebook-certificate-expiry-notification.png)

Cada alumno recibe la notificación en su idioma configurado, tanto por correo electrónico como mediante un mensaje interno de Chamilo. Volver a enviar para el mismo certificado y la misma fecha de caducidad es seguro: Chamilo registra lo que ya se envió por certificado y no saturará al alumno con recordatorios duplicados a menos que usted reenvíe de forma explícita.

Los administradores también pueden programar estos mismos recordatorios de forma automática, de manera periódica, sin que un docente tenga que lanzarlos a mano; consulte [Configuración de tareas cron](../../admin-guide/platform-settings/crons-settings.md#certificate-expiry-reminders).

## Competencias

Las competencias (skills) representan las capacidades que adquieren los alumnos. En Chamilo:

* Las competencias pueden vincularse a los logros del libro de calificaciones
* Cuando un alumno obtiene un certificado, las competencias asociadas se validan automáticamente
* Las competencias se acumulan en el perfil del alumno y crean un registro de capacidades
* Las competencias pueden organizarse de forma jerárquica (p. ej., «Análisis de datos» bajo «Métodos de investigación»)
* Las competencias pueden evaluarse además por pares (evaluación 360°)

## Consulta del estado de certificados y competencias

Como docente, puede ver:

* Qué estudiantes han obtenido certificados en su curso
* Qué competencias se han validado
* El progreso de los estudiantes hacia el umbral de certificación
* Qué certificados han caducado o están a punto de caducar, y si ya se envió un recordatorio para ellos

Los estudiantes pueden consultar sus propios certificados y competencias validadas desde su perfil, y pueden acceder a la Rueda de competencias para comprobar qué competencias se demandan en su organización.

## Consejos

* **Establezca expectativas claras** — Informe a los estudiantes al inicio del curso de lo que deben lograr para obtener un certificado
* **Use nombres de competencias significativos** — Las competencias deben describir lo que el estudiante es capaz de hacer, no solo el nombre del curso
* **Combine con portafolios** — Anime a los estudiantes a añadir sus certificados a su portafolio
* **Amplíe los certificados** — Pida a su administrador que active el plugin [Custom Certificate](../plugins/custom-certificate.md) para disponer de aún más potencia de plantillas de certificados
* **Defina un periodo de validez para certificaciones orientadas al cumplimiento** — Si una certificación requiere renovación periódica (p. ej. formación en seguridad), configure **Certificate validity (days)** para que los estudiantes reciban un recordatorio antes de que caduque