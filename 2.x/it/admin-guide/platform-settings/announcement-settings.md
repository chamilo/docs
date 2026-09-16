# Impostazioni degli Annunci

Comportamento dello strumento **Annunci** del corso — come gli annunci vengono inviati e programmati.

Accedi a queste impostazioni tramite **Amministrazione > Impostazioni di configurazione > Annunci**. Questa categoria contiene **9 impostazioni**, elencate di seguito con il titolo e il commento forniti nei dati di configurazione della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospace. Utilizzalo quando scrivi script tramite l'API o quando devi modificare queste impostazioni a livello globale editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `allow_careers_in_global_announcements`

**Collega gli annunci globali a carriere e promozioni**

Quando abilitato, gli annunci globali possono essere associati a carriere e promozioni per una distribuzione mirata.

*Predefinito: `false`*

### `allow_coach_to_edit_announcements`

**Consenti ai coach di modificare sempre gli annunci**

Permetti ai coach di modificare sempre gli annunci all'interno di sessioni attive o passate.

*Predefinito: `false`*

### `allow_scheduled_announcements`

**Abilita annunci programmati nelle sessioni**

Consente ai gestori delle sessioni di impostare annunci che verranno attivati in date specifiche o dopo/prima di un numero di giorni dall'inizio/fine della sessione. L'abilitazione di questa funzionalità richiede la configurazione di un compito cron.

*Predefinito: `false`*

### `announcements_hide_send_to_hrm_users`

**Nascondi l'opzione per inviare annunci agli utenti HR**

Rimuove la casella di controllo per abilitare l'invio di annunci agli utenti con ruoli HR (richiede comunque conferma nello strumento annunci).

*Predefinito: `true`*

### `course_announcement_scheduled_by_date`

**Annunci basati sulla data**

Consenti agli insegnanti di configurare annunci che verranno inviati in date specifiche. Questo richiede la configurazione di un compito cron su cron/course_announcement.php che venga eseguito almeno una volta al giorno.

*Predefinito: `false`*

### `disable_announcement_attachment`

**Disabilita gli allegati agli annunci**

Anche se in questa versione gli allegati sono gestiti in modo elegante e non si moltiplicano su disco, potresti voler disabilitare completamente gli allegati se desideri evitare eccessi.

*Predefinito: `false`*

### `disable_delete_all_announcements`

**Disabilita il pulsante per eliminare tutti gli annunci**

Seleziona 'Sì' per rimuovere il pulsante per eliminare tutti gli annunci, poiché potrebbe essere utilizzato per errore dagli insegnanti.

*Predefinito: `false`*

### `hide_announcement_sent_to_users_info`

**Nascondi 'inviato a' negli annunci**

Seleziona 'Sì' per evitare di mostrare a chi è stato inviato un annuncio.

*Predefinito: `false`*

### `hide_send_to_hrm_users`

**Nascondi l'opzione per inviare una copia dell'annuncio a HRM**

Nel modulo degli annunci, normalmente appare un'opzione che consente agli insegnanti di inviare una copia dell'annuncio all'HRM dell'utente. Imposta su 'Sì' per rimuovere l'opzione (e *non* inviare la copia).