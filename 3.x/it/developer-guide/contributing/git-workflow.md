# Flusso di lavoro Git

## Repository

Il codice sorgente di Chamilo è ospitato su GitHub: [github.com/chamilo/chamilo-lms](https://github.com/chamilo/chamilo-lms)

## Branching

* **`master`** — Branch principale di sviluppo
* I branch di funzionalità vengono creati da `master` per i nuovi sviluppi
* I branch di rilascio vengono creati per le versioni stabili

## Contribuire una modifica

1. **Fare il fork** del repository su GitHub
2. **Clonare** il proprio fork in locale
3. **Creare un branch** per la modifica: `git checkout -b feature/my-feature`
4. **Apportare le modifiche** seguendo le convenzioni di codifica
5. **Eseguire il commit** con messaggi chiari e descrittivi
6. **Eseguire il push** sul proprio fork: `git push origin feature/my-feature`
7. **Creare una pull request** verso il branch `master`

## Messaggi di commit

Scrivere messaggi di commit chiari che spieghino **cosa** e **perché**:

```
Glossary: Add AI-assisted term generation

Teachers can now generate glossary terms using configured AI
providers. Supports configurable prompt and term count.
```

### Convenzione del prefisso dello strumento

La riga dell'oggetto è preceduta dallo **strumento o dall'area** toccati dalla modifica, seguiti da due punti. Si usa una terminologia condivisa e breve in modo che il changelog e `git log --oneline` possano essere scorsi per strumento. Il prefisso è sempre la forma **singolare** del nome canonico dello strumento.

Formato: `<Prefix>: <Imperative summary in the present tense>`

Esempi:

```
Document: Fix list for student view
Exercise: Prevent duplicate question titles within a quiz
Learnpath: Allow reordering chapters via drag and drop
Internal: Refactor ResourceNode hydration in the API normalizer
CI: Cache Composer downloads in the GitHub Actions workflow
```

Se una modifica riguarda più strumenti, scegliere quello più interessato; le modifiche realmente trasversali che toccano solo la struttura del codice (nessuno strumento per l'utente finale) vanno sotto `Internal`. Le modifiche solo documentali (questo sito, il changelog, i docblock inline intesi puramente come riferimento) vanno sotto `Documentation`.

#### Prefissi consentiti

| Prefix               | Scope / notes                                                                        |
|----------------------|--------------------------------------------------------------------------------------|
| `Admin`              |                                                                                      |
| `Announcement`       |                                                                                      |
| `Attendance`         |                                                                                      |
| `Authentication`     |                                                                                      |
| `Blog`               |                                                                                      |
| `Calendar`           | Non "Agenda"                                                                         |
| `Career`             |                                                                                      |
| `Catalogue`          | Catalogo di corsi e sessioni, inclusi i "corsi in evidenza" sulla homepage           |
| `Chat`               |                                                                                      |
| `CI`                 | Continuous Integration, test automatizzati, ecc.                                     |
| `Course description` |                                                                                      |
| `Course Progress`    | Non "Thematic advance"                                                               |
| `Course settings`    |                                                                                      |
| `Cron`               |                                                                                      |
| `Dashboard`          |                                                                                      |
| `Display`            |                                                                                      |
| `Document`           |                                                                                      |
| `Documentation`      | Qualsiasi cosa relativa esclusivamente alla documentazione di Chamilo o del codice, al changelog, ecc. |
| `Dropbox`            |                                                                                      |
| `Exercise`           | Non "Quiz"                                                                           |
| `Extra Fields`       |                                                                                      |
| `Forum`              |                                                                                      |
| `Glossary`           |                                                                                      |
| `Gradebook`          | Include i certificati                                                                |
| `Group`              | Include i gruppi di corso, i gruppi globali e le classi                              |
| `Help`               |                                                                                      |
| `Hook`               | Per il meccanismo interno di hook                                                    |
| `Install`            | Include gli aspetti relativi all'aggiornamento                                       |
| `Internal`           | Per modifiche e correzioni che riguardano principalmente il codice stesso o sono di natura molto globale |
| `Language`           |                                                                                      |
| `Link`               |                                                                                      |
| `Learnpath`          | Per LP / Learning Paths                                                              |
| `Maintenance`        | Lo strumento di manutenzione del corso: copie del corso, backup, ripristino, ecc.    |
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
| `System`             | Aspetti che riguardano principalmente l'hosting e la messa a punto a livello di server |
| `Template`           |                                                                                      |
| `Ticket`             |                                                                                      |
| `Tracking`           |                                                                                      |
| `User`               |                                                                                      |
| `Webservice`         |                                                                                      |
| `Wiki`               |                                                                                      |
| `Work`               |                                                                                      |
| `WYSIWYG`            |                                                                                      |
| `XAPI`               |                                                                                      |

## Code Review

Le pull request vengono esaminate dal team dei maintainer. Siate pronti a:

* Rispondere ai feedback e apportare le revisioni
* Mantenere il vostro branch aggiornato rispetto a `master`
* Assicurarvi che i test vadano a buon fine

## Segnalazione di issue

Segnalate bug e richieste di funzionalità sul tracker delle issue di GitHub.