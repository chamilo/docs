# Personlighetsspørreskjemaer

Chamilo 3.1 inkluderer personlighetsbaserte spørreskjemaer i det moderne verktøyet **Undersøkelser**. Disse spørreskjemaene gir en **preferanseprofil**, ikke en vurdert øvelse eller en klinisk psykologisk vurdering.

## Opprett et spørreskjema

1. Åpne verktøyet Undersøkelser og opprett en ny undersøkelse.
2. Velg undersøkelsestypen **personality** i konfigurasjonen.
3. Åpne **Rediger spørsmål** eller undersøkelsens spørsmålsredigering.
4. Definer **Personlighetskategorier** før du legger til personlighetsspørsmål. Hvert svaralternativ må tilhøre en kategori.
5. Legg til spørsmål, konfigurer svarene og kategoritildelingene, og lagre endringene.
6. Forhåndsvis deltakeropplevelsen før du distribuerer undersøkelsen.

Fire typer personlighetsspørsmål er tilgjengelige:

| Type | Hvordan deltakere svarer |
| --- | --- |
| Personlighetsvalg | Velg blant alternativer knyttet til kategorier |
| Personlighetsenighet | Angi enighet med presenterte utsagn |
| Personlighetsskala | Vurder elementer på en fempunktsskala |
| Personlighetsrekkefølge | Ranger alternativer fra mest til minst foretrukket |

Konfigurasjonen omfatter validering av svar og preferanseskåring basert på kategorier. Kontroller hvert spørsmåls alternativer og tildelinger nøye: et alternativ knyttet til feil kategori endrer den resulterende profilen.

## Vis resultater

Etter å ha fullført spørreskjemaet kan en deltaker se **Din personlighetsprofil** når undersøkelsen returnerer profildata. Lærerens rapporteringsside for undersøkelsen kan vise **Personlighetsprofil — alle deltakere**. Resultatene presenteres med stolpe-/radardiagrammer og kategoripoeng. Duplisering av undersøkelsen bevarer konfigurasjonen av personlighetsspørreskjemaet.

## Karakterbok og tolkning

Personlighetsspørreskjemaer kan ikke vurderes via Karakterbok som vanlige vurderinger. Forklar for deltakerne at resultatene gjenspeiler svarene på de konfigurerte kategoriene, ikke en diagnose, bestått/ikke bestått-status eller en validert personlighetstest. Gjennomgå innstillinger for personvern og synlighet i rapportering før du samler inn personlige svar.

Se [Undersøkelser](surveys.md). Implementering: [PR #9468](https://github.com/chamilo/chamilo-lms/pull/9468).