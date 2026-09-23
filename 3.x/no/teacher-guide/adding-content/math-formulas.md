# Matematiske formler

Den rike teksteditoren kan sette matematiske formler. Du skriver en formel i LaTeX, og lærerne ser den gjengitt der innholdet vises: dokumenter, kunngjøringer, øvelser, forum, wikisider og alle andre verktøy som bruker editoren.

Formler lagres inne i selve innholdet, slik at de følger med kurset når du kopierer eller eksporterer det.

## Aktivere funksjonen

Formelknappen er slått av som standard. En plattformadministrator slår den på under **Administrasjon > Konfigurasjonsinnstillinger > Editor > Enable MathJax** ([`enabled_mathjax`](../../admin-guide/platform-settings/editor-settings.md)).

Når innstillingen er slått på, vises knappen i alle editorer på plattformen. Ingen konfigurasjon per kurs er nødvendig.

## Sette inn en formel

1. Plasser markøren der formelen skal stå
2. Klikk på knappen **Insert formula** i editorverktøylinjen (Σ-ikonet)
3. Skriv formelen i **LaTeX-kode**
4. Kontroller det gjengitte resultatet i forhåndsvisningsboksen under feltet
5. Klikk **Insert**

Forhåndsvisningen oppdateres mens du skriver, slik at du kan rette en feil før du setter inn noe.

## Redigere en formel

Klikk på formelen i editoren. Den samme dialogen åpnes igjen, med den opprinnelige LaTeX-koden i feltet. Endre den og klikk **Insert** for å erstatte formelen.

For å slette en formel merker du den i editoren og trykker <kbd>Delete</kbd>, som med alle andre elementer.

## Skrive LaTeX

Formelfeltet tar standard LaTeX-matematikknotasjon. Noen eksempler:

| Det du skriver | Det lærerne ser |
| --- | --- |
| `x = \frac{-b \pm \sqrt{b^2-4ac}}{2a}` | Den kvadratiske formelen |
| `\sum_{i=1}^{n} i = \frac{n(n+1)}{2}` | En sum med grenser |
| `\int_{0}^{\infty} e^{-x} dx = 1` | Et bestemt integral |
| `\alpha + \beta = \gamma` | Greske bokstaver |
| `\begin{matrix} a & b \\ c & d \end{matrix}` | En matrise |

Du kan også skrive de rå avgrenserne `\(...\)`, `\[...\]` eller `$$...$$` direkte i editoren. Editoren konverterer dem til formler når den laster innholdet.

## Merknader

* Formelbiblioteket lastes bare på sider som faktisk inneholder en formel, slik at sider uten en ikke blir tregere.
* Alt gjengis i lærerens nettleser. Plattformen trenger ingen ekstern tjeneste, og fungerer på en installasjon uten tilgang til internett.
* En formel beholder LaTeX-kilden. Du kan alltid åpne den på nytt og lese det du skrev, selv år senere.