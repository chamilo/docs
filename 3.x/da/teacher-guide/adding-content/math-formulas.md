# Matematiske formler

Den rige teksteditor kan sætte matematiske formler. Du skriver en formel i LaTeX, og kursisterne ser den gengivet overalt, hvor indholdet vises: dokumenter, meddelelser, øvelser, fora, wikisider og alle andre værktøjer, der bruger editoren.

Formler gemmes i selve indholdet, så de følger med kurset, når du kopierer eller eksporterer det.

## Aktivering af funktionen

Formelknappen er slået fra som standard. En platformadministrator slår den til under **Administration > Konfigurationsindstillinger > Editor > Aktivér MathJax** ([`enabled_mathjax`](../../admin-guide/platform-settings/editor-settings.md)).

Når indstillingen er slået til, vises knappen i alle editorer på platformen. Der kræves ingen konfiguration pr. kursus.

## Indsættelse af en formel

1. Placer markøren der, hvor formlen skal stå
2. Klik på knappen **Indsæt formel** i editorens værktøjslinje (Σ-ikonet)
3. Skriv formlen i **LaTeX-kode**
4. Kontrollér det gengivne resultat i forhåndsvisningsfeltet under feltet
5. Klik på **Indsæt**

Forhåndsvisningen opdateres, mens du skriver, så du kan rette en fejl, før du indsætter noget.

## Redigering af en formel

Klik på formlen i editoren. Den samme dialog åbnes igen med din oprindelige LaTeX-kode i feltet. Ændr den, og klik på **Indsæt** for at erstatte formlen.

For at slette en formel skal du markere den i editoren og trykke på <kbd>Delete</kbd>, som med ethvert andet element.

## Skrivning af LaTeX

Formelfeltet tager standard LaTeX-matematiknotation. Nogle eksempler:

| Det du skriver | Det kursisterne ser |
| --- | --- |
| `x = \frac{-b \pm \sqrt{b^2-4ac}}{2a}` | Den kvadratiske formel |
| `\sum_{i=1}^{n} i = \frac{n(n+1)}{2}` | En sum med grænser |
| `\int_{0}^{\infty} e^{-x} dx = 1` | Et bestemt integral |
| `\alpha + \beta = \gamma` | Græske bogstaver |
| `\begin{matrix} a & b \\ c & d \end{matrix}` | En matrix |

Du kan også skrive de rå afgrænsere `\(...\)`, `\[...\]` eller `$$...$$` direkte i editoren. Editoren konverterer dem til formler, når den indlæser indholdet.

## Bemærkninger

* Formelbiblioteket indlæses kun på sider, der faktisk indeholder en formel, så sider uden en formel bliver ikke langsommere.
* Alt gengives i kursistens browser. Platformen behøver ingen ekstern tjeneste og virker på en installation uden adgang til internettet.
* En formel bevarer sin LaTeX-kilde. Du kan altid åbne den igen og læse, hvad du skrev, selv år senere.