# ラーニングパス設定

**ラーニングパス**ツールの既定値と動作 — 自動開始、既定ビュー、前提条件、SCORM の動作など。

これらの設定は **管理 > 設定 > ラーニングパス** からアクセスします。このカテゴリには **51 件の設定**があり、以下にプラットフォームの設定フィクスチャ（`SettingsCurrentFixtures.php`）に同梱されているタイトルとコメントとともに列挙します。

> コード上の変数名は等幅フォントで示しています。API 経由でスクリプトする場合や、[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) を編集してグローバルに変更する場合に使用してください。

## 設定

### `add_all_files_in_lp_export`

**ラーニングパスのエクスポート時にすべてのファイルをエクスポートする**

LP をエクスポートする際、HTML と同じパスにあるすべてのファイルとフォルダもエクスポートされます。

*既定値: `false`*


### `allow_htaccess_import_from_scorm`

**SCORM パッケージからの .htaccess を許可する**

通常、Chamilo にコンテンツをインポートする際、すべての .htaccess ファイルはフィルタされ削除されます。この機能は、SCORM パッケージに .htaccess が含まれている場合にインポートを許可します。

*既定値: `false`*


### `allow_import_scorm_package_in_course_builder`

**コースインポート内での SCORM インポート**

コースを復元する際（コースメンテナンスツールから）、SCORM パッケージのディレクトリ構造をコピーできるようにします。

*既定値: `false`*


### `allow_lp_chamilo_export`

**Chamilo バックアップ形式でラーニングパスをエクスポートする**

任意のラーニングパスを Chamilo コースバックアップ形式でエクスポートできるようにします。

*既定値: `false`*


### `allow_lp_return_link`

**ラーニングパスの戻りリンクを表示する**

このオプションを無効にすると、ラーニングパス内の「ホームページに戻る」ボタンが非表示になります

*既定値: `true`*


### `allow_lp_subscription_to_usergroups`

**クラス向けのラーニングパス登録**

グループ／クラスに対するラーニングパスおよびラーニングパスカテゴリへの登録を有効にします。

*既定値: `false`*


### `allow_session_lp_category`

**セッション内でラーニングパスカテゴリを管理できる**

[推定] セッションコース内で、学習者および講師がカテゴリ別にラーニングパスを整理・管理できるようにします。

*既定値: `false`*


### `allow_teachers_to_access_blocked_lp_by_prerequisite`

**講師はブロックされたラーニングパスにアクセスできる**

講師は、前提条件でブロックされたラーニングパスにアクセスするために、ラーニングパスを完了する必要はありません。

*既定値: `false`*


### `disable_js_in_lp_view`

**ラーニングパス表示で JS を無効にする**

ラーニングパス内の HTML ファイルを表示する際、Chamilo が通常追加する JS ファイルを無効にします。

*既定値: `false`*


### `disable_my_lps_page`

**「マイラーニングパス」ページを非表示にする**

「マイラーニングパス」ページは 1.11 で追加されました。このオプションで非表示にできます。

*既定値: `false`*

### `download_files_after_all_lp_finished`

**ラーニングパス完了後のダウンロードボタン**

すべての LP 完了後にファイルダウンロードボタンを表示します。例: ABC がコースコード、1 と 100 がドキュメント ID の場合、次のように指定します: ['courses' => ['ABC' => [1, 100]]]。

### `force_edit_exercise_in_lp`

**ラーニングパスに含まれるテストの編集**

テストがラーニングパスに含まれていても編集できるようにします。既定では、テストがラーニングパス内にある場合は編集を防止します。テストの変更が大きいと、多数の学習者間のトラッキングの一貫性に影響する可能性があるためです。

*既定値: `false`*

### `hide_accessibility_label_on_lp_item`

**ラーニングパスの要件ラベルを非表示にする**

ラーニングパス項目の前提条件ツールチップを非表示にします。主に見た目の選択です。

*既定値: `true`*

### `hide_lp_time`

**ラーニングパス記録から時間を非表示にする**

レポート全般でラーニングパスの所要時間を非表示にします。

*既定値: `false`*

### `hide_scorm_copy_link`

**SCORM コピーを非表示にする**

ラーニングパス一覧からラーニングパスコピーアイコンを非表示にします

*既定値: `false`*

### `hide_scorm_export_link`

**SCORM エクスポートを非表示にする**

ラーニングパス一覧から SCORM エクスポートアイコンを非表示にします

*既定値: `false`*

