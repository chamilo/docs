# Geschichte

![](../../.gitbook/assets/images19%20%2810%29.png) ![](../../.gitbook/assets/images22%20%289%29.png)

Um die Struktur der Chamilo LMS-Dateien heute zu verstehen, braucht man ein bisschen Geschichte.

Der Chamilo-Code begann im Jahr 2001 als ein Projekt namens _Claroline_. Claroline entwickelte sich zu einem beliebten Freie-Software-Projekt, insbesondere in der akademischen Welt, und zeichnete sich durch seine Benutzerfreundlichkeit von anderen Projekten wie _Moodle_, _WebCT_ und _Ilias_ \(untereinander\) durch seine Benutzerfreundlichkeit aus, eine Eigenschaft, die Chamilo im Laufe der Jahre beibehalten hatte.

Im Jahr 2004 erlitt das Claroline-Projekt eine _fork_ \(eine Störung in der kraft _\) zwischen dem ursprünglichen Projekt \(das später im Jahr 2014 starb und das Projekt _Claroline Connect_ geboren hat\) und dem _Dokeos-Projekt, das sich mehr darauf konzentrierte, das Tool in die Unternehmenswelt zu bringen.

Im Jahr 2010 erlitt das Dokeos-Projekt eine weitere Abspaltung zwischen Dokeos \(heute noch) und Chamilo, hervorgerufen durch das sehr unempfindliche Verhalten des Unternehmensleiters von Dokeos, mit wenig Verständnis für den Wert der Community in einem solchen Projekt.

Diese 2 großen Projekt-Splits waren in der Geschichte des _Chamilo_-Projekts überwiegend philosophisch, aber sie haben ihre vielen Änderungen in der Struktur \(sowohl auf Datenbank- als auch auf Dateiebene\), und wir werden versuchen, diese hier in Kürze abzudecken.

Ein wichtiger Hinweis zum Abschluss dieser kurzen Zeitreise ist, dass Chamilo LMS 1.10 und 1.11 mit zusätzlichen kritischen neuen Änderungen einhergingen, die die Lesbarkeit und Wiederverwendbarkeit des Chamilo-Systems erheblich verbesserten. `Chamilo 2.0`, das sich derzeit in der Entwicklung befindet, wird einige weitere Änderungen mit sich bringen, die sich hauptsächlich auf die Erweiterbarkeit konzentrieren.

Mal sehen, welche bemerkenswerten Veränderungen in Chamilo im Laufe der Jahre passiert sind...

## 2001-2003

Während dieser Zeit beginnt _Claroline_ als ein Aggregat von einfachen Lehrerwerkzeugen und einem relativ lockeren zentralen Kern. Die Projektentwickler verdienten sich unseren Respekt dafür, den ersten Entwurf dessen zu zeichnen, was in der Welt der Freien Software nicht existierte, indem sie nur die PHP-Basis nutzten, um eine Kathedrale zu bauen, aber sie haben auch eine beträchtliche Menge technischer Fehler gemacht, die sich noch heute auf Chamilo auswirken.

### Trennung von Kursdatenbanken

Der wohl größte Fehler in der gesamten Systemstruktur bestand darin, die Daten jedes Kurses in seine individuelle Datenbank zu trennen.

Dies bedeutete, dass Sie, um 20 aktive Kurse auf Ihrer Plattform zu haben, 20 Datenbanken und 1 Hauptdatenbank+1 Benutzerdatenbank + 1 Tracking-Datenbank haben mussten. Und wenn Sie mehr Kurse wollten, mussten Sie mehr Datenbanken erstellen und Ihren MySQL-Benutzer dazu zwingen, seltsame Berechtigungen für alle Datenbanken mit demselben Präfix zu haben, wie folgt:

```text
GRANT ALL PRIVILEGES ON `clarodb\_ %`.* to 'clarodb'@'localhost' identified by 'abcde' ;
```

Wobei '%' eine beliebige Zeichenkette bedeutet.

Dies hatte die unmittelbaren Auswirkungen, die Benutzer, die Claroline auf einem Shared Hosting-Dienst installieren wollten, dies nicht konnten, da sie Berechtigungen für mehr als eine Datenbank erhalten mussten, die das Hosting von Diensten zu diesem Zeitpunkt normalerweise nicht erlaubte.

Ein Versuch, die Auswirkungen dieser Maßnahme leicht zu reduzieren, machte die Dinge noch am schlimmsten, da die Idee von einer Datenbank pro Kurs \(mit jeweils ~ 50 Tabellen\) zu einer einzigen Datenbank ging, aber das Präfixsystem beibehielt \(diesmal für Tabellen\), was dazu führte, dass eine 20-Kurse-Plattform tatsächlich eine -Datenbank mit 1.000 Tabellen. Sie hatten dann einen clarodb\_course1\_document, einen clarodb\_course2\_document usw., um nur das Dokumententool für alle Kurse zu verwalten.

