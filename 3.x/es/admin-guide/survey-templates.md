# Plantillas de encuestas

Los administradores pueden crear cuestionarios de encuesta reutilizables y ofrecerlos a los docentes o asignarlos directamente a cursos y sesiones. Esta funcionalidad se implementó en [PR #9208](https://github.com/chamilo/chamilo-lms/pull/9208) para el [issue #8760](https://github.com/chamilo/chamilo-lms/issues/8760).

## Crear y mantener plantillas

1. En el panel de administración, abra **Plantillas de encuestas** y elija **Crear**.
2. Introduzca un título y un subtítulo opcional; configure el anonimato, la disposición de las preguntas, el orden aleatorio, la duración, el texto de introducción y el texto de agradecimiento.
3. Guarde y añada o edite las preguntas reutilizables en el editor de preguntas de la plantilla.
4. Active **Visible como plantilla** si los docentes deben poder verla y reutilizarla. Una plantilla invisible sigue disponible para el administrador.

Las plantillas pertenecen a la URL de acceso actual. Solo los administradores de la plataforma pueden crear, editar o eliminar la plantilla maestra. Los docentes pueden usar las plantillas visibles, pero no pueden modificar su definición maestra.

## Reutilizar una plantilla en un curso o sesión

En un curso o sesión autorizados, un docente puede elegir una plantilla visible al crear una nueva encuesta. El resultado es una encuesta en ese contexto de curso, no una modificación de la plantilla maestra reutilizable. El docente puede revisar las preguntas y seguir el flujo habitual de publicación e invitación.

Desde la lista de plantillas de administración, un administrador puede, en cambio, asignar una plantilla directamente a un **curso** seleccionado y, opcionalmente, a una de las **sesiones** de ese curso. Chamilo comprueba que el curso pertenezca al portal actual y que la sesión seleccionada contenga realmente el curso. La interfaz del docente no puede utilizarse para asignar una plantilla al curso o a la sesión de otra persona.

La nueva encuesta no se publica automáticamente solo porque se haya creado a partir de una plantilla; revísela antes de invitar a los participantes. Consulte [Encuestas](../teacher-guide/assessing-learners/surveys.md) para el flujo de trabajo estándar de las encuestas.

## Ocultar resultados sensibles a docentes o tutores

Al editar una encuesta real, un administrador de la plataforma puede activar **Resultados ocultos para el docente/tutor**. Esta restricción por encuesta está pensada para cuestionarios sensibles, como las evaluaciones del personal docente. Los docentes y tutores pueden seguir consultando el número de respuestas y enviar recordatorios, pero **no pueden abrir las vistas de informes ni exportar los resultados**. Los administradores de la plataforma conservan el acceso a los informes, sujeto a otros ajustes de la plataforma.

Esta opción difiere del campo normal **Visibilidad de los resultados** y del ajuste de toda la plataforma **Ocultar el botón de informes de encuestas**. Solo un administrador puede cambiar el indicador de resultados restringidos.

## Permisos y alcance

* **Administrador:** gestionar plantillas, establecer la visibilidad de las plantillas, asignarlas a cursos/sesiones elegibles y controlar el acceso restringido a los resultados.
* **Docente / docente de sesión:** ver e instanciar solo las plantillas visibles dentro de su contexto de curso autorizado.
* **URL de acceso:** el catálogo de plantillas y la asignación aplican la URL de acceso actual; las plantillas de otros portales no pueden instanciarse a través de ese límite.

Si las plantillas no aparecen para los docentes, compruebe **Visible como plantilla** y su contexto de curso/sesión. Si una plantilla no puede instanciarse, compruebe las restricciones globales de creación de encuestas y el curso/sesión de destino previstos.