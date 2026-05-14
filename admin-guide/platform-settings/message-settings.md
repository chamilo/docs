# Impostazioni di Messaggistica

Comportamento del sistema di **Messaggistica / Posta in arrivo**.

Accedi a queste impostazioni tramite **Amministrazione > Impostazioni di configurazione > Messaggistica**. Questa categoria contiene **7 impostazioni**, elencate di seguito con il titolo e il commento forniti nei dati predefiniti delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospace. Utilizzalo quando scrivi script tramite l'API o quando devi modificare queste impostazioni a livello globale editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `allow_message_tool`

**Strumento di messaggistica interna**

Abilitare lo strumento di messaggistica interna consente agli utenti di inviare messaggi ad altri utenti della piattaforma e di avere una casella di posta in arrivo per i messaggi.

*Predefinito: `true`*

### `allow_send_message_to_all_platform_users`

**Consenti l'invio di messaggi a qualsiasi utente della piattaforma**

Permette di inviare messaggi a qualsiasi utente della piattaforma, non solo agli amici o alle persone attualmente online.

*Predefinito: `false`*

### `allow_user_message_tracking`

**Gli amministratori possono vedere i messaggi personali**

Consente agli amministratori di visualizzare i messaggi personali tra un insegnante e uno studente. Assicurati di includere una nota nei tuoi termini e condizioni, poiché ciò potrebbe influire sulla protezione della privacy.

*Predefinito: `false`*

### `filter_interactivity_messages`

**Gli insegnanti possono accedere ai messaggi degli studenti solo entro il periodo della sessione**

Filtra i messaggi tra un insegnante e uno studente in base alle date di inizio e fine della sessione.

*Predefinito: `false`*

### `message_max_upload_filesize`

**Dimensione massima del file caricato nei messaggi**

Dimensione massima per il caricamento di file nello strumento di messaggistica (in Byte).

*Predefinito: `20971520`*

### `private_messages_about_user`

**Consenti messaggi privati tra insegnanti riguardo a uno studente**

Consente lo scambio di messaggi tra insegnanti o supervisori riguardo a un utente dalla pagina di monitoraggio di quell'utente.

*Predefinito: `false`*

### `private_messages_about_user_visible_to_user`

**Consenti agli studenti di vedere i messaggi su di loro tra insegnanti**

Se lo scambio di messaggi riguardo a un utente è abilitato, questa opzione consentirà all'utente corrispondente di vedere i messaggi. Questo per rispettare le regole di trasparenza che l'organizzazione potrebbe dover seguire.

*Predefinito: `false`*