# Geschiedenis

![](../../.gitbook/assets/images19%20%283%29.png)![](../../.gitbook/assets/images22%20%283%29.png)

Om de huidige structuur van de Chamilo LMS-bestanden te begrijpen, heb je wat geschiedenis nodig.

De Chamilo-code begon eigenlijk in 2001 als een project genaamd _Claroline_. Claroline groeide uit tot een populair gratis softwareproject, met name in de academische wereld, en onderscheidde zich van andere projecten zoals _Moodle_, _WebCT_ en _Ilias_ \(tussen anderen\) door zijn gebruiksgemak, een kenmerk dat Chamilo door de jaren heen heeft gehandhaafd.

In 2004 leed het Claroline-project aan een _fork_ \(een verstoring in _the force_\) tussen het oorspronkelijke project \(dat later stierf in 2014 en het leven schonk aan het _Claroline Connect_-project\) en het _Dokeos_-project, meer gericht op het brengen van de tool naar de zakenwereld.

In 2010 kreeg het Dokeos-project een nieuwe splitsing, tussen Dokeos \(bestaat nog steeds\) en Chamilo, veroorzaakt door het zeer ongevoelige gedrag van de bedrijfsleider van Dokeos, met weinig begrip van de waarde van de gemeenschap in een dergelijk project.

Deze 2 grote projectsplitsingen waren meestal filosofisch in de _Chamilo_-projectgeschiedenis, maar ze kwamen wel met hun aantal veranderingen in structuur \(zowel op databaseniveau als op bestandsniveau\), en we zullen proberen deze hier kort te behandelen .

Een belangrijke opmerking om deze korte tijdreis mee af te sluiten, is dat Chamilo LMS 1.10 en 1.11 met aanvullende cruciale nieuwe wijzigingen zijn gekomen die de leesbaarheid en herbruikbaarheid van het Chamilo-systeem aanzienlijk hebben verbeterd. Chamilo 2.0, dat momenteel in ontwikkeling is, zal nog wat meer veranderingen brengen, voornamelijk gericht op uitbreidbaarheid.

Laten we dus eens kijken welke opmerkelijke veranderingen er in de loop van de jaren in Chamilo zijn gebeurd ...

## 2001-2003

Gedurende deze periode begint _Claroline_ als een verzameling eenvoudige hulpmiddelen voor leerkrachten en een relatief losse centrale kern. De projectontwikkelaars verdienden ons respect voor het tekenen van de eerste versie van wat niet bestond in de vrije softwarewereld, waarbij ze niets anders gebruikten dan de PHP-basis om een kathedraal te bouwen, maar ze maakten ook een aanzienlijke hoeveelheid technische fouten, die nog steeds een impact op Chamilo vandaag.

### Separation of courses databases

De grootste fout in de hele structuur van het systeem was ongetwijfeld het scheiden van de gegevens van elke cursus in een individuele database.

Dit betekende dat om 20 actieve cursussen op uw platform te hebben, u 20 databases + 1 hoofddatabase + 1 gebruikersdatabase + 1 volgdatabase moest hebben. En als je meer cursussen wilde, moest je meer databases maken, waardoor je MySQL-gebruiker rare machtigingen moest hebben voor alle databases met hetzelfde voorvoegsel, zoals:

```text
GRANT ALL PRIVILEGES ON `clarodb\_ %`.* to 'clarodb'@'localhost' identified by 'abcde' ;
```

Waar '%' een tekenreeks betekent.

Dit had de directe impact dat gebruikers die Claroline wilden installeren op gedeelde hostingservices dat niet konden, omdat ze machtigingen moesten krijgen voor meer dan één database, wat op dat moment meestal niet werd toegestaan door hostingservices.

Een poging om de impact van deze maatregel enigszins te verminderen, maakte het nog erger, aangezien het idee ging van één database per cursus \(met ~50 tabellen elk\) naar één enkele database, maar met behoud van het prefixsysteem \(dit keer voor tabellen\), waardoor een platform met 20 cursussen eigenlijk één database met 1.000 tabellen nodig had. Je had toen een clarodb \_course1\_document, een clarodb\_course2\_document, enz. Om de documenten-tool voor alle cursussen te beheren.

