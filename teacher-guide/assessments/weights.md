# Gewichten

De gewichten, toegankelijk via een pictogram met een percentagesymbool (![](../../.gitbook/assets/image4%20%283%29.svg)![](../../.gitbook/assets/image4%20%2810%29.png)) aan de rechterkant van de hoofdpagina met beoordelingen, kunt u het relatieve belang van elk van de activiteiten binnen de beoordeling definiëren. Als u op dit moment nog geen activiteit heeft geregistreerd, keer dan terug naar deze sectie.

![](../../.gitbook/assets/images133%20%284%29.png)

*Illustration 108: Assessments - Weights*

We raden u aan om een gewichtsverdeling te definiëren die een totaal van 100 \ oplevert (of de equivalente totale waarde voor het parcours gedefinieerd in de vorige sectie), anders wordt het erg ingewikkeld om alle mogelijke relatieve scoreproblemen te begrijpen. Verschillende berichten zullen u eraan herinneren om precies dat te doen.

## Skills ranking <a id="skills-ranking"></a>

Met de rangschikking van vaardigheden kunt u de rangschikking voor de scores definiëren, zodat ze gemakkelijker letterlijk en grafisch kunnen worden weergegeven. Deze optie **moet** echter zijn ingeschakeld door uw portalbeheerder. Anders zie je de volgende opties niet.

Klik op het podiumpictogram aan de rechterkant van de hoofdbeoordelingpagina ![](../../.gitbook/assets/graphics191%20%281%29.png):

![](../../.gitbook/assets/graphics195.png)

*![](../../.gitbook/assets/graphics195%20%281%29.png)
 
 
Afbeelding: Assessments - Rangschikking van vaardigheden*

Naast een pass-markering kunt u extra opties toevoegen: bijv. de namen die u aan een scorebereik wilt geven, zodat u sneller algemene rapporten kunt lezen.

## certificaatsjabloon <a id="certificate-template"></a>

Nadat u de rest van de tools heeft geconfigureerd, kunt u geïnteresseerd raken in het opzetten van uw eigen certificaatsjabloon. Maar laten we, voordat we beginnen, drie concepten duidelijk maken:

- Certificaatsjablonen zijn gebouwd in HTML, dus je hebt waarschijnlijk een webdesigner (of veel geduld) nodig om mooie sjablonen te genereren.
- Certificaatsjablonen zijn gebouwd in HTML (ja, nogmaals), dus hun export naar PDF (een functie die als commodity wordt aangeboden in Chamilo) is misschien niet ideaal en u moet daar misschien samen met uw ontwerper aan werken om ervoor te zorgen dat beide resultaten zijn prima.
- Certificaten worden alleen gegenereerd als de optie Certificaten is geselecteerd (zie Voorconfiguratie toetsen op pagina 99), als studenten een voldoende hebben behaald en als de student daadwerkelijk de assessmenttool **invoert** (of, in 1.11, als je hebt de speciale certificaatpagina gebruikt in het leertraject)

De assessments-tool maakt het mogelijk om een certificaat aan te maken dat automatisch wordt gegenereerd op basis van de gegevens van de leerling die op het platform zijn opgeslagen. Om dit in te stellen, klikt u op het grote certificaatpictogram ![](../../.gitbook/assets/graphics193%20%281%29.png) aan de rechterkant van de hoofdpagina. Hierdoor verschijnt een scherm met een lijst met bestaande certificaten, met te importeren werkbalkopties ![](../../.gitbook/assets/graphics194%20%281%29.png) of maak certificaten aan. Chamilo biedt één basissjablooncertificaat dat u kunt bijwerken als u dat wilt. Klik op het pictogram *Create certificate* ![](../../.gitbook/assets/graphics196%20%281%29.png) om naar een pagina voor het maken van documenten te gaan, waar u een certificaat kunt ontwerpen.

De pagina begint met een lijst met tags die u kunt gebruiken in de editie van uw certificaat:

![](../../.gitbook/assets/image6%20%2810%29.png)
 
 
Afbeelding: tags voor de uitgave van certificaten

Deze tags spreken voor zich, maar laten we ze hier voor de precisie definiëren:

