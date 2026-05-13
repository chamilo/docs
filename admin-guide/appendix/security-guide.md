# Guide de sécurité

Ce guide couvre les meilleures pratiques de sécurité pour exploiter une plateforme Chamilo 2.0 en production. La sécurité est une responsabilité partagée entre le logiciel de la plateforme, la configuration de votre serveur et les pratiques opérationnelles continues.

## Maintenir Chamilo à jour

La pratique de sécurité la plus importante est de maintenir votre installation de Chamilo à jour.

* Abonnez-vous au compte X de sécurité de Chamilo (@chamilosecurity) ou surveillez le dépôt GitHub pour les annonces de nouvelles versions.
* Appliquez les correctifs de sécurité rapidement. Les mises à jour mineures dans la branche 2.0 sont conçues pour être appliquées en toute sécurité.
* Suivez le [processus de mise à jour](../installation/upgrading.md) pour chaque mise à jour.

## HTTPS

Servez toujours Chamilo via HTTPS en production.

* Obtenez un certificat SSL/TLS (Let's Encrypt fournit des certificats gratuits via Certbot).
* Configurez votre serveur web pour rediriger tout le trafic HTTP vers HTTPS.
* Activez l'en-tête HSTS (HTTP Strict Transport Security) pour prévenir les attaques de rétrogradation :

  ```
  Strict-Transport-Security: max-age=31536000; includeSubDomains
  ```

Sans HTTPS, les identifiants de connexion, les cookies de session et toutes les données des utilisateurs sont transmis en texte clair et peuvent être interceptés sur le réseau.

## Permissions des fichiers

Restreignez les permissions des fichiers au minimum nécessaire.

| Chemin | Propriétaire | Permissions | Notes |
|------|-------|-------------|-------|
| Fichiers d'application (code source) | root ou utilisateur de déploiement | 755 (répertoires), 644 (fichiers) | Le serveur web a besoin d'un accès en lecture seule. |
| `var/` | utilisateur du serveur web | 775 | Doit être accessible en écriture pour le cache Symfony, les journaux et les téléversements de fichiers |
| `.env` | root ou utilisateur de déploiement | 640 | Contient des secrets. Le serveur web a besoin d'un accès en lecture seule pendant une utilisation normale, mais nécessite un accès en écriture lors de l'installation. |
| `config/` | root ou utilisateur de déploiement | 750 | Contient des secrets. Le serveur web a besoin d'un accès en lecture seule pendant une utilisation normale, mais nécessite un accès en écriture lors de l'installation. |

Ne définissez jamais les permissions à 777. Ne faites jamais fonctionner le serveur web en tant que root.

## Politiques de mot de passe

Configurez des exigences strictes pour les mots de passe dans [Paramètres de sécurité](../platform-settings/security-settings.md) :

* Longueur minimale de 8 caractères (12+ recommandé).
* Exigez un mélange de majuscules, minuscules, chiffres et caractères spéciaux.
* Envisagez d'activer l'expiration des mots de passe pour les environnements soumis à des exigences de conformité.
* Sensibilisez les utilisateurs à choisir des mots de passe forts et uniques.

## Limitation de débit et protection contre les attaques par force brute

### Niveau de l'application

* Définissez **Nombre maximum de tentatives de connexion avant blocage du compte** (`login_max_attempt_before_blocking_account`) à une petite valeur (par exemple 5).
* Activez le **CAPTCHA** sur la page de connexion. Le CAPTCHA est activé/désactivé — il ne s'active pas automatiquement après N échecs de connexion. Associez-le à **Nombre d'erreurs CAPTCHA avant blocage** (`captcha_number_mistakes_to_block_account`) pour verrouiller un compte qui échoue continuellement au CAPTCHA.

### Niveau du serveur

Utilisez **fail2ban** pour surveiller les échecs de connexion et bloquer les adresses IP fautives :

```ini
# /etc/fail2ban/jail.d/chamilo.conf
[chamilo]
enabled = true
port = http,https
filter = chamilo-auth
logpath = /path/to/chamilo/var/log/prod.log
maxretry = 5
bantime = 900
```

Créez un filtre correspondant dans `/etc/fail2ban/filter.d/chamilo-auth.conf` pour détecter les entrées de journal d'échec d'authentification.

## Gestion des sessions

* Définissez une **durée de vie de session** raisonnable (par exemple, 3600 secondes / 1 heure) dans les paramètres de sécurité.
* Configurez les **indicateurs de cookie de session** dans votre configuration Symfony :

  ```yaml
  # config/packages/framework.yaml
  framework:
      session:
          cookie_secure: true      # Envoyer uniquement via HTTPS
          cookie_httponly: true     # Non accessible via JavaScript
          cookie_samesite: lax     # Protection contre le CSRF
  ```

* Envisagez de désactiver l'option "Se souvenir de moi" sur les plateformes contenant des contenus sensibles.

## En-têtes de sécurité HTTP

Configurez votre serveur web pour envoyer des en-têtes de sécurité :

| En-tête | Valeur | Objectif |
|--------|-------|---------|
| `X-Content-Type-Options` | `nosniff` | Empêche la détection de type MIME. |
| `X-Frame-Options` | `SAMEORIGIN` | Empêche le clickjacking via des iframes. |
| `X-XSS-Protection` | `1; mode=block` | Protection XSS héritée pour les anciens navigateurs. |
| `Referrer-Policy` | `strict-origin-when-cross-origin` | Contrôle la fuite d'informations de référence. |
| `Content-Security-Policy` | Varie | Contrôle les ressources pouvant être chargées. Nécessite un réglage minutieux pour Chamilo. |

Exemple pour Apache :

```apache
Header always set X-Content-Type-Options "nosniff"
Header always set X-Frame-Options "SAMEORIGIN"
Header always set Referrer-Policy "strict-origin-when-cross-origin"
```

Exemple pour Nginx :

```nginx
add_header X-Content-Type-Options "nosniff" always;
add_header X-Frame-Options "SAMEORIGIN" always;
add_header Referrer-Policy "strict-origin-when-cross-origin" always;
```

## Sécurité des téléversements de fichiers

* Bloquez les extensions de fichiers exécutables (exe, bat, sh, php, phtml, cgi) dans [Paramètres de sécurité](../platform-settings/security-settings.md).
* Configurez votre serveur web pour **ne jamais exécuter les fichiers téléversés**. Pour Apache, ajoutez au répertoire var/ entier :

  ```apache
  <Directory /path/to/chamilo/var>
      php_admin_flag engine off
      RemoveHandler .php .phtml .php3 .php5
  </Directory>
  ```

* Analysez les fichiers téléversés avec un antivirus (ClamAV) si votre environnement l'exige.

## Sécurité de la base de données

* Utilisez un **utilisateur de base de données dédié** pour Chamilo avec uniquement les privilèges nécessaires (SELECT, INSERT, UPDATE, DELETE, CREATE, ALTER, DROP, INDEX sur la base de données Chamilo).
* N'utilisez pas le compte root de la base de données.
* Assurez-vous que la base de données n'est pas accessible depuis l'internet public. Liez-la à localhost ou à un réseau privé.
* Activez la journalisation d'audit de la base de données pour les environnements sensibles à la conformité.

## Sauvegardes

* Planifiez des **sauvegardes automatisées quotidiennes** de la base de données et des fichiers téléversés.
* Stockez les sauvegardes dans un emplacement séparé du serveur (hors site ou stockage cloud).
* Testez périodiquement la restauration des sauvegardes pour vérifier qu'elles sont utilisables.
* Chiffrez les sauvegardes si elles contiennent des données sensibles.

Consultez [Sauvegardes](../maintenance/backups.md) pour des instructions détaillées.

## Surveillance

* Surveillez les journaux de Chamilo à `var/log/prod.log` pour détecter les erreurs et les activités suspectes.
* Configurez la surveillance du serveur (CPU, mémoire, disque) pour détecter l'épuisement des ressources.
* Configurez des alertes pour les échecs d'authentification répétés.
* Examinez périodiquement les comptes utilisateurs pour repérer les comptes non autorisés ou inactifs.

## Liste de contrôle

Utilisez cette liste de contrôle lors du déploiement ou de l'audit d'une installation de Chamilo :

- [ ] HTTPS activé avec un certificat valide
- [ ] Redirection HTTP vers HTTPS configurée
- [ ] `APP_ENV=prod` et `APP_DEBUG=0` dans `.env`
- [ ] `APP_SECRET` unique généré
- [ ] Permissions des fichiers restreintes (pas de 777)
- [ ] Politique de mot de passe configurée
- [ ] Nombre maximum de tentatives de connexion et CAPTCHA activés
- [ ] Extensions de fichiers exécutables bloquées
- [ ] En-têtes de sécurité configurés sur le serveur web
- [ ] Indicateurs de cookie de session définis (secure, httponly, samesite)
- [ ] Utilisateur de la base de données avec privilèges minimaux
- [ ] Sauvegardes automatisées planifiées et testées
- [ ] Surveillance des journaux en place
- [ ] Version de Chamilo à jour