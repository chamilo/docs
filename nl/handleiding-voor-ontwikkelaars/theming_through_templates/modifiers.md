# Modificatoren

Ten slotte kunnen er kansen komen waarbij u wilt dat de sjabloon iets voor u doet, niet erg ingewikkeld, maar dat afhankelijk is van een soort verwerking. Dat is waar modifiers voor zijn.

Bijvoorbeeld, en waarschijnlijk de meest voorkomende modifier binnen bestaande tpl-bestanden: get\_lang, zal de gegeven waarde aannemen en de interne procedure van Chamilo gebruiken om het te vertalen en de vertaling als resultaat tonen, precies waar de tag was geplaatst.

U kunt bijvoorbeeld een sectie als deze hebben, die een deel van de koptekst vertegenwoordigt:

```text
{{"Home"|get_lang}}
```

In dit geval wordt de term «Home» vertaald door Chamilo's functie get\_lang\(\) voordat deze op het scherm wordt weergegeven. De resulterende code voor dit tpl-blok, rekening houdend met eerdere voorbeelden, in het Frans, zou er ongeveer zo uitzien:

```text
Accueil
```

Als je taaltermen gebruikt met meerdere variabelen die moeten worden ingevoegd \(bijvoorbeeld «DateFromXToY»\), moet je twee modificatoren combineren, zoals zo:

```text
{{ 'DateFromXToY' | get_lang | format(dateX, dateY) }}
```

Waar dateX en dateY variabelen zijn die u eerder aan uw sjabloon hebt "toegewezen".

U kunt hiervan voorbeelden vinden in main/template/default/skill/skill\_info.tpl.

## Met behulp van de get\_lang -modifier met plug-ins

Bij het ontwikkelen van plug-ins met .tpl \(wat wordt aanbevolen\), is de use case iets anders. Als u variabelen gebruikt die **alleen** zijn gedefinieerd in de lang/ map van de plug-in \(zie de sectie Taalvariabelen op pagina 50\), en om ervoor te zorgen dat ook met de bovenliggende talen rekening wordt gehouden \(in het geval dat de gebruikers van je plug-in maakt gebruik van een subtaal - zie "Sub-talen" voor gerelateerde informatie\), je zult de get\_plugin\_lang modifier moeten gebruiken.

Deze modifier heeft echter een extra parameter nodig, de naam van de plug-in **class**, dus als we een van de vorige gevallen hergebruiken en zeggen dat we aan een plug-in werken die een map heeft met de naam plugins/homepage-looks/ maar daarbinnen heet de hoofdklasse HomepageLooksPlugin:

```text
Accueil
```

en besluit dat de Franse term "Accueil" \("Home", in een webcontext\) moet worden vertaald via plug-inspecifieke vertalingen, dan zou onze eerste reactie zijn om dit te doen:

```text
{{ “Home” | get_lang }}
```

Dit houdt echter geen rekening met plug-in-specifieke vertalingen in het geval van subtalen. Doe dit in plaats daarvan:

```text
{{ “Home” | get_plugin_lang('HomepageLooksPlugin') }}
```

Op deze manier zal Chamilo specifiek zoeken naar een vertaling die in de plug-in is gedefinieerd en, als er geen vertaling wordt gevonden voor de subtaal die door de gebruiker is gemaakt, zal het zoeken naar een bovenliggende taal die het kan gebruiken, en uiteindelijk standaard Engels als er geen vertaling is. van die twee stappen werken.

Concluderend, al uw plug-ins zouden enig gebruik moeten maken van de _get\_plugin\_lang_ modifier in plaats van de get\_lang modifier, wanneer een vertaling specifiek in de plug-in is gedefinieerd.

