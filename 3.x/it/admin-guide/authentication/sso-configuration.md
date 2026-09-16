# Configurazione SSO

Questa pagina tratta argomenti che si applicano a tutti i metodi di autenticazione.

## Provider multipli

È possibile abilitare più di un metodo di autenticazione contemporaneamente. Ogni provider abilitato mostra il proprio pulsante nella pagina di accesso, accanto al modulo standard nome utente/password. Gli utenti scelgono il metodo preferito.

Mantenere abilitato il modulo standard in modo che gli amministratori della piattaforma possano sempre accedere, anche se un provider esterno è configurato in modo errato.

## Priorità di autenticazione

Quando sono attivi più metodi, il sistema verifica le credenziali in questo ordine:

1. LDAP (se è impostato `force_as_login_method`)
2. Provider OAuth2 (nell'ordine in cui compaiono in `authentication.yaml`)
3. Database interno di Chamilo

## Token JWT per l'accesso alle API

Chamilo utilizza JWT (JSON Web Tokens) per la propria REST API. La durata dei token e il comportamento di refresh sono configurati in `config/packages/lexik_jwt_authentication.yaml`. Questa impostazione è distinta dal flusso di accesso SSO e si applica solo ai client API.

## Risoluzione dei problemi

### Il pulsante di accesso non compare dopo la configurazione

La cache deve essere svuotata dopo ogni modifica a `authentication.yaml`:

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### Gli utenti non riescono ad accedere tramite SSO

* **Mancata corrispondenza dell'URI di reindirizzamento** — L'URI registrato nel provider di identità deve corrispondere esattamente a `https://your-chamilo-url/connect/<provider>/check`.
* **Deriva dell'orologio** — I token SSO sono sensibili al tempo. Assicurarsi che l'orologio del server sia sincronizzato (NTP).
* **Certificato SSL** — Chamilo deve considerare attendibile il certificato del provider di identità. Verificare eventuali problemi con certificati autofirmati.
* **Log** — Consultare `var/log/` e i log del provider di identità per i messaggi di errore specifici.

### Gli utenti vengono creati con il ruolo errato

Verificare la configurazione della mappatura dei ruoli per il provider. I nuovi utenti ricevono per impostazione predefinita il ruolo studente, a meno che una mappatura di gruppo o attributo non li promuova.

### Gli utenti esistono nel provider ma non possono accedere a Chamilo

* Se `allow_create_new_users` è false, l'utente deve già possedere un account Chamilo il cui indirizzo e-mail o nome utente corrisponda ai dati del provider.
* Verificare che l'utente non sia disattivato in Chamilo.
* Per Azure, esaminare `existing_user_verification_order` per comprendere come Chamilo associa gli utenti in arrivo agli account esistenti.