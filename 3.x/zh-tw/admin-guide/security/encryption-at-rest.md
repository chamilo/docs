# 使用者個人資料欄位的靜態加密

Chamilo 3.1 可選擇在將特定個人資料欄位寫入資料庫之前加以加密。此第一階段實作涵蓋**個人簡介**、**電話**與**地址**。加密**預設為停用**，且需要一把私密加密金鑰。它不會加密所有使用者資訊，也不能取代磁碟、資料庫、傳輸或備份層級的安全措施。

## 啟用加密之前

僅具備伺服器存取權限的平台管理員應執行此部署。首先，確認安裝已包含 Chamilo 3.1 針對加密欄位儲存的 migrations，建立可還原的資料庫備份，並規劃將加密金鑰**與資料庫分開**進行安全備份。在變更正式環境資料之前，請先測試還原程序。

金鑰存放於 `var/data-at-rest/master.key`，位於公開網站根目錄之外。切勿公開此金鑰、將其貼入支援請求，或提交至 Git。遺失原始金鑰可能使已加密資料無法讀取。若任何使用者資料已加密，請勿產生替換金鑰。

## 初始化金鑰

先以預覽模式執行一次下列指令：

```bash
php bin/console chamilo:security:initialize-at-rest-key
```

若回報尚無已加密資料且可佈建金鑰，請明確初始化：

```bash
php bin/console chamilo:security:initialize-at-rest-key --apply
```

若指令回報已存在相容金鑰，則不會進行替換。若已存在加密資料列，但金鑰遺失或不符，請**停止**並復原原始金鑰。

## 選擇受保護欄位

開啟**管理 > 設定 > 安全性**，並在加密使用者欄位設定中選取**個人簡介**、**電話**及／或**地址**。僅選取您打算保護的欄位。對所選欄位的新寫入會使用已驗證加密（libsodium XChaCha20-Poly1305）；舊有明文紀錄在明確回填之前仍可讀取。

## 檢查並回填既有資料

回填指令在未加上 `--apply` 時不會修改紀錄。建議先以單一 QA 使用者測試，再擴大批次範圍：

```bash
php bin/console chamilo:security:encrypt-user-biographies --user-id=102
php bin/console chamilo:security:encrypt-user-profile-fields --field=phone --user-id=102
php bin/console chamilo:security:encrypt-user-profile-fields --field=address --user-id=102
```

確認金鑰可用、欄位選擇、備份與 QA 帳號無誤後，再執行有意為之的試點：

```bash
php bin/console chamilo:security:encrypt-user-biographies --user-id=102 --apply
php bin/console chamilo:security:encrypt-user-profile-fields --field=phone --user-id=102 --apply
```

請將 `102` 替換為實際的測試使用者 ID。對於較大的資料集，可使用選用的 `--batch-size` 引數（1–500），檢視指令輸出與應用程式行為，並規劃在維護時段內分批執行。在沒有經過測試的回復策略之前，請勿對整個資料庫執行回填。

## 營運限制

- 此為欄位層級加密的第一階段，並非完整資料庫加密。
- 較舊的直接 SQL 整合與匯出可能無法讀取加密值；部署前請加以驗證。
- **沒有**對應且可復原金鑰的資料庫備份並不足夠。
- 請勿記錄原始欄位內容，亦勿在診斷資訊中包含金鑰材料。
- 僅回復應用程式程式碼並不會解密已儲存的值。

一般平台安全性選項請參閱[安全性設定](../platform-settings/security-settings.md)。實作：[Chamilo LMS PR #9491](https://github.com/chamilo/chamilo-lms/pull/9491)。