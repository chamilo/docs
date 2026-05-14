# Impostazioni CAS

Configurazione legacy di CAS (Central Authentication Service) ereditata da Chamilo 1.x. Consulta [CAS](../authentication/cas.md) per lo stato attuale dell'autenticatore CAS in Chamilo 2.x.

Accedi a queste impostazioni tramite **Amministrazione > Impostazioni di configurazione > CAS**. Questa categoria contiene **7 impostazioni**, elencate di seguito con il titolo e il commento forniti nei dati di configurazione della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospace. Utilizzalo quando scrivi script tramite l'API o quando devi modificare queste impostazioni a livello globale editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `cas_activate`

**Abilita autenticazione CAS**

Abilitare l'autenticazione CAS consentirà agli utenti di autenticarsi con le loro credenziali CAS.<br/>Vai su <a href='settings.php?category=CAS'>Plugin</a> per aggiungere un pulsante configurabile 'Login CAS' per il tuo campus Chamilo. Oppure puoi forzare l'autenticazione CAS impostando cas[force_redirect] in app/config/auth.conf.php.

### `cas_add_user_activate`

**Abilita aggiunta utenti CAS**

Abilita l'aggiunta di utenti CAS. Per creare l'account utente dalla directory LDAP, le tabelle extldap_config e extldap_user_correspondance devono essere compilate in app/config/auth.conf.php.

### `cas_port`

**Porta del server CAS principale**

La porta su cui connettersi al server CAS principale.

### `cas_protocol`

**Protocollo del server CAS principale**

Il protocollo con cui ci connettiamo al server CAS.

### `cas_server`

**Server CAS principale**

Questo è il server CAS principale che verrà utilizzato per l'autenticazione (indirizzo IP o nome host).

### `cas_server_uri`

**URI del server CAS principale**

Il percorso del servizio CAS.

### `update_user_info_cas_with_ldap`

**Aggiorna le informazioni dell'account utente autenticato CAS da LDAP**

Assicura che il nome, il cognome e l'indirizzo email dell'utente siano gli stessi dei valori attuali nella directory LDAP.