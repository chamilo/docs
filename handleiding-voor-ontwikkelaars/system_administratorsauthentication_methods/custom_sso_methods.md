# Aangepaste SSO-methoden

Telkens wanneer Chamilo voor Single Sign On wordt aangesloten op een oplossing van een derde partij die geen compatibiliteit biedt met een van de ondersteunde methoden, moet u main/auth/sso/ en "extension" \(in PHP\) de sso controleren. class.php \(zoals het voorbeeld voor Drupal\).

Deze bestanden bevatten uitleg over wat u aan uw database moet toevoegen om de aangepaste methode te ondersteunen, en hoe u deze moet noemen.

Als je inspiratie mist voor jouw kant van de SSO \(oplossing van derden\), kun je de code van het [Drupal-Chamilo-project](https://www.drupal.org/project/chamilo) hier bekijken: [http: //cgit.drupalcode.org/chamilo/tree/chamilo.module\#n42](http://cgit.drupalcode.org/chamilo/tree/chamilo.module#n42)

Ten slotte moet je misschien in main/inc/local.inc.php kijken voor de "sso" term om te zien waar het allemaal wordt beheerd in het Chamilo-inlogproces.
