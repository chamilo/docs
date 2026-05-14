# 成績簿（評估）設定

適用於 **Gradebook (Assessments)** 工具的預設值 — 分數顯示、小數精確度、證書分數門檻，以及彙總。

在 **Administration > Configuration settings > Gradebook (Assessments)** 下存取這些設定。此類別包含 **34 個設定**，以下列出平台設定預設資料 (`SettingsCurrentFixtures.php`) 中提供的標題和註解。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫腳本或需要透過編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全域層級變更這些設定時，請使用它。

## 設定

### `allow_gradebook_comments`

**成績簿評論**

啟用成績簿評論，讓教師能夠為此課程中學習者的整體表現新增評論。該評論將顯示在學習者的 PDF 匯出中。

*預設值：`false`*


### `allow_gradebook_stats`

**在成績簿中快取結果**

將平均值的部分大型計算置於快取欄位中，以提升連結和評估的速度（大幅提升）。潛在負面影響是成績簿結果表格的重新整理可能需要一些時間。

*預設值：`false`*

### `gradebook_badge_sidebar`

**成績簿徽章側邊欄**

在側邊選單內產生一個區塊，用以顯示幾個待核准的徽章。需要在此處列出成績簿，按（數字）ID。

### `gradebook_default_grade_model_id`

**預設成績模型**

建立課程時將預設選取此值

### `gradebook_default_weight`

**成績簿中的預設權重**

此權重將預設用於所有課程

*預設值：`100`*

### `gradebook_dependency`

**成績簿間依賴關係**

啟用成績簿依賴機制，讓使用者知道為了完成成績簿，需要先完成哪些其他項目。

*預設值：`false`*


### `gradebook_dependency_mandatory_courses`

**成績簿依賴的必修課程**

使用成績簿間依賴時，您可以選擇一份必修課程清單，在核准任何具有依賴的成績簿之前，要求完成這些課程。

### `gradebook_detailed_admin_view`

**在成績簿中顯示額外欄位**

在成績簿的學生檢視中顯示額外欄位，包括所有學生的最佳分數、檢視報告的學生的相對位置，以及整個學生群組的平均分數。

*預設值：`false`*


### `gradebook_display_extra_stats`

**成績簿額外統計資料**

在成績簿的主要報告中新增額外欄位（1 = 排名，2 = 最佳分數，3 = 平均值）。

### `gradebook_enable`

**評估工具啟用**

評估工具可讓您透過將教室和線上活動評估合併至績效報告，來評估組織中的能力。您要啟用它嗎？

*預設值：`true`*


### `gradebook_enable_grade_model`

**啟用成績簿模型**

根據成績簿模型，在課程內自動建立成績簿類別。

*預設值：`false`*

### `gradebook_enable_subcategory_skills_independant_assignement`

**啟用成績簿子類別技能**

技能通常在完成整個成績簿後歸屬。啟用此選項後，您可以將技能附加至成績簿的子區段。

*預設值：`false`*


### `gradebook_flatview_extrafields_columns`

**成績簿平面檢視中的使用者額外欄位**

在成績簿的主要結果表格中新增指定的欄位（'variables' 陣列）。

### `gradebook_hide_graph`

**隱藏成績簿圖表**

如果您的入口網站資源有限，減少產生可能包含數千結果的動態成績簿圖表是一個不錯的選項。

*預設值：`false`*


### `gradebook_hide_link_to_item_for_student`

**在成績簿中隱藏學習者的項目連結**

透過移除項目上的連結，避免學習者點選成績簿中的項目。

*預設值：`false`*


### `gradebook_hide_pdf_report_button`

**隱藏成績簿「下載 PDF 報告」按鈕**

從學習者的成績簿檢視中移除 PDF 匯出按鈕。

*預設值：`false`*


### `gradebook_hide_table`

**對學習者隱藏成績簿表格**

透過隱藏結果表格（但仍提供證書、技能等的存取權）來減少成績簿載入時間。

*預設值：`false`*

---
### `gradebook_locking_enabled`

**啟用教師鎖定評量**

啟用後，此選項將允許對應課程的教師鎖定任何評量。這將防止教師修改評量中使用的資源結果：考試、學習路徑、工作等。只有管理員有權解鎖已鎖定的評量。教師將被告知此可能性。成績單的鎖定與解鎖將記錄在系統的重要活動報告中。

*預設值：`false`*

### `gradebook_multiple_evaluation_attempts`

**允許成績單中的多重評量嘗試**

允許在成績單和結果表格中為多重評量嘗試新增註解。

*預設值：`false`*


### `gradebook_number_decimals`

**小數位數**

允許設定分數允許的小數位數。

*預設值：`0`*

### `gradebook_pdf_export_settings`

**成績單 PDF 匯出選項**

根據提供的設定（`hide_score_weight`、`hide_feedback_textarea` 等）變更學習者的 PDF 匯出。

### `gradebook_report_score_style`

**成績單報告分數樣式**

在平面檢視中新增成績單分數樣式設定。請參閱 api.lib.php 以查找選項：例如 SCORE_DIV = 1、SCORE_PERCENT = 2 等。

*預設值：`1`*


### `gradebook_score_display_colorsplit`

**閾值**

分數低於此閾值（%）時，將以紅色顯示。

*預設值：`50`*


### `gradebook_score_display_custom`

**能力等級標籤**

勾選此方塊以啟用能力等級標籤。

*預設值：`false`*


### `gradebook_score_display_custom_standalone`

**成績單獨立欄位中的自訂分數顯示**

當使用自訂分數顯示時，在成績單平面檢視中以獨立欄位顯示自訂能力等級值。

*預設值：`false`*


### `gradebook_score_display_upperlimit`

**顯示分數上限**

勾選此方塊以顯示分數上限。

*預設值：`false`*


### `gradebook_use_apcu_cache`

**使用 APCu 快取加速成績單**

使用 Doctrine APCu 快取改善渲染成績單學生報告的速度。APCu 是一個可選但建議的 PHP 延伸模組。

*預設值：`true`*


### `gradebook_use_exercise_score_settings_in_categories`

**對類別分數使用測驗分數顯示設定**

將測驗分數顯示設定（百分比對點數）套用至成績單中的類別分數。

*預設值：`true`*


### `gradebook_use_exercise_score_settings_in_total`

**在成績單中使用全域分數顯示設定**

將全域測驗分數顯示設定套用至成績單中的總分計算。

*預設值：`false`*


### `hide_gradebook_percentage_user_result`

**隱藏成績單最佳/平均結果中的百分比**

移除顯示給學習者的成績單最佳/平均分數結果中的百分比顯示。

*預設值：`true`*


### `my_display_coloring`

**成績單中分數的顏色顯示**

啟用顏色編碼以提升成績單中分數的可見度。

*預設值：`false`*


### `student_publication_to_take_in_gradebook`

**計入成績單的作業**

在作業工具中，學生可以上傳多個檔案。如果單一作業有多個檔案，成績單排名時應考慮哪一個？這取決於您的教學方法。使用 `first` 強調注重細節（例如準時提交和優先處理正確作業）。使用 `last` 強調協作與適應性工作。

*預設值：`first`*


### `teachers_can_change_grade_model_settings`

**教師可變更成績單模型設定**

編輯成績單時。

*預設值：`true`*


### `teachers_can_change_score_settings`

**教師可變更成績單分數設定**

編輯成績單設定時。

*預設值：`true`*
