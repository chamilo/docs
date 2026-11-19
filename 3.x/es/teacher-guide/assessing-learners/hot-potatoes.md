# Actividades de Hot Potatoes

Chamilo 3.1 permite importar actividades HTML de Hot Potatoes en la herramienta moderna de Ejercicios y utilizar actividades individuales dentro de las rutas de aprendizaje.

## Importar una actividad

1. Abra la herramienta **Ejercicios** del curso y vaya a **Hot Potatoes**.
2. En **Importar Hot Potatoes**, seleccione un paquete **ZIP** de Hot Potatoes o una exportación **HTML** independiente.
3. Cuando una actividad dependa de imágenes, medios u otros archivos vinculados, incluya esos recursos en el ZIP.
4. Seleccione **Importar** y compruebe que la actividad importada se abre y se muestra correctamente.

## Gestionar y reutilizar actividades

Desde la lista de Hot Potatoes, utilice **Abrir** para previsualizar la actividad, **Editar** para cambiar su título, **Publicar** u **Ocultar** para controlar la visibilidad y **Eliminar** para quitarla cuando esté permitido. El constructor de rutas de aprendizaje puede incluir actividades individuales de Hot Potatoes entre sus recursos.

## Revisar los intentos del alumnado

La acción **Intentos** muestra los intentos registrados para su revisión por el profesorado. El profesorado puede asignar una puntuación porcentual revisada de 0 a 100. La pantalla muestra actualmente hasta los 100 intentos más recientes. Utilice el resultado realmente mostrado de la actividad como evidencia de apoyo al evaluar a un estudiante.

**La puntuación automática y la sincronización con el libro de calificaciones no están implementadas.** Las puntuaciones que muestra el propio paquete de Hot Potatoes no deben tratarse como calificaciones verificadas en el servidor. Los resultados revisados por el profesorado se almacenan por separado.

## Resolución de problemas

Si faltan medios, vuelva a exportar la actividad con todos los recursos vinculados en su ZIP. Si una exportación HTML funciona en un equipo local pero no en Chamilo, compruebe si hay referencias a archivos externos o contenido incrustado incompatible. Pruebe la visibilidad de la actividad tanto con una cuenta de estudiante como con una cuenta de profesor.

Consulte [Ejercicios](exercises.md) y [Rutas de aprendizaje](../adding-content/learning-paths.md). Implementación: [PR #9380](https://github.com/chamilo/chamilo-lms/pull/9380).