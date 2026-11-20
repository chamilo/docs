# Prestationsintyg (batchgenerering)

Chamilo kan automatiskt generera ett kursprestationsintyg för varje student som har
slutfört kursen — i en baskurs och i varje session som återanvänder den — utan att en lärare
behöver öppna varje kurs individuellt. Två konsolkommandon täcker detta, ett för en enskild kurs
och ett för hela plattformen, och inget av dem är en databasintensiv åtgärd som du måste övervaka:
båda arbetar i avgränsade batchar, stöder en torrkörning och kan återupptas säkert om de avbryts.

## Plattformsomfattande kommando

```bash
php bin/console chamilo:gradebook:process-achievement-certificates [options]
```

För varje kurs som har en giltig rotkategori i betygsboken — på toppnivå, inte en underkategori,
med **Generate certificates** aktiverat — utvärderar kommandot varje inskriven student som inte
redan har ett intyg för den kategorin, och genererar ett för alla som har uppfyllt
slutförandekravet. En kurs kan bidra med **mer än ett** sammanhang: dess basinskrivning och,
separat, ett sammanhang per session som återanvänder den, eftersom en session kan ha sin egen rotkategori
och sitt eget godkäntgränsvärde.

En kurs, eller ett av dess sessionsammanhang, hoppas över — och behandlas inte som ett fel — när den inte
är giltig för automatiserad bearbetning: ingen slutföranderegel konfigurerad, mer än en giltig rotkategori
för det sammanhanget (tvetydigt, kräver ett manuellt val) eller saknat innehåll för intygsavisering.
Körningssammanfattningen i slutet rapporterar hur många sammanhang som föll i varje fall, så inget
hoppas över utan att synliggöras.

### Källa för slutförande

* `--completion-mode=course-rule` (standard): använder den slutföranderegel som är konfigurerad för kursen.
* `--completion-mode=gradebook`: använder det inbyggda betygsbokspoänget direkt för det sammanhanget i stället.
  Endast ett sammanhang med exakt en giltig rotkategori kvalificerar sig i detta läge — ett med flera
  hoppas över och rapporteras, för att bearbetas individuellt i stället (se nedan).

### Säkerhetsalternativ

| Alternativ                 | Syfte                                                                                                                                 |
| --------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------- |
| `--dry-run`                 | Utvärdera och rapportera utan att skapa intyg eller skicka aviseringar. Kör alltid detta först.                                      |
| `--send-notification`       | Krävs för en verklig körning (inte torrkörning). Skickar kursens konfigurerade interna meddelande och e-post efter att varje intyg har skapats. |
| `--sender-id=<id>`          | Aktiv plattformsadministratör som används som avsändare av aviseringen. Krävs tillsammans med `--send-notification`.                            |
| `--limit=<n>`                | Maximalt antal intyg som genereras (eller, vid torrkörning, rapporteras) i en körning. `0` = obegränsat. Standard `100`.                                    |
| `--scan-limit=<n>`           | Maximalt antal studenter som utvärderas i en körning, över alla kurser och sessioner. `0` = obegränsat. Standard `1000`.                                 |
| `--batch-size=<n>`           | Studenter som läses in per databasbatch inom ett kurs-/sessionsammanhang. Standard `25`.                                                     |
| `--course-batch-size=<n>`    | Kurser som läses in per databasbatch. Standard `50`.                                                                                         |
| `--after-course-id=<id>`     | Återuppta skanningen efter detta kurs-ID. Säkert att återanvända efter en avbruten körning — en kurs genererar aldrig om ett intyg för en student som redan har ett. |
| `--user-id=<id>`             | Begränsa körningen till en student, kontrollerad över varje giltig kurs och session — användbart för att validera beteendet före en plattformsomfattande körning. |
| `--regenerate-empty`         | Bearbeta även studenter vars intygspost finns men saknar lagrad intygsfil — till exempel efter en generering som misslyckades halvvägs — och generera det intyget igen. Studenter med ett fullständigt intyg berörs aldrig. |

### Exempel

Kör först en torrkörning av hela plattformen för att se vad som skulle genereras:

```bash
php bin/console chamilo:gradebook:process-achievement-certificates --dry-run
```

Verklig körning som meddelar studenter, med administratören med ID 1 som avsändare:

```bash
php bin/console chamilo:gradebook:process-achievement-certificates \
  --send-notification --sender-id=1
```

Återuppta en avbruten körning efter kurs 480:

```bash
php bin/console chamilo:gradebook:process-achievement-certificates \
  --send-notification --sender-id=1 --after-course-id=480
```

Generera på nytt de certifikat vars post finns men vars fil aldrig lagrades (kör först en torrkörning
för att lista dem):

```bash
php bin/console chamilo:gradebook:process-achievement-certificates \
  --regenerate-empty --dry-run
php bin/console chamilo:gradebook:process-achievement-certificates \
  --regenerate-empty --send-notification --sender-id=1
```

### Schemaläggning som ett cron-jobb

```cron
# Every night at 2 AM
0 2 * * * php /path/to/chamilo/bin/console chamilo:gradebook:process-achievement-certificates --send-notification --sender-id=1 -e prod --no-interaction >> /path/to/chamilo/var/log/achievement-certificates.log 2>&1
```

## Bearbeta en kurs individuellt

`chamilo:migration:process-achievement-certificates --course-id=<id>` erbjuder samma alternativ för torrkörning,
meddelanden och paginering som det plattformsomfattande kommandot, begränsat till enbart baskursen
(inte dess sessioner), med ett explicit `--category-id` för att särskilja när en kurs har mer än
en giltig rotkategori:

```bash
php bin/console chamilo:migration:process-achievement-certificates \
  --course-id=42 --category-id=7 --dry-run
```

Använd det för att testa en enskild kurs före en plattformsomfattande körning, eller för att bearbeta en kurs som den plattformsomfattande
körningen rapporterade som överhoppad på grund av en tvetydig kategori.

## Avslutningskoder

Båda kommandona avslutas med en felstatus om minst en certifikatgenerering faktiskt misslyckades
under en verklig körning (kontrollera `var/log/dev.log` — eller motsvarande produktionslogg — för det underliggande
felet). Kontexter som hoppas över av strukturella skäl (ingen regel, tvetydig kategori, saknad konfiguration
för meddelanden) orsakar inte en felavslutningskod; de rapporteras i stället i sammanfattningen.

## Relaterat: deltagare som fastnat under 100 % på en förkunskapskrävande lärstig

Om en kurs slutföranderegel kräver att en lärstig når 100 % förblir en deltagare som slutfört varje
steg men aldrig öppnat stigens sista sida ”Grattis” fast strax under 100 % och blir aldrig
berättigad här. Se
[Slutföra fastnade slutobjekt i lärstigar](learning-path-final-items.md) — kör det först om
studenter saknar certifikat som du förväntar dig att de ska ha förtjänat.

## Ersatt: det äldre cron-skriptet

`public/main/cron/add_gradebook_certificates.php` rekommenderas inte längre. Det läser in varje
betygsboksresultat på plattformen i minnet i en enda obegränsad fråga och frigör det aldrig
under loopen, så det kan tömma minnet på en instans med ett icke-trivialt antal kurser eller
övningar, och det skickar aldrig meddelandet ”du har förtjänat ett certifikat”. Använd
`chamilo:gradebook:process-achievement-certificates` i stället.