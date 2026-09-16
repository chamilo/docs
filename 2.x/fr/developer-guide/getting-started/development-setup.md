# Configuration pour le développement

## Prérequis

* PHP 8.2+ avec les extensions : intl, gd, curl, zip, mbstring, xml, json, pdo, ldap, exif, bcmath
* Composer
* Node.js et npm (ou Yarn — le projet utilise Yarn 4 ; consultez `package.json` pour la version exacte épinglée)
* MySQL 5.7+ ou MariaDB 10.11+
* Git

## Étapes d'installation

### 1. Cloner le dépôt

```bash
git clone https://github.com/chamilo/chamilo-lms.git chamilo
cd chamilo
```

### 2. Installer les dépendances PHP

```bash
composer install
```

### 3. Configurer l'environnement

Le dépôt fournit un fichier `.env.dist` comme référence. Créez un fichier `.env` vide que l'installateur web remplira — le garder vide garantit que les mises à jour n'écraseront jamais votre configuration locale :

```bash
touch .env
```

Ensuite, rendez `.env` et `config/` accessibles en écriture par le serveur web afin que l'installateur puisse écrire votre configuration locale :

```bash
sudo chown -R www-data: .env config/ var/
```

### 4. Installer les dépendances frontend et compiler

```bash
# Installer les dépendances JavaScript
yarn install

# Compiler les ressources frontend pour le développement
yarn encore dev

# Ou surveiller les modifications pendant le développement
yarn encore dev --watch
```

### 5. Démarrer le serveur de développement

```bash
symfony server:start
```

Ou utilisez Apache/Nginx en pointant vers le répertoire `public/`.

### 6. Configurer la base de données

Lancez l'assistant d'installation basé sur le web en accédant à l'URL de votre Chamilo dans un navigateur.

### 7. Générer les clés JWT

```bash
php bin/console lexik:jwt:generate-keypair
```

### 8. Sécuriser votre système

Le fichier `.env` et le répertoire `config/` doivent être accessibles en écriture uniquement pendant l'installation. Sécurisez-les ensuite :

```bash
sudo chown -R root: .env config/
```

Le répertoire `var/` doit rester accessible en écriture par le serveur web.

## Commandes de compilation

| Commande | Objectif |
|----------|----------|
| `yarn encore dev` | Compiler le frontend pour le développement |
| `yarn encore dev --watch` | Compiler et surveiller les modifications |
| `yarn encore production` | Compiler de manière optimisée pour la production |
| `php bin/console cache:clear` | Vider le cache Symfony |

## Conseils pour le développement

* Définissez `APP_ENV=dev` et `APP_DEBUG=1` dans `.env` pour obtenir des messages d'erreur détaillés
* La barre d'outils de débogage Symfony apparaît en bas des pages en mode développement
* La documentation de l'API est disponible à `/api` lorsque `APP_ENABLE_API_ENTRYPOINT=1`
* Utilisez `yarn encore dev --watch` pour reconstruire automatiquement les modifications du frontend