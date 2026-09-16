# Actualización

Nota: En esta página utilizamos 3.0.0 como número de versión estricto y 3.x para identificar todas las versiones que empiezan por el número 3 (3.0.0, 3.0.1, 3.1.0, etc.). La misma convención se aplica a 2.x.

El proceso de actualización desde 1.11.x también se describe en el archivo `public/documentation/installation_guide.html` de su código de Chamilo.
La información aquí es en gran medida redundante. Puede consultarla en línea en `https://campus.chamilo.net/documentation/installation_guide.html`.

**Actualice a 3.0, no a 2.x.** La versión 3.0 es la versión actual, y algunos ajustes de 1.11.x aún no tenían equivalente en 2.0.0. Por tanto, un sistema 1.11.x pasa directamente a 3.0. Hemos probado migraciones similares de forma exhaustiva, pero cada plataforma tiene su propia historia: pruébelo primero en un entorno de prueba y considere contar con el acompañamiento profesional de [proveedores oficiales de Chamilo](https://chamilo.org/providers) en esta empresa.

## Actualización de 1.11.x a 3.0

La actualización de Chamilo 1.11.x a 3.0 es una **migración mayor**, no una simple actualización. Chamilo 2.0 se reconstruyó sobre el framework Symfony con un esquema de base de datos reestructurado, una nueva API y una organización de archivos distinta, y 3.0 continúa esa línea. Planifique esta migración con cuidado y pruébela en un entorno de prueba antes de desplegarla en producción.

### Antes de empezar

1. **Lea las notas de la versión** de Chamilo 3.x para comprender qué ha cambiado, qué es nuevo y qué funcionalidades de 1.11.x pueden no estar aún disponibles.
2. **Haga una copia de seguridad de todo**:
   - Volcado completo de la base de datos (`mysqldump` o equivalente).
   - Todos los archivos del directorio de instalación de Chamilo 1.11.x, especialmente `app/upload/`, `app/courses/` y `main/`.
   - Su archivo `configuration.php`.
3. **Pruebe primero en un servidor de preproducción.** Nunca ejecute la migración directamente en el servidor de producción.
4. **Verifique los requisitos del servidor.** Chamilo 3.x tiene requisitos distintos de 1.11.x (en particular, PHP 8.3 o posterior — el instalador rechaza cualquier versión anterior). Consulte [Requisitos del servidor](server-requirements.md).
5. **Elimine la tabla `version` de la base de datos 1.11.x.** Este paso es obligatorio. Chamilo 2.x y posteriores almacenan el historial de migraciones de Doctrine en una tabla con ese nombre, con otras columnas. Si deja la tabla de 1.11.x, la actualización se detiene de inmediato. La tabla no es necesaria para el funcionamiento de Chamilo 1.11.x.
6. **Descomprima el código nuevo en un directorio nuevo.** Los archivos de 1.11.x permanecen donde están. El instalador los lee como origen de sus cursos y cargas, y escribe el resultado en el nuevo árbol.

### Ejecución de la actualización

Puede ejecutar la actualización mediante el asistente web o mediante la línea de comandos.

#### Asistente web

1. Apunte el `DocumentRoot` de su virtual host al subdirectorio `public/` del nuevo árbol.
2. Abra su URL. El asistente se inicia porque el nuevo árbol aún no tiene un archivo `.env`.
3. En el paso 2, seleccione la opción de actualización e indique la ruta raíz de su instalación 1.11.x.
4. Siga el asistente hasta el final.

#### Línea de comandos

Establezca `UPDATE_PATH` en la raíz de su instalación 1.11.x y, a continuación, ejecute las migraciones:

```bash
UPDATE_PATH=/path/to/chamilo-1.11 php bin/console doctrine:migrations:migrate --no-interaction
```

Aumente primero `memory_limit` y `max_execution_time`. La migración lee todos los archivos de los cursos, por lo que necesita mucho más que los valores predeterminados.

#### Cuánto tarda

La duración depende del tamaño de su base de datos y de los archivos de los cursos. Como punto de referencia, una plataforma 1.11.28 con 238 tablas, 11 cursos, 63 usuarios y 1489 archivos de curso tardó **6 minutos** y 1,7 GB de memoria, y ejecutó 393 migraciones. Una plataforma de producción grande tarda horas. Planifique una ventana de mantenimiento y consulte el [foro de Chamilo](https://chamilo.org) o contacte con un [proveedor oficial](https://chamilo.org/providers) antes de ejecutarla en producción.

### Qué puede requerir atención manual

| Área | Notas |
|------|-------|
| **Complementos personalizados** | Los complementos de 1.11.x no funcionan en 2.x ni en 3.x. Deben reescribirse o sustituirse. Los oficiales se han portado de forma progresiva desde 2.0: consulte la lista de complementos de su versión para ver cuáles están disponibles. |
| **Temas personalizados** | Los temas de 1.11.x no funcionan en 2.x ni en 3.x. Recree su identidad visual con el sistema de temas de 3.x. |
| **Modificaciones personalizadas de la base de datos** | Cualquier modificación directa de la base de datos ajena a Chamilo puede no migrarse. |
| **Paquetes SCORM** | El contenido SCORM debería migrar, pero pruebe los paquetes de forma individual para verificar la reproducción. |
| **Integraciones externas** | Cualquier integración que use la API o los servicios web de 1.11.x debe actualizarse para usar la API exclusiva REST de 2.x mediante [API Platform](https://github.com/api-platform/api-platform). |

## Actualización de 2.x a 3.0

Esta actualización conserva su directorio existente y su base de datos existente. Copia el código nuevo sobre el árbol antiguo y, a continuación, ejecuta las migraciones, ya sea mediante el asistente web o mediante la línea de comandos.

### Sembrar primero el historial de migraciones

Chamilo instala el esquema de la base de datos directamente a partir de las definiciones de las entidades, de modo que una instalación creada por el instalador contiene el esquema final pero un **historial de migraciones vacío**. Las instalaciones creadas antes de Chamilo 3.0 nunca recibieron ese historial. Dos cosas dependen de él:

* `doctrine:migrations:migrate` decide qué ejecutar a partir de él. Con un historial vacío intenta reproducir todas las migraciones desde el principio sobre un esquema que ya está actualizado.
* El instalador web decide a partir de él si hay una actualización pendiente. Con un historial vacío rechaza la petición, porque nada demuestra que corresponda una actualización.

Por tanto, siémbrelo una vez y respete el orden que se indica a continuación.

> **Advertencia: siembre el historial antes de copiar el código nuevo.** Los comandos marcan como ya ejecutada cada migración que lleva el código **desplegado**. Si los ejecuta después de copiar el código de 3.0, también marcan las migraciones de 3.0 y su actualización nunca se ejecuta.

Con su versión actual todavía en su sitio, ejecute:

```bash
php bin/console doctrine:migrations:sync-metadata-storage --no-interaction
php bin/console doctrine:migrations:version --add --all --no-interaction
```

El primer comando crea la tabla de historial. El segundo marca las migraciones de su versión actual. `doctrine:migrations:version` falla por sí solo si la tabla aún no existe, así que no omita el primero.

Compruebe el resultado:

```bash
php bin/console doctrine:migrations:status
```

`Executed` debe ser igual a `Available`, y `New` debe ser 0. Ahora copie el código de 3.0.

### Ejecutar la actualización

Copie el código nuevo y, a continuación, abra su URL y siga el asistente, o ejecute las migraciones desde la línea de comandos:

```bash
php bin/console doctrine:migrations:migrate --no-interaction
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

El asistente web se abre solo mientras hay migraciones pendientes. Una vez finalizada la actualización, responde de nuevo `409 Conflict`, que es lo que lo protege: el asistente no tiene inicio de sesión propio.

## Actualización de Chamilo 3.0.x

Las actualizaciones menores dentro de la rama 3.0 son más sencillas.

### Proceso de actualización

#### Uso de un paquete

1. **Haga una copia de seguridad** de la base de datos y de los archivos.

2. **Descargue la última versión 3.0.x** desde [chamilo.org](https://chamilo.org/download):

3. **Descomprima localmente**

Por ejemplo (adapte a la versión descargada)
   ```bash
   unzip chamilo-3.0.1.zip
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

6. **Vacíe la caché:**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **Cambie los permisos**

Adapte al usuario de su servidor web:
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **Verifique** que la plataforma carga correctamente y compruebe de forma puntual las funcionalidades clave.

#### Uso de Git

Si instaló Chamilo con Git, puede seguir estas instrucciones en su lugar.

1. **Haga una copia de seguridad** de la base de datos y de los archivos.

2. **Obtenga el código más reciente** (o descargue la nueva versión):
   ```bash
   git pull origin 3.0
   ```

3. **Actualice las dependencias de PHP:**
   ```bash
   composer install --no-dev --optimize-autoloader
   ```

4. **Actualice las dependencias de JavaScript y reconstruya los recursos:**
   ```bash
   yarn install && yarn build
   ```

5. **Ejecute las migraciones de la base de datos:**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **Vacíe la caché:**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **Cambie los permisos**

Adapte al usuario de su servidor web:
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **Verifique** que la plataforma carga correctamente y compruebe de forma puntual las funcionalidades clave.

### Automatización de las actualizaciones

Para las organizaciones que gestionan varias instancias de Chamilo, considere automatizar el proceso de actualización mediante un script:

```bash
#!/bin/bash
set -e

# Pull code
git pull origin 3.0

# Dependencies
composer install --no-dev --optimize-autoloader
yarn install && yarn build

# Database
php bin/console doctrine:migrations:migrate --no-interaction

# Cache
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod

echo "Update complete."
```

## Consejos

* **Haga siempre una copia de seguridad antes de actualizar.** Las migraciones de la base de datos no son reversibles a través de la interfaz de Chamilo.
* **Pruebe primero en un entorno de preproducción** -- especialmente para la migración de 1.11.x a 3.0, que implica una transformación de datos significativa.
* **Programe las actualizaciones durante ventanas de mantenimiento** cuando los usuarios no estén utilizando activamente la plataforma.
* **Suscríbase a las versiones de GitHub** en [Github](https://github.com/chamilo/chamilo-lms/releases) mediante el icono de la campana para recibir notificaciones de nuevas versiones y parches de seguridad.
* **Si el asistente responde `Chamilo is already installed`**, no encontró ninguna migración pendiente. Ejecute `php bin/console doctrine:migrations:status` para comprobarlo. Si `Executed` es 0 en una plataforma que funciona, el historial de migraciones nunca se sembró — consulte [Sembrar primero el historial de migraciones](#seed-the-migration-history-first).
* **La descarga automática de nuevas versiones** aún no está disponible en Chamilo 3.0, pero es un proyecto en curso que esperamos publicar pronto. La actualización en sí ya se ejecuta desde el asistente web.