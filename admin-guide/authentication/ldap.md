# LDAP

Chamilo 可以透過 LDAP 伺服器進行使用者認證，包括 Microsoft Active Directory。LDAP 的設定位於 `config/authentication.yaml` 中。

## 設定

```yaml
authentication:
  1:
    ldap:
      main:
        enabled: true
        title: "使用 LDAP 登入"
        connection_string: "ldap://ldap.yourorg.com:389"
        protocol_version: 3
        referrals: false
        force_as_login_method: false
```

### 綁定與搜尋

有兩種方法可以在目錄中定位使用者：

**直接綁定** — 直接從使用者名稱構建 DN：

```yaml
        dn_string: "uid=%s,ou=people,dc=yourorg,dc=com"
```

**搜尋綁定** — 先使用服務帳戶搜尋目錄，然後以找到的使用者進行綁定：

```yaml
        base_dn: "dc=yourorg,dc=com"
        search_dn: "cn=readonly,dc=yourorg,dc=com"
        search_password: "service-account-password"
        query_string: "(uid=%s)"
        uid_key: "uid"
```

對於 Active Directory，使用 `sAMAccountName` 作為 `uid_key`，並將 `query_string` 調整為 `(sAMAccountName=%s)`。

### 屬性對應

在 `data_correspondence` 下將 LDAP 屬性對應到 Chamilo 使用者欄位：

```yaml
        data_correspondence:
          firstname: givenName
          lastname: sn
          email: mail
          phone: telephoneNumber   # 可選
          locale: preferredLanguage  # 可選
```

`firstname`、`lastname` 和 `email` 是必填欄位。系統會根據電子郵件或使用者名稱將使用者與現有的 Chamilo 帳戶進行匹配；如果找不到匹配且 `allow_create_new_users` 設為 true，則會建立一個新帳戶。

## 小提示

* **在正式環境中使用 LDAPS** — 將 `ldap://` 改為 `ldaps://`（端口 636）以使用加密連線。
* **服務帳戶** — 搜尋綁定帳戶僅需對使用者條目具有讀取權限。
* **先進行測試** — 在設定 Chamilo 之前，使用 `ldapsearch` 驗證您的連接字串和查詢。
* **`force_as_login_method: true`** — 隱藏其他登入方式，強制所有使用者透過 LDAP 登入。在測試期間將其設為 `false`，以便仍可透過標準表單以管理員身份登入。

有關完整參數參考，請參閱 [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration)。