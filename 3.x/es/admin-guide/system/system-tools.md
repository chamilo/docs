# Herramientas del sistema

Esta página cubre las utilidades de mantenimiento e inspección del bloque Sistema.

## Limpiar archivos temporales

**Sistema > Limpiar archivos temporales** muestra cuántos archivos temporales de carga existen y cuánto espacio ocupan, y luego permite purgarlos: todos, o solo los archivos más antiguos que una antigüedad configurable. Un modo de simulación (dry-run) permite previsualizar primero lo que se eliminaría. La misma acción también limpia archivos de compilación heredados obsoletos y regenera los recursos CSS compilados.

Esta acción omite deliberadamente los directorios de caché propios de Symfony (`var/cache/dev`, `var/cache/prod`, `var/cache/test` y los pools de caché): solo limpia archivos sueltos que hayan acabado en otro lugar bajo `var/cache/`. **No** recogerá un cambio que haya realizado en `.env` o bajo `config/` (por ejemplo, habilitar la documentación de la API; véase [Habilitar la documentación de la API](../installation/configuration.md#enable-the-api-documentation)). Para eso necesita acceso a la consola para ejecutar `php bin/console cache:clear`.

## Actualización del sistema

**Sistema > Actualización del sistema** ejecuta el flujo de autoactualización de Chamilo directamente desde el panel de administración, como una secuencia de pasos discretos y reanudables:

1. **Estado** — Informa de la versión instalada y de dónde se encuentran los directorios de actualización, preparación (staging) y copia de seguridad, junto con la clave de firma de confianza en uso
2. **Comprobar** — Consulta si hay una versión más reciente disponible desde la fuente de actualización configurada
3. **Verificar** — Descarga el paquete de actualización y su firma, y lo comprueba frente a la suma de verificación del manifiesto y la clave pública de confianza
4. **Comprobación previa (preflight)** — Valida los requisitos del sistema y la compatibilidad antes de tocar nada
5. **Preparar (stage)** — Extrae el paquete verificado en un directorio de preparación aislado; aún no cambia nada en la instalación en producción
6. **Aplicar plan** — Construye un diff de archivos a añadir, reemplazar o eliminar, a partir del paquete preparado
7. **Aplicar archivos** — Copia los archivos a su lugar. Requiere confirmación explícita y crea una copia de seguridad de cada archivo que sobrescribe, además de un archivo de bloqueo que impide que se ejecute una segunda actualización de forma concurrente
8. **Seguridad de migraciones / comprobaciones posteriores a la aplicación** — Valida las migraciones de base de datos pendientes y el estado posterior a la instalación
9. **Ejecutar post-aplicación** — Ejecuta comandos de consola posteriores a la aplicación (como las migraciones de base de datos), pero solo si la configuración del servidor permite ejecutarlos desde la interfaz, y solo después de escribir una frase de confirmación explícita y confirmar que se ha realizado una copia de seguridad

Los pasos de larga duración informan del progreso para que la página pueda dejarse abierta con seguridad mientras terminan. La combinación de verificación de firma, preparación antes de aplicar, copias de seguridad previas a la sobrescritura, un bloqueo de concurrencia y confirmaciones escritas antes de los cambios en la base de datos está pensada para que este flujo sea seguro de ejecutar sin acceso a la consola; aun así, una copia de seguridad manual antes de empezar sigue siendo una buena práctica; véase [Copias de seguridad](../maintenance/backups.md).

## Información de archivos

**Sistema > Información de archivos** enumera cada archivo de recurso cargado, con búsqueda por nombre, mostrando su ruta física, si es un huérfano (no vinculado a ningún curso o sesión) y cuántos lugares lo referencian. Desde aquí puede adjuntar un archivo huérfano a un recurso, desvincularlo o eliminarlo: útil para localizar y limpiar almacenamiento que ya no pertenece a ningún curso.

## Recursos por tipo

**Sistema > Recursos por tipo** permite elegir un tipo de recurso y ver, en todos los cursos y sesiones, un recuento agregado y una lista de elementos de ese tipo, cuándo se crearon y (cuando corresponda) qué usuarios están asociados a ellos. Úselo para responder preguntas como «cuántos foros existen en toda la plataforma» o «qué cursos tienen más documentos».

## Listar iconos

**Sistema > Listar iconos** es un catálogo navegable del conjunto de iconos integrado de Chamilo, agrupado por categoría. Resulta útil sobre todo al desarrollar plugins o temas y necesitar confirmar el nombre exacto de un icono, pero se expone aquí como referencia general.

## Herramientas solo para desarrollo

Pueden aparecer dos elementos más en este bloque, pero solo cuando el servidor tiene un directorio `tests/` presente, lo que normalmente ocurre únicamente en una instalación de desarrollo o de QA, nunca en producción:

* **Relleno de datos** genera grandes volúmenes de usuarios, cursos y registros de usuarios en línea ficticios, para pruebas de carga o de QA.
* **Probador de correo electrónico** envía un correo de prueba real a través del mailer configurado de la plataforma, para confirmar que la configuración SMTP/correo funciona realmente, y muestra los fallos de envío recientes si los hay.

Si no ve estos dos enlaces, es lo esperado: significa que su instalación no tiene un directorio `tests/`, que es el estado normal y correcto para una plataforma en producción.