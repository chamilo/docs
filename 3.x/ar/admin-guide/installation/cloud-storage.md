# التخزين السحابي

يدعم Chamilo 3.0 خلفيات التخزين السحابي لملفات المستخدمين المرفوعة عبر **Flysystem**، وهي مكتبة تجريد لنظام الملفات بلغة PHP مدمجة في Symfony. يتيح لك ذلك تخزين الملفات على خدمات سحابية بدلًا من نظام الملفات المحلي (أو بالإضافة إليه).

## لماذا تستخدم التخزين السحابي؟

* **قابلية التوسع** -- ينمو التخزين السحابي مع منصتك دون الحاجة إلى إدارة مساحة القرص.
* **النشر متعدد الخوادم** -- عند تشغيل عدة خوادم ويب خلف موازن أحمال، يضمن التخزين السحابي وصول جميع الخوادم إلى الملفات نفسها.
* **المتانة** -- يوفّر مزوّدو الخدمات السحابية تكرارًا ونسخًا احتياطيًا مدمجَين.
* **التكلفة** -- غالبًا ما يكون تخزين الكائنات أرخص لكل غيغابايت من التخزين الكتلي المرفق بالخوادم.

## المزوّدون المدعومون

| المزوّد | محوّل Flysystem |
|----------|-------------------|
| **Amazon S3** | `league/flysystem-aws-s3-v3` |
| **Google Cloud Storage** | `league/flysystem-google-cloud-storage` |
| **Azure Blob Storage** | `azure-oss/storage-blob-flysystem` |
| **MinIO** (متوافق مع S3) | يستخدم محوّل S3 مع نقطة نهاية مخصّصة |
| **DigitalOcean Spaces** (متوافق مع S3) | يستخدم محوّل S3 مع نقطة نهاية مخصّصة |
| **نظام الملفات المحلي** | الافتراضي، لا حاجة إلى حزم إضافية |

## التثبيت

يأتي Chamilo مسبقًا بالمزوّدين التاليين المثبّتين:

```bash
# Amazon S3
league/flysystem-aws-s3-v3

# Google Cloud Storage
league/flysystem-google-cloud-storage

# Azure Blob Storage
azure-oss/storage-blob-flysystem
```

## الإعداد

يقسّم Chamilo ملفاته عبر عدة نقاط تركيب لـ Flysystem — **assets**، و**assets cache**، و**resources**، و**resources cache**، و**themes**، و**plugins**. يمكن لكل نقطة تركيب أن تستهدف حاوية أو bucket مختلفًا. يُختار إعداد السحابة في `config/packages/oneup_flysystem.yaml` حسب البيئة باستخدام شروط `when@` ويقرأ المتغيرات التي تضبطها في `.env`.

### Amazon S3

```bash
# .env — common credentials
AWS_S3_STORAGE_VERSION=latest
AWS_S3_STORAGE_REGION=eu-central-1
AWS_S3_STORAGE_ACCESS_KEY=your-access-key
AWS_S3_STORAGE_ACCESS_SECRET=your-secret-key

# Per-mount buckets (each mount can be a different bucket)
AWS_S3_STORAGE_ASSET_BUCKET=chamilo-assets
AWS_S3_STORAGE_ASSET_CACHE_BUCKET=chamilo-asset-cache
AWS_S3_STORAGE_RESOURCE_BUCKET=chamilo-resources
AWS_S3_STORAGE_RESOURCE_CACHE_BUCKET=chamilo-resource-cache
AWS_S3_STORAGE_THEMES_BUCKET=chamilo-themes
AWS_S3_STORAGE_PLUGINS_BUCKET=chamilo-plugins

# Optional path prefixes inside a bucket — useful to share buckets across portals
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
# Optional prefixes
AZURE_STORAGE_ASSET_PREFIX=optional/prefix
```

### Google Cloud Storage

اضبط GCS بالطريقة نفسها المتّبعة مع S3، باستخدام متغيرات بيئة خاصة بـ GCS وحاوية (bucket) واحدة لكل نقطة تركيب. راجع ملف `oneup_flysystem.yaml` المرفق مع إصدارك لمعرفة أسماء المتغيرات الدقيقة — وهي موثّقة أيضًا في `.env`.

### MinIO (متوافق مع S3)

يعمل MinIO عبر محوّل S3 مع نقطة نهاية مخصّصة وعنونة بأسلوب المسار — اضبط `AWS_S3_STORAGE_*` كما في S3 وأضف نقطة نهاية MinIO وأعلام أسلوب المسار التي يدعمها الحزمة.

### DigitalOcean Spaces (متوافق مع S3)

