# Archiefopschoning

Na verloop van tijd verzamelt Chamilo tijdelijke bestanden in de cache- en archiefmappen. Regelmatige opschoning voorkomt problemen met schijfruimte.

## Wat kan worden opgeschoond

* **Tijdelijke uploadbestanden** — Bestanden die worden gegenereerd tijdens export, import en andere bewerkingen, plus verouderde legacy-frontend-buildbestanden
* **Symfony-applicatiecache** — Gecompileerde container, gecachte configuratie en routinggegevens. Dit valt *niet* onder de onderstaande actie in het beheerpaneel — zie [Vanaf de opdrachtregel](#from-the-command-line).
* **Sessiegegevens** — Verlopen PHP-sessiebestanden
* **Logbestanden** — Oude logbestanden die niet langer nodig zijn

## Opschoning uitvoeren

### Vanuit het beheerpaneel

Ga in het beheerpaneel naar **Systeem > Tijdelijke bestanden opschonen** (zie [Systeemhulpmiddelen](../system/system-tools.md#clean-temporary-files)). Het meldt hoeveel tijdelijke bestanden er zijn en hoeveel ruimte ze innemen, en laat u vervolgens alles wissen of alleen bestanden ouder dan een gekozen leeftijd, met een dry-run-voorbeeld. Het wist ook verouderde legacy-buildbestanden en regenereert gecompileerde CSS-assets.

Deze actie sluit bewust de eigen cachemappen van Symfony uit (`var/cache/dev`, `var/cache/prod`, `var/cache/test` en cache pools), zodat een wijziging in `.env` of `config/` niet van kracht wordt — gebruik daarvoor de opdrachtregel.

### Vanaf de opdrachtregel

Voor meer controle, en om de Symfony-applicatiecache daadwerkelijk te wissen, gebruikt u Symfony-consolecommando's:

```bash
# Clear the Symfony cache
php bin/console cache:clear

# Clear only the production cache
php bin/console cache:clear --env=prod
```

## Tips

* **Plan regelmatige opschoning** — Stel een wekelijkse of maandelijkse cronjob in om tijdelijke bestanden te wissen
* **Bewaak schijfgebruik** — Houd de grootte van de map `var/` in de gaten, omdat deze groeit met cache- en logbestanden
* **Wees voorzichtig met logs** — Controleer voordat u logbestanden verwijdert of ze informatie bevatten die u nodig kunt hebben voor probleemoplossing