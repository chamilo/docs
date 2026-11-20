# Benutzerkontostatus

Das Feld `active` eines Benutzers ist der Kontostatus. Ein Administrator sperrt oder entsperrt ein Konto, indem er es mit `PATCH /api/users/{id}` ändert. Dies ersetzt das Feld `active` des Webservices `webservices/api/v2.php` in Version 1.11.x.

## Werte

| `active` | Bedeutung |
|----------|-----------|
| `1` | Aktiv: Der Benutzer kann sich anmelden |
| `0` | Inaktiv: Das Konto ist gesperrt |
| `-1` | Automatisch von der Plattform deaktiviert |
| `-2` | Gelöscht (im Papierkorb) |

Die API kann nur `1` oder `0` setzen. Das Löschen erfolgt über `DELETE /api/users/{id}`, und das Wiederherstellen eines gelöschten Kontos über den Papierkorb der Administration.

## Status auslesen

`active` wird von `GET /api/users/{id}` und von `GET /api/users?username=...` zurückgegeben.

```http
GET /api/users/42
Authorization: Bearer <token>
Accept: application/json
```

```json
{ "id": 42, "username": "jdupont", "active": 1 }
```

## Status ändern

```http
PATCH /api/users/42
Authorization: Bearer <token>
Content-Type: application/merge-patch+json
Accept: application/json

{ "active": 0 }
```

Die Antwort ist der aktualisierte Benutzer. Senden Sie `{ "active": 1 }`, um das Konto zu entsperren. `active` kann zusammen mit anderen Feldern des Benutzers gesendet werden.

## Zugriff

| Aufrufer | Zulässig |
|----------|----------|
| `ROLE_ADMIN` | Jeder Benutzer, den er bearbeiten darf, außer dem eigenen Konto |
| Jeder andere Benutzer | Nicht zulässig, auch nicht für das eigene Konto |

Das Senden des aktuellen Werts wird niemals abgelehnt, sodass ein Client, der den gesamten Benutzer zurücksendet, nicht blockiert wird.

## Fehler

| Status | Wann |
|--------|------|
| `400` | Ein anderer Wert als `0` oder `1` |
| `401` | Keine oder ungültige Anmeldedaten |
| `403` | Der Aufrufer ist kein Administrator oder ändert seinen eigenen Status |
| `404` | Der Benutzer existiert nicht |