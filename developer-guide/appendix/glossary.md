# Glossary

Developer-focused terms used throughout this guide.

| Term | Definition |
|------|-----------|
| **API Platform** | A PHP framework for building REST and GraphQL APIs, integrated with Symfony. Chamilo uses it to auto-generate API endpoints from Doctrine entities. |
| **Bundle** | A Symfony organizational unit similar to a plugin or module. Chamilo has three: CoreBundle, CourseBundle, LtiBundle. |
| **Composable** | A Vue 3 pattern for extracting and reusing reactive logic. Stored in `assets/vue/composables/`. |
| **Doctrine ORM** | The PHP object-relational mapper used by Chamilo. Maps PHP entity classes to database tables. |
| **Entity** | A PHP class annotated with Doctrine attributes that maps to a database table. |
| **Encore** | Symfony Webpack Encore — a wrapper around Webpack that simplifies frontend build configuration. |
| **Flysystem** | A PHP filesystem abstraction library. Chamilo uses it to support local, S3, Azure, and GCS storage. |
| **JWT** | JSON Web Token — the authentication mechanism for the REST API. |
| **Pinia** | The state management library for Vue 3. Replaces Vuex. |
| **PrimeVue** | The Vue 3 UI component library used by Chamilo. Provides buttons, tables, dialogs, etc. |
| **ResourceNode** | The central entity in Chamilo's resource system. Every piece of course content has a ResourceNode. |
| **ResourceFile** | An entity representing a file attached to a ResourceNode. Stored via Flysystem. |
| **ResourceLink** | An entity controlling visibility and access per course/session/group context. |
| **SCORM** | Sharable Content Object Reference Model. An e-learning standard for packaging content. |
| **Settings Schema** | A PHP class defining a category of platform settings (e.g., SecuritySettingsSchema). |
| **Voter** | A Symfony security component that decides whether a user can perform an action on a resource. |
| **Webpack** | The JavaScript module bundler that compiles Vue components, SCSS, and TypeScript into browser-ready bundles. |
