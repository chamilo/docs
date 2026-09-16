# Aperçu de l’interface d’administration

Le panneau d’administration est votre centre de commande pour gérer la plateforme Chamilo. Accédez-y en cliquant sur **Administration** <img src="/.gitbook/assets/icons/mdi-cogs.svg" alt="Admin" data-size="line"> dans la barre latérale.

## Tableau de bord d’administration

![Le tableau de bord d’administration affichant les blocs fonctionnels Utilisateurs, Cours, Sessions et Paramètres](/.gitbook/assets/admin-dashboard-overview.png)

Le tableau de bord d’administration est organisé en blocs fonctionnels. Chaque bloc regroupe des outils de gestion connexes :

### Utilisateurs

* **Liste des utilisateurs** — Consulter, rechercher, modifier et gérer tous les utilisateurs de la plateforme
* **Ajouter un utilisateur** — Créer des comptes utilisateurs individuels
* **Classes** — Gérer les classes d’utilisateurs pour l’inscription groupée aux sessions

Consultez le chapitre [Utilisateurs](../users/README.md) pour plus de détails.

### Cours

* **Liste des cours** — Consulter et gérer tous les cours de la plateforme
* **Créer un cours** — Créer un nouveau cours
* **Catégories de cours** — Organiser les cours en catégories pour le catalogue

Consultez le chapitre [Cours](../courses/README.md) pour plus de détails.

### Sessions

* **Liste des sessions** — Consulter et gérer les sessions de formation
* **Créer une session** — Configurer une nouvelle session avec des cours et des inscriptions
* **Catégories de sessions** — Organiser les sessions en catégories
* **Parcours et promotions** — Gérer les parcours professionnels et les flux de promotion

Consultez le chapitre [Sessions](../sessions/README.md) pour plus de détails.

### Plateforme

* **Paramètres de configuration**, **Langues**, **Actualités du portail**, **Agenda global**, **Pages**, **Champs supplémentaires**, **Modèles de courriel**, **Catégories du formulaire de contact**, et plus encore — consultez le chapitre [Plateforme](../platform/README.md) pour plus de détails. Le lien « Paramètres de configuration » est le point d’entrée vers le chapitre distinct [Paramètres de la plateforme](../platform-settings/README.md).

### Analytique

* **Statistiques globales**, **Catalogue de rapports**, **Analytique de l’apprentissage**, **Rapport trimestriel**, **Rapport du temps des enseignants**, **Rapport d’entreprise**, **Exports spéciaux**, **Tickets** — Statistiques et rapports de la plateforme ; consultez le chapitre [Analytique](../analytics/README.md) pour plus de détails

### Compétences

* **Roue des compétences**, **Import des compétences**, **Gérer les compétences**, **Gérer les niveaux de compétences**, **Classement des compétences**, **Compétences et évaluations** — Badges de compétences liés aux résultats du carnet de notes ; consultez le chapitre [Compétences](../skills/README.md) pour plus de détails

### Système

* **Nettoyer les fichiers temporaires**, **État du système**, **Mise à jour du système**, **Couleurs**, **Informations sur les fichiers**, **Ressources par type**, **Liste des icônes** — Maintenance du serveur, auto-mise à jour et habillage ; consultez le chapitre [Système](../system/README.md) pour plus de détails

### Salles

* **Sites**, **Salles**, **Recherche de disponibilité des salles** — Sites physiques et salles de formation réservables ; consultez le chapitre [Salles](../rooms/README.md) pour plus de détails

### Sécurité

* **Audit des activités**, **Tentatives de connexion**, **IDS simple**, **Vérificateur de robustesse des mots de passe**, **Intégrité des fichiers** — Outils de surveillance et d’audit de la sécurité ; consultez le chapitre [Sécurité](../security/README.md) pour plus de détails

### Plugins

* Raccourcis vers les plugins installés qui déclarent une page de menu d’administration, ainsi que la gestion générale des plugins — consultez le chapitre [Plugins](../plugins/README.md) pour plus de détails

### Contrôle de santé

* Contrôles en direct de type réussite/échec (paramètres de messagerie, attribution de l’URL d’administration, permissions des fichiers) — consultez la page [Contrôle de santé](../health-check.md) pour plus de détails

### Autres blocs

* **Chamilo.org**, **Vérification de version**, **Support professionnel**, **Actualités de Chamilo** — liens et panneaux d’état récupérant du contenu du projet Chamilo ; consultez [Autres blocs d’administration](../other-admin-blocks/README.md) pour plus de détails

Chaque section est traitée en détail dans le chapitre correspondant de ce guide.

Les méthodes d’authentification telles que OAuth2, LDAP, CAS et les autres fournisseurs d’authentification externe ne se configurent pas dans le tableau de bord d’administration, mais dans `config/authentication.yaml`.