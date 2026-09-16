# Pages

Pages is Chamilo's built-in, CMS-like tool for the content blocks that make up your portal's public-facing areas — the homepage, footer, navigation menus, and similar placements — without needing to touch a template file.

## Accessing Pages

From the administration panel, click **Platform > Pages**.

## How Pages Work

Each page has:

* **Title** and rich-text **content**
* A **slug**, generated automatically from the title
* **Enabled** — whether the page is currently visible
* **Position** — drag-and-drop ordering within its category
* **Locale** — content is per-language: the same placement can hold one page per language, and the site falls back to the platform's default language if no page exists for a visitor's language
* A **category** — this is what determines *where* the page is rendered (for example `index`, `home`, `footer_public`, or `menu_links`); Chamilo creates the categories it needs automatically

On a multi-URL (multi-portal) install, pages are also scoped per access URL, so each portal manages its own content.

## The Registration Intro Page

**Platform > Setting the registration page** is a shortcut into this same Pages system for one specific placement: the introductory text shown above the public sign-up form. It's restricted to Portal Administrators. Clicking it either:

* Opens the existing intro page for editing, if one already exists for your access URL and language, or
* Creates the placement on the fly and takes you straight to creating its content

Whatever you save here is rendered as an info box directly above the registration form — a natural place for instructions, terms specific to your organization, or context prospective users should read before signing up. Leave it disabled (or never create it) to show the plain registration form with no intro text.
