# Impostazioni dei certificati

Valori predefiniti applicati quando un discente ottiene un certificato dal gradebook.

Accedere a queste impostazioni in **Amministrazione > Impostazioni di configurazione > Certificati**. Questa categoria contiene **11 impostazioni**, elencate di seguito con il titolo e il commento forniti nei fixture delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è indicato in monospazio. Utilizzarlo quando si esegue lo scripting tramite API o quando è necessario modificare tali impostazioni a livello globale modificando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `add_certificate_pdf_footer`

**Aggiungere un piè di pagina alle esportazioni PDF dei certificati**

Se abilitata, viene aggiunto un piè di pagina alle esportazioni PDF dei certificati.

*Predefinito: `false`*

### `add_gradebook_certificates_cron_task_enabled` **v3**

**Generazione automatica dei certificati su chiamata WS**

Se abilitata, e quando si utilizza il webservice WSCertificatesList, questa opzione garantisce che tutti i certificati siano stati generati dagli utenti se hanno raggiunto il punteggio sufficiente in tutti gli elementi definiti nei gradebook per tutti i corsi e le sessioni (ciò potrebbe consumare risorse di elaborazione considerevoli sul server).

*Predefinito: `false`*

### `allow_certificates_search` **v3**

**Consentire la ricerca dei certificati**

Consentire a utenti e visitatori di cercare i certificati generati dal menu della barra superiore.

*Predefinito: `false`*

### `allow_general_certificate`

**Abilitare il certificato generale**

Un certificato generale è un certificato che raggruppa tutti i risultati ottenuti dall'utente nei corsi che ha seguito.

*Predefinito: `false`*

### `allow_public_certificates`

**Consentire i certificati pubblici**

I certificati degli utenti possono essere visualizzati da utenti non registrati.

*Predefinito: `false`*

### `certificate_filter_by_official_code`

**Filtro dei certificati per codice ufficiale**

Aggiungere un filtro sul codice ufficiale degli studenti all'elenco dei certificati.

*Predefinito: `false`*

### `certificate_pdf_orientation`

**Orientamento PDF per i certificati**

Impostare ‘portrait’ o ‘landscape’ (termini tecnici) per i certificati PDF.

*Predefinito: `landscape`*

### `hide_certificate_export_link`

**Certificati: nascondere il collegamento di esportazione PDF per tutti**

Abilitare per rimuovere completamente la possibilità di esportare i certificati in PDF (per tutti gli utenti). Se abilitata, include anche il nascondere il collegamento agli studenti.

*Predefinito: `false`*

### `hide_certificate_export_link_students`

**Certificati: nascondere il collegamento di esportazione agli studenti**

Se abilitata, gli studenti non potranno esportare i propri certificati in PDF. Questa opzione è disponibile perché, a seconda della struttura HTML precisa del modello di certificato, l'esportazione PDF potrebbe essere di bassa qualità. In tal caso, è preferibile mostrare agli studenti solo il certificato HTML.

*Predefinito: `false`*

### `hide_my_certificate_link`

**Nascondere il collegamento ‘i miei certificati’**

Nascondere la pagina dei certificati per gli utenti non amministratori.

*Predefinito: `false`*

### `session_admin_can_download_all_certificates`

**Consentire agli amministratori di sessione di scaricare i certificati privati**

Se abilitata, gli amministratori di sessione possono scaricare i certificati anche se non sono pubblicati pubblicamente.

*Predefinito: `false`*

## Vedere anche

Ai certificati può ora essere assegnato un periodo di validità e una data di scadenza, con promemoria di scadenza automatici o manuali. Questa funzionalità non si configura qui: il periodo di validità è un'impostazione del gradebook rivolta ai docenti, e l'interruttore di attivazione/disattivazione del cron dei promemoria si trova nella categoria **Cron Jobs**. Vedere [Certificati e competenze](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry) e [Impostazioni dei Cron Jobs](crons-settings.md#certificate-expiry-reminders).