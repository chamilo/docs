# Impostazioni del catalogo dei corsi

Comportamento del catalogo dei corsi (l'elenco pubblico in cui gli utenti possono sfogliare i corsi e iscriversi autonomamente).

Accedere a queste impostazioni in **Amministrazione > Impostazioni di configurazione > Catalogo dei corsi**. Questa categoria contiene **13 impostazioni**, elencate di seguito con il titolo e il commento forniti nei fixture delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospazio. Utilizzarlo quando si esegue lo scripting tramite l'API o quando è necessario modificare tali impostazioni a livello globale modificando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `allow_session_auto_subscription`

**Iscrizione automatica alle sessioni**

Abilita l'iscrizione automatica degli utenti alle sessioni.

*Predefinito: `false`*

### `allow_students_to_browse_courses`

**Consenti la navigazione agli studenti**

Permette agli studenti di sfogliare e filtrare il catalogo dei corsi.

*Predefinito: `true`*

### `course_catalog_display_in_home`

**Mostra il catalogo nella homepage**

Mostra il blocco del catalogo dei corsi nella homepage della piattaforma.

*Predefinito: `false`*

### `course_catalog_hide_private`

**Nascondi i corsi privati**

Esclude i corsi privati dalla visualizzazione del catalogo.

*Predefinito: `true`*

### `course_catalog_published`

**Pubblica il catalogo dei corsi**

Rende il catalogo dei corsi disponibile agli utenti anonimi (il pubblico generale) senza necessità di accesso.

*Predefinito: `false`*

### `course_catalog_settings`

**Impostazioni del catalogo dei corsi**

Configurazione JSON per il catalogo dei corsi: impostazioni dei collegamenti, filtri, opzioni di ordinamento e altro.

### `course_subscription_in_user_s_session`

**Iscrizione nella vista sessione**

Consente agli utenti di iscriversi ai corsi direttamente dalla pagina della propria sessione.

*Predefinito: `false`*

### `hide_public_link`

**Nascondi il collegamento pubblico**

Rimuove il collegamento URL pubblico dalle schede dei corsi.

*Predefinito: `false`*

### `only_show_course_from_selected_category`

**Mostra solo le categorie corrispondenti nel catalogo dei corsi**

Se non è vuoto, nel catalogo dei corsi compariranno solo i corsi delle categorie indicate.

### `only_show_selected_courses`

**Solo corsi selezionati**

Mostra nel catalogo solo i corsi selezionati manualmente.

*Predefinito: `false`*

### `session_catalog_settings`

**Impostazioni del catalogo delle sessioni**

Configurazione JSON per il catalogo delle sessioni: filtri e opzioni di visualizzazione.

### `show_courses_descriptions_in_catalog`

**Mostra le descrizioni dei corsi**

Visualizza le descrizioni dei corsi all'interno dell'elenco del catalogo.

*Predefinito: `false`*

### `show_courses_sessions`

**Mostra corsi e sessioni**

Include sia i corsi sia le sessioni nei risultati del catalogo.

*Predefinito: `0`*