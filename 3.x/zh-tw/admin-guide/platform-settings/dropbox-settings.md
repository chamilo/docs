# 檔案交換匣設定

**檔案交換匣（Dropbox）** 檔案交換工具的行為。

可於 **管理 > 組態設定 > 檔案交換匣** 存取這些設定。此類別包含 **8 項設定**，以下列出平台設定固定資料（`SettingsCurrentFixtures.php`）中隨附的標題與說明。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫指令碼，或需以全域層級編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 來變更這些設定時，請使用該名稱。

## 設定

### `dropbox_allow_group`

**檔案交換匣：允許群組**

使用者可將檔案傳送給群組

*預設值：`true`*

### `dropbox_allow_just_upload`

**檔案交換匣：上傳至自己的檔案交換匣空間？**

允許講師與使用者將文件上傳至其檔案交換匣，而無須將文件傳送給自己

*預設值：`true`*

### `dropbox_allow_mailing`

**檔案交換匣：允許郵寄**

透過郵寄功能，您可傳送個人文件給每位學習者

*預設值：`false`*

### `dropbox_allow_overwrite`

**檔案交換匣：文件可否被覆寫**

當使用者或講師上傳的文件名稱與既有文件相同時，原始文件可否被覆寫？若回答是，則會失去版本控管機制。

*預設值：`true`*

### `dropbox_allow_student_to_student`

**檔案交換匣：學習者 <-> 學習者**

允許使用者將文件傳送給其他使用者（點對點）。使用者亦可能將此功能用於較不相關的文件（mp3、測驗解答等）。若停用此項，則使用者僅能將文件傳送給講師。

*預設值：`true`*

### `dropbox_hide_course_coach`

**檔案交換匣：隱藏課程導師**

當導師將文件傳送給學生時，在檔案交換匣中隱藏工作階段課程導師

*預設值：`false`*

### `dropbox_hide_general_coach`

**在檔案交換匣中隱藏總導師**

當總導師上傳檔案時，在檔案交換匣工具中隱藏總導師名稱

*預設值：`false`*


### `dropbox_max_filesize`

**檔案交換匣：文件的檔案大小上限**

檔案交換匣文件最大可為多大（以 MB 為單位）？

*預設值：`100000000`*