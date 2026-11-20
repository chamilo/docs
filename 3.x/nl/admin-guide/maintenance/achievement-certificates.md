# Certificaten van prestaties (batchgeneratie)

Chamilo kan automatisch een certificaat van prestaties van een cursus genereren voor elke student die de cursus heeft voltooid — binnen een basiscursus en binnen elke sessie die de cursus hergebruikt — zonder dat een docent elke cursus afzonderlijk hoeft te openen. Twee consoleopdrachten dekken dit af, één voor een enkele cursus en één voor het hele platform, en geen van beide is een database-intensieve bewerking die u voortdurend in de gaten moet houden: beide werken in begrensde batches, ondersteunen een dry run en kunnen veilig worden hervat als ze worden onderbroken.

## Platformbrede opdracht

```bash
php bin/console chamilo:gradebook:process-achievement-certificates [options]
```

Voor elke cursus met een in aanmerking komende rootcategorie van het gradebook — op het hoogste niveau, geen subcategorie, met **Certificaten genereren** ingeschakeld — evalueert de opdracht elke ingeschreven student die nog geen certificaat voor die categorie heeft, en genereert er een voor iedereen die aan de voltooiingsvereiste voldoet. Een cursus kan **meer dan één** context bijdragen: de basisinschrijving, en afzonderlijk één context per sessie die de cursus hergebruikt, omdat een sessie een eigen rootcategorie en een eigen slaagdrempel kan hebben.

Een cursus, of een van de sessiecontexten ervan, wordt overgeslagen — niet als fout behandeld — wanneer deze niet in aanmerking komt voor geautomatiseerde verwerking: geen voltooiingsregel geconfigureerd, meer dan één in aanmerking komende rootcategorie voor die context (dubbelzinnig, vereist een handmatige keuze), of ontbrekende inhoud voor certificaatmeldingen. Het uitvoeringsoverzicht aan het einde rapporteert hoeveel contexten in elk geval vielen, zodat niets wordt overgeslagen zonder zichtbaar te worden gemaakt.

### Bron van voltooiing

* `--completion-mode=course-rule` (standaard): gebruikt de voltooiingsregel die voor de cursus is geconfigureerd.
* `--completion-mode=gradebook`: gebruikt rechtstreeks de native gradebookscore voor die context. Alleen een context met precies één in aanmerking komende rootcategorie komt in deze modus in aanmerking — een context met meerdere wordt overgeslagen en gerapporteerd, om in plaats daarvan afzonderlijk te worden verwerkt (zie hieronder).

### Veiligheidsopties

| Optie                     | Doel                                                                                                                                 |
| --------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------- |
| `--dry-run`                 | Evalueert en rapporteert zonder certificaten aan te maken of meldingen te verzenden. Voer dit altijd eerst uit.                                      |
| `--send-notification`       | Vereist voor een echte uitvoering (geen dry run). Verzendt het geconfigureerde interne bericht en de e-mail van de cursus nadat elk certificaat is aangemaakt. |
| `--sender-id=<id>`          | Actieve platformbeheerder die als afzender van de melding wordt gebruikt. Vereist samen met `--send-notification`.                            |
| `--limit=<n>`                | Maximum aantal certificaten dat in één uitvoering wordt gegenereerd (of, bij een dry run, gerapporteerd). `0` = onbeperkt. Standaard `100`.                                    |
| `--scan-limit=<n>`           | Maximum aantal studenten dat in één uitvoering wordt geëvalueerd, over alle cursussen en sessies. `0` = onbeperkt. Standaard `1000`.                                 |
| `--batch-size=<n>`           | Studenten die per databasebatch binnen één cursus-/sessiecontext worden geladen. Standaard `25`.                                                     |
| `--course-batch-size=<n>`    | Cursussen die per databasebatch worden geladen. Standaard `50`.                                                                                         |
| `--after-course-id=<id>`     | Hervat het scannen na dit cursus-ID. Veilig opnieuw te gebruiken na een onderbroken uitvoering — een cursus genereert nooit opnieuw een certificaat voor een student die er al een heeft. |
| `--user-id=<id>`             | Beperkt de uitvoering tot één student, gecontroleerd over elke in aanmerking komende cursus en sessie — nuttig om het gedrag te valideren vóór een platformbrede uitvoering. |
| `--regenerate-empty`         | Verwerkt ook studenten van wie het certificaatrecord bestaat maar geen opgeslagen certificaatbestand heeft — bijvoorbeeld na een generatie die halverwege is mislukt — en genereert dat certificaat opnieuw. Studenten met een volledig certificaat worden nooit aangeraakt. |

