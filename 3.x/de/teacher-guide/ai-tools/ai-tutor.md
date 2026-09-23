# KI-Tutor

Der KI-Tutor ist ein in Chamilo integrierter Chatbot, mit dem Lernende interagieren können, um sofortige, KI-generierte Antworten zu erhalten. Er arbeitet in zwei Kontexten, jeweils mit einem anderen Schwerpunkt:

* **Innerhalb eines Kurses** — der KI-Tutor konzentriert sich auf diesen Kurs: Er beantwortet Fragen zu dessen Inhalten, erklärt behandelte Konzepte und führt Lernende durch das Material.
* **Außerhalb eines Kurses** (auf der allgemeinen Plattform) — der KI-Tutor behandelt stattdessen allgemeine Fragen zur Plattformnutzung, etwa wie man etwas findet oder eine Funktion verwendet, und nicht Kursinhalte.

## Funktionsweise

Wenn der KI-Tutor für einen Kurs aktiviert ist, sehen Lernende eine Chat-Oberfläche, in der sie:

* **Fragen stellen** zu Kursinhalten
* **Erklärungen erhalten** zu im Kurs behandelten Konzepten
* **Unterstützung bekommen**, ohne auf eine Antwort der Lehrkraft warten zu müssen

Innerhalb eines Kurses nutzt der KI-Tutor den Kontext dieses Kurses, um relevante Antworten zu geben. Er ist als Ergänzung Ihrer Lehre gedacht, nicht als Ersatz.

## Aktivieren des KI-Tutors

Der KI-Tutor erfordert zwei Konfigurationsebenen:

1. **Plattformebene** — Die Administration muss KI-Hilfen aktivieren und mindestens einen KI-Anbieter konfigurieren (siehe [KI-Konfiguration](../../admin-guide/integrations/ai-configuration.md))
2. **Kursebene** — Der KI-Tutor muss in den Kurseinstellungen aktiviert werden (ein einfacher Ein-/Ausschalter). Der für den Chat verwendete Anbieter ist der von der Administration konfigurierte.

## Die Chat-Oberfläche

![Die Chat-Oberfläche des KI-Tutors mit einer Unterhaltung zwischen einer lernenden Person und der KI](../../.gitbook/assets/ai-tutor-chat.png)

Der KI-Tutor erscheint als **angedocktes Chat-Panel** innerhalb des Kurses. Lernende können:

* Nachrichten eingeben und KI-generierte Antworten erhalten
* ihren Gesprächsverlauf einsehen
* das Gespräch zurücksetzen, um neu zu beginnen

Die Chat-Oberfläche zeigt den Austausch zwischen der lernenden Person und der KI in einem vertrauten Nachrichtenformat.

## Wichtiges Verhalten

* **Begrenzt auf den Öffnungsort** — Innerhalb eines Kurses beantwortet der KI-Tutor nur Fragen zu diesem Kurs; außerhalb eines Kurses geöffnet, wechselt er zu allgemeinen Fragen zur Plattformnutzung. Der plattformweite Modus (außerhalb von Kursen) ist ein separater Schalter, den Ihre Administration unabhängig vom kursbezogenen Schalter steuert.
* **Während Prüfungen deaktiviert** — Der KI-Tutor wird automatisch deaktiviert, wenn eine lernende Person eine Übung absolviert, um Betrug zu verhindern
* **Gespräch pro lernender Person** — Jede lernende Person hat ein eigenes privates Gespräch mit dem KI-Tutor, und der Prompt-Kontext umfasst nur die neuesten Nachrichten
* **Anbieter-Failover** — Wenn der konfigurierte Anbieter ausfällt, wechselt Chamilo auf einen anderen verfügbaren Anbieter, damit der Chat weiter funktioniert

## Als Lehrkraft

Sie sollten Folgendes beachten:

* Der KI-Tutor liefert nicht immer perfekte Antworten — ermutigen Sie Lernende, wichtige Informationen zu überprüfen
* Sie können die Nutzung des KI-Tutors über das Plattform-Tracking einsehen
* Der KI-Tutor ist eine Ergänzung Ihrer Lehre, kein Ersatz. Nutzen Sie ihn zusammen mit Foren, Ankündigungen und Direktnachrichten für eine umfassende Unterstützung der Lernenden.

## Tipps

* **Erwartungen setzen** — Teilen Sie den Lernenden zu Beginn des Kurses mit, dass ein KI-Tutor verfügbar ist, und erklären Sie, wie er angemessen genutzt wird
* **Kritisches Denken fördern** — Erinnern Sie Lernende daran, KI-generierte Antworten kritisch zu hinterfragen
* **Für häufig gestellte Fragen nutzen** — Der KI-Tutor eignet sich besonders gut für häufige Fragen, die Sie sonst wiederholt beantworten müssten