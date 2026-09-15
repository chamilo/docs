# Stockage cloud

Chamilo 3.0 prend en charge des backends de stockage cloud pour les fichiers téléversés par les utilisateurs via **Flysystem**, une bibliothèque PHP d’abstraction du système de fichiers intégrée à Symfony. Cela vous permet de stocker les fichiers sur des services cloud à la place (ou en complément) du système de fichiers local.

## Pourquoi utiliser le stockage cloud ?

* **Scalabilité** -- Le stockage cloud s’adapte à la croissance de votre plateforme sans gestion de l’espace disque.
* **Déploiements multi-serveurs** -- Lorsque plusieurs serveurs web s’exécutent derrière un équilibreur de charge, le stockage cloud garantit que tous les serveurs accèdent aux mêmes fichiers.
* **Durabilité** -- Les fournisseurs cloud offrent une redondance et des sauvegardes intégrées.
* **Coût** -- Le stockage objet est souvent moins cher par gigaoctet que le stockage en blocs attaché aux serveurs.

## Fournisseurs pris en charge

| Fournisseur | Adaptateur Flysystem |
|----------|-------------------|
| **Amazon S3** | `league/flysystem-aws-s3-v3` |
| **Google Cloud Storage** | `league/flysystem-google-cloud-storage` |
| **Azure Blob Storage** | `azure-oss/storage-blob-flysystem` |
| **MinIO** (compatible S3) | Utilise l’adaptateur S3 avec un point de terminaison personnalisé |
| **DigitalOcean Spaces** (compatible S3) | Utilise l’adaptateur S3 avec un point de terminaison personnalisé |
| **Système de fichiers local** | Par défaut, aucun paquet supplémentaire n’est nécessaire |

## Installation

Chamilo est déjà livré avec les fournisseurs suivants préinstallés :

```bash
# Amazon S3
league/flysystem-aws-s3-v3

# Google Cloud Storage
league/flysystem-google-cloud-storage

# Azure Blob Storage
azure-oss/storage-blob-flysystem
```

## Configuration

Chamilo répartit ses fichiers sur plusieurs montages Flysystem — **assets**, **assets cache**, **resources**, **resources cache**, **themes** et **plugins**. Chaque montage peut cibler un bucket ou un conteneur différent. La configuration cloud dans `config/packages/oneup_flysystem.yaml` est sélectionnée par environnement à l’aide des conditions `when@` et lit les variables que vous définissez dans `.env`.

### Amazon S3

```bash
# .env — common credentials
AWS_S3_STORAGE_VERSION=latest
AWS_S3_STORAGE_REGION=eu-central-1
AWS_S3_STORAGE_ACCESS_KEY=your-access-key
AWS_S3_STORAGE_ACCESS_SECRET=your-secret-key

# Per-mount buckets (each mount can be a different bucket)
AWS_S3_STORAGE_ASSET_BUCKET=chamilo-assets
AWS_S3_STORAGE_ASSET_CACHE_BUCKET=chamilo-asset-cache
AWS_S3_STORAGE_RESOURCE_BUCKET=chamilo-resources
AWS_S3_STORAGE_RESOURCE_CACHE_BUCKET=chamilo-resource-cache
AWS_S3_STORAGE_THEMES_BUCKET=chamilo-themes
AWS_S3_STORAGE_PLUGINS_BUCKET=chamilo-plugins

# Optional path prefixes inside a bucket — useful to share buckets across portals
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
# Optional prefixes
AZURE_STORAGE_ASSET_PREFIX=optional/prefix
```

### Google Cloud Storage

Configurez GCS de la même manière que S3, en utilisant des variables d’environnement spécifiques à GCS et un bucket par montage. Consultez le fichier `oneup_flysystem.yaml` livré avec votre version pour les noms exacts des variables — ils sont également documentés dans `.env`.

### MinIO (compatible S3)

MinIO fonctionne via l’adaptateur S3 avec un point de terminaison personnalisé et un adressage de type chemin — définissez `AWS_S3_STORAGE_*` comme pour S3 et ajoutez le point de terminaison MinIO ainsi que les indicateurs d’adressage de type chemin pris en charge par le bundle.

### DigitalOcean Spaces (compatible S3)

