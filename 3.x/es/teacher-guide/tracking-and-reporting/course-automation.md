# Automatización del curso (activadores manuales)

La sección **Automatización** de los informes del curso permite a los docentes autorizados configurar acciones para el inicio y el final de un curso. En la implementación actual de Chamilo 3.1, las acciones se **activan manualmente**: no dé por sentado que se ejecutan automáticamente en una fecha del calendario o mediante cron.

## Configurar acciones

1. Abra un curso como docente u otro usuario autorizado para gestionar los informes del curso.
2. Abra **Informes** y localice la sección **Automatización**.
3. Seleccione el evento (**El curso se abre ahora** o **El curso finaliza ahora**) y un tipo de acción.
4. Indique el destino requerido por esa acción y, a continuación, seleccione **Añadir acción**.
5. Revise la lista de **Acciones configuradas**; elimine una entrada no deseada con su acción **Eliminar**.

Las acciones admitidas incluyen publicar u ocultar recursos del curso, enviar invitaciones a encuestas, entregar certificados existentes y cambiar la visibilidad del curso. Los recursos, las encuestas, las opciones del libro de calificaciones y los valores de visibilidad disponibles dependen del curso y de los permisos del usuario actual.

## Ejecutar el evento configurado

Elija **El curso se abre ahora** o **El curso finaliza ahora** y confirme la operación. Examine el resultado notificado. Chamilo registra las ejecuciones completadas, impide configuraciones duplicadas y omite las acciones que ya se completaron correctamente en ejecuciones posteriores. Un segundo clic no debe considerarse una forma de reenviar una acción ya completada.

Para la entrega de certificados, prepare y pruebe primero el certificado correspondiente. Para las invitaciones a encuestas, compruebe que la encuesta está configurada y que los estudiantes previstos pertenecen al contexto actual del curso o de la sesión.

## Limitaciones importantes

- Esta interfaz proporciona **ejecución manual**, no automatización programada.
- Las acciones operan dentro del contexto actual del curso o de la sesión; pruebe el acceso y los destinos en ambos contextos cuando corresponda.
- Las acciones completadas correctamente no se repiten automáticamente en ejecuciones posteriores.
- En el momento de la PR de la funcionalidad, la entrega de certificados, los cambios de visibilidad del curso y la ejecución específica de la sesión se revisaron en el código, pero no se verificaron funcionalmente en esa PR. Pruébelos en su instalación antes de depender de ellos de forma operativa.

Consulte [Informes del curso](course-reports.md) y [Certificados y competencias](certificates-and-skills.md). Implementación: [PR #9464](https://github.com/chamilo/chamilo-lms/pull/9464).