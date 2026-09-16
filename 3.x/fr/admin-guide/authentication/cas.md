# CAS

> **Statut dans Chamilo 3.x.** Les entrées de configuration CAS (`cas_activate`, `cas_server`, `cas_server_uri`, `cas_port`, `cas_protocol`, `cas_add_user_activate`) existent encore dans les paramètres de la plateforme, héritage de Chamilo 1.x, et CAS apparaît toujours comme source d’authentification sélectionnable sur le formulaire utilisateur — mais aucun authentificateur CAS n’est branché dans le pipeline de sécurité de Chamilo 3.x. La connexion via CAS **ne fonctionne pas** actuellement de manière native. Si vous avez besoin du SSO sur Chamilo 3.x, utilisez plutôt [OAuth2](oauth2.md) (Azure / Keycloak / Generic) ou [LDAP](ldap.md).

## Ce que CAS ferait (comportement 1.x)

CAS (Central Authentication Service) est un protocole de authentification unique (SSO) couramment utilisé dans les universités et les établissements de recherche. Dans Chamilo 1.x, un clic sur « Se connecter avec CAS » redirigeait l’utilisateur vers un serveur CAS, validait le ticket renvoyé, puis créait ou faisait correspondre un compte local à partir des attributs CAS.

## Note de migration

Si vous migrez un portail Chamilo 1.x qui utilisait CAS, prévoyez de réimplémenter ce flux de connexion au-dessus d’OAuth2 ou de LDAP pour le moment, jusqu’à ce que l’authentificateur CAS soit rétabli dans une future version 3.x.