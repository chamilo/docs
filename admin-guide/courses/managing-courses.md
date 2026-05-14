# Kurse verwalten

Als Administrator können Sie alle Kurse auf der Plattform verwalten, unabhängig davon, wer sie erstellt hat.

## Kursliste

![Die Kursliste zeigt alle Kurse mit Titel, Code, Kategorie, eingeschriebenen Nutzern und Sichtbarkeitsstatus](/.gitbook/assets/admin-course-list.png)

Klicken Sie im Verwaltungsbereich auf **Kursliste**, um alle Kurse anzuzeigen. Die Liste zeigt:

* Kurstitel und Code
* Sprache
* Kategorien
* Sichtbarkeitsstatus

Verwenden Sie das Werkzeug **Erweiterte Suche**, um bestimmte Kurse zu finden.

## Einen Kurs erstellen

Als Administrator können Sie Kurse erstellen und sie beliebigen Lehrern zuweisen:

1. Klicken Sie im Verwaltungsbereich auf **Kurs hinzufügen**
2. Füllen Sie die Kursdetails aus (Titel, Code, Kategorie, Sprache)
3. Weisen Sie dem Kurs einen Lehrer zu
4. Speichern

Hinweis: In Chamilo 1.11.x wurde der Kurs-Code als Teil der Kurs-URL angezeigt und konnte nach der Erstellung des Kurses nicht mehr geändert werden. Dieses Verhalten ändert sich in Version 2.x. Der Kurs-Code ist in der URL nicht mehr sichtbar, und zukünftige Versionen könnten es Lehrern erlauben, den Kurs-Code nachträglich zu ändern, da er für die Plattform weniger essenziell wird.

## Einen bestehenden Kurs verwalten

Suchen Sie einen Kurs in der Liste, um auf Verwaltungsoptionen in der Spalte *Aktionen* zuzugreifen:

* **Informationen** — Zeigt Informationen über den Kurs an
* **Kurs-Startseite** — Führt Sie direkt zur Startseite des Kurses
* **Berichterstattung** — Zeigt Daten zu Engagement und Leistung
* **Bearbeiten** — Ändert Kurstitel, Kategorie, Sichtbarkeit und andere Einstellungen
* **Backup erstellen** — Führt zum Wartungsbereich des Kurses, wo Sie Kopien erstellen und andere Aktionen durchführen können
* **Zum Katalog hinzufügen** — Fügt diesen Kurs zum Kurskatalog hinzu
* **Löschen** — Entfernt den Kurs und alle seine Inhalte dauerhaft

> Das Löschen eines Kurses entfernt alle Inhalte, Lernendendaten, Noten und Tracking-Informationen dauerhaft. Erwägen Sie, den Kurs vorher als Backup zu exportieren.

## Massenoperationen

Wählen Sie mehrere Kurse in der Liste aus, um Stapelaktionen wie das Löschen durchzuführen. Um einen Kurs zu exportieren, rufen Sie den Kurs auf und verwenden Sie das Werkzeug **Wartung** — es gibt keine Massenexport-Aktion in der Admin-Kursliste.

## Einstellungen zur Kurssichtbarkeit

Administratoren können die von Lehrern festgelegte Sichtbarkeit überschreiben:

| Sichtbarkeit | Effekt |
|--------------|--------|
| **Öffentlich** | Für jeden zugänglich, einschließlich anonymer Besucher |
| **Offen** | Für alle eingeloggten Benutzer zugänglich |
| **Privat** | Nur eingeschriebene Benutzer können auf den Kurs zugreifen |
| **Geschlossen** | Niemand kann auf den Kurs zugreifen (außer der Lehrer und Administratoren) |
| **Versteckt** | Niemand kann den Kurs sehen oder darauf zugreifen (außer Administratoren) |