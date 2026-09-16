# Übungsgenerator

Der KI-Übungsgenerator unterstützt Sie dabei, Quizfragen automatisch mithilfe künstlicher Intelligenz zu erstellen. Sie geben ein Thema oder Inhalte vor, und die KI generiert Fragen, die Sie überprüfen, bearbeiten und zu Ihren Übungen hinzufügen können.

## Zugriff auf den Übungsgenerator

Der Übungsgenerator ist verfügbar, wenn Sie eine Übung erstellen oder bearbeiten, vorausgesetzt:

1. KI-Hilfsfunktionen sind auf Plattformebene aktiviert
2. Mindestens ein KI-Textanbieter ist konfiguriert

Suchen Sie nach der Schaltfläche oder dem Abschnitt **KI-Generator** innerhalb der Benutzeroberfläche zur Erstellung von Übungen.

## Fragen generieren

![Das Formular des KI-Übungsgenerators mit Feldern für Thema und Anzahl der Fragen](/.gitbook/assets/ai-exercise-generator.png)

Der Generator bietet zwei Modi, die als Registerkarten verfügbar sind:

* **Test aus Thema** — Fragen aus einer textlichen Themenbeschreibung generieren
* **Test aus Dokument** — Fragen aus einem Kursdokument generieren (nur verfügbar, wenn ein dokumentfähiger Anbieter konfiguriert ist). In diesem Modus wird das Themenfeld optional und dient als zusätzlicher Hinweis.

1. Öffnen Sie das KI-Generator-Formular innerhalb einer Übung und wählen Sie den Modus aus
2. Konfigurieren Sie die Generierungsparameter:
   * **Quiztitel** — Der Titel für die resultierende Übung
   * **Fragenthema** — Beschreiben Sie, worum es bei den Fragen gehen soll (oder im Dokumentmodus ein optionaler Hinweis)
   * **Anzahl der Fragen** — Wie viele Fragen generiert werden sollen (begrenzt auf 100)
   * **Fragentyp** — Derzeit wird nur **Mehrfachantwort** angeboten
   * **KI-Anbieter** — Wählen Sie den zu verwendenden KI-Anbieter aus (wird nur angezeigt, wenn mehr als einer konfiguriert ist)
3. Klicken Sie auf **Generieren**
4. Die KI erstellt einen Satz von Fragen mit Antwortoptionen und markierten richtigen Antworten. Wenn die Offenlegung von KI aktiviert ist, werden generierte Fragen mit dem Präfix **\[KI-unterstützt\]** versehen.

## Überprüfen und Bearbeiten

![KI-generierte Fragen zur Überprüfung mit Optionen zum Bearbeiten, Akzeptieren oder Entfernen jeder einzelnen Frage](/.gitbook/assets/ai-exercise-generator-results.png)

Generierte Fragen werden als **Vorschläge** präsentiert. Sie sollten:

* **Jede Frage überprüfen** auf Genauigkeit und Relevanz
* **Den Wortlaut bearbeiten**, falls nötig — passen Sie Fragen, Antwortoptionen und Feedback an
* **Richtige Antworten verifizieren** — stellen Sie sicher, dass die KI die korrekten Antworten identifiziert hat
* **Ungeeignete Fragen entfernen** — löschen Sie alle, die Ihren Standards nicht entsprechen
* **Bewertung anpassen** — legen Sie angemessene Punktwerte für jede Frage fest

Sobald Sie zufrieden sind, fügen Sie die Fragen zu Ihrer Übung hinzu.

Beachten Sie, dass trotz unserer spezifischen Formatwünsche einige Modelle Fragentitel mit einer Nummer voranstellen. Wir empfehlen, diese Nummer nicht stehen zu lassen, da dies die Mischung von Fragen in Tests mit zufällig ausgewählten Fragen beeinträchtigen kann. Außerdem erhalten Sie manchmal nicht so viele Fragen, wie Sie angefordert haben. Überprüfen Sie dies daher und generieren Sie gegebenenfalls weitere Fragen oder wechseln Sie das Modell, falls dies möglich ist.

## Offenlegung von KI-generierten Inhalten

Inhalte, die von KI generiert wurden, sind mit einem Offenlegungshinweis gekennzeichnet, der darauf hinweist, dass sie mithilfe künstlicher Intelligenz erstellt wurden. Diese Transparenz hilft Lernenden, die Herkunft des Materials zu verstehen.

## Tipps

* **Geben Sie spezifische Themen an** — Je spezifischer Ihre Themenbeschreibung ist, desto relevanter werden die generierten Fragen sein.
* **Immer überprüfen** — KI-generierte Inhalte können Fehler enthalten. Veröffentlichen Sie niemals Fragen, ohne sie vorher zu überprüfen.
* **Als Ausgangspunkt nutzen** — Generierte Fragen sind eine Zeitersparnis, kein fertiges Produkt. Bearbeiten Sie sie, um sie an Ihren Lehrstil und Kursinhalt anzupassen.
* **Mit manuellen Fragen kombinieren** — Kombinieren Sie KI-generierte Fragen mit manuell erstellten für die besten Ergebnisse.
* **Verschiedene Anbieter ausprobieren** — Wenn mehrere KI-Anbieter verfügbar sind, testen Sie verschiedene, um herauszufinden, welcher die besten Fragen für Ihren Fachbereich liefert.