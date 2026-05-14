# 封存清理

隨著時間推移，Chamilo 會在其快取和封存目錄中累積臨時檔案。定期清理可防止磁碟空間問題。

## 可清理的項目

* **Symfony cache** — 編譯的範本、快取的設定和路由資料
* **Temporary files** — 匯出、匯入及其他作業期間產生的檔案
* **Session data** — 已過期的 PHP 工作階段檔案
* **Log files** — 不再需要的舊日誌檔案

## 執行清理

### 從管理面板

在管理面板中導航至 **Archive cleanup**。點擊清理按鈕以移除臨時檔案。

### 從命令列

如需更多控制，請使用 Symfony console 指令：

```bash
# Clear the Symfony cache
php bin/console cache:clear

# Clear only the production cache
php bin/console cache:clear --env=prod
```

## 提示

* **Schedule regular cleanups** — 設定每週或每月 cron 工作來清除臨時檔案
* **Monitor disk usage** — 留意 `var/` 目錄的大小，因為它會隨著快取和日誌檔案而增長
* **Be careful with logs** — 在刪除日誌檔案前，檢查它們是否包含您可能用於疑難排解的資訊