---
# CAS

> **Statut dans Chamilo 2.x.** Les entrées de configuration CAS (`cas_activate`, `cas_server`, `cas_server_uri`, `cas_port`, `cas_protocol`, `cas_add_user_activate`) existent toujours dans les paramètres de la plateforme comme un héritage de Chamilo 1.x, et CAS apparaît encore comme une source d'authentification sélectionnable dans le formulaire utilisateur — mais il n'y a pas d'authentificateur CAS intégré dans le pipeline de sécurité de Chamilo 2.x. La connexion via CAS **ne fonctionne pas** actuellement de manière native. Si vous avez besoin d'une authentification unique (SSO) sur Chamilo 2.x, utilisez [OAuth2](oauth2.md) (Azure / Keycloak / Générique) ou [LDAP](ldap.md) à la place.

## Ce que CAS ferait (comportement dans 1.x)

CAS (Central Authentication Service) est un protocole d'authentification unique couramment utilisé dans les universités et les institutions de recherche. Dans Chamilo 1.x, cliquer sur "Se connecter avec CAS" redirigeait l'utilisateur vers un serveur CAS, validait le ticket retourné et créait ou associait un compte local à partir des attributs CAS.

## Note sur la migration

Si vous mettez à niveau un portail Chamilo 1.x qui utilisait CAS, prévoyez de réimplémenter ce flux de connexion en utilisant OAuth2 ou LDAP pour le moment, jusqu'à ce que l'authentificateur CAS soit restauré dans une future version de Chamilo 2.x.