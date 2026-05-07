# Installation

This section covers everything you need to install and configure Chamilo 2.0 on your server.

Chamilo 2.0 is a PHP application built on the Symfony framework. It can run on most Linux-based servers, has been installed and runs on Windows Server with IIS, and supports MySQL and MariaDB backends.

## Installation Steps

1. **[Server Requirements](server-requirements.md)** — Verify your server meets the minimum requirements
2. **[Installation Wizard](installation-wizard.md)** — Run the web-based installation wizard
3. **[Configuration](configuration.md)** — Configure environment variables and Symfony settings
4. **[Cloud Storage](cloud-storage.md)** — Set up cloud storage backends (optional)
5. **[Email Configuration](email-configuration.md)** — Configure email delivery
6. **[Upgrading](upgrading.md)** — Upgrade from a previous version

## Quick Overview

The basic installation process is:

1. Download or clone the Chamilo source code
2. Install PHP dependencies with Composer if preparing from source
3. Install JavaScript dependencies with npm/yarn and build frontend assets
4. Create an empty `.env` file to store your database credentials and other settings later on
5. Change permissions (writeable by the web server) on *var/*, *config/* and *.env*
6. Run the web-based installation wizard
7. Connect with your first administrator account
8. Change permissions back on *config/* and *.env*

Detailed instructions for each step are in the pages linked above.
