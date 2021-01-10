# Gewichte

Die Gewichtungen, auf die über ein Prozentsymbolsymbol ![](../../.gitbook/assets/image4.svg) auf der rechten Seite der Hauptbewertungsseite zugegriffen wird, ermöglichen es Ihnen, die relative Bedeutung der einzelnen Aktivitäten innerhalb der Bewertung zu definieren. Wenn Sie zu diesem Zeitpunkt keine Aktivität registriert haben, kehren Sie in diesem Fall zu diesem Abschnitt zurück.

![](../../.gitbook/assets/images133%20%281%29.png)

_Abbildung 108: Bewertungen - Gewichts_

Wir empfehlen Ihnen, eine Verteilung von Gewichtungen zu definieren, die insgesamt 100 \(oder den entsprechenden Gesamtwert für den im vorherigen Abschnitt definierten Kurs\) ausmachen, da es sonst sehr kompliziert wird, alle möglichen relativen Bewertungsprobleme zu verstehen. Mehrere Nachrichten werden Sie daran erinnern, genau das zu tun.

## Rangfolge Fertigkeiten <a id="skills-ranking"></a>

Mit dem Skills-Ranking können Sie Ränge für die Ergebnisse definieren, damit sie buchstäblich und grafisch leichter dargestellt werden können. Diese Optionen**muss** von Ihrem Portaladministrator aktiviert werden. Andernfalls werden die folgenden Optionen nicht angezeigt.

Klicke auf das Podium-Symbol auf der rechten Seite der Hauptbewertungsseite ![](../../.gitbook/assets/graphics191.png):

![](../../.gitbook/assets/graphics195.png)

_Illustration 109: Bewertungen — Qualifikations-Rangelling_

Neben einer Pass-Marke können Sie zusätzliche Optionen hinzufügen: z. B. die Namen, die Sie jedem Bewertungsbereich geben möchten, um das Lesen generischer Berichte zu beschleunigen.

## Zertifikatvorlage <a id="certificate-template"></a>

Sobald Sie die restlichen Tools konfiguriert haben, sind Sie möglicherweise daran interessiert, eine eigene Zertifikatvorlage einzurichten. Aber bevor wir beginnen, lassen Sie uns drei Konzepte klarstellen:

* Zertifikatvorlagen sind in HTML integriert, daher benötigen Sie wahrscheinlich einen Webdesigner \(oder viel Geduld\), um schöne Vorlagen zu erstellen.
* Zertifikatvorlagen werden in HTML \(ja, wieder\) erstellt, sodass der Export nach PDF \(eine Funktion, die in Chamilo als Ware bereitgestellt wird\) möglicherweise nicht ideal ist und Sie möglicherweise mit Ihrem Designer darüber arbeiten müssen, um sicherzustellen, dass beide Ergebnisse in Ordnung sind.
* Zertifikate werden nur generiert, wenn die Zertifikatoption ausgewählt ist \(siehe Vorkonfiguration Beurteilungenauf Seite 99\), wenn die Schüler eine bestandene Note haben und wenn der Student tatsächlich als\*\* das Bewertungstool eingibt \(oder in 1.11, wenn Sie die spezielle Zertifikatsseite im Lernpfad verwendet haben\)

TheAssessmentstool ermöglicht es, ein Zertifikat zu erstellen, das automatisch unter Verwendung der auf der Plattform gespeicherten Daten des Lernenden generiert wird. Um dies einzurichten, klicken Sie rechts auf der Hauptseite auf das große Zertifikatsymbol ![](../../.gitbook/assets/graphics193.png). Dadurch wird ein Bildschirm angezeigt, auf dem eine Liste vorhandener Zertifikate angezeigt wird, mit Toolbar-Optionen zum Importieren von ![](../../.gitbook/assets/graphics194.png) oder zum Erstellen von Zertifikaten. Chamilo bietet ein grundlegendes Vorlagenzertifikat, das Sie aktualisieren können, wenn Sie möchten. Klicken Sie auf das Symbol \_Certificate erstellen ![](../../.gitbook/assets/graphics196.png), um zu einer Seite zur Dokumenterstellung zu gelangen, auf der Sie ein Zertifikat entwerfen können.

Die Seite beginnt mit einer Liste von Tags, die Sie in der Edition Ihres Zertifikats verwenden können:

![](../../.gitbook/assets/image6%20%282%29.png)_Illustration 110: Bescheinigungen Edition-tags_

Diese Tags sind relativ selbsterklärend, aber aus Gründen der Präzision definieren wir sie hier:

