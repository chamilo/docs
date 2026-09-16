# 登録設定

セルフ登録ポリシーと登録後のリダイレクト — 新規ユーザーに求められる情報と到着先。

これらの設定には **Administration > Configuration settings > Registration** からアクセスします。このカテゴリには **20 settings** が含まれており、以下にプラットフォームの設定フィクスチャ (`SettingsCurrentFixtures.php`) に含まれるタイトルとコメントとともに記載します。

> コード内の変数名は等幅フォントで表示されます。API を経由したスクリプト作成時や、[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) を編集してグローバルレベルでこれらの設定を変更する必要がある場合に使用してください。

## 設定

### `allow_double_validation_in_registration`

**登録プロセスの二重検証**

ユーザー作成を進める前に、登録ページに確認リクエストを表示するだけです。

*Default: `false`*


### `allow_fields_inscription`

**登録時に表示するフィールドの制限**

利用可能なプロフィールフィールドの一部のみを表示したい場合、ここに 'fields' と 'extra_fields' のサブ要素を含む配列を完成させ、各配列に表示するフィールドのリストを指定できます。

### `allow_lostpassword`

**パスワード紛失**

ユーザーがパスワードの再発行をリクエストできるかどうか？

*Default: `true`*

### `allow_registration`

**登録**

新規ユーザーとしての登録を許可するか？ ユーザーが新しいアカウントを作成できるか？

*Default: `false`*

### `allow_registration_as_teacher`

**教師としての登録**

教師として登録可能か（コース作成能力付き）？

*Default: `false`*

### `allow_terms_conditions`

**利用規約の有効化**

このオプションを有効にすると、新規ユーザーの登録フォームに利用規約が表示されます。まずポータル管理ページで設定する必要があります。

*Default: `false`*


### `drh_autosubscribe`

**人事ディレクターの自動購読**

人事ディレクターの自動購読 - まだ利用できません

### `extendedprofile_registration`

**登録時のポートフォリオフィールド**

以下のポートフォリオフィールドのうち、ユーザー登録プロセスで利用可能にするものはどれですか？ これにはポートフォリオオプションが有効になっている必要があります（上記参照）。

### `extendedprofile_registrationrequired`

**登録時の必須ポートフォリオフィールド**

以下のポートフォリオフィールドのうち、ユーザー登録プロセスで*必須*なものはどれですか？ これにはポートフォリオオプションが有効になっており、かつフィールドが登録フォームでも利用可能である必要があります（上記参照）。

### `extldap_config`

**LDAP 接続設定**

LDAP サーバーのホストとポートを定義する配列です。

### `hide_legal_accept_checkbox`

**利用規約ページの法的同意チェックボックスの非表示**

true に設定すると、利用規約ページのフローの「読みましたおよび同意します」チェックボックスを削除します。

*Default: `false`*


### `platform_unsubscribe_allowed`

**プラットフォームからの退会許可**

このオプションを有効にすると、任意のユーザーが自分のアカウントおよび関連するすべてのデータをプラットフォームから永久に削除できるようになります。これはかなり過激な操作ですが、公開ポータルでユーザーが自己登録できる場合に必要です。確認後に退会するための追加エントリがユーザー プロフィールに表示されます。

*Default: `false`*


### `redirect_after_login`

**ログイン後のリダイレクト（プロフィールごと）**

ログイン後にプロフィールごとにリダイレクトを定義します。{"STUDENT":"", "ADMIN":"admin-dashboard"} のような JSON オブジェクトを使用します。

*Default:*
```json
{
  "COURSEMANAGER": "courses",
  "STUDENT": "courses",
  "DRH": "",
  "SESSIONADMIN": "admin-dashboard",
  "STUDENT_BOSS": "main/my_space/student.php",
  "INVITEE": "courses",
  "ADMIN": "admin"
}
```

### `required_extra_fields_in_inscription`

**登録時の必須追加フィールド**

ユーザー登録時に完了させる必要がある追加フィールド識別子の配列です。

### `required_profile_fields`

**登録時の必須フィールド**

登録時に提供する必要があるプロフィールフィールド名（email, phone, language, official_code）の配列です。

### `send_inscription_msg_to_inbox`

**ウェルカム メッセージをメールと受信ボックスに送信**

デフォルトでは、ウェルカム メッセージ（認証情報付き）はメールのみで送信されます。このオプションを有効にすると、ユーザーの Chamilo 受信ボックスにも送信されます。

*Default: `false`*


### `sessionadmin_autosubscribe`

**セッション管理者自動購読**

セッション管理者の自動購読 - まだ利用できません

### `student_autosubscribe`

**学習者自動購読**

学習者の自動購読 - まだ利用できません

### `teacher_autosubscribe`

**教師自動購読**

教師の自動購読 - まだ利用できません

### `user_hide_never_expire_option`

**ユーザーの「期限切れなし」オプションの非表示**

ユーザー アカウントの作成/編集時に「期限切れなし」オプションを削除します。

*Default: `false`*