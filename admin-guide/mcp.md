# MCP (Model Context Protocol)

Chamilo 3.0 exposes an MCP server so AI assistants and agents (Claude, ChatGPT connectors, or any MCP-compatible client) can act inside the platform on behalf of an authenticated user, using that user's own permissions — there is no separate service account or elevated access.

## What MCP Adds to Chamilo

MCP (Model Context Protocol) is an open standard that lets AI clients call a defined set of "tools" exposed by a server. Chamilo's MCP server is reachable at a single endpoint, `/mcp`, and exposes a curated set of teacher-facing course-management tools rather than the entire API surface.

## Available Capabilities

Every call runs as the connected user, so a tool only ever sees and modifies courses that user manages. The current tool set:

| Tool | What it does |
|------|---------------|
| Current user | Return the identity and roles of the authenticated user |
| Teacher courses | List courses the user manages as a teacher |
| Course overview | Return base-course information and resource counts |
| Create course | Create a new course using the platform's course-creation rules |
| Create course assignment | Create a draft or published assignment with a description and maximum score |
| Create course test | Create an AI-assisted multiple-choice test from a topic description or an existing document |
| Get course test response status | Report which students have answered, are in progress, or are pending on a test |
| Get user course test score | Return a student's latest and best completed scores on a test |
| Create training satisfaction survey | Create a seven-question satisfaction survey |
| Create course learning path | Create a learning path from pages supplied by the MCP client |
| List documents | List the documents in a course's Documents tool |
| Read course document | Return the HTML content, title, and metadata of an editable document |
| Edit course document | Replace the full HTML content of an existing editable document |
| Create course document | Create an AI-assisted HTML document in the root Documents folder |
| Create course illustration | Generate an AI illustration for a topic and save it as a document |
| Illustrate document paragraph | Insert an existing image or video before or after a paragraph in a document |
| Find recent course forum activity | Find recent, visible forum posts related to a topic |
| Review course quality | Analyze a course's learning paths, documents, tests, assignments, and surveys, and return improvement recommendations |

This list is curated by the Chamilo core team, not user-extensible from within the platform — teachers cannot add their own tools.

## How Users Connect

### Personal MCP API key

Each user generates their own key under **Social network** > **MCP API key**:

![The MCP API key page, showing an inactive key, the Generate API key button, and the Remote MCP connection block with the endpoint URL and Authorization header format](/.gitbook/assets/admin-mcp-api-key.png)

* Clicking **Generate API key** creates a key and displays it once — Chamilo only stores a masked version afterward, so the full key must be copied and stored securely immediately.
* Generating a new key immediately revokes the previous one.
* The page shows the key's status (active/inactive), the MCP endpoint to configure in the client, and the creation and last-used dates.
* The **Remote MCP connection** panel spells out exactly what to put in the MCP client: the endpoint URL and an `Authorization: Bearer <your MCP API key>` header.

As the page itself notes, the key authenticates the client as that user's account — it does not grant any permission the account does not already have.

### OAuth 2.1 (remote clients and connectors)

For MCP clients that support OAuth discovery and dynamic client registration (rather than a manually pasted key), Chamilo also acts as an OAuth 2.1 authorization server: the client discovers Chamilo's endpoints, registers itself, and redirects the user to `/oauth/authorize` to approve access. Approved applications appear under **Social network** > **Authorized applications**, where the user can revoke any they no longer use or recognize.

## Security Considerations

* **No privilege escalation.** Every MCP tool call and every OAuth-authorized app runs with the connecting user's own Chamilo permissions — a personal API key or an authorized app can never do more than that user could already do by hand.
* **Bearer-only, rate-limited.** `/mcp` accepts only a Bearer credential — a personal MCP API key, an OAuth access token, or (in development) a JWT. Authentication attempts are rate-limited per IP address to slow down credential-guessing.
* **Narrow public surface.** The only unauthenticated traffic `/mcp` accepts is the `OPTIONS` preflight; every actual call requires `ROLE_USER`. The OAuth discovery, dynamic client registration, and token endpoints are intentionally public, as required by the OAuth 2.1 / MCP specifications — this does not grant access by itself, it only lets a client learn how to start the authorization flow.
* **DNS-rebinding protection is deliberately disabled for `/mcp`.** The bundle that implements MCP normally restricts the endpoint to `localhost` unless a static list of allowed hostnames is configured — a poor fit for a multi-URL Chamilo portal reachable under many hostnames. Chamilo disables that check because it is redundant here: every `/mcp` request already requires a Bearer credential regardless of its `Host`/`Origin` header, and a DNS-rebinding attack (which relies on ambient, cookie-style authentication riding along with a spoofed Host) cannot forge a bearer token it doesn't already have.

## Configuring the MCP Server

Unlike most integrations in this guide, MCP has no admin-panel settings page — it is configured at the file level, in `config/packages/mcp.yaml`, and requires shell access to the server:

| Key | Purpose |
|-----|---------|
| `app`, `version`, `description` | Identity Chamilo reports to connecting MCP clients |
| `client_transports.stdio` / `client_transports.http` | Which transports are active; Chamilo enables both by default |
| `http.path` | The MCP HTTP endpoint (`/mcp` by default) |
| `http.allowed_hosts` | DNS-rebinding host allowlist — set to `false` on Chamilo (see Security Considerations above) |
| `http.session.store`, `.directory`, `.ttl` | Where MCP session state is persisted and for how long |

To disable the MCP server entirely, set `client_transports.http: false` (and `stdio: false` if the CLI transport should also be turned off) and clear the cache:

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

## Tips

* Treat an MCP API key like a password — anyone holding it can act as that user through any MCP client.
* Encourage users to periodically review **Authorized applications** and revoke anything they don't recognize.
* See [AI Configuration](integrations/ai-configuration.md) for the AI providers that back the content-generation tools (test creation, document creation, illustrations) listed above.
