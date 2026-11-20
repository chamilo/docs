# Modelli di sondaggio

Gli amministratori possono creare questionari di sondaggio riutilizzabili e offrirli ai docenti oppure assegnarli direttamente a corsi e sessioni. Questa funzionalità è stata implementata nella [PR #9208](https://github.com/chamilo/chamilo-lms/pull/9208) per la [issue #8760](https://github.com/chamilo/chamilo-lms/issues/8760).

## Creare e gestire i modelli

1. Nel pannello di amministrazione, aprire **Modelli di sondaggio** e scegliere **Crea**.
2. Inserire un titolo e un sottotitolo facoltativo; configurare l'anonimato, la disposizione delle domande, il mescolamento, la durata, il testo introduttivo e il testo di ringraziamento.
3. Salvare e aggiungere o modificare le domande riutilizzabili nell'editor delle domande del modello.
4. Abilitare **Visibile come modello** se i docenti devono poterlo vedere e riutilizzare. Un modello non visibile resta disponibile per l'amministratore.

I modelli appartengono all'URL di accesso corrente. Solo gli amministratori della piattaforma possono creare, modificare o eliminare il modello principale. I docenti possono utilizzare i modelli visibili, ma non possono modificarne la definizione principale.

## Riutilizzare un modello in un corso o in una sessione

In un corso o in una sessione autorizzati, un docente può scegliere un modello visibile quando crea un nuovo sondaggio. Il risultato è un sondaggio nel contesto di quel corso, non una modifica del modello principale riutilizzabile. Il docente può rivedere le domande e seguire il consueto flusso di pubblicazione e invito.

Dall'elenco dei modelli in amministrazione, un amministratore può invece assegnare un modello direttamente a un **corso** selezionato e, facoltativamente, a una delle **sessioni** di quel corso. Chamilo verifica che il corso appartenga al portale corrente e che la sessione selezionata contenga effettivamente il corso. L'interfaccia docente non può essere utilizzata per assegnare un modello al corso o alla sessione di un altro utente.

Il nuovo sondaggio non viene pubblicato automaticamente solo perché è stato creato da un modello; rivederlo prima di invitare i partecipanti. Consultare [Sondaggi](../teacher-guide/assessing-learners/surveys.md) per il flusso di lavoro standard dei sondaggi.

## Nascondere i risultati sensibili a docenti o tutor

Durante la modifica di un sondaggio effettivo, un amministratore della piattaforma può abilitare **Risultati nascosti a docente/tutor**. Questa restrizione per singolo sondaggio è destinata a questionari sensibili, come le valutazioni del personale docente. Docenti e tutor possono comunque consultare il numero di risposte e inviare promemoria, ma **non possono aprire le viste di report né esportare i risultati**. Gli amministratori della piattaforma mantengono l'accesso ai report, nel rispetto delle altre impostazioni della piattaforma.

Questa opzione differisce dal normale campo **Visibilità dei risultati** e dall'impostazione a livello di piattaforma **Nascondi pulsante di report dei sondaggi**. Solo un amministratore può modificare il flag dei risultati riservati.

## Autorizzazioni e ambito

* **Amministratore:** gestire i modelli, impostare la visibilità dei modelli, assegnarli a corsi/sessioni idonei e controllare l'accesso ai risultati riservati.
* **Docente / docente di sessione:** visualizzare e istanziare solo i modelli visibili nel proprio contesto di corso autorizzato.
* **URL di accesso:** il catalogo dei modelli e l'assegnazione applicano l'URL di accesso corrente; i modelli di altri portali non possono essere istanziati oltre tale confine.

Se i modelli non compaiono ai docenti, verificare **Visibile come modello** e il relativo contesto di corso/sessione. Se un modello non può essere istanziato, verificare le restrizioni globali alla creazione dei sondaggi e il corso/sessione di destinazione previsto.