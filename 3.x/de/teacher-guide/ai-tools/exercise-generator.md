# Übungs-Generator

Der KI-Übungs-Generator hilft Ihnen, Quizfragen mithilfe künstlicher Intelligenz automatisch zu erstellen. Sie geben ein Thema oder Inhalte vor, und die KI erzeugt Fragen, die Sie prüfen, bearbeiten und Ihren Übungen hinzufügen können.

## Zugriff auf den Übungs-Generator

Der Übungs-Generator steht beim Erstellen oder Bearbeiten einer Übung zur Verfügung, sofern:

1. KI-Hilfen auf Plattformebene aktiviert sind
2. mindestens ein KI-Textanbieter konfiguriert ist

Suchen Sie in der Oberfläche zur Übungserstellung nach der Schaltfläche oder dem Bereich **AI Generator**.

## So generieren Sie Fragen

![Das Formular des KI-Übungs-Generators mit Feldern für Thema und Anzahl der Fragen](/.gitbook/assets/ai-exercise-generator.png)

Der Generator bietet zwei Modi, die als Registerkarten verfügbar sind:

* **Test from topic** — Fragen aus einer textuellen Themenbeschreibung generieren
* **Test from document** — Fragen aus einem Kursdokument generieren (nur verfügbar, wenn ein dokumentfähiger Anbieter konfiguriert ist). In diesem Modus wird das Themenfeld optional und als zusätzlicher Hinweis behandelt.

1. Öffnen Sie das Formular des AI Generator in einer Übung und wählen Sie den Modus
2. Konfigurieren Sie die Generierungsparameter:
   * **Quiz title** — Der Titel der resultierenden Übung
   * **Questions topic** — Beschreiben Sie, worum es in den Fragen gehen soll (oder, im Dokumentmodus, ein optionaler Hinweis)
   * **Number of questions** — Wie viele Fragen generiert werden sollen (begrenzt auf 100)
   * **Question type** — Derzeit wird nur **Multiple answer** angeboten
   * **AI provider** — Wählen Sie, welcher KI-Anbieter verwendet werden soll (wird nur angezeigt, wenn mehr als einer konfiguriert ist)
3. Klicken Sie auf **Generate**
4. Die KI erzeugt einen Satz Fragen mit Antwortoptionen und markierten richtigen Antworten. Wenn die KI-Kennzeichnung aktiviert ist, werden generierte Fragen mit **\[AI-assisted\]** vorangestellt.

## Prüfung und Bearbeitung

![KI-generierte Fragen zur Prüfung, mit Optionen zum Bearbeiten, Übernehmen oder Entfernen jeder einzelnen](/.gitbook/assets/ai-exercise-generator-results.png)

Generierte Fragen werden als **Vorschläge** dargestellt. Sie sollten:

* **Jede Frage prüfen** auf Richtigkeit und Relevanz
* **Die Formulierung bearbeiten**, falls nötig — Fragen, Antwortoptionen und Feedback anpassen
* **Richtige Antworten überprüfen** — sicherstellen, dass die KI die richtigen Antworten erkannt hat
* **Ungeeignete Fragen entfernen** — alle löschen, die Ihren Anforderungen nicht genügen
* **Bewertung anpassen** — angemessene Punktwerte für jede Frage festlegen

Wenn Sie zufrieden sind, fügen Sie die Fragen Ihrer Übung hinzu.

Beachten Sie, dass trotz unserer spezifischen Formatvorgaben einige Modelle Fragentitel mit einer vorangestellten Nummer zurückgeben. Wir empfehlen nicht, diese Nummer stehen zu lassen, da sie die Durchmischung von Fragen in Tests mit zufällig ausgewählten Fragen erschwert. Außerdem erhalten Sie manchmal nicht so viele Fragen, wie Sie angefordert haben; prüfen Sie das daher und generieren Sie gegebenenfalls weitere Fragen oder wechseln Sie das Modell, falls das möglich ist.

## Kennzeichnung KI-generierter Inhalte

Von KI erzeugte Inhalte werden mit einem Hinweis versehen, der angibt, dass sie mithilfe künstlicher Intelligenz erstellt wurden. Diese Transparenz hilft Lernenden, den Ursprung des Materials zu verstehen.

## Tipps

* **Geben Sie konkrete Themen an** — Je spezifischer Ihre Themenbeschreibung, desto relevanter werden die generierten Fragen.
* **Immer prüfen** — KI-generierte Inhalte können Fehler enthalten. Veröffentlichen Sie niemals Fragen, ohne sie zuvor zu prüfen.
* **Als Ausgangspunkt nutzen** — Generierte Fragen sparen Zeit, sind aber kein fertiges Produkt. Bearbeiten Sie sie, damit sie zu Ihrem Lehrstil und Ihren Kursinhalten passen.
* **Mit manuellen Fragen mischen** — Kombinieren Sie KI-generierte Fragen mit manuell erstellten für die besten Ergebnisse.
* **Verschiedene Anbieter ausprobieren** — Wenn mehrere KI-Anbieter verfügbar sind, testen Sie verschiedene, um zu sehen, welcher für Ihr Fachgebiet die besten Fragen liefert.