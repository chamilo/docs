# Configuration de l’environnement de développement

## Prérequis

* PHP 8.3, 8.4 ou 8.5 avec les extensions : intl, gd, curl, zip, mbstring, xml, json, pdo, ldap, exif, bcmath
* Composer
* Node.js et npm (ou Yarn — le projet utilise Yarn 4 ; voir `package.json` pour la version exacte figée)
* MySQL 5.7+ ou MariaDB 10.11+
* Git

## Étapes d’installation

### 1. Cloner le dépôt

```bash
git clone https://github.com/chamilo/chamilo-lms.git chamilo
cd chamilo
```

### 2. Installer les dépendances PHP

```bash
composer install
```

### 3. Configurer l’environnement

Le dépôt fournit `.env.dist` à titre de référence. Créez un fichier `.env` vide que l’installateur web remplira — le laisser vide garantit que les mises à niveau n’écrasent jamais votre configuration locale :

```bash
touch .env
```

Rendez ensuite `.env` et `config/` accessibles en écriture par le serveur web afin que l’installateur puisse écrire votre configuration locale :

```bash
sudo chown -R www-data: .env config/ var/
```

### 4. Installer les dépendances frontend et compiler

```bash
# Install JavaScript dependencies
yarn install

# Build frontend assets for development
yarn encore dev

# Or watch for changes during development
yarn encore dev --watch
```

### 5. Démarrer le serveur de développement

```bash
symfony server:start
```

Ou utilisez Apache/Nginx en pointant vers le répertoire `public/`.

### 6. Configurer la base de données

Lancez l’assistant d’installation web en ouvrant l’URL de votre Chamilo dans un navigateur.

### 7. Générer les clés JWT

```bash
php bin/console lexik:jwt:generate-keypair
```

### 8. Sécuriser votre système

Le fichier `.env` et le répertoire `config/` n’ont besoin d’être accessibles en écriture que le temps de l’installation. Sécurisez-les ensuite :

```bash
sudo chown -R root: .env config/
```

Le répertoire `var/` doit rester accessible en écriture par le serveur web.


## Commandes de compilation

| Commande | Objectif |
|---------|---------|
| `yarn encore dev` | Compiler le frontend pour le développement |
| `yarn encore dev --watch` | Compiler et surveiller les modifications |
| `yarn encore production` | Compiler de façon optimisée pour la production |
| `php bin/console cache:clear` | Vider le cache Symfony |

## Conseils de développement

* Définissez `APP_ENV=dev` et `APP_DEBUG=1` dans `.env` pour des messages d’erreur détaillés
* La barre d’outils de débogage Symfony apparaît en bas des pages en mode développement
* La documentation de l’API est disponible à `/api` lorsque `APP_ENABLE_API_ENTRYPOINT=true` (après un vidage du cache — voir [Configuration](../../admin-guide/installation/configuration.md#enable-the-api-documentation))
* Utilisez `yarn encore dev --watch` pour reconstruire automatiquement les modifications du frontend