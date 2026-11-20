# Klassen

Klassen in Chamilo sind vordefinierte Benutzergruppen, die als Einheit in Sitzungen eingeschrieben werden können. Sie vereinfachen den Einschreibungsprozess, wenn Sie regelmäßig dieselben Personengruppen schulen.

> Klassen und [Benutzergruppen](../../admin-guide/users/user-groups.md) verwenden dieselbe Oberfläche. Der einzige Unterschied ist die Einstellung **Gruppentyp**: Wählen Sie beim Erstellen der Gruppe „Klasse“. Alles andere — Mitgliederverwaltung, Sichtbarkeit und die Oberfläche selbst — funktioniert identisch.

## Eine Klasse erstellen

1. Navigieren Sie im Administrationsbereich zu **Klassen** (oder zu Benutzergruppen und wählen Sie den Typ „Klasse“)
2. Klicken Sie auf **Klasse erstellen**
3. Geben Sie einen **Namen** ein (z. B. „Engineering Team“, „Neue Mitarbeitende März 2026“)
4. Fügen Sie **Mitglieder** hinzu — suchen und wählen Sie Benutzer aus
5. Speichern

## Klassen für die Einschreibung verwenden

Beim Erstellen oder Bearbeiten einer Sitzung können Sie eine gesamte Klasse auf einmal einschreiben, anstatt Benutzer einzeln hinzuzufügen:

1. Öffnen Sie die Einstellungen zur Sitzungseinschreibung
2. Klicken Sie auf **Klasse hinzufügen**
3. Wählen Sie die Klasse aus
4. Alle Mitglieder der Klasse werden in die Sitzung eingeschrieben

## Klassen verwalten

* **Bearbeiten** — Ändern Sie den Klassennamen oder aktualisieren Sie die Mitgliedschaft
* **Mitglieder hinzufügen/entfernen** — Halten Sie die Klassenliste aktuell
* **Löschen** — Entfernen Sie die Klasse (wirkt sich nicht auf die Mitgliedskonten oder deren bestehende Einschreibungen aus)

## Integrations-API

Plattformadministratoren können die [API für Klassenabonnements](../../developer-guide/api/class-subscriptions.md) verwenden, um die Mitgliedschaft zu prüfen und die Benutzer, Sitzungen und Kurse einer Klasse zu ersetzen. Im Gegensatz zum Hinzufügen eines einzelnen Benutzers in der Administrationsoberfläche ersetzt jedes API-`PUT` die **vollständige** entsprechende Liste. Lesen Sie stets die aktuellen Abonnements, bevor Sie eine Aktualisierung senden.

## Klassenmitglieder mithilfe von Zusatzfeldern filtern

Beim Zuweisen von Benutzern zu einer Klasse verwenden Sie **Zusatzfelder**, um die verfügbaren Benutzer nach einem durchsuchbaren Benutzerprofilfeld zu filtern. Wählen Sie das Feld, geben Sie einen Wert ein oder wählen Sie ihn aus, und fügen Sie passende Benutzer aus dem Bereich der verfügbaren Benutzer hinzu. Je nach Typ des Zusatzfelds kann der Filter eine Texteingabe oder vordefinierte Auswahlmöglichkeiten bieten.

Es werden nur Benutzer-Zusatzfelder angeboten, die als durchsuchbar/filterbar konfiguriert sind. Bestehende Klassenmitglieder bleiben im Bereich der ausgewählten Mitglieder, während Sie die verfügbaren Benutzer filtern; das Filtern darf sie nicht stillschweigend entfernen. Prüfen Sie die vollständige Liste der ausgewählten Mitglieder, bevor Sie speichern. Siehe [Filter für Klassenmitgliedschaften PR #9364](https://github.com/chamilo/chamilo-lms/pull/9364).

## Tipps

* **Klassen für wiederkehrende Kohorten erstellen** — Wenn Sie dieselbe Schulung für verschiedene Teams durchführen, erstellen Sie für jedes Team eine Klasse
* **Vor jeder Sitzung aktualisieren** — Prüfen Sie die Klassenmitgliedschaft, bevor Sie eine Klasse in eine neue Sitzung einschreiben, um sicherzustellen, dass die Liste aktuell ist
* **Mit CSV-Import kombinieren** — Importieren Sie die Klassenmitgliedschaft für große Gruppen aus einer CSV-Datei