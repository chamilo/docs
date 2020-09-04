# Je code bijwerken

Omdat we mechanismen voor automatisch laden gebruiken, en omdat we sjablonen gebruiken, is er een kleine stap die u **elke keer** moet nemen direct nadat u de laatste wijzigingen uit onze repository hebt gehaald:

```text
composer update
```

Dit zorgt ervoor dat alle afhankelijkheden up-to-date zijn en dat het autoloading-mechanisme wordt bijgewerkt om al zijn klassen op de juiste plaatsen te vinden.

Helaas is componist een erg traag en geheugenverslindend proces met Chamilo, dus zorg ervoor dat je minimaal 3 GB RAM beschikbaar hebt voor dat proces, en dat je in de tussentijd aan iets anders werkt ...
