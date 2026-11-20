# Slutföra fastnade sista steg i lärandestigar

En lärandestigs sista steg — sidan ”Grattis” som innehåller certifikat- och kompetensblocken — räknas som slutfört först när en deltagare faktiskt öppnar det. En deltagare som slutför alla övriga steg men aldrig klickar vidare till den sista sidan förblir fast strax under 100 % för alltid, och eftersom behörighet till prestationscertifikat (och tilldelning av kompetenser) förutsätter att lärandestigen når 100 % får de aldrig ett certifikat eller en kompetens som de i övrigt har förtjänat.

```bash
php bin/console chamilo:learning-path:complete-final-items [options]
```

För varje lärandestig på plattformen vars sista steg är av typen **Final item** kontrollerar kommandot varje deltagare med ett pågående försök (under 100 %) som har slutfört alla övriga steg — i varje kurs och varje session som återanvänder lärandestigen. Om så är fallet slutför det det sista steget åt dem precis som om de själva hade öppnat det: det registrerar samma objektvisning, kör samma omräkning av framsteg och utlöser samma certifikatgenerering och kompetenstilldelning som ett verkligt besök skulle göra.

Liksom `chamilo:gradebook:process-achievement-certificates` (se
[Prestationscertifikat](achievement-certificates.md)) arbetar det i avgränsade batchar, stöder en
torrkörning och kan återupptas på ett säkert sätt om det avbryts — en deltagare vars sista steg redan är slutfört
berörs aldrig igen vid en senare körning.

## Alternativ

| Option                 | Purpose                                                                                                            |
| ----------------------- | -------------------------------------------------------------------------------------------------------------------- |
| `--dry-run`             | Utvärdera och rapportera utan att slutföra något. Kör alltid detta först.                                           |
| `--sender-id=<id>`      | ID för en aktiv plattformsadministratör, som används som resursens skapare när slutförande av ett sista steg utlöser certifikatgenerering eller kompetenstilldelning. Krävs för en verklig körning (inte torrkörning). |
| `--limit=<n>`           | Maximalt antal sista steg som slutförs (eller, vid torrkörning, rapporteras) i en körning. `0` = obegränsat. Standardvärde `500`.              |
| `--scan-limit=<n>`      | Maximalt antal framstegsposter för deltagare som skannas i en körning, över alla lärandestigar. `0` = obegränsat. Standardvärde `5000`. |
| `--batch-size=<n>`      | Antal framstegsposter för deltagare som läses in per databasbatch, inom en lärandestig. Standardvärde `50`.                       |
| `--lp-batch-size=<n>`   | Antal lärandestigar som läses in per databasbatch. Standardvärde `50`.                                                            |
| `--after-lp-id=<id>`    | Återuppta skanningen efter detta ID för lärandestigen.                                                                       |

## Exempel

Kör först en torrkörning för hela plattformen för att se vilka som skulle slutföras:

```bash
php bin/console chamilo:learning-path:complete-final-items --dry-run
```

Verklig körning, med administratör med ID 1 som resursens skapare:

```bash
php bin/console chamilo:learning-path:complete-final-items --sender-id=1
```

Återuppta en avbruten körning efter lärandestig 480:

```bash
php bin/console chamilo:learning-path:complete-final-items --sender-id=1 --after-lp-id=480
```

## Avslutningskoder

Kommandot avslutas med en felstatus om minst ett sista steg faktiskt misslyckades med att slutföras
under en verklig körning — sammanfattningstabellen anger lärandestigen och deltagaren samt orsaken;
applikationsloggen innehåller hela undantaget. En deltagare som korrekt uteslutits (sista steget redan slutfört, eller
ett annat steg fortfarande ofullständigt) är inte ett fel och orsakar aldrig en avslutningskod för fel.

## Betygsbokens poäng efter slutförande

Poängen som visas för en lärandestig i tabellen Betygsbok lagras aldrig — den beräknas live
utifrån deltagarens aktuella framsteg varje gång sidan läses in, så den återspeglar 100 % omedelbart,
utan något extra steg.

En deltagares **certifikat**, om ett redan fanns innan de nådde 100 % (med en äldre, lägre
poäng inbakad i det), får sin lagrade poäng och renderade HTML uppdaterad endast om själva
certifikatregenereringen lyckas när detta kommando slutför deras sista steg — samma anrop som ett faktiskt
besök skulle utlösa. Om certifikatgenereringen misslyckas av någon anledning (se
[Prestationscertifikat](achievement-certificates.md) för vanliga orsaker, t.ex. behörigheter för
fillagring) når deltagarens framsteg fortfarande korrekt 100 % och tabellen Betygsbok visar
fortfarande det — endast deras certifikat fortsätter att visa den gamla poängen, och eftersom kommandot aldrig
återbesöker en deltagare som redan ligger på 100 % försöker det inte igen vid en senare körning. Regenerera det certifikatet
manuellt (åtgärden **Generate** i listan Certifikat) när det underliggande problemet är åtgärdat.

`--sender-id` finns specifikt för att undvika en vanlig orsak till det felet: att slutföra ett sista
steg utanför en verklig begäran innebär att det inte finns någon inloggad användare som certifikatresursen kan registrera som sin
skapare, och genereringen misslyckas helt utan en sådan.