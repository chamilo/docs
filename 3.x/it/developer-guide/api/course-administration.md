# API di amministrazione dei corsi

Chamilo 3.1 consente alle integrazioni amministrative di aggiornare i metadati dei corsi e di eliminare i corsi tramite la risorsa API `Course`. Queste operazioni sono state aggiunte per la sincronizzazione con sistemi di amministrazione esterni, come un ERP.

## Autorizzazioni

| Operazione | Metodo ed endpoint | Ruolo richiesto |
|-----------|---------------------|---------------|
| Elencare i corsi | `GET /api/courses` | Docente o amministratore della piattaforma |
| Visualizzare un corso | `GET /api/courses/{id}` | Autorizzazione a visualizzare quel corso |
| Creare un corso | `POST /api/courses` | Docente o amministratore della piattaforma |
| Aggiornare un corso | `PATCH /api/courses/{id}` | **Amministratore della piattaforma (`ROLE_ADMIN`)** |
| Eliminare un corso | `DELETE /api/courses/{id}` | **Amministratore della piattaforma (`ROLE_ADMIN`)** |

`PUT` non è configurato come operazione su questa risorsa. I docenti devono continuare a modificare i propri corsi tramite l'interfaccia delle impostazioni del corso; le nuove operazioni di scrittura dell'API sono riservate agli amministratori.

Utilizzare un account autenticato o una credenziale di integrazione con le autorizzazioni necessarie. Vedere [Autenticazione API](authentication.md).

## Aggiornare i metadati del corso

Inviare una richiesta JSON Merge Patch di API Platform per modificare solo le proprietà fornite nel corpo:

```http
PATCH /api/courses/42
Authorization: Bearer <admin-token>
Content-Type: application/merge-patch+json
Accept: application/ld+json
```

```json
{
  "title": "Introduction to Accounting - 2026"
}
```

La richiesta aggiorna il corso esistente anziché crearne uno nuovo. L'API accetta le proprietà scrivibili definite dal gruppo di serializzazione `course:write`, nel rispetto della validazione dell'entità. Gli esempi includono `title`, `visibility`, `categories`, `departmentUrl`, `videoUrl`, `sticky` e `duration`. Le proprietà di relazione, come `categories`, richiedono la rappresentazione della risorsa prevista dall'API; consultare la documentazione OpenAPI anziché inviare ID di database arbitrari.

**Importante:** il `code` interno del corso **non** è scrivibile tramite questa operazione PATCH. Non tentare di rinominare il codice interno di un corso inviando un campo `code` o `visualCode`.

## Eliminare un corso

```http
DELETE /api/courses/42
Authorization: Bearer <admin-token>
```

Si tratta di un'operazione di amministrazione **distruttiva**. Chamilo richiama lo stesso helper di eliminazione dei corsi utilizzato dalla manutenzione dei corsi, anziché eliminare direttamente l'entità Doctrine. Pulisce le iscrizioni associate, i collegamenti a sessioni e classi, i dati di tracciamento e l'indicizzazione di ricerca correlata, ove applicabile.

In un'installazione **multi-URL**, l'eliminazione può limitarsi a scollegare il corso dall'URL di accesso corrente, anziché eliminarlo ovunque. I documenti del corso non vengono eliminati utilizzando l'opzione separata *elimina documenti esclusivi* dell'interfaccia di manutenzione. Non interpretare un'eliminazione tramite API come garanzia che ogni documento venga rimosso fisicamente.

Se una dipendenza attiva impedisce l'eliminazione (ad esempio, una sequenza di risorse), l'endpoint può rispondere con `409 Conflict`. Verificare le dipendenze del corso e i backup prima di inviare richieste DELETE, in particolare nelle integrazioni in batch.

## Errori e note operative

* Un chiamante privo del ruolo di amministratore richiesto viene rifiutato; utilizzare un account correttamente autorizzato anziché una credenziale di docente per PATCH o DELETE.
* Dati di richiesta non validi possono far fallire la validazione dell'entità. Recuperare il corso corrente prima di applicarvi la patch e inviare solo le proprietà che si intende modificare.
* Queste operazioni sono esposte da API Platform; consultare la documentazione OpenAPI dell'istanza installata per lo schema di risposta esatto e i formati dei campi accettati.
* Testare l'eliminazione del corso su un corso usa e getta, non su un corso che contiene registrazioni di apprendimento di produzione.

Per l'amministrazione dei corsi nell'interfaccia, vedere [Gestione dei corsi](../../admin-guide/courses/managing-courses.md). Per le integrazioni di iscrizione alle sessioni, vedere [Iscrizione degli studenti alle sessioni](session-students.md).

**Implementazione:** `src/CoreBundle/Entity/Course.php` (operazioni `Patch` e `Delete`) e `src/CoreBundle/State/CourseDeleteProcessor.php`. Aggiunto nel commit di Chamilo LMS `8cc9d4b33d`.