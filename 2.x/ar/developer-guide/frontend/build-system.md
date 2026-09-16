# نظام البناء

يستخدم **Chamilo** برنامج **Webpack 5** عبر **Symfony Webpack Encore** لبناء أصول الواجهة الأمامية. يوجد الإعداد الكامل للبناء في `webpack.config.js` في جذر المشروع.

يتم كتابة المخرجات إلى `public/build/`، ويتم تقديمها تحت مسار `/build` العام.

## نقاط الدخول

### JavaScript

| Entry | Source | Purpose |
|-------|--------|---------|
| `vue` | `assets/vue/main.js` | التطبيق الرئيسي Vue 3 |
| `vue_installer` | `assets/vue/main_installer.js` | معالج التثبيت |
| `legacy_app` | `assets/js/legacy/app.js` | JavaScript القديم |
| `legacy_exercise` | `assets/js/legacy/exercise.js` | مشغل التمارين |
| `legacy_lp` | `assets/js/legacy/lp.js` | مشغل مسار التعلم |
| `legacy_document` | `assets/js/legacy/document.js` | عارض الوثائق |
| `legacy_free-jqgrid` | `assets/js/legacy/free-jqgrid.js` | عنصر واجهة الشبكة القديم |
| `legacy_framereadyloader` | `assets/js/legacy/frameReadyLoader.js` | محمل جاهز للإطارات لـ iframes القديمة |
| `translatehtml` | `assets/js/translatehtml.js` | مساعد ترجمة HTML |
| `glossary_auto` | `assets/js/glossary-auto.js` | تمييز تلقائي لمصطلحات المصطلحات |

### CSS

| Entry | Source |
|-------|--------|
| `app` | `assets/css/app.scss` |
| `css/chat` | `assets/css/chat.scss` |
| `css/document` | `assets/css/document.scss` |
| `css/editor` | `assets/css/editor.scss` |
| `css/editor_content` | `assets/css/editor_content.scss` |
| `css/markdown` | `assets/css/markdown.scss` |
| `css/print` | `assets/css/print.scss` |
| `css/responsive` | `assets/css/responsive.scss` |
| `css/scorm` | `assets/css/scorm.scss` |

## ميزات البناء

* **Vue 3 SFC** — مكونات الملف الواحد `.vue` المجمعة بواسطة `vue-loader`؛ مترجم التشغيل معطل (`runtimeCompilerBuild: false`)، لذا يجب ترجمة جميع القوالب مسبقًا
* **TypeScript** — وضع التحويل فقط (`transpileOnly: true`) لبناء سريع، بدون فحص الأنواع أثناء البناء
* **Sass/SCSS** — دعم كامل لـ SCSS عبر `sass-loader`
* **Tailwind CSS** — CSS مبني على المرافق يتم معالجته داخليًا عبر PostCSS (مع إعداد داخل `webpack.config.js`؛ لا يوجد `postcss.config.js` منفصل)
* **Babel** — تحويل ES6+ مع `@babel/preset-env` وملء فجوات `core-js@3` (`useBuiltIns: "usage"`)
* **jQuery auto-provision** — `autoProvidejQuery()` يجعل `$` و`jQuery` متاحين عالميًا بدون استيراد صريح، مما يدعم الكود القديم
* **Source maps** — مفعل في التطوير فقط
* **Single runtime chunk** — تشغيل مشترك لجميع نقاط الدخول
* **Filesystem cache** — ذاكرة التخزين المؤقت لنظام الملفات الدائمة لـ Webpack مفعلة لتسريع إعادة البناء التدريجي
* **Chunk namespacing** — `output.uniqueName` و`output.chunkLoadingGlobal` مضبوطان على `"chamilo"` / `"webpackChunkChamilo"` لتجنب التصادمات في تحميل القطع عند وجود حزم Webpack متعددة على صفحة واحدة

## ميزات الإنتاج فقط

* **Versioning** — ملحقات محتوى الهاش على جميع أسماء الملفات المخرجة (`enableVersioning()`)
* **Subresource Integrity** — سمات `integrity` على علامات `<script>` و`<link>` (`enableIntegrityHashes()`)
* **Output cleanup** — يتم مسح `public/build/` قبل كل بناء إنتاج

### نسخ أصول غير مشفرة (`CopyUnhashedAssetsPlugin`)

تشير بعض صفحات PHP القديمة إلى الأصول باسم ملف ثابت ولا يمكنها استخدام مظهر Webpack. يقوم `CopyUnhashedAssetsPlugin` المخصص (معرّف في أسفل `webpack.config.js`) بنسخ بعض ملفات الإنتاج المشفرة إلى مسار إضافي غير مشفر بعد كل بناء:

| Hashed file | Unhashed copy |
|-------------|--------------|
| `legacy_document.[hash].js` | `legacy_document.js` |
| `legacy_exercise.[hash].js` | `legacy_exercise.js` |
| `legacy_framereadyloader.[hash].js` / `.css` | `legacy_framereadyloader.js` / `.css` |
| `css/document.[hash].css` | `css/document.css` |
| `css/editor_content.[hash].css` | `css/editor_content.css` |
| `glossary_auto.[hash].js` | `glossary_auto.js` |

## أصول المكتبات المنسوخة

يقوم `copyFiles()` بنسخ عدد من حزم npm مباشرة إلى `public/build/libs/` بدون تجميعها، للاستخدام عبر علامات `<script>` / `<link>` في القوالب القديمة:

* `flatpickr` (JS + CSS + locales)
* `chart.js`
* `mediaelement` + `mediaelement-plugins`
* `moment` locales
* `select2` (JS + CSS)
* `qtip2`
* `readmore-js`
* `js-cookie`
* `pwstrength-bootstrap`
* `multiselect-two-sides`

## أوامر البناء

```bash
# Development build
yarn encore dev

# Development build with file watching
yarn encore dev --watch

# Production build (minified, versioned, integrity hashes)
yarn encore production
```

---
## تكوين Tailwind

يتم تكوين Tailwind في `tailwind.config.js`. النقاط الرئيسية:

* **`important: true`** — جميع المرافق المُولدة تشمل `!important`، مما يسمح لها بتجاوز أنماط مكونات PrimeVue دون الحاجة إلى حيل تحديد إضافية
* **مسارات المحتوى** — يقوم Tailwind بفحص `assets/**/*.{js,vue}`، `public/main/**/*.{php,twig,tpl}`، `public/plugin/**/*.{php,twig,tpl}`، و `src/CoreBundle/Resources/views/**/*.html.twig` لاستخدام الفئات
* **نظام ألوان متغيرات CSS** — كل رمز لون (primary، secondary، tertiary، success، info، warning، danger) مدعوم بخاصية CSS مخصصة (مثل `--color-primary-base`) مُعرّفة لكل سمة في `var/themes/[theme-name]/colors.css`. القيم عبارة عن ثلاثيات قنوات RGB مفصولة بمسافات، مما يمكّن مرافق Tailwind للشفافية (`bg-primary/50`)
* **مقياس خط مخصص** — يتم إضافة أزواج الحجم/ارتفاع السطر `body-1`، `body-2`، `caption`، `tiny` عبر `theme.extend.fontSize`
* **الإضافات** — `@tailwindcss/forms` و `@tailwindcss/typography` مُفعّلتان

يتم تكوين PostCSS (Tailwind + Autoprefixer) داخليًا داخل `webpack.config.js` عبر `enablePostCssLoader()` — لا يوجد ملف `postcss.config.js` مستقل.