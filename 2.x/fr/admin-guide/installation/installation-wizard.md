# Assistant d'installation

Chamilo 2.0 inclut un assistant d'installation basé sur le web qui vous guide à travers la configuration initiale. L'assistant se lance automatiquement lorsque vous accédez à la plateforme pour la première fois.

## Avant de commencer

Assurez-vous que les prérequis suivants sont remplis :

1. Votre serveur répond à toutes les [exigences serveur](server-requirements.md).
2. Vous avez téléchargé une version packagée (zip ou tar.gz) de Chamilo.
3. Votre serveur web est configuré pour servir le répertoire `public/` comme racine de document.
4. Votre fichier `.env` existe et est vide (l'assistant guidera la configuration de la base de données).

## Étape 1 : Langue d'installation

![Assistant d'installation Étape 1 — sélection de la langue](/.gitbook/assets/install-step1-language.png)

La première étape vous permet de sélectionner la langue pour le processus d'installation. Choisissez votre langue préférée dans le menu déroulant.

Si Chamilo détecte une installation existante (pour une mise à jour), il affichera l'état de la migration et proposera un chemin de mise à jour au lieu d'une nouvelle installation.

## Étape 2 : Vérification des exigences

![Assistant d'installation Étape 2 — vérification des exigences montrant la version PHP, les extensions et les permissions des répertoires](/.gitbook/assets/install-step2-requirements.png)

L'assistant vérifie l'environnement de votre serveur :

* **Version de PHP** est 8.2 ou supérieure
* **Extensions PHP requises** sont installées (intl, gd, curl, zip, mbstring, xml, etc.)
* **Paramètres PHP recommandés** — `date.timezone` est configuré, limites d'upload/mémoire adéquates
* **Permissions des répertoires et fichiers** — `var/`, `config/` et `public/upload/` sont accessibles en écriture par le serveur web

Si certaines exigences ne sont pas remplies, l'assistant affiche des avertissements ou des erreurs. Résolvez-les avant de continuer.

## Étape 3 : Licence

![Assistant d'installation Étape 3 — acceptation de la licence](/.gitbook/assets/install-step3-license.png)

Cette étape affiche la licence GNU/GPLv3. Vous devez cocher la case **"J'accepte"** pour continuer.

En option, vous pouvez développer la section **Informations de contact** pour fournir des détails sur votre organisation (nom, email, entreprise, pays). Ceci est volontaire et aide la communauté Chamilo à comprendre qui utilise la plateforme, mais cela nous permettra également de vous contacter *très rarement* au sujet d'événements se déroulant près de chez vous.

## Étape 4 : Paramètres de la base de données

![Assistant d'installation Étape 4 — configuration de la connexion à la base de données](/.gitbook/assets/install-step4-database.png)

Entrez les détails de connexion à votre base de données :

| Champ | Description |
|-------|-------------|
| **Hôte de la base de données** | Le nom d'hôte ou l'IP de votre serveur de base de données (par exemple, `localhost` ou `127.0.0.1`) |
| **Port de la base de données** | Par défaut : 3306 pour MySQL/MariaDB |
| **Nom de la base de données** | Le nom de la base de données à utiliser (alphanumérique et tirets bas uniquement) |
| **Utilisateur de la base de données** | Un utilisateur de base de données avec tous les privilèges sur la base spécifiée |
| **Mot de passe de la base de données** | Le mot de passe de l'utilisateur de la base de données |

Cliquez sur **Vérifier la connexion à la base de données** pour tester. L'assistant ne vous permettra pas de continuer tant que la connexion n'est pas réussie. Si la base de données existe déjà, un avertissement est affiché.

## Étape 5 : Paramètres de configuration

![Assistant d'installation Étape 5 — compte administrateur, paramètres du portail et configuration email](/.gitbook/assets/install-step5-config.png)

Cette étape combine la création du compte administrateur, les paramètres du portail et la configuration email.

### Compte administrateur

| Champ | Description |
|-------|-------------|
| **Identifiant** | Le nom d'utilisateur de l'administrateur |
| **Mot de passe** | Choisissez un mot de passe fort — ce compte a un accès complet à la plateforme |
| **Prénom** | Le prénom de l'administrateur |
| **Nom** | Le nom de famille de l'administrateur |
| **Email** | Utilisé pour les notifications système et les réinitialisations de mot de passe |
| **Téléphone** | Numéro de contact optionnel |

Ces détails d'administrateur seront également utilisés par Chamilo pour remplir les informations de contact de support, alors assurez-vous de les reconfigurer dans les paramètres après la fin de l'installation.

### Paramètres du portail

| Champ | Description |
|-------|-------------|
| **Langue** | La langue par défaut de l'interface |
| **Nom du portail** | Le nom de votre plateforme (par exemple, "LMS de mon organisation") |
| **Nom abrégé de l'entreprise** | Le nom abrégé de votre organisation |
| **URL de l'entreprise** | Le site web de votre organisation |
| **Méthode de chiffrement** | Algorithme de hachage des mots de passe — **bcrypt** est recommandé |
| **Autoriser l'auto-inscription** | Oui / Non / Après approbation |
| **Autoriser l'auto-inscription en tant que formateur** | Oui / Non |

### Configuration email

La section des paramètres email vous permet de configurer le transport de courrier (SMTP, Amazon SES, Mailjet, etc.) et de tester l'envoi d'emails. Voir [Configuration Email](email-configuration.md) pour plus de détails.

Tous ces paramètres peuvent être modifiés ultérieurement depuis le panneau d'administration.

## Étape 6 : Dernière vérification avant l'installation

![Assistant d'installation Étape 6 — révision de tous les paramètres avant l'installation](/.gitbook/assets/install-step6-review.png)

Cette étape affiche un résumé de tout ce que vous avez saisi pour révision :

* Identifiants de l'administrateur (le mot de passe est masqué par défaut — cliquez sur l'icône de l'œil pour le révéler)
* Paramètres du portail
* Détails de connexion à la base de données

Vérifiez attentivement, puis cliquez sur **Installer Chamilo** pour exécuter l'installation. L'assistant crée toutes les tables de la base de données, remplit les données initiales et configure la plateforme.

## Étape 7 : Installation terminée

![Assistant d'installation Étape 7 — achèvement avec conseils de sécurité et lien vers le portail](/.gitbook/assets/install-step7-complete.png)

Après que l'installation est terminée avec succès, l'assistant affiche :

* **Conseils pour démarrer** — Suggère de créer votre premier cours pour explorer la plateforme (en tant qu'administrateur, vous devez le faire depuis le panneau d'administration)
* **Recommandations de sécurité** :
  * Rendre le répertoire `config/` en lecture seule (`chmod 0555`)
  * Supprimer le répertoire `public/main/install/`
* Un **lien vers votre portail** pour vous connecter avec les identifiants d'administrateur que vous venez de créer

## Après l'installation

Après avoir terminé l'assistant :

* **Supprimer ou restreindre l'accès à l'installateur** -- L'assistant ne devrait pas être accessible après l'installation. Chamilo le verrouille généralement automatiquement, mais vérifiez que revisiter l'URL d'installation redirige vers la page de connexion.
* **Configurer l'envoi d'emails** -- Voir [Configuration Email](email-configuration.md).
* **Mettre en place des sauvegardes** -- Avant d'ajouter du contenu, configurez des sauvegardes automatisées de la base de données et des fichiers (Chamilo ne fournit pas de solution pour cela, mais copier le dossier var/ et la base de données sont les 2 éléments les plus importants).
* **Vérifier les paramètres de sécurité** -- Voir [Paramètres de sécurité](../platform-settings/security-settings.md).

## Dépannage

| Problème | Solution |
|---------|----------|
| Page blanche à l'URL d'installation | Vérifiez les journaux d'erreurs PHP. Changez temporairement en `APP_ENV=dev` dans .env pour voir les erreurs dans le navigateur. |
| Échec de la connexion à la base de données | Vérifiez les identifiants, confirmez que la base de données existe, vérifiez que le serveur de base de données autorise les connexions depuis l'hôte du serveur web. |
| Erreurs de permission refusée | Assurez-vous que `var/` est accessible en écriture par l'utilisateur du serveur web. |
| Les ressources ne se chargent pas (pas de CSS/JS) | Exécutez `yarn install && yarn build` pour compiler les ressources frontend. |