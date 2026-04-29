# Vue Components

Chamilo has a large set of Vue components organized by feature area in `assets/vue/components/`.

## Base Components

Located in `components/basecomponents/`:

| Component | Purpose |
|-----------|---------|
| `BaseButton.vue` | Standard button with PrimeVue Button and ChamiloIcons integration |
| `BaseIcon.vue` | Icon rendering (MDI classes) |
| `BaseToolbar.vue` | Action toolbar |
| `BaseTinyEditor.vue` | TinyMCE rich text editor wrapper |
| `ChamiloIcons.js` | Maps 127 semantic icon names to MDI CSS classes |

## Layout Components

Located in `components/layout/`:

| Component | Purpose |
|-----------|---------|
| `DashboardLayout.vue` | Main layout: topbar + sidebar + content area |
| `Sidebar.vue` | Left navigation panel (collapsible) |
| `TopbarLoggedIn.vue` | Top bar with logo, inbox, avatar |

## Feature-Area Components

| Directory | Components | Purpose |
|-----------|-----------|---------|
| `course/` | Course cards, catalog filters, course forms | Course listing and management |
| `session/` | Session cards, catalog | Session listing |
| `assignments/` | Submission lists, grading modals, forms | Assignment workflow |
| `chat/` | DockedChat, chat messages | Real-time chat and AI tutor |
| `filemanager/` | CourseDocuments, PersonalFiles | File browser and management |
| `installer/` | Step1-Step7, EmailSettings | Installation wizard |
| `social/` | GroupInfoCard, social posts | Social network features |
| `attendance/` | AttendanceTable | Attendance tracking |
| `usergroup/` | GroupMembers | User group management |

## Icon System

Icons use **Material Design Icons (MDI)** as the sole icon library: `<i class="mdi mdi-pencil"></i>`

The `ChamiloIcons.js` file provides a semantic mapping:

```javascript
export const chamiloIconToClass = {
  "edit": "mdi mdi-pencil",
  "delete": "mdi mdi-delete",
  "eye-on": "mdi mdi-eye",
  "courses": "mdi mdi-book-open-page-variant",
  // ... 127 mappings
}
```

Components use `BaseIcon` or reference `chamiloIconToClass` to render icons consistently.

## Component Patterns

* **Composition API** — Components use Vue 3's `<script setup>` syntax
* **PrimeVue integration** — Heavy use of PrimeVue components (Button, DataTable, Dialog, Menu, etc.)
* **Axios for API calls** — HTTP requests to the backend API
* **Vue I18n** — All user-facing text uses translation keys
