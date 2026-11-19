# Paramètres de sécurité

Protection de la connexion, politique de mots de passe, en-têtes de sécurité du contenu, authentification à deux facteurs et système léger de détection d'intrusion.

Cette page traite de la *politique* de sécurité. Pour les outils de surveillance qui observent la plateforme en appliquant cette politique (journaux des tentatives de connexion, événements de détection d'intrusion, analyses de robustesse des mots de passe et contrôles d'intégrité des fichiers), voir [Sécurité](../security/README.md).

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Sécurité**. Cette catégorie contient **40 paramètres**, listés ci-dessous avec le titre et le commentaire livrés dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en police monospace. Utilisez-le lors de scripts via l'API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `2fa_enable`

**Activer la 2FA**

Ajoute des champs sur la page de mise à jour du mot de passe pour activer la 2FA à l'aide d'une application d'authentification TOTP. Lorsqu'elle est désactivée globalement, les utilisateurs ne voient pas les champs 2FA et ne sont pas invités à saisir la 2FA à la connexion, même s'ils l'avaient activée auparavant.

*Valeur par défaut : `false`*

### `access_to_personal_file_for_all`

**Accès au fichier personnel pour tous**

Autorise l'accès à tous les fichiers personnels sans restriction

*Valeur par défaut : `false`*


### `admins_can_set_users_pass`

**Les administrateurs peuvent définir manuellement les mots de passe des utilisateurs**

[inféré] Lorsqu'il est activé, les administrateurs peuvent définir manuellement les mots de passe des utilisateurs directement, sans exiger que les utilisateurs les réinitialisent.

### `allow_captcha`

**CAPTCHA**

Active un CAPTCHA sur le formulaire de connexion, le formulaire d'inscription et le formulaire de mot de passe oublié afin d'éviter le martelage de mots de passe

*Valeur par défaut : `false`*

### `allow_online_users_by_status`

**Filtrer les utilisateurs visibles comme étant en ligne**

Limite la visibilité des utilisateurs en ligne à des rôles d'utilisateur spécifiques.

### `allow_strength_pass_checker`

**Vérificateur de robustesse du mot de passe**

Activez cette option pour ajouter un indicateur visuel de la robustesse du mot de passe lorsque l'utilisateur modifie son mot de passe. Cela n'empêchera PAS l'ajout de mauvais mots de passe ; cela agit uniquement comme une aide visuelle.

*Valeur par défaut : `true`*


### `anonymous_autoprovisioning`

**Approvisionner automatiquement davantage d'utilisateurs anonymes**

Crée dynamiquement de nouveaux utilisateurs anonymes afin de prendre en charge un trafic élevé de visiteurs.

*Valeur par défaut : `false`*


### `captcha_number_mistakes_to_block_account`

**Tolérance d'erreurs CAPTCHA**

Nombre de fois qu'un utilisateur peut se tromper dans le champ CAPTCHA avant que son compte ne soit verrouillé.

### `captcha_time_to_block`

**Durée de verrouillage du compte CAPTCHA**

