# Dokumenter

Dokumentverktøyet er filarkivet i kurset ditt. Du kan laste opp filer, opprette dokumenter i HTML-format, organisere innhold i mapper og gi lærende tilgang til alt materialet de trenger.

## Åpne dokumentverktøyet

Åpne verktøyet **Dokumenter** <img src="/.gitbook/assets/icons/mdi-bookshelf.svg" alt="Dokumenter" data-size="line"> fra kursets startside. Du vil se en filutforsker som viser rotmappen i kursets dokumentbibliotek.

![Filutforskeren for dokumenter som viser mapper og filer med handlingsikoner](/.gitbook/assets/documents-file-browser.png)

## Laste opp filer

1. Klikk på knappen **Last opp** <img src="/.gitbook/assets/icons/mdi-upload.svg" alt="Last opp" data-size="line">
2. Velg én eller flere filer fra datamaskinen (du kan dra og slippe filer i opplastingsområdet)
3. Filene lastes opp og vises i den gjeldende mappen

Chamilo støtter de fleste vanlige filtyper: PDF, kontordokumenter (.docx, .odt), presentasjoner (.pptx, .odp), regneark (.xlsx, .ods), bilder (PNG, JPG, SVG, GIF), lydfiler, videofiler (inkludert WEBM), HTML-filer og mer.

Enkelte formater kan være forbudt av portaladministratoren gjennom en hviteliste-/svartelistefiltrering i sikkerhetsdelen av administrasjonen.

For bedre lesbarhet for de lærende anbefaler vi å laste opp filer som en nettleser kan vise eller åpne uten ekstra verktøy. Dette gjør kurset mer portabelt og dermed mer tilgjengelig på mobile enheter og mer lesbart for personer med særlige behov.

## Opprette innhold

I tillegg til å laste opp filer kan du opprette innhold direkte i Chamilo:

### Nettsider

1. Klikk **Nytt dokument**
2. Bruk riktekstredigereren til å skrive innholdet med formatering, bilder, tabeller og lenker
3. Angi en **tittel** for siden
4. Lagre

Riktekstredigereren (TinyMCE) gir funksjoner som minner om et tekstbehandlingsprogram, blant annet:

* Tekstformatering (fet, kursiv, overskrifter, lister)
* Tabeller
* Bilder (last opp eller lenk til eksisterende bilder)
* Innbygde videoer og lyd
* Lenker til andre ressurser
* Redigering av HTML-kilde for avanserte brukere

### AI-mediagenerering

Når AI-hjelpere er aktivert på plattformen, kan du be AI-en om å generere et **bilde** eller en **kort video** for å illustrere et avsnitt i dokumentet du redigerer. Merk et avsnitt, åpne dialogen **Generer AI-media**, så produserer AI-en et medieelement du kan gjennomgå og sette inn. Dialogen respekterer tillatelser på kursnivå og vises bare i kurs der AI-mediagenerering er tillatt.

### Lydopptak

Hvis nettleseren din støtter det, kan du ta opp lyd direkte i dokumentverktøyet — nyttig for å lage lydinstruksjoner eller innhold til språklæring. Dette krever HTTPS-konfigurasjon for Chamilo, ettersom lydopptak bruker teknologi som nettleseren bare tillater når tilkoblingen er sikker.

## Organisere med mapper

Hold dokumentbiblioteket organisert ved hjelp av mapper:

1. Klikk **Ny mappe** <img src="/.gitbook/assets/icons/mdi-folder-plus.svg" alt="Ny mappe" data-size="line">
2. Angi et mappenavn
3. Lagre

Du kan opprette nestede mapper for å bygge et logisk innholdshierarki (f.eks. `Module 1 > Week 1 > Readings`).

### Flytte filer

* Finn filen i listen
* Klikk **Flytt** <img src="/.gitbook/assets/icons/mdi-folder-move.svg" alt="Flytt" data-size="line">
* Velg destinasjonsmappen
* Bekreft

## Administrere dokumenter

For hver fil eller mappe kan du:

| Handling | Ikon | Beskrivelse |
|--------|------|-------------|
| **Rediger** | <img src="/.gitbook/assets/icons/mdi-pencil.svg" alt="Rediger" data-size="line"> | Gi filen nytt navn eller rediger innholdet (for nettsider) |
| **Slett** | <img src="/.gitbook/assets/icons/mdi-delete.svg" alt="Slett" data-size="line"> | Fjern filen eller mappen |
| **Last ned** | <img src="/.gitbook/assets/icons/mdi-download-box.svg" alt="Last ned" data-size="line"> | Last ned filen til datamaskinen |
| **Synlighet** | <img src="/.gitbook/assets/icons/mdi-eye.svg" alt="Synlighet" data-size="line"> | Skjul eller vis filen for de lærende |
| **Erstatt** | <img src="/.gitbook/assets/icons/mdi-file-replace.svg" alt="Erstatt" data-size="line"> | Erstatt filen med en oppdatert versjon |
| **Flytt** | <img src="/.gitbook/assets/icons/mdi-folder-move.svg" alt="Flytt" data-size="line"> | Flytt til en annen mappe |

Å erstatte en fil er en viktig funksjon når du bruker dokumenter til å bygge læringsstier, ettersom erstatning av dokumentet gjør at dokumentet kan oppdateres uten at de lærende mister fremdriften som er lagret for det dokumentet.

### Massehandlinger

Velg flere filer med avmerkingsbokser, og bruk deretter verktøylinjen til å slette eller laste ned alle valgte elementer samtidig.

## OnlyOffice-integrasjon

Hvis administratoren har konfigurert **OnlyOffice**-tillegget, kan du redigere Word-, Excel- og PowerPoint-filer (eller LibreOffice) direkte i nettleseren uten å laste dem ned. Se etter alternativet **Rediger med OnlyOffice** <img src="/.gitbook/assets/icons/mdi-file-document-edit-outline.svg" alt="OnlyOffice" data-size="line"> når du viser en støttet fil.

Dokumentene lagres i Chamilo; OnlyOffice brukes bare til å **vise** eller redigere dokumentene i nettleseren, uten behov for noe ekstra verktøy.

## Skyfiler

Hvis du bruker skylagring (Azure Blob, AWS S3 eller Google Cloud) for filene dine, lagres disse i skyen, men du kan lenke til dem herfra. Dette er transparent for deg og dine deltakere — dokumentverktøyet fungerer på samme måte uavhengig av lagringsbackend.

## Tips

* **Organiser tidlig** — Opprett mappestrukturen før du laster opp innhold, slik at du slipper å omorganisere senere. Hvis du har opprettet andre kurs med riktig struktur, kan du bruke disse kursene som mal senere
* **Bruk beskrivende filnavn** — Hjelp deltakerne med å finne det de trenger ved hjelp av tydelige, meningsfulle navn
* **Skjul arbeid under utarbeidelse** — Bruk synlighetstoggle for å skjule dokumenter du fortsatt forbereder
* **Lenk fra læringsstier** — Referer til dokumenter i læringsstiene dine for å lage veiledede læringssekvenser
* **Sjekk diskkvoten** — Hvis kurset har en lagringsgrense, fjern utdaterte filer for å frigjøre plass