### Voorbeelden

Voer eerst een dry-run uit voor het hele platform, om te zien wat er gegenereerd zou worden:

```bash
php bin/console chamilo:gradebook:process-achievement-certificates --dry-run
```

Echte uitvoering, met melding aan studenten, beheerder met ID 1 als afzender:

```bash
php bin/console chamilo:gradebook:process-achievement-certificates \
  --send-notification --sender-id=1
```

Hervat een onderbroken uitvoering na cursus 480:

```bash
php bin/console chamilo:gradebook:process-achievement-certificates \
  --send-notification --sender-id=1 --after-course-id=480
```

Genereer opnieuw de certificaten waarvan het record bestaat maar waarvan het bestand nooit is opgeslagen (eerst een dry-run
om ze op te sommen):

```bash
php bin/console chamilo:gradebook:process-achievement-certificates \
  --regenerate-empty --dry-run
php bin/console chamilo:gradebook:process-achievement-certificates \
  --regenerate-empty --send-notification --sender-id=1
```

### Inplannen als cronjob

```cron
# Every night at 2 AM
0 2 * * * php /path/to/chamilo/bin/console chamilo:gradebook:process-achievement-certificates --send-notification --sender-id=1 -e prod --no-interaction >> /path/to/chamilo/var/log/achievement-certificates.log 2>&1
```

## Eén cursus afzonderlijk verwerken

`chamilo:migration:process-achievement-certificates --course-id=<id>` biedt dezelfde opties voor dry-run,
melding en paginering als het platformbrede commando, beperkt tot alleen de basiscursus
(niet de sessies ervan), met een expliciete `--category-id` om te disambigueren wanneer een cursus meer dan
één in aanmerking komende hoofdcategorie heeft:

```bash
php bin/console chamilo:migration:process-achievement-certificates \
  --course-id=42 --category-id=7 --dry-run
```

Gebruik dit om één cursus te testen vóór een platformbrede uitvoering, of om een cursus te verwerken die de platformbrede
uitvoering als overgeslagen heeft gemeld vanwege een ambigue categorie.

## Exitcodes

Beide commando's eindigen met een foutstatus als ten minste één certificaatgeneratie daadwerkelijk is mislukt
tijdens een echte uitvoering (controleer `var/log/dev.log` — of het equivalente productielogboek — op de onderliggende
fout). Contexten die om structurele redenen zijn overgeslagen (geen regel, ambigue categorie, ontbrekende meldings-
configuratie) veroorzaken geen fout-exitcode; ze worden in plaats daarvan in de samenvatting vermeld.

## Gerelateerd: cursisten die onder 100% blijven steken op een vereist leerpad

Als de voltooiingsregel van een cursus vereist dat een leerpad 100% bereikt, blijft een cursist die elke
stap heeft afgerond maar nooit de laatste pagina "Gefeliciteerd" van het pad heeft geopend net onder 100% steken en wordt
hier nooit in aanmerking komend. Zie
[Vastgelopen laatste items van een leerpad voltooien](learning-path-final-items.md) — voer dit eerst uit als
studenten certificaten missen waarvan u zou verwachten dat ze die hebben verdiend.

## Vervangen: het verouderde cronscript

`public/main/cron/add_gradebook_certificates.php` wordt niet langer aanbevolen. Het laadt elk
gradebookresultaat op het platform in het geheugen in één onbegrensde query en geeft dit nooit vrij
tijdens de lus, zodat het geheugen kan opraken op een instantie met een niet-triviaal aantal cursussen of
oefeningen, en het verstuurt nooit de melding "u hebt een certificaat verdiend". Gebruik in plaats daarvan
`chamilo:gradebook:process-achievement-certificates`.