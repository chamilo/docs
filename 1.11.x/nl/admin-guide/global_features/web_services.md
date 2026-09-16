# webservices

Chamilo LMS biedt een reeks webservices die in de loop van de tijd zijn uitgebreid. Hoewel de huidige basis niet goed is georganiseerd, zou je gemakkelijk moeten kunnen vinden wat je zoekt in de _main/webservices/_ directory.

Meer details over al onze webservices zijn beschikbaar op onze wiki: [http://support.chamilo.org/projects/chamilo-18/wiki/Web_services](http://support.chamilo.org/projects/chamilo-18/wiki/Web_services)

Met de huidige SOAP-webservices \(maar we hebben ook enkele REST- en XML-RPC-services beschikbaar\) kunt u onder andere:

* gebruikers aanmaken, bewerken, inschakelen, uitschakelen en verwijderen
* cursussen maken, bewerken, inschakelen, uitschakelen en verwijderen
* maak en bewerk de beschrijvingen van cursussen
* sessies maken, bewerken, inschakelen, uitschakelen en verwijderen
* gebruikers aan- of afmelden voor cursussen of sessies
* cursussen inschrijven voor sessies
* ontvang een lijst met cursussen

Met de reeds geïmplementeerde services kunt u ook eenvoudig uw eigen services uitbreiden en bouwen. Controleer het hoofdbestand / webservices / registration.soap.php voor een startpunt. Er zijn meer gestructureerde scripts beschikbaar, maar registration.soap.php implementeert op dit moment het grootste aantal functies.

Als u nieuwe services ontwikkelt, overweeg dan om deze met ons te delen op [http://support.chamilo.org/projects/chamilo-18/issues](http://support.chamilo.org/projects/chamilo-18/issues) \(open een issue en dien een _Feature_-suggestie in met je code - we zullen je hiervoor "crediteren"\).

Met het _testip.php_ -script kunt u uw eigen IP-adres identificeren voor de installatieprocedure die op de wiki wordt beschreven.

