# OAuth 2.1 Authorization Server and MCP Clients

Chamilo can act as an **OAuth authorization server** for clients that connect to its protected resources. This is a different feature from [OAuth2 login](oauth2.md), where Chamilo uses an external identity provider to sign users in.

## Enable and configure

Under **Administration > Configuration settings > Security**, enable `security.oauth_server_enabled`. MCP access also depends on the existing `security.mcp_enabled` configuration and the user's permitted MCP role.

The server exposes standard authorization, token, registration and revocation routes (`/oauth/authorize`, `/oauth/token`, `/oauth/register`, `/oauth/revoke`) and discovery metadata. Only HTTPS should be used for production clients.

## Register a client

Chamilo supports public PKCE authorization-code clients and registered confidential clients. Dynamic client registration (DCR) uses `/oauth/register` and is rate-limited. The `security.dynamic_client_registration` setting is **disabled by default**; the endpoint remains available for the supported MCP registration flow, while the setting controls the additional client scopes accepted by registration. Do not assume that toggling the setting makes arbitrary protected APIs available.

Registered clients have a server-side **allowed resources** list. Currently the resource registry defines only the **MCP** resource and `mcp` scope. New protected resources require explicit server implementation and permission decisions, not merely adding an unrecognised URL to a request. Chamilo validates RFC 8707 `resource` parameters throughout authorization and token handling.

## User consent and audit

1. A client starts an authorization-code request with PKCE (`S256`) and the requested scope/resource.
2. The user authenticates with their ordinary Chamilo login if necessary.
3. Chamilo shows the client identity, registration details and the access being requested on a consent screen.
4. The user selects **Allow** or **Deny**. An approval is recorded as part of the server's consent history, and previous approval information may be displayed on later requests.

Consent is bound to the request shown to the user. An approved request does not grant other protected resources or arbitrary access beyond the requested permissions.

## Deployment and security notes

The OAuth 2.1 updates introduce an allowed-resources field for clients and persistent client-consent records. Apply the **specific Chamilo database migrations** supplied with the release before enabling the updated flow. Keep callback URLs and OAuth client secrets private. Client registration does not grant unrestricted access to Chamilo users or courses.

Implementation reference: [OAuth client registration and consent, PR #9231](https://github.com/chamilo/chamilo-lms/pull/9231).
