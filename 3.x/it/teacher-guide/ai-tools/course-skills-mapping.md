# Mappatura delle competenze del corso assistita dall'IA

Chamilo 3.1 può suggerire competenze associate a un corso e consentire agli utenti autorizzati di esaminare e applicare tali suggerimenti al referenziale delle competenze e al Gradebook. Un suggerimento dell'IA **non viene applicato automaticamente**; deve essere selezionato e approvato.

## Generare i suggerimenti

1. Aprire la pagina **Mappatura delle competenze assistita dall'IA** del corso pertinente. Il percorso dell'applicazione è `/course/{courseId}/skills`, sostituendo `{courseId}` con l'ID effettivo del corso.
2. Se il corso fa parte di una sessione, aprire la pagina nel contesto di sessione corretto.
3. Scegliere un **fornitore di IA** disponibile.
4. Selezionare **Suggerisci competenze per questo corso** ed esaminare i risultati restituiti.

I fornitori di IA devono essere disponibili e configurati dall'amministrazione della piattaforma. I suggerimenti possono fare riferimento a voci di **Competenza esistente** oppure raccomandare una **Nuova competenza** sotto una competenza padre. Ogni voce può includere la descrizione, i criteri e una spiegazione del suggerimento.

## Esaminare e approvare

1. Leggere criticamente ogni suggerimento e confrontarlo con gli obiettivi e i contenuti del corso.
2. Selezionare solo le competenze valide tramite le relative caselle di controllo.
3. Se si dispone dell'autorizzazione richiesta, scegliere **Aggiungi le competenze selezionate al referenziale e al Gradebook**.
4. Verificare nel corso le competenze risultanti e le associazioni con il Gradebook.

Gli utenti privi di privilegi di assegnazione possono esaminare i suggerimenti ma non possono associarli. La creazione di nuove competenze richiede i permessi di amministratore della piattaforma. I suggerimenti possono scadere; generare un nuovo insieme se l'applicazione segnala che quelli precedenti non sono più validi.

## Buone pratiche

Le competenze generate dall'IA sono candidati, non requisiti curriculari autorevoli. Prima dell'approvazione, rivedere la formulazione, le duplicazioni, il posizionamento rispetto alla competenza padre e i criteri. Evitare di inserire informazioni riservate sugli studenti nei prompt dell'IA.

Vedere [Competenze e valutazioni](../../admin-guide/skills/skills-assessments.md) e [Toolbox IA](toolbox-ai.md). Implementazione: [PR #9409](https://github.com/chamilo/chamilo-lms/pull/9409).