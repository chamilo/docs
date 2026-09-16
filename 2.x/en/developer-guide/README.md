# Developer Guide

Welcome to the Chamilo 2.0 Developer Guide. This guide is for developers who want to understand the Chamilo architecture, extend the platform with plugins, use the API, customize the interface, or contribute to the project.

## Architecture at a Glance

Chamilo 2.0 is built on:

* **Backend**: Symfony 6.4 (PHP 8.2+) with Doctrine ORM and API Platform 3.0
* **Frontend**: Vue 3 with PrimeVue, Pinia state management, and Vue Router
* **Build system**: Webpack 5 via Symfony Webpack Encore, with Tailwind CSS
* **Authentication**: JWT tokens (lexik/jwt-authentication-bundle)
* **File storage**: Flysystem (supports local, AWS S3, Azure Blob, Google Cloud)

The codebase is organized into three Symfony bundles:

| Bundle | Purpose |
|--------|---------|
| **CoreBundle** | Platform core: users, settings, resources, admin, AI providers, security |
| **CourseBundle** | Course-specific features: documents, exercises, learning paths, forums, etc. |
| **LtiBundle** | LTI 1.3 integration for external learning tools |

## How This Guide Is Organized

1. **Getting Started** — Tech stack, development setup, project structure
2. **Backend** — Symfony architecture, entities, resource system, controllers, settings
3. **API** — REST API via API Platform, JWT authentication, custom actions
4. **Frontend** — Vue components, views, routing, state management, build system
5. **Theming** — Color themes, CSS/Tailwind, Twig templates
6. **Plugins** — Plugin architecture and development
7. **Contributing** — Coding conventions, git workflow, testing
