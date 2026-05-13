# Pruebas

## Pruebas en PHP

Chamilo utiliza **PHPUnit** para las pruebas del backend.

### Configuración de la Base de Datos de Pruebas

Las pruebas requieren una base de datos dedicada. Crea el archivo `.env.test.local` con las credenciales de tu base de datos de pruebas:

```ini
DATABASE_HOST='127.0.0.1'
DATABASE_PORT='3306'
DATABASE_NAME='chamilo_test'
DATABASE_USER='root'
DATABASE_PASSWORD='root'
```

Luego, inicializa la base de datos de pruebas:

```bash
php bin/console --env=test cache:clear
php bin/console --env=test doctrine:database:create
php bin/console --env=test doctrine:schema:create
php bin/console --env=test doctrine:fixtures:load --no-interaction
```

Para restablecer después de cambios en el esquema:

```bash
php bin/console --env=test doctrine:schema:update --force --complete
```

### Ejecución de Pruebas

```bash
# Ejecutar todas las pruebas
php bin/phpunit

# Ejecutar un archivo de prueba específico
php bin/phpunit tests/CoreBundle/Repository/UserRepositoryTest.php

# Ejecutar pruebas con informe de cobertura en HTML
php bin/phpunit --coverage-html var/coverage
```

### Ubicación de las Pruebas

Las pruebas se encuentran en el directorio `tests/`:

```
tests/
├── CoreBundle/
│   ├── Api/
│   ├── Command/
│   ├── Controller/
│   ├── Migrations/
│   ├── Repository/
│   ├── Security/
│   ├── Serializer/
│   ├── Settings/
│   ├── Tool/
│   └── Twig/
├── CourseBundle/
│   ├── Repository/
│   └── Settings/
├── behat/               # Pruebas de extremo a extremo con Behat
├── fixtures/            # Archivos de fixtures de Alice
├── AbstractApiTest.php  # Clase base para pruebas de API
└── ChamiloTestTrait.php # Ayudantes compartidos para pruebas
```

### Tipos de Pruebas

* **Pruebas unitarias/integración** — Pruebas de PHPUnit en `CoreBundle/` y `CourseBundle/`; la mayoría interactúan con una base de datos real (a través de `dama/doctrine-test-bundle`)
* **Pruebas funcionales (API)** — Extienden `AbstractApiTest` y prueban endpoints HTTP de extremo a extremo
* **Pruebas Behat** — Pruebas de aceptación a nivel de navegador en `tests/behat/features/` (ver más abajo)

## Pruebas Behat (de Extremo a Extremo)

Chamilo cuenta con un conjunto de pruebas Behat para pruebas de aceptación a nivel de navegador. Requiere una instancia de Chamilo en ejecución, Chrome y ChromeDriver.

```bash
# Desde el directorio tests/behat/:
../../vendor/behat/behat/bin/behat features/actionInstall.feature
../../vendor/behat/behat/bin/behat features/createUser.feature
../../vendor/behat/behat/bin/behat features/createCourse.feature

# O ejecutar todas las características:
../../vendor/behat/behat/bin/behat
```

Configura la URL base en `tests/behat/behat.yml` antes de ejecutar las pruebas.

## Verificaciones del Frontend

```bash
# Revisar JavaScript/Vue (ESLint con Prettier)
yarn eslint assets/vue/

# Verificar tipos en TypeScript
yarn tsc --noEmit

# Construir activos de producción (verifica que todo el build se compile)
yarn build
```

## Calidad del Código PHP

Chamilo utiliza **ECS** (Easy Coding Standard), **PHPStan** y **Psalm** para la calidad del código. Hay accesos directos de Composer disponibles para cada uno:

```bash
# Verificar estilo de código (ECS — Easy Coding Standard)
composer phpcs
# o directamente:
vendor/bin/ecs check

# Corregir automáticamente violaciones de estilo de código
composer phpcs-fix
# o directamente:
vendor/bin/ecs check --fix

# Análisis estático con PHPStan (nivel 5, escanea src/ y tests/)
composer phpstan
# o directamente:
vendor/bin/phpstan analyse

# Análisis estático con Psalm
composer psalm
# o directamente:
vendor/bin/psalm --show-info=false
```

Nota: no hay `php-cs-fixer` en este proyecto. ECS (`symplify/easy-coding-standard`) es la herramienta de estilo de código.

## Integración Continua

Las solicitudes de extracción (pull requests) son verificadas automáticamente por cuatro flujos de trabajo de GitHub Actions:

| Flujo de Trabajo | Qué ejecuta |
|------------------|-------------|
| `phpunit.yml` | Conjunto de pruebas de PHPUnit |
| `format_code.yml` | Verificación de estilo de código con ECS |
| `php_analysis.yml` | Psalm, validación de esquema de Doctrine, verificador de seguridad |
| `behat.yml` | Pruebas de extremo a extremo con Behat |