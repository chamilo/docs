# Tutor de IA

O Tutor de IA é um chatbot integrado ao Chamilo com o qual os alunos podem interagir para obter respostas instantâneas geradas por IA. Ele funciona em dois contextos, com um foco diferente em cada um:

* **Dentro de um curso** — o Tutor de IA está focado nesse curso: respondendo a perguntas sobre o conteúdo, explicando conceitos abordados e orientando os alunos pelo material.
* **Fora de um curso** (na plataforma em geral) — o Tutor de IA trata, em vez disso, de perguntas genéricas sobre o uso da plataforma, como como encontrar algo ou usar um recurso, e não do conteúdo do curso.

## Como Funciona

Quando o Tutor de IA está habilitado para um curso, os alunos veem uma interface de chat na qual podem:

* **Fazer perguntas** sobre o conteúdo do curso
* **Obter explicações** de conceitos abordados no curso
* **Receber orientação** sem esperar a resposta do professor

Dentro de um curso, o Tutor de IA usa o contexto desse curso para fornecer respostas relevantes. Ele foi concebido para complementar o seu ensino, não para substituí-lo.

## Habilitando o Tutor de IA

O Tutor de IA exige dois níveis de configuração:

1. **Nível da plataforma** — O administrador deve habilitar os auxiliares de IA e configurar pelo menos um provedor de IA (consulte [Configuração de IA](../../admin-guide/integrations/ai-configuration.md))
2. **Nível do curso** — O Tutor de IA deve ser habilitado nas configurações do curso (um simples interruptor liga/desliga). O provedor usado no chat é o configurado pelo administrador.

## A Interface de Chat

![A interface de chat do Tutor de IA mostrando uma conversa entre um aluno e a IA](/.gitbook/assets/ai-tutor-chat.png)

O Tutor de IA aparece como um **painel de chat acoplado** dentro do curso. Os alunos podem:

* Digitar mensagens e receber respostas geradas por IA
* Ver o histórico da conversa
* Redefinir a conversa para começar do zero

A interface de chat mostra a troca entre o aluno e a IA em um formato de mensagens familiar.

## Comportamento Importante

* **Limitado ao local em que é aberto** — Dentro de um curso, o Tutor de IA responde apenas sobre aquele curso; aberto fora de qualquer curso, passa a tratar de perguntas gerais sobre o uso da plataforma. O modo da plataforma inteira (fora do curso) é um interruptor separado que o administrador controla independentemente do interruptor por curso.
* **Desabilitado durante exames** — O Tutor de IA é automaticamente desabilitado quando um aluno está fazendo um exercício, para evitar cola
* **Conversa por aluno** — Cada aluno tem sua própria conversa privada com o Tutor de IA, e o contexto do prompt inclui apenas as mensagens mais recentes
* **Failover de provedor** — Se o provedor configurado falhar, o Chamilo recorre a outro provedor disponível para que o chat continue funcionando

## Como Professor

Você deve estar ciente de que:

* O Tutor de IA pode nem sempre dar respostas perfeitas — incentive os alunos a verificar informações importantes
* Você pode revisar o uso do Tutor de IA por meio do rastreamento da plataforma
* O Tutor de IA é um complemento ao seu ensino, não um substituto. Use-o juntamente com fóruns, anúncios e mensagens diretas para um suporte abrangente aos alunos.

## Dicas

* **Defina expectativas** — Informe os alunos no início do curso que um Tutor de IA está disponível e explique como usá-lo de forma adequada
* **Incentive o pensamento crítico** — Lembre os alunos de pensar criticamente sobre as respostas geradas por IA
* **Use para perguntas frequentes** — O Tutor de IA é especialmente útil para lidar com perguntas comuns que, de outra forma, você responderia repetidamente