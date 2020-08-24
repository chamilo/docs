## Beveiliging in Chamilo LMS {# security-in-chamilo-lms}

Hoewel Chamilo vrije software is (en dus iedereen toegang heeft tot de code), kunt u er zeker van zijn dat beveiliging een zeer belangrijk element is voor het ontwikkelteam en de officiële providers. Deze sectie geeft u een paar feiten over beveiliging die u wellicht zou willen weten als u Chamilo ooit moet verdedigen tegen eigen Propriëtaire software.

Allereerst. Propriëtaire software houdt over het algemeen in dat de broncode door compilatie wordt verborgen of 'versluierd'. Dit betekent dat u de applicatie niet "zomaar" kunt downloaden en de code kunt bekijken.

Open source- en vrije-softwaresoftware betekent dat u de broncode kunt zien, wat in theorie ook betekent dat u de zwakke punten gemakkelijker kunt vinden en er uiteindelijk gebruik van kunt maken.

Er is echter iets inherent verkeerd aan de opvatting die mensen hebben over bedrijfseigen software: het is **niet moeilijk** om bij de broncode te komen. Zoals veel artikelen zullen uitleggen [^ 22] , zijn er veel de-compilatietools waarmee je de code van een gecompileerde applicatie kunt analyseren.

Een ander geval is wanneer u webapplicaties gebruikt, waarbij gebruikers helemaal geen toegang hebben tot de code. Vrije Software biedt deze code om te downloaden, wat betekent dat een gratis software-webapplicatie gemakkelijker te analyseren is dan een gesloten bronapplicatie. En dat deel is waar.

De tweede grote misvatting is dat een applicatie die de bron niet onthult veiliger is dan een applicatie die dat wel doet. Dit is niet waar, en komt in zekere zin voort uit het "web 2.0" -effect: een systeem met open bronnen wordt gemakkelijker beoordeeld door mensen die er belang bij hebben het veiliger te maken, en het delen van gemeenschappelijke beveiligingsconcepten tussen de verschillende open source projecten maken het makkelijker om een stuk software te beschermen tegen kwaadaardige aanvallen.

Laten we dit analyseren met feiten: op de website van Secunia (een bureau gespecialiseerd in softwarebeveiliging) [^ 23] vindt u alle openbaar gemaakte beveiligingslekken. Elk rapport krijgt, als het lang genoeg onopgelost blijft, een unieke "CVE" -code, die de kwetsbaarheid identificeert en er later naar verwijst.

Chamilo heeft sinds de oprichting en tot nu toe nooit meer dan 4 kalenderdagen geduurd om een nieuwe beveiligingsfout op te lossen die aan hen werd gemeld. Je kunt het rapport hier bekijken: [http://secunia.com/advisories/product/34198/](http://secunia.com/advisories/product/34198/)

Een eigen product in dezelfde categorie, bijvoorbeeld Blackboard® Learn 9.x (de nieuwste versie), moet nog een beveiligingsprobleem oplossen dat in juli 2012 is gepubliceerd (8 maanden geleden): [http://secunia.com/advisories/product / 41718 /? Task = adviezen](http://secunia.com/advisories/product/41718/?task=advisories) . Het is Academic Suite lijdt nog steeds aan een beveiligingsfout gemeld in juli 2008: [http://secunia.com/advisories/product/18189/?task=advisories](http://secunia.com/advisories/product/18189/?task=advisories)

De code van Blackboard is niet alleen gecompileerd: het is ook niet downloadbaar, dus aanvallers hebben er niet direct toegang toe. Desalniettemin kunnen beveiligingsfouten nog steeds worden opgespoord, gerapporteerd en jarenlang worden verholpen.

De kracht van de veiligheidsketen is de zwakste schakel, en meestal is deze schakel de menselijke luiheid. We hebben tot dusver nog nooit een melding ontvangen van beveiligingslekken die worden misbruikt in Chamilo, maar we hebben wel meerdere meldingen ontvangen van wachtwoorddiefstal, veroorzaakt door een slechte infrastructuur of gewoon door afleiding.

Kortom, Chamilo is net zo veilig, zo niet veiliger, dan gelijkwaardige bedrijfseigen software. Als u beveiligingsproblemen wilt vermijden, zorg er dan voor dat u moeilijk te raden wachtwoord gebruikt en altijd verbinding maakt op een beveiligd netwerk. Bekijk het SSL-hoofdstuk op pagina 88 voor enkele tips.


[^ 22]: http://web.securityinnovation.com/blog/bid/56448/How-Much-Security-Does-Obfuscation-Get-You
[^ 23]: http://secunia.com/