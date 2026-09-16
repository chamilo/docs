# Paramètres de sécurité

Protection de la connexion, politique de mot de passe, en-têtes de sécurité du contenu, authentification à deux facteurs et système léger de détection d'intrusion.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Sécurité**. Cette catégorie contient **31 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en monospace. Utilisez-le lors de la création de scripts via l'API ou lorsque vous devez modifier ces paramètres à un niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `2fa_enable`

**Activer l'authentification à deux facteurs (2FA)**

Ajoute des champs dans la page de mise à jour du mot de passe pour activer l'authentification à deux facteurs à l'aide d'une application d'authentification TOTP. Lorsqu'elle est désactivée globalement, les utilisateurs ne verront pas les champs 2FA et ne seront pas invités à utiliser l'authentification à deux facteurs lors de la connexion, même s'ils l'avaient activée auparavant.

*Par défaut : `false`*

### `access_to_personal_file_for_all`

**Accès aux fichiers personnels pour tous**

Permet l'accès à tous les fichiers personnels sans restriction.

*Par défaut : `false`*

### `admins_can_set_users_pass`

**Les administrateurs peuvent définir manuellement les mots de passe des utilisateurs**

[inféré] Lorsqu'il est activé, les administrateurs peuvent définir manuellement les mots de passe des utilisateurs directement sans exiger que les utilisateurs les réinitialisent.

### `allow_captcha`

**CAPTCHA**

Active un CAPTCHA sur le formulaire de connexion, le formulaire d'inscription et le formulaire de mot de passe perdu pour éviter les tentatives répétées de deviner les mots de passe.

*Par défaut : `false`*

### `allow_online_users_by_status`

**Filtrer les utilisateurs visibles en ligne**

Limite la visibilité des utilisateurs en ligne à des rôles spécifiques.

### `allow_strength_pass_checker`

**Vérificateur de force du mot de passe**

Activez cette option pour ajouter un indicateur visuel de la force du mot de passe lorsque l'utilisateur change son mot de passe. Cela n'empêchera PAS l'ajout de mots de passe faibles, cela agit uniquement comme une aide visuelle.

*Par défaut : `true`*

### `anonymous_autoprovisioning`

**Provisionnement automatique d'utilisateurs anonymes supplémentaires**

Crée dynamiquement de nouveaux utilisateurs anonymes pour supporter un trafic élevé de visiteurs.

*Par défaut : `false`*

### `captcha_number_mistakes_to_block_account`

**Nombre d'erreurs autorisées pour le CAPTCHA**

Le nombre de fois qu'un utilisateur peut se tromper sur la boîte CAPTCHA avant que son compte ne soit bloqué.

### `captcha_time_to_block`

**Durée de blocage du compte après CAPTCHA**

Si l'utilisateur atteint le nombre maximum d'erreurs de connexion autorisées (lors de l'utilisation du CAPTCHA), son compte sera bloqué pendant ce nombre de minutes.

### `check_password`

**Vérifier les exigences du mot de passe**

Active la validation des exigences de mot de passe définies ci-dessus lors de la création ou de la mise à jour du mot de passe.

*Par défaut : `false`*

### `filter_terms`

**Filtrer les termes**

Fournissez une liste de termes, un par ligne, à filtrer des pages web et des e-mails. Ces termes seront remplacés par ***.

### `force_renew_password_at_first_login`

**Forcer le renouvellement du mot de passe à la première connexion**

C'est une mesure simple pour augmenter la sécurité de votre portail en demandant aux utilisateurs de changer immédiatement leur mot de passe, de sorte que celui qui a été transmis par e-mail ne soit plus valide et qu'ils utilisent ensuite un mot de passe qu'ils ont eux-mêmes choisi et qu'ils sont les seuls à connaître.

*Par défaut : `false`*

### `hide_breadcrumb_if_not_allowed`

**Masquer le fil d'Ariane si 'non autorisé'**

Si l'utilisateur n'est pas autorisé à accéder à une page spécifique, masque également le fil d'Ariane. Cela augmente la sécurité en évitant l'affichage d'informations inutiles.

*Par défaut : `false`*

### `login_max_attempt_before_blocking_account`

**Nombre maximum de tentatives de connexion avant verrouillage**

Nombre de tentatives de connexion échouées à tolérer avant que le compte utilisateur ne soit verrouillé et doive être déverrouillé par un administrateur.

*Par défaut : `0`*

### `password_requirements`

**Exigences minimales de syntaxe du mot de passe**

Définit la structure requise pour les mots de passe des utilisateurs. Exemple : {"min":{"length":8,"lowercase":1,"uppercase":1,"numeric":1,"specials":1}}. Utilisez "specials" (au pluriel) pour exiger des caractères spéciaux.

### `password_rotation_days`

**Intervalle de rotation du mot de passe (jours)**

Nombre de jours avant que les utilisateurs ne doivent changer leur mot de passe (0 = désactivé).

*Par défaut : `0`*

### `prevent_multiple_simultaneous_login`

**Empêcher les connexions simultanées**

Empêche les utilisateurs de se connecter avec le même compte plus d'une fois. C'est une bonne option pour les portails à accès payant, mais cela peut être restrictif lors des tests car un seul navigateur peut se connecter avec un compte donné.

*Par défaut : `false`*

### `proxy_settings`

**Paramètres du proxy**

Certaines fonctionnalités de Chamilo se connectent à l'extérieur depuis le serveur. Par exemple, pour vérifier qu'un contenu externe existe lors de la création d'un lien ou pour afficher une page intégrée dans le parcours d'apprentissage. Si votre serveur Chamilo utilise un proxy pour sortir de son réseau, c'est ici que vous devez le configurer.

### `security_block_inactive_users_immediately`

**Bloquer immédiatement les utilisateurs désactivés**

Bloque immédiatement les utilisateurs qui ont été désactivés par l'administrateur via la gestion des utilisateurs. Sinon, les utilisateurs désactivés conserveront leurs privilèges précédents jusqu'à ce qu'ils se déconnectent.

*Par défaut : `false`*

### `security_content_policy`

**Politique de sécurité du contenu (Content Security Policy)**

La politique de sécurité du contenu est une mesure efficace pour protéger votre site contre les attaques XSS. En mettant sur liste blanche les sources de contenu approuvées, vous pouvez empêcher le navigateur de charger des ressources malveillantes. Ce paramètre est particulièrement compliqué à configurer avec des éditeurs WYSIWYG, mais si vous ajoutez tous les domaines que vous souhaitez autoriser pour l'inclusion d'iframes dans la déclaration child-src, cet exemple devrait fonctionner pour vous. Vous pouvez empêcher l'exécution de JavaScript provenant de sources externes (y compris à l'intérieur des images SVG) en utilisant une liste stricte dans l'argument 'script-src'. Laissez vide pour désactiver. Exemple de paramètre : default-src 'self'; script-src 'self' 'unsafe-eval' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; child-src 'self' *.youtube.com yt.be *.vimeo.com *.slideshare.com;

