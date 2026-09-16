# 颜色主题

Chamilo 3.0 采用基于数据库的颜色主题系统。主题通过管理界面进行管理，存储于数据库中，并作为 CSS 文件写入磁盘。主题可按访问 URL 进行自定义，从而使多 URL 安装拥有不同的视觉标识。

## 数据模型

主题系统由两个实体驱动：

**`ColorTheme`** (`src/CoreBundle/Entity/ColorTheme.php`)

| 字段 | 类型 | 说明 |
|-------|------|-------------|
| `id` | int | 主键 |
| `title` | string | 人类可读的名称 |
| `slug` | string | 由 `title` 自动生成（例如 `"My Theme"` → `my-theme`）；用作 `var/themes/` 中的目录名 |
| `variables` | array (JSON) | CSS 自定义属性名称 → 值的映射（例如 `{"--color-primary-base": "46 117 163"}`） |

**`AccessUrlRelColorTheme`** (`src/CoreBundle/Entity/AccessUrlRelColorTheme.php`)

将 `ColorTheme` 与 `AccessUrl` 关联。`active` 布尔标志标明该 URL 当前激活的主题。每个访问 URL 同一时间只能有一个主题处于激活状态。

## 主题的存储方式

通过 API 创建或更新主题时，`ColorThemeStateProcessor` 会生成 CSS 文件并将其写入 Flysystem `themes_filesystem`（后端为 `var/themes/`）：

```
var/themes/
└── {slug}/
    └── colors.css   ← generated from ColorTheme.variables
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

值为空格分隔的 RGB 通道三元组（而非 `rgb()`），从而使 Tailwind 无需额外配置即可组合如 `bg-primary/50` 这样的不透明度变体。

## 主题解析优先级

`ThemeHelper::getVisualTheme()` 按以下顺序解析任意给定页面应应用的主题 slug：

1. **当前 AccessUrl 的激活主题** — `active = true` 的 `AccessUrlRelColorTheme` 记录
2. **用户所选主题** — 存储在 `User` 实体上的主题（若已启用 `profile.user_selected_theme` 平台设置）
3. **课程主题** — `course_theme` 课程设置（若已启用 `course.allow_course_theme` 平台设置）
4. **学习路径主题** — LP 的 `$lp_theme_css` 值（若已启用 `allow_learning_path_theme` 课程设置）
5. **`THEME_FALLBACK` 环境变量** — 在 `.env` 中设置为 `THEME_FALLBACK='chamilo'`
6. **默认** — `chamilo`（硬编码为 `ThemeHelper::DEFAULT_THEME`）

## 资源提供

主题资源由 `ThemeController`（`src/CoreBundle/Controller/ThemeController.php`）在 `/themes` 前缀下提供。

| 路由 | 用途 |
|-------|---------|
| `GET /themes/{name}/{path}` | 提供任意主题资源（CSS、JS、图片）；若在所请求主题中未找到，则回退到 `chamilo` 主题 |
| `GET /themes/{slug}/logo/{type}` | 提供首选徽标（`header` 或 `email`），并支持 SVG → PNG 回退 |
| `POST /themes/{slug}/logos` | 上传页眉/邮件徽标（SVG 和/或 PNG） |
| `DELETE /themes/{slug}/logos/{type}` | 删除指定徽标 |

通用资源路由（`/{name}/{path}`）在所请求主题中缺少文件时会自动回退到 `chamilo` 默认主题，因此主题只需包含实际覆盖的文件。

## 模板中如何加载主题

`head.html.twig` 布局模板通过 Twig 辅助函数加载激活主题的资源：

```twig
{# Inject the theme's color variables #}
{{ theme_asset_link_tag('colors.css') }}

{# Inject TinyMCE color palette #}
{{ theme_asset_script_tag('tiny-settings.js') }}

{# Reference other theme assets #}
<link rel="shortcut icon" href="{{ theme_asset('images/favicon.ico') }}" type="image/x-icon" />
```

这三个 Twig 函数（在 `ChamiloExtension` 中注册）通过 `ThemeHelper` 解析资源路径，并应用与上文相同的回退链：

| 函数 | 返回值 |
|----------|---------|
| `theme_asset('path')` | 已解析主题中该资源的 URL |
| `theme_asset_link_tag('path')` | 完整的 `<link rel="stylesheet">` 标签 |
| `theme_asset_script_tag('path')` | 完整的 `<script src="...">` 标签 |
| `theme_asset_base64('path')` | 该资源的 Base64 编码 data URI |
| `theme_logo('header'\|'email')` | 最佳可用徽标的 URL |

## API 端点

主题管理通过 API Platform REST API 对外提供（仅限管理员）：

| 方法 | 端点 | 用途 |
|--------|----------|---------|
| `POST` | `/api/color_themes` | 创建新主题 |
| `PUT` | `/api/color_themes/{id}` | 更新现有主题 |
| `POST` | `/api/access_url_rel_color_themes` | 为访问 URL 关联/激活主题 |
| `GET` | `/api/access_url_rel_color_themes` | 列出当前访问 URL 的主题关联 |

## 创建自定义主题

标准工作流程是通过管理界面（**管理 → 颜色主题**），该界面会调用上述 API 端点。要以编程方式创建主题：

1. 向 `POST /api/color_themes` 发送带有 JSON 请求体的请求：

```json
{
  "title": "My Theme",
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

2. 向 `POST /api/access_url_rel_color_themes` 发送请求，将其与当前访问 URL 关联并激活：

```json
{
  "colorTheme": "/api/color_themes/{id}"
}
```

要添加自定义图像（徽标、favicon、背景），可通过 `POST /themes/{slug}/logos` 上传，或直接放入 `var/themes/{slug}/images/`。

## 颜色变量参考

默认 Tailwind 配置所期望的全部变量：

| 变量 | 用途 |
|----------|---------|
| `--color-primary-base` | 主品牌色 |
| `--color-primary-gradient` | 主色的较深渐变端点 |
| `--color-primary-button-text` | 主按钮上的文字颜色 |
| `--color-primary-button-alternative-text` | 主按钮上的备用文字颜色 |
| `--color-secondary-base` | 次要强调色 |
| `--color-secondary-gradient` | 次要色的渐变端点 |
| `--color-secondary-button-text` | 次要按钮上的文字颜色 |
| `--color-tertiary-base` | 第三色 |
| `--color-tertiary-gradient` | 第三色的渐变端点 |
| `--color-tertiary-button-text` | 第三色按钮上的文字颜色 |
| `--color-success-base` | 成功状态颜色 |
| `--color-success-gradient` | 成功色的渐变端点 |
| `--color-success-button-text` | 成功按钮上的文字颜色 |
| `--color-info-base` | 信息状态颜色 |
| `--color-info-gradient` | 信息色的渐变端点 |
| `--color-info-button-text` | 信息按钮上的文字颜色 |
| `--color-warning-base` | 警告状态颜色 |
| `--color-warning-gradient` | 警告色的渐变端点 |
| `--color-warning-button-text` | 警告按钮上的文字颜色 |
| `--color-danger-base` | 危险/错误状态颜色 |
| `--color-danger-gradient` | 危险色的渐变端点 |
| `--color-danger-button-text` | 危险按钮上的文字颜色 |
| `--color-form-base` | 表单元素强调色 |