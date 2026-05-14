# Impostazioni del Profilo Utente

Quali campi appaiono nel profilo utente, quali possono essere modificati dall'utente e le preferenze correlate.

Accedi a queste impostazioni tramite **Amministrazione > Impostazioni di configurazione > Profilo Utente**. Questa categoria contiene **29 impostazioni**, elencate di seguito con il titolo e il commento forniti nei dati di configurazione della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospace. Utilizzalo quando scrivi script tramite l'API o quando devi modificare queste impostazioni a livello globale editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `account_valid_duration`

**Validità dell'account**

Un account utente è valido per questo numero di giorni dopo la creazione

*Default: `3660`*

### `add_user_course_information_in_mailto`

**Precompila l'email con informazioni su utente e corso nel contatto del footer**

Aggiunge oggetto e corpo nel mailto: del footer.

*Default: `false`*

### `allow_show_linkedin_url`

**Consenti di mostrare l'URL LinkedIn dell'utente**

Aggiunge un link nel blocco sociale dell'utente, permettendo di visitare il profilo LinkedIn dell'utente

### `allow_show_skype_account`

**Consenti di mostrare l'account Skype dell'utente**

Aggiunge un link nel blocco sociale dell'utente permettendo di avviare una chat tramite Skype

### `allow_social_map_fields`

**Geolocalizzazione degli utenti su una mappa**

Abilita la visualizzazione di una mappa nella rete sociale che permette di localizzare altri utenti. Include diverse posizioni (attuale e di destinazione) che devono essere definite come indirizzi o coordinate in campi extra separati. I campi extra devono essere impostati come un array qui.

### `allow_teachers_to_classes`

**Consenti agli insegnanti di gestire le classi**

Abilita gli insegnanti a gestire i gruppi di classi e la loro appartenenza all'interno del sistema.

*Default: `false`*

### `allow_user_headings`

**Consenti la profilazione degli utenti all'interno dei corsi**

Un insegnante può definire campi del profilo dello studente per raccogliere informazioni aggiuntive?

### `allow_users_to_change_email_with_no_password`

**Consenti agli utenti di cambiare l'email senza password**

Quando si modificano le informazioni dell'account

*Default: `false`*

### `changeable_options`

**Campi che gli utenti possono modificare nel loro profilo**

Seleziona i campi che gli utenti potranno modificare nella pagina del loro profilo.

### `enable_profile_user_address_geolocalization`

**Abilita la geolocalizzazione dell'utente**

Abilita il campo dell'indirizzo dell'utente e mostralo su una mappa utilizzando le funzionalità di geolocalizzazione

### `extended_profile`

**Portfolio**

Se questa impostazione è attiva, un utente può compilare i seguenti campi (opzionali): 'La mia area aperta personale', 'Le mie competenze', 'I miei diplomi', 'Cosa sono in grado di insegnare'

*Default: `false`*

### `hide_username_in_course_chat`

**Nascondi il nome utente nella chat del corso**

Nella chat del corso, nascondi il nome utente. Mostra solo i nomi delle persone.

*Default: `false`*

### `hide_username_with_complete_name`

**Nascondi il nome utente quando si mostra già il nome completo**

Alcune funzioni interne restituiscono il nome utente quando restituiscono il nome completo dell'utente. Con questa opzione abilitata, ti assicuri che il nome utente non appaia.

*Default: `false`*

### `linkedin_organization_id`

**ID Organizzazione LinkedIn**

