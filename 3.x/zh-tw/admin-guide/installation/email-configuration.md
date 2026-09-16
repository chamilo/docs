# 電子郵件設定

Chamilo 現已從管理儀表板的平台設定區段管理電子郵件傳送設定（有專屬的電子郵件項目）。電子郵件會在帳號建立、密碼重設、課程通知、訊息警示及其他平台事件時傳送。電子郵件傳遞透過 `MAILER_DSN` 設定項目進行設定。

## 設定

在 /admin/settings/mail 區段設定 `Mail DSN` 選項。格式取決於您的電子郵件傳輸方式。

### SMTP

最常見的設定，適用於任何 SMTP 伺服器：

```bash
# Let the system decide
native://default

# Basic SMTP
smtp://username:password@smtp.example.com:587

# SMTP with TLS (most providers)
smtp://username:password@smtp.example.com:587?encryption=tls

# SMTP without authentication (local relay)
smtp://localhost:25
```

請將 `username`、`password` 及主機名稱替換為您的 SMTP 伺服器憑證。

### Amazon SES

```bash
# Using SMTP interface
ses+smtp://ACCESS_KEY:SECRET_KEY@default?region=us-east-1

# Using API
ses+api://ACCESS_KEY:SECRET_KEY@default?region=us-east-1
```

Symfony Amazon Mailer 傳輸已內嵌於 Chamilo。無需額外安裝。

### Mailjet

```bash
mailjet+api://API_KEY:SECRET_KEY@default
```

Symfony Mailjet 傳輸已內嵌於 Chamilo。無需額外安裝。

### Brevo（原 Sendinblue）

```bash
brevo+api://API_KEY@default
```

Symfony Brevo 傳輸已內嵌於 Chamilo。無需額外安裝。

### Microsoft 365 / Outlook（Microsoft Graph API）

Microsoft 正在淘汰 Exchange Online 中使用基本驗證的 SMTP，因此純 `smtp://user:password@smtp.office365.com:587` DSN 僅在租用戶管理員於該特定信箱明確啟用「已驗證的 SMTP」時才有效。請改為透過 Microsoft Graph API 傳送——完全不使用 SMTP：

```bash
microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@default?tenantId=TENANT_ID
```

Symfony Microsoft Graph 傳輸已內嵌於 Chamilo。無需額外安裝。

若要取得這三個值，請至 [Microsoft Entra 系統管理中心](https://entra.microsoft.com)：

1. 註冊應用程式。其 **應用程式（用戶端）識別碼** 與 **目錄（租用戶）識別碼** 分別為 `CLIENT_ID` 與 `TENANT_ID`。
2. 在 *API 權限* 下，新增 Microsoft Graph 的 **應用程式** 權限 `Mail.Send`（非委派權限），然後授與系統管理員同意。
3. 在 *憑證與祕密* 下，建立用戶端祕密。其 **值**（非其識別碼）即為 `CLIENT_SECRET`。

注意事項：

* 對用戶端祕密中在 URL 具有特殊意義的任何字元進行 URL 編碼（`@` 為 `%40`、`+` 為 `%2B`、`/` 為 `%2F`，依此類推）。
* 在 **從此電子郵件地址傳送所有電子郵件** 中設定的地址必須是租用戶內的真實信箱，否則 Microsoft 會拒絕該郵件。
* 若不希望每封平台電子郵件都在寄件者的 *寄件備份* 資料夾中儲存副本，請在 DSN 加上 `&noSave=true`。
* 針對國家雲端，請將 DSN 指向正確端點，且不含 `https://` 前置詞：`microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@microsoftgraph.chinacloudapi.cn?tenantId=TENANT_ID&authEndpoint=login.partner.microsoftonline.cn`。

**安全性警告：** `Mail.Send` *應用程式* 權限可讓已註冊的應用程式以租用戶中的**任何**信箱寄信，而不僅限於 Chamilo 所使用的信箱。請以 Exchange Online 應用程式存取原則將其限制為寄件信箱：

```powershell
New-ApplicationAccessPolicy -AppId CLIENT_ID -PolicyScopeGroupId no-reply@yourdomain.com -AccessRight RestrictAccess -Description "Restrict Chamilo to its sender mailbox"
```

### Gmail（開發／小型平台）

```bash
gmail+smtp://your-email@gmail.com:app-password@default
```

請使用應用程式密碼，而非一般 Gmail 密碼。此方式僅適用於小型平台或開發用途，因為 Gmail 有傳送上限。

## 平台電子郵件設定

除傳輸方式外，請在同一頁面設定寄件者身分：

| 設定 | 說明 |
|---------|-------------|
| **以這個（機構）名稱作為所有電子郵件的寄件來源** | 與系統電子郵件相關聯的顯示名稱。 |
| **從此電子郵件地址傳送所有電子郵件** | 所有系統電子郵件的「寄件者」地址。必須是您的郵件傳輸所接受的有效地址。建議使用如 `no-reply@yourdomain.com` 的「請勿回覆」地址，以避免收到對自動郵件的無意義回覆。 |

## 測試電子郵件傳送

設定 `MAILER_DSN` 後，請測試電子郵件是否能成功傳送：前往 *管理* > *系統* > *電子郵件測試器*，指定收件者、主旨與郵件本文，然後點選 **傳送測試電子郵件**。

若指令執行完成且沒有錯誤，但收件者未收到郵件：

1. 檢查收件者的垃圾郵件／垃圾匣。
2. 確認您的寄件網域已正確設定 DNS 紀錄（SPF、DKIM、DMARC）。
3. 檢查郵件服務供應商的寄送紀錄，查看是否有退信或拒收。
4. 檢視 Chamilo 日誌 `var/log/prod.log` 中的郵件程式錯誤。
5. 在電子郵件設定中啟用 *郵件：除錯*（3.0 尚不提供，即將推出）。

## 實驗性功能：電子郵件佇列（非同步傳送）

預設情況下，電子郵件會在網頁請求期間同步傳送。為提升效能，可使用 Symfony Messenger 設定非同步傳送：

```yaml
# config/packages/messenger.yaml
framework:
    messenger:
        transports:
            async: '%env(MESSENGER_TRANSPORT_DSN)%'
        routing:
            'Symfony\Component\Mailer\Messenger\SendEmailMessage': async
```

啟用非同步傳送後，電子郵件會先進入佇列，再由背景工作程序傳送：

```bash
php bin/console messenger:consume async
```

請將此程序以系統服務方式執行（例如透過 systemd 或 supervisord），使其持續運作。

## 提示

* **生產環境平台請使用專用電子郵件服務**（SES、Mailjet、Brevo）。直接以 SMTP 連線至自有郵件伺服器需謹慎設定，以免影響送達率。
* **為寄件網域設定 SPF、DKIM 與 DMARC** DNS 紀錄，以提升送達率並避免郵件被標為垃圾信。您也可以在電子郵件設定頁面設定 DKIM 標頭。
* **在活躍使用者超過數十人的平台上使用非同步傳送**——同步傳送電子郵件可能明顯拖慢網頁請求。