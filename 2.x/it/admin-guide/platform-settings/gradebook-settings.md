# Impostazioni del Registro delle Valutazioni (Valutazioni)

Impostazioni predefinite applicate allo strumento **Registro delle Valutazioni (Valutazioni)** — visualizzazione dei punteggi, precisione decimale, soglie di punteggio per i certificati e aggregazione.

Accedi a queste impostazioni tramite **Amministrazione > Impostazioni di configurazione > Registro delle Valutazioni (Valutazioni)**. Questa categoria contiene **34 impostazioni**, elencate di seguito con il titolo e il commento forniti nei dati predefiniti della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospace. Utilizzalo quando scrivi script tramite l'API o quando devi modificare queste impostazioni a livello globale editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `allow_gradebook_comments`

**Commenti nel Registro delle Valutazioni**

Abilita i commenti nel registro delle valutazioni affinché i docenti possano aggiungere un commento sulle prestazioni complessive dello studente in questo corso. Il commento apparirà nell'esportazione PDF per lo studente.

*Predefinito: `false`*

### `allow_gradebook_stats`

**Memorizza i risultati nella cache del Registro delle Valutazioni**

Inserisci alcuni dei calcoli complessi delle medie in campi memorizzati nella cache per i collegamenti e le valutazioni, al fine di aumentare la velocità (notevolmente). L'impatto negativo potenziale è che potrebbe richiedere del tempo per aggiornare le tabelle dei risultati del registro delle valutazioni.

*Predefinito: `false`*

### `gradebook_badge_sidebar`

**Barra laterale dei badge nel Registro delle Valutazioni**

Genera un blocco nel menu laterale dove possono essere mostrati alcuni badge in attesa di approvazione. Richiede che i registri delle valutazioni siano elencati qui, tramite ID (numerico).

### `gradebook_default_grade_model_id`

**Modello di valutazione predefinito**

Questo valore sarà selezionato per impostazione predefinita durante la creazione di un corso.

### `gradebook_default_weight`

**Peso predefinito nel Registro delle Valutazioni**

Questo peso sarà utilizzato per impostazione predefinita in tutti i corsi.

*Predefinito: `100`*

### `gradebook_dependency`

**Dipendenze tra Registri delle Valutazioni**

Abilita un meccanismo di dipendenze tra registri delle valutazioni che informa gli utenti su quali altri elementi devono completare prima per poter completare il registro delle valutazioni.

*Predefinito: `false`*

### `gradebook_dependency_mandatory_courses`

**Corsi obbligatori per le dipendenze del Registro delle Valutazioni**

Quando si utilizzano dipendenze tra registri delle valutazioni, è possibile scegliere un elenco di corsi obbligatori che saranno richiesti prima di approvare qualsiasi registro delle valutazioni che presenta dipendenze.

### `gradebook_detailed_admin_view`

**Mostra colonne aggiuntive nel Registro delle Valutazioni**

Mostra colonne aggiuntive nella vista studente del registro delle valutazioni con il miglior punteggio di tutti gli studenti, la posizione relativa dello studente che visualizza il rapporto e il punteggio medio dell'intero gruppo di studenti.

*Predefinito: `false`*

### `gradebook_display_extra_stats`

**Statistiche aggiuntive nel Registro delle Valutazioni**

Aggiungi colonne aggiuntive al rapporto principale del registro delle valutazioni (1 = classifica, 2 = miglior punteggio, 3 = media).

### `gradebook_enable`

**Attivazione dello strumento Valutazioni**

Lo strumento Valutazioni consente di valutare le competenze nella tua organizzazione combinando valutazioni di attività in aula e online in rapporti sulle prestazioni. Desideri attivarlo?

*Predefinito: `true`*

### `gradebook_enable_grade_model`

**Abilita modello di Registro delle Valutazioni**

Abilita la creazione automatica di categorie del registro delle valutazioni all'interno di un corso in base ai modelli di registro delle valutazioni.

*Predefinito: `false`*

### `gradebook_enable_subcategory_skills_independant_assignement`

**Abilita competenze per sottocategorie del Registro delle Valutazioni**

Le competenze sono normalmente attribuite per il completamento di un intero registro delle valutazioni. Abilitando questa opzione, consenti di associare competenze a sottosezioni dei registri delle valutazioni.

*Predefinito: `false`*

### `gradebook_flatview_extrafields_columns`

**Campi extra utente nella vista piatta del Registro delle Valutazioni**

Aggiungi le colonne specificate (array 'variables') alla tabella dei risultati principali nel registro delle valutazioni.

### `gradebook_hide_graph`

**Nascondi grafici del Registro delle Valutazioni**

Se il tuo portale ha risorse limitate, ridurre la generazione dei grafici dinamici del registro delle valutazioni con potenzialmente migliaia di risultati è una buona opzione.

*Predefinito: `false`*

### `gradebook_hide_link_to_item_for_student`

**Nascondi collegamenti agli elementi per gli studenti nel Registro delle Valutazioni**

Impedisci agli studenti di fare clic sugli elementi dal registro delle valutazioni rimuovendo i collegamenti agli elementi.

*Predefinito: `false`*

### `gradebook_hide_pdf_report_button`

**Nascondi pulsante 'scarica rapporto PDF' nel Registro delle Valutazioni**

Rimuove il pulsante di esportazione PDF dalle viste del registro delle valutazioni per gli studenti.

