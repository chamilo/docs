# Vorlagen

Seit Version 1.9 verwendet Chamilo das Twig-Templating-System, um Teile seines visuellen Erscheinungsbildes zu erzeugen.

Dies bedeutet, dass Sie Chamilo jetzt leichter wechseln können. Der folgende Screenshot stammt beispielsweise aus einer durch Templating modifizierten Chamilo 1.9-Installation. Obwohl die meisten visuellen Änderungen über CSS vorgenommen werden können, gibt es eine Reihe von Dingen, die auf diese Weise einfach nicht gemacht werden können, wie zum Beispiel neue visuelle Elemente.

![](../../.gitbook/assets/images50%20%286%29.png) Illustration 89: Beispielportal mit einem anderen Template

Wie Sie sehen, wurden klassische Elemente von Chamilo je nach gewünschtem Endbild bewegt, gezeigt oder verborgen.

Um ein Theme zu aktualisieren, empfehlen wir Ihnen, mit einer Kopie des bestehenden Themas zu beginnen:

cd /var/www/chamilo/main/templates/

cp -r Standard mytemplate

Dann kannst du anfangen, dieses Thema zu untersuchen. Sie werden feststellen, dass sich die meisten Elemente für Kopf- und Fußzeilen im Verzeichnis _layout_ befinden. Zum Beispiel wird der gesamte sichtbare Header auf der Seite in main/templates/default/layout/main\_header.tpl. deklariert

Das Verständnis des Template-Mechanismus sollte relativ einfach sein, wenn Sie Erfahrung mit anderen Templating-Systemen haben.

Vorlagen \(die auf .tpl enden\) sehen in etwa so aus:

**Illegales HTML-Tag entfernt**:

Alle Marker werden in andere Skripte oder Bibliotheken vorbereitet. Die meisten der sehr gebräuchlichen Tags sind in main/inc/lib/template.lib.php definiert, mit einem “assign” -Aufruf wie folgt:

$this-&gt;assign \('anzeigen\_footer', $ status\);

Damit Sie Ihre neue Vorlage testen können, müssen Sie die Zeile 13 von main/inc/lib/template.lib.php ändern, um „Standard“ durch den Namen des Verzeichnisses Ihrer neuen Vorlage zu ersetzen \(im obigen Beispiel wäre es _mytemplate_\).

Während der Entwicklung einer neuen Vorlage \(die wir empfehlen, in einem separaten Portal, nicht in Ihrem Produktionsportal\), sollten Sie das Caching deaktivieren. Sie können das auf verschiedene Arten tun, aber am einfachsten ist es wahrscheinlich, Ihr Portal einfach in den “test server” -Modus zu versetzen. Sie können dies auf der ersten Seite der _Platform-Einstellungen_ \(Option namens _Server Type_\) tun.

