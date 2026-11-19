# Actualización

Nota: En esta página utilizamos 3.0.0 como número de versión estricto y 3.x para identificar todas las versiones que comienzan con el número 3 (3.0.0, 3.0.1, 3.1.0, etc.). La misma convención se aplica a 2.x.

El proceso de actualización desde 1.11.x también se describe en el archivo `public/documentation/installation_guide.html`, dentro del código de Chamilo.
La información aquí es en gran medida redundante. Puede consultarla en línea en `https://campus.chamilo.net/documentation/installation_guide.html`.

**Actualice a 3.0, no a 2.x.** La versión 3.0 es la versión actual, y algunos ajustes de 1.11.x aún no tenían equivalente en 2.0.0. Por tanto, un sistema 1.11.x pasa directamente a 3.0. Hemos probado migraciones similares de forma exhaustiva, pero cada plataforma tiene su propia historia: pruébelo primero en un entorno de pruebas y considere contar con el acompañamiento profesional de [proveedores oficiales de Chamilo](https://chamilo.org/providers) en esta tarea.

## Actualización de 1.11.x a 3.0

La actualización de Chamilo 1.11.x a 3.0 es una **migración mayor**, no una simple actualización. Chamilo 2.0 se reconstruyó sobre el framework Symfony con un esquema de base de datos reestructurado, una nueva API y una organización de archivos distinta, y 3.0 continúa esa línea. Planifique esta migración con cuidado y pruébela en un entorno de pruebas antes de implantarla en producción.

### Antes de empezar

1. **Lea las notas de la versión** de Chamilo 3.x para comprender qué ha cambiado, qué es nuevo y qué funciones de 1.11.x pueden no estar aún disponibles.
2. **Haga una copia de seguridad de todo**:
   - Volcado completo de la base de datos (`mysqldump` o equivalente).
   - Todos los archivos del directorio de instalación de Chamilo 1.11.x, en especial `app/upload/`, `app/courses/` y `main/`.
   - Su archivo `configuration.php`.
3. **Pruebe primero en un servidor de preproducción.** Nunca ejecute la migración directamente en su servidor de producción.
4. **Verifique los requisitos del servidor.** Chamilo 3.x tiene requisitos distintos de los de 1.11.x (en particular, PHP 8.3 o posterior: el instalador rechaza cualquier versión anterior). Consulte [Requisitos del servidor](server-requirements.md).
5. **Decida qué ocurre con la tabla `version` de la base de datos de 1.11.x.** Chamilo 2.x y versiones posteriores almacenan el historial de migraciones de Doctrine en una tabla con ese nombre, con otras columnas, por lo que ambas no pueden coexistir. El asistente web se encarga de ello: renombra la tabla de 1.11.x a `version_1_11` antes de ejecutar la primera migración. La línea de comandos no lo hace, así que **elimine o renombre esa tabla usted mismo antes de ejecutar `doctrine:migrations:migrate`**. La tabla no es necesaria para que Chamilo 1.11.x funcione.
6. **Descomprima el código nuevo en un directorio nuevo.** Los archivos de 1.11.x permanecen donde están. El instalador los lee como origen de sus cursos y cargas, y escribe el resultado en el nuevo árbol de directorios.
7. **Si utilizó subidiomas, no se requiere nada adicional.** La actualización los convierte y escribe sus términos en `var/translations/`, directorio en el que su servidor web ya necesita poder escribir. La interfaz los lee desde allí, sin reconstrucción.

### Ejecución de la actualización

Puede ejecutar la actualización mediante el asistente web o mediante la línea de comandos.

#### Asistente web

1. Apunte el `DocumentRoot` de su host virtual al subdirectorio `public/` del nuevo árbol.
2. Cree un archivo vacío `UPGRADE_ENABLED` en la raíz del proyecto, junto a `.env` y `composer.json` — véase más abajo.
3. Abra su URL. El asistente se inicia, porque el nuevo árbol aún no tiene un archivo `.env`.
4. En el paso 2, seleccione la opción de actualización e indique la ruta raíz de su instalación de 1.11.x.
5. Siga el asistente hasta el final.

El asistente no tiene un inicio de sesión propio, por lo que una actualización necesita una autorización en el servidor: ese archivo `UPGRADE_ENABLED`. **Solo usted lo crea.** El asistente nunca lo escribe por sí mismo, porque el valor del archivo reside precisamente en que su presencia demuestra que una persona tomó la decisión en el servidor.

Su nuevo árbol aún no tiene `.env`, por lo que el asistente sí se abre sin el archivo. Lo solicita en el paso de requisitos, cuando elige la actualización y antes de pedir su base de datos. Cree el archivo entonces y continúe; no es necesario reiniciar el asistente.

El instalador elimina el archivo cuando finaliza la actualización. Si la raíz de su proyecto es de solo lectura, lo indica en su lugar, y usted elimina el archivo manualmente. Mientras el archivo esté presente, el instalador permanece abierto, y la página de administración lo notifica en las comprobaciones de estado de la plataforma.

#### Línea de comandos

Establezca `UPDATE_PATH` en la raíz de su instalación de 1.11.x y, a continuación, ejecute las migraciones:

```bash
UPDATE_PATH=/path/to/chamilo-1.11 php bin/console doctrine:migrations:migrate --no-interaction
```

Aumente primero `memory_limit` y `max_execution_time`. La migración lee todos los archivos de los cursos, por lo que necesita mucho más que los valores predeterminados.

#### Cuánto tiempo tarda

La duración depende del tamaño de su base de datos y de los archivos de sus cursos. Como punto de referencia, una plataforma 1.11.28 con 238 tablas, 11 cursos, 63 usuarios y 1489 archivos de curso tardó **6 minutos** y 1,7 GB de memoria, y ejecutó 393 migraciones. Una plataforma de producción de gran tamaño tarda horas. Planifique una ventana de mantenimiento y consulte el [foro de Chamilo](https://chamilo.org) o contacte con un [proveedor oficial](https://chamilo.org/providers) antes de ejecutarla en producción.

### Qué puede requerir atención manual

| Área | Notas |
|------|-------|
| **Complementos personalizados** | Los complementos de 1.11.x no funcionan en 2.x ni en 3.x. Deben reescribirse o sustituirse. Los oficiales se han portado de forma progresiva desde 2.0: consulte la lista de complementos de su versión para ver cuáles están disponibles. |
| **Temas personalizados** | Los temas de 1.11.x no funcionan en 2.x ni en 3.x. Recree su identidad visual con el sistema de temas de 3.x. |
| **Modificaciones personalizadas de la base de datos** | Cualquier modificación directa de la base de datos ajena a Chamilo puede no migrarse. |
| **Paquetes SCORM** | El contenido SCORM debería migrarse, pero pruebe los paquetes de forma individual para verificar la reproducción. |
| **Integraciones externas** | Cualquier integración que utilice la API o los servicios web de 1.11.x debe actualizarse para usar la API exclusivamente REST de 2.x mediante [API Platform](https://github.com/api-platform/api-platform). |
| **Ajustes de perfil** | Tras una actualización heredada, compruebe que `changeable_options` y `visible_options` siguen reflejando las reglas esperadas de editabilidad y visibilidad del perfil. El código de actualización conserva sus valores de los ajustes heredados en lugar de tratarlos como entradas de `configuration.php` ([PR #9161](https://github.com/chamilo/chamilo-lms/pull/9161)). |

### Auditoría de las relaciones entre cuestionarios y preguntas tras una migración heredada

Si los ejercicios migrados parecen tener preguntas ausentes, utilice el comando de consola introducido en [PR #9157](https://github.com/chamilo/chamilo-lms/pull/9157) para **auditar antes de intentar una reparación**. Ejecútelo desde la raíz de la aplicación Chamilo contra una copia de ensayo de la base de datos migrada.

Una primera pasada examina únicamente la base de datos de destino y **no modifica los datos**:

```bash
php bin/console chamilo:migration:repair-quiz-relations-from-legacy
```

Los cuestionarios vacíos por sí solos no demuestran que se hayan perdido relaciones. Para comparar con los datos antiguos de Chamilo, ponga la base de datos heredada a disposición en el **mismo servidor de bases de datos**, con permisos de lectura adecuados, e indique su nombre:

```bash
php bin/console chamilo:migration:repair-quiz-relations-from-legacy --source-database=legacy_chamilo_db
```

Puede limitar cualquiera de las dos auditorías a *iids de cuestionarios de destino* concretos con la opción repetible `--quiz=123`. Sin `--apply`, ambas formas siguen siendo de solo lectura. La comparación informa de las relaciones ausentes, los cuestionarios afectados y los posibles conflictos o referencias no resueltas.

**No aplique una reparación basándose únicamente en un recuento de cuestionarios vacíos.** Conserve copias de seguridad verificadas de la base de datos y revise los datos de origen y de destino comparados. Una reparación requiere `--source-database`, `--apply` y que tanto `--expected-missing-relations` como `--expected-affected-quizzes` se establezcan en los **recuentos exactos de la comparación de solo lectura precedente**. El comando se niega a escribir si estos recuentos han cambiado o si los cuestionarios afectados presentan conflictos inseguros. Aplíquelo solo después de validar los resultados en una copia de ensayo; repita después la auditoría de solo lectura para confirmar que no quedan relaciones ausentes verificadas.

## Actualización de 2.x a 3.0

Esta actualización conserva su directorio existente y su base de datos existente. Copie el código nuevo sobre el árbol antiguo y, a continuación, ejecute las migraciones, ya sea mediante el asistente web o mediante la línea de comandos.

### Inicialice primero el historial de migraciones

Chamilo instala el esquema de la base de datos directamente a partir de las definiciones de las entidades, de modo que una instalación creada por el instalador contiene el esquema final, pero un **historial de migraciones vacío**. Las instalaciones creadas antes de Chamilo 3.0 nunca recibieron ese historial. De él dependen dos cosas:

* `doctrine:migrations:migrate` decide qué ejecutar a partir de él. Con un historial vacío, intenta reproducir todas las migraciones desde el principio sobre un esquema que ya está actualizado.
* El instalador web decide a partir de él si hay una actualización pendiente. Con un historial vacío rechaza la solicitud, porque nada demuestra que corresponda una actualización.

Por tanto, inicialícelo una sola vez y respete el orden que se indica a continuación.

> **Advertencia: inicialice el historial antes de copiar el código nuevo.** Los comandos marcan como ya ejecutada cada migración que contiene el código **desplegado**. Si los ejecuta después de copiar el código de la versión 3.0, también marcarán las migraciones de la 3.0 y su actualización nunca se ejecutará.

Con su versión actual todavía en su sitio, ejecute:

```bash
php bin/console doctrine:migrations:sync-metadata-storage --no-interaction
php bin/console doctrine:migrations:version --add --all --no-interaction
```

El primer comando crea la tabla del historial. El segundo marca las migraciones de su versión actual. `doctrine:migrations:version` falla por sí solo si la tabla aún no existe, así que no omita el primero.

**¿No dispone de shell en su alojamiento?** La página de administración hace lo mismo: el elemento **No migration history: click to fix** de las comprobaciones de estado de la plataforma. No necesita el orden anterior, porque lee su esquema en lugar del código en disco: registra solo los espacios de nombres de migración que su base de datos demuestra que ya contiene y deja pendientes los más recientes. Por tanto, puede copiar primero el código de la 3.0 y usar el enlace después; consulte *Si ya copió el código de la 3.0* más abajo.

Compruebe el resultado:

```bash
php bin/console doctrine:migrations:status
```

`Executed` debe ser igual a `Available`, y `New` debe ser 0. Ahora copie el código de la 3.0.

### Si ya copió el código de la 3.0

Dos síntomas identifican este caso. El asistente web responde **"Chamilo is already installed"** aunque su plataforma sea de la versión 2.x, y `doctrine:migrations:status` informa de `Executed` 0.

Su historial sigue vacío y el código en disco ya no es el código que creó su base de datos. Por tanto, **no** lo inicialice con `--add --all` desde aquí: eso marca todas las migraciones que contiene el código desplegado, lo que registra como ya realizadas las migraciones que su actualización todavía necesita. Entonces nunca se ejecutan y nada le avisa después: su base de datos simplemente carece de las columnas que crean.

Hay dos salidas, y la primera no necesita shell.

**Primera vía, desde la página de administración.** Abra las comprobaciones de estado de la plataforma y use el elemento **No migration history: click to fix**. Lee su esquema, registra solo los espacios de nombres que su base de datos demuestra que ya contiene y deja pendientes las migraciones más recientes. La notificación informa de ambos recuentos: para una base de datos 2.0.x bajo el código de la 3.0, 347 registradas y 46 todavía pendientes. A continuación, ejecute la actualización como se describe más abajo.

**Segunda vía, desde un shell.** Inicialice todo y, después, elimine del historial los espacios de nombres que su versión anterior no contenía.

Cada versión 2.0.x, de la 2.0.0 a la 2.0.3, contiene las mismas **344** migraciones, todas ellas en el espacio de nombres `V200`. Chamilo 3.0.0 contiene **393**: los espacios de nombres `V210` y `V300`, más tres migraciones `V200`. Esas tres son copias fechadas de migraciones que también existen en `V210` y `V300`, añadidas para que la ruta 1.11.x cree sus columnas con antelación, y cada una comprueba el esquema antes de actuar. Por tanto, registrar todo el espacio de nombres `V200` no pierde nada: sus gemelas permanecen pendientes y realizan el trabajo.

```bash
php bin/console doctrine:migrations:sync-metadata-storage --no-interaction
php bin/console doctrine:migrations:version --add --all --no-interaction
```

A continuación, en su base de datos, elimine las migraciones que todavía deben ejecutarse:

```sql
DELETE FROM version WHERE version LIKE '%V210%' OR version LIKE '%V300%';
```

Compruebe el resultado:

```bash
php bin/console doctrine:migrations:status
```

Para un origen 2.0.x y Chamilo 3.0.0, `Executed` debe ser 347, `Available` 393 y `New` 46. Ahora continúe con la actualización que se indica a continuación.

### Autorice la actualización, si usa el asistente web

Su plataforma ya está instalada, de modo que el asistente la rechaza hasta que autorice la actualización en el servidor. La autorización es un archivo vacío llamado `UPGRADE_ENABLED`, en la raíz del proyecto, junto a `.env` y `composer.json`:

```bash
cd /var/www/chamilo
touch UPGRADE_ENABLED
```

Va en la raíz del proyecto, no en `public/`: desde allí nadie puede preguntar por HTTP si su plataforma está actualmente abierta para actualizarse. Sin él, el asistente responde `No UPGRADE_ENABLED found in the project root`. El instalador elimina el archivo cuando termina la actualización; en una raíz de proyecto de solo lectura lo indica en su lugar, y usted lo elimina a mano. La línea de comandos no necesita dicho archivo.

### Ejecutar la actualización

Copie el código nuevo y, a continuación, abra su URL y siga el asistente, o ejecute las migraciones desde la línea de comandos:

```bash
php bin/console doctrine:migrations:migrate --no-interaction
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

El asistente web solo se abre mientras haya migraciones pendientes. Una vez finalizada la actualización, vuelve a responder `409 Conflict`, que es lo que lo protege: el asistente no dispone de un inicio de sesión propio.

## Actualización de Chamilo 3.0.x

Las actualizaciones menores dentro de la rama 3.0 son más sencillas.

### Proceso de actualización

#### Uso de un paquete

1. **Realice una copia de seguridad** de la base de datos y de los archivos.

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

6. **Limpie la caché:**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **Cambie los permisos**

Adapte al usuario de su servidor web:
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **Compruebe** que la plataforma se carga correctamente y verifique de forma puntual las funcionalidades clave.

#### Uso de Git

Si instaló Chamilo mediante Git, puede seguir estas instrucciones en su lugar.

1. **Realice una copia de seguridad** de la base de datos y de los archivos.

2. **Obtenga el código más reciente** (o descargue la nueva versión):
   ```bash
   git pull origin 3.0
   ```

3. **Actualice las dependencias de PHP:**
   ```bash
   composer install --no-dev --optimize-autoloader
   ```

4. **Actualice las dependencias de JavaScript y recompile los recursos:**
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

Adapte al usuario de su servidor web:
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **Compruebe** que la plataforma se carga correctamente y verifique de forma puntual las funcionalidades clave.

### Automatización de las actualizaciones

Para las organizaciones que gestionan varias instancias de Chamilo, considere la posibilidad de automatizar el proceso de actualización mediante un script:

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

## Chamilo 3.1: migración del idioma del curso

En la [PR #9176](https://github.com/chamilo/chamilo-lms/pull/9176), los idiomas de los cursos se normalizaron desde la columna textual `course.course_language` hacia `course.language_id`, que hace referencia a `language.id`. La API y los llamadores compatibles siguen exponiendo el idioma del curso como un código ISO. Se trata de un cambio en la relación de la base de datos, no de un nuevo selector de idioma para el profesorado.

Antes de ejecutar la migración V310 correspondiente (`Version20261005120000`), compruebe que cada código de idioma del curso coincida con **exactamente un** valor de `language.isocode`. Esta consulta de solo lectura identifica coincidencias ausentes o ambiguas mientras la columna heredada aún existe:

```sql
SELECT c.course_language, COUNT(DISTINCT l.id) AS language_matches
FROM course c
LEFT JOIN language l ON l.isocode = c.course_language
GROUP BY c.course_language
HAVING COUNT(DISTINCT l.id) <> 1;
```

Una comprobación previa correcta no devuelve ninguna fila. Si devuelve alguna, revise y corrija cuidadosamente los datos de origen antes de ejecutar la migración. La migración rechaza los códigos sin coincidencia o ambiguos, y también rechaza un esquema parcial conflictivo (cuando `course_language` y `language_id` están ambos presentes). Realice una copia de seguridad de la base de datos y pruebe en un entorno de preproducción; no elimine la columna heredada ni desactive estas comprobaciones de forma manual.

## Chamilo 3.1: registro de AI Toolbox en cursos actualizados

Cuando AI Toolbox no aparece en cursos que existían antes de una actualización, compruebe si las **migraciones V310** pertinentes se ejecutaron correctamente. La migración de reparación `Version20261008113000` garantiza que existan la herramienta Toolbox y el tipo de recurso `toolbox_items`, y crea las entradas de herramienta de curso de Toolbox que falten **como borradores**; no las publica automáticamente. Las mejoras posteriores de las migraciones abordan la fiabilidad y el rendimiento de la actualización. Se trata de una reparación de actualización, no de un sustituto de la visibilidad y los permisos normales de las herramientas de la plataforma.

Si la herramienta sigue ausente, compruebe el estado de las migraciones y la configuración de Toolbox antes de modificar los registros de los cursos. **No** inserte manualmente filas de herramientas o de enlaces de recursos, ni ejecute repetidamente las migraciones sin revisar el esquema real y el historial de migraciones. Consulte el [PR #9195](https://github.com/chamilo/chamilo-lms/pull/9195) y su seguimiento, el [PR #9229](https://github.com/chamilo/chamilo-lms/pull/9229).

## Chamilo 3.1: normalización del esquema de base de datos heredado

La limpieza del esquema de octubre de 2026 modifica algunos **nombres de columnas, tipos y relaciones** de la base de datos, al tiempo que conserva los campos que siguen utilizándose activamente. En particular, `course_rel_class.course_code` se sustituye por `course_rel_class.c_id` (que hace referencia a `course.id`), y `course_request.category_code` se sustituye por `course_request.category_id` (que hace referencia a `course_category.id`). Determinadas columnas `title`, `url` y `VARCHAR` de gran longitud se convierten a `LONGTEXT`, mientras que otros campos `VARCHAR` propios de Chamilo se normalizan a una longitud de 255 cuando procede. Las columnas pertenecientes a paquetes externos se tratan deliberadamente por separado.

En las instalaciones con informes SQL personalizados, plugins o integraciones, **revise sus consultas y las suposiciones sobre el esquema** antes de desplegar estas migraciones. Las conversiones de clase/curso y de solicitud de curso/categoría rechazan las referencias no resueltas en lugar de descartarlas silenciosamente. La limpieza también elimina las tablas de grupos FOS obsoletas tras preservar de forma segura los roles de usuario derivados de los grupos; los datos de grupos heredados incompatibles o no válidos hacen que la migración se detenga para su revisión. No elimine esas tablas ni reescriba las asociaciones manualmente de antemano.

Estos cambios están documentados en el [PR #9212](https://github.com/chamilo/chamilo-lms/pull/9212) (incidencia #7445). Realice una copia de seguridad de la base de datos y verifique la actualización en una copia de preproducción, en particular si el código personalizado lee estas tablas heredadas o espera longitudes de texto fijas.

## Notas de seguridad

### Mantenimiento de seguridad de octubre de 2026 en la rama de desarrollo 3.x

Varias correcciones de seguridad elaboradas por **christianbeeznest** se fusionaron en la rama `master` de Chamilo entre el **16 y el 18 de octubre de 2026**. Se trata de protecciones a nivel de código, **no de ajustes nuevos**. Una solicitud de incorporación de cambios fusionada no garantiza que el cambio esté incluido en una versión etiquetada concreta ni en una instalación que no se haya actualizado. Consulte las notas de la versión o la revisión de Git desplegada antes de considerar un despliegue como corregido.

Los cambios incluyen:

* **Filtrado de HTML:** eliminación más robusta de atributos de eventos no seguros del HTML proporcionado por el usuario ([PR #9247](https://github.com/chamilo/chamilo-lms/pull/9247)).
* **Progreso de las rutas de aprendizaje y anotaciones de ejercicios:** refuerzo del tratamiento en el servidor de las solicitudes de progreso de las rutas de aprendizaje y del acceso a las respuestas anotadas del intento de un estudiante ([PR #9251](https://github.com/chamilo/chamilo-lms/pull/9251), [PR #9259](https://github.com/chamilo/chamilo-lms/pull/9259)).
* **Enlaces de perfil social y comprobación de enlaces:** validación de URL más estricta y protección del comprobador de enlaces de curso frente a cambios no seguros en la resolución DNS ([PR #9263](https://github.com/chamilo/chamilo-lms/pull/9263), [PR #9271](https://github.com/chamilo/chamilo-lms/pull/9271)).
* **Exportaciones CSV:** mitigación de la interpretación de fórmulas de hoja de cálculo en los datos exportados, en múltiples rutas heredadas y modernas de informes y exportación ([PR #9267](https://github.com/chamilo/chamilo-lms/pull/9267)).

**Tras desplegar código que contenga estas correcciones**, ejecute una comprobación de regresión en preproducción: cree y muestre contenido HTML con formato; guarde y reanude una ruta de aprendizaje; verifique que los estudiantes solo puedan leer sus propias anotaciones de ejercicios autorizadas; compruebe los enlaces sociales y de curso permitidos; y abra exportaciones CSV representativas en una herramienta de hoja de cálculo para confirmar que el texto controlado por el usuario no se interpreta como una fórmula. Incluya los roles de docente, estudiante y administrador cuando sea pertinente. Mantenga vigentes la autenticación, los controles de acceso y las restricciones de red saliente existentes. Estas comprobaciones ayudan a detectar regresiones, pero no sustituyen una revisión de seguridad.

### Contraseñas predecibles de usuarios de SSO y SCIM

Antes de Chamilo 3.0.2, algunas cuentas aprovisionadas o actualizadas por un sistema de identidad externo tenían una contraseña fija y públicamente adivinable. Cualquiera que conociera el nombre de usuario podía iniciar sesión con el formulario de inicio de sesión habitual si la cuenta conservaba el origen de autenticación `platform`.

Chamilo 3.0.2 corrige el código. **No** cambia las contraseñas que ya existen, por lo que revise estas cuentas después de actualizar:

* **SCIM:** los usuarios creados mediante `POST /scim/v2/Users` tienen la contraseña `scim`.
* **Azure Entra ID, Facebook, Keycloak:** los usuarios que iniciaron sesión a través de estos proveedores tenían su contraseña sustituida por `azure`, `facebook` o `keycloak`. Solo los usuarios que también tienen el origen de autenticación `platform` pueden usarla para iniciar sesión.
* **OAuth2 genérico:** los usuarios creados por el proveedor tienen su nombre de usuario como contraseña.

Para cerrar la exposición:

1. Actualice a Chamilo 3.0.2 o posterior.
2. En **Administración > Usuarios**, edite cada usuario afectado y establezca una nueva contraseña. Los usuarios que inician sesión únicamente a través del proveedor de identidad no necesitan conocerla.
3. Si utiliza SCIM, establezca `auth_source` en `authentication.yaml` en un valor distinto de `platform` y, a continuación, vacíe la caché. Consulte [SCIM](../authentication/scim.md). Los usuarios existentes conservan los orígenes de autenticación que ya tienen.
4. Pida a los usuarios que inician sesión con una contraseña que la cambien.

Los usuarios nuevos creados después de la actualización reciben una contraseña aleatoria, y un inicio de sesión mediante SSO ya no sobrescribe la contraseña de un usuario existente. Los usuarios que necesiten una contraseña para el formulario de inicio de sesión habitual pueden solicitar una con **¿Ha olvidado su contraseña?** en la página de inicio de sesión.

## Consejos

* **Realice siempre una copia de seguridad antes de actualizar.** Las migraciones de la base de datos no son reversibles a través de la interfaz de Chamilo.
* **Pruebe primero en un entorno de preproducción** -- especialmente en la migración de 1.11.x a 3.0, que implica una transformación significativa de los datos.
* **Programe las actualizaciones durante ventanas de mantenimiento** cuando los usuarios no estén utilizando activamente la plataforma.
* **Suscríbase a las versiones de GitHub** en [Github](https://github.com/chamilo/chamilo-lms/releases) mediante el icono de la campana para recibir notificaciones de nuevas versiones y parches de seguridad.
* **Si el asistente responde `Chamilo is already installed`**, no encontró ninguna migración pendiente. Ejecute `php bin/console doctrine:migrations:status` para comprobarlo. Si `Executed` es 0 en una plataforma que funciona, el historial de migraciones nunca se inicializó — consulte [Inicialice primero el historial de migraciones](#seed-the-migration-history-first).
* **La descarga automática de nuevas versiones** aún no está disponible en Chamilo 3.0, pero se trata de un proyecto en curso que esperamos publicar pronto. La actualización en sí ya se ejecuta desde el asistente web.