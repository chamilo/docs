# Documentation Changelog

This changelog tracks significant updates to the Chamilo 2.0 documentation.
Each entry corresponds to a Git tag on the `2.x` branch (e.g. `2.x-v1`).
Translation branches (`2.x-fr`, `2.x-es`, …) carry matching tags to indicate which version they are synced to.

---

## 2.x-v1 — 2026-05-12

Initial release of the Chamilo 2.0 documentation (179 pages across three guides).

### Teacher Guide (49 pages)

Complete documentation for day-to-day course management:

- Getting started: interface overview and user profile
- Course creation: settings, homepage layout
- Adding content: documents, links, learning paths, glossary, announcements
- Assessing learners: exercises, assignments, surveys, attendance, gradebook
- Tracking and reporting: learner tracking, course reports, certificates and skills
- Collaboration: forums, chat, wiki, blogs, groups, video conferencing
- AI tools: tutor chatbot, exercise generator, learning path generator, AI grading, media generation, glossary generator
- Additional tools: agenda, dropbox, notebook, portfolio, course progress
- Sessions, branches and rooms, social network, tickets, appendix

### Admin Guide (62 pages)

Complete reference for platform administration:

- Installation: server requirements, installation wizard, configuration, email, cloud storage, upgrades
- User management: roles, user groups, profiling
- Course and session management: categories, import/export, sessions, careers, promotions, classes
- Platform settings: 40+ configurable feature areas documented individually
- Authentication: LDAP, CAS, OAuth2 (Azure, Facebook, Keycloak), SCIM, SSO
- Branding: color themes, portal customization, templates
- Integrations: AI providers, LTI 1.3, OnlyOffice, video conferencing, xAPI
- Multi-URL setup, performance tuning, plugins (56 available), maintenance

### Developer Guide (36 pages)

Architecture and extension reference for developers:

- Tech stack: Symfony 6.4, API Platform 3.0, Doctrine ORM, Vue 3, PrimeVue, Tailwind CSS
- Backend: Symfony architecture, controllers, entities, events/listeners, resource system, settings system
- Frontend: Vue 3 components, views and routing, state management, build system
- REST API: JWT authentication, endpoints reference, custom actions, webhooks
- Theming: color themes, CSS and Tailwind, Twig templates
- Plugins: architecture, creating a plugin, course tool plugins
- Contributing: coding conventions, Git workflow, testing
- Appendix: database schema, glossary
