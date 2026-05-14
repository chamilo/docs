# Configurazione dell'IA

Chamilo 2.0 include funzionalità basate sull'intelligenza artificiale che richiedono una configurazione prima di essere disponibili per insegnanti e studenti.

## Fornitori di IA Supportati

Chamilo supporta diversi fornitori di IA:

| Fornitore | Capacità |
|-----------|----------|
| **DeepSeek** | Generazione di testo |
| **Google Gemini** | Generazione di testo, immagini, video |
| **Grok** | Generazione di testo, immagini, video |
| **Mistral** | Generazione di testo |
| **OpenAI** | Generazione di testo, immagini, video |

Ogni fornitore può essere configurato per diversi tipi di attività di IA:

* **Testo** — Utilizzato per la generazione di esercizi, la creazione di percorsi di apprendimento, la valutazione con IA e il tutor IA
* **Immagine** — Utilizzato per la generazione di immagini con IA
* **Video** — Utilizzato per la generazione di video con IA (dove supportato)
* **Documento** — Utilizzato per l'analisi di documenti con IA

## Passaggi per la Configurazione

### 1. Ottenere le Chiavi API

Registrati per un account presso il fornitore di IA scelto e ottieni una chiave API:

* **DeepSeek**: [platform.deepseek.com](https://platform.deepseek.com/)
* **Google Gemini**: Google AI Studio o Google Cloud
* **Grok**: [console.x.ai](https://console.x.ai/)
* **Mistral**: [console.mistral.ai](https://console.mistral.ai/)
* **OpenAI**: [platform.openai.com](https://platform.openai.com/)

### 2. Configurare i Fornitori in Chamilo

![La pagina di configurazione degli assistenti IA che mostra le impostazioni del fornitore con i campi per chiave API, modello e endpoint](/.gitbook/assets/admin-ai-helpers-config.png)

Nelle impostazioni della piattaforma, vai alla sezione **AI Helpers**:

1. **Abilita gli assistenti IA** — Attiva le funzionalità IA a livello globale
2. **Configura i fornitori di IA** — Aggiungi uno o più fornitori con:
   * **Nome del fornitore** (deepseek, gemini, grok, mistral, openai)
   * **Chiave API** — La tua chiave API per il fornitore
   * **Modello** — Il modello specifico da utilizzare (ad esempio, `gpt-4`, `gemini-pro`, `mistral-large`)
   * **URL API** — L'URL dell'endpoint (preconfigurato per i fornitori standard)

Puoi configurare più fornitori. Il primo fornitore nella configurazione diventa quello predefinito.

### 3. Abilitare le Funzionalità per Corso

Le funzionalità IA possono essere abilitate o disabilitate a livello di corso. Gli insegnanti possono attivare o disattivare:

* **Chatbot Tutor IA** — L'assistente IA per gli studenti
* **Valutatore di compiti** — Raccomandazione di valutazione generata dall'IA
* **Generatore di esercizi** — Domande di quiz generate dall'IA
* **Generatore di percorsi di apprendimento** — Sequenze di apprendimento generate dall'IA
* **Generatore di immagini/video** — Immagini e video generati dall'IA nei documenti

Questo consente a diversi corsi di utilizzare configurazioni IA differenti in base alle loro esigenze.

## Considerazioni sui Costi

Le chiamate API IA comportano costi associati. Considera:

* **Impostare limiti di utilizzo** — Monitora e limita l'uso dell'API IA per controllare i costi
* **Scegliere i modelli con attenzione** — Modelli più piccoli e meno costosi possono essere sufficienti per molte attività educative
* **Monitorare l'utilizzo** — Chamilo registra le richieste IA per aiutarti a monitorare il consumo

## Suggerimenti

* **Inizia con un solo fornitore** — Configura e testa un fornitore prima di aggiungerne altri
* **Prova con un corso** — Abilita le funzionalità IA in un corso di prova per verificare che funzionino come previsto
* **Comunica con gli insegnanti** — Informa gli insegnanti su quali funzionalità IA sono disponibili e su come utilizzarle
* **Monitora la qualità** — Rivedi regolarmente i contenuti generati dall'IA per assicurarti che soddisfino i tuoi standard educativi