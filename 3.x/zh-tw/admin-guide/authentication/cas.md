# CAS

> **Chamilo 3.x 中的狀態。** CAS 相關設定項目（`cas_activate`、`cas_server`、`cas_server_uri`、`cas_port`、`cas_protocol`、`cas_add_user_activate`）仍作為從 Chamilo 1.x 沿用而來的舊版設定存在於平台設定中，且 CAS 仍會在使用者表單上顯示為可選的驗證來源 — 但 Chamilo 3.x 的安全性管線中並未接上 CAS 驗證器。透過 CAS 登入目前**無法**開箱即用。若您需要在 Chamilo 3.x 上使用 SSO，請改用 [OAuth2](oauth2.md)（Azure / Keycloak / Generic）或 [LDAP](ldap.md)。

## CAS 原本會做什麼（1.x 行為）

CAS（Central Authentication Service，中央驗證服務）是大學與研究機構常用的單一登入協定。在 Chamilo 1.x 中，點選「以 CAS 登入」會將使用者重新導向至 CAS 伺服器、驗證回傳的票證，並依 CAS 屬性建立或對應本機帳號。

## 遷移注意事項

若您正在升級曾使用 CAS 的 Chamilo 1.x 入口網站，請暫時規劃改以 OAuth2 或 LDAP 重新實作該登入流程，直到未來 3.x 版本恢復 CAS 驗證器為止。