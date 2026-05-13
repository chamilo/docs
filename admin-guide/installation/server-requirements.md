# Exigences du serveur

Avant d'installer Chamilo 2.0, vérifiez que votre serveur répond aux exigences suivantes.

## Exigences logicielles

### PHP

| Exigence | Minimum | Recommandé |
|----------|---------|------------|
| **Version de PHP** | 8.2 | 8.3 ou ultérieure |

### Extensions PHP requises

| Extension | Objectif |
|-----------|----------|
| **curl** | Requêtes HTTP (intégrations API, services externes) |
| **fileinfo** | Détection du type MIME pour les fichiers téléversés |
| **gd** | Traitement d'images (miniatures, CAPTCHA) |
| **intl** | Internationalisation (formatage des dates, nombres et chaînes de caractères) |
| **json** | Encodage/décodage JSON |
| **ldap** | Connecteur LDAP. Bien que vous n'utilisiez probablement pas LDAP, Chamilo en a besoin |
| **mbstring** | Gestion des chaînes multibytes (support UTF-8) |
| **openssl** | Opérations cryptographiques (HTTPS, hachage de mots de passe, jetons) |
| **pdo_mysql** ou **pdo_pgsql** | Connexion à la base de données (installez celui correspondant à votre base de données) |
| **xml** | Analyse XML (SCORM, RSS, SOAP) |
| **zip** | Gestion des archives ZIP (paquets SCORM, imports/exports en masse) |
| **apcu** | Mise en cache au niveau utilisateur (recommandé) |
| **opcache** | Mise en cache d'opcode (fortement recommandé pour les performances) |
| **xapian** | Recherche en texte intégral (optionnel, uniquement si vous utilisez la recherche) |

### Base de données

| Base de données | Version minimale |
|-----------------|------------------|
| **MySQL** | 8.0 |
| **MariaDB** | 10.4 |

### Serveur web

| Serveur | Remarques |
|---------|-----------|
| **Apache** | Nécessite l'activation de `mod_rewrite`. |
| **Nginx** | Nécessite une configuration manuelle pour la réécriture d'URL. Consultez la documentation Nginx de Symfony pour une configuration de référence. |

### Outils de construction

| Outil | Objectif |
|-------|----------|
| **Composer** | Gestion des dépendances PHP. Nécessaire pour installer les bibliothèques PHP de Chamilo. |
| **Node.js** (18+) | Environnement d'exécution JavaScript. Nécessaire pour construire les ressources frontend. |
| **npm** | Gestionnaire de paquets JavaScript. Installé avec Node.js. |

## Exigences matérielles

| Ressource | Minimum | Recommandé |
|-----------|---------|------------|
| **RAM** | 2 Go | 4 Go ou plus |
| **CPU** | 1 cœur | 2 cœurs ou plus |
| **Espace disque** | 2 Go (application uniquement) | 20 Go ou plus (incluant le contenu téléversé) |
| **Type de disque** | HDD | SSD (améliore significativement les performances de la base de données et du cache) |

Ces chiffres sont des valeurs de base. Les exigences réelles dépendent du nombre d'utilisateurs simultanés et du volume de contenu hébergé.

## Système d'exploitation

| Système d'exploitation | Remarques |
|------------------------|-----------|
| **Linux** | Recommandé. Ubuntu 22.04+, Debian 12+, AlmaLinux 9+, ou équivalent. |
| **Windows** | Possible mais non testé de manière approfondie. Utilisez WSL2 pour le développement. |
| **macOS** | Développement uniquement / non testé. |

## Exigences réseau

* Un nom de domaine pointant vers votre serveur.
* Un certificat SSL/TLS pour HTTPS (Let's Encrypt fournit des certificats gratuits).
* Accès SMTP sortant si vous envoyez des e-mails directement (ou utilisez un service de messagerie tiers).
* Port 443 (HTTPS) et éventuellement port 80 (HTTP, pour redirection vers HTTPS).

## Vérification des exigences

Après avoir placé la source de Chamilo sur votre serveur, vous pouvez vérifier directement votre configuration PHP :

```bash
php -m          # Liste des extensions installées
php -i          # Informations complètes sur PHP
```

## Conseils

* **Utilisez PHP-FPM** avec Apache ou Nginx pour de meilleures performances par rapport à mod_php.
* **Séparez votre base de données** sur un serveur dédié pour les plateformes prévoyant plus de 500 utilisateurs simultanés.
* **Utilisez un stockage SSD** -- Les applications fortement dépendantes de la base de données comme Chamilo bénéficient considérablement d'une E/S disque rapide.