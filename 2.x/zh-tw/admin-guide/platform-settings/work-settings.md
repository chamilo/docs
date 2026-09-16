# 作業（作品）設定

**作業（學生作品）** 工具的預設值和行為。

在 **管理 > 設定 > 作業（作品）** 下存取這些設定。此類別包含 **12 個設定**，以下列出平台設定預設資料 (`SettingsCurrentFixtures.php`) 中提供的標題和註解。

> 程式碼中的變數名稱以等寬字體顯示。使用 API 進行腳本編寫時，或需要透過編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全域層級變更這些設定時，請使用它。

## 設定

### `allow_compilatio_tool`

**啟用 Compilatio**

Compilatio 是一種防作弊服務，可比較兩個提交之間的文字，並報告內容（通常為作業）不真實的機率是否很高。

*預設值：`false`*

### `allow_my_student_publication_page`

**啟用我的作業頁面**

[inferred] 啟用專用頁面，讓學習者檢視和管理其已提交的作業。

*預設值：`false`*

### `allow_only_one_student_publication_per_user`

**學生僅能上傳一個作業**

[inferred] 限制學習者每項活動僅提交一個作業，防止多次提交。

*預設值：`false`*

### `allow_redirect_to_main_page_after_work_upload`

**上傳或新增評論後重新導向至作業工具首頁**

上傳作業或新增評論後重新導向至作業清單

*預設值：`false`*

### `assignment_prevent_duplicate_upload`

**防止作業重複上傳**

[inferred] 阻止學習者為相同作業提交上傳相同檔案。

*預設值：`false`*

### `block_student_publication_add_documents`

**防止新增文件至作業**

[inferred] 防止學習者在提交作業時新增或附加文件。

*預設值：`false`*

### `block_student_publication_edition`

**防止作業編輯**

[inferred] 防止學習者在初始提交後修改或更新其已提交的作業。

*預設值：`false`*

### `block_student_publication_score_edition`

**防止教師修改作業分數**

[inferred] 防止教師在記錄分數後變更作業分數。

*預設值：`false`*

### `compilatio_tool`

**Compilatio 設定**

在此設定 Compilatio 連線詳細資料。

### `considered_working_time`

**啟用作業時間投入**

這將允許教師提供完成作業的預估時間投入（以 hh:mm:ss 格式）。在作業提交並經教師核准（作業獲得分數）後，學習者將自動獲得對應時間。

*預設值：`work_time`*

### `force_download_doc_before_upload_work`

**上傳作業前強制下載文件**

強制使用者在作業定義中提供的文件下載後，才能上傳其作業。

*預設值：`true`*

### `my_courses_show_pending_work`

**在我的課程頁面顯示「待處理」作業連結**

[inferred] 在學習者的我的課程頁面顯示待處理作業的連結或計數，以供快速存取。

*預設值：`false`*