# Avaliações

As avaliações (anteriormente *gradebook*) agregam pontuações de exercícios, trabalhos e outras atividades classificadas numa vista unificada do desempenho de cada formando. Também controlam a geração de certificados.

## Como Funcionam as Avaliações

As avaliações são sistemas de pontuação ponderada. Você define:

1. **Quais atividades** contribuem para a nota (exercícios, trabalhos, assiduidade, etc.)
2. **O peso** de cada atividade (quanto conta para a nota final)
3. **A pontuação mínima de certificação** (o limiar para obter um certificado)
4. **Uma pontuação mínima por atividade** — Cada atividade no livro de notas pode ter a sua própria **Pontuação mínima**. Formandos que pontuem abaixo desse mínimo numa atividade-chave podem ser impedidos de atingir os objetivos e de obter o certificado, mesmo que o total ponderado global seja, de outro modo, suficientemente elevado.

As atividades podem ser de 2 tipos:
* **Atividade presencial** (ou atividade em pessoa), em que as notas têm de ser importadas de outra fonte
* **Atividade em linha** selecionada a partir do curso, em que as notas são obtidas através da realização da atividade no curso

O Chamilo calcula a nota global de cada formando com base nestes pesos.

## Configurar a Avaliação

1. Abra a ferramenta **Avaliações** <img src="/.gitbook/assets/icons/mdi-certificate.svg" alt="Gradebook" data-size="line"> a partir da página inicial do curso
2. Verá a vista geral das avaliações, inicialmente vazia

### Adicionar Atividades

1. Clique em **Adicionar atividade em linha**
2. Escolha o tipo:
   * **Teste** — Associar um exercício específico do curso
   * **Trabalho** — Associar uma pasta de publicação de estudantes
   * **Percurso de aprendizagem** — Associar a conclusão de um percurso de aprendizagem
   * **Assiduidade** — Associar uma folha de assiduidade
   * **Tópico de fórum** — Associar um tópico de fórum (que tem de ser classificado manualmente)
   * **Inquérito** — Associar um inquérito
3. Selecione a atividade específica dentro do tipo escolhido
4. Defina o **Peso** desta atividade (p. ex., 30% para o exame intermédio, 40% para o projeto final)
5. Defina a **Pontuação mínima**, se aplicável
6. Guarde

O peso total de todas as atividades deve somar 100%.

### Subcategorias

Para esquemas de classificação complexos, pode criar **subcategorias** para agrupar atividades relacionadas:

* **Exemplo**: Uma subcategoria «Trabalhos de casa» (peso: 30%) contendo cinco trabalhos individuais, cada um valendo 20% da subcategoria
* As subcategorias permitem organizar a avaliação de forma hierárquica, mantendo o cálculo global simples

## Visualizar Notas

![A tabela de vista geral do livro de notas mostrando nomes dos formandos, pontuações das atividades e totais ponderados](/.gitbook/assets/gradebook-overview.png)

A avaliação mostra uma tabela com:

* O nome de cada formando
* Pontuações de cada atividade
* O total ponderado
* Se o formando se qualifica para um certificado

Pode ordenar por qualquer coluna para identificar rapidamente os melhores desempenhos ou os formandos com dificuldades.

### Gráficos de Distribuição de Pontuações

Abaixo da tabela, e na página **Vista gráfica**, a avaliação desenha um gráfico de barras
por atividade mais um para o total. Cada gráfico é um gráfico de colunas: o
eixo horizontal lista os seus intervalos de pontuação do mais baixo ao mais alto, e a
altura de cada barra é o número de formandos nesse intervalo.

O gráfico **Total** também marca a média da turma. Um ponto vermelho situa-se no intervalo
que contém a média, e a legenda indica a percentagem exata.

Estes gráficos aparecem apenas quando as regras de apresentação de pontuação estão definidas. Se vir a
mensagem *To view graph score rule must be enabled*, defina primeiro os seus intervalos
nas definições de pontuação da avaliação.

## Certificados

Para ativar a geração de certificados:

1. Nas definições da avaliação, defina uma **pontuação mínima de certificação** (p. ex., 70%)
2. Quando o total ponderado de um formando atinge ou ultrapassa este limiar (e não falhou nenhuma pontuação mínima por atividade), pode descarregar o certificado
3. O certificado é gerado a partir de um modelo configurado pelo administrador da plataforma

Quando **Gerar certificados** está ativado na categoria raiz, aparece um campo **Validade do certificado (dias)**. Deixe-o em `0` para certificados que nunca expiram, ou defina um número de dias após o qual o certificado expira — o Chamilo pode então lembrar os formandos à medida que essa data de expiração se aproxima, automaticamente (cron, configurado pelo administrador) ou manualmente a partir da lista de certificados.

![O diálogo de edição da categoria com Gerar certificados ativado e o campo Validade do certificado (dias) definido para 365](/.gitbook/assets/gradebook-certificate-validity-field.png)

Consulte [Certificados e Competências](../tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry) para mais pormenores.

## Ligação a Competências

Pode associar **competências** (*skills*) à avaliação. Quando um formando atinge os objetivos definidos para concluir a avaliação, pode obter um certificado, uma competência ou ambos. As competências são visíveis no perfil, no espaço da rede social. Isto constrói um registo de competências ao longo do tempo.

## Exportação de Notas

Clique no botão **Exportar** <img src="/.gitbook/assets/icons/mdi-export.svg" alt="Exportar" data-size="line"> para descarregar as notas como uma folha de cálculo. Isto é útil para:

* Partilhar notas com sistemas administrativos
* Realizar análises adicionais fora do Chamilo
* Manter registos offline

## Dicas

* **Planeie os pesos com antecedência** — Defina o esquema de classificação no início do curso para que os formandos saibam o que esperar
* **Utilize subcategorias em cursos complexos** — Agrupe trabalhos, questionários e participação em categorias claras
* **Defina limiares de aprovação significativos** — A pontuação de certificação deve refletir a competência real, e não apenas a participação
* **Verifique regularmente** — Reveja o livro de notas periodicamente para garantir que todas as atividades estão corretamente associadas e que as pontuações estão a ser registadas