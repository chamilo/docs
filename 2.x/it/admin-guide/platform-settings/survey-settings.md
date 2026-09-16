# Impostazioni dei Sondaggi

Impostazioni predefinite e comportamento dello strumento **Sondaggi**.

Accedi a queste impostazioni tramite **Amministrazione > Impostazioni di configurazione > Sondaggi**. Questa categoria contiene **12 impostazioni**, elencate di seguito con il titolo e il commento forniti nei dati di configurazione della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospace. Utilizzalo quando scrivi script tramite l'API o quando devi modificare queste impostazioni a livello globale editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `extend_rights_for_coach_on_survey`

**Estendi i diritti per i coach sui sondaggi**

Attivando questa opzione, i coach potranno creare e modificare sondaggi.

*Predefinito: `true`*

### `hide_survey_edition`

**Impedisci la modifica dei sondaggi**

Impedisce la modifica di tutti i sondaggi elencati qui (per codice). Usa * per impedire la modifica di tutti i sondaggi.

### `hide_survey_reporting_button`

**Nascondi il pulsante di report dei sondaggi**

Consente agli amministratori di nascondere il pulsante di report dei sondaggi se i sondaggi vengono utilizzati per valutare gli insegnanti.

*Predefinito: `false`*

### `show_pending_survey_in_menu`

**Mostra "Sondaggi in attesa" nel menu**

Mostra una voce di menu che consente agli utenti di accedere ai propri sondaggi in attesa.

*Predefinito: `false`*

### `show_surveys_base_in_sessions`

**Mostra i sondaggi del corso base in tutti i corsi di sessione**

[inferito] Rende i sondaggi del corso base visibili e disponibili agli studenti in tutti i corsi di sessione correlati.

*Predefinito: `false`*

### `survey_additional_teacher_modify_actions`

**Aggiungi azioni aggiuntive (come link) agli elenchi di sondaggi per gli insegnanti**

Aggiunge azioni (di solito collegate a plugin) nell'elenco dei sondaggi. Usa la sintassi array ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']].

### `survey_allow_answered_question_edit`

**Consenti agli insegnanti di modificare le domande dei sondaggi dopo che gli studenti hanno risposto**

[inferito] Consente agli istruttori di modificare le domande dei sondaggi anche dopo che gli studenti hanno inviato le risposte.

*Predefinito: `false`*

### `survey_anonymous_show_answered`

**Consenti agli insegnanti di vedere chi ha risposto nei sondaggi anonimi**

Consente agli insegnanti di vedere quali studenti hanno già risposto a un sondaggio anonimo. Questo appare solo quando più di un utente ha risposto, rendendo difficile identificare chi ha risposto cosa.

*Predefinito: `false`*

### `survey_backwards_enable`

**Abilita il pulsante 'domanda precedente' nei sondaggi**

[inferito] Abilita un pulsante di navigazione "domanda precedente" per consentire agli studenti di rivedere le domande precedenti del sondaggio.

*Predefinito: `false`*

### `survey_duplicate_order_by_name`

**Ordina per nome dello studente quando si utilizza la funzione di duplicazione del sondaggio**

La funzione di duplicazione del sondaggio è orientata agli insegnanti ed è pensata per chiedere agli insegnanti di esprimere il loro apprezzamento su ogni studente in ordine. Questa opzione ordinerà le domande in base al cognome dello studente.

*Predefinito: `true`*

### `survey_email_sender_noreply`

**Mittente email del sondaggio (no-reply)**

Le inviti ai sondaggi devono utilizzare l'indirizzo email del coach o l'indirizzo no-reply definito nella sezione di configurazione principale?

*Predefinito: `coach`*

### `survey_mark_question_as_required`

**Segna tutte le domande del sondaggio come 'obbligatorie' per impostazione predefinita**

[inferito] Segna automaticamente tutte le domande dei sondaggi appena create come risposte obbligatorie per impostazione predefinita.

*Predefinito: `false`*