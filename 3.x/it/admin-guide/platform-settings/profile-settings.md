# Impostazioni del profilo utente

Quali campi compaiono nel profilo utente, quali l'utente può modificare e le preferenze correlate.

Accedere a queste impostazioni in **Amministrazione > Impostazioni di configurazione > Profilo utente**. Questa categoria contiene **29 impostazioni**, elencate di seguito con il titolo e il commento forniti nei fixture delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è indicato in monospazio. Utilizzarlo per gli script tramite API o per modificare tali impostazioni a livello globale modificando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `account_valid_duration`

**Validità dell'account**

Un account utente è valido per questo numero di giorni dopo la creazione

*Predefinito: `3660`*


### `add_user_course_information_in_mailto`

**Precompilare la mail con le informazioni su utente e corso nel contatto a piè di pagina**

Aggiungere oggetto e corpo nel mailto: a piè di pagina.

*Predefinito: `false`*


### `allow_show_linkedin_url`

**Consentire di mostrare l'URL LinkedIn dell'utente**

Aggiungere un collegamento nel blocco sociale dell'utente, che consente di visitare il profilo LinkedIn dell'utente

### `allow_show_skype_account`

**Consentire di mostrare l'account Skype dell'utente**

Aggiungere un collegamento nel blocco sociale dell'utente che consente di avviare una chat tramite Skype

### `allow_social_map_fields`

**Geolocalizzazione degli utenti su una mappa**

Abilitare la visualizzazione di una mappa nella rete sociale che consente di localizzare altri utenti. Include diverse posizioni (attuale e di destinazione) che devono essere definite come indirizzi o coordinate in campi extra distinti. I campi extra devono essere impostati come array in questa sede.

### `allow_teachers_to_classes`

**Consentire ai docenti di gestire le classi**

Consente ai docenti di gestire i gruppi classe e le relative iscrizioni all'interno del sistema.

*Predefinito: `false`*


### `allow_user_headings`

**Consentire la profilazione degli utenti all'interno dei corsi**

Un docente può definire campi del profilo dello studente per raccogliere informazioni aggiuntive?

### `allow_users_to_change_email_with_no_password`

**Consentire agli utenti di modificare l'e-mail senza password**

Durante la modifica delle informazioni dell'account

*Predefinito: `false`*

### `changeable_options`

**Campi che gli utenti possono modificare nel proprio profilo**

Selezionare i campi che gli utenti potranno modificare nella pagina del proprio profilo.


### `enable_profile_user_address_geolocalization`

**Abilitare la geolocalizzazione dell'utente**

Abilitare il campo indirizzo dell'utente e mostrarlo su una mappa utilizzando le funzionalità di geolocalizzazione

### `extended_profile`

**Portfolio**

Se questa impostazione è attiva, un utente può compilare i seguenti campi (facoltativi): 'La mia area personale aperta', 'Le mie competenze', 'I miei diplomi', 'Cosa sono in grado di insegnare'

*Predefinito: `false`*

### `hide_username_in_course_chat`

**Nascondere il nome utente nella chat del corso**

Nella chat del corso, nascondere il nome utente. Visualizzare solo i nomi delle persone.

*Predefinito: `false`*


### `hide_username_with_complete_name`

**Nascondere il nome utente quando è già mostrato il nome completo**

Alcune funzioni interne restituiscono il nome utente quando restituiscono il nome completo dell'utente. Con questa opzione abilitata, si garantisce che il nome utente non compaia.

*Predefinito: `false`*


### `linkedin_organization_id`

**ID organizzazione LinkedIn**

