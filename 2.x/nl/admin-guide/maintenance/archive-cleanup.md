# Archiefopruiming

Na verloop van tijd verzamelt Chamilo tijdelijke bestanden in de cache- en archiefmappen. Regelmatige opruiming voorkomt problemen met schijfruimte.

## Wat Kan Worden Opgeruimd

* **Symfony cache** — Gecompileerde sjablonen, gecachte configuratie en routeringsgegevens
* **Tijdelijke bestanden** — Bestanden die worden gegenereerd tijdens export, import en andere bewerkingen
* **Sessiedata** — Verlopen PHP-sessiebestanden
* **Logbestanden** — Oude logbestanden die niet langer nodig zijn

## Opruiming Uitvoeren

### Via het Beheerderspaneel

Navigeer naar **Archiefopruiming** in het beheerderspaneel. Klik op de opruimknop om tijdelijke bestanden te verwijderen.

### Via de Opdrachtregel

Voor meer controle kunt u Symfony-consolecommando's gebruiken:

```bash
# Clear the Symfony cache
php bin/console cache:clear

# Clear only the production cache
php bin/console cache:clear --env=prod
```

## Tips

* **Plan regelmatige opruimingen** — Stel een wekelijkse of maandelijkse cron-taak in om tijdelijke bestanden op te ruimen
* **Houd schijfgebruik in de gaten** — Let op de grootte van de map `var/`, aangezien deze groeit met cache- en logbestanden
* **Wees voorzichtig met logs** — Controleer voordat u logbestanden verwijdert of ze informatie bevatten die u mogelijk nodig heeft voor probleemoplossing