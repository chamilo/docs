# Grading Electronic

O Grading Electronic <img src="../../.gitbook/assets/icons/mdi-export.svg" alt="Grading Electronic" data-size="line"> exporta os estudantes aprovados no seu curso, com a pontuação do caderno de notas, para o arquivo importado por um órgão de certificação externo: um arquivo de texto de formato fixo ou uma planilha de relação de participantes.

## Abertura do bloco de exportação

Depois de ativado, a barra de ferramentas da ferramenta **Avaliações** (caderno de notas) do seu curso passa a exibir um ícone **Exportar**. Clique nele para mostrar o bloco **Grading Electronic** na mesma página; clique novamente para ocultá-lo.

O bloco tem três campos:

* **Pré-visualização** — marcada por padrão. Enquanto estiver marcada, nada é salvo: o bloco apenas mostra o que a exportação conteria
* **Intervalo de datas** — as datas de início e de término do curso. A data de início entra na linha de cabeçalho do arquivo de texto; a data de término é a data em que cada estudante foi aprovado
* **ID do curso** — o identificador do curso no órgão de certificação. Vem pré-preenchido com o valor usado na exportação anterior

## Pré-visualização da exportação

Com **Pré-visualização** marcada, o bloco oferece um único botão **Pré-visualizar**. Ele lista todos os estudantes do curso (ou da sessão em que você está), com a respectiva pontuação e o status **PASS** ou **SKIP**, e mostra o conteúdo do arquivo de texto. Somente os estudantes que atendem aos critérios de aprovação do caderno de notas são marcados como **PASS**; os demais ficam de fora da exportação.

## Geração do arquivo

Desmarque **Pré-visualização** para substituir o botão **Pré-visualizar** por dois botões:

* **Gerar TXT** — baixa o arquivo de texto de formato fixo: uma linha de cabeçalho com o ID do provedor, o ID do curso e a data de início e, em seguida, uma linha para cada estudante aprovado
* **Gerar XLSX** — baixa a planilha de relação de participantes, com uma linha para cada estudante aprovado e as colunas **FireTRAQ ID**, **First Name**, **Last Name**, **Score**, **Grade**, **Date Earned** e **Comment**

Além do arquivo, os dois botões fazem a mesma coisa: salvam o **ID do curso** para a próxima exportação e, se o caderno de notas gerar certificados, geram o certificado de cada estudante aprovado.

## O que há na planilha

* **FireTRAQ ID** — o ID do estudante no órgão de certificação, lido do campo de perfil `fcdice_or_acadis_student_id`
* **Score** — a pontuação do caderno de notas como uma porcentagem inteira (0 a 100), qualquer que seja o peso total do caderno de notas
* **Grade** — sempre **Pass**, pois somente os estudantes aprovados são exportados. A célula ainda oferece as opções **Pass**, **Fail** e **Incomplete**, caso você precise editar o arquivo
* **Date Earned** — a data de término do intervalo de datas
* **Comment** — deixado em branco

## Dicas

* **Verifique primeiro os IDs dos estudantes** — um estudante sem ID no perfil ainda é exportado, com o **FireTRAQ ID** vazio. Use a pré-visualização para identificá-los antes de gerar o arquivo
* **O ID do provedor e a carga horária do curso** vêm dos campos extras do curso, definidos pelo administrador quando o plugin foi instalado