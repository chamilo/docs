# メール設定

送信メールの組み立て方 — 送信者の識別情報、レイアウト、署名、および特定用途のアドレス。

これらの設定には **管理 > 設定 > メール** からアクセスします。このカテゴリには **17 件の設定** があり、以下にプラットフォームの設定フィクスチャ（`SettingsCurrentFixtures.php`）に同梱されているタイトルとコメントとともに示します。

> コード上の変数名は等幅で示しています。API 経由でスクリプトする場合や、[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) を編集してグローバルに変更する場合に使用してください。

## 設定

### `allow_email_editor_for_anonymous`

**匿名ユーザー向けメールエディター**

匿名ユーザーがプラットフォームからメールを送信できるようにします。昨今の情報セキュリティの観点から、推奨されるオプションではありません。

*デフォルト: `true`*


### `cron_notification_help_desk`

**cron ジョブ実行レポートの送信先メールアドレス**

メールアドレスの配列として指定します。まだすべての cron ジョブでは動作しません。

### `mail_content_style`

**メール HTML 本文の追加属性**

生成される通知メールの body タグに適用する追加の HTML 属性です。

### `mail_header_style`

**メール HTML ヘッダーの追加属性**

生成される通知メールのヘッダー部分に適用する追加の HTML 属性です。

### `mailer_debug_enable`

**メール: デバッグ**

メール送信のデバッグログを有効にするかどうかを選択します。メールサービスへの接続時に何が起きているか、より詳しい情報が得られますが、体裁は良くなく、ページデザインを崩す可能性があります。ユーザー活動がないときにのみ使用してください。

*デフォルト: `false`*


### `mailer_dkim`

**メール: DKIM ヘッダー**

DKIM 設定の JSON 配列を入力します（例を参照）。

### `mailer_dsn`

**メール DSN**

DSN には、メールサービスへの接続に必要なすべてのパラメーターが含まれます。詳細は https://symfony.com/doc/7.4/mailer.html#using-built-in-transports を参照してください。サポートされる DSN 構文の例は次のとおりです: https://symfony.com/doc/7.4/mailer.html#using-a-3rd-party-transport。基本認証による SMTP が廃止されつつある Microsoft 365 では、代わりに Microsoft Graph API 経由で `microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@default?tenantId=TENANT_ID` を使用して送信します（クライアントシークレット内の特殊文字は URL エンコードしてください）。これには、`Mail.Send` アプリケーション権限が付与された Entra ID アプリケーション登録が必要です — [メール設定](../installation/email-configuration.md) を参照してください。

*デフォルト: `null://null`*


### `mailer_exclude_json`

**メール: LD+JSON の使用を避ける**

一部のメールクライアントは記述的な LD+JSON 形式を理解せず、最終ユーザーにばらばらの JSON 文字列として表示します。該当する場合は、このヘッダーを無効にするために下記の変数を 'false' に設定することを検討してください。

*デフォルト: `false`*


### `mailer_from_email`

**すべてのメールをこのメールアドレスから送信する**

メールの「from」フィールドで使用するデフォルトのメールアドレスを設定します。

### `mailer_from_name`

**すべてのメールをこの（組織の）名前から送信する**

プラットフォームメール送信時に使用するデフォルトの表示名を設定します。例: 「サポートチーム」。

### `mailer_mails_charset`

**メール: 文字セット**

これらのメール送信時に使用する文字セットを定義する必要がある場合に指定します。不明な場合は空のままにしてください。

*デフォルト: `UTF-8`*


### `messages_hide_mail_content`

**ユーザーをプラットフォームへ誘導するためメール本文を隠す**

プラットフォーム上のメッセージ領域へのリンク付きの短いメール版を優先し、プラットフォーム上でのエンゲージメントを高めます。

*デフォルト: `false`*


### `notifications_extended_footer_message`

**拡張通知フッター**

特定の言語向けの通知メールに、プライバシーポリシーの告知など、カスタムの追加フッターを追加します。複数の言語と段落を追加できます。

### `send_notification_score_in_percentage`

**テスト結果通知でスコアをパーセントで送信する**

テスト結果通知メールで、演習のスコアを点数ではなくパーセントとして送信します。

*デフォルト: `false`*


### `send_two_inscription_confirmation_mail`

**登録メールを 2 通送信する**

登録時に 2 通の別々のメールを送信します。1 通はユーザー名用、もう 1 通はパスワード用です。

*デフォルト: `false`*


### `show_user_email_in_notification`

**通知に送信者のメールアドレスを表示する**

個人メッセージおよび通知メールで、送信者の名前とともにメールアドレスを含めます。

*デフォルト: `false`*


### `update_users_email_to_dummy_except_admins`

**インポート時にユーザーのメールをダミー値に更新する**

ユーザーの特別な CSV cron インポート時に、メールをダミーのメール username@example.com に自動的に置き換えます。

*デフォルト: `false`*