# Evaluaciones

Las evaluaciones (anteriormente *gradebook*) recopilan las puntuaciones de ejercicios, tareas y otras actividades calificadas en una vista unificada del rendimiento de cada estudiante. También controlan la generación de certificados.

## Cómo funcionan las Evaluaciones

Las evaluaciones son sistemas de puntuación ponderada. Usted define:

1. **Qué actividades** contribuyen a la calificación (ejercicios, tareas, asistencia, etc.)
2. **El peso** de cada actividad (cuánto cuenta para la calificación final)
3. **La puntuación mínima para la certificación** (el umbral para obtener un certificado)
4. **Una puntuación mínima por actividad** — Cada actividad en el libro de calificaciones puede tener su propia **Puntuación mínima**. Los estudiantes que obtengan una puntuación por debajo de ese mínimo en una actividad clave pueden ser impedidos de alcanzar los objetivos y obtener el certificado, incluso si su total ponderado general es lo suficientemente alto.

Las actividades pueden ser de 2 tipos:
* **Actividad en el aula** (o actividad presencial), donde las calificaciones deben importarse desde alguna otra fuente
* **Actividad en línea** seleccionada del curso, donde las calificaciones se obtienen a través de la realización de la actividad en el curso

Chamilo calcula la calificación general de cada estudiante en función de estos pesos.

## Configuración de la Evaluación

1. Abra la herramienta **Evaluaciones** <img src="/.gitbook/assets/icons/mdi-certificate.svg" alt="Libro de calificaciones" data-size="line"> desde la página principal del curso
2. Verá el resumen de evaluaciones, inicialmente vacío

### Añadir Actividades

1. Haga clic en **Añadir actividad en línea**
2. Elija el tipo:
   * **Prueba** — Vincule un ejercicio específico del curso
   * **Tarea** — Vincule una carpeta de publicaciones de estudiantes
   * **Ruta de aprendizaje** — Vincule la finalización de una ruta de aprendizaje
   * **Asistencia** — Vincule una hoja de asistencia
   * **Hilo del foro** — Vincule un hilo del foro (que debe ser calificado manualmente)
   * **Encuesta** — Vincule una encuesta
3. Seleccione la actividad específica dentro del tipo elegido
4. Establezca el **Peso** para esta actividad (por ejemplo, 30% para el examen de mitad de curso, 40% para el proyecto final)
5. Establezca la **Puntuación mínima** si aplica
6. Guarde

El peso total de todas las actividades debe sumar 100%.

### Subcategorías

Para esquemas de calificación complejos, puede crear **subcategorías** para agrupar actividades relacionadas:

* **Ejemplo**: Una subcategoría de "Tareas" (peso: 30%) que contiene cinco tareas individuales, cada una con un valor del 20% de la subcategoría
* Las subcategorías le permiten organizar la evaluación de manera jerárquica mientras mantienen el cálculo general simple

## Visualización de Calificaciones

![La tabla de resumen del libro de calificaciones que muestra los nombres de los estudiantes, las puntuaciones de las actividades y los totales ponderados](/.gitbook/assets/gradebook-overview.png)

La evaluación muestra una tabla con:

* El nombre de cada estudiante
* Las puntuaciones de cada actividad
* El total ponderado
* Si el estudiante califica para un certificado

Puede ordenar por cualquier columna para identificar rápidamente a los mejores desempeños o a los estudiantes con dificultades.

## Certificados

Para habilitar la generación de certificados:

1. En la configuración de la evaluación, establezca una **puntuación mínima de certificación** (por ejemplo, 70%)
2. Cuando el total ponderado de un estudiante alcance o supere este umbral (y no haya fallado en ninguna puntuación mínima por actividad), podrá descargar su certificado
3. El certificado se genera a partir de una plantilla configurada por el administrador de la plataforma

Consulte [Certificados y Habilidades](../tracking-and-reporting/certificates-and-skills.md) para más detalles.

## Vinculación a Habilidades

Puede asociar **habilidades** con la evaluación. Cuando un estudiante alcance los objetivos establecidos para completar la evaluación, puede obtener un certificado, una habilidad o ambos. Las habilidades son visibles en su perfil en el espacio de la red social. Esto construye un registro de competencias a lo largo del tiempo.

## Exportación de Calificaciones

Haga clic en el botón **Exportar** <img src="/.gitbook/assets/icons/mdi-export.svg" alt="Exportar" data-size="line"> para descargar las calificaciones como una hoja de cálculo. Esto es útil para:

* Compartir calificaciones con sistemas administrativos
* Realizar análisis adicionales fuera de Chamilo
* Mantener registros fuera de línea

## Consejos

* **Planifique sus pesos con anticipación** — Defina el esquema de calificación al inicio del curso para que los estudiantes sepan qué esperar
* **Use subcategorías para cursos complejos** — Agrupe tareas, cuestionarios y participación en categorías claras
* **Establezca umbrales de aprobación significativos** — La puntuación de certificación debe reflejar una competencia real, no solo participación
* **Revise regularmente** — Consulte el libro de calificaciones periódicamente para asegurarse de que todas las actividades estén correctamente vinculadas y las puntuaciones se estén registrando