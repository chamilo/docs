# Prestasjonssertifikater (batchgenerering)

Chamilo kan automatisk generere et kurs sitt prestasjonssertifikat for hver student som har
fullført det — i et basiskurs og i enhver økt som gjenbruker det — uten at en lærer
må åpne hvert kurs individuelt. To konsollkommandoer dekker dette, én for et enkelt kurs
og én for hele plattformen, og ingen av dem er en databasekrevende operasjon du må passe på:
begge arbeider i avgrensede batcher, støtter en tørrkjøring, og kan gjenopptas trygt hvis de avbrytes.

## Plattformomfattende kommando

```bash
php bin/console chamilo:gradebook:process-achievement-certificates [options]
```

For hvert kurs som har en kvalifisert rotkategori i karakterboken — på toppnivå, ikke en underkategori,
med **Generer sertifikater** aktivert — vurderer kommandoen hver påmeldte student som ikke
allerede har et sertifikat for den kategorien, og genererer ett for alle som har oppfylt
fullføringskravet. Et kurs kan bidra med **mer enn én** kontekst: sin basispåmelding, og
separat, én kontekst per økt som gjenbruker det, siden en økt kan ha sin egen rotkategori
og sin egen beståttgrense.

Et kurs, eller én av dets øktkontekster, hoppes over — behandles ikke som en feil — når det ikke
er kvalifisert for automatisert behandling: ingen fullføringsregel konfigurert, mer enn én kvalifisert rotkategori for den konteksten (tvetydig, krever et manuelt valg), eller manglende innhold for sertifikatvarsling. Kjøringssammendraget til slutt rapporterer hvor mange kontekster som falt inn under hvert tilfelle, slik at ingenting
hoppes over uten å bli synliggjort.

### Fullføringskilde

* `--completion-mode=course-rule` (standard): bruker fullføringsregelen som er konfigurert for kurset.
* `--completion-mode=gradebook`: bruker den opprinnelige karakterbokpoengsummen direkte for den konteksten i stedet.
  Bare en kontekst med nøyaktig én kvalifisert rotkategori kvalifiserer i denne modusen — én med flere
  hoppes over og rapporteres, for å behandles individuelt i stedet (se nedenfor).

### Sikkerhetsalternativer

| Alternativ                     | Formål                                                                                                                                 |
| --------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------- |
| `--dry-run`                 | Vurder og rapporter uten å opprette sertifikater eller sende varsler. Kjør alltid dette først.                                      |
| `--send-notification`       | Påkrevd for en reell (ikke-tørrkjøring) utførelse. Sender kursets konfigurerte interne melding og e-post etter at hvert sertifikat er opprettet. |
| `--sender-id=<id>`          | Aktiv plattformadministrator som brukes som avsender av varselet. Påkrevd sammen med `--send-notification`.                            |
| `--limit=<n>`                | Maksimalt antall sertifikater som genereres (eller, ved tørrkjøring, rapporteres) i én kjøring. `0` = ubegrenset. Standard `100`.                                    |
| `--scan-limit=<n>`           | Maksimalt antall studenter som vurderes i én kjøring, på tvers av hvert kurs og hver økt. `0` = ubegrenset. Standard `1000`.                                 |
| `--batch-size=<n>`           | Studenter som lastes per databasebatch innenfor én kurs-/øktkontekst. Standard `25`.                                                     |
| `--course-batch-size=<n>`    | Kurs som lastes per databasebatch. Standard `50`.                                                                                         |
| `--after-course-id=<id>`     | Gjenoppta skanning etter denne kurs-ID-en. Trygt å gjenbruke etter en avbrutt kjøring — et kurs regenererer aldri et sertifikat for en student som allerede har ett. |
| `--user-id=<id>`             | Begrens kjøringen til én student, kontrollert på tvers av hvert kvalifisert kurs og hver kvalifisert økt — nyttig for å validere atferden før en plattformomfattende kjøring. |
| `--regenerate-empty`         | Behandle også studenter hvis sertifikatoppføring finnes, men som ikke har noen lagret sertifikatfil — for eksempel etter en generering som mislyktes underveis — og generer det sertifikatet på nytt. Studenter med et fullstendig sertifikat berøres aldri. |

### Eksempler

Tørrkjør hele plattformen først, for å se hva som ville blitt generert:

```bash
php bin/console chamilo:gradebook:process-achievement-certificates --dry-run
```

Reell kjøring, med varsling av studenter, administrator med ID 1 som avsender:

```bash
php bin/console chamilo:gradebook:process-achievement-certificates \
  --send-notification --sender-id=1
```

Gjenoppta en avbrutt kjøring etter kurs 480:

```bash
php bin/console chamilo:gradebook:process-achievement-certificates \
  --send-notification --sender-id=1 --after-course-id=480
```

Generer på nytt sertifikatene der posten finnes, men filen aldri ble lagret (tørrkjør først
for å liste dem):

```bash
php bin/console chamilo:gradebook:process-achievement-certificates \
  --regenerate-empty --dry-run
php bin/console chamilo:gradebook:process-achievement-certificates \
  --regenerate-empty --send-notification --sender-id=1
```

### Planlegging som en cron-jobb

```cron
# Every night at 2 AM
0 2 * * * php /path/to/chamilo/bin/console chamilo:gradebook:process-achievement-certificates --send-notification --sender-id=1 -e prod --no-interaction >> /path/to/chamilo/var/log/achievement-certificates.log 2>&1
```

## Behandling av ett kurs individuelt

`chamilo:migration:process-achievement-certificates --course-id=<id>` tilbyr de samme alternativene for tørrkjøring,
varsling og paginering som den plattformomfattende kommandoen, begrenset til bare basiskurset
(ikke øktene), med en eksplisitt `--category-id` for å fjerne tvetydighet når et kurs har mer enn
én kvalifisert rotkategori:

```bash
php bin/console chamilo:migration:process-achievement-certificates \
  --course-id=42 --category-id=7 --dry-run
```

Bruk den til å teste ett enkelt kurs før en plattformomfattende kjøring, eller til å behandle et kurs som den plattformomfattende
kjøringen rapporterte som hoppet over på grunn av en tvetydig kategori.

## Avslutningskoder

Begge kommandoene avsluttes med en feilstatus hvis minst én sertifikatgenerering faktisk mislyktes
under en reell kjøring (sjekk `var/log/dev.log` — eller den tilsvarende produksjonsloggen — for den underliggende
feilen). Kontekster som hoppes over av strukturelle årsaker (ingen regel, tvetydig kategori, manglende varslings-
konfigurasjon) fører ikke til en feilavslutningskode; de rapporteres i sammendraget i stedet.

## Relatert: deltakere som står fast under 100 % på en forutsetningslæringssti

Hvis et kurs sin fullføringsregel krever at en læringssti når 100 %, forblir en deltaker som fullførte hvert
trinn, men aldri åpnet stiens siste «Gratulerer»-side, stående like under 100 % og blir aldri
kvalifisert her. Se
[Fullføre fastlåste siste elementer i læringssti](learning-path-final-items.md) — kjør den først hvis
studenter mangler sertifikater du ville forventet at de hadde opptjent.

## Erstattet: det eldre cron-skriptet

`public/main/cron/add_gradebook_certificates.php` anbefales ikke lenger. Det laster hvert
karakterbokresultat på plattformen inn i minnet i én ubegrenset spørring og frigir det aldri
under løkken, slik at det kan tømme minnet på en instans med et ikke-trivielt antall kurs eller
øvelser, og det sender aldri varselet «du har opptjent et sertifikat». Bruk
`chamilo:gradebook:process-achievement-certificates` i stedet.