# 練習（測驗）設定

**練習（測驗）** 工具的預設值與行為——題目顯示、計分、作答次數等。

可於 **管理 > 組態設定 > 練習（測驗）** 存取這些設定。此類別包含 **64 項設定**，以下列出平台設定 fixtures（`SettingsCurrentFixtures.php`）中隨附的標題與說明。

> 程式碼中的變數名稱以等寬字體顯示。透過 API 撰寫指令碼，或需以編輯 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 的方式在全域層級變更這些設定時，請使用該名稱。

## 設定

### `add_exercise_best_attempt_in_report`

**啟用最佳分數作答顯示**

提供課程與測驗 ID 清單，使報表中顯示任何學習者的最佳分數作答。

### `allow_coach_feedback_exercises`

**允許導師在批閱練習時留言**

允許導師在批閱練習時編輯回饋

*預設值：`true`*

### `allow_edit_exercise_in_lp`

**允許教師編輯學習路徑中的測驗**

預設情況下，Chamilo 會阻止您編輯已納入學習路徑的測驗。這是為了避免變更導致學習者（過去與未來）在學習路徑的成績及／或進度上受到不同影響。此選項允許教師略過此限制。


### `allow_exercise_categories`

**啟用測驗類別**

測驗類別預設未啟用，因為會增加複雜度。啟用此功能後，所有與測驗類別相關的管理圖示才會顯示。

*預設值：`false`*

### `allow_mandatory_question_in_category`

**啟用必答題選取**

在使用隨機類別時，允許於測驗中選取必答題。

*預設值：`false`*

### `allow_notification_setting_per_exercise`

**測驗層級的測驗通知設定**

允許在測驗層級（而非課程層級）設定測驗繳交通知。若未在測驗層級定義，則回退至課程層級設定。

*預設值：`false`*

### `allow_quick_question_description_popup`

**快速將圖片加入題目**

在測驗題目清單中額外顯示圖示，以便將圖片加入題目說明。當題幹在標題中、說明僅包含圖片時，可大幅加快題目編輯。

*預設值：`false`*

### `allow_quiz_question_feedback`

**答錯時加入題目回饋**

預設情況下，Chamilo 允許您為題目中的每個答案顯示回饋。啟用此選項後，會額外建立欄位，為整道題目提供預先定義的回饋。此回饋僅在使用者答錯時顯示。

*預設值：`false`*

### `allow_quiz_results_page_config`

**啟用測驗結果頁面組態**

定義要套用至所有測驗結果頁面的設定陣列。設定可為 ‘hide_question_score’、‘hide_expected_answer’、‘hide_category_table’、‘hide_correct_answered_questions’、‘hide_total_score’，未來可能還有更多。請在程式碼中搜尋 ‘getPageConfigurationAttribute’ 以查看目前使用的項目。

*預設值：`false`*

### `allow_quiz_show_previous_button_setting`

**在測驗中顯示「上一題」按鈕以瀏覽題目**

設為 false 可在作答測驗題目時停用「上一題」按鈕，從而強制使用者只能向前作答。

*預設值：`false`*

### `allow_teacher_comment_audio`

**對已繳答案提供音訊回饋**

允許教師透過音訊（文字以外的替代方式）對測驗中的每一題向使用者提供回饋。

*預設值：`true`*

### `allow_time_per_question`

**啟用測驗中每題限時**

預設情況下，僅能限制整份測驗的時間。改為每題限時可增加一層彈性，您也可以（謹慎地）兩者併用。

*預設值：`false`*

### `block_category_questions`

**鎖定測驗中先前類別的題目**

使用此選項時，測驗組態中會出現額外選項。當測驗含有多個題目類別並要求依類別分配時，此選項允許使用者依類別瀏覽題目。某一類別完成後，（他／她）會進入下一類別，且無法返回上一類別。

*預設值：`false`*

### `block_quiz_mail_notification_general_coach`

**阻擋將測驗通知傳送給總導師**

學習者完成測驗時，通常會向導師（含工作階段總導師）傳送通知。啟用此選項可將總導師排除在這些通知之外。

*預設值：`false`*

### `configure_exercise_visibility_in_course`

**啟用以在基礎課程層級略過「工作階段中測驗不可見」的設定**

啟用後，可在基礎課程中設定工作階段內測驗的不可見性，以略過全域設定。若未設定，則使用全域參數。

*預設值：`false`*

### `disable_clean_exercise_results_for_teachers`

**停用教師的「清除結果」功能**

停用從測驗清單刪除測驗結果的選項。當較不謹慎的教師管理課程時，常使用此設定以避免嚴重錯誤。

*預設值：`true`*

### `email_alert_manager_on_new_quiz`

**新測驗的預設電子郵件警示設定**

是否要在學生作答測驗時，以電子郵件通知課程管理者（教師）。此為所有新課程的預設值，但每位教師仍可在自己的課程中變更此設定。

*預設值：`true`*

### `enable_quiz_scenario`

**啟用測驗情境**

由此您將能建立會依使用者作答而提出不同題目的練習。

*預設值：`true`*

### `exercise_additional_teacher_modify_actions`

**測驗清單中教師的額外連結**

