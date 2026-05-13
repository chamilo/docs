# Ejercicios

La herramienta de ejercicios (también llamada "pruebas") le permite crear cuestionarios y exámenes con calificación automática. Chamilo soporta una amplia variedad de tipos de preguntas, desde selección múltiple simple hasta preguntas interactivas de puntos calientes.

## Crear un Ejercicio

1. Abra la herramienta **Ejercicios** <img src="/.gitbook/assets/icons/mdi-order-bool-ascending-variant.svg" alt="Ejercicios" data-size="line"> desde la página principal del curso
2. Haga clic en **Nuevo ejercicio**
3. Ingrese un **título** y una **descripción** opcional
4. Configure los ajustes del ejercicio (ver más abajo)
5. Guarde y luego añada preguntas

## Ajustes del Ejercicio

![El panel de ajustes del ejercicio con opciones para visualización, tiempo, intentos y retroalimentación](/.gitbook/assets/exercise-settings.png)

### Visualización y Navegación

| Ajuste | Opciones | Descripción |
|---------|---------|-------------|
| **Diseño de preguntas** | Todas en una página / Una por página | Mostrar todas las preguntas a la vez o una a la vez |
| **Ocultar títulos de preguntas** | Sí / No | Si se deben mostrar los títulos de las preguntas a los estudiantes |
| **Mostrar botón anterior** | Sí / No | Permitir a los estudiantes volver a preguntas anteriores |
| **Evitar navegación hacia atrás** | Sí / No | Obligar a los estudiantes a responder en orden sin retroceder |

### Tiempo y Disponibilidad

| Ajuste | Descripción |
|---------|-------------|
| **Límite de tiempo** | Tiempo máximo (en minutos) para completar el ejercicio. Se muestra un temporizador de cuenta regresiva al estudiante |
| **Fecha de inicio** | Cuándo el ejercicio estará disponible para los estudiantes |
| **Fecha de finalización** | Cuándo el ejercicio dejará de estar disponible |

### Intentos y Puntuación

| Ajuste | Descripción |
|---------|-------------|
| **Intentos máximos** | Cuántas veces un estudiante puede realizar el ejercicio (0 = ilimitado) |
| **Porcentaje de aprobación** | La puntuación mínima para aprobar (por ejemplo, 70%). Los estudiantes que no alcancen este umbral verán un mensaje de fallo |
| **Propagar puntuación negativa** | Si los puntos negativos en preguntas individuales reducen la puntuación total por debajo de cero |

### Retroalimentación

| Ajuste | Opciones |
|---------|---------|
| **Al final** | Mostrar resultados y respuestas correctas después de que el estudiante envíe el ejercicio |
| **Inmediata** | Mostrar retroalimentación después de cada pregunta (útil para ejercicios de aprendizaje) |
| **Modo examen** | No mostrar ninguna retroalimentación ni resultados |

### Visualización de Resultados

Controle lo que los estudiantes ven después de completar el ejercicio:

* Mostrar puntuación y respuestas esperadas
* Mostrar solo la puntuación
* Mostrar puntuación con desglose por categoría
* Mostrar clasificación entre otros estudiantes
* Mostrar solo en el último intento
* Mostrar visualización de gráfico de radar

### Mensajes de Completitud

* **Mensaje de éxito** — Texto personalizado que se muestra cuando el estudiante aprueba
* **Mensaje de fallo** — Texto personalizado que se muestra cuando el estudiante no alcanza el porcentaje de aprobación

### Aleatorización de Preguntas

| Ajuste | Descripción |
|---------|-------------|
| **Orden aleatorio de preguntas** | Mezclar el orden de las preguntas en cada intento |
| **Respuestas aleatorias** | Mezclar las opciones de respuesta dentro de cada pregunta |
| **Aleatorio por categoría** | Seleccionar preguntas aleatorias de cada categoría de preguntas |

También puede configurar estrategias de selección avanzadas que combinen categorías y aleatorización.

## Tipos de Preguntas

![Resumen de los tipos de preguntas disponibles en la interfaz de creación de ejercicios](/.gitbook/assets/exercise-question-types.png)

Chamilo ofrece un conjunto completo de tipos de preguntas organizados en varias categorías:

### Selección Única

* **Selección múltiple (respuesta única)** — El estudiante selecciona una respuesta correcta de una lista de opciones
* **Respuesta única con imágenes** — Igual que el anterior, pero las opciones de respuesta se muestran como imágenes

### Selección Múltiple

