# LTI 1.3

**LTI** (Learning Tools Interoperability) ist ein Standard, der es ermöglicht, externe Lernwerkzeuge in Chamilo einzubetten. Version 1.3 ist die neueste und sicherste Version des Standards.

Dieses Werkzeug ist auch über den Block [Plattform](../platform/README.md) des Administrations-Dashboards erreichbar, und zwar als **Externe Werkzeuge (LTI)**.

## Was LTI ermöglicht

Mit LTI können Sie externe Werkzeuge in Chamilo-Kursen einbetten. Beispiele:

* Interaktive Simulationen
* Spezialisierte Bewertungswerkzeuge
* Werkzeuge zur Inhaltserstellung
* Virtuelle Labore
* Inhaltsbibliotheken von Drittanbietern

Das externe Werkzeug erscheint nahtlos in der Chamilo-Oberfläche.

## Konfiguration eines LTI-Werkzeugs

### Als Administrator

1. Navigieren Sie zu den LTI-Einstellungen im Administrationsbereich
2. **Registrieren Sie das externe Werkzeug**, indem Sie Folgendes angeben:
   * **Werkzeugname** — Ein beschreibender Name
   * **Login URL** — Die OIDC-Anmeldeinitiierungs-URL des externen Werkzeugs
   * **Redirect URL** — Die Start-URL, zu der das Werkzeug nach der Anmeldung zurückkehrt
   * **Client ID** — Vom Werkzeuganbieter bereitgestellt
   * **Public keyset URL (JWKS URL)** — Der JWKS-Endpunkt des Werkzeugs für den Austausch von Sicherheitsschlüsseln
3. Konfigurieren Sie die **Notenrückgabe** — Ob das Werkzeug Noten an Chamilo zurücksenden kann
4. Speichern

### Als Lehrkraft

Sobald das Plugin **ImsLti** aktiviert ist, können Lehrkräfte mit Kursbearbeitungsrechten externe Werkzeuge in ihrem Kurs konfigurieren:

1. Öffnen Sie die Konfiguration **Externe Werkzeuge (LTI)** des Kurses. Das kursspezifische Formular unterstützt sowohl **LTI 1.3** als auch ältere Integrationen **LTI 1.0/1.1**; wählen Sie die Version, die zum Werkzeuganbieter passt.
2. Fügen Sie ein Werkzeug hinzu oder wählen Sie ein wiederverwendbares Werkzeug aus, das von Ihrer Administration bereitgestellt wurde. Geben Sie für LTI 1.3 die Start- und Authentifizierungsinformationen des Anbieters ein; das Formular unterstützt eine Public-Keyset-URL oder einen RSA-Schlüssel sowie optionale Assignment and Grade Services (AGS) und Names and Role Provisioning Services (NRPS).
3. Speichern Sie das Werkzeug. Je nach Deep-Linking-Konfiguration fügt Chamilo die entsprechende Kursverknüpfung hinzu. Bereits hinzugefügte Werkzeuge werden getrennt von verfügbaren globalen Werkzeugen angezeigt.
4. Um ein vorhandenes Werkzeug zu ändern, verwenden Sie im selben Kurskontext die Aktion **Bearbeiten**. Die Konfiguration prüft, ob das Werkzeug zum Kurs gehört; ein Werkzeug, das einem anderen Kurs zugeordnet ist, kann nicht durch Angabe seiner ID bearbeitet werden.

Das Formular behält den Kurskontext bei, wenn von Hinzufügen-/Bearbeiten-Aktionen zurückgekehrt wird, und zeigt Validierungsrückmeldungen auf der Konfigurationsseite an.

## Sicherheit

LTI 1.3 verwendet:

* **OAuth 2.0** zur Authentifizierung
* **JSON Web Tokens (JWT)** zur Signierung von Nachrichten
* **Öffentlich-private Schlüsselpaare** zur Überprüfung

Das bedeutet, dass Anmeldedaten niemals direkt zwischen Chamilo und dem externen Werkzeug ausgetauscht werden.

## Notenrückgabe und Bewertungen

LTI-Werkzeuge können Noten an Chamilo zurücksenden, die in die **Bewertungen** (Gradebook) des Kurses integriert werden können. Konfigurieren Sie für LTI 1.3 die Option **Assignment and Grade Services (AGS)** des Anbieters, wenn Sie das externe Werkzeug erstellen oder bearbeiten. Eine Bewertung muss für den Kurs bereits vorhanden sein, wenn Sie sie mit einer Gradebook-Evaluation verknüpfen möchten.

Die Aktion **Zum Gradebook hinzufügen** des Plugins öffnet die moderne Gradebook-Übersicht im **aktuellen Kurs-/Sitzungskontext**. Sie zeigt ein Evaluationsformular mit einem Dropdown **Werkzeug** an, anstatt das frühere Legacy-Evaluationsformular zu verwenden. Wählen Sie ein verfügbares LTI-Werkzeug aus, prüfen Sie Titel und Bewertungswerte und speichern Sie.

* Ein Werkzeug wird nur angeboten, wenn es dem aktuellen Kurs-/Sitzungskontext zugeordnet ist und noch nicht mit einer Gradebook-Evaluation verknüpft ist.
* Eine Gradebook-Evaluation kann **beim Erstellen** der Evaluation mit einem LTI-Werkzeug verknüpft werden, nicht durch Wechsel einer vorhandenen Evaluation zu einem anderen Werkzeug.
* Wenn keine geeigneten Werkzeuge gefunden werden, bietet das Formular kein nicht zugehöriges Werkzeug aus einem anderen Kurs an.

Siehe [Bewertungen](../../teacher-guide/assessing-learners/gradebook.md) für den normalen Bewertungsablauf. Die Korrekturen zur Kurskontext- und Gradebook-Integration werden in [PR #9196](https://github.com/chamilo/chamilo-lms/pull/9196) und [PR #9197](https://github.com/chamilo/chamilo-lms/pull/9197) nachverfolgt.

## Tipps

* **Werkzeugkompatibilität prüfen** — Bevorzugen Sie LTI 1.3 für neue Integrationen; Chamilo stellt bei Bedarf auch die ältere LTI-1.0/1.1-Konfiguration bereit.
* **In einer Sandbox testen** — Testen Sie die LTI-Integration in einem Testkurs, bevor Sie sie in der Produktion einsetzen
* **Leistung überwachen** — Externe Werkzeuge erzeugen Netzabhängigkeiten. Stellen Sie sicher, dass das Werkzeug reaktionsschnell und zuverlässig ist.