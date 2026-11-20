# Benutzererstellung

`POST /api/access_urls/{id}/user` erstellt einen Plattformbenutzer und fügt ihn der Zugriffs-URL `{id}` hinzu. Es ist der Ersatz in Chamilo 3 für die Aktion `save_user_json` des Webservice `webservices/api/v2.php` in 1.11.x und ist für Integrationen gedacht, die Lernendenkonten anlegen (Shops, HR-Systeme, Einschreibungsportale).

## Zugriff

| Aufrufer | Zulässig |
|--------|---------|
| `ROLE_ADMIN` | Ja |
| `ROLE_SESSION_MANAGER` | Ja |
| Alle anderen | `403 Forbidden` |

Authentifizieren Sie sich mit einem JWT oder einem externen API-Schlüssel, wie in [Authentifizierung](authentication.md) beschrieben.

## Anfrage

```http
POST /api/access_urls/1/user
Authorization: Bearer <token>
Content-Type: application/json
```

```json
{
  "username": "jdoe-20261022",
  "email": "jane.doe@example.com",
  "firstname": "Jane",
  "lastname": "Doe",
  "password": "S3cret!pass",
  "sendEmail": true,
  "extraFields": { "my_user_field": "value" }
}
```

| Feld | Erforderlich | Beschreibung |
|-------|----------|-------------|
| `username` | Ja | Anmeldung des neuen Benutzers. Darf nicht bereits von einem anderen Konto verwendet werden (Vergleich ohne Berücksichtigung der Groß-/Kleinschreibung). |
| `email` | Ja | Eine gültige E-Mail-Adresse. Mehrere Konten dürfen dieselbe Adresse verwenden, sofern `checkEmailDuplicates` nicht `true` ist. |
| `firstname`, `lastname` | Nein | Vor- und Nachname. |
| `password` | Nein | Anfangspasswort. Ist es leer und `sendEmail` ist `true`, enthält die E-Mail stattdessen einen Link zum Festlegen eines Passworts. |
| `locale` | Nein | Sprache der Benutzeroberfläche, z. B. `fr_FR`. Standardmäßig die Plattformsprache. |
| `timezone` | Nein | Standardmäßig die Zeitzone der Plattform. |
| `status` | Nein | Standardmäßig `5` (Lernender); `1` für eine Lehrkraft. |
| `sendEmail` | Nein | Standardmäßig `true`. Sendet dem Benutzer eine Nachricht und eine E-Mail mit den Zugangsdaten. |
| `checkEmailDuplicates` | Nein | Standardmäßig `false`. Bei `true` wird die Anfrage mit `409 email_already_exists` abgelehnt, wenn ein Konto diese E-Mail-Adresse bereits verwendet (Vergleich ohne Berücksichtigung der Groß-/Kleinschreibung). Gleiches Verhalten wie der Parameter `check_email_duplicates` von `save_user_json`. |
| `extraFields` | Nein | Werte zusätzlicher Benutzerfelder, indiziert über die Variable des Feldes. Jede Variable muss ein vorhandenes zusätzliches Benutzerfeld sein. |

### Gemeinsame E-Mail-Adressen

Chamilo verlangt nicht, dass E-Mail-Adressen eindeutig sind: Das Formular zur Benutzererstellung des Administrators akzeptiert eine Adresse, die ein anderes Konto bereits verwendet, der Benutzerimport lehnt sie nur ab, wenn die Option **Eindeutige E-Mail prüfen** aktiviert ist, und es gibt keine Plattformeinstellung, um dies zu ändern. Ein häufiger Fall ist ein Lernender, der unter einem neuen Bezeichner erneut eingeschrieben wird und dieselbe Adresse behält. Senden Sie `checkEmailDuplicates: true` nur, wenn Ihre Integration eine bereits vorhandene Adresse als Fehler behandeln soll.

Wenn die Einstellung **Anmeldung ist E-Mail** aktiviert ist, ist der Benutzername die E-Mail-Adresse, sodass die Prüfung des Benutzernamens Duplikate bereits ablehnt.

## Antwort

`201 Created` mit dem neuen Benutzer (Serialisierungsgruppe `user:read`), einschließlich seiner `id`.

## Fehler

| Status | Inhalt | Wann |
|--------|------|------|
| `401` | | Keine oder ungültige Anmeldedaten |
| `403` | | Der Aufrufer ist weder Administrator noch Sitzungsadministrator |
| `409` | `{"error": "username_already_exists"}` | Der Benutzername wird bereits verwendet |
| `409` | `{"error": "email_already_exists"}` | `checkEmailDuplicates` ist `true` und die E-Mail-Adresse wird bereits verwendet |
| `422` | | Fehlendes `username` oder `email` oder ungültige E-Mail-Adresse |

## Implementierung

* Operation: die Ressource `AccessUrlUser`, deklariert in `src/CoreBundle/Entity/User.php`
* Eingabe: `src/CoreBundle/Dto/CreateUserOnAccessUrlInput.php`
* Controller: `src/CoreBundle/Controller/Api/CreateUserOnAccessUrlAction.php`
* Die Seite **Lernenden registrieren** des Sitzungsadministrators (`/admin-dashboard/register/{courseId}`) verwendet diesen Endpunkt mit `checkEmailDuplicates: true` und warnt daher, wenn die Adresse bereits verwendet wird.