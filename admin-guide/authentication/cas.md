# CAS

> **Status in Chamilo 2.x.** CAS-configuratie-instellingen (`cas_activate`, `cas_server`, `cas_server_uri`, `cas_port`, `cas_protocol`, `cas_add_user_activate`) bestaan nog steeds in de platforminstellingen als een overblijfsel uit Chamilo 1.x, en CAS verschijnt nog steeds als een selecteerbare authenticatiebron op het gebruikersformulier — maar er is geen CAS-authenticator geïntegreerd in de beveiligingspijplijn van Chamilo 2.x. Inloggen via CAS werkt momenteel **niet** standaard. Als u SSO nodig heeft op Chamilo 2.x, gebruik dan in plaats daarvan [OAuth2](oauth2.md) (Azure / Keycloak / Generic) of [LDAP](ldap.md).

## Wat CAS zou doen (gedrag in 1.x)

CAS (Central Authentication Service) is een single sign-on protocol dat vaak wordt gebruikt in universiteiten en onderzoeksinstellingen. In Chamilo 1.x zou het klikken op "Inloggen met CAS" de gebruiker doorverwijzen naar een CAS-server, het geretourneerde ticket valideren en een lokaal account aanmaken of koppelen op basis van CAS-attributen.

## Migratie-opmerking

Als u een Chamilo 1.x-portaal upgradet dat CAS gebruikte, plan dan om die inlogstroom voorlopig opnieuw te implementeren bovenop OAuth2 of LDAP, totdat de CAS-authenticator in een toekomstige 2.x-release wordt hersteld.