# 課程工具外掛

課程工具外掛會在課程首頁新增工具，與內建工具如 Documents、Exercises 和 Forums 並列。

## 課程工具外掛運作方式

當外掛將自身註冊為課程工具時：

1. 它會出現在課程首頁的工具格中
2. 教師可以像其他工具一樣顯示/隱藏它
3. 點擊工具會在課程脈絡中開啟外掛的介面

## 註冊為課程工具

在您的外掛類別中，設定 `$isCoursePlugin = true`。若要自動在課程首頁新增工具圖示，也請設定 `$addCourseTool = true`：

```php
class MyToolPlugin extends Plugin
{
    protected function __construct()
    {
        parent::__construct('1.0', 'Author');
        $this->isCoursePlugin = true;
        $this->addCourseTool = true;
    }
}
```

## 每課程設定

透過 `$course_settings` 屬性定義課程層級的設定欄位：

```php
public array $course_settings = [
    ['name' => 'my_plugin_enabled', 'type' => 'checkbox', 'default' => false],
    ['name' => 'my_plugin_limit',   'type' => 'text',     'default' => '10'],
];
```

這些設定會出現在課程設定面板中，您可以透過覆寫 `validateCourseSetting(string $variable)`（傳回 `false` 以拒絕該值）來驗證，或透過 `course_settings_updated(array $values)` 來處理變更。

## 安裝與解除安裝

在安裝時，為所有現有課程註冊外掛欄位：

```php
public function install(): void
{
    $this->install_course_fields_in_all_courses(add_tool_link: true);
}
```

在單一課程中安裝（例如新增課程時）：

```php
$this->course_install(courseId: $courseId, addToolLink: true);
```

從特定課程移除欄位：

```php
$this->uninstall_course_fields(courseId: $courseId);
```

## 整合點

課程工具外掛透過以下方式整合：

* **`LegacyPluginCourseTool`** (`src/CoreBundle/Tool/LegacyPluginCourseTool.php`) — 將外掛註冊為課程中的工具
* **`CToolStateProvider`** (`src/CoreBundle/State/CToolStateProvider.php`) — 解析哪些工具（包含外掛工具）會出現在課程首頁
* 工具會出現在課程的 `CTool` 集合中

## 課程脈絡

當學習者點擊您的外掛工具時，您的外掛程式碼會在課程脈絡中執行。您可以存取：

* 目前課程（透過 `api_get_course_id()` 或 CID 請求儲存）
* 目前課程工作階段（若適用）
* 目前使用者
* 課程層級的外掛設定

## 範例

內建課程工具外掛：

* **BigBlueButton** (`Bbb/`) — 課程內視訊會議
* **Zoom** (`Zoom/`) — 課程內 Zoom 會議
* **OnlyOffice** (`Onlyoffice/`) — 課程內文件編輯
```