### Scheiding van verantwoordelijkheden: één ontwikkelaar per tool

Op de een of andere manier is dit niet zozeer een ontwerpfout als een probleem met open bijdragen met een beperkt beheer. Het probleem was dat elke tool na een paar jaar ontwikkeling een andere standaard had ontwikkeld. De coderingsconventies werden niet strikt genoeg gerespecteerd, er werd geen sjabloon verstrekt om nieuwe tools te ontwikkelen, en de dropbox-tool bleek totaal anders te zijn in codestyling en naamconventies dan bijvoorbeeld de documenten-tool.

Dit had dramatische gevolgen, die later op de een of andere manier ook in _Dokeos_ werden gevonden: er werden beveiligingsfouten gevonden in de ene tool voor een functie die vrij gelijkaardig was aan een andere, niet wettelijk toegestane functie in een andere tool.

Bovendien genereert de ontwikkeling van afzonderlijke tools op een relatief ongecontroleerde manier codereplicatie. Er is veel code tegelijkertijd in verschillende tools gevonden, waardoor er meer werk is om te onderhouden en minder traceerbaarheid van wijzigingen.

### Cursuscode als letterlijk

Een laatste probleem was het gebruik van een letterlijke \(string\) als een cursus-ID. Dit betekent dat we voor alle joins tussen tabellen waar de cursus belangrijk is, verschillende zoekopdrachten hebben op de cursuscode, wat betekent dat we dure indexen nodig hebben om het zoeken te versnellen, terwijl een geheel getal de zaken veel sneller zou maken.

Het vermindert ook de draagbaarheid een beetje, aangezien het opvragen van een string gepaard gaat met problemen met hoofdletters versus kleine letters en met ontsnappende karakters \('vs' versus integer\) die niet altijd gelijk zijn tussen verschillende databasesystemen.

Tot op heden zijn we in 2020 \(19 jaar later\) nog steeds niet volledig van dit probleem af gekomen, omdat sommige tafels \(eigenlijk heel weinig, meestal cijferboekjes\) nog gebruik maken van de letterlijke cursuscode. Dit zal \(eindelijk\) volledig verdwenen zijn in Chamilo 2.0.

### Meerdere beschrijfbare mappen

Een probleem dat zich net voor 2004 begon voor te doen, en daarna, was de vermenigvuldiging van beschrijfbare mappen. Een beschrijfbare map is een map waartoe de webserver schrijftoegang nodig heeft om de volledige functies van Chamilo te kunnen bieden. Het hebben van verschillende mappen zoals deze impliceert het wijzigen van machtigingen **en** kijken naar beveiligingsaanvallen in al deze, evenals het maken van back-ups van slechts een deel hiervan, enz. Kortom: een reeks complicaties voor zo'n klein interessepunt voor gebruikers.

In 1.11.x is dit significant verbeterd door de _meeste_ van deze beschrijfbare mappen naar de _app/_ map te verplaatsen. Er blijven echter een paar extra "optionele" mappen over, zoals _web/css/_ en _main/lang/_ \(en in sommige gevallen enkele plugin-mappen\). Een lijst van deze mappen is te vinden in het bestand _documentation/security.html_ in elke Chamilo-installatie.

## 2004-2010

De splitsing tussen Claroline en Dokeos had op zijn zachtst gezegd slimmer kunnen worden aangepakt. Het belangrijkste probleem hier was dat de scheiding het ontwikkelingsteam niet scheidde \(het Claroline-team bleef terwijl er een nieuw team werd gecreëerd voor Dokeos\). Het was vooral een managementsplitsing.

Dit betekende dat Dokeos, hoewel hij een geweldige innovatieve kijk was op hoe een e-learningplatform ook de zakenwereld zou kunnen helpen, zijn technische afkomst niet handhaafde en veel knowhow verloor in het proces. De scheiding was ook nogal brutaal \(met heel weinig dat een juridische strijd verhinderde\), dus communicatie met het vorige technische team was niet echt welkom, en de nieuwe ontwikkelaars die aan Dokeos begonnen te werken, moesten de gaten zo goed mogelijk opvullen, met een markt die duidelijk anders was en veel technische veranderingen moesten worden doorgevoerd.

