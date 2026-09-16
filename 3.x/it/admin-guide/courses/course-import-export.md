# Importazione ed esportazione dei corsi

Chamilo supporta l'importazione e l'esportazione dei corsi per scopi di backup, migrazione e condivisione dei contenuti.

Queste funzionalità si trovano all'interno del corso, nello strumento **Manutenzione** accessibile dall'icona a forma di ingranaggio in alto nella homepage del corso.

## Esportazione di un corso

I docenti possono esportare i propri corsi dallo strumento Manutenzione del corso. Come amministratore, è possibile esportare qualsiasi corso:

1. Accedere al corso
2. Accedere allo strumento **Manutenzione del corso**
3. Selezionare **Crea un backup**
4. Scegliere cosa includere (contenuti, dati utente, ecc.)
5. Scaricare il file di esportazione

L'esportazione crea un pacchetto contenente i documenti del corso, gli esercizi, i forum, i percorsi formativi e la configurazione.

## Importazione di un corso

Per importare un corso da un file di esportazione Chamilo:

1. Accedere al corso
2. Accedere allo strumento **Manutenzione del corso**
3. Nella sezione **Importa backup**, caricare il file di esportazione
4. Scegliere cosa includere (contenuti, dati utente, ecc.)
5. Configurare le opzioni di importazione:
   * Se sovrascrivere i contenuti esistenti
   * Se includere i dati utente
6. Eseguire l'importazione

## Copia di un corso

Per copiare i contenuti da un altro corso nel proprio corso, è necessario che esistano già un corso di origine e un corso di destinazione.

1. Accedere al corso di destinazione
2. Accedere allo strumento **Manutenzione del corso**
3. Nella sezione **Copia corso**, selezionare il corso **Origine**
4. Convalidare le opzioni
5. Fare clic su **Continua** e seguire le istruzioni

## Common Cartridge

Chamilo supporta lo standard **IMS Common Cartridge 1.3** (IMS CC 1.3) per l'interoperabilità con altri sistemi di gestione dell'apprendimento. È possibile:

* **Importare** pacchetti Common Cartridge (file .imscc)
* **Esportare** i contenuti del corso in formato Common Cartridge

Ciò consente lo scambio di contenuti con altre piattaforme che supportano lo standard Common Cartridge (Moodle, Canvas, Blackboard, ecc.).

## Riciclo di un corso

La funzione di riciclo del corso consente semplicemente di mantenere l'involucro del corso ma di cancellarne i contenuti.

## Eliminazione di un corso

Questa operazione cancella completamente il corso, inclusi tutti i suoi contenuti e l'attività degli utenti al suo interno.

Per eliminare un corso in modo permanente:

1. Accedere al corso di destinazione
2. Accedere allo strumento **Manutenzione del corso**
3. Nella sezione **Elimina completamente questo corso**, inserire manualmente il codice del corso per confermare l'intenzione
4. Convalidare

Si viene quindi reindirizzati alla homepage del portale, perché il corso non esiste più.

## Importazione da Moodle

Chamilo può importare i backup dei corsi da **Moodle**. L'importatore converte la struttura dei contenuti di Moodle nel formato di Chamilo, inclusi quiz, documenti e impostazioni del corso.

> **Lavoro in corso.** Sebbene copra già una base ampia, l'importatore Moodle non copre attualmente ogni tipo di attività e formato di contenuto di Moodle. Trattarlo come un punto di partenza che potrebbe ancora richiedere un adattamento manuale dopo il completamento dell'importazione. Se si rileva un elemento mancante o non funzionante nell'importazione o nell'esportazione, segnalarlo tramite il nostro [spazio Github](https://github.com/chamilo/chamilo-lms/issues) facendo clic su **New issue** in alto e fornendo il maggior numero possibile di dettagli (incluso il backup del corso stesso, se non è riservato).

## Consigli

* **Backup regolari** — Incoraggiare i docenti a esportare periodicamente i propri corsi come backup
* **Provare le importazioni** — Quando si importano contenuti da un'altra piattaforma, provare prima l'importazione in un corso di prova per verificare che tutto sia stato trasferito correttamente
* **Portabilità dei contenuti** — Usare il formato Common Cartridge quando è necessario condividere contenuti con altre piattaforme LMS