# Die Benutzeroberfläche verstehen

Chamilo 3.0 verfügt über eine klare, moderne Benutzeroberfläche, die eine einfache Navigation ermöglicht. Diese Seite erläutert jeden Bestandteil der Oberfläche im Detail.

## Die obere Leiste

![Die obere Leiste mit beschrifteten Elementen, darunter Logo, Posteingang, Support-Ticket und Benutzeravatar](/.gitbook/assets/top-bar-annotated.png)

Die obere Leiste ist oben auf jeder Seite stets sichtbar. Sie enthält:

* **Plattform-Logo** — Klicken Sie darauf, um jederzeit zur Startseite zurückzukehren.
* **Posteingangs-Symbol** <img src="/.gitbook/assets/icons/mdi-inbox.svg" alt="Inbox" data-size="line"> — Zeigt Ihre Nachrichten. Ein rotes Abzeichen weist auf ungelesene Nachrichten hin. Klicken Sie, um Ihren Posteingang zu öffnen.
* **Support-Ticket-Symbol** <img src="/.gitbook/assets/icons/mdi-ticket-account.svg" alt="Support" data-size="line"> — Sofern von Ihrer Administration aktiviert, erhalten Sie darüber Zugriff auf das Support-Ticket-System.
* **Ihr Avatar** — Ein kreisförmiges Bild in der oberen rechten Ecke. Klicken Sie darauf, um ein Dropdown-Menü mit Links zu Ihrem Profil, den Kontoeinstellungen und der Abmeldung zu öffnen.

## Die Seitenleiste

Die Seitenleiste links ist Ihre Hauptnavigation. Sie kann eingeklappt werden, um dem Inhaltsbereich mehr Platz zu geben. Klicken Sie auf den Umschaltpfeil am rechten Rand, um sie ein- oder auszuklappen. Chamilo merkt sich Ihre Einstellung.

Die Seitenleiste enthält die folgenden Links (einige können je nach Konfiguration Ihrer Plattform ausgeblendet sein):

![Das Navigationsfeld der Seitenleiste im ausgeklappten Zustand mit allen Menüpunkten](/.gitbook/assets/sidebar-expanded.png)

| Menüpunkt | Symbol | Beschreibung |
|-----------|------|-------------|
| **Startseite** | <img src="/.gitbook/assets/icons/mdi-home.svg" alt="Home" data-size="line"> | Kehrt zum Hauptdashboard zurück |
| **Meine Kurse** | <img src="/.gitbook/assets/icons/mdi-book-open-page-variant.svg" alt="Courses" data-size="line"> | Listet alle Kurse auf, in denen Sie eingeschrieben sind |
| **Meine Sitzungen** | <img src="/.gitbook/assets/icons/mdi-google-classroom.svg" alt="Sessions" data-size="line"> | Listet Ihre Trainingssitzungen auf (aktuell, vergangen, bevorstehend) |
| **Weitere Kurse entdecken** | <img src="/.gitbook/assets/icons/mdi-bookmark-multiple.svg" alt="Catalogue" data-size="line"> | Durchsuchen Sie den Kurskatalog, um neue Kurse zu finden |
| **Agenda** | <img src="/.gitbook/assets/icons/mdi-calendar-text.svg" alt="Agenda" data-size="line"> | Ihr persönlicher und kursbezogener Kalender |
| **Berichte** | <img src="/.gitbook/assets/icons/mdi-chart-box.svg" alt="Reporting" data-size="line"> | Zugriff auf Lernendenverfolgung und Kursberichte |
| **Soziales Netzwerk** | <img src="/.gitbook/assets/icons/mdi-sitemap-outline.svg" alt="Social network" data-size="line"> | Mit anderen Nutzern verbinden, Nachrichten senden, Gruppen beitreten |
| **Videokonferenz** | <img src="/.gitbook/assets/icons/mdi-video.svg" alt="Video" data-size="line"> | Zugriff auf Live-Videositzungen (falls konfiguriert) |
| **Administration** | <img src="/.gitbook/assets/icons/mdi-cogs.svg" alt="Admin" data-size="line"> | Plattformadministration (nur für Admins sichtbar) |

