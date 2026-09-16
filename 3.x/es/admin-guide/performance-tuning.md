# Ajuste de rendimiento

Los ajustes de rendimiento ayudan a optimizar Chamilo para cargas de página más rápidas y un mejor aprovechamiento de los recursos, especialmente en plataformas con muchos usuarios concurrentes.

> **Referencia adicional**: Su instalación de Chamilo incluye una guía de optimización ampliada. Abra `/documentation/optimization.html` en un navegador (p. ej. `https://your-chamilo-site/documentation/optimization.html`) para recomendaciones a nivel de servidor específicas de su versión.

## Caché de Symfony

Chamilo 3.0 está construido sobre Symfony, que utiliza una caché compilada para el enrutamiento, la inyección de dependencias y las plantillas. Gestionar esta caché es esencial para el rendimiento.

### Vaciar la caché

Tras cambios de configuración, despliegues o actualizaciones, vacíe la caché de Symfony:

```bash
# Clear cache for the current environment
php bin/console cache:clear

# For production environments specifically
php bin/console cache:clear --env=prod
```

En producción, asegúrese siempre de que `APP_ENV=prod` esté definido en su archivo `.env.local`. El entorno de desarrollo (`APP_ENV=dev`) incluye una sobrecarga considerable de depuración y nunca debe usarse en producción.

### Precarga de la caché (warmup)

Tras vaciar la caché, precaliéntela para precompilar plantillas y configuración:

```bash
php bin/console cache:warmup --env=prod
```

## Estrategias de caché

| Estrategia | Descripción |
|----------|-------------|
| **OPcache** | Caché de opcodes integrada de PHP. Asegúrese de que esté habilitada en su `php.ini` con memoria suficiente (`opcache.memory_consumption=256`). Esta es la optimización de rendimiento de mayor impacto. |
| **APCu** | Caché en memoria de clave-valor utilizada por Symfony para almacenar metadatos. Instale la extensión PHP APCu y configúrela en la configuración de caché de Symfony. |
| **Redis / Memcached** | En plataformas de alto tráfico, configure un backend de caché externo. Defina el adaptador de caché en `config/packages/cache.yaml`. |

### Ajustes recomendados de OPcache

```ini
opcache.enable=1
opcache.memory_consumption=256
opcache.max_accelerated_files=20000
opcache.validate_timestamps=0   ; Set to 0 in production for best performance
opcache.revalidate_freq=0
```

Cuando `validate_timestamps` está en 0, debe vaciar OPcache tras desplegar código nuevo (reinicie PHP-FPM o llame a `opcache_reset()`).

## Carga diferida (lazy loading)

| Ajuste | Descripción |
|---------|-------------|
| **Carga diferida de imágenes** | Activa el atributo `loading="lazy"` en las imágenes para que las que están fuera de pantalla se carguen solo al desplazarse hasta ellas. Reduce el tiempo de carga inicial de la página. |
| **Carga diferida de JavaScript** | Carga archivos JavaScript no críticos de forma asíncrona para no bloquear el renderizado de la página. |

## CDN (red de distribución de contenidos)

En plataformas que atienden a usuarios en varias regiones geográficas, una CDN puede mejorar de forma significativa los tiempos de carga de los recursos estáticos (CSS, JavaScript, imágenes).

Para configurar una CDN:

1. Configure una distribución CDN (p. ej., CloudFront, Cloudflare u otro proveedor) que apunte a su servidor Chamilo.
2. Configure la URL base de los recursos en su entorno o en la configuración de Symfony para que los recursos estáticos se sirvan a través de la CDN.
3. Establezca cabeceras de caché adecuadas para los archivos estáticos (caducidad larga para recursos versionados).

## Optimización de la base de datos

| Acción | Descripción |
|--------|-------------|
| **Usar agrupación de conexiones a la base de datos** | En plataformas de alta concurrencia, configure connection pooling para reducir la sobrecarga de establecer conexiones a la base de datos. |
| **Optimizar consultas** | Chamilo incluye índices de base de datos para consultas habituales. Ejecute `ANALYZE TABLE` periódicamente en MySQL/MariaDB para mantener actualizadas las estadísticas del planificador de consultas. |
| **Servidor de base de datos independiente** | En instalaciones grandes, ejecute la base de datos en un servidor dedicado en lugar de compartir recursos con el servidor web. |

## Configuración del servidor web

| Optimización | Descripción |
|--------------|-------------|
| **Habilitar compresión gzip/brotli** | Comprima las respuestas HTML, CSS y JavaScript. La mayoría de los servidores web lo admiten de forma nativa. |
| **Caché de archivos estáticos** | Establezca cabeceras `Cache-Control` y `Expires` de larga duración para los recursos estáticos. |
| **Ajuste de PHP-FPM** | Ajuste `pm.max_children`, `pm.start_servers` y `pm.max_requests` según la RAM disponible y la concurrencia esperada. |
| **HTTP/2** | Active HTTP/2 en su servidor web para conexiones multiplexadas y compresión de cabeceras. |

## Consejos

* **OPcache es la mejora más importante** -- Asegúrese de que esté habilitado y dimensionado correctamente antes de abordar otras optimizaciones.
* **Nunca ejecute producción con `APP_ENV=dev`** -- La barra de depuración y el profiler añaden una sobrecarga significativa a cada petición.
* **Supervise antes de ajustar** -- Utilice herramientas como New Relic, Blackfire o el profiler integrado de Symfony (en modo dev) para identificar cuellos de botella reales en lugar de adivinar.
* **Precaliente la caché tras cada despliegue** para evitar que el primer usuario reciba una petición lenta sin caché.