# Almacenamiento en la nube

Chamilo 3.0 admite backends de almacenamiento en la nube para los archivos subidos por los usuarios mediante **Flysystem**, una biblioteca de abstracción de sistemas de archivos en PHP integrada en Symfony. Esto permite almacenar archivos en servicios en la nube en lugar de (o además de) el sistema de archivos local.

## ¿Por qué usar almacenamiento en la nube?

* **Escalabilidad** -- El almacenamiento en la nube crece con su plataforma sin tener que gestionar el espacio en disco.
* **Despliegues con varios servidores** -- Al ejecutar varios servidores web detrás de un equilibrador de carga, el almacenamiento en la nube garantiza que todos los servidores accedan a los mismos archivos.
* **Durabilidad** -- Los proveedores de nube ofrecen redundancia y copias de seguridad integradas.
* **Coste** -- El almacenamiento de objetos suele ser más barato por gigabyte que el almacenamiento en bloque asociado a los servidores.

## Proveedores compatibles

| Proveedor | Adaptador de Flysystem |
|----------|-------------------|
| **Amazon S3** | `league/flysystem-aws-s3-v3` |
| **Google Cloud Storage** | `league/flysystem-google-cloud-storage` |
| **Azure Blob Storage** | `azure-oss/storage-blob-flysystem` |
| **MinIO** (compatible con S3) | Utiliza el adaptador de S3 con un endpoint personalizado |
| **DigitalOcean Spaces** (compatible con S3) | Utiliza el adaptador de S3 con un endpoint personalizado |
| **Sistema de archivos local** | Predeterminado; no se necesitan paquetes adicionales |

## Instalación

Chamilo ya incluye preinstalados los siguientes proveedores:

```bash
# Amazon S3
league/flysystem-aws-s3-v3

# Google Cloud Storage
league/flysystem-google-cloud-storage

# Azure Blob Storage
azure-oss/storage-blob-flysystem
```

## Configuración

Chamilo reparte sus archivos entre varios montajes de Flysystem: **assets**, **assets cache**, **resources**, **resources cache**, **themes** y **plugins**. Cada montaje puede apuntar a un bucket o contenedor distinto. La configuración de la nube en `config/packages/oneup_flysystem.yaml` se selecciona por entorno mediante condiciones `when@` y lee las variables que usted define en `.env`.

### Amazon S3

```bash
# .env — common credentials
AWS_S3_STORAGE_VERSION=latest
AWS_S3_STORAGE_REGION=eu-central-1
AWS_S3_STORAGE_ACCESS_KEY=your-access-key
AWS_S3_STORAGE_ACCESS_SECRET=your-secret-key

# Per-mount buckets (each mount can be a different bucket)
AWS_S3_STORAGE_ASSET_BUCKET=chamilo-assets
AWS_S3_STORAGE_ASSET_CACHE_BUCKET=chamilo-asset-cache
AWS_S3_STORAGE_RESOURCE_BUCKET=chamilo-resources
AWS_S3_STORAGE_RESOURCE_CACHE_BUCKET=chamilo-resource-cache
AWS_S3_STORAGE_THEMES_BUCKET=chamilo-themes
AWS_S3_STORAGE_PLUGINS_BUCKET=chamilo-plugins

# Optional path prefixes inside a bucket — useful to share buckets across portals
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
# Optional prefixes
AZURE_STORAGE_ASSET_PREFIX=optional/prefix
```

### Google Cloud Storage

Configure GCS del mismo modo que S3, utilizando variables de entorno específicas de GCS y un bucket por montaje. Consulte el archivo `oneup_flysystem.yaml` incluido en su versión para conocer los nombres exactos de las variables; también están documentados en `.env`.

### MinIO (compatible con S3)

MinIO funciona a través del adaptador de S3 con un endpoint personalizado y direccionamiento de estilo de ruta: configure `AWS_S3_STORAGE_*` como para S3 y añada el endpoint de MinIO y las opciones de estilo de ruta que admite el bundle.

### DigitalOcean Spaces (compatible con S3)

