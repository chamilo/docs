# KI-veileder for studentsuksess

**KI-veilederen for studentsuksess** hjelper en lærer med å gjøre kursaktivitet om til praktiske anbefalinger for én student. Den er tilgjengelig fra studentlisten i kursrapporteringsområdet når KI-hjelpere og funksjonen **Kursanalysator** er aktivert for det aktuelle kurset.

> Plattformen må ha minst én tekstbasert KI-leverandør konfigurert. Se [KI-konfigurasjon](../../admin-guide/integrations/ai-configuration.md). De relevante plattforminnstillingene er `ai_helpers.enable_ai_helpers` og `ai_helpers.course_analyser` under **Administrasjon > Konfigurasjonsinnstillinger > KI-hjelpere**.

## Generere en anbefaling

1. Åpne kursrapporteringsområdet og vis **Studentlisten**.
2. Finn studenten og klikk på handlingen **KI-veileder for studentsuksess**.
3. Hvis flere KI-leverandører er tilgjengelige, velger du én.
4. Skriv eventuelt inn **Tilleggsinstruksjoner til KI-veilederen**. Disse lar deg legge til undervisningskontekst eller be veilederen fokusere på en bestemt vanskelighet.
5. Klikk på **Analyser brukerens læring**.

Chamilo forbereder først eller gjenbruker en kursanalyse, og analyserer deretter studentens aktivitet i gjeldende kurs- eller kursøktkontekst.

## Hva anbefalingen inneholder

Resultatet kan omfatte:

* et kortfattet sammendrag;
* **Prioriterte tiltak**;
* foreslåtte **Tilleggsaktiviteter**;
* anbefalinger om **Rytme** og tempo;
* alternative **Læringsmetodikker**;
* andre anbefalinger når det er relevant;
* **Belegg**-lenker fra den godkjente pedagogiske kildekatalogen for kursspråket.

Anbefalingen lagres i Chamilo for den aktuelle studenten og kurskonteksten. Chamilo lagrer også en kopi i lærerens egen innboks når opprettelsen av meldingen lykkes, slik at den kan gjennomgås senere.

## Personvern

Før analysen starter, viser Chamilo en personvernadvarsel. Direkte profilidentifikatorer utelates fra studentdataene som sendes til KI-leverandøren, og KI-en instrueres om ikke å identifisere studenten eller utlede sensitive egenskaper. Læringsaktivitet og kursinnhold kan likevel inneholde informasjon som indirekte kan identifisere noen. Følg organisasjonens retningslinjer for KI og personvern før du bruker funksjonen.

Den samme studentsuksessanalysen er også tilgjengelig for autoriserte MCP-klienter via verktøyet `generate_student_success_feedback`; den gjenbruker den samme personvernfiltrerte analyseflyten.