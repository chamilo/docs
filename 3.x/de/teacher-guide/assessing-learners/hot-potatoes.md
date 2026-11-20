# Hot Potatoes-Aktivitäten

Chamilo 3.1 unterstützt den Import von Hot-Potatoes-HTML-Aktivitäten in das moderne Tool Übungen sowie die Verwendung einzelner Aktivitäten in Lernpfaden.

## Eine Aktivität importieren

1. Öffnen Sie das Tool **Übungen** des Kurses und gehen Sie zu **Hot Potatoes**.
2. Wählen Sie unter **Hot Potatoes importieren** ein Hot-Potatoes-**ZIP**-Paket oder einen eigenständigen **HTML**-Export aus.
3. Wenn eine Aktivität von verknüpften Bildern, Medien oder anderen Dateien abhängt, nehmen Sie diese Ressourcen in die ZIP-Datei auf.
4. Wählen Sie **Importieren** und prüfen Sie, ob die importierte Aktivität korrekt geöffnet und dargestellt wird.

## Aktivitäten verwalten und wiederverwenden

Verwenden Sie in der Hot-Potatoes-Liste **Öffnen**, um die Aktivität in der Vorschau anzuzeigen, **Bearbeiten**, um den Titel zu ändern, **Veröffentlichen** oder **Ausblenden**, um die Sichtbarkeit zu steuern, und **Löschen**, um sie zu entfernen, sofern dies zulässig ist. Der Lernpfad-Editor kann einzelne Hot-Potatoes-Aktivitäten unter seinen Ressourcen aufnehmen.

## Versuche von Lernenden prüfen

Die Aktion **Versuche** zeigt erfasste Versuche zur Prüfung durch Lehrkräfte an. Lehrkräfte können eine geprüfte Prozentbewertung von 0 bis 100 vergeben. Der Bildschirm zeigt derzeit bis zu die letzten 100 Versuche an. Verwenden Sie das tatsächlich dargestellte Ergebnis der Aktivität als unterstützenden Nachweis bei der Bewertung einer lernenden Person.

**Automatische Bewertung und Synchronisierung mit dem Notenbuch sind nicht implementiert.** Punktzahlen, die ein Hot-Potatoes-Paket selbst anzeigt, dürfen nicht als serverseitig verifizierte Noten behandelt werden. Von Lehrkräften geprüfte Ergebnisse werden separat gespeichert.

## Fehlerbehebung

Wenn Medien fehlen, exportieren Sie die Aktivität erneut und nehmen Sie alle verknüpften Ressourcen in die ZIP-Datei auf. Wenn ein HTML-Export auf einem lokalen Computer funktioniert, in Chamilo jedoch nicht, prüfen Sie externe Dateiverweise oder inkompatible eingebettete Inhalte. Testen Sie die Sichtbarkeit der Aktivität sowohl mit einem Studierendenkonto als auch mit einem Lehrkraftkonto.

Siehe [Übungen](exercises.md) und [Lernpfade](../adding-content/learning-paths.md). Implementierung: [PR #9380](https://github.com/chamilo/chamilo-lms/pull/9380).