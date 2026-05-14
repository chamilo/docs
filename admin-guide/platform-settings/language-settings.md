# Impostazioni delle Lingue

Lingue disponibili, lingua predefinita e come Chamilo determina quale lingua visualizzare.

Accedi a queste impostazioni tramite **Amministrazione > Impostazioni di configurazione > Lingue**. Questa categoria contiene **12 impostazioni**, elencate di seguito con il titolo e il commento forniti nei dati di configurazione della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospace. Utilizzalo quando scrivi script tramite l'API o quando devi modificare queste impostazioni a livello globale editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `allow_course_multiple_languages`

**Corsi multilingue**

Abilita corsi gestiti in più di una lingua. Questa opzione aggiunge un selettore di lingua all'interno della pagina del corso per consentire agli utenti di cambiare facilmente lingua e aggiunge un campo extra 'multiple_language' ai corsi, che permette procedure di gestione remota.

*Predefinito: `false`*

### `allow_use_sub_language`

**Consenti definizione e uso di sotto-lingue**

Abilitando questa opzione, sarai in grado di definire variazioni per ciascuno dei termini linguistici utilizzati nell'interfaccia della piattaforma, sotto forma di una nuova lingua basata su ed estendente una lingua esistente. Troverai questa opzione nella sezione lingue del pannello di amministrazione.

*Predefinito: `false`*

### `auto_detect_language_custom_pages`

**Abilita il rilevamento automatico della lingua nelle pagine personalizzate**

Se utilizzi pagine personalizzate, abilita questa opzione se desideri che un rilevatore di lingua presenti la pagina nella lingua del browser dell'utente, oppure disabilitala per forzare la lingua predefinita della piattaforma.

*Predefinito: `true`*

### `language_flags_by_country`

**Bandiere linguistiche**

Usa le bandiere dei paesi per le lingue. Questa opzione non è abilitata di default perché alcune lingue non sono strettamente legate a un paese, il che può causare frustrazione per alcuni utenti.

*Predefinito: `false`*

### `language_priority_1`

**Lingua con priorità più alta**

Lingua primaria selezionata quando sono impostati più contesti linguistici.

*Predefinito: `course_lang`*

### `language_priority_2`

**Lingua con priorità secondaria**

Lingua di fallback secondaria se la prima priorità non è disponibile o fuori contesto.

*Predefinito: `user_profil_lang`*

### `language_priority_3`

**Lingua con terza priorità**

Lingua di fallback terziaria se le priorità superiori falliscono.

*Predefinito: `user_selected_lang`*

### `language_priority_4`

**Lingua con quarta priorità**

Ultima opzione di fallback linguistico in ordine di priorità.

*Predefinito: `platform_lang`*

### `platform_language`

**Lingua predefinita della piattaforma**

Lingua principale, utilizzata di default quando non è impostata alcuna lingua utente.

*Predefinito: `en`*

### `show_different_course_language`

**Mostra le lingue dei corsi**

Mostra la lingua di ciascun corso accanto al titolo del corso nell'elenco dei corsi della homepage.

*Predefinito: `true`*

### `show_language_selector_in_menu`

**Selettore di lingua nel menu principale**

Mostra un selettore di lingua nel menu principale che aggiorna immediatamente la preferenza linguistica dell'utente. Questo può essere utile in portali multilingue dove gli studenti devono passare da una lingua all'altra per il loro apprendimento.

*Predefinito: `true`*

### `template_activate_language_filter`

**Modelli di documenti multilingue**

Abilita i modelli di documenti (a livello di piattaforma o corso) per essere configurati per lingue specifiche.

*Predefinito: `false`*