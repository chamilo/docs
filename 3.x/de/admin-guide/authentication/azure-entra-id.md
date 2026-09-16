# Azure Entra ID

Microsoft hat Azure Active Directory (Azure AD) im Jahr 2023 in **Microsoft Entra ID** umbenannt — es handelt sich um denselben Dienst, und der Code sowie die Konfiguration von Chamilo bezeichnen ihn weiterhin als `azure`. Diese Seite behandelt die Azure-spezifischen Teile der Integration: App-Registrierung, gruppenbasierte Rollenzuordnung, Zertifikatsauthentifizierung und die dedizierten Synchronisierungsbefehle für Benutzer/Gruppen. Für die Konfigurationsschlüssel, die jeder Anbieter teilt (`enabled`, `title`, `allow_create_new_users` usw.), und die allgemeine Struktur von `authentication.yaml` siehe [OAuth2](oauth2.md).

## Chamilo in Microsoft Entra ID registrieren

1. Erstellen Sie im Entra-Admin-Center eine **App-Registrierung** für Chamilo.
2. Setzen Sie den Umleitungs-URI (Plattformtyp **Web**) auf:

   ```
   https://your-chamilo-url/connect/azure/check
   ```

3. Notieren Sie die **Anwendungs-ID (Client)** und die **Verzeichnis-ID (Mandant)** — Sie benötigen beide.
4. Erstellen Sie unter **Zertifikate & Geheimnisse** entweder ein Clientgeheimnis oder laden Sie ein Zertifikat hoch (siehe [Zertifikatsauthentifizierung](#certificate-authentication) weiter unten).
5. Fügen Sie unter **API-Berechtigungen** die folgenden Microsoft-Graph-Berechtigungen hinzu und erteilen Sie die Administratorzustimmung.

| Berechtigung | Typ | Benötigt für |
|------------|------|-------------|
| `User.Read` | Delegiert | Grundlegende Anmeldung |
| `GroupMember.Read.All` | Delegiert | Gruppenbasierte Rollenzuordnung bei der Anmeldung |
| `User.Read.All` | Anwendung | `app:azure-sync-users` |
| `GroupMember.Read.All` oder `Group.Read.All` | Anwendung | `app:azure-sync-users` und `app:azure-sync-usergroups` |

Anwendungsberechtigungen erfordern die Administratorzustimmung und werden ausschließlich von den Synchronisierungs-Konsolenbefehlen verwendet (über den Grant `client_credentials`), niemals durch die Anmeldung eines interaktiven Benutzers.

## Grundkonfiguration

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
        url_login: "https://login.microsoftonline.com"
        path_authorize: "/<tenant-id>/oauth2/v2.0/authorize"
        path_token: "/<tenant-id>/oauth2/v2.0/token"
        url_api: "https://graph.microsoft.com"
        allow_create_new_users: true
        allow_update_user_info: true
```

### Multi-Tenant vs. Single-Tenant

Der Wert `tenant` muss mit der Einstellung der „unterstützten Kontotypen“ der App-Registrierung übereinstimmen:

* Eine bestimmte Mandanten-GUID — Single-Tenant, nur Konten dieser Organisation können sich anmelden
* `organizations` — jeder Entra-ID-Mandant
* `common` — jeder Entra-ID-Mandant plus persönliche Microsoft-Konten

## Erforderliche Benutzerattribute

Jeder Entra-ID-Benutzer, der sich bei Chamilo anmelden muss, muss `mail` und `mailNickname` gesetzt haben — die Anmeldung löst einen Fehler aus, wenn eines der beiden leer ist (zusammen mit der unveränderlichen Entra-Objekt-ID, die immer vorhanden ist). Die Feldzuordnung von Microsoft Graph zu Chamilo ist für Azure **fest** (im Gegensatz zum generischen OAuth2-Anbieter, bei dem Sie die Feldzuordnung konfigurieren können):

| Chamilo-Feld | Microsoft-Graph-Quelle |
|---------------|------------------------|
| Vorname | `givenName` |
| Nachname | `surname` |
| E-Mail | `mail` |
| Benutzername | `userPrincipalName` |
| Telefon | `telephoneNumber`, dann `businessPhones[0]`, dann `mobilePhone` |
| Aktiv | `accountEnabled` |
| Oberflächensprache | `preferredLanguage` (abgeglichen mit einer installierten Chamilo-Sprache, Rückfall auf die Plattformvorgabe) |

Drei zusätzliche Felder werden bei jeder erfolgreichen Anmeldung ebenfalls geschrieben: `organisationemail` (= `mail`), `azure_id` (= `mailNickname`) und `azure_uid` (= die Entra-Objekt-ID). Diese stützen die unten beschriebene Logik zur Kontozuordnung.

## Anmeldungen bestehenden Chamilo-Konten zuordnen

Setzen Sie `existing_user_verification_order` auf eine kommagetrennte Liste der Ziffern `1`–`3`, um zu steuern, wie eine eingehende Entra-ID-Anmeldung einem bestehenden Chamilo-Konto zugeordnet wird:

| Wert | Abgleich gegen |
|-------|------------------|
| `1` | Zusatzfeld `organisationemail` == Entra `mail` |
| `2` | Zusatzfeld `azure_id` == Entra `mailNickname` |
| `3` | Zusatzfeld `azure_uid` == Entra-Objekt-ID |

Die Positionen werden in der angegebenen Reihenfolge geprüft; der erste aktive (nicht soft-gelöschte) Treffer gewinnt. Ein ungültiger oder leerer Wert fällt auf `1,2,3` zurück. Wenn keine der konfigurierten Positionen zutrifft — was beim allerersten Login eines bestimmten Benutzers immer der Fall ist, da diese Zusatzfelder erst *nach* einer erfolgreichen Anmeldung befüllt werden — fällt Chamilo unabhängig von Ihrer Konfiguration darauf zurück, das eigene Chamilo-Feld `email` gegen Entra `mail` und anschließend `username` gegen `userPrincipalName` abzugleichen.

## Gruppenbasierte Rollenzuordnung

Ordnen Sie Sicherheitsgruppen aus Entra ID den Chamilo-Rollen anhand ihrer Object IDs (GUIDs) zu:

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

Bei jeder Anmeldung ruft Chamilo Microsoft Graph `/v1.0/me/memberOf` mit dem eigenen Zugriffstoken des Benutzers auf und prüft die zurückgegebenen Gruppen gegen diese drei IDs, in der Reihenfolge **admin → session_admin → teacher**. Der erste Treffer gilt — ein Benutzer, der sowohl in der Admin- als auch in der Lehrergruppe ist, wird nur zum Admin befördert. Wer in keiner der konfigurierten Gruppen ist, behält die bestehende Rolle (bzw. bei der ersten Anmeldung die Standardrolle Student). Dies erfordert die oben aufgeführte delegierte Berechtigung `GroupMember.Read.All`.

## Zertifikatsauthentifizierung

Als Alternative zu `client_secret` können Sie sich mit einem Zertifikat authentifizieren:

```yaml
authentication:
  1:
    oauth2:
      azure:
        client_certificate_private_key: "<PEM private key, single line, with \\n for line breaks>"
        client_certificate_thumbprint: "<hex SHA1 thumbprint>"
```

Laden Sie das passende öffentliche Zertifikat unter **Certificates & secrets** in der App-Registrierung hoch und kopieren Sie dessen Fingerabdruck (im Portal hexadezimal angezeigt) in `client_certificate_thumbprint`. Wenn beide Schlüssel gesetzt sind, erzeugt Chamilo eine signierte JWT-Client-Assertion (RS256) statt `client_secret` zu senden — das gilt sowohl für interaktive Anmeldungen als auch für die app-only-Authentifizierung der Synchronisierungsbefehle.

## Synchronisieren von Benutzern und Gruppen aus Entra ID

Zwei Konsolenbefehle richten Chamilo-Konten direkt aus Entra ID ein und pflegen sie, unabhängig davon, ob sich jemand interaktiv anmeldet. Beide authentifizieren sich app-only (`client_credentials`), benötigen daher die oben aufgeführten **Anwendungs**-Graph-Berechtigungen und sind für die Planung per Cron gedacht, nicht für manuelle Ausführung.

### `app:azure-sync-users`

Ruft Benutzer von Microsoft Graph ab und richtet die passenden Chamilo-Konten ein bzw. aktualisiert sie, mit derselben Feldzuordnung und derselben Kontenzuordnungslogik wie bei einer interaktiven Anmeldung.

* Standardmäßig wird die vollständige Benutzerliste abgerufen (`/v1.0/users`, seitenweise). Setzen Sie `script_users_delta: true`, um stattdessen `/v1.0/users/delta` zu verwenden — Chamilo speichert den Delta-Link zwischen den Läufen, sodass nachfolgende Läufe nur Änderungen abrufen.
* Setzen Sie `deactivate_nonexisting_users: true`, um Chamilo-Konten (mit Authentifizierungsquelle Azure) zu deaktivieren, die in der Entra-ID-Abfrage nicht mehr erscheinen. Das funktioniert nur im Vollabrufmodus — der Delta-Modus liefert nie die vollständige Benutzerliste, daher wird diese Einstellung ignoriert, wenn `script_users_delta` aktiviert ist.
* Die Gruppen-Rollenzuordnung (siehe oben) wird bei diesem Lauf für jeden synchronisierten Benutzer erneut angewendet, nicht nur bei der Anmeldung.

### `app:azure-sync-usergroups`

Ruft Entra-ID-Gruppen ab und spiegelt sie als Chamilo-Klassen (`Usergroup`).

* Ruft die vollständige Gruppenliste ab (`/v1.0/groups`) oder, mit `script_usergroups_delta: true`, den Delta-Endpunkt, mit einem eigenen, getrennt verfolgten Delta-Link.
* `group_filter_regex` schränkt ein, welche Gruppen synchronisiert werden, abgeglichen mit dem Anzeigenamen der Gruppe.
* **Jeder Lauf leert zuerst alle bestehenden Mitglieder der passenden Chamilo-Klasse**, und abonniert dann erneut die Mitglieder, die Graph aktuell zurückgibt. Mitglieder werden nur mit *bestehenden* Chamilo-Benutzern abgeglichen, mit derselben [Kontenzuordnungslogik](#matching-logins-to-existing-chamilo-accounts) wie bei der Anmeldung — dieser Befehl legt niemals neue Benutzerkonten an, und jedes Gruppenmitglied, das keinem bestehenden Chamilo-Konto zugeordnet werden kann, wird stillschweigend übersprungen.

## Bekannte Einschränkungen

* **Kein Single Logout.** Die Abmeldung von Chamilo meldet den Benutzer nicht von Entra ID oder anderen verbundenen Anwendungen ab. Ein Konfigurationsschlüssel `force_logout` existiert in `authentication.yaml`, ist aber derzeit nicht implementiert — behandeln Sie ihn als reserviert, nicht als funktionsfähig.
* **Passwortzurücksetzung ist für Azure-Konten bedeutungslos.** Da die Authentifizierung vollständig über Entra ID erfolgt, führt Chamilo für diese Konten kein nutzbares lokales Passwort.

## Fehlerbehebung

* Anmeldefehler (fehlende erforderliche Attribute, Graph-API-Fehler) erscheinen dem Benutzer als Flash-Meldung auf der Anmeldeseite.
* Die Synchronisierungsbefehle protokollieren Probleme pro Datensatz mit Warnungen und verarbeiten den Rest des Stapels weiter, statt beim ersten Fehler abzubrechen — prüfen Sie nach jedem Lauf die Konsolenausgabe des Befehls (oder wohin Ihr Cron sie erfasst).
* Lassen Sie das Standard-Anmeldeformular von Chamilo aktiviert, damit Administratoren immer einen Zugang haben, falls die Entra-ID-Integration fehlschlägt.