# Papeleras de reciclaje para ejercicios y lecciones

Chamilo 3.1 puede archivar los intentos de ejercicio eliminados y los datos de seguimiento de las lecciones para que los docentes autorizados puedan restaurarlos, con sujeción a la retención y a los controles de acceso configurados. Las papeleras de reciclaje protegen los datos de seguimiento; no sustituyen las copias de seguridad de la base de datos.

## Restaurar un intento de ejercicio

1. Abra la página **Informes** del ejercicio afectado con el curso o la sesión correctos seleccionados.
2. Seleccione **Papelera de reciclaje** para mostrar los intentos archivados.
3. Identifique al estudiante y el intento que necesita recuperar.
4. Seleccione **Restaurar**, confirme y actualice el informe para verificar las respuestas y las puntuaciones.

Debe tener permiso para gestionar los resultados de los ejercicios. La restauración puede bloquearse cuando el ejercicio está bloqueado por el libro de calificaciones o cuando la plataforma restringe el acceso de los docentes a los resultados.

## Restaurar el progreso de una lección

1. Abra la pantalla de informes de la lección correspondiente para el curso o la sesión previstos.
2. Abra su **Papelera de reciclaje**.
3. Seleccione el progreso archivado del estudiante y **Restáurelo**.
4. Compruebe el progreso restaurado de la lección y los intentos de ejercicio asociados.

Cuando un intento de ejercicio forma parte de un archivo de lección pendiente, restaure primero el archivo de la lección. La restauración individual se bloquea deliberadamente para evitar un progreso incoherente.

## Retención y limpieza (administradores)

El ajuste `tracking.recycle_bin_retention_hours` controla durante cuánto tiempo los archivos siguen siendo elegibles para la recuperación. El valor predeterminado inicial es de **30 días** (720 horas). Las instalaciones existentes deben sincronizar el nuevo ajuste mediante la migración de inserción o actualización de ajustes del proyecto antes de esperar que la interfaz de administración lo muestre.

Previsualice una limpieza sin eliminar nada:

```bash
php bin/console chamilo:recycle-bin:purge
```

La eliminación permanente requiere una opción explícita:

```bash
php bin/console chamilo:recycle-bin:purge --execute
```

El comando admite `--hours` (anulación de la retención), `--scan-limit`, `--after-lp-id` y `--after-exercise-id` para un procesamiento controlado. Prográmelo solo después de verificar la política de retención y las disposiciones de copia de seguridad. **No existe una programación implícita de purga automática** por el mero hecho de que la función esté habilitada.

Consulte [Ejercicios](exercises.md) y [Lecciones](../adding-content/learning-paths.md). Implementación: [PR #9383](https://github.com/chamilo/chamilo-lms/pull/9383).