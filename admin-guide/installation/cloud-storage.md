# Almacenamiento en la Nube

Chamilo 2.0 soporta backends de almacenamiento en la nube para archivos subidos por los usuarios a través de **Flysystem**, una biblioteca de abstracción de sistemas de archivos PHP integrada en Symfony. Esto permite almacenar archivos en servicios en la nube en lugar de (o además de) el sistema de archivos local.

## ¿Por qué usar almacenamiento en la nube?

* **Escalabilidad** -- El almacenamiento en la nube crece con tu plataforma sin necesidad de gestionar espacio en disco.
* **Despliegues multi-servidor** -- Cuando se ejecutan múltiples servidores web detrás de un balanceador de carga, el almacenamiento en la nube asegura que todos los servidores accedan a los mismos archivos.
* **Durabilidad** -- Los proveedores de nube ofrecen redundancia y copias de seguridad integradas.
* **Costo** -- El almacenamiento de objetos suele ser más económico por gigabyte que el almacenamiento en bloque adjunto a servidores.

## Proveedores Soportados

| Proveedor | Adaptador Flysystem |
|----------|---------------------|
| **Amazon S3** | `league/flysystem-aws-s3-v3` |
| **Google Cloud Storage** | `league/flysystem-google-cloud-storage` |
| **Azure Blob Storage** | `league/flysystem-azure-blob-storage` |
| **MinIO** (compatible con S3) | Usa el adaptador S3 con un endpoint personalizado |
| **Sistema de archivos local** | Predeterminado, no se necesitan paquetes adicionales |

## Instalación

Chamilo ya viene con los siguientes proveedores preinstalados:

```bash
# Amazon S3
league/flysystem-aws-s3-v3

# Google Cloud Storage
league/flysystem-google-cloud-storage

# Azure Blob Storage
league/flysystem-azure-blob-storage
```

## Configuración

Chamilo divide sus archivos en varios montajes de Flysystem — **assets**, **assets cache**, **resources**, **resources cache**, **themes** y **plugins**. Cada montaje puede apuntar a un bucket o contenedor diferente. La configuración en la nube en `config/packages/oneup_flysystem.yaml` se selecciona por entorno usando condiciones `when@` y lee las variables que configures en `.env`.

### Amazon S3

```bash
# .env — credenciales comunes
AWS_S3_STORAGE_VERSION=latest
AWS_S3_STORAGE_REGION=eu-central-1
AWS_S3_STORAGE_ACCESS_KEY=your-access-key
AWS_S3_STORAGE_ACCESS_SECRET=your-secret-key

# Buckets por montaje (cada montaje puede ser un bucket diferente)
AWS_S3_STORAGE_ASSET_BUCKET=chamilo-assets
AWS_S3_STORAGE_ASSET_CACHE_BUCKET=chamilo-asset-cache
AWS_S3_STORAGE_RESOURCE_BUCKET=chamilo-resources
AWS_S3_STORAGE_RESOURCE_CACHE_BUCKET=chamilo-resource-cache
AWS_S3_STORAGE_THEMES_BUCKET=chamilo-themes
AWS_S3_STORAGE_PLUGINS_BUCKET=chamilo-plugins

# Prefijos de ruta opcionales dentro de un bucket — útil para compartir buckets entre portales
AWS_S3_STORAGE_ASSET_PREFIX=portal1/assets
AWS_S3_STORAGE_RESOURCE_PREFIX=portal1/resources
```

### Azure Blob Storage

```bash
# .env
AZURE_STORAGE_CONNECTION_STRING='DefaultEndpointsProtocol=https;AccountName=...;AccountKey=...'
AZURE_STORAGE_ASSET_CONTAINER=asset-container
AZURE_STORAGE_ASSET_CACHE_CONTAINER=asset-cache-container
AZURE_STORAGE_RESOURCE_CONTAINER=resources-container
AZURE_STORAGE_RESOURCE_CACHE_CONTAINER=resources-cache-container
AZURE_STORAGE_THEMES_CONTAINER=themes-container
# Prefijos opcionales
AZURE_STORAGE_ASSET_PREFIX=optional/prefix
```

### Google Cloud Storage

Configura GCS de la misma manera que S3, usando variables de entorno específicas de GCS y un bucket por montaje. Consulta el archivo `oneup_flysystem.yaml` incluido con tu versión para los nombres exactos de las variables — también están documentados en `.env`.

### MinIO (Compatible con S3)

MinIO funciona a través del adaptador S3 con un endpoint personalizado y direccionamiento de estilo de ruta — configura `AWS_S3_STORAGE_*` como para S3 y añade el endpoint de MinIO y las banderas de estilo de ruta soportadas por el bundle.

> El conjunto completo de nombres de variables está listado en el archivo `.env.dist` incluido con Chamilo. Copia solo las líneas del proveedor que realmente uses en tu `.env` y descoméntalas.

## Migración de Archivos Existentes

Si estás cambiando de almacenamiento local a almacenamiento en la nube en una plataforma existente, debes migrar los archivos existentes:

1. Configura el nuevo adaptador de almacenamiento como se describió anteriormente.
2. Copia los archivos existentes desde el directorio local `var/upload/` a tu bucket de almacenamiento en la nube, preservando la estructura de directorios.
3. Verifica que los archivos sean accesibles a través de la plataforma después de la migración.

## Permisos y Acceso

Asegúrate de que tu bucket de almacenamiento en la nube **no sea accesible públicamente** a menos que explícitamente necesites URLs de archivos públicos. Chamilo sirve los archivos a través de su propia capa de control de acceso, por lo que el acceso público directo al bucket es innecesario y representa un riesgo de seguridad.

Para S3, usa una política de bucket que restrinja el acceso a las credenciales IAM configuradas anteriormente.

## Consejos

* **Prueba con MinIO localmente** antes de implementar en un proveedor de nube -- MinIO es un servidor gratuito compatible con S3 que puedes ejecutar en tu propia máquina.
* **Usa un bucket dedicado** para Chamilo en lugar de compartir un bucket con otras aplicaciones.
* **Configura políticas de ciclo de vida** en tu bucket en la nube para gestionar los costos de almacenamiento (por ejemplo, mover archivos antiguos a niveles de almacenamiento más económicos).