# Filintegritet

*Nytt i Chamilo 3.0.*

Filintegritet sammenligner filene som er installert på serveren din med en betrodd grunnlínje, for å oppdage tillegg, endringer, slettinger og tillatelsesendringer du ikke forventet — den typen endring en vellykket inntrenging, en kompromittert avhengighet eller en feilaktig manuell redigering ville etterlate.

## Tilgang til filintegritet

Fra administrasjonspanelet klikker du **Sikkerhet > Filintegritet**.

## Hva den viser

![Siden Filintegritet som viser informasjon om siste skanning, paneler for filer som er lagt til, endret, slettet og med endrede tillatelser, en liste over varselhistorikk, og handlinger for å kjøre en skanning, pause varsler eller etablere en ny grunnlínje](../../.gitbook/assets/admin-security-file-integrity.png)

* **Siste skanning** — Når den nyeste skanningen kjørte og hvor mange filer den sjekket
* **Lagt til / Endret / Slettet** — Filer som avviker fra grunnlínjen, identifisert ved å sammenligne SHA-256-sjekksummer (hver liste er begrenset til 500 stier, med et notat hvis den fullstendige listen er lengre — se CEF-loggen nedenfor for den komplette listen)
* **Tillatelser endret** — Filer hvis tillatelser avviker fra grunnlínjen. På Linux sammenlignes POSIX-modusbitene direkte (for eksempel flagges en fil som blir skrivbar for alle); på Windows spores bare skrivebeskyttet-attributtet, siden `fileperms()` ikke gjenspeiler reelle NTFS-ACL-er
* **Varselhistorikk** — En varig, kun-tilføyende logg over hver skanning som fant noe (opptil de siste 50). I motsetning til rapporten ovenfor tømmes aldri denne listen av en ren skanning eller en ny grunnlínje, så tidligere varsler forblir synlige selv etter at avviket de flagget er løst

Sjekken går gjennom hele det installerte filtreet unntatt katalogene `var/` og `.git/` — med ett unntak: `.git/config` overvåkes likevel individuelt, spesielt for å fange at en Git-remote stille pekes om til en fiendtlig server. Symbolske lenker følges aldri, for å unngå traverseringssløyfer eller å forlate installasjonskatalogen.

Fordi en full skanning av en stor installasjon kan ta flere minutter, er gjennomgangen oppdelt i biter (én toppnivåkatalog om gangen) og fremdriften spores i en låsefil — slik at siden trygt kan lastes på nytt for å sjekke fremdrift, og en krasjet eller drept skanning aldri forveksles med en som fortsatt kjører.

## Handlinger

* **Kjør en skanning nå** — Sammenligner det gjeldende filtreet med grunnlínjen umiddelbart
* **Pause i 1 time** — Suspenderer varsling midlertidig (for eksempel mens du ruller ut en oppdatering). Krever at du skriver inn ditt eget passord på nytt. Mens pausen er aktiv, tar en skanning stille i bruk det gjeldende treet som ny grunnlínje i stedet for å varsle, slik at pausevinduet lukkes uten etterlatte varsler. Maksimal pause er 24 timer
* **Etabler ny grunnlínje** — Tar i bruk det gjeldende filtreet som den nye betrodde referansen. Krever at du skriver inn ditt eget passord på nytt

Å pause varsler eller etablere en ny grunnlínje kan skjule en pågående inntrenging, og det er derfor begge krever passordet ditt på nytt — en kapret administratorøkt alene er ikke nok til å dempe deteksjonen mens filer tukles med.

## Kjøring fra cron

De samme sjekkene er tilgjengelige som konsollkommandoer, ment å planlegges med cron i stedet for å kjøres fra adminsiden etter en tidsplan:

```bash
# Scan for drift and alert admins if anything changed
0 3 * * * cd /var/www/chamilo/master && php bin/console app:file-integrity:scan

# Generate or regenerate the baseline (run once after install, or after a manual update)
php bin/console app:file-integrity:baseline

# Pause alerting from the command line (prompts for a global administrator's username and password)
php bin/console app:file-integrity:snooze
```

Hvis en pause er aktiv, re-baseliner `app:file-integrity:scan` stille i stedet for å varsle, i tråd med oppførselen til en skanning utløst fra adminsiden.

## Innstillinger

Én relatert innstilling finnes i **Konfigurasjonsinnstillinger > Sikkerhet**:

* **`file_integrity_check_notify_admins`** — En liste over e-postadresser som skal varsles når avvik oppdages; hvis den står tom, varsles hver global administrator

## SIEM-integrasjon

Hver skanning skriver også CEF-logglinjer (Common Event Format) til `var/logs/security/file_integrity.log`, egnet for inntak av en SIEM (Wazuh, Splunk, QRadar, ArcSight, Elastic/Filebeat og lignende verktøy). Hver linje merkes med en signatur-ID som identifiserer typen endring:

| Signatur | Betydning |
|-----------|---------|
| `FIM-ADDED` | En ny fil dukket opp |
| `FIM-MODIFIED` | Innholdet i en fil ble endret |
| `FIM-DELETED` | En fil forsvant |
| `FIM-GITCONFIG` | `.git/config` ble endret (mulig kapret remote) |
| `FIM-PERMS` | Tillatelsene til en fil ble endret |
| `FIM-TRUNCATED` | Rapporten for en kategori ble begrenset; se loggen for den fullstendige listen |

## Anbefalt bruk

1. Etabler en baseline umiddelbart etter installasjon, og på nytt etter hver manuell oppdatering eller utrulling
2. Planlegg `app:file-integrity:scan` i cron (for eksempel nattlig)
3. Før et planlagt vedlikeholdsvindu som vil endre filer (en oppdatering, en migrering), bruk **Pause for 1 hour** i stedet for å fjerne cron-jobben helt
4. Send `var/logs/security/file_integrity.log` inn i eksisterende loggovervåking eller SIEM dersom du har det