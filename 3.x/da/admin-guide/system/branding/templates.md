# Skabeloner

Chamilo bruger skabeloner til certifikater, dokumenter og e-mails. Du kan tilpasse disse skabeloner, så de matcher din organisations branding og krav.

## Certifikatskabeloner

Certifikatskabeloner definerer layout og indhold for certifikater, der tildeles kursister, som opfylder karakterbogens tærskler.

### Tilpasning af en certifikatskabelon

Certifikatskabeloner bruger HTML og CSS med pladsholdervariabler:

| Variabel | Erstattes med |
|----------|-------------|
| Student name | Kursistens fulde navn |
| Course name | Kursets navn |
| Date | Datoen, hvor certifikatet blev opnået |
| Score | Kursistens endelige score |
| Barcode | En stregkodepladsholder (`((certificate_barcode))`) brugt til verifikation |

### Upload af en skabelon

1. Gå til administration af certifikatskabeloner
2. Upload eller rediger HTML-skabelonen
3. Brug pladsholdervariablerne dér, hvor dynamisk indhold skal vises
4. Gem

## Dokumentskabeloner

Undervisere kan bruge dokumentskabeloner, når de opretter indhold i værktøjet Dokumenter. Skabeloner giver et startlayout til almindelige dokumenttyper.

### Administration af dokumentskabeloner

1. Gå til skabelonadministration i administrationspanelet
2. Tilføj nye skabeloner ved at uploade HTML-filer
3. Skabeloner bliver tilgængelige for undervisere, når de opretter nye dokumenter

## Tips

* **Inkluder dit logo** — Tilføj din organisations logo til certifikatskabeloner for et professionelt udtryk
* **Test med rigtige data** — Forhåndsvis certifikater med faktiske kursistdata, før skabelonen tages i brug
* **Hold skabelonerne enkle** — Enkle designs printer bedre og ser professionelle ud