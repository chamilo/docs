# Autenticazione

Chamilo supporta molteplici metodi di autenticazione, dal sistema integrato di nome utente e password a soluzioni di single sign-on aziendali.

## File di configurazione

Tutti i metodi di autenticazione esterni sono configurati in `config/authentication.yaml`. Un modello è fornito in `config/authentication.dist.yaml`. La struttura generale è:

```yaml
parameters:
  authentication:
    <access_url_id>:
      <auth_method>:
        <provider_name>:
          <config_key>: <value>
```

Dopo aver modificato il file, svuota e riscalda la cache:

```bash
php bin/console cache:clear
php bin/console cache:warmup
```

I pulsanti di accesso esterni appaiono sulla pagina di login dopo l'aggiornamento della cache.

## Metodi supportati

* **[OAuth2](oauth2.md)** — Azure AD, Keycloak, Facebook e provider OAuth2 generici
* **[LDAP](ldap.md)** — Autenticazione tramite server LDAP o Active Directory
* **[CAS](cas.md)** — Central Authentication Service (obsoleto, non funzionante nella versione 2.x)
* **[SCIM](scim.md)** — Provisioning automatico degli utenti da provider di identità esterni
* **[Configurazione SSO](sso-configuration.md)** — Note per la risoluzione dei problemi e informazioni sui metodi incrociati

## Autenticazione predefinita

Per impostazione predefinita, Chamilo utilizza il proprio sistema interno: gli utenti accedono con un nome utente e una password memorizzati nel database di Chamilo. I metodi esterni sono aggiuntivi: il modulo di login standard rimane disponibile insieme a eventuali provider configurati.

## Ulteriori riferimenti

Per un riferimento completo ai parametri e scenari avanzati, consulta la [pagina wiki sulla configurazione dell'autenticazione esterna](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).