# Automazione del corso (attivazioni manuali)

La sezione **Automazione** dei report del corso consente ai docenti autorizzati di configurare azioni per l'inizio e la fine di un corso. Nell'implementazione attuale di Chamilo 3.1, le azioni vengono **attivate manualmente**: non si deve presumere che vengano eseguite automaticamente in una data del calendario o tramite cron.

## Configurare le azioni

1. Aprire un corso come docente o come altro utente autorizzato a gestire i report del corso.
2. Aprire **Report** e individuare la sezione **Automazione**.
3. Selezionare l'evento (**Il corso si apre ora** o **Il corso termina ora**) e un tipo di azione.
4. Indicare la destinazione richiesta da tale azione, quindi selezionare **Aggiungi azione**.
5. Esaminare l'elenco **Azioni configurate**; rimuovere una voce indesiderata con la relativa azione **Elimina**.

Le azioni supportate includono la pubblicazione o l'occultamento delle risorse del corso, l'invio di inviti ai sondaggi, il rilascio di certificati esistenti e la modifica della visibilità del corso. Le risorse disponibili, i sondaggi, le opzioni del Gradebook e i valori di visibilità dipendono dal corso e dalle autorizzazioni dell'utente corrente.

## Eseguire l'evento configurato

Scegliere **Il corso si apre ora** o **Il corso termina ora** e confermare l'operazione. Verificare il risultato segnalato. Chamilo tiene traccia delle esecuzioni completate, impedisce le configurazioni duplicate e ignora le azioni già completate con successo nelle esecuzioni successive. Un secondo clic non deve essere considerato un modo per reinviare un'azione già completata.

Per il rilascio dei certificati, preparare e testare prima il certificato pertinente. Per gli inviti ai sondaggi, verificare che il sondaggio sia configurato e che i discenti previsti appartengano al contesto del corso o della sessione corrente.

## Limitazioni importanti

- Questa interfaccia fornisce l'**esecuzione manuale**, non l'automazione pianificata.
- Le azioni operano nel contesto del corso/sessione corrente; verificare accessi e destinazioni per entrambi i contesti, ove applicabile.
- Le azioni completate con successo non vengono ripetute automaticamente nelle esecuzioni successive.
- Al momento della PR della funzionalità, il rilascio dei certificati, le modifiche della visibilità del corso e l'esecuzione specifica per sessione erano stati sottoposti a revisione del codice, ma non verificati funzionalmente in quella PR. Testarli sulla propria installazione prima di farvi affidamento a livello operativo.

Vedere [Report del corso](course-reports.md) e [Certificati e competenze](certificates-and-skills.md). Implementazione: [PR #9464](https://github.com/chamilo/chamilo-lms/pull/9464).