DigitalOcean Spaces خدمة مستضافة منفصلة عن MinIO — فهي ليست MinIO في جوهرها، لكنها تعرض واجهة API متوافقة مع S3، لذا تعمل أيضًا عبر محوّل S3: اضبط `AWS_S3_STORAGE_*` كما في S3، ووجّه `AWS_S3_STORAGE_ENDPOINT` (أو متغير نقطة النهاية المكافئ في الحزمة) إلى نقطة النهاية الإقليمية الخاصة بـ Space لديك، مثل `https://<region>.digitaloceanspaces.com`.

> مجموعة أسماء المتغيرات الكاملة مدرجة في ملف `.env.dist` المرفق مع Chamilo. انسخ إلى ملف `.env` الخاص بك الأسطر الخاصة بالمزوّد الذي تستخدمه فعليًا فقط وأزل التعليق عنها.

## السمات

يعمل تركيب **السمات** بشكل مختلف عن البقية: السمات المرفقة مع Chamilo (`chamilo` و`chamilo3`) جزء من الشيفرة وتعيش في `var/themes`، وهو بالضبط الدليل الذي يخدمه المحوّل المحلي الافتراضي. عندما توجّه تركيب السمات إلى حاوية سحابية، تبدأ تلك الحاوية فارغة، فتغيب الشعارات والألوان وصور السمات ويُعرض الواجهة بلا تنسيق.

ارفع السمات المضمّنة إلى التخزين المُعدّ باستخدام:

```bash
php bin/console chamilo:remote-storage:upload-themes
```

| الخيار | التأثير |
|--------|--------|
| `--dry-run` | الإبلاغ عما سيُرفع دون كتابة أي شيء |
| `--overwrite` | استبدال الملفات الموجودة مسبقاً على التخزين البعيد |

تُحفظ الملفات الموجودة مسبقاً على نظام ملفات السمات ما لم يُعطَ `--overwrite`، لذا فإن إعادة تشغيل الأمر لا تلغي أبداً الشعارات أو سمات الألوان التي رفعها المسؤول عبر **الإدارة > الإعدادات > الألوان**. عندما يكون نظام ملفات السمات هو الدليل المحلي `var/themes` يكتشف الأمر ذلك ولا يفعل شيئاً، لذا من الآمن تشغيله على أي تثبيت.

يشغّل Chamilo هذا الأمر من تلقاء نفسه في نهاية معالج التثبيت ومرة أخرى بعد ترحيل قاعدة بيانات ناجح عند الترقية، فتصل ملفات السمات الجديدة إلى التخزين السحابي دون أي خطوة يدوية.

ما زالت حالتان تتطلبان تشغيله يدوياً:

* **تحويل منصة قائمة إلى تخزين سحابي**، إذ لا يحدث تثبيت أو ترقية في تلك اللحظة.
* **تحديث ملفات السمات التي تغيّرت في إصدار جديد**، مع `--overwrite`. لا تستبدل التشغيلات التلقائية أبداً، تحديداً حتى لا تعيد شعاراً رفعه المسؤول داخل سمة مضمّنة؛ والثمن أن `colors.css` أو `tiny-settings.js` المرفق بالإصدار الجديد لا يستبدل النسخة الموجودة أصلاً في الحاوية.

## ترحيل الملفات الموجودة

إذا كنت تنتقل من التخزين المحلي إلى التخزين السحابي على منصة قائمة، يجب ترحيل الملفات الموجودة:

1. اضبط محوّل التخزين الجديد كما هو موضح أعلاه.
2. انسخ الملفات الموجودة من الدليل المحلي `var/upload/` إلى دلو التخزين السحابي، مع الحفاظ على بنية الأدلة.
3. شغّل `php bin/console chamilo:remote-storage:upload-themes` لرفع السمات المضمّنة، كما هو موضح أعلاه.
4. تحقق من أن الملفات يمكن الوصول إليها عبر المنصة بعد الترحيل.

## الأذونات والوصول

تأكد من أن دلو التخزين السحابي **غير متاح للعامة** ما لم تكن بحاجة صريحة إلى عناوين URL عامة للملفات. يخدم Chamilo الملفات عبر طبقة التحكم في الوصول الخاصة به، لذا فإن الوصول العام المباشر إلى الدلو غير ضروري ويشكّل خطراً أمنياً.

بالنسبة إلى S3، استخدم سياسة دلو تقيّد الوصول إلى بيانات اعتماد IAM المُعدّة أعلاه.

## نصائح

* **اختبر باستخدام MinIO محلياً** قبل النشر لدى مزوّد سحابي -- MinIO خادم مجاني متوافق مع S3 يمكنك تشغيله على جهازك.
* **DigitalOcean Spaces** بديل مستضاف متوافق مع S3 لـ Amazon S3، وقد تأكد عمله مع محوّل S3 في Chamilo.
* **استخدم دلواً مخصصاً** لـ Chamilo بدلاً من مشاركة دلو مع تطبيقات أخرى.
* **اضبط سياسات دورة الحياة** على دلوك السحابي لإدارة تكاليف التخزين (مثلاً نقل الملفات القديمة إلى طبقات تخزين أرخص).