# Passwortstärke-Prüfung

Die Passwortstärke-Prüfung vergleicht die gespeicherten Passwort-Hashes aktiver Benutzer mit einer kurzen Liste häufig verwendeter Passwörter (`123456`, `password`, `qwerty123` und ähnliche). Sie zeigt die Passwörter selbst niemals an und überträgt sie auch nicht — lediglich, ob das aktuelle Passwort eines Benutzers mit einem der bekannten schwachen Kandidaten übereinstimmt.

## Zugriff auf die Passwortstärke-Prüfung

Klicken Sie im Administrationsbereich auf **Sicherheit > Passwortstärke-Prüfung**.

## Einen Scan ausführen

![Die Seite der Passwortstärke-Prüfung mit einem Feld für zu prüfende Benutzer-IDs und einer Schaltfläche zum Starten des Scans](/.gitbook/assets/admin-security-password-strength.png)

* Lassen Sie **Zu prüfende Benutzer-IDs** leer, um alle aktiven Benutzer zu scannen, oder geben Sie eine kommagetrennte Liste von Benutzer-IDs ein, um eine Teilmenge zu prüfen
* Klicken Sie auf **Passwortstärke-Scan ausführen**

Der Scan läuft asynchron im Hintergrund, damit die Seite nicht einfriert, und zeigt den Fortschritt live an (bisher geprüfte Benutzer von der Gesamtzahl sowie wie viele schwache Passwörter gefunden wurden). Da jedes Kandidatenpasswort gegen den Hash jedes ausgewählten Benutzers geprüft werden muss, kann das Scannen aller Benutzer auf einer großen Plattform eine Weile dauern — die Kandidatenliste wird bewusst kurz gehalten, um diesen Aufwand zu begrenzen.

## Maßnahmen anhand der Ergebnisse

![Die abgeschlossenen Scan-Ergebnisse mit einem markierten Benutzer in den Spalten Name, Benutzername und E-Mail sowie zeilenweisen Aktionen zum Anfordern einer Passwortänderung oder zum Erzwingen eines Passwort-Resets](/.gitbook/assets/admin-security-password-strength-results.png)

Sobald der Scan abgeschlossen ist, werden markierte Benutzer mit zwei verfügbaren Aktionen aufgeführt, entweder pro Benutzer oder als Sammelaktion für alle ausgewählten Benutzer:

* **Passwortänderung anfordern** (Umschlag-Symbol) — Sendet dem Benutzer eine E-Mail mit der Aufforderung, das Passwort zu ändern
* **Passwort-Reset erzwingen** (Reset-Symbol) — Ungültig macht das aktuelle Passwort des Benutzers sofort und sendet ihm per E-Mail ein neues

Beide Aktionen prüfen die ausgewählten Benutzer vor der Ausführung erneut gegen die Liste schwacher Passwörter, sodass eine veraltete oder manipulierte Anfrage nicht zum Zurücksetzen eines Kontos verwendet werden kann, das kein schwaches Passwort mehr hat.

## Empfohlene Verwendung

* Führen Sie diesen Scan regelmäßig aus, insbesondere nach einem Massenimport von Benutzern (importierte Konten werden manchmal mit einfachen Standardpasswörtern ausgeliefert)
* Kombinieren Sie ihn mit den Einstellungen **Minimale Passwortsyntax-Anforderungen** und **Passwort-Rotationsintervall** in den [Sicherheitseinstellungen](../platform-settings/security-settings.md), um zu verhindern, dass schwache Passwörter überhaupt gesetzt werden, statt sie erst nachträglich zu erkennen