Ganz unten in der Seitenleiste finden Sie die Option **Abmelden**, um sich schnell abzumelden, wenn Sie fertig sind. Diese Option ist auch über das Dropdown-Menü Ihres Avatars in der oberen rechten Ecke verfügbar.
Wenn die Plattform über externe Authentifizierungsmethoden verwaltet wird, stehen diese Abmeldeoptionen möglicherweise nicht zur Verfügung.

## Der Hauptinhaltsbereich

Der zentrale Bereich des Bildschirms zeigt den Inhalt der aktuellen Seite. Oben sehen Sie häufig eine **Brotkrumennavigation**, die Ihren aktuellen Standort auf der Plattform anzeigt (zum Beispiel: Startseite > Rockmusik > Dokumente). Nutzen Sie die Brotkrumen, um zu einer übergeordneten Seite zurückzukehren.

## Die Kursstartseite

Wenn Sie einen Kurs betreten, sehen Sie die **Kursstartseite**. Diese wird im Abschnitt [Ihren Kurs erstellen](../creating-your-course/) ausführlich behandelt; hier eine kurze Übersicht:

* **Kurstitel** — Deutlich oben angezeigt
* **Kurzeinführung** — Eine optionale Rich-Text-Beschreibung, die Sie bearbeiten können
* **Werkzeugraster** — Ein Raster aus Symbolen, die die Kurswerkzeuge darstellen (Dokumente, Übungen, Foren usw.)

Als Lehrkraft sehen Sie zusätzliche Steuerelemente:

* **Studierendenansicht** <img src="/.gitbook/assets/icons/mdi-eye.svg" alt="Student view" data-size="line"> — Schalten Sie um, um den Kurs so zu sehen, wie ihn eine Studentin oder ein Student sehen würde
* **Einführung bearbeiten** <img src="/.gitbook/assets/icons/mdi-pencil.svg" alt="Edit" data-size="line"> — Den Text der Kurseinführung bearbeiten
* **Alle anzeigen / Alle ausblenden** — Die Sichtbarkeit aller Werkzeuge für Studierende schnell ändern
* **Sortieren** — Drag-and-Drop aktivieren, um die Werkzeuge auf der Startseite neu anzuordnen

## Icon-Farben

Dies ist noch experimentell und in Chamilo 3.0 nicht vollständig umgesetzt, aber wir versuchen, für alle Schaltflächen und Aktions-Icons in der Oberfläche die folgenden Regeln anzuwenden:

* **Grün** für Erstellungsaktionen. Dazu gehören Hinzufügen, Erstellen, Importieren, Bewerten, Speichern und Kopieren von Inhalten.
* **Blau** für Ansichtsaktionen. Dazu gehören Exportieren, Anzeigen, Vorschau in Listen oder Detailansichten, Suchen und Herunterladen.
* **Orange** für Bearbeitungsaktionen. Dazu gehören Bearbeiten, Verschieben, Konfigurieren, Aktivieren/Deaktivieren, Ausblenden und Einblenden.
* **Rot** für Lösch-/Entfernungsaktionen. Dazu gehören Löschen, Entfernen, Abmelden.
* **Grau** für Abbruchaktionen. Es bleibt einfach beim Status quo.

## Responsives Design

Chamilo 3.0 passt sich unterschiedlichen Bildschirmgrößen an. Auf einem Mobilgerät oder in einem schmalen Browserfenster:

* Die Seitenleiste ist standardmäßig ausgeblendet und kann durch Tippen auf das Menü-Icon geöffnet werden
* Kurskarten werden in einer einzelnen Spalte statt in einem Raster angezeigt
* Tabellen werden horizontal scrollbar

Das bedeutet, dass Sie und Ihre Lernenden die Plattform von einem Telefon, Tablet oder Computer aus nutzen können, die Oberfläche jedoch etwas anders wahrnehmen können.