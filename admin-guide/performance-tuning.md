# Optimisation des performances

Les paramètres de performance aident à optimiser Chamilo pour des chargements de pages plus rapides et une meilleure utilisation des ressources, en particulier sur les plateformes avec de nombreux utilisateurs simultanés.

> **Référence complémentaire** : Votre installation Chamilo inclut un guide d’optimisation étendu. Ouvrez `/documentation/optimization.html` dans un navigateur (par ex. `https://your-chamilo-site/documentation/optimization.html`) pour des recommandations au niveau serveur spécifiques à votre version.

## Cache Symfony

Chamilo 3.0 est construit sur Symfony, qui utilise un cache compilé pour le routage, l’injection de dépendances et les templates. La gestion de ce cache est essentielle pour les performances.

### Vider le cache

Après des modifications de configuration, un déploiement ou des mises à niveau, videz le cache Symfony :

```bash
# Clear cache for the current environment
php bin/console cache:clear

# For production environments specifically
php bin/console cache:clear --env=prod
```

En production, assurez-vous toujours que `APP_ENV=prod` est défini dans votre fichier `.env.local`. L’environnement de développement (`APP_ENV=dev`) inclut une surcharge importante de débogage et ne doit jamais être utilisé en production.

### Préchauffage du cache

Après avoir vidé le cache, préchauffez-le pour précompiler les templates et la configuration :

```bash
php bin/console cache:warmup --env=prod
```

## Stratégies de cache

| Strategy | Description |
|----------|-------------|
| **OPcache** | Cache d’opcodes intégré de PHP. Assurez-vous qu’il est activé dans votre `php.ini` avec une mémoire suffisante (`opcache.memory_consumption=256`). Il s’agit de l’optimisation de performance la plus impactante. |
| **APCu** | Cache clé-valeur en mémoire utilisé par Symfony pour stocker les métadonnées. Installez l’extension PHP APCu et configurez-la dans la configuration de cache Symfony. |
| **Redis / Memcached** | Pour les plateformes à fort trafic, configurez un backend de cache externe. Définissez l’adaptateur de cache dans `config/packages/cache.yaml`. |

### Paramètres OPcache recommandés

```ini
opcache.enable=1
opcache.memory_consumption=256
opcache.max_accelerated_files=20000
opcache.validate_timestamps=0   ; Set to 0 in production for best performance
opcache.revalidate_freq=0
```

Lorsque `validate_timestamps` est défini à 0, vous devez vider OPcache après le déploiement de nouveau code (redémarrer PHP-FPM ou appeler `opcache_reset()`).

## Chargement différé

| Setting | Description |
|---------|-------------|
| **Lazy-load images** | Active l’attribut `loading="lazy"` sur les images afin que les images hors écran ne se chargent que lorsqu’elles défilent dans la vue. Réduit le temps de chargement initial de la page. |
| **Deferred JavaScript loading** | Charge les fichiers JavaScript non critiques de manière asynchrone pour éviter de bloquer le rendu de la page. |

## CDN (Content Delivery Network)

Pour les plateformes servant des utilisateurs dans plusieurs régions géographiques, un CDN peut améliorer significativement les temps de chargement des ressources statiques (CSS, JavaScript, images).

Pour configurer un CDN :

1. Mettez en place une distribution CDN (par ex. CloudFront, Cloudflare ou un autre fournisseur) pointant vers votre serveur Chamilo.
2. Configurez l’URL de base des assets dans votre environnement ou la configuration Symfony afin que les ressources statiques soient servies via le CDN.
3. Définissez des en-têtes de cache appropriés pour les fichiers statiques (expiration longue pour les assets versionnés).

## Optimisation de la base de données

| Action | Description |
|--------|-------------|
| **Use database connection pooling** | Pour les plateformes à forte concurrence, configurez le pooling de connexions afin de réduire le coût d’établissement des connexions à la base de données. |
| **Optimize queries** | Chamilo inclut des index de base de données pour les requêtes courantes. Exécutez `ANALYZE TABLE` périodiquement sur MySQL/MariaDB pour maintenir à jour les statistiques du planificateur de requêtes. |
| **Separate database server** | Pour les grandes installations, exécutez la base de données sur un serveur dédié plutôt que de partager les ressources avec le serveur web. |

## Configuration du serveur web

| Optimization | Description |
|--------------|-------------|
| **Enable gzip/brotli compression** | Compressez les réponses HTML, CSS et JavaScript. La plupart des serveurs web le prennent en charge nativement. |
| **Static file caching** | Définissez de longs en-têtes `Cache-Control` et `Expires` pour les ressources statiques. |
| **PHP-FPM tuning** | Ajustez `pm.max_children`, `pm.start_servers` et `pm.max_requests` en fonction de la RAM disponible et de la concurrence attendue. |
| **HTTP/2** | Activez HTTP/2 dans votre serveur web pour des connexions multiplexées et la compression des en-têtes. |

## Conseils

* **OPcache est le gain le plus important** -- Assurez-vous qu’il est activé et correctement dimensionné avant d’envisager d’autres optimisations.
* **Ne jamais exécuter la production avec `APP_ENV=dev`** -- La barre de débogage et le profiler ajoutent une surcharge importante à chaque requête.
* **Surveiller avant d’optimiser** -- Utilisez des outils comme New Relic, Blackfire ou le profiler intégré de Symfony (en mode dev) pour identifier les goulets d’étranglement réels plutôt que de deviner.
* **Préchauffez le cache après chaque déploiement** afin d’éviter que le premier utilisateur ne rencontre une requête lente non mise en cache.