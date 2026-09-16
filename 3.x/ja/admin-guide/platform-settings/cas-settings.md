# CAS設定

Chamilo 1.xから引き継がれたレガシーなCAS（Central Authentication Service）設定です。Chamilo 3.xにおけるCAS認証機能の現状については、[CAS](../authentication/cas.md) を参照してください。

これらの設定には **管理 > 設定 > CAS** からアクセスします。このカテゴリには **7件の設定** が含まれており、以下にプラットフォームの設定フィクスチャ（`SettingsCurrentFixtures.php`）に同梱されているタイトルとコメントとともに記載します。

> コード上の変数名は等幅フォントで示しています。API経由でスクリプトを記述する場合や、[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) を編集してグローバルにこれらの設定を変更する場合に使用してください。

## 設定

### `cas_activate`

**CAS認証を有効にする**

CAS認証を有効にすると、ユーザーはCASの資格情報で認証できるようになります。<br/>Chamiloキャンパスに設定可能な「CASログイン」ボタンを追加するには、<a href='settings.php?category=CAS'>プラグイン</a> に移動してください。または、app/config/auth.conf.php で cas[force_redirect] を設定してCAS認証を強制することもできます。

### `cas_add_user_activate`

**CASユーザー追加を有効にする**

CASユーザー追加を有効にします。LDAPディレクトリからユーザーアカウントを作成するには、app/config/auth.conf.php 内の extldap_config および extldap_user_correspondance テーブルを入力する必要があります。

### `cas_port`

**メインCASサーバーのポート**

メインCASサーバーへの接続に使用するポート

### `cas_protocol`

**メインCASサーバーのプロトコル**

CASサーバーへの接続に使用するプロトコル

### `cas_server`

**メインCASサーバー**

認証に使用するメインCASサーバーです（IPアドレスまたはホスト名）

### `cas_server_uri`

**メインCASサーバーのURI**

CASサービスへのパス

### `update_user_info_cas_with_ldap`

**LDAPからCAS認証ユーザーのアカウント情報を更新する**

ユーザーの名、姓、メールアドレスがLDAPディレクトリの現在の値と一致するようにします