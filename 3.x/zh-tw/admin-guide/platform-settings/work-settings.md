# 作業（Work）設定

**作業（學員繳交）** 工具的預設值與行為。

可於 **管理 > 組態設定 > 作業（Work）** 存取這些設定。此類別包含 **12 項設定**，以下列出平台設定 fixtures（`SettingsCurrentFixtures.php`）中隨附的標題與說明。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫指令碼，或需以編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 的方式在全域層級變更這些設定時，請使用該名稱。

## 設定

### `allow_compilatio_tool`

**啟用 Compilatio**

Compilatio 是一種防作弊服務，會比較兩份繳交內容的文字，並回報內容（通常為作業）非原創的機率是否偏高。

*預設值：`false`*

### `allow_my_student_publication_page`

**啟用「我的作業」頁面**

[推斷] 啟用專屬頁面，供學習者檢視並管理自己已繳交的作業。

*預設值：`false`*

### `allow_only_one_student_publication_per_user`

**學員僅能上傳一份作業**

[推斷] 限制學習者每個活動僅能繳交一份作業，防止多次繳交。

*預設值：`false`*

### `allow_redirect_to_main_page_after_work_upload`

**上傳或留言後重新導向至作業工具首頁**

上傳作業或新增留言後，重新導向至作業清單

*預設值：`false`*

### `assignment_prevent_duplicate_upload`

**防止作業重複上傳**

[推斷] 阻止學習者針對同一份作業繳交上傳相同的檔案。

*預設值：`false`*

### `block_student_publication_add_documents`

**防止將文件加入作業**

[推斷] 防止學習者在繳交作業時新增或附加文件。

*預設值：`false`*

### `block_student_publication_edition`

**防止編輯作業**

[推斷] 防止學習者在初次繳交後修改或更新已繳交的作業。

*預設值：`false`*

### `block_student_publication_score_edition`

**防止教師修改作業分數**

[推斷] 防止教師在分數登錄後變更作業分數。

*預設值：`false`*

### `compilatio_tool`

**Compilatio 設定**

在此設定 Compilatio 連線詳細資料。

### `considered_working_time`

**啟用作業時間投入**

此功能允許教師為完成作業指定預估時間投入（格式為 hh:mm:ss）。作業繳交並經教師核可（作業已給分）後，系統會自動為學習者指派對應時間。

*預設值：`work_time`*

### `force_download_doc_before_upload_work`

**上傳作業前強制下載文件**

強制使用者在上傳作業前，先下載作業說明中提供的文件。

*預設值：`true`*

### `my_courses_show_pending_work`

**在「我的課程」頁面顯示「待處理」作業連結**

[推斷] 在學習者的「我的課程」頁面顯示待處理作業的連結或數量，以便快速存取。

*預設值：`false`*