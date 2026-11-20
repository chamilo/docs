# KI-Coach für Lernerfolg

Der **KI-Coach für Lernerfolg** unterstützt eine Lehrkraft dabei, Kursaktivitäten in praktische Empfehlungen für eine einzelne lernende Person umzuwandeln. Er ist über die Lernendenliste im Kursberichts bereich verfügbar, wenn KI-Hilfen und die Funktion **Kursanalyse** für diesen Kurs aktiviert sind.

> Die Plattform muss mindestens einen Text-KI-Anbieter konfiguriert haben. Siehe [KI-Konfiguration](../../admin-guide/integrations/ai-configuration.md). Die relevanten Plattformeinstellungen sind `ai_helpers.enable_ai_helpers` und `ai_helpers.course_analyser` unter **Verwaltung > Konfigurationseinstellungen > KI-Hilfen**.

## Empfehlung erzeugen

1. Öffnen Sie den Kursberichts bereich und zeigen Sie die **Lernendenliste** an.
2. Suchen Sie die lernende Person und klicken Sie auf die Aktion **KI-Coach für Lernerfolg**.
3. Wenn mehrere KI-Anbieter verfügbar sind, wählen Sie einen aus.
4. Geben Sie optional **Zusätzliche Anweisungen für den KI-Coach** ein. Damit können Sie Unterrichtskontext ergänzen oder den Coach bitten, sich auf eine bestimmte Schwierigkeit zu konzentrieren.
5. Klicken Sie auf **Lernen des Benutzers analysieren**.

Chamilo bereitet zunächst eine Kursanalyse vor oder verwendet eine vorhandene erneut und analysiert anschließend die Aktivität der lernenden Person im aktuellen Kurs- oder Kurssitzungskontext.

## Inhalt der Empfehlung

Das Ergebnis kann Folgendes enthalten:

* eine knappe Gesamtzusammenfassung;
* **Prioritäre Maßnahmen**;
* vorgeschlagene **Zusätzliche Aktivitäten**;
* Empfehlungen zu **Rhythmus** und Tempo;
* alternative **Lernmethoden**;
* weitere Empfehlungen, sofern relevant;
* Links zu **Belegen** aus dem genehmigten pädagogischen Quellenkatalog für die Kurssprache.

Die Empfehlung wird in Chamilo für diese lernende Person und diesen Kurskontext gespeichert. Chamilo speichert außerdem eine Kopie im eigenen Posteingang der Lehrkraft, wenn die Erstellung der Nachricht erfolgreich ist, sodass sie später erneut geprüft werden kann.

## Datenschutz

Bevor die Analyse beginnt, zeigt Chamilo einen Datenschutzhinweis an. Direkte Profilkennungen werden aus den an den KI-Anbieter gesendeten Daten der lernenden Person ausgelassen, und die KI wird angewiesen, die lernende Person nicht zu identifizieren und keine sensiblen Merkmale abzuleiten. Lernaktivitäten und Kursinhalte können jedoch weiterhin Informationen enthalten, die jemanden indirekt identifizieren könnten. Befolgen Sie die KI- und Datenschutzrichtlinie Ihrer Organisation, bevor Sie die Funktion verwenden.

Dieselbe Student-Success-Analyse steht autorisierten MCP-Clients auch über das Werkzeug `generate_student_success_feedback` zur Verfügung; sie verwendet denselben datenschutzgefilterten Analyseablauf.