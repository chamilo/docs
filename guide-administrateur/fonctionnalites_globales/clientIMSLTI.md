# Plugin Client IMS/LTI

Le support de Client LTI a été inclus dans Chamilo depuis la version 1.11.2 en tant que plugin et sera inclus dans le noyau plus tard.

L'activation du plugin permet dans la dernière version de connecter des fournisseurs LTI 1.0, 1.1, 1.1.1, Deep Linking 1.x, Outcome Services 1.x et LTI 1.3

## Activation du plugin

Il faut activer le plugin Client IMS/LTI, puis dans la configuration du plugin cocher la case "activé" puis cliquer sur le bouton "Régions" en dessous du nom du plugin pour lui assigner la région "menu_administration".

Cela rend disponible un nouveau bloc "Plugins" sur la page d'administration avec l'entrée "Client IMS/LTI"

## Création d'un nouveau client

Maintenant sur la page d'administration en dessous du bloc "Système" on retrouve un nouveau bloc "Plugins" avec une entrée "Client IMS/LTI" qui renvoie vers la page /plugin/ims_lti/admin.php
Sur cette page il y a :
 - sur la droite un lien "Clefs de la plateforme"
Cela ouvre la page /plugin/ims_lti/platform.php sur laquelle on trouve la clé publique à indiquer au fournisseur.
 - Sur la gauche un bouton "Ajouter un outil externe"
Cela ouvre la page /plugin/ims_lti/create.php qui permet de saisir les informations du fournisseur pour créer le nouvel enregistrement dans Chamilo et obtenir les informations nécessaire pour wooclap.

Une fois que l'on a créé un nouvel outil avec le bouton "Ajouter un outil externe" on revient sur la page /plugin/ims_lti/admin.php qui montre la liste des outils. Pour chaque outil on voit l'URL de démarrage (Launch URL) et ensuite dans la colonne "Action" on a l'icône "Paramètres de configuration pour l'outil" qui ouvre une popup avec les informations suivantes :
 - ID de plateforme
 - ID de déploiement
 - ID du client
 - URL de OIDC Auth
 - URL de OAuth2 Access Token
 - URL de config des clefs (Keyset)

Ensuite il y a des icônes pour rendre disponible l'outil dans des cours et/ou des sessions.
