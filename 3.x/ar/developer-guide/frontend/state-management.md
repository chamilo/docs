# إدارة الحالة

يستخدم Chamilo مكتبتين لإدارة الحالة جنبًا إلى جنب:

* **Pinia** — المعيار الحالي لجميع المخازن الجديدة. غالبية قاعدة الشيفرة تستخدم Pinia.
* **Vuex** — مخزن قديم، لا يزال موجودًا ويُستخدم في العروض الأقدم. ينبغي أن يستخدم الشيفرة الجديدة Pinia.

## مخازن Pinia

توجد مخازن Pinia مباشرة في `assets/vue/store/`:

| ملف المخزن | الدالة التركيبية | الغرض |
|-----------|-----------|---------|
| `securityStore.js` | `useSecurityStore` | المستخدم المصادق عليه، تسجيل الدخول/الخروج، التحقق من الجلسة |
| `cidReq.js` | `useCidReqStore` | سياق المقرر/الجلسة الحالي (معرّف المقرر، معرّف الجلسة) |
| `courseSettingStore.js` | `useCourseSettings` | ذاكرة تخزين مؤقت لإعدادات مستوى المقرر |
| `enrolledStore.js` | `useEnrolledStore` | بيانات تسجيل المستخدم |
| `platformConfig.js` | `usePlatformConfig` | إعدادات المنصة، الإضافات، السمة، مزوّدو OAuth2 |
| `messageRelUserStore.js` | `useMessageRelUserStore` | حالة المراسلة |
| `socialStore.js` | `useSocialStore` | حالة الشبكة الاجتماعية |

### مخزن الأمان

```javascript
const securityStore = useSecurityStore()

// Check if user is logged in
if (securityStore.isAuthenticated) { ... }

// Access current user object
const user = securityStore.user
```

### مخزن طلب CID

يتتبع سياق المقرر/الجلسة الحالي — مطلوب لأي عملية API محدودة بالمقرر:

```javascript
const cidReqStore = useCidReqStore()

// Current course and session objects
const course = cidReqStore.course
const session = cidReqStore.session
```

### مخزن إعدادات المقرر

يخزّن إعدادات مستوى المقرر مؤقتًا لتجنب استدعاءات API المتكررة:

```javascript
const courseSettings = useCourseSettings()
const value = courseSettings.getSetting('exercise_generator')
```

### مخزن إعدادات المنصة

يحتفظ بإعدادات المنصة على مستوى النظام المسترجعة من `/platform-config/list`:

```javascript
const platformConfig = usePlatformConfig()

// Loaded settings array, active theme, enabled plugins, OAuth2 providers
const theme = platformConfig.visualTheme
const plugins = platformConfig.plugins
```

## مخزن Vuex (قديم)

يُعرَّف مخزن Vuex في `assets/vue/store/index.js` ويحتوي على:

| الوحدة | الغرض |
|--------|---------|
| `modules/crud.js` | مصنع (`makeCrudModule`) يولّد وحدة Vuex كاملة لعمليات CRUD لخدمة معيّنة — تُستخدم في عروض القائمة/الإنشاء/التحديث الأقدم |
| `modules/notifications.js` | حالة إشعارات Toast (العرض، اللون، النص، المهلة) |
| `modules/ux.js` | حالة تجربة المستخدم (رسالة الوصول الممنوع) |
| `security.js` | وحدة أمان Vuex القديمة (حلّ محلها `securityStore.js`) |

تجنّب إضافة وحدات Vuex جديدة. استخدم Pinia لأي حالة جديدة.

## الدوال التركيبية (Composables)

بالإضافة إلى المخازن، يحتوي `assets/vue/composables/` على دوال تركيب مشتركة. أمثلة بارزة:

| الملف | الغرض |
|------|---------|
| `useFileManager.js` | حالة متصفح الملفات والعمليات |
| `useTopbarLoggedIn.js` / `useTopbarNotLoggedIn.js` | ربط قائمة الشريط العلوي |
| `useTopbarTour.js` | جولة إرشادية للشريط العلوي |
| `useDocumentCreate.js` / `useDocumentUpdate.js` / `useDocumentTemplates.js` | مساعدات أداة المستندات |
| `useCertificateTags.js` | مساعدات وسوم قوالب الشهادات |
| `sidebarMenu.js` | شجرة تنقل الشريط الجانبي |
| `theme.js` | تحميل السمة والتبديل بينها |
| `pluginRegion.js` | عرض مناطق واجهة المستخدم المحقونة بالإضافات |
| `userPermissions.js` | فحوصات الصلاحيات للمستخدم الحالي |
| `notification.js` | مساعدات الإشعارات الفورية |
| `locale.js` | اكتشاف اللغة والتبديل بينها |
| `datatableList.js` / `datatableCreate.js` / `datatableUpdate.js` | أنماط CRUD قابلة لإعادة الاستخدام لجداول البيانات |
| `useSocialInfo.js` / `useSocialMenuItems.js` | مساعدات الشبكة الاجتماعية |
| `usePushSubscription.js` | إدارة اشتراك Web Push |
| `upload.js` | مساعدات رفع الملفات |
| `useConfirmation.js` | مساعد مربع حوار التأكيد |

تُنظَّم الدوال التركيبية أيضًا في أدلة فرعية حسب الميزة (`course/`، `session/`، `document/`، `calendar/`، `admin/`، `auth/`، `message/`، `skill/`، إلخ). القائمة الكاملة موجودة في `assets/vue/composables/`.