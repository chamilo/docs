# OAuth2

Die OAuth2-Authentifizierung wird in `config/authentication.yaml` konfiguriert. Chamilo bietet integrierte Unterstützung für Azure AD, Keycloak, Facebook und jeden generischen OAuth2-kompatiblen Anbieter.

## Schritt 1 — Chamilo bei Ihrem Identitätsanbieter registrieren

Erstellen Sie eine Anwendung im Admin-Panel Ihres Anbieters und setzen Sie die **Redirect-URI** auf:

```
https://your-chamilo-url/connect/<provider>/check
```

Dabei ist `<provider>` entweder `azure`, `keycloak`, `facebook` oder der Name, den Sie einem generischen Anbieter geben. Notieren Sie sich die **Client-ID** und das **Client-Secret**.

## Schritt 2 — authentication.yaml konfigurieren

Aktivieren Sie den Anbieter und geben Sie dessen Zugangsdaten an. Alle Anbieter teilen sich diese gemeinsamen Schlüssel:

| Schlüssel | Beschreibung |
|-----------|--------------|
| `enabled` | `true` zum Aktivieren |
| `title` | Bezeichnung, die auf dem Anmeldebutton angezeigt wird |
| `client_id` | Von Ihrem Identitätsanbieter |
| `client_secret` | Von Ihrem Identitätsanbieter |
| `allow_create_new_users` | Automatisches Erstellen eines Chamilo-Kontos bei der ersten Anmeldung |
| `allow_update_user_info` | Synchronisieren der Benutzerdaten bei jeder Anmeldung |
| `force_as_login_method` | Andere Methoden deaktivieren und diese erzwingen |

### Azure AD (Microsoft Entra ID)

```yaml
authentication:
  1:
    oauth2:
      azure:
        enabled: true
        title: "Mit Microsoft anmelden"
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

Azure unterstützt auch gruppenbasiertes Rollen-Mapping (Zuordnung von Azure-Gruppen-IDs zu Chamilo-Rollen wie Lehrer oder Administrator), Benutzer-Delta-Sync-Befehle und Zertifikatsauthentifizierung anstelle eines Client-Secrets. Weitere Optionen finden Sie im [Wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).

### Keycloak

```yaml
authentication:
  1:
    oauth2:
      keycloak:
        enabled: true
        title: "Mit Keycloak anmelden"
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
        title: "Mit Facebook anmelden"
        client_id: "<app-id>"
        client_secret: "<app-secret>"
        graph_api_version: "v20.0"
        allow_create_new_users: true
```

### Generisches OAuth2

Verwenden Sie dies für Google, GitLab oder jeden OAuth2-kompatiblen Anbieter:

```yaml
authentication:
  1:
    oauth2:
      myprovider:
        enabled: true
        title: "Mit MyProvider anmelden"
        client_id: "<client-id>"
        client_secret: "<client-secret>"
        urlAuthorize: "https://provider.example.com/oauth/authorize"
        urlAccessToken: "https://provider.example.com/oauth/token"
        urlResourceOwnerDetails: "https://provider.example.com/api/user"
        scopes: ["openid", "email", "profile"]
        allow_create_new_users: true
```

Feldzuordnungen (wie Anbieterattribute zu Chamilo-Feldern wie `firstname`, `lastname`, `email` usw. zugeordnet werden) und Rollenzuordnungen sind ebenfalls konfigurierbar. Die vollständige Liste der Zuordnungsschlüssel finden Sie im [Wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).

## Schritt 3 — Cache leeren und testen

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

Melden Sie sich von Chamilo ab. Der Button des konfigurierten Anbieters sollte auf der Anmeldeseite erscheinen. Testen Sie mit einem dedizierten Konto, bevor Sie es für alle Benutzer freigeben.

## Tipps

* Behalten Sie das Standard-Anmeldeformular aktiviert, damit Administratoren sich immer anmelden können, falls Probleme mit OAuth2 auftreten.
* Wenn Sie Azure mit bestehenden Benutzern verwenden, konfigurieren Sie `existing_user_verification_order`, um zu steuern, wie Chamilo eingehende Benutzer mit bestehenden Konten abgleicht.
* Die Rollenzuweisung ist standardmäßig auf Schüler eingestellt; verwenden Sie Gruppenzuordnungen, um Benutzer automatisch zu Lehrer- oder Administratorrollen zu befördern.