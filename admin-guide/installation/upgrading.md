# Mise à niveau

Note : Sur cette page, nous utilisons 3.0.0 comme numéro de version strict et 3.x pour identifier toutes les versions commençant par le chiffre 3 (3.0.0, 3.0.1, 3.1.0, etc.). La même convention s’applique à 2.x.

Le processus de mise à niveau depuis 1.11.x est également décrit dans votre fichier `public/documentation/installation_guide.html`, à l’intérieur du code de Chamilo.
Les informations présentées ici sont largement redondantes. Vous pouvez les consulter en ligne à l’adresse `https://campus.chamilo.net/documentation/installation_guide.html`.

**Mettez à niveau vers 3.0, et non vers 2.x.** La version 3.0 est la version actuelle, et certains paramètres de 1.11.x n’avaient pas encore d’équivalent dans 2.0.0. Un système 1.11.x passe donc directement à 3.0. Nous avons testé de manière approfondie des migrations similaires, mais chaque plateforme a son propre historique : essayez d’abord sur un environnement de test, et envisagez d’être accompagné professionnellement par les [fournisseurs officiels Chamilo](https://chamilo.org/providers) dans cette démarche.

## Mise à niveau de 1.11.x vers 3.0

La mise à niveau de Chamilo 1.11.x vers 3.0 est une **migration majeure**, et non une simple mise à jour. Chamilo 2.0 a été reconstruit sur le framework Symfony avec un schéma de base de données restructuré, une nouvelle API et une organisation des fichiers différente, et 3.0 poursuit cette lignée. Planifiez cette migration avec soin et testez-la sur un environnement de test avant de la déployer en production.

### Avant de commencer

1. **Lisez les notes de version** de Chamilo 3.x pour comprendre ce qui a changé, ce qui est nouveau, et quelles fonctionnalités de 1.11.x peuvent ne pas encore être disponibles.
2. **Sauvegardez tout** :
   - Un dump complet de la base de données (`mysqldump` ou équivalent).
   - Tous les fichiers du répertoire d’installation de Chamilo 1.11.x, en particulier `app/upload/`, `app/courses/` et `main/`.
   - Votre fichier `configuration.php`.
3. **Testez d’abord sur un serveur de préproduction.** Ne lancez jamais la migration directement sur votre serveur de production.
4. **Vérifiez les prérequis serveur.** Chamilo 3.x a des prérequis différents de 1.11.x (notamment PHP 8.3 ou ultérieur — l’installateur refuse toute version plus ancienne). Voir [Prérequis serveur](server-requirements.md).
5. **Supprimez la table `version` de la base de données 1.11.x.** Cette étape est obligatoire. Chamilo 2.x et versions ultérieures stockent l’historique des migrations Doctrine dans une table de ce nom, avec d’autres colonnes. Si vous laissez la table 1.11.x en place, la mise à niveau s’arrête immédiatement. Cette table n’est pas nécessaire au fonctionnement de Chamilo 1.11.x.
6. **Décompressez le nouveau code dans un nouveau répertoire.** Les fichiers 1.11.x restent où ils sont. L’installateur les lit comme source de vos cours et téléversements, et écrit le résultat dans la nouvelle arborescence.

### Exécution de la mise à niveau

Vous pouvez exécuter la mise à niveau via l’assistant web ou via la ligne de commande.

#### Assistant web

1. Pointez le `DocumentRoot` de votre hôte virtuel vers le sous-répertoire `public/` de la nouvelle arborescence.
2. Ouvrez votre URL. L’assistant démarre, car la nouvelle arborescence n’a pas encore de fichier `.env`.
3. À l’étape 2, sélectionnez l’option de mise à niveau et indiquez le chemin racine de votre installation 1.11.x.
4. Suivez l’assistant jusqu’à la fin.

#### Ligne de commande

Définissez `UPDATE_PATH` sur la racine de votre installation 1.11.x, puis exécutez les migrations :

```bash
UPDATE_PATH=/path/to/chamilo-1.11 php bin/console doctrine:migrations:migrate --no-interaction
```

Augmentez d’abord `memory_limit` et `max_execution_time`. La migration lit chaque fichier de cours, elle a donc besoin de bien plus que les valeurs par défaut.

#### Durée

La durée dépend de la taille de votre base de données et de vos fichiers de cours. À titre de référence, une plateforme 1.11.28 avec 238 tables, 11 cours, 63 utilisateurs et 1489 fichiers de cours a pris **6 minutes** et 1,7 Go de mémoire, et a exécuté 393 migrations. Une grande plateforme de production prend des heures. Prévoyez une fenêtre de maintenance, et consultez le [forum Chamilo](https://chamilo.org) ou contactez un [fournisseur officiel](https://chamilo.org/providers) avant de l’exécuter en production.

### Éléments pouvant nécessiter une attention manuelle

| Domaine | Remarques |
|------|-------|
| **Plugins personnalisés** | Les plugins 1.11.x ne fonctionnent pas en 2.x ni en 3.x. Ils doivent être réécrits ou remplacés. Les plugins officiels ont été portés progressivement depuis 2.0 — consultez la liste des plugins de votre version pour voir lesquels sont disponibles. |
| **Thèmes personnalisés** | Les thèmes 1.11.x ne fonctionnent pas en 2.x ni en 3.x. Recréez votre identité visuelle avec le système de thèmes 3.x. |
| **Modifications personnalisées de la base de données** | Toute modification directe de la base de données en dehors de Chamilo peut ne pas être migrée. |
| **Paquets SCORM** | Le contenu SCORM devrait migrer, mais testez les paquets individuellement pour vérifier la lecture. |
| **Intégrations externes** | Toute intégration utilisant l’API ou les services web 1.11.x doit être mise à jour pour utiliser l’API exclusivement REST de 2.x via [API Platform](https://github.com/api-platform/api-platform). |

## Mise à niveau de 2.x vers 3.0

Cette mise à niveau conserve votre répertoire existant et votre base de données existante. Vous copiez le nouveau code par-dessus l’ancienne arborescence, puis vous exécutez les migrations, soit via l’assistant web, soit via la ligne de commande.

### Amorcer d’abord l’historique des migrations

Chamilo installe le schéma de base de données directement à partir des définitions d’entités, de sorte qu’une installation créée par l’installateur possède le schéma final mais un **historique de migrations vide**. Les installations créées avant Chamilo 3.0 n’ont jamais reçu cet historique. Deux éléments en dépendent :

* `doctrine:migrations:migrate` décide de ce qu’il faut exécuter à partir de cet historique. Avec un historique vide, il tente de rejouer toutes les migrations depuis le début sur un schéma déjà à jour.
* L’installateur web s’en sert pour décider si une mise à niveau est en attente. Avec un historique vide, il refuse la requête, car rien ne prouve qu’une mise à niveau est due.

Amorcez-le donc une seule fois, et respectez l’ordre ci-dessous.

> **Avertissement : amorcer l’historique avant de copier le nouveau code.** Les commandes marquent comme déjà exécutée chaque migration que le code **déployé** transporte. Si vous les exécutez après avoir copié le code 3.0, elles marquent aussi les migrations 3.0, et votre mise à niveau ne s’exécute jamais.

Avec votre version actuelle encore en place, exécutez :

```bash
php bin/console doctrine:migrations:sync-metadata-storage --no-interaction
php bin/console doctrine:migrations:version --add --all --no-interaction
```

La première commande crée la table d’historique. La seconde marque les migrations de votre version actuelle. `doctrine:migrations:version` échoue à elle seule si la table n’existe pas encore, ne sautez donc pas la première.

Vérifiez le résultat :

```bash
php bin/console doctrine:migrations:status
```

`Executed` doit être égal à `Available`, et `New` doit valoir 0. Copiez maintenant le code 3.0.

### Exécuter la mise à niveau

Copiez le nouveau code, puis ouvrez votre URL et suivez l’assistant, ou exécutez les migrations en ligne de commande :

```bash
php bin/console doctrine:migrations:migrate --no-interaction
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

L’assistant web ne s’ouvre que tant que des migrations sont en attente. Une fois la mise à niveau terminée, il répond à nouveau `409 Conflict`, ce qui le protège : l’assistant n’a pas de connexion propre.

## Mise à jour de Chamilo 3.0.x

Les mises à jour mineures au sein de la branche 3.0 sont plus simples.

### Processus de mise à jour

#### À l’aide d’un paquet

1. **Sauvegardez** la base de données et les fichiers.

2. **Téléchargez la dernière version 3.0.x** depuis [chamilo.org](https://chamilo.org/download) :

3. **Décompressez localement**

Par exemple (adaptez à la version téléchargée)
   ```bash
   unzip chamilo-3.0.1.zip
   ```

4. **Copiez les fichiers par-dessus votre installation Chamilo existante**
   ```bash
   cp -r chamilo/* [your-chamilo-installation-path]/
   cp -r chamilo/.* [your-chamilo-installation-path]/
   ```

5. **Exécutez les migrations de base de données :**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **Videz le cache :**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **Modifiez les permissions**

Adaptez à l’utilisateur de votre serveur web :
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **Vérifiez** que la plateforme se charge correctement et contrôlez par sondage les fonctionnalités clés.

#### À l’aide de Git

Si vous avez installé Chamilo avec Git, vous pouvez suivre ces instructions à la place.

1. **Sauvegardez** la base de données et les fichiers.

2. **Récupérez le dernier code** (ou téléchargez la nouvelle version) :
   ```bash
   git pull origin 3.0
   ```

3. **Mettez à jour les dépendances PHP :**
   ```bash
   composer install --no-dev --optimize-autoloader
   ```

4. **Mettez à jour les dépendances JavaScript et reconstruisez les assets :**
   ```bash
   yarn install && yarn build
   ```

5. **Exécutez les migrations de base de données :**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **Videz le cache :**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **Modifiez les permissions**

Adaptez à l’utilisateur de votre serveur web :
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **Vérifiez** que la plateforme se charge correctement et contrôlez par sondage les fonctionnalités clés.

### Automatiser les mises à jour

Pour les organisations qui gèrent plusieurs instances Chamilo, envisagez de scripter le processus de mise à jour :

```bash
#!/bin/bash
set -e

# Pull code
git pull origin 3.0

# Dependencies
composer install --no-dev --optimize-autoloader
yarn install && yarn build

# Database
php bin/console doctrine:migrations:migrate --no-interaction

# Cache
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod

echo "Update complete."
```

## Conseils

* **Effectuez toujours une sauvegarde avant de mettre à niveau.** Les migrations de base de données ne sont pas réversibles via l’interface de Chamilo.
* **Testez d’abord sur un environnement de préproduction** -- en particulier pour la migration de 1.11.x vers 3.0, qui implique une transformation importante des données.
* **Planifiez les mises à niveau pendant des fenêtres de maintenance** lorsque les utilisateurs n’utilisent pas activement la plateforme.
* **Abonnez-vous aux versions GitHub** sur [Github](https://github.com/chamilo/chamilo-lms/releases) à l’aide de l’icône en forme de cloche pour être informé des nouvelles versions et des correctifs de sécurité.
* **Si l’assistant répond `Chamilo is already installed`**, il n’a trouvé aucune migration en attente. Exécutez `php bin/console doctrine:migrations:status` pour vérifier. Si `Executed` vaut 0 sur une plateforme qui fonctionne, l’historique des migrations n’a jamais été initialisé — voir [Initialiser d’abord l’historique des migrations](#seed-the-migration-history-first).
* **Le téléchargement automatique des nouvelles versions** n’est pas encore proposé dans Chamilo 3.0, mais il s’agit d’un projet en cours que nous espérons publier prochainement. La mise à niveau elle-même s’exécute déjà depuis l’assistant web.