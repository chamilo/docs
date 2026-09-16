# Itinerarios de aprendizaje

Los itinerarios de aprendizaje le permiten crear secuencias estructuradas de actividades de aprendizaje. Un itinerario guía a sus alumnos a través de un orden específico de documentos, ejercicios, enlaces y otros recursos, con prerrequisitos opcionales y seguimiento del progreso.

Esta herramienta es, posiblemente, la más utilizada del curso, porque actúa como un compositor de muchas otras herramientas y puede ser, en gran medida, la ***única*** herramienta que ven los alumnos.

## ¿Por qué usar itinerarios de aprendizaje?

Los itinerarios de aprendizaje son útiles cuando desea:

* **Controlar el orden** de consumo del contenido — asegurarse de que los alumnos completen el material fundamental antes de avanzar
* **Seguir el progreso** — ver exactamente en qué punto de la secuencia se encuentra cada alumno
* **Establecer prerrequisitos** — exigir que los alumnos aprueben un ejercicio antes de acceder a la siguiente sección
* **Otorgar la finalización** — vincular la finalización del itinerario con el libro de calificaciones y los certificados
* **Empaquetar contenido** — crear módulos de aprendizaje autónomos que los alumnos puedan recorrer a su propio ritmo

## Crear un itinerario de aprendizaje

1. Abra la herramienta **Itinerarios de aprendizaje** <img src="/.gitbook/assets/icons/mdi-map-marker-path.svg" alt="Itinerarios de aprendizaje" data-size="line"> desde la página de inicio del curso
2. Haga clic en **Crear un itinerario de aprendizaje**
3. Introduzca un **título** y, de forma opcional, una descripción
4. Guarde — se le llevará al editor del itinerario de aprendizaje

## El editor del itinerario de aprendizaje

![El editor del itinerario de aprendizaje con el árbol de elementos a la izquierda y la vista previa del contenido a la derecha](/.gitbook/assets/learning-path-editor.png)

El editor tiene dos áreas principales:

* **Panel izquierdo** — La lista de elementos (pasos) del itinerario de aprendizaje, mostrada como una estructura de árbol
* **Panel derecho** — El contenido del elemento seleccionado

### Añadir elementos

Haga clic en **Añadir un elemento** y elija qué añadir:

| Tipo de elemento | Descripción |
|-----------|-------------|
| **Sección** | Un encabezado que agrupa elementos relacionados (como el título de un capítulo). Las secciones no contienen contenido por sí mismas. |
| **Documento** | Un archivo o página web de la herramienta Documentos de su curso |
| **Ejercicio** | Un cuestionario o prueba de la herramienta Ejercicios |
| **Enlace** | Una URL externa |
| **Tarea** | Una publicación de alumno de la herramienta Tareas |
| **Foro** | Un enlace a un foro del curso |
| **Encuesta** | Un enlace a una encuesta |
| **Certificado** | Una página especial para desencadenar la generación de un certificado de finalización o la concesión de competencias |

### Organizar elementos

* **Arrastre y suelte** elementos para reordenarlos
* **Anide elementos** bajo secciones arrastrándolos hacia la derecha
* **Elimine** los elementos que ya no necesite

### Establecer prerrequisitos

Los prerrequisitos garantizan que los alumnos completen determinados pasos antes de acceder a otros:

1. Seleccione un elemento del itinerario de aprendizaje
2. Abra su configuración de **prerrequisitos**
3. Elija qué elemento(s) precedente(s) deben completarse primero
4. En el caso de los ejercicios, puede exigir una **puntuación mínima** (p. ej., «Debe obtener al menos un 70 % en el Cuestionario 1 antes de acceder al Módulo 2»)

## Experiencia del alumno

Cuando un alumno abre un itinerario de aprendizaje:

* Ve la lista de elementos en el panel izquierdo
* Los elementos completados se marcan con una marca de verificación
* Los elementos con prerrequisitos no cumplidos están bloqueados
* El progreso se registra automáticamente — si un alumno se va y vuelve, reanuda donde lo dejó
* Una barra de progreso muestra el porcentaje global de finalización

## Contenido SCORM

La herramienta de itinerarios de aprendizaje de Chamilo puede importar paquetes **SCORM 1.2** — el estándar de e-learning más utilizado. Cargue un archivo ZIP SCORM y Chamilo creará un itinerario de aprendizaje a partir de él, registrando el progreso y las puntuaciones según la especificación SCORM.

Para importar un paquete SCORM:

1. En la herramienta Itinerarios de aprendizaje, abra el menú de acciones y haga clic en **Cargar**
2. Cargue el archivo ZIP
3. Chamilo descomprime y crea el itinerario de aprendizaje automáticamente

### Paquetes CMI5 / xAPI

Los paquetes CMI5 (el sucesor moderno de SCORM basado en xAPI) se admiten mediante el plugin **XApi**. Una vez que el administrador haya habilitado el plugin, puede importar un paquete CMI5 y los alumnos pueden lanzarlo desde el curso; sus declaraciones se reenvían al Learning Record Store configurado.

## Creación de contenido con C-Studio

*Disponible si su administrador ha habilitado el plugin C-Studio.*