### `security_content_policy_report_only`

**Politique de sécurité du contenu en mode rapport uniquement**

Ce paramètre vous permet d'expérimenter en signalant mais sans appliquer certaines politiques de sécurité du contenu.

### `security_public_key_pins`

**HTTP Public Key Pinning**

HTTP Public Key Pinning protège votre site contre les attaques de type Man-in-the-Middle (MiTM) utilisant des certificats X.509 frauduleux. En mettant sur liste blanche uniquement les identités auxquelles le navigateur doit faire confiance, vos utilisateurs sont protégés en cas de compromission d'une autorité de certification.

### `security_public_key_pins_report_only`

**HTTP Public Key Pinning en mode rapport uniquement**

Ce paramètre vous permet d'expérimenter en signalant mais sans appliquer certaines politiques de HTTP Public Key Pinning.

### `security_referrer_policy`

**Politique de référencement de sécurité (Referrer Policy)**

La politique de référencement est un nouvel en-tête qui permet à un site de contrôler la quantité d'informations que le navigateur inclut lors de la navigation hors d'un document et devrait être défini par tous les sites.

*Par défaut : `origin-when-cross-origin`*

### `security_session_cookie_samesite_none`

**Cookie de session samesite**

Active le paramètre samesite:None pour le cookie de session. Plus d'informations : https://www.chromium.org/updates/same-site et https://developers.google.com/search/blog/2020/01/get-ready-for-new-samesitenone-secure

*Par défaut : `false`*

### `security_strict_transport`

**HTTP Strict Transport Security**

HTTP Strict Transport Security est une excellente fonctionnalité à activer sur votre site et renforce votre implémentation de TLS en obligeant l'agent utilisateur à appliquer l'utilisation de HTTPS. Valeur recommandée : 'strict-transport-security: max-age=63072000; includeSubDomains'. Voir https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Strict-Transport-Security. Vous pouvez inclure le suffixe 'preload', mais cela a des conséquences sur le domaine de premier niveau (TLD), donc à ne pas faire à la légère. Voir https://hstspreload.org/. Laissez vide pour désactiver.

### `security_x_content_type_options`

**X-Content-Type-Options**

X-Content-Type-Options empêche un navigateur de tenter de deviner le type de contenu via MIME-sniffing et le force à respecter le type de contenu déclaré. La seule valeur valide pour cet en-tête est 'nosniff'.

*Par défaut : `nosniff`*

### `security_x_frame_options`

**X-Frame-Options**

X-Frame-Options indique au navigateur si vous souhaitez autoriser ou non que votre site soit encadré (framed). En empêchant un navigateur d'encadrer votre site, vous pouvez vous défendre contre des attaques comme le clickjacking. Si vous définissez une URL ici, elle doit indiquer les URL à partir desquelles votre contenu doit être visible, et non les URL à partir desquelles votre site accepte du contenu. Par exemple, si votre URL principale (root_web ci-dessus) est https://11.chamilo.org/, alors ce paramètre devrait être : 'ALLOW-FROM https://11.chamilo.org'. Ces en-têtes s'appliquent uniquement aux pages où Chamilo est responsable de la génération des en-têtes HTTP (c'est-à-dire les fichiers '.php'). Cela ne s'applique pas aux fichiers statiques. Si vous jouez avec cette fonctionnalité, assurez-vous également de mettre à jour la configuration de votre serveur web pour ajouter les bons en-têtes pour les fichiers statiques. Consultez la documentation sur la configuration CDN ci-dessus (recherchez 'add_header') pour plus d'informations. Valeur recommandée (stricte) pour ce paramètre, si activé : 'SAMEORIGIN'.

*Par défaut : `SAMEORIGIN`*

### `security_xss_protection`

**X-XSS-Protection**

X-XSS-Protection configure le filtre de script intersite intégré à la plupart des navigateurs. Valeur recommandée : '1; mode=block'.

*Par défaut : `1; mode=block`*

### `user_reset_password`

**Activer le jeton de réinitialisation de mot de passe**

Cette option permet de générer un jeton à usage unique et à durée limitée, envoyé par e-mail à l'utilisateur pour réinitialiser son mot de passe.

*Par défaut : `false`*

### `user_reset_password_token_limit`

**Limite de temps pour le jeton de réinitialisation de mot de passe**

Le nombre de secondes avant que le jeton généré n'expire automatiquement et ne puisse plus être utilisé (un nouveau jeton doit être généré).

*Par défaut : `3600`*