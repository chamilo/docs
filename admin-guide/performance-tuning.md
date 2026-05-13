# Optimisation des Performances

Les paramètres de performance permettent d'optimiser Chamilo pour des temps de chargement des pages plus rapides et une meilleure utilisation des ressources, en particulier sur des plateformes avec de nombreux utilisateurs simultanés.

> **Référence supplémentaire** : Votre installation de Chamilo inclut un guide d'optimisation étendu. Ouvrez `/documentation/optimization.html` dans un navigateur (par exemple, `https://votre-site-chamilo/documentation/optimization.html`) pour des recommandations au niveau du serveur spécifiques à votre version.

## Cache Symfony

Chamilo 2.0 est construit sur Symfony, qui utilise un cache compilé pour le routage, l'injection de dépendances et les modèles. La gestion de ce cache est essentielle pour les performances.

### Vider le Cache

Après des modifications de configuration, un déploiement ou une mise à jour, videz le cache Symfony :

```bash
# Vider le cache pour l'environnement actuel
php bin/console cache:clear

# Pour les environnements de production spécifiquement
php bin/console cache:clear --env=prod
```

En production, assurez-vous toujours que `APP_ENV=prod` est défini dans votre fichier `.env.local`. L'environnement de développement (`APP_ENV=dev`) inclut des surcoûts importants liés au débogage et ne doit jamais être utilisé en production.

### Préchauffage du Cache

Après avoir vidé le cache, préchauffez-le pour pré-compiler les modèles et la configuration :

```bash
php bin/console cache:warmup --env=prod
```

## Stratégies de Mise en Cache

| Stratégie | Description |
|-----------|-------------|
| **OPcache** | Cache d'opcode intégré à PHP. Assurez-vous qu'il est activé dans votre `php.ini` avec une mémoire suffisante (`opcache.memory_consumption=256`). C'est l'optimisation de performance la plus impactante. |
| **APCu** | Un cache clé-valeur en mémoire utilisé par Symfony pour stocker des métadonnées. Installez l'extension PHP APCu et configurez-la dans la configuration du cache Symfony. |
| **Redis / Memcached** | Pour les plateformes à fort trafic, configurez un backend de cache externe. Définissez l'adaptateur de cache dans `config/packages/cache.yaml`. |

### Paramètres Recommandés pour OPcache

```ini
opcache.enable=1
opcache.memory_consumption=256
opcache.max_accelerated_files=20000
opcache.validate_timestamps=0   ; Définir à 0 en production pour de meilleures performances
opcache.revalidate_freq=0
```

Lorsque `validate_timestamps` est défini à 0, vous devez vider OPcache après le déploiement de nouveau code (redémarrez PHP-FPM ou appelez `opcache_reset()`).

## Chargement Différé

| Paramètre | Description |
|-----------|-------------|
| **Chargement différé des images** | Active l'attribut `loading="lazy"` sur les images afin que les images hors écran ne se chargent que lorsqu'elles entrent dans le champ de vision. Réduit le temps de chargement initial de la page. |
| **Chargement différé de JavaScript** | Charge les fichiers JavaScript non critiques de manière asynchrone pour éviter de bloquer le rendu de la page. |

## CDN (Réseau de Distribution de Contenu)

Pour les plateformes servant des utilisateurs dans plusieurs régions géographiques, un CDN peut considérablement améliorer les temps de chargement des ressources statiques (CSS, JavaScript, images).

Pour configurer un CDN :

1. Configurez une distribution CDN (par exemple, CloudFront, Cloudflare ou un autre fournisseur) pointant vers votre serveur Chamilo.
2. Configurez l'URL de base des ressources dans votre environnement ou la configuration Symfony afin que les ressources statiques soient servies via le CDN.
3. Définissez des en-têtes de cache appropriés pour les fichiers statiques (expiration longue pour les ressources versionnées).

## Optimisation de la Base de Données

| Action | Description |
|--------|-------------|
| **Utiliser le regroupement des connexions à la base de données** | Pour les plateformes à forte concurrence, configurez le regroupement des connexions pour réduire le surcoût lié à l'établissement des connexions à la base de données. |
| **Optimiser les requêtes** | Chamilo inclut des index de base de données pour les requêtes courantes. Exécutez périodiquement `ANALYZE TABLE` sur MySQL/MariaDB pour maintenir à jour les statistiques du planificateur de requêtes. |
| **Serveur de base de données séparé** | Pour les grandes installations, exécutez la base de données sur un serveur dédié plutôt que de partager les ressources avec le serveur web. |

## Configuration du Serveur Web

| Optimisation | Description |
|--------------|-------------|
| **Activer la compression gzip/brotli** | Compressez les réponses HTML, CSS et JavaScript. La plupart des serveurs web le prennent en charge nativement. |
| **Mise en cache des fichiers statiques** | Définissez des en-têtes `Cache-Control` et `Expires` longs pour les ressources statiques. |
| **Réglage de PHP-FPM** | Ajustez `pm.max_children`, `pm.start_servers` et `pm.max_requests` en fonction de la RAM disponible et de la concurrence attendue. |
| **HTTP/2** | Activez HTTP/2 sur votre serveur web pour des connexions multiplexées et la compression des en-têtes. |

## Conseils

* **OPcache est l'amélioration la plus significative** -- Assurez-vous qu'il est activé et correctement dimensionné avant de poursuivre d'autres optimisations.
* **Ne jamais exécuter la production avec `APP_ENV=dev`** -- La barre d'outils de débogage et le profileur ajoutent un surcoût important à chaque requête.
* **Surveillez avant d'optimiser** -- Utilisez des outils comme New Relic, Blackfire ou le profileur intégré de Symfony (en mode dev) pour identifier les véritables goulets d'étranglement plutôt que de deviner.
* **Préchauffez le cache après chaque déploiement** pour éviter que le premier utilisateur ne subisse une requête lente non mise en cache.