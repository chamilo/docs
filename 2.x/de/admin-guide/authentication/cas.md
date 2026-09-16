# CAS

> **Status in Chamilo 2.x.** Die CAS-Konfigurationseinträge (`cas_activate`, `cas_server`, `cas_server_uri`, `cas_port`, `cas_protocol`, `cas_add_user_activate`) existieren weiterhin in den Plattformeinstellungen als Überbleibsel aus Chamilo 1.x, und CAS erscheint immer noch als wählbare Authentifizierungsquelle im Benutzerformular — jedoch ist kein CAS-Authentifikator in die Sicherheits-Pipeline von Chamilo 2.x integriert. Eine Anmeldung über CAS funktioniert derzeit **nicht** ohne Weiteres. Wenn Sie SSO in Chamilo 2.x benötigen, verwenden Sie stattdessen [OAuth2](oauth2.md) (Azure / Keycloak / Generic) oder [LDAP](ldap.md).

## Was CAS tun würde (Verhalten in 1.x)

CAS (Central Authentication Service) ist ein Single-Sign-On-Protokoll, das häufig an Universitäten und Forschungseinrichtungen verwendet wird. In Chamilo 1.x führte ein Klick auf "Mit CAS anmelden" zu einer Weiterleitung zum CAS-Server, validierte das zurückgegebene Ticket und erstellte oder verknüpfte ein lokales Konto basierend auf den CAS-Attributen.

## Hinweis zur Migration

Wenn Sie ein Chamilo 1.x-Portal, das CAS verwendet hat, auf eine neuere Version aktualisieren, planen Sie, den Anmeldeprozess vorübergehend auf Basis von OAuth2 oder LDAP neu zu implementieren, bis der CAS-Authentifikator in einer zukünftigen 2.x-Version wiederhergestellt wird.