# Integridad de archivos

*Novedad en Chamilo 3.0.*

La integridad de archivos compara los archivos instalados en su servidor con una línea base de confianza, para detectar adiciones, modificaciones, eliminaciones y cambios de permisos que no esperaba: el tipo de cambio que dejaría una intrusión exitosa, una dependencia comprometida o una edición manual errónea.

## Acceso a la integridad de archivos

Desde el panel de administración, haga clic en **Seguridad > Integridad de archivos**.

## Qué muestra

![La página Integridad de archivos, que muestra la información del último análisis, paneles de archivos añadidos, modificados, eliminados y con permisos cambiados, una lista de historial de alertas y acciones para ejecutar un análisis, pausar las alertas o establecer una nueva línea base](../../.gitbook/assets/admin-security-file-integrity.png)

* **Último análisis** — Cuándo se ejecutó el análisis más reciente y cuántos archivos comprobó
* **Añadidos / Modificados / Eliminados** — Archivos que difieren de la línea base, identificados mediante la comparación de sumas de comprobación SHA-256 (cada lista está limitada a 500 rutas, con una nota si la lista completa es más larga; consulte el registro CEF más abajo para ver la lista completa)
* **Permisos cambiados** — Archivos cuyos permisos difieren de la línea base. En Linux, se comparan directamente los bits de modo POSIX (por ejemplo, se señala un archivo que pasa a ser escribible por todos); en Windows, solo se registra el atributo de solo lectura, ya que `fileperms()` no refleja las ACL reales de NTFS
* **Historial de alertas** — Un registro duradero y de solo adición de cada análisis que encontró algo (hasta los últimos 50). A diferencia del informe anterior, esta lista nunca se borra con un análisis limpio ni con una nueva línea base, de modo que las alertas anteriores permanecen visibles incluso después de que se haya resuelto la desviación que señalaron

La comprobación recorre todo el árbol de archivos instalado, excepto los directorios `var/` y `.git/`, con una excepción: `.git/config` se vigila de forma individual, específicamente para detectar que un remoto de Git se redirija en silencio a un servidor hostil. Los enlaces simbólicos nunca se siguen, para evitar bucles de recorrido o salir del directorio de instalación.

Dado que un análisis completo de una instalación grande puede tardar varios minutos, el recorrido se divide en fragmentos (un directorio de primer nivel cada vez) y su progreso se registra en un archivo de bloqueo, de modo que la página puede recargarse con seguridad para comprobar el progreso y un análisis interrumpido o finalizado de forma abrupta nunca se confunde con uno que sigue en ejecución.

## Acciones

* **Ejecutar un análisis ahora** — Compara de inmediato el árbol de archivos actual con la línea base
* **Pausar durante 1 hora** — Suspende temporalmente las alertas (por ejemplo, mientras despliega una actualización). Requiere volver a introducir su propia contraseña. Mientras está en pausa, un análisis adopta en silencio el árbol actual como nueva línea base en lugar de alertar, de modo que la ventana de pausa se cierra sin alertas residuales. La pausa máxima es de 24 horas
* **Establecer nueva línea base** — Adopta el árbol de archivos actual como nueva referencia de confianza. Requiere volver a introducir su propia contraseña

Pausar las alertas o establecer una nueva línea base puede ocultar una intrusión en curso, por lo que ambas acciones requieren de nuevo su contraseña: una sesión de administrador secuestrada por sí sola no basta para silenciar la detección mientras se manipulan los archivos.

## Ejecución desde cron

Las mismas comprobaciones están disponibles como comandos de consola, pensados para programarse con cron en lugar de ejecutarse desde la página de administración de forma programada:

```bash
# Scan for drift and alert admins if anything changed
0 3 * * * cd /var/www/chamilo/master && php bin/console app:file-integrity:scan

# Generate or regenerate the baseline (run once after install, or after a manual update)
php bin/console app:file-integrity:baseline

# Pause alerting from the command line (prompts for a global administrator's username and password)
php bin/console app:file-integrity:snooze
```

Si hay una pausa activa, `app:file-integrity:scan` vuelve a establecer la línea base en silencio en lugar de alertar, de acuerdo con el comportamiento de un análisis iniciado desde la página de administración.

## Configuración

Un ajuste relacionado se encuentra en **Configuración > Seguridad**:

* **`file_integrity_check_notify_admins`** — Una lista de direcciones de correo electrónico a las que notificar cuando se detecte una desviación; si se deja vacía, se notifica a todos los administradores globales

## Integración con SIEM

Cada análisis también escribe líneas de registro CEF (Common Event Format) en `var/logs/security/file_integrity.log`, adecuadas para su ingesta por un SIEM (Wazuh, Splunk, QRadar, ArcSight, Elastic/Filebeat y herramientas similares). Cada línea se etiqueta con un identificador de firma que indica el tipo de cambio:

| Firma | Significado |
|-----------|---------|
| `FIM-ADDED` | Apareció un archivo nuevo |
| `FIM-MODIFIED` | Cambió el contenido de un archivo |
| `FIM-DELETED` | Desapareció un archivo |
| `FIM-GITCONFIG` | Cambió `.git/config` (posible remoto secuestrado) |
| `FIM-PERMS` | Cambiaron los permisos de un archivo |
| `FIM-TRUNCATED` | El informe de una categoría se limitó; consulte el registro para ver la lista completa |

## Uso recomendado

1. Establezca una línea base justo después de la instalación y de nuevo tras cada actualización manual o despliegue
2. Programe `app:file-integrity:scan` en cron (por ejemplo, cada noche)
3. Antes de una ventana de mantenimiento planificada que modificará archivos (una actualización, una migración), utilice **Pausar durante 1 hora** en lugar de eliminar por completo la tarea cron
4. Envíe `var/logs/security/file_integrity.log` a su sistema de supervisión de registros o SIEM existente, si dispone de uno