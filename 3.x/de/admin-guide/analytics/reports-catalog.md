# Berichtskatalog

Der Berichtskatalog ist selbst kein Bericht — er ist ein Verzeichnis aller auf der Plattform registrierten Berichte und hilft dabei zu verstehen, was verfügbar ist und wer es sehen kann.

## Zugriff auf den Berichtskatalog

Klicken Sie im Administrationsbereich auf **Analysen > Berichtskatalog**.

## Was angezeigt wird

* **Berichtsliste** — **Berichts-ID**, Titel, Beschreibung sowie die kanonische und die Legacy-URL jedes registrierten Berichts
* **Rollenmatrix** — Eine Ansicht, die zeigt, welche Rollen (Portaladministrator, Globaler Administrator, Sitzungsadministrator, Lehrkraft, Personalverantwortlicher, Vorgesetzter von Lernenden...) auf jeden Bericht zugreifen können
* **Berechtigungskategorien** — Die Berechtigungsgruppen, in die Berichte eingeordnet sind (zum Beispiel `reports.platform`, `reports.learning_analytics`, `reports.export`, `reports.security`)

Verwenden Sie diese Seite, wenn Sie herausfinden möchten, wo sich ein bestimmter Bericht befindet oder ob eine bestimmte Rolle (zum Beispiel ein Personalverantwortlicher) darauf zugreifen kann, ohne jeden Bericht einzeln prüfen zu müssen.

## Stabile Berichtsbezeichner

Der Katalog enthält eine Spalte **Berichts-ID**. IDs identifizieren den Bericht unabhängig von seinem angezeigten Titel oder seiner Route, die sich nach Lokalisierung oder Oberflächenaktualisierungen ändern können. Die erweiterte Registrierung von Chamilo 3.1 umfasst **103 verschiedene Berichts-IDs**, darunter 27 moderne Vue-Berichte, die in die Abdeckung aufgenommen wurden. Verwenden Sie die ID, wenn Sie einen Bericht mit einem anderen Administrator besprechen oder ein technisches Problem melden; prüfen Sie den Zugriff separat über die Rollenmatrix.

Siehe [Verbesserungen der Berichtsregistrierung #9299](https://github.com/chamilo/chamilo-lms/pull/9299).