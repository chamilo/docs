# Fórmulas matemáticas

O editor de texto rico pode compor fórmulas matemáticas. Você escreve uma fórmula em LaTeX, e os alunos a veem renderizada onde o conteúdo for exibido: documentos, anúncios, exercícios, fóruns, páginas wiki e qualquer outra ferramenta que use o editor.

As fórmulas são armazenadas no próprio conteúdo, portanto acompanham o curso quando você o copia ou exporta.

## Ativando o recurso

O botão de fórmula fica desativado por padrão. Um administrador da plataforma o ativa em **Administração > Configurações da plataforma > Editor > Ativar MathJax** ([`enabled_mathjax`](../../admin-guide/platform-settings/editor-settings.md)).

Com a configuração ativada, o botão aparece em todos os editores da plataforma. Não é necessária nenhuma configuração por curso.

## Inserindo uma fórmula

1. Posicione o cursor onde a fórmula deve ficar
2. Clique no botão **Inserir fórmula** na barra de ferramentas do editor (o ícone Σ)
3. Digite a fórmula em **código LaTeX**
4. Verifique o resultado renderizado na caixa de pré-visualização abaixo do campo
5. Clique em **Inserir**

A pré-visualização é atualizada enquanto você digita, para que possa corrigir um erro antes de inserir qualquer coisa.

## Editando uma fórmula

Clique na fórmula no editor. O mesmo diálogo é aberto novamente, com o código LaTeX original no campo. Altere-o e clique em **Inserir** para substituir a fórmula.

Para excluir uma fórmula, selecione-a no editor e pressione <kbd>Delete</kbd>, como com qualquer outro elemento.

## Escrevendo LaTeX

O campo de fórmula aceita a notação matemática padrão do LaTeX. Alguns exemplos:

| O que você digita | O que os alunos veem |
| --- | --- |
| `x = \frac{-b \pm \sqrt{b^2-4ac}}{2a}` | A fórmula quadrática |
| `\sum_{i=1}^{n} i = \frac{n(n+1)}{2}` | Uma soma com limites |
| `\int_{0}^{\infty} e^{-x} dx = 1` | Uma integral definida |
| `\alpha + \beta = \gamma` | Letras gregas |
| `\begin{matrix} a & b \\ c & d \end{matrix}` | Uma matriz |

Você também pode digitar os delimitadores brutos `\(...\)`, `\[...\]` ou `$$...$$` diretamente no editor. O editor os converte em fórmulas ao carregar o conteúdo.

## Observações

* A biblioteca de fórmulas é carregada apenas nas páginas que realmente contêm uma fórmula, de modo que páginas sem fórmula não ficam mais lentas.
* Tudo é renderizado no navegador do aluno. A plataforma não precisa de nenhum serviço externo e funciona em uma instalação sem acesso à internet.
* Uma fórmula conserva sua origem em LaTeX. Você sempre pode reabri-la e ler o que escreveu, mesmo anos depois.