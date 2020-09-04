# Database structuur: vast in alle kleine versies

Een belangrijke verandering in Chamilo (in vergelijking met zijn voorouders) is dat we geen wijzigingen in de database of bestandsstructuur toestaan ​​tussen kleinere versies. Aan de kant van de ontwikkelaar betekent dit dat als je een nieuwe functie moet ontwikkelen met nieuwe gegevens die moeten worden opgeslagen, je door plug-ins of extra velden moet werken (hierover later meer) totdat ze kunnen worden opgenomen in de volgende hoofdversie .

Als een hoofdversie (1.9.0, 1.10.0, 1.11.0, enz.) Wordt uitgebracht zonder uw wijzigingen daarin, dan worden deze pas bij de volgende hoofdversie opgenomen. Daarom moet u ervoor zorgen dat u contact met ons opneemt (info@chamilo.org of via een Pull Request op https://github.com/chamilo/chamilo-lms) voor opname voordat we de alpha-fase van een nieuwe hoofdversie ingaan. als u wilt dat uw code wordt opgenomen.

Aan de kant van de beheerder betekent dit dat alle upgrades probleemloos worden uitgevoerd, zonder dat hun gegevens worden gewijzigd, wat betekent dat ze er zeker van kunnen zijn dat er geen probleem zal optreden waarvoor een eerdere back-up vereist is. In feite, als de upgrade van 1.9.2 naar 1.9.4 zou mislukken, zou hij de nieuwe bestanden gewoon weer kunnen overschrijven met bestanden uit versie 1.9.2, en de zaken zullen weer gaan werken (de enige map om op te slaan is de home/ directory als alles is gedaan volgens de installatiehandleiding).

