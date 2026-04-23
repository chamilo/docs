# Symfony Architecture

## Bundles

Chamilo 2.0 is structured into three Symfony bundles:

### CoreBundle (`src/CoreBundle/`)

The largest bundle, handling all platform-wide concerns:

* **Users and authentication** — User entity, roles, JWT tokens, OAuth2 providers
* **Resource system** — ResourceNode and ResourceFile (the unified content abstraction)
* **Platform settings** — 43 settings schemas covering every configurable aspect
* **Administration** — Admin controllers for user, course, session, and plugin management
* **AI providers** — Factory pattern for OpenAI, Gemini, Mistral, DeepSeek, Grok
* **File storage** — Flysystem-based storage adapters (local, S3, Azure, GCS)
* **Security** — Voters, access control, role hierarchy
* **Tools** — 39 course tool definitions

### CourseBundle (`src/CourseBundle/`)

Everything specific to course content:

* **Content entities** — 101 entities for documents, exercises, learning paths, forums, glossaries, surveys, attendance, blogs, assignments, and more
* **Course copy** — Import/export with Common Cartridge 1.3 and Moodle format support
* **Course settings** — Course-level setting schemas

### LtiBundle (`src/LtiBundle/`)

LTI 1.3 standard implementation:

* **Platform and tool registration** — Manage external tool connections
* **Launch handling** — LTI launch flow controllers
* **Grade passback** — Return grades from external tools to Chamilo

## Service Container

Chamilo uses Symfony's dependency injection container. Services are configured in:

* `config/services.yaml` — Global service definitions
* Each bundle's `DependencyInjection/` directory — Bundle-specific services

## Security Architecture

The security system is configured in `config/packages/security.yaml`:

* **Password hashing** — Supports bcrypt (default), with migration from legacy SHA1 and MD5
* **Role hierarchy** — 19 roles organized hierarchically (ROLE_GLOBAL_ADMIN > ROLE_ADMIN > ROLE_TEACHER > ROLE_STUDENT > ROLE_USER)
* **Context-sensitive roles** — Course-level roles (ROLE_CURRENT_COURSE_TEACHER, ROLE_CURRENT_COURSE_STUDENT) are computed per-request based on enrollment
* **Firewall** — JWT authentication for API, session-based for web interface
* **Voters** — Resource-level access control through Symfony voters

## Legacy Code

Some features still use legacy PHP code in `public/main/`:

* Exercise rendering and interaction
* Learning path player
* Some admin tools

These are progressively being migrated to the Symfony+Vue architecture. Legacy pages are served through a compatibility layer that bootstraps the Symfony kernel.
