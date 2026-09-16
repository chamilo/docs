# Impostazioni dei Cron Jobs

Configurazione dei lavori pianificati (attività cron) forniti con Chamilo.

Accedi a queste impostazioni tramite **Amministrazione > Impostazioni di configurazione > Cron Jobs**. Questa categoria contiene **3 impostazioni**, elencate di seguito con il titolo e il commento forniti nei dati di configurazione della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospace. Utilizzalo quando scrivi script tramite l'API o quando devi modificare queste impostazioni a livello globale editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `cron_remind_course_expiration_activate`

**Cron di Promemoria Scadenza Corso**

Abilita il cron di Promemoria Scadenza Corso

*Default: `false`*

### `cron_remind_course_expiration_frequency`

**Frequenza per il cron di Promemoria Scadenza Corso**

Numero di giorni prima della scadenza del corso da considerare per l'invio di un'e-mail di promemoria

### `cron_remind_course_finished_activate`

**Invia notifica di corso completato**

Indica se inviare un'e-mail agli studenti quando il loro corso (sessione) è terminato. Questo richiede che le attività cron siano configurate (vedi directory main/cron/).

*Default: `false`*