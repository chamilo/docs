# Exercícios

A ferramenta de exercícios (também chamada de "testes") permite criar questionários e exames com correção automática. O Chamilo suporta uma grande variedade de tipos de pergunta, desde escolha múltipla simples até perguntas interativas de hotspot.

## Criar um Exercício

1. Abra a ferramenta **Exercícios** <img src="/.gitbook/assets/icons/mdi-order-bool-ascending-variant.svg" alt="Exercícios" data-size="line"> a partir da página inicial do curso
2. Clique em **Novo exercício**
3. Introduza um **título** e, opcionalmente, uma **descrição**
4. Configure as definições do exercício (ver abaixo)
5. Guarde e, em seguida, adicione perguntas

## Definições do Exercício

![O painel de definições do exercício com opções de apresentação, tempo, tentativas e feedback](/.gitbook/assets/exercise-settings.png)

### Apresentação e Navegação

| Setting | Options | Description |
|---------|---------|-------------|
| **Question layout** | All on one page / One per page | Show all questions at once or one at a time |
| **Hide question titles** | Yes / No | Whether to show question titles to learners |
| **Show previous button** | Yes / No | Allow learners to go back to previous questions |
| **Prevent backwards navigation** | Yes / No | Force learners to answer in order without going back |

Wait - I must translate table content too except code. The headers Setting, Options, Description should be translated. The Options column has English values that are UI options - I should translate them as they're documentation of settings.

Let me redo the tables properly in Portuguese.

| Definição | Opções | Descrição |
|-----------|--------|-----------|
| **Disposição das perguntas** | Todas numa página / Uma por página | Mostrar todas as perguntas de uma vez ou uma de cada vez |
| **Ocultar títulos das perguntas** | Sim / Não | Se os títulos das perguntas devem ser mostrados aos formandos |
| **Mostrar botão anterior** | Sim / Não | Permitir que os formandos voltem às perguntas anteriores |
| **Impedir navegação para trás** | Sim / Não | Obrigar os formandos a responder por ordem, sem voltar atrás |

### Tempo e Disponibilidade

| Definição | Descrição |
|-----------|-----------|
| **Limite de tempo** | Tempo máximo (em minutos) para concluir o exercício. É apresentado um temporizador de contagem decrescente ao formando |
| **Data de início** | Quando o exercício fica disponível para os formandos |
| **Data de fim** | Quando o exercício deixa de estar disponível |

### Tentativas e Pontuação

| Definição | Descrição |
|-----------|-----------|
| **Número máximo de tentativas** | Quantas vezes um formando pode realizar o exercício (0 = ilimitado) |
| **Percentagem de aprovação** | A pontuação mínima para aprovar (por exemplo, 70%). Os formandos que não atingirem este limiar veem uma mensagem de reprovação |
| **Propagar pontuação negativa** | Se os pontos negativos em perguntas individuais reduzem a pontuação total abaixo de zero |

### Feedback

| Definição | Opções |
|-----------|--------|
| **No final** | Mostrar resultados e respostas corretas depois de o formando submeter |
| **Imediato** | Mostrar feedback após cada pergunta (útil para exercícios de aprendizagem) |
| **Modo exame** | Não mostrar qualquer feedback ou resultados |

### Apresentação dos Resultados

Controle o que os formandos veem após concluir o exercício:

* Mostrar pontuação e respostas esperadas
* Mostrar apenas a pontuação
* Mostrar pontuação com desagregação por categoria
* Mostrar classificação relativamente aos outros formandos
* Mostrar apenas na última tentativa
* Mostrar visualização em gráfico radar

### Mensagens de Conclusão

* **Mensagem de sucesso** — Texto personalizado mostrado quando o formando aprova
* **Mensagem de reprovação** — Texto personalizado mostrado quando o formando não atinge a percentagem de aprovação

### Aleatorização das Perguntas

| Definição | Descrição |
|-----------|-----------|
| **Ordem aleatória das perguntas** | Baralhar a ordem das perguntas em cada tentativa |
| **Respostas aleatórias** | Baralhar as opções de resposta em cada pergunta |
| **Aleatório por categoria** | Selecionar perguntas aleatórias de cada categoria de perguntas |

Também pode configurar estratégias avançadas de seleção que combinam categorias e aleatorização.

## Tipos de Pergunta

![Visão geral dos tipos de pergunta disponíveis na interface de criação de exercícios](/.gitbook/assets/exercise-question-types.png)

O Chamilo oferece um conjunto rico de tipos de pergunta organizados em várias categorias:

