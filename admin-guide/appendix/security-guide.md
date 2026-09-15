# Guide de sécurité

Ce guide présente les bonnes pratiques de sécurité pour l’exploitation d’une plateforme Chamilo 3.0 en production. La sécurité est une responsabilité partagée entre le logiciel de la plateforme, la configuration de votre serveur et les pratiques opérationnelles continues.

Pour les outils de surveillance et d’audit intégrés mentionnés tout au long de ce guide (journaux des tentatives de connexion, détection d’intrusion, analyses de la robustesse des mots de passe et contrôles d’intégrité des fichiers), consultez le chapitre [Sécurité](../security/README.md).

## Maintenir Chamilo à jour

La pratique de sécurité la plus importante consiste à maintenir votre installation Chamilo à jour.

* Abonnez-vous au compte X de sécurité Chamilo (@chamilosecurity) ou surveillez le dépôt GitHub pour les annonces de versions.
* Appliquez les correctifs de sécurité sans délai. Les mises à jour mineures au sein de la branche 3.0 sont conçues pour pouvoir être appliquées en toute sécurité.
* Suivez le [processus de mise à niveau](../installation/upgrading.md) pour chaque mise à jour.

## HTTPS

Servez toujours Chamilo en HTTPS en production.

* Obtenez un certificat SSL/TLS (Let's Encrypt fournit des certificats gratuits via Certbot).
* Configurez votre serveur web pour rediriger tout le trafic HTTP vers HTTPS.
* Activez l’en-tête HSTS (HTTP Strict Transport Security) afin de prévenir les attaques par rétrogradation :

  ```
  Strict-Transport-Security: max-age=31536000; includeSubDomains
  ```

Sans HTTPS, les identifiants de connexion, les cookies de session et toutes les données utilisateur sont transmis en clair et peuvent être interceptés sur le réseau.

## Permissions des fichiers

Restreignez les permissions des fichiers au minimum nécessaire.

| Chemin | Propriétaire | Permissions | Remarques |
|------|-------|-------------|-------|
| Fichiers de l’application (code source) | root ou utilisateur de déploiement | 755 (répertoires), 644 (fichiers) | Le serveur web n’a besoin que d’un accès en lecture. |
| `var/` | utilisateur du serveur web | 775 | Doit être accessible en écriture pour le cache Symfony, les journaux et les téléversements de fichiers |
| `.env` | root ou utilisateur de déploiement | 640 | Contient des secrets. Le serveur web n’a besoin que d’un accès en lecture en usage normal, mais d’un accès en écriture pendant l’installation. |
| `config/` | root ou utilisateur de déploiement | 750 | Contient des secrets. Le serveur web n’a besoin que d’un accès en lecture en usage normal, mais d’un accès en écriture pendant l’installation. |

Ne définissez jamais les permissions à 777. Ne faites jamais s’exécuter le serveur web en tant que root.

## Politiques de mots de passe

Configurez des exigences de mots de passe robustes dans les [Paramètres de sécurité](../platform-settings/security-settings.md) :

* Longueur minimale de 8 caractères (12+ recommandé).
* Exiger un mélange de majuscules, minuscules, chiffres et caractères spéciaux.
* Envisagez d’activer l’expiration des mots de passe dans les environnements soumis à des exigences de conformité.
* Sensibilisez les utilisateurs au choix de mots de passe forts et uniques.

## Limitation de débit et protection contre le brute-force

### Niveau application

* Définissez **Nombre maximal de tentatives de connexion avant blocage du compte** (`login_max_attempt_before_blocking_account`) à une petite valeur (par exemple 5).
* Activez le **CAPTCHA** sur la page de connexion. Le CAPTCHA est activé ou désactivé — il ne s’active pas automatiquement après N connexions échouées. Associez-le à **Erreurs CAPTCHA avant blocage** (`captcha_number_mistakes_to_block_account`) pour verrouiller un compte qui échoue de façon répétée au CAPTCHA.
* Consultez périodiquement le rapport [Tentatives de connexion](../security/login-attempts.md) pour repérer des schémas de brute-force, et le rapport [Simple IDS](../security/simple-ids.md) pour les autres requêtes signalées (tentatives XSS, traversée de chemin, et similaires).

### Niveau serveur

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

Créez un filtre correspondant dans `/etc/fail2ban/filter.d/chamilo-auth.conf` pour correspondre aux entrées de journal d’échec d’authentification.

## Gestion des sessions

* Définissez une **durée de vie de session** raisonnable (par ex. 3600 secondes / 1 heure) dans les paramètres de sécurité.
* Configurez les **indicateurs de cookie de session** dans votre configuration Symfony :

  ```yaml
  # config/packages/framework.yaml
  framework:
      session:
          cookie_secure: true      # Only send over HTTPS
          cookie_httponly: true     # Not accessible via JavaScript
          cookie_samesite: lax     # CSRF protection
  ```

* Envisagez de désactiver « Se souvenir de moi » sur les plateformes contenant des contenus sensibles.

## En-têtes de sécurité HTTP

Configurez votre serveur web pour envoyer des en-têtes de sécurité :

| Header | Value | Purpose |
|--------|-------|---------|
| `X-Content-Type-Options` | `nosniff` | Empêche le sniffing de type MIME. |
| `X-Frame-Options` | `SAMEORIGIN` | Empêche le clickjacking via les iframes. |
| `X-XSS-Protection` | `1; mode=block` | Protection XSS héritée pour les navigateurs plus anciens. |
| `Referrer-Policy` | `strict-origin-when-cross-origin` | Contrôle la fuite d’informations de référent. |
| `Content-Security-Policy` | Variable | Contrôle les ressources pouvant être chargées. Nécessite un réglage soigneux pour Chamilo. |

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
* Configurez votre serveur web pour **ne jamais exécuter les fichiers téléversés**. Pour Apache, ajoutez à l’ensemble du répertoire var/ :

  ```apache
  <Directory /path/to/chamilo/var>
      php_admin_flag engine off
      RemoveHandler .php .phtml .php3 .php5
  </Directory>
  ```

* Analysez les fichiers téléversés avec un antivirus (ClamAV) si votre environnement l’exige.

## Sécurité de la base de données

* Utilisez un **utilisateur de base de données dédié** pour Chamilo, avec uniquement les privilèges nécessaires (SELECT, INSERT, UPDATE, DELETE, CREATE, ALTER, DROP, INDEX sur la base de données Chamilo).
* N’utilisez pas le compte root de la base de données.
* Veillez à ce que la base de données ne soit pas accessible depuis Internet public. Liez-la à localhost ou à un réseau privé.
* Activez la journalisation d’audit de la base de données pour les environnements soumis à des exigences de conformité.

## Sauvegardes

* Planifiez des **sauvegardes automatisées quotidiennes** de la base de données et des fichiers téléversés.
* Stockez les sauvegardes dans un emplacement distinct du serveur (hors site ou stockage cloud).
* Testez périodiquement la restauration des sauvegardes afin de vérifier qu’elles sont utilisables.
* Chiffrez les sauvegardes si elles contiennent des données sensibles.

Voir [Sauvegardes](../maintenance/backups.md) pour des instructions détaillées.

## Surveillance

* Surveillez les journaux Chamilo dans `var/log/prod.log` pour détecter les erreurs et les activités suspectes.
* Mettez en place une surveillance serveur (CPU, mémoire, disque) afin de détecter l’épuisement des ressources.
* Configurez des alertes en cas d’échecs d’authentification répétés.
* Examinez périodiquement les comptes utilisateurs pour repérer les comptes non autorisés ou inactifs.
* Planifiez des contrôles d’[intégrité des fichiers](../security/file-integrity.md) (Chamilo 3.0+) dans cron afin d’être notifié lorsque des fichiers installés changent de façon inattendue, et exécutez périodiquement le [vérificateur de robustesse des mots de passe](../security/password-strength-checker.md), en particulier après des importations d’utilisateurs en masse.

## Liste de contrôle

Utilisez cette liste de contrôle lors du déploiement ou de l’audit d’une installation Chamilo :

- [ ] HTTPS activé avec un certificat valide
- [ ] Redirection HTTP vers HTTPS configurée
- [ ] `APP_ENV=prod` et `APP_DEBUG=0` dans `.env`
- [ ] `APP_SECRET` unique généré
- [ ] Permissions de fichiers restreintes (pas de 777)
- [ ] Politique de mots de passe configurée
- [ ] Nombre maximal de tentatives de connexion et CAPTCHA activés
- [ ] Extensions de fichiers exécutables bloquées
- [ ] En-têtes de sécurité configurés sur le serveur web
- [ ] Indicateurs de cookie de session définis (secure, httponly, samesite)
- [ ] L’utilisateur de base de données dispose de privilèges minimaux
- [ ] Sauvegardes automatisées planifiées et testées
- [ ] Référence d’intégrité des fichiers établie et analyse planifiée dans cron (Chamilo 3.0+)
- [ ] Surveillance des journaux en place
- [ ] La version de Chamilo est à jour