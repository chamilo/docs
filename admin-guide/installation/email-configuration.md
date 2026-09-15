# Configuration des e-mails

Chamilo gère désormais la configuration de l’envoi des e-mails depuis le tableau de bord d’administration, section des paramètres de la plateforme (il existe une entrée spécifique pour les e-mails). Les e-mails sont envoyés pour les créations de comptes, les réinitialisations de mot de passe, les notifications de cours, les alertes de messages et d’autres événements de la plateforme. La livraison des e-mails est configurée via un paramètre de configuration `MAILER_DSN`.

## Configuration

Définissez l’option `Mail DSN` dans la section /admin/settings/mail. Le format dépend de votre transport d’e-mail.

### SMTP

La configuration la plus courante, adaptée à n’importe quel serveur SMTP :

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

### Microsoft 365 / Outlook (Microsoft Graph API)

Microsoft abandonne SMTP avec l’authentification de base dans Exchange Online ; un DSN simple `smtp://user:password@smtp.office365.com:587` ne fonctionne donc que tant que l’administrateur du locataire maintient « Authenticated SMTP » explicitement activé sur cette boîte aux lettres précise. Envoyez plutôt via l’API Microsoft Graph — elle n’utilise pas SMTP du tout :

```bash
microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@default?tenantId=TENANT_ID
```

Le transport Symfony Microsoft Graph est intégré à Chamilo. Aucune installation supplémentaire n’est requise.

Pour obtenir ces trois valeurs, dans le [centre d’administration Microsoft Entra](https://entra.microsoft.com) :

1. Enregistrez une application. Son **ID d’application (client)** et son **ID d’annuaire (locataire)** sont `CLIENT_ID` et `TENANT_ID`.
2. Sous *API permissions*, ajoutez la permission **application** Microsoft Graph `Mail.Send` (et non la permission déléguée), puis accordez le consentement administrateur.
3. Sous *Certificates & secrets*, créez un secret client. Sa **valeur** (et non son ID) est `CLIENT_SECRET`.

Notes :

* Encodez en URL tout caractère ayant une signification spéciale dans une URL qui apparaît dans le secret client (`@` en `%40`, `+` en `%2B`, `/` en `%2F`, et ainsi de suite).
* L’adresse configurée dans **Envoyer tous les e-mails depuis cette adresse e-mail** doit être une véritable boîte aux lettres de votre locataire, sinon Microsoft rejette le message.
* Ajoutez `&noSave=true` au DSN si vous ne souhaitez pas qu’une copie de chaque e-mail de la plateforme soit stockée dans le dossier *Éléments envoyés* de l’expéditeur.
* Pour les clouds nationaux, pointez le DSN vers les bons points de terminaison, sans le préfixe `https://` : `microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@microsoftgraph.chinacloudapi.cn?tenantId=TENANT_ID&authEndpoint=login.partner.microsoftonline.cn`.

**Avertissement de sécurité :** la permission *application* `Mail.Send` permet à l’application enregistrée d’envoyer des e-mails depuis **n’importe quelle** boîte aux lettres du locataire, et pas seulement celle utilisée par Chamilo. Restreignez-la à la boîte de l’expéditeur avec une stratégie d’accès d’application Exchange Online :

```powershell
New-ApplicationAccessPolicy -AppId CLIENT_ID -PolicyScopeGroupId no-reply@yourdomain.com -AccessRight RestrictAccess -Description "Restrict Chamilo to its sender mailbox"
```

### Gmail (développement / petites plateformes)

```bash
gmail+smtp://your-email@gmail.com:app-password@default
```

Utilisez un mot de passe d’application, et non votre mot de passe Gmail habituel. Cette solution convient uniquement aux petites plateformes ou au développement, car Gmail impose des limites d’envoi.

## Paramètres d’e-mail de la plateforme

Outre le transport, configurez l’identité de l’expéditeur sur la même page :

| Paramètre | Description |
|---------|-------------|
| **Envoyer tous les e-mails comme provenant de ce nom (organisationnel)** | Le nom d’affichage associé aux e-mails système. |
| **Envoyer tous les e-mails depuis cette adresse e-mail** | L’adresse « De » pour tous les e-mails système. Doit être une adresse valide acceptée par votre transport de messagerie. Nous recommandons d’utiliser une adresse « no reply » du type `no-reply@yourdomain.com` afin d’éviter de recevoir des réponses inutiles aux e-mails automatisés. |

## Test de l'envoi des e-mails

Après avoir configuré `MAILER_DSN`, vérifiez que les e-mails sont bien délivrés : allez dans *Administration* > *Système* > *Testeur d'e-mails*, indiquez un destinataire, un objet et un corps de message, puis cliquez sur **Envoyer l'e-mail de test**.

Si la commande se termine sans erreur mais que l'e-mail n'est pas reçu :

1. Vérifiez le dossier spam/indésirables du destinataire.
2. Vérifiez que le domaine d'envoi dispose des enregistrements DNS appropriés (SPF, DKIM, DMARC).
3. Consultez les journaux d'envoi de votre fournisseur de messagerie pour détecter les rejets ou les retours (bounces).
4. Consultez le journal Chamilo dans `var/log/prod.log` pour les erreurs du mailer.
5. Dans les paramètres de configuration des e-mails, activez *Mail : Debug* (non disponible en 3.0, bientôt disponible).

## Expérimental : file d'attente des e-mails (envoi asynchrone)

Par défaut, les e-mails sont envoyés de façon synchrone pendant la requête web. Pour de meilleures performances, configurez l'envoi asynchrone avec Symfony Messenger :

```yaml
# config/packages/messenger.yaml
framework:
    messenger:
        transports:
            async: '%env(MESSENGER_TRANSPORT_DSN)%'
        routing:
            'Symfony\Component\Mailer\Messenger\SendEmailMessage': async
```

Avec l'envoi asynchrone, les e-mails sont mis en file d'attente et envoyés par un worker en arrière-plan :

```bash
php bin/console messenger:consume async
```

Exécutez-le en tant que service système (par exemple via systemd ou supervisord) afin qu'il reste actif.

## Conseils

* **Utilisez un service d'e-mail dédié** (SES, Mailjet, Brevo) pour les plateformes de production. L'envoi SMTP direct vers votre propre serveur de messagerie exige une configuration soignée pour éviter les problèmes de délivrabilité.
* **Configurez les enregistrements DNS SPF, DKIM et DMARC** pour votre domaine d'envoi afin de maximiser les taux de délivrance et d'éviter que les e-mails soient marqués comme spam. Vous pouvez également configurer les en-têtes DKIM depuis la page des paramètres d'e-mail.
* **Utilisez l'envoi asynchrone** sur les plateformes comptant plus de quelques dizaines d'utilisateurs actifs — l'envoi synchrone d'e-mails peut ralentir notablement les requêtes web.