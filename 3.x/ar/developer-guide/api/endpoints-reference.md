# مرجع نقاط النهاية

تُنشئ API Platform تلقائيًا نقاط نهاية REST للكيانات المُعلَّمة بـ `#[ApiResource]`. يعرض Chamilo أكثر من 100 مورد.

## العمليات القياسية

تتوفر عادةً العمليات التالية لكل مورد API:

| الطريقة | المسار | الوصف |
|--------|------|-------------|
| `GET` | `/api/{resources}` | قائمة (مجموعة) |
| `POST` | `/api/{resources}` | إنشاء |
| `GET` | `/api/{resources}/{id}` | قراءة (عنصر واحد) |
| `PUT` | `/api/{resources}/{id}` | تحديث كامل |
| `PATCH` | `/api/{resources}/{id}` | تحديث جزئي |
| `DELETE` | `/api/{resources}/{id}` | حذف |

ليست كل العمليات مفعّلة لكل مورد — تُطبَّق قيود أمنية.

## موارد API الرئيسية

### موارد المنصة

| المورد | المسار | الوصف |
|----------|------|-------------|
| Users | `/api/users` | حسابات المستخدمين |
| Courses | `/api/courses` | المقررات |
| Sessions | `/api/sessions` | جلسات التدريب |
| Resource Nodes | `/api/resource_nodes` | عقد المحتوى الموحدة |
| Access URLs | `/api/access_urls` | بوابات متعددة عناوين URL |
| Messages | `/api/messages` | رسائل المنصة |

### موارد محتوى المقرر

| المورد | المسار | الوصف |
|----------|------|-------------|
| Documents | `/api/documents` | مستندات المقرر |
| Learning Paths | `/api/learning_paths` | مسارات التعلم |
| Glossaries | `/api/glossaries` | مصطلحات المسرد |
| Links | `/api/links` | روابط خارجية |
| Calendar Events | `/api/c_calendar_events` | أحداث الأجندة |
| Student Publications | `/api/c_student_publications` | الواجبات |
| Blogs | `/api/c_blogs` | مدونات المقرر |
| Groups | `/api/c_groups` | مجموعات المقرر |

### موارد التتبع

| المورد | المسار | الوصف |
|----------|------|-------------|
| Gradebook Categories | `/api/gradebook_categories` | إعداد دفتر الدرجات |
| Gradebook Results | `/api/gradebook_results` | الدرجات |

## التصفية والترقيم الصفحي

تدعم API Platform:

* **الترقيم الصفحي**: `?page=2&itemsPerPage=30`
* **التصفية**: `?title=Introduction` (يعتمد على عوامل التصفية المُعدَّة)
* **الترتيب**: `?order[title]=asc`
* **البحث**: بحث نصي كامل في الحقول المُعدَّة

## التفاوض على المحتوى

تدعم واجهة API صيغًا متعددة:

* `application/ld+json` (الافتراضي — JSON-LD)
* `application/json`
* `text/html` (توثيق API)

عيّن ترويسة `Accept` لاختيار صيغة الاستجابة.

## الأمان

يفرض كل نقطة نهاية الأمان عبر:

* مصادقة JWT (مطلوبة لمعظم نقاط النهاية)
* مصوّتي أمان Symfony (صلاحيات على مستوى المورد)
* التحكم في الوصول المستند إلى الأدوار (مثل نقاط النهاية المخصصة للمسؤولين فقط)