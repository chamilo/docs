# 建立外掛程式

本指南將逐步說明如何建立基本的 Chamilo 外掛程式。如需更多詳細資訊，請參閱 [外掛程式開發 wiki 頁面](https://github.com/chamilo/chamilo-lms/wiki/Plugin-development)。

## 步驟 1：建立外掛程式目錄

在 `public/plugin/` 中建立一個目錄。目錄名稱應與外掛程式的識別碼相符：

```
public/plugin/MyPlugin/
```

## 步驟 2：定義外掛程式類別

建立 `src/MyPluginPlugin.php`。該類別擴展 `Plugin` 並遵循單例模式：

```php
<?php

class MyPluginPlugin extends Plugin
{
    protected function __construct()
    {
        $settings = [
            'tool_enable' => 'boolean',
            'api_key'     => 'text',
        ];
        parent::__construct('1.0', 'Your Name', $settings);
    }

    public static function create(): static
    {
        static $instance = null;
        return $instance ??= new static();
    }
}
```

### 可用的設定類型

| Type | Description |
|------|-------------|
| `boolean` | Checkbox on/off |
| `text` | Single-line text input |
| `select` | Dropdown (provide `options` array) |
| `wysiwyg` | Rich text editor |
| `html` | Raw HTML field |
| `checkbox` | Checkbox |
| `user` | User selector |

對於 `select` 設定：

```php
$settings = [
    'mode' => [
        'type'             => 'select',
        'options'          => ['auto' => 'Automatic', 'manual' => 'Manual'],
        'translate_options' => true,
    ],
];
```

在執行時存取設定：

```php
$plugin = MyPluginPlugin::create();
$key  = $plugin->get('api_key');       // single value
$all  = $plugin->get_settings();       // all settings
```

## 步驟 3：建立 plugin.php

位於外掛程式根目錄的 `plugin.php` 是**必要檔案**。它必須指派 `$plugin_info`：

```php
<?php
$plugin_info = MyPluginPlugin::create()->get_info();
```

## 步驟 4：建立安裝和解除安裝腳本

`install.php`：

```php
<?php
MyPluginPlugin::create()->install();
```

`uninstall.php`：

```php
<?php
MyPluginPlugin::create()->uninstall();
```

在類別中使用 Doctrine 的 `SchemaTool` 實作實際的結構描述建立/刪除。

## 步驟 5：新增翻譯

在 `lang/` 中使用地區設定碼建立語言檔案（例如 `en_US.php`、`fr_FR.php`、`es_ES.php`）。預設回退為 `en_US.php`。

```php
<?php
// lang/en_US.php
$strings['plugin_title']   = 'My Plugin';
$strings['plugin_comment'] = 'Description of what this plugin does.';
$strings['tool_enable']    = 'Enable plugin';
$strings['api_key']        = 'API Key';
$strings['api_key_help']   = 'Enter the API key from your account.';
```

透過 `$plugin->get_lang('key')` 存取翻譯。

## 步驟 6：透過顯示區域注入內容

外掛程式可將 HTML 注入至 Vue 前端的 18 個預定義區域。在類別中覆寫 `renderRegion()`：

```php
public function renderRegion(string $region): string
{
    if ('header_right' !== $region) {
        return '';
    }
    return '<div class="my-plugin-widget">Hello!</div>';
}
```

可用的區域包括：`content_bottom`、`content_top`、`course_tool_plugin`、`footer_center`、`footer_left`、`footer_right`、`header_center`、`header_left`、`header_main`、`header_right`、`login_bottom`、`login_top`、`main_bottom`、`main_top`、`menu_administrator`、`menu_bottom`、`menu_top`、`pre_footer`。

## 步驟 7：回應平台事件（選用）

外掛程式可使用 Symfony 事件訂閱者回應平台事件。在 `src/EventSubscriber/` 中建立以 `EventSubscriber.php` 結尾的檔案 — 它會透過 `PluginEventSubscriberPass` 自動註冊。

```php
<?php
// src/EventSubscriber/MyPluginEventSubscriber.php

use Chamilo\CoreBundle\Event\Events;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MyPluginEventSubscriber implements EventSubscriberInterface
{
    private MyPluginPlugin $plugin;

    public function __construct()
    {
        // Plugin classes are not Symfony services — use the create() singleton.
        $this->plugin = MyPluginPlugin::create();
    }

    public static function getSubscribedEvents(): array
    {
        return [
            Events::COURSE_CREATED => 'onCourseCreated',
        ];
    }

    public function onCourseCreated($event): void
    {
        if (!$this->plugin->isEnabled()) {
            return;
        }
        // your logic here
    }
}
```

請參閱 `src/CoreBundle/Event/Events.php` 以取得所有可用事件清單（使用者、課程、工作坊、學習路徑、測驗、作品集、驗證等）。

---

---
## 第 8 步：生命週期鉤子

在您的外掛程式類別中覆寫這些方法，以回應平台動作：

| 方法 | 觸發時機 |
|--------|----------------|
| `install()` | 外掛程式被啟用 |
| `uninstall()` | 外掛程式被移除 |
| `performActionsAfterConfigure()` | 管理員儲存設定表單 |
| `course_settings_updated(array $values)` | 課程層級設定變更 |
| `validateCourseSetting(string $variable)` | 課程設定被儲存（傳回 `false` 以拒絕） |
| `doWhenDeletingUser(int $userId)` | 使用者被刪除 |
| `doWhenDeletingCourse(int $courseId)` | 課程被刪除 |
| `doWhenDeletingSession(int $sessionId)` | 工作階段被刪除 |

## 第 9 步：啟用

以管理員身分登入，前往 **管理外掛程式**，找到您的外掛程式，然後按一下 **啟用**。

## 提示

* **參考現有外掛程式作為範例** — `public/plugin/HelloWorld/` 和 `public/plugin/TopLinks/` 是良好的簡單參考範例
* **使用翻譯** — 始終使用 `lang/` 系統來處理使用者介面文字
* **在解除安裝時清理** — 在解除安裝腳本中移除資料庫表格和設定
* **檢查啟用狀態** — 在事件訂閱者中，始終在執行邏輯前呼叫 `$this->plugin->isEnabled()`