# Math Formulas

The rich-text editor can typeset mathematical formulas. You write a formula in LaTeX, and learners see it rendered wherever the content is displayed: documents, announcements, exercises, forums, wiki pages, and any other tool that uses the editor.

Formulas are stored inside the content itself, so they travel with the course when you copy or export it.

## Enabling the Feature

The formula button is off by default. A platform administrator turns it on under **Administration > Configuration settings > Editor > Enable MathJax** ([`enabled_mathjax`](../../admin-guide/platform-settings/editor-settings.md)).

Once the setting is on, the button appears in every editor on the platform. No per-course configuration is needed.

## Inserting a Formula

1. Place the cursor where the formula belongs
2. Click the **Insert formula** button in the editor toolbar (the Σ icon)
3. Type the formula in **LaTeX code**
4. Check the rendered result in the preview box below the field
5. Click **Insert**

The preview updates while you type, so you can correct a mistake before you insert anything.

## Editing a Formula

Click the formula in the editor. The same dialog opens again, with your original LaTeX code in the field. Change it and click **Insert** to replace the formula.

To delete a formula, select it in the editor and press <kbd>Delete</kbd>, as with any other element.

## Writing LaTeX

The formula field takes standard LaTeX math notation. A few examples:

| What you type | What learners see |
| --- | --- |
| `x = \frac{-b \pm \sqrt{b^2-4ac}}{2a}` | The quadratic formula |
| `\sum_{i=1}^{n} i = \frac{n(n+1)}{2}` | A sum with limits |
| `\int_{0}^{\infty} e^{-x} dx = 1` | A definite integral |
| `\alpha + \beta = \gamma` | Greek letters |
| `\begin{matrix} a & b \\ c & d \end{matrix}` | A matrix |

You can also type the raw delimiters `\(...\)`, `\[...\]` or `$$...$$` straight into the editor. The editor converts them into formulas when it loads the content.

## Notes

* The formula library is loaded only on pages that actually contain a formula, so pages without one are not slowed down.
* Everything is rendered in the learner's browser. The platform needs no external service, and works on an installation with no access to the internet.
* A formula keeps its LaTeX source. You can always reopen it and read what you wrote, even years later.
