# Limpieza de archivos

Con el tiempo, Chamilo acumula archivos temporales en sus directorios de caché y de archivo. Una limpieza periódica evita problemas de espacio en disco.

## Qué se puede limpiar

* **Archivos temporales de carga** — Archivos generados durante la exportación, la importación y otras operaciones, además de archivos obsoletos de compilación del frontend heredado
* **Caché de la aplicación Symfony** — Contenedor compilado, configuración en caché y datos de enrutamiento. Esto *no* está cubierto por la acción del panel de administración que se indica más abajo; consulte [Desde la línea de comandos](#from-the-command-line).
* **Datos de sesión** — Archivos de sesión PHP caducados
* **Archivos de registro** — Archivos de registro antiguos que ya no son necesarios

## Cómo realizar la limpieza

### Desde el panel de administración

Vaya a **Sistema > Limpiar archivos temporales** en el panel de administración (consulte [Herramientas del sistema](../system/system-tools.md#clean-temporary-files)). Informa de cuántos archivos temporales existen y cuánto espacio ocupan, y luego permite purgarlos todos o solo los archivos anteriores a una antigüedad elegida, con una vista previa en modo de simulación. También elimina archivos obsoletos de compilación heredada y regenera los recursos CSS compilados.

Esta acción excluye deliberadamente los directorios de caché propios de Symfony (`var/cache/dev`, `var/cache/prod`, `var/cache/test` y los pools de caché), por lo que no hará que un cambio en `.env` o `config/` surta efecto; para ello use la línea de comandos.

### Desde la línea de comandos

Para un mayor control, y para vaciar realmente la caché de la aplicación Symfony, use los comandos de consola de Symfony:

```bash
# Clear the Symfony cache
php bin/console cache:clear

# Clear only the production cache
php bin/console cache:clear --env=prod
```

## Consejos

* **Programe limpiezas periódicas** — Configure un trabajo cron semanal o mensual para limpiar los archivos temporales
* **Supervise el uso del disco** — Vigile el tamaño del directorio `var/`, ya que crece con los archivos de caché y de registro
* **Tenga cuidado con los registros** — Antes de eliminar archivos de registro, compruebe si contienen información que pueda necesitar para la resolución de problemas