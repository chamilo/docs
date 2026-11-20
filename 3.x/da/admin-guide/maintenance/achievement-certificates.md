# Præstationscertifikater (batchgenerering)

Chamilo kan automatisk generere et kursus' præstationscertifikat for alle studerende, der har
gennemført det — både i et basiskursus og i enhver session, der genbruger det — uden at en underviser
skal åbne hvert kursus enkeltvis. To konsolkommandoer dækker dette, én for et enkelt kursus
og én for hele platformen, og ingen af dem er en databasetung operation, du skal overvåge:
begge arbejder i afgrænsede batches, understøtter en prøvekørsel og kan genoptages sikkert, hvis de afbrydes.

## Platformsdækkende kommando

```bash
php bin/console chamilo:gradebook:process-achievement-certificates [options]
```

For hvert kursus, der har en berettiget rod-karakterbogskategori — på øverste niveau, ikke en underkategori,
med **Generer certifikater** aktiveret — evaluerer kommandoen alle tilmeldte studerende, som ikke
allerede har et certifikat for den kategori, og genererer et for alle, der har opfyldt
gennemførelseskravet. Et kursus kan bidrage med **mere end én** kontekst: dets basistilmelding og,
separat, én kontekst pr. session, der genbruger det, da en session kan have sin egen rodkategori
og sin egen beståelsesgrænse.

Et kursus, eller en af dets sessionskontekster, springes over — og behandles ikke som en fejl — når det ikke
er berettiget til automatiseret behandling: ingen gennemførelsesregel konfigureret, mere end én berettiget rodkategori
for den kontekst (tvetydigt, kræver et manuelt valg) eller manglende indhold til certifikatnotifikation. Kørselsoversigten til sidst rapporterer, hvor mange kontekster der faldt i hvert tilfælde, så intet
springes over uden at blive synliggjort.

### Gennemførelseskilde

* `--completion-mode=course-rule` (standard): bruger den gennemførelsesregel, der er konfigureret for kurset.
* `--completion-mode=gradebook`: bruger den indbyggede karakterbogsscore direkte for den kontekst i stedet.
  Kun en kontekst med præcis én berettiget rodkategori kvalificerer sig i denne tilstand — en med flere
  springes over og rapporteres, så den kan behandles enkeltvis i stedet (se nedenfor).

### Sikkerhedsindstillinger

| Indstilling                  | Formål                                                                                                                                 |
| --------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------- |
| `--dry-run`                 | Evaluer og rapportér uden at oprette certifikater eller sende notifikationer. Kør altid denne først.                                      |
| `--send-notification`       | Påkrævet for en reel (ikke-prøvekørsel) udførelse. Sender kursets konfigurerede interne besked og e-mail, efter hvert certifikat er oprettet. |
| `--sender-id=<id>`          | Aktiv platformsadministrator, der bruges som afsender af notifikationen. Påkrævet sammen med `--send-notification`.                            |
| `--limit=<n>`                | Maksimalt antal certifikater, der genereres (eller, ved prøvekørsel, rapporteres) i én kørsel. `0` = ubegrænset. Standard `100`.                                    |
| `--scan-limit=<n>`           | Maksimalt antal studerende, der evalueres i én kørsel, på tværs af alle kurser og sessioner. `0` = ubegrænset. Standard `1000`.                                 |
| `--batch-size=<n>`           | Studerende indlæst pr. databasebatch inden for én kursus-/sessionskontekst. Standard `25`.                                                     |
| `--course-batch-size=<n>`    | Kurser indlæst pr. databasebatch. Standard `50`.                                                                                         |
| `--after-course-id=<id>`     | Genoptag scanning efter dette kursus-ID. Sikkert at genbruge efter en afbrudt kørsel — et kursus regenererer aldrig et certifikat for en studerende, der allerede har et. |
| `--user-id=<id>`             | Begræns kørslen til én studerende, kontrolleret på tværs af alle berettigede kurser og sessioner — nyttigt til at validere adfærden før en platformsdækkende kørsel. |
| `--regenerate-empty`         | Behandl også studerende, hvis certifikatpost findes, men ikke har en gemt certifikatfil — for eksempel efter en generering, der mislykkedes undervejs — og generer det certifikat igen. Studerende med et komplet certifikat berøres aldrig. |

