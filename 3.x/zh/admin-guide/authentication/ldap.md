# LDAP

Chamilo 可以对 LDAP 服务器（包括 Microsoft Active Directory）进行用户认证。LDAP 在 `config/authentication.yaml` 中配置。

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

在目录中定位用户有两种方式：

**Direct bind** — 直接根据用户名构造 DN：

```yaml
        dn_string: "uid=%s,ou=people,dc=yourorg,dc=com"
```

**Search bind** — 先使用服务账户搜索目录，再以找到的用户进行绑定：

```yaml
        base_dn: "dc=yourorg,dc=com"
        search_dn: "cn=readonly,dc=yourorg,dc=com"
        search_password: "service-account-password"
        query_string: "(uid=%s)"
        uid_key: "uid"
```

对于 Active Directory，将 `uid_key` 设为 `sAMAccountName`，并将 `query_string` 调整为 `(sAMAccountName=%s)`。

### Attribute mapping

在 `data_correspondence` 下将 LDAP 属性映射到 Chamilo 用户字段：

```yaml
        data_correspondence:
          firstname: givenName
          lastname: sn
          email: mail
          phone: telephoneNumber   # optional
          locale: preferredLanguage  # optional
```

`firstname`、`lastname` 和 `email` 为必填项。系统通过电子邮件或用户名将用户匹配到已有的 Chamilo 账户；若未找到匹配项且 `allow_create_new_users` 为 true，则会创建新账户。

## Tips

* **生产环境使用 LDAPS** — 将 `ldap://` 改为 `ldaps://`（端口 636）以使用加密连接。
* **服务账户** — 搜索绑定账户只需对用户条目具有只读权限。
* **先做测试** — 在配置 Chamilo 之前，用 `ldapsearch` 验证连接字符串和查询。
* **`force_as_login_method: true`** — 隐藏其他登录方式，强制所有用户通过 LDAP 登录。测试期间请保持为 `false`，以便仍可通过标准表单以管理员身份登录。

完整参数说明请参见 [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration)。