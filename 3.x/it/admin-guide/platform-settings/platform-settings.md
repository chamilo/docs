# Impostazioni della piattaforma

Identità e comportamento a livello di piattaforma — nome dell’istituzione, fuso orario, politica di registrazione, utenti online, flag di prestazioni.

Accedere a queste impostazioni in **Amministrazione > Impostazioni di configurazione > Piattaforma**. Questa categoria contiene **29 impostazioni**, elencate di seguito con il titolo e il commento forniti nei fixture delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospazio. Utilizzarlo per gli script tramite API o quando è necessario modificare tali impostazioni a livello globale modificando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `allow_my_files`

**Abilita la sezione «I miei file»**

Consente agli utenti di caricare file in uno spazio personale sulla piattaforma.

*Predefinito: `true`*

### `chamilo_database_version`

**Versione corrente dello schema del database utilizzato da Chamilo**

Mostra la versione corrente del DB in corrispondenza della versione del core di Chamilo.

### `cookie_warning`

**Notifica sulla privacy dei cookie**

Se abilitata, questa opzione mostra un banner in cima alla piattaforma che chiede agli utenti di confermare che la piattaforma utilizza cookie necessari per l’esperienza utente. Il banner può essere facilmente confermato e nascosto dall’utente. Ciò consente a Chamilo di conformarsi alle normative UE sui cookie web.

*Predefinito: `false`*

### `disable_copy_paste`

**Disabilita il copia-incolla**

Quando è abilitata, questa opzione disabilita il più possibile i meccanismi di copia-incolla. Utile in configurazioni di esami restrittive.

*Predefinito: `false`*

### `donotlistcampus`

**Non elencare questo campus su chamilo.org**

Per impostazione predefinita, i portali Chamilo vengono registrati automaticamente in un elenco pubblico su chamilo.org, utilizzando solo il titolo assegnato a questo portale (non l’URL né alcun dato privato). Selezionare questa casella per evitare che il titolo del portale appaia.

*Predefinito: `false`*

### `generate_random_login`

**Genera un nome utente casuale**

Durante l’importazione degli utenti (processi batch), genera automaticamente una stringa casuale per il nome utente. In caso contrario, il nome utente verrà generato in base a nome e cognome, o al prefisso dell’e-mail.

*Predefinito: `false`*

### `hosting_limit_identical_email`

**Limita l’uso di e-mail identiche**

Numero massimo di account autorizzati a condividere lo stesso indirizzo e-mail. Impostare a 0 per disabilitare questo limite.

*Predefinito: `0`*

### `hosting_limit_users_per_course`

**Limite globale di utenti per corso**

Definisce un numero massimo globale di utenti (docenti inclusi) che possono essere iscritti a un singolo corso sulla piattaforma. Impostare questo valore a 0 per disabilitare il limite. Aiuta a evitare il sovraccarico dei corsi nei portali aperti.

*Predefinito: `0`*

### `institution`

**Nome dell’organizzazione**

Il nome dell’organizzazione (appare nell’intestazione a destra)

*Predefinito: `Chamilo.org`*


### `institution_address`

**Indirizzo dell’istituzione**

Indirizzo

### `institution_url`

**URL dell’organizzazione (indirizzo web)**

L’URL delle istituzioni (il collegamento che appare nell’intestazione a destra)

*Predefinito: `http://www.chamilo.org`*


### `max_courses_per_user`

**Numero massimo di corsi per utente**

Numero massimo di corsi che un docente/formatore può creare. Impostare a 0 per disabilitare il limite. Può essere sovrascritto per utente tramite un acquisto del servizio BuyCourses.

*Predefinito: `0`*

### `notification_event`

**Abilita lo strumento di notifica per un canale di comunicazione più incisivo con gli studenti**

Attiva notifiche popup o di sistema per eventi importanti della piattaforma.

*Predefinito: `false`*

### `pdf_img_dpi`

**Risoluzione dell’esportazione PDF**

