# Configuration

Chamilo 2.0 utilise des variables d'environnement et des fichiers de configuration Symfony pour ses paramètres principaux. Cette page couvre les fichiers de configuration clés et les variables associées.

## Variables d'Environnement (.env)

Le fichier de configuration principal est `.env`, situé dans le répertoire racine de Chamilo. Ce fichier contient des paramètres spécifiques à l'environnement qui ne doivent pas être inclus dans le contrôle de version.

Un fichier par défaut `.env.dist` est fourni avec Chamilo et contient des valeurs par défaut documentées. Créez un fichier `.env` (requis pour démarrer l'installation) afin de surcharger les valeurs pour votre environnement.

### Variables Clés

| Variable | Description | Exemple |
|----------|-------------|---------|
| `APP_ENV` | L'environnement de l'application, au niveau de Symfony. Utilisez `prod` pour la production, `dev` pour le développement, `test` pour les tests. | `prod` |
| `APP_SECRET` | Une chaîne aléatoire utilisée pour les jetons CSRF, la signature des cookies et d'autres opérations cryptographiques. Chamilo génère une valeur unique pour chaque installation. Ne la modifiez pas. | `a1b2c3d4e5f6...` |
| `DATABASE_HOST` | L'hôte de la base de données. Par défaut, localhost. | `localhost` |
| `DATABASE_PORT` | Le port de la base de données. Par défaut, 3306 pour MySQL/MariaDB. | `3306` |
| `DATABASE_NAME` | Le nom de la base de données, tel que fourni par vous à l'assistant d'installation. | Voir ci-dessous. |
| `DATABASE_USER` | Le nom d'utilisateur de la base de données, tel que fourni par vous à l'assistant d'installation. | Voir ci-dessous. |
| `DATABASE_PASSWORD` | Le mot de passe de l'utilisateur de la base de données, tel que fourni par vous à l'assistant d'installation. | Voir ci-dessous. |
| `TRUSTED_PROXIES` | (Optionnel) Si vous hébergez Chamilo derrière un proxy inverse, vous devez fournir ici l'adresse IP ou les adresses IP du proxy inverse pour que Chamilo puisse interpréter correctement les appels et générer des réponses adaptées. | |

D'autres paramètres dans `.env` sont relativement rarement modifiés.

Notez que, dans les versions futures, les paramètres `DATABASE_*` seront combinés en une seule variable `DATABASE_URL`.

La configuration de l'envoi d'e-mails est présentée lors de l'installation, mais peut être modifiée ultérieurement dans la section `Paramètres de la plateforme` du tableau de bord d'administration.

## Configuration Symfony (Répertoire config/)

La configuration au niveau de Symfony se trouve dans le répertoire `config/`. Ces fichiers YAML contrôlent le comportement du framework, les définitions de services et les paramètres spécifiques aux packages.

Il est rare de devoir modifier ces fichiers, et les changer peut rendre votre portail inopérant. Veuillez donc ne pas tenter de les modifier si vous devez garantir la disponibilité du système.

### Fichiers de Configuration Clés

| Fichier | Objectif |
|------|---------|
| `config/authentication.yaml` | Configuration des méthodes d'authentification. |
| `config/packages/doctrine.yaml` | Configuration de la base de données et de l'ORM. |
| `config/packages/security.yaml` | Authentification, pare-feu, contrôle d'accès et hiérarchies de rôles. |
| `config/packages/cache.yaml` | Configuration de l'adaptateur de cache (système de fichiers, APCu, Redis). |
| `config/packages/framework.yaml` | Paramètres généraux du framework Symfony (session, CSRF, routeur, mise en cache HTTP). |
| `config/packages/twig.yaml` | Configuration du moteur de templates. |
| `config/services.yaml` | Définitions des services de l'application et injection de dépendances. |

### Surcharges Spécifiques à l'Environnement

Symfony prend en charge la configuration par environnement. Les fichiers dans `config/packages/prod/` surchargent les valeurs par défaut lorsque `APP_ENV=prod`, et `config/packages/dev/` surchargent lorsque `APP_ENV=dev`.

Par exemple, `config/packages/prod/monolog.yaml` configure généralement un journalisation moins verbeuse que l'équivalent en mode développement.

Chamilo ne définit aucune configuration dans `config/packages/prod/` dans le logiciel lui-même. Si vous souhaitez personnaliser les paramètres de `config/packages/*.yaml`, créez simplement une copie du fichier YAML dans ce répertoire et modifiez les paramètres à cet endroit.

## Permissions des Fichiers

Nous avons fait des efforts dans la version 2.0+ pour garantir qu'un seul répertoire nécessite des permissions. Il s'agit du répertoire `var/`, et pour éviter des problèmes complexes, il suffit de rendre l'ensemble du dossier accessible en écriture par l'utilisateur système du serveur web.

Définissez les permissions appropriées sous les systèmes basés sur Debian :

```bash
# Pour les systèmes où le serveur web fonctionne sous www-data
chown -R www-data:www-data var/
chmod -R 775 var/
```

## Tâches de Configuration Courantes

### Passer en Mode Production

```bash
# Dans .env
APP_ENV=prod
APP_DEBUG=0
```

Ensuite, videz et préchauffez le cache :

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

### Configurer les Proxies de Confiance

Si Chamilo fonctionne derrière un proxy inverse ou un équilibreur de charge, configurez les proxies de confiance pour que la détection HTTPS et la résolution de l'IP client fonctionnent correctement :

```yaml
# .env
TRUSTED_PROXIES='127.0.0.1,PROXY_IP'
```

### Configurer le Stockage des Sessions

Par défaut, les sessions sont stockées sur le système de fichiers. Pour les déploiements multi-serveurs, configurez des sessions basées sur Redis ou une base de données :

```yaml
# config/packages/framework.yaml
framework:
    session:
        handler_id: 'redis://localhost:6379'
```

## Conseils

* **Ne modifiez jamais `.env.dist` directement** -- Utilisez toujours `.env` pour vos surcharges. Le fichier `.env.dist` peut être écrasé lors des mises à jour.
* **Maintenez `APP_DEBUG=0` en production** -- Le mode débogage expose des informations sensibles dans les pages d'erreur.
* **Sauvegardez `.env`** séparément du code source, car il contient des identifiants et est exclu du contrôle de version.