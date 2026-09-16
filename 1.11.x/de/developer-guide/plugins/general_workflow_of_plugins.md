# Allgemeiner Workflow von Plugins

Der \(verkürzte\) Plug-Workflow wie folgt:

* du erstellst die plugin.php Datei und die index.php
* Sie konfigurieren dann, wo es zu sehen ist \(im Plugins-Bereich des Administrations-Panels\)
* Die main/inc/lib/template.lib.php -Klasse \(um die Zeile 140\) "loads" die Plugins-Regionen
* Regionen sind in main/inc/lib/plugin.lib.php definiert und mit der Methode "get\_installed\_plugins\_by\_region" können Sie wissen, welches Plugin in einer bestimmten Region der Benutzeroberfläche aktiviert werden soll
* \(zurück zu template.lib.php ~140\) die Template-Lib "loads" die Plugins in bestimmten Template-Variablen namens "plugin\_\[region\]"
* Die definierten Vorlagenvariablen werden dann von jeder .tpl angezeigt, die sie lädt

 TPL \(Template\) -Dateien innerhalb des main/template/default/ -Verzeichnisses \(siehe Abschnitt Vorlagen oben\).

 Zum Beispiel können Sie für die normale "2-columns" -Ansicht der Kursliste des Schülers \(wie in user_portal.php\) layout/layout\_2col.tpl überprüfen, und im Allgemeinen werden sie {{plugin_\[region\]}}variables laden, abhängig von der Region, die das Plugin definiert wird.Im Moment ist kein "region" für die Kursliste definiert, also wenn Sie also eine -Plugin erscheint dort, Sie sollten eine neue Region definieren \(sowohl in einer der TPL-Dateien als auch innerhalb von plugin.lib.php\), oder Sie könnten das Menü\_top bzw. das Menü\_bottom verwenden \(ich glaube, diese sind für das Menü links/rechts\).