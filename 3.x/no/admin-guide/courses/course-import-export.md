# Kursimport og kurseksport

Chamilo støtter import og eksport av kurs for sikkerhetskopiering, migrering og deling av innhold.

Disse funksjonene finnes inne i kurset, i verktøyet **Vedlikehold** som ligger under tannhjulikonet øverst på kursets startsid.

## Eksportere et kurs

Lærere kan eksportere sine egne kurs fra kursets vedlikeholdsverktøy. Som administrator kan du eksportere et hvilket som helst kurs:

1. Gå inn i kurset
2. Åpne verktøyet **Course maintenance**
3. Velg **Create a backup**
4. Velg hva som skal inkluderes (innhold, brukerdata osv.)
5. Last ned eksportfilen

Eksporten oppretter en pakke som inneholder kursets dokumenter, øvelser, forum, læringsstier og konfigurasjon.

## Importere et kurs

Slik importerer du et kurs fra en Chamilo-eksportfil:

1. Gå inn i kurset
2. Åpne verktøyet **Course maintenance**
3. I delen **Import backup** laster du opp eksportfilen
4. Velg hva som skal inkluderes (innhold, brukerdata osv.)
5. Konfigurer importalternativer:
   * Om eksisterende innhold skal overskrives
   * Om brukerdata skal inkluderes
6. Kjør importen

## Kopiere et kurs

For å kopiere innholdet fra et annet kurs inn i kurset ditt, må du først ha et kildekurs og et destinasjonskurs.

1. Gå inn i destinasjonskurset
2. Åpne verktøyet **Course maintenance**
3. I delen **Copy course** velger du **Source**-kurset
4. Bekreft valgene
5. Klikk **Continue** og følg instruksjonene

## Common Cartridge

Chamilo støtter standarden **IMS Common Cartridge 1.3** (IMS CC 1.3) for samspill med andre læringsplattformer. Du kan:

* **Importere** Common Cartridge-pakker (.imscc-filer)
* **Eksportere** kursinnhold i Common Cartridge-format

Dette gjør det mulig å utveksle innhold med andre plattformer som støtter Common Cartridge-standarden (Moodle, Canvas, Blackboard osv.).

## Resirkulere et kurs

Funksjonen for kursresirkulering lar deg ganske enkelt beholde kursets skall, men slette innholdet.

## Slette et kurs

Dette sletter kurset ditt fullstendig, inkludert alt innhold og all brukeraktivitet i det.

Slik sletter du et kurs permanent:

1. Gå inn i destinasjonskurset
2. Åpne verktøyet **Course maintenance**
3. I delen **Completely delete this course** skriver du inn kurskoden manuelt for å bekrefte intensjonen
4. Bekreft

Du blir deretter omdirigert til portalens startsid, fordi kurset ikke lenger eksisterer.

## Moodle-import

Chamilo kan importere kurskopier fra **Moodle**. Importøren konverterer Moodles innholdsstruktur til Chamilos format, inkludert quizer, dokumenter og kursinnstillinger.

> **Under arbeid.** Selv om den allerede dekker et bredt grunnlag, dekker Moodle-importøren foreløpig ikke alle Moodle-aktivitetstyper og innholdsformater. Behandle den som et utgangspunkt som fortsatt kan kreve manuell justering etter at importen er ferdig. Hvis du oppdager et element som feiler eller mangler ved import eller eksport, vennligst rapporter det til oss via vårt [Github-område](https://github.com/chamilo/chamilo-lms/issues) ved å klikke **New issue** øverst og gi så mange detaljer som mulig (inkludert selve kurskopien hvis den ikke er konfidensiell).

## Tips

* **Regelmessige sikkerhetskopier** — Oppfordre lærere til å eksportere kursene sine jevnlig som sikkerhetskopi
* **Test importer** — Når du importerer innhold fra en annen plattform, test importen i et prøvekurs først for å verifisere at alt ble overført korrekt
* **Innholdets overførbarhet** — Bruk Common Cartridge-format når du trenger å dele innhold med andre LMS-plattformer