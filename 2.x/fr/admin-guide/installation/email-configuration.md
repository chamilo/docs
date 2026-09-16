# Configuration des e-mails

Chamilo gère désormais la configuration de l'envoi des e-mails depuis le tableau de bord d'administration, dans la section des paramètres de la plateforme (il existe une entrée spécifique pour les e-mails). Les e-mails sont envoyés pour la création de comptes, la réinitialisation de mots de passe, les notifications de cours, les alertes de messages et autres événements de la plateforme. La livraison des e-mails est configurée via un paramètre de configuration `MAILER_DSN`.

## Configuration

Définissez l'option `Mail DSN` dans la section /admin/settings/mail. Le format dépend de votre transport d'e-mails.

### SMTP

La configuration la plus courante, adaptée à tout serveur SMTP :

```bash
# Laisser le système décider
native://default

# SMTP de base
smtp://username:password@smtp.example.com:587

# SMTP avec TLS (la plupart des fournisseurs)
smtp://username:password@smtp.example.com:587?encryption=tls

# SMTP sans authentification (relais local)
smtp://localhost:25
```

Remplacez `username`, `password` et l'hôte par les identifiants de votre serveur SMTP.

### Amazon SES

```bash
# Utilisation de l'interface SMTP
ses+smtp://ACCESS_KEY:SECRET_KEY@default?region=us-east-1

# Utilisation de l'API
ses+api://ACCESS_KEY:SECRET_KEY@default?region=us-east-1
```

Le transport Symfony Amazon Mailer est intégré à Chamilo. Aucune installation supplémentaire n'est requise.

### Mailjet

```bash
mailjet+api://API_KEY:SECRET_KEY@default
```

Le transport Symfony Mailjet est intégré à Chamilo. Aucune installation supplémentaire n'est requise.

### Brevo (anciennement Sendinblue)

```bash
brevo+api://API_KEY@default
```

Le transport Symfony Brevo est intégré à Chamilo. Aucune installation supplémentaire n'est requise.

### Gmail (Développement/Petites plateformes)

```bash
gmail+smtp://your-email@gmail.com:app-password@default
```

Utilisez un mot de passe d'application (App Password), et non votre mot de passe Gmail habituel. Ceci est adapté uniquement aux petites plateformes ou au développement, car Gmail impose des limites d'envoi.

## Paramètres des e-mails de la plateforme

En plus du transport, configurez l'identité de l'expéditeur sur la même page :

| Paramètre | Description |
|-----------|-------------|
| **Envoyer tous les e-mails en tant que provenant de ce nom (organisationnel)** | Le nom affiché associé aux e-mails du système. |
| **Envoyer tous les e-mails depuis cette adresse e-mail** | L'adresse "De" pour tous les e-mails du système. Doit être une adresse valide acceptée par votre transport d'e-mails. Nous recommandons d'utiliser une adresse "no reply" comme `no-reply@votredomaine.com` pour éviter de recevoir des réponses inutiles à des e-mails automatisés. |

## Test de la livraison des e-mails

Après avoir configuré `MAILER_DSN`, testez que les e-mails sont bien livrés : Allez dans *Administration* > *Système* > *Testeur d'e-mail*, spécifiez un destinataire, un sujet et un corps d'e-mail, puis cliquez sur **Envoyer un e-mail de test**.

Si la commande se termine sans erreur mais que l'e-mail n'est pas reçu :

1. Vérifiez le dossier spam/indésirables du destinataire.
2. Assurez-vous que votre domaine d'envoi dispose des enregistrements DNS appropriés (SPF, DKIM, DMARC).
3. Consultez les journaux d'envoi de votre fournisseur de messagerie pour détecter des rebonds ou des rejets.
4. Examinez le journal de Chamilo à `var/log/prod.log` pour des erreurs liées au mailer.
5. Dans les paramètres de configuration des e-mails, activez *Mail : Debug* (non disponible dans la version 2.0, sera bientôt disponible).

## Expérimental : File d'attente des e-mails (Livraison asynchrone)

Par défaut, les e-mails sont envoyés de manière synchrone pendant la requête web. Pour de meilleures performances, configurez une livraison asynchrone en utilisant Symfony Messenger :

```yaml
# config/packages/messenger.yaml
framework:
    messenger:
        transports:
            async: '%env(MESSENGER_TRANSPORT_DSN)%'
        routing:
            'Symfony\Component\Mailer\Messenger\SendEmailMessage': async
```

Avec la livraison asynchrone, les e-mails sont mis en file d'attente et envoyés par un worker en arrière-plan :

```bash
php bin/console messenger:consume async
```

Exécutez ceci en tant que service système (par exemple, via systemd ou supervisord) pour qu'il reste actif.

## Conseils

* **Utilisez un service d'e-mail dédié** (SES, Mailjet, Brevo) pour les plateformes en production. L'envoi direct via SMTP vers votre propre serveur de messagerie nécessite une configuration minutieuse pour éviter des problèmes de délivrabilité.
* **Configurez les enregistrements DNS SPF, DKIM et DMARC** pour votre domaine d'envoi afin de maximiser les taux de livraison et d'empêcher que les e-mails soient marqués comme spam. Vous pouvez également configurer les en-têtes DKIM depuis la page des paramètres des e-mails.
* **Utilisez la livraison asynchrone** sur les plateformes comptant plus de quelques dizaines d'utilisateurs actifs -- l'envoi synchrone d'e-mails peut ralentir sensiblement les requêtes web.