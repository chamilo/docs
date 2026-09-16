# Impostazioni del Gradebook (Valutazioni)

Valori predefiniti applicati a tutto lo strumento **Gradebook (Valutazioni)** — visualizzazione dei punteggi, precisione decimale, soglie di punteggio per i certificati e aggregazione.

Accedere a queste impostazioni in **Amministrazione > Impostazioni di configurazione > Gradebook (Valutazioni)**. Questa categoria contiene **34 impostazioni**, elencate di seguito con il titolo e il commento forniti nei fixture delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospazio. Utilizzarlo quando si esegue lo scripting tramite API o quando è necessario modificare tali impostazioni a livello globale modificando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `allow_gradebook_comments`

**Commenti nel gradebook**

Abilita i commenti nel gradebook in modo che i docenti possano aggiungere un commento alla prestazione complessiva dello studente in questo corso. Il commento apparirà nell'esportazione PDF per lo studente.

*Predefinito: `false`*


### `allow_gradebook_stats`

**Risultati in cache nel gradebook**

Memorizza alcuni dei calcoli più onerosi delle medie in campi in cache per i collegamenti e le valutazioni, al fine di aumentare la velocità (in modo considerevole). L'eventuale impatto negativo è che il rinfresco delle tabelle dei risultati del gradebook può richiedere del tempo.

*Predefinito: `false`*

### `gradebook_badge_sidebar`

**Barra laterale dei badge del gradebook**

Genera un blocco nel menu laterale in cui alcuni badge possono essere mostrati come in attesa di approvazione. Richiede che i gradebook siano elencati qui, tramite ID (numerico).

### `gradebook_default_grade_model_id`

**Modello di voto predefinito**

Questo valore verrà selezionato per impostazione predefinita alla creazione di un corso

### `gradebook_default_weight`

**Peso predefinito nel Gradebook**

Questo peso verrà utilizzato in tutti i corsi per impostazione predefinita

*Predefinito: `100`*

### `gradebook_dependency`

**Dipendenze tra gradebook**

Abilita un meccanismo di dipendenze tra gradebook che consente di sapere quali altri elementi è necessario completare prima di poter completare il gradebook.

*Predefinito: `false`*


### `gradebook_dependency_mandatory_courses`

**Corsi obbligatori per le dipendenze tra gradebook**

Quando si utilizzano le dipendenze tra gradebook, è possibile scegliere un elenco di corsi obbligatori che saranno richiesti prima di approvare qualsiasi gradebook che abbia dipendenze.

### `gradebook_detailed_admin_view`

**Mostra colonne aggiuntive nel gradebook**

Mostra colonne aggiuntive nella vista studente del gradebook con il punteggio migliore di tutti gli studenti, la posizione relativa dello studente che consulta il report e il punteggio medio dell'intero gruppo di studenti.

*Predefinito: `false`*


### `gradebook_display_extra_stats`

**Statistiche extra del gradebook**

Aggiunge colonne aggiuntive al report principale del gradebook (1 = classifica, 2 = punteggio migliore, 3 = media).

### `gradebook_enable`

**Attivazione dello strumento Valutazioni**

Lo strumento Valutazioni consente di valutare le competenze nella propria organizzazione unendo le valutazioni delle attività in aula e online nei report di prestazione. Si desidera attivarlo?

*Predefinito: `true`*


### `gradebook_enable_grade_model`

**Abilita il modello di Gradebook**

Abilita la creazione automatica di categorie di gradebook all'interno di un corso in base ai modelli di gradebook.

*Predefinito: `false`*

### `gradebook_enable_subcategory_skills_independant_assignement`

**Abilita le competenze per sottocategoria del gradebook**

Le competenze sono normalmente attribuite al completamento di un intero gradebook. Abilitando questa opzione, si consente di associare le competenze a sottosezioni dei gradebook.

*Predefinito: `false`*


### `gradebook_flatview_extrafields_columns`

**Campi extra utente nella vista piatta del gradebook**

Aggiunge le colonne indicate (array 'variables') alla tabella principale dei risultati nel gradebook.

### `gradebook_hide_graph`

**Nascondi i grafici del gradebook**

Se il portale ha risorse limitate, ridurre la generazione dei grafici dinamici del gradebook, potenzialmente con migliaia di risultati, è una buona opzione.

*Predefinito: `false`*


### `gradebook_hide_link_to_item_for_student`

**Nascondi i collegamenti agli elementi per gli studenti nel gradebook**

Evita che gli studenti facciano clic sugli elementi dal gradebook rimuovendo i collegamenti sugli elementi.

*Predefinito: `false`*


### `gradebook_hide_pdf_report_button`

**Nascondi il pulsante del gradebook 'scarica report PDF'**

Rimuove il pulsante di esportazione PDF dalle viste del gradebook per gli studenti.

*Predefinito: `false`*


### `gradebook_hide_table`

**Nascondi la tabella del gradebook per gli studenti**

