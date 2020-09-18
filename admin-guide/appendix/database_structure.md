# Database structuur

Als je geïnteresseerd bent in de databasestructuur voor Chamilo 1.9, kijk dan op onze wiki voor het volledige schema: [http://support.chamilo.org/projects/chamilo-18/wiki/Database_schema](http://support.chamilo.org/projects/chamilo-18/wiki/Database_schema) . Weet gewoon dat er ongeveer 180 tafels zijn, met veel onderlinge verbindingen, dus zorg ervoor dat u het goed doet voordat u ermee probeert te knoeien. Er zijn verschillende mechanismen om plug-ins te ontwikkelen op basis van de huidige structuur, zonder deze te wijzigen. Neem contact op met de ontwikkelaars via IRC (zie de voettekst van onze website) of via [http://support.chamilo.org/projects/chamilo-18](http://support.chamilo.org/projects/chamilo-18) als je je verloren voelt.

![](../../.gitbook/assets/images51%20%281%29.png)
 
 
Afbeelding:  Chamilo LMS 1.9 database-structuur

De databasestructuur is drastisch veranderd tussen Dokeos of Chamilo LMS 1.8 en Chamilo LMS 1.9. We hebben alles naar één database verplaatst zonder tabelreplicatie, wat ons nu een reeks nieuwe kansen biedt voor mash-ups tussen cursussen.

Het is belangrijk op te merken dat de <strong>databasestructuur niet verandert tussen Chamilo LMS minor-versies,</strong> Niks. Dit komt door een moeilijk te beheren maar zeer nuttige beslissing die op ontwikkelaarsniveau is genomen om ervoor te zorgen dat gebruikers gemakkelijk van de ene versie naar de andere kunnen upgraden zonder het risico te lopen gegevensverlies of verslechtering te veroorzaken.

Dus als u een Chamilo LMS 1.11.0-installatie heeft, kunt u eenvoudig upgraden naar 1.11.2, 1.11.4, 1.11.6, 1.11.8, 1.11.10 of 1.11.12 en uw database structuur zal helemaal niet veranderen.
