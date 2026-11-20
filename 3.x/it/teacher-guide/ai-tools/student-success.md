# Coach IA per il successo degli studenti

Il **Coach IA per il successo degli studenti** aiuta il docente a trasformare l'attività del corso in raccomandazioni pratiche per un singolo studente. È disponibile dall'elenco degli studenti nell'area di reportistica del corso quando gli assistenti IA e la funzionalità **Analizzatore del corso** sono abilitati per quel corso.

> La piattaforma deve avere almeno un fornitore di IA testuale configurato. Vedere [Configurazione IA](../../admin-guide/integrations/ai-configuration.md). Le impostazioni pertinenti della piattaforma sono `ai_helpers.enable_ai_helpers` e `ai_helpers.course_analyser` in **Amministrazione > Impostazioni di configurazione > Assistenti IA**.

## Generazione di una raccomandazione

1. Aprire l'area di reportistica del corso e visualizzare l'**Elenco degli studenti**.
2. Individuare lo studente e fare clic sull'azione **Coach IA per il successo degli studenti**.
3. Se sono disponibili più fornitori di IA, selezionarne uno.
4. Facoltativamente, inserire **Istruzioni aggiuntive per il coach IA**. Consentono di aggiungere un contesto didattico o di chiedere al coach di concentrarsi su una difficoltà specifica.
5. Fare clic su **Analizza l'apprendimento dell'utente**.

Chamilo prepara innanzitutto o riutilizza un'analisi del corso, quindi analizza l'attività dello studente nel contesto del corso corrente o della sessione di corso.

## Contenuto della raccomandazione

Il risultato può includere:

* una sintesi complessiva concisa;
* **Azioni prioritarie**;
* **Attività aggiuntive** suggerite;
* raccomandazioni sul **Ritmo** e sulla progressione;
* **Metodologie di apprendimento** alternative;
* altre raccomandazioni, se pertinenti;
* collegamenti di **Evidenza** tratti dal catalogo approvato di fonti pedagogiche per la lingua del corso.

La raccomandazione viene memorizzata in Chamilo per quello studente e quel contesto di corso. Chamilo salva inoltre una copia nella Posta in arrivo del docente quando la creazione del messaggio ha esito positivo, in modo che possa essere consultata in seguito.

## Privacy

Prima dell'avvio dell'analisi, Chamilo visualizza un avviso sulla privacy. Gli identificatori diretti del profilo vengono omessi dal payload dello studente inviato al fornitore di IA e all'IA viene indicato di non identificare lo studente né di inferire caratteristiche sensibili. Tuttavia, l'attività di apprendimento e i contenuti del corso possono ancora contenere informazioni che potrebbero identificare indirettamente qualcuno. Prima di utilizzare la funzionalità, seguire la politica sull'IA e sulla privacy della propria organizzazione.

La stessa analisi del Coach IA per il successo degli studenti è disponibile anche per i client MCP autorizzati tramite lo strumento `generate_student_success_feedback`; riutilizza lo stesso flusso di analisi filtrato per la privacy.