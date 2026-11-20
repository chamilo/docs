# Klassen

Klassen in Chamilo zijn vooraf gedefinieerde groepen gebruikers die als eenheid in sessies kunnen worden ingeschreven. Ze vereenvoudigen het inschrijvingsproces wanneer u regelmatig dezelfde groepen mensen opleidt.

> Klassen en [Gebruikersgroepen](../../admin-guide/users/user-groups.md) delen dezelfde interface. Het enige verschil is de instelling **groepstype**: kies "Klasse" bij het aanmaken van de groep. Al het overige — ledenbeheer, zichtbaarheid en de interface zelf — werkt identiek.

## Een klasse aanmaken

1. Ga vanuit het beheerpaneel naar **Klassen** (of Gebruikersgroepen en selecteer het type "Klasse")
2. Klik op **Een klasse aanmaken**
3. Voer een **naam** in (bijv. "Engineeringsteam", "Nieuwe medewerkers maart 2026")
4. Voeg **leden** toe — zoek en selecteer gebruikers
5. Opslaan

## Klassen gebruiken voor inschrijving

Bij het aanmaken of bewerken van een sessie kunt u een hele klasse in één keer inschrijven in plaats van gebruikers afzonderlijk toe te voegen:

1. Open de inschrijvingsinstellingen van de sessie
2. Klik op **Een klasse toevoegen**
3. Selecteer de klasse
4. Alle leden van de klasse worden in de sessie ingeschreven

## Klassen beheren

* **Bewerken** — Wijzig de klassenaam of werk het lidmaatschap bij
* **Leden toevoegen/verwijderen** — Houd de klassenlijst actueel
* **Verwijderen** — Verwijder de klasse (heeft geen invloed op de ledenaccounts of hun bestaande inschrijvingen)

## Integratie-API

Platformbeheerders kunnen de [API voor klasinschrijvingen](../../developer-guide/api/class-subscriptions.md) gebruiken om het lidmaatschap te inspecteren en de gebruikers, sessies en cursussen van een klasse te vervangen. In tegenstelling tot het toevoegen van één gebruiker in de beheerinterface vervangt elke API-`PUT` de **volledige** bijbehorende lijst. Lees altijd de huidige inschrijvingen voordat u een update verzendt.

## Klasleden filteren met extra velden

Bij het toewijzen van gebruikers aan een klasse gebruikt u **Extra velden** om de beschikbare gebruikers te filteren op een doorzoekbaar gebruikersprofielveld. Kies het veld, voer een waarde in of selecteer er een, en voeg overeenkomende gebruikers toe vanuit het paneel met beschikbare gebruikers. Afhankelijk van het type extra veld kan het filter een tekstinvoer of vooraf gedefinieerde keuzes bieden.

Alleen extra gebruikersvelden die als doorzoekbaar/filterbaar zijn geconfigureerd, worden aangeboden. Bestaande klasleden blijven in het paneel met geselecteerde leden terwijl u de beschikbare gebruikers filtert; filteren mag hen niet stilzwijgend verwijderen. Controleer de volledige lijst met geselecteerde leden voordat u opslaat. Zie [PR #9364 over filters voor klaslidmaatschap](https://github.com/chamilo/chamilo-lms/pull/9364).

## Tips

* **Maak klassen voor terugkerende cohorten** — Als u dezelfde training voor verschillende teams geeft, maak dan een klasse voor elk team
* **Werk bij vóór elke sessie** — Controleer het klaslidmaatschap voordat u een klasse inschrijft in een nieuwe sessie, zodat de lijst actueel is
* **Combineer met CSV-import** — Importeer klaslidmaatschap uit een CSV-bestand voor grote groepen