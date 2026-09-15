# Installation

Cette section couvre tout ce dont vous avez besoin pour installer et configurer Chamilo 3.0 sur votre serveur.

Chamilo 3.0 est une application PHP construite sur le framework Symfony. Elle peut s’exécuter sur la plupart des serveurs basés sur Linux, a été installée et fonctionne sur Windows Server avec IIS, et prend en charge les backends MySQL et MariaDB.

## Installation Steps

1. **[Exigences serveur](server-requirements.md)** — Vérifiez que votre serveur satisfait aux exigences minimales
2. **[Assistant d’installation](installation-wizard.md)** — Exécutez l’assistant d’installation web
3. **[Configuration](configuration.md)** — Configurez les variables d’environnement et les paramètres Symfony
4. **[Stockage cloud](cloud-storage.md)** — Mettez en place les backends de stockage cloud (facultatif)
5. **[Configuration e-mail](email-configuration.md)** — Configurez la livraison des e-mails
6. **[Mise à niveau](upgrading.md)** — Mettez à niveau depuis une version précédente

## Aperçu rapide

Le processus d’installation de base est le suivant :

1. Téléchargez ou clonez le code source de Chamilo
2. Installez les dépendances PHP avec Composer si vous préparez à partir des sources
3. Installez les dépendances JavaScript avec npm/yarn et compilez les ressources frontend
4. Créez un fichier `.env` vide pour y stocker plus tard vos identifiants de base de données et autres paramètres
5. Modifiez les permissions (écriture par le serveur web) sur *var/*, *config/* et *.env*
6. Exécutez l’assistant d’installation web
7. Connectez-vous avec votre premier compte administrateur
8. Rétablissez les permissions sur *config/* et *.env*

Les instructions détaillées pour chaque étape se trouvent dans les pages liées ci-dessus.