# LDAP

Chamilo 可針對 LDAP 伺服器進行使用者驗證，包含 Microsoft Active Directory。LDAP 於 `config/authentication.yaml` 中設定。

## Configuration

```yaml
authentication:
  1:
    ldap:
      main:
        enabled: true
        title: "Sign in with LDAP"
        connection_string: "ldap://ldap.yourorg.com:389"
        protocol_version: 3
        referrals: false
        force_as_login_method: false
```

### Bind and search

在目錄中定位使用者有兩種做法：

**Direct bind** — 直接以使用者名稱組出 DN：

```yaml
        dn_string: "uid=%s,ou=people,dc=yourorg,dc=com"
```

**Search bind** — 先以服務帳號搜尋目錄，再以找到的使用者進行 bind：

```yaml
        base_dn: "dc=yourorg,dc=com"
        search_dn: "cn=readonly,dc=yourorg,dc=com"
        search_password: "service-account-password"
        query_string: "(uid=%s)"
        uid_key: "uid"
```

若為 Active Directory，請將 `uid_key` 設為 `sAMAccountName`，並將 `query_string` 調整為 `(sAMAccountName=%s)`。

### Attribute mapping

在 `data_correspondence` 下將 LDAP 屬性對應至 Chamilo 使用者欄位：

```yaml
        data_correspondence:
          firstname: givenName
          lastname: sn
          email: mail
          phone: telephoneNumber   # optional
          locale: preferredLanguage  # optional
```

`firstname`、`lastname` 與 `email` 為必填。系統會以電子郵件或使用者名稱將使用者對應至既有的 Chamilo 帳號；若找不到對應且 `allow_create_new_users` 為 true，則會建立新帳號。

## Tips

* **正式環境請使用 LDAPS** — 將 `ldap://` 改為 `ldaps://`（連接埠 636）以啟用加密連線。
* **服務帳號** — search bind 所用帳號只需對使用者項目具備讀取權限。
* **先進行測試** — 在設定 Chamilo 之前，請先以 `ldapsearch` 驗證連線字串與查詢。
* **`force_as_login_method: true`** — 會隱藏其他登入方式，並強制所有使用者透過 LDAP 登入。測試期間請維持 `false`，以便仍能以標準表單登入管理員帳號。

完整參數說明請參閱 [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration)。