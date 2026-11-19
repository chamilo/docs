# Mise à niveau

Note : sur cette page, nous utilisons 3.0.0 comme numéro de version strict et 3.x pour désigner toutes les versions qui commencent par le chiffre 3 (3.0.0, 3.0.1, 3.1.0, etc.). La même convention s'applique à 2.x.

Le processus de mise à niveau depuis 1.11.x est également décrit dans votre fichier `public/documentation/installation_guide.html`, à l'intérieur de votre code Chamilo.
Les informations présentées ici sont largement redondantes. Vous pouvez les consulter en ligne à l'adresse `https://campus.chamilo.net/documentation/installation_guide.html`.

**Mettez à niveau vers 3.0, et non vers 2.x.** La version 3.0 est la version actuelle, et certains paramètres de 1.11.x n'avaient pas encore d'équivalent dans 2.0.0. Un système 1.11.x passe donc directement à 3.0. Nous avons testé de manière approfondie des migrations similaires, mais chaque plateforme porte sa propre histoire : essayez d'abord sur un environnement de test, et envisagez d'être accompagné professionnellement par les [prestataires officiels de Chamilo](https://chamilo.org/providers) dans cette démarche.

## Mise à niveau de 1.11.x vers 3.0

La mise à niveau de Chamilo 1.11.x vers 3.0 est une **migration majeure**, et non une simple mise à jour. Chamilo 2.0 a été reconstruit sur le framework Symfony, avec un schéma de base de données restructuré, une nouvelle API et une organisation des fichiers différente, et 3.0 poursuit cette lignée. Planifiez cette migration avec soin et testez-la sur un environnement de test avant de la déployer en production.

### Avant de commencer

1. **Lisez les notes de version** de Chamilo 3.x afin de comprendre ce qui a changé, ce qui est nouveau et quelles fonctionnalités de 1.11.x ne sont peut-être pas encore disponibles.
2. **Sauvegardez tout** :
   - Export complet de la base de données (`mysqldump` ou équivalent).
   - Tous les fichiers du répertoire d'installation de Chamilo 1.11.x, en particulier `app/upload/`, `app/courses/` et `main/`.
   - Votre fichier `configuration.php`.
3. **Testez d'abord sur un serveur de préproduction.** N'exécutez jamais la migration directement sur votre serveur de production.
4. **Vérifiez les prérequis du serveur.** Chamilo 3.x a des exigences différentes de celles de 1.11.x (notamment PHP 8.3 ou ultérieur — l'installateur refuse toute version plus ancienne). Voir [Prérequis du serveur](server-requirements.md).
5. **Décidez du sort de la table `version` de la base de données 1.11.x.** Chamilo 2.x et les versions ultérieures stockent l'historique des migrations Doctrine dans une table de ce nom, avec d'autres colonnes, de sorte que les deux ne peuvent pas coexister. L'assistant web s'en charge pour vous : il renomme la table 1.11.x en `version_1_11` avant d'exécuter la première migration. La ligne de commande ne le fait pas ; **supprimez ou renommez donc vous-même cette table avant d'exécuter `doctrine:migrations:migrate`**. Cette table n'est pas nécessaire au fonctionnement de Chamilo 1.11.x.
6. **Décompressez le nouveau code dans un nouveau répertoire.** Les fichiers 1.11.x restent à leur emplacement. L'installateur les lit comme source de vos cours et de vos téléversements, et écrit le résultat dans la nouvelle arborescence.
7. **Si vous utilisiez des sous-langues, rien de plus n'est requis.** La mise à niveau les convertit et écrit leurs termes dans `var/translations/`, répertoire dans lequel votre serveur web doit déjà pouvoir écrire. L'interface les lit à partir de là, sans reconstruction.

### Exécution de la mise à niveau

Vous pouvez exécuter la mise à niveau via l'assistant web ou via la ligne de commande.

#### Assistant web

1. Pointez le `DocumentRoot` de votre hôte virtuel vers le sous-répertoire `public/` de la nouvelle arborescence.
2. Créez un fichier vide `UPGRADE_ENABLED` à la racine du projet, à côté de `.env` et de `composer.json` — voir ci-dessous.
3. Ouvrez votre URL. L'assistant démarre, car la nouvelle arborescence ne contient pas encore de fichier `.env`.
4. À l'étape 2, sélectionnez l'option de mise à niveau et indiquez le chemin racine de votre installation 1.11.x.
5. Suivez l'assistant jusqu'à la fin.

L'assistant n'a pas de connexion qui lui soit propre ; une mise à niveau nécessite donc une autorisation sur le serveur : ce fichier `UPGRADE_ENABLED`. **Vous seul le créez.** L'assistant ne l'écrit jamais de lui-même, car toute la valeur du fichier tient au fait que sa présence prouve qu'une personne a pris la décision sur le serveur.

Votre nouvelle arborescence n'a pas encore de fichier `.env` ; l'assistant s'ouvre donc sans ce fichier. Il le demande à l'étape des prérequis, lorsque vous choisissez la mise à niveau et avant de vous demander votre base de données. Créez alors le fichier et poursuivez ; vous ne redémarrez pas l'assistant.

L'installateur supprime le fichier lorsque la mise à niveau se termine. Si la racine de votre projet est en lecture seule, il le signale à la place, et vous supprimez le fichier à la main. Tant qu'il est présent, l'installateur reste ouvert, et la page d'administration le signale dans les contrôles de santé de la plateforme.

#### Ligne de commande

Définissez `UPDATE_PATH` sur la racine de votre installation 1.11.x, puis exécutez les migrations :

```bash
UPDATE_PATH=/path/to/chamilo-1.11 php bin/console doctrine:migrations:migrate --no-interaction
```

Augmentez d'abord `memory_limit` et `max_execution_time`. La migration lit chaque fichier de cours ; elle a donc besoin de bien plus que les valeurs par défaut.

#### Durée de l'opération

La durée dépend de la taille de votre base de données et de vos fichiers de cours. À titre de référence, une plateforme 1.11.28 comportant 238 tables, 11 cours, 63 utilisateurs et 1 489 fichiers de cours a nécessité **6 minutes** et 1,7 Go de mémoire, et a exécuté 393 migrations. Une grande plateforme de production peut prendre plusieurs heures. Prévoyez une fenêtre de maintenance, et consultez le [forum Chamilo](https://chamilo.org) ou contactez un [prestataire officiel](https://chamilo.org/providers) avant de l'exécuter en production.

### Ce qui peut nécessiter une attention manuelle

| Domaine | Remarques |
|------|-------|
| **Plugins personnalisés** | Les plugins 1.11.x ne fonctionnent pas en 2.x ni en 3.x. Ils doivent être réécrits ou remplacés. Les plugins officiels ont été portés progressivement depuis la 2.0 — consultez la liste des plugins de votre version pour voir lesquels sont disponibles. |
| **Thèmes personnalisés** | Les thèmes 1.11.x ne fonctionnent pas en 2.x ni en 3.x. Recréez votre identité visuelle à l'aide du système de thèmes 3.x. |
| **Modifications personnalisées de la base de données** | Toute modification directe de la base de données en dehors de Chamilo peut ne pas être migrée. |
| **Paquets SCORM** | Le contenu SCORM devrait être migré, mais testez les paquets individuellement pour vérifier la lecture. |
| **Intégrations externes** | Toute intégration utilisant l'API ou les services web 1.11.x doit être mise à jour pour utiliser l'API exclusivement REST 2.x, fondée sur [API Platform](https://github.com/api-platform/api-platform). |
| **Paramètres de profil** | Après une mise à niveau depuis une version héritée, vérifiez que `changeable_options` et `visible_options` reflètent toujours les règles attendues de modification et de visibilité des profils. Le code de mise à niveau conserve leurs valeurs issues des paramètres hérités au lieu de les traiter comme des entrées de `configuration.php` ([PR #9161](https://github.com/chamilo/chamilo-lms/pull/9161)). |

### Audit des relations questions-quiz après une migration héritée

Si des exercices migrés semblent avoir des questions manquantes, utilisez la commande console introduite dans la [PR #9157](https://github.com/chamilo/chamilo-lms/pull/9157) pour **auditer avant de tenter une réparation**. Exécutez-la depuis la racine de l'application Chamilo, sur une copie de préproduction de la base de données migrée.

Un premier passage examine uniquement la base de données cible et **ne modifie aucune donnée** :

```bash
php bin/console chamilo:migration:repair-quiz-relations-from-legacy
```

Des quiz vides ne prouvent pas à eux seuls que des relations ont été perdues. Pour comparer avec les anciennes données Chamilo, rendez la base de données héritée disponible sur le **même serveur de base de données**, avec des droits de lecture adaptés, et indiquez son nom :

```bash
php bin/console chamilo:migration:repair-quiz-relations-from-legacy --source-database=legacy_chamilo_db
```

Vous pouvez restreindre l'un ou l'autre audit à des *iid de quiz cibles* particuliers grâce à l'option répétable `--quiz=123`. Sans `--apply`, les deux formes restent en lecture seule. La comparaison signale les relations manquantes, les quiz concernés ainsi que les conflits possibles ou les références non résolues.

**N'appliquez pas une réparation uniquement sur la base d'un décompte de quiz vides.** Conservez des sauvegardes vérifiées de la base de données et examinez les données source et cible comparées. Une réparation exige `--source-database`, `--apply`, ainsi que `--expected-missing-relations` et `--expected-affected-quizzes` définis aux **décomptes exacts issus de la comparaison en lecture seule précédente**. La commande refuse d'écrire si ces décomptes ont changé ou si les quiz concernés présentent des conflits non sûrs. N'appliquez la réparation qu'après avoir validé les résultats sur une copie de préproduction ; répétez ensuite l'audit en lecture seule pour confirmer qu'il ne reste aucune relation manquante vérifiée.

## Mise à niveau de 2.x vers 3.0

Cette mise à niveau conserve votre répertoire existant et votre base de données existante. Vous copiez le nouveau code par-dessus l'arborescence existante, puis vous exécutez les migrations, soit via l'assistant web, soit via la ligne de commande.

### Initialiser d'abord l'historique des migrations

Chamilo installe le schéma de la base de données directement à partir des définitions d'entités. Une installation créée par l'installateur possède donc le schéma final, mais un **historique de migrations vide**. Les installations créées avant Chamilo 3.0 n'ont jamais reçu cet historique. Deux éléments en dépendent :

* `doctrine:migrations:migrate` décide de ce qu'il doit exécuter à partir de cet historique. Avec un historique vide, il tente de rejouer toutes les migrations depuis le début sur un schéma déjà à jour.
* L'installateur web décide à partir de cet historique si une mise à niveau est en attente. Avec un historique vide, il refuse la requête, car rien ne prouve qu'une mise à niveau est due.

Initialisez-le donc une seule fois, et respectez l'ordre indiqué ci-dessous.

> **Avertissement : initialisez l'historique avant de copier le nouveau code.** Les commandes marquent comme déjà exécutée chaque migration portée par le code **déployé**. Si vous les exécutez après avoir copié le code 3.0, elles marquent également les migrations 3.0, et votre mise à niveau ne s'exécute jamais.

Avec votre version actuelle toujours en place, exécutez :

```bash
php bin/console doctrine:migrations:sync-metadata-storage --no-interaction
php bin/console doctrine:migrations:version --add --all --no-interaction
```

La première commande crée la table d'historique. La seconde marque les migrations de votre version actuelle. `doctrine:migrations:version` échoue de lui-même si la table n'existe pas encore ; ne sautez donc pas la première commande.

**Pas de shell sur votre hébergement ?** La page d'administration fait la même chose : l'élément **No migration history: click to fix** des contrôles de santé de la plateforme. Il n'a pas besoin de l'ordre ci-dessus, car il lit votre schéma plutôt que le code sur le disque : il n'enregistre que les espaces de noms de migration que votre base de données prouve déjà porter, et laisse les plus récents en attente. Vous pouvez donc copier d'abord le code 3.0, puis utiliser le lien ensuite — voir *Si vous avez déjà copié le code 3.0* ci-dessous.

Vérifiez le résultat :

```bash
php bin/console doctrine:migrations:status
```

`Executed` doit être égal à `Available`, et `New` doit valoir 0. Copiez maintenant le code 3.0.

### Si vous avez déjà copié le code 3.0

Deux symptômes identifient ce cas. L'assistant web répond **« Chamilo is already installed »** alors que votre plateforme est une version 2.x, et `doctrine:migrations:status` indique `Executed` 0.

Votre historique est encore vide, et le code sur le disque n'est plus celui qui a créé votre base de données. N'initialisez donc **pas** l'historique avec `--add --all` à partir d'ici : cela marque chaque migration portée par le code déployé, ce qui enregistre comme déjà effectuées les migrations dont votre mise à niveau a encore besoin. Elles ne s'exécutent alors jamais, et rien ne vous avertit ensuite — votre base de données ne possède tout simplement pas les colonnes qu'elles créent.

Il existe deux solutions, et la première ne nécessite aucun shell.

**Première solution, depuis la page d'administration.** Ouvrez les contrôles de santé de la plateforme et utilisez l'élément **No migration history: click to fix**. Il lit votre schéma, n'enregistre que les espaces de noms que votre base de données prouve déjà porter, et laisse les migrations plus récentes en attente. La notification indique les deux décomptes : pour une base de données 2.0.x sous le code 3.0, 347 enregistrées et 46 encore en attente. Exécutez ensuite la mise à niveau comme décrit ci-dessous.

**Deuxième solution, depuis un shell.** Initialisez tout, puis retirez de l'historique les espaces de noms que votre version précédente ne portait pas.

Chaque version 2.0.x, de 2.0.0 à 2.0.3, porte les mêmes **344** migrations, toutes dans l'espace de noms `V200`. Chamilo 3.0.0 en porte **393** : les espaces de noms `V210` et `V300`, plus trois migrations `V200`. Ces trois-là sont des copies datées de migrations qui existent aussi dans `V210` et `V300`, ajoutées afin que le chemin 1.11.x crée leurs colonnes tôt, et chacune vérifie le schéma avant d'agir. Enregistrer l'ensemble de l'espace de noms `V200` ne fait donc rien perdre — leurs jumelles restent en attente et effectuent le travail.

```bash
php bin/console doctrine:migrations:sync-metadata-storage --no-interaction
php bin/console doctrine:migrations:version --add --all --no-interaction
```

Ensuite, dans votre base de données, supprimez les migrations qui doivent encore s'exécuter :

```sql
DELETE FROM version WHERE version LIKE '%V210%' OR version LIKE '%V300%';
```

Vérifiez le résultat :

```bash
php bin/console doctrine:migrations:status
```

Pour une source 2.0.x et Chamilo 3.0.0, `Executed` doit valoir 347, `Available` 393 et `New` 46. Poursuivez maintenant avec la mise à niveau ci-dessous.

### Autoriser la mise à niveau, si vous utilisez l'assistant web

Votre plateforme est déjà installée, l'assistant la refuse donc jusqu'à ce que vous autorisiez la mise à niveau sur le serveur. L'autorisation est un fichier vide nommé `UPGRADE_ENABLED`, à la racine du projet, à côté de `.env` et de `composer.json` :

```bash
cd /var/www/chamilo
touch UPGRADE_ENABLED
```

Il se place à la racine du projet, et non dans `public/` : de là, personne ne peut demander par HTTP si votre plateforme est actuellement ouverte à une mise à niveau. Sans ce fichier, l'assistant répond `No UPGRADE_ENABLED found in the project root`. L'installateur supprime le fichier lorsque la mise à niveau se termine ; sur une racine de projet en lecture seule, il l'indique à la place, et vous le supprimez à la main. La ligne de commande n'a pas besoin d'un tel fichier.

### Exécuter la mise à niveau

Copiez le nouveau code, puis ouvrez votre URL et suivez l'assistant, ou exécutez les migrations depuis la ligne de commande :

```bash
php bin/console doctrine:migrations:migrate --no-interaction
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

L'assistant web ne s'ouvre que tant que des migrations sont en attente. Une fois la mise à niveau terminée, il répond à nouveau `409 Conflict`, ce qui le protège : l'assistant ne dispose d'aucune authentification propre.

## Mise à jour de Chamilo 3.0.x

Les mises à jour mineures au sein de la branche 3.0 sont plus simples.

### Processus de mise à jour

#### À l'aide d'un paquet

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

Adaptez à l'utilisateur de votre serveur web :
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **Vérifiez** que la plateforme se charge correctement et contrôlez ponctuellement les fonctionnalités essentielles.

#### À l'aide de Git

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

4. **Mettez à jour les dépendances JavaScript et reconstruisez les ressources :**
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

Adaptez à l'utilisateur de votre serveur web :
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **Vérifiez** que la plateforme se charge correctement et contrôlez ponctuellement les fonctionnalités essentielles.

### Automatisation des mises à jour

Pour les organisations qui gèrent plusieurs instances de Chamilo, envisagez de scripter le processus de mise à jour :

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

## Chamilo 3.1 : migration de la langue des cours

Dans la [PR #9176](https://github.com/chamilo/chamilo-lms/pull/9176), les langues des cours ont été normalisées, passant de la colonne textuelle `course.course_language` à `course.language_id`, qui référence `language.id`. L'API et les appelants pris en charge continuent d'exposer la langue du cours sous forme de code ISO. Il s'agit d'un changement de relation en base de données, et non d'un nouveau sélecteur de langue pour les enseignants.

Avant d'exécuter la migration V310 concernée (`Version20261005120000`), vérifiez que chaque code de langue de cours correspond **exactement à une** valeur `language.isocode`. Cette requête en lecture seule identifie les correspondances manquantes ou ambiguës tant que la colonne héritée existe encore :

```sql
SELECT c.course_language, COUNT(DISTINCT l.id) AS language_matches
FROM course c
LEFT JOIN language l ON l.isocode = c.course_language
GROUP BY c.course_language
HAVING COUNT(DISTINCT l.id) <> 1;
```

Un contrôle préalable réussi ne renvoie aucune ligne. S'il en renvoie, examinez et corrigez soigneusement les données sources avant d'exécuter la migration. La migration refuse les codes non appariés ou ambigus et rejette également un schéma partiel conflictuel (`course_language` et `language_id` tous deux présents). Sauvegardez la base de données et testez sur un environnement de préproduction ; ne supprimez pas manuellement la colonne héritée et ne désactivez pas ces contrôles manuellement.

## Chamilo 3.1 : enregistrement de la boîte à outils IA sur les cours mis à niveau

Lorsque la boîte à outils IA est absente des cours qui existaient avant une mise à niveau, vérifiez si les **migrations V310** concernées se sont exécutées correctement. La migration de réparation `Version20261008113000` garantit l'existence de l'outil Toolbox et du type de ressource `toolbox_items`, et crée les entrées d'outil de cours Toolbox manquantes **en tant que brouillons** ; elle ne les publie pas automatiquement. Les améliorations ultérieures des migrations portent sur la fiabilité et les performances de la mise à niveau. Il s'agit d'une réparation de mise à niveau, et non d'un substitut à la visibilité et aux permissions normales des outils de la plateforme.

Si l'outil est toujours absent, vérifiez l'état des migrations et la configuration de Toolbox avant de modifier les enregistrements de cours. Ne **pas** insérer manuellement des lignes d'outil ou de lien de ressource, ni exécuter de façon répétée les migrations sans examiner le schéma réel et l'historique des migrations. Voir la [PR #9195](https://github.com/chamilo/chamilo-lms/pull/9195) et son suivi, la [PR #9229](https://github.com/chamilo/chamilo-lms/pull/9229).

## Chamilo 3.1 : normalisation du schéma de base de données hérité

Le nettoyage de schéma d'octobre 2026 modifie certains **noms de colonnes, types et relations** de la base de données, tout en conservant les champs encore activement utilisés. En particulier, `course_rel_class.course_code` est remplacé par `course_rel_class.c_id` (référençant `course.id`), et `course_request.category_code` est remplacé par `course_request.category_id` (référençant `course_category.id`). Certaines colonnes `title`, `url` et `VARCHAR` longues sont converties en `LONGTEXT`, tandis que d'autres champs `VARCHAR` appartenant à Chamilo sont normalisés à une longueur de 255 lorsque cela s'applique. Les colonnes appartenant à des paquets externes sont délibérément traitées séparément.

Pour les installations disposant de rapports SQL personnalisés, de plugins ou d'intégrations, **examinez leurs requêtes et leurs hypothèses de schéma** avant de déployer ces migrations. Les conversions classe/cours et demande de cours/catégorie refusent les références non résolues plutôt que de les écarter silencieusement. Le nettoyage supprime également les tables de groupes FOS obsolètes après avoir préservé en toute sécurité les rôles utilisateur dérivés des groupes ; des données de groupes héritées incompatibles ou invalides entraînent l'arrêt de la migration pour examen. Ne supprimez pas ces tables et ne réécrivez pas les associations manuellement à l'avance.

Ces changements sont documentés dans la [PR #9212](https://github.com/chamilo/chamilo-lms/pull/9212) (issue #7445). Sauvegardez la base de données et vérifiez la mise à niveau sur une copie de préproduction, en particulier si du code personnalisé lit ces tables héritées ou attend des longueurs de texte fixes.

## Notes de sécurité

### Maintenance de sécurité d'octobre 2026 sur la branche de développement 3.x

Plusieurs correctifs de sécurité rédigés par **christianbeeznest** ont été fusionnés dans la branche `master` de Chamilo entre le **16 et le 18 octobre 2026**. Il s'agit de protections au niveau du code, **et non de nouveaux paramètres**. Une pull request fusionnée ne garantit pas que le changement soit inclus dans une version étiquetée particulière ni dans une installation qui n'a pas été mise à jour. Consultez les notes de version ou la révision Git déployée avant de considérer un déploiement comme corrigé.

Les changements comprennent :

* **Filtrage HTML :** suppression plus robuste des attributs d'événement non sûrs du HTML fourni par l'utilisateur ([PR #9247](https://github.com/chamilo/chamilo-lms/pull/9247)).
* **Progression des parcours d'apprentissage et annotations d'exercices :** renforcement du traitement côté serveur des requêtes de progression des parcours d'apprentissage et de l'accès aux réponses annotées d'une tentative d'apprenant ([PR #9251](https://github.com/chamilo/chamilo-lms/pull/9251), [PR #9259](https://github.com/chamilo/chamilo-lms/pull/9259)).
* **Liens de profil social et vérification des liens :** validation d'URL plus stricte et protection du vérificateur de liens de cours contre les changements non sûrs de résolution DNS ([PR #9263](https://github.com/chamilo/chamilo-lms/pull/9263), [PR #9271](https://github.com/chamilo/chamilo-lms/pull/9271)).
* **Exports CSV :** atténuation de l'interprétation des formules de tableur dans les données exportées, sur plusieurs chemins d'export et de reporting hérités et modernes ([PR #9267](https://github.com/chamilo/chamilo-lms/pull/9267)).

**Après le déploiement du code contenant ces correctifs**, effectuez un contrôle de régression en préproduction : créez et affichez du contenu HTML mis en forme ; enregistrez et reprenez un parcours d'apprentissage ; vérifiez que les apprenants ne peuvent lire que leurs propres annotations d'exercices autorisées ; contrôlez les liens sociaux et de cours autorisés ; et ouvrez des exports CSV représentatifs dans un tableur pour confirmer que le texte contrôlé par l'utilisateur n'est pas interprété comme une formule. Incluez les rôles enseignant, apprenant et administrateur lorsque cela est pertinent. Conservez en place l'authentification, les contrôles d'accès et les restrictions de réseau sortant existants. Ces contrôles aident à détecter les régressions, mais ne remplacent pas une revue de sécurité.

### Mots de passe prévisibles des utilisateurs SSO et SCIM

Avant Chamilo 3.0.2, certains comptes provisionnés ou mis à jour par un système d'identité externe disposaient d'un mot de passe fixe et publiquement devinable. Toute personne connaissant le nom d'utilisateur pouvait se connecter via le formulaire de connexion habituel si le compte conservait la source d'authentification `platform`.

Chamilo 3.0.2 corrige le code. Il ne modifie **pas** les mots de passe déjà existants ; examinez donc ces comptes après la mise à jour :

* **SCIM :** les utilisateurs créés via `POST /scim/v2/Users` ont le mot de passe `scim`.
* **Azure Entra ID, Facebook, Keycloak :** les utilisateurs qui se sont connectés via ces fournisseurs ont vu leur mot de passe remplacé par `azure`, `facebook` ou `keycloak`. Seuls les utilisateurs qui disposent également de la source d'authentification `platform` peuvent l'utiliser pour se connecter.
* **OAuth2 générique :** les utilisateurs créés par le fournisseur ont leur nom d'utilisateur comme mot de passe.

Pour clore cette exposition :

1. Mettez à jour vers Chamilo 3.0.2 ou une version ultérieure.
2. Dans **Administration > Utilisateurs**, modifiez chaque utilisateur concerné et définissez un nouveau mot de passe. Les utilisateurs qui se connectent uniquement via le fournisseur d'identité n'ont pas besoin de le connaître.
3. Si vous utilisez SCIM, définissez `auth_source` dans `authentication.yaml` sur une valeur autre que `platform`, puis videz le cache. Voir [SCIM](../authentication/scim.md). Les utilisateurs existants conservent les sources d'authentification qu'ils possèdent déjà.
4. Demandez aux utilisateurs qui se connectent avec un mot de passe de le modifier.

Les nouveaux utilisateurs créés après la mise à jour reçoivent un mot de passe aléatoire, et une connexion SSO n'écrase plus le mot de passe d'un utilisateur existant. Les utilisateurs qui ont besoin d'un mot de passe pour le formulaire de connexion habituel peuvent en demander un avec **Mot de passe oublié ?** sur la page de connexion.

## Conseils

* **Sauvegardez toujours avant une mise à niveau.** Les migrations de base de données ne sont pas réversibles via l'interface de Chamilo.
* **Testez d'abord sur un environnement de préproduction** -- en particulier pour la migration de 1.11.x vers 3.0, qui implique une transformation importante des données.
* **Planifiez les mises à niveau pendant des fenêtres de maintenance** lorsque les utilisateurs n'utilisent pas activement la plateforme.
* **Abonnez-vous aux versions GitHub** sur [Github](https://github.com/chamilo/chamilo-lms/releases) à l'aide de l'icône de cloche pour être informé des nouvelles versions et des correctifs de sécurité.
* **Si l'assistant répond `Chamilo is already installed`**, il n'a trouvé aucune migration en attente. Exécutez `php bin/console doctrine:migrations:status` pour vérifier. Si `Executed` vaut 0 sur une plateforme qui fonctionne, l'historique des migrations n'a jamais été initialisé — voir [Initialiser d'abord l'historique des migrations](#seed-the-migration-history-first).
* **Le téléchargement automatique des nouvelles versions** n'est pas encore proposé dans Chamilo 3.0, mais il s'agit d'un projet en cours que nous espérons publier prochainement. La mise à niveau elle-même s'exécute déjà depuis l'assistant web.