# LDAP

Chamilo 可以与 LDAP 服务器（包括 Microsoft Active Directory）进行用户身份验证。LDAP 的配置在 `config/authentication.yaml` 文件中进行。

## 配置

```yaml
authentication:
  1:
    ldap:
      main:
        enabled: true
        title: "使用 LDAP 登录"
        connection_string: "ldap://ldap.yourorg.com:389"
        protocol_version: 3
        referrals: false
        force_as_login_method: false
```

### 绑定和搜索

有两种方法可以在目录中定位用户：

**直接绑定** — 直接从用户名构建 DN：

```yaml
        dn_string: "uid=%s,ou=people,dc=yourorg,dc=com"
```

**搜索绑定** — 首先使用服务账户搜索目录，然后以找到的用户身份进行绑定：

```yaml
        base_dn: "dc=yourorg,dc=com"
        search_dn: "cn=readonly,dc=yourorg,dc=com"
        search_password: "service-account-password"
        query_string: "(uid=%s)"
        uid_key: "uid"
```

对于 Active Directory，使用 `sAMAccountName` 作为 `uid_key`，并将 `query_string` 调整为 `(sAMAccountName=%s)`。

### 属性映射

在 `data_correspondence` 下将 LDAP 属性映射到 Chamilo 用户字段：

```yaml
        data_correspondence:
          firstname: givenName
          lastname: sn
          email: mail
          phone: telephoneNumber   # 可选
          locale: preferredLanguage  # 可选
```

`firstname`、`lastname` 和 `email` 是必需的。系统会根据电子邮件或用户名将用户与现有的 Chamilo 账户进行匹配；如果未找到匹配项且 `allow_create_new_users` 为 true，则会创建一个新账户。

## 提示

* **在生产环境中使用 LDAPS** — 将 `ldap://` 切换为 `ldaps://`（端口 636）以使用加密连接。
* **服务账户** — 搜索绑定的账户只需要对用户条目具有读取权限。
* **先进行测试** — 在配置 Chamilo 之前，使用 `ldapsearch` 验证您的连接字符串和查询。
* **`force_as_login_method: true`** — 隐藏其他登录方式，强制所有用户通过 LDAP 登录。在测试期间将其保持为 `false`，以便您仍可以通过标准表单以管理员身份登录。

有关完整的参数参考，请参见 [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration)。