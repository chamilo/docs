# ワークフロー設定

横断的なワークフローの切り替え — コース作成、登録の検証、課題ワークフローなど。

これらの設定は **管理 > 設定 > ワークフロー** からアクセスします。このカテゴリには **23 件の設定** があり、以下にプラットフォームの設定フィクスチャ（`SettingsCurrentFixtures.php`）に同梱されているタイトルとコメントとともに掲載します。

> コード上の変数名は等幅フォントで示します。API 経由でスクリプトする場合や、[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) を編集してグローバルに変更する場合に使用してください。

## 設定

### `allow_user_course_subscription_by_course_admin`

**Allow User Course Subscription By Course Admininistrator**

このオプションを有効にすると、コース管理者がコース内でユーザーを登録できるようになります

*デフォルト: `true`*


### `allow_users_to_create_courses`

**Allow non admin to create courses**

管理者以外（教師）がサーバー上で新しいコースを作成できるようにします

*デフォルト: `false`*


### `allow_working_time_edition`

**Enable edition of course work time**

この機能を有効にすると、教師が学習者のコース滞在時間を手動で更新できます。

*デフォルト: `false`*


### `course_visibility_change_only_admin`

**Course visibility changes for admins only**

管理者以外がコースの公開範囲を変更できないようにします。教師が多すぎて直接管理しきれない場合、公開範囲は問題になり得ます。公開範囲を強制することで、組織はコースカタログをより適切に管理できます。

*デフォルト: `false`*


### `default_menu_entry_for_course_or_session`

**Default menu entry for courses**

ユーザーがどのコースにもセッションにも登録されていない場合に表示する、「コース」エントリのデフォルトのサブ要素を定義します。

*デフォルト: `my_courses`*


### `disable_user_conditions_sender_id`

**Internal ID of the user used to send disabled account notifications**

アカウントが何らかの理由で無効化されたときにユーザーへメールを送る際、「ボット」アカウントを使うことで、ユーザーに対して過度に個人的にならないようにします。

*デフォルト: `0`*


### `disabled_edit_session_coaches_course_editing_course`

**Disable the ability to edit course tutors**

無効にすると、管理者はコース編集ページからセッションコースにチューターをすばやく割り当てるリンクを持ちません。

*デフォルト: `false`*


### `drh_allow_access_to_all_students`

**HRM can access all students from reporting pages**

[推定] HR/DRH マネージャーに、プラットフォーム全体のすべての学習者のレポートページへのアクセスを付与します。

*デフォルト: `false`*


### `gamification_mode`

**Gamification mode**

ラーニングパスの星による達成を有効にします

### `go_to_course_after_login`

**Go directly to the course after login**

ユーザーが1つのコースに登録されている場合、ログイン後にそのコースへ直接移動します

*デフォルト: `false`*


### `load_term_conditions_section`

**Load term conditions section**

法的同意はログイン時、またはコースに入るときに表示されます。

*デフォルト: `login`*


### `multiple_url_hide_disabled_settings`

**Hide disabled settings in sub-URLs**

メイン URL で設定が無効になっている場合（access_url_changeable フィールド = 0）、サブ URL でその設定を完全に非表示にするには yes にします

*デフォルト: `false`*


### `plugin_redirection_enabled`

**Enable redirection plugin**

Redirection プラグインを使用している場合のみ有効にしてください

*デフォルト: `false`*


### `redirect_index_to_url_for_logged_users`

**Redirect index.php to given URL for authenticated users**

インデックスページ（お知らせ、人気コースなど）を使いたくない場合、認証済みユーザーがインデックスを読み込もうとしたときにリダイレクトするスクリプト（ドキュメントルートからのパス）をここで定義できます。

### `send_all_emails_to`

**Send all e-mails to**

プラットフォームから送信される*すべての*メールの宛先とするメールアドレスのリストを指定します。メールはこれらのアドレスに可視の宛先として送信されます。

### `session_admin_user_subscription_search_extra_field_to_search`

**Extra user field used to search and name sessions**

この設定は、/admin-dashboard/register から学生を登録する際にユーザー検索とセッション名の定義に使用する追加ユーザーフィールドのキー（例: "company"）を定義します。

### `teacher_can_select_course_template`

**Teacher can select a course as template**

教師が作成する新しいコースのテンプレートとしてコースを選択できるようにします

*デフォルト: `true`*


### `update_student_expiration_x_date`

**Set expiration date on first login**

ユーザーが初めてログインしたときにアカウント有効期限を設定するための「日」と「月」を定義する配列です。

### `user_edition_extra_field_to_check`

**Set an extra field as trigger for registration as ex-learner**

ここに追加フィールドのラベルを指定します。いずれかのユーザーでこの追加フィールドが更新されると、同じ追加フィールドを持つコースへの当該ユーザーのアクセスを確認する処理が起動します。

### `user_number_of_days_for_default_expiration_date_per_role`

**ロール別のデフォルト有効期限日数**

ロール => 数値の配列で、ロールに応じてアカウントが有効期限切れになるまでの日数を表します。

### `usergroup_do_not_unsubscribe_users_from_course_nor_session_on_user_unsubscribe`

**グループ／クラスからのユーザー登録解除時に、コース／セッションからのユーザー登録解除を無効化**

[推定] グループ／クラスからユーザーを削除する際、関連するコースまたはセッションから自動的に登録解除しないようにします。

*デフォルト: `false`*


### `usergroup_do_not_unsubscribe_users_from_course_on_course_unsubscribe`

**グループ／クラスからのコース削除時に、コースからのユーザー登録解除を無効化**

[推定] グループ／クラスからコースが削除された際、そのコースからユーザーを自動的に登録解除しないようにします。

*デフォルト: `false`*


### `usergroup_do_not_unsubscribe_users_from_session_on_session_unsubscribe`

**グループ／クラスからのセッション削除時に、セッションからのユーザー登録解除を無効化**

[推定] グループ／クラスからセッションが削除された際、そのセッションからユーザーを自動的に登録解除しないようにします。

*デフォルト: `false`*