# Admin Interface Overview

The administration panel is your command center for managing the Chamilo platform. Access it by clicking **Administration** <img src="/.gitbook/assets/icons/mdi-cogs.svg" alt="Admin" data-size="line"> in the sidebar.

## Administration Dashboard

![The administration dashboard showing functional blocks for Users, Courses, Sessions, and Settings](/.gitbook/assets/admin-dashboard-overview.png)

The admin dashboard is organized into functional blocks. Each block groups related management tools:

### Users

* **User list** — View, search, edit, and manage all users on the platform
* **Add a user** — Create individual user accounts
* **Classes** — Manage user classes for bulk session enrollment

See the [Users](../users/README.md) chapter for details.

### Courses

* **Course list** — View and manage all courses on the platform
* **Create a course** — Create a new course
* **Course categories** — Organize courses into categories for the catalog

See the [Courses](../courses/README.md) chapter for details.

### Sessions

* **Session list** — View and manage training sessions
* **Create a session** — Set up a new session with courses and enrollment
* **Session categories** — Organize sessions into categories
* **Careers and promotions** — Manage career paths and promotion workflows

See the [Sessions](../sessions/README.md) chapter for details.

### Platform

* **Configuration settings**, **Languages**, **Portal news**, **Global agenda**, **Pages**, **Extra fields**, **Mail templates**, **Contact form categories**, and more — see the [Platform](../platform/README.md) chapter for details. The "Configuration settings" link is the entry point to the separate [Platform Settings](../platform-settings/README.md) chapter.

### Reporting

* **Global statistics**, **Reports catalog**, **Learning analytics**, **Quarterly report**, **Teachers time report**, **Corporate report**, **Special exports**, **Tickets** — Platform statistics and reporting; see the [Reporting](../reporting/README.md) chapter for details

### Skills

* **Skills wheel**, **Skills import**, **Manage skills**, **Manage skills levels**, **Skills ranking**, **Skills and assessments** — Competency badges linked to gradebook results; see the [Skills](../skills/README.md) chapter for details

### System

* **Clean temporary files**, **System status**, **System update**, **Colors**, **File info**, **Resources by type**, **List icons** — Server maintenance, self-update, and branding; see the [System](../system/README.md) chapter for details

### Rooms

* **Branches**, **Rooms**, **Room availability finder** — Physical sites and bookable training rooms; see the [Rooms](../rooms/README.md) chapter for details

### Security

* **Activities audit**, **Login attempts**, **Simple IDS**, **Password strength checker** — Security monitoring and auditing tools; see the [Security](../security/README.md) chapter for details

### Plugins

* Shortcuts to installed plugins that declare an admin menu page, plus general plugin management — see the [Plugins](../plugins/README.md) chapter for details

### Health Check

* Live pass/fail checks (mail settings, admin URL assignment, file permissions) — see the [Health Check](../health-check.md) page for details

### Other Blocks

* **Chamilo.org**, **Version check**, **Professional support**, **News from Chamilo** — links and status panels pulling content from the Chamilo project; see [Other Admin Blocks](../other-admin-blocks/README.md) for details

Each section is covered in detail in its corresponding chapter of this guide.

Authentication methods like OAuth2, LDAP, CAS, and other external authentication providers are not configured in the administration dashboard but in `config/authentication.yaml`.
