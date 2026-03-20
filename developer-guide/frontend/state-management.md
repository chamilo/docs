# State Management

Chamilo uses **Pinia** (Vue's recommended state management library) for managing application state.

## Store Files

Stores are in `assets/vue/store/`:

| Store | Purpose |
|-------|---------|
| `securityStore.js` | Authentication state: current user, token, login/logout |
| `cidReq.js` | Course/session context: current course ID, session ID, group ID |
| `courseSettingStore.js` | Course-level settings cache |
| `enrolledStore.js` | User enrollment data |
| `platformConfig.js` | Platform configuration and settings |
| `messageRelUserStore.js` | Message state |
| `socialStore.js` | Social network state |

## Key Stores

### Security Store

Manages the authenticated user:

```javascript
const securityStore = useSecurityStore()

// Check if user is logged in
if (securityStore.isAuthenticated) { ... }

// Access current user
const user = securityStore.user
```

### CID Request Store

Tracks the current course/session context (critical for course-scoped operations):

```javascript
const cidReq = useCidReqStore()

// Current course and session
const courseId = cidReq.course.id
const sessionId = cidReq.session.id
```

### Course Settings Store

Caches course-level settings to avoid repeated API calls:

```javascript
const courseSettings = useCourseSettings()
const setting = courseSettings.getSetting('exercise_generator')
```

## Composables

In addition to stores, Chamilo uses Vue composables (`assets/vue/composables/`) for shared logic:

* `useFileManager.js` — File browser state and operations
* `useUserSessionSubscription` — Session enrollment checks
* `userPermissions` — Permission checking helpers (e.g., `checkIsAllowedToEdit`)