DigitalOcean Spaces est un service hébergé distinct de MinIO — ce n’est pas MinIO sous-jacent, mais il expose la même API compatible S3, de sorte qu’il fonctionne également via l’adaptateur S3 : définissez `AWS_S3_STORAGE_*` comme pour S3, et pointez `AWS_S3_STORAGE_ENDPOINT` (ou la variable de point de terminaison équivalente du bundle) vers le point de terminaison régional de votre Space, par ex. `https://<region>.digitaloceanspaces.com`.

> L’ensemble complet des noms de variables est listé dans le fichier `.env.dist` livré avec Chamilo. Copiez uniquement les lignes correspondant au fournisseur que vous utilisez réellement dans votre `.env` et décommentez-les.

## Thèmes

Le montage **thèmes** se comporte différemment des autres : les thèmes livrés avec Chamilo (`chamilo`, `chamilo3`) font partie du code et se trouvent dans `var/themes`, qui est précisément le répertoire servi par l’adaptateur local par défaut. Lorsque vous pointez le montage des thèmes vers un conteneur cloud, ce conteneur est initialement vide : logos, couleurs et images de thème manquent, et l’interface s’affiche sans style.

Chargez les thèmes fournis vers le stockage configuré avec :

```bash
php bin/console chamilo:remote-storage:upload-themes
```

| Option | Effet |
|--------|--------|
| `--dry-run` | Indique ce qui serait chargé, sans rien écrire |
| `--overwrite` | Remplace les fichiers déjà présents sur le stockage distant |

Les fichiers déjà présents sur le système de fichiers des thèmes sont conservés sauf si `--overwrite` est fourni, de sorte qu’une nouvelle exécution de la commande ne supprime jamais les logos ou les thèmes de couleurs qu’un administrateur a chargés via **Administration > Configuration > Couleurs**. Lorsque le système de fichiers des thèmes est le répertoire local `var/themes`, la commande le détecte et ne fait rien : elle peut donc être exécutée en toute sécurité sur n’importe quelle installation.

Chamilo exécute cette commande de lui-même à la fin de l’assistant d’installation, puis à nouveau après une migration de base de données réussie lors d’une mise à niveau, afin que les nouveaux fichiers de thème atteignent le stockage cloud sans aucune étape manuelle.

Deux cas nécessitent encore une exécution manuelle :

* **Basculer une plateforme existante vers le stockage cloud**, puisqu’aucune installation ni mise à niveau n’a lieu à ce moment-là.
* **Actualiser les fichiers de thème modifiés dans une nouvelle version**, avec `--overwrite`. Les exécutions automatiques n’écrasent jamais, précisément pour ne pas rétablir un logo qu’un administrateur a chargé dans un thème fourni ; le prix à payer est qu’un `colors.css` ou un `tiny-settings.js` livré par la nouvelle version ne remplace pas la copie déjà présente dans le conteneur.

## Migration des fichiers existants

Si vous passez du stockage local au stockage cloud sur une plateforme existante, vous devez migrer les fichiers existants :

1. Configurez le nouvel adaptateur de stockage comme décrit ci-dessus.
2. Copiez les fichiers existants du répertoire local `var/upload/` vers votre compartiment de stockage cloud, en préservant la structure des répertoires.
3. Exécutez `php bin/console chamilo:remote-storage:upload-themes` pour charger les thèmes fournis, comme décrit ci-dessus.
4. Vérifiez que les fichiers sont accessibles via la plateforme après la migration.

## Permissions et accès

Veillez à ce que votre compartiment de stockage cloud **ne soit pas accessible publiquement**, sauf si vous avez explicitement besoin d’URL de fichiers publiques. Chamilo sert les fichiers via sa propre couche de contrôle d’accès : un accès public direct au compartiment est inutile et constitue un risque de sécurité.

Pour S3, utilisez une politique de compartiment qui restreint l’accès aux identifiants IAM configurés ci-dessus.

## Conseils

* **Testez avec MinIO en local** avant de déployer chez un fournisseur cloud — MinIO est un serveur gratuit, compatible S3, que vous pouvez exécuter sur votre propre machine.
* **DigitalOcean Spaces** est une alternative hébergée compatible S3 à Amazon S3, confirmée comme fonctionnant avec l’adaptateur S3 de Chamilo.
* **Utilisez un compartiment dédié** pour Chamilo plutôt que de partager un compartiment avec d’autres applications.
* **Mettez en place des politiques de cycle de vie** sur votre compartiment cloud pour maîtriser les coûts de stockage (par ex. déplacer les anciens fichiers vers des niveaux de stockage moins chers).