# Filintegritet

*Nytt i Chamilo 3.0.*

Filintegritet jämför filerna som är installerade på din server mot en betrodd baslinje, för att upptäcka tillägg, ändringar, borttagningar och behörighetsändringar som du inte förväntade dig — den typ av förändring som ett lyckat intrång, ett komprometterat beroende eller en felaktig manuell redigering skulle lämna efter sig.

## Åtkomst till filintegritet

Från administrationspanelen klickar du på **Säkerhet > Filintegritet**.

## Vad den visar

![Sidan Filintegritet som visar information om senaste genomsökning, paneler för tillagda, ändrade, borttagna filer och filer med ändrade behörigheter, en lista över larmhistorik samt åtgärder för att köra en genomsökning, pausa larm eller etablera en ny baslinje](/.gitbook/assets/admin-security-file-integrity.png)

* **Senaste genomsökning** — När den senaste genomsökningen kördes och hur många filer den kontrollerade
* **Tillagda / Ändrade / Borttagna** — Filer som skiljer sig från baslinjen, identifierade genom jämförelse av SHA-256-kontrollsummor (varje lista är begränsad till 500 sökvägar, med en notering om den fullständiga listan är längre — se CEF-loggen nedan för den kompletta listan)
* **Behörigheter ändrade** — Filer vars behörigheter skiljer sig från baslinjen. På Linux jämförs POSIX-lägesbitar direkt (till exempel flaggas en fil som blir skrivbar för alla); på Windows spåras endast attributet skrivskyddat, eftersom `fileperms()` inte återspeglar verkliga NTFS-ACL:er
* **Larmhistorik** — En varaktig, endast tilläggande logg över varje genomsökning som hittade något (upp till de senaste 50). Till skillnad från rapporten ovan rensas den här listan aldrig av en ren genomsökning eller en ny baslinje, så tidigare larm förblir synliga även efter att avvikelsen de flaggade har åtgärdats

Kontrollen går igenom hela det installerade filträdet utom katalogerna `var/` och `.git/` — med ett undantag: `.git/config` övervakas fortfarande individuellt, specifikt för att fånga att en Git-fjärr tyst pekas om till en fientlig server. Symboliska länkar följs aldrig, för att undvika traverseringsslingor eller att lämna installationskatalogen.

Eftersom en fullständig genomsökning av en stor installation kan ta flera minuter delas genomgången upp i delar (en katalog på översta nivån i taget) och dess förlopp spåras i en låsfil — så att sidan säkert kan läsas om för att kontrollera förloppet, och en kraschad eller avbruten genomsökning aldrig misstas för en som fortfarande körs.

## Åtgärder

* **Kör en genomsökning nu** — Jämför det aktuella filträdet med baslinjen omedelbart
* **Pausa i 1 timme** — Avbryter tillfälligt larm (till exempel medan du driftsätter en uppdatering). Kräver att du anger ditt eget lösenord igen. Medan pausen är aktiv antar en genomsökning tyst det aktuella trädet som ny baslinje i stället för att larma, så att pausfönstret stängs utan kvarvarande larm. Maximal paus är 24 timmar
* **Etablera ny baslinje** — Antar det aktuella filträdet som den nya betrodda referensen. Kräver att du anger ditt eget lösenord igen

Att pausa larm eller etablera en ny baslinje kan dölja ett pågående intrång, vilket är anledningen till att båda kräver ditt lösenord igen — en kapad administratörssession räcker inte ensam för att tysta detekteringen medan filer manipuleras.

## Körning från Cron

Samma kontroller finns som konsolkommandon, avsedda att schemaläggas med cron i stället för att köras från adminsidan enligt ett schema:

```bash
# Scan for drift and alert admins if anything changed
0 3 * * * cd /var/www/chamilo/master && php bin/console app:file-integrity:scan

# Generate or regenerate the baseline (run once after install, or after a manual update)
php bin/console app:file-integrity:baseline

# Pause alerting from the command line (prompts for a global administrator's username and password)
php bin/console app:file-integrity:snooze
```

Om en paus är aktiv gör `app:file-integrity:scan` en tyst ombaslinje i stället för att larma, vilket matchar beteendet för en genomsökning som utlöses från adminsidan.

## Inställningar

En relaterad inställning finns i **Konfigurationsinställningar > Säkerhet**:

* **`file_integrity_check_notify_admins`** — En lista med e-postadresser som ska meddelas när avvikelse hittas; om den lämnas tom meddelas varje global administratör

## SIEM-integration

Varje genomsökning skriver också CEF-loggrader (Common Event Format) till `var/logs/security/file_integrity.log`, lämpliga för inläsning av en SIEM (Wazuh, Splunk, QRadar, ArcSight, Elastic/Filebeat och liknande verktyg). Varje rad är märkt med ett signatur-ID som identifierar typen av förändring:

| Signatur | Betydelse |
|-----------|---------|
| `FIM-ADDED` | En ny fil dök upp |
| `FIM-MODIFIED` | En fils innehåll ändrades |
| `FIM-DELETED` | En fil försvann |
| `FIM-GITCONFIG` | `.git/config` ändrades (möjlig kapad fjärr) |
| `FIM-PERMS` | En fils behörigheter ändrades |
| `FIM-TRUNCATED` | Rapporten för en kategori begränsades; se loggen för den fullständiga listan |

## Rekommenderad användning

1. Etablera en baslinje direkt efter installationen, och återigen efter varje manuell uppdatering eller driftsättning
2. Schemalägg `app:file-integrity:scan` i cron (till exempel nattetid)
3. Inför ett planerat underhållsfönster som kommer att ändra filer (en uppdatering, en migrering), använd **Pausa i 1 timme** i stället för att ta bort cron-jobbet helt
4. Mata in `var/logs/security/file_integrity.log` i din befintliga loggövervakning eller SIEM om du har en sådan