設定回呼元素，以便在測驗清單右側為教師產生新的動作圖示，格式為陣列，例如 ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']]

### `exercise_attempts_report_show_username`

**在測驗結果頁顯示使用者名稱**

在測驗結果頁顯示使用者名稱（取代或連同使用者資訊一併顯示）。

*預設值：`false`*

### `exercise_category_report_user_extra_fields`

**在測驗類別報表中加入使用者額外欄位**

定義一個陣列，列出要加入報表的使用者額外欄位。

### `exercise_category_round_score_in_export`

**匯出測驗時將分數四捨五入**

啟用後，匯出練習報表時，測驗分數會四捨五入至最接近的整數。

*預設值：`false`*

### `exercise_embeddable_extra_types`

**可嵌入的題型**

預設情況下，僅在判斷測驗是否可嵌入影片時考慮單選與多選題。透過此選項，您可決定開放更多題型。請注意，並非所有題型都能妥善配合影片所分配的空間。題型可在程式碼 question.class.php 中取得。

### `exercise_hide_ip`

**從測驗報表隱藏使用者 IP**

預設會顯示使用者資訊及其 IP 位址，但這可能被視為個人資料，因此此選項可讓您從所有測驗報表中移除此資訊。

*預設值：`false`*

### `exercise_hide_label`

**在測驗結果中隱藏題目緞帶（正確／錯誤）**

在測驗結果中，預設會出現緞帶以標示答案正確或錯誤。啟用此選項可全域移除該緞帶。

*預設值：`false`*

### `exercise_invisible_in_session`

**工作階段中測驗不可見**

若測驗在基礎課程中可見，則在工作階段中會顯示為不可見。若測驗在基礎課程中不可見，則不會出現在工作階段中。

*預設值：`false`*

### `exercise_max_editors_in_page`

**練習結果畫面中的編輯器數量上限**

由於練習中可能出現大量題目，允許教師為每則答案加上評語的批改畫面載入可能非常緩慢。將此數字設為 5，可要求平台在畫面上僅對一定數量的答案顯示 WYSIWYG 編輯器。這會大幅加快批改頁面的載入時間，但會移除 WYSIWYG 編輯器，僅留下純文字編輯器。

*預設值：`0`*


### `exercise_max_score`

**練習的最高分數**

為平台上所有練習定義最高分數（通常為 10、20 或 100）。這將決定最終結果如何向使用者與教師顯示。

*預設值：`20`*


### `exercise_min_score`

**練習的最低分數**

為平台上所有練習定義最低分數（通常為 0）。這將決定最終結果如何向使用者與教師顯示。

*預設值：`0`*


### `exercise_result_end_text_html_strict_filtering`

**略過測驗結束訊息中的 HTML 過濾**

將測驗結束時的訊息視為一律安全。移除過濾器後即可在該處使用 JavaScript。

*預設值：`false`*


### `exercise_score_format`

**測驗分數格式**

在各種報表中顯示使用者分數時，可從下列形式擇一：1 = SCORE_AVERAGE (5 / 10)；2 = SCORE_PERCENT (50%)；3 = SCORE_DIV_PERCENT (5 / 10 (50%))。請使用您要採用之形式的數字 ID。

*預設值：`0`*

### `exercises_disable_new_attempts`

**停用新的測驗作答**

全域停用新的測驗作答。通常在測驗整體發生問題、且您希望有時間分析而又不封鎖整個平台時使用。

*預設值：`false`*

### `hide_free_question_score`

**隱藏開放題的分數**

隱藏開放題（包含音訊與註解）具有分數的事實，於所有學習者可見的報表中隱藏分數顯示。

*預設值：`false`*


### `hide_user_info_in_quiz_result`

**在測驗結果頁隱藏使用者資訊**

預設的測驗結果頁會顯示使用者資料卡（照片、姓名等），在某些情境下可能被視為逾越個人資料處理的界線。啟用此選項可自測驗結果中移除使用者詳細資料。

*預設值：`false`*


### `limit_exercise_teacher_access`

**限制教師對測驗的權限**

啟用後，教師無法刪除測驗或題目、變更測驗可見性、下載為 QTI、清除結果等。

*預設值：`false`*


### `my_courses_show_pending_exercise_attempts`

**全域待完成測驗清單**

啟用後，向最終使用者顯示一個頁面，列出所有課程中待完成的測驗。

*預設值：`false`*


### `question_exercise_html_strict_filtering`

**略過測驗題目中的 HTML 過濾**

將測驗中的題目文字視為一律安全。移除過濾器後即可在其中使用 JavaScript。

*預設值：`false`*


### `question_pagination_length`

**教師端題目分頁長度**

啟用教師端題目分頁選項時，每一頁要顯示的題目數量。

*預設值：`20`*


### `quiz_answer_extra_recording`

**啟用額外測驗作答記錄**

啟用將所有作答（即使是暫時性的）記錄至 track_e_attempt_recording 資料表。此功能為實驗性質，在嘗試為測驗評分時可能於報表頁面造成問題。

*預設值：`false`*


### `quiz_check_all_answers_before_end_test`

**提交測驗前檢查所有作答**

