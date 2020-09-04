# Algemene conventies voor toekomstige databasestructuur

Als u een nieuwe plug-in of een andere functie start, waarvoor database-aanpassingen nodig zijn, en hoewel u de meeste van deze informatie kunt vinden in de coderingsconventies \(volgende sectie\), moet u de volgende regels in gedachten houden:

* Alle tabellen MOETEN een unieke identificatie hebben op basis van één enkele kolom. Als de tabel al een `id` bevat die afhankelijk is van een `c_id` kolom, MOET de nieuwe kolom de naam `iid` hebben
* Alle tabellen die naar cursussen verwijzen MOETEN de gehele ID van de cursus gebruiken en de corresponderende kolom `c_id` aanroepen
* Alle tabellen die verwijzen naar sessies MOETEN de integer ID van de sessie gebruiken en de corresponderende kolom `session_id` \(en NIET `id_session`\) aanroepen
* Alle tabellen, die de relatie weergeven tussen andere tabellen \(namelijk een nm- of 1-n-relatie\) MOET een naam dragen met een centrale term «rel», waarbij de twee tabelnamen in alfabetische volgorde worden uitgedrukt, tenzij dit contra-intuïtief is . Het koppelen van gebruikers aan cursussen draagt bijvoorbeeld de tabelnaam `course_rel_user`.
* Als u specifiek een tabelindex definieert om dingen te versnellen, MOET deze index de volgorde volgen van de velden, die in de overeenkomstige query's worden gebruikt. Voor een tabel die bijvoorbeeld ten minste de drie velden 'user_id', 'c_id' en 'session_id' bevat, moet een index van die drie velden worden gebaseerd op de zoekopdrachten die naar deze tabel worden gedaan. Als een zoekopdracht als volgt werkt: `SELECT id FROM table WHERE c_id = 3 AND user_id = 872 AND session_id = 32`, dan moet de index in deze volgorde worden gemaakt: `ALTER TABLE table ADD INDEX idx_tcus (c_id, user_id, session_id)`
* Vertalingen van termen worden beheerd buiten de database. Alle tabel-, kolom- en indexnamen MOETEN in CORRECTE Engelse taal worden geschreven voor een betere begrijpelijkheid door andere ontwikkelaars over de hele wereld.

