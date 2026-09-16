# コースカタログ設定

コースカタログ（利用者が閲覧し、自己登録できる公開リスト）の動作です。

これらの設定には **管理 > 設定 > コースカタログ** からアクセスします。このカテゴリには **13 件の設定** があり、以下にプラットフォームの設定フィクスチャ（`SettingsCurrentFixtures.php`）に同梱されているタイトルとコメントとともに示します。

> コード上の変数名は等幅フォントで示しています。API 経由でスクリプトする場合や、[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) を編集してグローバルに変更する場合に使用してください。

## 設定

### `allow_session_auto_subscription`

**セッション自動登録**

利用者のセッションへの自動登録を有効にします。

*デフォルト: `false`*

### `allow_students_to_browse_courses`

**学生による閲覧を許可**

学生がコースカタログを閲覧・フィルタできるようにします。

*デフォルト: `true`*

### `course_catalog_display_in_home`

**ホームページにカタログを表示**

プラットフォームのホームページにコースカタログブロックを表示します。

*デフォルト: `false`*

### `course_catalog_hide_private`

**非公開コースを非表示**

カタログ表示から非公開コースを除外します。

*デフォルト: `true`*

### `course_catalog_published`

**コースカタログを公開**

ログイン不要で、匿名利用者（一般公開）がコースカタログを利用できるようにします。

*デフォルト: `false`*

### `course_catalog_settings`

**コースカタログ設定**

コースカタログ用の JSON 設定：リンク設定、フィルタ、並べ替えオプションなど。

### `course_subscription_in_user_s_session`

**セッション画面からの登録**

利用者が自身のセッションページから直接コースに登録できるようにします。

*デフォルト: `false`*

### `hide_public_link`

**公開リンクを非表示**

コースカードから公開 URL リンクを削除します。

*デフォルト: `false`*

### `only_show_course_from_selected_category`

**コースカタログでは一致するカテゴリのみ表示**

空でない場合、指定したカテゴリのコースのみがコースカタログに表示されます。

### `only_show_selected_courses`

**選択したコースのみ**

カタログには手動で選択したコースのみを表示します。

*デフォルト: `false`*

### `session_catalog_settings`

**セッションカタログ設定**

セッションカタログ用の JSON 設定：フィルタと表示オプション。

### `show_courses_descriptions_in_catalog`

**コース説明を表示**

カタログ一覧内にコース説明を表示します。

*デフォルト: `false`*

### `show_courses_sessions`

**コースとセッションを表示**

カタログの結果にコースとセッションの両方を含めます。

*デフォルト: `0`*