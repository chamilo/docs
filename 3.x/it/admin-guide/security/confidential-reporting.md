# Segnalazione riservata

Chamilo include un flusso di lavoro opzionale di **segnalazione riservata** per inviare a investigatori autorizzati preoccupazioni relative a un altro utente. Non si tratta dello strumento ordinario di ticket di supporto né di un forum di discussione pubblico.

## Abilitare la funzionalità

Aprire **Amministrazione > Impostazioni di configurazione > Sicurezza** e configurare:

| Impostazione | Predefinito | Scopo |
|---|---|---|
| `security.confidential_reporting_enabled` | `false` | Abilitare il flusso di lavoro di segnalazione riservata |
| `security.confidential_reporting_min_reporters` | `2` | Numero minimo di segnalanti distinti (2–10) prima che un'indagine diventi visibile |
| `security.confidential_reporting_attachments_enabled` | `true` | Consentire allegati di prove |
| `security.confidential_reporting_notifications_enabled` | `false` | Mostrare indicatori interni per le indagini idonee (nessuna e-mail) |

La distribuzione richiede inoltre che la crittografia della segnalazione riservata e l'archiviazione privata del server siano pronte. Chamilo utilizza le funzioni crittografiche PHP Sodium e una chiave di crittografia privata; **conservare e sottoporre a backup tale chiave in modo sicuro**. La sua perdita può rendere illeggibili le segnalazioni archiviate. Non copiare la chiave in un repository Git. Non abilitare la funzionalità prima di aver verificato che l'archiviazione della chiave privata e le migrazioni del database richieste siano operative.

## Invio di una segnalazione

1. Accedere direttamente a Chamilo e aprire **Segnalazione riservata** (quando abilitata per il portale).
2. Scegliere la persona interessata, inserire un oggetto e descrivere l'incidente.
3. Aggiungere prove se gli allegati sono abilitati.
4. Decidere se gli investigatori possono vedere il proprio **nome e indirizzo e-mail** per questa specifica segnalazione. Questa autorizzazione può essere revocata in seguito.
5. Inviare la segnalazione. Utilizzare **Le mie segnalazioni riservate** per seguire il caso e scambiare messaggi con un investigatore.

L'identità del segnalante **non viene mostrata agli investigatori per impostazione predefinita**. Si tratta di un controllo di riservatezza, non di una promessa di anonimato assoluto rispetto agli operatori del sistema.

## Autorizzazioni e soglie di indagine

Le indagini richiedono l'autorizzazione dedicata `welfare:investigate` e un ruolo di amministratore o HR idoneo. Un caso diventa disponibile per l'indagine solo dopo che è stato raggiunto il numero configurato di **segnalanti distinti** per lo stesso obiettivo. Un investigatore non può indagare su una segnalazione che lo riguarda. L'accesso HR è limitato agli utenti seguiti dal responsabile HR.

Gli investigatori accedono a **Indagini riservate** per visualizzare i casi idonei, esaminare le prove e scambiare messaggi. I casi al di sotto della soglia o non autorizzati non sono esposti tramite l'API di indagine. L'**impersonificazione** amministrativa non fornisce accesso alla segnalazione riservata.

## Privacy e cura operativa

Le segnalazioni e le prove allegate contengono dati personali sensibili. Limitare le autorizzazioni degli investigatori, limitare l'accesso ai backup, definire una politica organizzativa di conservazione appropriata e testare il flusso di lavoro con account distinti di segnalante, obiettivo e investigatore. Evitare di copiare segnalazioni complete nei log tecnici o nei sistemi di tracciamento delle issue.

Implementazione: [Segnalazione riservata #9310](https://github.com/chamilo/chamilo-lms/pull/9310).