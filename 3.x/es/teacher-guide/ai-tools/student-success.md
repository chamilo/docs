# Coach de IA para el éxito del estudiante

El **Coach de IA para el éxito del estudiante** ayuda al docente a convertir la actividad del curso en recomendaciones prácticas para un estudiante. Está disponible desde la lista de estudiantes en el área de informes del curso cuando los ayudantes de IA y la función **Analizador de cursos** están habilitados para ese curso.

> La plataforma debe tener configurado al menos un proveedor de IA de texto. Consulte [Configuración de IA](../../admin-guide/integrations/ai-configuration.md). Los parámetros relevantes de la plataforma son `ai_helpers.enable_ai_helpers` y `ai_helpers.course_analyser` en **Administración > Parámetros de configuración > Ayudantes de IA**.

## Generación de una recomendación

1. Abra el área de informes del curso y muestre la **Lista de estudiantes**.
2. Busque al estudiante y haga clic en la acción **Coach de IA para el éxito del estudiante**.
3. Si hay varios proveedores de IA disponibles, seleccione uno.
4. Opcionalmente, introduzca **Instrucciones adicionales para el coach de IA**. Estas le permiten añadir contexto pedagógico o pedir al coach que se centre en una dificultad concreta.
5. Haga clic en **Analizar el aprendizaje del usuario**.

Chamilo prepara primero o reutiliza un análisis del curso y, a continuación, analiza la actividad del estudiante en el contexto del curso actual o de la sesión del curso.

## Contenido de la recomendación

El resultado puede incluir:

* un resumen general conciso;
* **Acciones prioritarias**;
* **Actividades adicionales** sugeridas;
* recomendaciones sobre el **Ritmo** y la cadencia;
* **Metodologías de aprendizaje** alternativas;
* otras recomendaciones cuando proceda;
* enlaces de **Evidencia** del catálogo aprobado de fuentes pedagógicas para el idioma del curso.

La recomendación se almacena en Chamilo para ese estudiante y ese contexto de curso. Chamilo también guarda una copia en la bandeja de entrada del propio docente cuando la creación del mensaje se realiza correctamente, de modo que pueda revisarse más adelante.

## Privacidad

Antes de que comience el análisis, Chamilo muestra una advertencia de privacidad. Los identificadores directos del perfil se omiten de la carga de datos del estudiante enviada al proveedor de IA, y se indica a la IA que no identifique al estudiante ni infiera rasgos sensibles. No obstante, la actividad de aprendizaje y el contenido del curso pueden contener información que podría identificar indirectamente a alguien. Siga la política de IA y privacidad de su organización antes de utilizar la función.

El mismo análisis de éxito del estudiante también está disponible para los clientes MCP autorizados a través de la herramienta `generate_student_success_feedback`; reutiliza el mismo flujo de análisis filtrado por privacidad.