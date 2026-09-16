# Access URLs

Access URLs allow a single Chamilo installation to serve multiple separate portals.

This tool is also reachable from the administration dashboard's [Platform](../platform/README.md) block, as **Configure multiple access URL**.


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
2. Click **Add URL**
3. Enter the URL (e.g., `https://portal2.yoursite.com`) and a description
4. Optionally pick a **Parent URL** to nest this URL under another one — see [URL Hierarchy](#url-hierarchy) below
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

## URL Hierarchy

Access URLs can be organized into a parent/child tree instead of a flat list. When creating or editing a URL, an unrestricted Global Administrator (see [Subtree Administrators](#subtree-administrators) below) can pick any other URL as its **Parent URL**:

![Edit URL dialog with the Parent URL dropdown open, listing the other access URLs available as a parent](/.gitbook/assets/admin-access-url-parent-select.png)

* The dropdown never offers the URL being edited, or any of its own descendants, as a possible parent — this prevents creating a cycle. The backend re-validates this regardless of what the interface shows.
* If a URL is created without picking a parent, it defaults to the **login-only URL** if one exists (see [Per-URL Settings](#per-url-settings) above), or otherwise to the first access URL — the same default behavior as before this feature existed.
* The topmost URL of a tree — the one with no parent — is that tree's **root**. A single Chamilo installation can host more than one independent tree.

Wherever access URLs are listed — the Multi-URL dashboard and the Access URLs management page — the tree is shown through indentation, a parent immediately followed by its own children (siblings sorted alphabetically), instead of a separate "Parent" column:

![Access URLs list showing a root URL with two child URLs, one of which has its own child URL, indented to reflect the hierarchy](/.gitbook/assets/admin-access-url-hierarchy-list.png)

## Subtree Administrators

The URL hierarchy also determines what a [Global Administrator](../users/user-roles.md) can manage:

* One registered on the **root** URL of a tree is **unrestricted**: they manage every access URL, exactly as before this feature existed.
* One registered only on a **non-root** URL is **scoped**: the Multi-URL and Access URLs pages only show that URL and its descendants, and the logins chart on the Multi-URL dashboard reads "Logins (your URLs)" instead of "Logins (all URLs combined)".

Regardless of scope, the following stay reserved to an **unrestricted** Global Administrator — a scoped administrator cannot perform them even for URLs within their own subtree:

* Creating a new access URL
* Editing an access URL's own URL, description, or parent
* Activating or deactivating an access URL
* Deleting an access URL (the root URL of the whole installation can never be deleted, by anyone)
* Registering themselves into every access URL at once

A scoped administrator can still manage everything *assigned to* the URLs in their subtree — users, courses, sessions, branding, and settings — just not the access URL entries themselves.

## Tips

* **Decide early** — If choosing a multi-URL setup, you should do that at the start of your Chamilo project as it requires leaving the first URL relatively empty of content. Enabling multi-URL afterwards is more challenging (requires manual databases changes).
* **Plan URL structure** — Decide on your URL scheme before creating access URLs, as changing URLs later affects all existing links and bookmarks
* **DNS configuration** — Each access URL must resolve to the same Chamilo server. Configure DNS records accordingly.
* **Global administrator** — Use the Global Administrator role to manage across all access URLs. To delegate management of just one branch instead, register the administrator on a non-root URL — see [Subtree Administrators](#subtree-administrators)
