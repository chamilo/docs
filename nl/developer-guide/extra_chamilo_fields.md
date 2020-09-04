# Extra Chamilo-velden

![](../.gitbook/assets/images29%20%282%29.png)

Als je je ooit afvraagt waar die «originele\_gebruiker\_id» waarden die we zagen in het hoofdstuk over webservices werden opgeslagen, kijk dan eens naar de «extra\_veld» tabel. U zult zien dat gebruikers, cursussen en zelfs sessies allemaal twee "extra" tabellen gebruiken waarmee we een vrijwel onbeperkte hoeveelheid aanvullende informatie en links naar andere systemen kunnen opslaan.

Voor gebruikers is het eenvoudig: u kunt velden definiëren via het administratiepaneel. Klik gewoon op de laatste link van het gebruikersblok: «Profilering» en volg de instructies om een nieuw veld te definiëren.

Sinds 1.10.0 biedt het admin-paneel de mogelijkheid om extra cursus- en sessievelden te configureren, en sinds 1.11.0 kun je dat doen met elk ondersteund element via een link aan het einde van het platformblok.

Voor gebruikers, cursussen en sessies waren de velden echter al beschikbaar in de Chamilo 1.9-database, dus je **kunt** ze gebruiken als je dat wilt. Webservices maakten er al gebruik van bij het aanmaken van een nieuwe cursus of een nieuwe sessie via hen: ze creëren \(of voegen er gegevens in als het bestaat\) een veld met de naam van de waarde die je hebt opgegeven in de «originele\_course\_id\_name»parameter naar de WSCreateCourse\(\) methode, bijvoorbeeld.

Hoe dan ook, u kunt nieuwe velden handmatig rechtstreeks vanuit uw databaseclient definiëren en deze desgewenst via plug-ins gebruiken.

Velddefinities worden opgeslagen in de extra \_field-tabel. Waarden van elke gebruiker, cursus of sessie voor deze velden worden opgeslagen in de extra \_field\ _values-tabel.

Bekijk ze, ze zijn een geweldige bron om mee te werken!
