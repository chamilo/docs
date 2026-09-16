# Paramètres de sécurité

Protection de la connexion, politique de mots de passe, en-têtes de sécurité du contenu, authentification à deux facteurs et système léger de détection d’intrusion.

Cette page couvre la *politique* de sécurité. Pour les outils de surveillance qui observent la plateforme en s’appuyant sur cette politique (journaux des tentatives de connexion, événements de détection d’intrusion, analyses de robustesse des mots de passe et contrôles d’intégrité des fichiers), voir [Sécurité](../security/README.md).

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Sécurité**. Cette catégorie contient **32 paramètres**, listés ci-dessous avec le titre et le commentaire livrés dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est indiqué en monospace. Utilisez-le lors d’un script via l’API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `2fa_enable`

**Activer la 2FA**

Ajoute des champs sur la page de mise à jour du mot de passe pour activer la 2FA à l’aide d’une application d’authentification TOTP. Lorsque la fonction est désactivée globalement, les utilisateurs ne voient pas les champs 2FA et ne sont pas invités à saisir un code 2FA à la connexion, même s’ils l’avaient activée auparavant.

*Par défaut : `false`*

### `access_to_personal_file_for_all`

**Accès aux fichiers personnels pour tous**

Autorise l’accès à tous les fichiers personnels sans restriction

*Par défaut : `false`*


### `admins_can_set_users_pass`

**Les administrateurs peuvent définir manuellement les mots de passe des utilisateurs**

[inféré] Lorsque cette option est activée, les administrateurs peuvent définir manuellement les mots de passe des utilisateurs sans exiger que ceux-ci les réinitialisent.

### `allow_captcha`

**CAPTCHA**

Active un CAPTCHA sur le formulaire de connexion, le formulaire d’inscription et le formulaire de mot de passe perdu afin d’éviter le martelage de mots de passe

*Par défaut : `false`*

### `allow_online_users_by_status`

**Filtrer les utilisateurs visibles comme étant en ligne**

Limite la visibilité des utilisateurs en ligne à des rôles utilisateur spécifiques.

### `allow_strength_pass_checker`

**Vérificateur de robustesse du mot de passe**

Activez cette option pour ajouter un indicateur visuel de la robustesse du mot de passe lorsque l’utilisateur le modifie. Cela n’empêchera PAS l’ajout de mots de passe faibles : il s’agit uniquement d’une aide visuelle.

*Par défaut : `true`*


### `anonymous_autoprovisioning`

**Approvisionnement automatique d’utilisateurs anonymes supplémentaires**

Crée dynamiquement de nouveaux utilisateurs anonymes pour prendre en charge un fort trafic de visiteurs.

*Par défaut : `false`*


### `captcha_number_mistakes_to_block_account`

**Tolérance d’erreurs CAPTCHA**

Nombre de fois qu’un utilisateur peut se tromper dans la zone CAPTCHA avant que son compte ne soit verrouillé.

### `captcha_time_to_block`

**Durée de verrouillage du compte CAPTCHA**

Si l’utilisateur atteint le nombre maximal d’erreurs de connexion autorisées (lors de l’utilisation du CAPTCHA), son compte sera verrouillé pendant ce nombre de minutes.

### `check_password`

**Vérifier les exigences de mot de passe**

Active la validation des exigences de mot de passe définies ci-dessus lors de la création ou de la mise à jour d’un mot de passe.

*Par défaut : `false`*


### `file_integrity_check_notify_admins` **v3**

**Destinataires des notifications de contrôle d’intégrité des fichiers**

Liste d’adresses e-mail séparées par des virgules à notifier lorsqu’une analyse d’intégrité des fichiers détecte un changement. Laissez vide pour notifier à la place tous les administrateurs globaux.

### `filter_terms`

**Termes filtrés**

Indiquez une liste de termes, un par ligne, à filtrer des pages web et des e-mails. Ces termes seront remplacés par ***.

### `force_renew_password_at_first_login`

**Forcer le renouvellement du mot de passe à la première connexion**

