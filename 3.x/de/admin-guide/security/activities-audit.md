# Aktivitäten-Audit

Der Bericht Aktivitäten-Audit ermöglicht die Durchsicht wichtiger administrativer und plattformweiter Aktivitäten, gefiltert nach Ereignistyp. Es handelt sich um denselben zugrunde liegenden Bericht, der zuvor über **Tracking > Administrative activity auditing** erreichbar war; er ist nun auch direkt aus dem Sicherheitsblock verlinkt, da er in erster Linie ein Werkzeug für Sicherheit und Nachvollziehbarkeit ist.

## Zugriff auf das Aktivitäten-Audit

Klicken Sie im Administrationsbereich auf **Security > Activities audit**.

## Was angezeigt wird

![Die Seite Aktivitäten-Audit mit Kategorien von Ereignistypen wie Course, Session, User, Social, Message, Resource, Wiki und Other, die jeweils zu einzelnen Ereignistypen aufgeklappt werden können](/.gitbook/assets/admin-security-activities-audit.png)

Ereignisse sind in Kategorien gruppiert:

* **Course** — Erstellung, Löschung und Einstellungsänderungen von Kursen
* **Session** — Erstellung, Löschung und Einschreibungsänderungen von Sessions und Session-Kategorien
* **User** — Kontoerstellung, -löschung, Passwortaktualisierungen, Feldänderungen und mehr
* **Social** — Erstellung, Löschung und Mitgliedschaftsänderungen sozialer Gruppen
* **Message** — Änderungen und Löschungen von Nachrichtendaten
* **Resource** — Erstellung und Löschung von Ressourcen und Ressourcen-Links
* **Wiki** — Aufrufe von Wiki-Seiten
* **Other** — Alles Übrige, einschließlich Plugin-Aktivität, Sperren des Gradebooks, Löschungen von Übungsversuchen, erzwungenen Anmeldeversuchen und plattformweiten Einstellungsänderungen

Klicken Sie auf einen Chip eines Ereignistyps (zum Beispiel **Attempted Forced Login**), um den Bericht auf eine Tabelle passender Einträge einzugrenzen. Sie können auch direkt per Stichwort über das Feld **Search** oberhalb der Ereignistypenliste suchen.

## Anwendungsfälle

* Untersuchen, wer einen Kurs, eine Session oder ein Benutzerkonto gelöscht hat und wann
* Bestätigen, ob eine bestimmte administrative Änderung (eine Einstellungsaktualisierung, eine Plugin-Installation) von einem erwarteten Administrator vorgenommen wurde
* **Attempted Forced Login**-Ereignisse zusammen mit dem Bericht [Login Attempts](login-attempts.md) nachverfolgen