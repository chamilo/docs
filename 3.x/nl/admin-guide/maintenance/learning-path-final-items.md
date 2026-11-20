# Vastgelopen laatste items van leerpaden voltooien

De laatste stap van een leerpad — de pagina "Gefeliciteerd" met de certificaat- en vaardigheidsblokken — telt pas als voltooid zodra een cursist die pagina daadwerkelijk opent. Een cursist die alle andere stappen afrondt maar nooit doorklikt naar die laatste pagina blijft voor altijd net onder 100% steken. Omdat de toekenning van een prestatiecertificaat (en van vaardigheden) afhankelijk is van het bereiken van 100% in het leerpad, ontvangt die cursist nooit een certificaat of vaardigheid die hij of zij anders wel heeft verdiend.

```bash
php bin/console chamilo:learning-path:complete-final-items [options]
```

Voor elk leerpad op het platform waarvan de laatste stap van het type **Final item** is, controleert het commando elke cursist met een lopende poging (onder 100%) die alle andere stappen heeft voltooid — in elke cursus en elke sessie die het leerpad hergebruikt. Zo ja, dan voltooit het het laatste item voor die cursist precies alsof hij of zij het zelf had geopend: het registreert dezelfde itemweergave, voert dezelfde herberekening van de voortgang uit en activeert dezelfde certificaatgeneratie en vaardigheidstoekenning als een echt bezoek zou doen.

Net als `chamilo:gradebook:process-achievement-certificates` (zie
[Prestatiecertificaten](achievement-certificates.md)) werkt het in begrensde batches, ondersteunt het een
dry run en kan het veilig worden hervat als het wordt onderbroken — een cursist van wie het laatste item al is voltooid, wordt bij een latere uitvoering nooit opnieuw aangeraakt.

## Opties

| Option                 | Purpose                                                                                                            |
| ----------------------- | -------------------------------------------------------------------------------------------------------------------- |
| `--dry-run`             | Evalueert en rapporteert zonder iets te voltooien. Voer dit altijd eerst uit.                                     |
| `--sender-id=<id>`      | ID van een actieve platformbeheerder, gebruikt als maker van de resource wanneer het voltooien van een laatste item certificaatgeneratie of vaardigheidstoekenning activeert. Vereist voor een echte uitvoering (geen dry run). |
| `--limit=<n>`           | Maximum aantal laatste items dat in één uitvoering wordt voltooid (of, bij een dry run, gerapporteerd). `0` = onbeperkt. Standaard `500`. |
| `--scan-limit=<n>`      | Maximum aantal voortgangsrecords van cursisten dat in één uitvoering wordt gescand, over alle leerpaden heen. `0` = onbeperkt. Standaard `5000`. |
| `--batch-size=<n>`      | Aantal voortgangsrecords van cursisten dat per databasebatch wordt geladen, binnen één leerpad. Standaard `50`.   |
| `--lp-batch-size=<n>`   | Aantal leerpaden dat per databasebatch wordt geladen. Standaard `50`.                                              |
| `--after-lp-id=<id>`    | Hervat het scannen na dit leerpad-ID.                                                                              |

## Voorbeelden

Voer eerst een dry run uit voor het hele platform, om te zien wie zou worden voltooid:

```bash
php bin/console chamilo:learning-path:complete-final-items --dry-run
```

Echte uitvoering, met beheerder met ID 1 als maker van de resource:

```bash
php bin/console chamilo:learning-path:complete-final-items --sender-id=1
```

Hervat een onderbroken uitvoering na leerpad 480:

```bash
php bin/console chamilo:learning-path:complete-final-items --sender-id=1 --after-lp-id=480
```

## Exitcodes

Het commando eindigt met een foutstatus als ten minste één laatste item tijdens een echte uitvoering daadwerkelijk niet kon worden voltooid — de samenvattingstabel vermeldt het leerpad, de cursist en de reden; het applicatielog bevat de volledige exception. Een cursist die terecht is uitgesloten (laatste item al voltooid, of een andere stap nog onvoltooid) is geen fout en veroorzaakt nooit een fout-exitcode.

## Gradebook-score na voltooiing

De score die voor een leerpad in de Gradebook-tabel wordt getoond, wordt nooit opgeslagen — die wordt live berekend op basis van de huidige voortgang van de cursist telkens wanneer de pagina wordt geladen, zodat die onmiddellijk 100% weergeeft, zonder extra stap.

Het **certificaat** van een cursist, als dat al bestond voordat hij of zij 100% bereikte (met een oudere, lagere score erin vastgelegd), krijgt zijn opgeslagen score en gerenderde HTML alleen vernieuwd als de certificaatregeneratie zelf slaagt wanneer dit commando het laatste item voltooit — dezelfde aanroep die een echt bezoek zou activeren. Als de certificaatgeneratie om welke reden dan ook mislukt (zie
[Prestatiecertificaten](achievement-certificates.md) voor veelvoorkomende oorzaken, bijv. rechten op bestandsopslag), bereikt de voortgang van de cursist nog steeds correct 100% en toont de Gradebook-tabel dat ook — alleen het certificaat blijft de oude score tonen. Omdat het commando een cursist die al op 100% staat nooit opnieuw bezoekt, probeert het dit bij een latere uitvoering niet opnieuw. Genereer dat certificaat handmatig opnieuw (de actie **Generate** in de lijst Certificaten) zodra het onderliggende probleem is opgelost.

`--sender-id` bestaat specifiek om één veelvoorkomende oorzaak van die fout te vermijden: bij het voltooien van een laatste item buiten een echt verzoek is er geen ingelogde gebruiker die als maker van de certificaatresource kan worden vastgelegd, en zonder die gebruiker mislukt de generatie volledig.