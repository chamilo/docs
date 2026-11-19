# Certificados de logro (generación por lotes)

Chamilo puede generar automáticamente el certificado de logro de un curso para cada estudiante que lo haya
completado —dentro de un curso base y dentro de cualquier sesión que lo reutilice— sin que un docente
tenga que abrir cada curso de forma individual. Dos comandos de consola cubren esta tarea, uno para un único curso
y otro para toda la plataforma, y ninguno es una operación intensiva en base de datos que haya que supervisar de cerca:
ambos trabajan en lotes acotados, admiten una ejecución de prueba y pueden reanudarse de forma segura si se interrumpen.

## Comando para toda la plataforma

```bash
php bin/console chamilo:gradebook:process-achievement-certificates [options]
```

Para cada curso que tenga una categoría raíz del libro de calificaciones elegible —de nivel superior, no una subcategoría,
con **Generar certificados** activado— el comando evalúa a cada estudiante inscrito que aún no
disponga de un certificado para esa categoría, y genera uno para quien haya cumplido el
requisito de finalización. Un curso puede aportar **más de un** contexto: su inscripción base y,
por separado, un contexto por cada sesión que lo reutilice, ya que una sesión puede tener su propia categoría raíz
y su propio umbral de aprobación.

Un curso, o uno de sus contextos de sesión, se omite —no se trata como un error— cuando no es
elegible para el procesamiento automatizado: no hay una regla de finalización configurada, hay más de una categoría raíz elegible
para ese contexto (ambiguo, requiere una elección manual) o falta el contenido de la notificación del certificado.
El resumen de la ejecución al final indica cuántos contextos correspondieron a cada caso, de modo que nada se
omite sin quedar reflejado.

### Origen de la finalización

* `--completion-mode=course-rule` (predeterminado): utiliza la regla de finalización configurada para el curso.
* `--completion-mode=gradebook`: utiliza directamente la puntuación nativa del libro de calificaciones para ese contexto.
  Solo un contexto con exactamente una categoría raíz elegible es válido en este modo; uno con varias
  se omite y se informa, para procesarlo de forma individual (véase más abajo).

### Opciones de seguridad

| Opción                     | Finalidad                                                                                                                                 |
| --------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------- |
| `--dry-run`                 | Evalúa e informa sin crear certificados ni enviar notificaciones. Ejecute siempre esta opción primero.                                      |
| `--send-notification`       | Obligatoria para una ejecución real (que no sea de prueba). Envía el mensaje interno y el correo electrónico configurados del curso después de crear cada certificado. |
| `--sender-id=<id>`          | Administrador activo de la plataforma utilizado como remitente de la notificación. Obligatorio junto con `--send-notification`.                            |
| `--limit=<n>`                | Número máximo de certificados generados (o, en una ejecución de prueba, informados) en una sola ejecución. `0` = ilimitado. Predeterminado: `100`.                                    |
| `--scan-limit=<n>`           | Número máximo de estudiantes evaluados en una sola ejecución, en todos los cursos y sesiones. `0` = ilimitado. Predeterminado: `1000`.                                 |
| `--batch-size=<n>`           | Estudiantes cargados por lote de base de datos dentro de un contexto de curso o sesión. Predeterminado: `25`.                                                     |
| `--course-batch-size=<n>`    | Cursos cargados por lote de base de datos. Predeterminado: `50`.                                                                                         |
| `--after-course-id=<id>`     | Reanuda el análisis después de este ID de curso. Se puede reutilizar de forma segura tras una ejecución interrumpida: un curso nunca regenera un certificado para un estudiante que ya tiene uno. |
| `--user-id=<id>`             | Restringe la ejecución a un estudiante, comprobado en todos los cursos y sesiones elegibles; útil para validar el comportamiento antes de una ejecución para toda la plataforma. |
| `--regenerate-empty`         | Procesa también a los estudiantes cuyo registro de certificado existe pero no tiene un archivo de certificado almacenado —por ejemplo, tras una generación que falló a medias— y genera de nuevo ese certificado. Los estudiantes con un certificado completo nunca se modifican. |

### Ejemplos

Ejecute primero una simulación de toda la plataforma para ver qué se generaría:

```bash
php bin/console chamilo:gradebook:process-achievement-certificates --dry-run
```

Ejecución real, notificando a los estudiantes, con el administrador de ID 1 como remitente:

```bash
php bin/console chamilo:gradebook:process-achievement-certificates \
  --send-notification --sender-id=1
```

Reanude una ejecución interrumpida después del curso 480:

```bash
php bin/console chamilo:gradebook:process-achievement-certificates \
  --send-notification --sender-id=1 --after-course-id=480
```

Genere de nuevo los certificados cuyo registro existe pero cuyo archivo nunca se almacenó (primero una simulación
para listarlos):

```bash
php bin/console chamilo:gradebook:process-achievement-certificates \
  --regenerate-empty --dry-run
php bin/console chamilo:gradebook:process-achievement-certificates \
  --regenerate-empty --send-notification --sender-id=1
```

### Programación como tarea cron

```cron
# Every night at 2 AM
0 2 * * * php /path/to/chamilo/bin/console chamilo:gradebook:process-achievement-certificates --send-notification --sender-id=1 -e prod --no-interaction >> /path/to/chamilo/var/log/achievement-certificates.log 2>&1
```

## Procesamiento de un curso de forma individual

`chamilo:migration:process-achievement-certificates --course-id=<id>` ofrece las mismas opciones de simulación,
notificación y paginación que el comando de toda la plataforma, limitado únicamente al curso base
(no a sus sesiones), con un `--category-id` explícito para desambiguar cuando un curso tiene más de
una categoría raíz elegible:

```bash
php bin/console chamilo:migration:process-achievement-certificates \
  --course-id=42 --category-id=7 --dry-run
```

Utilícelo para probar un solo curso antes de una ejecución de toda la plataforma, o para procesar un curso que la ejecución
de toda la plataforma haya indicado como omitido por una categoría ambigua.

## Códigos de salida

Ambos comandos finalizan con un estado de error si al menos una generación de certificado falló realmente
durante una ejecución real (consulte `var/log/dev.log` — o el registro de producción equivalente — para el error
subyacente). Los contextos omitidos por motivos estructurales (sin regla, categoría ambigua, configuración de notificación
ausente) no provocan un código de salida de error; se informan en el resumen.

## Relacionado: estudiantes bloqueados por debajo del 100 % en una ruta de aprendizaje prerrequisito

Si la regla de finalización de un curso exige que una ruta de aprendizaje alcance el 100 %, un estudiante que haya terminado cada
paso pero nunca haya abierto la página final de «Felicitaciones» de la ruta permanece bloqueado justo por debajo del 100 % y nunca
pasa a ser elegible aquí. Consulte
[Completar los elementos finales de rutas de aprendizaje bloqueadas](learning-path-final-items.md): ejecútelo primero si
faltan certificados que esperaría que los estudiantes hubieran obtenido.

## Sustituido: el script cron heredado

`public/main/cron/add_gradebook_certificates.php` ya no se recomienda. Carga todos los
resultados del libro de calificaciones de la plataforma en memoria en una única consulta sin límite y nunca los libera
durante el bucle, por lo que puede agotar la memoria en una instancia con un número no trivial de cursos o
ejercicios, y nunca envía la notificación de «ha obtenido un certificado». Utilice
`chamilo:gradebook:process-achievement-certificates` en su lugar.