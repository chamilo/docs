# Comandos de reparación y conversión

> **Cambio incompatible.** Los comandos de mantenimiento que aparecen a continuación solían escribir en la base de datos en cuanto se ejecutaban. Ahora son **de solo lectura (dry-run) de forma predeterminada** y solo escriben cuando se indica `--apply`, siguiendo el modelo de `chamilo:migration:repair-quiz-relations-from-legacy`.

| Comando | Notas |
|---------|-------|
| `chamilo:migration:repair-group-forums-without-item-property` | |
| `chamilo:migration:repair-forum-posts-without-item-property` | |
| `chamilo:migration:repair-quiz-questions-without-resource-node` | |
| `chamilo:migration:repair-gradebook-structure` | |
| `chamilo:migration:repair-translatehtml-language-blocks` | |
| `chamilo:migration:repair-legacy-certificate-history` | |
| `app:multi-url:convert` | sin `--expected-count` (operación única de todo o nada) |

## Qué ha cambiado para los administradores

1. Ejecute el comando sin opciones: informa de lo que haría, no escribe nada y muestra la línea exacta
   `--apply --expected-count=N` que debe utilizar.
2. Para escribir, ejecútelo de nuevo con `--apply --expected-count=N`, donde N es el número indicado por la ejecución de solo lectura.
   Si el número de filas que se modificarían difiere de N (los datos cambiaron entretanto), el comando se niega
   y no escribe nada.
3. `--dry-run` sigue aceptándose (ahora es el valor predeterminado y no hace nada); combinarlo con `--apply` es un error.
4. Los scripts y las tareas cron que ejecutaban estos comandos sin argumentos y dependían de que escribieran deben pasar ahora
   `--apply --expected-count=N`. Los códigos de salida no cambian (0 éxito, 1 fallo, 2 uso no válido).

Ejemplo:

```bash
php bin/console chamilo:migration:repair-translatehtml-language-blocks
# ... "To write, re-run with --apply --expected-count=12"
php bin/console chamilo:migration:repair-translatehtml-language-blocks --apply --expected-count=12
```

```bash
php bin/console app:multi-url:convert "https://admin.example.com/"          # plan only
php bin/console app:multi-url:convert "https://admin.example.com/" --apply  # convert
```

## Nuevo comando: `app:repair-user-tag-counters`

Recalcula el contador de uso (`tag.count`) de las etiquetas a partir de las filas de relación que las utilizan (etiquetas de usuario, etiquetas de campos adicionales
y etiquetas de portafolio). Las versiones anteriores permitían que los contadores se desfasaran. Mismo modelo: ejecútelo sin opciones para listar las etiquetas desfasadas
y obtener la línea `--apply --expected-count=N`; a continuación, ejecute esa línea para escribir. No interviene ninguna migración: ejecútelo
cuando desee resincronizar los contadores.