# Understanding the Interface

Chamilo 3.0 has a clean, modern interface designed to keep navigation simple. This page explains each part of the interface from a learner's point of view.

## The Top Bar

The top bar is always visible at the top of every page. It contains:

* **Platform logo** — Click it to return to the home page at any time.
* **Inbox icon** <img src="/.gitbook/assets/icons/mdi-inbox.svg" alt="Inbox" data-size="line"> — Shows your messages. A red badge indicates unread messages. Click to open your [Inbox](../inbox.md).
* **Support ticket icon** <img src="/.gitbook/assets/icons/mdi-ticket-account.svg" alt="Support" data-size="line"> — If enabled by your administrator, this gives you access to the support ticket system. Not every platform enables it, so you may only see the inbox icon and your avatar.
* **Your avatar** — A circular image in the top-right corner. Click it to open a dropdown menu:

![Your avatar menu, with links to My profile, My certificates, My skills, and Sign out](/.gitbook/assets/student-avatar-menu.png)

* **My profile** — Edit your personal information, change your password, and (if enabled) set up two-factor authentication
* **My certificates** — Every certificate you've earned, across all your courses
* **My skills** — Competency badges you've been awarded
* **Sign out**

## The Sidebar

The sidebar on the left is your main navigation. It can be collapsed to give more space to the content area. Click the toggle arrow at its right edge to expand or collapse it. Chamilo remembers your preference.

The sidebar contains the following links (some may be hidden depending on your platform's configuration):

| Menu item | Icon | Description |
|-----------|------|-------------|
| **Home** | <img src="/.gitbook/assets/icons/mdi-home.svg" alt="Home" data-size="line"> | Returns to the main dashboard |
| **My courses** | <img src="/.gitbook/assets/icons/mdi-book-open-page-variant.svg" alt="Courses" data-size="line"> | Lists all courses you are enrolled in |
| **My sessions** | <img src="/.gitbook/assets/icons/mdi-google-classroom.svg" alt="Sessions" data-size="line"> | Lists your training sessions (current, past, upcoming) |
| **Explore more courses** | <img src="/.gitbook/assets/icons/mdi-bookmark-multiple.svg" alt="Catalogue" data-size="line"> | Browse the course catalog to find and self-enroll in new courses |
| **Agenda** | <img src="/.gitbook/assets/icons/mdi-calendar-text.svg" alt="Agenda" data-size="line"> | Your personal and course calendar |
| **Reporting** | <img src="/.gitbook/assets/icons/mdi-chart-box.svg" alt="Reporting" data-size="line"> | Expands to **Progress** — your own [My Progress](../my-progress.md) overview |
| **Social network** | <img src="/.gitbook/assets/icons/mdi-sitemap-outline.svg" alt="Social network" data-size="line"> | Expands to the [Social Network](../social-network.md) and related links, if enabled |
| **Videoconference** | <img src="/.gitbook/assets/icons/mdi-video.svg" alt="Video" data-size="line"> | Access live video sessions (if configured) |

**Reporting** and **Social network** aren't plain links — clicking them expands a small list of sub-items right in the sidebar:

![The sidebar with Reporting and Social network expanded, showing their sub-items](/.gitbook/assets/student-sidebar-expanded.png)

* Under **Reporting**: just **Progress**, taking you to [My Progress](../my-progress.md).
* Under **Social network**: **Home** (the social wall), **Messages** (a shortcut to your [Inbox](../inbox.md)), **My friends**, **Social groups** — and, somewhat unexpectedly grouped in here too, **My files** (your personal file storage) and **Personal data** (an export of the personal data the platform holds about you). These last two aren't really "social" features; they just live in this part of the sidebar.

If your account has additional roles (for example, you also teach a course), you may see extra sidebar items — like **Administration** — that a learner-only account never sees.

At the very bottom of the sidebar, you will find a **Sign out** option to quickly sign out when you're done. This option is also available from your avatar icon's drop-down menu on the top-right corner.
If the platform is managed through external authentication methods, these signing out options might not be available.

## The Main Content Area

The central area of the screen displays the content of the current page. At the top, you will often see a **breadcrumb trail** showing your current location in the platform (for example: Home > Rock music > Documents). Use the breadcrumbs to navigate back to a parent page.

## The Course Homepage

When you enter a course, you see the **course homepage**:

* **Course title** — Displayed prominently at the top
* **Course introduction** — An optional rich-text description written by your teacher
* **Tool grid** — A grid of icons representing the tools available in this course (Documents, Exercises, Forums, etc.)

Only the tools your teacher has made visible appear in this grid — see [Finding Your Way Around a Course](../courses/course-tools-overview.md) for what each one does. Controls for editing the course itself (previewing as a student, showing/hiding tools, reordering them) only appear to teachers and course administrators — you won't see them on a course you're enrolled in as a learner.

## Icon Colors

This is still experimental and not entirely complete in Chamilo 3.0, but we're trying to use the following rules for all buttons and action icons in the interface:

* **Green** for creation actions. This includes adding, creating, importing, saving and copying content.
* **Blue** for view actions. This includes exporting, viewing, previewing in lists or in detail views, searching and downloading.
* **Orange** for editing actions. This includes editing, moving, configuring, enabling/disabling, hiding and showing.
* **Red** for deletion/removal actions. This includes deleting, removing, unsubscribing.
* **Grey** for cancelling actions. Just leaving things in the status quo.

## Responsive Design

Chamilo 3.0 adapts to different screen sizes. On a mobile device or narrow browser window:

* The sidebar is hidden by default and can be opened by tapping the menu icon
* Course cards display in a single column instead of a grid
* Tables become scrollable horizontally

This means you can access your courses from a phone, tablet, or computer, though the interface may look slightly different depending on the device.
