# 登録設定

自己登録のポリシーと登録後のリダイレクト — 新規ユーザーに何を求め、どこへ誘導するか。

これらの設定は **管理 > 設定 > 登録** からアクセスします。このカテゴリには **21 件の設定** があり、以下にプラットフォームの設定フィクスチャ（`SettingsCurrentFixtures.php`）に同梱されているタイトルとコメントとともに列挙します。

> コード上の変数名は等幅フォントで示しています。API 経由でスクリプトする場合や、[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) を編集してグローバルに変更する場合に使用してください。

## 設定

### `allow_double_validation_in_registration`

**登録プロセスの二重確認**

ユーザー作成に進む前に、登録ページで確認リクエストを表示するだけです。

*デフォルト: `false`*


### `allow_fields_inscription`

**登録時に表示するフィールドを制限する**

利用可能なプロフィールフィールドのうち一部だけを表示したい場合は、ここに配列を記入し、サブ要素 `'fields'` および `'extra_fields'` に、表示するフィールドのリストを含む配列を指定できます。

### `allow_invitation_registration` **v3**

**コース招待リンクによる登録を許可する**

有効にすると、教師／管理者がコースのユーザーツールからワンタイム招待リンクを送信でき、未登録の人が登録フォームに到達して登録できます。一般の自己登録（`allow_registration`）が無効でも登録できます。

*デフォルト: `false`*

この機能の教師向けの側面については、[ユーザーの登録](../../teacher-guide/assessing-learners/subscribing-users.md#inviting-users-by-email) を参照してください。

### `allow_lostpassword`

**パスワード紛失**

ユーザーは紛失したパスワードの再発行をリクエストできますか？

*デフォルト: `true`*

### `allow_registration`

**登録**

新規ユーザーとしての登録は許可されていますか？ユーザーは新しいアカウントを作成できますか？

*デフォルト: `false`*

### `allow_registration_as_teacher`

**教師としての登録**

教師として（コースを作成する権限付きで）登録できますか？

*デフォルト: `false`*

### `allow_terms_conditions`

**利用規約を有効にする**

このオプションは、新規ユーザー向けの登録フォームに利用規約を表示します。ポータル管理ページで先に設定する必要があります。

*デフォルト: `false`*


### `drh_autosubscribe`

**人事責任者の自動登録**

人事責任者の自動登録 — まだ利用できません

### `extendedprofile_registration`

**登録時のポートフォリオフィールド**

ポートフォリオの次のフィールドのうち、どれをユーザー登録プロセスで利用可能にする必要がありますか？これにはポートフォリオオプションが有効である必要があります（上記を参照）。

### `extendedprofile_registrationrequired`

**登録時の必須ポートフォリオフィールド**

ポートフォリオの次のフィールドのうち、どれがユーザー登録プロセスで*必須*ですか？これにはポートフォリオオプションが有効であり、かつそのフィールドが登録フォームでも利用可能である必要があります（上記を参照）。

### `extldap_config`

**LDAP 接続設定**

LDAP サーバーのホストとポートを定義する配列。

### `hide_legal_accept_checkbox`

**利用規約ページで法的同意チェックボックスを非表示にする**

true に設定すると、利用規約ページのフローから「読み、同意しました」チェックボックスを削除します。

*デフォルト: `false`*


### `platform_unsubscribe_allowed`

**プラットフォームからの退会を許可する**

このオプションを有効にすると、任意のユーザーが自身のアカウントとそれに関連するすべてのデータをプラットフォームから完全に削除できます。かなり抜本的な操作ですが、ユーザーが自己登録できる一般公開ポータルでは必要です。確認後に退会するための追加エントリがユーザープロフィールに表示されます。

*デフォルト: `false`*


### `redirect_after_login`

**ログイン後のリダイレクト（プロフィール別）**

`{"STUDENT":"", "ADMIN":"admin-dashboard"}` のような JSON オブジェクトを使用して、ログイン後のリダイレクトをプロフィールごとに定義します。

*デフォルト:*
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

ユーザー登録時に入力必須とする追加フィールド識別子の配列。

### `required_profile_fields`

**登録時の必須フィールド**

登録時に提供必須とするプロフィールフィールド名（email、phone、language、official_code）の配列。

### `send_inscription_msg_to_inbox`

**ウェルカムメッセージをメールと受信箱に送信する**

デフォルトでは、ウェルカムメッセージ（認証情報付き）はメールでのみ送信されます。このオプションを有効にすると、ユーザーの Chamilo 受信箱にも送信されます。

*デフォルト: `false`*


### `sessionadmin_autosubscribe`

**セッション管理者の自動登録**

セッション管理者の自動登録 — まだ利用できません

### `student_autosubscribe`

**学習者の自動登録**

学習者の自動登録 - まだ利用できません

### `teacher_autosubscribe`

**教師の自動登録**

教師の自動登録 - まだ利用できません

### `user_hide_never_expire_option`

**ユーザーの「無期限」オプションを非表示にする**

ユーザーアカウントの作成／編集時に「無期限」オプションを削除します。

*デフォルト: `false`*