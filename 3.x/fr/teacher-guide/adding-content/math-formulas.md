# Formules mathématiques

L’éditeur de texte enrichi peut composer des formules mathématiques. Vous saisissez une formule en LaTeX, et les apprenants la voient rendue partout où le contenu s’affiche : documents, annonces, exercices, forums, pages wiki, et tout autre outil qui utilise l’éditeur.

Les formules sont stockées dans le contenu lui-même, de sorte qu’elles voyagent avec le cours lorsque vous le copiez ou l’exportez.

## Activation de la fonctionnalité

Le bouton de formule est désactivé par défaut. Un administrateur de la plateforme l’active sous **Administration > Paramètres de configuration > Éditeur > Activer MathJax** ([`enabled_mathjax`](../../admin-guide/platform-settings/editor-settings.md)).

Une fois le paramètre activé, le bouton apparaît dans chaque éditeur de la plateforme. Aucune configuration par cours n’est nécessaire.

## Insertion d’une formule

1. Placez le curseur à l’endroit où la formule doit figurer
2. Cliquez sur le bouton **Insérer une formule** dans la barre d’outils de l’éditeur (l’icône Σ)
3. Saisissez la formule en **code LaTeX**
4. Vérifiez le résultat rendu dans la zone d’aperçu sous le champ
5. Cliquez sur **Insérer**

L’aperçu se met à jour pendant que vous tapez, ce qui vous permet de corriger une erreur avant d’insérer quoi que ce soit.

## Modification d’une formule

Cliquez sur la formule dans l’éditeur. Le même dialogue s’ouvre à nouveau, avec votre code LaTeX d’origine dans le champ. Modifiez-le et cliquez sur **Insérer** pour remplacer la formule.

Pour supprimer une formule, sélectionnez-la dans l’éditeur et appuyez sur <kbd>Delete</kbd>, comme pour tout autre élément.

## Écrire du LaTeX

Le champ de formule accepte la notation mathématique LaTeX standard. Quelques exemples :

| Ce que vous tapez | Ce que voient les apprenants |
| --- | --- |
| `x = \frac{-b \pm \sqrt{b^2-4ac}}{2a}` | La formule quadratique |
| `\sum_{i=1}^{n} i = \frac{n(n+1)}{2}` | Une somme avec bornes |
| `\int_{0}^{\infty} e^{-x} dx = 1` | Une intégrale définie |
| `\alpha + \beta = \gamma` | Lettres grecques |
| `\begin{matrix} a & b \\ c & d \end{matrix}` | Une matrice |

Vous pouvez également saisir les délimiteurs bruts `\(...\)`, `\[...\]` ou `$$...$$` directement dans l’éditeur. L’éditeur les convertit en formules lors du chargement du contenu.

## Remarques

* La bibliothèque de formules n’est chargée que sur les pages qui contiennent effectivement une formule, de sorte que les pages sans formule ne sont pas ralenties.
* Tout est rendu dans le navigateur de l’apprenant. La plateforme n’a besoin d’aucun service externe et fonctionne sur une installation sans accès à Internet.
* Une formule conserve sa source LaTeX. Vous pouvez toujours la rouvrir et relire ce que vous avez écrit, même des années plus tard.