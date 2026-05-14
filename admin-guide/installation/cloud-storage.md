# التخزين السحابي

يدعم **Chamilo 2.0** الخلفيات السحابية لتخزين الملفات التي يقوم المستخدمون برفعها من خلال **Flysystem**، وهي مكتبة تجريد نظام الملفات PHP مدمجة في Symfony. يتيح ذلك لك تخزين الملفات على خدمات سحابية بدلاً من (أو بالإضافة إلى) نظام الملفات المحلي.

## لماذا تستخدم التخزين السحابي؟

* **القابلية للتوسع** -- ينمو التخزين السحابي مع منصتك دون الحاجة إلى إدارة مساحة القرص.
* **النشر على خوادم متعددة** -- عند تشغيل خوادم ويب متعددة خلف موازن حمل، يضمن التخزين السحابي الوصول جميع الخوادم إلى نفس الملفات.
* **المتانة** -- تقدم مزودو السحابة تكرارًا مدمجًا واحتياطيًا.
* **التكلفة** -- تخزين الكائنات غالبًا ما يكون أرخص لكل جيجابايت من تخزين الكتل المتصل بالخوادم.

## المزودون المدعومون

| المزود | محول Flysystem |
|--------|-----------------|
| **Amazon S3** | `league/flysystem-aws-s3-v3` |
| **Google Cloud Storage** | `league/flysystem-google-cloud-storage` |
| **Azure Blob Storage** | `league/flysystem-azure-blob-storage` |
| **MinIO** (متوافق مع S3) | يستخدم محول S3 مع نقطة نهاية مخصصة |
| **نظام الملفات المحلي** | الافتراضي، لا حاجة للحزم الإضافية |

## التثبيت

يأتي Chamilo بالفعل مع المزودين التاليين المثبتين مسبقًا:

```bash
# Amazon S3
league/flysystem-aws-s3-v3

# Google Cloud Storage
league/flysystem-google-cloud-storage

# Azure Blob Storage
league/flysystem-azure-blob-storage
```

## التهيئة

يقسم Chamilo ملفاته عبر عدة نقاط ربط Flysystem — **assets**، **assets cache**، **resources**، **resources cache**، **themes**، و**plugins**. يمكن أن يستهدف كل نقطة ربط دلوًا أو حاوية مختلفة. يتم اختيار التهيئة السحابية في `config/packages/oneup_flysystem.yaml` حسب البيئة باستخدام شروط `when@` ويقرأ المتغيرات التي تقوم بتعيينها في `.env`.

### Amazon S3

```bash
# .env — بيانات الاعتماد المشتركة
AWS_S3_STORAGE_VERSION=latest
AWS_S3_STORAGE_REGION=eu-central-1
AWS_S3_STORAGE_ACCESS_KEY=your-access-key
AWS_S3_STORAGE_ACCESS_SECRET=your-secret-key

# دلال كل نقطة ربط (يمكن أن تكون كل نقطة ربط دلوًا مختلفًا)
AWS_S3_STORAGE_ASSET_BUCKET=chamilo-assets
AWS_S3_STORAGE_ASSET_CACHE_BUCKET=chamilo-asset-cache
AWS_S3_STORAGE_RESOURCE_BUCKET=chamilo-resources
AWS_S3_STORAGE_RESOURCE_CACHE_BUCKET=chamilo-resource-cache
AWS_S3_STORAGE_THEMES_BUCKET=chamilo-themes
AWS_S3_STORAGE_PLUGINS_BUCKET=chamilo-plugins

# بادئات مسار اختيارية داخل دلو — مفيدة لمشاركة الدلال عبر البوابات
AWS_S3_STORAGE_ASSET_PREFIX=portal1/assets
AWS_S3_STORAGE_RESOURCE_PREFIX=portal1/resources
```

### Azure Blob Storage

```bash
# .env
AZURE_STORAGE_CONNECTION_STRING='DefaultEndpointsProtocol=https;AccountName=...;AccountKey=...'
AZURE_STORAGE_ASSET_CONTAINER=asset-container
AZURE_STORAGE_ASSET_CACHE_CONTAINER=asset-cache-container
AZURE_STORAGE_RESOURCE_CONTAINER=resources-container
AZURE_STORAGE_RESOURCE_CACHE_CONTAINER=resources-cache-container
AZURE_STORAGE_THEMES_CONTAINER=themes-container
# بادئات اختيارية
AZURE_STORAGE_ASSET_PREFIX=optional/prefix
```

### Google Cloud Storage

يهيئ GCS بنفس طريقة S3، باستخدام متغيرات بيئة خاصة بـGCS ودلو واحد لكل نقطة ربط. راجع `oneup_flysystem.yaml` المرسل مع إصدارك لأسماء المتغيرات الدقيقة — فهي موثقة أيضًا في `.env`.

### MinIO (متوافق مع S3)

يعمل MinIO من خلال محول S3 مع نقطة نهاية مخصصة وعنوان مسار — قم بتعيين `AWS_S3_STORAGE_*` كما في S3 وأضف نقطة نهاية MinIO وعلامات مسار مدعومة من الحزمة.

> يتم سرد مجموعة كاملة من أسماء المتغيرات في ملف `.env.dist` المرسل مع Chamilo. انسخ فقط الخطوط الخاصة بالمزود الذي تستخدمه فعليًا إلى `.env` وأزل تعليقها.

## نقل الملفات الحالية

إذا كنت تقوم بالتبديل من التخزين المحلي إلى التخزين السحابي على منصة موجودة، يجب عليك نقل الملفات الحالية:

1. قم بتهيئة محول التخزين الجديد كما هو موصوف أعلاه.
2. انسخ الملفات الحالية من دليل `var/upload/` المحلي إلى دلو التخزين السحابي الخاص بك، مع الحفاظ على هيكل الدليل.
3. تحقق من أن الملفات يمكن الوصول إليها من خلال المنصة بعد النقل.

## الصلاحيات والوصول

تأكد من أن دلو التخزين السحابي الخاص بك **غير متاح علنًا** ما لم تكن بحاجة صريحة إلى روابط ملفات عامة. يقدم Chamilo الملفات من خلال طبقة التحكم في الوصول الخاصة به، لذا فإن الوصول العام المباشر إلى الدلو غير ضروري ويشكل خطرًا أمنيًا.

بالنسبة لـS3، استخدم سياسة دلو تقيد الوصول ببيانات اعتماد IAM المُهيأة أعلاه.

## نصائح

* **اختبر باستخدام MinIO محليًا** قبل النشر إلى مزود سحابي -- MinIO خادم مجاني متوافق مع S3 يمكنك تشغيله على جهازك.
* **استخدم دلوًا مخصصًا** لـChamilo بدلاً من مشاركة دلو مع تطبيقات أخرى.
* **قم بإعداد سياسات دورة الحياة** على دلو السحابة الخاص بك لإدارة تكاليف التخزين (مثل نقل الملفات القديمة إلى طبقات تخزين أرخص).