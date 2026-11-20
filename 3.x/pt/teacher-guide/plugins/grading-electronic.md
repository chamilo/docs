# Grading Electronic

Grading Electronic <img src="../../.gitbook/assets/icons/mdi-export.svg" alt="Grading Electronic" data-size="line"> exporta os alunos que foram aprovados no seu curso, com a respetiva pontuação do livro de notas, para o ficheiro que um organismo de certificação externo importa: um ficheiro de texto de formato fixo ou uma folha de cálculo de lista de alunos.

## Abrir o bloco de exportação

Depois de ativado, a barra de ferramentas da ferramenta **Avaliações** (livro de notas) do seu curso passa a incluir um ícone **Exportar**. Clique nele para mostrar o bloco **Grading Electronic** na mesma página; clique novamente para o ocultar.

O bloco tem três campos:

* **Pré-visualização** — marcada por predefinição. Enquanto estiver marcada, nada é guardado: o bloco apenas mostra o que a exportação conteria
* **Intervalo de datas** — as datas de início e de fim do curso. A data de início entra na linha de cabeçalho do ficheiro de texto; a data de fim é a data em que cada aluno foi aprovado
* **ID do curso** — o identificador do curso no organismo de certificação. É pré-preenchido com o valor utilizado na exportação anterior

## Pré-visualizar a exportação

Com **Pré-visualização** marcada, o bloco oferece um único botão **Pré-visualizar**. Lista todos os alunos do curso (ou da sessão em que se encontra) com a respetiva pontuação e um estado **PASS** ou **SKIP**, e mostra o conteúdo do ficheiro de texto. Apenas os alunos que cumprem os critérios de aprovação do livro de notas são marcados como **PASS**; os restantes ficam de fora da exportação.

## Gerar o ficheiro

Desmarque **Pré-visualização** para substituir o botão **Pré-visualizar** por dois botões:

* **Gerar TXT** — descarrega o ficheiro de texto de formato fixo: uma linha de cabeçalho com o ID do fornecedor, o ID do curso e a data de início, seguida de uma linha por cada aluno que foi aprovado
* **Gerar XLSX** — descarrega a folha de cálculo da lista, com uma linha por cada aluno que foi aprovado e as colunas **FireTRAQ ID**, **First Name**, **Last Name**, **Score**, **Grade**, **Date Earned** e **Comment**

Ambos os botões fazem o mesmo, para além do ficheiro: guardam o **ID do curso** para a exportação seguinte e, se o livro de notas gerar certificados, geram o certificado de cada aluno que foi aprovado.

## O que contém a folha de cálculo

* **FireTRAQ ID** — o ID do aluno no organismo de certificação, lido a partir do campo de perfil `fcdice_or_acadis_student_id`
* **Score** — a pontuação do livro de notas como percentagem inteira (0 a 100), independentemente do peso total do livro de notas
* **Grade** — sempre **Pass**, uma vez que apenas são exportados os alunos que foram aprovados. A célula continua a oferecer as opções **Pass**, **Fail** e **Incomplete**, caso precise de editar o ficheiro
* **Date Earned** — a data de fim do intervalo de datas
* **Comment** — deixado em branco

## Dicas

* **Verifique primeiro os IDs dos alunos** — Um aluno sem ID no perfil continua a ser exportado, com **FireTRAQ ID** vazio. Utilize a pré-visualização para os identificar antes de gerar o ficheiro
* **O ID do fornecedor e as horas do curso** provêm dos campos extra do curso, definidos pelo administrador quando o plugin foi instalado