Niettemin heeft het Dokeos-team de software op indrukwekkende wijze onderhouden, verbeterd en uitgebreid. Maar de structuurproblemen van Claroline bleven gehandhaafd, bereikten nooit een punt met voldoende \(economische\) middelen om de gebreken op te lossen, maar werkten langzaam aan het geleidelijk verhelpen ervan.

### Tracking voor leertrajecten

Eén fout deed de schade echter een beetje toenemen, en was voornamelijk te wijten aan een gebrek aan ervaring van de oorspronkelijke auteur van deze gids \(dwz ik\): het volgen van de leerpadtool \(volledig herschreven in Dokeos ter ondersteuning SCORM 1.2\) werd opgeslagen in de hoofddatabase \(wat goed is om op de lange termijn alle gegevens onder dezelfde database te brengen, maar niet in vergelijking met alle andere trackingtabellen\), wat enige verwarring veroorzaakte binnen het ontwikkelteam als alle andere opsporingsbronnen bevinden zich over het algemeen in tabellen met het voorvoegsel _track\_e\__. Dit is vandaag de dag nog steeds een beetje verwarrend, aangezien de tabellen `lp_view` en` lp_item_view` informatie over het volgen van gebruikers bevatten, maar het zal zo blijven totdat een juiste hernoeming en herstructurering van de traceertabellen kan worden uitgevoerd zonder de gegevens van onze gebruikers te riskeren.

Sommige tracking wordt ook bijgehouden in de cijferlijst en de student\_publication.

### De item\_property tabel

Een andere fout, waarvan we niet duidelijk zijn of het al in Claroline aanwezig was of in de zeer vroege stadia van Dokeos verscheen, is dat er een item\_property-tool is die enkele itemeigenschappen bevat \(zoals de naam suggereert\) maar **ook** slaat tijdinformatie op van wanneer deze eigenschappen zijn gewijzigd.

Het praktische hiervan betekende dat sommige ontwikkelaars deze tabel begonnen te gebruiken als een **tracking** -tabel \(voor het rapporteren van wie dit of dat heeft verwijderd of gemaakt\), wat betekende dat we ook oude gegevens van objecten die daar al waren verwijderd, wat op zijn beurt betekende dat deze tabel bleef groeien en groeien totdat deze verstopt raakte met gegevens die zeer moeilijk te ontleden zijn.

Op dit moment kan het bijvoorbeeld nodig zijn om alle records voor een specifiek item te doorlopen om te weten wat de huidige zichtbaarheid is, wat veel onnodige middelen vereist om uit te voeren.

Verder bewaart de item\_property-tabel een verwijzing naar het object van veel andere tabellen. En deze referentie gebruikt een letterlijke toolcode als discriminator in plaats van een geheel getal, wat verdere invloed op de prestaties heeft.

## 2010-2014

### Enkele database en InnoDB

Helemaal aan het begin van het Chamilo-project werd er hard gewerkt om het probleem met meerdere databases op te lossen.

De eerste stabiele versie die werd geleverd met een enkele database was versie 1.9.0, uitgebracht in 2012. Het werd geleverd met een volledig geautomatiseerd upgradeproces van eerdere versies, dat de databasestructuur verandert van meerdere databases naar een enkele database op het internet. -vliegen en laat je achter met een verbeterde en veel efficiëntere.

Dit probleem was nu volledig opgelost vanaf Chamilo 1.9.4, aangezien de kleine resterende details geleidelijk werden opgelost in de versies die direct volgden op 1.9.0.

De wijziging naar een enkele database werd echter gemaakt met weinig prestatiedetails die moesten worden verbeterd. Het \(relatief snelle\) mixen van verschillende tabellen impliceerde bijvoorbeeld de discriminatie van elementen door middel van een cursuscode of een cursus-ID gecombineerd met de originele element-ID, in plaats van een nieuwe globale ID opnieuw te definiëren.

Bijvoorbeeld, voor een `id` veld in de `document` tabel in de database `chamilodb_course1`, hebben we nu \(als er nog geen globale ID is ingesteld\) een `c_id` **en** een `id` veld in de `c_document` tabel in de enkele `chamilodb` database. Of om het in SQL-termen te zeggen, twee queries zoals deze:

