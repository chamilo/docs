# Completar los elementos finales de itinerarios de aprendizaje atascados

El último paso de un itinerario de aprendizaje —la página «Congratulations» que contiene los bloques de certificado y de competencia— solo cuenta como completado cuando el estudiante lo abre realmente. Un estudiante que termina todos los demás pasos pero nunca llega a esa última página permanece atascado justo por debajo del 100 % de forma indefinida y, dado que la elegibilidad para el certificado de logro (y la concesión de competencias) depende de que el itinerario de aprendizaje alcance el 100 %, nunca recibe un certificado o una competencia que, por lo demás, ya ha obtenido.

```bash
php bin/console chamilo:learning-path:complete-final-items [options]
```

Para cada itinerario de aprendizaje de la plataforma cuyo último paso es de tipo **Final item**, el comando comprueba cada estudiante con un intento en curso (por debajo del 100 %) que ha completado todos los demás pasos, en todos los cursos y en todas las sesiones que reutilizan el itinerario de aprendizaje. Si es así, completa el elemento final exactamente como si el estudiante lo hubiera abierto: registra la misma visualización del elemento, ejecuta el mismo recálculo del progreso y desencadena la misma generación de certificados y concesión de competencias que provocaría una visita real.

Al igual que `chamilo:gradebook:process-achievement-certificates` (véase
[Certificados de logro](achievement-certificates.md)), funciona por lotes acotados, admite una
ejecución de prueba y puede reanudarse de forma segura si se interrumpe: un estudiante cuyo elemento final ya está completado
no se vuelve a procesar en una ejecución posterior.

## Opciones

| Opción                 | Finalidad                                                                                                            |
| ----------------------- | -------------------------------------------------------------------------------------------------------------------- |
| `--dry-run`             | Evalúa e informa sin completar nada. Ejecútela siempre en primer lugar.                                           |
| `--sender-id=<id>`      | ID de un administrador activo de la plataforma, utilizado como creador del recurso cuando completar un elemento final desencadena la generación de un certificado o la concesión de una competencia. Obligatorio para una ejecución real (distinta de la ejecución de prueba). |
| `--limit=<n>`           | Número máximo de elementos finales completados (o, en la ejecución de prueba, notificados) en una sola ejecución. `0` = ilimitado. Valor predeterminado: `500`.              |
| `--scan-limit=<n>`      | Número máximo de registros de progreso de estudiantes examinados en una sola ejecución, en todos los itinerarios de aprendizaje. `0` = ilimitado. Valor predeterminado: `5000`. |
| `--batch-size=<n>`      | Registros de progreso de estudiantes cargados por lote de base de datos, dentro de un mismo itinerario de aprendizaje. Valor predeterminado: `50`.                       |
| `--lp-batch-size=<n>`   | Itinerarios de aprendizaje cargados por lote de base de datos. Valor predeterminado: `50`.                                                            |
| `--after-lp-id=<id>`    | Reanuda el examen a partir de este ID de itinerario de aprendizaje.                                                                       |

## Ejemplos

Ejecute primero una prueba en toda la plataforma para ver quién se completaría:

```bash
php bin/console chamilo:learning-path:complete-final-items --dry-run
```

Ejecución real, con el administrador de ID 1 como creador del recurso:

```bash
php bin/console chamilo:learning-path:complete-final-items --sender-id=1
```

Reanudar una ejecución interrumpida a partir del itinerario de aprendizaje 480:

```bash
php bin/console chamilo:learning-path:complete-final-items --sender-id=1 --after-lp-id=480
```

## Códigos de salida

El comando finaliza con un estado de error si al menos un elemento final no ha podido completarse
durante una ejecución real: la tabla de resumen indica el itinerario de aprendizaje, el estudiante y el motivo; el
registro de la aplicación contiene la excepción completa. Un estudiante excluido correctamente (elemento final ya completado, u
otro paso aún incompleto) no constituye un error y nunca provoca un código de salida de error.

## Puntuación del libro de calificaciones tras la finalización

La puntuación mostrada para un itinerario de aprendizaje en la tabla del libro de calificaciones nunca se almacena: se calcula en tiempo real
a partir del progreso actual del estudiante cada vez que se carga la página, de modo que refleja el 100 % de inmediato,
sin ningún paso adicional.

El **certificado** de un estudiante, si ya existía antes de alcanzar el 100 % (con una puntuación anterior, más baja,
incorporada en él), solo actualiza su puntuación almacenada y el HTML generado si la regeneración del certificado
se completa correctamente cuando este comando finaliza su elemento final: la misma llamada que desencadenaría una
visita real. Si la generación del certificado falla por cualquier motivo (véase
[Certificados de logro](achievement-certificates.md) para las causas habituales, p. ej. permisos de almacenamiento
de archivos), el progreso del estudiante alcanza correctamente el 100 % y la tabla del libro de calificaciones sigue
mostrándolo: solo su certificado conserva la puntuación anterior y, dado que el comando nunca
vuelve a procesar a un estudiante que ya está al 100 %, no lo reintentará en una ejecución posterior. Regenere ese certificado
manualmente (la acción **Generate** de la lista de certificados) una vez corregido el problema subyacente.

`--sender-id` existe específicamente para evitar una causa habitual de ese fallo: completar un elemento final
fuera de una petición real no dispone de un usuario con sesión iniciada que el recurso del certificado pueda registrar como su
creador, y la generación falla directamente si no lo hay.