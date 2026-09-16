# Configurazione Email

Chamilo ora gestisce la configurazione dell'invio delle email dalla dashboard di amministrazione, nella sezione delle impostazioni della piattaforma (c'è una voce specifica per le email). Le email vengono inviate per la creazione di account, il ripristino delle password, le notifiche dei corsi, gli avvisi di messaggi e altri eventi della piattaforma. La consegna delle email è configurata tramite un'impostazione di configurazione `MAILER_DSN`.

## Configurazione

Imposta l'opzione `Mail DSN` nella sezione /admin/settings/mail. Il formato dipende dal tuo sistema di trasporto email.

### SMTP

La configurazione più comune, adatta a qualsiasi server SMTP:

```bash
# Lascia che il sistema decida
native://default

# SMTP di base
smtp://username:password@smtp.example.com:587

# SMTP con TLS (la maggior parte dei provider)
smtp://username:password@smtp.example.com:587?encryption=tls

# SMTP senza autenticazione (relay locale)
smtp://localhost:25
```

Sostituisci `username`, `password` e l'host con le credenziali del tuo server SMTP.

### Amazon SES

```bash
# Utilizzo dell'interfaccia SMTP
ses+smtp://ACCESS_KEY:SECRET_KEY@default?region=us-east-1

# Utilizzo dell'API
ses+api://ACCESS_KEY:SECRET_KEY@default?region=us-east-1
```

Il trasporto Symfony Amazon Mailer è integrato in Chamilo. Non è richiesta alcuna installazione aggiuntiva.

### Mailjet

```bash
mailjet+api://API_KEY:SECRET_KEY@default
```

Il trasporto Symfony Mailjet è integrato in Chamilo. Non è richiesta alcuna installazione aggiuntiva.

### Brevo (precedentemente Sendinblue)

```bash
brevo+api://API_KEY@default
```

Il trasporto Symfony Brevo è integrato in Chamilo. Non è richiesta alcuna installazione aggiuntiva.

### Gmail (Sviluppo/Piccole Piattaforme)

```bash
gmail+smtp://your-email@gmail.com:app-password@default
```

Utilizza una Password App, non la tua password Gmail regolare. Questo è adatto solo per piccole piattaforme o per lo sviluppo, poiché Gmail ha limiti di invio.

## Impostazioni Email della Piattaforma

Oltre al trasporto, configura l'identità del mittente nella stessa pagina:

| Impostazione | Descrizione |
|--------------|-------------|
| **Invia tutte le email come provenienti da questo nome (organizzativo)** | Il nome visualizzato associato alle email di sistema. |
| **Invia tutte le email da questo indirizzo email** | L'indirizzo "Da" per tutte le email di sistema. Deve essere un indirizzo valido accettato dal tuo sistema di trasporto email. Raccomandiamo di utilizzare un indirizzo "no reply" come `no-reply@tuodominio.com` per evitare risposte inutili a email automatizzate. |

## Test della Consegna Email

Dopo aver configurato `MAILER_DSN`, verifica che le email vengano consegnate: Vai su *Amministrazione* > *Sistema* > *Tester email*, specifica un destinatario, un oggetto e il corpo dell'email e clicca su **Invia email di test**.

Se il comando si completa senza errori ma l'email non viene ricevuta:

1. Controlla la cartella spam/junk del destinatario.
2. Verifica che il tuo dominio di invio abbia record DNS corretti (SPF, DKIM, DMARC).
3. Controlla i log di invio del tuo provider di posta per eventuali rimbalzi o rifiuti.
4. Esamina il log di Chamilo in `var/log/prod.log` per errori del mailer.
5. Nelle impostazioni di configurazione email, abilita *Mail: Debug* (non disponibile in 2.0, lo sarà presto).

## Sperimentale: Coda Email (Consegna Asincrona)

Per impostazione predefinita, le email vengono inviate in modo sincrono durante la richiesta web. Per migliorare le prestazioni, configura la consegna asincrona utilizzando Symfony Messenger:

```yaml
# config/packages/messenger.yaml
framework:
    messenger:
        transports:
            async: '%env(MESSENGER_TRANSPORT_DSN)%'
        routing:
            'Symfony\Component\Mailer\Messenger\SendEmailMessage': async
```

Con la consegna asincrona, le email vengono messe in coda e inviate da un worker in background:

```bash
php bin/console messenger:consume async
```

Esegui questo come un servizio di sistema (ad esempio tramite systemd o supervisord) in modo che rimanga attivo.

## Suggerimenti

* **Utilizza un servizio email dedicato** (SES, Mailjet, Brevo) per piattaforme in produzione. L'SMTP diretto al tuo server di posta richiede una configurazione attenta per evitare problemi di deliverability.
* **Configura i record DNS SPF, DKIM e DMARC** per il tuo dominio di invio per massimizzare i tassi di consegna e impedire che le email vengano contrassegnate come spam. Puoi anche configurare le intestazioni DKIM dalla pagina delle impostazioni email.
* **Utilizza la consegna asincrona** su piattaforme con più di poche decine di utenti attivi: l'invio sincrono di email può rallentare notevolmente le richieste web.