提交測驗前顯示彈出視窗，列出已作答／未作答的題目。

*預設值：`false`*


### `quiz_check_button_enable`

**測驗前加入作答儲存流程檢查**

在進入測驗前提供題目儲存流程的模擬，以確認使用者皆已準備就緒。這有助於及早偵測部分連線問題，並減少使用者體驗上的摩擦。

*預設值：`false`*


### `quiz_confirm_saved_answers`

**加入作答數量確認核取方塊**

此選項會在每份測驗結尾加入核取方塊，請使用者確認已儲存的作答數量。這可為關鍵測驗提供更佳的稽核資料。

*預設值：`false`*


### `quiz_discard_orphan_in_course_export`

**課程匯出時捨棄孤立題目**

匯出課程時，不匯出未屬於任何測驗的題目。

*預設值：`false`*


### `quiz_generate_certificate_ending`

**測驗結束時產生證書**

結束小考時產生證書。該小考必須已連結至成績簿工具，並已設定及格百分比。

*預設值：`false`*


### `quiz_hide_attempts_table_on_start_page`

**在測驗開始頁隱藏測驗嘗試表格**

在測驗開始頁隱藏顯示所有先前嘗試的表格。

*預設值：`false`*


### `quiz_hide_question_number`

**隱藏題號**

進行測驗時隱藏題目遞增編號。

*預設值：`false`*


### `quiz_image_zoom`

**啟用測驗圖片縮放**

啟用此功能以允許使用者縮放測驗中使用的圖片。

### `quiz_keep_alive_ping_interval`

**在測驗中保持工作階段作用中**

透過每隔 x 秒向伺服器維持定期 ping 訊號以保持工作階段作用中，間隔於此處定義。建議每 300 秒一次。

*預設值：`0`*


### `quiz_open_question_decimal_score`

**開放題型使用小數分數**

允許教師以小數分數評分開放題、口語表達與註解題型。

*預設值：`false`*


### `quiz_prevent_copy_paste`

**在測驗中封鎖複製貼上**

在練習中封鎖複製／貼上／儲存／列印按鍵以及滑鼠右鍵。

*預設值：`false`*

### `quiz_question_category_destinations` **v3**

**依類別目的地啟用漸進式適性測驗**

啟用漸進式適性測驗，各題目類別可依學習者分數將其重新導向至另一類別。

*預設值：`true`*


### `quiz_question_delete_automatically_when_deleting_exercise`

**刪除測驗時自動刪除題目**

預設行為是當唯一使用這些題目的測驗被刪除時，將題目設為孤立。啟用此選項後，會確保原本會變成孤立的所有題目一併被刪除。

*預設值：`false`*


### `quiz_results_answers_report`

**顯示下載測驗結果的連結**

在測驗結果頁顯示可將結果下載為檔案的連結。

*預設值：`false`*


### `quiz_show_description_on_results_page`

**一律在結果頁顯示測驗說明**

啟用後，測驗完成後結果頁一律顯示測驗說明。

*預設值：`false`*

### `score_grade_model`

**成績等級模型**

定義分數區間與顏色的陣列，以便依此模型顯示報表。這可讓您以顏色而非數值成績來呈現。

### `send_score_in_exam_notification_mail_to_manager`

**在測驗繳交通知郵件中加入成績**

在學習者繳交測驗後寄給教師的電子郵件通知中，加入該學習者的成績。

*預設：`false`*


### `show_exercise_attempts_in_all_user_sessions`

**在待處理測驗報表中顯示所有課程時段的測驗作答紀錄**

在待處理測驗報表中，顯示一般導師有權存取之所有課程時段內使用者的測驗作答紀錄。

*預設：`false`*


### `show_exercise_expected_choice`

**在測驗結果中顯示正確選項**

在測驗結果頁面上，為每一個答案顯示正確選項及狀態（正確／錯誤）（若該測驗已設定為顯示結果）。

*預設：`false`*


### `show_exercise_question_certainty_ribbon_result`

**顯示確定程度題型的分數**

預設情況下，Chamilo 不會為確定程度題型顯示分數。

*預設：`false`*


### `show_exercise_session_attempts_in_base_course`

**在基礎課程中顯示所有課程時段的測驗作答紀錄**

在基礎課程中向教師顯示所有課程時段內使用者的測驗作答紀錄。

*預設：`false`*


### `show_official_code_exercise_result_list`

**在測驗結果中顯示正式代碼**

是否在測驗結果報表中顯示學生的正式代碼

*預設：`false`*

### `show_question_id`

**在測驗中顯示題目 ID**

顯示題目的內部 ID，讓使用者能針對特定題目記錄問題並更有效率地回報。

*預設：`false`*


### `show_question_pagination`

**為教師顯示題目分頁**

對於題目眾多的測驗，若題目數量高於此設定值則使用分頁。設為 0 可停用分頁。

*預設：`100`*


### `tracking_my_progress_show_deleted_exercises`

**在「我的進度」中顯示已刪除的測驗**

啟用此選項後，可在「我的進度」頁面上顯示您曾作答之所有測驗的結果，即使該測驗已被刪除。

*預設：`false`*