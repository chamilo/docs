# مخطط قاعدة البيانات

يربط Chamilo 2.0 مجموعة كبيرة من كيانات Doctrine بجداول قاعدة البيانات. تتفاوت الأعداد الدقيقة بين الإصدارات — اقرأ مجلدات الكيانات المدرجة أدناه للحالة الحالية.

## مواقع الكيانات

| Bundle | Where | Prefix |
|--------|-------|--------|
| CoreBundle | `src/CoreBundle/Entity/` | None (e.g., `user`, `course`, `session`) |
| CourseBundle | `src/CourseBundle/Entity/` | `c_` (e.g., `c_document`, `c_quiz`, `c_lp`) |
| LtiBundle | `src/LtiBundle/Entity/` | `lti_` |

## الجداول الرئيسية

### المستخدم والمصادقة

| Table | Purpose |
|-------|---------|
| `user` | حسابات المستخدمين |
| `access_url` | بوابات متعددة الـ URL |
| `access_url_rel_user` | تعيينات المستخدم-البوابة |
| `usergroup` | مجموعات المستخدمين على مستوى المنصة |

### الدورات

| Table | Purpose |
|-------|---------|
| `course` | الدورات |
| `course_category` | فئات الدورات |
| `course_rel_user` | تسجيلات الدورات |

### الجلسات

| Table | Purpose |
|-------|---------|
| `session` | جلسات التدريب |
| `session_rel_user` | تسجيلات الجلسات |
| `session_rel_course` | الدورات في الجلسات |
| `session_rel_course_rel_user` | تسجيل المستخدم لكل جلسة-دورة |

### نظام الموارد

| Table | Purpose |
|-------|---------|
| `resource_node` | تجريد موحد للمحتوى |
| `resource_file` | مرفقات الملفات |
| `resource_link` | الرؤية/الوصول حسب السياق |
| `resource_type` | سجل أنواع الموارد |

### محتوى الدورة (بادئة c_)

| Table | Purpose |
|-------|---------|
| `c_document` | الوثائق |
| `c_quiz` | التمارين/الاختبارات |
| `c_quiz_question` | أسئلة الاختبار |
| `c_quiz_answer` | إجابات الأسئلة |
| `c_lp` | مسارات التعلم |
| `c_lp_item` | عناصر مسار التعلم |
| `c_forum_category` | فئات المنتديات |
| `c_forum_forum` | المنتديات |
| `c_forum_thread` | خيوط المنتديات |
| `c_forum_post` | منشورات المنتديات |
| `c_student_publication` | المهام/التقديمات |
| `c_survey` | الاستطلاعات |
| `c_glossary` | مصطلحات المعجم |
| `c_calendar_event` | أحداث التقويم |
| `c_attendance` | جداول الحضور |

### التتبع

| Table | Purpose |
|-------|---------|
| `track_e_login` | تتبع تسجيل الدخول |
| `track_e_online` | تتبع المستخدمين المتصلين |
| `track_e_default` | تتبع النشاط العام |
| `gradebook_category` | فئات دفتر الدرجات |
| `gradebook_result` | الدرجات |

### الإعدادات

| Table | Purpose |
|-------|---------|
| `settings` | إعدادات المنصة |
| `settings_options` | تعريفات خيارات الإعدادات |

## الترحيلات

يتم إدارة تغييرات مخطط قاعدة البيانات من خلال Doctrine Migrations في `src/CoreBundle/Migrations/`. قم بتشغيل الترحيلات باستخدام:

```bash
php bin/console doctrine:migrations:migrate
```