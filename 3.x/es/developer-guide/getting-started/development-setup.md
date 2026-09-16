# Configuración de desarrollo

## Requisitos previos

* PHP 8.3, 8.4 u 8.5 con las extensiones: intl, gd, curl, zip, mbstring, xml, json, pdo, ldap, exif, bcmath
* Composer
* Node.js y npm (o Yarn — el proyecto usa Yarn 4; consulte `package.json` para la versión exacta fijada)
* MySQL 5.7+ o MariaDB 10.11+
* Git

## Pasos de instalación

### 1. Clonar el repositorio

```bash
git clone https://github.com/chamilo/chamilo-lms.git chamilo
cd chamilo
```

### 2. Instalar las dependencias de PHP

```bash
composer install
```

### 3. Configurar el entorno

El repositorio incluye `.env.dist` como referencia. Cree un archivo `.env` vacío que el instalador web rellenará — mantenerlo vacío garantiza que las actualizaciones nunca sobrescriban su configuración local:

```bash
touch .env
```

A continuación, haga que `.env` y `config/` sean escribibles por el servidor web para que el instalador pueda escribir su configuración local:

```bash
sudo chown -R www-data: .env config/ var/
```

### 4. Instalar las dependencias del frontend y compilar

```bash
# Install JavaScript dependencies
yarn install

# Build frontend assets for development
yarn encore dev

# Or watch for changes during development
yarn encore dev --watch
```

### 5. Iniciar el servidor de desarrollo

```bash
symfony server:start
```

O utilice Apache/Nginx apuntando al directorio `public/`.

### 6. Configurar la base de datos

Ejecute el asistente de instalación web navegando a la URL de Chamilo en un navegador.

### 7. Generar las claves JWT

```bash
php bin/console lexik:jwt:generate-keypair
```

### 8. Asegurar el sistema

El archivo `.env` y el directorio `config/` solo necesitan ser escribibles durante la instalación. Asegúrelos después:

```bash
sudo chown -R root: .env config/
```

El directorio `var/` debe permanecer escribible por el servidor web.


## Comandos de compilación

| Command | Purpose |
|---------|---------|
| `yarn encore dev` | Compilar el frontend para desarrollo |
| `yarn encore dev --watch` | Compilar y vigilar los cambios |
| `yarn encore production` | Compilar optimizado para producción |
| `php bin/console cache:clear` | Vaciar la caché de Symfony |

## Consejos de desarrollo

* Establezca `APP_ENV=dev` y `APP_DEBUG=1` en `.env` para mensajes de error detallados
* La barra de depuración de Symfony aparece en la parte inferior de las páginas en modo de desarrollo
* La documentación de la API está disponible en `/api` cuando `APP_ENABLE_API_ENTRYPOINT=true` (tras vaciar la caché — consulte [Configuración](../../admin-guide/installation/configuration.md#enable-the-api-documentation))
* Utilice `yarn encore dev --watch` para recompilar automáticamente los cambios del frontend