# Encuestas

La herramienta de encuestas le permite crear cuestionarios para recoger opiniones de sus alumnos. Las encuestas son útiles para evaluaciones de cursos, análisis de necesidades y sondeos de opinión.

## Crear una encuesta

1. Abra la herramienta **Encuestas** <img src="/.gitbook/assets/icons/mdi-form-dropdown.svg" alt="Encuestas" data-size="line"> desde la página de inicio del curso
2. Haga clic en **Crear encuesta**
3. Complete los datos de la encuesta:
   * **Código** — Es un código único para la encuesta. Se utilizará en correos y enlaces.
   * **Título** — El nombre de la encuesta
   * **Subtítulo** — Un encabezado secundario opcional
   * **Fecha de inicio** — Desde cuándo esta encuesta estará abierta a la participación
   * **Fecha de fin** — Hasta cuándo esta encuesta estará abierta a la participación
   * **Anónima** — Si las respuestas son anónimas o están vinculadas a alumnos individuales
   * **Visibilidad de resultados** — Quién puede ver los resultados (solo el tutor, tutor y estudiantes, todos)
   * **Introducción** — Un mensaje que se muestra a los alumnos antes de empezar la encuesta
   * **Mensaje de agradecimiento** — Un mensaje que se muestra tras el envío
4. Guardar

### Ajustes avanzados

* **Calificar en la herramienta de evaluación** — Si se incluye el estado de respuesta de esta encuesta en la herramienta de evaluación (gradebook). Quien haya completado la encuesta obtiene el 100 %; el resto, el 0 %
* **Encuesta padre** — En este momento no se usa realmente (función heredada)
* **Una pregunta por página** — Estilo de presentación de las preguntas
* **Activar modo aleatorio** — Si se mezclan las preguntas
* **Mostrar número de pregunta** — Si se muestran los números de pregunta (generados automáticamente)

## Añadir preguntas

Una vez creada la encuesta, añada preguntas:

1. Elija el tipo de pregunta:
   * **Sí/No** — Una elección binaria simple
   * **Opción múltiple** — Seleccionar una respuesta entre varias opciones
   * **Respuesta múltiple** — Seleccionar una o más respuestas entre varias opciones
   * **Abierta** — Respuesta de texto libre
   * **Desplegable** — Seleccionar de una lista desplegable
   * **Porcentaje** — Elegir un valor porcentual
   * **Puntuación** — Valorar en una escala numérica
   * **Comentario** — Un bloque de texto (no es una pregunta) para añadir instrucciones entre preguntas
   * **Opción múltiple con opción «otra»** — Seleccionar una respuesta entre varias opciones, con una alternativa
   * **Visualización selectiva** — Tipo especial que permite adaptar el flujo de preguntas según respuestas anteriores
   * **Salto de página** — Añadir saltos de página en el flujo de preguntas. Solo es útil si **no** se seleccionó «Una pregunta por página» en el paso anterior
2. Configure el texto de la pregunta y las opciones de respuesta
3. Guardar

Cada pregunta puede marcarse como obligatoria. Si no lo hace, omitir cualquier pregunta será un comportamiento aceptable.

## Publicar una encuesta

Tras añadir todas las preguntas:

1. Haga clic en **Publicar**
2. Elija los destinatarios — Seleccione alumnos o grupos concretos (usted los selecciona). El botón **Añadir alumnos** añade a todos los alumnos de una sola vez y deja fuera a los profesores
3. Añadir usuarios adicionales — Permite invitar a usuarios ajenos a Chamilo a participar en la encuesta. Recibirán un correo electrónico con un enlace y aparecerán por su dirección de correo en los detalles de la encuesta
4. Asunto del correo
5. Texto del correo — Explique de qué trata la encuesta y cuándo/cómo responder
6. Hay disponibles distintas opciones para repetir las invitaciones
7. Confirmar

Los alumnos reciben una invitación (por correo electrónico) para completar la encuesta.

En la parte inferior de la página de publicación hay un enlace para invitar a aún más usuarios externos a participar. Los participantes que usen este enlace no serán identificados y aparecerán como anónimos en los resultados de la encuesta.

## Ver resultados

![Resultados de la encuesta con gráficos y desgloses porcentuales para cada pregunta](/.gitbook/assets/survey-results-charts.png)

Después de que los alumnos hayan respondido:

1. Abra la encuesta
2. Haga clic en **Resultados** o **Informe**
3. Consulte los resúmenes de respuestas:
   * Gráficos y porcentajes para las preguntas cerradas
   * Respuestas de texto individuales para las preguntas abiertas
   * Tasa de finalización (cuántos invitados respondieron)

Puede exportar los resultados a una hoja de cálculo para un análisis posterior.

## Consejos

* **Sea breve** — Es más probable que los alumnos completen encuestas más cortas
* **Use el modo anónimo** — Para obtener opiniones sinceras, active las respuestas anónimas
* **Elija el momento adecuado** — Envíe encuestas a mitad de curso para hacer ajustes, no solo evaluaciones de final de curso