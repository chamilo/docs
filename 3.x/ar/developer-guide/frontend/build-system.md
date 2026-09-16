# نظام البناء

يستخدم Chamilo **Webpack 5** عبر **Symfony Webpack Encore** لبناء أصول الواجهة الأمامية. توجد إعدادات البناء الكاملة في `webpack.config.js` في جذر المشروع.

يُكتب المخرج إلى `public/build/`، ويُقدَّم تحت المسار العام `/build`.

## نقاط الدخول

### JavaScript

| Entry | Source | Purpose |
|-------|--------|---------|
| `vue` | `assets/vue/main.js` | تطبيق Vue 3 الرئيسي |
| `vue_installer` | `assets/vue/main_installer.js` | معالج التثبيت |
| `legacy_app` | `assets/js/legacy/app.js` | JavaScript القديم |
| `legacy_exercise` | `assets/js/legacy/exercise.js` | مشغّل التمارين |
| `legacy_lp` | `assets/js/legacy/lp.js` | مشغّل مسار التعلّم |
| `legacy_document` | `assets/js/legacy/document.js` | عارض المستندات |
| `legacy_free-jqgrid` | `assets/js/legacy/free-jqgrid.js` | ودجة الشبكة القديمة |
| `legacy_framereadyloader` | `assets/js/legacy/frameReadyLoader.js` | محمّل جاهزية الإطار لإطارات iframe القديمة |
| `translatehtml` | `assets/js/translatehtml.js` | مساعد ترجمة HTML |
| `glossary_auto` | `assets/js/glossary-auto.js` | إبراز مصطلحات المسرد تلقائيًا |

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

* **Vue 3 SFC** — تُجمَّع مكوّنات الملف الواحد `.vue` بواسطة `vue-loader`؛ مُعطَّل مُصرِّف وقت التشغيل (`runtimeCompilerBuild: false`)، لذا يجب أن تكون جميع القوالب مُصرَّفة مسبقًا
* **TypeScript** — وضع التحويل فقط (`transpileOnly: true`) لبناء سريع، دون فحص الأنواع أثناء البناء
* **Sass/SCSS** — دعم SCSS كامل عبر `sass-loader`
* **Tailwind CSS** — CSS قائم على الأدوات المساعدة يُعالَج ضمنيًا عبر PostCSS (مُعدّ داخل `webpack.config.js`؛ لا يوجد ملف `postcss.config.js` منفصل)
* **Babel** — تحويل ES6+ باستخدام `@babel/preset-env` وملحقات `core-js@3` (`useBuiltIns: "usage"`)
* **توفير jQuery تلقائيًا** — يجعل `autoProvidejQuery()` الرمزين `$` و`jQuery` متاحين عالميًا دون استيراد صريح، دعمًا للشيفرة القديمة
* **خرائط المصدر** — مفعَّلة في التطوير فقط
* **قطعة تشغيل واحدة** — وقت تشغيل مشترك لجميع نقاط الدخول
* **ذاكرة تخزين نظام الملفات** — ذاكرة Webpack الدائمة على نظام الملفات مفعَّلة لتسريع إعادة البناء التدريجي
* **تسمية نطاق القطع** — يُضبط `output.uniqueName` و`output.chunkLoadingGlobal` على `"chamilo"` / `"webpackChunkChamilo"` لتفادي تعارض تحميل القطع عند تعايش عدة حزم Webpack في الصفحة نفسها

## ميزات الإنتاج فقط

* **الإصدارات** — لواحق تجزئة المحتوى على جميع أسماء ملفات المخرج (`enableVersioning()`)
* **سلامة الموارد الفرعية** — سمات `integrity` على وسوم `<script>` و`<link>` (`enableIntegrityHashes()`)
* **تنظيف المخرج** — يُمسح `public/build/` قبل كل بناء إنتاج

### نسخ الأصول غير المُجزَّأة (`CopyUnhashedAssetsPlugin`)

تشير بعض صفحات PHP القديمة إلى الأصول باسم ملف ثابت ولا يمكنها استخدام بيان Webpack. ينسخ مكوّن إضافي مخصص `CopyUnhashedAssetsPlugin` (معرَّف في أسفل `webpack.config.js`) ملفات إنتاج مُجزَّأة معيّنة إلى مسار إضافي غير مُجزَّأ بعد كل بناء:

| Hashed file | Unhashed copy |
|-------------|--------------|
| `legacy_document.[hash].js` | `legacy_document.js` |
| `legacy_exercise.[hash].js` | `legacy_exercise.js` |
| `legacy_framereadyloader.[hash].js` / `.css` | `legacy_framereadyloader.js` / `.css` |
| `css/document.[hash].css` | `css/document.css` |
| `css/editor_content.[hash].css` | `css/editor_content.css` |
| `glossary_auto.[hash].js` | `glossary_auto.js` |

## أصول المكتبات المنسوخة

ينسخ `copyFiles()` عددًا من حزم npm مباشرة إلى `public/build/libs/` دون تجميعها، لاستخدامها عبر وسوم `<script>` / `<link>` في القوالب القديمة:

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

## إعداد Tailwind

يتم إعداد Tailwind في `tailwind.config.js`. النقاط الرئيسية:

* **`important: true`** — تتضمن جميع الأدوات المساعدة المُولَّدة `!important`، مما يتيح لها تجاوز أنماط مكوّنات PrimeVue دون حيل إضافية لزيادة التحديد
* **مسارات المحتوى** — يمسح Tailwind الملفات `assets/**/*.{js,vue}` و`public/main/**/*.{php,twig,tpl}` و`public/plugin/**/*.{php,twig,tpl}` و`src/CoreBundle/Resources/views/**/*.html.twig` بحثًا عن استخدام الأصناف
* **نظام ألوان بمتغيرات CSS** — كل رمز لون (primary وsecondary وtertiary وsuccess وinfo وwarning وdanger) مدعوم بخاصية CSS مخصصة (مثل `--color-primary-base`) تُعرَّف لكل سمة في `var/themes/[theme-name]/colors.css`. القيم هي ثلاثيات قنوات RGB مفصولة بمسافات، مما يتيح أدوات الشفافية في Tailwind (`bg-primary/50`)
* **مقياس خطوط مخصص** — تُضاف أزواج الحجم/ارتفاع السطر `body-1` و`body-2` و`caption` و`tiny` عبر `theme.extend.fontSize`
* **الإضافات** — يتم تفعيل `@tailwindcss/forms` و`@tailwindcss/typography`

يُعدَّ PostCSS (Tailwind + Autoprefixer) ضمنيًا داخل `webpack.config.js` عبر `enablePostCssLoader()` — ولا يوجد ملف مستقل باسم `postcss.config.js`.