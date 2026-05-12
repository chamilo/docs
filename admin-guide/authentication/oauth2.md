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

```yaml
authentication:
  1:
    oauth2:
      azure:
        enabled: true
        title: "Sign in with Microsoft"
        client_id: "<application-client-id>"
        client_secret: "<client-secret>"
        tenant: "<tenant-id>"
        url_login: "https://login.microsoftonline.com"
        path_authorize: "/<tenant-id>/oauth2/v2.0/authorize"
        path_token: "/<tenant-id>/oauth2/v2.0/token"
        url_api: "https://graph.microsoft.com"
        allow_create_new_users: true
        allow_update_user_info: true
```

Azure also supports group-based role mapping (mapping Azure group IDs to Chamilo roles such as teacher or admin), user delta sync commands, and certificate authentication instead of a client secret. See the [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration) for those options.

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
* When using Azure with existing users, configure `existing_user_verification_order` to control how Chamilo matches incoming users to existing accounts.
* Role assignment defaults to student; use group mapping to promote users to teacher or admin roles automatically.
