# إعداد التطوير

## المتطلبات المسبقة

* PHP 8.3 أو 8.4 أو 8.5 مع الإضافات: intl, gd, curl, zip, mbstring, xml, json, pdo, ldap, exif, bcmath
* Composer
* Node.js و npm (أو Yarn — يستخدم المشروع Yarn 4؛ راجع `package.json` للإصدار المثبَّت بدقة)
* MySQL 5.7+ أو MariaDB 10.11+
* Git

## خطوات التثبيت

### 1. استنساخ المستودع

```bash
git clone https://github.com/chamilo/chamilo-lms.git chamilo
cd chamilo
```

### 2. تثبيت اعتماديات PHP

```bash
composer install
```

### 3. تهيئة البيئة

يوفّر المستودع ملف `.env.dist` كمرجع. أنشئ ملف `.env` فارغًا سيملؤه مثبِّت الويب — إبقاؤه فارغًا يضمن ألا تُستبدل ترقياتك إعداداتك المحلية:

```bash
touch .env
```

ثم اجعل `.env` و`config/` قابلين للكتابة من قِبل خادم الويب حتى يتمكّن المثبِّت من كتابة إعداداتك المحلية:

```bash
sudo chown -R www-data: .env config/ var/
```

### 4. تثبيت اعتماديات الواجهة الأمامية والبناء

```bash
# Install JavaScript dependencies
yarn install

# Build frontend assets for development
yarn encore dev

# Or watch for changes during development
yarn encore dev --watch
```

### 5. تشغيل خادم التطوير

```bash
symfony server:start
```

أو استخدم Apache/Nginx موجَّهًا إلى الدليل `public/`.

### 6. إعداد قاعدة البيانات

شغّل معالج التثبيت عبر الويب بالانتقال إلى عنوان URL الخاص بـ Chamilo في المتصفح.

### 7. توليد مفاتيح JWT

```bash
php bin/console lexik:jwt:generate-keypair
```

### 8. تأمين نظامك

يحتاج ملف `.env` ودليل `config/` إلى أن يكونا قابلين للكتابة فقط أثناء التثبيت. أمِّنهما بعد ذلك:

```bash
sudo chown -R root: .env config/
```

يجب أن يبقى الدليل `var/` قابلاً للكتابة من قِبل خادم الويب.


## أوامر البناء

| الأمر | الغرض |
|---------|---------|
| `yarn encore dev` | بناء الواجهة الأمامية للتطوير |
| `yarn encore dev --watch` | البناء ومراقبة التغييرات |
| `yarn encore production` | بناء محسَّن للإنتاج |
| `php bin/console cache:clear` | مسح ذاكرة التخزين المؤقت لـ Symfony |

## نصائح للتطوير

* عيّن `APP_ENV=dev` و`APP_DEBUG=1` في `.env` للحصول على رسائل أخطاء مفصّلة
* يظهر شريط أدوات تصحيح Symfony في أسفل الصفحات في وضع التطوير
* تتوفر وثائق API على `/api` عندما يكون `APP_ENABLE_API_ENTRYPOINT=true` (بعد مسح ذاكرة التخزين المؤقت — راجع [الإعدادات](../../admin-guide/installation/configuration.md#enable-the-api-documentation))
* استخدم `yarn encore dev --watch` لإعادة بناء تغييرات الواجهة الأمامية تلقائيًا