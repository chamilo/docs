# CAS

> **Chamilo 2.x での状況**  
> CAS 設定項目（`cas_activate`、`cas_server`、`cas_server_uri`、`cas_port`、`cas_protocol`、`cas_add_user_activate`）は、Chamilo 1.x からのレガシーとしてプラットフォーム設定に残っています。また、CAS はユーザー形式の認証ソースとして選択可能に表示されていますが、Chamilo 2.x のセキュリティパイプラインには CAS 認証機能が組み込まれていません。CAS を通じたログインは現在、初期設定のままでは**動作しません**。Chamilo 2.x で SSO が必要な場合は、代わりに [OAuth2](oauth2.md)（Azure / Keycloak / 汎用）または [LDAP](ldap.md) を使用してください。

## CAS が果たしていた役割（1.x の動作）

CAS（Central Authentication Service）は、大学や研究機関で一般的に使用されるシングルサインオンプロトコルです。Chamilo 1.x では、「CAS でログイン」をクリックすると、ユーザーは CAS サーバーにリダイレクトされ、返されたチケットを検証し、CAS 属性からローカルアカウントを作成または一致させる機能がありました。

## 移行に関する注意

CAS を使用していた Chamilo 1.x ポータルをアップグレードする場合、CAS 認証機能が将来の 2.x リリースで復元されるまでの間、OAuth2 または LDAP を基盤にしてログインフローを再実装する計画を立ててください。