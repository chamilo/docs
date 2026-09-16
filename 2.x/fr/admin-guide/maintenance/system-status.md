# État du Système

La page d'état du système vous aide à vérifier que votre serveur Chamilo est correctement configuré et à identifier d'éventuels problèmes.

## Accéder à l'État du Système

Depuis le panneau d'administration, cliquez sur **État du système** (ou **Informations système**).

## Ce qu'elle Affiche

![La page d'état du système montrant la configuration PHP, l'état de la base de données, les permissions des fichiers et les informations du serveur](/.gitbook/assets/admin-system-status.png)

### Configuration PHP

* **Version de PHP** — Chamilo 2.0 nécessite PHP 8.2 ou supérieur
* **Extensions requises** — Vérifie que toutes les extensions PHP nécessaires sont installées
* **Paramètres PHP** — Vérifie les paramètres PHP importants comme la limite de mémoire, les limites de téléversement et le temps d'exécution

### État de la Base de Données

* **Connexion à la base de données** — Confirme que la base de données est accessible
* **Version de la base de données** — Affiche la version du serveur de base de données

### Permissions des Fichiers

* **Répertoires inscriptibles** — Vérifie que Chamilo peut écrire dans les répertoires requis (cache, uploads, logs)

### Informations du Serveur

* **Système d'exploitation** — Détails du système d'exploitation du serveur
* **Serveur web** — Apache, Nginx, ou autre
* **Espace disque** — Stockage disponible

## Vérifications Recommandées

Effectuez ces vérifications régulièrement :

* **Après l'installation** — Vérifiez que toutes les exigences sont satisfaites
* **Après les mises à jour** — Assurez-vous que la version de PHP et les extensions restent compatibles
* **En cas de problèmes** — Consultez d'abord l'état du système lors du dépannage de problèmes