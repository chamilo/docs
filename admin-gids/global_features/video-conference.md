# Videoconferentie

Zoals eerder aangegeven in de _plugins_ sectie van deze handleiding \(zie hoofdstuk 4.1.16 op pagina 37\), wordt de videoconferentie tool niet samen met Chamilo geleverd. Je kunt het gemakkelijk installeren en Chamilo eraan koppelen dankzij de _BigBlueButton_ plug-in, maar dit vereist een dedicated server \(of in ieder geval een server gewijd aan iets dat niet kritisch is\).

Om de _BigBlueButton_ videoconferentieserver te installeren, raden we u aan de instructies op de startpagina van het project te volgen: [https://docs.bigbluebutton.org/2.2/install.html](https://docs.bigbluebutton.org/2.2/install.html)

Zodra de videoconferentie is geïnstalleerd en functioneel is, moet u de openbare URL \(soms alleen een IP-adres\) en de geheime sleutel weten.

U vindt de geheime sleutel die tp gebruikt in de configuratie van de Chamilo-plug-in in /var/lib/tomcat6/webapps/bigbluebutton/WEB-INF/classes/bigbluebutton.properties \(zoek naar _Salt_\) of door het bbb-conf-script op de videoconferentieserver.

Zodra deze twee gegevens in uw bezit zijn, gaat u naar de sectie Chamilo-instellingen, _Plugins_. Schakel de _BigBlueButton_-plug-in in en sla op. ** Herlaad de pagina ** zodat de nieuwe categorie "Extra" met instellingen verschijnt in de actiebalk bovenaan de pagina \(een toverstaf\) en klik erop. Voer de gegevens van uw videoconferentieserver in. Nu hoef je alleen nog maar de integratie te controleren door naar een cursus te gaan en op de link _Video-conferentie_ te klikken.

![](../../.gitbook/assets/images48%20%281%29.png)

Afbeelding 84: De tool voor videoconferenties in een cursus

Cursusdocenten en coaches zijn de enigen die een videoconferentieruimte kunnen **starten**. Zij zijn ook de enigen die de status van moderator hebben binnen de conferentie.

![](../../.gitbook/assets/images62%20%281%29.png)

Afbeelding 85: pagina van het hulpprogramma voor videoconferenties met een lijst met opnamen

Studenten kunnen geen verbinding maken in een videoconferentie als hun leraar eerder een kamer heeft geopend \(anders laadt het klikken op de videoconferentie-link gewoon de startpagina van de cursus\).

Als je opnames wilt inschakelen \(die veel ruimte op je videoconferentieserver in beslag nemen\), moet je naar de cursusinstellingen gaan en de functie inschakelen.

![](../../.gitbook/assets/images63.png)

Afbeelding 86: Videoconferentie koersinstelling voor opname

Als u het niet kunt installeren, aarzel dan niet om contact op te nemen met de officiële providers van Chamilo, die u graag toegang verlenen tot hun vooraf geconfigureerde videoconferentieservers.

Opmerking: in Chamilo tot versie 1.9.4 zat er een bug in de plug-in die het gebruik van audio verhinderde. In volgende versies tot 1.9.6 zorgde een andere kleine bug ervoor dat de videoconferentie langer dan 30 minuten werkte. Dit is opgelost in versie 1.9.8 en verhoogd tot 5 uur \(zoek naar "300" in plugin/bbb/lib/bbb.lib.php om aan te passen\).
