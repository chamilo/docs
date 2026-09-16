# Twig 模板

Chamilo 使用 Twig 进行服务端页面渲染。模板位于 `src/CoreBundle/Resources/views/`，并通过 `@ChamiloCore/` 命名空间前缀引用（例如 `@ChamiloCore/Layout/base-layout.html.twig`）。

不存在顶层 `templates/` 目录——所有 Twig 模板都位于 `src/CoreBundle/Resources/views/` 之下。

## Twig 与 Vue 如何共存

大多数页面遵循以下流程：

1. Symfony 控制器渲染一个继承布局的 Twig 模板。
2. 该布局包含 `vue_setup.html.twig`，后者输出 `<div id="app">`，并通过 `vue_js_setup.html.twig` 注入运行时全局变量（`window.user`、`window.breadcrumb` 等）。
3. Vue 挂载到 `#app`，并在该元素内处理全部 UI 渲染。
4. Vue 应用通过 REST API 与后端通信。

对于尚未迁移到 Vue 的遗留页面，Symfony 通过 Twig 渲染完整页面 HTML，内容放置在 `#sectionMainContent` 内。Vue 仍会挂载（提供侧边栏和顶栏外壳），但主内容区域为服务端渲染的 HTML。

## 布局模板

所有布局均继承 `@ChamiloCore/Layout/base-layout.html.twig`，该模板提供 `<html>`、`<head>` 和 `<body>` 结构。可用的布局变体：

| 模板 | 用途 |
|----------|---------|
| `Layout/base-layout.html.twig` | 根模板 — `<html>` 外壳，导入 Macros，输出 `<head>` 和 `<body>` |
| `Layout/layout.html.twig` | 标准完整布局，含侧边栏、顶栏和内容区 |
| `Layout/layout_one_col.html.twig` | 单列布局（无侧边栏） |
| `Layout/layout_two_col.html.twig` | 双列布局 |
| `Layout/layout_content.html.twig` | 仅内容包装器 |
| `Layout/layout_empty.html.twig` | 空布局，装饰极少 |
| `Layout/no_layout.html.twig` | 无页眉/页脚；内容直接放入 `<body>` |
| `Layout/no_layout_scorm.html.twig` | 用于 SCORM 内容框架的精简布局 |
| `Layout/blank.html.twig` | 完全空白的页面 |
| `Layout/skill_layout.html.twig` | 技能轮盘页面布局 |

## 关键局部模板

| 模板 | 用途 |
|----------|---------|
| `Layout/head.html.twig` | `<head>` 内容：meta 标签、全部 Encore CSS 入口、主题 `colors.css`、遗留 JS 入口、OpenGraph/Twitter 标签 |
| `Layout/foot.html.twig` | 文档末尾：Vue JS 入口点、`tracking.footer_extra_content` 注入 |
| `Layout/vue_setup.html.twig` | 输出 `<div id="app">` 并包含 `vue_js_setup.html.twig` |
| `Layout/vue_js_setup.html.twig` | 注入 `window.user`、`window.breadcrumb`、`window.languages` 等 |
| `Layout/cookie_banner.html.twig` | GDPR Cookie 同意横幅 |
| `Layout/footer.html.twig` | 页脚栏 |
| `Layout/course_navigation.html.twig` | 课程工具导航面包屑 |

## Webpack Encore 集成

`head.html.twig` 加载所有入口的 CSS；`foot.html.twig` 加载 Vue JS 包：

```twig
{# In head.html.twig — CSS entries #}
{{ encore_entry_link_tags('legacy_free-jqgrid') }}
{{ encore_entry_link_tags('legacy_app') }}
{{ encore_entry_link_tags('legacy_lp') }}
{{ encore_entry_link_tags('legacy_exercise') }}
{{ encore_entry_link_tags('legacy_document') }}
{{ encore_entry_link_tags('vue') }}
{{ encore_entry_link_tags('app') }}
{{ theme_asset_link_tag('colors.css') }}

{# In foot.html.twig — Vue JS (loaded at end of body) #}
{{ encore_entry_script_tags('vue') }}
```

遗留 JS 入口（`legacy_app`、`legacy_lp` 等）在 `<head>` 中加载，因为遗留 PHP 页面依赖它们在 DOM 就绪之前可用。

## 宏

可复用的 Twig 宏位于 `Macros/`，并在 `base-layout.html.twig` 顶部导入：

| 宏文件 | 提供 |
|-----------|---------|
| `Macros/box.html.twig` | 内容框辅助函数 |
| `Macros/actions.html.twig` | 操作按钮渲染 |
| `Macros/buttons.html.twig` | 按钮 HTML 辅助函数 |
| `Macros/headers.html.twig` | 页眉辅助函数 |
| `Macros/image.html.twig` | 图片渲染辅助函数 |
| `Macros/modals.html.twig` | 模态对话框辅助函数 |

在任何继承 `base-layout.html.twig` 的模板中的用法：

```twig
{{ macro_buttons.submit('Save') }}
{{ macro_box.content_box('Title', content) }}
```

## 自定义 Vue 模板

Chamilo 通过 `APP_CUSTOM_VUE_TEMPLATE` 环境变量支持按安装覆盖 Vue 页面。设置后，Webpack 构建会通过 `DefinePlugin` 暴露 `ENV_CUSTOM_VUE_TEMPLATE` 常量，Vue 路由器会有条件地从 `var/vue_templates/` 导入覆盖组件。

当前覆盖位置：

```
var/vue_templates/
├── pages/
│   └── AppIndex.vue   # Replaces the default / entry page
└── components/
    ├── layout/
    └── SidebarLogin.vue
```

仅覆盖 `var/vue_templates/` 中实际存在的文件——其余页面和组件仍使用核心原始文件。

## Twig 函数参考

所有模板中均可使用的关键 Twig 函数（在 `ChamiloExtension` 中注册）：

| 函数 | 用途 |
|----------|---------|
| `chamilo_settings_get('ns.key')` | 读取平台设置 |
| `chamilo_settings_has('ns.key')` | 检查某项设置是否存在 |
| `chamilo_settings_all()` | 以数组形式获取全部设置 |
| `theme_asset('path')` | 当前活动主题中资源的 URL |
| `theme_asset_link_tag('path')` | 主题 CSS 文件的 `<link>` 标签 |
| `theme_asset_script_tag('path')` | 主题 JS 文件的 `<script>` 标签 |
| `theme_asset_base64('path')` | 主题资源的 Base64 data URI |
| `theme_logo('header'\|'email')` | 首选徽标的 URL |
| `is_allowed_to_edit(...)` | 权限检查辅助函数 |