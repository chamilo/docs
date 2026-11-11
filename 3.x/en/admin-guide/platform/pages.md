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

## Where Each Category Appears

The page creation and edition form ends with two diagrams that show where the pages of each category are displayed. Use them to pick the right **Category** before writing the content.

![The page edition form, with the title, friendly URL, enabled, category, language and content fields, followed by two diagrams of the login page and of the interface of signed-in users, whose blue areas are labelled with the page categories index, faq, demo, footer_public, home, menu_links and footer_private](../../.gitbook/assets/admin-pages-form.png)

* **Login page (visitors who are not signed in)** — the `index` pages fill the main area next to the login form, and the `footer_public` pages are shown in the footer. The `index`, `faq` and `demo` categories also appear as entries in the top bar.
* **Interface of signed-in users** — the `home` pages fill the main area of the home page. The `menu_links` pages are listed in the side menu and the `footer_private` pages are shown in the footer.

The highlighted blue areas are the places a page can take; the grey blocks are Chamilo's own interface, which pages do not replace.

## Menu Link Categories

Two categories turn their enabled pages into a list of links (each link shows the page title and opens the page) instead of rendering their content in place:

* **`menu_links`** — links shown to everyone: under the login form for anonymous visitors, and at the bottom of the left sidebar for logged-in users. Use it for content every user may need, such as legal notices or terms of use.
* **`menu_public_links`** — links shown **only to anonymous visitors**, under the login form on the homepage and on the login page. They disappear once the user logs in. Use it for content aimed at prospective users, such as a presentation of the platform or how to request an account.

When both categories have pages, the `menu_links` links are listed first.

## The Registration Intro Page

**Platform > Setting the registration page** is a shortcut into this same Pages system for one specific placement: the introductory text shown above the public sign-up form. It's restricted to Portal Administrators. Clicking it either:

* Opens the existing intro page for editing, if one already exists for your access URL and language, or
* Creates the placement on the fly and takes you straight to creating its content

Whatever you save here is rendered as an info box directly above the registration form — a natural place for instructions, terms specific to your organization, or context prospective users should read before signing up. Leave it disabled (or never create it) to show the plain registration form with no intro text.
