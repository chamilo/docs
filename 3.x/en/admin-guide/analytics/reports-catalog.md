# Reports Catalog

The Reports Catalog isn't a report itself — it's a directory of every report registered on the platform, useful for understanding what's available and who can see it.

## Accessing the Reports Catalog

From the administration panel, click **Analytics > Reports catalog**.

## What It Shows

* **Report list** — Every registered report's **Report ID**, title, description, and both its canonical and legacy URL
* **Role matrix** — A view showing which roles (Portal Administrator, Global Administrator, Session Administrator, Teacher, Human Resources Manager, Student Boss...) can access each report
* **Permission categories** — The permission groups reports are organized into (for example `reports.platform`, `reports.learning_analytics`, `reports.export`, `reports.security`)

Use this page when you're trying to figure out where a specific report lives, or whether a given role (for example, a Human Resources Manager) has access to it, without having to check each report individually.

## Stable Report Identifiers

The catalog includes a **Report ID** column. IDs identify the report independently of its displayed title or route, which can change after localization or interface updates. The expanded Chamilo 3.1 registry includes **103 distinct report IDs**, including 27 modern Vue reports added to coverage. Use the ID when discussing a report with another administrator or submitting a technical issue; use the role matrix separately to check access.

See [Report registry improvements #9299](https://github.com/chamilo/chamilo-lms/pull/9299).
