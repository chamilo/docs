# Exercícios

A ferramenta de exercícios (também chamada de "testes") permite criar questionários e exames com correção automática. O Chamilo suporta uma ampla variedade de tipos de perguntas, desde escolha múltipla simples até perguntas interativas de hotspot.

## Criando um Exercício

1. Abra a ferramenta **Exercícios** <img src="/.gitbook/assets/icons/mdi-order-bool-ascending-variant.svg" alt="Exercícios" data-size="line"> na página inicial do curso
2. Clique em **Novo exercício**
3. Insira um **título** e uma **descrição** opcional
4. Configure as definições do exercício (veja abaixo)
5. Salve e, em seguida, adicione perguntas

## Configurações do Exercício

![O painel de configurações do exercício com opções de exibição, tempo, tentativas e feedback](/.gitbook/assets/exercise-settings.png)

### Exibição e Navegação

| Configuração | Opções | Descrição |
|--------------|--------|-----------|
| **Layout da pergunta** | Todas em uma página / Uma por página | Mostrar todas as perguntas de uma vez ou uma de cada vez |
| **Ocultar títulos das perguntas** | Sim / Não | Definir se os títulos das perguntas serão exibidos aos alunos |
| **Mostrar botão anterior** | Sim / Não | Permitir que os alunos voltem para perguntas anteriores |
| **Impedir navegação para trás** | Sim / Não | Forçar os alunos a responderem na ordem, sem voltar atrás |

### Tempo e Disponibilidade

| Configuração | Descrição |
|--------------|-----------|
| **Limite de tempo** | Tempo máximo (em minutos) para completar o exercício. Um temporizador regressivo é exibido ao aluno |
| **Data de início** | Quando o exercício fica disponível para os alunos |
| **Data de término** | Quando o exercício deixa de estar disponível |

### Tentativas e Pontuação

| Configuração | Descrição |
|--------------|-----------|
| **Número máximo de tentativas** | Quantas vezes um aluno pode realizar o exercício (0 = ilimitado) |
| **Percentual de aprovação** | A pontuação mínima para passar (por exemplo, 70%). Alunos que não atingirem esse limite verão uma mensagem de reprovação |
| **Propagar pontuação negativa** | Se pontos negativos em perguntas individuais reduzem a pontuação total abaixo de zero |

### Feedback

| Configuração | Opções |
|--------------|--------|
| **No final** | Mostrar resultados e respostas corretas após o aluno enviar |
| **Imediato** | Mostrar feedback após cada pergunta (útil para exercícios de aprendizado) |
| **Modo exame** | Não mostrar nenhum feedback ou resultado |

### Exibição de Resultados

Controle o que os alunos veem após completar o exercício:

* Mostrar pontuação e respostas esperadas
* Mostrar apenas a pontuação
* Mostrar pontuação com detalhamento por categoria
* Mostrar classificação entre outros alunos
* Mostrar apenas na última tentativa
* Mostrar visualização em gráfico de radar

### Mensagens de Conclusão

* **Mensagem de sucesso** — Texto personalizado exibido quando o aluno é aprovado
* **Mensagem de reprovação** — Texto personalizado exibido quando o aluno não atinge o percentual de aprovação

### Randomização de Perguntas

| Configuração | Descrição |
|--------------|-----------|
| **Ordem aleatória de perguntas** | Embaralhar a ordem das perguntas a cada tentativa |
| **Respostas aleatórias** | Embaralhar as opções de resposta dentro de cada pergunta |
| **Aleatório por categoria** | Selecionar perguntas aleatórias de cada categoria de perguntas |

Você também pode configurar estratégias avançadas de seleção que combinam categorias e randomização.

## Tipos de Perguntas

![Visão geral dos tipos de perguntas disponíveis na interface de criação de exercícios](/.gitbook/assets/exercise-question-types.png)

O Chamilo oferece um conjunto rico de tipos de perguntas organizados em várias categorias:

### Escolha Única

* **Escolha múltipla (resposta única)** — O aluno seleciona uma resposta correta de uma lista de opções
* **Resposta única com imagens** — Igual ao anterior, mas as opções de resposta são exibidas como imagens

### Escolha Múltipla

