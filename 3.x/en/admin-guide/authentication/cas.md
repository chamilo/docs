# CAS

CAS (Central Authentication Service) is a single sign-on protocol widely used by universities and research institutions. Chamilo 3.1 restores native CAS authentication in its Symfony Security and Vue login flow. No additional package or database migration is required for this restoration.

## Requirements

* A working CAS server speaking CAS 1.0, 2.0 or 3.0 over HTTPS with a certificate trusted by the Chamilo server.
* A canonical, active Chamilo Access URL. Production CAS login requires HTTPS on Chamilo as well; configure your reverse proxy and trusted proxies correctly.
* Permission from your CAS administrator to register the Chamilo service URLs.

## Configure CAS

Open **Administration > Settings > CAS**. The existing [CAS settings](../platform-settings/cas-settings.md) control the server connection and provisioning policy. Configure them for the intended portal.

For example, for a CAS service at `https://cas.example.org/cas`:

| Setting | Example |
| --- | --- |
| `cas_server` | `cas.example.org` (host only, not a full URL) |
| `cas_server_uri` | `/cas` |
| `cas_port` | `443` |
| `cas_protocol` | `CAS2` (default), `CAS1` or `CAS3` as supported by your server |
| `cas_add_user_activate` | `false` until account provisioning has been reviewed |
| `cas_activate` | `true` once the server is configured |

On the login page, the CAS sign-in button starts the flow at `/connect/cas`. The CAS server returns the user to `/connect/cas/check` with a service ticket and the one-time state used for the request. Register the canonical HTTPS callback, including its dynamic state query parameter, with your institutional CAS service configuration. Do not broadly permit arbitrary service URLs. Ticket validation is performed over verified TLS using the corresponding CAS protocol endpoint.

## Account handling

Existing users must already have a CAS authentication source for the applicable portal. A collision with an existing local username or e-mail address is not a reason to link accounts automatically. Disabled accounts and accounts requiring Chamilo's own two-factor authentication are not bypassed by CAS.

For new accounts, `cas_add_user_activate` controls provisioning:

* `false` — Do not create unknown users.
* `platform` — Create student accounts using CAS attributes (legacy `true` is treated as `platform`).
* `extldap` — Use the configured LDAP directory over verified LDAPS.

CAS does not automatically grant privileged roles or synchronize passwords. `update_user_info_cas_with_ldap` can refresh the first name, last name and e-mail for CAS users from the configured LDAP directory. Test the attribute mappings and provisioning with a dedicated test account.

## Optional authentication policies

The existing `config/authentication.yaml` supports optional CAS policies under the relevant Access URL authentication configuration. See `config/authentication.dist.yaml` in the LMS for the current structure. The `cas` block supports:

```yaml
cas:
    force_as_login_method: false
    force_redirect: false
    skip_force_redirect_in: []
    attributes: {}
```

`force_as_login_method` restricts the available login method; `force_redirect` redirects eligible unauthenticated requests to CAS. `skip_force_redirect_in` lists URI fragments exempted from that redirect. The `attributes` map can override the CAS attribute names for `firstname`, `lastname` and `email`. These options are not needed for the basic login button.

Test normal login before enabling a forced mode, and retain a tested administrator recovery procedure. Clear the Symfony cache after editing server-side authentication configuration.

## Test and troubleshoot

1. Enable CAS on a test portal and verify the sign-in button appears.
2. Sign in with an existing CAS account. Confirm the correct local user and portal.
3. If provisioning is enabled, sign in using an approved new test identity and confirm that the new account has student privileges.
4. Test rejected credentials, username collisions and a disabled account. Check that invalid or replayed service tickets are rejected.
5. Log out from Chamilo and verify the configured CAS logout flow. Test forced modes only after ordinary login works.

If the button is missing or login fails, check the activation setting, server host/path/port/protocol, canonical Access URL, HTTPS certificate trust, service registration and effective per-portal configuration. Never disable certificate verification to work around a configuration error.

Legacy SAML 1.1 and server-initiated Single Logout are not supported by this restoration. Login, user addition, account protection and logout were tested with an HTTPS CAS protocol test server; validate interoperability with your institution's CAS server before production rollout.

Implementation: [PR #9559](https://github.com/chamilo/chamilo-lms/pull/9559), issue [#9074](https://github.com/chamilo/chamilo-lms/issues/9074).
