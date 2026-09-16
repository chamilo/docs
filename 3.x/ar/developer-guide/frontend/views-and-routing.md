# العروض والتوجيه

يمتلك Chamilo مجموعة كبيرة من عروض Vue (مكونات على مستوى الصفحة) متصلة عبر Vue Router. توجد الملفات الفعلية تحت `assets/vue/views/`.

## معمارية الموجّه

يُعرَّف الموجّه في `assets/vue/router/index.js` باستخدام `createWebHistory` للحصول على عناوين URL نظيفة.

المسارات معيارية — منظمة في ملفات مسارات لكل ميزة تُستورد في الموجّه الرئيسي:

| وحدة المسار | الصفحات |
|-------------|-------|
| `admin` | صفحات لوحة الإدارة |
| `sessionAdmin` | صفحات إدارة الجلسات |
| `course` | قائمة المقررات، الإنشاء، الصفحة الرئيسية، الفهرس |
| `account` | ملف المستخدم والإعدادات |
| `personalfile` | مساحة الملفات الشخصية |
| `message` | المراسلة / صندوق الوارد |
| `user` | صفحات إدارة المستخدمين |
| `usergroup` | صفحات مجموعات المستخدمين (الصفوف) |
| `userreluser` | صفحات علاقات المستخدمين (صديق/متابعة) |
| `ccalendarevent` | تقويم المقرر وجدول الأعمال |
| `ctoolintro` | صفحات مقدمة أدوات المقرر |
| `page` | صفحات CMS الثابتة |
| `pageLayout` | أغلفة تخطيط الصفحات |
| `publicPage` | الصفحات المتاحة للعامة |
| `social` | صفحات الشبكة الاجتماعية |
| `filemanager` | مدير الملفات (متصفح مستندات المقرر) |
| `skill` | صفحات المهارات والكفايات |
| `accessurl` | صفحات إدارة عناوين URL المتعددة (البوابة) |
| `branch` | صفحات الفروع / الحرم الشبكي |
| `room` | صفحات الغرف الافتراضية |
| `buycourses` | صفحات شراء المقررات |
| `documents` | إدارة المستندات |
| `assignments` | سير عمل الواجبات |
| `links` | إدارة الروابط الخارجية |
| `glossary` | إدارة المسرد |
| `attendance` | تتبع الحضور |
| `lp` | مشغّل ومحرّر مسار التعلم |
| `dropbox` | صندوق الإسقاط / تبادل الملفات |
| `blog` | صفحات المدونة |
| `blogAdmin` | إدارة المدونة |
| `coursemaintenance` | النسخ الاحتياطي للمقرر واستعادته |
| `catalogue` | فهارس المقررات والجلسات |

## المسارات الرئيسية

| المسار | العرض | الوصف |
|------|------|-------------|
| `/` | `AppIndex.vue` (أو مخصص) | نقطة دخول التطبيق |
| `/home` | `pages/Home.vue` | الصفحة الرئيسية للمنصة |
| `/login` | `pages/Login.vue` | صفحة تسجيل الدخول |
| `/courses` | `views/user/courses/List.vue` | المقررات المسجّل فيها المستخدم |
| `/sessions` | `views/user/sessions/SessionsCurrent.vue` | الجلسات الحالية |
| `/sessions/past` | `views/user/sessions/SessionsPast.vue` | الجلسات السابقة |
| `/sessions/upcoming` | `views/user/sessions/SessionsUpcoming.vue` | الجلسات القادمة |
| `/course/:id/home` | `views/course/CourseHome.vue` | الصفحة الرئيسية للمقرر |
| `/account/home` | `views/account/Home.vue` | ملف المستخدم |
| `/admin` | عروض الإدارة | لوحة الإدارة |
| `/faq` | `pages/Faq.vue` | صفحة الأسئلة الشائعة |

## حراس المسارات

يستخدم الموجّه حراس التنقل (المُعلَنة بـ `beforeEach` و `afterEach`) من أجل:

* التحقق من حالة المصادقة عبر `useSecurityStore` وإعادة توجيه المستخدمين غير المصادقين إلى `/login`
* التحقق من سياق المقرر عبر `useCidReqStore`
* تطبيق فئات CSS حسب نوع الصفحة أثناء تنقل SPA (بدلاً مما كان يفعله `PageHelper` في Twig عند تحميل صفحة كاملة)
* دعم تجاوز قوالب Vue المخصصة — يُستبدل مكوّن الدخول عند `/` بملف `AppIndex.vue` مخصص عند تفعيل قالب Vue مخصص (`var/vue_templates/pages/AppIndex.vue`)

## تنظيم العروض

توجد العروض في `assets/vue/views/`، منظمة حسب الميزة:

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