# Impostazioni di registrazione

Politica di auto-registrazione e reindirizzamenti post-registrazione — quali informazioni vengono richieste ai nuovi utenti e dove atterrano.

Accedere a queste impostazioni in **Amministrazione > Impostazioni di configurazione > Registrazione**. Questa categoria contiene **21 impostazioni**, elencate di seguito con il titolo e il commento forniti nei fixture delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospazio. Utilizzarlo per lo scripting tramite API o quando è necessario modificare tali impostazioni a livello globale modificando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `allow_double_validation_in_registration`

**Doppia convalida per il processo di registrazione**

Visualizza semplicemente una richiesta di conferma nella pagina di registrazione prima di procedere con la creazione dell'utente.

*Predefinito: `false`*


### `allow_fields_inscription`

**Limitare i campi mostrati durante la registrazione**

Se si desidera mostrare solo alcuni dei campi del profilo disponibili, è possibile completare qui l'array con i sotto-elementi 'fields' e 'extra_fields' contenenti array con un elenco dei campi da mostrare.

### `allow_invitation_registration` **v3**

**Consentire la registrazione tramite link di invito al corso**

Se abilitata, un docente/amministratore può inviare un link di invito monouso dallo strumento Utenti di un corso, che consente a una persona non registrata di raggiungere il modulo di registrazione e registrarsi anche quando l'auto-registrazione generale (`allow_registration`) è disabilitata.

*Predefinito: `false`*

Vedere [Iscrizione degli utenti](../../teacher-guide/assessing-learners/subscribing-users.md#inviting-users-by-email) per il lato docente di questa funzionalità.

### `allow_lostpassword`

**Password dimenticata**

Gli utenti possono richiedere la password dimenticata?

*Predefinito: `true`*

### `allow_registration`

**Registrazione**

La registrazione come nuovo utente è consentita? Gli utenti possono creare nuovi account?

*Predefinito: `false`*

### `allow_registration_as_teacher`

**Registrazione come docente**

È possibile registrarsi come docente (con la possibilità di creare corsi)?

*Predefinito: `false`*

### `allow_terms_conditions`

**Abilitare termini e condizioni**

Questa opzione visualizza i Termini e condizioni nel modulo di registrazione per i nuovi utenti. Deve essere configurata prima nella pagina di amministrazione del portale.

*Predefinito: `false`*


### `drh_autosubscribe`

**Auto-iscrizione del direttore delle risorse umane**

Auto-iscrizione del direttore delle risorse umane - non ancora disponibile

### `extendedprofile_registration`

**Campi del portfolio in registrazione**

Quali dei seguenti campi del portfolio devono essere disponibili nel processo di registrazione dell'utente? Richiede che l'opzione portfolio sia abilitata (vedere sopra).

### `extendedprofile_registrationrequired`

**Campi del portfolio obbligatori in registrazione**

Quali dei seguenti campi del portfolio sono *obbligatori* nel processo di registrazione dell'utente? Richiede che l'opzione portfolio sia abilitata e che il campo sia anche disponibile nel modulo di registrazione (vedere sopra).

### `extldap_config`

**Configurazione della connessione LDAP**

Array che definisce host e porta per il server LDAP.

### `hide_legal_accept_checkbox`

**Nascondere la casella di accettazione legale nella pagina Termini e condizioni**

Se impostata su true, rimuove la casella di controllo "Ho letto e accetto" nel flusso della pagina Termini e condizioni.

*Predefinito: `false`*


### `platform_unsubscribe_allowed`

**Consentire la disiscrizione dalla piattaforma**

Abilitando questa opzione, si consente a qualsiasi utente di rimuovere definitivamente il proprio account e tutti i dati correlati dalla piattaforma. Si tratta di un'azione piuttosto radicale, ma è necessaria per i portali aperti al pubblico in cui gli utenti possono auto-registrarsi. Nel profilo utente comparirà una voce aggiuntiva per disiscriversi dopo conferma.

*Predefinito: `false`*


### `redirect_after_login`

**Reindirizzamento dopo il login (per profilo)**

Definire il reindirizzamento per profilo dopo il login utilizzando un oggetto JSON come {"STUDENT":"", "ADMIN":"admin-dashboard"}

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

Array di identificatori di campi extra che devono essere compilati durante la registrazione dell'utente.

### `required_profile_fields`

**Campi obbligatori durante la registrazione**

Array di nomi di campi del profilo (email, phone, language, official_code) che devono essere forniti durante la registrazione.

### `send_inscription_msg_to_inbox`

**Inviare il messaggio di benvenuto all'e-mail e alla casella di posta**

Per impostazione predefinita, il messaggio di benvenuto (con le credenziali) viene inviato solo via e-mail. Abilitare questa opzione per inviarlo anche alla casella di posta Chamilo dell'utente.

*Predefinito: `false`*


### `sessionadmin_autosubscribe`

**Auto-iscrizione dell'amministratore di sessione**

Auto-iscrizione dell'amministratore di sessione - non ancora disponibile

### `student_autosubscribe`

**Iscrizione automatica degli studenti**

Iscrizione automatica degli studenti - non ancora disponibile

### `teacher_autosubscribe`

**Iscrizione automatica dei docenti**

Iscrizione automatica dei docenti - non ancora disponibile

### `user_hide_never_expire_option`

**Nascondere l'opzione «non scade mai» per gli utenti**

Rimuove l'opzione «non scade mai» durante la creazione o la modifica di un account utente.

*Predefinito: `false`*