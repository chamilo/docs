# Impostazioni degli AI Helper

Configurazione degli AI helper (generazione di testo, generazione di immagini, generazione di video, tutor IA, valutazione IA). Ogni provider può essere abilitato per tipo di attività. Vedere anche [Configurazione IA](../integrations/ai-configuration.md).

Accedere a queste impostazioni in **Amministrazione > Impostazioni di configurazione > AI Helpers**. Questa categoria contiene **14 impostazioni**, elencate di seguito con il titolo e il commento forniti nei fixture delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è indicato in monospazio. Utilizzarlo per gli script tramite API o quando è necessario modificare tali impostazioni a livello globale modificando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `ai_providers`

**Dati di connessione dei provider IA**

Dati di configurazione per connettersi ai servizi IA esterni.

### `content_analyser`

**Analizzatore di contenuti**

Analizza i materiali didattici per estrarre approfondimenti o migliorarne la qualità.

*Predefinito: `false`*

### `course_analyser`

**Analizzatore di corsi**

Analizza tutte le risorse di uno o più corsi e preaddestra il modello IA a rispondere a qualsiasi domanda su questo o questi corsi (assicurarsi che i contenuti possano essere condivisi con i servizi IA configurati).

*Predefinito: `false`*

### `disclose_ai_assistance`

**Dichiarare l'assistenza IA**

Mostra un'etichetta su qualsiasi contenuto o feedback generato o co-generato da un sistema IA, evidenziando all'utente che il contenuto è stato realizzato con l'aiuto di un sistema IA. I dettagli su quale sistema IA è stato usato in ciascun caso sono conservati nel database per audit, ma non sono direttamente accessibili all'utente finale.

*Predefinito: `true`*

### `enable_ai_helpers`

**Abilitare lo strumento AI helper**

Abilita tutte le funzionalità basate su IA disponibili nella piattaforma.

*Predefinito: `false`*

### `exercise_generator`

**Generatore di esercizi**

Genera test personalizzati con l'IA sulla base dei contenuti del corso.

*Predefinito: `false`*

### `glossary_terms_generator`

**Generatore di termini del glossario**

Consente ai docenti di richiedere termini di glossario generati dall'IA nel proprio corso. Verranno generati 20 termini in base al titolo del corso e alla descrizione generale nello strumento descrizione del corso. Se usato più di una volta, escluderà i termini già presenti in quel glossario (assicurarsi che i contenuti possano essere condivisi con i servizi IA configurati).

*Predefinito: `false`*

### `image_generator`

**Generatore di immagini**

Genera immagini basate su prompt o contenuti utilizzando l'IA.

*Predefinito: `false`*

### `learning_path_generator`

**Generatore di percorsi di apprendimento**

Genera percorsi di apprendimento personalizzati utilizzando i suggerimenti dell'IA.

*Predefinito: `false`*

### `open_answers_grader`

**Valutatore di risposte aperte**

Valuta automaticamente le risposte aperte utilizzando l'IA.

*Predefinito: `false`*

### `task_grader`

**Valutatore dei compiti**

Utilizza l'IA per valutare e assegnare un voto ai compiti caricati.

*Predefinito: `false`*

### `tutor_chatbot`

**Chatbot tutor alimentato da IA**

Fornisce agli studenti un assistente di tutoraggio basato su IA.

*Predefinito: `false`*

### `video_generator`

**Generatore di video**

Genera video basati su prompt o contenuti utilizzando l'IA (ciò potrebbe consumare molti token).

*Predefinito: `false`*

### `wysiwyg_translation_all_languages` **v3**

**Consentire la traduzione IA in tutte le lingue attive negli editor WYSIWYG**

Consente ai docenti di generare traduzioni per tutte le lingue attive della piattaforma in un'unica azione WYSIWYG. Ciò può consumare un gran numero di token IA.

*Predefinito: `true`*