### `hide_scorm_pdf_link`

**ラーニングパス PDF エクスポートを非表示にする**

ラーニングパス一覧からラーニングパス PDF エクスポートアイコンを非表示にします

*既定値: `true`*

### `lp_allow_export_to_students`

**学習者がラーニングパスをエクスポートできる**

学習者がラーニングパスを SCORM パッケージとしてダウンロードできるようにします。

*既定値: `false`*

### `lp_enable_flow`

**ラーニングパス間を移動する**

「次の」ラーニングパスを選択できるようにし、ラーニングパス内に次へ進むボタンを表示します。

*既定値: `false`*

### `lp_fixed_encoding`

**ラーニングパスの固定エンコーディング**

インポートしたラーニングパスのテキストエンコーディング確認を省略し、リソース使用量を削減します。

*既定値: `false`*

### `lp_item_prerequisite_dates`

**日付ベースのラーニングパス項目の前提条件**

ラーニングパス項目に開始日と終了日付きの前提条件を定義するオプションを追加します。

*既定値: `false`*

### `lp_menu_location`

**ラーニングパスメニューの位置**

ラーニングパスメニューの表示側を変更するには、これを 'left' または 'right' に設定します。

*Default: `left`*

### `lp_minimum_time`

**ラーニングパス完了の最短時間**

ラーニングパスに最短時間フィールドを追加します。利用者がラーニングパス上でその時間を費やしていない場合、ラーニングパスの最後の項目を完了できません。

*Default: `false`*

### `lp_prerequisit_on_quiz_unblock_if_max_attempt_reached`

**テスト前提条件で最大受験回数に達した場合にラーニングパス項目のロックを解除する**

[inferred] 前提条件のテストで学習者が最大受験回数を使い切ったとき、後続のラーニングパス項目を自動的にロック解除します。


### `lp_prerequisite_on_quiz_unblock_if_max_attempt_reached`

**最後のテスト受験後に前提条件のロックを解除する**

他の項目の前提条件として使われているテストの受験回数をすべて使い切った後でも、利用者がラーニングパスを続行できるようにします。

*Default: `false`*

### `lp_prerequisite_use_last_attempt_only`

**ラーニングパステストの前提条件で最後の得点を使用する**

テストがラーニングパス内の項目の前提条件として使われている場合、前提条件の判定にはそのテストの最後の受験のみを使用します（既定では最良の受験を使用します）。

*Default: `false`*

### `lp_prevents_beforeunload`

**ラーニングパスで beforeunload JS イベントを防止する**

扱いの難しい JS イベントの実行を防ぐことで、ブラウザー互換性の向上に役立ちます。

*Default: `false`*

### `lp_score_as_progress_enable`

**ラーニングパスの得点を進捗として使用する**

大きな SCO が 1 つだけの SCORM コンテンツを使う場合に便利です。SCORM は進捗を通知しないため、得点を進捗として使うための工夫です。このオプションを有効にすると、ラーニングパスごとに設定できるようになります。

*Default: `false`*

### `lp_show_max_progress_instead_of_average`

**ラーニングパスのレポートで平均ではなく最大進捗を表示する**

[inferred] すべての項目の平均ではなく、項目完了の最大値に基づいてラーニングパスの進捗を計算します。

*Default: `false`*

### `lp_show_max_progress_or_average_enable_course_level_redefinition`

**コースレベルでラーニングパスの最大進捗と平均を選択する**

コースレベルで、ラーニングパスのレポートにおいて平均ではなく最良の進捗を表示する設定を再定義できるようにします。

*Default: `false`*

### `lp_show_reduced_report`

**ラーニングパス: 簡易レポートを表示する**

ラーニングパスツール内で、利用者が自分の進捗を確認するとき（統計アイコン経由）、進捗レポートの短縮（詳細の少ない）版を表示します。

*Default: `false`*

### `lp_start_and_end_date_visible_in_student_view`

**学習者にラーニングパスの利用可能期間を表示する**

日付が来るまで非表示にするのではなく、利用可能日とともにラーニングパスを学習者に表示します。

*Default: `false`*

### `lp_subscription_settings`

**ラーニングパス登録設定**

ラーニングパス登録機能の追加オプションを設定します。オプションには 'allow_add_users_to_lp' および 'allow_add_users_to_lp_category' が含まれます。

### `lp_view_accordion`

**折りたたみ可能なラーニングパス項目**

