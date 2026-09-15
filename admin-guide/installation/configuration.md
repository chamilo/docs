# Configuration

Chamilo 3.0 utilise des variables d’environnement et des fichiers de configuration Symfony pour ses paramètres principaux. Cette page décrit les fichiers et variables de configuration essentiels.

## Variables d’environnement (.env)

Le fichier de configuration principal est `.env`, situé à la racine de Chamilo. Ce fichier contient des paramètres spécifiques à l’environnement qui ne doivent pas être versionnés.

Un fichier `.env.dist` par défaut est fourni avec Chamilo et contient des valeurs par défaut documentées. Créez `.env` (nécessaire pour lancer l’installation) afin de surcharger les valeurs pour votre environnement.

### Variables clés

| Variable | Description | Exemple |
|----------|-------------|---------|
| `APP_ENV` | L’environnement de l’application, au niveau Symfony. Utilisez `prod` pour la production, `dev` pour le développement, 'test' pour les tests. | `prod` |
| `APP_SECRET` | Une chaîne aléatoire utilisée pour les jetons CSRF, la signature des cookies et d’autres opérations cryptographiques. Chamilo génère une valeur unique pour chaque installation. Ne la modifiez pas. | `a1b2c3d4e5f6...` |
| `DATABASE_HOST` | L’hôte de la base de données. Par défaut : localhost | `localhost` |
| `DATABASE_PORT` | Le port de la base de données. Par défaut : 3306 pour MySQL/MariaDB | `3306` |
| `DATABASE_NAME` | Le nom de la base de données, tel que saisi dans l’assistant d’installation. | Voir ci-dessous. |
| `DATABASE_USER` | Le nom d’utilisateur de la base de données, tel que saisi dans l’assistant d’installation. | Voir ci-dessous. |
| `DATABASE_PASSWORD` | Le mot de passe de l’utilisateur de la base de données, tel que saisi dans l’assistant d’installation. | Voir ci-dessous. |
| `TRUSTED_PROXIES` | (Facultatif) Si vous hébergez Chamilo derrière un reverse proxy, vous devez indiquer ici la ou les adresses IP du reverse proxy afin que Chamilo puisse interpréter les appels et générer les réponses correctement. | |
| `APP_ENABLE_API_ENTRYPOINT` | (Facultatif) Expose la documentation interactive de l’API (Swagger/OpenAPI) à l’adresse `/api`. Désactivé par défaut. Nécessite un vidage du cache pour prendre effet — voir [Activer la documentation de l’API](#enable-the-api-documentation) ci-dessous. | `true` |

Les autres paramètres de .env sont relativement rarement modifiés.

Notez que, dans les versions futures, les paramètres DATABASE_* seront regroupés en une seule variable `DATABASE_URL`.

La configuration de l’envoi des e-mails est présentée pendant l’installation, mais peut être modifiée ultérieurement dans la section `Paramètres de la plateforme` du tableau de bord d’administration.

## Configuration Symfony (répertoire config/)

La configuration au niveau Symfony se trouve dans le répertoire `config/`. Ces fichiers YAML contrôlent le comportement du framework, les définitions de services et les paramètres spécifiques aux paquets.

L’intégralité du répertoire `config/` est fournie avec chaque paquet Chamilo et chaque mise à jour — contrairement, par exemple, à `.env`, il n’est ni exclu ni préservé de façon particulière lors d’une mise à niveau. **Toute modification apportée directement à un fichier sous `config/` ou `config/packages/` sera silencieusement écrasée lors de la prochaine mise à jour de Chamilo.** Voir [Surcharges spécifiques à l’environnement](#environment-specific-overrides) ci-dessous pour la méthode prise en charge permettant de personnaliser la configuration sans perdre vos modifications.

Il n’est pas fréquent d’avoir à modifier ces fichiers, et les changer peut rendre votre portail inopérant ; veuillez donc ne pas tenter de les modifier si vous devez garantir la disponibilité du système.

### Fichiers de configuration clés

| Fichier | Objet |
|------|---------|
| `config/authentication.yaml` | Configuration des méthodes d’authentification. |
| `config/packages/doctrine.yaml` | Configuration de la base de données et de l’ORM. |
| `config/packages/security.yaml` | Authentification, pare-feu, contrôle d’accès et hiérarchies de rôles. |
| `config/packages/cache.yaml` | Configuration de l’adaptateur de cache (système de fichiers, APCu, Redis). |
| `config/packages/framework.yaml` | Paramètres généraux du framework Symfony (session, CSRF, routeur, cache HTTP). |
| `config/packages/twig.yaml` | Configuration du moteur de templates. |
| `config/services.yaml` | Définitions des services de l’application et injection de dépendances. |

### Surcharges spécifiques à l’environnement

Symfony prend en charge une configuration par environnement. Les fichiers dans `config/packages/prod/` surchargent les valeurs par défaut lorsque `APP_ENV=prod`, et `config/packages/dev/` surcharge lorsque `APP_ENV=dev`.

Par exemple, `config/packages/prod/monolog.yaml` configure généralement une journalisation moins verbeuse que l’équivalent de développement.

Chamilo ne définit aucune configuration dans `config/packages/prod/` dans le logiciel lui-même ; si vous souhaitez personnaliser un paramètre de `config/packages/*.yaml`, **n’éditez pas le fichier de base** — créez un fichier du même nom dans `config/packages/prod/` (ou `dev/`/`test/`, selon l’environnement que vous souhaitez affecter) contenant uniquement les clés à surcharger, et placez-y vos modifications.

Cela est important car les fichiers de base `config/packages/*.yaml` font partie du paquet Chamilo : chaque mise à jour les réinstalle et écrase ce qui s’y trouve, de sorte que les modifications faites directement dans ces fichiers ne survivent pas à une mise à niveau. Comme Chamilo ne livre jamais rien sous `config/packages/prod/` (ni `dev/`/`test/`), ce répertoire n’est pas écrasé par une mise à jour et constitue l’emplacement pris en charge pour conserver les personnalisations locales.

## Permissions des fichiers

Nous avons fait en sorte, à partir de la version 2.0+, qu’un seul répertoire nécessite des permissions, et cela reste vrai en 3.0. Il s’agit du répertoire `var/` ; pour éviter des problèmes complexes, il suffit de rendre l’ensemble du dossier inscriptible par l’utilisateur système du serveur web.

Définissez les permissions de manière appropriée sous les systèmes basés sur Debian :

```bash
# For systems where the web server runs as www-data
chown -R www-data:www-data var/
chmod -R 775 var/
```

## Tâches de configuration courantes

### Passer en mode production

```bash
# In .env
APP_ENV=prod
APP_DEBUG=0
```

Puis videz et préchauffez le cache :

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

### Activer la documentation de l’API

```bash
# In .env
APP_ENABLE_API_ENTRYPOINT=true
```

Puis videz le cache pour que le changement prenne effet :

```bash
php bin/console cache:clear
```

La documentation interactive de l’API (Swagger/OpenAPI) est alors disponible à `/api`. Modifier `.env` seul ne suffit pas : la valeur résolue est intégrée dans le cache compilé de Symfony, de sorte que `/api` continue de renvoyer son état précédent (activé ou non) jusqu’à ce que le cache soit vidé. L’action **Système > Nettoyer les fichiers temporaires** du panneau d’administration ne le fait *pas* — voir [Outils système](../system/system-tools.md#clean-temporary-files) pour en connaître la raison — cette modification précise nécessite donc un accès shell pour exécuter `cache:clear`.

### Configurer les proxys de confiance

Si Chamilo s’exécute derrière un reverse proxy ou un équilibreur de charge, configurez les proxys de confiance afin que la détection HTTPS et la résolution de l’adresse IP du client fonctionnent correctement :

```yaml
# .env
TRUSTED_PROXIES='127.0.0.1,PROXY_IP'
```

### Configurer le stockage des sessions

Par défaut, les sessions sont stockées sur le système de fichiers. Pour les déploiements multi-serveurs, configurez des sessions Redis ou basées sur la base de données :

```yaml
# config/packages/framework.yaml
framework:
    session:
        handler_id: 'redis://localhost:6379'
```

## Conseils

* **Ne jamais modifier `.env.dist` directement** -- Utilisez toujours `.env` pour vos surcharges. Le fichier `.env.dist` peut être écrasé lors des mises à niveau.
* **Conserver `APP_DEBUG=0` en production** -- Le mode débogage expose des informations sensibles dans les pages d’erreur.
* **Sauvegarder `.env`** séparément du code source, car il contient des identifiants et est exclu du contrôle de version.