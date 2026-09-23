# Mallar

Chamilo använder mallar för certifikat, dokument och e-postmeddelanden. Du kan anpassa dessa mallar så att de stämmer överens med din organisations varumärke och krav.

## Certifikatmallar

Certifikatmallar definierar layout och innehåll för certifikat som tilldelas deltagare som uppfyller tröskelvärden i betygsboken.

### Anpassa en certifikatmall

Certifikatmallar använder HTML och CSS med platshållarvariabler:

| Variabel | Ersätts med |
|----------|-------------|
| Student name | Deltagarens fullständiga namn |
| Course name | Kursens namn |
| Date | Datumet då certifikatet utfärdades |
| Score | Deltagarens slutpoäng |
| Barcode | En streckkodsplatshållare (`((certificate_barcode))`) som används för verifiering |

### Ladda upp en mall

1. Gå till hantering av certifikatmallar
2. Ladda upp eller redigera HTML-mallen
3. Använd platshållarvariablerna där dynamiskt innehåll ska visas
4. Spara

## Dokumentmallar

Lärare kan använda dokumentmallar när de skapar innehåll i verktyget Dokument. Mallar ger en startlayout för vanliga dokumenttyper.

### Hantera dokumentmallar

1. Gå till mallhantering i administrationspanelen
2. Lägg till nya mallar genom att ladda upp HTML-filer
3. Mallarna blir tillgängliga för lärare när de skapar nya dokument

## Tips

* **Inkludera din logotyp** — Lägg till din organisations logotyp i certifikatmallar för ett professionellt utseende
* **Testa med verkliga data** — Förhandsgranska certifikat med faktiska deltagardata innan mallen tas i bruk
* **Håll mallarna enkla** — Enkla designer skrivs ut bättre och ser professionella ut