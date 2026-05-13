# Paramètres de messagerie

Comment les courriels sortants sont construits — identité de l'expéditeur, mise en page, signature et adresses à usage spécifique.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Courriel**. Cette catégorie contient **18 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en monospace. Utilisez-le lors de la création de scripts via l'API ou lorsque vous devez modifier ces paramètres à un niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `allow_email_editor_for_anonymous`

**Éditeur de courriel pour les anonymes**

Permettre aux utilisateurs anonymes d'envoyer des courriels depuis la plateforme. À l'ère de la sécurité de l'information, cette option n'est pas recommandée.

*Par défaut : `true`*

### `cron_notification_help_desk`

**Adresses courriel pour envoyer les rapports d'exécution des cronjobs**

Fournies sous forme de tableau d'adresses courriel. Ne fonctionne pas encore pour tous les cronjobs.

### `mail_content_style`

**Attributs HTML supplémentaires pour le corps du courriel**

Attributs HTML supplémentaires à appliquer à la balise body des courriels de notification générés.

### `mail_header_style`

**Attributs HTML supplémentaires pour l'en-tête du courriel**

Attributs HTML supplémentaires à appliquer à la section d'en-tête des courriels de notification générés.

### `mailer_debug_enable`

**Courriel : Débogage**

Sélectionnez si vous souhaitez activer les journaux de débogage pour l'envoi de courriels. Ces journaux fourniront plus d'informations sur ce qui se passe lors de la connexion au service de messagerie, mais ils ne sont pas élégants et pourraient perturber la conception de la page. À utiliser uniquement lorsqu'il n'y a pas d'activité utilisateur.

*Par défaut : `false`*

### `mailer_dkim`

**Courriel : En-têtes DKIM**

Entrez un tableau JSON de vos paramètres de configuration DKIM (voir exemple).

### `mailer_dsn`

**DSN de messagerie**

Le DSN inclut pleinement tous les paramètres nécessaires pour se connecter au service de messagerie. Vous pouvez en apprendre davantage sur https://symfony.com/doc/6.4/mailer.html#using-built-in-transports. Voici quelques exemples de syntaxes DSN prises en charge : https://symfony.com/doc/6.4/mailer.html#using-a-3rd-party-transport

*Par défaut : `null://null`*

### `mailer_exclude_json`

**Courriel : Éviter d'utiliser LD+JSON**

Certains clients de messagerie ne comprennent pas le format descriptif LD+JSON, l'affichant comme une chaîne JSON brute à l'utilisateur final. Si c'est votre cas, vous pourriez vouloir définir la variable ci-dessous à 'false' pour désactiver cet en-tête.

*Par défaut : `false`*

### `mailer_from_email`

**Envoyer tous les courriels depuis cette adresse courriel**

Définit l'adresse courriel par défaut utilisée dans le champ "de" des courriels.

### `mailer_from_name`

**Envoyer tous les courriels comme provenant de ce nom (organisationnel)**

Définit le nom d'affichage par défaut utilisé pour l'envoi des courriels de la plateforme, par exemple "Équipe de support".

### `mailer_mails_charset`

**Courriel : Jeu de caractères**

Au cas où vous auriez besoin de définir le jeu de caractères à utiliser lors de l'envoi de ces courriels. Laissez vide si vous n'êtes pas sûr.

*Par défaut : `UTF-8`*

### `mailer_xoauth2`

**Courriel : Options XOAuth2**

Si vous utilisez un service de messagerie basé sur XOAuth2, utilisez ce paramètre en JSON pour enregistrer votre configuration spécifique (voir exemple) et sélectionnez XOAuth2 dans le paramètre de service de messagerie.

### `messages_hide_mail_content`

**Masquer le contenu du courriel pour inciter les utilisateurs à se rendre sur la plateforme**

Préférez des versions courtes des courriels avec un lien vers l'espace de messagerie sur la plateforme pour augmenter l'engagement basé sur la plateforme.

*Par défaut : `false`*

### `notifications_extended_footer_message`

**Pied de page étendu pour les notifications**

Ajoutez un pied de page personnalisé supplémentaire pour les courriels de notification dans une langue spécifique, par exemple pour des avis de politique de confidentialité. Plusieurs langues et paragraphes peuvent être ajoutés.

### `send_notification_score_in_percentage`

**Envoyer le score en pourcentage dans la notification des résultats de test**

Envoie les scores des exercices sous forme de pourcentages au lieu de points dans les courriels de notification des résultats de test.

*Par défaut : `false`*

### `send_two_inscription_confirmation_mail`

**Envoyer 2 courriels d'inscription**

Envoyer deux courriels séparés lors de l'inscription. Un pour le nom d'utilisateur, un autre pour le mot de passe.

*Par défaut : `false`*

### `show_user_email_in_notification`

**Afficher l'adresse courriel de l'expéditeur dans les notifications**

Inclut l'adresse courriel de l'expéditeur avec son nom dans les courriels de messages personnels et de notifications.

*Par défaut : `false`*

### `update_users_email_to_dummy_except_admins`

**Mettre à jour les courriels des utilisateurs avec une valeur fictive lors des importations**

Lors des importations spéciales de fichiers CSV via cron des utilisateurs, remplacer automatiquement les courriels par une adresse fictive username@example.com.

*Par défaut : `false`*