### Aufgabentrennung: Ein Entwickler pro Tool

Irgendwie ist dies nicht so ein Designfehler als ein Problem mit offenen Beiträgen mit eingeschränktem Management. Das Problem bestand darin, dass jedes Tool nach einigen Jahren der Entwicklung einen anderen Standard entwickelt hatte. Die Codierungskonventionen wurden nicht genau genug eingehalten, es wurde keine Vorlage für die Entwicklung neuer Tools bereitgestellt, und das Dropbox-Tool war in der Code-Styling und in den Namenskonventionen völlig anders als beispielsweise das Dokumententool.

Dies hatte dramatische Konsequenzen, die später auch in _Dokeos_ gefunden wurden: Sicherheitslücken wurden in einem Tool für ein Feature gefunden, das einem anderen, nicht fehlerhaften Feature in einem anderen Tool ziemlich ähnlich war.

Darüber hinaus generiert die Entwicklung separater Tools auf relativ unkontrollierte Weise Code-Replikation. Gleichzeitig wurde viel Code in verschiedenen Tools gefunden, was zu mehr Arbeit bei der Aufrechterhaltung und einer geringeren Rückverfolgbarkeit von Änderungen führte.

### Kurscode als wörtlich

Ein letztes Problem war die Verwendung eines Literals \(String\) als Kurs-ID. Dies bedeutet, dass wir für alle Joins zwischen Tabellen, bei denen der Kurs wichtig ist, mehrere Suchanfragen im Kurscode haben, was bedeutet, dass wir teure Indizes benötigen, um die Suche zu beschleunigen, während eine Ganzzahl die Dinge viel schneller machen würde.

