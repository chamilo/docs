# الاختبار

## اختبار PHP

يستخدم **Chamilo** برنامج **PHPUnit** لاختبار الخلفية.

### إعداد قاعدة بيانات الاختبار

تتطلب الاختبارات قاعدة بيانات مخصصة. أنشئ `.env.test.local` مع بيانات اعتماد قاعدة بيانات الاختبار:

```ini
DATABASE_HOST='127.0.0.1'
DATABASE_PORT='3306'
DATABASE_NAME='chamilo_test'
DATABASE_USER='root'
DATABASE_PASSWORD='root'
```

ثم قم بتهيئة قاعدة بيانات الاختبار:

```bash
php bin/console --env=test cache:clear
php bin/console --env=test doctrine:database:create
php bin/console --env=test doctrine:schema:create
php bin/console --env=test doctrine:fixtures:load --no-interaction
```

لإعادة التعيين بعد تغييرات في المخطط:

```bash
php bin/console --env=test doctrine:schema:update --force --complete
```

### تشغيل الاختبارات

```bash
# تشغيل جميع الاختبارات
php bin/phpunit

# تشغيل ملف اختبار محدد
php bin/phpunit tests/CoreBundle/Repository/UserRepositoryTest.php

# تشغيل الاختبارات مع تقرير تغطية HTML
php bin/phpunit --coverage-html var/coverage
```

### موقع الاختبارات

توجد الاختبارات في دليل `tests/`:

```
tests/
├── CoreBundle/
│   ├── Api/
│   ├── Command/
│   ├── Controller/
│   ├── Migrations/
│   ├── Repository/
│   ├── Security/
│   ├── Serializer/
│   ├── Settings/
│   ├── Tool/
│   └── Twig/
├── CourseBundle/
│   ├── Repository/
│   └── Settings/
├── behat/               # Behat end-to-end tests
├── fixtures/            # Alice fixture files
├── AbstractApiTest.php  # Base class for API tests
└── ChamiloTestTrait.php # Shared test helpers
```

### أنواع الاختبارات

* **اختبارات الوحدة/التكامل** — اختبارات PHPUnit في `CoreBundle/` و`CourseBundle/`؛ معظمها يصل إلى قاعدة بيانات حقيقية (عبر `dama/doctrine-test-bundle`)
* **اختبارات وظيفية (API)** — تمتد `AbstractApiTest` وتختبر نقاط نهاية HTTP من نهاية إلى نهاية
* **اختبارات Behat** — اختبارات قبول على مستوى المتصفح في `tests/behat/features/` (انظر أدناه)

## اختبارات Behat (من نهاية إلى نهاية)

يحتوي **Chamilo** على مجموعة اختبار Behat لاختبار القبول على مستوى المتصفح. يتطلب تشغيل نسخة Chamilo، Chrome، وChromeDriver.

```bash
# من دليل tests/behat/:
../../vendor/behat/behat/bin/behat features/actionInstall.feature
../../vendor/behat/behat/bin/behat features/createUser.feature
../../vendor/behat/behat/bin/behat features/createCourse.feature

# أو تشغيل جميع الميزات:
../../vendor/behat/behat/bin/behat
```

قم بتكوين عنوان URL الأساسي في `tests/behat/behat.yml` قبل التشغيل.

## فحوصات الواجهة الأمامية

```bash
# فحص JavaScript/Vue (ESLint مع Prettier)
yarn eslint assets/vue/

# فحص أنواع TypeScript
yarn tsc --noEmit

# بناء أصول الإنتاج (يتحقق من تجميع البناء بأكمله)
yarn build
```

## جودة كود PHP

يستخدم **Chamilo** أدوات **ECS** (Easy Coding Standard)، و**PHPStan**، و**Psalm** لجودة الكود. تتوفر اختصارات Composer لكل منها:

```bash
# فحص أسلوب الكود (ECS — Easy Coding Standard)
composer phpcs
# أو مباشرة:
vendor/bin/ecs check

# إصلاح مخالفات أسلوب الكود تلقائيًا
composer phpcs-fix
# أو مباشرة:
vendor/bin/ecs check --fix

# تحليل ثابت باستخدام PHPStan (مستوى 5، يفحص src/ وtests/)
composer phpstan
# أو مباشرة:
vendor/bin/phpstan analyse

# تحليل ثابت باستخدام Psalm
composer psalm
# أو مباشرة:
vendor/bin/psalm --show-info=false
```

ملاحظة: لا يوجد `php-cs-fixer` في هذا المشروع. ECS (`symplify/easy-coding-standard`) هو أداة أسلوب الكود.

## التكامل المستمر

يتم فحص طلبات السحب تلقائيًا بواسطة أربعة تدفقات عمل GitHub Actions:

| التدفق العملي | ما يشغله |
|----------|-------------|
| `phpunit.yml` | مجموعة اختبار PHPUnit |
| `format_code.yml` | فحص أسلوب كود ECS |
| `php_analysis.yml` | Psalm، التحقق من صحة مخطط Doctrine، فاحص الأمان |
| `behat.yml` | اختبارات Behat من نهاية إلى نهاية |