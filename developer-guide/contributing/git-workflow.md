# سير عمل Git

## المستودع

يتم استضافة كود المصدر Chamilo على GitHub: [github.com/chamilo/chamilo-lms](https://github.com/chamilo/chamilo-lms)

## الفروع

* **`master`** — الفرع الرئيسي للتطوير
* يتم إنشاء فروع الميزات من `master` للتطوير الجديد
* يتم إنشاء فروع الإصدارات للإصدارات المستقرة

## المساهمة بتغيير

1. **Fork** المستودع على GitHub
2. **Clone** النسخة الخاصة بك محليًا
3. **Create a branch** لتغييرك: `git checkout -b feature/my-feature`
4. **Make your changes** باتباع قواعد البرمجة
5. **Commit** برسال رسائل التزام واضحة ووصفية
6. **Push** إلى النسخة الخاصة بك: `git push origin feature/my-feature`
7. **Create a pull request** ضد فرع `master`

## رسائل التزام

اكتب رسائل التزام واضحة تفسر **ما** و**لماذا**:

```
Glossary: Add AI-assisted term generation

Teachers can now generate glossary terms using configured AI
providers. Supports configurable prompt and term count.
```

### اتفاقية بادئة الأداة

يُسبق سطر الموضوع بـ **الأداة أو المنطقة** التي يؤثر عليها التغيير، متبوعًا بنقطتين. نستخدم مصطلحات مشتركة قصيرة حتى يمكن تصفح سجل التغييرات و `git log --oneline` حسب الأداة. البادئة دائمًا في الصيغة **المفردة** لاسم الأداة الرسمي.

الصيغة: `<Prefix>: <Imperative summary in the present tense>`

أمثلة:

```
Document: Fix list for student view
Exercise: Prevent duplicate question titles within a quiz
Learnpath: Allow reordering chapters via drag and drop
Internal: Refactor ResourceNode hydration in the API normalizer
CI: Cache Composer downloads in the GitHub Actions workflow
```

إذا امتد التغيير إلى عدة أدوات، اختر الأكثر تأثرًا؛ التغييرات العابرة حقًا التي تؤثر فقط على هيكل الكود (دون أداة مستخدم نهائي) تُصنف تحت `Internal`. التغييرات الخاصة بالتوثيق فقط (هذا الموقع، سجل التغييرات، كتل التوثيق داخل السطر المقصودة كمرجع بحت) تُصنف تحت `Documentation`.

---

---
#### البادئات المسموح بها

| البادئة              | النطاق / الملاحظات                                                                  |
|----------------------|--------------------------------------------------------------------------------------|
| `Admin`              |                                                                                      |
| `Announcement`       |                                                                                      |
| `Attendance`         |                                                                                      |
| `Authentication`     |                                                                                      |
| `Blog`               |                                                                                      |
| `Calendar`           | ليس "Agenda"                                                                         |
| `Career`             |                                                                                      |
| `Catalogue`          | كتالوج الدورات والجلسات، بما في ذلك "الدورات الساخنة" على الصفحة الرئيسية         |
| `Chat`               |                                                                                      |
| `CI`                 | التكامل المستمر، الاختبارات الآلية، إلخ.                                           |
| `Course description` |                                                                                      |
| `Course Progress`    | ليس "Thematic advance"                                                               |
| `Course settings`    |                                                                                      |
| `Cron`               |                                                                                      |
| `Dashboard`          |                                                                                      |
| `Display`            |                                                                                      |
| `Document`           |                                                                                      |
| `Documentation`      | أي شيء يتعلق حصريًا بتوثيق Chamilo أو الكود، سجل التغييرات، إلخ.                   |
| `Dropbox`            |                                                                                      |
| `Exercise`           | ليس "Quiz"                                                                           |
| `Extra Fields`       |                                                                                      |
| `Forum`              |                                                                                      |
| `Glossary`           |                                                                                      |
| `Gradebook`          | يشمل الشهادات                                                                       |
| `Group`              | يشمل مجموعات الدورة، المجموعات العالمية، والفصول                                    |
| `Help`               |                                                                                      |
| `Hook`               | لآلية الربط الداخلية                                                                |
| `Install`            | يشمل أمور الترقية                                                                   |
| `Internal`           | للتغييرات والإصلاحات التي تؤثر بشكل أساسي على الكود نفسه أو تكون عامة جدًا بطبيعتها |
| `Language`           |                                                                                      |
| `Link`               |                                                                                      |
| `Learnpath`          | لـ LP / مسارات التعلم                                                               |
| `Maintenance`        | أداة صيانة الدورة: نسخ الدورة، النسخ الاحتياطي، الاستعادة، إلخ.                    |
| `Message`            |                                                                                      |
| `Notebook`           |                                                                                      |
| `Optimization`       |                                                                                      |
| `Portfolio`          |                                                                                      |
| `Privacy`            |                                                                                      |
| `Script`             | لما يوجد في `tests/scripts/`                                                         |
| `Search`             | البحث النصي الكامل                                                                  |
| `Security`           |                                                                                      |
| `Session`            |                                                                                      |
| `Skill`              |                                                                                      |
| `Social`             | الشبكة الاجتماعية                                                                   |
| `SSO`                | طرق تسجيل الدخول الموحد                                                             |
| `Survey`             |                                                                                      |
| `System`             | الأمور التي تتعلق بشكل أساسي بالاستضافة والضبط الدقيق على مستوى الخادم           |
| `Template`           |                                                                                      |
| `Ticket`             |                                                                                      |
| `Tracking`           |                                                                                      |
| `User`               |                                                                                      |
| `Webservice`         |                                                                                      |
| `Wiki`               |                                                                                      |
| `Work`               |                                                                                      |
| `WYSIWYG`            |                                                                                      |
| `XAPI`               |                                                                                      |

---
## مراجعة الكود

يتم مراجعة طلبات السحب من قبل فريق المحافظين. كن مستعداً لـ:

* معالجة التعليقات واقتراح التعديلات
* الحفاظ على فرعك محدثاً مع `master`
* التأكد من نجاح الاختبارات

## الإبلاغ عن المشكلات

أبلغ عن الأخطاء وطلبات التحسينات في متتبع المشكلات على GitHub.