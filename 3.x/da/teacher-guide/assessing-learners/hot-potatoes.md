# Hot Potatoes-aktiviteter

Chamilo 3.1 understøtter import af Hot Potatoes HTML-aktiviteter til det moderne værktøj Øvelser og brug af individuelle aktiviteter i læringsstier.

## Importér en aktivitet

1. Åbn kursets værktøj **Øvelser**, og gå til **Hot Potatoes**.
2. Under **Importér Hot Potatoes** skal du vælge en Hot Potatoes-**ZIP**-pakke eller en selvstændig **HTML**-eksport.
3. Når en aktivitet afhænger af tilknyttede billeder, medier eller andre filer, skal disse aktiver medtages i ZIP-filen.
4. Vælg **Importér**, og kontrollér, at den importerede aktivitet åbnes og gengives korrekt.

## Administrer og genbrug aktiviteter

Fra Hot Potatoes-listen kan du bruge **Åbn** til at forhåndsvise aktiviteten, **Rediger** til at ændre dens titel, **Udgiv** eller **Skjul** til at styre synligheden og **Slet** til at fjerne den, når det er tilladt. Læringsstibyggeren kan inkludere individuelle Hot Potatoes-aktiviteter blandt sine ressourcer.

## Gennemgå kursisters forsøg

Handlingen **Forsøg** viser registrerede forsøg til underviserens gennemgang. Undervisere kan tildele en gennemgået procentscore fra 0 til 100. Skærmen viser i øjeblikket op til de seneste 100 forsøg. Brug aktivitetens faktiske gengivne resultat som understøttende dokumentation, når du vurderer en kursist.

**Automatisk scoring og synkronisering med karakterbogen er ikke implementeret.** Scorer, der vises af selve en Hot Potatoes-pakke, må ikke behandles som verificerede karakterer på serversiden. Resultater gennemgået af underviseren gemmes separat.

## Fejlfinding

Hvis medier mangler, skal du eksportere aktiviteten igen med alle tilknyttede aktiver i dens ZIP-fil. Hvis en HTML-eksport virker på en lokal computer, men ikke i Chamilo, skal du kontrollere eksterne filreferencer eller inkompatibelt indlejret indhold. Test aktivitetens synlighed både med en studenterkonto og med en underviserkonto.

Se [Øvelser](exercises.md) og [Læringsstier](../adding-content/learning-paths.md). Implementering: [PR #9380](https://github.com/chamilo/chamilo-lms/pull/9380).