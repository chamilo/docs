# Attività Hot Potatoes

Chamilo 3.1 supporta l'importazione di attività HTML di Hot Potatoes nello strumento Esercizi moderno e l'utilizzo di singole attività all'interno dei Percorsi di apprendimento.

## Importare un'attività

1. Aprire lo strumento **Esercizi** del corso e andare su **Hot Potatoes**.
2. In **Importa Hot Potatoes**, selezionare un pacchetto **ZIP** di Hot Potatoes o un'esportazione **HTML** autonoma.
3. Quando un'attività dipende da immagini collegate, contenuti multimediali o altri file, includere tali risorse nello ZIP.
4. Selezionare **Importa** e verificare che l'attività importata si apra e venga visualizzata correttamente.

## Gestire e riutilizzare le attività

Dall'elenco Hot Potatoes, usare **Apri** per visualizzare l'anteprima dell'attività, **Modifica** per cambiarne il titolo, **Pubblica** o **Nascondi** per controllare la visibilità e **Elimina** per rimuoverla quando consentito. Il generatore di Percorsi di apprendimento può includere singole attività Hot Potatoes tra le proprie risorse.

## Esaminare i tentativi dei discenti

L'azione **Tentativi** mostra i tentativi tracciati per la revisione da parte del docente. I docenti possono assegnare un punteggio percentuale revisionato da 0 a 100. La schermata mostra attualmente fino agli ultimi 100 tentativi. Utilizzare il risultato effettivamente visualizzato dell'attività come evidenza di supporto nella valutazione di un discente.

**La valutazione automatica e la sincronizzazione con il registro delle valutazioni (Gradebook) non sono implementate.** I punteggi mostrati dal pacchetto Hot Potatoes stesso non devono essere considerati voti verificati lato server. I risultati revisionati dal docente sono memorizzati separatamente.

## Risoluzione dei problemi

Se i contenuti multimediali mancano, riesportare l'attività includendo tutte le risorse collegate nel relativo ZIP. Se un'esportazione HTML funziona su un computer locale ma non in Chamilo, verificare la presenza di riferimenti a file esterni o di contenuti incorporati incompatibili. Verificare la visibilità dell'attività sia con un account studente sia con un account docente.

Vedere [Esercizi](exercises.md) e [Percorsi di apprendimento](../adding-content/learning-paths.md). Implementazione: [PR #9380](https://github.com/chamilo/chamilo-lms/pull/9380).