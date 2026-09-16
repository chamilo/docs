# Estado del Sistema

La página de estado del sistema le ayuda a verificar que su servidor Chamilo esté correctamente configurado e identificar posibles problemas.

## Acceso al Estado del Sistema

Desde el panel de administración, haga clic en **Estado del sistema** (o **Información del sistema**).

## Qué Muestra

![La página de estado del sistema mostrando la configuración de PHP, el estado de la base de datos, los permisos de archivos y la información del servidor](/.gitbook/assets/admin-system-status.png)

### Configuración de PHP

* **Versión de PHP** — Chamilo 2.0 requiere PHP 8.2 o superior
* **Extensiones requeridas** — Verifica que todas las extensiones de PHP necesarias estén instaladas
* **Configuraciones de PHP** — Comprueba configuraciones importantes de PHP como el límite de memoria, los límites de carga y el tiempo de ejecución

### Estado de la Base de Datos

* **Conexión a la base de datos** — Confirma que la base de datos es accesible
* **Versión de la base de datos** — Muestra la versión del servidor de la base de datos

### Permisos de Archivos

* **Directorios escribibles** — Verifica que Chamilo pueda escribir en los directorios requeridos (caché, subidas, registros)

### Información del Servidor

* **Sistema operativo** — Detalles del sistema operativo del servidor
* **Servidor web** — Apache, Nginx u otro
* **Espacio en disco** — Almacenamiento disponible

## Comprobaciones Recomendadas

Realice estas comprobaciones regularmente:

* **Después de la instalación** — Verifique que se cumplan todos los requisitos
* **Después de actualizaciones** — Asegúrese de que la versión de PHP y las extensiones sigan siendo compatibles
* **Cuando surjan problemas** — Revise primero el estado del sistema al solucionar problemas