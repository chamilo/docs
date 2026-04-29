# Platform Settings

Chamilo has an extensive configuration system with settings organized into categories. The full set of categories below mirrors the **Configuration settings** page in the admin panel — and the underlying `SettingsCurrentFixtures.php` in the source code, which is the source of truth for variable names, titles, and descriptions.

Access platform settings from the administration panel by clicking **Configuration settings**.

![The platform settings page showing configuration categories organized by functional area](/.gitbook/assets/admin-settings-categories.png)

## All categories

There are **39 configuration categories** in total, listed alphabetically below. The number after each link is the count of settings in that category.

### Platform-wide

* **[Administrator Identity](admin-settings.md)** (12) — Identity and contact details of the platform administrator.
* **[Platform](platform-settings.md)** (29) — Platform-level identity, time zone, registration policy, online users, performance flags.
* **[Display](display-settings.md)** (24) — Homepage layout, gravatar, menus, branding behaviour.
* **[Editor](editor-settings.md)** (26) — Rich-text editor (TinyMCE) toolbars, plugins, AI helpers.
* **[Languages](language-settings.md)** (12) — Available languages, default language, fallbacks.
* **[Mail](mail-settings.md)** (18) — Outgoing-mail layout, sender identity, signature.
* **[Workflows](workflows-settings.md)** (23) — Cross-cutting workflow toggles (course creation, enrollment validation…).

### Authentication, security & privacy

* **[Security](security-settings.md)** (31) — Login protection, password policy, headers, 2FA, IDS.
* **[Registration](registration-settings.md)** (20) — Self-registration policy and post-registration redirects.
* **[Privacy](privacy-settings.md)** (6) — Consent, data export, account-deletion requests.
* **[CAS](cas-settings.md)** (7) — Legacy CAS configuration carried over from 1.x.

### Course and session lifecycle

* **[Course](course-settings.md)** (45) — Defaults and policies that apply to courses platform-wide.
* **[Sessions](session-settings.md)** (68) — Session lifecycle, coach access windows, visibility.
* **[Course Catalog](catalog-settings.md)** (13) — Behaviour of the public course catalog.
* **[Profile](profile-settings.md)** (29) — Which fields appear on the user profile.

### Course tools

* **[Agenda](agenda-settings.md)** (11)
* **[Announcements](announcement-settings.md)** (9)
* **[Assignments (Work)](work-settings.md)** (12)
* **[Attendance](attendance-settings.md)** (4)
* **[Chat](chat-settings.md)** (5)
* **[Documents](document-settings.md)** (29)
* **[Dropbox](dropbox-settings.md)** (8)
* **[Exercises (Tests)](exercise-settings.md)** (63)
* **[Forums](forum-settings.md)** (9)
* **[Glossary](glossary-settings.md)** (3)
* **[Groups](group-settings.md)** (3)
* **[Learning Paths](lp-settings.md)** (51)
* **[Surveys](survey-settings.md)** (12)

### Assessment & recognition

* **[Gradebook (Assessments)](gradebook-settings.md)** (34) — Score display, decimals, certificate thresholds.
* **[Certificates](certificate-settings.md)** (9) — Defaults applied when a learner earns a certificate.
* **[Skills](skill-settings.md)** (13) — Skills tree, awarding rules, profile integration.
* **[Tracking](tracking-settings.md)** (10) — What is recorded, what reports are exposed.

### Communication & community

* **[Messaging](message-settings.md)** (7)
* **[Social Network](social-settings.md)** (7)

### AI

* **[AI Helpers](ai-helpers-settings.md)** (13) — Providers per task type (text, image, video, tutor, grading).

### Operations & integration

* **[Cron Jobs](crons-settings.md)** (3)
* **[Search](search-settings.md)** (3) — Xapian full-text search configuration.
* **[Tickets](ticket-settings.md)** (7) — Helpdesk system.
* **[Web Services](webservice-settings.md)** (7) — Legacy SOAP/REST endpoints.

## Cross-cutting topics

These pages don't map to a single category — they collect settings from several categories around a topic.

* **[Module Settings](module-settings.md)** — Enable/disable platform modules and features at a higher level.
* **[Performance Tuning](performance-tuning.md)** — Caching and load-related settings.

## How Settings Work

* Settings are stored in the database and managed through the web interface
* Some settings are **URL-locked** in multi-URL setups (their value applies platform-wide and cannot be overridden per URL); others can be overridden per access URL
* Changes take effect immediately (no server restart required)
* Some settings have dependencies — changing one may affect the behaviour of others
* Variable names shown on each page (e.g. `2fa_enable`) match the row in the `settings_current` database table and the keys used in `.env` overrides where applicable

## Tips

* **Document your settings** — Keep a record of non-default settings and why you changed them
* **Change one thing at a time** — When troubleshooting, modify one setting at a time so you can identify the effect
* **Test in a staging environment** — For significant setting changes, test on a staging server first
