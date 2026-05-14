# LTI 1.3

**LTI** (Learning Tools Interoperability) ist ein Standard, der es ermöglicht, externe Lernwerkzeuge in Chamilo einzubetten. Version 1.3 ist die neueste und sicherste Version des Standards.

## Was LTI ermöglicht

Mit LTI können Sie externe Werkzeuge in Chamilo-Kurse einbetten. Beispiele:

- Interaktive Simulationen
- Spezialisierte Bewertungswerkzeuge
- Werkzeuge zur Inhaltserstellung
- Virtuelle Labore
- Inhaltsbibliotheken von Drittanbietern

Das externe Werkzeug erscheint nahtlos innerhalb der Chamilo-Oberfläche.

## Konfiguration eines LTI-Werkzeugs

### Als Administrator

1. Navigieren Sie zu den LTI-Einstellungen im Administrationsbereich
2. **Registrieren Sie das externe Werkzeug**, indem Sie Folgendes angeben:
   - **Werkzeugname** — Ein beschreibender Name
   - **Login-URL** — Die OIDC-Login-Initiations-URL des externen Werkzeugs
   - **Weiterleitungs-URL** — Die Start-URL, zu der das Werkzeug nach dem Login zurückkehrt
   - **Client-ID** — Wird vom Werkzeuganbieter bereitgestellt
   - **Public Keyset URL (JWKS URL)** — Der JWKS-Endpunkt des Werkzeugs für den Austausch von Sicherheitsschlüsseln
3. Konfigurieren Sie **Grade Passback** — Ob das Werkzeug Bewertungen an Chamilo zurücksenden kann
4. Speichern

### Als Lehrkraft

Sobald ein LTI-Werkzeug vom Administrator registriert wurde, können Lehrkräfte es ihren Kursen hinzufügen:

1. Suchen Sie im Kurs nach der Option, ein externes Werkzeug hinzuzufügen
2. Wählen Sie aus den registrierten LTI-Werkzeugen aus
3. Das Werkzeug erscheint als Kurstool auf der Startseite

## Sicherheit

LTI 1.3 verwendet:

- **OAuth 2.0** zur Authentifizierung
- **JSON Web Tokens (JWT)** zur Nachrichtensignierung
- **Öffentliche/private Schlüsselpaare** zur Verifizierung

Dies bedeutet, dass Zugangsdaten niemals direkt zwischen Chamilo und dem externen Werkzeug geteilt werden.

## Grade Passback

LTI-Werkzeuge können Bewertungen an Chamilo zurücksenden, die in das Kursnotenbuch integriert werden können. Dies wird pro Werkzeug während der Registrierung konfiguriert.

## Tipps

- **Überprüfen Sie die Kompatibilität des Werkzeugs** — Stellen Sie sicher, dass das externe Werkzeug LTI 1.3 unterstützt (nicht nur ältere Versionen)
- **Testen Sie in einer Sandbox** — Testen Sie die LTI-Integration in einem Testkurs, bevor Sie sie in der Produktion verwenden
- **Überwachen Sie die Leistung** — Externe Werkzeuge fügen Netzwerkabhängigkeiten hinzu. Stellen Sie sicher, dass das Werkzeug reaktionsschnell und zuverlässig ist.