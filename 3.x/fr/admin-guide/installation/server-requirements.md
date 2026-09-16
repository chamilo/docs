# Prérequis serveur

Avant d’installer Chamilo 3.0, vérifiez que votre serveur répond aux exigences suivantes.

## Prérequis logiciels

### PHP

| Exigence | Minimum | Recommandé |
|-------------|---------|-------------|
| **Version PHP** | 8.3 | 8.5 |

### Extensions PHP requises

| Extension | Rôle |
|-----------|---------|
| **bcmath** | Calculs en précision arbitraire |
| **ctype** | Vérification du type de caractères |
| **curl** | Requêtes HTTP (intégrations API, services externes) |
| **dom**, **libxml**, **simplexml**, **xml**, **xmlreader** | Analyse XML et gestion du DOM (SCORM, RSS, SOAP, LTI) |
| **exif** | Lecture des métadonnées d’images (p. ex. orientation automatique des photos téléversées) |
| **fileinfo** | Détection du type MIME des fichiers téléversés |
| **gd** | Traitement d’images (miniatures, CAPTCHA) |
| **iconv** | Conversion de jeux de caractères |
| **intl** | Internationalisation (formatage des dates, nombres et chaînes) |
| **json** | Encodage/décodage JSON |
| **ldap** | Connecteur LDAP. Bien que vous n’utilisiez probablement pas LDAP, Chamilo l’exige |
| **mbstring** | Gestion des chaînes multi-octets (prise en charge UTF-8) |
| **openssl** | Opérations cryptographiques (HTTPS, hachage des mots de passe, jetons JWT) |
| **pdo**, plus **pdo_mysql** ou **pdo_pgsql** | Connexion à la base de données (installez le pilote correspondant à votre base) |
| **soap** | Gestion des services web SOAP |
| **zip** | Gestion des archives ZIP (paquets SCORM, imports/exports en masse) |
| **zlib** | Compression utilisée en interne par plusieurs dépendances |
| **apcu** | Cache au niveau utilisateur (recommandé, vérifié mais non imposé par l’installateur) |
| **opcache** | Cache d’opcodes (fortement recommandé pour les performances, vérifié mais non imposé par l’installateur) |
| **xapian** | Recherche plein texte (optionnel, uniquement si vous utilisez la recherche) |

### Base de données

| Base de données | Version minimale | Recommandé |
|----------|-----------------|-------------|
| **MariaDB** | 10.0 | 10.4 ou supérieure |
| **MySQL** | 5.7 | 8.0 ou supérieure |

Les versions de MariaDB antérieures à 10.2.2 (et les versions de MySQL antérieures à 5.7) nécessitent l’activation manuelle de la prise en charge des index/préfixes longs dans la configuration du serveur avant d’installer Chamilo.

### Serveur web

| Serveur | Remarques |
|--------|-------|
| **Apache** | Nécessite `mod_rewrite` (ainsi que `ssl`, `headers`, `expires`) activés. Chamilo fournit un exemple de vhost dans `public/main/install/apache.dist.conf`. |
| **Nginx** | Nécessite une configuration manuelle pour la réécriture d’URL — Chamilo ne fournit pas d’exemple de configuration Nginx. Consultez la documentation Nginx de Symfony pour une configuration de référence. |

### Outils de compilation

| Outil | Rôle |
|------|---------|
| **Composer** (^2.8) | Gestion des dépendances PHP. Requis pour installer les bibliothèques PHP de Chamilo. |
| **Node.js** (20+ LTS) | Environnement d’exécution JavaScript. Requis pour compiler les ressources frontend. |
| **Yarn** (^4, via Corepack) | Gestionnaire de paquets JavaScript utilisé pour compiler les ressources frontend (`yarn install`, `yarn encore production`). |

## Prérequis matériels

| Ressource | Minimum | Recommandé |
|----------|---------|-------------|
| **RAM** | 4 Go | 8 Go ou plus (la compilation des ressources frontend à partir des sources nécessite à elle seule au moins 4 Go) |
| **CPU** | 2 vCPU | 2 cœurs ou plus |
| **Espace disque** | 4 Go (application uniquement) | 20 Go ou plus (contenu téléversé inclus) ; la compilation à partir des sources nécessite ~10 Go libres pendant la compilation |
| **Type de disque** | HDD | SSD (améliore nettement les performances de la base de données et du cache) |

Ces chiffres sont des valeurs de base issues du guide d’installation de Chamilo. Les besoins réels dépendent du nombre d’utilisateurs simultanés et du volume de contenu hébergé.

## Système d’exploitation

| OS | Remarques |
|----|-------|
| **Linux** | Recommandé. Ubuntu 24.04 LTS+, Debian 12+, AlmaLinux 9+, ou équivalent. |
| **Windows** | Possible mais non testé de manière approfondie. Utilisez WSL2 pour le développement. |
| **macOS** | Développement uniquement / non testé. |

## Prérequis réseau

* Un nom de domaine pointant vers votre serveur.
* Un certificat SSL/TLS pour HTTPS (Let's Encrypt fournit des certificats gratuits).
* Un accès SMTP sortant si vous envoyez les e-mails directement (ou utilisez un service d’e-mail tiers).
* Le port 443 (HTTPS) et éventuellement le port 80 (HTTP, pour la redirection vers HTTPS).

## Vérification des prérequis

Après avoir déposé les sources de Chamilo sur votre serveur, vous pouvez vérifier votre configuration PHP directement :

```bash
php -m          # List installed extensions
php -i          # Full PHP info
```

## Conseils

* **Utilisez PHP-FPM** avec Apache ou Nginx pour de meilleures performances que mod_php.
* **Séparez votre base de données** sur un serveur dédié pour les plateformes prévoyant plus de 500 utilisateurs simultanés.
* **Utilisez un stockage SSD** -- Les applications fortement basées sur une base de données comme Chamilo bénéficient nettement d’entrées/sorties disque rapides.