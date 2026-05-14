# SSO-Konfiguration

Diese Seite behandelt Themen, die für verschiedene Authentifizierungsmethoden gelten.

## Mehrere Anbieter

Sie können gleichzeitig mehr als eine Authentifizierungsmethode aktivieren. Jeder aktivierte Anbieter zeigt auf der Anmeldeseite einen eigenen Button neben dem standardmäßigen Benutzername-/Passwort-Formular. Benutzer wählen ihre bevorzugte Methode aus.

Lassen Sie das Standardformular aktiviert, damit Plattformadministratoren sich immer anmelden können, selbst wenn ein externer Anbieter fehlerhaft konfiguriert ist.

## Authentifizierungspriorität

Wenn mehrere Methoden aktiv sind, überprüft das System die Anmeldedaten in folgender Reihenfolge:

1. LDAP (wenn `force_as_login_method` gesetzt ist)
2. OAuth2-Anbieter (in der Reihenfolge, in der sie in `authentication.yaml` erscheinen)
3. Interne Chamilo-Datenbank

## JWT-Token für API-Zugriff

Chamilo verwendet JWT (JSON Web Tokens) für seine REST-API. Die Lebensdauer der Token und das Aktualisierungsverhalten werden in `config/packages/lexik_jwt_authentication.yaml` konfiguriert. Dies ist unabhängig vom SSO-Anmeldeprozess und gilt nur für API-Clients.

## Fehlerbehebung

### Anmeldebutton erscheint nach Konfiguration nicht

Der Cache muss nach jeder Änderung an `authentication.yaml` geleert werden:

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### Benutzer können sich nicht über SSO anmelden

* **Redirect-URI-Abweichung** — Die im Identitätsanbieter registrierte URI muss exakt mit `https://your-chamilo-url/connect/<provider>/check` übereinstimmen.
* **Zeitdrift** — SSO-Token sind zeitkritisch. Stellen Sie sicher, dass die Serveruhr synchronisiert ist (NTP).
* **SSL-Zertifikat** — Chamilo muss dem Zertifikat des Identitätsanbieters vertrauen. Überprüfen Sie auf Probleme mit selbstsignierten Zertifikaten.
* **Logs** — Überprüfen Sie `var/log/` und die Logs Ihres Identitätsanbieters auf spezifische Fehlermeldungen.

### Benutzer werden mit der falschen Rolle erstellt

Überprüfen Sie die Rollenzuordnungskonfiguration für den Anbieter. Neue Benutzer erhalten standardmäßig die Studentenrolle, es sei denn, eine Gruppen- oder Attributzuordnung befördert sie.

### Benutzer existieren beim Anbieter, können aber nicht auf Chamilo zugreifen

* Wenn `allow_create_new_users` auf false gesetzt ist, muss der Benutzer bereits ein Chamilo-Konto haben, dessen E-Mail-Adresse oder Benutzername mit den Daten des Anbieters übereinstimmt.
* Überprüfen Sie, ob der Benutzer in Chamilo nicht deaktiviert ist.
* Für Azure überprüfen Sie `existing_user_verification_order`, um zu verstehen, wie Chamilo eingehende Benutzer mit bestehenden Konten abgleicht.