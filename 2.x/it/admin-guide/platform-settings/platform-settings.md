# Impostazioni della Piattaforma

Identità e comportamento a livello di piattaforma — nome dell'istituzione, fuso orario, politica di registrazione, utenti online, flag di performance.

Accedi a queste impostazioni tramite **Amministrazione > Impostazioni di configurazione > Piattaforma**. Questa categoria contiene **29 impostazioni**, elencate di seguito con il titolo e il commento forniti nei fixture delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospace. Utilizzalo quando scrivi script tramite l'API o quando devi modificare queste impostazioni a livello globale editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `allow_my_files`

**Abilita la sezione 'I miei file'**

Consente agli utenti di caricare file in uno spazio personale sulla piattaforma.

*Predefinito: `true`*

### `chamilo_database_version`

**Versione corrente dello schema del database utilizzato da Chamilo**

Mostra la versione corrente del database per corrispondere alla versione core di Chamilo.

### `cookie_warning`

**Notifica sulla privacy dei cookie**

Se abilitata, questa opzione mostra un banner in cima alla piattaforma che chiede agli utenti di riconoscere che la piattaforma utilizza cookie necessari per fornire l'esperienza utente. Il banner può essere facilmente confermato e nascosto dall'utente. Questo permette a Chamilo di rispettare le normative dell'UE sui cookie web.

*Predefinito: `false`*

### `disable_copy_paste`

**Disabilita il copia-incolla**

Quando abilitata, questa opzione disabilita, per quanto possibile, i meccanismi di copia-incolla. Utile in contesti di esami restrittivi.

*Predefinito: `false`*

### `donotlistcampus`

**Non elencare questo campus su chamilo.org**

Per impostazione predefinita, i portali Chamilo vengono automaticamente registrati in un elenco pubblico su chamilo.org, utilizzando solo il titolo che hai dato a questo portale (non l'URL né dati privati). Seleziona questa casella per evitare che il titolo del tuo portale appaia.

*Predefinito: `false`*

### `generate_random_login`

**Genera nome utente casuale**

Durante l'importazione degli utenti (processi batch), genera automaticamente una stringa casuale per il nome utente. Altrimenti, il nome utente sarà generato sulla base del nome e cognome, o del prefisso dell'e-mail.

*Predefinito: `false`*

### `hosting_limit_identical_email`

**Limita l'uso di e-mail identiche**

Numero massimo di account consentiti a condividere lo stesso indirizzo e-mail. Imposta a 0 per disabilitare questo limite.

*Predefinito: `0`*

### `hosting_limit_users_per_course`

**Limite globale di utenti per corso**

Definisce un numero massimo globale di utenti (inclusi i docenti) che possono essere iscritti a un singolo corso sulla piattaforma. Imposta questo valore a 0 per disabilitare il limite. Questo aiuta a evitare che i corsi siano sovraccarichi in portali aperti.

*Predefinito: `0`*

### `institution`

**Nome dell'organizzazione**

Il nome dell'organizzazione (appare nell'intestazione a destra)

*Predefinito: `Chamilo.org`*

### `institution_address`

**Indirizzo dell'istituzione**

Indirizzo

### `institution_url`

**URL dell'organizzazione (indirizzo web)**

