# Stap 4 van 6: MySQL-databaseparameters

We zullen nu controleren of het databasebeheersysteem (DBMS) werkt en is geconfigureerd zoals verwacht:

![](../../../../.gitbook/assets/images7%20%281%29.png)

Om de instellingen te kunnen controleren, moet u de verplichte velden invullen. Deze elementen zijn waarschijnlijk aan u gegeven toen u uw hostingservice de eerste keer huurt, of u hebt ze zelf gedaan bij het lokaal configureren van uw [LAMP](http://fr.wikipedia.org/wiki/LAMP) server.

- *Database-host:* de naam van de SQL-server. Als dit een lokale installatie is, is de MySQL-server waarschijnlijk ook lokaal en zal de naam *localhost* zijn.
- *Database-gebruiker:* de naam van de databasegebruiker. Als dit een lokale installatie is, is de naam waarschijnlijk standaard *root*, maar we raden aan een andere gebruiker aan te maken voor uw Chamilo-databases, omdat het gebruik van *root* een aanzienlijk veiligheidsrisico vormt voor uw andere databases op die server. Normaal gesproken kunt u een nieuwe gebruiker aanmaken via een webinterface, maar als u dit in de terminal moet doen, en ervan uitgaande dat u een gebruiker met de naam "chamilo" wilt met een wachtwoord "olimahc", zullen deze 2 opdrachten u helpen: ** grant all privileges on chamilo.* to chamilo@localhost identified by 'olimahc'; ** flush-privileges;
    - grant all privileges on chamilo.* to chamilo@localhost identified by 'olimahc';
    - flush privileges;
- *Database-wachtwoord:* het wachtwoord dat is gegeven/aangemaakt tijdens het inhuren/aanmaken van de database, op hetzelfde moment als de gebruiker. Lokaal is het wachtwoord over het algemeen standaard leeg, maar uit veiligheidsoverwegingen raden we u nogmaals aan hier uw eigen wachtwoord te definiëren.
- *Databasenaam:* de naam van de database die moet worden gemaakt en waarin alle gegevens van uw Chamilo worden opgeslagen

Sinds Chamilo 1.9.0 is het installatieproces vereenvoudigd en is de databasestructuur gemigreerd zodat er slechts één database wordt gebruikt, wat het installatieproces en het onderhoud van Chamilo-portals aanzienlijk vereenvoudigt.

Controleer de gegevens die in het formulier zijn ingevoerd en klik op de knop *Controleer databaseverbinding*. Controleer de gegevens opnieuw als er een foutmelding verschijnt. Misschien is dit wachtwoord niet het juiste?

Als alles in orde is (en het groene bevestigingsblok verschijnt), gaat u verder met de volgende stap.

![](../../../../.gitbook/assets/images9%20%281%29.png)Afbeelding: Controle van installatiedatabase - OK

![](../../../../.gitbook/assets/images9%20%281%29.png)
