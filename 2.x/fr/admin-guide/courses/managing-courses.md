# Gestion des cours

En tant qu'administrateur, vous pouvez gérer tous les cours sur la plateforme, quel que soit leur créateur.

## Liste des cours

![La liste des cours affichant tous les cours avec le titre, le code, la catégorie, les utilisateurs inscrits et l'état de visibilité](/.gitbook/assets/admin-course-list.png)

Depuis le panneau d'administration, cliquez sur **Liste des cours** pour voir tous les cours. La liste affiche :

* Titre et code du cours
* Langue
* Catégories
* État de visibilité

Utilisez l'outil **Recherche avancée** pour trouver des cours spécifiques.

## Création d'un cours

En tant qu'administrateur, vous pouvez créer des cours et les attribuer à n'importe quel enseignant :

1. Cliquez sur **Ajouter un cours** depuis le panneau d'administration
2. Remplissez les détails du cours (titre, code, catégorie, langue)
3. Attribuez un enseignant au cours
4. Enregistrez

Remarque : Dans Chamilo 1.11.x, le code du cours était visible dans l'URL du cours et il était impossible de le modifier après la création du cours. Ce comportement change dans la version 2.x. Le code du cours n'est plus visible dans l'URL, et les versions futures pourraient permettre aux enseignants de modifier le code du cours par la suite, car il devient moins essentiel pour la plateforme.

## Gestion d'un cours existant

Trouvez un cours dans la liste pour accéder aux options de gestion dans la colonne *Actions* :

* **Informations** — Afficher les informations sur le cours
* **Page d'accueil du cours** — Vous redirige directement vers la page d'accueil du cours
* **Rapports** — Voir les données d'engagement et de performance
* **Modifier** — Changer le titre du cours, la catégorie, la visibilité et d'autres paramètres
* **Créer une sauvegarde** — Accéder à la section de maintenance du cours, où vous pouvez créer des copies et effectuer d'autres actions
* **Ajouter au catalogue** — Ajouter ce cours au catalogue de cours
* **Supprimer** — Supprimer définitivement le cours et tout son contenu

> La suppression d'un cours entraîne la suppression définitive de tout le contenu, des données des apprenants, des notes et des informations de suivi. Pensez à exporter le cours au préalable comme sauvegarde.

## Opérations en masse

Sélectionnez plusieurs cours dans la liste pour effectuer des actions par lots, telles que leur suppression. Pour exporter un cours, entrez dans le cours et utilisez l'outil **Maintenance** — il n'y a pas d'action d'exportation en masse dans la liste des cours de l'administrateur.

## Paramètres de visibilité des cours

Les administrateurs peuvent outrepasser la visibilité définie par les enseignants :

| Visibilité | Effet |
|------------|-------|
| **Public** | Accessible à tous, y compris aux visiteurs anonymes |
| **Ouvert** | Accessible à tous les utilisateurs connectés |
| **Privé** | Seuls les utilisateurs inscrits peuvent accéder au cours |
| **Fermé** | Personne ne peut accéder au cours (sauf l'enseignant et les administrateurs) |
| **Caché** | Personne ne peut voir ou accéder au cours (sauf les administrateurs) |