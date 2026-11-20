# AI Toolbox

**AI Toolbox** er et kursusværktøj, der genererer interaktive undervisningsapplikationer ud fra en undervisers instruktioner. Chamilo pakker hver genereret applikation som **SCORM 1.2**, så kursistens fremskridt, score og genoptagelsesdata spores af platformen.

> Administratoren skal aktivere både `ai_helpers.enable_ai_helpers` og `ai_helpers.toolbox` under **Administration > Konfigurationsindstillinger > AI Helpers**, og mindst én tekstbaseret AI-udbyder skal være konfigureret.

## Oprettelse af en interaktiv applikation

1. Åbn **AI Toolbox** i kurset.
2. Klik på **Opret**.
3. Angiv en **Titel** og eventuelt en **Beskrivelse**.
4. I **Hvad skal applikationen gøre?** beskriver du den komplette aktivitet, du ønsker. Medtag læringsmålet, regler, niveauer, scoring og hvad der skal ske, når kursisten er færdig.
5. Vælg **AI-udbyderen**, når mere end én er tilgængelig.
6. Klik på **Generer**.

Den første generering gemmes som **version 1**. Den starter som et udkast, så du kan forhåndsvise den, før den gøres synlig for kursister.

## Forbedring og versionering

Åbn en applikations **Indstillinger** for at administrere den. Du kan:

* forhåndsvise eller downloade den aktuelle applikation;
* bruge **Forbedr med AI** til at beskrive en ændring og generere en ny version;
* gennemgå **Versionshistorikken**;
* forhåndsvise, downloade eller gendanne en tidligere version;
* publicere eller skjule applikationen;
* åbne **Rapportering** for at gennemgå kursistsporing.

Generering af en forbedring sletter ikke tidligere versioner. Gendannelse af en tidligere version gør den version aktuel igen.

## Tilføjelse af en applikation til en læringssti

I [værktøjet til opbygning af læringsstier](../adding-content/learning-paths.md) kan undervisere vælge en genereret AI Toolbox-applikation som en ressource. Applikationen skal have en genereret version, men den behøver ikke at være publiceret, før underviseren tilføjer den til læringsstien. En upubliceret applikation er stadig ikke tilgængelig for kursister, før den publiceres.

Når en autoriseret underviser åbner Toolbox-indholdet i **forhåndsvisningstilstand**, viser Chamilo **“Fremskridt og score gemmes ikke i forhåndsvisningstilstand.”** Afprøvning af aktiviteten på denne måde opretter ikke kursistsporing og opdaterer ikke en score. Brug den almindelige kursistoplevelse til at verificere SCORM-fremskridt og -scorer efter publicering.

## Validering af generering og fejlfinding

Efter AI-generering kontrollerer Chamilo den genererede applikations kildekode, før en version gøres tilgængelig. Det omfatter kontrol af JavaScript-syntaks eller -struktur samt begrænsninger for usikre browser-API'er. Hvis valideringen mislykkes, beder Chamilo AI-udbyderen om at **reparere resultatet én gang**; hvis den reparerede version stadig mislykkes, standser genereringen med en fejl. En vellykket validering erstatter ikke afprøvning af aktivitetens læringsregler, tilgængelighed og SCORM-scoring før publicering.

Hvis genereringen rapporterer **HTTP 504**, holdt webserveren eller gatewayen op med at vente på anmodningen. Det er noget andet end en timeout, der er pålagt af AI-tekstudbyderen. Fejlen kan indeholde den omtrentlige forløbne tid; prøv en enklere aktivitetsanmodning, og bed administratoren om at kontrollere timeouts for gateway, PHP/webserver og udbyder. En timeout eller en fejl om hastighedsbegrænsning fra udbyderen kræver i stedet kontrol af den konfigurerede model og udbyderindstillingerne. Antag ikke, at applikationen blev gemt korrekt efter en fejl.

Disse forbedringer af validering og diagnostik blev introduceret i [PR #9198](https://github.com/chamilo/chamilo-lms/pull/9198).

## Kursistoplevelse

Kursister ser kun applikationer, der er blevet publiceret. Fra Toolbox kan de åbne en applikation, fortsætte fra deres seneste SCORM-tilstand og se deres **Fremskridt** og **Score**. Når et nyt forsøg er tilladt, starter **Prøv igen** et nyt forsøg.

Toolbox-applikationer kører i læringsstiens runtime i en begrænset iframe og rapporterer deres SCORM-tilstand tilbage til Chamilo. De administreres fra Toolbox og ikke fra den almindelige liste over læringsstier.

Autoriserede MCP-klienter kan også oprette eller opdatere Toolbox-applikationer, når de samme indstillinger for AI Toolbox er aktiveret.