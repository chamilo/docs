# Exercícios

A ferramenta de exercícios (também chamada de "testes") permite criar questionários e provas com correção automática. O Chamilo oferece uma grande variedade de tipos de pergunta, desde múltipla escolha simples até perguntas interativas de hotspot.

## Criando um Exercício

1. Abra a ferramenta **Exercícios** <img src="../../.gitbook/assets/icons/mdi-order-bool-ascending-variant.svg" alt="Exercícios" data-size="line"> na página inicial do curso
2. Clique em **Novo exercício**
3. Informe um **título** e, opcionalmente, uma **descrição**
4. Configure as opções do exercício (veja abaixo)
5. Salve e, em seguida, adicione as perguntas

## Configurações do Exercício

![O painel de configurações do exercício com opções de exibição, tempo, tentativas e feedback](../../.gitbook/assets/exercise-settings.png)

### Exibição e Navegação

| Configuração | Opções | Descrição |
|---------|---------|-------------|
| **Layout das perguntas** | Todas em uma página / Uma por página | Exibir todas as perguntas de uma vez ou uma de cada vez |
| **Ocultar títulos das perguntas** | Sim / Não | Se os títulos das perguntas devem ser exibidos aos alunos |
| **Mostrar botão anterior** | Sim / Não | Permitir que os alunos voltem às perguntas anteriores |
| **Impedir navegação para trás** | Sim / Não | Obrigar os alunos a responderem na ordem, sem voltar |

### Tempo e Disponibilidade

| Configuração | Descrição |
|---------|-------------|
| **Limite de tempo** | Tempo máximo (em minutos) para concluir o exercício. Um cronômetro regressivo é exibido ao aluno |
| **Data de início** | Quando o exercício passa a estar disponível para os alunos |
| **Data de término** | Quando o exercício deixa de estar disponível |

### Tentativas e Pontuação

| Configuração | Descrição |
|---------|-------------|
| **Máximo de tentativas** | Quantas vezes um aluno pode realizar o exercício (0 = ilimitado) |
| **Percentual de aprovação** | A pontuação mínima para aprovação (por exemplo, 70%). Alunos que não atingirem esse limiar veem uma mensagem de reprovação |
| **Propagar pontuação negativa** | Se pontos negativos em perguntas individuais reduzem a pontuação total abaixo de zero |

### Feedback

| Configuração | Opções |
|---------|---------|
| **Ao final** | Mostrar resultados e respostas corretas depois que o aluno enviar |
| **Imediato** | Mostrar feedback após cada pergunta (útil para exercícios de aprendizagem) |
| **Modo exame** | Não mostrar nenhum feedback nem resultados |

### Exibição dos Resultados

Controle o que os alunos veem após concluir o exercício:

* Mostrar pontuação e respostas esperadas
* Mostrar apenas a pontuação
* Mostrar pontuação com detalhamento por categoria
* Mostrar classificação entre os demais alunos
* Mostrar somente na última tentativa
* Mostrar visualização em gráfico radar

### Mensagens de Conclusão

* **Mensagem de sucesso** — Texto personalizado exibido quando o aluno é aprovado
* **Mensagem de reprovação** — Texto personalizado exibido quando o aluno não atinge o percentual de aprovação

### Randomização das Perguntas

| Configuração | Descrição |
|---------|-------------|
| **Ordem aleatória das perguntas** | Embaralhar a ordem das perguntas a cada tentativa |
| **Respostas aleatórias** | Embaralhar as opções de resposta em cada pergunta |
| **Aleatório por categoria** | Selecionar perguntas aleatórias de cada categoria de perguntas |

Você também pode configurar estratégias avançadas de seleção que combinam categorias e randomização.

## Tipos de Pergunta

![Visão geral dos tipos de pergunta disponíveis na interface de criação de exercícios](../../.gitbook/assets/exercise-question-types.png)

O Chamilo oferece um conjunto rico de tipos de pergunta organizados em várias categorias:

### Escolha Única

* **Múltipla escolha (resposta única)** — O aluno seleciona uma resposta correta em uma lista de opções
* **Resposta única com imagens** — Igual ao anterior, mas as opções de resposta são exibidas como imagens

