# Stato dell'account utente

Il campo `active` di un utente rappresenta lo stato dell'account. Un amministratore blocca o sblocca un account modificandolo con `PATCH /api/users/{id}`. Questo sostituisce il campo `active` del webservice 1.11.x `webservices/api/v2.php`.

## Valori

| `active` | Significato |
|----------|---------|
| `1` | Attivo: l'utente può accedere |
| `0` | Inattivo: l'account è bloccato |
| `-1` | Disattivato automaticamente dalla piattaforma |
| `-2` | Eliminato (nel cestino) |

L'API può impostare solo `1` o `0`. L'eliminazione avviene tramite `DELETE /api/users/{id}`, e il ripristino di un account eliminato tramite il cestino dell'amministrazione.

## Lettura dello stato

`active` viene restituito da `GET /api/users/{id}` e da `GET /api/users?username=...`.

```http
GET /api/users/42
Authorization: Bearer <token>
Accept: application/json
```

```json
{ "id": 42, "username": "jdupont", "active": 1 }
```

## Modifica dello stato

```http
PATCH /api/users/42
Authorization: Bearer <token>
Content-Type: application/merge-patch+json
Accept: application/json

{ "active": 0 }
```

La risposta è l'utente aggiornato. Inviare `{ "active": 1 }` per sbloccare l'account. `active` può essere inviato insieme ad altri campi dell'utente.

## Accesso

| Chiamante | Consentito |
|--------|---------|
| `ROLE_ADMIN` | Qualsiasi utente che può modificare, eccetto il proprio account |
| Qualsiasi altro utente | Non consentito, nemmeno sul proprio account |

L'invio del valore corrente non viene mai rifiutato, quindi un client che reinvia l'intero utente non viene bloccato.

## Errori

| Stato | Quando |
|--------|------|
| `400` | Un valore diverso da `0` o `1` |
| `401` | Credenziali assenti o non valide |
| `403` | Il chiamante non è un amministratore, oppure modifica il proprio stato |
| `404` | L'utente non esiste |