- **((gebruiker_Voornaam))** wordt vervangen door de voornaam van de gebruiker die het certificaat verkrijgt
- **((gebruiker_achternaam))** hetzelfde als hierboven, met de achternaam
- **((cijferlijst_instelling))** deze wordt vervangen door de naam van uw organisatie, gedefinieerd door de beheerder in de platforminstellingen, en zichtbaar in de titelbalk van uw browser
- **((cijferlijst_site naam))** wordt vervangen door de naam van het platform, ook gedefinieerd door de beheerder en zichtbaar in de titelbalk van uw browser
- **((leraar_Voornaam))** wordt vervangen door de voornaam van de docent die aan deze cursus is toegewezen. Een waarschuwing: dit is niet getest met meerdere docenten of met sessies, dus wees voorzichtig.
- **((leraar_lachternaam))** hetzelfde als hierboven, maar achternaam
- **((officieel_code))** als u het officiële codeveld van de gebruikers gebruikt, zal de overeenkomstige waarde deze tag vervangen bij het genereren van het certificaat
- **((datum_certificaat))** wordt vervangen door de datum en tijd van het certificaat, in de datumnotatie die overeenkomt met uw taaldefinitie
- **((datum_certificaat_nee_tijd))** hetzelfde als hierboven, zonder de uren en minuten
- **((cursus_code))** als je een duidelijke hiërarchie van cursuscodes gebruikt, kan het handig zijn om de cursuscode hier te gebruiken
- **((cursus_titel))** wordt vervangen door de cursustitel
- **((cijferlijst_rang))** wordt vervangen door de score behaald (zowel absoluut als percentage) door de student
- **((certificaat_koppeling))** wordt vervangen door de unieke URL van het certificaat. Chamilo bewaart ze goed, dus het is een goed idee om de link te tonen op een certificaat dat afgedrukt gaat worden om de relatie met de digitale originele versie te behouden
- **((certificaat_koppeling_html))** in het geval dat u het certificaat exporteert als een HTML-certificaat of een PDF-certificaat voor gebruik in een digitaal formaat, zal dit een HTML-link rechtstreeks op het certificaat plaatsen
- **((certificaat_streepjescode))** vervangt de tag door een QR-code met informatie over het certificaat (inclusief de link naar het origineel). Dit is een erg leuke functie als je van QR-codes houdt, maar je moet er rekening mee houden dat de tag (een simpele tekst op één regel) daadwerkelijk zal worden vervangen door een QR-code van goede grootte. Plan dus de vrije ruimte rond deze tekst goed.
- **((extern_stijl))** and **((regio))** zijn voorbeelden van extra profielvelden die zijn gedefinieerd voor gebruikers. Extra velden verschijnen in deze lijst, afhankelijk van hun beschikbaarheid, dus dat is een geweldige uitbreiding die u aan uw certificaten kunt geven als uw beheerder openstaat voor dit soort gebruik.

Het certificaat wijzigen is dan alleen een kwestie van het vinden van een goede tekst en de juiste tags:

![](../../.gitbook/assets/image7%20%2810%29.png)
 
 
Afbeelding: Gebied voor het maken van certificaten

Nadat u uw certificaat heeft aangemaakt en opgeslagen, toont de hoofdpagina Certificaat de certificaten die zijn geüpload of gemaakt.

![](../../.gitbook/assets/image8%20%2810%29.png)
 
 
Afbeelding: Lijst met certificaatsjablonen

U merkt misschien op dat het 5e pictogram aan de rechterkant een iets andere kleur heeft voor de eerste en de tweede regel ... Dat komt omdat het "Standaardcertificaat" in dit voorbeeld nog steeds wordt beschouwd als het ... standaardcertificaat. Om dat te veranderen, moet u op het grijze pictogram op de tweede regel klikken (![](../../.gitbook/assets/graphics198%20%283%29.png)) om van uw nieuwe certificaat ("Future of Learning" in dit voorbeeld) het standaardcertificaat te maken voor alle studenten.

Er kan slechts één certificaat tegelijk in een cursus worden geselecteerd, dus kies goed.

Zodra dit is gebeurd, het vergrootglaspictogram (![](../../.gitbook/assets/image9%20%281%29.svg)![](../../.gitbook/assets/image9%20%2810%29.png)) kunt u een voorbeeld van het certificaat met nepwaarden zien. In ons voorbeeld geeft dit zoiets als dit:

![](../../.gitbook/assets/image10%20%281%29.png)

*![](../../.gitbook/assets/image10%20%287%29.png)
 
 
Afbeelding: Voorbeeldcertificaat*

Mist u iets? Het is duidelijk dat sommige HTML-ontwerpen met een logo, de namen van de mensen die dit certificaat goedkeurden, een goede toevoeging zouden zijn geweest. U vindt deze op het certificaat dat standaard in elke cursus in Chamilo beschikbaar is en die zo wordt weergegeven.

![](../../.gitbook/assets/image11%20%2810%29.png)Illustratie 114: Standaard certificaatsjabloon beschikbaar in Chamilo

Zoals u kunt zien, is deze sjabloon veel verder ontwikkeld dan de snelle sjabloon die we als voorbeeld voor deze handleiding hebben gemaakt. Dat komt omdat we u de beste tools en sjablonen willen bieden om ervoor te zorgen dat u met minimale inspanning een grote impact kunt genereren met uw cursus. U kunt de standaardsjabloon desgewenst bewerken en het logo vervangen door het logo van uw instelling. Dit is allemaal aan jou.

Dit certificaat vertoont echter soms een klein defect bij het exporteren naar PDF, dus test het eerst als u verwacht dat dit uw beste eigenschap is ...

U kunt via de broodkruimelnavigatie terugkeren naar het beoordelingsscherm (klik op *Assessments*).
