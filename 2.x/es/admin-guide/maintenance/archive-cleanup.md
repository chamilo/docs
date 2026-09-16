# Limpieza de Archivos Temporales

Con el tiempo, Chamilo acumula archivos temporales en sus directorios de caché y archivos. Una limpieza regular previene problemas de espacio en disco.

## Qué Se Puede Limpiar

* **Caché de Symfony** — Plantillas compiladas, configuración en caché y datos de enrutamiento
* **Archivos temporales** — Archivos generados durante exportaciones, importaciones y otras operaciones
* **Datos de sesión** — Archivos de sesión de PHP expirados
* **Archivos de registro** — Archivos de registro antiguos que ya no son necesarios

## Realizar la Limpieza

### Desde el Panel de Administración

Dirígete a **Limpieza de archivos temporales** en el panel de administración. Haz clic en el botón de limpieza para eliminar los archivos temporales.

### Desde la Línea de Comandos

Para un mayor control, utiliza los comandos de la consola de Symfony:

```bash
# Limpiar el caché de Symfony
php bin/console cache:clear

# Limpiar solo el caché de producción
php bin/console cache:clear --env=prod
```

## Consejos

* **Programa limpiezas regulares** — Configura un trabajo cron semanal o mensual para limpiar archivos temporales
* **Monitorea el uso del disco** — Vigila el tamaño del directorio `var/`, ya que crece con los archivos de caché y registro
* **Ten cuidado con los registros** — Antes de eliminar archivos de registro, verifica si contienen información que podrías necesitar para la resolución de problemas