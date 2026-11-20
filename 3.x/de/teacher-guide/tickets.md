# Support-Tickets

Das Werkzeug **Tickets** ist ein integriertes Helpdesk-System, mit dem Benutzer Supportanfragen einreichen und deren Bearbeitung verfolgen können. Je nach Konfiguration Ihrer Plattform nutzen Sie es als **Anfragender** (Tickets im eigenen Namen oder im Namen Ihrer Lernenden einreichen) oder als **Support-Mitarbeiter** (auf Tickets antworten, die Ihrer Kategorie zugewiesen sind).

## Aufbau des Systems

Tickets gehören zu **Projekten**, die wiederum in **Kategorien** unterteilt sind. Jeder Kategorie können ein oder mehrere Support-Mitarbeiter zugewiesen sein. Wird ein Ticket eingereicht, wird es automatisch an einen verfügbaren Mitarbeiter der ausgewählten Kategorie weitergeleitet.

Zu den Standardkategorien gehören:

| Kategorie | Beschreibung |
|----------|-------------|
| Einschreibung | Fragen und Probleme zur Kurs- oder Sitzungseinschreibung |
| Allgemeine Informationen | Allgemeine Fragen zur Plattform |
| Anfragen und Unterlagen | Administrative Anfragen und Dokumentation |
| Akademische Vorfälle | Probleme im Zusammenhang mit Prüfungen, Aufgaben oder Arbeitsaufträgen |
| Virtueller Campus | Technische Probleme mit der Plattform |
| Online-Bewertung | Probleme mit einer bestimmten Kursbewertung (erfordert die Auswahl eines Kurses) |

## Zugriff auf das Ticket-Werkzeug

Wenn Ihr Administrator den Ticket-Link aktiviert hat, erscheint in der oberen Navigationsleiste ein Ticket-Symbol <img src="../.gitbook/assets/icons/mdi-ticket-account.svg" alt="Ticket" data-size="line">. Klicken Sie darauf, um direkt zum Formular für die Ticketeinreichung zu gelangen.

Sie können Ihre Tickets auch über das Hauptmenü unter **Support** oder **Tickets** aufrufen, je nach Konfiguration Ihrer Plattform.

## Ein Ticket einreichen

So eröffnen Sie eine neue Supportanfrage:

1. Klicken Sie auf **Neues Ticket** (oder auf das Ticket-Symbol in der oberen Leiste).
2. Wählen Sie die **Kategorie**, die am besten zu Ihrem Anliegen passt.
3. Wenn die Kategorie dies erfordert (zum Beispiel Online-Bewertung), wählen Sie den betreffenden **Kurs**.
4. Geben Sie einen **Betreff** ein — eine kurze Zusammenfassung des Problems.
5. Schreiben Sie Ihre **Nachricht** und beschreiben Sie das Problem ausführlich.
6. Hängen Sie optional Dateien an (Screenshots, Dokumente), damit der Support-Mitarbeiter das Problem besser nachvollziehen kann.
7. Klicken Sie auf **Absenden**.

Dem Ticket wird eine ID zugewiesen, und es wird an einen Support-Mitarbeiter weitergeleitet. Sie erhalten eine Benachrichtigung, sobald der Mitarbeiter antwortet.

## Ihre Tickets verfolgen

In der Ticketliste sehen Sie alle von Ihnen eingereichten Tickets und deren aktuellen Status:

| Status | Bedeutung |
|--------|---------|
| Neu | Gerade eingereicht, noch nicht geprüft |
| Ausstehend | Wird von einem Support-Mitarbeiter geprüft |
| Unbestätigt | Wartet auf Bestätigung oder zusätzliche Informationen |
| Weitergeleitet | An ein anderes Team oder einen anderen Mitarbeiter übertragen |
| Geschlossen | Gelöst |

Klicken Sie auf ein beliebiges Ticket, um den vollständigen Gesprächsverlauf zu lesen und eine Antwort hinzuzufügen.

## Den Ticket-Ersteller identifizieren

In der Ticketdetailansicht werden nun der **vollständige Name** und der **Benutzername** des Erstellers (sofern verfügbar) zusammen mit seinen **Rollen** angezeigt. Der Benutzername hilft, Personen mit ähnlichen Namen zu unterscheiden, während die Rollenbezeichnungen (zum Beispiel Lernender, Lehrkraft oder Administrator) den Kontext einer Supportanfrage verdeutlichen. Der Name des Erstellers kann auf dessen Profil verlinken, wenn eine Profil-URL verfügbar ist.

Diese Angaben werden in der Ticketansicht angezeigt; sie gewähren keine zusätzlichen Berechtigungen und ändern nicht die Ticketinhaberschaft. Siehe [PR #9403](https://github.com/chamilo/chamilo-lms/pull/9403).

## Auf ein Ticket antworten

Sobald ein Ticket geöffnet ist, tauschen Sie und der Support-Mitarbeiter Nachrichten im selben Verlauf aus. So fügen Sie eine Antwort hinzu:

1. Öffnen Sie das Ticket aus Ihrer Liste.
2. Scrollen Sie zum Antwortfeld am unteren Rand.
3. Schreiben Sie Ihre Antwort und hängen Sie bei Bedarf Dateien an.
4. Klicken Sie auf **Senden**.

Beide Seiten erhalten Benachrichtigungen, wenn dem Verlauf eine neue Nachricht hinzugefügt wird.

## Tickets als Support-Mitarbeiter bearbeiten

Wenn Ihr Administrator Sie einer oder mehreren Ticketkategorien zugewiesen hat, sehen Sie eingehende Tickets von Lernenden oder Kollegen in Ihrer Warteschlange.

So antworten Sie auf ein zugewiesenes Ticket:

1. Öffnen Sie Ihre Ticketliste — zugewiesene Tickets erscheinen neben den von Ihnen eingereichten Tickets.
2. Klicken Sie auf ein Ticket, um die Nachricht des Anfragenden zu lesen.
3. Schreiben Sie eine Antwort und klicken Sie auf **Senden**. Der Ticketstatus wird automatisch aktualisiert.
4. Wenn das Problem gelöst ist, ändern Sie den Status in **Geschlossen**.

Sie können auch die **Priorität** eines Tickets ändern (Niedrig, Normal, Hoch), um Ihre Warteschlange besser zu priorisieren.

> Der Zugriff auf Ticketkategorien wird vom Plattformadministrator gesteuert. Wenn Sie als Support-Mitarbeiter für eine Kategorie hinzugefügt werden möchten, wenden Sie sich an Ihren Administrator. Konfigurationsoptionen finden Sie im Administratorhandbuch unter [Ticket-Einstellungen](../admin-guide/platform-settings/ticket-settings.md).