
# Spezialfall: Der anonyme Nutzer

| Description | Der anonyme Benutzer ist ein ganz besonderer Fall: Dieser Benutzer existiert nur, um das Tracking für Benutzer zu ermöglichen, die kein Konto auf dem Chamilo-Portal haben. Dank dieses Mechanismus kann der _anonymous_-Benutzer die meisten Operationen ausführen, die ein Teilnehmer ausführen kann, jedoch nur in Kursen, die als _public._ gekennzeichnet sind |
|: — |: — |
| Berechtigungen in einem öffentlichen Kurs | Standardmäßig kann er:
| Globale Berechtigungen | Standardmäßig kann er:

Es gibt ein paar besondere Dinge, die Sie auch über den einseitigen Benutzer wissen sollten:

* es ist die einzige Rolle mit einer ID von 6 \(wenn Sie in Ihrer Datenbank nach anonymen Benutzern suchen, ist es leicht zu finden\)
* Anonyme Benutzer werden von den anonymen Personen geteilt, die sich mit Ihrem Portal verbinden.
* Wenn Sie öffentliche Kurse mit Tracking benötigen und es scheint, dass alle Ihre Benutzer bei Tests merkwürdige Live-Ergebnisse sehen, kann dies darauf zurückzuführen sein, dass viele anonyme Benutzer denselben Eintrag in der Datenbank verwenden. Sie können die Auswirkungen der Anzahl der Benutzer auf dieses Tracking reduzieren, indem Sie anonymisiertere Benutzer erstellen. Erstellen Sie sie einfach als Schüler über die Admin-Oberfläche und legen Sie status=6 in der Datenbank fest