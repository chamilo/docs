# SSO-Konfiguration

Diese Seite behandelt Themen, die für alle Authentifizierungsmethoden gelten.

## Mehrere Anbieter

Sie können mehr als eine Authentifizierungsmethode gleichzeitig aktivieren. Jeder aktivierte Anbieter zeigt auf der Anmeldeseite neben dem Standardformular für Benutzername/Passwort eine eigene Schaltfläche. Die Benutzer wählen ihre bevorzugte Methode.

Lassen Sie das Standardformular aktiviert, damit Plattformadministratoren sich stets anmelden können, auch wenn ein externer Anbieter falsch konfiguriert ist.

## Authentifizierungspriorität

Wenn mehrere Methoden aktiv sind, prüft das System die Anmeldedaten in dieser Reihenfolge:

1. LDAP (falls `force_as_login_method` gesetzt ist)
2. OAuth2-Anbieter (in der Reihenfolge, in der sie in `authentication.yaml` erscheinen)
3. Interne Chamilo-Datenbank

## JWT-Token für den API-Zugriff

Chamilo verwendet JWT (JSON Web Tokens) für seine REST-API. Token-Lebensdauer und Aktualisierungsverhalten werden in `config/packages/lexik_jwt_authentication.yaml` konfiguriert. Dies ist vom SSO-Anmeldefluss getrennt und gilt nur für API-Clients.

## Fehlerbehebung

### Anmeldeschaltfläche erscheint nach der Konfiguration nicht

Der Cache muss nach jeder Änderung an `authentication.yaml` geleert werden:

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### Benutzer können sich nicht über SSO anmelden

* **Abweichung der Redirect-URI** — Die im Identitätsanbieter registrierte URI muss exakt mit `https://your-chamilo-url/connect/<provider>/check` übereinstimmen.
* **Uhrzeitabweichung** — SSO-Token sind zeitkritisch. Stellen Sie sicher, dass die Serveruhr synchronisiert ist (NTP).
* **SSL-Zertifikat** — Chamilo muss dem Zertifikat des Identitätsanbieters vertrauen. Prüfen Sie auf Probleme mit selbstsignierten Zertifikaten.
* **Protokolle** — Prüfen Sie `var/log/` und die Protokolle Ihres Identitätsanbieters auf konkrete Fehlermeldungen.

### Benutzer werden mit der falschen Rolle angelegt

Prüfen Sie die Rollen-Zuordnungskonfiguration für den Anbieter. Neue Benutzer erhalten standardmäßig die Studentenrolle, sofern sie nicht durch eine Gruppen- oder Attributzuordnung höhergestuft werden.

### Benutzer existieren beim Anbieter, können aber nicht auf Chamilo zugreifen

* Wenn `allow_create_new_users` false ist, muss der Benutzer bereits ein Chamilo-Konto besitzen, dessen E-Mail-Adresse oder Benutzername mit den Daten des Anbieters übereinstimmt.
* Prüfen Sie, ob der Benutzer in Chamilo nicht deaktiviert ist.
* Für Azure prüfen Sie `existing_user_verification_order`, um zu verstehen, wie Chamilo eingehende Benutzer bestehenden Konten zuordnet.