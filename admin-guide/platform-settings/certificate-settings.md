# Impostazioni dei Certificati

Impostazioni predefinite applicate quando uno studente ottiene un certificato dal registro dei voti.

Accedi a queste impostazioni tramite **Amministrazione > Impostazioni di configurazione > Certificati**. Questa categoria contiene **9 impostazioni**, elencate di seguito con il titolo e il commento forniti nei dati di configurazione della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospace. Utilizzalo quando scrivi script tramite l'API o quando devi modificare queste impostazioni a livello globale editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `add_certificate_pdf_footer`

**Aggiungi piè di pagina alle esportazioni PDF dei certificati**

Quando abilitato, viene aggiunto un piè di pagina alle esportazioni PDF dei certificati.

*Predefinito: `false`*

### `allow_general_certificate`

**Abilita certificato generale**

Un certificato generale è un certificato che raggruppa tutti i risultati ottenuti dall'utente nei corsi che ha seguito.

*Predefinito: `false`*

### `allow_public_certificates`

**Consenti certificati pubblici**

I certificati degli utenti possono essere visualizzati da utenti non registrati.

*Predefinito: `false`*

### `certificate_filter_by_official_code`

**Filtro certificati per codice ufficiale**

Aggiunge un filtro sul codice ufficiale degli studenti all'elenco dei certificati.

*Predefinito: `false`*

### `certificate_pdf_orientation`

**Orientamento PDF per i certificati**

Imposta 'portrait' o 'landscape' (termini tecnici) per i certificati PDF.

*Predefinito: `landscape`*

### `hide_certificate_export_link`

**Certificati: nascondi il link di esportazione PDF per tutti**

Abilita per rimuovere completamente la possibilità di esportare i certificati in PDF (per tutti gli utenti). Se abilitato, questo include nasconderlo agli studenti.

*Predefinito: `false`*

### `hide_certificate_export_link_students`

**Certificati: nascondi il link di esportazione agli studenti**

Se abilitato, gli studenti non potranno esportare i loro certificati in PDF. Questa opzione è disponibile perché, a seconda della struttura HTML precisa del modello di certificato, l'esportazione PDF potrebbe essere di bassa qualità. In questo caso, è meglio mostrare solo il certificato HTML agli studenti.

*Predefinito: `false`*

### `hide_my_certificate_link`

**Nascondi il link 'il mio certificato'**

Nasconde la pagina dei certificati per gli utenti non amministratori.

*Predefinito: `false`*

### `session_admin_can_download_all_certificates`

**Consenti agli amministratori di sessione di scaricare certificati privati**

Se abilitato, gli amministratori di sessione possono scaricare i certificati anche se non sono pubblicati pubblicamente.

*Predefinito: `false`*