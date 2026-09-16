# Formule matematiche

L'editor di testo avanzato può comporre formule matematiche. Si scrive una formula in LaTeX e gli studenti la vedono resa ovunque il contenuto sia visualizzato: documenti, annunci, esercizi, forum, pagine wiki e qualsiasi altro strumento che utilizzi l'editor.

Le formule sono memorizzate all'interno del contenuto stesso, quindi viaggiano con il corso quando lo si copia o lo si esporta.

## Abilitazione della funzionalità

Il pulsante delle formule è disattivato per impostazione predefinita. Un amministratore della piattaforma lo attiva in **Amministrazione > Impostazioni di configurazione > Editor > Abilita MathJax** ([`enabled_mathjax`](../../admin-guide/platform-settings/editor-settings.md)).

Una volta attivata l'impostazione, il pulsante compare in ogni editor della piattaforma. Non è necessaria alcuna configurazione per corso.

## Inserimento di una formula

1. Posizionare il cursore nel punto in cui deve comparire la formula
2. Fare clic sul pulsante **Inserisci formula** nella barra degli strumenti dell'editor (l'icona Σ)
3. Digitare la formula in **codice LaTeX**
4. Controllare il risultato reso nella casella di anteprima sotto il campo
5. Fare clic su **Inserisci**

L'anteprima si aggiorna mentre si digita, così è possibile correggere un errore prima di inserire qualsiasi cosa.

## Modifica di una formula

Fare clic sulla formula nell'editor. Si apre di nuovo la stessa finestra di dialogo, con il codice LaTeX originale nel campo. Modificarlo e fare clic su **Inserisci** per sostituire la formula.

Per eliminare una formula, selezionarla nell'editor e premere <kbd>Delete</kbd>, come per qualsiasi altro elemento.

## Scrittura in LaTeX

Il campo della formula accetta la notazione matematica LaTeX standard. Alcuni esempi:

| Cosa si digita | Cosa vedono gli studenti |
| --- | --- |
| `x = \frac{-b \pm \sqrt{b^2-4ac}}{2a}` | La formula quadratica |
| `\sum_{i=1}^{n} i = \frac{n(n+1)}{2}` | Una somma con limiti |
| `\int_{0}^{\infty} e^{-x} dx = 1` | Un integrale definito |
| `\alpha + \beta = \gamma` | Lettere greche |
| `\begin{matrix} a & b \\ c & d \end{matrix}` | Una matrice |

È anche possibile digitare i delimitatori grezzi `\(...\)`, `\[...\]` o `$$...$$` direttamente nell'editor. L'editor li converte in formule quando carica il contenuto.

## Note

* La libreria delle formule viene caricata solo sulle pagine che contengono effettivamente una formula, quindi le pagine senza formula non vengono rallentate.
* Tutto viene reso nel browser dello studente. La piattaforma non necessita di alcun servizio esterno e funziona su un'installazione senza accesso a Internet.
* Una formula conserva il proprio codice sorgente LaTeX. È sempre possibile riaprirla e leggere ciò che si è scritto, anche anni dopo.