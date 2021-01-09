
# Das Dashboard

Im Moment haben wir das Dashboard aus der Lehrer-/Schüler-Ansicht entfernt, weil einige der Diagramme, die zeigen, dass es sehr langsam ist, wenn Sie viele Daten haben, und wir glauben, dass es eine schlechte Idee wäre, es allen Benutzern zu zeigen.In letzter Zeit haben wir jedoch eine kleine Änderung vorgenommen, damit der Plattformadministrator eine sehen kann mehr Diagramm als die anderen Administratoren, daher gibt es einen Anfang für rollenbasierte Änderungen.

Wenn Sie das Dashboard für alle Benutzer vollständig freischalten möchten, können Sie die Berechtigungen in der main/inc/lib/banner.lib.php um Zeile 319 freischalten, wo Sie die Überprüfung von api\_is\_platform\_admin\(\), api\_is\_drh\(\) und api\_is\_session\_admin\(\) haben. Entferne diese Zeile und du bekommst sie gleichgültig für Schüler und Lehrer.