```text
select * from chamilodb_course1.document where id = 5;
select * from chamilodb_course2.document where id = 5;
```

Word nu:

```text
select * from chamilodb.c_document where id = 5 and c_id = 1;
select * from chamilodb.c_document where id = 5 and c_id = 2;
```

Als zodanig is de primaire sleutel voor tabel `c_document` niet meer `id`, maar eerder een combinatie van `c_id + id`, waardoor de tabellen nog steeds deze structuur gebruikten om de InnoDB-engine in MySQL te gebruiken, wat verdere database-efficiëntie verhinderde verbeteringen.

Dit verhelpen betekende het toevoegen van een extra, globale ID die de moeite waard is voor alle cursussen gecombineerd, die is geïmplementeerd voor alle tabellen in versie 1.10 van Chamilo LMS, uitgebracht in 2015. De velden `cid + id` werden echter gehandhaafd om een maximum te garanderen. stabiliteit voor een tijdje. Deze zijn nog steeds aanwezig in Chamilo 1.11, maar staan gepland voor verwijdering in 2.0 \(het veld `id`, niet noodzakelijk het veld `c_id`\).

Zodra deze stap is voltooid, wordt Chamilo volledig geoptimaliseerd voor portals met zeer hoge belasting. In de tussentijd moet het afhandelen van duizenden transacties per seconde op verschillende databaseservers in een load-balanced infrastructuur met zorg gebeuren, mogelijk met behulp van slechts enkele tools \(zoals de oefentool in Chamilo 1.11, die al in een dergelijke structuur is geïmplementeerd).


### Meerdere databases laag

Er zijn aanzienlijke inspanningen geleverd om alle SQL te centraliseren en ervoor te zorgen dat we gemakkelijker naar andere databaseserverbeheersystemen \(PostgreSQL, Oracle, enz\) konden gaan. Op het moment van 1.11.0 was dit werk nog niet voltooid, maar nadert het langzaam \(maar zeker\) zijn voltooiing en we hopen een eerste versie beschikbaar te hebben in 3.0 \(niet 2.0 zoals aanvankelijk gepland, aangezien dit een lagere prioriteit met tijd waarbij Oracle de eigenaar is van MySQL en MariaDB die zelfstandig wordt gelanceerd\).

Een reeks zoekopdrachten bevindt zich echter nog steeds in verschillende Chamilo-scripts, waardoor we er niet zeker van kunnen zijn dat het volledig draagbaar is zonder ze allemaal te herzien.

Als je je nu binnen Chamilo ontwikkelt, probeer dan de entiteiten \(en hun ORM-relatie\) te gebruiken die tot je beschikking staan voor alle nieuwe vragen. Controleer de select\(\) en update\(\) functies op deze entiteiten in `src/Chamilo/*/Entity/`.

### Verpakkingen voor opname in andere software

Er zijn aanzienlijke pogingen gedaan om de structuur van Chamilo-bestanden te herstructureren en er wordt nog steeds aan gedaan om deze te integreren in andere software, zoals Linux-distributies zoals Debian en andere.

Om dit te doen, was een belangrijk probleem de vermenigvuldiging van mappen met specifieke rechten, waarbij de webserver andere rechten moet hebben dan voor andere mappen. De map `app/upload/users/` is bijvoorbeeld waar de afbeeldingen van de gebruikers naartoe gaan, terwijl de map `main/default_course_documents/images/` standaardbestanden voor cursussen bevat, maar tegelijkertijd nieuwe standaardbestanden moet accepteren \(en als zodanig is schrijftoegang voor de webserver vereist\).

In zowel Claroline als Dokeos namen deze specifieke mappen in aantal toe, en je moest nu toestemming geven voor het schrijven voor de webserver in in totaal ongeveer 9 mappen om alle functies van Chamilo te krijgen.

Dit is opgelost in 1.10 door velen te verenigen onder de `app/` map en zijn submappen \(voor alle gegevens gerelateerd aan cursussen en gebruikers\).

Als zodanig moet de map `app/` worden opgenomen in alle systeemback-ups. De rest van de Chamilo-applicatie moet stabiel blijven in de andere mappen.

