# Azure Entra ID

Microsoft ha rinominato Azure Active Directory (Azure AD) in **Microsoft Entra ID** nel 2023 — si tratta dello stesso servizio e il codice e la configurazione di Chamilo continuano a farvi riferimento come `azure`. Questa pagina copre gli aspetti specifici di Azure dell'integrazione: registrazione dell'app, mappatura dei ruoli basata sui gruppi, autenticazione tramite certificato e i comandi dedicati di sincronizzazione utenti/gruppi. Per le chiavi di configurazione condivise da ogni provider (`enabled`, `title`, `allow_create_new_users` e così via) e per la struttura generale di `authentication.yaml`, vedere [OAuth2](oauth2.md).

## Registrazione di Chamilo in Microsoft Entra ID

1. Nel centro di amministrazione Entra, creare una **App registration** per Chamilo.
2. Impostare l'URI di reindirizzamento (tipo di piattaforma **Web**) su:

   ```
   https://your-chamilo-url/connect/azure/check
   ```

3. Annotare l'**Application (client) ID** e il **Directory (tenant) ID** — serviranno entrambi.
4. In **Certificates & secrets**, creare un client secret oppure caricare un certificato (vedere [Autenticazione tramite certificato](#certificate-authentication) più avanti).
5. In **API permissions**, aggiungere le autorizzazioni Microsoft Graph sottoindicate e concedere il consenso amministratore.

| Autorizzazione | Tipo | Necessaria per |
|------------|------|-------------|
| `User.Read` | Delegated | Accesso di base |
| `GroupMember.Read.All` | Delegated | Mappatura dei ruoli basata sui gruppi al login |
| `User.Read.All` | Application | `app:azure-sync-users` |
| `GroupMember.Read.All` o `Group.Read.All` | Application | `app:azure-sync-users` e `app:azure-sync-usergroups` |

Le autorizzazioni di tipo Application richiedono il consenso amministratore e sono utilizzate solo dai comandi della console di sincronizzazione (tramite il grant `client_credentials`), mai dal login interattivo di un utente.

## Configurazione di base

```yaml
authentication:
  1:
    oauth2:
      azure:
        enabled: true
        title: "Sign in with Microsoft"
        client_id: "<application-client-id>"
        client_secret: "<client-secret>"
        tenant: "<tenant-id>"
        url_login: "https://login.microsoftonline.com"
        path_authorize: "/<tenant-id>/oauth2/v2.0/authorize"
        path_token: "/<tenant-id>/oauth2/v2.0/token"
        url_api: "https://graph.microsoft.com"
        allow_create_new_users: true
        allow_update_user_info: true
```

### Multi-tenant e single-tenant

Il valore di `tenant` deve corrispondere a come sono stati impostati i "supported account types" della registrazione dell'app:

* Un GUID di tenant specifico — single-tenant, solo gli account di quell'organizzazione possono accedere
* `organizations` — qualsiasi tenant Entra ID
* `common` — qualsiasi tenant Entra ID più gli account Microsoft personali

## Attributi utente obbligatori

Ogni utente Entra ID che deve accedere a Chamilo deve avere `mail` e `mailNickname` valorizzati — il login genera un errore se uno dei due è vuoto (insieme all'object ID immutabile di Entra, che è sempre presente). La mappatura dei campi da Microsoft Graph a Chamilo è **fissa** per Azure (a differenza del provider OAuth2 generico, che consente di configurare la mappatura dei campi):

| Campo Chamilo | Origine Microsoft Graph |
|---------------|------------------------|
| Nome | `givenName` |
| Cognome | `surname` |
| E-mail | `mail` |
| Nome utente | `userPrincipalName` |
| Telefono | `telephoneNumber`, poi `businessPhones[0]`, poi `mobilePhone` |
| Attivo | `accountEnabled` |
| Lingua dell'interfaccia | `preferredLanguage` (abbinata a una lingua Chamilo installata, con fallback alla lingua predefinita della piattaforma) |

Tre campi extra vengono inoltre scritti a ogni login riuscito: `organisationemail` (= `mail`), `azure_id` (= `mailNickname`) e `azure_uid` (= l'object ID Entra). Questi supportano la logica di abbinamento degli account descritta di seguito.

## Abbinamento dei login agli account Chamilo esistenti

Impostare `existing_user_verification_order` su un elenco di cifre `1`–`3` separate da virgola per controllare come un login Entra ID in arrivo viene abbinato a un account Chamilo esistente:

| Valore | Abbina rispetto a |
|-------|------------------|
| `1` | Campo extra `organisationemail` == `mail` Entra |
| `2` | Campo extra `azure_id` == `mailNickname` Entra |
| `3` | Campo extra `azure_uid` == object ID Entra |

Le posizioni vengono tentate nell'ordine elencato; vince il primo abbinamento attivo (non eliminato in modo logico). Un valore non valido o vuoto usa come predefinito `1,2,3`. Se nessuna delle posizioni configurate corrisponde — il che accade sempre la prima volta che un dato utente accede, poiché quei campi extra vengono popolati solo *dopo* un login riuscito — Chamilo ricade sull'abbinamento del campo `email` di Chamilo con `mail` Entra, poi di `username` con `userPrincipalName`, indipendentemente da quanto configurato.

## Mappatura dei ruoli basata sui gruppi

Mappare i gruppi di sicurezza di Entra ID ai ruoli di Chamilo tramite i rispettivi Object ID (GUID):

```yaml
authentication:
  1:
    oauth2:
      azure:
        group_id:
          admin: "<entra-group-object-id>"
          session_admin: "<entra-group-object-id>"
          teacher: "<entra-group-object-id>"
```

A ogni accesso, Chamilo chiama Microsoft Graph `/v1.0/me/memberOf` con il token di accesso dell'utente e confronta i gruppi restituiti con questi tre ID, nell'ordine **admin → session_admin → teacher**. Prevale la prima corrispondenza: un utente presente sia nel gruppo admin sia in quello teacher viene promosso solo ad admin. Chi non appartiene ad alcun gruppo configurato mantiene il ruolo esistente (o il ruolo predefinito di studente, al primo accesso). Ciò richiede il permesso delegato `GroupMember.Read.All` elencato sopra.

## Autenticazione con certificato

In alternativa a `client_secret`, autenticarsi con un certificato:

```yaml
authentication:
  1:
    oauth2:
      azure:
        client_certificate_private_key: "<PEM private key, single line, with \\n for line breaks>"
        client_certificate_thumbprint: "<hex SHA1 thumbprint>"
```

Caricare il certificato pubblico corrispondente in **Certificates & secrets** nella registrazione dell'app e copiare l'impronta (mostrata in esadecimale nel portale) in `client_certificate_thumbprint`. Quando entrambe le chiavi sono impostate, Chamilo costruisce un'asserzione JWT firmata del client (RS256) invece di inviare `client_secret` — questo vale sia per gli accessi interattivi sia per l'autenticazione app-only dei comandi di sincronizzazione.

## Sincronizzazione di utenti e gruppi da Entra ID

Due comandi della console provvedono e mantengono gli account Chamilo direttamente da Entra ID, indipendentemente da chi effettua l'accesso interattivo. Entrambi si autenticano in modalità app-only (`client_credentials`), quindi necessitano dei permessi Graph di **applicazione** elencati sopra, ed entrambi sono pensati per essere pianificati in cron piuttosto che eseguiti manualmente.

### `app:azure-sync-users`

Recupera gli utenti da Microsoft Graph e provvede/aggiorna gli account Chamilo corrispondenti usando la stessa mappatura dei campi e la stessa logica di corrispondenza degli account di un accesso interattivo.

* Per impostazione predefinita recupera l'elenco completo degli utenti (`/v1.0/users`, paginato). Impostare `script_users_delta: true` per usare invece `/v1.0/users/delta` — Chamilo persiste il collegamento delta tra le esecuzioni, così le esecuzioni successive recuperano solo ciò che è cambiato.
* Impostare `deactivate_nonexisting_users: true` per disattivare gli account Chamilo (con origine di autenticazione Azure) che non compaiono più nel recupero da Entra ID. Funziona solo in modalità di recupero completo: la modalità delta non restituisce mai l'elenco completo degli utenti, quindi questa impostazione viene ignorata quando `script_users_delta` è abilitato.
* La mappatura dei ruoli per gruppo (sopra) viene riapplicata per ogni utente sincronizzato durante questa esecuzione, non solo all'accesso.

### `app:azure-sync-usergroups`

Recupera i gruppi di Entra ID e li replica come classi Chamilo (`Usergroup`).

* Recupera l'elenco completo dei gruppi (`/v1.0/groups`) oppure, con `script_usergroups_delta: true`, l'endpoint delta, con un proprio collegamento delta tracciato separatamente.
* `group_filter_regex` limita quali gruppi vengono sincronizzati, confrontato con il nome visualizzato del gruppo.
* **Ogni esecuzione svuota prima tutti i membri esistenti della classe Chamilo corrispondente**, quindi reiscrive i membri che Graph restituisce attualmente. I membri vengono associati solo a utenti Chamilo *esistenti*, usando la stessa [logica di corrispondenza degli account](#matching-logins-to-existing-chamilo-accounts) dell'accesso — questo comando non crea mai nuovi account utente e qualsiasi membro di gruppo che non può essere associato a un account Chamilo esistente viene saltato silenziosamente.

## Limitazioni note

* **Nessun logout singolo.** Uscire da Chamilo non disconnette l'utente da Entra ID o da altre applicazioni connesse. Esiste una chiave di configurazione `force_logout` in `authentication.yaml` ma al momento non è implementata — considerarla riservata, non funzionale.
* **Il reimpostazione della password è priva di significato per gli account Azure.** Poiché l'autenticazione avviene interamente tramite Entra ID, Chamilo non mantiene una password locale utilizzabile per questi account.

## Risoluzione dei problemi

* I fallimenti di accesso (attributi obbligatori mancanti, errori dell'API Graph) vengono mostrati all'utente come messaggio flash nella pagina di accesso.
* I comandi di sincronizzazione registrano i problemi per record con avvisi e continuano a elaborare il resto del lotto invece di interrompersi al primo errore — controllare l'output della console del comando (o dove il cron lo cattura) dopo ogni esecuzione.
* Mantenere abilitato il modulo di accesso standard di Chamilo in modo che gli amministratori abbiano sempre un modo per entrare se l'integrazione Entra ID non funziona correttamente.