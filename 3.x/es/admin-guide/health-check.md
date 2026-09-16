# Comprobación de estado

La comprobación de estado es un pequeño bloque en el panel de administración que ejecuta un puñado de comprobaciones en vivo sobre su instalación y señala cualquier cosa que requiera atención: no es necesario revisar archivos de configuración para detectar configuraciones incorrectas habituales.

![El bloque de comprobación de estado en el panel de administración, que muestra el estado de superación/fallo para la configuración de correo electrónico, la asignación de URL de administrador y las comprobaciones de permisos de archivos](/.gitbook/assets/admin-health-check-block.png)

## Acceso a la comprobación de estado

Desde el panel de administración, el bloque **Health check** aparece junto a los demás bloques del panel: no hace falta hacer clic, los resultados se muestran directamente.

## Las comprobaciones

* **E-mail settings** — Verifica que estén configurados una cadena de conexión del mailer y un correo electrónico/nombre «from». Si no, enlaza a Mail settings para corregirlo.
* **All URLs have at least one admin assigned** — En una instalación multi-URL, comprueba que cada URL de acceso tenga al menos un administrador que pueda gestionarla. Si alguna no lo tiene, enlaza a la página de asignación de URL de acceso/usuario.
* **`.env` is not writable** — `.env` contiene secretos y no debería ser escribible por el servidor web tras la instalación. Se marca como error si lo es; enlaza a la Guía de seguridad.
* **`config/` is not writable** — El mismo razonamiento que `.env`: este directorio no debería ser escribible por la web en funcionamiento normal. Enlaza a la Guía de seguridad.
* **`var/cache` is writable** — La comprobación opuesta: Symfony necesita escribir en su directorio de caché, por lo que esta se marca como error si *no* es escribible. Enlaza a la guía de ajuste de rendimiento / optimización.
* **Install folder is not present** — La carpeta `public/main/install` solo se necesita durante la instalación y debería eliminarse después. Se marca como advertencia (no como error grave) si aún existe, ya que es un riesgo de menor gravedad que las dos comprobaciones de escritura anteriores. Enlaza a la Guía de seguridad.

## Qué hacer al respecto

Cada comprobación enlaza directamente con el lugar donde se corregiría el problema subyacente: una página de configuración o la guía correspondiente. Recorra esta lista justo después de la instalación y periódicamente después (por ejemplo, tras una transferencia manual de archivos o un cambio de permisos), ya que una comprobación superada hoy no garantiza que siga así. Para una lista de comprobación más amplia de endurecimiento en producción más allá de estas seis comprobaciones, consulte la [Guía de seguridad](appendix/security-guide.md).