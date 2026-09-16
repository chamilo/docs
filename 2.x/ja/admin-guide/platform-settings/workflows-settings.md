# ワークフロー設定

コース作成、登録検証、課題ワークフローなど、横断的なワークフローの切り替え設定。

これらの設定には **管理 > 設定 > ワークフロー** からアクセスできます。このカテゴリには **23の設定** が含まれており、以下にプラットフォームの設定フィクスチャ（`SettingsCurrentFixtures.php`）に含まれるタイトルとコメントを記載しています。

> コード内の変数名は等幅フォントで表示されています。APIを通じてスクリプトを作成する場合や、[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) を編集してグローバルレベルでこれらの設定を変更する必要がある場合に使用してください。

## 設定

### `allow_user_course_subscription_by_course_admin`

**コース管理者によるユーザーのコース登録を許可**

このオプションを有効にすると、コース管理者がコース内にユーザーを登録できるようになります。

*デフォルト: `true`*

### `allow_users_to_create_courses`

**管理者以外によるコース作成を許可**

管理者以外のユーザー（教師）がサーバー上で新しいコースを作成できるようにします。

*デフォルト: `false`*

### `allow_working_time_edition`

**コース作業時間の編集を有効化**

この機能を有効にすると、教師が学習者のコースでの作業時間を手動で更新できるようになります。

*デフォルト: `false`*

### `course_visibility_change_only_admin`

**コースの公開設定変更を管理者のみに制限**

管理者以外のユーザーがコースの公開設定を変更する可能性を排除します。教師が多すぎて直接管理できない場合、公開設定が問題になることがあります。公開設定を強制することで、組織はコースカタログをより適切に管理できます。

*デフォルト: `false`*

### `default_menu_entry_for_course_or_session`

**コースのデフォルトメニューエントリ**

ユーザーがどのコースやセッションにも登録していない場合に表示する「コース」エントリのデフォルトのサブ要素を定義します。

*デフォルト: `my_courses`*

### `disable_user_conditions_sender_id`

**無効化されたアカウント通知を送信するユーザーの内部ID**

アカウントが何らかの理由で無効化された際にユーザーにメールを送信する際に、個人情報を避けるために「ボット」アカウントを使用します。

*デフォルト: `0`*

### `disabled_edit_session_coaches_course_editing_course`

**コースコーチの編集機能を無効化**

無効にすると、管理者はコース編集ページでセッションコースにコーチを迅速に割り当てるリンクを利用できなくなります。

*デフォルト: `false`*

### `drh_allow_access_to_all_students`

**HRMがレポートページからすべての学生にアクセス可能**

[推定] HR/DRHマネージャーに、プラットフォーム全体のすべての学習者のレポートページへのアクセス権を付与します。

*デフォルト: `false`*

### `gamification_mode`

**ゲーミフィケーションモード**

学習パスでのスター達成機能を有効化します。

### `go_to_course_after_login`

**ログイン後に直接コースへ移動**

ユーザーが1つのコースに登録している場合、ログイン後に直接そのコースに移動します。

*デフォルト: `false`*

### `load_term_conditions_section`

**利用規約セクションの読み込み**

ログイン時またはコースに入る際に法的な同意書が表示されます。

*デフォルト: `login`*

### `multiple_url_hide_disabled_settings`

**サブURLで無効化された設定を非表示**

メインURL（access_url_changeableフィールド = 0）で設定が無効化されている場合、サブURLでその設定を完全に非表示にするには「はい」に設定します。

*デフォルト: `false`*

### `plugin_redirection_enabled`

**リダイレクションプラグインを有効化**

リダイレクションプラグインを使用している場合のみ有効にします。

*デフォルト: `false`*

### `redirect_index_to_url_for_logged_users`

**認証済みユーザーのindex.phpを指定URLにリダイレクト**

インデックスページ（お知らせ、人気コースなど）を使用したくない場合、ここでユーザーがインデックスを読み込もうとした際にリダイレクトされるスクリプト（ドキュメントルートからのパス）を定義できます。

### `send_all_emails_to`

**すべてのメールを送信**

プラットフォームから送信されるすべてのメールが送信されるメールアドレスのリストを指定します。メールはこれらのアドレスに見える宛先として送信されます。

### `session_admin_user_subscription_search_extra_field_to_search`

**セッションの検索および命名に使用する追加ユーザー項目**

この設定は、/admin-dashboard/register から学生を登録する際に、ユーザーを検索し、セッション名を定義するために使用される追加ユーザー項目のキー（例：「company」）を定義します。

### `teacher_can_select_course_template`

**教師がコースをテンプレートとして選択可能**

教師が作成する新しいコースのテンプレートとしてコースを選択できるようにします。

*デフォルト: `true`*

### `update_student_expiration_x_date`

**初回ログイン時に有効期限を設定**

ユーザーが初めてログインした際にアカウントの有効期限を設定するための「日数」と「月数」を定義する配列。

### `user_edition_extra_field_to_check`

**元学習者としての登録トリガーとなる追加項目を設定**

ここに追加項目のラベルを指定します。この追加項目がユーザーに対して更新されると、同じ追加項目を持つコースへのこのユーザーのアクセスを確認するプロセスがトリガーされます。

---
### `user_number_of_days_for_default_expiration_date_per_role`

**ロールごとのデフォルト有効期限日数**

ロールに応じてアカウントが有効期限切れになるまでの日数を表す、ロール => 数値の配列。

### `usergroup_do_not_unsubscribe_users_from_course_nor_session_on_user_unsubscribe`

**グループ/クラスからのユーザー解除時にコース/セッションからの自動解除を無効にする**

[推定] ユーザーをグループ/クラスから削除する際に、関連するコースやセッションから自動的に解除しない。

*デフォルト: `false`*

### `usergroup_do_not_unsubscribe_users_from_course_on_course_unsubscribe`

**グループ/クラスからのコース削除時にコースからのユーザー解除を無効にする**

[推定] コースがグループ/クラスから削除された際に、そのコースからユーザーを自動的に解除しない。

*デフォルト: `false`*

### `usergroup_do_not_unsubscribe_users_from_session_on_session_unsubscribe`

**グループ/クラスからのセッション削除時にセッションからのユーザー解除を無効にする**

[推定] セッションがグループ/クラスから削除された際に、そのセッションからユーザーを自動的に解除しない。

*デフォルト: `false`*