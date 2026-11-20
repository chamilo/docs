# API di iscrizione degli studenti alla sessione

Le integrazioni possono elencare, iscrivere e rimuovere i discenti in una sessione tramite endpoint riservati agli amministratori. Queste azioni utilizzano il comportamento di iscrizione alle sessioni delle schermate di amministrazione di Chamilo. Sono distinte da `/api/course-sessions/actions/*`, che appartiene a un diverso flusso di lavoro orientato ai tutor.

## Autenticazione e accesso

Ogni operazione seguente richiede l'autenticazione con il ruolo di piattaforma `ROLE_ADMIN`. Essere soltanto amministratore di sessione **non** concede l'accesso. Utilizzare il metodo di autenticazione descritto in [Autenticazione](authentication.md).

Nelle installazioni multi-URL, la sessione richiesta deve appartenere all'URL di accesso corrente; in caso contrario l'endpoint risponde con `404`.

## Route

| Metodo | Endpoint | Scopo |
|--------|----------|---------|
| `GET` | `/api/sessions/{id}/students` | Elenca gli ID utente dei discenti iscritti a questa sessione |
| `POST` | `/api/sessions/{id}/students/subscribe` | Aggiunge i discenti specificati, mantenendo quelli esistenti |
| `POST` | `/api/sessions/{id}/students/unsubscribe` | Rimuove soltanto i discenti specificati |

Sostituire `{id}` con l'ID numerico della sessione. Per entrambe le richieste POST, inviare JSON contenente l'array `userIds`:

```http
POST /api/sessions/42/students/subscribe
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17, 23] }
```

Un'iscrizione riuscita produce una risposta con la struttura seguente; gli ID dipendono dall'installazione:

```json
{
  "success": true,
  "applied": [17],
  "alreadyThere": [23],
  "ignored": []
}
```

`applied` contiene i discenti appena iscritti; `alreadyThere` contiene i discenti già iscritti; `ignored` elenca gli ID non idonei o non disponibili. In fase di iscrizione, Chamilo iscrive inoltre i discenti aggiunti ai corsi della sessione. **Non** sostituisce l'intero elenco della sessione.

Per ispezionare l'appartenenza:

```http
GET /api/sessions/42/students
Authorization: Bearer <admin-token>
```

```json
{ "userIds": [17, 23] }
```

Per rimuovere i discenti selezionati:

```http
POST /api/sessions/42/students/unsubscribe
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17] }
```

La risposta di disiscrizione contiene `success`, `applied` (ID rimossi) e `ignored` (ID non iscritti). Gli altri discenti restano nella sessione.

## Validazione e limitazioni

* `userIds` deve essere un array di ID numerici (interi o stringhe composte solo da cifre). Gli ID ripetuti vengono deduplicati; i valori non positivi vengono omessi.
* Per l'iscrizione, gli utenti idonei devono esistere, non essere eliminati logicamente, non essere anonimi né responsabili HR e appartenere all'URL di accesso corrente.
* JSON o `userIds` mancanti o malformati restituiscono `400 Bad Request`.
* Le sessioni mancanti o fuori ambito restituiscono `404 Not Found`; i chiamanti privi di autorizzazione di amministratore non possono utilizzare queste route.
* Le route di iscrizione degli studenti **non** sono endpoint CRUD generici per l'entità `Session` e non accettano un elenco della sessione come documento di sostituzione.

Per l'interfaccia di amministrazione corrispondente, vedere [Gestione delle sessioni](../../admin-guide/sessions/managing-sessions.md). Per copiare una sessione modello prima di iscrivere gli studenti, vedere [Duplicazione della sessione](session-duplication.md).

**Implementazione:** `src/CoreBundle/Controller/Api/SessionStudentsController.php`. Aggiunto nel commit di Chamilo LMS `bdfb2dd661`.