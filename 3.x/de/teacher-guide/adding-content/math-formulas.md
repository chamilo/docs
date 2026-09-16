# Mathematische Formeln

Der Rich-Text-Editor kann mathematische Formeln setzen. Sie schreiben eine Formel in LaTeX, und Lernende sehen sie gerendert, wo immer der Inhalt angezeigt wird: in Dokumenten, Ankündigungen, Übungen, Foren, Wiki-Seiten und jedem anderen Werkzeug, das den Editor verwendet.

Formeln werden im Inhalt selbst gespeichert, sodass sie mit dem Kurs mitwandern, wenn Sie ihn kopieren oder exportieren.

## Die Funktion aktivieren

Die Formelschaltfläche ist standardmäßig deaktiviert. Ein Plattformadministrator schaltet sie unter **Administration > Konfigurationseinstellungen > Editor > MathJax aktivieren** ([`enabled_mathjax`](../../admin-guide/platform-settings/editor-settings.md)) ein.

Sobald die Einstellung aktiviert ist, erscheint die Schaltfläche in jedem Editor der Plattform. Eine kursbezogene Konfiguration ist nicht erforderlich.

## Eine Formel einfügen

1. Platzieren Sie den Cursor an der Stelle, an der die Formel stehen soll
2. Klicken Sie in der Editor-Symbolleiste auf die Schaltfläche **Formel einfügen** (das Σ-Symbol)
3. Geben Sie die Formel in **LaTeX-Code** ein
4. Prüfen Sie das gerenderte Ergebnis im Vorschaufeld unterhalb des Eingabefelds
5. Klicken Sie auf **Einfügen**

Die Vorschau aktualisiert sich während der Eingabe, sodass Sie einen Fehler korrigieren können, bevor Sie etwas einfügen.

## Eine Formel bearbeiten

Klicken Sie im Editor auf die Formel. Derselbe Dialog öffnet sich erneut, mit Ihrem ursprünglichen LaTeX-Code im Feld. Ändern Sie ihn und klicken Sie auf **Einfügen**, um die Formel zu ersetzen.

Um eine Formel zu löschen, markieren Sie sie im Editor und drücken Sie <kbd>Delete</kbd>, wie bei jedem anderen Element.

## LaTeX schreiben

Das Formelfeld akzeptiert die übliche mathematische LaTeX-Notation. Einige Beispiele:

| Was Sie eingeben | Was Lernende sehen |
| --- | --- |
| `x = \frac{-b \pm \sqrt{b^2-4ac}}{2a}` | Die quadratische Formel |
| `\sum_{i=1}^{n} i = \frac{n(n+1)}{2}` | Eine Summe mit Grenzen |
| `\int_{0}^{\infty} e^{-x} dx = 1` | Ein bestimmtes Integral |
| `\alpha + \beta = \gamma` | Griechische Buchstaben |
| `\begin{matrix} a & b \\ c & d \end{matrix}` | Eine Matrix |

Sie können die Roh-Begrenzer `\(...\)`, `\[...\]` oder `$$...$$` auch direkt in den Editor eingeben. Der Editor wandelt sie beim Laden des Inhalts in Formeln um.

## Hinweise

* Die Formelbibliothek wird nur auf Seiten geladen, die tatsächlich eine Formel enthalten, sodass Seiten ohne Formel nicht verlangsamt werden.
* Alles wird im Browser der Lernenden gerendert. Die Plattform benötigt keinen externen Dienst und funktioniert auf einer Installation ohne Internetzugang.
* Eine Formel behält ihre LaTeX-Quelle. Sie können sie jederzeit erneut öffnen und nachlesen, was Sie geschrieben haben, auch Jahre später.