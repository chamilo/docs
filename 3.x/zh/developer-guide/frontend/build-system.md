# 构建系统

Chamilo 通过 **Symfony Webpack Encore** 使用 **Webpack 5** 构建前端资源。完整的构建配置位于项目根目录的 `webpack.config.js`。

输出写入 `public/build/`，通过 `/build` 公共路径提供服务。

## 入口点

### JavaScript

| 入口 | 源文件 | 用途 |
|-------|--------|---------|
| `vue` | `assets/vue/main.js` | 主 Vue 3 应用 |
| `vue_installer` | `assets/vue/main_installer.js` | 安装向导 |
| `legacy_app` | `assets/js/legacy/app.js` | 旧版 JavaScript |
| `legacy_exercise` | `assets/js/legacy/exercise.js` | 练习播放器 |
| `legacy_lp` | `assets/js/legacy/lp.js` | 学习路径播放器 |
| `legacy_document` | `assets/js/legacy/document.js` | 文档查看器 |
| `legacy_free-jqgrid` | `assets/js/legacy/free-jqgrid.js` | 旧版表格控件 |
| `legacy_framereadyloader` | `assets/js/legacy/frameReadyLoader.js` | 旧版 iframe 的 frame-ready 加载器 |
| `translatehtml` | `assets/js/translatehtml.js` | HTML 翻译辅助工具 |
| `glossary_auto` | `assets/js/glossary-auto.js` | 术语表词条自动高亮 |

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

* **Vue 3 SFC** — 由 `vue-loader` 编译 `.vue` 单文件组件；运行时编译器已禁用（`runtimeCompilerBuild: false`），因此所有模板必须预先编译
* **TypeScript** — 仅转译模式（`transpileOnly: true`）以实现快速构建，构建过程中不进行类型检查
* **Sass/SCSS** — 通过 `sass-loader` 提供完整的 SCSS 支持
* **Tailwind CSS** — 通过 PostCSS 内联处理的实用优先 CSS（在 `webpack.config.js` 内配置；没有单独的 `postcss.config.js`）
* **Babel** — 使用 `@babel/preset-env` 进行 ES6+ 转译，并配合 `core-js@3` polyfill（`useBuiltIns: "usage"`）
* **jQuery 自动提供** — `autoProvidejQuery()` 使 `$` 和 `jQuery` 在全局可用，无需显式导入，以支持旧代码
* **Source maps** — 仅在开发环境启用
* **单一 runtime chunk** — 所有入口共享 runtime
* **文件系统缓存** — 启用 Webpack 的持久化文件系统缓存，以加快增量重建
* **Chunk 命名空间** — `output.uniqueName` 和 `output.chunkLoadingGlobal` 分别设置为 `"chamilo"` / `"webpackChunkChamilo"`，以避免同一页面上多个 Webpack 包共存时的 chunk 加载冲突

## 仅生产环境特性

* **版本化** — 所有输出文件名带内容哈希后缀（`enableVersioning()`）
* **子资源完整性** — 在 `<script>` 和 `<link>` 标签上添加 `integrity` 属性（`enableIntegrityHashes()`）
* **输出清理** — 每次生产构建前清空 `public/build/`

### 无哈希资源副本（`CopyUnhashedAssetsPlugin`）

部分旧版 PHP 页面按固定文件名引用资源，无法使用 Webpack manifest。自定义的 `CopyUnhashedAssetsPlugin`（定义在 `webpack.config.js` 底部）在每次构建后将某些带哈希的生产文件复制到额外的无哈希路径：

| 带哈希文件 | 无哈希副本 |
|-------------|--------------|
| `legacy_document.[hash].js` | `legacy_document.js` |
| `legacy_exercise.[hash].js` | `legacy_exercise.js` |
| `legacy_framereadyloader.[hash].js` / `.css` | `legacy_framereadyloader.js` / `.css` |
| `css/document.[hash].css` | `css/document.css` |
| `css/editor_content.[hash].css` | `css/editor_content.css` |
| `glossary_auto.[hash].js` | `glossary_auto.js` |

## 复制的库资源

`copyFiles()` 将若干 npm 包直接复制到 `public/build/libs/`，不进行打包，供旧版模板通过 `<script>` / `<link>` 标签使用：

* `flatpickr`（JS + CSS + 语言包）
* `chart.js`
* `mediaelement` + `mediaelement-plugins`
* `moment` 语言包
* `select2`（JS + CSS）
* `qtip2`
* `readmore-js`
* `js-cookie`
* `pwstrength-bootstrap`
* `multiselect-two-sides`

## 构建命令

```bash
# Development build
yarn encore dev

# Development build with file watching
yarn encore dev --watch

# Production build (minified, versioned, integrity hashes)
yarn encore production
```

## Tailwind 配置

Tailwind 在 `tailwind.config.js` 中配置。要点如下：

* **`important: true`** — 所有生成的工具类均包含 `!important`，从而无需额外提高选择器优先级即可覆盖 PrimeVue 组件样式
* **内容路径** — Tailwind 会扫描 `assets/**/*.{js,vue}`、`public/main/**/*.{php,twig,tpl}`、`public/plugin/**/*.{php,twig,tpl}` 以及 `src/CoreBundle/Resources/views/**/*.html.twig` 中的类名使用情况
* **CSS 变量色彩系统** — 每个颜色令牌（primary、secondary、tertiary、success、info、warning、danger）均由主题目录 `var/themes/[theme-name]/colors.css` 中定义的 CSS 自定义属性（例如 `--color-primary-base`）支撑。取值为空格分隔的 RGB 通道三元组，从而支持 Tailwind 透明度工具类（`bg-primary/50`）
* **自定义字号阶梯** — 通过 `theme.extend.fontSize` 增加 `body-1`、`body-2`、`caption`、`tiny` 的字号/行高组合
* **插件** — 已启用 `@tailwindcss/forms` 与 `@tailwindcss/typography`

PostCSS（Tailwind + Autoprefixer）通过 `enablePostCssLoader()` 在 `webpack.config.js` 中内联配置 — 不存在独立的 `postcss.config.js` 文件。