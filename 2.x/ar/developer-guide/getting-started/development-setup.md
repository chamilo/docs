# إعداد التطوير

## المتطلبات الأساسية

* PHP 8.2+ مع الامتدادات: intl, gd, curl, zip, mbstring, xml, json, pdo, ldap, exif, bcmath
* Composer
* Node.js و npm (أو Yarn — يستخدم المشروع Yarn 4؛ انظر `package.json` للإصدار المحدد بدقة)
* MySQL 5.7+ أو MariaDB 10.11+
* Git

## خطوات التثبيت

### 1. استنساخ المستودع

```bash
git clone https://github.com/chamilo/chamilo-lms.git chamilo
cd chamilo
```

### 2. تثبيت تبعيات PHP

```bash
composer install
```

### 3. تهيئة البيئة

يأتي المستودع مع `.env.dist` كمرجع. أنشئ ملف `.env` فارغًا سيملأه مثبت الويب — الحفاظ على فراغه يضمن عدم الكتابة فوق تكوينك المحلي أثناء الترقيات:

```bash
touch .env
```

ثم اجعل `.env` و `config/` قابلين للكتابة من قبل خادم الويب حتى يتمكن المثبت من كتابة تكوينك المحلي:

```bash
sudo chown -R www-data: .env config/ var/
```

### 4. تثبيت تبعيات الواجهة الأمامية والبناء

```bash
# تثبيت تبعيات JavaScript
yarn install

# بناء أصول الواجهة الأمامية للتطوير
yarn encore dev

# أو مراقبة التغييرات أثناء التطوير
yarn encore dev --watch
```

### 5. بدء خادم التطوير

```bash
symfony server:start
```

أو استخدم Apache/Nginx مشيرًا إلى دليل `public/` .

### 6. إعداد قاعدة البيانات

شغّل معالج التثبيت المبني على الويب بالانتقال إلى عنوان URL الخاص بـ Chamilo في المتصفح.

### 7. إنشاء مفاتيح JWT

```bash
php bin/console lexik:jwt:generate-keypair
```

### 8. تأمين نظامك

يحتاج ملف `.env` ودليل `config/` إلى أن يكونا قابلين للكتابة فقط خلال فترة التثبيت. أمّنهما بعد ذلك:

```bash
sudo chown -R root: .env config/
```

يحتاج دليل `var/` إلى أن يظل قابلًا للكتابة من قبل خادم الويب.

## أوامر البناء

| الأمر | الغرض |
|-------|-------|
| `yarn encore dev` | بناء الواجهة الأمامية للتطوير |
| `yarn encore dev --watch` | بناء ومراقبة التغييرات |
| `yarn encore production` | بناء محسن للإنتاج |
| `php bin/console cache:clear` | مسح ذاكرة التخزين المؤقت لـ Symfony |

## نصائح التطوير

* حدد `APP_ENV=dev` و `APP_DEBUG=1` في `.env` لرسائل خطأ مفصلة
* يظهر شريط أدوات تصحيح Symfony في أسفل الصفحات في وضع التطوير
* توثيق API متاح على `/api` عندما `APP_ENABLE_API_ENTRYPOINT=1`
* استخدم `yarn encore dev --watch` لإعادة بناء تغييرات الواجهة الأمامية تلقائيًا