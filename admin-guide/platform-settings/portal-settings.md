# Portal Settings

Portal settings control the identity and public-facing configuration of your Chamilo platform. Access them from **Administration > Configuration settings > Portal**.

## Platform Identity

| Setting | Description |
|---------|-------------|
| **Platform name** | The name displayed in the browser title bar, emails, and throughout the interface. Example: "My University LMS". |
| **Institution name** | Your organization's name. Displayed on the login page and footer. |
| **Institution URL** | A link to your organization's main website. Clicking the institution name in the interface navigates here. |

## Registration Settings

These settings control whether and how new users can register on the platform.

| Setting | Description |
|---------|-------------|
| **Allow self-registration** | When enabled, visitors can create their own account from the login page. When disabled, only administrators can create accounts. |
| **Registration type** | Controls the level of openness: **Open** (anyone can register), **Approval required** (admin must approve new accounts), or **Closed** (self-registration disabled). |
| **Allow registration as teacher** | When self-registration is enabled, this determines whether users can choose the teacher role during registration. |
| **Registration required fields** | Configure which profile fields are mandatory during registration (e.g., phone number, language, official code). |

When self-registration is disabled, administrators must create accounts manually or import them via CSV/XML.

## Homepage Configuration

The homepage is the first thing users see after logging in (or before, for public platforms).

| Setting | Description |
|---------|-------------|
| **Homepage content** | Rich-text content displayed on the main landing page. Supports HTML. Edit via **Administration > Configure the homepage**. |
| **Homepage for logged-in users** | You can set different homepage content for authenticated users versus anonymous visitors. |
| **Show course catalog on homepage** | When enabled, the course catalog is accessible directly from the homepage. |
| **Navigation links** | Add custom links to the homepage (e.g., help pages, external resources). Managed from the homepage editor. |

## Legal Terms and Conditions

Chamilo includes a built-in legal terms and conditions module that can require users to accept terms before using the platform.

| Setting | Description |
|---------|-------------|
| **Enable terms and conditions** | Activates the legal terms module. Users must accept terms on first login. |
| **Terms content** | The legal text users must accept. Supports multiple languages. Managed via **Administration > Terms and conditions**. |
| **Terms version** | Each update to the terms creates a new version. Users who accepted a previous version will be prompted to accept the updated terms. |
| **Terms on registration** | When enabled, terms are shown during the registration process rather than on first login. |

## Contact Information

| Setting | Description |
|---------|-------------|
| **Administrator email** | The primary contact email for the platform. Used as the "From" address in system emails and displayed on error pages. |
| **Administrator name** | The name associated with system emails (e.g., "Platform Admin"). |
| **Administrator surname** | The surname associated with system emails. |
| **Administrator phone** | An optional contact phone number displayed on the contact page. |

## Tips

* **Set the platform name early** -- It appears in browser bookmarks and email subjects, so changing it later can confuse users.
* **Review legal terms regularly** -- If your organization's privacy policy or usage terms change, update the terms and conditions in Chamilo so users are prompted to re-accept them.
* **Use approval-based registration** for semi-open platforms where you want users to self-register but still want to vet accounts before granting access.
