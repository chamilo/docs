# Der Mechanismus zur Einbeziehung von Stylesheets

Wenn Sie jemals mehr Stylesheets in die Liste aufnehmen möchten, ist dies der vollständige Ablauf:

* ein Skript startet \(z.B. /user\_portal.php\)
* es enthält global.inc.php
* global.inc.php nennt die Methode Display::display\_header\(\) \(in main/inc/lib/display.lib.php\)
* display\_header ruft das Template auf። set\_css\_files\(\) methos
* set_css\_files \(\) bereitet ein Array mit dem CSS zum Laden vor und bereitet es als\_css\_file\_to\_string_
* Das anfängliche Skript lädt eine Vorlage \(.tpl\) von main/template/default/
* Die Vorlage enthält die Vorlage main/template/default/layout/main\_header.tpl
* Der Hauptladen\_header.tpl head.tpl \(im selben Ordner\)
* head.tpl lädt das Array _css\_file\_to\_string_ um das CSS im

Wenn Sie ein neues Stylesheet global konfigurieren oder die Reihenfolge ändern möchten, in der es geladen wird, und wenn Sie den vorherigen Flow verfolgt haben, wissen Sie jetzt, dass der beste Ort dafür die Methode Template::setCssFiles\(\) ist.

Dies ist die bisher beste Methode in Chamilo 1.10, aber in 2.0 mit der vollen Fähigkeit, Vorlagen zu entfesseln, sollten Sie in der Lage sein, das neue CSS direkt zu Ihrer Vorlage hinzuzufügen.

