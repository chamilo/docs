# AI-verktøykasse

**AI-verktøykassen** er et kursverktøy som genererer interaktive pedagogiske applikasjoner ut fra en lærers instruksjoner. Chamilo pakker hver genererte applikasjon som **SCORM 1.2**, slik at læringsfremdrift, poengsum og gjenopptaksdata spores av plattformen.

> Administratoren må aktivere både `ai_helpers.enable_ai_helpers` og `ai_helpers.toolbox` under **Administrasjon > Konfigurasjonsinnstillinger > AI-hjelpere**, og minst én tekstbasert AI-leverandør må være konfigurert.

## Opprette en interaktiv applikasjon

1. Åpne **AI-verktøykasse** i kurset.
2. Klikk **Opprett**.
3. Angi en **Tittel** og eventuelt en **Beskrivelse**.
4. I **Hva skal applikasjonen gjøre?**, beskriv den fullstendige aktiviteten du ønsker. Ta med læringsmålet, regler, nivåer, poenggiving og hva som skal skje når den lærende er ferdig.
5. Velg **AI-leverandør** når mer enn én er tilgjengelig.
6. Klikk **Generer**.

Den første genereringen lagres som **versjon 1**. Den starter som et utkast, slik at du kan forhåndsvise den før den gjøres synlig for lærende.

## Forbedring og versjonering

Åpne en applikasjons **Innstillinger** for å administrere den. Du kan:

* forhåndsvise eller laste ned den gjeldende applikasjonen;
* bruke **Forbedre med AI** for å beskrive en endring og generere en ny versjon;
* gjennomgå **Versjonshistorikk**;
* forhåndsvise, laste ned eller gjenopprette en tidligere versjon;
* publisere eller skjule applikasjonen;
* åpne **Rapportering** for å gjennomgå sporing av lærende.

Å generere en forbedring sletter ikke tidligere versjoner. Å gjenopprette en tidligere versjon gjør den versjonen gjeldende igjen.

## Legge til en applikasjon i en læringssti

I [verktøyet for læringsstier](../adding-content/learning-paths.md) kan lærere velge en generert AI-verktøykasse-applikasjon som en ressurs. Applikasjonen må ha en generert versjon, men den trenger ikke å være publisert før læreren legger den til i læringsstien. En upublisert applikasjon er fortsatt ikke tilgjengelig for lærende før den er publisert.

Når en autorisert lærer åpner verktøykasseinnholdet i **forhåndsvisningsmodus**, viser Chamilo **«Fremdrift og poengsum lagres ikke i forhåndsvisningsmodus.»** Å teste aktiviteten på denne måten oppretter ikke sporing av lærende eller oppdaterer en poengsum. Bruk den vanlige lærendeopplevelsen for å verifisere SCORM-fremdrift og poengsummer etter publisering.

## Validering av generering og feilsøking

Etter AI-generering kontrollerer Chamilo den genererte applikasjonens kildekode før en versjon gjøres tilgjengelig. Dette omfatter syntaks- eller strukturkontroller av JavaScript og begrensninger på usikre nettleser-API-er. Hvis valideringen mislykkes, ber Chamilo AI-leverandøren om å **reparere resultatet én gang**; hvis den reparerte versjonen fortsatt mislykkes, stopper genereringen med en feil. En vellykket validering er ikke en erstatning for å teste aktivitetens læringsregler, tilgjengelighet og SCORM-poenggiving før publisering.

Hvis genereringen rapporterer **HTTP 504**, sluttet webserveren eller gatewayen å vente på forespørselen. Dette er forskjellig fra en tidsavbrudd pålagt av AI-tekstleverandøren. Feilen kan inkludere omtrentlig medgått tid; prøv en enklere aktivitetsforespørsel og be administratoren om å kontrollere tidsavbrudd for gateway, PHP/webserver og leverandør. En leverandør-tidsavbrudd eller feil med hastighetsbegrensning krever i stedet kontroll av den konfigurerte modellen og leverandørinnstillingene. Ikke anta at applikasjonen ble lagret vellykket etter en feil.

Disse forbedringene av validering og diagnostikk ble introdusert i [PR #9198](https://github.com/chamilo/chamilo-lms/pull/9198).

## Lærendeopplevelse

Lærende ser bare applikasjoner som er publisert. Fra verktøykassen kan de åpne en applikasjon, fortsette fra sin siste SCORM-tilstand og se **Fremdrift** og **Poengsum**. Når et nytt forsøk er tillatt, starter **Prøv igjen** et nytt forsøk.

Verktøykasseapplikasjoner kjører inne i kjøretidsmiljøet for læringsstier i en begrenset iframe og rapporterer SCORM-tilstanden tilbake til Chamilo. De administreres fra verktøykassen i stedet for fra den vanlige listen over læringsstier.

Autoriserte MCP-klienter kan også opprette eller oppdatere verktøykasseapplikasjoner når de samme innstillingene for AI-verktøykassen er aktivert.