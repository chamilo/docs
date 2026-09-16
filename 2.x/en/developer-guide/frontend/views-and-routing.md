# Views and Routing

Chamilo has a large set of Vue views (page-level components) connected via Vue Router. The actual files live under `assets/vue/views/`.

## Router Architecture

The router is defined in `assets/vue/router/index.js` using `createWebHistory` for clean URLs.

Routes are modular — organized into per-feature route files imported into the main router:

| Route module | Pages |
|-------------|-------|
| `admin` | Administration panel pages |
| `sessionAdmin` | Session administration pages |
| `course` | Course list, creation, home, catalog |
| `account` | User profile and settings |
| `personalfile` | Personal file space |
| `message` | Messaging / inbox |
| `user` | User management pages |
| `usergroup` | User group (class) pages |
| `userreluser` | User relationship (friend/follow) pages |
| `ccalendarevent` | Course calendar and agenda |
| `ctoolintro` | Course tool introduction pages |
| `page` | Static CMS pages |
| `pageLayout` | Page layout wrappers |
| `publicPage` | Publicly accessible pages |
| `social` | Social network pages |
| `filemanager` | File manager (course documents browser) |
| `skill` | Skills and competencies pages |
| `accessurl` | Multi-URL (portal) management pages |
| `branch` | Branch / network campus pages |
| `room` | Virtual room pages |
| `buycourses` | Course purchase pages |
| `documents` | Document management |
| `assignments` | Assignment workflow |
| `links` | External links management |
| `glossary` | Glossary management |
| `attendance` | Attendance tracking |
| `lp` | Learning path player and editor |
| `dropbox` | Dropbox / file exchange |
| `blog` | Blog pages |
| `blogAdmin` | Blog administration |
| `coursemaintenance` | Course backup and restore |
| `catalogue` | Course and session catalogs |

## Key Routes

| Path | View | Description |
|------|------|-------------|
| `/` | `AppIndex.vue` (or custom) | Application entry point |
| `/home` | `pages/Home.vue` | Platform home page |
| `/login` | `pages/Login.vue` | Login page |
| `/courses` | `views/user/courses/List.vue` | User's enrolled courses |
| `/sessions` | `views/user/sessions/SessionsCurrent.vue` | Current sessions |
| `/sessions/past` | `views/user/sessions/SessionsPast.vue` | Past sessions |
| `/sessions/upcoming` | `views/user/sessions/SessionsUpcoming.vue` | Upcoming sessions |
| `/course/:id/home` | `views/course/CourseHome.vue` | Course homepage |
| `/account/home` | `views/account/Home.vue` | User profile |
| `/admin` | Admin views | Administration panel |
| `/faq` | `pages/Faq.vue` | FAQ page |

## Route Guards

The router uses navigation guards (declared with `beforeEach` and `afterEach`) to:

* Check authentication status via `useSecurityStore` and redirect unauthenticated users to `/login`
* Verify course context via `useCidReqStore`
* Apply page-type CSS classes during SPA navigation (replacing what Twig's `PageHelper` would do on a full page load)
* Support custom Vue template overrides — the entry component at `/` is swapped for a custom `AppIndex.vue` when a custom Vue template is enabled (`var/vue_templates/pages/AppIndex.vue`)

## View Organization

Views are in `assets/vue/views/`, organized by feature:

```
views/
├── account/          # User profile and settings
├── admin/            # Admin pages
├── assignments/      # Assignment submission and grading
├── attendance/       # Attendance sheets
├── blog/             # Blog posts and comments
├── branch/           # Network campus management
├── buycourses/       # Course purchase flow
├── ccalendarevent/   # Course calendar
├── course/           # Course list, home, creation, catalog
├── coursecategory/   # Course category management
├── coursemaintenance/# Course backup/restore
├── ctoolintro/       # Tool introduction pages
├── documents/        # Document list, creation, media generation
├── dropbox/          # Dropbox / file exchange
├── filemanager/      # File browser
├── glossary/         # Glossary list and term management
├── links/            # External links
├── lp/               # Learning path player and editor
├── message/          # Inbox and messaging
├── page/             # CMS static pages
├── pageLayout/       # Page layout wrappers
├── personalfile/     # Personal file space
├── room/             # Virtual rooms
├── sessionadmin/     # Session administration
├── skill/            # Skills and competencies
├── social/           # Social network
├── terms/            # Terms of service
├── user/             # User management and course/session lists
├── usergroup/        # User groups (classes)
└── userreluser/      # User relationships (friends/follows)
```
