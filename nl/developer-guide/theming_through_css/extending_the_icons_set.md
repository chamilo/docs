# Uitbreiding van de iconen set

Sinds versie 1.9 bevat Chamilo een weinig bekende functie waarmee aangepaste pictogrammen, geplaatst in uw CSS-thema, de vooraf gedefinieerde pictogrammen van Chamilo kunnen vervangen.

Dit werkt echter alleen voor pictogrammen die normaal worden geladen vanuit de main/img/icons/. Niet die aan de root van main/img/.

Om pictogrammen te vervangen, moet u in uw eigen CSS-themamap \(bijvoorbeeld app/Resources/public/css/themes/chamilo/) een submap maken met de naam "icons/", waarin de structuur van de normale main/img/icons/ map wordt weergegeven.

Als u bijvoorbeeld het pictogram edit\_profile.png in het linkermenu wilt vervangen, normaal gesproken in

* main/img/icons/22/edit\_profile.png

je zou moeten creëren

* app/Resources/public/css/themes/chamili/icons/22/edit\_profile.png

![](../../.gitbook/assets/image11%20%281%29.png)

![](../../.gitbook/assets/image12%20%281%29.png)

Dit is een kort voorbeeld van welk type stijlverandering u zou kunnen genereren door gewoon een nieuwe map in uw CSS te maken.

Onthoud dat de nieuwe pictogrammen dezelfde grootte moeten hebben als de vorige. Dit is in het bovenstaande voorbeeld niet gedaan, daarom zijn de Inbox- en Compose-pictogrammen aan de rechterkant een beetje bijgesneden. Als alternatief kunt u ook de stylesheet bijwerken om er zeker van te zijn dat het bijsnijden niet gebeurt, maar dit zal waarschijnlijk veel tijd in beslag nemen.

Onthoud dat om uw stijlwijziging te 'doorspoelen', u ofwel een nieuwe CSS-map in ZIP-indeling moet uploaden via het admin-paneel, OF ze rechtstreeks naar de server moet uploaden (in app/Resources/public/css/themes/\[style\]/\). Maar als u het laatste doet, moet u de optie "Cache opschonen" van de admin-pagina gebruiken, anders blijft uw stijl in app/ en wordt niet "gepubliceerd" in web/css/ zoals nodig is.

Het echte gebruik van deze functie is om te voorkomen dat u de main/img/ op enigerlei wijze moet wijzigen, aangezien dit wordt overschreven bij elke nieuwe versie van de software.

Door uw eigen CSS-map te gebruiken, bent u verzekerd van onafhankelijkheid van de belangrijkste Chamilo-code.
