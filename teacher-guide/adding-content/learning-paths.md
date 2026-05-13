# Rutas de Aprendizaje

Las rutas de aprendizaje te permiten crear secuencias estructuradas de actividades de aprendizaje. Una ruta de aprendizaje guía a tus estudiantes a través de un orden específico de documentos, ejercicios, enlaces y otros recursos, con prerrequisitos opcionales y seguimiento del progreso.

Esta herramienta es, posiblemente, la más utilizada en los cursos, ya que actúa como un compositor para muchas otras herramientas y puede ser la ***única*** herramienta visible para los estudiantes.

## ¿Por qué usar Rutas de Aprendizaje?

Las rutas de aprendizaje son útiles cuando deseas:

* **Controlar el orden** del consumo de contenido — asegurar que los estudiantes completen el material básico antes de avanzar
* **Rastrear el progreso** — ver exactamente en qué punto de la secuencia se encuentra cada estudiante
* **Establecer prerrequisitos** — exigir a los estudiantes que aprueben un ejercicio antes de acceder a la siguiente sección
* **Otorgar finalización** — vincular la finalización de la ruta de aprendizaje al libro de calificaciones y certificados
* **Empaquetar contenido** — crear módulos de aprendizaje autocontenidos que los estudiantes puedan trabajar a su propio ritmo

## Crear una Ruta de Aprendizaje

1. Abre la herramienta **Rutas de aprendizaje** <img src="/.gitbook/assets/icons/mdi-map-marker-path.svg" alt="Rutas de aprendizaje" data-size="line"> desde la página principal del curso
2. Haz clic en **Crear una ruta de aprendizaje**
3. Ingresa un **título** y una descripción opcional
4. Guarda — serás dirigido al editor de rutas de aprendizaje

## El Editor de Rutas de Aprendizaje

![El editor de rutas de aprendizaje con el árbol de elementos a la izquierda y la vista previa del contenido a la derecha](/.gitbook/assets/learning-path-editor.png)

El editor tiene dos áreas principales:

* **Panel izquierdo** — La lista de elementos (pasos) en la ruta de aprendizaje, mostrada como una estructura de árbol
* **Panel derecho** — El contenido del elemento seleccionado

### Añadir Elementos

Haz clic en **Añadir un elemento** y elige qué agregar:

| Tipo de elemento | Descripción |
|------------------|-------------|
| **Sección** | Un encabezado que agrupa elementos relacionados (como un título de capítulo). Las secciones no contienen contenido por sí mismas. |
| **Documento** | Un archivo o página web de la herramienta Documentos de tu curso |
| **Ejercicio** | Un cuestionario o prueba de la herramienta Ejercicios |
| **Enlace** | Una URL externa |
| **Tarea** | Una publicación de estudiante de la herramienta Tareas |
| **Foro** | Un enlace a un foro del curso |
| **Encuesta** | Un enlace a una encuesta |
| **Certificado** | Una página especial para activar la generación de un certificado de finalización o la asignación de habilidades |

### Organizar Elementos

* **Arrastra y suelta** los elementos para reordenarlos
* **Anida elementos** bajo secciones arrastrándolos hacia la derecha
* **Elimina** elementos que ya no necesites

### Establecer Prerrequisitos

Los prerrequisitos aseguran que los estudiantes completen ciertos pasos antes de acceder a otros:

1. Selecciona un elemento en la ruta de aprendizaje
2. Abre sus ajustes de **prerrequisitos**
3. Elige qué elemento(s) precedente(s) debe(n) completarse primero
4. Para ejercicios, puedes exigir una **puntuación mínima** (por ejemplo, "Debe obtener al menos un 70% en el Cuestionario 1 antes de acceder al Módulo 2")

## Experiencia del Estudiante

Cuando un estudiante abre una ruta de aprendizaje:

* Ve la lista de elementos en el panel izquierdo
* Los elementos completados están marcados con una marca de verificación
* Los elementos con prerrequisitos no cumplidos están bloqueados
* El progreso se rastrea automáticamente — si un estudiante se va y regresa, retoma donde lo dejó
* Una barra de progreso muestra el porcentaje de finalización general

## Contenido SCORM

La herramienta de rutas de aprendizaje de Chamilo puede importar paquetes **SCORM 1.2**, el estándar de e-learning más utilizado. Sube un archivo ZIP de SCORM y Chamilo creará una ruta de aprendizaje a partir de él, rastreando el progreso y las puntuaciones según la especificación SCORM.

Para importar un paquete SCORM:

1. En la herramienta Rutas de aprendizaje, abre el menú de acciones y haz clic en **Subir**
2. Sube el archivo ZIP
3. Chamilo descomprime y crea la ruta de aprendizaje automáticamente

### Paquetes CMI5 / xAPI

Los paquetes CMI5 (el sucesor moderno basado en xAPI de SCORM) son compatibles a través del plugin **XApi**. Una vez que el plugin esté habilitado por tu administrador, puedes importar un paquete CMI5 y los estudiantes pueden iniciarlo desde el curso; sus declaraciones se envían al Learning Record Store configurado.

## Configuraciones de la Ruta de Aprendizaje

Configura cómo se comporta la ruta de aprendizaje:

| Configuración | Descripción |
|---------------|-------------|
| **Visibilidad** | Ocultar o mostrar la ruta de aprendizaje a los estudiantes |
| **Prerrequisitos** | Exigir la finalización de otras rutas de aprendizaje antes de esta |
| **Inicio automático** | Abrir automáticamente esta ruta de aprendizaje cuando los estudiantes ingresen al curso |
| **Tiempo SCORM acumulado** | Si se debe acumular el tiempo a través de múltiples sesiones |

## Vinculación al Libro de Calificaciones

Puedes incluir la finalización de la ruta de aprendizaje como una actividad calificada en el Libro de Calificaciones. Esto permite que el progreso en la ruta de aprendizaje contribuya a la calificación general del curso del estudiante y a su elegibilidad para certificados.

## Uso de IA

Si el administrador ha habilitado la generación de rutas de aprendizaje asistida por IA, encontrarás una opción de generador de IA en el menú desplegable de acciones. Proporciona a la IA un contexto lo más preciso posible sobre cómo deseas que sea tu ruta de aprendizaje, indica el número de páginas y una cantidad aproximada de palabras por página, y luego especifica si deseas que se complete con pruebas y se lance. Unos minutos después, tendrás ante ti una ruta de aprendizaje completa basada en texto.

Edita los documentos para generar ilustraciones con más IA y solo te quedará realizar una revisión antes de poder compartirla con tus estudiantes.

## Consejos

* **Comienza con un esquema** — Planifica tus secciones y elementos antes de construir la ruta
* **Usa secciones como capítulos** — Agrupa elementos relacionados bajo encabezados de sección para mayor claridad
* **Establece prerrequisitos para las evaluaciones** — Exige a los estudiantes que estudien el contenido antes de realizar un cuestionario
* **Mezcla tipos de contenido** — Combina materiales de lectura, videos, ejercicios interactivos y recursos externos para una experiencia de aprendizaje atractiva
* **Verifica la vista del estudiante** — Usa la función de Vista de Estudiante para experimentar la ruta de aprendizaje como lo haría un estudiante
* **Usa SCORM para interactividad** — Si tienes acceso a herramientas de creación de SCORM (como Articulate, iSpring o similares), crea contenido interactivo enriquecido e impórtalo a Chamilo