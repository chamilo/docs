# Impostazioni dei sondaggi

Valori predefiniti e comportamento dello strumento **Surveys**.

Accedere a queste impostazioni in **Amministrazione > Impostazioni di configurazione > Sondaggi**. Questa categoria contiene **12 impostazioni**, elencate di seguito con il titolo e il commento forniti nei fixture delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospazio. Utilizzarlo per lo scripting tramite API o per modificare tali impostazioni a livello globale modificando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `extend_rights_for_coach_on_survey`

**Estendere i diritti dei tutor sui sondaggi**

Abilitare questa opzione per consentire ai tutor di creare e modificare i sondaggi

*Predefinito: `true`*


### `hide_survey_edition`

**Impedire la modifica dei sondaggi**

Impedire la modifica dei sondaggi per tutti i sondaggi elencati qui (per codice). Usare * per impedire la modifica di tutti i sondaggi.

### `hide_survey_reporting_button`

**Nascondere il pulsante di reportistica dei sondaggi**

Consente agli amministratori di nascondere il pulsante di reportistica dei sondaggi se i sondaggi sono usati per sondare i docenti.

*Predefinito: `false`*


### `show_pending_survey_in_menu`

**Mostrare "Sondaggi in sospeso" nel menu**

Visualizzare una voce di menu che consente agli utenti di accedere ai propri sondaggi in sospeso.

*Predefinito: `false`*


### `show_surveys_base_in_sessions`

**Visualizzare i sondaggi del corso base in tutti i corsi di sessione**

[inferred] Rendere i sondaggi del corso base visibili e disponibili agli studenti in tutti i corsi di sessione correlati.

*Predefinito: `false`*


### `survey_additional_teacher_modify_actions`

**Aggiungere azioni aggiuntive (come collegamenti) agli elenchi dei sondaggi per i docenti**

Aggiungere azioni (di solito collegate a plugin) nell'elenco dei sondaggi. Usare la sintassi array ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']].

### `survey_allow_answered_question_edit`

**Consentire ai docenti di modificare le domande del sondaggio dopo le risposte degli studenti**

[inferred] Consentire ai docenti di modificare le domande del sondaggio anche dopo che gli studenti hanno inviato le risposte.

*Predefinito: `false`*


### `survey_anonymous_show_answered`

**Consentire ai docenti di vedere chi ha risposto nei sondaggi anonimi**

Consentire ai docenti di vedere quali studenti hanno già risposto a un sondaggio anonimo. Questa informazione compare solo dopo che più di un utente ha risposto, così resta difficile identificare chi ha risposto cosa.

*Predefinito: `false`*


### `survey_backwards_enable`

**Abilitare il pulsante "domanda precedente" nei sondaggi**

[inferred] Abilitare un pulsante di navigazione "domanda precedente" per consentire agli studenti di rivedere le domande precedenti del sondaggio.

*Predefinito: `false`*


### `survey_duplicate_order_by_name`

**Ordinare per nome dello studente quando si usa la funzione di duplicazione del sondaggio**

La funzione di duplicazione del sondaggio è orientata ai docenti e serve a chiedere ai docenti di esprimere la propria valutazione su ciascuno studente in ordine. Questa opzione ordinerà le domande per cognome dello studente.

*Predefinito: `true`*


### `survey_email_sender_noreply`

**Mittente e-mail dei sondaggi (no-reply)**

Gli inviti ai sondaggi devono usare l'indirizzo e-mail del tutor o l'indirizzo no-reply definito nella sezione di configurazione principale?

*Predefinito: `coach`* (la scelta "Mittente e-mail del tutor del corso" — il valore memorizzato è invariato rispetto alle versioni precedenti di Chamilo, ma l'opzione è etichettata "tutor" nell'interfaccia)


### `survey_mark_question_as_required`

**Contrassegnare tutte le domande del sondaggio come "obbligatorie" per impostazione predefinita**

[inferred] Contrassegnare automaticamente tutte le domande di sondaggio appena create come risposte obbligatorie per impostazione predefinita.

*Predefinito: `false`*