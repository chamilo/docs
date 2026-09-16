# 排程工作設定

Chamilo 隨附之排程工作（cron 工作）的設定。

請至 **管理 > 組態設定 > 排程工作** 存取這些設定。此類別包含 **5 項設定**，以下列出平台設定 fixtures（`SettingsCurrentFixtures.php`）中隨附的標題與說明。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫指令碼，或需以編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 的方式在全域層級變更這些設定時，請使用該名稱。

## 設定

### `cron_remind_course_expiration_activate`

**課程到期提醒排程**

啟用課程到期提醒排程

*預設值：`false`*

### `cron_remind_course_expiration_frequency`

**課程到期提醒排程的頻率**

在課程到期前幾天應納入考量並寄送提醒郵件的天數

### `cron_remind_course_finished_activate`

**傳送課程結束通知**

是否在學生的課程（session）結束時向其寄送電子郵件。此功能需要已設定排程工作（請參閱 main/cron/ 目錄）。

*預設值：`false`*

### `cron_certificate_expiry_reminder_activate`

**證書到期提醒排程**

啟用 `app:send-certificate-expiry-reminders` 排程，用以提醒證書已到期或即將到期的學習者。

*預設值：`false`*

### `cron_certificate_expiry_reminder_days`

**證書到期提醒視窗（天）**

預設提前掃描即將到期證書的天數；除非排程以 `--days-ahead` 執行，否則使用此值。

*預設值：`30`*

## 證書到期提醒

成績冊證書可設定有效期限（以天為單位），依成績冊類別個別設定——請參閱 [證書與技能](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md)。一旦證書具有到期日，Chamilo 可在該到期日接近時（或已過期後）以電子郵件與站內訊息提醒學習者。

啟用上方的 `cron_certificate_expiry_reminder_activate` 僅開啟此*功能*；實際寄送提醒仍須由您在作業系統層級排程的主控台指令執行（例如透過 `crontab`），因為 Chamilo 並不自行執行背景排程器：

```bash
php bin/console app:send-certificate-expiry-reminders
```

實用選項：

| 選項 | 效果 |
|--------|--------|
| `--days-ahead=N` | 到期前納入掃描的天數（預設為 `cron_certificate_expiry_reminder_days`） |
| `--force` | 實際寄送提醒。未使用此選項時，指令僅回報*將會*寄送的內容——在接入 cron 前可用於安全檢查 |
| `--resend` | 即使某證書／到期日組合已通知過，仍重新寄送提醒 |
| `--access-url-id=N` | 將掃描限制於單一入口網站（多 URL 安裝） |
| `--include-unsubscribed-users` | 亦通知已取消訂閱平台電子郵件的學習者 |

教師可手動寄送相同提醒，無需此排程——請參閱 [證書與技能](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry)。