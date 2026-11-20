# 成就證書（批次產生）

Chamilo 可為每一位已完成課程的學生自動產生該課程的成就證書——無論是在基礎課程中，或是在任何重複使用該課程的會期中——教師無需逐一開啟各課程。兩項主控台指令涵蓋此功能：一項針對單一課程，另一項針對整個平台。兩者皆非需要持續監看的資料庫高負載作業：皆以有界批次運作、支援試運行，且若中斷可安全續跑。

## 全平台指令

```bash
php bin/console chamilo:gradebook:process-achievement-certificates [options]
```

對於每一門具有合格根成績簿分類的課程——頂層、非子分類，且已啟用**產生證書**——此指令會評估每一位尚未擁有該分類證書的已註冊學生，並為已符合完成條件者產生證書。一門課程可貢獻**多於一個**情境：其基礎註冊，以及分別地，每個重複使用該課程的會期各一個情境，因為會期可擁有自己的根分類與自己的及格門檻。

當課程或其會期情境不符合自動處理資格時，會被略過——而非視為錯誤：未設定完成規則、該情境有多於一個合格根分類（含糊，需手動選擇），或缺少證書通知內容。執行結束時的摘要會報告各情況落入多少個情境，因此不會有任何略過未被呈現。

### 完成來源

* `--completion-mode=course-rule`（預設）：使用為該課程設定的完成規則。
* `--completion-mode=gradebook`：改為直接使用該情境的原生成績簿分數。
  在此模式下，僅恰好具有一個合格根分類的情境符合資格——具有多個者會被略過並報告，以便改為個別處理（見下文）。

### 安全選項

| 選項                     | 用途                                                                                                                                 |
| --------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------- |
| `--dry-run`                 | 評估並報告，但不建立證書或傳送通知。請一律先執行此選項。                                      |
| `--send-notification`       | 實際（非試運行）執行所必需。每建立一張證書後，傳送該課程已設定的內部訊息與電子郵件。 |
| `--sender-id=<id>`          | 用作通知寄件者的有效平台管理員。須與 `--send-notification` 一併使用。                            |
| `--limit=<n>`                | 單次執行中產生（或在試運行中報告）的證書上限。`0` = 無限制。預設 `100`。                                    |
| `--scan-limit=<n>`           | 單次執行中評估的學生上限，涵蓋所有課程與會期。`0` = 無限制。預設 `1000`。                                 |
| `--batch-size=<n>`           | 在單一課程／會期情境內，每批從資料庫載入的學生數。預設 `25`。                                                     |
| `--course-batch-size=<n>`    | 每批從資料庫載入的課程數。預設 `50`。                                                                                         |
| `--after-course-id=<id>`     | 從此課程 ID 之後繼續掃描。中斷後可安全重複使用——對於已擁有證書的學生，課程絕不會重新產生證書。 |
| `--user-id=<id>`             | 將執行限制為單一學生，並在所有合格課程與會期中檢查——適用於全平台執行前驗證行為。 |
| `--regenerate-empty`         | 亦處理證書紀錄存在但未儲存證書檔案的學生——例如產生過程中途失敗之後——並再次產生該證書。已擁有完整證書的學生絕不會被更動。 |

### 範例

先對整個平台進行模擬執行，以查看將會產生哪些內容：

```bash
php bin/console chamilo:gradebook:process-achievement-certificates --dry-run
```

正式執行，並通知學生，以 ID 為 1 的管理員作為寄件者：

```bash
php bin/console chamilo:gradebook:process-achievement-certificates \
  --send-notification --sender-id=1
```

在課程 480 之後繼續先前中斷的執行：

```bash
php bin/console chamilo:gradebook:process-achievement-certificates \
  --send-notification --sender-id=1 --after-course-id=480
```

重新產生記錄已存在但檔案從未儲存的證書（先以模擬執行列出這些證書）：

```bash
php bin/console chamilo:gradebook:process-achievement-certificates \
  --regenerate-empty --dry-run
php bin/console chamilo:gradebook:process-achievement-certificates \
  --regenerate-empty --send-notification --sender-id=1
```

### 排程為 cron 工作

```cron
# Every night at 2 AM
0 2 * * * php /path/to/chamilo/bin/console chamilo:gradebook:process-achievement-certificates --send-notification --sender-id=1 -e prod --no-interaction >> /path/to/chamilo/var/log/achievement-certificates.log 2>&1
```

## 個別處理單一課程

`chamilo:migration:process-achievement-certificates --course-id=<id>` 提供與全平台指令相同的模擬執行、通知與分頁選項，但範圍僅限基礎課程（不含其場次），並以明確的 `--category-id` 在課程擁有多個符合條件的根分類時消除歧義：

```bash
php bin/console chamilo:migration:process-achievement-certificates \
  --course-id=42 --category-id=7 --dry-run
```

在進行全平台執行之前，可用它來測試單一課程，或處理全平台執行因分類歧義而回報為略過的課程。

## 結束代碼

若在正式執行期間至少有一份證書的產生確實失敗，兩個指令都會以失敗狀態結束（請檢查 `var/log/dev.log`——或對應的正式環境日誌——以了解根本錯誤）。因結構性原因而略過的情境（沒有規則、分類歧義、缺少通知設定）不會導致失敗的結束代碼；它們會改在摘要中回報。

## 相關：學習者在先修學習路徑上卡在 100% 以下

若課程的完成規則要求學習路徑達到 100%，已完成每一步驟但從未開啟該路徑最後「恭喜」頁面的學習者，會卡在略低於 100%，因而永遠不符合此處的資格。請參閱
[完成卡住的學習路徑最終項目](learning-path-final-items.md)——若學生缺少您預期他們應已獲得的證書，請先執行該程序。

## 已取代：舊版 cron 指令碼

不再建議使用 `public/main/cron/add_gradebook_certificates.php`。它會以單一不受限的查詢將平台上的每一筆成績簿結果載入記憶體，且在迴圈期間從不釋放，因此在課程或練習數量非微不足道的實例上可能耗盡記憶體，而且它從不傳送「您已獲得證書」通知。請改用
`chamilo:gradebook:process-achievement-certificates`。