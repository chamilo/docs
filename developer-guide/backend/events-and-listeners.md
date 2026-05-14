# 事件與監聽器

Chamilo 使用 Symfony 的[事件系統](https://symfony.com/doc/current/components/event_dispatcher.html)來實現組件之間的解耦通訊。

## 事件監聽器

Chamilo 使用兩個監聽器位置：

* **`src/CoreBundle/EventListener/`** — Symfony kernel/HTTP 監聽器（請求、回應、例外、登入/登出、課程/工作階段存取等）。範例：`CidReqListener`、`CourseAccessListener`、`LoginSuccessHandler`、`LogoutListener`、`ExceptionListener`、`ResourceDoctrineListener`。
* **`src/CoreBundle/Entity/Listener/`** — 附加至特定實體的 Doctrine 實體監聽器。範例：`ResourceNodeListener`、`CourseListener`、`SessionListener`、`LanguageListener`、`UserListener`、`MessageListener`。

選擇符合您需要反應的內容的位置：HTTP 管線事件置於 `EventListener/`；實體生命週期鉤子置於 `Entity/Listener/`。

## 事件訂閱者

位於 `src/CoreBundle/EventSubscriber/`：

事件訂閱者可以監聽多個事件：

* **安全性訂閱者** — 處理登入/登出事件、追蹤登入嘗試
* **API 訂閱者** — API 請求的前/後處理
* **Doctrine 訂閱者** — 對實體生命週期事件作出反應

## Doctrine 生命週期事件

實體使用 `#[ORM\HasLifecycleCallbacks]` 來處理資料庫層級事件：

```php
#[ORM\PrePersist]
public function prePersist(): void
{
    $this->createdAt = new DateTime();
}
```

## 建立自訂監聽器

要新增自訂行為：

1. 在適當的 bundle 中建立監聽器/訂閱者類別
2. 在服務設定中將其標記為事件監聽器或訂閱者
3. 實作處理方法

```php
class MyListener
{
    public function onKernelRequest(RequestEvent $event): void
    {
        // Your logic here
    }
}
```

## 關鍵事件

| 事件 | 觸發時機 |
|-------|----------|
| `kernel.request` | 每個 HTTP 請求 |
| `kernel.response` | 發送 HTTP 回應之前 |
| `security.interactive_login` | 使用者登入時 |
| `doctrine.prePersist` | 實體首次儲存之前 |
| `doctrine.postUpdate` | 實體更新之後 |

## Chamilo 專屬事件

這些事件由 Chamilo 自身的程式碼發送，是外掛的主要整合點。常數定義於 `Chamilo\CoreBundle\Event\Events`。

| 常數 | 事件字串 | 觸發時機 |
|----------|-------------|----------|
| `Events::COURSE_CREATED` | `chamilo.event.course_created` | 課程建立之後 |
| `Events::COURSE_ACCESS_CHECK` | `chamilo.course_access_check` | 使用者存取課程之前 |
| `Events::COURSE_USER_SUBSCRIPTION_CHECK` | `chamilo.event.course_user_subscription_check` | 使用者註冊課程之前 |
| `Events::SESSION_RESUBSCRIPTION` | `chamilo.event.session_resubscription` | 使用者嘗試重新註冊工作階段時 |
| `Events::LOGIN_CREDENTIALS_CHECKED` | `chamilo.event.login_credentials_checked` | 登入憑證驗證之後 |
| `Events::LOGIN_CONDITION_CHECKED` | `chamilo.event.login_condition_checked` | 額外登入條件檢查之後 |
| `Events::DOCUMENT_ACTION` | `chamilo.event.document_action` | 文件工具列渲染時 |
| `Events::DOCUMENT_ITEM_ACTION` | `chamilo.event.document_item_action` | 每個檔案動作按鈕渲染時 |
| `Events::DOCUMENT_ITEM_VIEW` | `chamilo.event.document_item_view` | 文件開啟檢視時 |
| `Events::EXERCISE_REPORT_ACTION` | `chamilo.event.exercise_report_action` | 測驗報告頁面渲染動作連結時 |
| `Events::EXERCISE_ENDED` | `chamilo.event.exercise_ended` | 學習者提交測驗之後 |
| `Events::EXERCISE_QUESTION_ANSWERED` | `chamilo.event.question_answered` | 每個問題回答之後 |
| `Events::LP_CREATED` | `chamilo.event.learning_path_created` | 學習路徑建立之後 |
| `Events::LP_ITEM_VIEWED` | `chamilo.event.learning_path_item_viewed` | 學習者開啟 LP 項目時 |
| `Events::LP_ENDED` | `chamilo.event.learning_path_ended` | 學習者完成學習路徑之後 |
| `Events::ADMIN_BLOCK_DISPLAYED` | `chamilo.event.admin_block_displayed` | 管理員儀表板建置區塊清單時 |
| `Events::USER_CREATED` | `chamilo.event.user_created` | 使用者帳戶建立之後 |
| `Events::USER_UPDATED` | `chamilo.event.user_updated` | 使用者帳戶更新之後 |
| `Events::USER_DELETED` | `chamilo.event.user_deleted` | 使用者帳戶刪除之後 |
| `Events::PORTFOLIO_ITEM_ADDED` | `chamilo.event.portfolio_item_added` | 作品集項目建立之後 |
| `Events::NOTIFICATION_CONTENT_FORMATTED` | `chamilo_hook_event.notification_content` | 通知主體格式化時 |

## 外掛範例：在文件檢視器中新增按鈕

本節說明外掛如何使用事件訂閱者將按鈕注入現有 Chamilo 頁面 — 無需修改核心程式碼。

---

---
### 情境

名為 **MyViewer** 的外掛想要在課程檔案管理員中每個文件旁邊新增一個「在 MyViewer 中開啟」按鈕。相關事件為 `Events::DOCUMENT_ITEM_VIEW`，由 Chamilo 在即將顯示文件時發送，攜帶 `CDocument` 實體以及一個可變動的連結清單。

### 外掛目錄結構

```
public/plugin/MyViewer/
├── plugin.php                          # 宣告 $plugin_info
├── install.php / uninstall.php
├── admin.php                           # 外掛設定頁面
├── lang/                               # 翻譯字串
└── src/
    ├── MyViewerPlugin.php              # 主要外掛類別 (繼承 Plugin)
    └── EventSubscriber/
        └── MyViewerEventSubscriber.php # 事件訂閱者
```

### 主要外掛類別 (`src/MyViewerPlugin.php`)

```php
declare(strict_types=1);

class MyViewerPlugin extends Plugin
{
    public const SETTING_SERVER_URL = 'server_url';

    protected function __construct()
    {
        parent::__construct('1.0', 'Your Name', [
            self::SETTING_SERVER_URL => 'text',
        ]);
    }

    public static function create(): static
    {
        static $instance = null;
        return $instance ??= new self();
    }

    public function getViewerUrl(int $documentId): string
    {
        $base = $this->get(self::SETTING_SERVER_URL);
        return sprintf('%s/view?doc=%d', rtrim((string) $base, '/'), $documentId);
    }
}
```

`Plugin` 基底類別提供 `isEnabled()`、`get($settingKey)`，以及安裝課程工具和設定的輔助方法。單例模式 (`static $instance`) 是 Chamilo 的標準慣例，因為外掛類別也會在 Symfony 容器外部 (舊版 PHP 頁面) 中實例化。

### 事件訂閱者 (`src/EventSubscriber/MyViewerEventSubscriber.php`)

```php
declare(strict_types=1);

use Chamilo\CoreBundle\Event\DocumentItemViewEvent;
use Chamilo\CoreBundle\Event\Events;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MyViewerEventSubscriber implements EventSubscriberInterface
{
    private MyViewerPlugin $plugin;

    public function __construct()
    {
        $this->plugin = MyViewerPlugin::create();
    }

    public static function getSubscribedEvents(): array
    {
        return [
            Events::DOCUMENT_ITEM_VIEW => 'onDocumentItemView',
        ];
    }

    public function onDocumentItemView(DocumentItemViewEvent $event): void
    {
        if (!$this->plugin->isEnabled()) {
            return;
        }

        $document = $event->getDocument();

        $url = $this->plugin->getViewerUrl($document->getIid());
        $label = $this->plugin->get_lang('OpenInMyViewer');

        $event->addLink(sprintf(
            '<a href="%s" target="_blank" class="btn btn--plain">%s</a>',
            htmlspecialchars($url, ENT_QUOTES),
            htmlspecialchars($label, ENT_QUOTES)
        ));
    }
}
```

`addLink()` 會將 HTML 附加到陣列中，Chamilo 的文件檢視範本會將其與內建的「下載」和「預覽」動作一起呈現。訂閱者永遠不會修改 Chamilo 核心檔案。

### 註冊

無需手動服務註冊。Chamilo 的 `config/services.yaml` 啟用 Symfony 的 `autoconfigure` 旗標，全域自動將任何實作 `EventSubscriberInterface` 的類別標記為 `kernel.event_subscriber`。只要外掛目錄已載入 (透過 Composer 的 classmap 或 PSR-4 自動載入)，Symfony 就會在下次清除快取時自動偵測訂閱者。

```bash
php bin/console cache:clear
```

### 事件資料流程

```
文件清單渲染
        │
        ▼
Chamilo 發送 DocumentItemViewEvent (攜帶 CDocument 實體 + 空的 links[])
        │
        ├─► MyViewerEventSubscriber::onDocumentItemView()  → 附加 HTML 連結
        ├─► OnlyofficeEventSubscriber::onDocumentItemView() → 附加「編輯」按鈕
        │   (任意數量的外掛可以監聽相同事件)
        ▼
範本與內建檔案動作一起渲染 event->getLinks()
```

多個外掛可以獨立訂閱相同事件；每個外掛都會附加到共用的資料，而無需知道其他外掛的存在。執行順序遵循 Symfony 的優先權系統 — 如果順序重要，請在 `getSubscribedEvents()` 中的處理常式二元組第二個元素傳遞優先權整數：

```php
public static function getSubscribedEvents(): array
{
    return [
        Events::DOCUMENT_ITEM_VIEW => ['onDocumentItemView', 10], // 較高 = 較早執行
    ];
}
```