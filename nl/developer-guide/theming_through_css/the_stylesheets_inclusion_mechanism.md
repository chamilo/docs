# Het opnamemechanisme voor stylesheets

Als u ooit meer stylesheets aan de lijst wilt toevoegen, is dit de volledige stroom:

* een script start \(bijv. /user\_portal.php\)
* het omvat global.inc.php
* global.inc.php roept de methode Display::display\_header\(\) aan \(in main/inc/lib/display.lib.php\)
* display\_header roept de methode Template::set\_css\_files\(\) aan
* set_css\_files\(\) bereidt een array voor met de CSS om te laden en bereidt deze voor als \_css\_file\_to\_string
* het initiële script laadt een sjabloon \(.tpl\) uit main/template/default/
* de sjabloon bevat de sjabloon main/template/default/layout/main\_header.tpl
* de main \_header.tpl load head.tpl \(in dezelfde map\)
* head.tpl laadt de _css\_file\_to\_string_ array om de CSS in de

Als je globaal een nieuw stylesheet wilt configureren, of de volgorde waarin ze geladen zijn wilt veranderen, en als je de vorige flow hebt gevolgd, weet je nu dat de beste plaats om dit te doen is in de Template::setCssFiles\(\) methode.

Dit is tot dusver de beste methode in Chamilo 1.10, maar in 2.0 met de volledige mogelijkheden van ontketende sjablonen, zou je in staat moeten zijn om de nieuwe CSS rechtstreeks aan je sjabloon toe te voegen.

