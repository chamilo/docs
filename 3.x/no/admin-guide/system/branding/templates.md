# Maler

Chamilo bruker maler for sertifikater, dokumenter og e-poster. Du kan tilpasse disse malene slik at de samsvarer med organisasjonens merkevare og krav.

## Sertifikatmaler

Sertifikatmaler definerer layout og innhold for sertifikater som tildeles lærende som oppfyller terskler i karakterboken.

### Tilpasse en sertifikatmal

Sertifikatmaler bruker HTML og CSS med plassholdervariabler:

| Variabel | Erstattes med |
|----------|-------------|
| Student name | Den lærendes fulle navn |
| Course name | Navnet på kurset |
| Date | Datoen sertifikatet ble oppnådd |
| Score | Den lærendes sluttkarakter |
| Barcode | En plassholder for strekkode (`((certificate_barcode))`) som brukes til verifisering |

### Laste opp en mal

1. Gå til administrasjon av sertifikatmaler
2. Last opp eller rediger HTML-malen
3. Bruk plassholdervariablene der dynamisk innhold skal vises
4. Lagre

## Dokumentmaler

Lærere kan bruke dokumentmaler når de oppretter innhold i verktøyet Dokumenter. Maler gir et utgangspunkt for vanlige dokumenttyper.

### Administrere dokumentmaler

1. Gå til maladministrasjon i administrasjonspanelet
2. Legg til nye maler ved å laste opp HTML-filer
3. Malene blir tilgjengelige for lærere når de oppretter nye dokumenter

## Tips

* **Ta med logoen din** — Legg til organisasjonens logo i sertifikatmalene for et profesjonelt uttrykk
* **Test med ekte data** — Forhåndsvis sertifikater med faktiske læringsdata før du tar malen i bruk
* **Hold malene enkle** — Enkle design skriver ut bedre og ser profesjonelle ut