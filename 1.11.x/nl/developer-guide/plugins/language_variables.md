# Taalvariabelen

Plug-ins kunnen ook de globale functie get\_lang\(\) gebruiken die beschikbaar is in de rest van de code van Chamilo, maar ze moeten een variant gebruiken: get\_plugin\_lang\(\), waarvoor u de naam moet opgeven van de plug-in waarin het wordt gebruikt.

Taalvariabelen moeten in een lang/\[taal\].php bestand staan. Bijv. het standaard plug-in taalbestand voor plug-in «abc» bevindt zich in de submap van de plug-in «lang»: /plugin/abc/lang/english.php

Het bestand zelf moet het volgende formaat gebruiken:

```text
/* Plugin's language variables */

$strings['plugin_title'] = 'ABC';
$strings['plugin_comment'] = 'Plugin for managing the … website';
$strings['SelectASession'] = 'Select a session';
```

Zoals u kunt zien, moet het formaat worden ingesteld als een array met de naam «$strings».

De twee eerste array-elementen zijn verplicht. Hiermee kunnen beheerders de naam van de plug-in en een korte beschrijving in hun eigen taal zien.

Om de variabelen te gebruiken vanuit de plug-in, in een sjabloonbestand \(.tpl\) ... \(in te vullen\)
