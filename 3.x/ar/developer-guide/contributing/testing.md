# الاختبار

## اختبار PHP

يستخدم Chamilo **PHPUnit** لاختبار الواجهة الخلفية.

### إعداد قاعدة بيانات الاختبار

تتطلب الاختبارات قاعدة بيانات مخصصة. أنشئ الملف `.env.test.local` ببيانات اعتماد قاعدة بيانات الاختبار الخاصة بك:

```ini
DATABASE_HOST='127.0.0.1'
DATABASE_PORT='3306'
DATABASE_NAME='chamilo_test'
DATABASE_USER='root'
DATABASE_PASSWORD='root'
```

ثم هيّئ قاعدة بيانات الاختبار:

```bash
php bin/console --env=test cache:clear
php bin/console --env=test doctrine:database:create
php bin/console --env=test doctrine:schema:create
php bin/console --env=test doctrine:fixtures:load --no-interaction
```

لإعادة التعيين بعد تغييرات المخطط:

```bash
php bin/console --env=test doctrine:schema:update --force --complete
```

### تشغيل الاختبارات

```bash
# Run all tests
php bin/phpunit

# Run a specific test file
php bin/phpunit tests/CoreBundle/Repository/UserRepositoryTest.php

# Run tests with HTML coverage report
php bin/phpunit --coverage-html var/coverage
```

### موقع الاختبارات

توجد الاختبارات في الدليل `tests/`، وهو غير مضمَّن في تنزيلات Chamilo المعبأة — فهو يأتي فقط مع `git clone`. يعكس `CoreBundle/` و`CourseBundle/` تخطيط الأدلة الفرعية لـ `src/CoreBundle/` و`src/CourseBundle/`:

```
tests/
├── CoreBundle/           # Api/, Command/, Controller/, DataFixtures/, Entity/, Repository/, Security/, Settings/, Tool/, ...
├── CourseBundle/         # Api/, Component/CourseCopy/, Repository/, Settings/
├── playwright/           # Browser-level end-to-end tests (see below)
├── AbstractApiTest.php   # Base class for API tests
└── ChamiloTestTrait.php  # Shared test helpers
```

راجع [هيكل المشروع](../getting-started/project-structure.md) للاطلاع على التخطيط الكامل لـ `tests/`، بما في ذلك المجلدات غير التابعة لمجموعة الاختبارات (`datafiller/`، `history/`، `procedures/`، `scripts/`).

### أنواع الاختبارات

* **اختبارات الوحدة/التكامل** — اختبارات PHPUnit في `CoreBundle/` و`CourseBundle/`؛ معظمها يصل إلى قاعدة بيانات حقيقية (عبر `dama/doctrine-test-bundle`)
* **اختبارات وظيفية (API)** — تمتد من `AbstractApiTest` وتختبر نقاط نهاية HTTP من طرف إلى طرف
* **اختبارات Playwright** — اختبارات قبول على مستوى المتصفح في `tests/playwright/` (انظر أدناه)

## اختبارات Playwright (من طرف إلى طرف)

يستخدم Chamilo [Playwright](https://playwright.dev/)، ويُشغَّل عبر [playwright-bdd](https://vitalets.github.io/playwright-bdd/) بحيث تبقى السيناريوهات بصيغة Gherkin العادية. وقد حلّ هذا محل مجموعة Behat القديمة؛ وتبقى سيناريوهات Behat في تاريخ git ويستحق الرجوع إليها عند إضافة تغطية لمنطقة كانت تختبرها سابقاً (`git ls-tree -r --name-only 98c77757ea6 tests/behat`)، لكن تعامل معها فقط كإشارة إلى التدفقات المهمة — فقد تدهورت المحددات، لذا تحقق مقابل التطبيق الحي.

```
tests/playwright/
├── features/             # Gherkin scenarios (*.feature)
├── steps/common.steps.ts # Step definitions (TypeScript)
├── fixtures/             # Test files used by scenarios (e.g. spreadsheets)
├── scripts/              # Supporting scripts (e.g. check-results.mjs)
└── playwright.config.ts  # Base URL and browser options
```

قبل التشغيل الأول، ازرع البيانات الثابتة التي تفترض معظم السيناريوهات وجودها، بهذا الترتيب:

```bash
yarn test:playwright:seed                 # the fixed test users
yarn test:playwright:seed-course          # the TEMP course
yarn test:playwright:seed-private-course  # the TEMPPRIVATE course
yarn test:playwright:seed-settings        # settings some scenarios need enabled
```

ثم شغّل المجموعة (تُستثنى منها عمليات الزرع وسيناريو المثبّت):

```bash
yarn test:playwright                                              # everything
yarn test:playwright tests/playwright/features/toolForum.feature  # a single file
yarn test:playwright:ui                                           # interactive runner
```

يغطي `yarn test:playwright:install` مثبّت الويب نفسه. وهو يعيد إنشاء قاعدة البيانات، لذا فهو مخصص لـ CI فقط — لا تشغّله أبداً ضد تثبيت تهتم به.

بعد تعديل ملف `.feature` أو أي شيء ضمن `tests/playwright/steps/`، أعد توليد المواصفات المجمَّعة قبل الوثوق بتشغيل:

```bash
node_modules/.bin/bddgen --config=tests/playwright/playwright.config.ts
```

## فحوصات الواجهة الأمامية

```bash
# Lint JavaScript/Vue (ESLint with Prettier)
yarn eslint assets/vue/

# Type-check TypeScript
yarn tsc --noEmit

# Build production assets (verifies the entire build compiles)
yarn build
```

## جودة شيفرة PHP

يستخدم Chamilo **ECS** (Easy Coding Standard) و**PHPStan** و**Psalm** لجودة الشيفرة. تتوفر اختصارات Composer لكل منها:

```bash
# Check code style (ECS — Easy Coding Standard)
composer phpcs
# or directly:
vendor/bin/ecs check

# Auto-fix code style violations
composer phpcs-fix
# or directly:
vendor/bin/ecs check --fix

# Static analysis with PHPStan (level 5, scans src/ and tests/)
composer phpstan
# or directly:
vendor/bin/phpstan analyse

# Static analysis with Psalm
composer psalm
# or directly:
vendor/bin/psalm --show-info=false
```

ملاحظة: لا يوجد `php-cs-fixer` في هذا المشروع. أداة تنسيق الشيفرة هي ECS (`symplify/easy-coding-standard`).

## التكامل المستمر

تُفحص طلبات السحب تلقائيًا عبر أربعة مسارات عمل في GitHub Actions:

| مسار العمل | ما الذي يشغّله |
|----------|-------------|
| `phpunit.yml` | مجموعة اختبارات PHPUnit |
| `format_code.yml` | فحص أسلوب الشيفرة عبر ECS |
| `php_analysis.yml` | Psalm، والتحقق من مخطط Doctrine، ومدقق متطلبات الاعتماديات |
| `playwright.yml` | اختبارات Playwright من طرف إلى طرف (يثبّت Chamilo عبر مثبّت الويب، ثم يشغّل المجموعة) |