*  **\( \(user\_firstname\)\)**  wird durch den Vornamen des Benutzers ersetzt, der das Zertifikat erhält
*  **\( \(user\_lastname\)\)**  dasselbe wie oben, mit dem Nachnamen
*  **\( \(Bewertungsheft\_institution\)\)**  dies wird durch den Namen Ihrer Organisation ersetzt, der vom Administrator in den Plattformeinstellungen definiert und in der Titelleiste Ihres Browsers sichtbar ist
*  **\( \(Bewertungsheft\_sitename\)\)**  wird durch den Namen der Plattform ersetzt, der ebenfalls vom Administrator definiert wird und in der Titelleiste Ihres Browsers sichtbar ist
*  **\( \(Lehrer\_firstname\)\)**  wird durch den Vornamen des Lehrers ersetzt, der diesem Kurs zugewiesen ist. Ein Wort der Warnung: Dies wurde nicht mit mehreren Lehrern oder Sitzungen getestet, also sei mit Vorsicht geboten.
*  **\( \(Lehrer\_lastname\)\)**  wie oben, aber Nachname
*  **\( \(official\_code\)\)**  Wenn Sie das offizielle Codefeld des Benutzers verwenden, ersetzt der entsprechende Wert dieses Tag beim Generieren des Zertifikats
*  **\( \(date\_certificate\)\)**  wird durch das Datum und die Uhrzeit des Zertifikats im Datumsformat ersetzt, das Ihrer Sprachdefinition entspricht
*  **\( \(Datum\_Zertifikat\_nein\_Zeit\)\)**  wie oben, ohne die Stunden und Minuten
*  **\( \(course\_code\)\)**  Wenn Sie eine klare Hierarchie von Kurscodes verwenden, könnte die Verwendung des Kurscodes hier nützlich sein
*  **\( \(course\_title\)\)**  wird durch den Kurstitel ersetzt
*  **\( \(Bewertungsheft\_grade\)\)**  wird durch die Punktzahl ersetzt, die \(sowohl absolut als auch prozentual\) durch den Studenten erhalten wurde
*  **\( \(Zertifikat\_link\)\)**  wird durch die eindeutige URL des Zertifikats ersetzt. Chamilo hält sie gut gelagert, daher ist es eine gute Idee, den Link auf einem Zertifikat anzuzeigen, das gedruckt wird, um die Beziehung zur digitalen Originalversion aufrechtzuerhalten
*  **\( \(Zertifikat\_link\_html\)\)**  Falls Sie das Zertifikat als HTML-Zertifikat oder PDF-Zertifikat für die Verwendung in einem digitalen Format exportieren, wird ein HTML-Link direkt auf das Zertifikat gesetzt
*  **\( \(Zertifikat\_barcode\)\)**  ersetzt das Tag durch einen QR-Code durch Informationen über das Zertifikat \(einschließlich des Links zum Original\). Dies ist eine sehr nette Funktion, wenn Sie QR-Codes mögen, aber Sie müssen denken, dass das Tag \(ein einfacher Text in einer Zeile\) tatsächlich durch einen QR-Code in guter Größe ersetzt wird. Planen Sie also den freien Speicherplatz um diesen Text gut.
*  **\( \(extern\_style\)\)**  und  **\( \(Region\)\)**  sind Beispiele für zusätzliche Profilfelder, die für Benutzer definiert wurden. Je nach Verfügbarkeit werden zusätzliche Felder in dieser Liste angezeigt. Dies ist eine großartige Erweiterung, die Sie Ihren Zertifikaten zur Verfügung stellen können, wenn Ihr Administrator für diese Art der Nutzung offen ist.

Die Bearbeitung des Zertifikats ist dann nur eine Frage der Suche nach einem guten Text und den richtigen Tags:

![](../../.gitbook/assets/image7%20%282%29.png)_Illustration 111: Bereich für die Zertifikatserstellung_

Nachdem Sie Ihr Zertifikat erstellt und gespeichert haben, werden auf der Hauptseite Zertifikat die Zertifikate aufgeführt, die hochgeladen oder erstellt wurden.

![](../../.gitbook/assets/image8%20%282%29.png)_Illustration 112: Liste der Zertifikatvorlagen_

Sie könnten feststellen, dass das fünfte Symbol auf der rechten Seite eine etwas andere Farbe für die erste und die zweite Zeile hat... Das liegt daran, dass das “Default certificate” in diesem Beispiel immer noch als... Standardzertifikat gilt. Um dies zu ändern, müssen Sie auf das graue Symbol in der zweiten Zeile \(![](../../.gitbook/assets/graphics198.png)\) klicken, um Ihr neues Zertifikat \(“Future of Learning” in diesem Beispiel“ zum Standardzertifikat für alle Studenten zu machen.

Es kann immer nur ein Zertifikat in einem Kurs ausgewählt werden, also wähle gut aus.

Sobald dies erledigt ist, können Sie mit dem Lupensymbol ![](../../.gitbook/assets/image9.svg) eine Vorschau des Zertifikats mit gefälschten Werten sehen. In unserem Beispiel gibt das so etwas:

![](../../.gitbook/assets/image10%20%281%29.png)

_Illustration 113: Beispiel-Zertifikat_

Fehlt etwas? Offensichtlich wären einige HTML-Designs mit einem Logo, die Namen der Personen, die dieses Zertifikat genehmigen, eine gute Ergänzung gewesen. Sie finden diese standardmäßig auf dem Zertifikat, das in jedem Kurs in Chamilo verfügbar ist und das so rendern würde.

![](../../.gitbook/assets/image11%20%282%29.png)_Illustration 114: Standardzertifikatvorlage in Chamilo_

Wie Sie sehen, ist diese Vorlage viel weiter entwickelt als die Schnellvorlage, die wir als Beispiel für diesen Leitfaden erstellt haben. Das liegt daran, dass wir Ihnen die besten Tools und Vorlagen zur Verfügung stellen möchten, um sicherzustellen, dass Sie mit minimalem Aufwand eine große Wirkung auf Ihren Kurs erzielen können. Sie können die Standardvorlage bei Bedarf bearbeiten und das Logo durch das Logo Ihrer Institution ersetzen. Das liegt ganz bei dir.

Dieses Zertifikat weist jedoch beim Exportieren nach PDF manchmal einen kleinen Defekt auf. Testen Sie es also zuerst, wenn Sie davon ausgehen, dass dies Ihre beste Funktion ist...

Sie können über die Breadcrumb-Navigation zum Bewertungsbildschirm zurückkehren \(klicken Sie auf _Assessments_\).

