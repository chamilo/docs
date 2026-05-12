# SSO Configuration

This page covers topics that apply across authentication methods.

## Multiple providers

You can enable more than one authentication method at the same time. Each enabled provider shows its own button on the login page alongside the standard username/password form. Users choose their preferred method.

Keep the standard form enabled so platform administrators can always log in, even if an external provider is misconfigured.

## Authentication priority

When multiple methods are active, the system checks credentials in this order:

1. LDAP (if `force_as_login_method` is set)
2. OAuth2 providers (in the order they appear in `authentication.yaml`)
3. Internal Chamilo database

## JWT tokens for API access

Chamilo uses JWT (JSON Web Tokens) for its REST API. Token lifetime and refresh behaviour are configured in `config/packages/lexik_jwt_authentication.yaml`. This is separate from the SSO login flow and applies to API clients only.

## Troubleshooting

### Login button does not appear after configuration

The cache must be cleared after every change to `authentication.yaml`:

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### Users cannot log in via SSO

* **Redirect URI mismatch** — The URI registered in your identity provider must exactly match `https://your-chamilo-url/connect/<provider>/check`.
* **Clock drift** — SSO tokens are time-sensitive. Ensure your server clock is synchronized (NTP).
* **SSL certificate** — Chamilo must trust the identity provider's certificate. Check for self-signed certificate issues.
* **Logs** — Review `var/log/` and your identity provider's logs for specific error messages.

### Users are created with the wrong role

Check the role mapping configuration for the provider. New users default to the student role unless a group or attribute mapping promotes them.

### Users exist in the provider but cannot access Chamilo

* If `allow_create_new_users` is false, the user must already have a Chamilo account whose email or username matches the provider's data.
* Check that the user is not deactivated in Chamilo.
* For Azure, review `existing_user_verification_order` to understand how Chamilo matches incoming users to existing accounts.
