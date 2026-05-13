# Mise à jour

Remarque : Sur cette page, nous utilisons 2.0.0 comme numéro de version strict et 2.x pour identifier toutes les versions commençant par le chiffre 2 (2.0.0, 2.0.1, 2.1.0, etc.).

Le processus de mise à jour de 1.11.x vers 2.x est décrit dans votre fichier `public/documentation/installation_guide.html`, à l'intérieur de votre code Chamilo. Les informations ici sont en grande partie redondantes. Vous pouvez les consulter en ligne sur `https://campus.chamilo.net/documentation/installation_guide.html`. Bien que nous ayons effectué des tests approfondis sur des migrations similaires, certaines des configurations de 1.11.x n'étaient pas encore prises en charge dans 2.0.0. Nous recommandons donc d'attendre la version 2.1 avant de mettre à jour un système 1.11.x, ou de vous faire accompagner professionnellement par des [fournisseurs officiels de Chamilo](https://chamilo.org/providers) pour cette démarche.

## Mise à jour de 1.11.x vers 2.x

La mise à jour de Chamilo 1.11.x vers 2.x est une **migration majeure**, et non une simple mise à jour. Chamilo 2.0 a été reconstruit sur le framework Symfony avec un schéma de base de données restructuré, une nouvelle API et une organisation différente des fichiers. Planifiez cette migration avec soin et testez-la dans un environnement de test avant de la déployer en production.

### Avant de commencer

1. **Lisez les notes de version** pour Chamilo 2.x afin de comprendre ce qui a changé, ce qui est nouveau et quelles fonctionnalités de 1.11.x pourraient ne pas encore être disponibles.
2. **Sauvegardez tout** :
   - Une sauvegarde complète de la base de données (`mysqldump` ou équivalent).
   - Tous les fichiers du répertoire d'installation de Chamilo 1.11.x, en particulier `app/upload/`, `app/courses/` et `main/`.
   - Votre fichier `configuration.php`.
3. **Testez d'abord sur un serveur de préproduction.** Ne lancez jamais la migration directement sur votre serveur de production.
4. **Vérifiez les exigences du serveur.** Chamilo 2.x a des exigences différentes de 1.11.x (notamment PHP 8.2+). Consultez [Exigences du serveur](server-requirements.md).

### Ce qui peut nécessiter une attention manuelle

| Domaine | Remarques |
|---------|-----------|
| **Plugins personnalisés** | Les plugins de 1.11.x ne sont pas compatibles avec 2.x. Ils doivent être réécrits ou remplacés, ce qui a été partiellement fait dans 2.0 et devrait être complet d'ici 2.1 pour les plugins officiels. |
| **Thèmes personnalisés** | Les thèmes de 1.11.x ne fonctionnent pas dans 2.x. Recréez votre identité visuelle en utilisant le système de thèmes de 2.x. |
| **Modifications personnalisées de la base de données** | Toute modification directe de la base de données en dehors de Chamilo pourrait ne pas être migrée. |
| **Paquets SCORM** | Le contenu SCORM devrait être migré, mais testez les paquets individuellement pour vérifier leur lecture. |
| **Intégrations externes** | Toute intégration utilisant l'API ou les services web de 1.11.x doit être mise à jour pour utiliser l'API REST uniquement de 2.x avec [API Platform](https://github.com/api-platform/api-platform). |

## Mise à jour de Chamilo 2.0.x

Les mises à jour mineures au sein de la branche 2.0 sont plus simples.

### Processus de mise à jour

#### Utilisation d'un paquet

1. **Sauvegardez** la base de données et les fichiers.

2. **Téléchargez la dernière version 2.0.x** depuis [chamilo.org](https://chamilo.org/download) :

3. **Décompressez localement**

Par exemple (adaptez à la version téléchargée) :
   ```bash
   unzip chamilo-2.0.1.zip
   ```

4. **Copiez les fichiers sur votre installation Chamilo existante**
   ```bash
   cp -r chamilo/* [your-chamilo-installation-path]/
   cp -r chamilo/.* [your-chamilo-installation-path]/
   ```

5. **Exécutez les migrations de la base de données :**
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

8. **Vérifiez** que la plateforme se charge correctement et testez les fonctionnalités clés.

#### Utilisation de Git

Si vous avez installé Chamilo via Git, vous pouvez suivre ces instructions à la place.

1. **Sauvegardez** la base de données et les fichiers.

2. **Récupérez le dernier code** (ou téléchargez la nouvelle version) :
   ```bash
   git pull origin 2.0
   ```

3. **Mettez à jour les dépendances PHP :**
   ```bash
   composer install --no-dev --optimize-autoloader
   ```

4. **Mettez à jour les dépendances JavaScript et reconstruisez les assets :**
   ```bash
   yarn install && yarn build
   ```

5. **Exécutez les migrations de la base de données :**
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

8. **Vérifiez** que la plateforme se charge correctement et testez les fonctionnalités clés.

### Automatisation des mises à jour

Pour les organisations gérant plusieurs instances de Chamilo, envisagez de scripter le processus de mise à jour :

```bash
#!/bin/bash
set -e

# Récupérer le code
git pull origin 2.0

# Dépendances
composer install --no-dev --optimize-autoloader
yarn install && yarn build

# Base de données
php bin/console doctrine:migrations:migrate --no-interaction

# Cache
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod

echo "Mise à jour terminée."
```

## Conseils

* **Sauvegardez toujours avant de mettre à jour.** Les migrations de base de données ne sont pas réversibles via l'interface de Chamilo.
* **Testez d'abord en préproduction** -- en particulier pour la migration de 1.11.x vers 2.0, qui implique une transformation importante des données.
* **Planifiez les mises à jour pendant des fenêtres de maintenance** lorsque les utilisateurs n'utilisent pas activement la plateforme.
* **Abonnez-vous aux releases sur GitHub** sur [Github](https://github.com/chamilo/chamilo-lms/releases) en utilisant l'icône de cloche pour être informé des nouvelles versions et des correctifs de sécurité.
* **Mises à jour via le web** ne sont pas encore disponibles dans Chamilo 2.0, mais c'est un projet en cours que nous espérons publier prochainement.