Si l'utilisateur atteint la tolérance maximale d'erreurs de connexion (lors de l'utilisation du CAPTCHA), son compte sera verrouillé pendant ce nombre de minutes.

### `check_password`

**Vérifier les exigences du mot de passe**

Active la validation des exigences de mot de passe définies ci-dessus lors de la création ou de la mise à jour d'un mot de passe.

*Valeur par défaut : `false`*


### `confidential_reporting_attachments_enabled`

**Autoriser les pièces jointes de preuves confidentielles**

Détermine si les déclarants peuvent joindre des fichiers de preuves à un signalement confidentiel.

*Valeur par défaut : `true`*

### `confidential_reporting_enabled`

**Activer le signalement confidentiel de bien-être**

Active le flux de travail de signalement confidentiel et d'enquête. Le stockage privé des clés de chiffrement doit être prêt avant de l'activer. Voir [Signalement confidentiel](../security/confidential-reporting.md).

*Valeur par défaut : `false`*

### `confidential_reporting_min_reporters`

**Nombre minimal de déclarants distincts pour une enquête**

Une enquête devient visible pour les enquêteurs autorisés uniquement après que ce nombre de déclarants distincts a soumis des signalements concernant la même personne. Plage valide : **2–10**.

*Valeur par défaut : `2`*

### `confidential_reporting_notifications_enabled`

**Afficher les notifications d'enquête confidentielle**

Affiche une indication interne des enquêtes éligibles. **Cela n'envoie pas d'e-mails ni de notifications externes.**

*Valeur par défaut : `false`*

### `dynamic_client_registration`

**Activer l'enregistrement dynamique de clients OAuth au-delà de MCP**

Contrôle la validation supplémentaire du périmètre d'enregistrement des clients OAuth lorsque le serveur OAuth est activé. Le point de terminaison d'enregistrement limité en débit reste disponible pour le flux d'enregistrement MCP pris en charge. Ce paramètre n'accorde pas l'accès à des ressources protégées OAuth futures arbitraires. Voir [Serveur d'autorisation OAuth](../authentication/oauth-server.md).

*Valeur par défaut : `false`*

### `file_integrity_check_notify_admins` **v3**

**Destinataires des notifications de contrôle d'intégrité des fichiers**

Liste d'adresses e-mail séparées par des virgules à notifier lorsqu'une analyse d'intégrité des fichiers détecte une modification. Laissez vide pour notifier plutôt chaque administrateur global.

### `filter_terms`

**Filtrer les termes**

Indiquez une liste de termes, un par ligne, à filtrer des pages web et des e-mails. Ces termes seront remplacés par ***.

### `force_renew_password_at_first_login`

**Forcer le renouvellement du mot de passe à la première connexion**

Il s'agit d'une mesure simple pour renforcer la sécurité de votre portail en demandant aux utilisateurs de changer immédiatement leur mot de passe, de sorte que celui transmis par e-mail ne soit plus valide et qu'ils utilisent ensuite un mot de passe qu'ils ont choisi et qu'ils sont les seuls à connaître.

*Valeur par défaut : `false`*


### `hide_breadcrumb_if_not_allowed`

**Masquer le fil d'Ariane si « non autorisé »**

Si l'utilisateur n'est pas autorisé à accéder à une page donnée, masquer également le fil d'Ariane. Cela renforce la sécurité en évitant l'affichage d'informations inutiles.

*Valeur par défaut : `false`*


### `login_max_attempt_before_blocking_account`

**Nombre maximal de tentatives de connexion avant verrouillage**

Nombre de tentatives de connexion échouées à tolérer avant que le compte utilisateur soit verrouillé et doive être déverrouillé par un administrateur.

*Valeur par défaut : `0`*

### `mcp_allowed_roles`

**Autoriser MCP selon les rôles**

Carte JSON des rôles utilisateur Chamilo autorisés à utiliser MCP. Un utilisateur doit correspondre à au moins un rôle activé. Cette restriction s'applique également aux clés API générées précédemment et aux connexions OAuth existantes. Les clés reconnues sont `ADMIN`, `COURSEMANAGER`, `STUDENT`, `HRM`, `SESSIONADMIN`, `STUDENT_BOSS` et `INVITEE` ; un JSON invalide refuse MCP à tous les rôles. Les configurations existantes peuvent encore utiliser `DRH` lorsque `HRM` est absent ; lorsque les deux clés existent, `HRM` a la priorité. Voir [MCP](../mcp.md).

*Valeur par défaut : `{"ADMIN":true,"COURSEMANAGER":true,"STUDENT":false,"HRM":false,"SESSIONADMIN":false,"STUDENT_BOSS":false,"INVITEE":false}`*

### `mcp_enabled`

**Activer le serveur MCP**

