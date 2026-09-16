# سير عمل Git

## المستودع

يُستضاف الشيفرة المصدرية لـ Chamilo على GitHub: [github.com/chamilo/chamilo-lms](https://github.com/chamilo/chamilo-lms)

## التفريع

* **`master`** — الفرع الرئيسي للتطوير
* تُنشأ فروع الميزات من `master` للتطوير الجديد
* تُنشأ فروع الإصدار للإصدارات المستقرة

## المساهمة بتغيير

1. **Fork** المستودع على GitHub
2. **Clone** نسختك محليًا
3. **أنشئ فرعًا** لتغييرك: `git checkout -b feature/my-feature`
4. **أجرِ تغييراتك** وفقًا لاتفاقيات الترميز
5. **Commit** برسائل واضحة ووصفية
6. **Push** إلى نسختك: `git push origin feature/my-feature`
7. **أنشئ طلب سحب** (pull request) مقابل فرع `master`

## رسائل الـ Commit

اكتب رسائل commit واضحة توضّح **ماذا** و**لماذا**:

```
Glossary: Add AI-assisted term generation

Teachers can now generate glossary terms using configured AI
providers. Supports configurable prompt and term count.
```

### اتفاقية بادئة الأداة

تُسبق سطر الموضوع بـ **الأداة أو المجال** الذي يمسّه التغيير، متبوعًا بنقطتين. نستخدم مصطلحات مشتركة قصيرة حتى يمكن تصفّح سجل التغييرات و`git log --oneline` حسب الأداة. البادئة دائمًا هي الصيغة **المفردة** للاسم المعياري للأداة.

الصيغة: `<Prefix>: <Imperative summary in the present tense>`

أمثلة:

```
Document: Fix list for student view
Exercise: Prevent duplicate question titles within a quiz
Learnpath: Allow reordering chapters via drag and drop
Internal: Refactor ResourceNode hydration in the API normalizer
CI: Cache Composer downloads in the GitHub Actions workflow
```

إذا امتدّ التغيير على عدة أدوات، اختر الأكثر تأثرًا؛ والتغييرات الشاملة حقًا التي تمسّ بنية الشيفرة فقط (دون أداة للمستخدم النهائي) تندرج تحت `Internal`. والتغييرات الخاصة بالتوثيق فقط (هذا الموقع، سجل التغييرات، وكتل التوثيق المضمّنة المخصصة كمرجع بحت) تندرج تحت `Documentation`.

#### البادئات المسموح بها

| Prefix               | Scope / notes                                                                        |
|----------------------|--------------------------------------------------------------------------------------|
| `Admin`              |                                                                                      |
| `Announcement`       |                                                                                      |
| `Attendance`         |                                                                                      |
| `Authentication`     |                                                                                      |
| `Blog`               |                                                                                      |
| `Calendar`           | ليس "Agenda"                                                                         |
| `Career`             |                                                                                      |
| `Catalogue`          | كتالوج المقررات والجلسات، بما في ذلك "المقررات الساخنة" على الصفحة الرئيسية              |
| `Chat`               |                                                                                      |
| `CI`                 | التكامل المستمر، الاختبارات الآلية، إلخ.                                        |
| `Course description` |                                                                                      |
| `Course Progress`    | ليس "Thematic advance"                                                               |
| `Course settings`    |                                                                                      |
| `Cron`               |                                                                                      |
| `Dashboard`          |                                                                                      |
| `Display`            |                                                                                      |
| `Document`           |                                                                                      |
| `Documentation`      | أي شيء يتعلق حصريًا بتوثيق Chamilo أو الشيفرة، أو سجل التغييرات، إلخ. |
| `Dropbox`            |                                                                                      |
| `Exercise`           | ليس "Quiz"                                                                           |
| `Extra Fields`       |                                                                                      |
| `Forum`              |                                                                                      |
| `Glossary`           |                                                                                      |
| `Gradebook`          | يشمل الشهادات                                                                |
| `Group`              | يشمل مجموعات المقرر، والمجموعات العامة، والصفوف                                   |
| `Help`               |                                                                                      |
| `Hook`               | لآلية الـ hook الداخلية                                                      |
| `Install`            | يشمل أمور الترقية                                                               |
| `Internal`           | للتغييرات والإصلاحات التي تؤثر في الغالب على الشيفرة نفسها أو تكون عامة جدًا بطبيعتها    |
| `Language`           |                                                                                      |
| `Link`               |                                                                                      |
| `Learnpath`          | لمسارات التعلم / Learning Paths                                                              |
| `Maintenance`        | أداة صيانة المقرر: نسخ المقرر، والنسخ الاحتياطي، والاستعادة، إلخ.                    |
| `Message`            |                                                                                      |
| `Notebook`           |                                                                                      |
| `Optimization`       |                                                                                      |
| `Portfolio`          |                                                                                      |
| `Privacy`            |                                                                                      |
| `Script`             | لما يوجد في `tests/scripts/`                                                   |
| `Search`             | البحث بالنص الكامل                                                                     |
| `Security`           |                                                                                      |
| `Session`            |                                                                                      |
| `Skill`              |                                                                                      |
| `Social`             | الشبكة الاجتماعية                                                                       |
| `SSO`                | طرق تسجيل الدخول الموحد                                                               |
| `Survey`             |                                                                                      |
| `System`             | الأمور المتعلقة في الغالب بالاستضافة والضبط الدقيق على مستوى الخادم           |
| `Template`           |                                                                                      |
| `Ticket`             |                                                                                      |
| `Tracking`           |                                                                                      |
| `User`               |                                                                                      |
| `Webservice`         |                                                                                      |
| `Wiki`               |                                                                                      |
| `Work`               |                                                                                      |
| `WYSIWYG`            |                                                                                      |
| `XAPI`               |                                                                                      |

## مراجعة الشيفرة

تُراجَع طلبات السحب من قِبل فريق المسؤولين عن الصيانة. كن مستعدًا لـ:

* معالجة الملاحظات وإجراء التعديلات
* إبقاء فرعك محدَّثًا مع `master`
* التأكد من نجاح الاختبارات

## الإبلاغ عن المشكلات

أبلِغ عن الأخطاء وطلبات الميزات عبر متتبع المشكلات في GitHub.