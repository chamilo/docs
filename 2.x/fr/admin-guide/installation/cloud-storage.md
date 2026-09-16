# Stockage Cloud

Chamilo 2.0 prend en charge les backends de stockage cloud pour les fichiers téléversés par les utilisateurs grâce à **Flysystem**, une bibliothèque d'abstraction de système de fichiers PHP intégrée à Symfony. Cela vous permet de stocker des fichiers sur des services cloud au lieu de (ou en complément de) le système de fichiers local.

## Pourquoi utiliser le stockage cloud ?

* **Évolutivité** -- Le stockage cloud s'adapte à la croissance de votre plateforme sans avoir à gérer l'espace disque.
* **Déploiements multi-serveurs** -- Lorsque plusieurs serveurs web fonctionnent derrière un équilibreur de charge, le stockage cloud garantit que tous les serveurs accèdent aux mêmes fichiers.
* **Durabilité** -- Les fournisseurs de cloud offrent une redondance et des sauvegardes intégrées.
* **Coût** -- Le stockage d'objets est souvent moins cher par gigaoctet que le stockage par blocs attaché aux serveurs.

## Fournisseurs pris en charge

| Fournisseur | Adaptateur Flysystem |
|-------------|----------------------|
| **Amazon S3** | `league/flysystem-aws-s3-v3` |
| **Google Cloud Storage** | `league/flysystem-google-cloud-storage` |
| **Azure Blob Storage** | `league/flysystem-azure-blob-storage` |
| **MinIO** (compatible S3) | Utilise l'adaptateur S3 avec un point de terminaison personnalisé |
| **Système de fichiers local** | Par défaut, aucun paquet supplémentaire nécessaire |

## Installation

Chamilo est déjà livré avec les fournisseurs suivants préinstallés :

```bash
# Amazon S3
league/flysystem-aws-s3-v3

# Google Cloud Storage
league/flysystem-google-cloud-storage

# Azure Blob Storage
league/flysystem-azure-blob-storage
```

## Configuration

Chamilo répartit ses fichiers sur plusieurs montages Flysystem — **assets**, **assets cache**, **resources**, **resources cache**, **themes** et **plugins**. Chaque montage peut cibler un bucket ou un conteneur différent. La configuration cloud dans `config/packages/oneup_flysystem.yaml` est sélectionnée par environnement à l'aide de conditions `when@` et lit les variables que vous définissez dans `.env`.

### Amazon S3

```bash
# .env — identifiants communs
AWS_S3_STORAGE_VERSION=latest
AWS_S3_STORAGE_REGION=eu-central-1
AWS_S3_STORAGE_ACCESS_KEY=your-access-key
AWS_S3_STORAGE_ACCESS_SECRET=your-secret-key

# Buckets par montage (chaque montage peut être un bucket différent)
AWS_S3_STORAGE_ASSET_BUCKET=chamilo-assets
AWS_S3_STORAGE_ASSET_CACHE_BUCKET=chamilo-asset-cache
AWS_S3_STORAGE_RESOURCE_BUCKET=chamilo-resources
AWS_S3_STORAGE_RESOURCE_CACHE_BUCKET=chamilo-resource-cache
AWS_S3_STORAGE_THEMES_BUCKET=chamilo-themes
AWS_S3_STORAGE_PLUGINS_BUCKET=chamilo-plugins

# Préfixes de chemin optionnels à l'intérieur d'un bucket — utile pour partager des buckets entre portails
AWS_S3_STORAGE_ASSET_PREFIX=portal1/assets
AWS_S3_STORAGE_RESOURCE_PREFIX=portal1/resources
```

### Azure Blob Storage

```bash
# .env
AZURE_STORAGE_CONNECTION_STRING='DefaultEndpointsProtocol=https;AccountName=...;AccountKey=...'
AZURE_STORAGE_ASSET_CONTAINER=asset-container
AZURE_STORAGE_ASSET_CACHE_CONTAINER=asset-cache-container
AZURE_STORAGE_RESOURCE_CONTAINER=resources-container
AZURE_STORAGE_RESOURCE_CACHE_CONTAINER=resources-cache-container
AZURE_STORAGE_THEMES_CONTAINER=themes-container
# Préfixes optionnels
AZURE_STORAGE_ASSET_PREFIX=optional/prefix
```

### Google Cloud Storage

Configurez GCS de la même manière que S3, en utilisant des variables d'environnement spécifiques à GCS et un bucket par montage. Référez-vous au fichier `oneup_flysystem.yaml` fourni avec votre version pour les noms exacts des variables — ils sont également documentés dans `.env`.

### MinIO (compatible S3)

MinIO fonctionne via l'adaptateur S3 avec un point de terminaison personnalisé et un adressage de style chemin — définissez `AWS_S3_STORAGE_*` comme pour S3 et ajoutez le point de terminaison MinIO ainsi que les indicateurs de style chemin pris en charge par le bundle.

> L'ensemble complet des noms de variables est répertorié dans le fichier `.env.dist` fourni avec Chamilo. Copiez uniquement les lignes correspondant au fournisseur que vous utilisez réellement dans votre fichier `.env` et décommentez-les.

## Migration des fichiers existants

Si vous passez d'un stockage local à un stockage cloud sur une plateforme existante, vous devez migrer les fichiers existants :

1. Configurez le nouvel adaptateur de stockage comme décrit ci-dessus.
2. Copiez les fichiers existants du répertoire local `var/upload/` vers votre bucket de stockage cloud, en préservant la structure des répertoires.
3. Vérifiez que les fichiers sont accessibles via la plateforme après la migration.

## Permissions et accès

Assurez-vous que votre bucket de stockage cloud n'est **pas accessible publiquement** sauf si vous avez explicitement besoin d'URL de fichiers publics. Chamilo sert les fichiers via sa propre couche de contrôle d'accès, donc un accès public direct au bucket est inutile et représente un risque de sécurité.

Pour S3, utilisez une politique de bucket qui restreint l'accès aux identifiants IAM configurés ci-dessus.

## Conseils

* **Testez avec MinIO localement** avant de déployer sur un fournisseur cloud -- MinIO est un serveur gratuit compatible S3 que vous pouvez exécuter sur votre propre machine.
* **Utilisez un bucket dédié** pour Chamilo plutôt que de partager un bucket avec d'autres applications.
* **Configurez des politiques de cycle de vie** sur votre bucket cloud pour gérer les coûts de stockage (par exemple, déplacer les anciens fichiers vers des niveaux de stockage moins coûteux).