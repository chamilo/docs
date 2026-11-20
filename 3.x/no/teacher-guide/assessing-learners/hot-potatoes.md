# Hot Potatoes-aktiviteter

Chamilo 3.1 støtter import av Hot Potatoes HTML-aktiviteter til det moderne Øvelser-verktøyet og bruk av enkeltaktiviteter i læringsstier.

## Importer en aktivitet

1. Åpne kursets **Øvelser**-verktøy og gå til **Hot Potatoes**.
2. Under **Importer Hot Potatoes** velger du en Hot Potatoes-**ZIP**-pakke eller en frittstående **HTML**-eksport.
3. Når en aktivitet er avhengig av tilknyttede bilder, medier eller andre filer, inkluder disse ressursene i ZIP-filen.
4. Velg **Importer** og kontroller at den importerte aktiviteten åpnes og vises korrekt.

## Administrer og gjenbruk aktiviteter

Fra Hot Potatoes-listen bruker du **Åpne** for å forhåndsvise aktiviteten, **Rediger** for å endre tittelen, **Publiser** eller **Skjul** for å styre synligheten, og **Slett** for å fjerne den når det er tillatt. Læringsstibyggeren kan inkludere enkeltstående Hot Potatoes-aktiviteter blant ressursene sine.

## Gjennomgå forsøk fra deltakere

Handlingen **Forsøk** viser registrerte forsøk til gjennomgang for læreren. Lærere kan tildele en gjennomgått prosentpoengsum fra 0 til 100. Skjermen viser for øyeblikket opptil de siste 100 forsøkene. Bruk aktivitetens faktiske gjengitte resultat som støttende dokumentasjon når du vurderer en deltaker.

**Automatisk poenggiving og synkronisering med karakterboken er ikke implementert.** Poengsummer som vises av en Hot Potatoes-pakke i seg selv, må ikke behandles som verifiserte karakterer på serversiden. Resultater gjennomgått av læreren lagres separat.

## Feilsøking

Hvis medier mangler, eksporter aktiviteten på nytt med alle tilknyttede ressurser i ZIP-filen. Hvis en HTML-eksport fungerer på en lokal datamaskin, men ikke i Chamilo, kontroller eksterne filreferanser eller inkompatibelt innebygd innhold. Test aktivitetens synlighet både med en studentkonto og med en lærerkonto.

Se [Øvelser](exercises.md) og [Læringsstier](../adding-content/learning-paths.md). Implementering: [PR #9380](https://github.com/chamilo/chamilo-lms/pull/9380).