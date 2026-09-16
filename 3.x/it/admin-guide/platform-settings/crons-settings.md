# Impostazioni dei job cron

Configurazione dei job pianificati (attività cron) forniti con Chamilo.

Accedere a queste impostazioni in **Amministrazione > Impostazioni di configurazione > Job cron**. Questa categoria contiene **5 impostazioni**, elencate di seguito con il titolo e il commento forniti nei fixture delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospazio. Utilizzarlo quando si esegue lo scripting tramite API o quando è necessario modificare tali impostazioni a livello globale modificando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `cron_remind_course_expiration_activate`

**Cron di promemoria scadenza corso**

Abilita il cron di promemoria scadenza corso

*Predefinito: `false`*

### `cron_remind_course_expiration_frequency`

**Frequenza del cron di promemoria scadenza corso**

Numero di giorni prima della scadenza del corso da considerare per l'invio dell'e-mail di promemoria

### `cron_remind_course_finished_activate`

**Invia notifica di corso terminato**

Indica se inviare un'e-mail agli studenti quando il loro corso (sessione) è terminato. Richiede che le attività cron siano configurate (vedere la directory main/cron/).

*Predefinito: `false`*

### `cron_certificate_expiry_reminder_activate`

**Cron di promemoria scadenza certificato**

Abilita il cron `app:send-certificate-expiry-reminders`, che ricorda agli studenti i cui certificati sono scaduti o stanno per scadere.

*Predefinito: `false`*

### `cron_certificate_expiry_reminder_days`

**Finestra di promemoria scadenza certificato (giorni)**

Numero predefinito di giorni in anticipo da analizzare per i certificati in procinto di scadere, utilizzato a meno che il cron non venga eseguito con `--days-ahead`.

*Predefinito: `30`*

## Promemoria di scadenza dei certificati

Ai certificati del gradebook può essere assegnato un periodo di validità (in giorni), configurato per categoria di gradebook — vedere [Certificati e competenze](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md). Una volta che un certificato ha una data di scadenza, Chamilo può ricordare allo studente tramite e-mail e messaggio interno quando tale data si avvicina (o dopo che è trascorsa).

L'abilitazione di `cron_certificate_expiry_reminder_activate` sopra attiva solo la *funzionalità*; il promemoria viene effettivamente inviato da un comando della console che è comunque necessario pianificare a livello di sistema operativo (ad es. tramite `crontab`), poiché Chamilo non esegue un proprio scheduler in background:

```bash
php bin/console app:send-certificate-expiry-reminders
```

Opzioni utili:

| Opzione | Effetto |
|--------|--------|
| `--days-ahead=N` | Quanti giorni prima della scadenza includere (predefinito: `cron_certificate_expiry_reminder_days`) |
| `--force` | Invia effettivamente i promemoria. Senza di essa, il comando riporta solo ciò che *invierrebbe* — sicuro da eseguire per verificare prima di inserirlo nel cron |
| `--resend` | Reinvia i promemoria anche per una coppia certificato/data di scadenza già notificata |
| `--access-url-id=N` | Limita l'analisi a un solo portale (installazioni multi-URL) |
| `--include-unsubscribed-users` | Notifica anche gli studenti che si sono disiscritti dalle e-mail della piattaforma |

I docenti possono inviare gli stessi promemoria manualmente, senza bisogno di questo cron — vedere [Certificati e competenze](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry).