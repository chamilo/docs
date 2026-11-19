# Configuration des e-mails

Chamilo gère désormais la configuration de l’envoi des e-mails depuis le tableau de bord d’administration, section des paramètres de la plateforme (une entrée spécifique est dédiée aux e-mails). Des e-mails sont envoyés pour les créations de comptes, les réinitialisations de mot de passe, les notifications de cours, les alertes de messages et d’autres événements de la plateforme. La distribution des e-mails est configurée au moyen du paramètre de configuration `MAILER_DSN`.

## Configuration

Définissez l’option `Mail DSN` dans la section /admin/settings/mail. Le format dépend de votre transport de messagerie.

### SMTP

La configuration la plus courante, adaptée à tout serveur SMTP :

```bash
# Let the system decide
native://default

# Basic SMTP
smtp://username:password@smtp.example.com:587

# SMTP with TLS (most providers)
smtp://username:password@smtp.example.com:587?encryption=tls

# SMTP without authentication (local relay)
smtp://localhost:25
```

Remplacez `username`, `password` et l’hôte par les identifiants de votre serveur SMTP.

### Amazon SES

```bash
# Using SMTP interface
ses+smtp://ACCESS_KEY:SECRET_KEY@default?region=us-east-1

# Using API
ses+api://ACCESS_KEY:SECRET_KEY@default?region=us-east-1
```

Le transport Symfony Amazon Mailer est intégré à Chamilo. Aucune installation supplémentaire n’est requise.

### Mailjet

```bash
mailjet+api://API_KEY:SECRET_KEY@default
```

Le transport Symfony Mailjet est intégré à Chamilo. Aucune installation supplémentaire n’est requise.

### Brevo (anciennement Sendinblue)

```bash
brevo+api://API_KEY@default
```

Le transport Symfony Brevo est intégré à Chamilo. Aucune installation supplémentaire n’est requise.

### Microsoft 365 / Outlook (API Microsoft Graph)

Microsoft retire progressivement SMTP avec l’authentification de base dans Exchange Online ; un DSN simple `smtp://user:password@smtp.office365.com:587` ne fonctionne donc que tant que l’administrateur de votre locataire maintient explicitement « Authenticated SMTP » activé sur cette boîte aux lettres précise. Envoyez plutôt via l’API Microsoft Graph — elle n’utilise pas SMTP du tout :

```bash
microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@default?tenantId=TENANT_ID
```

Le transport Symfony Microsoft Graph est intégré à Chamilo. Aucune installation supplémentaire n’est requise.

