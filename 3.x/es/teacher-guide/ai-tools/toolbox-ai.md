# Caja de herramientas de IA

La **Caja de herramientas de IA** es una herramienta del curso que genera aplicaciones educativas interactivas a partir de las instrucciones del docente. Chamilo empaqueta cada aplicación generada como **SCORM 1.2**, de modo que el progreso, la puntuación y los datos de reanudación del estudiante son registrados por la plataforma.

> El administrador debe habilitar tanto `ai_helpers.enable_ai_helpers` como `ai_helpers.toolbox` en **Administración > Parámetros de configuración > Ayudantes de IA**, y debe estar configurado al menos un proveedor de IA de texto.

## Creación de una aplicación interactiva

1. Abra **Caja de herramientas de IA** en el curso.
2. Haga clic en **Crear**.
3. Introduzca un **Título** y, opcionalmente, una **Descripción**.
4. En **¿Qué debe hacer la aplicación?**, describa la actividad completa que desea. Incluya el objetivo de aprendizaje, las reglas, los niveles, la puntuación y lo que debe ocurrir cuando el estudiante termine.
5. Elija el **proveedor de IA** cuando haya más de uno disponible.
6. Haga clic en **Generar**.

La primera generación se almacena como **versión 1**. Comienza como borrador, de modo que puede previsualizarla antes de hacerla visible para los estudiantes.

## Mejora y control de versiones

Abra la **Configuración** de una aplicación para gestionarla. Puede:

* previsualizar o descargar la aplicación actual;
* usar **Mejorar con IA** para describir un cambio y generar una nueva versión;
* revisar el **Historial de versiones**;
* previsualizar, descargar o restaurar una versión anterior;
* publicar u ocultar la aplicación;
* abrir **Informes** para revisar el seguimiento de los estudiantes.

Generar una mejora no elimina las versiones anteriores. Restaurar una versión anterior vuelve a convertir esa versión en la actual.

## Añadir una aplicación a una secuencia de aprendizaje

En el [constructor de secuencias de aprendizaje](../adding-content/learning-paths.md), los docentes pueden seleccionar una aplicación generada con la Caja de herramientas de IA como recurso. La aplicación debe tener una versión generada, pero no es necesario que esté publicada antes de que el docente la añada a la secuencia de aprendizaje. Una aplicación no publicada sigue sin estar disponible para los estudiantes hasta que se publique.

Cuando un docente autorizado abre el contenido de la Caja de herramientas en **modo de vista previa**, Chamilo muestra **«El progreso y la puntuación no se guardan en el modo de vista previa.»** Probar la actividad de este modo no crea seguimiento del estudiante ni actualiza una puntuación. Utilice la experiencia normal del estudiante para verificar el progreso y las puntuaciones SCORM después de la publicación.

## Validación de la generación y resolución de problemas

Tras la generación con IA, Chamilo comprueba el código fuente de la aplicación generada antes de poner una versión a disposición. Esto incluye comprobaciones de sintaxis o estructura de JavaScript y restricciones sobre API del navegador no seguras. Si la validación falla, Chamilo pide al proveedor de IA que **repare el resultado una vez**; si la versión reparada sigue fallando, la generación se detiene con un error. Una validación correcta no sustituye la prueba de las reglas de aprendizaje de la actividad, la accesibilidad y la puntuación SCORM antes de la publicación.

Si la generación informa de **HTTP 504**, el servidor web o la pasarela dejaron de esperar la solicitud. Esto es distinto de un tiempo de espera impuesto por el proveedor de texto de IA. El error puede incluir el tiempo aproximado transcurrido; pruebe una solicitud de actividad más sencilla y pida al administrador que compruebe los tiempos de espera de la pasarela, de PHP/servidor web y del proveedor. Un tiempo de espera o un error de límite de tasa del proveedor requiere comprobar el modelo configurado y los ajustes del proveedor. No dé por supuesto que la aplicación se guardó correctamente después de un error.

Estas mejoras de validación y diagnóstico se introdujeron en [PR #9198](https://github.com/chamilo/chamilo-lms/pull/9198).

## Experiencia del estudiante

Los estudiantes solo ven las aplicaciones que se han publicado. Desde la Caja de herramientas pueden abrir una aplicación, continuar desde su último estado SCORM y ver su **Progreso** y su **Puntuación**. Cuando se permite un nuevo intento, **Intentar de nuevo** inicia un intento nuevo.

Las aplicaciones de la Caja de herramientas se ejecutan dentro del entorno de ejecución de las secuencias de aprendizaje en un iframe restringido e informan de su estado SCORM a Chamilo. Se gestionan desde la Caja de herramientas y no desde la lista normal de secuencias de aprendizaje.

Los clientes MCP autorizados también pueden crear o actualizar aplicaciones de la Caja de herramientas cuando están habilitados los mismos ajustes de la Caja de herramientas de IA.