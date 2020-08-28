# Laatste installatie-instellingen

Zodra Chamilo is geïnstalleerd, bevat het succesbericht ook een kort waarschuwingsbericht

**Beveiligingstip**: Om uw site te beschermen, wijzigt u de rechten op app/config/ en main/install/index.php \(niet hun directories\) in read-only \(CHMOD 444 \). »

![](../../../.gitbook/assets/dernier-parametre%20%281%29.png)

Afbeelding 11: Installatie - Installatierapport

Het verdient in feite de voorkeur om de _main/install/_ directory volledig te verwijderen \(de bevestigingstekst is hier niet echt nauwkeurig over\):

```
user@server:/var/www/chamilo$ sudo rm -rf main/install/
```

Dit voorkomt dat iemand \(behalve de _root_ gebruiker\) deze map kan zien en deze dus kan gebruiken.

Voor het _configuration.php_ bestand zijn **0444** de juiste rechten om toe te wijzen:

```
user@server:/var/www/chamilo/$ cd app/config/
user@server:/var/www/chamilo/app/config$ sudo chmod 0444 configuration.php
```

Wanneer deze bewerking is voltooid, kan het gebruik van Chamilo veilig beginnen te klikken op de _Ga naar de nieuw gemaakte portal_ link.

