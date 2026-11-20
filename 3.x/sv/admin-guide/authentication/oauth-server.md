# OAuth 2.1-auktoriseringsserver och MCP-klienter

Chamilo kan fungera som en **OAuth-auktoriseringsserver** för klienter som ansluter till dess skyddade resurser. Detta är en annan funktion än [OAuth2-inloggning](oauth2.md), där Chamilo använder en extern identitetsleverantör för att logga in användare.

## Aktivera och konfigurera

Under **Administration > Konfigurationsinställningar > Säkerhet**, aktivera `security.oauth_server_enabled`. MCP-åtkomst beror också på den befintliga konfigurationen `security.mcp_enabled` och användarens tillåtna MCP-roll.

Servern exponerar standardrutter för auktorisering, token, registrering och återkallelse (`/oauth/authorize`, `/oauth/token`, `/oauth/register`, `/oauth/revoke`) samt upptäcktsmetadata. Endast HTTPS bör användas för produktionsklienter.

## Registrera en klient

Chamilo stöder publika PKCE-klienter med auktoriseringskod och registrerade konfidentiella klienter. Dynamisk klientregistrering (DCR) använder `/oauth/register` och är hastighetsbegränsad. Inställningen `security.dynamic_client_registration` är **inaktiverad som standard**; slutpunkten förblir tillgänglig för det stödda MCP-registreringsflödet, medan inställningen styr de ytterligare klientomfång som accepteras vid registrering. Anta inte att en ändring av inställningen gör godtyckliga skyddade API:er tillgängliga.

Registrerade klienter har en serversidig lista över **tillåtna resurser**. För närvarande definierar resursregistret endast resursen **MCP** och omfånget `mcp`. Nya skyddade resurser kräver explicit serverimplementation och behörighetsbeslut, inte enbart att en okänd URL läggs till i en begäran. Chamilo validerar RFC 8707-parametrar av typen `resource` genom hela auktoriserings- och tokenhanteringen.

## Användarsamtycke och granskning

1. En klient startar en begäran med auktoriseringskod med PKCE (`S256`) och det begärda omfånget/resursen.
2. Användaren autentiserar sig med sin vanliga Chamilo-inloggning om det behövs.
3. Chamilo visar klientens identitet, registreringsuppgifter och den begärda åtkomsten på en samtyckesskärm.
4. Användaren väljer **Tillåt** eller **Neka**. Ett godkännande registreras som en del av serverns samtyckeshistorik, och information om tidigare godkännanden kan visas vid senare begäranden.

Samtycket är bundet till den begäran som visas för användaren. En godkänd begäran ger inte andra skyddade resurser eller godtycklig åtkomst utöver de begärda behörigheterna.

## Driftsättning och säkerhetsanmärkningar

OAuth 2.1-uppdateringarna inför ett fält för tillåtna resurser för klienter och beständiga poster för klientsamtycke. Tillämpa de **specifika Chamilo-databasmigreringarna** som medföljer versionen innan det uppdaterade flödet aktiveras. Håll callback-URL:er och OAuth-klienthemligheter privata. Klientregistrering ger inte obegränsad åtkomst till Chamilo-användare eller kurser.

Implementeringsreferens: [OAuth-klientregistrering och samtycke, PR #9231](https://github.com/chamilo/chamilo-lms/pull/9231).