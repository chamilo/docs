# إدارة الحالة

يستخدم **Chamilo** مكتبتي إدارة حالة جنبًا إلى جنب:

* **Pinia** — المعيار الحالي لجميع المتاجر الجديدة. يستخدم معظم قاعدة الكود **Pinia**.
* **Vuex** — متجر قديم، لا يزال موجودًا ويُستخدم بواسطة العروض القديمة. يجب على الكود الجديد استخدام **Pinia**.

## متاجر Pinia

تعيش متاجر **Pinia** مباشرة في `assets/vue/store/`:

| ملف المتجر | Composable | الغرض |
|-----------|-----------|---------|
| `securityStore.js` | `useSecurityStore` | المستخدم المصادق عليه، تسجيل الدخول/الخروج، فحص الجلسة |
| `cidReq.js` | `useCidReqStore` | سياق الدورة/الجلسة الحالي (معرف الدورة، معرف الجلسة) |
| `courseSettingStore.js` | `useCourseSettings` | ذاكرة تخزين مؤقت لإعدادات مستوى الدورة |
| `enrolledStore.js` | `useEnrolledStore` | بيانات تسجيل المستخدم |
| `platformConfig.js` | `usePlatformConfig` | تكوين المنصة، الإضافات، السمة، مزودي OAuth2 |
| `messageRelUserStore.js` | `useMessageRelUserStore` | حالة الرسائل |
| `socialStore.js` | `useSocialStore` | حالة الشبكة الاجتماعية |

### متجر الأمان

```javascript
const securityStore = useSecurityStore()

// Check if user is logged in
if (securityStore.isAuthenticated) { ... }

// Access current user object
const user = securityStore.user
```

### متجر طلب CID

يتابع سياق الدورة/الجلسة الحالي — مطلوب لأي عملية API مقيدة بالدورة:

```javascript
const cidReqStore = useCidReqStore()

// Current course and session objects
const course = cidReqStore.course
const session = cidReqStore.session
```

### متجر إعدادات الدورة

يخزن مؤقتًا إعدادات مستوى الدورة لتجنب استدعاءات API متكررة:

```javascript
const courseSettings = useCourseSettings()
const value = courseSettings.getSetting('exercise_generator')
```

### متجر تكوين المنصة

يحتوي على تكوين المنصة الشامل المسترجع من `/platform-config/list`:

```javascript
const platformConfig = usePlatformConfig()

// Loaded settings array, active theme, enabled plugins, OAuth2 providers
const theme = platformConfig.visualTheme
const plugins = platformConfig.plugins
```

## متجر Vuex (القديم)

يُعرف متجر **Vuex** في `assets/vue/store/index.js` ويحتوي على:

| الوحدة | الغرض |
|--------|---------|
| `modules/crud.js` | مصنع (`makeCrudModule`) يولد وحدة Vuex CRUD كاملة لخدمة معينة — يُستخدم بواسطة العروض القديمة للقوائم/الإنشاء/التحديث |
| `modules/notifications.js` | حالة إشعارات Toast (عرض، لون، نص، مهلة زمنية) |
| `modules/ux.js` | حالة UX (رسالة الوصول الممنوع) |
| `security.js` | وحدة أمان Vuex القديمة (تم استبدالها بـ `securityStore.js`) |

تجنب إضافة وحدات Vuex جديدة. استخدم **Pinia** لأي حالة جديدة.

## Composables

بالإضافة إلى المتاجر، يحتوي `assets/vue/composables/` على دوال تركيب مشتركة. أمثلة بارزة:

| الملف | الغرض |
|------|---------|
| `useFileManager.js` | حالة وعملیات متصفح الملفات |
| `useTopbarLoggedIn.js` / `useTopbarNotLoggedIn.js` | توصيل قائمة شريط الأعلى |
| `useTopbarTour.js` | جولة موجهة لشريط الأعلى |
| `useDocumentCreate.js` / `useDocumentUpdate.js` / `useDocumentTemplates.js` | مساعدات أداة الوثائق |
| `useCertificateTags.js` | مساعدات علامات قوالب الشهادات |
| `sidebarMenu.js` | شجرة التنقل الجانبية |
| `theme.js` | تحميل السمة والتبديل بينها |
| `pluginRegion.js` | عرض منطقة واجهة المستخدم المحقونة بالإضافة |
| `userPermissions.js` | فحوصات الأذونات للمستخدم الحالي |
| `notification.js` | مساعدات الإشعارات الدفعية |
| `locale.js` | كشف اللغة والتبديل بينها |
| `datatableList.js` / `datatableCreate.js` / `datatableUpdate.js` | أنماط CRUD قابلة لإعادة الاستخدام لجدول البيانات |
| `useSocialInfo.js` / `useSocialMenuItems.js` | مساعدات الشبكة الاجتماعية |
| `usePushSubscription.js` | إدارة اشتراك Web Push |
| `upload.js` | مساعدات رفع الملفات |
| `useConfirmation.js` | مساعد حوار التأكيد |

تُنظم **Composables** أيضًا في مجلدات فرعية حسب الميزات (`course/`، `session/`، `document/`، `calendar/`، `admin/`، `auth/`، `message/`، `skill/`، إلخ). القائمة الكاملة في `assets/vue/composables/`.