# Tests

## Tests PHP

Chamilo utilise **PHPUnit** pour les tests backend.

### Configuration de la base de données de test

Les tests nécessitent une base de données dédiée. Créez un fichier `.env.test.local` avec les identifiants de votre base de données de test :

```ini
DATABASE_HOST='127.0.0.1'
DATABASE_PORT='3306'
DATABASE_NAME='chamilo_test'
DATABASE_USER='root'
DATABASE_PASSWORD='root'
```

Ensuite, initialisez la base de données de test :

```bash
php bin/console --env=test cache:clear
php bin/console --env=test doctrine:database:create
php bin/console --env=test doctrine:schema:create
php bin/console --env=test doctrine:fixtures:load --no-interaction
```

Pour réinitialiser après des modifications du schéma :

```bash
php bin/console --env=test doctrine:schema:update --force --complete
```

### Exécution des tests

```bash
# Exécuter tous les tests
php bin/phpunit

# Exécuter un fichier de test spécifique
php bin/phpunit tests/CoreBundle/Repository/UserRepositoryTest.php

# Exécuter les tests avec un rapport de couverture HTML
php bin/phpunit --coverage-html var/coverage
```

### Emplacement des tests

Les tests se trouvent dans le répertoire `tests/` :

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
├── behat/               # Tests de bout en bout Behat
├── fixtures/            # Fichiers de fixtures Alice
├── AbstractApiTest.php  # Classe de base pour les tests API
└── ChamiloTestTrait.php # Assistants de test partagés
```

### Types de tests

* **Tests unitaires/intégration** — Tests PHPUnit dans `CoreBundle/` et `CourseBundle/` ; la plupart accèdent à une véritable base de données (via `dama/doctrine-test-bundle`)
* **Tests fonctionnels (API)** — Étendent `AbstractApiTest` et testent les points de terminaison HTTP de bout en bout
* **Tests Behat** — Tests d'acceptation au niveau du navigateur dans `tests/behat/features/` (voir ci-dessous)

## Tests Behat (de bout en bout)

Chamilo dispose d'une suite de tests Behat pour les tests d'acceptation au niveau du navigateur. Cela nécessite une instance de Chamilo en cours d'exécution, Chrome et ChromeDriver.

```bash
# Depuis le répertoire tests/behat/ :
../../vendor/behat/behat/bin/behat features/actionInstall.feature
../../vendor/behat/behat/bin/behat features/createUser.feature
../../vendor/behat/behat/bin/behat features/createCourse.feature

# Ou exécuter toutes les fonctionnalités :
../../vendor/behat/behat/bin/behat
```

Configurez l'URL de base dans `tests/behat/behat.yml` avant de lancer les tests.

## Vérifications Frontend

```bash
# Vérifier JavaScript/Vue (ESLint avec Prettier)
yarn eslint assets/vue/

# Vérifier les types TypeScript
yarn tsc --noEmit

# Construire les ressources de production (vérifie que l'ensemble de la compilation fonctionne)
yarn build
```

## Qualité du code PHP

Chamilo utilise **ECS** (Easy Coding Standard), **PHPStan** et **Psalm** pour la qualité du code. Des raccourcis Composer sont disponibles pour chacun :

```bash
# Vérifier le style de code (ECS — Easy Coding Standard)
composer phpcs
# ou directement :
vendor/bin/ecs check

# Corriger automatiquement les violations de style de code
composer phpcs-fix
# ou directement :
vendor/bin/ecs check --fix

# Analyse statique avec PHPStan (niveau 5, scanne src/ et tests/)
composer phpstan
# ou directement :
vendor/bin/phpstan analyse

# Analyse statique avec Psalm
composer psalm
# ou directement :
vendor/bin/psalm --show-info=false
```

Remarque : il n'y a pas de `php-cs-fixer` dans ce projet. ECS (`symplify/easy-coding-standard`) est l'outil de style de code.

## Intégration Continue

Les pull requests sont automatiquement vérifiées par quatre workflows GitHub Actions :

| Workflow | Ce qu'il exécute |
|----------|------------------|
| `phpunit.yml` | Suite de tests PHPUnit |
| `format_code.yml` | Vérification du style de code ECS |
| `php_analysis.yml` | Psalm, validation du schéma Doctrine, vérificateur de sécurité |
| `behat.yml` | Tests de bout en bout Behat |