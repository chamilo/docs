# Umfragevorlagen

Administratoren können wiederverwendbare Umfragefragebögen erstellen und sie Lehrkräften anbieten oder direkt Kursen und Sitzungen zuweisen. Diese Funktion wurde in [PR #9208](https://github.com/chamilo/chamilo-lms/pull/9208) für [Issue #8760](https://github.com/chamilo/chamilo-lms/issues/8760) implementiert.

## Vorlagen erstellen und pflegen

1. Öffnen Sie im Administrationsbereich **Umfragevorlagen** und wählen Sie **Erstellen**.
2. Geben Sie einen Titel und optional einen Untertitel ein; konfigurieren Sie Anonymität, Fragenlayout, Mischen, Dauer, Einleitung und Dankestext.
3. Speichern Sie und fügen Sie die wiederverwendbaren Fragen im Frageneditor der Vorlage hinzu oder bearbeiten Sie sie.
4. Aktivieren Sie **Als Vorlage sichtbar**, wenn Lehrkräfte sie sehen und wiederverwenden können sollen. Eine unsichtbare Vorlage bleibt für den Administrator verfügbar.

Vorlagen gehören zur aktuellen Zugriffs-URL. Nur Plattformadministratoren dürfen die Mastervorlage erstellen, bearbeiten oder löschen. Lehrkräfte können sichtbare Vorlagen verwenden, deren Masterdefinition jedoch nicht ändern.

## Eine Vorlage in einem Kurs oder einer Sitzung wiederverwenden

In einem autorisierten Kurs oder einer autorisierten Sitzung kann eine Lehrkraft beim Erstellen einer neuen Umfrage eine sichtbare Vorlage auswählen. Das Ergebnis ist eine Umfrage in diesem Kurskontext, keine Änderung der wiederverwendbaren Mastervorlage. Die Lehrkraft kann die Fragen prüfen und dem üblichen Veröffentlichungs- und Einladungsablauf folgen.

In der Vorlagenliste der Administration kann ein Administrator eine Vorlage stattdessen direkt einem ausgewählten **Kurs** und optional einer der **Sitzungen** dieses Kurses zuweisen. Chamilo prüft, dass der Kurs zum aktuellen Portal gehört und dass die ausgewählte Sitzung den Kurs tatsächlich enthält. Die Lehrkraft-Oberfläche kann nicht verwendet werden, um eine Vorlage dem Kurs oder der Sitzung einer anderen Person zuzuweisen.

Die neue Umfrage wird nicht automatisch veröffentlicht, nur weil sie aus einer Vorlage erstellt wurde; prüfen Sie sie, bevor Sie Teilnehmende einladen. Siehe [Umfragen](../teacher-guide/assessing-learners/surveys.md) für den Standardablauf von Umfragen.

## Sensible Ergebnisse vor Lehrkräften oder Tutoren verbergen

Beim Bearbeiten einer konkreten Umfrage kann ein Plattformadministrator **Ergebnisse vor Lehrkraft/Tutor verborgen** aktivieren. Diese umfragespezifische Einschränkung ist für sensible Fragebögen gedacht, etwa Evaluationen des Lehrpersonals. Lehrkräfte und Tutoren können weiterhin Antwortzahlen einsehen und Erinnerungen senden, **können jedoch keine Berichtsansichten öffnen oder die Ergebnisse exportieren**. Plattformadministratoren behalten den Berichtszugriff, vorbehaltlich anderer Plattformeinstellungen.

Diese Option unterscheidet sich vom normalen Feld **Sichtbarkeit der Ergebnisse** und von der plattformweiten Einstellung **Schaltfläche für Umfrageberichte ausblenden**. Nur ein Administrator kann das Kennzeichen für eingeschränkte Ergebnisse ändern.

## Berechtigungen und Geltungsbereich

* **Administrator:** Vorlagen verwalten, Sichtbarkeit von Vorlagen festlegen, berechtigten Kursen/Sitzungen zuweisen und den eingeschränkten Ergebniszugriff steuern.
* **Lehrkraft / Sitzungslehrkraft:** nur sichtbare Vorlagen im autorisierten Kurskontext sehen und instanziieren.
* **Zugriffs-URLs:** Der Vorlagenkatalog und die Zuweisung erzwingen die aktuelle Zugriffs-URL; Vorlagen anderer Portale können nicht über diese Grenze hinweg instanziiert werden.

Wenn Vorlagen für Lehrkräfte nicht erscheinen, prüfen Sie **Als Vorlage sichtbar** und deren Kurs-/Sitzungskontext. Wenn eine Vorlage nicht instanziiert werden kann, prüfen Sie die globalen Einschränkungen für die Umfrageerstellung und den vorgesehenen Zielkurs bzw. die vorgesehene Zielsitzung.