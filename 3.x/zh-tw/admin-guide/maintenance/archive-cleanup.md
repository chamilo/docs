# 封存清理

隨著時間推移，Chamilo 會在快取與封存目錄中累積暫存檔。定期清理可避免磁碟空間問題。

## 可清理的內容

* **暫存上傳檔案** — 匯出、匯入及其他操作期間產生的檔案，以及過時的舊版前端建置檔案
* **Symfony 應用程式快取** — 編譯後的容器、快取的組態與路由資料。這*不*包含於下方管理面板動作中 — 請參閱 [從命令列](#from-the-command-line)。
* **工作階段資料** — 已過期的 PHP session 檔案
* **日誌檔** — 不再需要的舊日誌檔

## 執行清理

### 從管理面板

在管理面板中前往 **系統 > 清理暫存檔**（請參閱 [系統工具](../system/system-tools.md#clean-temporary-files)）。它會回報暫存檔數量及其佔用空間，然後可讓您清除全部，或僅清除超過所選期限的檔案，並提供試執行預覽。它也會清除過時的舊版建置檔案，並重新產生編譯後的 CSS 資產。

此動作刻意排除 Symfony 本身的快取目錄（`var/cache/dev`、`var/cache/prod`、`var/cache/test` 以及 cache pools），因此不會讓 `.env` 或 `config/` 的變更立即生效 — 請改用命令列。

### 從命令列

若需更精細的控制，並實際清除 Symfony 應用程式快取，請使用 Symfony console 指令：

```bash
# Clear the Symfony cache
php bin/console cache:clear

# Clear only the production cache
php bin/console cache:clear --env=prod
```

## 提示

* **排程定期清理** — 設定每週或每月的 cron 工作以清除暫存檔
* **監控磁碟用量** — 留意 `var/` 目錄大小，因其會隨快取與日誌檔成長
* **謹慎處理日誌** — 刪除日誌檔前，請確認其中是否含有疑難排解可能需要的資訊