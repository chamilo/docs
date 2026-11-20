# Piante dei piani delle sedi e mappe delle aule

Chamilo 3.1 può associare un'immagine della pianta di un piano a una sede e contrassegnare le posizioni delle aule su tale immagine con poligoni interattivi. La funzionalità aiuta i discenti a individuare le aule assegnate; **non** è una mappa geografica GPS.

## Allegare la pianta di un piano della sede

1. Aprire l'area di amministrazione di **Sedi** e modificare la sede desiderata.
2. Individuare il pannello **Pianta del piano**.
3. Scegliere o caricare l'immagine e selezionare **Allega pianta del piano** (oppure **Cambia pianta del piano** se ne esiste già una).
4. Salvare o confermare le modifiche della sede come richiesto, quindi verificare che l'immagine della pianta del piano venga caricata.

Se una pianta non è più valida, usare **Rimuovi pianta del piano** dopo aver verificato quali aule vi fanno riferimento. Caricare solo contenuti attendibili e rispettare le autorizzazioni della schermata di amministrazione delle sedi.

## Delimitare le aule

1. Modificare un'aula assegnata a tale sede.
2. Individuare **Aula sulla pianta del piano** nel modulo dell'aula.
3. Usare lo strumento poligono per tracciare il perimetro dell'aula. Usare **Modifica** per regolare i vertici; tutti i punti devono rimanere all'interno dell'immagine.
4. Selezionare **Salva area dell'aula**, quindi salvare il modulo dell'aula per rendere persistenti le modifiche.
5. Aprire un visualizzatore dell'aula per confermare la posizione corretta. Usare **Cancella area dell'aula** se la mappatura deve essere rimossa.

Un'aula ha un solo poligono modificabile alla volta. La mappatura delle aule è distinta dall'immagine a livello di sede, pertanto l'aggiornamento dell'immagine può richiedere la verifica dei perimetri delle aule esistenti.

## Dove compaiono le mappe

Gli utenti autorizzati possono visualizzare le piante dei piani delle aule quando le aule vengono selezionate o mostrate nelle informazioni del corso, negli eventi del calendario e nei flussi relativi alle presenze. Verificare la visibilità utilizzando i ruoli che visualizzeranno effettivamente le informazioni, in particolare studenti e partecipanti alle sessioni.

Le autorizzazioni di accesso a sedi e aule si applicano anche alle risorse delle piante dei piani. Nelle installazioni multi-URL, verificare il corretto isolamento di portale/sede prima di pubblicare le mappe.

Vedere [Gestione delle aule](managing-rooms.md) e [Ricerca della disponibilità delle aule](room-availability-finder.md). Implementazioni: [PR #9321](https://github.com/chamilo/chamilo-lms/pull/9321), [PR #9451](https://github.com/chamilo/chamilo-lms/pull/9451).