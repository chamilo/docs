---
# CAS

> **Estado en Chamilo 2.x.** Las entradas de configuración de CAS (`cas_activate`, `cas_server`, `cas_server_uri`, `cas_port`, `cas_protocol`, `cas_add_user_activate`) aún existen en los ajustes de la plataforma como un legado de Chamilo 1.x, y CAS todavía aparece como una fuente de autenticación seleccionable en el formulario de usuario, pero no hay un autenticador de CAS integrado en el pipeline de seguridad de Chamilo 2.x. Iniciar sesión a través de CAS **no** funciona actualmente de forma predeterminada. Si necesitas SSO en Chamilo 2.x, utiliza [OAuth2](oauth2.md) (Azure / Keycloak / Genérico) o [LDAP](ldap.md) en su lugar.

## Qué haría CAS (comportamiento en 1.x)

CAS (Central Authentication Service) es un protocolo de inicio de sesión único comúnmente utilizado en universidades e instituciones de investigación. En Chamilo 1.x, al hacer clic en "Iniciar sesión con CAS", se redirigía al usuario a un servidor CAS, se validaba el ticket devuelto y se creaba o asociaba una cuenta local a partir de los atributos de CAS.

## Nota sobre migración

Si estás actualizando un portal de Chamilo 1.x que utilizaba CAS, planifica reimplementar ese flujo de inicio de sesión utilizando OAuth2 o LDAP por el momento, hasta que el autenticador de CAS sea restaurado en una futura versión de 2.x.