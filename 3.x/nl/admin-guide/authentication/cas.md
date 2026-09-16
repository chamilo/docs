# CAS

> **Status in Chamilo 3.x.** CAS-configuratie-items (`cas_activate`, `cas_server`, `cas_server_uri`, `cas_port`, `cas_protocol`, `cas_add_user_activate`) bestaan nog in de platforminstellingen als een legacy-overblijfsel uit Chamilo 1.x, en CAS verschijnt nog als selecteerbare authenticatiebron op het gebruikersformulier — maar er is geen CAS-authenticator aangesloten op de beveiligingspipeline van Chamilo 3.x. Inloggen via CAS werkt **niet** out of the box. Als u SSO nodig hebt op Chamilo 3.x, gebruik dan [OAuth2](oauth2.md) (Azure / Keycloak / Generic) of [LDAP](ldap.md).

## Wat CAS zou doen (gedrag in 1.x)

CAS (Central Authentication Service) is een single sign-on-protocol dat veel wordt gebruikt aan universiteiten en onderzoeksinstellingen. In Chamilo 1.x leidde een klik op "Inloggen met CAS" de gebruiker om naar een CAS-server, valideerde het teruggegeven ticket en maakte of koppelde een lokaal account op basis van CAS-attributen.

## Migratienotitie

Als u een Chamilo 1.x-portaal upgradet dat CAS gebruikte, plan dan om die inlogstroom voorlopig opnieuw te implementeren bovenop OAuth2 of LDAP, totdat de CAS-authenticator in een toekomstige 3.x-release is hersteld.