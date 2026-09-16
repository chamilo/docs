# Impostazioni dei Ticket

Comportamento del sistema di **Ticket** (helpdesk).

Accedi a queste impostazioni tramite **Amministrazione > Impostazioni di configurazione > Ticket**. Questa categoria contiene **7 impostazioni**, elencate di seguito con il titolo e il commento forniti nei dati di configurazione della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospace. Utilizzalo quando scrivi script tramite l'API o quando devi modificare queste impostazioni a livello globale editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `show_link_bug_notification`

**Mostra link per segnalare un bug**

Mostra un link nell'intestazione per segnalare un bug all'interno della nostra piattaforma di supporto (http://support.chamilo.org). Cliccando sul link, l'utente viene reindirizzato alla piattaforma di supporto, su una pagina wiki che descrive il processo di segnalazione dei bug.

*Predefinito: `false`*

### `show_link_ticket_notification`

**Mostra link per la creazione di ticket**

Mostra il link per la creazione di ticket agli utenti sul lato destro del portale.

*Predefinito: `false`*

### `ticket_allow_category_edition`

**Consenti modifica delle categorie dei ticket**

Consenti la modifica delle categorie da parte degli amministratori.

*Predefinito: `false`*

### `ticket_allow_student_add`

**Consenti agli utenti di aggiungere ticket**

Consente a tutti gli utenti di aggiungere ticket, non solo agli amministratori.

*Predefinito: `false`*

### `ticket_project_user_roles`

**Accesso per ruolo ai progetti di ticket**

Consenti l'accesso ai progetti di ticket da parte di ruoli utente specifici. Esempio: ['permissions' => [1 => [17]] dove project_id = 1, STUDENT_BOSS = 17.

### `ticket_send_warning_to_all_admins`

**Invia messaggi di avviso agli amministratori per i ticket**

Invia un messaggio se un ticket è stato creato senza una categoria o se una categoria non ha un amministratore assegnato.

*Predefinito: `false`*

### `ticket_warn_admin_no_user_in_category`

**Invia avviso agli amministratori se una categoria di ticket non ha un responsabile**

Invia un messaggio di avviso (e-mail e messaggio Chamilo) a tutti gli amministratori se non c'è un utente assegnato a una categoria.

*Predefinito: `false`*