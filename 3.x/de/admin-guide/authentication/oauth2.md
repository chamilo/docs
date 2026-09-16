# OAuth2

Die OAuth2-Authentifizierung wird in `config/authentication.yaml` konfiguriert. Chamilo bietet integrierte Unterstützung für Azure AD, Keycloak, Facebook und jeden generischen OAuth2-konformen Anbieter.

## Schritt 1 — Chamilo im Identitätsanbieter registrieren

Erstellen Sie eine Anwendung im Administrationsbereich Ihres Anbieters und setzen Sie die **Redirect-URI** auf:

```
https://your-chamilo-url/connect/<provider>/check
```

Dabei ist `<provider>` `azure`, `keycloak`, `facebook` oder der Name, den Sie einem generischen Anbieter geben. Notieren Sie die **Client ID** und das **Client Secret**.

## Schritt 2 — authentication.yaml konfigurieren

Aktivieren Sie den Anbieter und hinterlegen Sie dessen Zugangsdaten. Alle Anbieter teilen diese gemeinsamen Schlüssel:

| Key | Description |
|-----|-------------|
| `enabled` | `true` zum Aktivieren |
| `title` | Beschriftung, die auf der Anmelde-Schaltfläche angezeigt wird |
| `client_id` | Von Ihrem Identitätsanbieter |
| `client_secret` | Von Ihrem Identitätsanbieter |
| `allow_create_new_users` | Automatisches Anlegen eines Chamilo-Kontos bei der ersten Anmeldung |
| `allow_update_user_info` | Synchronisierung der Benutzerdaten bei jeder Anmeldung |
| `force_as_login_method` | Die anderen Methoden ausblenden und nur die Schaltfläche dieses Anbieters anzeigen |
| `force_redirect` | Einen anonymen Besucher automatisch zu diesem Anbieter weiterleiten, ohne dass eine Schaltfläche angeklickt werden muss |
| `skip_force_redirect_in` | Liste von URL-Fragmenten, die `force_redirect` unberührt lässt |

### Azure AD (Microsoft Entra ID)

Azure hat eine eigene Seite zu App-Registrierung, gruppenbasierter Rollenzuordnung, Zertifikatsauthentifizierung und den Befehlen zur Kontenbereitstellungssynchronisation — siehe [Azure Entra ID](azure-entra-id.md).

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

### Generisches OAuth2

Verwenden Sie dies für Google, GitLab oder jeden OAuth2-konformen Anbieter:

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

Die Feldzuordnung (wie Anbieterattribute auf `firstname`, `lastname`, `email` usw. von Chamilo abgebildet werden) und die Rollenzuordnung sind ebenfalls konfigurierbar. Die vollständige Liste der Zuordnungsschlüssel finden Sie im [Wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).

## Optional — Jeden Besucher automatisch zum Anbieter senden

Zwei Schlüssel steuern, wie viel von der Anmeldeseite ein Besucher noch sieht. Sie sind unabhängig und erfüllen unterschiedliche Anforderungen:

| Key | What the visitor sees |
|-----|-----------------------|
| `force_as_login_method: true` | Die Anmeldeseite, reduziert auf die Schaltfläche dieses Anbieters. Der Besucher klickt darauf. |
| `force_redirect: true` | Überhaupt keine Anmeldeseite. Der Browser wechselt von selbst zum Anbieter. |

Verwenden Sie `force_redirect`, wenn der Identitätsanbieter jedes Konto besitzt und das lokale Anmeldeformular keinen Zweck hat:

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

Nur ein Anbieter kann die Weiterleitung erzwingen. Wenn mehrere sie deklarieren, gewinnt der erste aktivierte. LDAP kann sie nicht deklarieren, weil es über das lokale Formular authentifiziert.

Die Weiterleitung gilt für eine Seite, die der Browser anzeigt, und für nichts anderes. Diese Anfragen bleiben immer dort, wo sie sind:

* Ein API-, SCIM-, MCP- oder XHR-Aufruf, der einem für einen Browser gedachten Handshake nicht folgen kann.
* Ein Bild, ein Stylesheet oder ein Dateidownload.
* Jeder Schreibvorgang (POST, PUT, DELETE), weil ein Browser eine umgeleitete Schreiboperation als GET wiederholt und den Body verwirft.
* Der Handshake des Anbieters selbst (`/connect/...`) und `/logout`, die sonst eine Endlosschleife erzeugen würden.
* Ein Besucher, der bereits eine Sitzung hat, einschließlich des anonymen Kontos eines öffentlichen Kurses.

Fügen Sie für jeden öffentlichen Bereich, der offen bleiben muss, ein URL-Fragment zu `skip_force_redirect_in` hinzu, etwa einen Kurskatalog.

### Die Notausstiegsluke

Ein nicht erreichbarer Anbieter würde jedes Konto aussperren, einschließlich des lokalen Administrators. Hängen Sie `skipForcedRedirect=1` an eine beliebige URL an, um trotzdem das lokale Anmeldeformular zu erreichen:

```
https://your-chamilo-url/login?skipForcedRedirect=1
```

Die Wahl bleibt in der Sitzung, sodass die nachfolgenden Seiten weiterhin das Formular anzeigen. Außerdem wird `force_as_login_method` für diese Sitzung aufgehoben, wodurch wieder jede Anmeldemethode auf der Seite erscheint. Um die Plattform wieder dem Anbieter zu überlassen, verwenden Sie `?skipForcedRedirect=0` oder beenden Sie die Browsersitzung.

Der Parameter gehört ausschließlich zu `force_redirect`. Solange kein Anbieter diesen Schlüssel deklariert, bewirkt der Parameter gar nichts, und `force_as_login_method` behält seine einzelne Schaltfläche.

Bewahren Sie diese URL zusammen mit Ihren Wiederherstellungsnotizen auf. Testen Sie sie, bevor Sie `force_redirect` in der Produktion aktivieren.

## Schritt 3 — Cache leeren und testen

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

Melden Sie sich von Chamilo ab. Die Schaltfläche des konfigurierten Anbieters sollte auf der Anmeldeseite erscheinen. Testen Sie mit einem dedizierten Konto, bevor Sie die Funktion für alle Benutzer ausrollen.

## Tipps

* Lassen Sie das Standard-Anmeldeformular aktiviert, damit Administratoren sich immer anmelden können, wenn OAuth2 Probleme hat. Wenn Sie `force_redirect` setzen, merken Sie sich stattdessen die URL `?skipForcedRedirect=1`: sie ist der einzige Weg zurück zu diesem Formular.
* Die Rollenzuweisung ist standardmäßig Student; verwenden Sie Gruppenzuordnung (Azure), um Benutzer automatisch zu Lehrer- oder Administratorrollen zu befördern — siehe [Azure Entra ID](azure-entra-id.md) für Details dazu und zum Abgleich eingehender Benutzer mit bestehenden Konten.