# CAS

> **Chamilo 2.x 中的狀態**：CAS 設定項目（`cas_activate`、`cas_server`、`cas_server_uri`、`cas_port`、`cas_protocol`、`cas_add_user_activate`）作為 Chamilo 1.x 的遺留內容仍然存在於平台設定中，並且 CAS 仍然作為用戶表單上的可選認證來源顯示——但在 Chamilo 2.x 的安全管道中並未連接 CAS 認證器。通過 CAS 登入目前**無法直接使用**。如果您需要在 Chamilo 2.x 上使用單一登入（SSO），請改用 [OAuth2](oauth2.md)（Azure / Keycloak / Generic）或 [LDAP](ldap.md)。

## CAS 的功能（1.x 行為）

CAS（中央認證服務）是一種常見於大學和研究機構的單一登入協議。在 Chamilo 1.x 中，點擊「使用 CAS 登入」會將用戶重定向到 CAS 伺服器，驗證返回的票據，並根據 CAS 屬性創建或匹配本地帳戶。

## 遷移注意事項

如果您正在升級使用 CAS 的 Chamilo 1.x 門戶網站，請計劃暫時在 OAuth2 或 LDAP 的基礎上重新實現該登入流程，直到 CAS 認證器在未來的 2.x 版本中恢復為止。