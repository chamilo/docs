# Prérequis serveur

Avant d'installer Chamilo 3.0, vérifiez que votre serveur satisfait aux exigences suivantes.

## Prérequis logiciels

### PHP

| Exigence | Minimum | Recommandé |
|-------------|---------|-------------|
| **Version de PHP** | 8.3 | 8.5 |

### Extensions PHP requises

| Extension | Rôle |
|-----------|---------|
| **bcmath** | Calculs en précision arbitraire |
| **ctype** | Vérification du type de caractères |
| **curl** | Requêtes HTTP (intégrations d'API, services externes) |
| **dom**, **libxml**, **simplexml**, **xml**, **xmlreader** | Analyse XML et gestion du DOM (SCORM, RSS, SOAP, LTI) |
| **exif** | Lecture des métadonnées d'image (p. ex. orientation automatique des photos téléversées) |
| **fileinfo** | Détection du type MIME des fichiers téléversés |
| **gd** | Traitement d'images (miniatures, CAPTCHA) |
| **iconv** | Conversion de jeux de caractères |
| **intl** | Internationalisation (formatage des dates, des nombres et des chaînes) |
| **json** | Encodage et décodage JSON |
| **ldap** | Connecteur LDAP. Même si vous n'utiliserez probablement pas LDAP, Chamilo l'exige |
| **mbstring** | Gestion des chaînes multioctets (prise en charge UTF-8) |
| **openssl** | Opérations cryptographiques (HTTPS, hachage des mots de passe, jetons JWT) |
| **pdo**, ainsi que **pdo_mysql** | Connectivité à la base de données (pilote PDO MySQL/MariaDB) |
| **soap** | Gestion des services web SOAP |
| **zip** | Gestion des archives ZIP (paquets SCORM, importations et exportations en masse) |
| **zlib** | Compression utilisée en interne par plusieurs dépendances |
| **apcu** | Mise en cache au niveau utilisateur (recommandée, vérifiée mais non imposée par l'installateur) |
| **opcache** | Mise en cache des opcodes (fortement recommandée pour les performances, vérifiée mais non imposée par l'installateur) |
| **xapian** | Recherche plein texte (facultative, uniquement si vous utilisez la recherche) |

### Base de données

| Base de données | Version minimale | Recommandée |
|----------|-----------------|-------------|
| **MariaDB** | 10.0 | 10.4 ou supérieure |
| **MySQL** | 5.7 | 8.0 ou supérieure |

Les versions de MariaDB antérieures à 10.2.2 (et les versions de MySQL antérieures à 5.7) nécessitent l'activation manuelle de la prise en charge des index et préfixes de grande taille dans la configuration du serveur avant l'installation de Chamilo.

### Serveur web

| Serveur | Remarques |
|--------|-------|
| **Apache** | Nécessite l'activation de `mod_rewrite` (ainsi que de `ssl`, `headers` et `expires`). Chamilo fournit un exemple de vhost dans `public/main/install/apache.dist.conf`. |
| **Nginx** | Nécessite une configuration manuelle pour la réécriture d'URL — Chamilo ne fournit pas d'exemple de configuration Nginx. Consultez la documentation Nginx de Symfony pour une configuration de référence. |

### Outils de compilation

| Outil | Rôle |
|------|---------|
| **Composer** (^2.8) | Gestion des dépendances PHP. Requis pour installer les bibliothèques PHP de Chamilo. |
| **Node.js** (20+ LTS) | Environnement d'exécution JavaScript. Requis pour compiler les ressources frontales. |
| **Yarn** (^4, via Corepack) | Gestionnaire de paquets JavaScript utilisé pour compiler les ressources frontales (`yarn install`, `yarn encore production`). |

## Prérequis matériels

| Ressource | Minimum | Recommandé |
|----------|---------|-------------|
| **RAM** | 4 Go | 8 Go ou plus (la compilation des ressources frontales à partir des sources nécessite à elle seule au moins 4 Go) |
| **CPU** | 2 vCPU | 2 cœurs ou plus |
| **Espace disque** | 4 Go (application uniquement) | 20 Go ou plus (y compris le contenu téléversé) ; la compilation à partir des sources nécessite environ 10 Go libres pendant la compilation |
| **Type de disque** | HDD | SSD (améliore nettement les performances de la base de données et du cache) |

Il s'agit de valeurs de référence issues du guide d'installation de Chamilo. Les besoins réels dépendent du nombre d'utilisateurs simultanés et du volume de contenu hébergé.

## Système d'exploitation

| OS | Remarques |
|----|-------|
| **Linux** | Recommandé. Ubuntu 24.04 LTS ou ultérieure, Debian 12 ou ultérieure, AlmaLinux 9 ou ultérieure, ou équivalent. |
| **Windows** | Possible, mais non testé de manière approfondie. Utilisez WSL2 pour le développement. |
| **macOS** | Développement uniquement / non testé. |

## Prérequis réseau

* Un nom de domaine pointant vers votre serveur.
* Un certificat SSL/TLS pour HTTPS (Let's Encrypt fournit des certificats gratuits).
* Un accès SMTP sortant si vous envoyez des courriels directement (ou utilisez un service de messagerie tiers).
* Le port 443 (HTTPS) et, éventuellement, le port 80 (HTTP, pour la redirection vers HTTPS).

## Vérification des prérequis

Après avoir placé les sources de Chamilo sur votre serveur, vous pouvez vérifier directement votre configuration PHP :

```bash
php -m          # List installed extensions
php -i          # Full PHP info
```

## Conseils

* **Utilisez PHP-FPM** avec Apache ou Nginx pour de meilleures performances que mod_php.
* **Séparez votre base de données** sur un serveur dédié pour les plateformes qui prévoient plus de 500 utilisateurs simultanés.
* **Utilisez un stockage SSD** -- Les applications fortement dépendantes de la base de données, comme Chamilo, tirent un avantage notable d'E/S disque rapides.