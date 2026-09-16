# 測驗（考試）設定

**測驗（考試）** 工具的預設值與行為 — 題目顯示、計分、嘗試次數等。

在 **管理 > 設定 > 測驗（考試）** 下存取這些設定。此類別包含 **63 個設定**，以下列出平台設定預設資料 (`SettingsCurrentFixtures.php`) 中提供的標題與註解。

> 程式碼中的變數名稱以等寬字體顯示。使用 API 進行腳本編寫或需要透過編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全域層級變更這些設定時，請使用它。

## 設定

### `add_exercise_best_attempt_in_report`

**啟用顯示最佳分數嘗試**

提供課程與測驗 ID 清單，在報告中為任何學習者顯示最佳分數嘗試。

### `allow_coach_feedback_exercises`

**允許教師在測驗檢閱中評論**

允許教師在測驗檢閱期間編輯回饋

*預設值：`true`*

### `allow_edit_exercise_in_lp`

**允許教師編輯學習路徑中的測驗**

預設情況下，Chamilo 會防止您編輯包含在學習路徑中的測驗。這是為了避免變更對學習者（過去與未來）在學習路徑的結果和/或進度產生不同影響。此選項允許教師繞過此限制。

### `allow_exercise_categories`

**啟用測驗類別**

測驗類別預設未啟用，因為它們增加了複雜度。啟用此功能以顯示所有相關的測驗類別管理圖示。

*預設值：`false`*

### `allow_mandatory_question_in_category`

**啟用選擇必答題目**

在測驗中使用隨機類別時，啟用選擇必答題目。

*預設值：`false`*

### `allow_notification_setting_per_exercise`

**測驗層級的通知設定**

啟用在測驗層級而非課程層級設定測驗提交通知。若未在測驗層級定義，則回退至課程層級設定。

*預設值：`false`*

### `allow_quick_question_description_popup`

**快速新增題目圖片**

在測驗題目清單中啟用額外圖示，以將圖片新增為題目描述。這大幅加速題目編輯，當題目位於標題且描述僅包含圖片時特別有效。

*預設值：`false`*

### `allow_quiz_question_feedback`

**錯誤答案時新增題目回饋**

預設情況下，Chamilo 允許您在題目中顯示每個答案的回饋。啟用此選項會建立額外欄位，為整個題目提供預定義回饋。此回饋僅在使用者答錯時顯示。

*預設值：`false`*

### `allow_quiz_results_page_config`

**啟用測驗結果頁面設定**

定義您要套用至所有測驗結果頁面的設定陣列。設定可包括 ‘hide_question_score’、‘hide_expected_answer’、‘hide_category_table’、‘hide_correct_answered_questions’、‘hide_total_score’，未來可能新增更多。在程式碼中搜尋 ‘getPageConfigurationAttribute’ 以查看目前使用的設定。

*預設值：`false`*

### `allow_quiz_show_previous_button_setting`

**在測驗中顯示「上一個」按鈕以瀏覽題目**

將此設定為 false 以停用測驗中回答題目時的「上一個」按鈕，從而強制使用者始終向前移動。

*預設值：`false`*

### `allow_teacher_comment_audio`

**對提交答案提供音訊回饋**

允許教師透過音訊（替代文字）為測驗中每個題目提供使用者回饋。

*預設值：`true`*

### `allow_time_per_question`

**在測驗中啟用每題時間限制**

預設情況下，只能限制每個測驗的時間。限制每題時間會增加額外可能性，且您可以（小心地）結合兩者。

*預設值：`false`*

### `block_category_questions`

**鎖定測驗中先前類別的題目**

使用此選項時，測驗設定中會出現額外選項。當測驗使用多個題目類別並要求依類別分配時，此功能允許使用者依類別瀏覽題目。完成一個類別後，使用者將移至下一個類別，且無法返回先前類別。

*預設值：`false`*

### `block_quiz_mail_notification_general_coach`

**停用向一般教師發送測驗通知**

學習者完成測驗通常會向教師發送通知，包括一般課程教師。啟用此選項以從這些通知中排除一般教師。

*預設值：`false`*

---
### `configure_exercise_visibility_in_course`

**啟用以繞過基底課程層級的課程中練習不可見於工作區的設定**

啟用基底課程中工作區練習不可見的設定，以繞過全域設定。若未設定，則使用全域參數。

*預設值：`false`*

### `disable_clean_exercise_results_for_teachers`

**停用教師的「清除結果」功能**

停用從測驗清單中刪除測驗結果的選項。此設定常用於管理課程時較不謹慎的教師，以避免嚴重錯誤。

*預設值：`true`*

### `email_alert_manager_on_new_quiz`

**新測驗的預設電子郵件警示設定**

決定是否在學生回答測驗時，以電子郵件通知課程管理員（教師）。這是提供給所有新課程的預設值，但每位教師仍可在自己的課程中變更此設定。

*預設值：`true`*

### `enable_quiz_scenario`

**啟用測驗情境**

從此處您可以建立根據使用者答案提出不同問題的練習。

