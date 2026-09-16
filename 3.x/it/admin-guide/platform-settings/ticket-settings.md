# Impostazioni dei ticket

Comportamento del sistema **Tickets** (helpdesk).

Accedere a queste impostazioni in **Amministrazione > Impostazioni di configurazione > Ticket**. Questa categoria contiene **7 impostazioni**, elencate di seguito con il titolo e il commento forniti nei fixture delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospazio. Utilizzarlo quando si esegue lo scripting tramite l'API o quando è necessario modificare tali impostazioni a livello globale modificando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `show_link_bug_notification`

**Mostra il collegamento per segnalare un bug**

Mostra un collegamento nell'intestazione per segnalare un bug all'interno della nostra piattaforma di supporto (http://support.chamilo.org). Facendo clic sul collegamento, l'utente viene inviato alla piattaforma di supporto, su una pagina wiki che descrive il processo di segnalazione dei bug.

*Predefinito: `false`*


### `show_link_ticket_notification`

**Mostra il collegamento per la creazione dei ticket**

Mostra il collegamento per la creazione dei ticket agli utenti sul lato destro del portale

*Predefinito: `false`*


### `ticket_allow_category_edition`

**Consenti la modifica delle categorie dei ticket**

Consenti la modifica delle categorie da parte degli amministratori.

*Predefinito: `false`*

### `ticket_allow_student_add`

**Consenti agli utenti di aggiungere ticket**

Consente a tutti gli utenti di aggiungere ticket, non solo agli amministratori.

*Predefinito: `false`*

### `ticket_project_user_roles`

**Accesso per ruolo ai progetti dei ticket**

Consente di accedere ai progetti dei ticket in base a ruoli utente specifici. Esempio: ['permissions' => [1 => [17]] dove project_id = 1, STUDENT_BOSS = 17.

> Questa impostazione è obbligatoria per gli utenti non amministratori: senza una mappatura dei ruoli definita qui, solo gli amministratori possono accedere ai ticket di supporto. Per concedere a qualsiasi altro ruolo l'accesso a un progetto di ticket, aggiungere il relativo ID ruolo alle autorizzazioni di questa impostazione per quel progetto.

### `ticket_send_warning_to_all_admins`

**Invia i messaggi di avviso dei ticket agli amministratori**

Invia un messaggio se un ticket è stato creato senza una categoria o se una categoria non ha alcun amministratore assegnato.

*Predefinito: `false`*


### `ticket_warn_admin_no_user_in_category`

**Invia un avviso agli amministratori se la categoria dei ticket non ha un responsabile**

Invia un messaggio di avviso (e-mail e messaggio Chamilo) a tutti gli amministratori se non è assegnato alcun utente a una categoria.

*Predefinito: `false`*