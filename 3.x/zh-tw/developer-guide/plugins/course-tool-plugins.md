# 課程工具外掛

課程工具外掛會在課程首頁新增工具，與內建工具（如文件、測驗與論壇）並列。

## 課程工具外掛如何運作

當外掛將自身註冊為課程工具時：

1. 它會出現在課程首頁的工具格線中
2. 教師可以像其他工具一樣顯示／隱藏它
3. 點選該工具會在課程脈絡中開啟外掛介面

## 註冊為課程工具

在您的外掛類別中，設定 `$isCoursePlugin = true`。若要自動在課程首頁加入工具圖示，同時設定 `$addCourseTool = true`：

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

## 各課程設定

透過 `$course_settings` 屬性定義課程層級的組態欄位：

```php
public array $course_settings = [
    ['name' => 'my_plugin_enabled', 'type' => 'checkbox', 'default' => false],
    ['name' => 'my_plugin_limit',   'type' => 'text',     'default' => '10'],
];
```

這些欄位會出現在課程設定面板中，可透過覆寫 `validateCourseSetting(string $variable)` 進行驗證（回傳 `false` 以拒絕某個值），或透過 `course_settings_updated(array $values)` 採取對應動作。

## 安裝與解除安裝

若要在安裝時將外掛欄位註冊到所有既有課程：

```php
public function install(): void
{
    $this->install_course_fields_in_all_courses(add_tool_link: true);
}
```

若要安裝到單一課程（例如建立新課程時）：

```php
$this->course_install(courseId: $courseId, addToolLink: true);
```

若要從特定課程移除欄位：

```php
$this->uninstall_course_fields(courseId: $courseId);
```

## 整合點

課程工具外掛透過以下方式整合：

* **`LegacyPluginCourseTool`** (`src/CoreBundle/Tool/LegacyPluginCourseTool.php`) — 將外掛註冊為課程中的工具
* **`CToolStateProvider`** (`src/CoreBundle/State/CToolStateProvider.php`) — 解析課程首頁上要顯示哪些工具（包含外掛工具）
* 該工具會出現在該課程的 `CTool` 集合中

## 課程脈絡

當學習者點選您外掛的工具時，外掛程式碼會在課程脈絡中執行。您可以存取：

* 目前課程（透過 `api_get_course_id()` 或 CID 請求儲存區）
* 目前工作階段（若適用）
* 目前使用者
* 課程層級的外掛設定

## 範例

內建的課程工具外掛：

* **BigBlueButton** (`Bbb/`) — 課程內的視訊會議
* **Zoom** (`Zoom/`) — 課程內的 Zoom 會議
* **OnlyOffice** (`Onlyoffice/`) — 課程內的文件編輯