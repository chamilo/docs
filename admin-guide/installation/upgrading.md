# Actualización

Nota: En esta página, utilizamos 2.0.0 como un número de versión estricto y 2.x para identificar todas las versiones que comienzan con el número 2 (2.0.0, 2.0.1, 2.1.0, etc.).

El proceso de actualización de 1.11.x a 2.x está descrito en el archivo `public/documentation/installation_guide.html` dentro de su código de Chamilo. La información aquí es en gran parte redundante. Puede verla en línea en `https://campus.chamilo.net/documentation/installation_guide.html`. Aunque hemos realizado pruebas exhaustivas en migraciones similares, dado que algunas configuraciones de 1.11.x aún no eran compatibles con 2.0.0, recomendamos esperar a la versión 2.1 antes de actualizar un sistema 1.11.x, o contar con el acompañamiento profesional de [proveedores oficiales de Chamilo](https://chamilo.org/providers) en este proceso.

## Actualización de 1.11.x a 2.x

La actualización de Chamilo 1.11.x a 2.x es una **migración importante**, no una simple actualización. Chamilo 2.0 fue reconstruido sobre el framework Symfony con un esquema de base de datos reestructurado, una nueva API y una organización de archivos diferente. Planifique esta migración cuidadosamente y pruébela en un entorno de prueba antes de implementarla en producción.

### Antes de Comenzar

1. **Lea las notas de la versión** de Chamilo 2.x para entender qué ha cambiado, qué hay de nuevo y qué funcionalidades de 1.11.x podrían no estar aún disponibles.
2. **Haga una copia de seguridad de todo**:
   - Volcado completo de la base de datos (`mysqldump` o equivalente).
   - Todos los archivos en el directorio de instalación de Chamilo 1.11.x, especialmente `app/upload/`, `app/courses/` y `main/`.
   - Su archivo `configuration.php`.
3. **Pruebe en un servidor de staging primero.** Nunca ejecute la migración directamente en su servidor de producción.
4. **Verifique los requisitos del servidor.** Chamilo 2.x tiene requisitos diferentes a los de 1.11.x (notablemente, PHP 8.2+). Consulte [Requisitos del Servidor](server-requirements.md).

### Aspectos que Pueden Requerir Atención Manual

| Área | Notas |
|------|-------|
| **Plugins personalizados** | Los plugins de 1.11.x no son compatibles con 2.x. Deben ser reescritos o reemplazados, lo cual se ha realizado parcialmente en 2.0 y debería estar completo en 2.1 para los plugins oficiales. |
| **Temas personalizados** | Los temas de 1.11.x no funcionan en 2.x. Recree su branding utilizando el sistema de temas de 2.x. |
| **Modificaciones personalizadas en la base de datos** | Cualquier modificación directa en la base de datos fuera de Chamilo podría no migrarse. |
| **Paquetes SCORM** | El contenido SCORM debería migrarse, pero pruebe los paquetes individualmente para verificar su reproducción. |
| **Integraciones externas** | Cualquier integración que utilice la API o los servicios web de 1.11.x debe actualizarse para usar la API REST exclusiva de 2.x mediante [API Platform](https://github.com/api-platform/api-platform). |

## Actualización de Chamilo 2.0.x

Las actualizaciones menores dentro de la rama 2.0 son más sencillas.

### Proceso de Actualización

#### Usando un paquete

1. **Haga una copia de seguridad** de la base de datos y los archivos.

2. **Descargue la última versión 2.0.x** desde [chamilo.org](https://chamilo.org/download):

3. **Expanda localmente**

Por ejemplo (adapte según la versión descargada):
   ```bash
   unzip chamilo-2.0.1.zip
   ```

4. **Copie los archivos sobre su instalación existente de Chamilo**
   ```bash
   cp -r chamilo/* [your-chamilo-installation-path]/
   cp -r chamilo/.* [your-chamilo-installation-path]/
   ```

5. **Ejecute las migraciones de la base de datos:**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **Limpie la caché:**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **Cambie los permisos**

Adapte según el usuario de su servidor web:
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **Verifique** que la plataforma se carga correctamente y revise las funcionalidades clave.

#### Usando Git

Si instaló Chamilo usando Git, puede seguir estas instrucciones en su lugar.

1. **Haga una copia de seguridad** de la base de datos y los archivos.

2. **Obtenga el código más reciente** (o descargue la nueva versión):
   ```bash
   git pull origin 2.0
   ```

3. **Actualice las dependencias de PHP:**
   ```bash
   composer install --no-dev --optimize-autoloader
   ```

4. **Actualice las dependencias de JavaScript y reconstruya los activos:**
   ```bash
   yarn install && yarn build
   ```

5. **Ejecute las migraciones de la base de datos:**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **Limpie la caché:**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **Cambie los permisos**

Adapte según el usuario de su servidor web:
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **Verifique** que la plataforma se carga correctamente y revise las funcionalidades clave.

### Automatización de Actualizaciones

Para organizaciones que gestionan múltiples instancias de Chamilo, considere automatizar el proceso de actualización mediante un script:

```bash
#!/bin/bash
set -e

# Obtener código
git pull origin 2.0

# Dependencias
composer install --no-dev --optimize-autoloader
yarn install && yarn build

# Base de datos
php bin/console doctrine:migrations:migrate --no-interaction

# Caché
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod

echo "Actualización completada."
```

---
## Consejos

* **Siempre haga una copia de seguridad antes de actualizar.** Las migraciones de la base de datos no son reversibles a través de la interfaz de Chamilo.
* **Pruebe primero en un entorno de staging** -- especialmente para la migración de 1.11.x a 2.0, que implica una transformación significativa de datos.
* **Programe las actualizaciones durante ventanas de mantenimiento** cuando los usuarios no estén utilizando activamente la plataforma.
* **Suscríbase a las publicaciones en GitHub** en [Github](https://github.com/chamilo/chamilo-lms/releases) usando el ícono de la campana para recibir notificaciones sobre nuevas versiones y parches de seguridad.
* **Las actualizaciones web** aún no están disponibles en Chamilo 2.0, pero este es un proyecto en curso que esperamos lanzar pronto.