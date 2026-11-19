# Servidor de autorización OAuth 2.1 y clientes MCP

Chamilo puede actuar como **servidor de autorización OAuth** para los clientes que se conectan a sus recursos protegidos. Se trata de una función distinta del [inicio de sesión OAuth2](oauth2.md), en el que Chamilo utiliza un proveedor de identidad externo para autenticar a los usuarios.

## Activar y configurar

En **Administración > Parámetros de configuración > Seguridad**, active `security.oauth_server_enabled`. El acceso a MCP también depende de la configuración existente `security.mcp_enabled` y del rol MCP permitido al usuario.

El servidor expone las rutas estándar de autorización, token, registro y revocación (`/oauth/authorize`, `/oauth/token`, `/oauth/register`, `/oauth/revoke`) y los metadatos de descubrimiento. En producción, los clientes solo deben utilizar HTTPS.

## Registrar un cliente

Chamilo admite clientes públicos de código de autorización con PKCE y clientes confidenciales registrados. El registro dinámico de clientes (DCR) utiliza `/oauth/register` y está sujeto a limitación de tasa. El parámetro `security.dynamic_client_registration` está **desactivado de forma predeterminada**; el endpoint sigue disponible para el flujo de registro MCP admitido, mientras que el parámetro controla los ámbitos de cliente adicionales aceptados por el registro. No dé por supuesto que activar el parámetro pone a disposición API protegidas arbitrarias.

Los clientes registrados disponen de una lista de **recursos permitidos** en el servidor. Actualmente, el registro de recursos define únicamente el recurso **MCP** y el ámbito `mcp`. Los nuevos recursos protegidos requieren una implementación explícita en el servidor y decisiones de permisos, no solo añadir una URL no reconocida a una solicitud. Chamilo valida los parámetros `resource` de la RFC 8707 a lo largo de la autorización y la gestión de tokens.

## Consentimiento del usuario y auditoría

1. Un cliente inicia una solicitud de código de autorización con PKCE (`S256`) y el ámbito o recurso solicitado.
2. El usuario se autentica con su inicio de sesión habitual de Chamilo si es necesario.
3. Chamilo muestra la identidad del cliente, los datos de registro y el acceso solicitado en una pantalla de consentimiento.
4. El usuario selecciona **Permitir** o **Denegar**. Una aprobación se registra como parte del historial de consentimientos del servidor, y la información de aprobaciones anteriores puede mostrarse en solicitudes posteriores.

El consentimiento queda vinculado a la solicitud mostrada al usuario. Una solicitud aprobada no concede otros recursos protegidos ni un acceso arbitrario más allá de los permisos solicitados.

## Notas de despliegue y seguridad

Las actualizaciones de OAuth 2.1 introducen un campo de recursos permitidos para los clientes y registros persistentes de consentimiento del cliente. Aplique las **migraciones de base de datos específicas de Chamilo** suministradas con la versión antes de activar el flujo actualizado. Mantenga privadas las URL de callback y los secretos de cliente OAuth. El registro de clientes no concede acceso sin restricciones a los usuarios o cursos de Chamilo.

Referencia de implementación: [Registro de clientes OAuth y consentimiento, PR #9231](https://github.com/chamilo/chamilo-lms/pull/9231).