Es reduziert auch die Portabilität ein wenig, da das Abfragen einer Zeichenfolge mit Großbuchstaben und Kleinbuchstaben sowie das Entstehen von Zeichen \('vs\“ vs integer\) einhergeht, die zwischen verschiedenen Datenbanksystemen nicht immer ähnlich sind.

Bis heute haben wir 2017 \(16 Jahre später\) dieses Problem immer noch nicht vollständig beseitigt, da einige Tabellen \(nur sehr wenige, meist Bewertungsbericht\) immer noch den Code für den litteralen Kurscode verwenden. Dies wird in `Chamilo 2.0` (endlich\) komplett verschwunden sein.

### Mehrere beschreibbare Ordner

Ein Problem, das kurz vor 2004 auftauchte, war danach die Multiplikation beschreibbarer Ordner. Ein beschreibbarer Ordner ist ein Ordner, auf den der Webserver Schreibzugriff benötigt, um die vollständigen Funktionen von Chamilo bereitzustellen. Wenn Sie mehrere Ordner wie diesen haben, müssen Sie die Berechtigungen ändern, **und** auf Sicherheitsangriffe bei all diesen Attachten achten, sowie Backups von nur einem Teil davon usw. Kurz gesagt: eine Reihe von Komplikationen für einen so kleinen Interessenpunkt für Endbenutzer.

In 1.11.x wurde dies erheblich verbessert, indem _most_ dieser beschreibbaren Verzeichnisse in den _app/_ -Ordner verschoben wurde. Es bleiben jedoch einige zusätzliche "optional" -Verzeichnisse übrig, wie _web/css/_ und _main/lang/_ \(und in einigen Fällen einige Plugin-Ordner\). Eine Liste dieser Ordner finden Sie in der _documentation/security.html_ -Datei in jeder Chamilo-Installation.

## 2004-2010

Die Spaltung zwischen Claroline und Dokeos hätte gelinde gesagt intelligenter bewältigen können. Das Hauptproblem hier war, dass die Trennung das Entwicklungsteam nicht trennte \(das Claroline-Team blieb bestehen, während ein neues Team für Dokeos gegründet wurde\). Es war hauptsächlich ein Management-Split.

Dies bedeutete, dass Dokeos, obwohl es eine großartige innovative Sicht darauf war, wie eine E-Learning-Plattform auch der Geschäftswelt helfen könnte, ihre technische Linie nicht aufrechterhielt und dabei viel Know-how verlor. Die Trennung war auch ziemlich brutal \(mit sehr wenig, um einen legalen Kampf zu verhindern\), so dass die Kommunikation mit dem vorherigen technischen Team nicht wirklich willkommen war, und die neuen Entwickler, die mit der Arbeit an Dokeos zu arbeiten, mussten die Lücken so gut wie möglich schließen, mit einem Markt, der eindeutig anders war und viele durchzulegige technische Änderungen.

Trotzdem pflegte, verbesserte und erweiterte das Doku-Team die Software auf beeindruckende Weise. Die Strukturprobleme von Claroline wurden jedoch beibehalten, erreichten nie einen Punkt mit ausreichenden \(wirtschaftlichen\) Ressourcen, um die Fehler zu beheben, sondern langsam daran zu arbeiten, sie schrittweise zu beheben.

### Tracking für Lernpfade

Ein Fehler erhöhte den Schaden jedoch ein wenig und war hauptsächlich auf mangelnde Erfahrung des ursprünglichen Autors dieses Handbuchs zurückzuführen \(dh ich\): Die Nachverfolgung des Lernpfad-Tools\ \(komplett in Dokeos zur Unterstützung von SCORM 1.2 neu geschrieben) wurde in der Hauptdatenbank gespeichert \(was in der langfristig alle Daten unter dieselbe Datenbank zu bringen, aber nicht im Vergleich zu allen anderen Tracking-Tabellen\), was zu Verwirrung innerhalb des Entwicklerteams führt, da sich alle anderen Tracking-Ressourcen im Allgemeinen in Tabellen befinden, denen _track\_e\__ vorangestellt ist. Dies ist heute noch etwas verwirrend, da `lp_view` - und `lp_item_view` -Tabellen Benutzer-Tracking-Informationen enthalten, aber es wird so bleiben, bis eine ordnungsgemäße Umbenennung und Neustrukturierung der Tracking-Tabellen ausgeführt werden kann, ohne die Daten unserer Benutzer zu riskieren.

Einige Nachverfolgungen werden auch in den Gradebuch- und den Tabellen student\_publication aufbewahrt.

### Die Tabelle item\_property

Ein weiterer Fehler, den wir nicht wissen, ob es bereits in Claroline vorhanden war oder in den sehr frühen Stadien von Dokeos auftrat, ist, dass es auch einen item\_property gibtl das einige Elementeigenschaften enthält \(wie der Name schon sagt\), aber **auch** speichert Zeitinformationen darüber, wann sich diese Eigenschaften geändert haben.

Die Praktikabilität bedeutete, dass einige Entwickler begannen, diese Tabelle als Tabelle zu verwenden (für die Meldung, wer dies oder jenes gelöscht oder erstellt hat\), was bedeutete, dass wir auch alte \(alte\) Daten von Objekten beibehalten, die dort bereits gelöscht wurden, was wiederum bedeutete, dass diese Tabelle weiter wächst und wächst bis es mit Daten verstopft ist, die sehr schwer zu analysieren sind.

Im Moment kann es beispielsweise erforderlich sein, alle Datensätze für ein bestimmtes Element durchzugehen, um zu wissen, wie hoch seine aktuelle Sichtbarkeit ist, was viele unnötige Ressourcen erfordert, um sie auszuführen.

Darüber hinaus enthält die Tabelle item\_property einen Verweis auf das Objekt vieler anderer Tabellen. Und diese Referenz verwendet einen wörtlichen Werkzeugcode als Diskriminator anstelle einer Ganzzahl, was weitere Auswirkungen auf die Leistung hat.

## 2010-2014

### Einzelne Datenbank und InnoDB

Zu Beginn des Chamilo-Projekts wurde eine wichtige Arbeit unternommen, um das Problem mit mehreren Datenbanken zu beseitigen.

Die erste stabile Version, die mit einer einzigen Datenbank geliefert wurde, war Version `1.9.0`, die 2012 veröffentlicht wurde. Es wurde mit einem vollautomatisierten Upgrade-Prozess aus früheren Versionen ausgeliefert, der die Datenbankstruktur von mehreren Datenbanken zu einer einzigen Datenbank im laufenden Betrieb ändert und Ihnen ein Upgrade und viel effizienter macht.

Dieses Problem wurde nun ab `Chamilo 1.9.4` vollständig gelöst, da die kleinen verbleibenden Details in den direkt `1.9.0` folgenden Versionen schrittweise behoben wurden.

Die Änderung an einer einzelnen Datenbank wurde jedoch mit wenig Leistungsdetails vorgenommen, die verbessert werden sollten. Zum Beispiel implizierte das \(relativ schnelle\) Mischen mehrerer Tabellen die Unterscheidung von Elementen durch einen Kurscode oder eine Kurs-ID in Kombination mit der ursprünglichen Element-ID, anstatt eine neue globale ID neu zu definieren.

Für ein `id` -Feld in der Tabelle `document` in der Datenbank `chamilodb_course1` haben wir jetzt \(wenn eine globale ID noch nicht festgelegt wurde\) ein `c_id` **und** ein Feld **und** in der Tabelle `c_document` in der Tabelle in der einzelnen `chamilodb` Datenbank. `id` Oder um es in SQL auszudrücken, zwei Abfragen wie diese:

```text
select * from chamilodb_course1.document where id = 5;
select * from chamilodb_course2.document where id = 5;
```

Jetzt werden Sie:

```text
select * from chamilodb.c_document where id = 5 and c_id = 1;
select * from chamilodb.c_document where id = 5 and c_id = 2;
```

Daher ist der Primärschlüssel für Tabelle `c_document` nicht mehr `id`, sondern eine Kombination von `c_id+id`, die verhinderte, dass die Tabellen, die diese Struktur noch verwenden, um die InnoDB-Engine in MySQL zu verwenden, was weitere Verbesserungen der Datenbankeffizienz verhinderte.

Die Behebung dieser bedeutete das Hinzufügen einer zusätzlichen globalen ID, die für alle Kurse zusammen wert ist und für alle Tabellen in Version 1.10 von Chamilo LMS implementiert wurde, die 2015 veröffentlicht wurden. Die `cid+id` -Felder wurden jedoch beibehalten, um für eine Weile maximale Stabilität zu gewährleisten. Diese sind immer noch in `Chamilo 1.11` vorhanden, werden aber in `2.0` entfernt werden (das Feld `id`, nicht unbedingt das `c_id` -Feld\).

Sobald dieser Schritt abgeschlossen ist, wird Chamilo vollständig für Portale mit sehr hoher Auslastung optimiert. In der Zwischenzeit sollte die Abwicklung von Tausenden von Transaktionen pro Sekunde auf mehreren Datenbankservern in einer Infrastruktur mit Lastenausgleich mit Vorsicht erfolgen, möglicherweise mit nur wenigen Tools \(wie das Übungs-Tool in Chamilo 1.11, das bereits in einer solchen Struktur in der Produktion implementiert wurde\).

### Layer für mehrere Datenbanken

Es wurden beträchtliche Anstrengungen unternommen, um alle SQL-Anweisungen zu zentralisieren und sicherzustellen, dass wir leichter zu anderen Datenbankserver-Managementsystemen wechseln konnten \(PostgreSQL, Oracle, etc\). Zum Zeitpunkt von `1.11.0` war diese Arbeit noch nicht abgeschlossen, wird aber langsam abgeschlossen \(aber sicherlich\) und wir hoffen, dass eine erste Version in 3.0 verfügbar ist \(nicht `2.0`, wie ursprünglich geplant, da dies eine niedrigere Priorität geworden ist, wobei Oracle der Eigentümer von MySQL und MariaDB ist, das eigenständig startet\).

Eine Reihe von Abfragen befindet sich jedoch immer noch in verschiedenen Chamilo-Skripten, die uns daran hindern, sicherzustellen, dass sie vollständig portabel sind, ohne sie alle zu überprüfen.

Wenn Sie jetzt innerhalb von Chamilo entwickeln, versuchen Sie es mit den Entitäten \(und ihrem ORM relationship\) steht Ihnen für alle neuen Anfragen zur Verfügung. Überprüfen Sie die Funktionen select\(\) und update\(\) für diese Entitäten in `src/Chamilo/*/Entity/`.

### Verpackung zur Aufnahme in andere Software

Es wurden beträchtliche Anstrengungen zur Umstrukturierung unternommen, um die Struktur der Chamilo-Dateien zu verbessern, um sie in andere Software wie Linux-Distributionen wie Debian und andere zu integrieren.

Um dies zu erreichen, war ein wichtiges Problem die Multiplikation von Verzeichnissen mit bestimmten Rechten, bei denen der Webserver andere Privilegien haben muss als für andere Verzeichnisse. Zum Beispiel ist der Ordner `app/upload/users/` der Ort, an den die Benutzerbilder gehen, während der `main/default_course_documents/images/` -Ordner Standarddateien für Kurse hat, aber gleichzeitig neue Standarddateien akzeptieren muss \(und erfordert daher Schreibzugriff für den Webserver\).

Sowohl in Claroline als auch in Dokeos nahmen die Anzahl dieser Verzeichnisse zu, und Sie mussten jetzt das Schreiben für den Webserver in insgesamt etwa 9 Ordnern autorisieren, um alle Funktionen von Chamilo zu erhalten.

Dies wurde in 1.10 behoben, indem viele unter dem `app/` -Verzeichnis und seinen Unterverzeichnissen \(für alle Daten im Zusammenhang mit Kursen und Benutzern vereinheitlicht wurden\).

Daher muss der `app/` -Ordner in allen Systemsicherungen enthalten sein. Der Rest der Chamilo-Anwendung sollte in den anderen Ordnern stabil bleiben.