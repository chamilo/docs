# Profilage des utilisateurs

Chamilo vous permet de définir des champs de profil personnalisés (champs supplémentaires) pour recueillir des informations additionnelles sur les utilisateurs au-delà des données standard telles que le nom, l'adresse e-mail et le rôle.

## Champs de profil supplémentaires

![Liste des champs de profil supplémentaires affichant les champs personnalisés avec le nom, le type et les paramètres de visibilité](/.gitbook/assets/admin-extra-fields-list.png)

Les champs supplémentaires vous permettent de stocker des métadonnées spécifiques à votre organisation, telles que :

* Identifiant d'employé
* Département
* Poste occupé
* Lieu/bureau
* Numéro de téléphone
* Identifiants personnalisés

## Création de champs supplémentaires

1. Depuis le panneau d'administration, accédez à **Champs supplémentaires** ou **Champs de profil**
2. Cliquez sur **Ajouter**
3. Configurez le champ :
   * **Nom** — Le titre du champ affiché aux utilisateurs
   * **Description** — Description optionnelle
   * **Texte d'aide** — À afficher sous le champ dans tout formulaire l'incluant
   * **Type de champ** — Texte, liste déroulante, date, case à cocher, etc.
   * **Étiquette du champ** — Le nom interne du champ, pour l'intégration avec des plugins
   * **Valeurs possibles** — Si le champ est un sélecteur parmi ces valeurs
   * **Valeur par défaut** — Une valeur par défaut optionnelle
   * **Visible pour soi** — Si le champ est visible sur le profil de l'utilisateur par l'utilisateur lui-même
   * **Visible pour les autres** — Si le champ est visible pour les autres utilisateurs de la plateforme
   * **Modifiable** — Si l'utilisateur peut modifier son propre champ lui-même (ou si seuls les administrateurs le peuvent)
   * **Filtre** — Si c'est un champ de type sélecteur, s'il doit être inclus comme filtre dans les pages administratives (par exemple, pour inscrire des utilisateurs à des cours ou des sessions)
   * **Ordre** — Si vous souhaitez gérer l'ordre d'affichage des champs, vous devrez attribuer un ordre numérique à chaque champ
   * **Supprimer lors de l'anonymisation** — Important pour les règles et lois sur la confidentialité : Si l'utilisateur est anonymisé mais non supprimé, ce champ doit-il être considéré comme pouvant contenir des données personnellement identifiables ?
4. Enregistrez

## Types de champs

Le moteur de champs supplémentaires prend en charge un large éventail de types d'entrée. Les plus courants incluent :

| Type | Description |
|------|-------------|
| **Texte** | Une entrée de texte sur une seule ligne |
| **Zone de texte** | Une entrée de texte sur plusieurs lignes |
| **Bouton radio** | Un groupe de choix unique avec des boutons radio |
| **Liste déroulante / Liste déroulante multiple** | Une liste d'options prédéfinies (sélection unique ou multiple) |
| **Double sélection** | Deux listes déroulantes dépendantes (par exemple, pays → ville) |
| **Case à cocher** | Un interrupteur oui/non |
| **Date / Date et heure** | Sélecteur de date ou de date et heure |
| **Entier** | Une entrée numérique |
| **Étiquette** | Plusieurs valeurs d'étiquettes libres |
| **Fichier** | Champ de téléversement de fichier |
| **URL de vidéo** | Une URL pointant vers une vidéo |
| **Numéro de téléphone mobile** | Un champ de numéro de téléphone formaté |
| **Fuseau horaire** | Un sélecteur de fuseau horaire |
| **Profil social** | Un lien vers un profil de réseau social |
| **Séparateur** | Un séparateur visuel dans le formulaire (sans valeur) |

L'ensemble exact des types utilisables dépend de la version de Chamilo ; la liste déroulante des types de champs dans la page d'administration **Champs supplémentaires** est la source de référence.

## Utilisation des champs supplémentaires

Les champs supplémentaires apparaissent :

* Dans les formulaires de création (si visibles pour soi) et de modification des utilisateurs
* Sur les pages de profil des utilisateurs (si visibles pour soi)
* Lors des importations d'utilisateurs (vous pouvez inclure des valeurs de champs supplémentaires dans les importations CSV)
* Dans les exportations et rapports (filtrer ou regrouper par valeurs de champs supplémentaires)

## Conseils

* **Planifiez avant de créer** — Définissez les informations dont vous avez besoin avant de créer des champs, car modifier les types de champs après la saisie de données peut poser problème
* **Utilisez des listes déroulantes pour la cohérence** — Lorsqu'un champ a un ensemble connu de valeurs possibles, utilisez une liste déroulante au lieu d'un texte libre pour garantir la cohérence des données
* **Utilisez pour les rapports** — Les champs supplémentaires sont utiles pour filtrer les rapports (par exemple, "afficher tous les utilisateurs du département X ayant complété la formation Y")