Riduce il tempo di caricamento del gradebook nascondendo la tabella dei risultati (continuando comunque a dare accesso a certificati, competenze, ecc.).

*Predefinito: `false`*

### `gradebook_locking_enabled`

**Abilita il blocco delle valutazioni da parte dei docenti**

Una volta abilitata, questa opzione consente il blocco di qualsiasi valutazione da parte dei docenti del corso corrispondente. Ciò, a sua volta, impedirà qualsiasi modifica dei risultati da parte del docente all'interno delle risorse utilizzate nella valutazione: esami, percorsi di apprendimento, compiti, ecc. L'unico ruolo autorizzato a sbloccare una valutazione bloccata è l'amministratore. Il docente verrà informato di questa possibilità. Il blocco e lo sblocco dei gradebook verranno registrati nel report di sistema delle attività importanti

*Predefinito: `false`*

### `gradebook_multiple_evaluation_attempts`

**Consenti tentativi di valutazione multipli nel gradebook**

Consente di aggiungere commenti a tentativi di valutazione multipli nel gradebook e nelle tabelle dei risultati.

*Predefinito: `false`*


### `gradebook_number_decimals`

**Numero di decimali**

Consente di impostare il numero di decimali ammessi in un punteggio

*Predefinito: `0`*

### `gradebook_pdf_export_settings`

**Opzioni di esportazione PDF del gradebook**

Modifica l'esportazione PDF per gli studenti in base alle impostazioni fornite ('hide_score_weight', 'hide_feedback_textarea', ...)

### `gradebook_report_score_style`

**Stile del punteggio nei report del gradebook**

Aggiunge la configurazione dello stile del punteggio del gradebook nella vista piatta. Vedere api.lib.php per trovare le opzioni: esempi SCORE_DIV = 1, SCORE_PERCENT = 2, ecc.

*Predefinito: `1`*


### `gradebook_score_display_colorsplit`

**Soglia**

La soglia (in %) al di sotto della quale i punteggi verranno colorati di rosso

*Predefinito: `50`*


### `gradebook_score_display_custom`

**Etichettatura dei livelli di competenza**

Selezionare la casella per abilitare l'etichettatura dei livelli di competenza

*Predefinito: `false`*


### `gradebook_score_display_custom_standalone`

**Visualizzazione personalizzata del punteggio nella colonna autonoma del gradebook**

Mostra i valori personalizzati dei livelli di competenza in una colonna separata nella vista piatta del gradebook quando si utilizza la visualizzazione personalizzata del punteggio.

*Predefinito: `false`*


### `gradebook_score_display_upperlimit`

**Mostra il limite superiore del punteggio**

Selezionare la casella per mostrare il limite superiore del punteggio

*Predefinito: `false`*


### `gradebook_use_apcu_cache`

**Usa la cache APCu per accelerare il gradebook**

Migliora la velocità di rendering dei report studente del gradebook utilizzando la cache Doctrine APCU. APCu è un'estensione PHP opzionale ma consigliata.

*Predefinito: `true`*


### `gradebook_use_exercise_score_settings_in_categories`

**Usa le impostazioni dei test per la visualizzazione dei voti**

Applica le impostazioni di visualizzazione del punteggio degli esercizi (percentuale vs. punti) ai punteggi delle categorie nel gradebook.

*Predefinito: `true`*


### `gradebook_use_exercise_score_settings_in_total`

**Usa l'impostazione globale di visualizzazione del punteggio nel gradebook**

Applica le impostazioni globali di visualizzazione del punteggio degli esercizi ai calcoli del punteggio totale nel gradebook.

*Predefinito: `false`*


### `hide_gradebook_percentage_user_result`

**Nascondi la percentuale nei risultati migliore/media del gradebook**

Rimuove la visualizzazione della percentuale dai risultati del punteggio migliore/medio mostrati agli studenti nel gradebook.

*Predefinito: `true`*


### `my_display_coloring`

**Mostra i colori per i punteggi nel gradebook**

Abilita la codifica a colori per una migliore visibilità dei punteggi nel gradebook.

*Predefinito: `false`*


### `student_publication_to_take_in_gradebook`

**Compito considerato per il gradebook**

Nello strumento dei compiti, gli studenti possono caricare più di un file. Nel caso in cui ve ne sia più di uno per un singolo compito, quale dovrebbe essere considerato per la classificazione nel gradebook? Dipende dalla vostra metodologia. Usare 'first' per mettere l'accento sull'attenzione ai dettagli (come la consegna in tempo e la consegna del lavoro corretto per primo). Usare 'last' per evidenziare il lavoro collaborativo e adattivo.

*Predefinito: `first`*


### `teachers_can_change_grade_model_settings`

**I docenti possono modificare le impostazioni del modello del Gradebook**

Durante la modifica di un Gradebook

*Predefinito: `true`*


### `teachers_can_change_score_settings`

**I docenti possono modificare le impostazioni del punteggio del Gradebook**

Durante la modifica delle impostazioni del Gradebook

*Predefinito: `true`*