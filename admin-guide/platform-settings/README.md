# Platform Settings

Chamilo has an extensive configuration system with settings organized into categories. This section covers the key settings you will configure most often.

Access platform settings from the administration panel by clicking **Configuration settings**.

![The platform settings page showing configuration categories organized by functional area](/.gitbook/assets/admin-settings-categories.png)

## Settings Categories

| Category | What it controls |
|----------|-----------------|
| **[Portal](portal-settings.md)** | Platform name, institution, homepage, registration, legal terms |
| **[Course](course-settings.md)** | Default course settings, catalog behavior, teacher permissions |
| **[Session](session-settings.md)** | Default session settings, visibility, enrollment behavior |
| **[Language](language-settings.md)** | Available languages, default language, sub-languages |
| **[User](user-settings.md)** | Profile fields, registration, user visibility |
| **[Module](module-settings.md)** | Enable/disable platform modules and features |
| **[Security](security-settings.md)** | Login attempts, CAPTCHA, password policies, file permissions |
| **[Performance](performance-tuning.md)** | Caching, loading optimizations |
| **[Assessment](assessment-settings.md)** | Grading, scoring, and certificate settings |
| **[Search](search-settings.md)** | Full-text search configuration |

## How Settings Work

* Settings are stored in the database and managed through the web interface
* Some settings can be overridden per access URL in multi-URL setups
* Changes take effect immediately (no server restart required)
* Some settings have dependencies — changing one may affect the behavior of others

## Tips

* **Document your settings** — Keep a record of non-default settings and why you changed them
* **Change one thing at a time** — When troubleshooting, modify one setting at a time so you can identify the effect
* **Test in a staging environment** — For significant setting changes, test on a staging server first
