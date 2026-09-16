# Autenticazione

Chamilo supporta più metodi di autenticazione, dal sistema integrato di nome utente/password alle soluzioni enterprise di single sign-on.

## File di configurazione

Tutti i metodi di autenticazione esterna sono configurati in `config/authentication.yaml`. Un modello è fornito in `config/authentication.dist.yaml`. La struttura generale è:

```yaml
parameters:
  authentication:
    <access_url_id>:
      <auth_method>:
        <provider_name>:
          <config_key>: <value>
```

Dopo aver modificato il file, svuotare e riscaldare la cache:

```bash
php bin/console cache:clear
php bin/console cache:warmup
```

I pulsanti di accesso esterno compaiono nella pagina di login dopo l'aggiornamento della cache.

## Metodi supportati

* **[OAuth2](oauth2.md)** — Azure AD, Keycloak, Facebook e provider OAuth2 generici
* **[Azure Entra ID](azure-entra-id.md)** — Configurazione dettagliata di Azure/Entra ID: registrazione dell'app, mappatura dei ruoli basata sui gruppi, autenticazione con certificato e comandi di sincronizzazione utenti/gruppi
* **[LDAP](ldap.md)** — Autenticazione verso un server LDAP o Active Directory
* **[CAS](cas.md)** — Central Authentication Service (legacy, non funzionante in 3.x)
* **[SCIM](scim.md)** — Provisioning automatico degli utenti da identity provider esterni
* **[SSO Configuration](sso-configuration.md)** — Risoluzione dei problemi e note tra metodi diversi

## Autenticazione predefinita

Per impostazione predefinita, Chamilo utilizza il proprio sistema interno: gli utenti accedono con un nome utente e una password memorizzati nel database di Chamilo. I metodi esterni sono aggiuntivi: il modulo di login standard resta disponibile insieme a qualsiasi provider configurato.

## Ulteriori riferimenti

Per il riferimento completo dei parametri e gli scenari avanzati, consultare la [pagina wiki External Authentication configuration](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).