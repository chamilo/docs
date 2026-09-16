# Configuración para Desarrollo

## Requisitos Previos

* PHP 8.2+ con las extensiones: intl, gd, curl, zip, mbstring, xml, json, pdo, ldap, exif, bcmath
* Composer
* Node.js y npm (o Yarn — el proyecto utiliza Yarn 4; consulta `package.json` para la versión exacta fijada)
* MySQL 5.7+ o MariaDB 10.11+
* Git

## Pasos de Instalación

### 1. Clonar el Repositorio

```bash
git clone https://github.com/chamilo/chamilo-lms.git chamilo
cd chamilo
```

### 2. Instalar Dependencias de PHP

```bash
composer install
```

### 3. Configurar el Entorno

El repositorio incluye `.env.dist` como referencia. Crea un archivo vacío `.env` que el instalador web completará — mantenerlo vacío asegura que las actualizaciones nunca sobrescriban tu configuración local:

```bash
touch .env
```

Luego, haz que `.env` y `config/` sean escribibles por el servidor web para que el instalador pueda escribir tu configuración local:

```bash
sudo chown -R www-data: .env config/ var/
```

### 4. Instalar Dependencias de Frontend y Compilar

```bash
# Instalar dependencias de JavaScript
yarn install

# Compilar activos de frontend para desarrollo
yarn encore dev

# O vigilar cambios durante el desarrollo
yarn encore dev --watch
```

### 5. Iniciar el Servidor de Desarrollo

```bash
symfony server:start
```

O utiliza Apache/Nginx apuntando al directorio `public/`.

### 6. Configurar la Base de Datos

Ejecuta el asistente de instalación basado en web navegando a la URL de Chamilo en un navegador.

### 7. Generar Claves JWT

```bash
php bin/console lexik:jwt:generate-keypair
```

### 8. Asegurar tu Sistema

El archivo `.env` y el directorio `config/` solo necesitan ser escribibles durante el tiempo de la instalación. Asegúralos después:

```bash
sudo chown -R root: .env config/
```

El directorio `var/` necesita seguir siendo escribible por el servidor web.

## Comandos de Compilación

| Comando | Propósito |
|---------|-----------|
| `yarn encore dev` | Compilar frontend para desarrollo |
| `yarn encore dev --watch` | Compilar y vigilar cambios |
| `yarn encore production` | Compilar optimizado para producción |
| `php bin/console cache:clear` | Limpiar caché de Symfony |

## Consejos para el Desarrollo

* Establece `APP_ENV=dev` y `APP_DEBUG=1` en `.env` para mensajes de error detallados
* La barra de herramientas de depuración de Symfony aparece en la parte inferior de las páginas en modo de desarrollo
* La documentación de la API está disponible en `/api` cuando `APP_ENABLE_API_ENTRYPOINT=1`
* Usa `yarn encore dev --watch` para recompilar automáticamente los cambios en el frontend