# المكدس التقني

يصف ما يلي المكدس التقني لـ Chamilo 3.0. من المرجّح أن تتغيّر جميع الإصدارات المذكورة هنا مع صدور إصدارات جديدة من Chamilo. تستخدم أرقام الإصدارات [ترميز إصدارات Composer](https://getcomposer.org/doc/articles/versions.md) الذي يضع قواعد تسمح ببعض المرونة حول الإصدارات.

بما في ذلك التبعيات الهرمية، يستخدم Chamilo عدة مئات من مكتبات البرمجيات الحرة. تتضمن هذه القائمة فقط تلك التي نستخدمها أكثر والتي من المرجّح أن تؤثّر في عمل مطوّر Chamilo كل أسبوع تقريباً. نحن ممتنون لجميع مطوّري البرمجيات الحرة الآخرين الذين يجعلون عملنا أسهل وأكثر قابلية للصيانة وأكثر أماناً.

## Backend

| التقنية | الإصدار | الغرض |
|-----------|---------|---------|
| PHP | 8.3 – 8.5 | بيئة التشغيل |
| Symfony | 7.4.* | الإطار |
| Doctrine ORM | ^3.3 | تجريد قاعدة البيانات |
| API Platform | ^4.2 | إطار REST API |
| oneup/flysystem-bundle | ~4.0 | تجريد تخزين الملفات |
| vich/uploader-bundle | ^2.8 | معالجة رفع الملفات |
| stof/doctrine-extensions-bundle | ^1.12 | امتدادات Doctrine (شجرة، قابلية الختم الزمني، قابلية الاسم المختصر) |
| lexik/jwt-authentication-bundle | ^2.20 | مصادقة JWT |
| nelmio/cors-bundle | ^2.2 | ترويسات CORS |
| mpdf/mpdf | ~8.0 | توليد PDF |
| phpoffice/phpspreadsheet | ~1.16 | معالجة Excel/جداول البيانات |
| firebase/php-jwt | ^7.0 | معالجة رموز JWT |
| bigbluebutton/bigbluebutton-api-php | ^2.0 | تكامل BigBlueButton |
| packbackbooks/lti-1p3-tool | ^6.4 | تنفيذ LTI 1.3 |

## Frontend

| التقنية | الإصدار | الغرض |
|-----------|---------|---------|
| Vue.js | ^3.5 | إطار واجهة المستخدم |
| PrimeVue | ^4.5 | مكتبة المكوّنات |
| Pinia | ^3.0 | إدارة الحالة |
| Vue Router | ^5.1 | التوجيه من جانب العميل |
| Vue I18n | ^11.4 | التدويل |
| Axios | ^1.16 | عميل HTTP |
| TinyMCE | ^5.10 | محرّر النصوص الغنية |
| Chart.js | ^4.5 | المخططات والتصورات |
| FullCalendar | ^6.1 | مكوّن التقويم |
| Uppy | ^4.5 | ودجة رفع الملفات |

## أدوات البناء

| التقنية | الإصدار | الغرض |
|-----------|---------|---------|
| Composer | ^2.8 | مدير تبعيات PHP |
| Webpack | ^5.107 | حازم الوحدات |
| Symfony Webpack Encore | ^5.3 | غلاف Webpack لـ Symfony |
| Tailwind CSS | ^3.4 | إطار CSS قائم على الأدوات المساعدة |
| Sass | ^1.100 | معالج CSS المسبق |
| TypeScript | ^5.9 | JavaScript آمن الأنواع |
| ESLint | ^10.0 | التدقيق اللغوي للكود |
| Prettier | 3.8 | تنسيق الكود |

## الأيقونات

| المكتبة | الإصدار | الاستخدام |
|---------|---------|-------|
| @mdi/font | 7.4.47 | أيقونات Material Design (فئات CSS `mdi mdi-*`) |

## قاعدة البيانات

يدعم Chamilo:

* MySQL 5.7+
* MariaDB 10.11.2+

## التخزين السحابي

عبر محوّلات Flysystem:

* نظام الملفات المحلي (الافتراضي)
* AWS S3 (`league/flysystem-aws-s3-v3`)
* Azure Blob Storage (`azure-oss/storage-blob-flysystem`)
* Google Cloud Storage (`league/flysystem-google-cloud-storage`)