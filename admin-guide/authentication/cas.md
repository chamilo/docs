# CAS

Chamilo supports **CAS** (Central Authentication Service), a single sign-on protocol commonly used in universities and research institutions.

## How CAS Works

1. When a user clicks "Log in with CAS" on the Chamilo login page, they are redirected to the CAS server
2. The user enters their credentials on the CAS server
3. The CAS server validates the credentials and redirects the user back to Chamilo with a ticket
4. Chamilo validates the ticket with the CAS server and logs the user in

## Configuration

Configure CAS in the platform settings:

| Setting | Description |
|---------|-------------|
| **CAS server URL** | The base URL of your CAS server (e.g., `https://cas.university.edu/cas`) |
| **CAS version** | The CAS protocol version (typically 2.0 or 3.0) |
| **Enable CAS** | Toggle CAS authentication on/off |

## User Matching

When a user logs in via CAS, Chamilo matches the CAS username to a local account. Configure:

* **Username attribute** — Which CAS attribute to use as the Chamilo username
* **Auto-registration** — Whether to automatically create accounts for new CAS users
* **Attribute mapping** — How CAS attributes map to Chamilo user profile fields

## Tips

* **Test the CAS URL** — Verify you can access the CAS login page directly before configuring Chamilo
* **Coordinate with IT** — Your IT department needs to register Chamilo as a CAS service
* **Configure logout** — Ensure CAS single logout (SLO) works so that logging out of Chamilo also logs the user out of CAS
