# Impostazioni lingue

Lingue disponibili, lingua predefinita e modalità con cui Chamilo determina quale lingua visualizzare.

Accedere a queste impostazioni in **Amministrazione > Impostazioni di configurazione > Lingue**. Questa categoria contiene **13 impostazioni**, elencate di seguito con il titolo e il commento forniti nei fixture delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è indicato in monospazio. Utilizzarlo per gli script tramite API o per modificare tali impostazioni a livello globale modificando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `allow_course_multiple_languages`

**Corsi in più lingue**

Abilita i corsi gestiti in più di una lingua. Questa opzione aggiunge un selettore di lingua nella pagina del corso per consentire agli utenti di cambiare facilmente e aggiunge un campo extra 'multiple_language' ai corsi, che consente procedure di gestione remota.

*Predefinito: `false`*


### `allow_use_sub_language`

**Consenti definizione e uso di sotto-lingue**

Abilitando questa opzione sarà possibile definire varianti per ciascuno dei termini linguistici utilizzati nell'interfaccia della piattaforma, sotto forma di una nuova lingua basata su una lingua esistente e che la estende. Questa opzione si trova nella sezione lingue del pannello di amministrazione.

*Predefinito: `false`*

### `auto_detect_language_custom_pages`

**Abilita il rilevamento automatico della lingua nelle pagine personalizzate**

Se si utilizzano pagine personalizzate, abilitare questa opzione per avere un rilevatore di lingua che presenti la pagina nella lingua del browser dell'utente, oppure disabilitarla per forzare la lingua predefinita della piattaforma.

*Predefinito: `true`*


### `language_by_resource` **v3**

**Lingua per risorsa**

Consente di assegnare una lingua specifica alle singole risorse.

*Predefinito: `false`*

### `language_flags_by_country`

**Bandiere delle lingue**

Utilizza le bandiere dei Paesi per le lingue. Non è abilitato per impostazione predefinita perché alcune lingue non sono strettamente associate a un Paese, il che può generare frustrazione in alcuni utenti.

*Predefinito: `false`*


### `language_priority_1`

**Lingua con priorità più alta**

Lingua primaria selezionata quando sono impostati più contesti linguistici.

*Predefinito: `course_lang`*


### `language_priority_2`

**Lingua con priorità secondaria**

Lingua di fallback secondaria se la prima priorità non è disponibile o è fuori contesto.

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

Lingua principale, utilizzata per impostazione predefinita quando non è impostata una lingua utente.

*Predefinito: `en`*


### `show_different_course_language`

**Mostra le lingue dei corsi**

Mostra la lingua di ciascun corso, accanto al titolo del corso, nell'elenco dei corsi della homepage

*Predefinito: `true`*


### `show_language_selector_in_menu`

**Selettore di lingua nel menu principale**

Visualizza un selettore di lingua nel menu principale che aggiorna immediatamente la preferenza linguistica dell'utente. Può essere utile nei portali multilingue in cui i discenti devono passare da una lingua all'altra per l'apprendimento.

*Predefinito: `true`*


### `template_activate_language_filter`

**Modelli di documento in più lingue**

Consente di configurare i modelli di documento (a livello di piattaforma o di corso) per lingue specifiche.

*Predefinito: `false`*