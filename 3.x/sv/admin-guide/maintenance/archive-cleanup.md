# Arkivrensning

Med tiden samlar Chamilo tillfälliga filer i cache- och arkivkatalogerna. Regelbunden rensning förebygger problem med diskutrymme.

## Vad som kan rensas

* **Tillfälliga uppladdningsfiler** — Filer som skapas vid export, import och andra åtgärder, plus föråldrade byggfiler från den äldre frontend
* **Symfony-applikationscache** — Kompilerad container, cachad konfiguration och routingdata. Detta täcks *inte* av åtgärden i administrationspanelen nedan — se [Från kommandoraden](#from-the-command-line).
* **Sessionsdata** — Utgångna PHP-sessionsfiler
* **Loggfiler** — Gamla loggfiler som inte längre behövs

## Utföra rensning

### Från administrationspanelen

Navigera till **System > Rensa tillfälliga filer** i administrationspanelen (se [Systemverktyg](../system/system-tools.md#clean-temporary-files)). Den visar hur många tillfälliga filer som finns och hur mycket utrymme de tar, och låter dig sedan rensa allt eller endast filer äldre än en vald ålder, med en förhandsvisning i dry-run. Den rensar också föråldrade äldre byggfiler och regenererar kompilerade CSS-resurser.

Denna åtgärd utesluter avsiktligt Symfonys egna cachekataloger (`var/cache/dev`, `var/cache/prod`, `var/cache/test` och cachepooler), så den gör inte att en ändring i `.env` eller `config/` träder i kraft — använd kommandoraden för det.

### Från kommandoraden

För mer kontroll, och för att faktiskt rensa Symfony-applikationscachen, använd Symfony-konsolkommandon:

```bash
# Clear the Symfony cache
php bin/console cache:clear

# Clear only the production cache
php bin/console cache:clear --env=prod
```

## Tips

* **Schemalägg regelbundna rensningar** — Sätt upp ett vecko- eller månadsvis cron-jobb för att rensa tillfälliga filer
* **Övervaka diskanvändning** — Håll koll på storleken på katalogen `var/`, eftersom den växer med cache- och loggfiler
* **Var försiktig med loggar** — Innan du tar bort loggfiler, kontrollera om de innehåller information du kan behöva för felsökning