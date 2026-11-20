# Support-Bot (Entscheidungsbaum-Assistent)

Der **Support-Bot** ist ein konfigurierbarer Hilfe-Assistent, der auf einem festen Entscheidungsbaum basiert. Er wurde in [PR #9224](https://github.com/chamilo/chamilo-lms/pull/9224) für [Issue #8754](https://github.com/chamilo/chamilo-lms/issues/8754) implementiert. Es handelt sich **nicht um einen generativen KI-Chatbot**: Administratoren formulieren Fragen und auswählbare Antworten, die Benutzer zu einer Erklärung, einer Seite oder einem Support-Ticket führen.

## Aktivieren

1. Aktivieren Sie unter **Administration > Konfigurationseinstellungen > Tickets** die Einstellung `ticket.ticket_support_bot_enabled` (standardmäßig deaktiviert).
2. Öffnen Sie **Administration > Support-Bot** und erstellen Sie einen **Entwurf** eines Entscheidungsbaums. Geben Sie einen Titel und mindestens einen Einstiegsknoten mit Optionen an.
3. Definieren Sie an jedem Knoten die Frage oder Information und verknüpfen Sie die Optionen mit der nächsten Aktion.
4. Veröffentlichen Sie einen gültigen Baum. Nur ein veröffentlichter Baum mit einem gültigen Einstiegsknoten und auswählbaren Optionen steht den Benutzern zur Verfügung.

Die Engine wählt den veröffentlichten Baum für die aktuelle Zugriffs-URL aus; seine Verfügbarkeit ist daher portalbezogen. Ein Administrator muss über `ROLE_ADMIN` verfügen, um Bäume zu verwalten.

## Einen Support-Ablauf entwerfen

Jede Option kann eine von vier Aktionen ausführen:

| Aktion | Ergebnis |
| --- | --- |
| **Zu einem anderen Knoten wechseln** | Das Gespräch bei einer anderen Frage im selben Baum fortsetzen |
| **Einen Link öffnen** | Auf eine Chamilo-Seite mit einem relativen Pfad derselben Website verlinken, zum Beispiel `/tickets` |
| **Gespräch beenden** | Das Anliegen als gelöst markieren und optional eine Abschlussmeldung anzeigen |
| **Support-Ticket erstellen** | Das Gespräch an das Ticketsystem eskalieren |

Wählen Sie für die Ticket-Eskalation ein **Standard-Ticketprojekt** und eine Kategorie, die zu diesem Projekt gehört. Kategorien, die einen Kurs erfordern, können für diese Eskalation durch den Support-Bot nicht verwendet werden. Das erstellte Ticket enthält das Transkript des Entscheidungsbaums des Benutzers, sodass das Support-Personal die Entscheidungen sehen kann, die zur Eskalation geführt haben.

Der Editor prüft die Baumstruktur vor der Veröffentlichung. Die Versionen **Veröffentlicht** und **Archiviert** sind schreibgeschützt; verwenden Sie **Duplizieren**, um einen neuen bearbeitbaren Entwurf zu erstellen. Die Veröffentlichung eines Ersatzes archiviert die zuvor veröffentlichte Version im selben Geltungsbereich. In der Liste können Administratoren außerdem einen Baum importieren oder exportieren und seinen Gesprächsverlauf einsehen. Ein veröffentlichter Baum muss vor dem Löschen archiviert werden, und ein Baum mit Gesprächsverlauf kann nicht gelöscht werden.

## Beispiele importieren und Gespräche prüfen

Öffnen Sie **Administration > Support-Bot** und wählen Sie **Importieren**. Der Importdialog bietet **JSON-Beispiel herunterladen** und **CSV-Beispiel herunterladen**. Laden Sie ein Beispiel herunter, ersetzen Sie dessen Fragen und Optionen durch Ihre eigenen, wählen Sie dann die bearbeitete `.json`- oder `.csv`-Datei aus und importieren Sie sie. Jeder importierte Baum beginnt als **neuer Entwurf**; prüfen Sie ihn und veröffentlichen Sie ihn ausdrücklich, wenn er bereit ist.

Die Beispiele erfordern kein vorhandenes Ticketprojekt. Wenn Ihr Ablauf Tickets erstellen soll, konfigurieren Sie nach dem Import das erforderliche Projekt und eine zulässige Kategorie.

Verwenden Sie in der Baumliste **Gespräche anzeigen**, um Gesprächsprotokolle für einen bestimmten Baum einzusehen, einschließlich Bäumen, deren Gesprächszahl null beträgt. Gesprächsverläufe bleiben auf den jeweiligen Benutzer und das jeweilige Portal beschränkt. Siehe [PR #9419](https://github.com/chamilo/chamilo-lms/pull/9419).

## So greifen Benutzer darauf zu

Wenn die Einstellung aktiviert ist und das Portal über einen gültigen veröffentlichten Baum verfügt, sehen angemeldete Benutzer im angedockten Chat einen Kontakt **Support-Bot**. Sie antworten, indem sie die angebotenen Optionen auswählen. Der Bot kann das Gespräch abschließen, eine Seite derselben Website öffnen oder ein Ticket erstellen und den Link dazu anzeigen. Benutzer können nach dem Ende eines früheren Gesprächs ein neues Gespräch beginnen.

Dies ist vom **KI-Tutor** getrennt, der auf offene Lernfragen antwortet. Der Support-Bot folgt ausschließlich den von Administratoren konfigurierten Routen und Optionen.

## Fehlerbehebung und Sicherheit

* **Kein Bot im Chat:** Prüfen Sie die Tickets-Einstellung, ob für das aktuelle Portal ein Baum veröffentlicht ist und ob dessen Einstiegsknoten Optionen hat.
* **Veröffentlichung nicht möglich:** Prüfen Sie im Entwurf fehlende Knoten, unaufgelöste Zielknoten und ungültige Aktionen.
* **Ticket kann nicht erstellt werden:** Prüfen Sie das ausgewählte Ticketprojekt und die Kategorie. Verwenden Sie keine Ticketkategorie, die einen Kurs erfordert.
* **Ältere Gespräche fehlen:** Administratoren können den Gesprächsverlauf über den entsprechenden Baum einsehen; Gespräche sind an einen Benutzer und eine Zugriffs-URL gebunden.

Zur zugehörigen Einstellung siehe [Tickets-Einstellungen](platform-settings/ticket-settings.md).