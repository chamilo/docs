# Web Services Settings

レガシーな SOAP / REST Web サービス（現行の API Platform エンドポイントとは別）の設定です。

これらの設定は **管理 > 設定 > Web Services** からアクセスできます。このカテゴリには **7 件の設定** があり、以下にプラットフォームの設定フィクスチャ（`SettingsCurrentFixtures.php`）に同梱されているタイトルとコメントとともに示します。

> コード上の変数名は等幅で示しています。API 経由でスクリプトする場合や、[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) を編集してグローバルに変更する場合に使用してください。

## Settings

### `allow_download_documents_by_api_key`

**API キーによるコースドキュメントのダウンロードを許可する**

ユーザーの REST API キーを検証してドキュメントをダウンロードします

*Default: `false`*


### `disable_webservices`

**Web サービスを無効にする**

Web サービスを使用しない場合は、不要なセキュリティリスクを避けるためにこれを有効にしてください。

*Default: `false`*


### `messaging_allow_send_push_notification`

**Chamilo Messaging モバイルアプリへのプッシュ通知を許可する**

Google の Firebase Console によりプッシュ通知を送信します

*Default: `false`*


### `messaging_gdc_api_key`

**Cloud Messaging 用 Firebase Console のサーバーキー**

プロジェクト認証情報からのサーバーキー（レガシートークン）

### `messaging_gdc_project_number`

**Cloud Messaging 用 Firebase Console の送信者 ID**

<a href='https://console.firebase.google.com/'>Google Firebase Console</a> でプロジェクトを登録する必要があります

### `webservice_enable_adminonly_api`

**管理者専用 Web サービスを有効にする**

一部の REST Web サービスは管理者専用としてマークされ、既定では無効です。この機能を有効にすると、これらの Web サービスへのアクセスが付与されます（当然、管理者資格情報を持つユーザーに対してです）。

*Default: `false`*

### `webservice_return_user_field`

**Web サービスが返すユーザーフィールド**

REST Web サービス（v2.php）に、ユーザー ID に関連するフィールドについて別の識別子を返すよう求めます。外部システムが Chamilo 内のユーザー ID をそのまま扱わない場合に有用で、外部システムが返すユーザーデータを、Chamilo が把握している外部データと照合しやすくなります。たとえば外部認証システムを使用している場合、user.id ではなく、外部認証システムとユーザーを照合するために使う追加フィールドを返すことができます。

*Default: `oauth2_id`*