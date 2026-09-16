# Importazione ed Esportazione dei Corsi

Chamilo supporta l'importazione e l'esportazione dei corsi per scopi di backup, migrazione e condivisione dei contenuti.

Queste funzionalità si trovano all'interno del corso, nello strumento **Manutenzione** situato sotto l'icona dell'ingranaggio nella parte superiore della homepage del corso.

## Esportazione di un Corso

Gli insegnanti possono esportare i propri corsi dallo strumento di manutenzione del corso. Come amministratore, puoi esportare qualsiasi corso:

1. Accedi al corso
2. Accedi allo strumento **Manutenzione del corso**
3. Seleziona **Crea un backup**
4. Scegli cosa includere (contenuti, dati degli utenti, ecc.)
5. Scarica il file di esportazione

L'esportazione crea un pacchetto contenente i documenti del corso, gli esercizi, i forum, i percorsi di apprendimento e la configurazione.

## Importazione di un Corso

Per importare un corso da un file di esportazione di Chamilo:

1. Accedi al corso
2. Accedi allo strumento **Manutenzione del corso**
3. Nella sezione **Importa backup**, carica il file di esportazione
4. Scegli cosa includere (contenuti, dati degli utenti, ecc.)
5. Configura le opzioni di importazione:
   * Se sovrascrivere i contenuti esistenti
   * Se includere i dati degli utenti
6. Esegui l'importazione

## Copia di un Corso

Per copiare i contenuti da un altro corso nel tuo corso, è necessario che siano stati creati prima un corso di origine e un corso di destinazione.

1. Accedi al corso di destinazione
2. Accedi allo strumento **Manutenzione del corso**
3. Nella sezione **Copia corso**, seleziona il corso **Origine**
4. Convalida le opzioni
5. Fai clic su **Continua** e segui le istruzioni

## Common Cartridge

Chamilo supporta lo standard **IMS Common Cartridge 1.3** (IMS CC 1.3) per l'interoperabilità con altri sistemi di gestione dell'apprendimento. Puoi:

* **Importare** pacchetti Common Cartridge (file .imscc)
* **Esportare** i contenuti del corso in formato Common Cartridge

Questo consente lo scambio di contenuti con altre piattaforme che supportano lo standard Common Cartridge (Moodle, Canvas, Blackboard, ecc.).

## Riciclo di un Corso

La funzionalità di riciclo del corso ti permette semplicemente di mantenere la struttura del corso ma di cancellarne i contenuti.

## Eliminazione di un Corso

Questo eliminerà completamente il tuo corso, inclusi tutti i suoi contenuti e l'attività degli utenti al suo interno.

Per eliminare un corso in modo permanente:

1. Accedi al corso di destinazione
2. Accedi allo strumento **Manutenzione del corso**
3. Nella sezione **Elimina completamente questo corso**, inserisci manualmente il codice del corso per confermare la tua intenzione
4. Convalida

Verrai quindi reindirizzato alla homepage del portale, poiché il corso non esiste più.

## Importazione da Moodle

Chamilo può importare backup di corsi da **Moodle**. L'importatore converte la struttura dei contenuti di Moodle nel formato di Chamilo, inclusi quiz, documenti e impostazioni del corso.

> **Lavoro in corso.** Sebbene copra già una vasta gamma di elementi, l'importatore di Moodle non include attualmente ogni tipo di attività e formato di contenuto di Moodle. Consideralo come un punto di partenza che potrebbe richiedere ancora aggiustamenti manuali dopo il completamento dell'importazione. Se rilevi elementi mancanti o non funzionanti nell'importazione o nell'esportazione, ti preghiamo di segnalarcelo attraverso il nostro [spazio Github](https://github.com/chamilo/chamilo-lms/issues) facendo clic su **New issue** in alto e fornendo il maggior numero di dettagli possibile (incluso il backup del corso stesso, se non è confidenziale).

## Consigli

* **Backup regolari** — Incoraggia gli insegnanti a esportare periodicamente i loro corsi come backup
* **Test di importazione** — Quando importi contenuti da un'altra piattaforma, testa l'importazione in un corso di prova per verificare che tutto sia stato trasferito correttamente
* **Portabilità dei contenuti** — Usa il formato Common Cartridge quando devi condividere contenuti con altre piattaforme LMS