# Personlighetsenkäter

Chamilo 3.1 innehåller personlighetsinriktade enkäter i det moderna verktyget **Enkäter**. Dessa enkäter ger en **preferensprofil**, inte en betygsatt övning eller en klinisk psykologisk bedömning.

## Skapa en enkät

1. Öppna verktyget Enkäter och skapa en ny enkät.
2. I dess konfiguration väljer du enkättypen **personlighet**.
3. Öppna **Redigera frågor** eller enkätens frågeredigerare.
4. Definiera **Personlighetskategorier** innan du lägger till personlighetsfrågor. Varje svarsalternativ måste tillhöra en kategori.
5. Lägg till frågor, konfigurera deras svar och kategoritilldelningar och spara dina ändringar.
6. Förhandsgranska deltagarupplevelsen innan du distribuerar enkäten.

Fyra typer av personlighetsfrågor finns tillgängliga:

| Typ | Hur deltagare svarar |
| --- | --- |
| Personlighetsval | Välj bland kategorikopplade alternativ |
| Personlighetsinstämmande | Ange instämmande med presenterade påståenden |
| Personlighetsskala | Betygsätt påståenden på en femgradig skala |
| Personlighetsordning | Rangordna alternativ från mest till minst föredragna |

Konfigurationen omfattar svarskontroll och kategoribaserad preferenspoängsättning. Kontrollera varje frågas alternativ och tilldelningar noggrant: ett alternativ som kopplas till fel kategori ändrar den resulterande profilen.

## Visa resultat

Efter att enkäten har slutförts kan en deltagare se **Din personlighetsprofil** när enkäten returnerar profildata. Lärarens resultatsida för enkäten kan visa **Personlighetsprofil — alla deltagare**. Resultaten presenteras med stapel-/radardiagram och kategoripoäng. Duplicering av enkäten bevarar konfigurationen för personlighetsenkäten.

## Betygsbok och tolkning

Personlighetsenkäter kan inte betygsättas via Betygsbok som vanliga bedömningar. Förklara för deltagarna att resultaten speglar svaren på de konfigurerade kategorierna, inte en diagnos, godkänt/underkänt-status eller ett validerat personlighetstest. Granska inställningar för integritet och synlighet i rapporteringen innan du samlar in personliga svar.

Se [Enkäter](surveys.md). Implementering: [PR #9468](https://github.com/chamilo/chamilo-lms/pull/9468).