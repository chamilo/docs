# Impostazioni degli Assistenti AI

Configurazione degli assistenti AI (generazione di testo, generazione di immagini, generazione di video, tutor AI, valutazione AI). Ogni provider può essere abilitato per tipo di attività. Consulta anche [Configurazione AI](../integrations/ai-configuration.md).

Accedi a queste impostazioni tramite **Amministrazione > Impostazioni di configurazione > Assistenti AI**. Questa categoria contiene **13 impostazioni**, elencate di seguito con il titolo e il commento forniti nei dati di configurazione della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospace. Utilizzalo quando esegui script tramite l'API o quando devi modificare queste impostazioni a livello globale editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `ai_providers`

**Dati di connessione dei provider AI**

Dati di configurazione per connettersi con servizi AI esterni.

### `content_analyser`

**Analizzatore di contenuti**

Analizza i materiali didattici per estrarre informazioni o migliorare la qualità.

*Predefinito: `false`*

### `course_analyser`

**Analizzatore di corsi**

Analizza tutte le risorse in uno o più corsi e pre-addestra il modello AI per rispondere a qualsiasi domanda su questo o questi corsi (assicurati che i contenuti possano essere condivisi con i servizi AI configurati).

*Predefinito: `false`*

### `disclose_ai_assistance`

**Rivelare assistenza AI**

Mostra un'etichetta su qualsiasi contenuto o feedback generato o co-generato da un sistema AI, evidenziando all'utente che il contenuto è stato creato con l'aiuto di un sistema AI. I dettagli su quale sistema AI è stato utilizzato in ciascun caso sono conservati nel database per scopi di audit, ma non sono direttamente accessibili all'utente finale.

*Predefinito: `true`*

### `enable_ai_helpers`

**Abilita lo strumento assistente AI**

Abilita tutte le funzionalità alimentate da AI disponibili nella piattaforma.

*Predefinito: `false`*

### `exercise_generator`

**Generatore di esercizi**

Genera test personalizzati con AI basati sul contenuto del corso.

*Predefinito: `false`*

### `glossary_terms_generator`

**Generatore di termini del glossario**

Consente agli insegnanti di richiedere termini del glossario generati da AI nel loro corso. Questo genererà 20 termini basati sul titolo del corso e sulla descrizione generale nello strumento di descrizione del corso. Se utilizzato più volte, escluderà i termini già presenti in quel glossario (assicurati che i contenuti possano essere condivisi con i servizi AI configurati).

*Predefinito: `false`*

### `image_generator`

**Generatore di immagini**

Genera immagini basate su prompt o contenuti utilizzando AI.

*Predefinito: `false`*

### `learning_path_generator`

**Generatore di percorsi di apprendimento**

Genera percorsi di apprendimento personalizzati utilizzando suggerimenti AI.

*Predefinito: `false`*

### `open_answers_grader`

**Valutatore di risposte aperte**

Valuta automaticamente le risposte aperte utilizzando AI.

*Predefinito: `false`*

### `task_grader`

**Valutatore di compiti**

Utilizza AI per valutare e assegnare un punteggio ai compiti caricati.

*Predefinito: `false`*

### `tutor_chatbot`

**Chatbot tutor potenziato da AI**

Fornisce agli studenti un assistente tutor alimentato da AI.

*Predefinito: `false`*

### `video_generator`

**Generatore di video**

Genera video basati su prompt o contenuti utilizzando AI (questo potrebbe consumare molti token).

*Predefinito: `false`*