* **Respuesta múltiple** — El estudiante selecciona una o más respuestas correctas
* **Respuesta múltiple (desplegable)** — Las opciones de respuesta se presentan como menús desplegables
* **Verdadero/Falso** — Una serie de afirmaciones que el estudiante marca como verdaderas o falsas
* **Verdadero/Falso con grado de certeza** — Verdadero/falso con un nivel adicional de confianza, permitiendo una puntuación más matizada

### Completar Espacios en Blanco

* **Completar espacios en blanco** — El estudiante completa palabras faltantes en un texto. Usted define los espacios y las respuestas aceptadas al crear la pregunta.

### Emparejamiento

* **Emparejamiento** — El estudiante conecta elementos de dos columnas
* **Emparejamiento (arrastrable)** — Mismo concepto, pero con una interfaz de arrastrar y soltar
* **Arrastrable** — Arrastrar elementos a las posiciones correctas

### Respuesta Abierta

* **Respuesta libre (ensayo)** — El estudiante escribe una respuesta en texto. Requiere calificación manual (o calificación asistida por IA si está configurada)
* **Expresión oral** — El estudiante graba una respuesta de audio usando su micrófono
* **Cargar respuesta** — El estudiante sube un archivo como respuesta

### Punto Caliente

* **Punto caliente** — El estudiante hace clic en áreas específicas de una imagen para responder
* **Delimitación de punto caliente** — El estudiante dibuja límites alrededor de áreas en una imagen

### Calculado

* **Respuesta calculada** — Preguntas numéricas con una fórmula y un rango de tolerancia. Útil para cursos de matemáticas y ciencias.

---
### Especial

* **Comprensión lectora** — Pruebas basadas en la lectura de un pasaje
* **Anotación** — El profesor sube una imagen y el estudiante la anota
* **Respuesta en documento de Office** — Cuando el plugin de OnlyOffice está habilitado, el estudiante responde a la pregunta editando un documento de Office incrustado (Word, Excel, PowerPoint). Su respuesta se guarda como un archivo separado dentro del ejercicio para que pueda ser revisado junto con el resto de su intento.

## Añadir Preguntas a un Ejercicio

1. Abre el ejercicio y haz clic en **Añadir una pregunta**
2. Selecciona el tipo de pregunta
3. Ingresa el **texto de la pregunta** (admite texto enriquecido con imágenes y formato)
4. Define las **respuestas** y su puntuación:
   * Para cada opción de respuesta, especifica si es correcta y cuántos puntos vale
   * Puedes asignar puntos negativos a respuestas incorrectas para desalentar las suposiciones
5. Opcionalmente, añade **retroalimentación** — explicaciones que se muestran al estudiante después de responder
6. Establece el **nivel de dificultad** y la **categoría** (útil para la selección aleatoria y los informes)
7. Guarda

## Categorías de Preguntas

Puedes organizar las preguntas en categorías (por ejemplo, "Módulo 1", "Vocabulario", "Avanzado"). Las categorías son útiles para:

* Organizar grandes bancos de preguntas
* Habilitar la selección aleatoria por categoría (por ejemplo, "5 preguntas del Módulo 1, 3 del Módulo 2")
* Ver las puntuaciones desglosadas por categoría en los informes

## Reutilización de Preguntas

Las preguntas pueden reutilizarse en diferentes ejercicios dentro del mismo curso. Al añadir una pregunta, puedes elegir crear una nueva o seleccionar una pregunta existente del banco de preguntas.

## Importación de Ejercicios

Chamilo permite importar ejercicios desde formatos externos:

* **IMS QTI / Common Cartridge** — El formato estándar de cuestionarios de e-learning
* **Formato Moodle** — Importa cuestionarios desde exportaciones de Moodle

Para importar, busca la opción **Importar** en la herramienta de ejercicios y sube tu archivo.

## Consejos

* **Mezcla tipos de preguntas** — Combina preguntas de opción múltiple, completar espacios en blanco y preguntas abiertas para una evaluación integral
* **Usa categorías** — Organiza las preguntas por tema para permitir una selección aleatoria específica
* **Establece un porcentaje de aprobación** — Proporciona a los estudiantes un objetivo claro y vincúlalo a la generación de certificados a través del Gradebook
* **Usa retroalimentación inmediata para practicar** — Crea ejercicios de práctica sin calificación con retroalimentación inmediata para ayudar a los estudiantes a aprender de sus errores
* **Aleatoriza para garantizar integridad** — Habilita el orden aleatorio de preguntas y respuestas para reducir la posibilidad de copiar