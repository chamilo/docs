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
| `force_as_login_method` | Hide the other methods, and show this provider's button alone |
| `force_redirect` | Send an anonymous visitor to this provider automatically, with no button to click |
| `skip_force_redirect_in` | List of URL fragments that `force_redirect` leaves alone |

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

## Optional — Send every visitor to the provider automatically

Two keys control how much of the login page a visitor still sees. They are independent, and they answer different needs:

| Key | What the visitor sees |
|-----|-----------------------|
| `force_as_login_method: true` | The login page, reduced to this provider's button. The visitor clicks it. |
| `force_redirect: true` | No login page at all. The browser goes to the provider on its own. |

Use `force_redirect` when the identity provider owns every account, and the local login form has no purpose:

```yaml
authentication:
  1:
    oauth2:
      keycloak:
        enabled: true
        title: "Sign in with Keycloak"
        force_redirect: true
        skip_force_redirect_in: ['/catalogue']
```

Only one provider can force the redirect. If several declare it, the first enabled one wins. LDAP cannot declare it, because it authenticates through the local form.

The redirect applies to a page the browser displays, and to nothing else. These requests always stay where they are:

* An API, SCIM, MCP or XHR call, which cannot follow a handshake meant for a browser.
* An image, a stylesheet or a file download.
* Any write (POST, PUT, DELETE), because a browser replays a redirected write as a GET and drops the body.
* The provider handshake itself (`/connect/...`) and `/logout`, which would otherwise build an endless loop.
* A visitor who already has a session, including the anonymous account of a public course.

Add a URL fragment to `skip_force_redirect_in` for each public area that must stay open, such as a course catalogue.

### The escape hatch

An unreachable provider would lock every account out, the local administrator included. Append `skipForcedRedirect=1` to any URL to reach the local login form anyway:

```
https://your-chamilo-url/login?skipForcedRedirect=1
```

The choice stays in the session, so the pages that follow keep showing the form. It also cancels `force_as_login_method` for that session, which puts every login method back on the page. To give the platform back to the provider, use `?skipForcedRedirect=0`, or close the browser session.

The parameter belongs to `force_redirect` alone. While no provider declares that key, the parameter does nothing at all, and `force_as_login_method` keeps its single button.

Keep this URL with your recovery notes. Test it before you enable `force_redirect` in production.

## Step 3 — Clear cache and test

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

Log out of Chamilo. The configured provider's button should appear on the login page. Test with a dedicated account before rolling out to all users.

## Tips

* Keep the standard login form enabled so administrators can always log in if OAuth2 has issues. If you set `force_redirect`, learn the `?skipForcedRedirect=1` URL instead: it is the only way back to that form.
* Role assignment defaults to student; use group mapping (Azure) to promote users to teacher or admin roles automatically — see [Azure Entra ID](azure-entra-id.md) for details on that and on matching incoming users to existing accounts.
