# CAS

> **Estado en Chamilo 3.x.** Las entradas de configuración de CAS (`cas_activate`, `cas_server`, `cas_server_uri`, `cas_port`, `cas_protocol`, `cas_add_user_activate`) siguen existiendo en los ajustes de la plataforma como un legado de Chamilo 1.x, y CAS sigue apareciendo como fuente de autenticación seleccionable en el formulario de usuario — pero no hay ningún autenticador CAS conectado al pipeline de seguridad de Chamilo 3.x. Iniciar sesión a través de CAS **no** funciona actualmente de forma inmediata. Si necesita SSO en Chamilo 3.x, utilice [OAuth2](oauth2.md) (Azure / Keycloak / Generic) o [LDAP](ldap.md) en su lugar.

## Qué haría CAS (comportamiento de 1.x)

CAS (Central Authentication Service) es un protocolo de inicio de sesión único (single sign-on) de uso habitual en universidades e instituciones de investigación. En Chamilo 1.x, al pulsar «Iniciar sesión con CAS» se redirigía al usuario a un servidor CAS, se validaba el ticket devuelto y se creaba o coincidía una cuenta local a partir de los atributos de CAS.

## Nota de migración

Si está actualizando un portal de Chamilo 1.x que utilizaba CAS, planifique reimplementar ese flujo de inicio de sesión sobre OAuth2 o LDAP de momento, hasta que el autenticador CAS se restaure en una futura versión 3.x.