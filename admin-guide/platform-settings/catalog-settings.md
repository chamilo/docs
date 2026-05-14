# Impostazioni del Catalogo dei Corsi

Comportamento del catalogo dei corsi (l'elenco pubblico in cui gli utenti possono navigare e auto-iscriversi).

Accedi a queste impostazioni tramite **Amministrazione > Impostazioni di configurazione > Catalogo dei Corsi**. Questa categoria contiene **13 impostazioni**, elencate di seguito con il titolo e il commento forniti nei dati predefiniti delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospace. Utilizzalo quando scrivi script tramite l'API o quando devi modificare queste impostazioni a livello globale editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `allow_session_auto_subscription`

**Iscrizione Automatica alla Sessione**

Abilita l'iscrizione automatica alle sessioni per gli utenti.

*Predefinito: `false`*

### `allow_students_to_browse_courses`

**Consenti Navigazione agli Studenti**

Permetti agli studenti di navigare e filtrare il catalogo dei corsi.

*Predefinito: `true`*

### `course_catalog_display_in_home`

**Mostra Catalogo nella Homepage**

Mostra il blocco del catalogo dei corsi nella homepage della piattaforma.

*Predefinito: `false`*

### `course_catalog_hide_private`

**Nascondi Corsi Privati**

Escludi i corsi privati dalla visualizzazione nel catalogo.

*Predefinito: `true`*

### `course_catalog_published`

**Pubblica Catalogo dei Corsi**

Rendi il catalogo dei corsi disponibile agli utenti anonimi (il pubblico generale) senza la necessità di effettuare il login.

*Predefinito: `false`*

### `course_catalog_settings`

**Impostazioni del Catalogo dei Corsi**

Configurazione JSON per il catalogo dei corsi: impostazioni dei collegamenti, filtri, opzioni di ordinamento e altro.

### `course_subscription_in_user_s_session`

**Iscrizione nella Vista Sessione**

Consenti agli utenti di iscriversi ai corsi direttamente dalla pagina della loro sessione.

*Predefinito: `false`*

### `hide_public_link`

**Nascondi Link Pubblico**

Rimuovi il link URL pubblico dalle schede dei corsi.

*Predefinito: `false`*

### `only_show_course_from_selected_category`

**Mostra Solo Categorie Corrispondenti nel Catalogo dei Corsi**

Quando non è vuoto, solo i corsi delle categorie specificate appariranno nel catalogo dei corsi.

### `only_show_selected_courses`

**Solo Corsi Selezionati**

Mostra solo i corsi selezionati manualmente nel catalogo.

*Predefinito: `false`*

### `session_catalog_settings`

**Impostazioni del Catalogo delle Sessioni**

Configurazione JSON per il catalogo delle sessioni: filtri e opzioni di visualizzazione.

### `show_courses_descriptions_in_catalog`

**Mostra Descrizioni dei Corsi**

Visualizza le descrizioni dei corsi all'interno dell'elenco del catalogo.

*Predefinito: `false`*

### `show_courses_sessions`

**Mostra Corsi e Sessioni**

Includi sia i corsi che le sessioni nei risultati del catalogo.

*Predefinito: `0`*