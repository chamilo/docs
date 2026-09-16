# Platform Tools

This page covers the remaining, smaller items in the Platform management block.

## Extra Fields

**Platform > Extra fields** is a type selector, not a field list itself — it shows every object type that supports custom fields, and clicking one takes you to that type's own field editor. Available types include: user, course, session, question, learning path (and learning path item/view), skill, assignment (work), career, user certificate, survey, terms and conditions, forum category, forum post, exercise, exercise tracking, course announcement, message, document, attendance calendar, glossary, work correction comment, calendar event, and portfolio (plus scheduled announcements, if that feature is enabled).

For the most commonly used case — custom user profile fields — see [User Profiling](../users/user-profiling.md), which covers the same underlying feature from the user-management side.

## Mail Templates

**Platform > Mail templates** lets you override the wording of specific system e-mails (registration confirmation, subscription notifications, and similar) without touching server files. Each template has a title, a **type** matching the specific built-in e-mail it overrides, the template body itself (plain text/Twig, not a rich editor), and a "set as default" flag — only one template per type can be the active default. Templates are scoped per access URL; there's no separate per-language field, so language handling for these e-mails is whatever the surrounding code already does.

Templates render through a **sandboxed** Twig environment for security: only a small set of tags and filters is allowed, and the only data available is the recipient's `User` object, referenced as `user.getEmail()`, `user.getFirstname()`, and similar getters (`getId`, `getUsername`, `getLastname`, `getStatus`, `getOfficialCode`, `getPhone`). Anything outside that allowlist doesn't error loudly — it silently renders empty, which then falls back to the original built-in template. Keep your custom templates simple and test them (using a real registration or notification trigger) after editing.

## Contact Form Categories

**Platform > Contact form categories** manages the dropdown shown on your portal's public **Contact us** form. Each category is just a title and a destination e-mail address — whichever category a visitor picks determines which inbox their message is routed to. Use this to route different topics (support, sales, admissions) to different teams without building separate forms.

## Settings-Category Shortcuts

A few block items are simply direct links into specific categories of [Platform Settings](../platform-settings/README.md), rather than separate tools:

* **Plugins** and **System templates** open Configuration Settings pre-filtered to those categories
* **Regions** does the same, for platform region settings

## Occasionally-Visible Items

A handful of items only appear when the relevant setting or plugin is active, so you may not see them on your installation:

* **Terms and Conditions** — appears when **Allow terms and conditions** is enabled, for managing the text users must accept
* **Notifications** — appears when the platform notification-events feature is enabled
* **CMS**, **Dictionary**, **Justification** — each tied to its own optional plugin being installed and enabled
