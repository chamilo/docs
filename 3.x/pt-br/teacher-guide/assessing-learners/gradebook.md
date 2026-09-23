# Avaliações

As avaliações (anteriormente *gradebook*) agregam pontuações de exercícios, tarefas e outras atividades avaliadas em uma visão unificada do desempenho de cada aluno. Também controlam a geração de certificados.

## Como as Avaliações Funcionam

As avaliações são sistemas de pontuação ponderada. Você define:

1. **Quais atividades** contribuem para a nota (exercícios, tarefas, frequência etc.)
2. **O peso** de cada atividade (quanto ela conta para a nota final)
3. **A pontuação mínima para certificação** (o limiar para obter um certificado)
4. **Uma pontuação mínima por atividade** — Cada atividade no boletim pode ter sua própria **Pontuação mínima**. Alunos que pontuarem abaixo desse mínimo em uma atividade-chave podem ser impedidos de atingir os objetivos e obter o certificado, mesmo que o total ponderado geral seja, de outro modo, suficientemente alto.

As atividades podem ser de 2 tipos:
* **Atividade presencial** (ou atividade em sala de aula), em que as notas precisam ser importadas de outra fonte
* **Atividade online** selecionada no curso, em que as notas são obtidas pelo cumprimento da atividade no curso

O Chamilo calcula a nota geral de cada aluno com base nesses pesos.

## Configurando a Avaliação

1. Abra a ferramenta **Avaliações** <img src="../../.gitbook/assets/icons/mdi-certificate.svg" alt="Boletim" data-size="line"> na página inicial do curso
2. Você verá a visão geral das avaliações, inicialmente vazia

### Adicionando Atividades

1. Clique em **Adicionar atividade online**
2. Escolha o tipo:
   * **Teste** — Vincular um exercício específico do curso
   * **Tarefa** — Vincular uma pasta de publicação do aluno
   * **Percurso de aprendizagem** — Vincular a conclusão do percurso de aprendizagem
   * **Frequência** — Vincular uma folha de frequência
   * **Tópico do fórum** — Vincular um tópico do fórum (que precisa ser avaliado manualmente)
   * **Questionário** — Vincular um questionário
3. Selecione a atividade específica dentro do tipo escolhido
4. Defina o **Peso** desta atividade (por exemplo, 30% para a prova intermediária, 40% para o projeto final)
5. Defina a **Pontuação mínima**, se aplicável
6. Salve

O peso total de todas as atividades deve somar 100%.

### Subcategorias

Para esquemas de avaliação complexos, você pode criar **subcategorias** para agrupar atividades relacionadas:

* **Exemplo**: Uma subcategoria "Trabalho de casa" (peso: 30%) contendo cinco tarefas individuais, cada uma valendo 20% da subcategoria
* As subcategorias permitem organizar a avaliação de forma hierárquica, mantendo o cálculo geral simples

## Visualizando as Notas

![A tabela de visão geral do boletim mostrando nomes dos alunos, pontuações das atividades e totais ponderados](../../.gitbook/assets/gradebook-overview.png)

A avaliação mostra uma tabela com:

* O nome de cada aluno
* Pontuações de cada atividade
* O total ponderado
* Se o aluno se qualifica para um certificado

Você pode ordenar por qualquer coluna para identificar rapidamente os melhores desempenhos ou os alunos com dificuldades.

### Gráficos de Distribuição de Pontuações

Abaixo da tabela, e na página **Visão gráfica**, a avaliação desenha um gráfico de barras
por atividade, mais um para o total. Cada gráfico é um gráfico de colunas: o
eixo horizontal lista seus intervalos de pontuação, do mais baixo ao mais alto, e a
altura de cada barra é o número de alunos naquele intervalo.

O gráfico **Total** também marca a média da turma. Um ponto vermelho fica no intervalo
que contém a média, e a legenda informa o percentual exato.

Esses gráficos aparecem somente quando as regras de exibição de pontuação estão definidas. Se você vir a
mensagem *To view graph score rule must be enabled*, defina primeiro seus intervalos
nas configurações de pontuação da avaliação.

## Certificados

Para habilitar a geração de certificados:

1. Nas configurações da avaliação, defina uma **pontuação mínima para certificação** (por exemplo, 70%)
2. Quando o total ponderado de um aluno atinge ou ultrapassa esse limiar (e ele não falhou em nenhuma pontuação mínima por atividade), ele pode baixar o certificado
3. O certificado é gerado a partir de um modelo configurado pelo administrador da plataforma

Quando **Gerar certificados** está habilitado na categoria raiz, aparece o campo **Validade do certificado (dias)**. Deixe em `0` para certificados que nunca expiram, ou defina um número de dias após o qual o certificado expira — o Chamilo pode então lembrar os alunos à medida que essa data se aproxima, automaticamente (cron, configurado pelo administrador) ou manualmente a partir da lista de certificados.

![O diálogo de edição da categoria com Gerar certificados habilitado e o campo Validade do certificado (dias) definido como 365](../../.gitbook/assets/gradebook-certificate-validity-field.png)

Consulte [Certificados e Competências](../tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry) para mais detalhes.

## Vinculação a Competências

Você pode associar **competências** (*skills*) à avaliação. Quando um aluno atinge os objetivos definidos para concluir a avaliação, ele pode obter um certificado, uma competência ou ambos. As competências ficam visíveis no perfil, no espaço da rede social. Isso constrói um registro de competências ao longo do tempo.

## Exportando Notas

Clique no botão **Exportar** <img src="../../.gitbook/assets/icons/mdi-export.svg" alt="Exportar" data-size="line"> para baixar as notas como uma planilha. Isso é útil para:

* Compartilhar notas com sistemas administrativos
* Realizar análises adicionais fora do Chamilo
* Manter registros offline

## Dicas

* **Planeje os pesos com antecedência** — Defina o esquema de avaliação no início do curso para que os alunos saibam o que esperar
* **Use subcategorias em cursos complexos** — Agrupe tarefas, questionários e participação em categorias claras
* **Defina limiares de aprovação significativos** — A pontuação de certificação deve refletir competência real, e não apenas participação
* **Verifique regularmente** — Revise o boletim periodicamente para garantir que todas as atividades estejam corretamente vinculadas e que as pontuações estejam sendo registradas