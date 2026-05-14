# 外掛架構

## 外掛位置

外掛儲存在 `public/plugin/` 中。每個外掛擁有自己的目錄：

```
public/plugin/
├── Bbb/                    # BigBlueButton integration
├── Zoom/                   # Zoom integration
├── Onlyoffice/             # OnlyOffice document editing
├── XApi/                   # xAPI/Tin Can
├── ...                     # bundled plugins ship under public/plugin/
```

## 外掛結構

典型的外掛目錄包含：

```
public/plugin/MyPlugin/
├── plugin.php              # REQUIRED — assigns $plugin_info
├── install.php             # Installation script
├── uninstall.php           # Uninstallation script
├── index.php               # Region rendering entry point (if applicable)
├── admin.php               # Admin interface (optional)
├── lang/                   # Translation files (locale codes: en_US.php, fr_FR.php, …)
├── src/
│   ├── MyPluginPlugin.php        # Main plugin class (extends Plugin)
│   ├── Entity/                   # Doctrine entities (auto-discovered)
│   ├── Repository/               # Doctrine repositories
│   └── EventSubscriber/          # Symfony event subscribers (auto-registered)
├── templates/              # Twig templates
└── resources/              # CSS/JS assets
```

## 外掛類別

每個外掛皆延伸 `Plugin` 基底類別 (`public/main/inc/lib/plugin.class.php`)，並遵循單例模式：

```php
class MyPluginPlugin extends Plugin
{
    protected function __construct()
    {
        $settings = ['api_key' => 'text', 'enabled' => 'boolean'];
        parent::__construct('1.0', 'Author Name', $settings);
    }

    public static function create(): static
    {
        static $instance = null;
        return $instance ??= new static();
    }
}
```

### 關鍵類別屬性

| 屬性 | 類型 | 效果 |
|----------|------|--------|
| `$isCoursePlugin` | bool | 將外掛註冊為課程工具 |
| `$isAdminPlugin` | bool | 新增管理介面頁面 |
| `$isMailPlugin` | bool | 與郵件系統整合 |
| `$addCourseTool` | bool | 在課程首頁新增圖示 |
| `$course_settings` | array | 定義每個課程的設定欄位 |

## 外掛生命週期

1. **安裝** — 管理員啟用外掛，執行 `install.php`
2. **設定** — 設定透過管理面板定義和管理；儲存在 `access_url_rel_plugin`（支援多租戶）
3. **執行** — 外掛將內容注入顯示區域或回應平台事件
4. **停用** — 外掛被停用，但其資料保留
5. **解除安裝** — 執行 `uninstall.php` 以清理資料和資料表

## 顯示區域

外掛透過覆寫 `renderRegion()` 將 HTML 注入 Vue 前端的前 18 個預定義區域：

```php
public function renderRegion(string $region): string
{
    if ('footer_left' !== $region) {
        return '';
    }
    return '<p>My Plugin footer content</p>';
}
```

可用區域：`content_bottom`、`content_top`、`course_tool_plugin`、`footer_center`、`footer_left`、`footer_right`、`header_center`、`header_left`、`header_main`、`header_right`、`login_bottom`、`login_top`、`main_bottom`、`main_top`、`menu_administrator`、`menu_bottom`、`menu_top`、`pre_footer`。

## Symfony 整合

### 事件訂閱者

置於 `src/EventSubscriber/` 中的以 `EventSubscriber.php` 結尾的檔案，會透過 `PluginEventSubscriberPass` 自動註冊。它們實作 `EventSubscriberInterface` 並回應 `src/CoreBundle/Event/Events.php` 中定義的事件。

由於外掛類別 (`MyPluginPlugin`) 並非 Symfony 服務，因此無法自動注入至訂閱者建構子中。請改用 `create()` 單例：

```php
class MyPluginEventSubscriber implements EventSubscriberInterface
{
    private MyPluginPlugin $plugin;

    public function __construct()
    {
        $this->plugin = MyPluginPlugin::create();
    }
}
```

### Doctrine 實體

置於 `src/Entity/` 中的 Doctrine 實體會由 `PluginEntityPass` 自動發現。請使用 PHP 8 屬性進行映射。命名空間必須遵循 `Chamilo\PluginBundle\{PluginName}`。請使用唯一的資料表名稱前綴（例如 `my_plugin_*`）以避免衝突。

---

---
### PluginHelper 服務

為了從核心 Symfony 服務存取外掛狀態，請注入 `PluginHelper`，而非直接實例化外掛類別：

```php
use Chamilo\CoreBundle\Helpers\PluginHelper;

class SomeService
{
    public function __construct(private readonly PluginHelper $pluginHelper) {}

    public function doSomething(): void
    {
        if ($this->pluginHelper->isPluginEnabled('MyPlugin')) {
            $value = $this->pluginHelper->getPluginSetting('MyPlugin', 'api_key');
        }
    }
}
```

可用方法：

| 方法 | 用途 |
|--------|---------|
| `isPluginEnabled(string $name): bool` | 檢查外掛是否已安裝並針對目前存取 URL 啟用 |
| `loadLegacyPlugin(string $name): ?object` | 實例化並傳回外掛單一執行個體 |
| `getPluginSetting(string $name, string $key): mixed` | 讀取單一外掛設定值 |
| `getPluginOverrides(string $name): array` | 取得外掛的 `plugin.yaml` 覆寫（預設值 + 存取 URL 特定值） |

## 核心檔案參照

| 檔案 | 用途 |
|------|---------|
| `public/main/inc/lib/plugin.class.php` | 外掛基底類別 |
| `public/main/inc/lib/plugin.lib.php` | 外掛管理器 |
| `src/CoreBundle/Entity/Plugin.php` | 外掛 Doctrine 實體 |
| `src/CoreBundle/Helpers/PluginHelper.php` | PluginHelper 服務 |
| `src/CoreBundle/Event/Events.php` | 事件常數 |
| `public/plugin/HelloWorld/` | 最小範例外掛 |
| `public/plugin/TopLinks/` | 簡單範例外掛 |