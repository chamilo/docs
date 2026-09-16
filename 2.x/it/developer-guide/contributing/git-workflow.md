# Flusso di lavoro con Git

## Repository

Il codice sorgente di Chamilo è ospitato su GitHub: [github.com/chamilo/chamilo-lms](https://github.com/chamilo/chamilo-lms)

## Ramificazione

* **`master`** — Ramo principale di sviluppo
* I rami delle funzionalità vengono creati da `master` per nuovi sviluppi
* I rami di rilascio vengono creati per le versioni stabili

## Contribuire con una modifica

1. **Fork** del repository su GitHub
2. **Clona** il tuo fork in locale
3. **Crea un ramo** per la tua modifica: `git checkout -b feature/my-feature`
4. **Apporta le tue modifiche** seguendo le convenzioni di codifica
5. **Esegui il commit** con messaggi di commit chiari e descrittivi
6. **Push** al tuo fork: `git push origin feature/my-feature`
7. **Crea una pull request** verso il ramo `master`

## Messaggi di commit

Scrivi messaggi di commit chiari che spieghino **cosa** e **perché**:

```
Glossario: Aggiunta generazione di termini assistita da AI

Gli insegnanti possono ora generare termini del glossario utilizzando i provider AI configurati. Supporta prompt configurabili e conteggio dei termini.
```

### Convenzione del prefisso dello strumento

La riga dell'oggetto è preceduta dal **strumento o area** che la modifica riguarda, seguita da due punti. Utilizziamo una terminologia condivisa breve in modo che il changelog e `git log --oneline` possano essere consultati rapidamente per strumento. Il prefisso è sempre la forma **singolare** del nome canonico dello strumento.

Formato: `<Prefisso>: <Riepilogo imperativo al presente>`

Esempi:

```
Documento: Correzione elenco per la visualizzazione studente
Esercizio: Impedire titoli di domande duplicate all'interno di un quiz
Percorso di apprendimento: Consentire il riordino dei capitoli tramite drag and drop
Interno: Rifattorizzazione dell'idratazione di ResourceNode nel normalizzatore API
CI: Memorizzazione nella cache dei download di Composer nel flusso di lavoro di GitHub Actions
```

Se una modifica riguarda più strumenti, scegli quello più interessato; le modifiche veramente trasversali che toccano solo la struttura del codice (nessuno strumento per l'utente finale) vanno sotto `Interno`. Le modifiche solo alla documentazione (questo sito, il changelog, i docblock inline intesi puramente come riferimento) vanno sotto `Documentazione`.

---
#### Prefissi consentiti

| Prefisso             | Ambito / note                                                                        |
|----------------------|--------------------------------------------------------------------------------------|
| `Admin`              |                                                                                      |
| `Announcement`       |                                                                                      |
| `Attendance`         |                                                                                      |
| `Authentication`     |                                                                                      |
| `Blog`               |                                                                                      |
| `Calendar`           | Non "Agenda"                                                                         |
| `Career`             |                                                                                      |
| `Catalogue`          | Catalogo di corsi e sessioni, inclusi i "corsi in evidenza" sulla homepage          |
| `Chat`               |                                                                                      |
| `CI`                 | Integrazione Continua, test automatizzati, ecc.                                      |
| `Course description` |                                                                                      |
| `Course Progress`    | Non "Avanzamento tematico"                                                           |
| `Course settings`    |                                                                                      |
| `Cron`               |                                                                                      |
| `Dashboard`          |                                                                                      |
| `Display`            |                                                                                      |
| `Document`           |                                                                                      |
| `Documentation`      | Tutto ciò che riguarda esclusivamente la documentazione di Chamilo o del codice, il changelog, ecc. |
| `Dropbox`            |                                                                                      |
| `Exercise`           | Non "Quiz"                                                                           |
| `Extra Fields`       |                                                                                      |
| `Forum`              |                                                                                      |
| `Glossary`           |                                                                                      |
| `Gradebook`          | Include i Certificati                                                                |
| `Group`              | Include gruppi di corso, gruppi globali e classi                                     |
| `Help`               |                                                                                      |
| `Hook`               | Per il meccanismo interno di hook                                                    |
| `Install`            | Include elementi relativi agli aggiornamenti                                         |
| `Internal`           | Per modifiche e correzioni che riguardano principalmente il codice stesso o che sono di natura molto generale |
| `Language`           |                                                                                      |
| `Link`               |                                                                                      |
| `Learnpath`          | Per LP / Percorsi di Apprendimento                                                   |
| `Maintenance`        | Strumento di manutenzione del corso: copie di corsi, backup, ripristino, ecc.        |
| `Message`            |                                                                                      |
| `Notebook`           |                                                                                      |
| `Optimization`       |                                                                                      |
| `Portfolio`          |                                                                                      |
| `Privacy`            |                                                                                      |
| `Script`             | Per ciò che si trova in `tests/scripts/`                                             |
| `Search`             | Ricerca full-text                                                                    |
| `Security`           |                                                                                      |
| `Session`            |                                                                                      |
| `Skill`              |                                                                                      |
| `Social`             | Rete sociale                                                                         |
| `SSO`                | Metodi di Single Sign-On                                                             |
| `Survey`             |                                                                                      |
| `System`             | Cose che hanno a che fare principalmente con l'hosting e l'ottimizzazione a livello di server |
| `Template`           |                                                                                      |
| `Ticket`             |                                                                                      |
| `Tracking`           |                                                                                      |
| `User`               |                                                                                      |
| `Webservice`         |                                                                                      |
| `Wiki`               |                                                                                      |
| `Work`               |                                                                                      |
| `WYSIWYG`            |                                                                                      |
| `XAPI`               |                                                                                      |

---
## Revisione del Codice

Le richieste di pull sono esaminate dal team di manutenzione. Preparati a:

* Rispondere ai feedback e apportare revisioni
* Mantenere il tuo branch aggiornato con `master`
* Assicurarti che i test siano superati

## Segnalazione di Problemi

Segnala bug e richieste di funzionalità sul tracker dei problemi di GitHub.