# Configurazione AI

Chamilo 3.0 include funzionalità basate sull'intelligenza artificiale che richiedono una configurazione prima di essere disponibili per docenti e studenti.

## Provider AI supportati

Chamilo supporta più provider AI:

| Provider | Capacità |
|----------|-------------|
| **DeepSeek** | Generazione di testo |
| **Google Gemini** | Generazione di testo, immagini e video |
| **Grok** | Generazione di testo, immagini e video |
| **Mistral** | Generazione di testo |
| **OpenAI** | Generazione di testo, immagini e video |

Ogni provider può essere configurato per diversi tipi di attività AI:

* **Testo** — Utilizzato per la generazione di esercizi, la generazione di percorsi di apprendimento, la valutazione AI e il tutor AI
* **Immagine** — Utilizzato per la generazione di immagini AI
* **Video** — Utilizzato per la generazione di video AI (ove supportato)
* **Documento** — Utilizzato per l'analisi di documenti AI

## Passaggi di configurazione

### 1. Ottenere le chiavi API

Registrare un account presso il provider AI scelto e ottenere una chiave API:

* **DeepSeek**: [platform.deepseek.com](https://platform.deepseek.com/)
* **Google Gemini**: Google AI Studio o Google Cloud
* **Grok**: [console.x.ai](https://console.x.ai/)
* **Mistral**: [console.mistral.ai](https://console.mistral.ai/)
* **OpenAI**: [platform.openai.com](https://platform.openai.com/)

### 2. Configurare i provider in Chamilo

![La pagina di configurazione degli AI helpers che mostra le impostazioni del provider con i campi chiave API, modello ed endpoint](/.gitbook/assets/admin-ai-helpers-config.png)

Nelle impostazioni della piattaforma, accedere alla sezione **AI Helpers**:

1. **Abilitare gli AI helpers** — Attivare globalmente le funzionalità AI
2. **Configurare i provider AI** — Aggiungere uno o più provider con:
   * **Nome del provider** (deepseek, gemini, grok, mistral, openai)
   * **Chiave API** — La chiave API del provider
   * **Modello** — Il modello specifico da utilizzare (ad es. `gpt-4`, `gemini-pro`, `mistral-large`)
   * **URL API** — L'URL dell'endpoint (preconfigurato per i provider standard)

È possibile configurare più provider. Il primo provider nella configurazione diventa quello predefinito.

### 3. Abilitare le funzionalità per corso

Le funzionalità AI possono essere abilitate o disabilitate a livello di corso. I docenti possono attivare o disattivare:

* **Chatbot tutor AI** — L'assistente AI per gli studenti
* **Valutatore dei compiti** — Raccomandazione di valutazione generata dall'AI
* **Generatore di esercizi** — Domande di quiz generate dall'AI
* **Generatore di percorsi di apprendimento** — Sequenze di apprendimento generate dall'AI
* **Generatore di immagini/video** — Immagini e video generati dall'AI nei documenti

Ciò consente a corsi diversi di utilizzare configurazioni AI diverse in base alle proprie esigenze.

## Considerazioni sui costi

Le chiamate API AI comportano dei costi. Si consideri di:

* **Impostare limiti di utilizzo** — Monitorare e limitare l'utilizzo delle API AI per controllare i costi
* **Scegliere i modelli con attenzione** — Modelli più piccoli e meno costosi possono essere sufficienti per molte attività didattiche
* **Tracciare l'utilizzo** — Chamilo registra le richieste AI per aiutare a monitorare i consumi

## Consigli

* **Iniziare con un solo provider** — Configurare e testare un provider prima di aggiungerne altri
* **Testare con un corso** — Abilitare prima le funzionalità AI in un corso di prova per verificare che funzionino come previsto
* **Comunicare con i docenti** — Informare i docenti su quali funzionalità AI sono disponibili e su come utilizzarle
* **Monitorare la qualità** — Esaminare periodicamente i contenuti generati dall'AI per assicurarsi che rispettino gli standard didattici