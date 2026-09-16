# SCIM

**SCIM** (System for Cross-domain Identity Management) automatizza la gestione degli utenti, creando, aggiornando e disattivando gli account Chamilo in base alle modifiche nel tuo provider di identità. A differenza di OAuth2 o LDAP, SCIM gestisce la provisioning, non l'accesso.

| Scenario | Azione SCIM |
|----------|-------------|
| Un nuovo dipendente si unisce | Crea un account Chamilo |
| Il nome o il ruolo di un dipendente cambia | Aggiorna l'account Chamilo |
| Un dipendente lascia l'azienda | Disattiva o elimina l'account Chamilo |

## Configurazione

### 1. Imposta il token SCIM

Nel tuo file `.env` (o `.env.local`), definisci un token casuale sicuro:

```
SCIM_TOKEN=your-secure-random-token
```

Questo token viene utilizzato dal tuo provider di identità per autenticare le sue richieste agli endpoint SCIM di Chamilo.

### 2. Abilita SCIM in authentication.yaml

```yaml
authentication:
  1:
    scim:
      main:
        enabled: true
        auth_source: platform
```

Cancella e riscalda la cache dopo la modifica:

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### 3. Configura il tuo provider di identità

Nel tuo provider di identità (Azure AD, Okta, ecc.):

1. Aggiungi Chamilo come applicazione SCIM
2. Imposta l'URL di base SCIM su `https://your-chamilo-url/scim/v2/`
3. Inserisci il token del passaggio 1 come token bearer
4. Mappa gli attributi del provider ai campi standard SCIM (userName, name.givenName, name.familyName, emails)
5. Abilita la provisioning automatica

## Endpoint SCIM

Chamilo implementa SCIM 2.0:

| Endpoint | Metodo | Azione |
|----------|--------|--------|
| `/scim/v2/Users` | GET | Elenca gli utenti |
| `/scim/v2/Users` | POST | Crea un utente |
| `/scim/v2/Users/{id}` | GET | Ottieni un utente |
| `/scim/v2/Users/{id}` | PUT | Sostituisci un utente |
| `/scim/v2/Users/{id}` | PATCH | Aggiorna un utente |
| `/scim/v2/Users/{id}` | DELETE | Rimuovi un utente |

## Suggerimenti

* **Inizia con un gruppo di test** — provisiona un piccolo insieme di utenti prima di abilitare SCIM per l'intera organizzazione.
* **Combina con OAuth2** — una configurazione comune utilizza Azure AD OAuth2 per l'accesso e Azure AD SCIM per la provisioning.
* **Monitora i log** — controlla sia i log di Chamilo (`var/log/`) che i log di provisioning del tuo provider di identità per individuare eventuali errori.