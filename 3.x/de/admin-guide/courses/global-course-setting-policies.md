# Globale Richtlinien für Kurseinstellungen

Plattformadministratoren können zentrale Standardwerte für Kurseinstellungen festlegen und steuern, ob Lehrende diese überschreiben dürfen. Die Richtlinien gelten für bestehende Kursfunktionen und bewahren dabei kompatible kursspezifische Konfigurationen.

## Die Richtlinienseite öffnen

Über die **Hauptzugriffs-URL** öffnen Sie **Administration > Einstellungen > Kurseinstellungen** oder navigieren Sie in Ihrer Installation zu `/admin/settings/course-settings`. Diese Administrationsseite ist autorisierten Plattformadministratoren auf der Hauptzugriffs-URL vorbehalten. Verwenden Sie kein sekundäres Portal, um globale Richtlinien zu bearbeiten.

## Eine Richtlinie konfigurieren

1. Verwenden Sie das Feld **Suche**, wenn Sie einen bestimmten Schlüssel für Kurseinstellungen benötigen.
2. Prüfen Sie bei jeder Einstellung den genauen Variablennamen, der unter ihrer Überschrift angezeigt wird.
3. Aktivieren oder deaktivieren Sie **Im Kurs bearbeitbar**, um zu steuern, ob Kursbearbeiter diese Einstellung ändern können.
4. Wählen oder geben Sie einen **Standardwert der Plattform** ein. Einige Einstellungen bieten ein Dropdown-Menü mit zulässigen Werten; andere akzeptieren Text.
5. Speichern Sie die Änderungen und überprüfen Sie das tatsächliche Verhalten in einem Testkurs.

Einstellungen, die denselben Variablennamen in verschiedenen Kategorien wiederverwenden, werden bei Bedarf getrennt angezeigt. Gehen Sie nicht davon aus, dass zwei optisch ähnliche Namen dieselbe Kursfunktion steuern.

## Mit zwei Rollen überprüfen

Bestätigen Sie als Administrator den gespeicherten Standardwert und ob er bearbeitbar ist. Öffnen Sie als Kurslehrende bzw. Kurslehrender die entsprechende Kurseinstellung und prüfen Sie, ob der wirksame Wert und die Bearbeitungseinschränkung der Richtlinie entsprechen. Testen Sie nach Möglichkeit sowohl einen bestehenden als auch einen neuen Kurs.

Das Ändern eines globalen Standardwerts kann viele Kurse betreffen. Prüfen Sie die Auswirkungen, bevor Sie die Überschreibungen durch Lehrende deaktivieren, und notieren Sie die bisherigen Richtlinienwerte, damit sie bei Bedarf wiederhergestellt werden können.

Siehe [Kurse verwalten](managing-courses.md) und [Kurseinstellungen](../../teacher-guide/creating-your-course/course-settings.md). Implementierung: [PR #9328](https://github.com/chamilo/chamilo-lms/pull/9328).