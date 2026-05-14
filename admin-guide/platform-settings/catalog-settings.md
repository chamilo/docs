# コースカタログ設定

コースカタログ（ユーザーが閲覧し自己登録できる公開リスト）の動作について。

これらの設定には、**管理者 > 設定 > コースカタログ** からアクセスできます。このカテゴリには **13の設定** が含まれており、以下にプラットフォームの設定フィクスチャ（`SettingsCurrentFixtures.php`）に含まれるタイトルとコメントを記載しています。

> コード内の変数名は等幅フォントで表示されています。APIを通じてスクリプトを作成する場合や、[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) を編集してこれらの設定をグローバルレベルで変更する際に使用してください。

## 設定

### `allow_session_auto_subscription`

**自動セッション登録**

ユーザーのセッションへの自動登録を有効にします。

*デフォルト: `false`*

### `allow_students_to_browse_courses`

**学生の閲覧許可**

学生がコースカタログを閲覧し、フィルタリングすることを許可します。

*デフォルト: `true`*

### `course_catalog_display_in_home`

**ホームページでのカタログ表示**

プラットフォームのホームページにコースカタログブロックを表示します。

*デフォルト: `false`*

### `course_catalog_hide_private`

**非公開コースの非表示**

カタログ表示から非公開コースを除外します。

*デフォルト: `true`*

### `course_catalog_published`

**コースカタログの公開**

ログインせずに匿名ユーザー（一般公開）に対してコースカタログを利用可能にします。

*デフォルト: `false`*

### `course_catalog_settings`

**コースカタログ設定**

コースカタログのJSON設定：リンク設定、フィルター、並べ替えオプションなど。

### `course_subscription_in_user_s_session`

**セッションビューでの登録**

ユーザーがセッションページから直接コースに登録することを許可します。

*デフォルト: `false`*

### `hide_public_link`

**公開リンクの非表示**

コースカードから公開URLリンクを削除します。

*デフォルト: `false`*

### `only_show_course_from_selected_category`

**コースカタログで一致するカテゴリのみを表示**

空でない場合、指定されたカテゴリのコースのみがコースカタログに表示されます。

### `only_show_selected_courses`

**選択したコースのみ表示**

カタログに手動で選択したコースのみを表示します。

*デフォルト: `false`*

### `session_catalog_settings`

**セッションカタログ設定**

セッションカタログのJSON設定：フィルターおよび表示オプション。

### `show_courses_descriptions_in_catalog`

**コース説明の表示**

カタログリスト内にコースの説明を表示します。

*デフォルト: `false`*

### `show_courses_sessions`

**コースとセッションの表示**

カタログの結果にコースとセッションの両方を含めます。

*デフォルト: `0`*