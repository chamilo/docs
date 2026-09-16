# Impostazioni di messaggistica

Comportamento del sistema di **Messaggistica / Posta in arrivo**.

Accedere a queste impostazioni in **Amministrazione > Impostazioni di configurazione > Messaggistica**. Questa categoria contiene **7 impostazioni**, elencate di seguito con il titolo e il commento forniti nei fixture delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospazio. Utilizzarlo quando si esegue lo scripting tramite API o quando è necessario modificare tali impostazioni a livello globale modificando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `allow_message_tool`

**Strumento di messaggistica interna**

L'abilitazione dello strumento di messaggistica interna consente agli utenti di inviare messaggi ad altri utenti della piattaforma e di disporre di una casella di posta in arrivo.

*Predefinito: `true`*

### `allow_send_message_to_all_platform_users`

**Consentire l'invio di messaggi a qualsiasi utente della piattaforma**

Consente di inviare messaggi a qualsiasi utente della piattaforma, non solo agli amici o alle persone attualmente online.

*Predefinito: `false`*

### `allow_user_message_tracking`

**Gli amministratori possono vedere i messaggi personali**

Consente agli amministratori di vedere i messaggi personali tra un docente e un discente. Assicurarsi di includere una nota nei termini e nelle condizioni, poiché ciò potrebbe influire sulla tutela della privacy.

*Predefinito: `false`*


### `filter_interactivity_messages`

**I docenti possono accedere ai messaggi dei discenti solo entro l'intervallo temporale della sessione**

Filtra i messaggi tra un docente e un discente tra le date di inizio e fine della sessione

*Predefinito: `false`*


### `message_max_upload_filesize`

**Dimensione massima dei file caricati nei messaggi**

Dimensione massima per i caricamenti di file nello strumento di messaggistica (in byte)

*Predefinito: `20971520`*

### `private_messages_about_user`

**Consentire messaggi privati tra docenti su un discente**

Consente lo scambio di messaggi da parte di docenti/responsabili su un utente dalla pagina di tracciamento di tale utente.

*Predefinito: `false`*


### `private_messages_about_user_visible_to_user`

**Consentire ai discenti di vedere i messaggi su di loro tra i docenti**

Se lo scambio di messaggi su un utente è abilitato, questa opzione consentirà all'utente corrispondente di vedere i messaggi. Serve a rispettare le regole di trasparenza a cui l'organizzazione potrebbe dover conformarsi.

*Predefinito: `false`*