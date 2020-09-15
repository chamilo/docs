# Sjablonen

Sinds versie 1.9 gebruikt Chamilo het Twig-templating-systeem om delen van het visuele uiterlijk te genereren.

Dit betekent dat u Chamilo nu gemakkelijker kunt veranderen. De volgende schermafbeelding is bijvoorbeeld afkomstig van een Chamilo 1.9-installatie die is gewijzigd via sjablonen. Hoewel de meeste visuele wijzigingen kunnen worden aangebracht via CSS, zijn er een aantal dingen die gewoon niet op deze manier kunnen worden gedaan, zoals het tonen van nieuwe visuele elementen.

![](../../.gitbook/assets/images50%20%281%29.png)Afbeelding: Voorbeeldportaal met een ander sjabloon

Zoals je kunt zien, zijn klassieke elementen van Chamilo verplaatst, getoond of verborgen, afhankelijk van het gewenste uiteindelijke uiterlijk.

Om een thema bij te werken, raden we u aan te beginnen met een kopie van het bestaande:

cd /var/www/chamilo/main/templates/

cp -r default mytemplate

Dan kun je dat thema gaan onderzoeken. U zult zien dat de meeste kop- en voettekstelementen zich in de map _layout_ bevinden. De hele zichtbare koptekst op de pagina wordt bijvoorbeeld gedeclareerd in main/template/default/layout/main\_header.tpl.

Het begrijpen van het sjablonenmechanisme zou relatief eenvoudig moeten zijn als u enige ervaring heeft met andere sjabloneringssystemen.

Templates \(ending in .tpl\) will look something like this:

**Illegal HTML tag removed**:

Alle markeringen in een .tpl worden voorbereid in andere scripts of bibliotheken. De meeste van de meest voorkomende tags zijn gedefinieerd in main/inc/lib/template.lib.php, met een "toewijzen" aanroep, zoals deze:

$this->assign\('show\_footer', $status\);

Om je nieuwe sjabloon te kunnen testen, moet je regel 13 van main/inc/lib/template.lib.php wijzigen om 'default' te vervangen door de naam van de map van je nieuwe sjabloon \(met behulp van het voorbeeld hierboven zou het _mytemplate_\) zijn.

Tijdens de ontwikkeling van een nieuw sjabloon \(wat we u aanraden op een apart portaal te doen, niet uw productieportaal\), moet u caching uitschakelen. U kunt dat op een aantal manieren doen, maar het gemakkelijkste is waarschijnlijk om uw portaal gewoon in de "testserver" -modus te zetten. U kunt dat doen op de eerste pagina van de _Platform-instellingen_ \(optie genaamd _Server Type_\).
