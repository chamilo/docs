# チケット設定

**チケット**（ヘルプデスク）システムの動作設定。

これらの設定には、**管理 > 設定 > チケット**からアクセスできます。このカテゴリには**7つの設定**が含まれており、以下にプラットフォームの設定フィクスチャ（`SettingsCurrentFixtures.php`）に記載されているタイトルとコメントを記載しています。

> コード内の変数名は等幅フォントで表示されています。APIを通じてスクリプトを作成する場合や、[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml)を編集してこれらの設定をグローバルレベルで変更する必要がある場合に使用してください。

## 設定

### `show_link_bug_notification`

**バグ報告リンクを表示**

ヘッダーに、当社のサポートプラットフォーム（http://support.chamilo.org）内でバグを報告するためのリンクを表示します。リンクをクリックすると、ユーザーはサポートプラットフォームのWikiページに移動し、バグ報告プロセスが説明されています。

*デフォルト: `false`*

### `show_link_ticket_notification`

**チケット作成リンクを表示**

ポータルの右側にユーザーにチケット作成リンクを表示します。

*デフォルト: `false`*

### `ticket_allow_category_edition`

**チケットカテゴリの編集を許可**

管理者によるカテゴリの編集を許可します。

*デフォルト: `false`*

### `ticket_allow_student_add`

**ユーザーにチケットの追加を許可**

管理者だけでなく、すべてのユーザーがチケットを追加できるようにします。

*デフォルト: `false`*

### `ticket_project_user_roles`

**チケットプロジェクトへの役割別アクセス**

特定のユーザーロールによるチケットプロジェクトへのアクセスを許可します。例: ['permissions' => [1 => [17]] ここで project_id = 1, STUDENT_BOSS = 17。

### `ticket_send_warning_to_all_admins`

**管理者へのチケット警告メッセージの送信**

カテゴリが設定されていない場合や、カテゴリに管理者が割り当てられていない場合にメッセージを送信します。

*デフォルト: `false`*

### `ticket_warn_admin_no_user_in_category`

**チケットカテゴリに担当者がいない場合に管理者に警告を送信**

カテゴリにユーザーが割り当てられていない場合、すべての管理者に警告メッセージ（メールおよびChamiloメッセージ）を送信します。

*デフォルト: `false`*