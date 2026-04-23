# Installation Wizard

Chamilo 2.0 includes a web-based installation wizard that guides you through the initial setup. The wizard runs automatically when you access the platform for the first time.

## Before You Start

Ensure the following prerequisites are met:

1. Your server meets all [server requirements](server-requirements.md).
2. You have downloaded or cloned the Chamilo source code.
3. You have installed PHP dependencies: `composer install`
4. You have installed JavaScript dependencies and built assets: `npm install && npm run build`
5. Your web server is configured to serve the `public/` directory as the document root.
6. Your `.env.local` file exists (it can be minimal at this point -- the wizard will guide database setup).

## Step 1: Installation Language

![Installation wizard Step 1 — language selection](/.gitbook/assets/install-step1-language.png)

The first step lets you select the language for the installation process. Choose your preferred language from the dropdown.

If Chamilo detects an existing installation (for an upgrade), it will display the migration status and offer an upgrade path instead of a fresh install.

## Step 2: Requirements Check

![Installation wizard Step 2 — requirements check showing PHP version, extensions, and directory permissions](/.gitbook/assets/install-step2-requirements.png)

The wizard checks your server environment:

* **PHP version** is 8.2 or higher
* **Required PHP extensions** are installed (intl, gd, curl, zip, mbstring, xml, etc.)
* **Recommended PHP settings** — `date.timezone` is configured, adequate upload/memory limits
* **Directory and file permissions** — `var/`, `config/`, and `public/upload/` are writable by the web server

If any requirements are not met, the wizard displays warnings or errors. Resolve them before proceeding.

## Step 3: License

![Installation wizard Step 3 — license acceptance](/.gitbook/assets/install-step3-license.png)

This step displays the GNU GPL v3 license. You must check the **"I accept"** checkbox to proceed.

Optionally, you can expand the **Contact information** section to provide details about your organization (name, email, company, country). This is voluntary and helps the Chamilo community understand who uses the platform.

## Step 4: Database Settings

![Installation wizard Step 4 — database connection configuration](/.gitbook/assets/install-step4-database.png)

Enter your database connection details:

| Field | Description |
|-------|-------------|
| **Database host** | The hostname or IP of your database server (e.g., `localhost` or `127.0.0.1`) |
| **Database port** | Default: 3306 for MySQL/MariaDB, 5432 for PostgreSQL |
| **Database name** | The name of the database to use (alphanumeric and underscores only) |
| **Database user** | A database user with full privileges on the specified database |
| **Database password** | The password for the database user |

Click **Check database connection** to test. The wizard will not let you proceed until the connection is successful. If the database already exists, a warning is displayed.

## Step 5: Configuration Settings

![Installation wizard Step 5 — administrator account, portal settings, and email configuration](/.gitbook/assets/install-step5-config.png)

This step combines administrator account creation, portal settings, and email configuration.

### Administrator Account

| Field | Description |
|-------|-------------|
| **Login** | The administrator username |
| **Password** | Choose a strong password — this account has full platform access |
| **First name** | The administrator's first name |
| **Last name** | The administrator's last name |
| **Email** | Used for system notifications and password resets |
| **Phone** | Optional contact number |

### Portal Settings

| Field | Description |
|-------|-------------|
| **Language** | The default interface language |
| **Chamilo URL** | The base URL where the platform is accessible |
| **Portal name** | The name of your platform (e.g., "My Organization LMS") |
| **Company short name** | Your organization's abbreviated name |
| **Company URL** | Your organization's website |
| **Encryption method** | Password hashing algorithm — **bcrypt** is recommended |
| **Allow self-registration** | Yes / No / After approval |
| **Allow self-registration as trainer** | Yes / No |

### Email Configuration

The email settings section lets you configure the mail transport (SMTP, Amazon SES, Mailjet, etc.) and test email delivery. See [Email Configuration](email-configuration.md) for details.

All these settings can be changed later from the administration panel.

## Step 6: Last Check Before Install

![Installation wizard Step 6 — review of all settings before installation](/.gitbook/assets/install-step6-review.png)

This step displays a summary of everything you entered for review:

* Administrator credentials (password is hidden by default — click the eye icon to reveal)
* Portal settings
* Database connection details

Review carefully, then click **Install Chamilo** to execute the installation. The wizard creates all database tables, populates initial data, and configures the platform.

A progress bar shows the installation status.

## Step 7: Installation Complete

![Installation wizard Step 7 — completion with security advice and portal link](/.gitbook/assets/install-step7-complete.png)

After installation completes successfully, the wizard shows:

* **Getting started advice** — Suggests creating your first course to explore the platform
* **Security recommendations**:
  * Make the `config/` directory read-only (`chmod 0555`)
  * Delete the `public/main/install/` directory
* A **link to your portal** to log in with the administrator credentials you just created

## Post-Installation

After completing the wizard:

* **Remove or restrict access to the installer** -- The wizard should not be accessible after installation. Chamilo typically locks it automatically, but verify that re-visiting the install URL redirects to the login page.
* **Configure email delivery** -- See [Email Configuration](email-configuration.md).
* **Set up backups** -- Before adding content, configure automated database and file backups.
* **Review security settings** -- See [Security Settings](../platform-settings/security-settings.md).

## Troubleshooting

| Problem | Solution |
|---------|----------|
| Blank page at install URL | Check PHP error logs. Ensure `APP_ENV=dev` temporarily to see errors in the browser. |
| Database connection fails | Verify credentials, confirm the database exists, check that the database server allows connections from the web server host. |
| Permission denied errors | Ensure `var/`, `config/`, and `public/upload/` are writable by the web server user. |
| Assets not loading (no CSS/JS) | Run `npm install && npm run build` to compile frontend assets. |
