# CSS و Tailwind

## معمارية أوراق الأنماط

تُرتب أنماط Chamilo في هذا الترتيب الطبقي:

1. **Tailwind CSS** — فئات مساعدة للتخطيط، والتباعد، واللون. مُهيأة بـ `important: true` بحيث تتجاوز الفئات المساعدة إعدادات مكونات PrimeVue الافتراضية.
2. **SCSS** — أنماط مخصصة في `assets/css/scss/`، منظمة في طبقات الذرات، والجزيئات، والكائنات الحية، والتخطيط، والمكونات.
3. **أنماط مكونات PrimeVue** — يتم تجاوزها لكل مكون داخل `assets/css/scss/atoms/`.
4. **أنماط `colors.css` للثيم** — خصائص CSS مخصصة لثيم اللون النشط، يتم تحميلها أخيراً بحيث تتدفق فوق كل شيء آخر.

يُدرج PrimeFlex في `package.json` لكنه غير مستورد — Tailwind يغطي جميع احتياجات الفئات المساعدة.

## ورقة الأنماط الرئيسية (`assets/css/app.scss`)

`app.scss` هي نقطة الدخول Webpack لورقة الأنماط الرئيسية. إنها تستورد:

1. `_tailwind.scss` — توجيهات Tailwind `@tailwind base / components / utilities`
2. `scss/index.scss` — ملف برميل يستورد جميع الأجزاء الجزئية SCSS
3. CSS من جهات خارجية (cropper، select2، daterangepicker، جلد TinyMCE، fancybox، timepicker، qtip)
4. `editor_content.scss` — أنماط يتم حقنها في جسم إطار TinyMCE editor iframe

## تكوين Tailwind (`tailwind.config.js`)

الإعدادات الرئيسية:

```javascript
module.exports = {
  important: true,   // all utilities get !important
  content: [
    "./assets/**/*.{js,vue}",
    "./public/main/**/*.{php,twig,tpl}",
    "./public/plugin/**/*.{php,twig,tpl}",
    "./src/CoreBundle/Resources/views/**/*.html.twig",
  ],
  // ...
}
```

مسارات المحتوى تفحص مكونات Vue، وصفحات PHP التقليدية، وملفات الإضافات، وقوالب Twig حتى يتم تنقية الفئات المساعدة غير المستخدمة في بناءات الإنتاج.

### نظام ألوان متغيرات CSS

جميع رموز الألوان مدعومة بخصائص CSS مخصصة بدلاً من قيم مشفرة مسبقاً:

```javascript
theme: {
  colors: {
    primary: {
      DEFAULT: colorWithOpacity("--color-primary-base"),
      gradient: colorWithOpacity("--color-primary-gradient"),
    },
    secondary: { ... },
    // success, info, warning, danger, tertiary, form
  }
}
```

المساعد `colorWithOpacity` يصدر `rgb(var(--color-primary-base) / <opacity>)`، مما يمكّن متغيرات الشفافية مثل `bg-primary/50`. يتم تعريف قيم RGB الفعلية لكل ثيم في `var/themes/{slug}/colors.css` ويتم تحميلها أثناء التشغيل — انظر [Color Themes](color-themes.md).

### إضافات Tailwind

`@tailwindcss/forms` و `@tailwindcss/typography` مفعّلان.

### مقياس خطوط مخصص

يتم إضافة أربعة أزواج إضافية لحجم الخط/ارتفاع السطر عبر `theme.extend.fontSize`:

| الفئة | الحجم / ارتفاع السطر |
|-------|------------------------|
| `text-body-1` | 16px / 24px |
| `text-body-2` | 14px / 16px |
| `text-caption` | 13px / 16px |
| `text-tiny` | 11px / 16px |

## PostCSS

يتم تكوين PostCSS (Tailwind + Autoprefixer) داخل `webpack.config.js` عبر `enablePostCssLoader()`. لا يوجد ملف `postcss.config.js` مستقل.

## أوراق أنماط متخصصة

| الملف | نقطة دخول Webpack | الغرض |
|-------|-------------------|-------|
| `assets/css/app.scss` | `app` | أنماط التطبيق الرئيسية |
| `assets/css/chat.scss` | `css/chat` | أنماط واجهة الدردشة |
| `assets/css/document.scss` | `css/document` | أنماط عارض الوثائق |
| `assets/css/editor.scss` | `css/editor` | أنماط غلاف محرر TinyMCE |
| `assets/css/editor_content.scss` | `css/editor_content` | أنماط يتم حقنها في جسم إطار المحرر |
| `assets/css/markdown.scss` | `css/markdown` | محتوى Markdown المُعالج |
| `assets/css/print.scss` | `css/print` | ورقة أنماط الطباعة |
| `assets/css/responsive.scss` | `css/responsive` | تجاوزات الاستجابة |
| `assets/css/scorm.scss` | `css/scorm` | أنماط مشغل SCORM |

## هيكل وحدات SCSS (`assets/css/scss/`)

```
scss/
├── index.scss        # Barrel — imports everything below
├── abstracts/        # Mixins and shared functions
├── settings/         # Design tokens (typography, component base)
├── atoms/            # Per-component PrimeVue overrides
├── molecules/        # Small composed patterns (chips, toolbars, empty states)
├── organisms/        # Larger areas (sidebar, datatable, dialog, LP panel)
├── layout/           # Page skeleton (topbar, main container, breadcrumb)
├── components/       # Feature-specific styles (blog, exercise, social, skill, …)
└── libs/             # Third-party overrides (FullCalendar, MediaElement.js)
```

## استخدام Tailwind في مكونات Vue

```vue
<template>
  <div class="flex gap-2 p-4">
    <BaseButton class="bg-primary text-white" label="Save" />
  </div>
</template>
```

بسبب تعيين `important: true` في `tailwind.config.js`، تتجاوز فئات Tailwind المساعدة أنماط مكونات PrimeVue بشكل موثوق دون الحاجة إلى تحديد إضافي.