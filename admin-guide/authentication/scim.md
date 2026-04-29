# SCIM

**SCIM** (System for Cross-domain Identity Management) is a standard for automating user provisioning — automatically creating, updating, and deactivating user accounts based on changes in your identity provider.

## What SCIM Does

Unlike OAuth2 or LDAP (which handle authentication), SCIM handles **provisioning**:

| Scenario | SCIM Action |
|----------|------------|
| A new employee joins | SCIM creates a Chamilo account automatically |
| An employee's name or role changes | SCIM updates the Chamilo account |
| An employee leaves | SCIM deactivates or deletes the Chamilo account |

SCIM works alongside your authentication method. For example, you might use Azure AD for OAuth2 login and SCIM for automatic account provisioning.

## How It Works

1. Your identity provider (Azure AD, Okta, etc.) is configured to push user changes to Chamilo
2. Chamilo exposes SCIM endpoints that receive these changes
3. User accounts are created, updated, or deactivated automatically

## Configuration

### In Chamilo

1. Enable SCIM in the platform settings
2. Note the SCIM endpoint URL (typically `https://your-chamilo-url/scim/v2/`)
3. Generate an API token for the identity provider to authenticate with

### In Your Identity Provider

1. Add Chamilo as a SCIM application
2. Enter the SCIM endpoint URL and API token
3. Configure attribute mapping (how provider fields map to Chamilo user fields)
4. Enable automatic provisioning

## SCIM Endpoints

Chamilo implements the following SCIM 2.0 endpoints:

| Endpoint | Method | Description |
|----------|--------|-------------|
| `/Users` | GET | List users |
| `/Users` | POST | Create a user |
| `/Users/{id}` | GET | Get a specific user |
| `/Users/{id}` | PUT | Update a user |
| `/Users/{id}` | PATCH | Partially update a user |
| `/Users/{id}` | DELETE | Delete a user |

## Tips

* **Start with a test group** — Provision a small group of test users first before enabling SCIM for the entire organization
* **Monitor provisioning logs** — Check both Chamilo and your identity provider's logs for provisioning errors
* **Plan attribute mapping carefully** — Ensure that all required Chamilo fields are mapped to corresponding attributes in your identity provider
