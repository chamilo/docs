# 颜色主题

Chamilo 2.0 使用数据库驱动的颜色主题系统。主题通过管理界面进行管理，存储在数据库中，并以 CSS 文件的形式写入磁盘。可以为每个访问 URL 自定义主题，允许多 URL 安装具有不同的视觉标识。

## 数据模型

两个实体驱动主题系统：

**`ColorTheme`** (`src/CoreBundle/Entity/ColorTheme.php`)

| 字段 | 类型 | 描述 |
|-------|------|-------------|
| `id` | int | 主键 |
| `title` | string | 可读名称 |
| `slug` | string | 由 `title` 自动生成（例如 `"My Theme"` → `my-theme`）；用作 `var/themes/` 中的目录名称 |
| `variables` | array (JSON) | CSS 自定义属性名称到值的映射（例如 `{"--color-primary-base": "46 117 163"}`） |

**`AccessUrlRelColorTheme`** (`src/CoreBundle/Entity/AccessUrlRelColorTheme.php`)

将 `ColorTheme` 与 `AccessUrl` 关联。`active` 布尔标志标记当前对该 URL 有效的主题。每个访问 URL 一次只能激活一个主题。

## 主题存储方式

当通过 API 创建或更新主题时，`ColorThemeStateProcessor` 会生成 CSS 文件并将其写入 Flysystem 的 `themes_filesystem`（由 `var/themes/` 支持）：

```
var/themes/
└── {slug}/
    └── colors.css   ← 由 ColorTheme.variables 生成
```

生成的 `colors.css` 将所有变量包裹在 `:root` 块中：

```css
:root {
  --color-primary-base: 46 117 163;
  --color-secondary-base: 243 126 47;
  --color-tertiary-base: 51 51 51;
  /* ... */
}
```

值是以空格分隔的 RGB 通道三元组（不是 `rgb()`），这允许 Tailwind 组合透明度变体，例如 `bg-primary/50`，而无需额外配置。

## 主题解析优先级

`ThemeHelper::getVisualTheme()` 按以下顺序解析在任何给定页面上应用的主题 slug：

1. **当前 AccessUrl 的活动主题** — `AccessUrlRelColorTheme` 记录中 `active = true` 的主题
2. **用户选择的主题** — 存储在 `User` 实体上的主题，如果启用了 `profile.user_selected_theme` 平台设置
3. **课程主题** — `course_theme` 课程设置，如果启用了 `course.allow_course_theme` 平台设置
4. **学习路径主题** — LP 的 `$lp_theme_css` 值，如果启用了 `allow_learning_path_theme` 课程设置
5. **`THEME_FALLBACK` 环境变量** — 在 `.env` 中设置为 `THEME_FALLBACK='chamilo'`
6. **默认** — `chamilo`（硬编码为 `ThemeHelper::DEFAULT_THEME`）

## 资产服务

主题资产由 `ThemeController`（`src/CoreBundle/Controller/ThemeController.php`）在 `/themes` 前缀下提供。

| 路由 | 用途 |
|-------|---------|
| `GET /themes/{name}/{path}` | 服务任何主题资产（CSS、JS、图片）；如果在请求的主题中未找到，则回退到 `chamilo` 主题 |
| `GET /themes/{slug}/logo/{type}` | 服务首选标志（`header` 或 `email`），支持 SVG 到 PNG 的回退 |
| `POST /themes/{slug}/logos` | 上传页眉/电子邮件标志（SVG 和/或 PNG） |
| `DELETE /themes/{slug}/logos/{type}` | 删除特定标志 |

通用资产路由（`/{name}/{path}`）在请求的主题中缺少文件时会自动回退到 `chamilo` 默认主题，因此主题只需要包含实际覆盖的文件。

## 主题在模板中的加载方式

`head.html.twig` 布局模板通过 Twig 辅助函数加载活动主题的资产：

