# Stap 2 van 6: Vereisten

Deze stap controleert of uw server alle benodigde elementen heeft voor een volledige en correcte installatie van Chamilo.

![](../../../../.gitbook/assets/images3%20%281%29.png)

De vereisten waaraan al door uw systeem is voldaan, zijn gemarkeerd in **groen**, de verplichte maar niet-tevredenen zijn gemarkeerd met **rood** en de niet-tevreden maar niet verplichte voorwaarden zijn gemarkeerd met **oranje**.

Bijna alle vereisten hebben betrekking op de PHP-installatie en bieden links naar meer details. De aanbevolen parameters vertegenwoordigen variabelen die u kunt wijzigen in uw PHP-configuratie (*php.ini*) of in de VirtualHost-configuratie.

Aan het einde van de pagina met vereisten vindt u een sectie *Permissions op mappen en bestanden*.

![](../../../../.gitbook/assets/images5%20%281%29.png)Afbeelding 5: Installatie - Voorwaarden (einde)

Standaard is onder GNU/Linux schrijven niet toegestaan in mappen. U moet de toegang tot bestanden wijzigen om de beveiliging te optimaliseren en voldoende machtigingen te geven aan de gebruiker die de webserver uitvoert. Deze zorgen ervoor dat de permissies worden beperkt tijdens het uitvoeren van een service (in dit geval *Apache*) en voorkomen dat een cracker te gemakkelijk de controle over uw server kan krijgen.

Onder Windows is dit over het algemeen standaard gemakkelijker (maar veel minder veilig) en zijn de permissies al voldoende (maar te tolerant).

**Opmerking**: Chamilo wordt regelmatig (minstens één keer per jaar) gecontroleerd op beveiligingsfouten die uw server in gevaar zouden kunnen brengen. U kunt op de hoogte worden gehouden van de nieuwste beveiligingsfouten die zijn gevonden en verholpen door u te abonneren op [http://support.chamilo.org/projects/chamilo-18/wiki/Security_issues](http://support.chamilo.org/projects/chamilo-18/wiki/Security_issues). Als alternatief hebben we een Twitter-feed voor Chamilo's beveiligingsgerelateerde nieuws: [http://twitter.com/chamilosecurity](http://twitter.com/chamilosecurity) Chamilo heeft een uitstekende staat van dienst wat betreft het oplossen van elk beveiligingsprobleem en het publiceren van patches aan zijn gebruikers binnen 4 dagen na melding. U kunt ons openbaar register raadplegen op de website van Secunia.

Ga op Ubuntu lokaal naar de directory waar de directory *Chamilo* staat. Geef het voldoende rechten aan gebruiker *www-data* (de webservergebruiker onder Ubuntu) en laad de pagina opnieuw in uw browser. Als u een ander besturingssysteem gebruikt, moet u mogelijk de volgende opdracht een beetje bijwerken.

Ex.: user@server:/var/www$ chown -R www-data:www-data chamilo/

Deze machtigingen zijn lang niet veilig en we gaan ervan uit dat u advies over machtigingen zult inwinnen bij een goed gekwalificeerde Linux-beheerder. Beveiliging zou voor u belangrijk moeten zijn, maar we kunnen onmogelijk alle gevallen van machtigingen en servers die er zijn, alleen met deze handleiding behandelen.

Klik op «+ Nieuwe installatie».

***Opmerking***: als u een update van een eerdere versie van Chamilo uitvoert, is dit hoofdstuk niet het juiste hoofdstuk voor u. Je zou beter hoofdstuk 2.3 moeten lezen: Chamilo updaten. We raden je ook aan om de installatie- en updategids van Chamilo te lezen, die beschikbaar is in de **documentatie** directory van je Chamilo-pakket.
