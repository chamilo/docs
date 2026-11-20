# Tempo di connessione dell'utente

`GET /api/users/{id}/connection-time` restituisce il tempo totale trascorso da un utente connesso alla piattaforma. Sostituisce l'azione `get_user_total_connexion_time` del webservice `webservices/api/v2.php` della versione 1.11.x e può essere limitato a un periodo.

## Accesso

| Chiamante | Consentito |
|--------|---------|
| `ROLE_ADMIN` | Qualsiasi utente dell'URL di accesso corrente |
| Qualsiasi utente autenticato | Solo il proprio tempo di connessione |
| Chiunque altro | `403 Forbidden` |

L'endpoint accetta l'id numerico dell'utente. Per partire da un nome utente, cercare prima l'utente con `GET /api/users?username=...`.

## Richiesta

```http
GET /api/users/42/connection-time?startDate=2026-10-01T00:00:00%2B02:00&endDate=2026-12-15T23:59:59%2B01:00
Authorization: Bearer <token>
```

| Parametro di query | Obbligatorio | Descrizione |
|-----------------|----------|-------------|
| `startDate` | No | Data e ora in formato ISO 8601. Vengono conteggiate solo le connessioni **iniziate** in questo momento o successivamente. |
| `endDate` | No | Data e ora in formato ISO 8601, non precedente a `startDate`. Vengono conteggiate solo le connessioni **terminate** in questo momento o precedentemente. |

Senza nessuno dei due parametri, viene conteggiata ogni connessione. Con il solo `startDate`, le connessioni vengono conteggiate a partire da quella data, senza limite finale. Con il solo `endDate`, le connessioni vengono conteggiate fino a quella data, senza limite iniziale.

Una connessione che si sovrappone a un limite (ad esempio una iniziata prima di `startDate`) non viene conteggiata affatto: i tempi di connessione non vengono mai suddivisi. È la stessa regola del filtro per periodo personalizzato dei report della versione 1.11.x.

Includere l'offset del fuso orario. In un URL, `+` deve essere codificato come `%2B`. Un valore privo di offset viene interpretato nel fuso orario del server.

## Risposta

```json
{
  "id": 42,
  "username": "jdupont",
  "totalConnectionTime": 5025,
  "totalConnectionTimeFormatted": "01:23:45"
}
```

| Campo | Descrizione |
|-------|-------------|
| `totalConnectionTime` | Totale in secondi |
| `totalConnectionTimeFormatted` | Lo stesso totale nel formato `HH:MM:SS`, il formato restituito dal webservice della versione 1.11.x. Le ore possono superare 24. |

## Errori

| Stato | Quando |
|--------|------|
| `400` | Una data che non può essere analizzata, oppure `endDate` precedente a `startDate` |
| `401` | Credenziali assenti o non valide |
| `403` | Il chiamante non è né un amministratore né l'utente in questione |
| `404` | L'utente non esiste, oppure non appartiene all'URL di accesso corrente |

## Come viene calcolato il tempo

Il totale è la somma di `logout_date − login_date` sulle righe dell'utente nella tabella `track_e_login`.

Una connessione inizia al login e viene prolungata mentre l'utente è attivo: la pagina aperta dall'utente invia un segnale di presenza ogni minuto finché la sua scheda è visibile, come faceva ogni visualizzazione di pagina in Chamilo 1.11.x. Dopo un'inattività più lunga della durata della sessione, l'attività successiva apre una nuova connessione, quindi l'intervallo di inattività non viene conteggiato. La disconnessione chiude la connessione corrente. Il tempo trascorso da un amministratore che utilizza **Accedi come** non viene aggiunto all'utente.

> **Nota:** le connessioni registrate prima del ripristino di questo tracciamento possono non avere una data di logout. Vengono conteggiate come zero, quindi i totali relativi a periodi precedenti all'aggiornamento possono essere inferiori al tempo effettivamente trascorso.