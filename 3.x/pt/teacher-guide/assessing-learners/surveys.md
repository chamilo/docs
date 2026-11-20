# Inquéritos

A ferramenta de inquéritos permite criar questionários para recolher feedback dos seus formandos. Os inquéritos são úteis para avaliações de cursos, diagnósticos de necessidades e sondagens de opinião.

## Criar um inquérito

1. Abra a ferramenta **Inquéritos** <img src="/.gitbook/assets/icons/mdi-form-dropdown.svg" alt="Inquéritos" data-size="line"> a partir da página inicial do curso
2. Clique em **Criar inquérito**
3. Preencha os detalhes do inquérito:
   * **Código** — Este é um código único para o inquérito. Será utilizado em e-mails e ligações.
   * **Título** — O nome do inquérito
   * **Subtítulo** — Um cabeçalho secundário opcional
   * **Data de início** — A partir de quando este inquérito estará aberto à participação
   * **Data de fim** — Até quando este inquérito estará aberto à participação
   * **Anónimo** — Se as respostas são anónimas ou associadas a formandos individuais
   * **Visibilidade dos resultados** — Quem pode ver os resultados (apenas o tutor, tutor e estudantes, todos)
   * **Introdução** — Uma mensagem apresentada aos formandos antes de iniciarem o inquérito
   * **Mensagem de agradecimento** — Uma mensagem apresentada após a submissão
4. Guardar

### Definições avançadas

* **Classificar na ferramenta de avaliação** — Se o estado de resposta deste inquérito deve ser incluído na ferramenta de avaliação (gradebook). Quem tiver concluído o inquérito obtém 100%; os restantes obtêm 0%
* **Inquérito pai** — Não é realmente utilizado neste momento (funcionalidade legado)
* **Uma pergunta por página** — Estilo de apresentação das perguntas
* **Ativar modo de baralhamento** — Se as perguntas devem ser baralhadas
* **Mostrar número da pergunta** — Se devem ser mostrados os números das perguntas (gerados automaticamente)

## Adicionar perguntas

Depois de o inquérito ser criado, adicione perguntas:

1. Escolha o tipo de pergunta:
   * **Sim/Não** — Uma escolha binária simples
   * **Escolha múltipla** — Selecionar uma resposta entre várias opções
   * **Resposta múltipla** — Selecionar uma ou mais respostas entre várias opções
   * **Resposta aberta** — Resposta em texto livre
   * **Lista pendente** — Selecionar a partir de uma lista pendente
   * **Percentagem** — Escolher um valor percentual
   * **Pontuação** — Classificar numa escala numérica
   * **Comentário** — Um bloco de texto (não é uma pergunta) para adicionar instruções entre perguntas
   * **Escolha múltipla com opção «outro»** — Selecionar uma resposta entre várias opções, com uma escolha alternativa
   * **Apresentação seletiva** — Tipo especial que permite adaptar o fluxo de perguntas com base em respostas anteriores
   * **Quebra de página** — Adicionar quebras de página no fluxo das perguntas. Só é útil se «Uma pergunta por página» **não** tiver sido selecionado no passo anterior
2. Configure o texto da pergunta e as opções de resposta
3. Guardar

Cada pergunta pode ser marcada como obrigatória. Se não o fizer, saltar qualquer pergunta será um comportamento aceitável.

## Publicar um inquérito

Depois de adicionar todas as perguntas:

1. Clique em **Publicar**
2. Escolha os destinatários — Selecione formandos ou grupos específicos (é você quem os seleciona). O botão **Adicionar formandos** adiciona todos os formandos de uma só vez e deixa os professores de fora
3. Adicionar utilizadores adicionais — Permite convidar utilizadores de fora do Chamilo a participar no inquérito. Receberão um e-mail com uma ligação e aparecerão pelo endereço de e-mail nos detalhes do inquérito
4. Assunto do e-mail
5. Texto do e-mail — Explique do que trata o inquérito e quando/como responder
6. Estão disponíveis diferentes opções para repetir convites
7. Confirmar

Os formandos recebem um convite (por e-mail) para completar o inquérito.

Na parte inferior da página de publicação está disponível uma ligação para convidar ainda mais utilizadores externos a participar. Os participantes que utilizarem esta ligação não serão identificados e aparecerão como anónimos nos resultados do inquérito.

## Ver resultados

![Resultados do inquérito com gráficos e desagregações percentuais para cada pergunta](/.gitbook/assets/survey-results-charts.png)

Depois de os formandos terem respondido:

1. Abra o inquérito
2. Clique em **Resultados** ou **Relatório**
3. Consulte os resumos das respostas:
   * Gráficos e percentagens para perguntas fechadas
   * Respostas de texto individuais para perguntas abertas
   * Taxa de conclusão (quantos convidados responderam)

Pode exportar os resultados para uma folha de cálculo para análise posterior.

## Dicas

* **Mantenha-o curto** — Os formandos têm mais probabilidade de completar inquéritos mais curtos
* **Utilize o modo anónimo** — Para feedback honesto, ative as respostas anónimas
* **Escolha o momento certo** — Envie inquéritos a meio do curso para fazer ajustes, e não apenas avaliações de fim de curso