```twig
{# 注入主题的颜色变量 #}
{{ theme_asset_link_tag('colors.css') }}

{# 注入 TinyMCE 颜色调色板 #}
{{ theme_asset_script_tag('tiny-settings.js') }}

{# 引用其他主题资产 #}
<link rel="shortcut icon" href="{{ theme_asset('images/favicon.ico') }}" type="image/x-icon" />
```

三个 Twig 函数（在 `ChamiloExtension` 中注册）通过 `ThemeHelper` 解析资产路径，应用与上述相同的回退链：

| 函数 | 返回值 |
|----------|---------|
| `theme_asset('path')` | 解析主题中资产的 URL |
| `theme_asset_link_tag('path')` | 完整的 `<link rel="stylesheet">` 标签 |
| `theme_asset_script_tag('path')` | 完整的 `<script src="...">` 标签 |
| `theme_asset_base64('path')` | 资产的 Base64 编码数据 URI |
| `theme_logo('header'\|'email')` | 最佳可用标志的 URL |

## API 端点

主题管理通过 API Platform REST API 暴露（仅限管理员）：

| 方法 | 端点 | 用途 |
|--------|----------|---------|
| `POST` | `/api/color_themes` | 创建新主题 |
| `PUT` | `/api/color_themes/{id}` | 更新现有主题 |
| `POST` | `/api/access_url_rel_color_themes` | 为访问 URL 关联/激活主题 |
| `GET` | `/api/access_url_rel_color_themes` | 列出当前访问 URL 的主题关联 |

## 创建自定义主题

标准工作流程是通过管理界面（**管理员 → 颜色主题**），它会调用上述 API 端点。要以编程方式创建主题：

1. 使用 JSON 主体向 `POST /api/color_themes` 发送请求：

```json
{
  "title": "我的主题",
  "variables": {
    "--color-primary-base": "30 90 140",
    "--color-primary-gradient": "20 60 100",
    "--color-primary-button-text": "30 90 140",
    "--color-primary-button-alternative-text": "255 255 255",
    "--color-secondary-base": "200 80 30",
    "--color-secondary-gradient": "160 60 20",
    "--color-secondary-button-text": "255 255 255"
  }
}
```

这将持久化实体并写入 `var/themes/my-theme/colors.css`。

2. 使用 `POST /api/access_url_rel_color_themes` 将其与当前访问 URL 关联并激活：

```json
{
  "colorTheme": "/api/color_themes/{id}"
}
```

要添加自定义图片（标志、网站图标、背景），可以通过 `POST /themes/{slug}/logos` 上传，或者直接将它们放置在 `var/themes/{slug}/images/` 目录下。

## 颜色变量参考

默认 Tailwind 配置所需的所有变量：

| 变量 | 用途 |
|----------|---------|
| `--color-primary-base` | 主要品牌颜色 |
| `--color-primary-gradient` | 主要的较暗渐变色 |
| `--color-primary-button-text` | 主要按钮上的文本颜色 |
| `--color-primary-button-alternative-text` | 主要按钮上的替代文本颜色 |
| `--color-secondary-base` | 次要强调颜色 |
| `--color-secondary-gradient` | 次要渐变色 |
| `--color-secondary-button-text` | 次要按钮上的文本颜色 |
| `--color-tertiary-base` | 第三颜色 |
| `--color-tertiary-gradient` | 第三渐变色 |
| `--color-tertiary-button-text` | 第三按钮上的文本颜色 |
| `--color-success-base` | 成功状态颜色 |
| `--color-success-gradient` | 成功渐变色 |
| `--color-success-button-text` | 成功按钮上的文本颜色 |
| `--color-info-base` | 信息状态颜色 |
| `--color-info-gradient` | 信息渐变色 |
| `--color-info-button-text` | 信息按钮上的文本颜色 |
| `--color-warning-base` | 警告状态颜色 |
| `--color-warning-gradient` | 警告渐变色 |
| `--color-warning-button-text` | 警告按钮上的文本颜色 |
| `--color-danger-base` | 危险/错误状态颜色 |
| `--color-danger-gradient` | 危险渐变色 |
| `--color-danger-button-text` | 危险按钮上的文本颜色 |
| `--color-form-base` | 表单元素强调颜色 |