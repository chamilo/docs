# 设置系统

Chamilo 的配置通过一组设置模式（约 40 个，随版本略有差异）进行管理，这些模式定义了平台的每一个可配置方面。它们位于 `src/CoreBundle/Settings/` —— 该目录中的精确列表即为权威来源。

## 工作原理

设置的处理流程为：

1. **定义**于模式类中（`src/CoreBundle/Settings/*SettingsSchema.php`）
2. **存储**于数据库（`settings_current` 表）
3. 通过 `SettingsManager` 服务**访问**
4. 通过管理端 Web 界面**管理**

## 设置模式

每个模式文件定义一类设置。主要模式如下：

| Schema | Purpose |
|--------|---------|
| `PlatformSettingsSchema` | 机构信息、时区、服务器类型、门户功能 |
| `SecuritySettingsSchema` | 登录尝试、CAPTCHA、密码策略、HTTP 头、2FA |
| `RegistrationSettingsSchema` | 自助注册、必填字段、自动订阅 |
| `CourseSettingsSchema` | 课程创建默认值、工具、目录 |
| `SessionSettingsSchema` | 学期默认值、可见性 |
| `MailSettingsSchema` | 电子邮件配置、DKIM、通知 |
| `AiHelpersSettingsSchema` | AI 提供商、各 AI 工具的功能开关 |
| `ExerciseSettingsSchema` | 测验评分、反馈、题目选项 |
| `LearningPathSettingsSchema` | 学习路径显示、先修条件、SCORM 设置 |
| `DocumentSettingsSchema` | 上传限制、允许的文件类型、存储 |
| `DisplaySettingsSchema` | 界面标签页、侧边栏项目、主题 |
| `LanguageSettingsSchema` | 可用语言、默认区域设置 |
| `AdminSettingsSchema` | 管理员邮箱、管理员专用选项 |

## 访问设置

在 PHP 代码中：

```php
// Via SettingsManager service
$value = $settingsManager->getSetting('platform.site_name');

// In legacy code
$value = api_get_setting('platform.site_name');
```

在模板中：

```twig
{# Read a single setting #}
{{ chamilo_settings_get('platform.site_name') }}

{# Check whether a setting exists #}
{% if chamilo_settings_has('platform.allow_registration') %}
    ...
{% endif %}

{# Get all settings as an array #}
{% set settings = chamilo_settings_all() %}
```

## 设置结构

每项设置包含：

* **命名空间** — 模式类别（例如 `platform`、`security`、`ai_helpers`）
* **变量** — 设置名称（例如 `site_name`、`allow_registration`）
* **值** — 当前值
* **类型** — 数据类型（字符串、布尔值、数组等）

## 课程级设置

部分设置可在课程级别覆盖。这些设置定义于 `src/CourseBundle/Settings/`，包括：

* 每门课程的测验设置
* 每门课程的作业设置
* 每门课程的 AI 功能开关

## 多 URL 设置

在多 URL 部署中，部分设置可按访问 URL 自定义，从而在同一安装上实现不同的门户配置。

这些设置会在 `settings` 表中出现多次，并带有不同的 `access_url` 值。默认情况下，所有设置均关联到 `access_url=1`。

## 添加新设置

1. 将设置定义添加到相应的模式类
2. 提供默认值
3. 如有需要，运行数据库迁移
4. 通过 `SettingsManager` 访问该设置