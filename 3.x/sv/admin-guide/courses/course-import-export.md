# Kursimport och kursexport

Chamilo stöder import och export av kurser för säkerhetskopiering, migrering och innehållsdelning.

Dessa funktioner finns inne i kursen, i verktyget **Underhåll** som nås via kugghjulsikonen högst upp på kursens startsida.

## Exportera en kurs

Lärare kan exportera sina egna kurser från kursens underhållsverktyg. Som administratör kan du exportera vilken kurs som helst:

1. Gå in i kursen
2. Öppna verktyget **Kursunderhåll**
3. Välj **Skapa en säkerhetskopia**
4. Välj vad som ska ingå (innehåll, användardata osv.)
5. Ladda ner exportfilen

Exporten skapar ett paket som innehåller kursens dokument, övningar, forum, lärstigar och konfiguration.

## Importera en kurs

Så här importerar du en kurs från en Chamilo-exportfil:

1. Gå in i kursen
2. Öppna verktyget **Kursunderhåll**
3. I avsnittet **Importera säkerhetskopia**, ladda upp exportfilen
4. Välj vad som ska ingå (innehåll, användardata osv.)
5. Konfigurera importalternativ:
   * Om befintligt innehåll ska skrivas över
   * Om användardata ska ingå
6. Kör importen

## Kopiera en kurs

För att kopiera innehållet från en annan kurs till din kurs behöver du först ha en källkurs och en målkurs skapade.

1. Gå in i målkursen
2. Öppna verktyget **Kursunderhåll**
3. I avsnittet **Kopiera kurs**, välj **Källkursen**
4. Bekräfta alternativen
5. Klicka på **Fortsätt** och följ instruktionerna

## Common Cartridge

Chamilo stöder standarden **IMS Common Cartridge 1.3** (IMS CC 1.3) för interoperabilitet med andra lärplattformar. Du kan:

* **Importera** Common Cartridge-paket (.imscc-filer)
* **Exportera** kursinnehåll i Common Cartridge-format

Detta möjliggör innehållsutbyte med andra plattformar som stöder Common Cartridge-standarden (Moodle, Canvas, Blackboard osv.).

## Återvinna en kurs

Funktionen för kursåtervinning gör det möjligt att behålla kursens skal men radera dess innehåll.

## Ta bort en kurs

Detta raderar kursen helt, inklusive allt innehåll och all användaraktivitet i den.

Så här tar du bort en kurs permanent:

1. Gå in i målkursen
2. Öppna verktyget **Kursunderhåll**
3. I avsnittet **Ta bort den här kursen helt**, ange kurskoden manuellt för att bekräfta din avsikt
4. Bekräfta

Du omdirigeras därefter till portalens startsida, eftersom kursen inte längre finns.

## Moodle-import

Chamilo kan importera kurssäkerhetskopior från **Moodle**. Importören konverterar Moodles innehållsstruktur till Chamilos format, inklusive quiz, dokument och kursinställningar.

> **Pågående arbete.** Även om den redan täcker en bred bas, täcker Moodle-importören för närvarande inte varje Moodle-aktivitetstyp och innehållsformat. Behandla den som en utgångspunkt som fortfarande kan kräva manuell justering efter att importen är klar. Om du upptäcker något felande/saknat element vid import eller export, rapportera det gärna till oss via vårt [Github-utrymme](https://github.com/chamilo/chamilo-lms/issues) genom att klicka på **New issue** högst upp och ge så mycket detaljer som möjligt (inklusive kurssäkerhetskopian om den inte är konfidentiell).

## Tips

* **Regelbundna säkerhetskopior** — Uppmuntra lärare att exportera sina kurser regelbundet som säkerhetskopia
* **Testa importer** — När du importerar innehåll från en annan plattform, testa importen i en försökskurs först för att kontrollera att allt överfördes korrekt
* **Innehållsportabilitet** — Använd Common Cartridge-format när du behöver dela innehåll med andra LMS-plattformar