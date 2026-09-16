# 成績冊（評量）設定

套用於整個 **成績冊（評量）** 工具的預設值 — 分數顯示、小數精度、證書分數門檻與彙總方式。

可於 **管理 > 組態設定 > 成績冊（評量）** 存取這些設定。此類別包含 **34 項設定**，以下列出平台設定 fixtures（`SettingsCurrentFixtures.php`）中隨附的標題與說明。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫指令碼，或需以編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 的方式在全域層級變更這些設定時，請使用該名稱。

## 設定

### `allow_gradebook_comments`

**成績冊評語**

啟用成績冊評語，讓教師可針對學習者在本課程中的整體表現新增評語。該評語會出現在學習者的 PDF 匯出中。

*預設值：`false`*


### `allow_gradebook_stats`

**快取成績冊結果**

將部分大型平均計算放入連結與評量的快取欄位，以（大幅）提升速度。潛在負面影響是重新整理成績冊結果表格可能需要一些時間。

*預設值：`false`*

### `gradebook_badge_sidebar`

**成績冊徽章側邊欄**

在側邊選單中產生一個區塊，可顯示若干待核准的徽章。需在此以（數字）ID 列出成績冊。

### `gradebook_default_grade_model_id`

**預設成績模式**

建立課程時將預設選取此值

### `gradebook_default_weight`

**成績冊預設權重**

此權重將預設用於所有課程

*預設值：`100`*

### `gradebook_dependency`

**成績冊間相依性**

啟用成績冊相依機制，讓使用者知道須先完成哪些其他項目才能完成該成績冊。

*預設值：`false`*


### `gradebook_dependency_mandatory_courses`

**成績冊相依性的必修課程**

使用成績冊間相依性時，可選擇一份必修課程清單，在核准任何具相依性的成績冊之前必須先完成這些課程。

### `gradebook_detailed_admin_view`

**在成績冊中顯示額外欄位**

在成績冊的學生檢視中顯示額外欄位，包含全體學生的最佳分數、檢視報表之學生的相對名次，以及全體學生的平均分數。

*預設值：`false`*


### `gradebook_display_extra_stats`

**成績冊額外統計**

在成績冊主報表中新增額外欄位（1 = 排名，2 = 最佳分數，3 = 平均）。

### `gradebook_enable`

**評量工具啟用**

評量工具可將課堂與線上活動評量合併為表現報表，以評估組織中的能力。是否要啟用？

*預設值：`true`*


### `gradebook_enable_grade_model`

**啟用成績冊模式**

依成績冊模式，在課程內自動建立成績冊類別。

*預設值：`false`*

### `gradebook_enable_subcategory_skills_independant_assignement`

**依成績冊子類別啟用技能**

技能通常是在完成整個成績冊時賦予。啟用此選項後，可將技能附加至成績冊的子區段。

*預設值：`false`*


### `gradebook_flatview_extrafields_columns`

**成績冊平面檢視中的使用者額外欄位**

將指定欄位（'variables' 陣列）新增至成績冊的主要結果表格。

### `gradebook_hide_graph`

**隱藏成績冊圖表**

若入口網站資源有限，減少產生可能含數千筆結果的動態成績冊圖表是不錯的選擇。

*預設值：`false`*


### `gradebook_hide_link_to_item_for_student`

**對學習者隱藏成績冊項目連結**

移除項目上的連結，避免學習者從成績冊點選項目。

*預設值：`false`*


### `gradebook_hide_pdf_report_button`

**隱藏成績冊「下載 PDF 報表」按鈕**

從學習者的成績冊檢視中移除 PDF 匯出按鈕。

*預設值：`false`*


### `gradebook_hide_table`

**對學習者隱藏成績冊表格**

隱藏結果表格以縮短成績冊載入時間（但仍可存取證書、技能等）。

*預設值：`false`*

### `gradebook_locking_enabled`

**啟用教師鎖定評量**

啟用後，此選項將允許對應課程的教師鎖定任何評量。這會進而防止教師在評量所使用的資源（測驗、學習路徑、作業等）內修改成績。唯一有權限解鎖已鎖定評量的角色是管理員。系統會告知教師此可能性。成績簿的鎖定與解鎖會記錄在系統的重要活動報告中

*預設值：`false`*

### `gradebook_multiple_evaluation_attempts`

**允許成績簿中多次評量嘗試**

允許在成績簿與成績表中為多次評量嘗試新增註解。

*預設值：`false`*


### `gradebook_number_decimals`

**小數位數**

允許您設定成績中允許的小數位數

*預設值：`0`*

### `gradebook_pdf_export_settings`

**成績簿 PDF 匯出選項**

依據所提供的設定（'hide_score_weight'、'hide_feedback_textarea' 等）變更學習者的 PDF 匯出

### `gradebook_report_score_style`

**成績簿報告成績樣式**

在平面檢視中新增成績簿成績樣式設定。請參閱 api.lib.php 以找出選項：例如 SCORE_DIV = 1、SCORE_PERCENT = 2 等

*預設值：`1`*


### `gradebook_score_display_colorsplit`

**門檻**

成績低於此門檻（以 % 計）時將顯示為紅色

*預設值：`50`*


### `gradebook_score_display_custom`

**能力等級標示**

勾選此方塊以啟用能力等級標示

*預設值：`false`*


### `gradebook_score_display_custom_standalone`

**成績簿獨立欄位中的自訂成績顯示**

使用自訂成績顯示時，在成績簿平面檢視的獨立欄位中顯示自訂能力等級值。

*預設值：`false`*


### `gradebook_score_display_upperlimit`

**顯示成績上限**

勾選此方塊以顯示成績的上限

*預設值：`false`*


### `gradebook_use_apcu_cache`

**使用 APCu 快取以加速成績簿**

使用 Doctrine APCU 快取以提升呈現成績簿學生報告時的速度。APCu 為選用但建議安裝的 PHP 擴充套件。

*預設值：`true`*


### `gradebook_use_exercise_score_settings_in_categories`

**使用測驗設定顯示成績**

將測驗成績顯示設定（百分比與分數）套用至成績簿中的類別成績。

*預設值：`true`*


### `gradebook_use_exercise_score_settings_in_total`

**在成績簿中使用全域成績顯示設定**

將全域測驗成績顯示設定套用至成績簿中的總分計算。

*預設值：`false`*


### `hide_gradebook_percentage_user_result`

**在最佳／平均成績簿結果中隱藏百分比**

從顯示給學習者的成績簿最佳／平均成績結果中移除百分比顯示。

*預設值：`true`*


### `my_display_coloring`

**在成績簿中為成績顯示顏色**

啟用顏色編碼，以提升成績簿中成績的可見度。

*預設值：`false`*


### `student_publication_to_take_in_gradebook`

**納入成績簿的作業**

在作業工具中，學生可以上傳一個以上的檔案。若單一作業有一個以上的檔案，在成績簿排名時應採用哪一個？這取決於您的教學方法。使用 'first' 以強調對細節的重視（例如準時繳交並先繳交正確的作業）。使用 'last' 以凸顯協作與調適性的作業。

*預設值：`first`*


### `teachers_can_change_grade_model_settings`

**教師可變更成績簿模型設定**

編輯成績簿時

*預設值：`true`*


### `teachers_can_change_score_settings`

**教師可變更成績簿成績設定**

編輯成績簿設定時

*預設值：`true`*