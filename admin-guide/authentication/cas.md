# CAS

> **Stato in Chamilo 2.x.** Le voci di configurazione CAS (`cas_activate`, `cas_server`, `cas_server_uri`, `cas_port`, `cas_protocol`, `cas_add_user_activate`) sono ancora presenti nelle impostazioni della piattaforma come eredità da Chamilo 1.x, e CAS appare ancora come fonte di autenticazione selezionabile nel modulo utente — ma non esiste un autenticatore CAS integrato nella pipeline di sicurezza di Chamilo 2.x. L'accesso tramite CAS **non funziona** attualmente in modo predefinito. Se hai bisogno di SSO su Chamilo 2.x, utilizza invece [OAuth2](oauth2.md) (Azure / Keycloak / Generico) o [LDAP](ldap.md).

## Cosa farebbe CAS (comportamento in 1.x)

CAS (Central Authentication Service) è un protocollo di single sign-on comunemente utilizzato nelle università e nelle istituzioni di ricerca. In Chamilo 1.x, cliccando su "Accedi con CAS" l'utente veniva reindirizzato a un server CAS, il ticket restituito veniva validato e veniva creato o associato un account locale in base agli attributi CAS.

## Nota sulla migrazione

Se stai aggiornando un portale Chamilo 1.x che utilizzava CAS, pianifica di reimplementare quel flusso di accesso utilizzando OAuth2 o LDAP per il momento, fino a quando l'autenticatore CAS non verrà ripristinato in una futura versione 2.x.