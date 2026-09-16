# Wiskundige formules

De rich-texteditor kan wiskundige formules zetten. U schrijft een formule in LaTeX, en cursisten zien deze weergegeven waar de inhoud wordt getoond: documenten, aankondigingen, oefeningen, forums, wikipagina's en elke andere tool die de editor gebruikt.

Formules worden in de inhoud zelf opgeslagen, zodat ze met de cursus meegaan wanneer u deze kopieert of exporteert.

## De functie inschakelen

De formuleknop staat standaard uit. Een platformbeheerder schakelt deze in onder **Beheer > Configuratie-instellingen > Editor > MathJax inschakelen** ([`enabled_mathjax`](../../admin-guide/platform-settings/editor-settings.md)).

Zodra de instelling aan staat, verschijnt de knop in elke editor op het platform. Er is geen configuratie per cursus nodig.

## Een formule invoegen

1. Plaats de cursor waar de formule hoort
2. Klik op de knop **Formule invoegen** in de werkbalk van de editor (het Σ-pictogram)
3. Typ de formule in **LaTeX-code**
4. Controleer het weergegeven resultaat in het voorbeeldvak onder het veld
5. Klik op **Invoegen**

Het voorbeeld wordt bijgewerkt terwijl u typt, zodat u een fout kunt corrigeren voordat u iets invoegt.

## Een formule bewerken

Klik op de formule in de editor. Dezelfde dialoog wordt opnieuw geopend, met uw oorspronkelijke LaTeX-code in het veld. Wijzig deze en klik op **Invoegen** om de formule te vervangen.

Om een formule te verwijderen, selecteert u deze in de editor en drukt u op <kbd>Delete</kbd>, zoals bij elk ander element.

## LaTeX schrijven

Het formuleveld accepteert standaard LaTeX-wiskundenotatie. Enkele voorbeelden:

| Wat u typt | Wat cursisten zien |
| --- | --- |
| `x = \frac{-b \pm \sqrt{b^2-4ac}}{2a}` | De kwadratische formule |
| `\sum_{i=1}^{n} i = \frac{n(n+1)}{2}` | Een som met grenzen |
| `\int_{0}^{\infty} e^{-x} dx = 1` | Een bepaalde integraal |
| `\alpha + \beta = \gamma` | Griekse letters |
| `\begin{matrix} a & b \\ c & d \end{matrix}` | Een matrix |

U kunt ook de ruwe scheidingstekens `\(...\)`, `\[...\]` of `$$...$$` rechtstreeks in de editor typen. De editor zet ze om in formules wanneer de inhoud wordt geladen.

## Opmerkingen

* De formulebibliotheek wordt alleen geladen op pagina's die daadwerkelijk een formule bevatten, zodat pagina's zonder formule niet worden vertraagd.
* Alles wordt weergegeven in de browser van de cursist. Het platform heeft geen externe dienst nodig en werkt op een installatie zonder internettoegang.
* Een formule behoudt haar LaTeX-bron. U kunt deze altijd opnieuw openen en lezen wat u hebt geschreven, zelfs jaren later.