### Escolha Única

* **Escolha múltipla (resposta única)** — O formando seleciona uma resposta correta a partir de uma lista de opções
* **Resposta única com imagens** — Igual ao anterior, mas as opções de resposta são apresentadas como imagens

### Escolha Múltipla

* **Resposta múltipla** — O formando seleciona uma ou mais respostas corretas
* **Resposta múltipla (lista pendente)** — As opções de resposta são apresentadas como menus pendentes
* **Verdadeiro/Falso** — Uma série de afirmações que o formando marca como verdadeiras ou falsas
* **Verdadeiro/Falso com grau de certeza** — Verdadeiro/falso com um nível adicional de confiança, permitindo uma pontuação mais nuançada

### Preencher os Espaços

* **Preencher os espaços** — O formando completa as palavras em falta num texto. Define os espaços e as respostas aceites ao criar a pergunta.

### Correspondência

* **Correspondência** — O formando liga itens de duas colunas
* **Correspondência (arrastável)** — O mesmo conceito, mas com uma interface de arrastar e largar
* **Arrastável** — Arrastar itens para as posições corretas

### Resposta Aberta

* **Resposta livre (dissertação)** — O formando escreve uma resposta em texto. Requer correção manual (ou correção assistida por IA, se configurada)
* **Expressão oral** — O formando grava uma resposta em áudio com o microfone
* **Carregar resposta** — O formando carrega um ficheiro como resposta

### Hotspot

* **Hotspot** — O formando clica em áreas específicas de uma imagem para responder
* **Delineação de hotspot** — O formando desenha limites em torno de áreas numa imagem

### Calculada

* **Resposta calculada** — Perguntas numéricas com uma fórmula e um intervalo de tolerância. Útil para cursos de matemática e ciências.

### Especiais

* **Compreensão de leitura** — Testes baseados na leitura de um texto
* **Anotação** — O professor carrega uma imagem e o formando anota-a
* **Resposta em documento Office** — Quando o plugin OnlyOffice está ativado, o formando responde à pergunta editando um documento Office incorporado (Word, Excel, PowerPoint). A resposta é guardada como um ficheiro separado no exercício, para poder ser revista juntamente com o resto da tentativa.

## Adicionar perguntas a um exercício

1. Abra o exercício e clique em **Adicionar uma pergunta**
2. Selecione o tipo de pergunta
3. Introduza o **texto da pergunta** (suporta texto rico com imagens e formatação)
4. Defina as **respostas** e a respetiva pontuação:
   * Para cada opção de resposta, indique se está correta e quantos pontos vale
   * Pode atribuir pontos negativos a respostas erradas para desencorajar o palpite
5. Opcionalmente, adicione **feedback** — explicações mostradas ao formando após responder
6. Defina o **nível de dificuldade** e a **categoria** (úteis para seleção aleatória e relatórios)
7. Guarde

## Categorias de perguntas

Pode organizar as perguntas em categorias (por exemplo, "Módulo 1", "Vocabulário", "Avançado"). As categorias são úteis para:

* Organizar grandes bancos de perguntas
* Permitir seleção aleatória por categoria (por exemplo, "5 perguntas do Módulo 1, 3 do Módulo 2")
* Ver pontuações desagregadas por categoria nos relatórios

## Reutilização de perguntas

As perguntas podem ser reutilizadas em exercícios do mesmo curso. Ao adicionar uma pergunta, pode criar uma nova ou selecionar uma existente no banco de perguntas.

## Importar exercícios

O Chamilo permite importar exercícios a partir de formatos externos:

* **IMS QTI / Common Cartridge** — O formato padrão de questionários de e-learning
* **Formato Moodle** — Importar questionários a partir de exportações do Moodle

Para importar, procure a opção **Importar** na ferramenta de exercícios e carregue o ficheiro.

## Dicas

* **Misture tipos de pergunta** — Combine escolha múltipla, preenchimento de espaços e perguntas abertas para uma avaliação abrangente
* **Utilize categorias** — Organize as perguntas por tema para permitir seleção aleatória direcionada
* **Defina uma percentagem de aprovação** — Dê aos formandos um objetivo claro e associe-o à geração de certificados através do Gradebook
* **Use feedback imediato para prática** — Crie exercícios de prática sem classificação com feedback imediato para ajudar os formandos a aprender com os erros
* **Aleatorize para integridade** — Ative a ordem aleatória das perguntas e das respostas para reduzir a possibilidade de cópia