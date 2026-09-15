# Paramètres de messagerie

Comment le courrier sortant est construit — identité de l’expéditeur, mise en page, signature et adresses à usage particulier.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Mail**. Cette catégorie contient **17 paramètres**, listés ci-dessous avec le titre et le commentaire livrés dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est indiqué en monospace. Utilisez-le lors de scripts via l’API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `allow_email_editor_for_anonymous`

**Éditeur d’e-mail pour les anonymes**

Autoriser les utilisateurs anonymes à envoyer des e-mails depuis la plateforme. À l’ère actuelle de la sécurité de l’information, cette option n’est pas recommandée.

*Default: `true`*


### `cron_notification_help_desk`

**Adresses e-mail pour l’envoi des rapports d’exécution des cronjobs**

Données sous forme de tableau d’adresses e-mail. Ne fonctionne pas encore pour tous les cronjobs.

### `mail_content_style`

**Attributs HTML supplémentaires du corps des e-mails**

Attributs HTML supplémentaires à appliquer à la balise body des e-mails de notification générés.

### `mail_header_style`

**Attributs HTML supplémentaires de l’en-tête des e-mails**

Attributs HTML supplémentaires à appliquer à la section d’en-tête des e-mails de notification générés.

### `mailer_debug_enable`

**Mail : débogage**

Indiquez si vous souhaitez activer les journaux de débogage de l’envoi d’e-mails. Ils vous donneront davantage d’informations sur ce qui se passe lors de la connexion au service de messagerie, mais ne sont pas élégants et peuvent casser la mise en page. À n’utiliser qu’en l’absence d’activité utilisateur.

*Default: `false`*


### `mailer_dkim`

**Mail : en-têtes DKIM**

Saisissez un tableau JSON de vos paramètres de configuration DKIM (voir l’exemple).

### `mailer_dsn`

**DSN du mailer**

Le DSN inclut entièrement tous les paramètres nécessaires pour se connecter au service de messagerie. Vous pouvez en savoir plus sur https://symfony.com/doc/7.4/mailer.html#using-built-in-transports. Voici quelques exemples de syntaxes DSN prises en charge : https://symfony.com/doc/7.4/mailer.html#using-a-3rd-party-transport. Pour Microsoft 365, où SMTP avec authentification basique est en cours de retrait, envoyez plutôt via l’API Microsoft Graph avec `microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@default?tenantId=TENANT_ID` (encodez en URL tout caractère spécial du secret client). Cela nécessite un enregistrement d’application Entra ID auquel a été accordée la permission d’application `Mail.Send` — voir [Configuration de la messagerie](../installation/email-configuration.md).

*Default: `null://null`*


### `mailer_exclude_json`

**Mail : éviter l’utilisation de LD+JSON**

Certains clients de messagerie ne comprennent pas le format descriptif LD+JSON, l’affichant comme une chaîne JSON brute à l’utilisateur final. Si c’est votre cas, vous pouvez définir la variable ci-dessous à « false » pour désactiver cet en-tête.

*Default: `false`*


### `mailer_from_email`

**Envoyer tous les e-mails depuis cette adresse e-mail**

Définit l’adresse e-mail par défaut utilisée dans le champ « from » des e-mails.

### `mailer_from_name`

**Envoyer tous les e-mails comme provenant de ce nom (organisationnel)**

Définit le nom d’affichage par défaut utilisé pour l’envoi des e-mails de la plateforme. p. ex. « Équipe support ».

### `mailer_mails_charset`

**Mail : jeu de caractères**

Au cas où vous auriez besoin de définir le jeu de caractères à utiliser lors de l’envoi de ces e-mails. Laissez vide si vous n’êtes pas sûr.

*Default: `UTF-8`*


### `messages_hide_mail_content`

**Masquer le contenu des e-mails pour ramener les utilisateurs sur la plateforme**

Préférer des versions d’e-mail courtes avec un lien vers l’espace de messagerie de la plateforme afin d’augmenter l’engagement sur la plateforme.

*Default: `false`*


### `notifications_extended_footer_message`

**Pied de page étendu des notifications**

Ajouter un pied de page supplémentaire personnalisé pour les e-mails de notification pour une langue spécifique, par exemple pour des mentions de politique de confidentialité. Plusieurs langues et paragraphes peuvent être ajoutés.

### `send_notification_score_in_percentage`

**Envoyer le score en pourcentage dans la notification des résultats de test**

Envoie les scores des exercices sous forme de pourcentages plutôt qu’en points dans les e-mails de notification des résultats de test.

*Default: `false`*


### `send_two_inscription_confirmation_mail`

**Envoyer 2 e-mails d’inscription**

Envoyer deux e-mails distincts à l’inscription. Un pour le nom d’utilisateur, un autre pour le mot de passe.

*Default: `false`*


### `show_user_email_in_notification`

**Afficher l’adresse e-mail de l’expéditeur dans les notifications**

Inclut l’adresse e-mail de l’expéditeur avec son nom dans les e-mails de messages personnels et de notifications.

*Default: `false`*


### `update_users_email_to_dummy_except_admins`

**Mettre à jour les e-mails des utilisateurs vers une valeur factice lors des imports**

Lors d’imports CSV spéciaux d’utilisateurs par cron, remplacer automatiquement les e-mails par l’e-mail factice username@example.com.

*Default: `false`*