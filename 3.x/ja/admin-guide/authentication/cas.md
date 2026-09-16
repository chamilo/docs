# CAS

> **Chamilo 3.x におけるステータス。** CAS の設定項目（`cas_activate`、`cas_server`、`cas_server_uri`、`cas_port`、`cas_protocol`、`cas_add_user_activate`）は、Chamilo 1.x からのレガシーとしてプラットフォーム設定に残っており、ユーザーフォーム上でも CAS は認証ソースとして選択可能です。しかし、Chamilo 3.x のセキュリティパイプラインには CAS 認証器が接続されていません。CAS 経由のログインは、現状ではそのままでは**動作しません**。Chamilo 3.x で SSO が必要な場合は、代わりに [OAuth2](oauth2.md)（Azure / Keycloak / Generic）または [LDAP](ldap.md) を使用してください。

## CAS が行うこと（1.x の動作）

CAS（Central Authentication Service）は、大学や研究機関で広く使われるシングルサインオンプロトコルです。Chamilo 1.x では、「CAS でログイン」をクリックするとユーザーは CAS サーバーへリダイレクトされ、返されたチケットが検証され、CAS の属性からローカルアカウントが作成または照合されていました。

## 移行に関する注意

CAS を使用していた Chamilo 1.x ポータルをアップグレードする場合は、将来の 3.x リリースで CAS 認証器が復元されるまでの間、そのログインフローを当面 OAuth2 または LDAP の上に再実装する計画を立ててください。