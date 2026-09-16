# Gestion des utilisateurs

Cette page couvre les tâches quotidiennes de création, de modification et de gestion des comptes utilisateurs.

## Liste des utilisateurs

![La liste des utilisateurs affichant les comptes avec les colonnes nom, email, rôle et statut](/.gitbook/assets/admin-user-list.png)

Depuis le panneau d'administration, cliquez sur **Liste des utilisateurs** pour voir tous les utilisateurs de la plateforme. La liste affiche :

* Avatar
* Nom
* Nom d'utilisateur
* Adresse email
* Rôles
* Statut actif/inactif
* Date d'inscription
* Date de dernière connexion

Utilisez l'outil **Recherche avancée** pour trouver des utilisateurs spécifiques par nom, email, rôle ou autres critères.

## Création d'un utilisateur

![Le formulaire de création d'utilisateur avec des champs pour le nom, l'email, le nom d'utilisateur, le mot de passe, le rôle et la langue](/.gitbook/assets/admin-user-create-form.png)

1. Cliquez sur **Ajouter un utilisateur** depuis le panneau d'administration
2. Remplissez les champs obligatoires :
   * **Prénom** et **Nom de famille**
   * **Email** — Doit être unique sur la plateforme
   * **Nom d'utilisateur** — Le nom de connexion (doit être unique)
   * **Mot de passe** — Définissez un mot de passe initial
   * **Rôles** — Sélectionnez le(s) rôle(s) de l'utilisateur sur la plateforme (étudiant, enseignant, administrateur, etc.)
   * **Langue** — La langue d'interface préférée de l'utilisateur
3. Remplissez éventuellement les champs supplémentaires :
   * Code officiel (par exemple, un identifiant unique dans l'organisation)
   * Numéro de téléphone
   * Date d'expiration — Désactive automatiquement le compte après une date donnée
   * Statut actif/inactif
   * Champs de profil supplémentaires (si configurés)
4. Enregistrez

## Importation d'utilisateurs

![L'interface d'importation d'utilisateurs pour charger des fichiers CSV ou XML avec des données utilisateur](/.gitbook/assets/admin-user-import.png)

Pour la création en masse d'utilisateurs, vous pouvez importer des utilisateurs à partir d'un fichier :

1. Cliquez sur **Importer des utilisateurs** depuis le panneau d'administration
2. Chargez un fichier **CSV** ou **XML** contenant les données des utilisateurs
3. Associez les colonnes du fichier aux champs utilisateur de Chamilo
4. Choisissez comment gérer les utilisateurs existants (mettre à jour ou ignorer)
5. Importez

Le fichier d'importation doit contenir au moins des colonnes pour : prénom, nom de famille, email, nom d'utilisateur et mot de passe.

Remarque : La colonne **Statut** est le nom ancien pour **Rôle** et n'accepte que quelques valeurs, comme 1 pour enseignant, 5 pour étudiant. Un ajustement plus précis des rôles ne peut être effectué que manuellement par la suite, en modifiant l'utilisateur.

## Exportation d'utilisateurs

Cliquez sur **Exporter des utilisateurs** pour télécharger la liste des utilisateurs sous forme de fichier CSV ou XML. Vous pouvez filtrer les utilisateurs à exporter par rôle, date d'inscription ou autres critères.

## Modification d'un utilisateur

Cliquez sur le nom d'un utilisateur dans la liste des utilisateurs pour modifier son compte. Vous pouvez modifier :

* Informations personnelles (nom, email, téléphone)
* Rôles
* Mot de passe (réinitialisation)
* Statut actif/inactif
* Date d'expiration
* Champs de profil supplémentaires

## Suppression d'un utilisateur

Lors de la suppression d'utilisateurs (généralement des enseignants) ayant créé du contenu sur la plateforme, le système peut vous empêcher de supprimer définitivement les utilisateurs et affichera un message d'avertissement expliquant que l'utilisateur est toujours lié à certaines ressources. Si vous confirmez la suppression, le système ne supprimera pas le contenu lui-même mais l'attachera à un utilisateur neutre (que nous appelons l'utilisateur "de secours") pour des raisons de cohérence des données.

Pour éviter cela, vérifiez les détails de l'utilisateur, supprimez chacun de ses cours un par un, puis supprimez l'utilisateur.

## Actions sur les utilisateurs

| Action | Description |
|--------|-------------|
| **Désactiver** | Désactiver le compte d'un utilisateur sans le supprimer. L'utilisateur ne peut pas se connecter, mais ses données sont conservées. |
| **Activer** | Réactiver un compte précédemment désactivé. |
| **Se connecter en tant que** | Se connecter à la plateforme en tant que cet utilisateur (usurpation d'identité). Utile pour le dépannage. |
| **Anonymiser** | Effacer toutes les informations personnelles du compte, conformément au RGPD de l'UE. |
| **Supprimer** | Supprimer temporairement le compte utilisateur. Utilisez l'onglet **Utilisateurs supprimés** pour supprimer définitivement le compte et les données associées. |

> **Se connecter en tant que** est une fonctionnalité puissante. Utilisez-la de manière responsable et uniquement à des fins de support légitimes.

## Opérations par lots

Sélectionnez plusieurs utilisateurs dans la liste des utilisateurs pour effectuer des actions par lots :

* Activer ou désactiver plusieurs utilisateurs à la fois
* Supprimer plusieurs utilisateurs
* Assigner des utilisateurs à un cours ou une session

## Conseils

* **Utilisez l'importation CSV pour les inscriptions massives** — Lors de l'intégration de nombreux utilisateurs au début d'un programme de formation, préparez un fichier CSV et importez en masse
* **Définissez des dates d'expiration** — Pour les utilisateurs temporaires (participants à un atelier, utilisateurs d'essai), définissez une date d'expiration pour désactiver automatiquement leurs comptes
* **Désactivez plutôt que de supprimer** — Lorsqu'un utilisateur quitte, désactivez d'abord son compte. Cela préserve ses enregistrements de formation. Ne supprimez que si vous êtes sûr que les données ne sont plus nécessaires.