### Múltipla Escolha

* **Múltiplas respostas** — O aluno seleciona uma ou mais respostas corretas
* **Múltiplas respostas (lista suspensa)** — As opções de resposta são apresentadas como menus suspensos
* **Verdadeiro/Falso** — Uma série de afirmações que o aluno marca como verdadeiras ou falsas
* **Verdadeiro/Falso com grau de certeza** — Verdadeiro/falso com um nível adicional de confiança, permitindo pontuação mais nuançada

### Preencher Lacunas

* **Preencher as lacunas** — O aluno completa palavras que faltam em um texto. Você define as lacunas e as respostas aceitas ao criar a pergunta.

### Correspondência

* **Correspondência** — O aluno conecta itens de duas colunas
* **Correspondência (arrastável)** — O mesmo conceito, mas com interface de arrastar e soltar
* **Arrastável** — Arrastar itens para as posições corretas

### Abertas

* **Resposta livre (dissertação)** — O aluno escreve uma resposta em texto. Exige correção manual (ou correção assistida por IA, se configurada)
* **Expressão oral** — O aluno grava uma resposta em áudio usando o microfone
* **Enviar resposta** — O aluno envia um arquivo como resposta

### Hotspot

* **Hotspot** — O aluno clica em áreas específicas de uma imagem para responder
* **Delineação de hotspot** — O aluno desenha limites em torno de áreas em uma imagem

### Calculada

* **Resposta calculada** — Perguntas numéricas com fórmula e faixa de tolerância. Útil para cursos de matemática e ciências.

### Especiais

* **Compreensão de leitura** — Testes baseados na leitura de um trecho
* **Anotação** — O professor envia uma imagem e o aluno a anota
* **Resposta em documento Office** — Quando o plugin OnlyOffice está habilitado, o aluno responde à questão editando um documento Office incorporado (Word, Excel, PowerPoint). A resposta é salva como um arquivo separado no exercício, para que possa ser revisada junto com o restante da tentativa.

## Adicionando questões a um exercício

1. Abra o exercício e clique em **Adicionar uma questão**
2. Selecione o tipo de questão
3. Digite o **texto da questão** (suporta texto rico com imagens e formatação)
4. Defina as **respostas** e a pontuação:
   * Para cada opção de resposta, indique se está correta e quantos pontos vale
   * Você pode atribuir pontos negativos a respostas erradas para desencorajar o palpite
5. Opcionalmente, adicione **feedback** — explicações exibidas ao aluno após responder
6. Defina o **nível de dificuldade** e a **categoria** (úteis para seleção aleatória e relatórios)
7. Salve

## Categorias de questões

Você pode organizar as questões em categorias (por exemplo, "Módulo 1", "Vocabulário", "Avançado"). As categorias são úteis para:

* Organizar grandes bancos de questões
* Permitir seleção aleatória por categoria (por exemplo, "5 questões do Módulo 1, 3 do Módulo 2")
* Visualizar pontuações detalhadas por categoria nos relatórios

## Reutilização de questões

As questões podem ser reutilizadas em exercícios do mesmo curso. Ao adicionar uma questão, você pode criar uma nova ou selecionar uma questão existente no banco de questões.

## Importação de exercícios

O Chamilo permite importar exercícios de formatos externos:

* **IMS QTI / Common Cartridge** — O formato padrão de questionários de e-learning
* **Formato Moodle** — Importar questionários a partir de exportações do Moodle

Para importar, procure a opção **Importar** na ferramenta de exercícios e envie o arquivo.

## Dicas

* **Misture tipos de questão** — Combine múltipla escolha, preenchimento de lacunas e questões abertas para uma avaliação abrangente
* **Use categorias** — Organize as questões por tópico para permitir seleção aleatória direcionada
* **Defina um percentual de aprovação** — Dê aos alunos um alvo claro e vincule-o à geração de certificados pelo Gradebook
* **Use feedback imediato para prática** — Crie exercícios de prática sem nota, com feedback imediato, para ajudar os alunos a aprender com os erros
* **Randomize para integridade** — Ative ordem aleatória das questões e respostas aleatórias para reduzir a chance de cópia