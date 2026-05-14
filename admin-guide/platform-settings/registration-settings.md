# Impostazioni di Registrazione

Politica di auto-registrazione e reindirizzamenti post-registrazione — cosa viene richiesto ai nuovi utenti e dove vengono indirizzati.

Accedi a queste impostazioni tramite **Amministrazione > Impostazioni di configurazione > Registrazione**. Questa categoria contiene **20 impostazioni**, elencate di seguito con il titolo e il commento forniti nei dati predefiniti delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospace. Utilizzalo quando scrivi script tramite l'API o quando devi modificare queste impostazioni a livello globale editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `allow_double_validation_in_registration`

**Doppia validazione per il processo di registrazione**

Mostra semplicemente una richiesta di conferma nella pagina di registrazione prima di procedere con la creazione dell'utente.

*Predefinito: `false`*

### `allow_fields_inscription`

**Limita i campi mostrati durante la registrazione**

Se desideri mostrare solo alcuni dei campi del profilo disponibili, puoi completare l'array qui con sotto-elementi 'fields' e 'extra_fields' contenenti array con un elenco dei campi da mostrare.

### `allow_lostpassword`

**Password dimenticata**

Gli utenti possono richiedere la loro password dimenticata?

*Predefinito: `true`*

### `allow_registration`

**Registrazione**

È consentita la registrazione come nuovo utente? Gli utenti possono creare nuovi account?

*Predefinito: `false`*

### `allow_registration_as_teacher`

**Registrazione come docente**

È possibile registrarsi come docente (con la capacità di creare corsi)?

*Predefinito: `false`*

### `allow_terms_conditions`

**Abilita termini e condizioni**

Questa opzione mostrerà i Termini e Condizioni nel modulo di registrazione per i nuovi utenti. Deve essere configurata prima nella pagina di amministrazione del portale.

*Predefinito: `false`*

### `drh_autosubscribe`

**Autoiscrizione del direttore delle risorse umane**

Autoiscrizione del direttore delle risorse umane - non ancora disponibile

### `extendedprofile_registration`

**Campi del portfolio durante la registrazione**

Quali dei seguenti campi del portfolio devono essere disponibili nel processo di registrazione dell'utente? Questo richiede che l'opzione portfolio sia abilitata (vedi sopra).

### `extendedprofile_registrationrequired`

**Campi del portfolio obbligatori nella registrazione**

Quali dei seguenti campi del portfolio sono *obbligatori* nel processo di registrazione dell'utente? Questo richiede che l'opzione portfolio sia abilitata e che il campo sia anche disponibile nel modulo di registrazione (vedi sopra).

### `extldap_config`

**Configurazione della connessione LDAP**

Array che definisce host e porta per il server LDAP.

### `hide_legal_accept_checkbox`

**Nascondi la casella di accettazione legale nella pagina dei Termini e Condizioni**

Se impostato su true, rimuove la casella "Ho letto e accetto" nel flusso della pagina dei Termini e Condizioni.

*Predefinito: `false`*

### `platform_unsubscribe_allowed`

**Consenti la cancellazione dalla piattaforma**

Abilitando questa opzione, permetti a qualsiasi utente di rimuovere definitivamente il proprio account e tutti i dati ad esso correlati dalla piattaforma. Questa è un'azione piuttosto radicale, ma necessaria per portali aperti al pubblico dove gli utenti possono auto-registrarsi. Una voce aggiuntiva apparirà nel profilo utente per la cancellazione dopo conferma.

*Predefinito: `false`*

### `redirect_after_login`

**Reindirizzamento dopo il login (per profilo)**

Definisci il reindirizzamento per profilo dopo il login utilizzando un oggetto JSON come {"STUDENT":"", "ADMIN":"admin-dashboard"}

*Predefinito:*
```json
{
  "COURSEMANAGER": "courses",
  "STUDENT": "courses",
  "DRH": "",
  "SESSIONADMIN": "admin-dashboard",
  "STUDENT_BOSS": "main/my_space/student.php",
  "INVITEE": "courses",
  "ADMIN": "admin"
}
```

### `required_extra_fields_in_inscription`

**Campi extra obbligatori durante la registrazione**

Array di identificatori di campi extra che devono essere completati durante la registrazione dell'utente.

### `required_profile_fields`

**Campi obbligatori durante la registrazione**

Array di nomi di campi del profilo (email, phone, language, official_code) che devono essere forniti durante la registrazione.

### `send_inscription_msg_to_inbox`

**Invia il messaggio di benvenuto a email e casella di posta**

Di default, il messaggio di benvenuto (con le credenziali) viene inviato solo via email. Abilita questa opzione per inviarlo anche alla casella di posta Chamilo dell'utente.

*Predefinito: `false`*

### `sessionadmin_autosubscribe`

**Autoiscrizione dell'amministratore di sessione**

Autoiscrizione dell'amministratore di sessione - non ancora disponibile

### `student_autosubscribe`

**Autoiscrizione dello studente**

Autoiscrizione dello studente - non ancora disponibile

### `teacher_autosubscribe`

**Autoiscrizione del docente**

Autoiscrizione del docente - non ancora disponibile

### `user_hide_never_expire_option`

**Nascondi l'opzione 'non scade mai' per gli utenti**

Rimuove l'opzione 'non scade mai' durante la creazione/modifica di un account utente.

*Predefinito: `false`*