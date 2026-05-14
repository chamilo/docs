# KI-Tutor

Der KI-Tutor ist ein Chatbot, der in Chamilo integriert ist und mit dem Lernende interagieren können, um kursbezogene Fragen zu stellen. Er liefert sofortige, kontextbezogene Antworten, die von einem großen Sprachmodell unterstützt werden.

## Wie es funktioniert

Wenn der KI-Tutor für einen Kurs aktiviert ist, sehen die Lernenden eine Chat-Oberfläche, über die sie:

* **Fragen stellen** zu den Kursinhalten
* **Erklärungen erhalten** zu Konzepten, die im Kurs behandelt werden
* **Anleitung bekommen**, ohne auf eine Antwort des Lehrers warten zu müssen

Der KI-Tutor nutzt den Kurskontext, um relevante Antworten zu geben. Er ist darauf ausgelegt, Ihre Lehrtätigkeit zu ergänzen, nicht zu ersetzen.

## Aktivierung des KI-Tutors

Der KI-Tutor erfordert zwei Konfigurationsebenen:

1. **Plattformebene** — Der Administrator muss KI-Hilfsprogramme aktivieren und mindestens einen KI-Anbieter konfigurieren (siehe [KI-Konfiguration](../../admin-guide/integrations/ai-configuration.md))
2. **Kurserbene** — Der KI-Tutor muss in den Kurseinstellungen aktiviert werden (ein einfacher Ein-/Aus-Schalter). Der für den Chat verwendete Anbieter ist derjenige, der vom Administrator konfiguriert wurde.

## Die Chat-Oberfläche

![Die Chat-Oberfläche des KI-Tutors zeigt eine Unterhaltung zwischen einem Lernenden und der KI](/.gitbook/assets/ai-tutor-chat.png)

Der KI-Tutor erscheint als **angedocktes Chat-Fenster** innerhalb des Kurses. Lernende können:

* Nachrichten eingeben und KI-generierte Antworten erhalten
* Ihren Gesprächsverlauf einsehen
* Die Unterhaltung zurücksetzen, um neu zu beginnen

Die Chat-Oberfläche zeigt den Austausch zwischen dem Lernenden und der KI in einem vertrauten Nachrichtenformat.

## Wichtiges Verhalten

* **Nur im Kurskontext** — Der KI-Tutor ist nur innerhalb eines Kurses verfügbar, nicht auf der allgemeinen Plattform
* **Deaktiviert während Prüfungen** — Der KI-Tutor wird automatisch deaktiviert, wenn ein Lernender eine Übung macht, um Betrug zu verhindern
* **Unterhaltung pro Lernendem** — Jeder Lernende hat seine eigene private Unterhaltung mit dem KI-Tutor, und der Kontext der Eingabe umfasst nur die neuesten Nachrichten
* **Anbieter-Ausfallsicherung** — Wenn der konfigurierte Anbieter ausfällt, greift Chamilo auf einen anderen verfügbaren Anbieter zurück, damit der Chat weiterhin funktioniert

## Als Lehrkraft

Sie sollten Folgendes beachten:

* Der KI-Tutor liefert möglicherweise nicht immer perfekte Antworten — ermutigen Sie Lernende, wichtige Informationen zu überprüfen
* Sie können die Nutzung des KI-Tutors über die Plattform-Tracking-Funktion überprüfen
* Der KI-Tutor ist eine Ergänzung zu Ihrer Lehrtätigkeit, kein Ersatz. Nutzen Sie ihn neben Foren, Ankündigungen und direkter Kommunikation für eine umfassende Unterstützung der Lernenden.

## Tipps

* **Erwartungen setzen** — Informieren Sie die Lernenden zu Beginn des Kurses darüber, dass ein KI-Tutor verfügbar ist, und erklären Sie, wie er angemessen genutzt werden sollte
* **Kritisches Denken fördern** — Erinnern Sie die Lernenden daran, KI-generierte Antworten kritisch zu hinterfragen
* **Für häufig gestellte Fragen nutzen** — Der KI-Tutor ist besonders nützlich, um häufige Fragen zu beantworten, die Sie sonst wiederholt beantworten müssten