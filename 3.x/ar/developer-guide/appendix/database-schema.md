# مخطط قاعدة البيانات

يربط Chamilo 3.0 مجموعة كبيرة من كيانات Doctrine بجداول قاعدة البيانات. تتغيّر الأعداد الدقيقة بين الإصدارات — راجع أدلة الكيانات المدرجة أدناه للاطلاع على الحالة الحالية.

## مواقع الكيانات

| الحزمة | الموقع | البادئة |
|--------|-------|--------|
| CoreBundle | `src/CoreBundle/Entity/` | لا توجد (مثل `user`، `course`، `session`) |
| CourseBundle | `src/CourseBundle/Entity/` | `c_` (مثل `c_document`، `c_quiz`، `c_lp`) |
| LtiBundle | `src/LtiBundle/Entity/` | `lti_` |

## الجداول الرئيسية

### المستخدم والمصادقة

| الجدول | الغرض |
|-------|---------|
| `user` | حسابات المستخدمين |
| `access_url` | بوابات متعددة عناوين URL |
| `access_url_rel_user` | تعيينات المستخدم-البوابة |
| `usergroup` | مجموعات المستخدمين على مستوى المنصة |

### المقررات

| الجدول | الغرض |
|-------|---------|
| `course` | المقررات |
| `course_category` | فئات المقررات |
| `course_rel_user` | تسجيلات المقررات |

### الجلسات

| الجدول | الغرض |
|-------|---------|
| `session` | جلسات التدريب |
| `session_rel_user` | تسجيلات الجلسات |
| `session_rel_course` | المقررات في الجلسات |
| `session_rel_course_rel_user` | تسجيل المستخدم لكل جلسة-مقرر |

### نظام الموارد

| الجدول | الغرض |
|-------|---------|
| `resource_node` | تجريد موحّد للمحتوى |
| `resource_file` | مرفقات الملفات |
| `resource_link` | الرؤية/الوصول حسب السياق |
| `resource_type` | سجل أنواع الموارد |

### محتوى المقرر (بادئة c_)

| الجدول | الغرض |
|-------|---------|
| `c_document` | المستندات |
| `c_quiz` | التمارين/الاختبارات |
| `c_quiz_question` | أسئلة الاختبار |
| `c_quiz_answer` | إجابات الأسئلة |
| `c_lp` | مسارات التعلم |
| `c_lp_item` | عناصر مسار التعلم |
| `c_forum_category` | فئات المنتدى |
| `c_forum_forum` | المنتديات |
| `c_forum_thread` | مواضيع المنتدى |
| `c_forum_post` | منشورات المنتدى |
| `c_student_publication` | الواجبات/التسليمات |
| `c_survey` | الاستبيانات |
| `c_glossary` | مصطلحات المسرد |
| `c_calendar_event` | أحداث التقويم |
| `c_attendance` | كشوف الحضور |

### التتبع

| الجدول | الغرض |
|-------|---------|
| `track_e_login` | تتبع تسجيل الدخول |
| `track_e_online` | تتبع المستخدمين المتصلين |
| `track_e_default` | تتبع النشاط العام |
| `gradebook_category` | فئات دفتر الدرجات |
| `gradebook_result` | الدرجات |

### الإعدادات

| الجدول | الغرض |
|-------|---------|
| `settings` | إعدادات المنصة |
| `settings_options` | تعريفات خيارات الإعداد |

## الترحيلات

تُدار تغييرات مخطط قاعدة البيانات عبر Doctrine Migrations في `src/CoreBundle/Migrations/`. شغّل الترحيلات باستخدام:

```bash
php bin/console doctrine:migrations:migrate
```