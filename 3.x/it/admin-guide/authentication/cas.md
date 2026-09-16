# CAS

> **Stato in Chamilo 3.x.** Le voci di configurazione CAS (`cas_activate`, `cas_server`, `cas_server_uri`, `cas_port`, `cas_protocol`, `cas_add_user_activate`) esistono ancora nelle impostazioni della piattaforma come retaggio di Chamilo 1.x, e CAS compare ancora come origine di autenticazione selezionabile nel modulo utente — ma non è presente alcun autenticatore CAS collegato alla pipeline di sicurezza di Chamilo 3.x. L'accesso tramite CAS **non** funziona attualmente in modo nativo. Se è necessario l'SSO su Chamilo 3.x, utilizzare [OAuth2](oauth2.md) (Azure / Keycloak / Generic) o [LDAP](ldap.md).

## Cosa farebbe CAS (comportamento 1.x)

CAS (Central Authentication Service) è un protocollo di single sign-on comunemente utilizzato in università e istituti di ricerca. In Chamilo 1.x, facendo clic su "Log in with CAS" l'utente veniva reindirizzato a un server CAS, il ticket restituito veniva convalidato e un account locale veniva creato o associato a partire dagli attributi CAS.

## Nota sulla migrazione

Se si sta aggiornando un portale Chamilo 1.x che utilizzava CAS, pianificare di reimplementare quel flusso di accesso su OAuth2 o LDAP per il momento, fino al ripristino dell'autenticatore CAS in una futura versione 3.x.