# Impostazioni degli annunci

Comportamento dello strumento **Announcements** del corso — come gli annunci vengono inviati e programmati.

Accedere a queste impostazioni in **Amministrazione > Impostazioni di configurazione > Announcements**. Questa categoria contiene **10 impostazioni**, elencate di seguito con il titolo e il commento forniti nei fixture delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospazio. Utilizzarlo quando si esegue lo scripting tramite l'API o quando è necessario modificare tali impostazioni a livello globale modificando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `allow_careers_in_global_announcements`

**Collegare gli annunci globali a carriere e promozioni**

Se abilitata, gli annunci globali possono essere associati a carriere e promozioni per una distribuzione mirata.

*Predefinito: `false`*

### `allow_coach_to_edit_announcements`

**Consentire ai tutor di modificare sempre gli annunci**

Consentire ai tutor di modificare sempre gli annunci all'interno delle sessioni attive o passate.

*Predefinito: `false`*

### `allow_scheduled_announcements`

**Abilitare gli annunci programmati nelle sessioni**

Consente ai gestori delle sessioni di impostare annunci che verranno attivati in date specifiche o dopo/prima un certo numero di giorni dall'inizio/fine della sessione. L'abilitazione di questa funzionalità richiede la configurazione di un'attività cron.

*Predefinito: `false`*

### `announcements_hide_send_to_hrm_users`

**Nascondere l'opzione per inviare gli annunci agli utenti HR**

Rimuovere la casella di controllo per abilitare l'invio degli annunci agli utenti con ruoli HR (è comunque necessario confermare nello strumento degli annunci).

*Predefinito: `true`*

### `course_announcement_scheduled_by_date`

**Annunci basati sulla data**

Consentire ai docenti di configurare annunci che verranno inviati in date specifiche. Ciò richiede la configurazione di un'attività cron su cron/course_announcement.php eseguita almeno una volta al giorno.

*Predefinito: `false`*

### `disable_announcement_attachment`

**Disabilitare gli allegati agli annunci**

Anche se in questa versione gli allegati sono gestiti in modo elegante e non si moltiplicano sul disco, potrebbe essere opportuno disabilitare del tutto gli allegati se si desidera evitare eccessi.

*Predefinito: `false`*

### `disable_delete_all_announcements`

**Disabilitare il pulsante per eliminare tutti gli annunci**

Selezionare «Sì» per rimuovere il pulsante per eliminare tutti gli annunci, poiché può essere usato per errore dai docenti.

*Predefinito: `false`*

### `hide_announcement_sent_to_users_info`

**Nascondere «inviato a» negli annunci**

Selezionare «Sì» per evitare di mostrare a chi è stato inviato un annuncio.

*Predefinito: `false`*

### `hide_global_announcements_when_not_connected` **v3**

**Nascondere gli annunci globali per gli utenti anonimi**

Nascondere gli annunci della piattaforma agli utenti anonimi e mostrarli solo agli utenti autenticati.

*Predefinito: `false`*

### `hide_send_to_hrm_users`

**Nascondere l'opzione per inviare una copia dell'annuncio all'HRM**

Nel modulo degli annunci compare normalmente un'opzione che consente ai docenti di inviare una copia dell'annuncio all'HRM dell'utente. Impostare su «Sì» per rimuovere l'opzione (e *non* inviare la copia).