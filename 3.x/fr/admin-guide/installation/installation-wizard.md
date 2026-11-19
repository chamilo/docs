# Assistant d'installation

Chamilo 3.0 inclut un assistant d'installation web qui vous guide tout au long de la configuration initiale. L'assistant s'exécute automatiquement lorsque vous accédez à la plateforme pour la première fois.

## Avant de commencer

Assurez-vous que les prérequis suivants sont remplis :

1. Votre serveur satisfait à toutes les [exigences serveur](server-requirements.md).
2. Vous avez téléchargé une version empaquetée (zip ou tar.gz) de Chamilo.
3. Votre serveur web est configuré pour servir le répertoire `public/` comme racine des documents.
4. Votre fichier `.env` existe et est vide (l'assistant guidera la configuration de la base de données).

## Étape 1 : Langue d'installation

![Assistant d'installation, étape 1 — sélection de la langue](../../.gitbook/assets/install-step1-language.png)

La première étape vous permet de sélectionner la langue du processus d'installation. Choisissez votre langue préférée dans la liste déroulante.

Si Chamilo détecte une installation existante (pour une mise à niveau), il affiche l'état de la migration et propose un chemin de mise à niveau au lieu d'une installation neuve.

## Étape 2 : Vérification des prérequis

![Assistant d'installation, étape 2 — vérification des prérequis indiquant la version de PHP, les extensions et les permissions des répertoires](../../.gitbook/assets/install-step2-requirements.png)

L'assistant vérifie l'environnement de votre serveur :

* **Version de PHP** : 8.3, 8.4 ou 8.5
* **Extensions PHP requises** installées (intl, gd, curl, zip, mbstring, xml, etc.)
* **Paramètres PHP recommandés** — `date.timezone` est configuré, limites d'envoi et de mémoire adéquates
* **Permissions des répertoires et des fichiers** — `var/`, `config/` et `public/upload/` sont accessibles en écriture par le serveur web

Si des prérequis ne sont pas remplis, l'assistant affiche des avertissements ou des erreurs. Résolvez-les avant de poursuivre.

## Étape 3 : Licence

![Assistant d'installation, étape 3 — acceptation de la licence](../../.gitbook/assets/install-step3-license.png)

Cette étape affiche la licence GNU/GPLv3. Vous devez cocher la case **« J'accepte »** pour poursuivre.

Facultativement, vous pouvez développer la section **Informations de contact** pour fournir des détails sur votre organisation (nom, e-mail, entreprise, pays). Cette démarche est volontaire et aide la communauté Chamilo à comprendre qui utilise la plateforme, mais elle nous permettra également de vous contacter *très rarement* au sujet d'événements se déroulant près de chez vous.

## Étape 4 : Paramètres de la base de données

![Assistant d'installation, étape 4 — configuration de la connexion à la base de données](../../.gitbook/assets/install-step4-database.png)

Saisissez les détails de connexion à votre base de données :

| Champ | Description |
|-------|-------------|
| **Hôte de la base de données** | Le nom d'hôte ou l'adresse IP de votre serveur de base de données (par ex. `localhost` ou `127.0.0.1`) |
| **Port de la base de données** | Valeur par défaut : 3306 pour MySQL/MariaDB |
| **Nom de la base de données** | Le nom de la base de données à utiliser (caractères alphanumériques et traits de soulignement uniquement) |
| **Utilisateur de la base de données** | Un utilisateur de base de données disposant de tous les privilèges sur la base de données spécifiée |
| **Mot de passe de la base de données** | Le mot de passe de l'utilisateur de la base de données |

Cliquez sur **Vérifier la connexion à la base de données** pour tester. L'assistant ne vous permettra pas de poursuivre tant que la connexion n'aura pas réussi. Si la base de données existe déjà, un avertissement s'affiche.

## Étape 5 : Paramètres de configuration

![Assistant d'installation, étape 5 — compte administrateur, paramètres du portail et configuration de l'e-mail](../../.gitbook/assets/install-step5-config.png)

Cette étape combine la création du compte administrateur, les paramètres du portail et la configuration de l'e-mail.

### Compte administrateur

| Champ | Description |
|-------|-------------|
| **Identifiant** | Le nom d'utilisateur de l'administrateur |
| **Mot de passe** | Choisissez un mot de passe robuste — ce compte dispose d'un accès complet à la plateforme |
| **Prénom** | Le prénom de l'administrateur |
| **Nom** | Le nom de l'administrateur |
| **E-mail** | Utilisé pour les notifications système et la réinitialisation des mots de passe |
| **Téléphone** | Numéro de contact facultatif |

Ces informations d'administrateur seront également utilisées par Chamilo pour renseigner les coordonnées du support ; veillez donc à les reconfigurer dans les paramètres une fois l'installation terminée.

### Paramètres du portail

| Champ | Description |
|-------|-------------|
| **Langue** | La langue par défaut de l'interface |
| **Nom du portail** | Le nom de votre plateforme (par ex. « LMS de mon organisation ») |
| **Nom court de l'entreprise** | Le nom abrégé de votre organisation |
| **URL de l'entreprise** | Le site web de votre organisation |
| **Méthode de chiffrement** | Algorithme de hachage des mots de passe — **bcrypt** est recommandé |
| **Autoriser l'auto-inscription** | Oui / Non / Après approbation |
| **Autoriser l'auto-inscription en tant que formateur** | Oui / Non |

### Configuration de l'e-mail

La section des paramètres d'e-mail vous permet de configurer le transport du courrier (SMTP, Amazon SES, Mailjet, etc.) et de tester l'envoi des e-mails. Consultez [Configuration de l'e-mail](email-configuration.md) pour plus de détails.

Tous ces paramètres peuvent être modifiés ultérieurement depuis le panneau d'administration.

## Étape 6 : Dernière vérification avant l'installation

![Assistant d'installation, étape 6 — revue de tous les paramètres avant l'installation](../../.gitbook/assets/install-step6-review.png)

Cette étape affiche un récapitulatif de toutes les informations saisies, à des fins de vérification :

* Identifiants de l'administrateur (le mot de passe est masqué par défaut — cliquez sur l'icône en forme d'œil pour l'afficher)
* Paramètres du portail
* Détails de la connexion à la base de données

Vérifiez attentivement, puis cliquez sur **Installer Chamilo** pour lancer l'installation. L'assistant crée toutes les tables de la base de données, insère les données initiales et configure la plateforme.

## Étape 7 : Installation terminée

![Assistant d'installation, étape 7 — achèvement avec conseils de sécurité et lien vers le portail](../../.gitbook/assets/install-step7-complete.png)

Une fois l'installation terminée avec succès, l'assistant affiche :

* **Conseils pour bien démarrer** — Suggère de créer votre premier cours afin d'explorer la plateforme (en tant qu'administrateur, vous devez le faire depuis le panneau d'administration)
* **Recommandations de sécurité** :
  * Rendre le répertoire `config/` accessible en lecture seule (`chmod 0555`)
  * Supprimer le répertoire `public/main/install/`
* Un **lien vers votre portail** pour vous connecter avec les identifiants d'administrateur que vous venez de créer

## Après l'installation

Après avoir terminé l'assistant :

* **Supprimer ou restreindre l'accès à l'installateur** -- L'assistant ne doit plus être accessible après l'installation. Chamilo le verrouille généralement automatiquement, mais vérifiez que le fait de revisiter l'URL d'installation redirige vers la page de connexion.
* **Configurer l'envoi des e-mails** -- Voir [Configuration des e-mails](email-configuration.md).
* **Mettre en place des sauvegardes** -- Avant d'ajouter du contenu, configurez des sauvegardes automatisées de la base de données et des fichiers (Chamilo ne fournit pas de solution pour cela, mais la copie du dossier var/ et de la base de données constitue les 2 éléments les plus importants).
* **Examiner les paramètres de sécurité** -- Voir [Paramètres de sécurité](../platform-settings/security-settings.md).

## Dépannage

| Problème | Solution |
|---------|----------|
| Page blanche à l'URL d'installation | Consultez les journaux d'erreurs PHP. Passez temporairement à `APP_ENV=dev` dans .env pour afficher les erreurs dans le navigateur. |
| Échec de la connexion à la base de données | Vérifiez les identifiants, confirmez que la base de données existe et vérifiez que le serveur de base de données autorise les connexions depuis l'hôte du serveur web. |
| Erreurs de permission refusée | Assurez-vous que `var/` est accessible en écriture par l'utilisateur du serveur web. |
| Ressources non chargées (pas de CSS/JS) | Exécutez `yarn install && yarn build` pour compiler les ressources frontend. |