# OAuth2

Chamilo 2.0 supports OAuth2 authentication, allowing users to log in using their accounts from external identity providers. This is the most common authentication method for enterprise deployments.

## Supported Providers

Chamilo includes built-in support for:

| Provider | Description |
|----------|-------------|
| **Azure AD (Microsoft)** | Azure Active Directory / Microsoft Entra ID |
| **Keycloak** | Open-source identity and access management |
| **Facebook** | Facebook login (typically for public-facing platforms) |
| **Generic OAuth2** | Any OAuth2-compatible provider |

## Configuration Steps

### 1. Register Chamilo in Your Identity Provider

In your identity provider's administration panel:

1. Register a new application (client)
2. Set the **redirect URI** to: `https://your-chamilo-url/login/check-{provider}` (e.g., `/login/check-azure` for Azure)
3. Note the **Client ID** and **Client Secret**
4. Note the **Authorization URL**, **Token URL**, and **User Info URL** (for generic providers)

### 2. Configure Chamilo

![The OAuth2 configuration page showing fields for client ID, client secret, and provider-specific settings](/.gitbook/assets/admin-oauth2-config.png)

In the Chamilo platform settings or environment configuration:

1. Enable the desired OAuth2 provider
2. Enter the **Client ID** and **Client Secret** from step 1
3. Configure provider-specific settings:
   * **Azure**: Tenant ID
   * **Keycloak**: Server URL, realm name
   * **Generic**: Authorization URL, Token URL, User Info URL
4. Configure **user mapping** — how provider fields (email, name) map to Chamilo user fields
5. Configure **auto-registration** — whether new users are automatically created when they log in via OAuth2 for the first time

### 3. Test

1. Log out of Chamilo
2. On the login page, you should see a button for the configured provider
3. Click it to test the login flow
4. Verify that the user is correctly authenticated and their profile data is populated

## User Mapping

When a user logs in via OAuth2, Chamilo needs to match them to an existing user or create a new account. The mapping is typically based on:

* **Email** — Most common identifier
* **Username** — Matches the provider's username
* **External ID** — A unique identifier from the provider

## Auto-Registration

When enabled, new users who log in via OAuth2 for the first time are automatically created in Chamilo with:

* Name and email from the provider
* A default role (typically student)
* An auto-generated or provider-supplied username

## Tips

* **Test with a dedicated account first** — Before rolling out to all users, test the configuration thoroughly
* **Plan your user mapping** — Decide in advance how OAuth2 users map to Chamilo accounts, especially if you have existing users
* **Configure role assignment** — Set up rules for automatically assigning roles based on provider attributes (e.g., group membership in Azure AD)
