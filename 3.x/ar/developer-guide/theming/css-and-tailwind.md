# CSS و Tailwind

## بنية أوراق الأنماط

تُطبَّق أنماط Chamilo وفق هذا الترتيب الطبقي:

1. **Tailwind CSS** — فئات مساعدة للتخطيط والمسافات والألوان. مُعدَّة بـ `important: true` حتى تتجاوز الأدوات الافتراضيات الخاصة بمكوّنات PrimeVue.
2. **SCSS** — أنماط مخصصة في `assets/css/scss/`، منظمة في طبقات الذرات والجزيئات والكائنات والتخطيط والمكوّنات.
3. **أنماط مكوّنات PrimeVue** — تُتجاوز لكل مكوّن داخل `assets/css/scss/atoms/`.
4. **`colors.css` الخاص بالسمة** — خصائص CSS مخصصة لسمة الألوان النشطة، تُحمَّل أخيرًا حتى تتدفق فوق كل ما عداها.

أُزيل PrimeFlex من `package.json` — يغطي Tailwind جميع احتياجات الأدوات المساعدة.

## ورقة الأنماط الرئيسية (`assets/css/app.scss`)

`app.scss` هي نقطة دخول Webpack لورقة الأنماط الرئيسية. تستورد:

1. `_tailwind.scss` — توجيهات Tailwind الخاصة بـ `@tailwind base / components / utilities`
2. `scss/index.scss` — ملف برميلي يستورد جميع أجزاء SCSS الجزئية
3. CSS من أطراف ثالثة (cropper، select2، daterangepicker، جلد TinyMCE، fancybox، timepicker، qtip)
4. `editor_content.scss` — أنماط تُحقَن في جسم إطار iframe لمحرر TinyMCE

## إعداد Tailwind (`tailwind.config.js`)

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

تمسح مسارات المحتوى مكوّنات Vue وصفحات PHP القديمة وملفات الإضافات وقوالب Twig حتى تُزال الأدوات غير المستخدمة عند بناء الإنتاج.

### نظام الألوان بمتغيرات CSS

جميع رموز الألوان مدعومة بخصائص CSS مخصصة بدل القيم الثابتة:

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

يُصدِر المساعد `colorWithOpacity` القيمة `rgb(var(--color-primary-base) / <opacity>)`، مما يتيح متغيرات الشفافية مثل `bg-primary/50`. تُعرَّف قيم RGB الفعلية لكل سمة في `var/themes/{slug}/colors.css` وتُحمَّل في وقت التشغيل — انظر [سمات الألوان](color-themes.md).

### إضافات Tailwind

مُفعَّلتان `@tailwindcss/forms` و `@tailwindcss/typography`.

### مقياس الكتابة المخصص

تُضاف أربع أزواج إضافية لحجم الخط/ارتفاع السطر عبر `theme.extend.fontSize`:

| الفئة | الحجم / ارتفاع السطر |
|-------|--------------------|
| `text-body-1` | 16px / 24px |
| `text-body-2` | 14px / 16px |
| `text-caption` | 13px / 16px |
| `text-tiny` | 11px / 16px |

## PostCSS

يُعدَّ PostCSS (Tailwind + Autoprefixer) ضمنيًا داخل `webpack.config.js` عبر `enablePostCssLoader()`. لا يوجد ملف مستقل `postcss.config.js`.

## أوراق أنماط متخصصة

| الملف | نقطة دخول Webpack | الغرض |
|------|--------------|---------|
| `assets/css/app.scss` | `app` | أنماط التطبيق الرئيسية |
| `assets/css/chat.scss` | `css/chat` | أنماط واجهة الدردشة |
| `assets/css/document.scss` | `css/document` | أنماط عارض المستندات |
| `assets/css/editor.scss` | `css/editor` | أنماط غلاف محرر TinyMCE |
| `assets/css/editor_content.scss` | `css/editor_content` | أنماط تُحقَن في جسم إطار iframe للمحرر |
| `assets/css/markdown.scss` | `css/markdown` | المحتوى المعروض بتنسيق Markdown |
| `assets/css/print.scss` | `css/print` | ورقة أنماط الطباعة |
| `assets/css/responsive.scss` | `css/responsive` | تجاوزات متجاوبة |
| `assets/css/scorm.scss` | `css/scorm` | أنماط مشغّل SCORM |

## بنية وحدات SCSS (`assets/css/scss/`)

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

## استخدام Tailwind في مكوّنات Vue

```vue
<template>
  <div class="flex gap-2 p-4">
    <BaseButton class="bg-primary text-white" label="Save" />
  </div>
</template>
```

نظرًا لتعيين `important: true` في `tailwind.config.js`، تتجاوز أدوات Tailwind أنماط مكوّنات PrimeVue بموثوقية دون الحاجة إلى تخصيص إضافي.