Active le point de terminaison MCP de Chamilo et l'interface personnelle de clé API MCP. Lorsqu'il est désactivé, les clés API existantes, les jetons d'accès OAuth et les identifiants JWT ne peuvent pas être utilisés sur /mcp. Tant qu'il est désactivé, le bouton **Clé API MCP** n'est pas affiché sur la page de réseau social de l'utilisateur. Voir [MCP](../mcp.md).

*Valeur par défaut : `false`*

### `password_requirements`

**Exigences minimales de syntaxe des mots de passe**

Définit la structure requise pour les mots de passe des utilisateurs. Exemple : {"min":{"length":8,"lowercase":1,"uppercase":1,"numeric":1,"specials":1}}. Utilisez « specials » (au pluriel) pour exiger des caractères spéciaux.

### `password_rotation_days`

**Intervalle de rotation des mots de passe (jours)**

Nombre de jours avant que les utilisateurs doivent renouveler leur mot de passe (0 = désactivé).

*Valeur par défaut : `0`*


### `prevent_multiple_simultaneous_login`

**Empêcher les connexions simultanées**

Empêche les utilisateurs de se connecter plus d'une fois avec le même compte. Cette option convient aux portails à accès payant, mais peut être restrictive lors des tests, car un seul navigateur peut se connecter avec un compte donné.

*Valeur par défaut : `false`*


### `proxy_settings`

**Paramètres de proxy**

Certaines fonctionnalités de Chamilo se connectent à l'extérieur depuis le serveur. Par exemple, pour vérifier qu'un contenu externe existe lors de la création d'un lien ou de l'affichage d'une page intégrée dans le parcours d'apprentissage. Si votre serveur Chamilo utilise un proxy pour sortir de son réseau, c'est ici qu'il faut le configurer.

### `remember_me_days`

**Durée de « Se souvenir de moi » (jours)**

Définit la durée des cookies de connexion persistante et de leurs jetons en base de données. Accepte **0–90** jours ; `0` désactive l'option Se souvenir de moi, et le formulaire de connexion n'affiche cette option que sur les connexions HTTPS.

*Valeur par défaut : `14` jours*

### `security_block_inactive_users_immediately`

**Bloquer immédiatement les utilisateurs désactivés**

Bloque immédiatement les utilisateurs qui ont été désactivés par l'administrateur via la gestion des utilisateurs. Sinon, les utilisateurs désactivés conservent leurs privilèges précédents jusqu'à leur déconnexion.

*Valeur par défaut : `false`*


### `security_content_policy`

**Content Security Policy**

La Content Security Policy est une mesure efficace pour protéger votre site contre les attaques XSS. En établissant une liste blanche des sources de contenu approuvé, vous pouvez empêcher le navigateur de charger des ressources malveillantes. Ce paramètre est particulièrement complexe à définir avec les éditeurs WYSIWYG, mais si vous ajoutez tous les domaines que vous souhaitez autoriser pour l'inclusion d'iframes dans l'instruction child-src, cet exemple devrait fonctionner pour vous. Vous pouvez empêcher l'exécution de JavaScript provenant de sources externes (y compris à l'intérieur d'images SVG) en utilisant une liste stricte dans l'argument 'script-src'. Laissez vide pour désactiver. Exemple de paramètre : default-src 'self'; script-src 'self' 'unsafe-eval' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; child-src 'self' *.youtube.com yt.be *.vimeo.com *.slideshare.com;

### `security_content_policy_report_only`

**Content Security Policy en mode rapport uniquement**

Ce paramètre vous permet d'expérimenter en signalant, sans l'appliquer, une partie de la Content Security Policy.

### `security_public_key_pins`

**HTTP Public Key Pinning**

Le HTTP Public Key Pinning protège votre site contre les attaques MiTM utilisant des certificats X.509 frauduleux. En n'autorisant que les identités auxquelles le navigateur doit faire confiance, vos utilisateurs sont protégés en cas de compromission d'une autorité de certification.

### `security_public_key_pins_report_only`