Rappresenta la risoluzione dei file PDF generati (in punti per pollice, o dpi). Il valore predefinito è 96. Aumentarlo produce file PDF a risoluzione migliore, ma aumenta anche il peso e il tempo di generazione dei file.

*Predefinito: `96`*

### `platform_logo_url`

**URL per un logo della piattaforma alternativo**

Sostituisce il logo Chamilo caricando un URL (eventualmente remoto). Assicurarsi che ciò sia consentito dalle proprie policy di sicurezza.

*Predefinito: `https://chamilo.org`*


### `portfolio_advanced_sharing`

**Abilita la condivisione avanzata del portfolio**

Decide chi può visualizzare i post e i commenti del portfolio.

*Predefinito: `false`*

### `portfolio_show_base_course_post_in_sessions`

**Mostra i post del corso base nel corso di sessione**

Decide chi può visualizzare i post e i commenti del portfolio.

*Predefinito: `false`*

### `push_notification_settings`

**Impostazioni delle notifiche push (JSON)**

Configurazione JSON per l’integrazione delle notifiche Push.

### `server_type`

**Tipo di server**

Definisce il tipo di ambiente: "prod" (produzione normale), "validation" (come la produzione ma senza segnalazione delle statistiche) o "test" (modalità debug con strumenti per sviluppatori, ad esempio indicatori di stringhe non tradotte).

*Predefinito: `prod`*

### `session_admin_access_to_all_users_on_all_urls`

**Consenti agli amministratori di sessione di vedere tutti gli utenti su tutti gli URL**

Se abilitata, gli amministratori di sessione possono cercare ed elencare gli utenti da tutti gli URL di accesso, indipendentemente dall’URL corrente.

*Predefinito: `false`*

### `site_name`

**Nome del portale e-learning**

Il nome del portale Chamilo (appare nell'intestazione)

*Default: `Chamilo site`*


### `timepicker_increment`

**Incremento del selettore orario**

Incremento temporale minimo (in minuti) nella selezione di data e ora con il widget timepicker. Ad esempio, potrebbe non essere utile disporre di incrementi inferiori a 5 o 15 minuti quando si parla di consegna di un compito, disponibilità di un test, ora di inizio di una sessione, ecc.

*Default: `15`*

### `timezone`

**Fuso orario predefinito**

Selezionare il fuso orario predefinito per questo portale. Ciò contribuirà a impostare il fuso orario (se la funzionalità è abilitata) per ogni nuovo utente o per qualsiasi utente che non abbia ancora impostato un fuso orario specifico. I fusi orari consentono di mostrare a schermo tutte le informazioni relative all'orario nel fuso orario specifico di ciascun utente.

*Default: `Europe/Paris`*


### `unoconv_binaries`

**Binari del convertitore UNO**

Indicare il percorso di sistema della libreria convertitore UNO per abilitare alcune funzionalità extra di esportazione.

*Default: `/usr/bin/unoconv`*


### `use_career_external_id_as_identifier_in_diagrams`

**Utilizzare l'ID esterno della carriera nei diagrammi**

Se si utilizzano i diagrammi di carriera, mostrare un campo extra al posto dell'ID interno della carriera.

*Default: `false`*

### `use_custom_pages`

**Utilizzare pagine personalizzate**

Abilitare questa funzionalità per configurare pagine di accesso specifiche per ruolo

*Default: `false`*

### `use_virtual_keyboard`

**Utilizzare la tastiera virtuale**

Fare apparire una tastiera virtuale. È utile quando si impostano esami restrittivi in un'aula fisica in cui gli studenti non hanno una tastiera, per limitarne la possibilità di copiare.

*Default: `false`*

### `user_status_show_option`

**Opzioni di visualizzazione dei ruoli**

Un array di ruolo => true/false che definisce se quel ruolo deve essere mostrato o nascosto.

### `user_status_show_options_enabled`

**Visualizzazione selettiva dei ruoli**

Abilitare l'uso di un array per definire quali ruoli devono essere visualizzati in modo esplicito e quali devono essere nascosti.

*Default: `false`*