[inferred] ナビゲーションとコンテンツ整理を改善するため、ラーニングパス項目を折りたたみ可能なアコーディオン形式で表示します。

*Default: `false`*

### `lp_view_settings`

**ラーニングパス表示設定**

ラーニングパス表示の追加オプションを設定します。オプションには 'show_reporting_icon'、'hide_lp_arrow_navigation'、'show_toolbar_by_default'、'navigation_in_the_middle'、'add_extra_quit_to_home_icon' が含まれます。

### `scorm_api_extrafield_to_use_as_student_id`

**SCORM 通信で追加フィールドを student\_id として使用する**

すべての SCORM 通信で student_id として使用する追加フィールドの名前を指定します。

### `scorm_api_username_as_student_id`

**SCORM 通信でユーザー名を student\_id として使用する**

[inferred] SCORM API 通信で学習者 ID の代わりに学習者のユーザー名を学生識別子として使用します。

*Default: `false`*

### `scorm_lms_update_sco_status_all_time`

**SCO ステータスを自律的に更新する**

SCO がステータスを送信していない場合、Chamilo で観測できる内容に基づいてステータスを引き継いで更新します。

*Default: `false`*

### `scorm_upload_from_cache`

**キャッシュディレクトリから SCORM をアップロードする**

管理者が SCORM パッケージ（zip 形式）をキャッシュディレクトリにアップロードし、SCORM アップロードページでインポート元として使用できるようにします。

*Default: `false`*

### `show_hidden_exercise_added_to_lp`

**非表示でもラーニングパスのテストを表示する**

LP に追加された非表示の演習を演習一覧に表示します。セッション内で、テストがベースコースでは非表示であり、LP に含まれており、表示する設定が明示的に true になっていない場合は、非表示にします。

*Default: `true`*

### `show_invisible_exercise_in_lp_list`

**非表示でもラーニングパステスト一覧にテストを表示する**

[inferred] ラーニングパスの内容を表示するとき、利用可能なテストの一覧に非表示のテストを含めます。

*Default: `false`*

### `show_invisible_exercise_in_lp_toc`

**学習パス内で非表示テストを表示する**

テストツールで「非表示」とマークされたテストを、学習パスに含まれている場合に表示します。

*デフォルト: `false`*

### `show_invisible_lp_in_course_home`

**非表示の学習パスへのリンクをコースホームに表示する**

学習パスが非表示に設定されていても、教師／チューターがコースホームページから利用可能にした場合、このオプションにより Chamilo がコースホームページ上のリンクを隠さないようにします。

*デフォルト: `false`*

### `show_prerequisite_as_blocked`

**学習パスの前提条件**

学習パス一覧で、前提条件ルールにより他の学習パスが現在ブロックされていることを示す視覚的要素を表示します。

*デフォルト: `false`*

### `student_follow_page_add_lp_acquisition_info`

**学習者フォローアップに習得列を追加する**

学習者フォローアップページに、学習者が学習パスで習得した状態を示す列を追加します。

*デフォルト: `false`*

### `student_follow_page_add_lp_invisible_checkbox`

**学習者フォローアップページに学習パスの公開状態情報を追加する**

[推定] 学習者の進捗追跡ページに、学習パスの公開状態インジケーターを表示します。

*デフォルト: `false`*

### `student_follow_page_add_LP_subscription_info`

**学習パス一覧のロック解除情報**

学習者が当該学習パスに登録され、アクセスできる場合、学習パス一覧に「ロック解除」列を追加します。

*デフォルト: `false`*

### `student_follow_page_hide_lp_tests_average`

**学習者フォローアップの学習パス内テスト平均からパーセント記号を非表示にする**

学習者追跡の「学習パス内テストの平均」表示から、パーセントのアイコンを非表示にします。

*デフォルト: `false`*

### `student_follow_page_include_not_subscribed_lp_students`

**学習者フォローアップページに未登録の学習パスを含める**

[推定] 学習者が登録していない場合でも、進捗ページに学習パスを表示します。

*デフォルト: `false`*

### `ticket_lp_quiz_info_add`

**チケット報告に学習パスとテストの情報を追加する**

[推定] 問題追跡を改善するため、サポートチケット報告に学習パスとテストの情報を含めます。

*デフォルト: `false`*

### `validate_lp_prerequisite_from_other_session`

**他のセッションの学習パス項目ステータスを使用する**

対応する項目が別のセッションですでに完了している場合、学習パスの前提条件を完了できるようにします。

*デフォルト: `false`*