# Stap 4 van 6: MySQL-databaseparameters

We zullen nu controleren of het databasebeheersysteem \(DBMS\) werkt en is geconfigureerd zoals verwacht:

![](../../../../.gitbook/assets/images7%20%281%29.png)

Afbeelding 8: Installatie - MySQL-instellingen

Om de instellingen te kunnen controleren, moet u de verplichte velden invullen. Deze elementen zijn waarschijnlijk aan u gegeven toen u uw hostingservice de eerste keer huurt, of u hebt ze zelf gedaan bij het lokaal configureren van uw [LAMP](http://fr.wikipedia.org/wiki/LAMP) server.

* _Database-host:_ de naam van de SQL-server. Als dit een lokale installatie is, is de MySQL-server waarschijnlijk ook lokaal en zal de naam _localhost_ zijn.
* _Database-gebruiker:_ de naam van de databasegebruiker. Als dit een lokale installatie is, is de naam waarschijnlijk standaard _root_, maar we raden aan een andere gebruiker aan te maken voor uw Chamilo-databases, omdat het gebruik van _root_ een aanzienlijk veiligheidsrisico vormt voor uw andere databases op die server. Normaal gesproken kunt u een nieuwe gebruiker aanmaken via een webinterface, maar als u dit in de terminal moet doen, en ervan uitgaande dat u een gebruiker met de naam "chamilo" wilt met een wachtwoord "olimahc", zullen deze 2 opdrachten u helpen:
** grant all privileges on chamilo.\* to chamilo@localhost identified by 'olimahc';
** flush-privileges;
* _Database-wachtwoord:_ het wachtwoord dat is gegeven/aangemaakt tijdens het inhuren/aanmaken van de database, op hetzelfde moment als de gebruiker. Lokaal is het wachtwoord over het algemeen standaard leeg, maar uit veiligheidsoverwegingen raden we u nogmaals aan hier uw eigen wachtwoord te definiëren.
* _Databasenaam:_ de naam van de database die moet worden gemaakt en waarin alle gegevens van uw Chamilo worden opgeslagen

Sinds Chamilo 1.9.0 is het installatieproces vereenvoudigd en is de databasestructuur gemigreerd zodat er slechts één database wordt gebruikt, wat het installatieproces en het onderhoud van Chamilo-portals aanzienlijk vereenvoudigt.

Controleer de gegevens die in het formulier zijn ingevoerd en klik op de knop _Controleer databaseverbinding_. Controleer de gegevens opnieuw als er een foutmelding verschijnt. Misschien is dit wachtwoord niet het juiste?

Als alles in orde is \(en het groene bevestigingsblok verschijnt\), gaat u verder met de volgende stap.

![](../../../../.gitbook/assets/images9%20%281%29.png)

Afbeelding 9: Controle van installatiedatabase - OK

Als er al een database met dezelfde naam bestaat, zal een bericht met een gele achtergrond u dat vertellen, omdat deze database **wordt overschreven** met uw nieuwe database! Om dit te voorkomen, moet u ervoor zorgen dat u in het vorige formulier een andere databasenaam gebruikt.

