# Bedömningar

Bedömningarna (tidigare *gradebook*) sammanställer poäng från övningar, inlämningsuppgifter och andra betygsatta aktiviteter till en enhetlig bild av varje deltagares prestation. De styr även generering av intyg.

## Så fungerar bedömningarna

Bedömningarna är viktade poängsystem. Du definierar:

1. **Vilka aktiviteter** som bidrar till betyget (övningar, inlämningsuppgifter, närvaro m.m.)
2. **Vikten** för varje aktivitet (hur mycket den räknas mot slutbetyget)
3. **Minsta poäng för intyg** (tröskeln för att erhålla ett intyg)
4. **En minsta poäng per aktivitet** — Varje aktivitet i betygsboken kan ha en egen **Minsta poäng**. Deltagare som ligger under den miniminivån på en nyckelaktivitet kan förhindras från att uppnå målen och erhålla intyget, även om deras samlade viktade totalpoäng annars är tillräckligt hög.

Aktiviteter kan vara av 2 typer:
* **Klassrumsaktivitet** (eller aktivitet på plats), där betyg måste importeras från någon annan källa
* **Onlineaktivitet** vald från kursen, där betyg erhålls genom att aktiviteten genomförs i kursen

Chamilo beräknar varje deltagares samlade betyg utifrån dessa vikter.

## Konfigurera bedömningen

1. Öppna verktyget **Bedömningar** <img src="/.gitbook/assets/icons/mdi-certificate.svg" alt="Gradebook" data-size="line"> från kursens startsida
2. Du ser översikten över bedömningar, som inledningsvis är tom

### Lägga till aktiviteter

1. Klicka på **Lägg till onlineaktivitet**
2. Välj typ:
   * **Test** — Koppla en specifik övning från kursen
   * **Inlämningsuppgift** — Koppla en mapp för studentpublikationer
   * **Inlärningsstig** — Koppla slutförande av inlärningsstig
   * **Närvaro** — Koppla en närvarolista
   * **Forumtråd** — Koppla en forumtråd (som måste betygsättas manuellt)
   * **Enkät** — Koppla en enkät
3. Välj den specifika aktiviteten inom den valda typen
4. Ange **Vikt** för denna aktivitet (t.ex. 30 % för mittentamen, 40 % för slutprojektet)
5. Ange **Minsta poäng** om det är tillämpligt
6. Spara

Den totala vikten för alla aktiviteter bör summera till 100 %.

### Underkategorier

För komplexa betygsscheman kan du skapa **underkategorier** för att gruppera relaterade aktiviteter:

* **Exempel**: En underkategori "Hemuppgifter" (vikt: 30 %) som innehåller fem enskilda uppgifter som vardera är värda 20 % av underkategorin
* Underkategorier låter dig organisera bedömningen hierarkiskt samtidigt som den övergripande beräkningen förblir enkel

## Visa betyg

![Översiktstabellen i betygsboken som visar deltagarnamn, aktivitetspoäng och viktade totaler](/.gitbook/assets/gradebook-overview.png)

Bedömningen visar en tabell med:

* Varje deltagares namn
* Poäng för varje aktivitet
* Den viktade totalen
* Om deltagaren kvalificerar sig för ett intyg

Du kan sortera efter valfri kolumn för att snabbt identifiera de främsta eller de som har det svårt.

### Diagram över poängfördelning

Under tabellen, och på sidan **Grafisk vy**, ritar bedömningen ett stapeldiagram per aktivitet plus ett för totalen. Varje diagram är ett kolumndiagram: den horisontella axeln listar dina poängintervall från lägsta till högsta, och höjden på varje stapel är antalet deltagare i det intervallet.

Diagrammet **Totalt** markerar även klassens medelvärde. En röd punkt sitter på det intervall som innehåller medelvärdet, och förklaringen anger den exakta procentsatsen.

Dessa diagram visas endast när reglerna för poängvisning är inställda. Om du ser meddelandet *To view graph score rule must be enabled* ska du först definiera dina intervall under bedömningens poänginställningar.

## Intyg

För att aktivera generering av intyg:

1. Ange i bedömningsinställningarna en **minsta poäng för intyg** (t.ex. 70 %)
2. När en deltagares viktade total når eller överstiger denna tröskel (och de inte har underkänts mot någon minsta poäng per aktivitet) kan de ladda ner sitt intyg
3. Intyget genereras från en mall som konfigurerats av plattformsadministratören

När **Generera intyg** är aktiverat på rotkategorin visas fältet **Intygets giltighet (dagar)**. Lämna det på `0` för intyg som aldrig går ut, eller ange ett antal dagar efter vilka intyget upphör att gälla — Chamilo kan då påminna deltagare när utgångsdatumet närmar sig, antingen automatiskt (cron, administratörskonfigurerat) eller manuellt från intygslistan.

![Dialogrutan för redigering av kategori med Generera intyg aktiverat och fältet Intygets giltighet (dagar) inställt på 365](/.gitbook/assets/gradebook-certificate-validity-field.png)

Se [Intyg och färdigheter](../tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry) för mer information.

## Koppling till färdigheter

Du kan koppla **färdigheter** till bedömningen. När en deltagare når de uppsatta målen för att slutföra bedömningen kan de antingen få ett intyg, en färdighet eller båda. Färdigheter syns på deras profil i det sociala nätverksutrymmet. Detta bygger upp ett kompetensregister över tid.

## Exportera betyg

Klicka på knappen **Exportera** <img src="/.gitbook/assets/icons/mdi-export.svg" alt="Exportera" data-size="line"> för att ladda ner betygen som ett kalkylblad. Detta är användbart för att:

* Dela betyg med administrativa system
* Utföra ytterligare analys utanför Chamilo
* Bevara offline-register

## Tips

* **Planera vikterna tidigt** — Definiera betygsschemat i början av kursen så att deltagarna vet vad de kan förvänta sig
* **Använd underkategorier för komplexa kurser** — Gruppera uppgifter, quiz och deltagande i tydliga kategorier
* **Sätt meningsfulla godkäntgränser** — Certifieringspoängen bör spegla faktisk kompetens, inte bara deltagande
* **Kontrollera regelbundet** — Granska betygsboken periodiskt för att säkerställa att alla aktiviteter är korrekt kopplade och att poäng registreras