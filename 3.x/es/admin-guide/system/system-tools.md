# Herramientas del sistema

Esta página describe las utilidades de mantenimiento e inspección del bloque Sistema.

## Limpiar archivos temporales

**Sistema > Limpiar archivos temporales** muestra cuántos archivos temporales de carga existen y cuánto espacio ocupan, y permite purgarlos: todos, o solo los más antiguos que una antigüedad configurable. Un modo de simulación permite previsualizar primero qué se eliminaría. La misma acción también elimina archivos de compilación heredados obsoletos y regenera los recursos CSS compilados.

Esta acción omite deliberadamente los directorios de caché propios de Symfony (`var/cache/dev`, `var/cache/prod`, `var/cache/test` y los grupos de caché): solo limpia archivos sueltos que hayan quedado en otro lugar bajo `var/cache/`. **No** detectará un cambio realizado en `.env` o bajo `config/` (por ejemplo, habilitar la documentación de la API; véase [Habilitar la documentación de la API](../installation/configuration.md#enable-the-api-documentation)). Para ello se necesita acceso a la consola para ejecutar `php bin/console cache:clear`.

## Actualización del sistema

**Sistema > Actualización del sistema** ejecuta el flujo de autoactualización de Chamilo directamente desde el panel de administración, como una secuencia de pasos discretos y reanudables:

1. **Estado** — Informa de la versión instalada y de la ubicación de los directorios de actualización, preparación y copia de seguridad, junto con la clave de firma de confianza en uso
2. **Comprobar** — Consulta si hay una versión más reciente disponible en el origen de actualización configurado
3. **Verificar** — Descarga el paquete de actualización y su firma, y los comprueba frente a la suma de comprobación del manifiesto y la clave pública de confianza
4. **Comprobaciones previas** — Valida los requisitos del sistema y la compatibilidad antes de modificar nada
5. **Preparar** — Extrae el paquete verificado en un directorio de preparación aislado; todavía no cambia nada en la instalación en producción
6. **Plan de aplicación** — Genera un diff de los archivos que se añadirán, reemplazarán o eliminarán, a partir del paquete preparado
7. **Aplicar archivos** — Copia los archivos en su lugar. Requiere una confirmación explícita y crea una copia de seguridad de cada archivo que sobrescribe, además de un archivo de bloqueo que impide que se ejecute una segunda actualización al mismo tiempo
8. **Seguridad de la migración / comprobaciones posteriores a la aplicación** — Valida las migraciones de base de datos pendientes y el estado posterior a la instalación
9. **Ejecutar acciones posteriores a la aplicación** — Ejecuta los comandos de consola posteriores a la aplicación (como las migraciones de base de datos), pero solo si la configuración del servidor permite ejecutarlos desde la interfaz, y solo después de escribir una frase de confirmación explícita y confirmar que se ha realizado una copia de seguridad

Los pasos de larga duración informan del progreso, de modo que la página puede dejarse abierta con seguridad mientras se completan. La combinación de verificación de firma, preparación antes de aplicar, copias de seguridad previas a la sobrescritura, un bloqueo de concurrencia y confirmaciones escritas antes de los cambios en la base de datos está diseñada para que este flujo sea seguro sin acceso a la consola; aun así, una copia de seguridad manual antes de empezar sigue siendo una buena práctica; véase [Copias de seguridad](../maintenance/backups.md).

## Información de archivos

**Sistema > Información de archivos** enumera todos los archivos de recursos cargados, con búsqueda por nombre, y muestra su ruta física, si es un huérfano (no vinculado a ningún curso o sesión) y cuántos lugares lo referencian. Desde aquí se puede asociar un archivo huérfano a un recurso, desvincularlo o eliminarlo: útil para localizar y limpiar almacenamiento que ya no pertenece a ningún curso.

Para averiguar dónde se usa realmente un archivo, abra sus detalles de **Información de archivos** e inspeccione **Ubicaciones del archivo**. Chamilo enumera las ubicaciones conocidas de documentos o archivos personales con sus rutas y, cuando procede, enlaces para abrir esas ubicaciones. Los detalles también muestran por separado la ruta física del archivo. Un archivo puede tener más de una ubicación; una lista vacía significa que no se encontró ninguna ubicación de documento o archivo personal para ese recurso. Compruebe las ubicaciones antes de desvincular o eliminar de forma permanente un archivo compartido. Véase [PR #9438](https://github.com/chamilo/chamilo-lms/pull/9438).

## Recursos por tipo

**Sistema > Recursos por tipo** permite elegir un tipo de recurso y ver, en todos los cursos y sesiones, un recuento agregado y una lista de elementos de ese tipo, cuándo se crearon y (cuando procede) qué usuarios están asociados a ellos. Úselo para responder a preguntas como «cuántos foros existen en toda la plataforma» o «qué cursos tienen más documentos».

## Listar iconos

**Sistema > Listar iconos** es un catálogo navegable del conjunto de iconos integrado de Chamilo, agrupado por categoría. Resulta útil sobre todo al desarrollar complementos o temas y necesitar confirmar el nombre exacto de un icono, pero se expone aquí como referencia general.

---
## Herramientas exclusivas de desarrollo

Dos elementos más pueden aparecer en este bloque, pero solo cuando el servidor tiene presente un directorio `tests/`, lo que normalmente solo ocurre en una instalación de desarrollo o de control de calidad (QA), nunca en producción:

* **Rellenador de datos** genera grandes volúmenes de usuarios, cursos y registros de usuarios en línea ficticios, para pruebas de carga o de control de calidad (QA).
* **Probador de correo electrónico** envía un correo electrónico de prueba real a través del sistema de correo configurado de la plataforma, para confirmar que la configuración de SMTP/correo funciona realmente, y muestra los fallos de envío recientes, si los hay.

Si no ve estos dos enlaces, es lo esperado: significa que su instalación no tiene un directorio `tests/`, que es el estado normal y correcto de una plataforma de producción.