Il s’agit d’une mesure simple pour renforcer la sécurité de votre portail en demandant aux utilisateurs de changer immédiatement leur mot de passe, afin que celui transmis par e-mail ne soit plus valable et qu’ils utilisent ensuite un mot de passe qu’ils ont eux-mêmes choisi et dont ils sont les seuls à avoir connaissance.

*Par défaut : `false`*


### `hide_breadcrumb_if_not_allowed`

**Masquer le fil d’Ariane si « non autorisé »**

Si l’utilisateur n’est pas autorisé à accéder à une page donnée, masquer également le fil d’Ariane. Cela accroît la sécurité en évitant d’afficher des informations inutiles.

*Par défaut : `false`*


### `login_max_attempt_before_blocking_account`

**Nombre maximal de tentatives de connexion avant verrouillage**

Nombre de tentatives de connexion échouées à tolérer avant que le compte utilisateur ne soit verrouillé et doive être déverrouillé par un administrateur.

*Par défaut : `0`*

### `password_requirements`

**Exigences minimales de syntaxe des mots de passe**

Définit la structure requise pour les mots de passe des utilisateurs. Exemple : {"min":{"length":8,"lowercase":1,"uppercase":1,"numeric":1,"specials":1}}. Utilisez « specials » (au pluriel) pour exiger des caractères spéciaux.

### `password_rotation_days`

**Intervalle de rotation des mots de passe (jours)**

Nombre de jours avant que les utilisateurs doivent renouveler leur mot de passe (0 = désactivé).

*Par défaut : `0`*


### `prevent_multiple_simultaneous_login`

**Empêcher les connexions simultanées**

Empêche les utilisateurs de se connecter plus d’une fois avec le même compte. C’est une option adaptée aux portails à accès payant, mais elle peut être restrictive pendant les tests, car un seul navigateur peut se connecter avec un compte donné.

*Par défaut : `false`*

### `proxy_settings`

**Paramètres du proxy**

Certaines fonctionnalités de Chamilo se connectent à l’extérieur depuis le serveur. Par exemple pour s’assurer qu’un contenu externe existe lors de la création d’un lien ou de l’affichage d’une page intégrée dans un parcours. Si votre serveur Chamilo utilise un proxy pour sortir de son réseau, c’est ici qu’il convient de le configurer.

### `security_block_inactive_users_immediately`

**Bloquer immédiatement les utilisateurs désactivés**

Bloquer immédiatement les utilisateurs qui ont été désactivés par l’administrateur via la gestion des utilisateurs. Dans le cas contraire, les utilisateurs désactivés conservent leurs privilèges précédents jusqu’à leur déconnexion.

*Default: `false`*


### `security_content_policy`

**Content Security Policy**

La Content Security Policy est une mesure efficace pour protéger votre site contre les attaques XSS. En autorisant uniquement les sources de contenu approuvées, vous empêchez le navigateur de charger des ressources malveillantes. Ce paramètre est particulièrement délicat à configurer avec les éditeurs WYSIWYG, mais si vous ajoutez tous les domaines que vous souhaitez autoriser pour l’inclusion d’iframes dans la directive child-src, cet exemple devrait fonctionner. Vous pouvez empêcher l’exécution de JavaScript depuis des sources externes (y compris à l’intérieur d’images SVG) en utilisant une liste stricte dans l’argument 'script-src'. Laissez vide pour désactiver. Exemple de paramètre : default-src 'self'; script-src 'self' 'unsafe-eval' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; child-src 'self' *.youtube.com yt.be *.vimeo.com *.slideshare.com;

### `security_content_policy_report_only`

**Content Security Policy en mode rapport uniquement**

Ce paramètre vous permet d’expérimenter en signalant mais sans appliquer certaines règles de Content Security Policy.

### `security_public_key_pins`

**HTTP Public Key Pinning**

HTTP Public Key Pinning protège votre site contre les attaques MiTM utilisant de faux certificats X.509. En n’autorisant que les identités auxquelles le navigateur doit faire confiance, vos utilisateurs sont protégés en cas de compromission d’une autorité de certification.