Quando si condivide un badge su LinkedIn, LinkedIn permette di impostare un ID organizzazione che si collegherà alla pagina LinkedIn della tua organizzazione (per collegare l'organizzazione che attribuisce il badge).

*Default: `false`*

### `login_is_email`

**Usa l'email come nome utente**

Utilizza l'email per effettuare il login al sistema

*Default: `false`*

### `my_space_users_items_per_page`

**Numero predefinito di elementi per pagina in MySpace**

Numero di record visualizzati per pagina nelle sezioni di monitoraggio di MySpace (utenti, statistiche di lavoro, elenco studenti).

*Default: `10`*

### `pass_reminder_custom_link`

**Pagina personalizzata per il promemoria della password**

Imposta il tuo URL per una pagina di reimpostazione della password. Utile quando si utilizza un sistema di gestione degli account federato.

### `profile_fields_visibility`

**Campi visibili nella pagina del profilo**

Array di campi e se (booleano) sono visibili o meno nella pagina del profilo dell'utente (funziona anche con le etichette dei campi extra).

### `registration_add_helptext_for_2_names`

**Aggiungi aiuto per inserire due nomi nella registrazione**

Aggiunge un testo di aiuto per gli utenti per inserire due nomi nel modulo di registrazione quando i doppi cognomi sono comuni.

*Default: `false`*

### `send_notification_when_user_added`

**Invia email all'amministratore quando viene creato un utente**

Invia una notifica email all'amministratore quando viene creato un utente.

### `show_conditions_to_user`

**Mostra condizioni di registrazione specifiche**

Mostra molteplici condizioni all'utente durante il processo di registrazione. Fornisci un array con ogni elemento contenente 'variable' (nome interno del campo extra), 'display_text' (testo semplice per una casella di controllo), 'text_area' (testo lungo delle condizioni).

### `show_official_code_whoisonline`

**Codice ufficiale su 'Chi è online'**

Mostra il codice ufficiale nella pagina 'Chi è online', sotto il nome utente.

*Default: `false`*

---
### `show_terms_if_profile_completed`

**Termini e condizioni solo se il profilo è completo**

Abilitando questa opzione, i termini e le condizioni saranno disponibili per l'utente solo quando i campi aggiuntivi del profilo che iniziano con 'terms_' e impostati come visibili saranno completati.

*Default: `false`*


### `split_users_upload_directory`

**Suddivisione della directory di upload degli utenti**

Nei portali ad alto carico, dove molti utenti sono registrati e inviano le loro immagini, la directory di upload (main/upload/users/) potrebbe contenere troppi file per essere gestita dal filesystem (è stato segnalato con oltre 36000 file su un server Debian). Modificando questa opzione, si abiliterà una suddivisione a un livello delle directory nella directory di upload. Verranno utilizzate 9 directory nella directory di base e tutte le directory degli utenti successivi saranno memorizzate in una di queste 9 directory. La modifica di questa opzione non influenzerà la struttura delle directory sul disco, ma influenzerà il comportamento del codice di Chamilo, quindi se cambi questa opzione, dovrai creare le nuove directory e spostare le directory esistenti manualmente sul server. Tieni presente che, durante la creazione e lo spostamento di queste directory, dovrai spostare le directory degli utenti da 1 a 9 in sottodirectory con lo stesso nome. Se non sei sicuro di questa opzione, è meglio non attivarla.

*Default: `true`*


### `use_users_timezone`

**Abilita i fusi orari degli utenti**

Abilita la possibilità per gli utenti di selezionare il proprio fuso orario. Una volta configurato, gli utenti potranno vedere le scadenze degli incarichi e altri riferimenti temporali nel loro fuso orario, riducendo così gli errori al momento della consegna.

*Default: `true`*


### `user_import_settings`

**Opzioni per l'importazione degli utenti**

Array di opzioni da applicare come parametri predefiniti nell'importazione di utenti tramite CSV/XML.


### `user_search_on_extra_fields`

**Ricerca utenti tramite campi aggiuntivi nell'elenco utenti per gli amministratori**

Include naturalmente i campi aggiuntivi specificati (array di etichette dei campi aggiuntivi) nelle ricerche degli utenti.


### `user_selected_theme`

**Selezione del tema da parte dell'utente**

Consenti agli utenti di selezionare il proprio tema visivo nel loro profilo. Questo cambierà l'aspetto di Chamilo per loro, ma lascerà intatto lo stile predefinito del portale. Se un corso o una sessione specifica ha un tema specifico assegnato, questo avrà la priorità sui temi definiti dall'utente.

*Default: `false`*


### `visible_options`

**Elenco dei campi visibili nel profilo**

Controlla quali campi del profilo sono visibili agli utenti e ad altri.