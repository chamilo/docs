# Aktualisieren Sie Ihren Code

Da wir Autoloading-Mechanismen verwenden und weil wir Vorlagen verwenden, gibt es einen kleinen Schritt, den Sie jedes Mal**jedes Mal** machen müssen, nachdem Sie die letzten Änderungen aus unserem Repository übernommen haben:

```text
composer update
```

Dadurch wird sichergestellt, dass alle Abhängigkeiten auf dem neuesten Stand sind und dass der Autoloading-Mechanismus aktualisiert wird, um alle seine Klassen an den richtigen Stellen zu finden.

Leider ist der Komponist mit Chamilo ein sehr langsamer und speicherhungriger Prozess. Stellen Sie daher sicher, dass Sie nur für diesen Prozess mindestens 2 GB RAM zur Verfügung haben und dass Sie in der Zwischenzeit an etwas anderem arbeiten...