**HTTP Public Key Pinning en mode rapport uniquement**

Ce paramètre vous permet d'expérimenter en signalant, sans l'appliquer, une partie du HTTP Public Key Pinning.

### `security_referrer_policy`

**Politique de référent de sécurité**

La Referrer Policy est un nouvel en-tête qui permet à un site de contrôler la quantité d'informations que le navigateur inclut lors d'une navigation quittant un document ; elle devrait être définie par tous les sites.

*Par défaut : `origin-when-cross-origin`*


### `security_session_cookie_samesite_none`

**Cookie de session SameSite**

Activer le paramètre samesite:None pour le cookie de session. Plus d'informations : https://www.chromium.org/updates/same-site et https://developers.google.com/search/blog/2020/01/get-ready-for-new-samesitenone-secure

*Par défaut : `false`*

### `security_strict_transport`

**HTTP Strict Transport Security**

HTTP Strict Transport Security est une excellente fonctionnalité à prendre en charge sur votre site ; elle renforce votre mise en œuvre de TLS en amenant l'agent utilisateur à imposer l'utilisation de HTTPS. Valeur recommandée : 'strict-transport-security: max-age=63072000; includeSubDomains'. Voir https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Strict-Transport-Security. Vous pouvez inclure le suffixe 'preload', mais cela a des conséquences sur le domaine de premier niveau (TLD) ; il ne faut donc probablement pas le faire à la légère. Voir https://hstspreload.org/. Laissez vide pour désactiver.

### `security_x_content_type_options`

**X-Content-Type-Options**

X-Content-Type-Options empêche un navigateur de tenter une détection MIME (MIME-sniffing) du type de contenu et le force à s'en tenir au content-type déclaré. La seule valeur valide pour cet en-tête est 'nosniff'.

*Par défaut : `nosniff`*


### `security_x_frame_options`

**X-Frame-Options**

X-Frame-Options indique au navigateur si vous souhaitez autoriser ou non l'affichage de votre site dans un cadre. En empêchant un navigateur d'afficher votre site dans un cadre, vous pouvez vous défendre contre des attaques telles que le clickjacking. Si une URL est définie ici, elle doit indiquer la ou les URL depuis lesquelles votre contenu doit être visible, et non les URL depuis lesquelles votre site accepte du contenu. Par exemple, si votre URL principale (root_web ci-dessus) est https://11.chamilo.org/, ce paramètre doit être : 'ALLOW-FROM https://11.chamilo.org'. Ces en-têtes ne s'appliquent qu'aux pages pour lesquelles Chamilo est responsable de la génération des en-têtes HTTP (c'est-à-dire les fichiers '.php'). Ils ne s'appliquent pas aux fichiers statiques. Si vous expérimentez cette fonctionnalité, veillez également à mettre à jour la configuration de votre serveur web afin d'ajouter les en-têtes appropriés pour les fichiers statiques. Voir la documentation de configuration CDN ci-dessus (recherchez 'add_header') pour plus d'informations. Valeur recommandée (stricte) pour ce paramètre, s'il est activé : 'SAMEORIGIN'.

*Par défaut : `SAMEORIGIN`*


### `security_xss_protection`

**X-XSS-Protection**

X-XSS-Protection définit la configuration du filtre de script intersites (cross-site scripting) intégré à la plupart des navigateurs. Valeur recommandée : '1; mode=block'.

*Par défaut : `1; mode=block`*


### `user_reset_password`

**Activer le jeton de réinitialisation du mot de passe**

Cette option permet de générer un jeton à usage unique et à durée limitée, envoyé par courriel à l'utilisateur afin de réinitialiser son mot de passe.

*Par défaut : `false`*


### `user_reset_password_token_limit`

**Délai d'expiration du jeton de réinitialisation du mot de passe**

Nombre de secondes avant que le jeton généré n'expire automatiquement et ne puisse plus être utilisé (un nouveau jeton doit être généré).

*Par défaut : `3600`*