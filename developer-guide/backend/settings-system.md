# 设置系统

Chamilo 的配置通过一组设置模式（大约有 40 个，具体数量因版本而异）进行管理，这些模式定义了平台的每一个可配置方面。它们位于 `src/CoreBundle/Settings/` 中——那里的确切列表是真实的来源。

## 工作原理

设置的处理方式如下：

1. **定义**于模式类中（`src/CoreBundle/Settings/*SettingsSchema.php`）
2. **存储**在数据库中（`settings_current` 表）
3. **访问**通过 `SettingsManager` 服务
4. **管理**通过管理网页界面

## 设置模式

每个模式文件定义一类设置。关键模式包括：

| 模式 | 用途 |
|--------|---------|
| `PlatformSettingsSchema` | 机构信息、时区、服务器类型、门户功能 |
| `SecuritySettingsSchema` | 登录尝试、CAPTCHA、密码策略、HTTP 头、双重认证（2FA） |
| `RegistrationSettingsSchema` | 自助注册、必填字段、自动订阅 |
| `CourseSettingsSchema` | 课程创建默认值、工具、目录 |
| `SessionSettingsSchema` | 会话默认值、可见性 |
| `MailSettingsSchema` | 电子邮件配置、DKIM、通知 |
| `AiHelpersSettingsSchema` | AI 提供商、每个 AI 工具的功能开关 |
| `ExerciseSettingsSchema` | 测验评分、反馈、问题选项 |
| `LearningPathSettingsSchema` | 学习路径显示、前置条件、SCORM 设置 |
| `DocumentSettingsSchema` | 上传限制、允许的文件类型、存储 |
| `DisplaySettingsSchema` | 用户界面选项卡、侧边栏项目、主题 |
| `LanguageSettingsSchema` | 可用语言、默认语言环境 |
| `AdminSettingsSchema` | 管理员电子邮件、管理员特定选项 |

## 访问设置

在 PHP 代码中：

```php
// 通过 SettingsManager 服务
$value = $settingsManager->getSetting('platform.site_name');

// 在旧版代码中
$value = api_get_setting('platform.site_name');
```

在模板中：

```twig
{# 读取单个设置 #}
{{ chamilo_settings_get('platform.site_name') }}

{# 检查某个设置是否存在 #}
{% if chamilo_settings_has('platform.allow_registration') %}
    ...
{% endif %}

{# 获取所有设置作为数组 #}
{% set settings = chamilo_settings_all() %}
```

## 设置结构

每个设置包含：

* **命名空间** —— 模式类别（例如 `platform`、`security`、`ai_helpers`）
* **变量** —— 设置名称（例如 `site_name`、`allow_registration`）
* **值** —— 当前值
* **类型** —— 数据类型（字符串、布尔值、数组等）

## 课程级设置

某些设置可以在课程级别上被覆盖。这些设置定义在 `src/CourseBundle/Settings/` 中，包括：

* 每个课程的练习设置
* 每个课程的作业设置
* 每个课程的 AI 功能开关

## 多 URL 设置

在多 URL 设置中，某些设置可以针对每个访问 URL 进行自定义，允许从同一安装中配置不同的门户。

这些设置会在 `settings` 表中出现多次，具有不同的 `access_url` 值。默认情况下，所有设置都与 `access_url=1` 相关联。

## 添加新设置

1. 将设置定义添加到适当的模式类中
2. 提供默认值
3. 如有需要，运行数据库迁移
4. 通过 `SettingsManager` 访问设置