*Predefinito: `false`*

### `gradebook_hide_table`

**Nascondi tabella del Registro delle Valutazioni per gli studenti**

Riduci il tempo di caricamento del registro delle valutazioni nascondendo la tabella dei risultati (ma consentendo comunque l'accesso a certificati, competenze, ecc.).

*Predefinito: `false`*

---
### `gradebook_locking_enabled`

**Abilita il blocco delle valutazioni da parte dei docenti**

Una volta abilitata, questa opzione permetterà ai docenti del corso corrispondente di bloccare qualsiasi valutazione. Questo, a sua volta, impedirà qualsiasi modifica dei risultati da parte del docente all'interno delle risorse utilizzate nella valutazione: esami, percorsi di apprendimento, compiti, ecc. L'unico ruolo autorizzato a sbloccare una valutazione bloccata è l'amministratore. Il docente sarà informato di questa possibilità. Il blocco e lo sblocco dei registri di valutazione saranno registrati nel rapporto delle attività importanti del sistema.

*Default: `false`*

### `gradebook_multiple_evaluation_attempts`

**Consenti più tentativi di valutazione nel registro di valutazione**

Permette di aggiungere commenti a più tentativi di valutazione nel registro di valutazione e nelle tabelle dei risultati.

*Default: `false`*

### `gradebook_number_decimals`

**Numero di decimali**

Consente di impostare il numero di decimali consentiti in un punteggio.

*Default: `0`*

### `gradebook_pdf_export_settings`

**Opzioni di esportazione PDF del registro di valutazione**

Modifica l'esportazione in PDF per gli studenti in base alle impostazioni fornite ('hide_score_weight', 'hide_feedback_textarea', ...)

### `gradebook_report_score_style`

**Stile dei punteggi nei rapporti del registro di valutazione**

Aggiunge la configurazione dello stile dei punteggi del registro di valutazione nella vista piatta. Consulta api.lib.php per trovare le opzioni: esempi SCORE_DIV = 1, SCORE_PERCENT = 2, ecc.

*Default: `1`*

### `gradebook_score_display_colorsplit`

**Soglia**

La soglia (in %) al di sotto della quale i punteggi saranno colorati di rosso.

*Default: `50`*

### `gradebook_score_display_custom`

**Etichettatura dei livelli di competenza**

Seleziona la casella per abilitare l'etichettatura dei livelli di competenza.

*Default: `false`*

### `gradebook_score_display_custom_standalone`

**Visualizzazione personalizzata dei punteggi in una colonna separata del registro di valutazione**

Mostra i valori personalizzati dei livelli di competenza in una colonna separata nella vista piatta del registro di valutazione quando si utilizza la visualizzazione personalizzata dei punteggi.

*Default: `false`*

### `gradebook_score_display_upperlimit`

**Mostra il limite superiore del punteggio**

Seleziona la casella per mostrare il limite superiore del punteggio.

*Default: `false`*

### `gradebook_use_apcu_cache`

**Utilizza la cache APCu per velocizzare il registro di valutazione**

Migliora la velocità durante la generazione dei rapporti degli studenti nel registro di valutazione utilizzando la cache Doctrine APCU. APCu è un'estensione PHP opzionale ma consigliata.

*Default: `true`*

### `gradebook_use_exercise_score_settings_in_categories`

**Utilizza le impostazioni dei test per la visualizzazione dei voti**

Applica le impostazioni di visualizzazione dei punteggi degli esercizi (percentuale vs. punti) ai punteggi delle categorie nel registro di valutazione.

*Default: `true`*

### `gradebook_use_exercise_score_settings_in_total`

**Utilizza l'impostazione globale di visualizzazione dei punteggi nel registro di valutazione**

Applica le impostazioni globali di visualizzazione dei punteggi degli esercizi ai calcoli del punteggio totale nel registro di valutazione.

*Default: `false`*

### `hide_gradebook_percentage_user_result`

**Nascondi la percentuale nei risultati migliori/medi del registro di valutazione**

Rimuove la visualizzazione della percentuale dai risultati dei punteggi migliori/medi mostrati agli studenti nel registro di valutazione.

*Default: `true`*

### `my_display_coloring`

**Visualizza colori per i punteggi nel registro di valutazione**

Abilita la codifica a colori per una migliore visibilità dei punteggi nel registro di valutazione.

*Default: `false`*

### `student_publication_to_take_in_gradebook`

**Compito considerato per il registro di valutazione**

Nello strumento dei compiti, gli studenti possono caricare più di un file. Nel caso in cui ce ne sia più di uno per un singolo compito, quale dovrebbe essere considerato per la classificazione nel registro di valutazione? Questo dipende dalla tua metodologia. Usa 'first' per porre l'accento sull'attenzione ai dettagli (come la consegna tempestiva e la gestione del lavoro corretto per primo). Usa 'last' per evidenziare il lavoro collaborativo e adattativo.

*Default: `first`*

### `teachers_can_change_grade_model_settings`

**I docenti possono modificare le impostazioni del modello del registro di valutazione**

Durante la modifica di un registro di valutazione.

*Default: `true`*

### `teachers_can_change_score_settings`

**I docenti possono modificare le impostazioni dei punteggi del registro di valutazione**

Durante la modifica delle impostazioni del registro di valutazione.

*Default: `true`*