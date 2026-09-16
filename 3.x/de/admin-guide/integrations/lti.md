# LTI 1.3

**LTI** (Learning Tools Interoperability) ist ein Standard, der es ermöglicht, externe Lernwerkzeuge in Chamilo einzubetten. Version 1.3 ist die neueste und sicherste Version des Standards.

Dieses Werkzeug ist auch über den Block [Plattform](../platform/README.md) im Administrations-Dashboard erreichbar, als **Externe Werkzeuge (LTI)**.

## Was LTI ermöglicht

Mit LTI können Sie externe Werkzeuge in Chamilo-Kurse einbetten. Beispiele:

* Interaktive Simulationen
* Spezialisierte Bewertungswerkzeuge
* Werkzeuge zur Inhaltserstellung
* Virtuelle Labore
* Inhaltsbibliotheken von Drittanbietern

Das externe Werkzeug erscheint nahtlos in der Chamilo-Oberfläche.

## Konfigurieren eines LTI-Werkzeugs

### Als Administrator

1. Navigieren Sie zu den LTI-Einstellungen im Administrationsbereich
2. **Registrieren Sie das externe Werkzeug**, indem Sie Folgendes angeben:
   * **Werkzeugname** — Ein beschreibender Name
   * **Login-URL** — Die OIDC-Login-Initiations-URL des externen Werkzeugs
   * **Redirect-URL** — Die Launch-URL, zu der das Werkzeug nach dem Login zurückkehrt
   * **Client-ID** — Vom Werkzeuganbieter bereitgestellt
   * **Public-Keyset-URL (JWKS-URL)** — Der JWKS-Endpunkt des Werkzeugs für den Austausch von Sicherheitsschlüsseln
3. Konfigurieren Sie die **Notenrückmeldung (Grade Passback)** — Ob das Werkzeug Noten an Chamilo zurücksenden kann
4. Speichern

### Als Lehrende

Sobald ein LTI-Werkzeug vom Administrator registriert wurde, können Lehrende es zu ihren Kursen hinzufügen:

1. Suchen Sie im Kurs nach der Option, ein externes Werkzeug hinzuzufügen
2. Wählen Sie aus den registrierten LTI-Werkzeugen
3. Das Werkzeug erscheint als Kurswerkzeug auf der Startseite

## Sicherheit

LTI 1.3 verwendet:

* **OAuth 2.0** für die Authentifizierung
* **JSON Web Tokens (JWT)** für die Nachrichtensignierung
* **Öffentliche/private Schlüsselpaare** für die Verifizierung

Das bedeutet, dass Anmeldedaten niemals direkt zwischen Chamilo und dem externen Werkzeug geteilt werden.

## Notenrückmeldung (Grade Passback)

LTI-Werkzeuge können Noten an Chamilo zurücksenden, die in das Kurs-Notenbuch integriert werden können. Dies wird pro Werkzeug bei der Registrierung konfiguriert.

## Tipps

* **Kompatibilität des Werkzeugs prüfen** — Stellen Sie sicher, dass das externe Werkzeug LTI 1.3 unterstützt (nicht nur ältere Versionen)
* **In einer Sandbox testen** — Testen Sie die LTI-Integration in einem Testkurs, bevor Sie sie in der Produktion einsetzen
* **Leistung überwachen** — Externe Werkzeuge fügen Netzwerkabhängigkeiten hinzu. Stellen Sie sicher, dass das Werkzeug reaktionsschnell und zuverlässig ist.