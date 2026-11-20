# Creazione di utenti

`POST /api/access_urls/{id}/user` crea un utente della piattaforma e lo aggiunge all'URL di accesso `{id}`. È la sostituzione in Chamilo 3 dell'azione `save_user_json` del webservice `webservices/api/v2.php` della versione 1.11.x, ed è destinata alle integrazioni che creano account di discenti (negozi, sistemi HR, portali di iscrizione).

## Accesso

| Chiamante | Consentito |
|--------|---------|
| `ROLE_ADMIN` | Sì |
| `ROLE_SESSION_MANAGER` | Sì |
| Chiunque altro | `403 Forbidden` |

Autenticarsi con un JWT o una chiave API esterna, come descritto in [Autenticazione](authentication.md).

## Richiesta

```http
POST /api/access_urls/1/user
Authorization: Bearer <token>
Content-Type: application/json
```

```json
{
  "username": "jdoe-20261022",
  "email": "jane.doe@example.com",
  "firstname": "Jane",
  "lastname": "Doe",
  "password": "S3cret!pass",
  "sendEmail": true,
  "extraFields": { "my_user_field": "value" }
}
```

| Campo | Obbligatorio | Descrizione |
|-------|----------|-------------|
| `username` | Sì | Nome utente del nuovo utente. Non deve essere già utilizzato da un altro account (confronto senza distinzione tra maiuscole e minuscole). |
| `email` | Sì | Un indirizzo e-mail valido. Più account possono condividere lo stesso indirizzo, a meno che `checkEmailDuplicates` non sia `true`. |
| `firstname`, `lastname` | No | Nome e cognome. |
| `password` | No | Password iniziale. Quando è vuota e `sendEmail` è `true`, l'e-mail contiene invece un collegamento per impostare una password. |
| `locale` | No | Lingua dell'interfaccia, ad es. `fr_FR`. Per impostazione predefinita, la lingua della piattaforma. |
| `timezone` | No | Per impostazione predefinita, il fuso orario della piattaforma. |
| `status` | No | `5` (discente) per impostazione predefinita; `1` per un docente. |
| `sendEmail` | No | `true` per impostazione predefinita. Invia all'utente un messaggio e un'e-mail con i dettagli di accesso. |
| `checkEmailDuplicates` | No | `false` per impostazione predefinita. Quando è `true`, la richiesta viene rifiutata con `409 email_already_exists` se un account utilizza già questo indirizzo e-mail (confronto senza distinzione tra maiuscole e minuscole). Stesso comportamento del parametro `check_email_duplicates` di `save_user_json`. |
| `extraFields` | No | Valori dei campi extra dell'utente indicizzati dalla variabile del campo. Ogni variabile deve corrispondere a un campo extra utente esistente. |

### Indirizzi e-mail condivisi

Chamilo non richiede che gli indirizzi e-mail siano univoci: il modulo di creazione utente dell'amministratore accetta un indirizzo già utilizzato da un altro account, l'importazione degli utenti lo rifiuta solo quando è selezionata l'opzione **Verifica e-mail univoca**, e non esiste un'impostazione della piattaforma per modificare questo comportamento. Un caso comune è un discente reiscritto con un nuovo identificatore che mantiene lo stesso indirizzo. Inviare `checkEmailDuplicates: true` solo quando l'integrazione deve trattare un indirizzo esistente come un errore.

Quando l'impostazione **Il nome utente è l'e-mail** è abilitata, il nome utente è l'indirizzo e-mail, quindi il controllo del nome utente rifiuta già i duplicati.

## Risposta

`201 Created` con il nuovo utente (gruppo di serializzazione `user:read`), incluso il relativo `id`.

## Errori

| Stato | Corpo | Quando |
|--------|------|------|
| `401` | | Credenziali assenti o non valide |
| `403` | | Il chiamante non è né un amministratore né un amministratore di sessione |
| `409` | `{"error": "username_already_exists"}` | Il nome utente è già utilizzato |
| `409` | `{"error": "email_already_exists"}` | `checkEmailDuplicates` è `true` e l'indirizzo e-mail è già utilizzato |
| `422` | | `username` o `email` mancanti, oppure indirizzo e-mail non valido |

## Implementazione

* Operazione: la risorsa `AccessUrlUser` dichiarata in `src/CoreBundle/Entity/User.php`
* Input: `src/CoreBundle/Dto/CreateUserOnAccessUrlInput.php`
* Controller: `src/CoreBundle/Controller/Api/CreateUserOnAccessUrlAction.php`
* La pagina **Registra studente** dell'amministratore di sessione (`/admin-dashboard/register/{courseId}`) utilizza questo endpoint con `checkEmailDuplicates: true`, quindi avvisa quando l'indirizzo è già in uso.