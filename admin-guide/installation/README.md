# Installation

Cette section couvre tout ce que vous devez savoir pour installer et configurer Chamilo 2.0 sur votre serveur.

Chamilo 2.0 est une application PHP construite sur le framework Symfony. Elle peut fonctionner sur la plupart des serveurs basés sur Linux, a été installée et fonctionne sur Windows Server avec IIS, et prend en charge les bases de données MySQL et MariaDB.

## Étapes d'installation

1. **[Exigences du serveur](server-requirements.md)** — Vérifiez que votre serveur répond aux exigences minimales
2. **[Assistant d'installation](installation-wizard.md)** — Lancez l'assistant d'installation basé sur le web
3. **[Configuration](configuration.md)** — Configurez les variables d'environnement et les paramètres de Symfony
4. **[Stockage cloud](cloud-storage.md)** — Configurez les backends de stockage cloud (optionnel)
5. **[Configuration des e-mails](email-configuration.md)** — Configurez l'envoi des e-mails
6. **[Mise à niveau](upgrading.md)** — Effectuez une mise à niveau depuis une version précédente

## Aperçu rapide

Le processus d'installation de base est le suivant :

1. Téléchargez ou clonez le code source de Chamilo
2. Installez les dépendances PHP avec Composer si vous préparez à partir du code source
3. Installez les dépendances JavaScript avec npm/yarn et construisez les ressources frontend
4. Créez un fichier `.env` vide pour stocker vos identifiants de base de données et autres paramètres ultérieurement
5. Modifiez les permissions (accessible en écriture par le serveur web) sur *var/*, *config/* et *.env*
6. Lancez l'assistant d'installation basé sur le web
7. Connectez-vous avec votre premier compte administrateur
8. Rétablissez les permissions sur *config/* et *.env*

Des instructions détaillées pour chaque étape sont disponibles dans les pages liées ci-dessus.