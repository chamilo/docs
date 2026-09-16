# Ajuste de Rendimiento

Las configuraciones de rendimiento ayudan a optimizar Chamilo para cargas de página más rápidas y un mejor uso de los recursos, especialmente en plataformas con muchos usuarios concurrentes.

> **Referencia adicional**: Su instalación de Chamilo incluye una guía de optimización extendida. Abra `/documentation/optimization.html` en un navegador (por ejemplo, `https://su-sitio-chamilo/documentation/optimization.html`) para obtener recomendaciones a nivel de servidor específicas para su versión.

## Caché de Symfony

Chamilo 2.0 está construido sobre Symfony, que utiliza un caché compilado para enrutamiento, inyección de dependencias y plantillas. Gestionar este caché es esencial para el rendimiento.

### Limpiar el Caché

Después de cambios en la configuración, despliegues o actualizaciones, limpie el caché de Symfony:

```bash
# Limpiar caché para el entorno actual
php bin/console cache:clear

# Específicamente para entornos de producción
php bin/console cache:clear --env=prod
```

En producción, asegúrese siempre de que `APP_ENV=prod` esté configurado en su archivo `.env.local`. El entorno de desarrollo (`APP_ENV=dev`) incluye una sobrecarga de depuración extensiva y nunca debe usarse en producción.

### Precalentamiento del Caché

Después de limpiar el caché, precaliéntelo para precompilar plantillas y configuraciones:

```bash
php bin/console cache:warmup --env=prod
```

## Estrategias de Caché

| Estrategia | Descripción |
|------------|-------------|
| **OPcache** | Caché de opcode integrado de PHP. Asegúrese de que esté habilitado en su `php.ini` con memoria adecuada (`opcache.memory_consumption=256`). Esta es la optimización de rendimiento más impactante. |
| **APCu** | Un caché de clave-valor en memoria utilizado por Symfony para almacenar metadatos. Instale la extensión APCu de PHP y configúrela en la configuración de caché de Symfony. |
| **Redis / Memcached** | Para plataformas de alto tráfico, configure un backend de caché externo. Establezca el adaptador de caché en `config/packages/cache.yaml`. |

### Configuraciones Recomendadas de OPcache

```ini
opcache.enable=1
opcache.memory_consumption=256
opcache.max_accelerated_files=20000
opcache.validate_timestamps=0   ; Establezca en 0 en producción para un mejor rendimiento
opcache.revalidate_freq=0
```

Cuando `validate_timestamps` está establecido en 0, debe limpiar OPcache después de desplegar nuevo código (reiniciar PHP-FPM o llamar a `opcache_reset()`).

## Carga Perezosa

| Configuración | Descripción |
|---------------|-------------|
| **Carga perezosa de imágenes** | Habilita el atributo `loading="lazy"` en las imágenes para que las imágenes fuera de pantalla se carguen solo cuando se desplazan a la vista. Reduce el tiempo de carga inicial de la página. |
| **Carga diferida de JavaScript** | Carga archivos JavaScript no críticos de manera asíncrona para evitar bloquear la renderización de la página. |

## CDN (Red de Distribución de Contenido)

Para plataformas que atienden a usuarios en múltiples regiones geográficas, un CDN puede mejorar significativamente los tiempos de carga de activos estáticos (CSS, JavaScript, imágenes).

Para configurar un CDN:

1. Configure una distribución de CDN (por ejemplo, CloudFront, Cloudflare u otro proveedor) que apunte a su servidor Chamilo.
2. Configure la URL base de activos en su entorno o configuración de Symfony para que los activos estáticos se sirvan a través del CDN.
3. Establezca encabezados de caché apropiados para archivos estáticos (caducidad prolongada para activos versionados).

## Optimización de la Base de Datos

| Acción | Descripción |
|--------|-------------|
| **Usar agrupación de conexiones de base de datos** | Para plataformas de alta concurrencia, configure la agrupación de conexiones para reducir la sobrecarga de establecer conexiones a la base de datos. |
| **Optimizar consultas** | Chamilo incluye índices de base de datos para consultas comunes. Ejecute `ANALYZE TABLE` periódicamente en MySQL/MariaDB para mantener actualizadas las estadísticas del planificador de consultas. |
| **Servidor de base de datos separado** | Para instalaciones grandes, ejecute la base de datos en un servidor dedicado en lugar de compartir recursos con el servidor web. |

## Configuración del Servidor Web

| Optimización | Descripción |
|--------------|-------------|
| **Habilitar compresión gzip/brotli** | Comprima respuestas HTML, CSS y JavaScript. La mayoría de los servidores web lo admiten de forma nativa. |
| **Caché de archivos estáticos** | Establezca encabezados largos de `Cache-Control` y `Expires` para activos estáticos. |
| **Ajuste de PHP-FPM** | Ajuste `pm.max_children`, `pm.start_servers` y `pm.max_requests` según la RAM disponible y la concurrencia esperada. |
| **HTTP/2** | Habilite HTTP/2 en su servidor web para conexiones multiplexadas y compresión de encabezados. |

## Consejos

* **OPcache es la mayor ganancia** -- Asegúrese de que esté habilitado y dimensionado correctamente antes de buscar otras optimizaciones.
* **Nunca ejecute producción con `APP_ENV=dev`** -- La barra de herramientas de depuración y el perfilador añaden una sobrecarga significativa a cada solicitud.
* **Monitoree antes de ajustar** -- Use herramientas como New Relic, Blackfire o el perfilador integrado de Symfony (en modo dev) para identificar cuellos de botella reales en lugar de adivinar.
* **Precaliente el caché después de cada despliegue** para evitar que el primer usuario experimente una solicitud lenta sin caché.