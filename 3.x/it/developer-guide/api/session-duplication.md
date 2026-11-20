# Duplicazione della sessione

`POST /api/sessions/{id}/duplicate` crea una nuova sessione a partire da una **sessione modello** esistente. È la sostituzione in Chamilo 3 dell'azione `create_session_from_model` del webservice `webservices/api/v2.php` della versione 1.11.x, ed è destinata alle integrazioni che avviano un nuovo ciclo di formazione a partire da una sessione modello.

## Accesso

| Chiamante | Consentito |
|--------|---------|
| `ROLE_ADMIN` | Qualsiasi sessione |
| `ROLE_SESSION_MANAGER` | Solo le sessioni che gestisce (è amministratore di sessione del modello), a meno che non sia abilitata l'impostazione **Consenti agli amministratori di sessione di vedere tutte le sessioni** |
| Chiunque altro | `403 Forbidden` |

Autenticarsi con un JWT o con una chiave API esterna, come descritto in [Autenticazione](authentication.md).

## Richiesta

```http
POST /api/sessions/42/duplicate
Authorization: Bearer <token>
Content-Type: application/json
```

```json
{
  "title": "Accounting basics - October 2026",
  "startDate": "2026-10-01T09:00:00+02:00",
  "endDate": "2026-12-15T18:00:00+01:00",
  "extraFields": { "my_session_field": "value" },
  "copySessionContent": false
}
```

| Campo | Obbligatorio | Descrizione |
|-------|----------|-------------|
| `title` | Sì | Titolo della nuova sessione. Non deve essere già utilizzato da un'altra sessione (max. 150 caratteri). |
| `startDate` | Sì | Data e ora in formato ISO 8601. Utilizzata come data di inizio di accesso, visualizzazione e accesso del tutor. |
| `endDate` | Sì | Data e ora in formato ISO 8601, non precedente a `startDate`. Utilizzata come data di fine di accesso, visualizzazione e accesso del tutor. |
| `extraFields` | No | Valori dei campi extra della sessione indicizzati dalla variabile del campo. Sovrascrivono i valori copiati dal modello. Ogni variabile deve corrispondere a un campo extra di sessione esistente. |
| `copySessionContent` | No | `false` per impostazione predefinita. Se `true`, il contenuto specifico della sessione di ciascun corso (documenti, percorsi di apprendimento, test, eventi del calendario, annunci, registro delle valutazioni…) viene duplicato nella nuova sessione. Il contenuto di base del corso è sempre condiviso, mai copiato. Questo flag è indipendente dall'impostazione della piattaforma **Abilita la copia del contenuto specifico della sessione in un'altra sessione**. |

## Cosa viene copiato

| Copiato dal modello | Non copiato |
|-----------------------|------------|
| Categoria, visibilità, durata, descrizione e «mostra descrizione» | Tutor del corso |
| Valori dei campi extra della sessione | Responsabili HR (DRH) |
| Corsi, nello stesso ordine | Studenti |
| Tutor generali | |
| Amministratori di sessione (se il modello non ne ha, il chiamante diventa amministratore di sessione) | |
| Opzione «Invia notifica di iscrizione» | |
| Promozione | |
| Contenuto del corso specifico della sessione, solo quando `copySessionContent` è `true` | |

Gli studenti sono esclusi di proposito: ogni ciclo ha i propri discenti. Iscriverli successivamente con `POST /api/course-sessions/actions/subscribe-users`.

La nuova sessione è associata all'URL di accesso corrente.

## Risposta

`201 Created` con la nuova sessione:

```json
{
  "id": 57,
  "title": "Accounting basics - October 2026",
  "nbrCourses": 3,
  "visibility": 1,
  "generalCoachesSubscriptions": [{ "user": "/api/users/7" }]
}
```

## Errori

| Stato | Quando |
|--------|------|
| `401` | Credenziali assenti o non valide |
| `403` | Il chiamante non può gestire la sessione modello |
| `404` | La sessione modello non esiste |
| `422` | Campo mancante o non valido, `endDate` precedente a `startDate`, titolo già utilizzato o variabile di campo extra sconosciuta |

Tutti i controlli vengono eseguiti prima che venga creato alcunché, quindi una richiesta rifiutata non lascia mai una sessione parziale.

## Implementazione

* Operazione: `duplicate_session` sulla risorsa `Session` (`src/CoreBundle/Entity/Session.php`)
* Input: `src/CoreBundle/Dto/SessionDuplicateInput.php`
* Processor: `src/CoreBundle/State/Session/SessionDuplicateProcessor.php`, che chiama `SessionManager::copy()` (utilizzato anche dall'azione **Copia** dell'elenco delle sessioni) e quindi applica il titolo, le date e i campi extra richiesti, nonché la promozione del modello, gli amministratori di sessione, l'opzione di notifica e l'ordine dei corsi.