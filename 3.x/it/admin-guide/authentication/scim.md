# SCIM

**SCIM** (System for Cross-domain Identity Management) automatizza il provisioning degli utenti — creazione, aggiornamento e disattivazione degli account Chamilo in base alle modifiche nel proprio identity provider. A differenza di OAuth2 o LDAP, SCIM gestisce il provisioning, non l'accesso.

| Scenario | Azione SCIM |
|----------|-------------|
| Un nuovo dipendente entra in azienda | Crea un account Chamilo |
| Il nome o il ruolo di un dipendente cambia | Aggiorna l'account Chamilo |
| Un dipendente lascia l'azienda | Disattiva o elimina l'account Chamilo |

## Configurazione

### 1. Impostare il token SCIM

Nel file `.env` (o `.env.local`), definire un token casuale sicuro:

```
SCIM_TOKEN=your-secure-random-token
```

Questo token viene utilizzato dall'identity provider per autenticare le proprie richieste verso gli endpoint SCIM di Chamilo.

### 2. Abilitare SCIM in authentication.yaml

```yaml
authentication:
  1:
    scim:
      main:
        enabled: true
        auth_source: platform
```

Svuotare e riscaldare la cache dopo la modifica:

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### 3. Configurare l'identity provider

Nell'identity provider (Azure AD, Okta, ecc.):

1. Aggiungere Chamilo come applicazione SCIM
2. Impostare l'URL di base SCIM su `https://your-chamilo-url/scim/v2/`
3. Inserire il token del passo 1 come bearer token
4. Mappare gli attributi del provider sui campi standard SCIM (userName, name.givenName, name.familyName, emails)
5. Abilitare il provisioning automatico

## Endpoint SCIM

Chamilo implementa SCIM 2.0:

| Endpoint | Method | Action |
|----------|--------|--------|
| `/scim/v2/Users` | GET | List users |
| `/scim/v2/Users` | POST | Create a user |
| `/scim/v2/Users/{id}` | GET | Get a user |
| `/scim/v2/Users/{id}` | PUT | Replace a user |
| `/scim/v2/Users/{id}` | PATCH | Update a user |
| `/scim/v2/Users/{id}` | DELETE | Remove a user |

## Consigli

* **Iniziare con un gruppo di prova** — effettuare il provisioning di un piccolo insieme di utenti prima di abilitare SCIM per l'intera organizzazione.
* **Combinare con OAuth2** — una configurazione comune utilizza Azure AD OAuth2 per l'accesso e Azure AD SCIM per il provisioning.
* **Monitorare i log** — controllare sia i log di Chamilo (`var/log/`) sia i log di provisioning dell'identity provider per eventuali errori.