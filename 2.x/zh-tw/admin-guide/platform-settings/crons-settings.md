# Cron 任務設定

Chamilo 隨附的排程工作 (cron 任務) 設定。

在 **管理 > 設定 > Cron 任務** 下存取這些設定。此類別包含 **3 個設定**，以下列出平台設定預設值 (`SettingsCurrentFixtures.php`) 中的標題與註解。

> 程式碼中的變數名稱以等寬字體顯示。當透過 API 撰寫腳本，或需要透過編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全域層級變更這些設定時，請使用它。

## 設定

### `cron_remind_course_expiration_activate`

**提醒課程到期 cron**

啟用提醒課程到期 cron

*預設值：`false`*

### `cron_remind_course_expiration_frequency`

**提醒課程到期 cron 的頻率**

課程到期前考慮發送提醒郵件的日數

### `cron_remind_course_finished_activate`

**發送課程完成通知**

當學生課程 (工作坊) 完成時，是否發送電子郵件給學生。這需要設定 cron 任務 (請參閱 main/cron/ 目錄)。

*預設值：`false`*