# Impostazioni CAS

Configurazione CAS (Central Authentication Service) legacy ereditata da Chamilo 1.x. Vedere [CAS](../authentication/cas.md) per lo stato attuale dell'autenticatore CAS in Chamilo 3.x.

Accedere a queste impostazioni in **Amministrazione > Impostazioni di configurazione > CAS**. Questa categoria contiene **7 impostazioni**, elencate di seguito con il titolo e il commento forniti nei fixture delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospazio. Utilizzarlo quando si esegue lo scripting tramite API o quando è necessario modificare tali impostazioni a livello globale modificando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `cas_activate`

**Abilita autenticazione CAS**

L'abilitazione dell'autenticazione CAS consentirà agli utenti di autenticarsi con le proprie credenziali CAS.<br/>Andare a <a href='settings.php?category=CAS'>Plugin</a> per aggiungere un pulsante configurabile 'CAS Login' per il campus Chamilo. In alternativa è possibile forzare l'autenticazione CAS impostando cas[force_redirect] in app/config/auth.conf.php.

### `cas_add_user_activate`

**Abilita aggiunta utenti CAS**

Abilita l'aggiunta di utenti CAS. Per creare l'account utente dalla directory LDAP, le tabelle extldap_config e extldap_user_correspondance devono essere compilate in app/config/auth.conf.php

### `cas_port`

**Porta del server CAS principale**

La porta su cui connettersi al server CAS principale

### `cas_protocol`

**Protocollo del server CAS principale**

Il protocollo con cui ci si connette al server CAS

### `cas_server`

**Server CAS principale**

Questo è il server CAS principale che verrà utilizzato per l'autenticazione (indirizzo IP o hostname)

### `cas_server_uri`

**URI del server CAS principale**

Il percorso del servizio CAS

### `update_user_info_cas_with_ldap`

**Aggiorna le informazioni dell'account utente autenticato tramite CAS da LDAP**

Garantisce che nome, cognome e indirizzo e-mail dell'utente coincidano con i valori correnti nella directory LDAP