### `security_public_key_pins_report_only`

**HTTP Public Key Pinning en mode rapport uniquement**

Ce paramètre vous permet d’expérimenter en signalant mais sans appliquer certaines règles de HTTP Public Key Pinning.

### `security_referrer_policy`

**Politique de référent (Referrer Policy)**

La Referrer Policy est un nouvel en-tête qui permet à un site de contrôler la quantité d’informations que le navigateur inclut lors d’une navigation hors d’un document, et devrait être définie par tous les sites.

*Default: `origin-when-cross-origin`*


### `security_session_cookie_samesite_none`

**Cookie de session samesite**

Activer le paramètre samesite:None pour le cookie de session. Plus d’informations : https://www.chromium.org/updates/same-site et https://developers.google.com/search/blog/2020/01/get-ready-for-new-samesitenone-secure

*Default: `false`*

### `security_strict_transport`

**HTTP Strict Transport Security**

HTTP Strict Transport Security est une excellente fonctionnalité à activer sur votre site et renforce votre mise en œuvre de TLS en demandant à l’agent utilisateur d’imposer l’utilisation de HTTPS. Valeur recommandée : 'strict-transport-security: max-age=63072000; includeSubDomains'. Voir https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Strict-Transport-Security. Vous pouvez inclure le suffixe 'preload', mais cela a des conséquences sur le domaine de premier niveau (TLD), donc à ne pas faire à la légère. Voir https://hstspreload.org/. Laissez vide pour désactiver.

### `security_x_content_type_options`

**X-Content-Type-Options**

X-Content-Type-Options empêche un navigateur d’essayer de deviner le type MIME (MIME-sniff) et le force à s’en tenir au content-type déclaré. La seule valeur valide pour cet en-tête est 'nosniff'.

*Default: `nosniff`*


### `security_x_frame_options`

**X-Frame-Options**

X-Frame-Options indique au navigateur si vous souhaitez autoriser ou non l’affichage de votre site dans un cadre (frame). En empêchant un navigateur d’encadrer votre site, vous pouvez vous défendre contre des attaques telles que le clickjacking. Si vous définissez une URL ici, elle doit indiquer la ou les URL depuis lesquelles votre contenu doit être visible, et non les URL depuis lesquelles votre site accepte du contenu. Par exemple, si votre URL principale (root_web ci-dessus) est https://11.chamilo.org/, alors ce paramètre devrait être : 'ALLOW-FROM https://11.chamilo.org'. Ces en-têtes ne s’appliquent qu’aux pages pour lesquelles Chamilo est responsable de la génération des en-têtes HTTP (c’est-à-dire les fichiers '.php'). Ils ne s’appliquent pas aux fichiers statiques. Si vous expérimentez cette fonctionnalité, veillez également à mettre à jour la configuration de votre serveur web pour ajouter les bons en-têtes aux fichiers statiques. Consultez la documentation de configuration CDN ci-dessus (recherchez 'add_header') pour plus d’informations. Valeur recommandée (stricte) pour ce paramètre, s’il est activé : 'SAMEORIGIN'.

*Default: `SAMEORIGIN`*


### `security_xss_protection`

**X-XSS-Protection**

X-XSS-Protection définit la configuration du filtre de scripts intersites intégré à la plupart des navigateurs. Valeur recommandée : '1; mode=block'.

*Default: `1; mode=block`*


### `user_reset_password`

**Activer le jeton de réinitialisation de mot de passe**

Cette option permet de générer un jeton à usage unique et à durée limitée, envoyé par e-mail à l’utilisateur pour réinitialiser son mot de passe.

*Default: `false`*

### `user_reset_password_token_limit`

**Délai d'expiration du jeton de réinitialisation de mot de passe**

Le nombre de secondes avant que le jeton généré n'expire automatiquement et ne puisse plus être utilisé (un nouveau jeton doit alors être généré).

*Par défaut : `3600`*