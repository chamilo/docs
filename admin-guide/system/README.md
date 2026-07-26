# System

The **System** block on the administration dashboard groups server-level maintenance tools, the self-update workflow, storage/resource inspection utilities, and platform branding.

![The System block on the administration dashboard, listing Clean temporary files, System status, System update, Colors, File info, Resources by type, and List icons](/.gitbook/assets/admin-system-block.png)

## Accessing the System Block

From the administration panel, the **System** block appears alongside the other dashboard blocks. Click any of its links to open the corresponding tool.

## What's in the Block

* **[System Tools](system-tools.md)** — Clean temporary files, run the self-update workflow, inspect stored files and resources, and browse the built-in icon set
* **System status** — Covered in [System Status](../maintenance/system-status.md), under Maintenance
* **[Branding](branding/README.md)** — Color themes (the block's "Colors" link opens the same Color Themes page), portal customization, and templates

Two additional items — **Data filler** and **E-mail tester** — only appear when the server has a `tests/` directory present, which is a development/QA setup, not a production one. They won't appear on a typical production install; see [System Tools](system-tools.md#development-only-tools) for what they do when present.
