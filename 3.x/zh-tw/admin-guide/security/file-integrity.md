# 檔案完整性

*Chamilo 3.0 新增。*

檔案完整性會將伺服器上已安裝的檔案與受信任的基準進行比對，以偵測您未預期的新增、修改、刪除與權限變更——這類變更可能來自成功的入侵、遭入侵的相依套件，或是錯誤的手動編輯。

## 存取檔案完整性

在管理面板中，點選 **安全性 > 檔案完整性**。

## 顯示內容

![檔案完整性頁面，顯示上次掃描資訊、新增、已修改、已刪除與權限已變更檔案的面板、警示歷史清單，以及執行掃描、暫停警示或建立新基準的動作](../../.gitbook/assets/admin-security-file-integrity.png)

* **上次掃描** — 最近一次掃描的執行時間，以及檢查了多少個檔案
* **新增 / 已修改 / 已刪除** — 與基準不同的檔案，透過比對 SHA-256 校驗碼識別（每個清單最多顯示 500 個路徑；若完整清單更長會附註說明——完整清單請見下方的 CEF 日誌）
* **權限已變更** — 權限與基準不同的檔案。在 Linux 上會直接比對 POSIX 模式位元（例如檔案變成任何人可寫入會被標記）；在 Windows 上僅追蹤唯讀屬性，因為 `fileperms()` 無法反映真正的 NTFS ACL
* **警示歷史** — 每次掃描發現異常時的持久、僅附加日誌（最多保留最近 50 筆）。與上方報告不同，此清單不會因乾淨掃描或新基準而被清除，因此即使先前標記的漂移已解決，過去的警示仍會保留可見

檢查會遍歷整個已安裝檔案樹，但排除 `var/` 與 `.git/` 目錄——有一個例外：仍會單獨監看 `.git/config`，專門用來偵測 Git 遠端被靜默改指向惡意伺服器。永遠不會跟隨符號連結，以避免遍歷迴圈或逸出安裝目錄。

由於大型安裝的完整掃描可能需要數分鐘，遍歷會分塊進行（一次一個頂層目錄），進度會記錄在鎖定檔中——因此可以安全重新載入頁面以查看進度，且當機或被終止的掃描不會被誤認為仍在執行。

## 動作

* **立即執行掃描** — 立即將目前檔案樹與基準比對
* **暫停 1 小時** — 暫時停止警示（例如在部署更新期間）。需重新輸入您自己的密碼。暫停期間，掃描會靜默將目前檔案樹採納為新基準而不發出警示，因此暫停視窗結束時不會留下多餘警示。最長暫停時間為 24 小時
* **建立新基準** — 將目前檔案樹採納為新的受信任參考。需重新輸入您自己的密碼

暫停警示或建立新基準可能掩蓋進行中的入侵，因此兩者都需再次輸入密碼——僅憑被劫持的管理員工作階段，不足以在檔案遭竄改時讓偵測靜音。

## 以 Cron 執行

相同檢查亦提供為主控台命令，預期以 cron 排程，而非在管理頁面上排程執行：

```bash
# Scan for drift and alert admins if anything changed
0 3 * * * cd /var/www/chamilo/master && php bin/console app:file-integrity:scan

# Generate or regenerate the baseline (run once after install, or after a manual update)
php bin/console app:file-integrity:baseline

# Pause alerting from the command line (prompts for a global administrator's username and password)
php bin/console app:file-integrity:snooze
```

若暫停仍有效，`app:file-integrity:scan` 會靜默重新建立基準而不發出警示，與從管理頁面觸發的掃描行為一致。

## 設定

相關設定位於 **組態設定 > 安全性**：

* **`file_integrity_check_notify_admins`** — 發現漂移時要通知的電子郵件地址清單；若留空，則通知每一位全域管理員

## SIEM 整合

每次掃描也會將 CEF（Common Event Format）日誌列寫入 `var/logs/security/file_integrity.log`，適合由 SIEM（Wazuh、Splunk、QRadar、ArcSight、Elastic/Filebeat 及類似工具）擷取。每一列都標有識別變更類型的簽章 ID：

| 簽章 | 意義 |
|-----------|---------|
| `FIM-ADDED` | 出現新檔案 |
| `FIM-MODIFIED` | 檔案內容已變更 |
| `FIM-DELETED` | 檔案已消失 |
| `FIM-GITCONFIG` | `.git/config` 已變更（可能遠端遭劫持） |
| `FIM-PERMS` | 檔案權限已變更 |
| `FIM-TRUNCATED` | 某類別的報告已達上限；完整清單請查閱日誌 |

## 建議用法

1. 在安裝完成後立即建立基準線，並在每次手動更新或部署後再次建立
2. 以 cron 排程執行 `app:file-integrity:scan`（例如每晚）
3. 在預計會變更檔案的維護時段（更新、遷移）之前，請使用 **暫停 1 小時**，而不要直接移除 cron 工作
4. 若已有日誌監控或 SIEM，請將 `var/logs/security/file_integrity.log` 匯入其中