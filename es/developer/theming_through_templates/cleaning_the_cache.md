## Limpiando el caché

Si va a cambiar las plantillas, necesita saber una cosa y recordarla: después de escribir los cambios y antes de probarlos, deberá eliminar el contenido del directorio `app/cache/twig/`.

De lo contrario, el caché se quedará y no verá ninguno (o verá solo algunos) de sus cambios, lo que podría hacerle creer que no tuvieron efecto.

Esta limpieza también se ejecuta cuando se usa la opción "Limpieza de archivo / caché" en la pantalla de administración principal de su portal de Chamilo (bloque "Sistema").

Alternativamente, puede usar Chash (una herramienta de línea de comandos para Chamilo) con el comando:

```
chash files:clean_temp_folder
```

Es decir si tiene instalado Chash[6] .

[6]: https://github.com/chamilo/chash