### Eksempler

Kør først en dry-run for hele platformen for at se, hvad der ville blive genereret:

```bash
php bin/console chamilo:gradebook:process-achievement-certificates --dry-run
```

Rigtig kørsel, der underretter studerende, med administrator med ID 1 som afsender:

```bash
php bin/console chamilo:gradebook:process-achievement-certificates \
  --send-notification --sender-id=1
```

Genoptag en afbrudt kørsel efter kursus 480:

```bash
php bin/console chamilo:gradebook:process-achievement-certificates \
  --send-notification --sender-id=1 --after-course-id=480
```

Generer igen de certifikater, hvis post findes, men hvis fil aldrig blev gemt (kør først en dry-run
for at liste dem):

```bash
php bin/console chamilo:gradebook:process-achievement-certificates \
  --regenerate-empty --dry-run
php bin/console chamilo:gradebook:process-achievement-certificates \
  --regenerate-empty --send-notification --sender-id=1
```

### Planlægning som et cron-job

```cron
# Every night at 2 AM
0 2 * * * php /path/to/chamilo/bin/console chamilo:gradebook:process-achievement-certificates --send-notification --sender-id=1 -e prod --no-interaction >> /path/to/chamilo/var/log/achievement-certificates.log 2>&1
```

## Behandling af ét kursus ad gangen

`chamilo:migration:process-achievement-certificates --course-id=<id>` tilbyder de samme dry-run-,
underretnings- og pagineringsindstillinger som den platformsdækkende kommando, begrænset til basiskurset alene
(ikke dets sessioner), med et eksplicit `--category-id` til at fjerne tvetydighed, når et kursus har mere end
én berettiget rod-kategori:

```bash
php bin/console chamilo:migration:process-achievement-certificates \
  --course-id=42 --category-id=7 --dry-run
```

Brug den til at teste et enkelt kursus før en platformsdækkende kørsel, eller til at behandle et kursus, som den platformsdækkende
kørsel rapporterede som sprunget over på grund af en tvetydig kategori.

## Afslutningskoder

Begge kommandoer afsluttes med en fejlstatus, hvis mindst én certifikatgenerering faktisk mislykkedes
under en rigtig kørsel (tjek `var/log/dev.log` — eller den tilsvarende produktionslog — for den underliggende
fejl). Kontekster, der springes over af strukturelle årsager (ingen regel, tvetydig kategori, manglende underretnings-
konfiguration), medfører ikke en fejl-afslutningskode; de rapporteres i stedet i oversigten.

## Relateret: kursister, der sidder fast under 100 % på et forudsætningslæringsforløb

Hvis et kursus' gennemførelsesregel kræver, at et læringsforløb når 100 %, forbliver en kursist, der har gennemført hvert
trin, men aldrig har åbnet forløbets afsluttende "Tillykke"-side, hængende lige under 100 % og bliver aldrig
berettiget her. Se
[Fuldførelse af fastlåste afsluttende elementer i læringsforløb](learning-path-final-items.md) — kør den først, hvis
studerende mangler certifikater, som du ville forvente, at de havde optjent.

## Erstattet: det ældre cron-script

`public/main/cron/add_gradebook_certificates.php` anbefales ikke længere. Det indlæser hvert
gradebook-resultat på platformen i hukommelsen i én ubegrænset forespørgsel og frigiver det aldrig
under løkken, så det kan opbruge hukommelsen på en instans med et ikke-trivielt antal kurser eller
øvelser, og det sender aldrig underretningen "du har optjent et certifikat". Brug
`chamilo:gradebook:process-achievement-certificates` i stedet.