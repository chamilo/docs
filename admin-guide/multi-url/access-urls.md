# Access URLs

Access URLs allow a single Chamilo installation to serve multiple separate portals.

## Use Cases

* **Multi-tenant deployments** — Host separate training portals for different organizations on a single server
* **Departmental portals** — Give each department its own branded portal (e.g., `hr.training.company.com`, `it.training.company.com`)
* **Regional portals** — Separate portals for different regions or languages

## How It Works

Each access URL is a separate entry point to the same Chamilo installation:

* Users can be assigned to one or more access URLs
* Courses and sessions belong to specific access URLs
* Platform settings can be customized per access URL
* Branding and themes can differ per URL
* Users on one portal cannot see users or courses on another (unless explicitly shared)

## Configuration

### Enabling Multi-URL

Multi-URL must be enabled in the Chamilo configuration (typically in the environment settings). This is usually done during initial setup.

### Creating an Access URL

1. From the administration panel, navigate to **Access URLs**
2. Click **Add a URL**
3. Enter the URL (e.g., `https://portal2.yoursite.com`)
4. Configure settings specific to this URL
5. Save

### Assigning Users and Courses

* **Users** — Assign users to specific access URLs. A user can belong to multiple URLs.
* **Courses** — Assign courses to specific access URLs
* **Sessions** — Assign sessions to specific access URLs

### Per-URL Settings

Each access URL can have its own:

* **Color theme** — Different visual branding
* **Platform name and logo** — Custom identity
* **Settings overrides** — Certain platform settings can be customized per URL

## Tips

* **Plan URL structure** — Decide on your URL scheme before creating access URLs, as changing URLs later affects all existing links and bookmarks
* **DNS configuration** — Each access URL must resolve to the same Chamilo server. Configure DNS records accordingly.
* **Global administrator** — Use the Global Administrator role to manage across all access URLs
