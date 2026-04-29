# Views and Routing

Chamilo has a large set of Vue views (page-level components) connected via Vue Router. The actual files live under `assets/vue/views/`.

## Router Architecture

The router is defined in `assets/vue/router/index.js` using `createWebHistory` for clean URLs.

Routes are modular — organized into per-feature route files imported into the main router:

| Route module | Pages |
|-------------|-------|
| `course` | Course list, creation, home, catalog |
| `admin` | Admin pages |
| `sessionAdmin` | Session admin pages |
| `account` | User profile and settings |
| `documents` | Document management |
| `assignments` | Assignment pages |
| `glossary` | Glossary management |
| `attendance` | Attendance tracking |
| `lp` | Learning path player and editor |
| `message` | Messaging/inbox |
| `social` | Social network |
| `ccalendarevent` | Calendar and agenda |
| `personalfile` | Personal file management |
| `catalogue` | Course and session catalogs |
| `links` | Link management |
| `blog` | Blog pages |
| `dropbox` | Dropbox/file sharing |

## Key Routes

| Path | View | Description |
|------|------|-------------|
| `/home` | `Home.vue` | Platform home page |
| `/courses` | `MyCourseList.vue` | User's enrolled courses |
| `/sessions` | `MySessionList.vue` | User's sessions |
| `/course/:id/home` | `CourseHome.vue` | Course homepage |
| `/account/home` | `account/Home.vue` | User profile |
| `/admin` | Admin views | Administration panel |

## Route Guards

The router uses navigation guards to:

* Check authentication status via `useSecurityStore`
* Verify course context via `useCidReqStore`
* Apply page-type CSS classes during navigation
* Handle custom Vue template overrides

## View Organization

Views are in `assets/vue/views/`, organized by feature:

```
views/
├── course/           # Course list, home, catalog, creation
├── documents/        # Document list, create, generate media
├── glossary/         # Glossary list, generate terms
├── admin/            # Admin pages
├── personalfile/     # Personal files (list, show, shared)
├── ccalendarevent/   # Calendar views
├── sessionadmin/     # Session admin (register, completed, restart)
└── ...
```