*預設值：`true`*

### `exercise_additional_teacher_modify_actions`

**測驗清單中教師的額外連結**

設定回呼元素，以在測驗清單右側為教師產生新的動作圖示，以陣列形式，例如 ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']]。

### `exercise_attempts_report_show_username`

**在測驗結果頁面顯示使用者名稱**

在測驗結果頁面顯示使用者名稱（取代或連同使用者資訊）。

*預設值：`false`*

### `exercise_category_report_user_extra_fields`

**在練習類別報告中新增使用者額外欄位**

定義一個陣列，列出要新增至報告的使用者額外欄位清單。

### `exercise_category_round_score_in_export`

**在測驗匯出中四捨五入分數**

啟用時，匯出練習報告時會將測驗分數四捨五入至最近整數。

*預設值：`false`*

### `exercise_embeddable_extra_types`

**可嵌入題目類型**

預設情況下，僅單選題和多選題在決定測驗是否可嵌入影片時被考慮。透過此選項，您可以決定更多題目類型可用。請注意，並非所有題目類型都適合影片分配的空間。題目類型可在 question.class.php 的程式碼中取得。

### `exercise_hide_ip`

**在測驗報告中隱藏使用者 IP**

預設顯示使用者資訊及其 IP 位址，但這可能被視為個人資料，因此此選項允許您從所有測驗報告中移除此資訊。

*預設值：`false`*

### `exercise_hide_label`

**在測驗結果中隱藏題目標籤（正確/錯誤）**

在測驗結果中，預設會顯示標籤以指示答案是否正確。啟用此選項可全域移除標籤。

*預設值：`false`*

### `exercise_invisible_in_session`

**練習在工作區中不可見**

若練習在基底課程中為可見，則在工作區中顯示為不可見。若練習在基底課程中為不可見，則不在工作區中顯示。

*預設值：`false`*

### `exercise_max_editors_in_page`

**練習結果畫面中的最大編輯器數量**

由於練習可能包含大量題目，允許教師為每個答案新增註解的批改畫面可能載入緩慢。將此數字設為 5，可要求平台僅在畫面上顯示最多一定數量的 WYSIWYG 編輯器答案。這將大幅加速批改頁面載入時間，但會移除 WYSIWYG 編輯器並僅保留純文字編輯器。

*預設值：`0`*


### `exercise_max_score`

**練習的最大分數**

為平台上所有練習定義最大分數（通常為 10、20 或 100）。這將定義最終結果如何顯示給使用者和教師。

*預設值：`20`*


### `exercise_min_score`

**練習的最小分數**

為平台上所有練習定義最小分數（通常為 0）。這將定義最終結果如何顯示給使用者和教師。

*預設值：`0`*


### `exercise_result_end_text_html_strict_filtering`

**繞過測驗結束訊息中的 HTML 篩選**

視測驗結束訊息始終為安全的。移除篩選可讓您在其中使用 JavaScript。

*預設值：`false`*


### `exercise_score_format`

**測驗分數格式**

在各種報告中選擇使用者分數顯示格式：1 = SCORE_AVERAGE (5 / 10)；2 = SCORE_PERCENT (50%)；3 = SCORE_DIV_PERCENT (5 / 10 (50%))。使用您想要格式的數字 ID。

*預設值：`0`*

### `exercises_disable_new_attempts`

**停用新測驗嘗試**

全域停用新測驗嘗試。通常在測驗整體出現問題時使用，讓您有時間分析而不需封鎖整個平台。

*預設值：`false`*

---
### `hide_free_question_score`

**隱藏開放題的分數**

隱藏開放題（包括音頻和註解）的分數事實，透過在所有面向學習者的報告中隱藏分數顯示。

*預設：`false`*


### `hide_user_info_in_quiz_result`

**在測驗結果頁面隱藏使用者資訊**

預設的測驗結果頁面會顯示使用者資料表（照片、姓名等），在某些情境下，這可能被視為個人資料處理的極限。啟用此選項可從測驗結果中移除使用者詳細資訊。

*預設：`false`*


### `limit_exercise_teacher_access`

**限制教師對測驗的權限**

啟用時，教師無法刪除測驗或題目、變更測驗可見性、下載至 QTI、清空結果等。

*預設：`false`*


### `my_courses_show_pending_exercise_attempts`

**全域待處理測驗清單**

啟用後，向最終使用者顯示跨所有課程的待處理測驗清單頁面。

*預設：`false`*


### `question_exercise_html_strict_filtering`

**繞過測驗題目中的 HTML 篩選**

視測驗中的題目文字為永遠安全。移除篩選可讓其使用 JavaScript。

*預設：`false`*


### `question_pagination_length`

**教師題目分頁長度**

使用教師題目分頁選項時，每頁顯示的題目數量。

*預設：`20`*


### `quiz_answer_extra_recording`

**啟用額外測驗答案記錄**

啟用在 `track_e_attempt_recording` 資料表中記錄所有答案（即使是暫時的）。此功能為實驗性，可能在嘗試評分測驗時於報告頁面造成問題。

