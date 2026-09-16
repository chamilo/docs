# Fórmulas Matemáticas

O editor de texto rico pode compor fórmulas matemáticas. Escreve-se a fórmula em LaTeX e os formandos veem-na renderizada em qualquer lugar onde o conteúdo seja apresentado: documentos, anúncios, exercícios, fóruns, páginas wiki e qualquer outra ferramenta que utilize o editor.

As fórmulas são armazenadas no próprio conteúdo, pelo que acompanham o curso quando este é copiado ou exportado.

## Ativar a Funcionalidade

O botão de fórmulas está desativado por predefinição. Um administrador da plataforma ativa-o em **Administração > Definições de configuração > Editor > Ativar MathJax** ([`enabled_mathjax`](../../admin-guide/platform-settings/editor-settings.md)).

Assim que a definição estiver ligada, o botão aparece em todos os editores da plataforma. Não é necessária qualquer configuração por curso.

## Inserir uma Fórmula

1. Coloque o cursor no local onde a fórmula deve aparecer
2. Clique no botão **Inserir fórmula** na barra de ferramentas do editor (o ícone Σ)
3. Escreva a fórmula em **código LaTeX**
4. Verifique o resultado renderizado na caixa de pré-visualização abaixo do campo
5. Clique em **Inserir**

A pré-visualização atualiza-se enquanto escreve, pelo que pode corrigir um erro antes de inserir qualquer coisa.

## Editar uma Fórmula

Clique na fórmula no editor. Abre-se novamente o mesmo diálogo, com o código LaTeX original no campo. Altere-o e clique em **Inserir** para substituir a fórmula.

Para eliminar uma fórmula, selecione-a no editor e prima <kbd>Delete</kbd>, como com qualquer outro elemento.

## Escrever LaTeX

O campo da fórmula aceita a notação matemática LaTeX padrão. Alguns exemplos:

| O que escreve | O que os formandos veem |
| --- | --- |
| `x = \frac{-b \pm \sqrt{b^2-4ac}}{2a}` | A fórmula quadrática |
| `\sum_{i=1}^{n} i = \frac{n(n+1)}{2}` | Uma soma com limites |
| `\int_{0}^{\infty} e^{-x} dx = 1` | Um integral definido |
| `\alpha + \beta = \gamma` | Letras gregas |
| `\begin{matrix} a & b \\ c & d \end{matrix}` | Uma matriz |

Também pode escrever os delimitadores em bruto `\(...\)`, `\[...\]` ou `$$...$$` diretamente no editor. O editor converte-os em fórmulas quando carrega o conteúdo.

## Notas

* A biblioteca de fórmulas é carregada apenas nas páginas que realmente contêm uma fórmula, pelo que as páginas sem fórmula não ficam mais lentas.
* Tudo é renderizado no navegador do formando. A plataforma não precisa de nenhum serviço externo e funciona numa instalação sem acesso à Internet.
* Uma fórmula conserva a sua origem em LaTeX. Pode sempre reabri-la e ler o que escreveu, mesmo anos mais tarde.