# Kursautomatisierung (manuelle Auslöser)

Der Abschnitt **Automatisierung** der Kursberichte ermöglicht berechtigten Lehrkräften, Aktionen für den Beginn und das Ende eines Kurses zu konfigurieren. In der aktuellen Chamilo-3.1-Implementierung werden die Aktionen **manuell ausgelöst**: Gehen Sie nicht davon aus, dass sie automatisch an einem Kalenderdatum oder über Cron ausgeführt werden.

## Aktionen konfigurieren

1. Öffnen Sie einen Kurs als Lehrkraft oder als anderer Benutzer, der Kursberichte verwalten darf.
2. Öffnen Sie **Berichte** und suchen Sie den Abschnitt **Automatisierung**.
3. Wählen Sie das Ereignis (**Kurs öffnet jetzt** oder **Kurs endet jetzt**) und einen Aktionstyp.
4. Geben Sie das für diese Aktion erforderliche Ziel an und wählen Sie anschließend **Aktion hinzufügen**.
5. Prüfen Sie die Liste **Konfigurierte Aktionen**; entfernen Sie einen unerwünschten Eintrag über die zugehörige Aktion **Löschen**.

Zu den unterstützten Aktionen gehören das Veröffentlichen oder Ausblenden von Kursressourcen, das Versenden von Umfrageeinladungen, die Ausstellung vorhandener Zertifikate und das Ändern der Kurssichtbarkeit. Die verfügbaren Ressourcen, Umfragen, Gradebook-Optionen und Sichtbarkeitswerte hängen vom Kurs und den Berechtigungen des aktuellen Benutzers ab.

## Das konfigurierte Ereignis ausführen

Wählen Sie **Kurs öffnet jetzt** oder **Kurs endet jetzt** und bestätigen Sie den Vorgang. Prüfen Sie das gemeldete Ergebnis. Chamilo protokolliert abgeschlossene Ausführungen, verhindert doppelte Konfigurationen und überspringt bei späteren Durchläufen Aktionen, die bereits erfolgreich abgeschlossen wurden. Ein zweiter Klick sollte nicht als Möglichkeit verstanden werden, eine abgeschlossene Aktion erneut zu senden.

Bereiten Sie für die Zertifikatsausstellung zunächst das betreffende Zertifikat vor und testen Sie es. Prüfen Sie bei Umfrageeinladungen, ob die Umfrage konfiguriert ist und die vorgesehenen Lernenden zum aktuellen Kurs- oder Sitzungskontext gehören.

## Wichtige Einschränkungen

- Diese Oberfläche bietet eine **manuelle Ausführung**, keine geplante Automatisierung.
- Aktionen wirken im aktuellen Kurs-/Sitzungskontext; testen Sie Zugriff und Ziele gegebenenfalls für beide Kontexte.
- Erfolgreich abgeschlossene Aktionen werden bei späteren Durchläufen nicht automatisch wiederholt.
- Zum Zeitpunkt des Feature-PRs wurden Zertifikatsausstellung, Änderungen der Kurssichtbarkeit und sitzungsspezifische Ausführung codegeprüft, in diesem PR jedoch nicht funktional verifiziert. Testen Sie sie auf Ihrer Installation, bevor Sie sich operativ darauf verlassen.

Siehe [Kursberichte](course-reports.md) und [Zertifikate und Kompetenzen](certificates-and-skills.md). Implementierung: [PR #9464](https://github.com/chamilo/chamilo-lms/pull/9464).