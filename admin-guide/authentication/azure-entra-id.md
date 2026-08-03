# Azure Entra ID

Microsoft rebranded Azure Active Directory (Azure AD) as **Microsoft Entra ID** in 2023 — they're the same service, and Chamilo's code and configuration still refer to it as `azure`. This page covers the Azure-specific parts of the integration: app registration, group-based role mapping, certificate authentication, and the dedicated user/group sync commands. For the configuration keys shared by every provider (`enabled`, `title`, `allow_create_new_users`, and so on) and the general `authentication.yaml` structure, see [OAuth2](oauth2.md).

## Registering Chamilo in Microsoft Entra ID

1. In the Entra admin center, create an **App registration** for Chamilo.
2. Set the redirect URI (platform type **Web**) to:

   ```
   https://your-chamilo-url/connect/azure/check
   ```

3. Note the **Application (client) ID** and **Directory (tenant) ID** — you'll need both.
4. Under **Certificates & secrets**, create either a client secret or upload a certificate (see [Certificate Authentication](#certificate-authentication) below).
5. Under **API permissions**, add the Microsoft Graph permissions below and grant admin consent.

| Permission | Type | Needed for |
|------------|------|-------------|
| `User.Read` | Delegated | Basic sign-in |
| `GroupMember.Read.All` | Delegated | Group-based role mapping at login |
| `User.Read.All` | Application | `app:azure-sync-users` |
| `GroupMember.Read.All` or `Group.Read.All` | Application | `app:azure-sync-users` and `app:azure-sync-usergroups` |

Application permissions require admin consent and are only used by the sync console commands (via the `client_credentials` grant), never by an interactive user's login.

## Basic Configuration

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
        url_login: "https://login.microsoftonline.com/"
        url_api: "https://graph.microsoft.com"
        allow_create_new_users: true
        allow_update_user_info: true
```

### Multi-tenant vs. single-tenant

The `tenant` value must match how the app registration's "supported account types" were set:

* A specific tenant GUID — single-tenant, only that organization's accounts can sign in
* `organizations` — any Entra ID tenant
* `common` — any Entra ID tenant plus personal Microsoft accounts

## Required User Attributes

Every Entra ID user who needs to log in to Chamilo must have `mail` and `mailNickname` populated — login throws an error if either is empty (along with the immutable Entra object ID, which is always present). Field mapping from Microsoft Graph to Chamilo is **fixed** for Azure (unlike the generic OAuth2 provider, which lets you configure field mapping):

| Chamilo field | Microsoft Graph source |
|---------------|------------------------|
| First name | `givenName` |
| Last name | `surname` |
| E-mail | `mail` |
| Username | `userPrincipalName` |
| Phone | `telephoneNumber`, then `businessPhones[0]`, then `mobilePhone` |
| Active | `accountEnabled` |
| Interface language | `preferredLanguage` (matched to an installed Chamilo language, falling back to the platform default) |

Three extra fields are also written on every successful login: `organisationemail` (= `mail`), `azure_id` (= `mailNickname`), and `azure_uid` (= the Entra object ID). These back the account-matching logic below.

## Matching Logins to Existing Chamilo Accounts

Set `existing_user_verification_order` to a comma-separated list of the digits `1`–`3` to control how an incoming Entra ID login is matched to an existing Chamilo account:

| Value | Matches against |
|-------|------------------|
| `1` | Extra field `organisationemail` == Entra `mail` |
| `2` | Extra field `azure_id` == Entra `mailNickname` |
| `3` | Extra field `azure_uid` == Entra object ID |

Positions are tried in the order listed; the first active (not soft-deleted) match wins. An invalid or empty value defaults to `1,2,3`. If none of the configured positions match — which is always the case the very first time a given user logs in, since those extra fields are only populated *after* a successful login — Chamilo falls back to matching Chamilo's own `email` field against Entra `mail`, then `username` against `userPrincipalName`, regardless of what you configured.

## Group-Based Role Mapping

Map Entra ID security groups to Chamilo roles with their Object IDs (GUIDs):

```yaml
authentication:
  1:
    oauth2:
      azure:
        group_id:
          admin: "<entra-group-object-id>"
          session_admin: "<entra-group-object-id>"
          teacher: "<entra-group-object-id>"
```

On every login, Chamilo calls Microsoft Graph `/v1.0/me/memberOf` with the user's own access token and checks the returned groups against these three IDs, in the order **admin → session_admin → teacher**. The first match wins — a user in both the admin and teacher groups is promoted to admin only. Anyone not in any configured group keeps their existing role (or the default student role, on first login). This requires the delegated `GroupMember.Read.All` permission listed above.

## Certificate Authentication

As an alternative to `client_secret`, authenticate with a certificate instead:

```yaml
authentication:
  1:
    oauth2:
      azure:
        client_certificate_private_key: "<PEM private key, single line, with \\n for line breaks>"
        client_certificate_thumbprint: "<hex SHA1 thumbprint>"
```

Upload the matching public certificate under **Certificates & secrets** in the app registration, and copy its thumbprint (shown in hex in the portal) into `client_certificate_thumbprint`. When both keys are set, Chamilo builds a signed JWT client assertion (RS256) instead of sending `client_secret` — this applies to interactive logins and to the sync commands' app-only authentication alike.

## Syncing Users and Groups from Entra ID

Two console commands provision and maintain Chamilo accounts directly from Entra ID, independent of anyone logging in interactively. Both authenticate app-only (`client_credentials`), so they need the **application** Graph permissions listed above, and both are meant to be scheduled in cron rather than run manually.

### `app:azure-sync-users`

Pulls users from Microsoft Graph and provisions/updates the matching Chamilo accounts using the same field mapping and account-matching logic as an interactive login.

* By default it pulls the full user list (`/v1.0/users`, paged). Set `script_users_delta: true` to use `/v1.0/users/delta` instead — Chamilo persists the delta link between runs, so subsequent runs only fetch what changed.
* Set `deactivate_nonexisting_users: true` to deactivate Chamilo accounts (with auth source Azure) that no longer appear in the Entra ID pull. This only works in full-pull mode — delta mode never returns the complete user list, so this setting is ignored when `script_users_delta` is enabled.
* Group role mapping (above) is re-applied for every synced user during this run, not just at login.

### `app:azure-sync-usergroups`

Pulls Entra ID groups and mirrors them as Chamilo classes (`Usergroup`).

* Pulls the full group list (`/v1.0/groups`) or, with `script_usergroups_delta: true`, the delta endpoint, with its own separately-tracked delta link.
* `group_filter_regex` restricts which groups are synced, matched against the group's display name.
* **Every run clears all existing members of the matching Chamilo class first**, then re-subscribes whichever members Graph currently returns. Members are matched to *existing* Chamilo users only, using the same [account-matching logic](#matching-logins-to-existing-chamilo-accounts) as login — this command never creates new user accounts, and any group member it can't match to an existing Chamilo account is silently skipped.

## Known Limitations

* **No single logout.** Signing out of Chamilo does not sign the user out of Entra ID or other connected applications. A `force_logout` configuration key exists in `authentication.yaml` but is not currently implemented — treat it as reserved, not functional.
* **Password reset is meaningless for Azure accounts.** Since authentication happens entirely through Entra ID, Chamilo does not maintain a usable local password for these accounts.

## Troubleshooting

* Login failures (missing required attributes, Graph API errors) surface to the user as a flash message on the login page.
* The sync commands log problems per-record with warnings and continue processing the rest of the batch rather than aborting on the first error — check the command's console output (or wherever your cron captures it) after each run.
* Keep the standard Chamilo login form enabled so administrators always have a way in if the Entra ID integration misbehaves.