Pour obtenir ces trois valeurs, dans le [centre d’administration Microsoft Entra](https://entra.microsoft.com) :

1. Enregistrez une application. Son **ID d’application (client)** et son **ID d’annuaire (locataire)** correspondent à `CLIENT_ID` et `TENANT_ID`.
2. Sous *API permissions*, ajoutez l’autorisation d’**application** Microsoft Graph `Mail.Send` (et non l’autorisation déléguée), puis accordez le consentement administrateur.
3. Sous *Certificates & secrets*, créez un secret client. Sa **valeur** (et non son ID) correspond à `CLIENT_SECRET`.

Remarques :

* Encodez pour l’URL tout caractère ayant une signification particulière dans une URL et présent dans le secret client (`@` en `%40`, `+` en `%2B`, `/` en `%2F`, et ainsi de suite).
* L’adresse configurée dans **Send all e-mails from this e-mail address** doit être une boîte aux lettres réelle de votre locataire, sinon Microsoft rejette le message.
* Ajoutez `&noSave=true` au DSN si vous ne souhaitez pas qu’une copie de chaque e-mail de la plateforme soit stockée dans le dossier *Sent Items* de l’expéditeur.
* Pour les clouds nationaux, orientez le DSN vers les points de terminaison appropriés, sans le préfixe `https://` : `microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@microsoftgraph.chinacloudapi.cn?tenantId=TENANT_ID&authEndpoint=login.partner.microsoftonline.cn`.

**Avertissement de sécurité :** l’autorisation d’*application* `Mail.Send` permet à l’application enregistrée d’envoyer des e-mails en tant que **n’importe quelle** boîte aux lettres du locataire, et pas seulement celle utilisée par Chamilo. Restreignez-la à la boîte aux lettres de l’expéditeur au moyen d’une stratégie d’accès aux applications Exchange Online :

```powershell
New-ApplicationAccessPolicy -AppId CLIENT_ID -PolicyScopeGroupId no-reply@yourdomain.com -AccessRight RestrictAccess -Description "Restrict Chamilo to its sender mailbox"
```

### Gmail (développement / petites plateformes)

```bash
gmail+smtp://your-email@gmail.com:app-password@default
```

Utilisez un mot de passe d’application, et non votre mot de passe Gmail habituel. Cette solution convient uniquement aux petites plateformes ou au développement, car Gmail impose des limites d’envoi.

## Paramètres de messagerie de la plateforme

En plus du transport, configurez l’identité de l’expéditeur sur la même page :

| Paramètre | Description |
|---------|-------------|
| **Send all e-mails as originating from this (organizational) name** | Le nom d’affichage associé aux e-mails système. |
| **Send all e-mails from this e-mail address** | L’adresse « De » de tous les e-mails système. Elle doit être une adresse valide acceptée par votre transport de messagerie. Nous recommandons d’utiliser une adresse « no reply » telle que `no-reply@yourdomain.com` afin d’éviter de recevoir des réponses inutiles aux e-mails automatisés. |

## Réponses entrantes aux messages directs

Chamilo peut permettre à un destinataire de répondre à une notification de message direct depuis son client de messagerie habituel et de transformer cette réponse en message dans la boîte de réception de Chamilo. Configurez les éléments suivants sous **Administration > Paramètres de configuration > Courriel** :

1. Définissez **Autoriser les réponses par e-mail aux messages** (`enable_inbound_mail`) sur **Oui**.
2. Définissez **Adresse e-mail entrante** (`inbound_mail_address`) sur une adresse de base valide, telle que `replies@example.com`. Chamilo utilise l'adressage « plus » (plus addressing) pour construire une adresse unique telle que `replies+TOKEN@example.com` pour chaque destinataire.
3. Acheminez ces messages entrants vers Chamilo à l'aide de l'une des méthodes ci-dessous.

### Interrogation d'une boîte aux lettres IMAP

Définissez **DSN de la boîte aux lettres entrante** (`inbound_mail_dsn`) sur la boîte aux lettres qui reçoit les réponses, par exemple :

```text
imaps://user:password@imap.example.com:993/INBOX
```

Encodez en URL les caractères réservés du nom d'utilisateur ou du mot de passe. Exécutez ensuite périodiquement le collecteur de boîte aux lettres, par exemple toutes les cinq minutes :

```bash
*/5 * * * * cd /path/to/chamilo && php bin/console chamilo:mail:fetch-inbound --no-interaction
```

Le collecteur traite les messages non lus par lots. Les messages en échec restent non lus par défaut afin de pouvoir être réessayés ; n'utilisez `--mark-failed-seen` que si vous ne souhaitez explicitement pas ce comportement de nouvelle tentative.

### Transmission du courrier depuis le MTA

Un MTA peut à la place transmettre (pipe) un message RFC822 brut directement à Chamilo :

```bash
php bin/console chamilo:mail:process-inbound
```

La commande lit depuis STDIN ; `--file` peut être utilisé pour un message enregistré et `--recipient` peut fournir le destinataire de l'enveloppe SMTP lorsque l'en-tête `To` a été réécrit.

Pour des raisons de sécurité, Chamilo n'accepte la réponse que lorsque son jeton identifie un destinataire de message valide et que l'adresse `From` du message correspond à l'adresse e-mail de ce destinataire dans Chamilo. L'expéditeur d'origine et l'utilisateur qui répond doivent toujours être actifs. Seul le nouveau texte de la réponse est enregistré ; l'historique cité est retiré lorsque c'est possible.

## Suivi des ouvertures d'e-mails

Définissez **Suivre les ouvertures d'e-mails** (`enable_email_open_tracking`) sur **Oui** pour ajouter une petite image de suivi aux e-mails de notification de messages directs. Lorsque cette image est demandée, Chamilo enregistre l'heure et peut l'afficher dans les messages **Envoyés** de l'expéditeur, sous **Notifications par e-mail**.

Un horodatage de suivi d'ouverture signifie uniquement que l'image a été demandée. Les clients de messagerie peuvent bloquer les images, les précharger ou les relayer par proxy ; il ne doit donc pas être considéré comme une preuve que le destinataire a réellement lu le message.

## Test de la distribution des e-mails

Après avoir configuré `MAILER_DSN`, vérifiez que les e-mails sont bien distribués : allez dans *Administration* > *Système* > *Testeur d'e-mails*, indiquez un destinataire, un objet et un corps de message, puis cliquez sur **Envoyer un e-mail de test**.

Si la commande se termine sans erreur mais que l'e-mail n'est pas reçu :

1. Vérifiez le dossier de courrier indésirable (spam) du destinataire.
2. Vérifiez que votre domaine d'envoi dispose des enregistrements DNS appropriés (SPF, DKIM, DMARC).
3. Consultez les journaux d'envoi de votre fournisseur de messagerie pour détecter les rebonds ou les rejets.
4. Examinez le journal de Chamilo situé dans `var/log/prod.log` à la recherche d'erreurs du mailer.
5. Dans les paramètres de configuration des e-mails, activez *Courriel : débogage* (non disponible dans la version 3.0, le sera prochainement).

## Expérimental : file d'attente des e-mails (distribution asynchrone)

Par défaut, les e-mails sont envoyés de manière synchrone pendant la requête web. Pour de meilleures performances, configurez une distribution asynchrone à l'aide de Symfony Messenger :

```yaml
# config/packages/messenger.yaml
framework:
    messenger:
        transports:
            async: '%env(MESSENGER_TRANSPORT_DSN)%'
        routing:
            'Symfony\Component\Mailer\Messenger\SendEmailMessage': async
```

Avec la distribution asynchrone, les e-mails sont mis en file d'attente et envoyés par un worker en arrière-plan :

```bash
php bin/console messenger:consume async
```

Exécutez-le en tant que service système (par exemple via systemd ou supervisord) afin qu'il reste actif.

## Conseils

* **Utilisez un service de messagerie dédié** (SES, Mailjet, Brevo) pour les plateformes de production. Un SMTP direct vers votre propre serveur de messagerie exige une configuration soignée afin d'éviter les problèmes de délivrabilité.
* **Configurez les enregistrements DNS SPF, DKIM et DMARC** de votre domaine d'envoi afin de maximiser les taux de distribution et d'éviter que les e-mails ne soient marqués comme indésirables. Vous pouvez également configurer les en-têtes DKIM depuis la page des paramètres d'e-mail.
* **Utilisez la distribution asynchrone** sur les plateformes comptant plus de quelques dizaines d'utilisateurs actifs -- l'envoi synchrone d'e-mails peut ralentir sensiblement les requêtes web.