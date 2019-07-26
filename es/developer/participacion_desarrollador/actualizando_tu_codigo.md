## Actualizando tu código con Composer

Debido a que usamos mecanismos de carga automática, y porque usamos plantillas, hay un pequeño paso
tendrá que tomar **todas las veces** justo después de que extraiga los últimos cambios de nuestro repositorio:

```
composer update
```

Esto asegurará que todas las dependencias estén actualizadas y que el mecanismo de carga automática se actualice.

Para encontrar todas sus clases en los lugares correctos.

Lamentablemente, el compositor es un proceso muy lento y hambriento de memoria con Chamilo, así que asegúrate de tener menos de 2GB de RAM disponible solo para ese proceso, y que trabajas en otra cosa en el mientras tanto...