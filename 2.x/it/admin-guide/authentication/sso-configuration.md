# Configurazione SSO

Questa pagina tratta argomenti che si applicano a diversi metodi di autenticazione.

## Provider multipli

È possibile abilitare più metodi di autenticazione contemporaneamente. Ogni provider abilitato mostra il proprio pulsante nella pagina di accesso accanto al modulo standard di nome utente e password. Gli utenti possono scegliere il metodo preferito.

Mantieni abilitato il modulo standard in modo che gli amministratori della piattaforma possano sempre effettuare l'accesso, anche se un provider esterno è configurato in modo errato.

## Priorità di autenticazione

Quando sono attivi più metodi, il sistema verifica le credenziali in quest'ordine:

1. LDAP (se `force_as_login_method` è impostato)
2. Provider OAuth2 (nell'ordine in cui appaiono in `authentication.yaml`)
3. Database interno di Chamilo

## Token JWT per l'accesso API

Chamilo utilizza JWT (JSON Web Tokens) per la sua API REST. La durata del token e il comportamento di aggiornamento sono configurati in `config/packages/lexik_jwt_authentication.yaml`. Questo è separato dal flusso di accesso SSO e si applica solo ai client API.

## Risoluzione dei problemi

### Il pulsante di accesso non appare dopo la configurazione

La cache deve essere svuotata dopo ogni modifica a `authentication.yaml`:

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### Gli utenti non riescono ad accedere tramite SSO

* **Mismatch dell'URI di reindirizzamento** — L'URI registrato nel tuo provider di identità deve corrispondere esattamente a `https://your-chamilo-url/connect/<provider>/check`.
* **Deriva dell'orologio** — I token SSO sono sensibili al tempo. Assicurati che l'orologio del server sia sincronizzato (NTP).
* **Certificato SSL** — Chamilo deve fidarsi del certificato del provider di identità. Verifica eventuali problemi con certificati autofirmati.
* **Log** — Esamina `var/log/` e i log del tuo provider di identità per messaggi di errore specifici.

### Gli utenti vengono creati con il ruolo sbagliato

Controlla la configurazione di mappatura dei ruoli per il provider. I nuovi utenti vengono assegnati di default al ruolo di studente, a meno che una mappatura di gruppo o attributo non li promuova.

### Gli utenti esistono nel provider ma non possono accedere a Chamilo

* Se `allow_create_new_users` è impostato su false, l'utente deve già avere un account Chamilo il cui email o nome utente corrisponda ai dati del provider.
* Verifica che l'utente non sia disattivato in Chamilo.
* Per Azure, rivedi `existing_user_verification_order` per capire come Chamilo associa gli utenti in arrivo agli account esistenti.