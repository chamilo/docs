# Support-Tickets

Das **Tickets**-Werkzeug ist ein integriertes Helpdesk-System, mit dem Benutzer Support-Anfragen einreichen und deren Bearbeitung nachverfolgen können. Je nach Konfiguration Ihrer Plattform können Sie es als **Anfragender** (Einreichen von Tickets für sich selbst oder Ihre Lernenden) oder als **Support-Mitarbeiter** (Beantworten von Tickets, die Ihrer Kategorie zugewiesen sind) nutzen.

## Aufbau des Systems

Tickets gehören zu **Projekten**, die weiter in **Kategorien** unterteilt sind. Jeder Kategorie können ein oder mehrere Support-Mitarbeiter zugewiesen sein. Wird ein Ticket eingereicht, wird es automatisch an einen verfügbaren Mitarbeiter in der gewählten Kategorie weitergeleitet.

Standardkategorien umfassen:

| Kategorie | Beschreibung |
|----------|-------------|
| Enrollment | Fragen und Probleme zur Einschreibung in Kurse oder Sitzungen |
| General information | Allgemeine Fragen zur Plattform |
| Requests and paperwork | Administrative Anfragen und Dokumentation |
| Academic Incidents | Probleme im Zusammenhang mit Prüfungen, Aufgaben oder Arbeiten |
| Virtual campus | Technische Probleme mit der Plattform |
| Online evaluation | Probleme mit einer bestimmten Kursbewertung (erfordert die Auswahl eines Kurses) |

## Zugriff auf das Ticket-Werkzeug

Wenn Ihr Administrator den Ticket-Link aktiviert hat, erscheint ein Ticket-Symbol <img src="/.gitbook/assets/icons/mdi-ticket-account.svg" alt="Ticket" data-size="line"> in der oberen Navigationsleiste. Klicken Sie darauf, um direkt zum Formular für die Ticketeinreichung zu gelangen.

Sie können Ihre Tickets auch über das Hauptmenü unter **Support** oder **Tickets** aufrufen, je nach Konfiguration Ihrer Plattform.

## Ein Ticket einreichen

So öffnen Sie eine neue Support-Anfrage:

1. Klicken Sie auf **New ticket** (oder auf das Ticket-Symbol in der oberen Leiste).
2. Wählen Sie die **Kategorie**, die am besten zu Ihrem Anliegen passt.
3. Falls die Kategorie dies erfordert (zum Beispiel Online evaluation), wählen Sie den entsprechenden **Kurs**.
4. Geben Sie einen **Betreff** ein — eine kurze Zusammenfassung des Problems.
5. Verfassen Sie Ihre **Nachricht**, in der Sie das Problem ausführlich beschreiben.
6. Optional können Sie Dateien anhängen (Screenshots, Dokumente), damit der Support-Mitarbeiter das Problem besser nachvollziehen kann.
7. Klicken Sie auf **Submit**.

Dem Ticket wird eine ID zugewiesen und es wird an einen Support-Mitarbeiter weitergeleitet. Sie erhalten eine Benachrichtigung, wenn der Mitarbeiter antwortet.

## Ihre Tickets nachverfolgen

In der Ticketliste sehen Sie alle von Ihnen eingereichten Tickets und deren aktuellen Status:

| Status | Bedeutung |
|--------|---------|
| New | Gerade eingereicht, noch nicht geprüft |
| Pending | Wird von einem Support-Mitarbeiter geprüft |
| Unconfirmed | Wartet auf Bestätigung oder zusätzliche Informationen |
| Forwarded | An ein anderes Team oder einen anderen Mitarbeiter weitergeleitet |
| Closed | Gelöst |

Klicken Sie auf ein beliebiges Ticket, um den vollständigen Gesprächsverlauf zu lesen und eine Antwort hinzuzufügen.

## Auf ein Ticket antworten

Sobald ein Ticket geöffnet ist, tauschen Sie und der Support-Mitarbeiter Nachrichten im selben Verlauf aus. So fügen Sie eine Antwort hinzu:

1. Öffnen Sie das Ticket aus Ihrer Liste.
2. Scrollen Sie zum Antwortfeld am unteren Rand.
3. Verfassen Sie Ihre Antwort und hängen Sie bei Bedarf Dateien an.
4. Klicken Sie auf **Send**.

Beide Parteien erhalten Benachrichtigungen, wenn eine neue Nachricht zum Verlauf hinzugefügt wird.

## Tickets als Support-Mitarbeiter bearbeiten

Wenn Ihr Administrator Sie einer oder mehreren Ticketkategorien zugewiesen hat, sehen Sie eingehende Tickets von Lernenden oder Kollegen in Ihrer Warteschlange.

So antworten Sie auf ein zugewiesenes Ticket:

1. Öffnen Sie Ihre Ticketliste — zugewiesene Tickets erscheinen neben den von Ihnen eingereichten Tickets.
2. Klicken Sie auf ein Ticket, um die Nachricht des Anfragenden zu lesen.
3. Verfassen Sie eine Antwort und klicken Sie auf **Send**. Der Ticketstatus wird automatisch aktualisiert.
4. Wenn das Problem gelöst ist, ändern Sie den Status auf **Closed**.

Sie können auch die **Priorität** eines Tickets ändern (Low, Normal, High), um Ihre Warteschlange zu priorisieren.

> Der Zugriff auf Ticketkategorien wird vom Plattformadministrator gesteuert. Wenn Sie als Support-Mitarbeiter für eine Kategorie hinzugefügt werden müssen, wenden Sie sich an Ihren Administrator. Konfigurationsoptionen finden Sie im Admin-Leitfaden unter [Tickets Settings](../admin-guide/platform-settings/ticket-settings.md).