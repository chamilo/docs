# Kurse

Klassen sind eine Gruppe von Benutzern \(im Allgemeinen Studenten\). Diesen Gruppen können Kurse oder Sitzungen zugewiesen werden, sodass alle Gruppenbenutzer diese Kurse oder Sitzungen persönlich abonniert haben.

Wenn Sie den Kurs von einem Kurs oder einer Sitzung abbestellen, wird jeder der Klassenbenutzer einzeln aus dem Kurs oder der Sitzung abgemeldet.

**Hinweis**: Vor 1.8.8 gab es bereits ein Konzept der Klasse \(etwas anders\), das sich gegenseitig mit dem Session-Tool auslief. Seit Version 1.8.8 ist es möglich, Klassen in Kombination mit Sitzungen zu verwenden.

Die Klassenschnittstelle ist ziemlich einfach. Die Liste der Klassen ist beim ersten Mal leer. Um eine Klasse hinzuzufügen, klicke einfach auf das Sternsymbol.

![](../../.gitbook/assets/graficos93%20%284%29.png)Illustration 77: Verwaltung - Unterricht - Liste leeren

Die Erstellung einer Klasse erfordert nur einen Namen und eine optionale Beschreibung.

Sie kehren dann zur Liste der Klassen zurück, um ihnen Benutzer hinzuzufügen \(über das Benutzersymbol\).

![](../../.gitbook/assets/graficos94%20%284%29.png)Illustration 78: Administration - Klassen — Benutzer hinzufügen

Der Bildschirm für das Benutzerabonnement ähnelt dem Abonnementbildschirm anderer Benutzer, den Sie zuvor gesehen haben.

Sobald die Benutzer hinzugefügt wurden, können Sie die Klasse für einen oder mehrere Kurse und eine oder mehrere Sitzungen abonnieren.

![](../../.gitbook/assets/graficos95%20%283%29.png)Illustration 79: Administration - Kurse - Kurse hinzufügen

![](../../.gitbook/assets/graficos96%20%283%29.png)Illustration 80: Administration - Klassen — Sessions hinzufügen

Beachten Sie, dass, wie es die Sitzungslogik vorschreibt, eine Klasse niemals einen Kurs**und** für eine Sitzung \(die diesen Kurs enthält\) abonniert werden sollte, da Sie sonst den Schüler \(und wahrscheinlich den Lehrer\) mit doppelten Zugriffen in und außerhalb einer Sitzung verwechseln könnten.

