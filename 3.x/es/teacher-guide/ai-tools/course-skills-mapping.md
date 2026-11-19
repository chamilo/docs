# Mapeo de competencias del curso asistido por IA

Chamilo 3.1 puede sugerir competencias asociadas a un curso y permitir que los usuarios autorizados revisen y apliquen esas sugerencias al referencial de competencias y al Gradebook. Una sugerencia de IA **no se aplica automáticamente**; debe seleccionarse y aprobarse.

## Generar sugerencias

1. Abra la página de **mapeo de competencias asistido por IA** del curso correspondiente. La ruta de la aplicación es `/course/{courseId}/skills`, sustituyendo `{courseId}` por el identificador real del curso.
2. Si el curso forma parte de una sesión, abra la página en el contexto de sesión correcto.
3. Elija un **proveedor de IA** disponible.
4. Seleccione **Sugerir competencias para este curso** y revise los resultados obtenidos.

Los proveedores de IA deben estar disponibles y configurados por la administración de la plataforma. Las sugerencias pueden referirse a entradas de **Competencia existente** o recomendar una **Competencia nueva** bajo una competencia padre. Cada entrada puede incluir su descripción, criterios y una explicación de la sugerencia.

## Revisar y aprobar

1. Lea cada sugerencia de forma crítica y compárela con los objetivos y los contenidos del curso.
2. Seleccione únicamente las competencias válidas mediante sus casillas de verificación.
3. Si dispone de la autorización requerida, elija **Añadir las competencias seleccionadas al referencial y al Gradebook**.
4. Verifique las competencias resultantes y las asociaciones del Gradebook en el curso.

Los usuarios sin privilegios de asignación pueden revisar las sugerencias, pero no pueden asociarlas. La creación de competencias nuevas requiere permisos de administrador de la plataforma. Las sugerencias pueden caducar; genere un conjunto nuevo si la aplicación indica que las anteriores ya no son válidas.

## Buenas prácticas

Las competencias generadas por IA son candidatas, no requisitos curriculares autoritativos. Revise la redacción, la duplicación, la ubicación de la competencia padre y los criterios antes de la aprobación. Evite introducir información confidencial de los estudiantes en los prompts de IA.

Consulte [Competencias y evaluaciones](../../admin-guide/skills/skills-assessments.md) y [Caja de herramientas de IA](toolbox-ai.md). Implementación: [PR #9409](https://github.com/chamilo/chamilo-lms/pull/9409).