Quando si condivide un badge su LinkedIn, LinkedIn consente di impostare un ID organizzazione che collegherà alla pagina LinkedIn della propria organizzazione (per collegare l'organizzazione che attribuisce il badge).

*Predefinito: `false`*


### `login_is_email`

**Utilizzare l'e-mail come nome utente**

Utilizzare l'e-mail per accedere al sistema

*Predefinito: `false`*

### `my_space_users_items_per_page`

**Numero predefinito di elementi per pagina in mySpace**

Numero di record visualizzati per pagina nelle sezioni di tracciamento di MySpace (utenti, statistiche dei lavori, elenco studenti).

*Predefinito: `10`*


### `pass_reminder_custom_link`

**Pagina personalizzata per il recupero della password**

Impostare un URL proprio verso una pagina di reimpostazione della password. Utile quando si utilizza un sistema federato di gestione degli account.

### `profile_fields_visibility`

**Campi visibili nella pagina del profilo**

Array di campi e se (booleano) sono visibili o meno nella pagina del profilo dell'utente (funziona anche con le etichette dei campi extra).

### `registration_add_helptext_for_2_names`

**Aggiungere un aiuto per inserire due nomi in registrazione**

Aggiungere un testo di aiuto affinché gli utenti inseriscano due nomi nel modulo di registrazione quando i doppi cognomi sono comuni.

*Predefinito: `false`*


### `send_notification_when_user_added`

**Inviare una mail all'amministratore quando viene creato un utente**

Inviare una notifica e-mail all'amministratore quando viene creato un utente.

### `show_conditions_to_user`

**Mostrare condizioni di registrazione specifiche**

Mostrare più condizioni all'utente durante il processo di iscrizione. Fornire un array in cui ogni elemento contiene 'variable' (nome interno del campo extra), 'display_text' (testo semplice per una casella di controllo), 'text_area' (testo esteso delle condizioni).

### `show_official_code_whoisonline`

**Codice ufficiale in 'Chi è online'**

Mostrare il codice ufficiale nella pagina 'Chi è online', sotto il nome utente.

*Predefinito: `false`*

### `show_terms_if_profile_completed`

**Termini e condizioni solo se il profilo è completo**

Abilitando questa opzione, i termini e le condizioni saranno disponibili per l'utente solo quando i campi extra del profilo che iniziano con 'terms_' e impostati come visibili sono stati compilati.

*Default: `false`*


### `split_users_upload_directory`

**Suddividere la directory di upload degli utenti**

Sui portali ad alto carico, dove sono registrati molti utenti e inviano le proprie immagini, la directory di upload (main/upload/users/) potrebbe contenere troppi file perché il filesystem possa gestirli (è stato segnalato con più di 36000 file su un server Debian). Modificando questa opzione si abilita una suddivisione a un livello delle directory nella directory di upload. Verranno utilizzate 9 directory nella directory di base e tutte le directory successive degli utenti saranno memorizzate in una di queste 9 directory. La modifica di questa opzione non influirà sulla struttura delle directory su disco, ma influirà sul comportamento del codice di Chamilo, quindi se si modifica questa opzione è necessario creare le nuove directory e spostare le directory esistenti autonomamente sul server. Si tenga presente che, durante la creazione e lo spostamento di tali directory, sarà necessario spostare le directory degli utenti da 1 a 9 in sottodirectory con lo stesso nome. Se non si è sicuri di questa opzione, è meglio non attivarla.

*Default: `true`*

### `use_users_timezone`

**Abilitare i fusi orari degli utenti**

Abilita la possibilità per gli utenti di selezionare il proprio fuso orario. Una volta configurato, gli utenti potranno visualizzare le scadenze dei compiti e altri riferimenti temporali nel proprio fuso orario, riducendo gli errori al momento della consegna.

*Default: `true`*

### `user_import_settings`

**Opzioni per l'importazione utenti**

Array di opzioni da applicare come parametri predefiniti nell'importazione utenti CSV/XML.

### `user_search_on_extra_fields`

**Cercare gli utenti per campi extra nell'elenco utenti per gli amministratori**

Include naturalmente i campi extra indicati (array di etichette dei campi extra) nelle ricerche utenti.

### `user_selected_theme`

**Selezione del tema da parte dell'utente**

Consente agli utenti di selezionare il proprio tema visivo nel profilo. Questo cambierà l'aspetto di Chamilo per loro, ma lascerà intatto lo stile predefinito del portale. Se un corso o una sessione specifica ha un tema assegnato, questo avrà priorità sui temi definiti dall'utente.

*Default: `false`*

### `visible_options`

**Elenco dei campi visibili nel profilo**

Controlla quali campi del profilo sono visibili agli utenti e agli altri.