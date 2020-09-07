# Back-up van PhpMyAdmin-database

Databases kunnen worden opgeslagen vanuit de [P](http://fr.wikipedia.org/wiki/PhpMyAdmin) [hpMyAdmin-](http://fr.wikipedia.org/wiki/PhpMyAdmin) interface, door verbinding te maken met de login en het wachtwoord die zijn gemaakt tijdens de [LAMP-](http://fr.wikipedia.org/wiki/LAMP) serverinstallatie, de database-installatie of in de gegevens die zijn verzonden door uw hostingprovider .

<img>Afbeelding 15: Administration - PHPMyAdmin

Eenmaal in de grafische interface van PhpMyAdmin, ga naar de *Export* tab en selecteer de database die moet worden opgeslagen. Er is waarschijnlijk nog 1 genaamd "information_schema", die u gewoon kunt negeren.

Mogelijk wilt u het uitvoerformaat van het back-upbestand wijzigen. Om op te slaan, kiest u het gewenste formaat onder de databases om te exporteren. In het huidige voorbeeld hebben we gekozen voor SQL.

De naam van het opgeslagen bestand kan ook worden gewijzigd in het gedeelte *Uitvoer* . Het kan worden gecomprimeerd met een van de drie aangeboden formaten. Vergeet niet om de optie *Save output to a file te* selecteren, anders zal het alleen het back-up resultaat op het scherm afdrukken, wat je niet echt zal helpen.

Je hoeft alleen nog maar het bestand te downloaden. Het wordt standaard opgeslagen in uw map *Downloads* of op uw bureaublad, afhankelijk van de configuratie van uw browser.

Het opslaan van de databases via *phpMyAdmin* is voorbij. Het opgeslagen bestand heeft de SQL-indeling (.sql-extensie) en kan later, in geval van problemen, via PhpMyAdmin worden geïmporteerd.
