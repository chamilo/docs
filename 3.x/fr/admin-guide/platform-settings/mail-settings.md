# Paramètres de messagerie

Comment le courrier sortant est construit — identité de l'expéditeur, mise en page, signature et adresses à usage spécifique.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Courrier**. Cette catégorie contient **22 paramètres**, listés ci-dessous avec le titre et le commentaire livrés dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en police monospace. Utilisez-le lors de scripts via l'API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `allow_email_editor_for_anonymous`

**Éditeur de courriel pour les anonymes**

Autoriser les utilisateurs anonymes à envoyer des courriels depuis la plateforme. À l'ère actuelle de la sécurité de l'information, cette option n'est pas recommandée.

*Valeur par défaut : `true`*


### `cron_notification_help_desk`

**Adresses de courriel pour l'envoi des rapports d'exécution des tâches cron**

Données sous forme de tableau d'adresses de courriel. Ne fonctionne pas encore pour toutes les tâches cron.

### `mail_content_style`

**Attributs HTML supplémentaires du corps du courriel**

Attributs HTML supplémentaires à appliquer à la balise body des courriels de notification générés.

### `mail_header_style`

**Attributs HTML supplémentaires de l'en-tête du courriel**

Attributs HTML supplémentaires à appliquer à la section d'en-tête des courriels de notification générés.

### `mailer_debug_enable`

**Courrier : débogage**

Indiquez si vous souhaitez activer les journaux de débogage de l'envoi de courriels. Ceux-ci vous donneront davantage d'informations sur ce qui se passe lors de la connexion au service de messagerie, mais ils ne sont pas élégants et peuvent altérer la mise en page. À n'utiliser qu'en l'absence d'activité utilisateur.

*Valeur par défaut : `false`*


### `mailer_dkim`

**Courrier : en-têtes DKIM**

Saisissez un tableau JSON de vos paramètres de configuration DKIM (voir l'exemple).

### `mailer_dsn`

**DSN de messagerie**

Le DSN inclut l'ensemble des paramètres nécessaires pour se connecter au service de messagerie. Vous pouvez en savoir plus sur https://symfony.com/doc/7.4/mailer.html#using-built-in-transports. Voici quelques exemples de syntaxes DSN prises en charge : https://symfony.com/doc/7.4/mailer.html#using-a-3rd-party-transport. Pour Microsoft 365, où le SMTP avec authentification de base est en cours de retrait, envoyez plutôt via l'API Microsoft Graph avec `microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@default?tenantId=TENANT_ID` (encodez en URL tout caractère spécial du secret client). Cela nécessite une inscription d'application Entra ID disposant de l'autorisation d'application `Mail.Send` — voir [Configuration du courriel](../installation/email-configuration.md).

*Valeur par défaut : `null://null`*


### `mailer_exclude_json`

**Courrier : éviter l'utilisation de LD+JSON**

Certains clients de messagerie ne comprennent pas le format descriptif LD+JSON et l'affichent comme une chaîne JSON brute à l'utilisateur final. Si tel est votre cas, vous pouvez définir la variable ci-dessous sur « false » pour désactiver cet en-tête.

*Valeur par défaut : `false`*


### `mailer_from_email`

**Envoyer tous les courriels depuis cette adresse de courriel**

Définit l'adresse de courriel par défaut utilisée dans le champ « from » des courriels.

### `mailer_from_name`

**Envoyer tous les courriels comme provenant de ce nom (organisationnel)**

Définit le nom d'affichage par défaut utilisé pour l'envoi des courriels de la plateforme, par exemple « Équipe d'assistance ».

### `mailer_mails_charset`

**Courrier : jeu de caractères**

Au cas où vous auriez besoin de définir le jeu de caractères à utiliser lors de l'envoi de ces courriels. Laissez vide si vous n'êtes pas certain.

*Valeur par défaut : `UTF-8`*


### `messages_hide_mail_content`

**Masquer le contenu du courriel pour amener les utilisateurs vers la plateforme**

Préférer des versions courtes de courriel avec un lien vers l'espace de messagerie de la plateforme afin d'accroître l'engagement sur la plateforme.

*Valeur par défaut : `false`*


### `enable_email_open_tracking`

**Suivre les ouvertures de courriels**

Ajoute une petite image de suivi aux courriels de notification de message et enregistre le moment où elle est demandée. Cela indique seulement que le courriel a pu être ouvert ; cela ne prouve pas qu'il a été lu.

*Valeur par défaut : `false`*

### `enable_inbound_mail`

**Autoriser les réponses par courriel aux messages**

Autoriser les destinataires des notifications de messages directs à répondre par courriel. Les messages entrants doivent être acheminés vers la commande de courrier entrant de Chamilo par l'infrastructure de messagerie.

*Valeur par défaut : `false`*

### `inbound_mail_address`

**Adresse de courriel entrant**

Adresse de base utilisée pour le routage des réponses, par exemple `replies@example.com`. Chamilo ajoute un jeton de destinataire unique au moyen de l'adressage plus.

### `inbound_mail_dsn`

**DSN de la boîte de courrier entrant**

Connexion à la boîte aux lettres utilisée pour collecter les réponses entrantes, par exemple `imaps://user:password@imap.example.com:993/INBOX`. Encodez en URL les caractères réservés dans les identifiants.

### `notifications_extended_footer_message`

**Pied de page étendu des notifications**

Ajouter un pied de page supplémentaire personnalisé aux courriels de notification pour une langue donnée, par exemple pour des mentions relatives à la politique de confidentialité. Plusieurs langues et paragraphes peuvent être ajoutés.

### `send_notification_score_in_percentage`

**Envoyer le score en pourcentage dans la notification des résultats de test**

Envoie les scores d'exercice sous forme de pourcentages plutôt que de points dans les courriels de notification des résultats de test.

*Valeur par défaut : `false`*

### `send_two_inscription_confirmation_mail`

**Envoyer 2 e-mails d'inscription**

Envoyer deux e-mails distincts lors de l'inscription. Un pour le nom d'utilisateur, un autre pour le mot de passe.

*Par défaut : `false`*


### `show_user_email_in_notification`

**Afficher l'adresse e-mail de l'expéditeur dans les notifications**

Inclut l'adresse e-mail de l'expéditeur avec son nom dans les messages personnels et les e-mails de notification.

*Par défaut : `false`*


### `update_users_email_to_dummy_except_admins`

**Mettre à jour l'e-mail des utilisateurs avec une valeur fictive lors des importations**

Lors des importations cron CSV spéciales d'utilisateurs, remplacer automatiquement les e-mails par l'e-mail fictif username@example.com.

*Par défaut : `false`*

### `mailer_dsn_massmailing`

**DSN d'envoi en masse**

DSN Symfony Mailer facultatif pour les diffusions d'annonces de cours et de plateforme. Laissez-le vide pour utiliser le transport de messagerie principal configuré avec `mailer_dsn`. Les notifications individuelles continuent d'utiliser le transport principal. Configurez et testez le transport de messagerie supplémentaire auprès de votre fournisseur de messagerie avant de l'utiliser pour des diffusions de grande ampleur.

*Par défaut : vide (transport principal)*

Voir [PR #9406 sur le transport d'envoi en masse](https://github.com/chamilo/chamilo-lms/pull/9406).