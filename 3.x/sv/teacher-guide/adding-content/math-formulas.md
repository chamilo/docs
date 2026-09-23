# Matematiska formler

Den rika textredigeraren kan sätta matematiska formler. Du skriver en formel i LaTeX, och deltagarna ser den återgiven överallt där innehållet visas: dokument, meddelanden, övningar, forum, wikisidor och alla andra verktyg som använder redigeraren.

Formler lagras i själva innehållet, så de följer med kursen när du kopierar eller exporterar den.

## Aktivera funktionen

Formelknappen är avstängd som standard. En plattformsadministratör slår på den under **Administration > Configuration settings > Editor > Enable MathJax** ([`enabled_mathjax`](../../admin-guide/platform-settings/editor-settings.md)).

När inställningen är på visas knappen i varje redigerare på plattformen. Ingen konfiguration per kurs behövs.

## Infoga en formel

1. Placera markören där formeln ska stå
2. Klicka på knappen **Insert formula** i redigerarens verktygsfält (Σ-ikonen)
3. Skriv formeln i **LaTeX-kod**
4. Kontrollera det återgivna resultatet i förhandsgranskningsrutan under fältet
5. Klicka på **Insert**

Förhandsgranskningen uppdateras medan du skriver, så du kan rätta ett fel innan du infogar något.

## Redigera en formel

Klicka på formeln i redigeraren. Samma dialog öppnas igen, med din ursprungliga LaTeX-kod i fältet. Ändra den och klicka på **Insert** för att ersätta formeln.

För att ta bort en formel markerar du den i redigeraren och trycker på <kbd>Delete</kbd>, precis som med vilket annat element som helst.

## Skriva LaTeX

Formelfältet tar standardnotation för LaTeX-matematik. Några exempel:

| Vad du skriver | Vad deltagarna ser |
| --- | --- |
| `x = \frac{-b \pm \sqrt{b^2-4ac}}{2a}` | Den kvadratiska formeln |
| `\sum_{i=1}^{n} i = \frac{n(n+1)}{2}` | En summa med gränser |
| `\int_{0}^{\infty} e^{-x} dx = 1` | En bestämd integral |
| `\alpha + \beta = \gamma` | Grekiska bokstäver |
| `\begin{matrix} a & b \\ c & d \end{matrix}` | En matris |

Du kan också skriva de råa avgränsarna `\(...\)`, `\[...\]` eller `$$...$$` direkt i redigeraren. Redigeraren omvandlar dem till formler när den läser in innehållet.

## Anteckningar

* Formelbiblioteket läses in endast på sidor som faktiskt innehåller en formel, så sidor utan en formel blir inte långsammare.
* Allt återges i deltagarens webbläsare. Plattformen behöver ingen extern tjänst och fungerar på en installation utan tillgång till internet.
* En formel behåller sin LaTeX-källa. Du kan alltid öppna den igen och läsa vad du skrev, även år senare.