DigitalOcean Spaces es un servicio alojado distinto de MinIO: no es MinIO internamente, pero expone la misma API compatible con S3, por lo que también funciona a través del adaptador de S3: configure `AWS_S3_STORAGE_*` como para S3 y apunte `AWS_S3_STORAGE_ENDPOINT` (o la variable de endpoint equivalente del bundle) al endpoint regional de su Space, por ejemplo `https://<region>.digitaloceanspaces.com`.

> El conjunto completo de nombres de variables figura en el archivo `.env.dist` incluido con Chamilo. Copie en su `.env` únicamente las líneas del proveedor que vaya a utilizar y descoméntelas.

## Temas

El montaje de **temas** se comporta de forma distinta a los demás: los temas que se distribuyen con Chamilo (`chamilo`, `chamilo3`) forman parte del código y residen en `var/themes`, que es exactamente el directorio que sirve el adaptador local predeterminado. Cuando se apunta el montaje de temas a un contenedor en la nube, ese contenedor comienza vacío, de modo que faltan logotipos, colores e imágenes de tema y la interfaz se muestra sin estilos.

Cargue los temas incluidos en el almacenamiento configurado con:

```bash
php bin/console chamilo:remote-storage:upload-themes
```

| Opción | Efecto |
|--------|--------|
| `--dry-run` | Informa de lo que se cargaría, sin escribir nada |
| `--overwrite` | Sustituye los archivos que ya existen en el almacenamiento remoto |

Los archivos que ya están presentes en el sistema de archivos de temas se conservan a menos que se indique `--overwrite`, de modo que volver a ejecutar el comando nunca descarta los logotipos ni los temas de color que un administrador haya cargado a través de **Administración > Configuración > Colores**. Cuando el sistema de archivos de temas es el directorio local `var/themes`, el comando lo detecta y no hace nada, por lo que es seguro ejecutarlo en cualquier instalación.

Chamilo ejecuta este comando por sí mismo al final del asistente de instalación y de nuevo tras una migración de base de datos correcta al actualizar, de modo que los archivos de tema nuevos llegan al almacenamiento en la nube sin ningún paso manual.

Aún hay dos casos en los que debe ejecutarlo a mano:

* **Cambiar una plataforma existente a almacenamiento en la nube**, ya que en ese momento no se produce ninguna instalación ni actualización.
* **Actualizar archivos de tema que hayan cambiado en una nueva versión**, con `--overwrite`. Las ejecuciones automáticas nunca sobrescriben, precisamente para no revertir un logotipo que un administrador haya cargado en un tema incluido; el precio es que un `colors.css` o un `tiny-settings.js` enviado por la nueva versión no sustituye la copia que ya está en el contenedor.

## Migración de archivos existentes

Si está pasando de almacenamiento local a almacenamiento en la nube en una plataforma existente, debe migrar los archivos existentes:

1. Configure el nuevo adaptador de almacenamiento como se ha descrito más arriba.
2. Copie los archivos existentes del directorio local `var/upload/` a su bucket de almacenamiento en la nube, conservando la estructura de directorios.
3. Ejecute `php bin/console chamilo:remote-storage:upload-themes` para cargar los temas incluidos, como se ha descrito más arriba.
4. Verifique que los archivos sean accesibles a través de la plataforma tras la migración.

## Permisos y acceso

Asegúrese de que su bucket de almacenamiento en la nube **no sea de acceso público** a menos que necesite explícitamente URL de archivos públicas. Chamilo sirve los archivos a través de su propia capa de control de acceso, por lo que el acceso público directo al bucket es innecesario y constituye un riesgo de seguridad.

Para S3, utilice una política de bucket que restrinja el acceso a las credenciales IAM configuradas más arriba.

## Consejos

* **Pruebe con MinIO en local** antes de desplegar en un proveedor de nube: MinIO es un servidor gratuito compatible con S3 que puede ejecutar en su propia máquina.
* **DigitalOcean Spaces** es una alternativa alojada compatible con S3 a Amazon S3, confirmada como funcional con el adaptador S3 de Chamilo.
* **Utilice un bucket dedicado** para Chamilo en lugar de compartir un bucket con otras aplicaciones.
* **Configure políticas de ciclo de vida** en su bucket en la nube para gestionar los costes de almacenamiento (p. ej., mover archivos antiguos a niveles de almacenamiento más económicos).