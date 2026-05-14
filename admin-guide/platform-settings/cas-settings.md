# CAS設定

Chamilo 1.xから引き継がれた従来のCAS（Central Authentication Service）設定。Chamilo 2.xでのCAS認証機能の現在の状況については、[CAS](../authentication/cas.md)を参照してください。

これらの設定には、**管理 > 設定 > CAS**からアクセスできます。このカテゴリには**7つの設定**が含まれており、以下にプラットフォームの設定フィクスチャ（`SettingsCurrentFixtures.php`）に記載されているタイトルとコメントを記載しています。

> コード内の変数名は等幅フォントで表示されています。APIを通じてスクリプトを作成する場合や、[`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml)を編集してこれらの設定をグローバルレベルで変更する必要がある場合に使用してください。

## 設定

### `cas_activate`

**CAS認証を有効にする**

CAS認証を有効にすると、ユーザーはCAS認証情報を使用して認証を行うことができます。<br/>Chamiloキャンパスに設定可能な「CASログイン」ボタンを追加するには、<a href='settings.php?category=CAS'>プラグイン</a>に移動してください。または、app/config/auth.conf.phpでcas[force_redirect]を設定することで、CAS認証を強制することもできます。

### `cas_add_user_activate`

**CASユーザー追加を有効にする**

CASユーザー追加を有効にします。LDAPディレクトリからユーザーアカウントを作成するには、app/config/auth.conf.php内のextldap_configおよびextldap_user_correspondanceテーブルにデータを入力する必要があります。

### `cas_port`

**メインCASサーバーのポート**

メインCASサーバーに接続するためのポート

### `cas_protocol`

**メインCASサーバーのプロトコル**

CASサーバーに接続する際に使用するプロトコル

### `cas_server`

**メインCASサーバー**

認証に使用されるメインCASサーバー（IPアドレスまたはホスト名）

### `cas_server_uri`

**メインCASサーバーのURI**

CASサービスへのパス

### `update_user_info_cas_with_ldap`

**LDAPからCAS認証ユーザーのアカウント情報を更新する**

ユーザーの名、姓、メールアドレスがLDAPディレクトリの現在の値と同じであることを確認します。