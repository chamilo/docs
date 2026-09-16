# Avaliações

As avaliações (anteriormente *gradebook*) agregam pontuações de exercícios, tarefas e outras atividades avaliadas em uma visão unificada do desempenho de cada aluno. Também controlam a geração de certificados.

## Como Funcionam as Avaliações

As avaliações são sistemas de pontuação ponderada. Você define:

1. **Quais atividades** contribuem para a nota (exercícios, tarefas, presença, etc.)
2. **O peso** de cada atividade (quanto ela conta para a nota final)
3. **A pontuação mínima para certificação** (o limite para obter um certificado)
4. **Uma pontuação mínima por atividade** — Cada atividade no livro de notas pode ter sua própria **Pontuação mínima**. Alunos que obtiverem pontuação abaixo desse mínimo em uma atividade-chave podem ser impedidos de alcançar os objetivos e obter o certificado, mesmo que sua pontuação total ponderada seja suficientemente alta.

As atividades podem ser de 2 tipos:
* **Atividade em sala de aula** (ou atividade presencial), onde as notas precisam ser importadas de alguma outra fonte
* **Atividade online** selecionada do curso, onde as notas são obtidas por meio da realização da atividade no curso

O Chamilo calcula a nota geral de cada aluno com base nesses pesos.

## Configurando a Avaliação

1. Abra a ferramenta **Avaliações** <img src="/.gitbook/assets/icons/mdi-certificate.svg" alt="Livro de Notas" data-size="line"> na página inicial do curso
2. Você verá a visão geral das avaliações, inicialmente vazia

### Adicionando Atividades

1. Clique em **Adicionar atividade online**
2. Escolha o tipo:
   * **Teste** — Vincule um exercício específico do curso
   * **Tarefa** — Vincule uma pasta de publicações dos alunos
   * **Caminho de aprendizagem** — Vincule a conclusão de um caminho de aprendizagem
   * **Presença** — Vincule uma folha de presença
   * **Tópico do fórum** — Vincule um tópico do fórum (que deve ser avaliado manualmente)
   * **Pesquisa** — Vincule uma pesquisa
3. Selecione a atividade específica dentro do tipo escolhido
4. Defina o **Peso** para esta atividade (por exemplo, 30% para o exame intermediário, 40% para o projeto final)
5. Defina a **Pontuação mínima**, se aplicável
6. Salve

O peso total de todas as atividades deve somar 100%.

### Subcategorias

Para esquemas de avaliação complexos, você pode criar **subcategorias** para agrupar atividades relacionadas:

* **Exemplo**: Uma subcategoria "Tarefas" (peso: 30%) contendo cinco tarefas individuais, cada uma valendo 20% da subcategoria
* As subcategorias permitem organizar a avaliação de forma hierárquica, mantendo o cálculo geral simples

## Visualizando Notas

![A tabela de visão geral do livro de notas mostrando nomes dos alunos, pontuações das atividades e totais ponderados](/.gitbook/assets/gradebook-overview.png)

A avaliação exibe uma tabela com:

* O nome de cada aluno
* Pontuações para cada atividade
* O total ponderado
* Se o aluno se qualifica para um certificado

Você pode ordenar por qualquer coluna para identificar rapidamente os melhores desempenhos ou os alunos com dificuldades.

## Certificados

Para habilitar a geração de certificados:

1. Nas configurações de avaliação, defina uma **pontuação mínima para certificação** (por exemplo, 70%)
2. Quando o total ponderado de um aluno atingir ou exceder esse limite (e ele não tiver falhado em nenhuma pontuação mínima por atividade), ele poderá baixar seu certificado
3. O certificado é gerado a partir de um modelo configurado pelo administrador da plataforma

Consulte [Certificados e Habilidades](../tracking-and-reporting/certificates-and-skills.md) para mais detalhes.

## Vinculando a Habilidades

Você pode associar **habilidades** à avaliação. Quando um aluno atinge os objetivos definidos para completar a avaliação, ele pode receber um certificado, uma habilidade ou ambos. As habilidades são visíveis no perfil do aluno no espaço da rede social. Isso constrói um registro de competências ao longo do tempo.

## Exportando Notas

Clique no botão **Exportar** <img src="/.gitbook/assets/icons/mdi-export.svg" alt="Exportar" data-size="line"> para baixar as notas como uma planilha. Isso é útil para:

* Compartilhar notas com sistemas administrativos
* Realizar análises adicionais fora do Chamilo
* Manter registros offline

## Dicas

* **Planeje os pesos com antecedência** — Defina o esquema de avaliação no início do curso para que os alunos saibam o que esperar
* **Use subcategorias para cursos complexos** — Agrupe tarefas, questionários e participação em categorias claras
* **Defina limites de aprovação significativos** — A pontuação para certificação deve refletir competência real, não apenas participação
* **Verifique regularmente** — Revise o livro de notas periodicamente para garantir que todas as atividades estejam corretamente vinculadas e que as pontuações estejam sendo registradas