# ウェブサービス設定

レガシーなSOAP / RESTウェブサービス（最新のAPI Platformエンドポイントとは別）の設定。

これらの設定には、**管理 > 設定 > ウェブサービス**からアクセスできます。このカテゴリには**7つの設定**が含まれており、以下にプラットフォームの設定フィクスチャ（`SettingsCurrentFixtures.php`）に含まれるタイトルとコメントを記載しています。

> コード内の変数名は等幅フォントで表示されています。APIを通じてスクリプトを作成する場合や、[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml)を編集してこれらの設定をグローバルレベルで変更する必要がある場合に使用してください。

## 設定

### `allow_download_documents_by_api_key`

**APIキーによるコース資料のダウンロードを許可**

ユーザーのREST APIキーを検証して資料をダウンロードする

*デフォルト: `false`*

### `disable_webservices`

**ウェブサービスを無効化**

ウェブサービスを使用しない場合は、不要なセキュリティリスクを避けるためにこれを有効にしてください。

*デフォルト: `false`*

### `messaging_allow_send_push_notification`

**Chamilo Messagingモバイルアプリへのプッシュ通知を許可**

GoogleのFirebase Consoleを通じてプッシュ通知を送信する

*デフォルト: `false`*

### `messaging_gdc_api_key`

**クラウドメッセージング用のFirebase Consoleのサーバーキー**

プロジェクトの認証情報からのサーバーキー（レガシートークン）

### `messaging_gdc_project_number`

**クラウドメッセージング用のFirebase Consoleの送信者ID**

プロジェクトを<a href='https://console.firebase.google.com/'>Google Firebase Console</a>に登録する必要があります

### `webservice_enable_adminonly_api`

**管理者専用のウェブサービスを有効化**

一部のRESTウェブサービスは管理者専用としてマークされており、デフォルトでは無効になっています。この機能を有効にすると、これらのウェブサービスへのアクセスが許可されます（当然ながら管理者権限を持つユーザーに限ります）。

*デフォルト: `false`*

### `webservice_return_user_field`

**ウェブサービスが返すユーザーフィールド**

RESTウェブサービス（v2.php）に、ユーザーIDに関連するフィールドの別の識別子を返すよう要求します。これは、外部システムがChamilo内のユーザーIDをそのまま扱わない場合に役立ちます。外部システムがユーザーデータの返却をChamiloが認識している外部データと一致させるのに役立ちます。たとえば、外部認証システムを使用している場合、ユーザーIDの代わりに外部認証システムとユーザーを一致させるために使用される追加フィールドを返すことができます。

*デフォルト: `oauth2_id`*