C-Studio añade un editor visual integrado de arrastrar y soltar para crear contenido interactivo directamente dentro de un itinerario de aprendizaje — una alternativa a importar un paquete SCORM cuando no dispone de (o no desea aprender) una herramienta de autoría independiente como Articulate o iSpring. Crea el contenido página a página dentro de Chamilo, y se almacena y se sigue como cualquier otro elemento del itinerario de aprendizaje.

### Iniciar un proyecto de C-Studio

Cuando el plugin está activo, la lista de itinerarios de aprendizaje muestra un botón adicional junto al menú de acciones habitual, marcado con un «+» y un tooltip «Studio Tools»:

![La lista de itinerarios de aprendizaje mostrando el botón «Studio Tools» de C-Studio junto al menú de acciones estándar](/.gitbook/assets/cstudio-lp-button.png)

Haga clic en él para comenzar. Se le pedirá crear un proyecto nuevo desde cero o importar uno existente:

![La pantalla de inicio de C-Studio ofreciendo crear un proyecto nuevo o importar uno existente](/.gitbook/assets/cstudio-start-screen.png)

Esta pantalla concreta está disponible actualmente solo en francés, independientemente del idioma de la plataforma o del curso: una limitación conocida de la versión del plugin en uso. Asigne un título a su proyecto y se abrirá directamente en el editor.

### El editor

![El editor visual de C-Studio, mostrando el lienzo de la página, la paleta de herramientas a la derecha y el panel del proyecto a la izquierda](/.gitbook/assets/cstudio-editor.png)

El editor es un constructor visual página a página:

* **Panel izquierdo** — las páginas de su proyecto, con un «+» para añadir más, y una sección **Tools** en la parte inferior (Clean data, Preview, Colors, Options, Quit)
* **Lienzo central** — la página que está construyendo; haga clic en cualquier elemento para editarlo in situ
* **Panel derecho** — la paleta de componentes, que se arrastra al lienzo

La paleta cubre bloques de construcción básicos (columnas, imágenes, audio, títulos, texto, botones, tarjetas) así como varios tipos de ejercicios interactivos: **Drag Drop**, **Fill text**, **Hotspot Img**, **Mark Words**, **Find Words** y **Sort paragraphs**, además de un bloque **iframe** para incrustar contenido externo y un bloque **Quiz**.

### Idioma

La propia interfaz de C-Studio puede aparecer por defecto en francés la primera vez que la abra, con independencia del idioma de la interfaz de Chamilo o del idioma del curso. Si es así, vaya a **File > UI language** y elija su idioma: el editor se recarga de inmediato y recuerda su elección a partir de entonces.

![El menú File abierto, mostrando la opción «UI language»](/.gitbook/assets/cstudio-file-menu.png)

### Guardar y exportar

Utilice **File > Save** mientras trabaja. **File > Export...** empaqueta su proyecto como un archivo SCORM que puede descargar, respaldar o reutilizar en otro lugar mediante **Import...**. **File > Quit** le devuelve a la lista de itinerarios de aprendizaje, donde su proyecto de C-Studio aparece ahora como un elemento habitual.

## Configuración del itinerario de aprendizaje

Configure el comportamiento del itinerario de aprendizaje:

| Setting | Description |
|---------|-------------|
| **Visibility** | Ocultar o mostrar el itinerario de aprendizaje a los alumnos |
| **Prerequisites** | Exigir la finalización de otros itinerarios de aprendizaje antes de este |
| **Auto-launch** | Abrir automáticamente este itinerario de aprendizaje cuando los alumnos entran en el curso |
| **Accumulated SCORM time** | Si se acumula el tiempo a lo largo de varias sesiones |

## Vinculación con el libro de calificaciones

Puede incluir la finalización del itinerario de aprendizaje como actividad calificada en el Gradebook. Esto permite que el progreso del itinerario contribuya a la nota global del curso del alumno y a la elegibilidad para el certificado.

## Uso de la IA

Si el administrador ha habilitado la generación de itinerarios de aprendizaje asistida por IA, encontrará una opción de generador de IA en el menú desplegable de acciones. Proporcione a la IA un contexto tan preciso como desee para su itinerario, solicite un número de páginas y un número aproximado de palabras por página, indique si desea rellenarlo con pruebas y lance el proceso. Unos minutos después, tendrá ante sí un itinerario de aprendizaje completo basado en texto.

Edite los documentos para generar ilustraciones con más IA y solo le quedará una revisión antes de poder compartirlo con sus alumnos.

## Consejos

* **Empiece con un esquema** — Planifique las secciones y los elementos antes de construir el itinerario
* **Use las secciones como capítulos** — Agrupe elementos relacionados bajo encabezados de sección para mayor claridad
* **Establezca prerrequisitos para las evaluaciones** — Exija a los alumnos estudiar el contenido antes de realizar un cuestionario
* **Combine tipos de contenido** — Combine materiales de lectura, vídeos, ejercicios interactivos y recursos externos para una experiencia de aprendizaje atractiva
* **Compruebe la vista del alumno** — Utilice la función Student View para experimentar el itinerario de aprendizaje como lo haría un alumno
* **Use SCORM para la interactividad** — Si tiene acceso a herramientas de autoría SCORM (como Articulate, iSpring o similares), cree contenido interactivo enriquecido e impórtelo en Chamilo. Si su administrador ha habilitado el plugin C-Studio, puede crear contenido interactivo similar directamente en Chamilo: consulte [Autoría de contenido con C-Studio](#content-authoring-with-c-studio) más arriba