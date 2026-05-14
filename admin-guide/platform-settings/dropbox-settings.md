# Dropbox 設定

**Dropbox** 檔案交換工具的行為。

在 **管理 > 設定 > Dropbox** 下存取這些設定。此類別包含 **8 個設定**，以下列出平台設定預設值 (`SettingsCurrentFixtures.php`) 中的標題與註解。

> 程式碼中的變數名稱以等寬字體顯示。使用 API 進行腳本編寫，或需透過編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全域層級變更這些設定時，請使用該名稱。

## 設定

### `dropbox_allow_group`

**Dropbox：允許群組**

使用者可以將檔案傳送至群組

*預設值：`true`*

### `dropbox_allow_just_upload`

**Dropbox：上傳至自己的 Dropbox 空間？**

允許教師與使用者上傳文件至其 Dropbox，而無需將文件傳送給自己

*預設值：`true`*

### `dropbox_allow_mailing`

**Dropbox：允許郵寄**

使用郵寄功能，您可以為每位學習者傳送個人化文件

*預設值：`false`*

### `dropbox_allow_overwrite`

**Dropbox：文件是否可被覆寫**

當使用者或教師上傳名稱與現有文件相同的文件時，是否可覆寫原始文件？若回答是，則會失去版本控制機制。

*預設值：`true`*

### `dropbox_allow_student_to_student`

**Dropbox：學習者 ↔ 學習者**

允許使用者將文件傳送給其他使用者（點對點）。使用者可能會用此功能傳送較不相關的文件（mp3、測驗解答等）。若停用此功能，則使用者僅能將文件傳送給教師。

*預設值：`true`*

### `dropbox_hide_course_coach`

**Dropbox：隱藏課程教練**

當教練將文件傳送給學生時，在 Dropbox 中隱藏課程教練

*預設值：`false`*

### `dropbox_hide_general_coach`

**在 Dropbox 中隱藏一般教練**

當一般教練上傳檔案時，在 Dropbox 工具中隱藏一般教練名稱

*預設值：`false`*


### `dropbox_max_filesize`

**Dropbox：文件最大檔案大小**

Dropbox 文件最大可有多大（以 MB 為單位）？

*預設值：`100000000`*