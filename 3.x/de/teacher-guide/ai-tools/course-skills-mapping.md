# KI-gestützte Zuordnung von Kurskompetenzen

Chamilo 3.1 kann einem Kurs zugeordnete Kompetenzen vorschlagen und berechtigten Benutzern ermöglichen, diese Vorschläge zu prüfen und auf das Kompetenzreferential und das Gradebook anzuwenden. Ein KI-Vorschlag wird **nicht automatisch angewendet**; er muss ausgewählt und genehmigt werden.

## Vorschläge erzeugen

1. Öffnen Sie die Seite **KI-gestützte Kompetenzzuordnung** des betreffenden Kurses. Die Anwendungsroute lautet `/course/{courseId}/skills`, wobei `{courseId}` durch die tatsächliche Kurs-ID ersetzt wird.
2. Wenn der Kurs Teil einer Sitzung ist, öffnen Sie die Seite im richtigen Sitzungskontext.
3. Wählen Sie einen verfügbaren **KI-Anbieter**.
4. Wählen Sie **Kompetenzen für diesen Kurs vorschlagen** und prüfen Sie die zurückgegebenen Ergebnisse.

KI-Anbieter müssen verfügbar und von der Plattformadministration konfiguriert sein. Vorschläge können sich auf Einträge **Vorhandene Kompetenz** beziehen oder eine **Neue Kompetenz** unter einer übergeordneten Kompetenz empfehlen. Jeder Eintrag kann seine Beschreibung, Kriterien und eine Erläuterung des Vorschlags enthalten.

## Prüfen und genehmigen

1. Lesen Sie jeden Vorschlag kritisch und vergleichen Sie ihn mit den Kurszielen und -inhalten.
2. Wählen Sie nur die gültigen Kompetenzen über ihre Kontrollkästchen aus.
3. Wenn Sie über die erforderliche Berechtigung verfügen, wählen Sie **Ausgewählte Kompetenzen zum Kompetenzreferential und Gradebook hinzufügen**.
4. Überprüfen Sie die resultierenden Kompetenzen und Gradebook-Zuordnungen im Kurs.

Benutzer ohne Zuweisungsrechte können Vorschläge prüfen, sie jedoch nicht zuordnen. Das Erstellen neuer Kompetenzen erfordert Berechtigungen als Plattformadministrator. Vorschläge können ablaufen; erzeugen Sie einen neuen Satz, wenn die Anwendung meldet, dass die vorherigen nicht mehr gültig sind.

## Bewährte Vorgehensweise

KI-generierte Kompetenzen sind Kandidaten, keine verbindlichen Lehrplanvorgaben. Prüfen Sie vor der Genehmigung Formulierung, Duplikate, Einordnung unter übergeordnete Kompetenzen und Kriterien. Vermeiden Sie die Eingabe vertraulicher Informationen über Lernende in KI-Prompts.

Siehe [Kompetenzen und Bewertungen](../../admin-guide/skills/skills-assessments.md) und [KI-Toolbox](toolbox-ai.md). Implementierung: [PR #9409](https://github.com/chamilo/chamilo-lms/pull/9409).