*預設：`false`*


### `quiz_check_all_answers_before_end_test`

**提交測驗前檢查所有答案**

在提交測驗前顯示彈出視窗，列出已回答/未回答的題目。

*預設：`false`*


### `quiz_check_button_enable`

**在測驗前新增答案儲存程序檢查**

透過在進入測驗前提供題目儲存程序的模擬，確保使用者已準備好開始測驗。這可及早偵測某些連線問題並減少使用者體驗摩擦。

*預設：`false`*


### `quiz_confirm_saved_answers`

**新增答案數量確認核取方塊**

此選項在每個測驗結束時新增一個核取方塊，要求使用者確認已儲存的答案數量。這可為關鍵測驗提供更好的稽核資料。

*預設：`false`*


### `quiz_discard_orphan_in_course_export`

**在課程匯出時捨棄孤立題目**

匯出課程時，不匯出不屬於任何測驗的題目。

*預設：`false`*


### `quiz_generate_certificate_ending`

**測驗結束時產生證書**

在結束測驗時產生證書。測驗需連結至成績簿工具並設定及格百分比。

*預設：`false`*


### `quiz_hide_attempts_table_on_start_page`

**在測驗起始頁面隱藏嘗試表格**

隱藏測驗起始頁面顯示所有先前嘗試的表格。

*預設：`false`*


### `quiz_hide_question_number`

**隱藏題目編號**

在進行測驗時隱藏題目的遞增編號。

*預設：`false`*


### `quiz_image_zoom`

**啟用測驗圖片縮放**

啟用此功能，讓使用者可縮放測驗中使用的圖片。

### `quiz_keep_alive_ping_interval`

**在測驗中保持工作階段活躍**

透過每 x 秒向伺服器發送定期 ping 訊號來保持工作階段活躍，在此定義。我們建議每 300 秒一次。

*預設：`0`*


### `quiz_open_question_decimal_score`

**開放題類型的小數分數**

允許教師以小數分數評分開放題、口語表達和註解題類型。

*預設：`false`*


### `quiz_prevent_copy_paste`

**在測驗中封鎖複製貼上**

在測驗中封鎖複製/貼上/儲存/列印按鍵及右鍵點擊。

*預設：`false`*


### `quiz_question_delete_automatically_when_deleting_exercise`

**刪除測驗時自動刪除題目**

預設行為是在刪除唯一使用這些題目的測驗時，使題目成為孤立。啟用此選項可確保所有原本會成為孤立的題目一併刪除。

*預設：`false`*


### `quiz_results_answers_report`

**顯示下載測驗結果連結**

在測驗結果頁面顯示下載結果為檔案的連結。

*預設：`false`*


### `quiz_show_description_on_results_page`

**在結果頁面始終顯示測驗描述**

啟用時，測驗完成後的結果頁面始終顯示測驗描述。

*預設：`false`*


### `score_grade_model`

**分數等級模型**

定義分數範圍和顏色的陣列，用以使用此模型顯示報告。這可讓您顯示顏色而非數值等級。

---
### `send_score_in_exam_notification_mail_to_manager`

**在測驗提交的郵件通知中新增分數**

在測驗提交後發送給教師的電子郵件通知中，加入學習者的分數。

*預設值：`false`*


### `show_exercise_attempts_in_all_user_sessions`

**在待處理測驗報告中顯示所有工作坊的測驗嘗試**

在待處理測驗報告中，顯示一般導師有權存取的所有工作坊中的使用者測驗嘗試。

*預設值：`false`*


### `show_exercise_expected_choice`

**在測驗結果中顯示預期選項**

在測驗結果頁面（如果測驗已設定顯示結果）中，顯示每個答案的預期選項以及狀態（正確/錯誤）。

*預設值：`false`*


### `show_exercise_question_certainty_ribbon_result`

**顯示確定度題目分數**

預設情況下，Chamilo 不會顯示確定度題目類型的分數。

*預設值：`false`*


### `show_exercise_session_attempts_in_base_course`

**在基礎課程中顯示所有工作坊的測驗嘗試**

向基礎課程中的教師顯示所有工作坊中，使用者的測驗嘗試。

*預設值：`false`*


### `show_official_code_exercise_result_list`

**在測驗結果中顯示官方代碼**

是否在測驗結果報告中顯示學生的官方代碼

*預設值：`false`*


### `show_question_id`

**在測驗中顯示題目 ID**

顯示題目的內部 ID，讓使用者記錄特定題目的問題並更有效地回報。

*預設值：`false`*


### `show_question_pagination`

**為教師顯示題目分頁**

對於題目數量眾多的測驗，如果題目數量超過此設定值，則使用分頁。設為 0 以停用分頁。

*預設值：`100`*


### `tracking_my_progress_show_deleted_exercises`

**在「我的進度」中顯示已刪除測驗**

啟用此選項，即可在「我的進度」頁面顯示您已參與的所有測驗結果，即使是已刪除的測驗。

*預設值：`false`*
