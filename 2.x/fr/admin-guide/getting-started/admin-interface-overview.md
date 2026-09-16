# Aperçu de l'interface d'administration

Le panneau d'administration est votre centre de commande pour gérer la plateforme Chamilo. Accédez-y en cliquant sur **Administration** <img src="/.gitbook/assets/icons/mdi-cogs.svg" alt="Administration" data-size="line"> dans la barre latérale.

## Tableau de bord d'administration

![Le tableau de bord d'administration affichant les blocs fonctionnels pour les Utilisateurs, les Cours, les Sessions et les Paramètres](/.gitbook/assets/admin-dashboard-overview.png)

Le tableau de bord d'administration est organisé en blocs fonctionnels. Chaque bloc regroupe des outils de gestion connexes :

### Utilisateurs

* **Liste des utilisateurs** — Voir, rechercher, modifier et gérer tous les utilisateurs de la plateforme
* **Ajouter un utilisateur** — Créer des comptes utilisateurs individuels
* **Groupes d'utilisateurs** — Gérer des groupes d'utilisateurs à des fins organisationnelles
* **Classes** — Gérer les classes d'utilisateurs pour l'inscription en masse aux sessions

### Cours

* **Liste des cours** — Voir et gérer tous les cours sur la plateforme
* **Créer un cours** — Créer un nouveau cours
* **Catégories de cours** — Organiser les cours en catégories pour le catalogue

### Sessions

* **Liste des sessions** — Voir et gérer les sessions de formation
* **Créer une session** — Configurer une nouvelle session avec des cours et des inscriptions
* **Catégories de sessions** — Organiser les sessions en catégories
* **Carrières et promotions** — Gérer les parcours professionnels et les flux de promotion

### Paramètres de la plateforme

* **Paramètres de configuration** — Accéder au panneau complet des paramètres de la plateforme avec des catégories pour le portail, les cours, les sessions, les utilisateurs, la sécurité, et plus encore

### Plugins

* **Gérer les plugins** — Installer, activer, configurer et désactiver les plugins de la plateforme

### Système

* **État du système** — Vérifier la configuration PHP, l'état de la base de données et la santé du serveur
* **Nettoyage des archives** — Gérer les fichiers temporaires et les caches

### Personnalisation de la marque

* **Couleurs** — Personnaliser l'apparence visuelle de la plateforme
* **Personnalisation du portail** — Configurer la page d'accueil du portail, les actualités et les éléments de marque

Chaque section est abordée en détail dans le chapitre correspondant de ce guide.

Les méthodes d'authentification telles que OAuth2, LDAP, CAS et autres fournisseurs d'authentification externes ne sont pas configurées dans le tableau de bord d'administration, mais dans `config/authentication.yaml`.