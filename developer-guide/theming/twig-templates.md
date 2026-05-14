# Twig 模板

Chamilo 使用 Twig 进行服务器端渲染页面。模板位于 `src/CoreBundle/Resources/views/` 目录下，并使用命名空间前缀 `@ChamiloCore/` 进行引用（例如，`@ChamiloCore/Layout/base-layout.html.twig`）。

没有顶级的 `templates/` 目录——所有 Twig 模板都位于 `src/CoreBundle/Resources/views/` 之下。

## Twig 和 Vue 如何共存

大多数页面遵循以下流程：

1. Symfony 控制器渲染一个扩展布局的 Twig 模板。
2. 布局包含 `vue_setup.html.twig`，它会输出 `<div id="app">` 并通过 `vue_js_setup.html.twig` 注入运行时全局变量（`window.user`、`window.breadcrumb` 等）。
3. Vue 被挂载到 `#app` 上，并管理该元素内的所有用户界面渲染。
4. Vue 应用程序通过 REST API 与后端通信。

对于尚未迁移到 Vue 的遗留页面，Symfony 通过 Twig 渲染完整的页面 HTML，内容放置在 `#sectionMainContent` 内。Vue 仍然会被挂载（提供侧边栏和顶部栏），但主内容区域是服务器端渲染的 HTML。

## 布局模板

所有布局都扩展自 `@ChamiloCore/Layout/base-layout.html.twig`，它提供了 `<html>`、`<head>` 和 `<body>` 的结构。可用的布局变体如下：

| 模板 | 用途 |
|----------|---------|
| `Layout/base-layout.html.twig` | 根模板——`<html>` 结构，导入 Macros，输出 `<head>` 和 `<body>` |
| `Layout/layout.html.twig` | 标准完整布局，包含侧边栏、顶部栏和内容区域 |
| `Layout/layout_one_col.html.twig` | 单列布局（无侧边栏） |
| `Layout/layout_two_col.html.twig` | 双列布局 |
| `Layout/layout_content.html.twig` | 仅内容包裹 |
| `Layout/layout_empty.html.twig` | 空布局，视觉元素最少 |
| `Layout/no_layout.html.twig` | 无页眉/页脚；内容直接位于 `<body>` 内 |
| `Layout/no_layout_scorm.html.twig` | SCORM 内容框架的基本布局 |
| `Layout/blank.html.twig` | 完全空白页面 |
| `Layout/skill_layout.html.twig` | 技能轮页面布局 |

## 关键部分

| 模板 | 用途 |
|----------|---------|
| `Layout/head.html.twig` | `<head>` 内容：元标签、所有 Encore CSS 入口、主题的 `colors.css`、遗留 JS 入口、OpenGraph/Twitter 标签 |
| `Layout/foot.html.twig` | 页面底部：Vue JS 入口点，注入 `tracking.footer_extra_content` |
| `Layout/vue_setup.html.twig` | 输出 `<div id="app">` 并包含 `vue_js_setup.html.twig` |
| `Layout/vue_js_setup.html.twig` | 注入 `window.user`、`window.breadcrumb`、`window.languages` 等 |
| `Layout/cookie_banner.html.twig` | GDPR Cookie 同意横幅 |
| `Layout/footer.html.twig` | 页面底部栏 |
| `Layout/course_navigation.html.twig` | 课程工具导航面包屑 |

## 与 Webpack Encore 的集成

`head.html.twig` 加载所有入口的 CSS；`foot.html.twig` 加载 Vue 的 JS 包：

```twig
{# 在 head.html.twig 中——CSS 入口 #}
{{ encore_entry_link_tags('legacy_free-jqgrid') }}
{{ encore_entry_link_tags('legacy_app') }}
{{ encore_entry_link_tags('legacy_lp') }}
{{ encore_entry_link_tags('legacy_exercise') }}
{{ encore_entry_link_tags('legacy_document') }}
{{ encore_entry_link_tags('vue') }}
{{ encore_entry_link_tags('app') }}
{{ theme_asset_link_tag('colors.css') }}

{# 在 foot.html.twig 中——Vue JS（在 body 末尾加载） #}
{{ encore_entry_script_tags('vue') }}
```

遗留 JS 入口（`legacy_app`、`legacy_lp` 等）在 `<head>` 中加载，因为遗留 PHP 页面依赖于它们在 DOM 准备好之前可用。

## Macros

可重用的 Twig Macros 位于 `Macros/` 目录下，并在 `base-layout.html.twig` 的顶部导入：

| Macro 文件 | 提供功能 |
|-----------|---------|
| `Macros/box.html.twig` | 内容框辅助工具 |
| `Macros/actions.html.twig` | 动作按钮渲染 |
| `Macros/buttons.html.twig` | 按钮 HTML 辅助工具 |
| `Macros/headers.html.twig` | 页面标题辅助工具 |
| `Macros/image.html.twig` | 图像渲染辅助工具 |
| `Macros/modals.html.twig` | 模态对话框辅助工具 |

在任何扩展 `base-layout.html.twig` 的模板中使用：

```twig
{{ macro_buttons.submit('保存') }}
{{ macro_box.content_box('标题', 内容) }}
```

---
## 自定义 Vue 模型

Chamilo 支持通过环境变量 `APP_CUSTOM_VUE_TEMPLATE` 进行安装时的 Vue 页面替换。当设置此变量时，Webpack 构建会通过 `DefinePlugin` 暴露一个常量 `ENV_CUSTOM_VUE_TEMPLATE`，并且 Vue 路由器会条件性地从 `var/vue_templates/` 导入替换组件。

当前的替换位置：

```
var/vue_templates/
├── pages/
│   └── AppIndex.vue   # 替换默认入口页面 /
└── components/
    ├── layout/
    └── SidebarLogin.vue
```

只有存在于 `var/vue_templates/` 中的文件会被替换——所有其他页面和组件将使用核心的原始文件。

---
## Twig 函数参考

在所有模板中可用的主要 Twig 函数（在 `ChamiloExtension` 中注册）：

| 函数 | 用途 |
|----------|---------|
| `chamilo_settings_get('ns.key')` | 读取平台配置 |
| `chamilo_settings_has('ns.key')` | 检查配置是否存在 |
| `chamilo_settings_all()` | 获取所有配置作为数组 |
| `theme_asset('path')` | 活动主题中资源的 URL |
| `theme_asset_link_tag('path')` | 主题 CSS 文件的 `<link>` 标签 |
| `theme_asset_script_tag('path')` | 主题 JS 文件的 `<script>` 标签 |
| `theme_asset_base64('path')` | 主题资源的 Base64 数据 URI |
| `theme_logo('header'\|'email')` | 首选徽标的 URL |
| `is_allowed_to_edit(...)` | 权限检查辅助函数 |