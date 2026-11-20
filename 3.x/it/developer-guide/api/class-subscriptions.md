# API di appartenenza e iscrizione alle classi

Per le integrazioni, Chamilo fornisce endpoint per leggere e sincronizzare i membri, le sessioni e i corsi associati a una **classe** esistente. Una classe è un `Usergroup` di tipo *normal class*; queste route **non** si applicano ai gruppi sociali.

A differenza dell'API degli studenti di sessione, le tre azioni `PUT` della classe **sostituiscono l'intero elenco specificato**. Gli ID omessi vengono rimossi da quella relazione. Leggere l'elenco esistente prima di aggiornarlo ed evitare di usare `PUT` per aggiungere un solo membro, a meno di inviare anche tutti coloro che devono rimanere.

## Autorizzazione

Tutte le route seguenti richiedono il ruolo autenticato della piattaforma `ROLE_ADMIN`. La classe di destinazione deve essere disponibile nell'URL di accesso corrente. Una classe assente o fuori ambito restituisce `404`; uno usergroup che non è una classe normale restituisce `409 Conflict`.

Il controller verifica che gli ID di utente, corso e sessione inviati esistano. In un'installazione multi-URL, gli **ID di corso e sessione** inviati vengono filtrati sul portale corrente; tuttavia, l'implementazione attuale **non** applica lo stesso filtro di portale agli **ID utente**. Gli integratori non devono considerare questo endpoint come una garanzia di isolamento a livello di utente tra i portali. Vedere le note di revisione della consegna per questa considerazione di sicurezza ancora aperta.

## Lettura delle relazioni della classe

```http
GET /api/usergroups/31/subscriptions
Authorization: Bearer <admin-token>
```

Esempio di risposta:

```json
{
  "userIds": [17, 23],
  "sessionIds": [42],
  "courseIds": [8, 11]
}
```

## Sostituzione di un elenco di relazioni

| Metodo | Endpoint | Proprietà della richiesta |
|--------|----------|------------------|
| `PUT` | `/api/usergroups/{id}/users` | `userIds` |
| `PUT` | `/api/usergroups/{id}/sessions` | `sessionIds` |
| `PUT` | `/api/usergroups/{id}/courses` | `courseIds` |

Ad esempio, per impostare l'elenco completo della classe:

```http
PUT /api/usergroups/31/users
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17, 23, 29] }
```

Esempio di risposta:

```json
{
  "success": true,
  "applied": [17, 23, 29],
  "ignored": []
}
```

`applied` elenca gli ID accettati, non necessariamente gli ID appena aggiunti. `ignored` identifica gli ID richiesti che non è stato possibile applicare (ad esempio, un ID sconosciuto o un corso/sessione esterno al portale corrente). I valori non positivi vengono omessi, i duplicati vengono rimossi e un JSON malformato o una proprietà della richiesta che non è un array restituisce `400`.

Per sostituire invece le sessioni collegate, chiamare `PUT /api/usergroups/31/sessions` con `{ "sessionIds": [42, 57] }`. Per sostituire i corsi collegati, chiamare `PUT /api/usergroups/31/courses` con `{ "courseIds": [8, 11] }`.

**Importante:** Chamilo applica queste modifiche tramite i metodi di sincronizzazione di `UsergroupHelper`. Modificare l'elenco della classe o i suoi collegamenti a sessioni/corsi può anche modificare le iscrizioni correlate. Non manipolare direttamente le tabelle di relazione degli usergroup e verificare l'effetto della sostituzione degli elenchi prima di eseguire un'integrazione in produzione.

Per l'interfaccia e il concetto, vedere [Classi](../../admin-guide/sessions/classes.md). Per aggiungere o rimuovere specifici discenti da una sessione *senza* sostituire tutti i membri, usare l'[API di iscrizione degli studenti alla sessione](session-students.md).

**Implementazione:** `src/CoreBundle/Controller/Api/UsergroupSubscriptionController.php`. Aggiunto nel commit di Chamilo LMS `d8809925a4`.