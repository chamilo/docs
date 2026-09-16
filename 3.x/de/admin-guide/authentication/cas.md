# CAS

> **Status in Chamilo 3.x.** CAS-Konfigurationseinträge (`cas_activate`, `cas_server`, `cas_server_uri`, `cas_port`, `cas_protocol`, `cas_add_user_activate`) sind in den Plattformeinstellungen noch als Legacy-Übernahme aus Chamilo 1.x vorhanden, und CAS erscheint weiterhin als auswählbare Authentifizierungsquelle im Benutzerformular — es ist jedoch kein CAS-Authenticator in die Sicherheits-Pipeline von Chamilo 3.x eingebunden. Die Anmeldung über CAS funktioniert derzeit **nicht** ohne Weiteres. Wenn Sie SSO unter Chamilo 3.x benötigen, verwenden Sie stattdessen [OAuth2](oauth2.md) (Azure / Keycloak / Generic) oder [LDAP](ldap.md).

## Was CAS tun würde (Verhalten in 1.x)

CAS (Central Authentication Service) ist ein Single-Sign-On-Protokoll, das häufig an Universitäten und Forschungseinrichtungen eingesetzt wird. In Chamilo 1.x leitete ein Klick auf „Mit CAS anmelden“ den Benutzer an einen CAS-Server weiter, validierte das zurückgegebene Ticket und erstellte oder verknüpfte ein lokales Konto anhand der CAS-Attribute.

## Hinweis zur Migration

Wenn Sie ein Chamilo-1.x-Portal aktualisieren, das CAS verwendet hat, planen Sie, diesen Anmeldefluss vorerst auf OAuth2 oder LDAP umzusetzen, bis der CAS-Authenticator in einer zukünftigen 3.x-Version wiederhergestellt ist.