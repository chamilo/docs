# Filintegritet

*Nyt i Chamilo 3.0.*

Filintegritet sammenligner de filer, der er installeret på din server, med en betroet baseline for at opdage tilføjelser, ændringer, sletninger og tilladelsesændringer, du ikke forventede — den slags ændringer, som en vellykket indtrængen, en kompromitteret afhængighed eller en fejlagtig manuel redigering ville efterlade.

## Adgang til filintegritet

Fra administrationspanelet skal du klikke på **Sikkerhed > Filintegritet**.

## Hvad den viser

![Siden Filintegritet, der viser oplysninger om seneste scanning, paneler for Tilføjede, Ændrede, Slettede og Tilladelser ændret-filer, en liste over Alerthistorik og Handlinger til at køre en scanning, pause alarmer eller etablere en ny baseline](/.gitbook/assets/admin-security-file-integrity.png)

* **Seneste scanning** — Hvornår den seneste scanning kørte, og hvor mange filer den tjekkede
* **Tilføjet / Ændret / Slettet** — Filer, der afviger fra baseline, identificeret ved sammenligning af SHA-256-kontrolsummer (hver liste er begrænset til 500 stier, med en note hvis den fulde liste er længere — se CEF-loggen nedenfor for den komplette liste)
* **Tilladelser ændret** — Filer, hvis tilladelser afviger fra baseline. På Linux sammenlignes POSIX-tilstandsbits direkte (for eksempel markeres en fil, der bliver skrivbar for alle); på Windows spores kun skrivebeskyttet-attributten, da `fileperms()` ikke afspejler reelle NTFS-ACL'er
* **Alerthistorik** — En varig, kun-tilføj-log over hver scanning, der fandt noget (op til de sidste 50). I modsætning til rapporten ovenfor ryddes denne liste aldrig af en ren scanning eller en ny baseline, så tidligere alarmer forbliver synlige, selv efter at den afvigelse, de markerede, er blevet løst

Tjekket gennemgår hele det installerede filtræ undtagen mapperne `var/` og `.git/` — med én undtagelse: `.git/config` overvåges stadig individuelt, specifikt for at opdage, at en Git-remote stille bliver omdirigeret til en fjendtlig server. Symbolske links følges aldrig, for at undgå traversalsløjfer eller at forlade installationsmappen.

Fordi en fuld scanning af en stor installation kan tage flere minutter, er gennemgangen opdelt i bidder (én mappe på øverste niveau ad gangen), og dens fremdrift spores i en lock-fil — så siden sikkert kan genindlæses for at tjekke fremdrift, og en crashet eller dræbt scanning aldrig forveksles med en, der stadig kører.

## Handlinger

* **Kør en scanning nu** — Sammenligner det aktuelle filtræ med baseline med det samme
* **Pause i 1 time** — Suspenderer midlertidigt alarmering (for eksempel mens du udruller en opdatering). Kræver, at du indtaster din egen adgangskode igen. Mens der er pause, antager en scanning stille det aktuelle træ som den nye baseline i stedet for at alarmere, så pausevinduet lukker uden efterladte alarmer. Maksimal pause er 24 timer
* **Etabler ny baseline** — Antager det aktuelle filtræ som den nye betroede reference. Kræver, at du indtaster din egen adgangskode igen

At pause alarmer eller etablere en ny baseline kan skjule en igangværende indtrængen, hvilket er grunden til, at begge kræver din adgangskode igen — en kapret administratorsession alene er ikke nok til at slukke detektion, mens filer bliver manipuleret.

## Kørsel fra Cron

De samme tjek er tilgængelige som konsolkommandoer, beregnet til at blive planlagt med cron frem for at køre fra administratorsiden efter en tidsplan:

```bash
# Scan for drift and alert admins if anything changed
0 3 * * * cd /var/www/chamilo/master && php bin/console app:file-integrity:scan

# Generate or regenerate the baseline (run once after install, or after a manual update)
php bin/console app:file-integrity:baseline

# Pause alerting from the command line (prompts for a global administrator's username and password)
php bin/console app:file-integrity:snooze
```

Hvis en pause er aktiv, re-baseliner `app:file-integrity:scan` stille i stedet for at alarmere, hvilket matcher adfærden for en scanning udløst fra administratorsiden.

## Indstillinger

Én relateret indstilling findes under **Konfigurationsindstillinger > Sikkerhed**:

* **`file_integrity_check_notify_admins`** — En liste over e-mailadresser, der skal underrettes, når der findes afvigelse; hvis den efterlades tom, underrettes hver global administrator

## SIEM-integration

Hver scanning skriver også CEF-loglinjer (Common Event Format) til `var/logs/security/file_integrity.log`, egnet til indlæsning af et SIEM (Wazuh, Splunk, QRadar, ArcSight, Elastic/Filebeat og lignende værktøjer). Hver linje er mærket med et signatur-ID, der identificerer typen af ændring:

| Signatur | Betydning |
|-----------|---------|
| `FIM-ADDED` | En ny fil dukkede op |
| `FIM-MODIFIED` | En fils indhold blev ændret |
| `FIM-DELETED` | En fil forsvandt |
| `FIM-GITCONFIG` | `.git/config` blev ændret (mulig kapret remote) |
| `FIM-PERMS` | En fils tilladelser blev ændret |
| `FIM-TRUNCATED` | Rapporten for en kategori blev begrænset; se loggen for den fulde liste |

## Anbefalet brug

1. Etabler en baseline umiddelbart efter installation, og igen efter hver manuel opdatering eller udrulning
2. Planlæg `app:file-integrity:scan` i cron (for eksempel natligt)
3. Før et planlagt vedligeholdelsesvindue, der vil ændre filer (en opdatering, en migrering), skal du bruge **Pause i 1 time** i stedet for at fjerne cron-jobbet helt
4. Indlæs `var/logs/security/file_integrity.log` i din eksisterende logovervågning eller SIEM, hvis du har en