L'URL dell'istituzione (il link che appare nell'intestazione a destra)

*Predefinito: `http://www.chamilo.org`*

### `max_courses_per_user`

**Massimo numero di corsi per utente**

Numero massimo di corsi che un docente/formatore può creare. Imposta a 0 per disabilitare il limite. Può essere sovrascritto per utente tramite l'acquisto di un servizio BuyCourses.

*Predefinito: `0`*

### `notification_event`

**Abilita lo strumento di notifica per un canale di comunicazione più efficace con gli studenti**

Attiva notifiche popup o di sistema per eventi importanti della piattaforma.

*Predefinito: `false`*

### `pdf_img_dpi`

**Risoluzione esportazione PDF**

Rappresenta la risoluzione dei file PDF generati (in punti per pollice, o dpi). Il valore predefinito è 96. Aumentarlo migliorerà la risoluzione dei file PDF, ma aumenterà anche il peso e il tempo di generazione dei file.

*Predefinito: `96`*

### `platform_logo_url`

**URL per logo alternativo della piattaforma**

Sostituisce il logo di Chamilo caricando un URL (possibilmente remoto). Assicurati che ciò sia consentito dalle tue politiche di sicurezza.

*Predefinito: `https://chamilo.org`*

### `portfolio_advanced_sharing`

**Abilita condivisione avanzata del portfolio**

Decidi chi può visualizzare i post e i commenti del portfolio.

*Predefinito: `false`*

### `portfolio_show_base_course_post_in_sessions`

**Mostra i post del corso base nel corso della sessione**

Decidi chi può visualizzare i post e i commenti del portfolio.

*Predefinito: `false`*

### `push_notification_settings`

**Impostazioni notifiche push (JSON)**

Configurazione JSON per l'integrazione delle notifiche push.

### `server_type`

**Tipo di server**

Definisce il tipo di ambiente: "prod" (produzione normale), "validation" (come produzione ma senza reporting di statistiche), o "test" (modalità debug con strumenti per sviluppatori come indicatori di stringhe non tradotte).

*Predefinito: `prod`*

### `session_admin_access_to_all_users_on_all_urls`

**Consenti agli amministratori di sessione di vedere tutti gli utenti su tutti gli URL**

Se abilitata, gli amministratori di sessione possono cercare ed elencare utenti da tutti gli URL di accesso, indipendentemente dall'URL corrente.

*Predefinito: `false`*

---
### `site_name`

**Nome del portale e-learning**

Il nome del tuo portale Chamilo (appare nell'intestazione)

*Default: `Chamilo site`*


### `timepicker_increment`

**Incremento del selettore di tempo**

Incremento minimo di tempo (in minuti) quando si seleziona una data e un'ora con il widget del selettore di tempo. Ad esempio, potrebbe non essere utile avere incrementi inferiori a 5 o 15 minuti quando si parla di consegna di compiti, disponibilità di un test, orario di inizio di una sessione, ecc.

*Default: `15`*

### `timezone`

**Fuso orario predefinito**

Seleziona il fuso orario predefinito per questo portale. Questo aiuterà a impostare il fuso orario (se la funzionalità è abilitata) per ogni nuovo utente o per qualsiasi utente che non abbia ancora impostato un fuso orario specifico. I fusi orari aiutano a mostrare tutte le informazioni relative al tempo sullo schermo nel fuso orario specifico di ciascun utente.

*Default: `Europe/Paris`*


### `unoconv_binaries`

**Binari del convertitore UNO**

Fornisci il percorso di sistema alla libreria del convertitore UNO per abilitare alcune funzionalità di esportazione aggiuntive.

*Default: `/usr/bin/unoconv`*


### `use_career_external_id_as_identifier_in_diagrams`

**Usa ID carriera esterno nei diagrammi**

Se si utilizzano diagrammi di carriera, mostra un campo aggiuntivo invece dell'ID carriera interno.

*Default: `false`*

### `use_custom_pages`

**Usa pagine personalizzate**

Abilita questa funzionalità per configurare pagine di accesso specifiche per ruolo.

*Default: `false`*

### `use_virtual_keyboard`

**Usa tastiera virtuale**

Fai apparire una tastiera virtuale. Questo è utile quando si configurano esami restrittivi in una stanza fisica dove gli studenti non hanno una tastiera per limitare la loro capacità di imbrogliare.

*Default: `false`*

### `user_status_show_option`

**Opzioni di visualizzazione dei ruoli**

Un array di ruolo => vero/falso che definisce se quel ruolo debba essere mostrato o nascosto.

### `user_status_show_options_enabled`

**Visualizzazione selettiva dei ruoli**

Abilita per utilizzare un array per definire quali ruoli devono essere chiaramente visualizzati e quali devono essere nascosti.

*Default: `false`*