# Kursusimport og -eksport

Chamilo understøtter import og eksport af kurser til sikkerhedskopiering, migrering og deling af indhold.

Disse funktioner findes inde i kurset, i værktøjet **Vedligeholdelse**, som ligger under tandhjulsikonet øverst på kursets startside.

## Eksport af et kursus

Undervisere kan eksportere deres egne kurser fra kursets vedligeholdelsesværktøj. Som administrator kan du eksportere ethvert kursus:

1. Gå ind i kurset
2. Åbn værktøjet **Kursusvedligeholdelse**
3. Vælg **Opret en sikkerhedskopi**
4. Vælg, hvad der skal medtages (indhold, brugerdata osv.)
5. Download eksportfilen

Eksporten opretter en pakke, der indeholder kursets dokumenter, øvelser, fora, læringsstier og konfiguration.

## Import af et kursus

Sådan importerer du et kursus fra en Chamilo-eksportfil:

1. Gå ind i kurset
2. Åbn værktøjet **Kursusvedligeholdelse**
3. Upload eksportfilen i afsnittet **Importér sikkerhedskopi**
4. Vælg, hvad der skal medtages (indhold, brugerdata osv.)
5. Konfigurer importindstillinger:
   * Om eksisterende indhold skal overskrives
   * Om brugerdata skal medtages
6. Kør importen

## Kopiering af et kursus

For at kopiere indholdet fra et andet kursus ind i dit kursus skal du først have oprettet et kildekursus og et destinationskursus.

1. Gå ind i destinationskurset
2. Åbn værktøjet **Kursusvedligeholdelse**
3. Vælg **Kilde**-kurset i afsnittet **Kopiér kursus**
4. Bekræft indstillingerne
5. Klik på **Fortsæt**, og følg instruktionerne

## Common Cartridge

Chamilo understøtter standarden **IMS Common Cartridge 1.3** (IMS CC 1.3) med henblik på interoperabilitet med andre læringsplatforme. Du kan:

* **Importere** Common Cartridge-pakker (.imscc-filer)
* **Eksportere** kursusindhold i Common Cartridge-format

Dette muliggør udveksling af indhold med andre platforme, der understøtter Common Cartridge-standarden (Moodle, Canvas, Blackboard osv.).

## Genbrug af et kursus

Funktionen til genbrug af kurser gør det muligt at beholde kursets skal, men slette dets indhold.

## Sletning af et kursus

Dette sletter dit kursus fuldstændigt, inklusive alt indhold og brugeraktivitet i det.

Sådan sletter du et kursus permanent:

1. Gå ind i destinationskurset
2. Åbn værktøjet **Kursusvedligeholdelse**
3. Indtast kursets kode manuelt i afsnittet **Slet dette kursus fuldstændigt** for at bekræfte din hensigt
4. Bekræft

Du bliver derefter omdirigeret til portalens startside, fordi kurset ikke længere eksisterer.

## Moodle-import

Chamilo kan importere kursussikkerhedskopier fra **Moodle**. Importværktøjet konverterer Moodles indholdsstruktur til Chamilos format, herunder quizzer, dokumenter og kursusindstillinger.

> **Under udvikling.** Selvom det allerede dækker et bredt grundlag, dækker Moodle-importen i øjeblikket ikke alle Moodle-aktivitetstyper og indholdsformater. Betragt det som et udgangspunkt, der stadig kan kræve manuel justering, når importen er færdig. Hvis du opdager et element, der fejler eller mangler ved import eller eksport, bedes du indberette det til os via vores [Github-område](https://github.com/chamilo/chamilo-lms/issues) ved at klikke på **New issue** øverst og give så mange detaljer som muligt (inklusive selve kursussikkerhedskopien, hvis den ikke er fortrolig).

## Tips

* **Regelmæssige sikkerhedskopier** — Opfordr undervisere til periodisk at eksportere deres kurser som sikkerhedskopi
* **Testimport** — Når du importerer indhold fra en anden platform, så test importen i et prøvekursus først for at kontrollere, at alt er overført korrekt
* **Indholdsportabilitet** — Brug Common Cartridge-formatet, når du skal dele indhold med andre LMS-platforme