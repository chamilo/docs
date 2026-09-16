# SCIM

**SCIM** (System for Cross-domain Identity Management) automates user provisioning — creating, updating, and deactivating Chamilo accounts based on changes in your identity provider. Unlike OAuth2 or LDAP, SCIM handles provisioning, not login.

| Scenario | SCIM action |
|----------|-------------|
| A new employee joins | Creates a Chamilo account |
| An employee's name or role changes | Updates the Chamilo account |
| An employee leaves | Deactivates or deletes the Chamilo account |

## Configuration

### 1. Set the SCIM token

In your `.env` (or `.env.local`) file, define a secure random token:

```
SCIM_TOKEN=your-secure-random-token
```

This token is used by your identity provider to authenticate its requests to Chamilo's SCIM endpoints.

### 2. Enable SCIM in authentication.yaml

```yaml
authentication:
  1:
    scim:
      main:
        enabled: true
        auth_source: platform
```

Clear and warm the cache after editing:

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### 3. Configure your identity provider

In your identity provider (Azure AD, Okta, etc.):

1. Add Chamilo as a SCIM application
2. Set the SCIM base URL to `https://your-chamilo-url/scim/v2/`
3. Enter the token from step 1 as the bearer token
4. Map provider attributes to SCIM standard fields (userName, name.givenName, name.familyName, emails)
5. Enable automatic provisioning

## SCIM endpoints

Chamilo implements SCIM 2.0:

| Endpoint | Method | Action |
|----------|--------|--------|
| `/scim/v2/Users` | GET | List users |
| `/scim/v2/Users` | POST | Create a user |
| `/scim/v2/Users/{id}` | GET | Get a user |
| `/scim/v2/Users/{id}` | PUT | Replace a user |
| `/scim/v2/Users/{id}` | PATCH | Update a user |
| `/scim/v2/Users/{id}` | DELETE | Remove a user |

## Tips

* **Start with a test group** — provision a small set of users before enabling SCIM for the whole organization.
* **Combine with OAuth2** — a common setup uses Azure AD OAuth2 for login and Azure AD SCIM for provisioning.
* **Monitor logs** — check both Chamilo (`var/log/`) and your identity provider's provisioning logs for errors.
