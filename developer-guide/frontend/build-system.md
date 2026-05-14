# 构建系统

Chamilo 使用 **Webpack 5** 通过 **Symfony Webpack Encore** 来构建前端资源。完整的构建配置位于项目根目录下的 `webpack.config.js` 文件中。

输出文件写入到 `public/build/` 目录，并以 `/build` 作为公共路径提供服务。

## 入口点

### JavaScript

| 入口 | 源文件 | 用途 |
|-------|--------|---------|
| `vue` | `assets/vue/main.js` | 主要的 Vue 3 应用程序 |
| `vue_installer` | `assets/vue/main_installer.js` | 安装向导 |
| `legacy_app` | `assets/js/legacy/app.js` | 旧版 JavaScript |
| `legacy_exercise` | `assets/js/legacy/exercise.js` | 练习播放器 |
| `legacy_lp` | `assets/js/legacy/lp.js` | 学习路径播放器 |
| `legacy_document` | `assets/js/legacy/document.js` | 文档查看器 |
| `legacy_free-jqgrid` | `assets/js/legacy/free-jqgrid.js` | 旧版网格小部件 |
| `legacy_framereadyloader` | `assets/js/legacy/frameReadyLoader.js` | 旧版 iframe 的框架就绪加载器 |
| `translatehtml` | `assets/js/translatehtml.js` | HTML 翻译助手 |
| `glossary_auto` | `assets/js/glossary-auto.js` | 自动高亮术语表词汇 |

### CSS

| 入口 | 源文件 |
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

## 构建特性

* **Vue 3 SFC** — `.vue` 单文件组件由 `vue-loader` 编译；运行时编译器被禁用（`runtimeCompilerBuild: false`），因此所有模板必须预编译
* **TypeScript** — 仅转译模式（`transpileOnly: true`）以实现快速构建，构建期间不进行类型检查
* **Sass/SCSS** — 通过 `sass-loader` 提供完整的 SCSS 支持
* **Tailwind CSS** — 通过 PostCSS 内联处理实用优先的 CSS（在 `webpack.config.js` 中配置；没有单独的 `postcss.config.js` 文件）
* **Babel** — 使用 `@babel/preset-env` 和 `core-js@3` 填充物进行 ES6+ 转译（`useBuiltIns: "usage"`）
* **jQuery 自动提供** — `autoProvidejQuery()` 使 `$` 和 `jQuery` 在全局范围内可用，无需显式导入，支持旧版代码
* **源映射** — 仅在开发环境中启用
* **单一运行时块** — 所有入口共享运行时
* **文件系统缓存** — 启用 Webpack 的持久化文件系统缓存以加速增量重建
* **块命名空间** — `output.uniqueName` 和 `output.chunkLoadingGlobal` 设置为 `"chamilo"` / `"webpackChunkChamilo"`，以避免在页面上多个 Webpack 包共存时发生块加载冲突

## 仅生产环境特性

* **版本控制** — 所有输出文件名带有内容哈希后缀（`enableVersioning()`）
* **子资源完整性** — 在 `<script>` 和 `<link>` 标签上添加 `integrity` 属性（`enableIntegrityHashes()`）
* **输出清理** — 每次生产构建前清空 `public/build/` 目录

### 未哈希资源复制（`CopyUnhashedAssetsPlugin`）

一些旧版 PHP 页面通过固定文件名引用资源，无法使用 Webpack 清单。自定义的 `CopyUnhashedAssetsPlugin`（在 `webpack.config.js` 底部定义）会在每次构建后将某些哈希生产文件复制到额外的未哈希路径：

| 哈希文件 | 未哈希副本 |
|-------------|--------------|
| `legacy_document.[hash].js` | `legacy_document.js` |
| `legacy_exercise.[hash].js` | `legacy_exercise.js` |
| `legacy_framereadyloader.[hash].js` / `.css` | `legacy_framereadyloader.js` / `.css` |
| `css/document.[hash].css` | `css/document.css` |
| `css/editor_content.[hash].css` | `css/editor_content.css` |
| `glossary_auto.[hash].js` | `glossary_auto.js` |

## 复制的库资源

`copyFiles()` 将多个 npm 包直接复制到 `public/build/libs/` 目录，而不进行打包，供旧版模板通过 `<script>` / `<link>` 标签使用：

* `flatpickr` (JS + CSS + 语言包)
* `chart.js`
* `mediaelement` + `mediaelement-plugins`
* `moment` 语言包
* `select2` (JS + CSS)
* `qtip2`
* `readmore-js`
* `js-cookie`
* `pwstrength-bootstrap`
* `multiselect-two-sides`

## 构建命令

```bash
# 开发构建
yarn encore dev

# 开发构建并启用文件监听
yarn encore dev --watch

# 生产构建（压缩、版本控制、完整性哈希）
yarn encore production
```

## Tailwind 配置

Tailwind 在 `tailwind.config.js` 中进行配置。关键点如下：

- **`important: true`** — 所有生成的工具类都包含 `!important`，允许它们在不需要额外特异性技巧的情况下覆盖 PrimeVue 组件样式
- **内容路径** — Tailwind 扫描 `assets/**/*.{js,vue}`、`public/main/**/*.{php,twig,tpl}`、`public/plugin/**/*.{php,twig,tpl}` 和 `src/CoreBundle/Resources/views/**/*.html.twig` 以检测类使用情况
- **CSS 变量颜色系统** — 每个颜色标记（primary、secondary、tertiary、success、info、warning、danger）都由一个 CSS 自定义属性（例如 `--color-primary-base`）支持，这些属性在每个主题的 `var/themes/[theme-name]/colors.css` 中定义。值是以空格分隔的 RGB 通道三元组，支持 Tailwind 透明度工具类（`bg-primary/50`）
- **自定义字体比例** — 通过 `theme.extend.fontSize` 添加了 `body-1`、`body-2`、`caption`、`tiny` 大小/行高对
- **插件** — 启用了 `@tailwindcss/forms` 和 `@tailwindcss/typography`

PostCSS（Tailwind + Autoprefixer）通过 `webpack.config.js` 中的 `enablePostCssLoader()` 进行内联配置 — 没有独立的 `postcss.config.js` 文件。