* **Resposta múltipla** — O aluno seleciona uma ou mais respostas corretas
* **Resposta múltipla (menu suspenso)** — As opções de resposta são apresentadas como menus suspensos
* **Verdadeiro/Falso** — Uma série de afirmações que o aluno marca como verdadeiro ou falso
* **Verdadeiro/Falso com grau de certeza** — Verdadeiro/falso com um nível adicional de confiança, permitindo uma pontuação mais nuançada

### Preenchimento de Lacunas

* **Preenchimento de lacunas** — O aluno completa palavras ausentes em um texto. Você define as lacunas e as respostas aceitas ao criar a pergunta.

### Correspondência

* **Correspondência** — O aluno conecta itens de duas colunas
* **Correspondência (arrastável)** — Mesmo conceito, mas com uma interface de arrastar e soltar
* **Arrastável** — Arrastar itens para as posições corretas

### Resposta Aberta

* **Resposta livre (dissertação)** — O aluno escreve uma resposta em texto. Requer correção manual (ou correção assistida por IA, se configurada)
* **Expressão oral** — O aluno grava uma resposta em áudio usando seu microfone
* **Enviar resposta** — O aluno envia um arquivo como resposta

### Hotspot

* **Hotspot** — O aluno clica em áreas específicas de uma imagem para responder
* **Delimitação de hotspot** — O aluno desenha contornos ao redor de áreas em uma imagem

### Calculado

* **Resposta calculada** — Perguntas numéricas com uma fórmula e faixa de tolerância. Útil para cursos de matemática e ciências.

---
### Especial

* **Compreensão de leitura** — Testes baseados na leitura de um trecho
* **Anotação** — O professor carrega uma imagem e o aluno a anota
* **Resposta em documento Office** — Quando o plugin OnlyOffice está ativado, o aluno responde à pergunta editando um documento Office incorporado (Word, Excel, PowerPoint). A resposta é salva como um arquivo separado no exercício, para que possa ser revisada junto com o restante da tentativa.

## Adicionando Perguntas a um Exercício

1. Abra o exercício e clique em **Adicionar uma pergunta**
2. Selecione o tipo de pergunta
3. Insira o **texto da pergunta** (suporta texto rico com imagens e formatação)
4. Defina as **respostas** e sua pontuação:
   * Para cada opção de resposta, especifique se está correta e quantos pontos vale
   * Você pode atribuir pontos negativos a respostas erradas para desencorajar palpites
5. Opcionalmente, adicione **feedback** — explicações mostradas ao aluno após responder
6. Defina o **nível de dificuldade** e a **categoria** (útil para seleção aleatória e relatórios)
7. Salve

## Categorias de Perguntas

Você pode organizar perguntas em categorias (por exemplo, "Módulo 1", "Vocabulário", "Avançado"). As categorias são úteis para:

* Organizar grandes bancos de perguntas
* Habilitar a seleção aleatória por categoria (por exemplo, "5 perguntas do Módulo 1, 3 do Módulo 2")
* Visualizar pontuações detalhadas por categoria nos relatórios

## Reutilização de Perguntas

As perguntas podem ser reutilizadas em diferentes exercícios dentro do mesmo curso. Ao adicionar uma pergunta, você pode optar por criar uma nova ou selecionar uma pergunta existente no banco de perguntas.

## Importando Exercícios

Chamilo suporta a importação de exercícios de formatos externos:

* **IMS QTI / Common Cartridge** — O formato padrão de questionários de e-learning
* **Formato Moodle** — Importe questionários de exportações do Moodle

Para importar, procure a opção **Importar** na ferramenta de exercícios e faça o upload do seu arquivo.

## Dicas

* **Misture tipos de perguntas** — Combine múltipla escolha, preenchimento de lacunas e perguntas abertas para uma avaliação abrangente
* **Use categorias** — Organize perguntas por tópico para permitir a seleção aleatória direcionada
* **Defina uma porcentagem de aprovação** — Dê aos alunos uma meta clara e vincule-a à geração de certificados por meio do Gradebook
* **Use feedback imediato para prática** — Crie exercícios de prática não avaliados com feedback imediato para ajudar os alunos a aprenderem com seus erros
* **Randomize para integridade** — Ative a ordem aleatória de perguntas e respostas para reduzir a chance de cópia