# Configurazione e-mail

Chamilo gestisce ora la configurazione dell'invio delle e-mail dalla dashboard di amministrazione, nella sezione delle impostazioni della piattaforma (è presente una voce specifica per le e-mail). Le e-mail vengono inviate per la creazione di account, il ripristino delle password, le notifiche dei corsi, gli avvisi sui messaggi e altri eventi della piattaforma. La consegna delle e-mail è configurata tramite l'impostazione `MAILER_DSN`.

## Configurazione

Impostare l'opzione `Mail DSN` nella sezione /admin/settings/mail. Il formato dipende dal trasporto e-mail utilizzato.

### SMTP

La configurazione più comune, adatta a qualsiasi server SMTP:

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

Sostituire `username`, `password` e l'host con le credenziali del proprio server SMTP.

### Amazon SES

```bash
# Using SMTP interface
ses+smtp://ACCESS_KEY:SECRET_KEY@default?region=us-east-1

# Using API
ses+api://ACCESS_KEY:SECRET_KEY@default?region=us-east-1
```

Il trasporto Symfony Amazon Mailer è già incluso in Chamilo. Non è richiesta alcuna installazione aggiuntiva.

### Mailjet

```bash
mailjet+api://API_KEY:SECRET_KEY@default
```

Il trasporto Symfony Mailjet è già incluso in Chamilo. Non è richiesta alcuna installazione aggiuntiva.

### Brevo (già Sendinblue)

```bash
brevo+api://API_KEY@default
```

Il trasporto Symfony Brevo è già incluso in Chamilo. Non è richiesta alcuna installazione aggiuntiva.

### Microsoft 365 / Outlook (Microsoft Graph API)

Microsoft sta dismettendo SMTP con autenticazione di base in Exchange Online, pertanto un DSN semplice `smtp://user:password@smtp.office365.com:587` funziona solo finché l'amministratore del tenant mantiene esplicitamente abilitato "Authenticated SMTP" su quella casella di posta specifica. Inviare invece tramite Microsoft Graph API — che non usa affatto SMTP:

```bash
microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@default?tenantId=TENANT_ID
```

Il trasporto Symfony Microsoft Graph è già incluso in Chamilo. Non è richiesta alcuna installazione aggiuntiva.

Per ottenere questi tre valori, nel [centro di amministrazione Microsoft Entra](https://entra.microsoft.com):

1. Registrare un'applicazione. Il relativo **Application (client) ID** e **Directory (tenant) ID** sono `CLIENT_ID` e `TENANT_ID`.
2. In *API permissions*, aggiungere l'autorizzazione **application** di Microsoft Graph `Mail.Send` (non quella delegata), quindi concedere il consenso amministratore.
3. In *Certificates & secrets*, creare un client secret. Il relativo **value** (non l'ID) è `CLIENT_SECRET`.

Note:

* Codificare in URL qualsiasi carattere con un significato speciale in un URL che compare nel client secret (`@` come `%40`, `+` come `%2B`, `/` come `%2F`, e così via).
* L'indirizzo configurato in **Invia tutte le e-mail da questo indirizzo e-mail** deve essere una casella di posta reale all'interno del tenant, altrimenti Microsoft rifiuta il messaggio.
* Aggiungere `&noSave=true` al DSN se non si desidera che una copia di ogni e-mail della piattaforma venga salvata nella cartella *Posta inviata* del mittente.
* Per i cloud nazionali, puntare il DSN agli endpoint corretti, senza il prefisso `https://`: `microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@microsoftgraph.chinacloudapi.cn?tenantId=TENANT_ID&authEndpoint=login.partner.microsoftonline.cn`.

**Avviso di sicurezza:** l'autorizzazione *application* `Mail.Send` consente all'applicazione registrata di inviare e-mail come **qualsiasi** casella di posta del tenant, non solo quella usata da Chamilo. Limitarla alla casella del mittente con una policy di accesso applicazione di Exchange Online:

```powershell
New-ApplicationAccessPolicy -AppId CLIENT_ID -PolicyScopeGroupId no-reply@yourdomain.com -AccessRight RestrictAccess -Description "Restrict Chamilo to its sender mailbox"
```

### Gmail (sviluppo/piattaforme piccole)

```bash
gmail+smtp://your-email@gmail.com:app-password@default
```

Utilizzare una password per le app, non la password Gmail ordinaria. Questa soluzione è adatta solo a piattaforme piccole o allo sviluppo, poiché Gmail ha limiti di invio.

## Impostazioni e-mail della piattaforma

Oltre al trasporto, configurare l'identità del mittente nella stessa pagina:

| Impostazione | Descrizione |
|---------|-------------|
| **Invia tutte le e-mail come originarie da questo nome (organizzativo)** | Il nome visualizzato associato alle e-mail di sistema. |
| **Invia tutte le e-mail da questo indirizzo e-mail** | L'indirizzo "From" per tutte le e-mail di sistema. Deve essere un indirizzo valido accettato dal trasporto di posta. Si raccomanda di usare un indirizzo "no reply" come `no-reply@yourdomain.com` per evitare di ricevere risposte inutili alle e-mail automatiche. |

## Test della consegna delle e-mail

Dopo aver configurato `MAILER_DSN`, verificare che le e-mail vengano consegnate: andare su *Amministrazione* > *Sistema* > *Tester e-mail*, specificare un destinatario, un oggetto e un corpo del messaggio e fare clic su **Invia e-mail di prova**.

Se il comando termina senza errori ma l'e-mail non viene ricevuta:

1. Controllare la cartella spam/posta indesiderata del destinatario.
2. Verificare che il dominio di invio abbia i record DNS corretti (SPF, DKIM, DMARC).
3. Controllare i log di invio del provider di posta per rimbalzi o rifiuti.
4. Esaminare il log di Chamilo in `var/log/prod.log` per errori del mailer.
5. Nelle impostazioni di configurazione e-mail, abilitare *Mail: Debug* (non disponibile in 3.0, lo sarà a breve).

## Sperimentale: coda e-mail (consegna asincrona)

Per impostazione predefinita, le e-mail vengono inviate in modo sincrono durante la richiesta web. Per prestazioni migliori, configurare la consegna asincrona utilizzando Symfony Messenger:

```yaml
# config/packages/messenger.yaml
framework:
    messenger:
        transports:
            async: '%env(MESSENGER_TRANSPORT_DSN)%'
        routing:
            'Symfony\Component\Mailer\Messenger\SendEmailMessage': async
```

Con la consegna asincrona, le e-mail vengono accodate e inviate da un worker in background:

```bash
php bin/console messenger:consume async
```

Eseguirlo come servizio di sistema (ad es. tramite systemd o supervisord) in modo che resti in esecuzione.

## Consigli

* **Utilizzare un servizio e-mail dedicato** (SES, Mailjet, Brevo) per le piattaforme di produzione. L'SMTP diretto verso il proprio server di posta richiede una configurazione attenta per evitare problemi di consegnabilità.
* **Configurare i record DNS SPF, DKIM e DMARC** per il dominio di invio, al fine di massimizzare i tassi di consegna e impedire che le e-mail vengano contrassegnate come spam. È inoltre possibile configurare le intestazioni DKIM dalla pagina delle impostazioni e-mail.
* **Utilizzare la consegna asincrona** sulle piattaforme con più di qualche decina di utenti attivi: l'invio sincrono delle e-mail può rallentare in modo evidente le richieste web.