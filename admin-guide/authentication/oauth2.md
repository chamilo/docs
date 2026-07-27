# OAuth2

OAuth2 authentication is configured in `config/authentication.yaml`. Chamilo includes built-in support for Azure AD, Keycloak, Facebook, and any generic OAuth2-compliant provider.

## Step 1 — Register Chamilo in your identity provider

Create an application in your provider's admin panel and set the **redirect URI** to:

```
https://your-chamilo-url/connect/<provider>/check
```

Where `<provider>` is `azure`, `keycloak`, `facebook`, or the name you give a generic provider. Note the **Client ID** and **Client Secret**.

## Step 2 — Configure authentication.yaml

Enable the provider and supply its credentials. All providers share these common keys:

| Key | Description |
|-----|-------------|
| `enabled` | `true` to activate |
| `title` | Label shown on the login button |
| `client_id` | From your identity provider |
| `client_secret` | From your identity provider |
| `allow_create_new_users` | Auto-create a Chamilo account on first login |
| `allow_update_user_info` | Sync user data on each login |
| `force_as_login_method` | Disable other methods and force this one |

### Azure AD (Microsoft Entra ID)

Azure has its own dedicated page covering app registration, group-based role mapping, certificate authentication, and the account-provisioning sync commands — see [Azure Entra ID](azure-entra-id.md).

### Keycloak

```yaml
authentication:
  1:
    oauth2:
      keycloak:
        enabled: true
        title: "Sign in with Keycloak"
        client_id: "<client-id>"
        client_secret: "<client-secret>"
        auth_server_url: "https://keycloak.yourorg.com"
        realm: "your-realm"
        allow_create_new_users: true
```

### Facebook

```yaml
authentication:
  1:
    oauth2:
      facebook:
        enabled: true
        title: "Sign in with Facebook"
        client_id: "<app-id>"
        client_secret: "<app-secret>"
        graph_api_version: "v20.0"
        allow_create_new_users: true
```

### Generic OAuth2

Use this for Google, GitLab, or any OAuth2-compliant provider:

```yaml
authentication:
  1:
    oauth2:
      myprovider:
        enabled: true
        title: "Sign in with MyProvider"
        client_id: "<client-id>"
        client_secret: "<client-secret>"
        urlAuthorize: "https://provider.example.com/oauth/authorize"
        urlAccessToken: "https://provider.example.com/oauth/token"
        urlResourceOwnerDetails: "https://provider.example.com/api/user"
        scopes: ["openid", "email", "profile"]
        allow_create_new_users: true
```

Field mapping (how provider attributes map to Chamilo's `firstname`, `lastname`, `email`, etc.) and role mapping are also configurable. See the [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration) for the full list of mapping keys.

## Step 3 — Clear cache and test

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

Log out of Chamilo. The configured provider's button should appear on the login page. Test with a dedicated account before rolling out to all users.

## Tips

* Keep the standard login form enabled so administrators can always log in if OAuth2 has issues.
* Role assignment defaults to student; use group mapping (Azure) to promote users to teacher or admin roles automatically — see [Azure Entra ID](azure-entra-id.md) for details on that and on matching incoming users to existing accounts.
