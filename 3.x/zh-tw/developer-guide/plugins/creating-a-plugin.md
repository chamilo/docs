# 建立外掛

本指南逐步說明如何建立一個基本的 Chamilo 外掛。更多細節請參閱 [Plugin development wiki page](https://github.com/chamilo/chamilo-lms/wiki/Plugin-development)。

## 步驟 1：建立外掛目錄

在 `public/plugin/` 中建立一個目錄。目錄名稱應與外掛識別碼相符：

```
public/plugin/MyPlugin/
```

## 步驟 2：定義外掛類別

建立 `src/MyPluginPlugin.php`。該類別繼承 `Plugin` 並遵循單例模式：

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

針對 `select` 設定：

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

外掛根目錄的 `plugin.php` **為必要檔案**。它必須指派 `$plugin_info`：

```php
<?php
$plugin_info = MyPluginPlugin::create()->get_info();
```

## 步驟 4：建立安裝與解除安裝指令碼

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

在類別內部使用 Doctrine 的 `SchemaTool` 實作實際的結構建立／刪除。

## 步驟 5：新增翻譯

在 `lang/` 中以地區代碼建立語言檔（例如 `en_US.php`、`fr_FR.php`、`es.php`）。後備檔案為 `en_US.php`。

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

外掛可將 HTML 注入介面中 18 個預先定義的區域。哪個機制負責呈現某個區域，取決於該區域本身：

* **`course_tool_plugin`** 是唯一透過在外掛類別中覆寫 `renderRegion(string $region): string` 來呈現的區域。僅當課程範圍外掛（`is_course_plugin`）且正在開啟課程頁面時，才會（經由 `PluginRegionController`）呼叫它：

  ```php
  public function renderRegion(string $region): string
  {
      if ('course_tool_plugin' !== $region) {
          return '';
      }
      return '<div class="my-plugin-widget">Hello!</div>';
  }
  ```

* **其餘 16 個一般區域** — `content_bottom`、`content_top`、`footer_center`、`footer_left`、`footer_right`、`header_center`、`header_left`、`header_main`、`header_right`、`login_bottom`、`login_top`、`main_bottom`、`main_top`、`menu_bottom`、`menu_top`、`pre_footer` — 是透過引入外掛自己的 `index.php` 來呈現，而非 `renderRegion()`。框架在引入該檔案前會設定 `$plugin_info['current_region']`，因此該檔案可針對該區域直接 `echo` HTML，或宣告要透過 `$plugin_info['templates']` 呈現的 Twig 範本：

  ```php
  <?php
  // index.php
  if (!class_exists('MyPluginPlugin', false)) {
      require_once __DIR__.'/src/MyPluginPlugin.php';
  }

  $region = (string) ($plugin_info['current_region'] ?? '');

  if ('header_right' === $region) {
      echo '<div class="my-plugin-widget">Hello!</div>';
  }
  ```

  `public/plugin/HelloWorld/index.php` 是完整可運作的範例 — HelloWorld 完全不覆寫 `renderRegion()`；它填入的每個區域都經過 `index.php`。

* **`menu_administrator`** 是特殊情況，保留給舊版管理儀表板中僅管理員可見的連結，而非上述兩種機制。`Dashboard` 與 `CleanDeletedFiles` 是實際使用它的外掛。

無論使用哪種機制，管理員仍必須在 **Manage plugins** 頁面上該外掛旁的 **Regions** 按鈕中，為您的外掛開啟區域（見 [步驟 9](#step-9-activate)）——若該區域未在該處明確啟用，外掛不會在該區域呈現任何內容。

## 步驟 7：回應平台事件（選用）

外掛可透過 Symfony 事件訂閱者回應平台事件。在 `src/EventSubscriber/` 內建立檔名以 `EventSubscriber.php` 結尾的檔案——它會經由 `PluginEventSubscriberPass` 自動註冊。

有兩項必要條件，否則訂閱者會被靜默略過：類別必須位於**全域命名空間**（該 pass 會依檔名解析），且新增後必須執行 `composer dump-autoload`（`public/plugin` 為 classmap 項目）。可用 `php bin/console debug:event-dispatcher <event.name>` 檢查結果。

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

完整可用事件清單請見 `src/CoreBundle/Event/Events.php`（使用者、課程、學期、LP、測驗、作品集、驗證等）。

### 在課程、學期或使用者被刪除時進行清理

若外掛以課程、學期或使用者為鍵儲存資料列，請訂閱 `Events::COURSE_DELETED`、`Events::SESSION_DELETED` 或 `Events::USER_DELETED`。這是清理的唯一方式——舊的 `doWhenDeleting*` 方法已不存在。這些監聽器適用三項規則：

* **在 `AbstractEvent::TYPE_PRE` 時處理** — 事件在資料列移除前觸發，這是外鍵仍可解析、資料仍可讀取的唯一時機。`USER_DELETED` 也會以 `TYPE_POST` 觸發，因此該處檢查並非可選。
* **以已安裝而非已啟用為條件** — 使用 `AppPlugin::getInstance()->isInstalled($this->plugin->get_name())`。資料列會在外掛停用、或僅在其他存取 URL 啟用時仍然存在，且無論哪種情況外鍵都會阻擋刪除。
* **在 `USER_DELETED` 時檢查 `$event->isHardDelete()`** — 軟刪除會保留使用者可還原，因此其資料必須保留。

```php
public function onUserDeleted(UserDeletedEvent $event): void
{
    if (AbstractEvent::TYPE_PRE !== $event->getType() || !$event->isHardDelete()) {
        return;
    }

    $userId = $event->getUser()?->getId();

    if (empty($userId) || !AppPlugin::getInstance()->isInstalled($this->plugin->get_name())) {
        return;
    }

    Database::getManager()->getConnection()->executeStatement(
        'DELETE FROM my_plugin_table WHERE user_id = :userId',
        ['userId' => $userId]
    );
}
```

`StudentFollowUp` 外掛是使用者方面的參考實作；`Bbb`、`BuyCourses` 與 `EmbedRegistry` 則對應課程與學期。

## 步驟 8：生命週期掛鉤

在外掛類別中覆寫這些方法以回應平台動作：

| 方法 | 觸發時機 |
|--------|----------------|
| `install()` | 外掛被啟用 |
| `uninstall()` | 外掛被移除 |
| `performActionsAfterConfigure()` | 管理員儲存設定表單 |
| `course_settings_updated(array $values)` | 課程層級設定變更 |
| `validateCourseSetting(string $variable)` | 課程設定儲存時（回傳 `false` 以拒絕） |

`doWhenDeletingUser()`、`doWhenDeletingCourse()` 與 `doWhenDeletingSession()` 已移除，連同呼叫它們的 `AppPlugin::performActionsWhenDeletingItem()` 觸發器——現在覆寫它們不會有任何作用。請改用[步驟 7](#cleaning-up-when-a-course-session-or-user-is-deleted) 的刪除事件。

## 步驟 9：啟用

以管理員身分登入，前往管理儀表板的 **Platform** 區塊，再進入 **Plugins** — 這會開啟 **Manage plugins** 頁面。找到您的外掛並點選 **Install**；安裝後再點選 **Enable** 以啟用（已啟用的外掛會改顯示 **Disable** 按鈕）。

## 提示

* **以現有外掛為範例** — `public/plugin/HelloWorld/` 與 `public/plugin/TopLinks/` 是不錯的簡單參考
* **使用翻譯** — 面向使用者的文字務必使用 `lang/` 系統
* **解除安裝時清理** — 在解除安裝指令碼中移除資料庫資料表與設定
* **檢查啟用狀態** — 在事件訂閱者中，執行邏輯前呼叫 `$this->plugin->isEnabled()`。例外是刪除時的清理：改以已安裝為條件，因為資料列會比外掛停用更長壽