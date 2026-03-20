# SSO Configuration

This page covers general single sign-on settings and troubleshooting that apply across authentication methods.

## Multiple Authentication Methods

![The login page showing SSO buttons for external authentication providers alongside the standard login form](/.gitbook/assets/login-page-sso-buttons.png)

Chamilo can have multiple authentication methods enabled simultaneously. When configured, the login page shows:

* The standard username/password form
* Buttons for each configured external provider (OAuth2, CAS)

Users choose their preferred method.

## Session and Token Management

### Session Lifetime

Configure how long user sessions last before requiring re-authentication. This is set in the platform security settings.

### JWT Tokens

For API access, Chamilo uses JWT (JSON Web Tokens). Configure:

* Token lifetime
* Token refresh behavior

## Common Issues and Troubleshooting

### Users Cannot Log In via SSO

1. **Check the redirect URI** — The redirect URI configured in your identity provider must exactly match what Chamilo expects
2. **Check certificates** — For HTTPS-based SSO, ensure SSL certificates are valid and trusted
3. **Check the clock** — SSO tokens are time-sensitive. Ensure your Chamilo server's clock is synchronized (use NTP)
4. **Check logs** — Review Chamilo's logs (`var/log/`) and your identity provider's logs for error details

### Users Are Created but Have Wrong Roles

Review the user mapping and auto-registration settings. Check whether role assignment rules are configured correctly in the authentication provider settings.

### Users Exist in Provider but Cannot Access Chamilo

Verify that:

* Auto-registration is enabled (if users should be created automatically)
* The user's email or username matches an existing Chamilo account (if auto-registration is disabled)
* The user is not deactivated in Chamilo

## Tips

* **Test each provider independently** — When multiple auth methods are configured, test each one separately
* **Document your SSO setup** — Keep notes on Client IDs, redirect URIs, and attribute mappings for each provider. You will need them when troubleshooting or reconfiguring.
* **Plan for fallback** — Keep the standard login form enabled so that administrators can always log in even if SSO has issues
