# Tutor de IA

O Tutor de IA é um chatbot integrado no Chamilo com o qual os formandos podem interagir para obter respostas instantâneas geradas por IA. Funciona em dois contextos, com um enfoque diferente em cada um:

* **Dentro de um curso** — o Tutor de IA está focado nesse curso: responde a perguntas sobre o seu conteúdo, explica conceitos que este aborda e orienta os formandos através do material.
* **Fora de um curso** (na plataforma em geral) — o Tutor de IA trata, em vez disso, de perguntas genéricas sobre a utilização da plataforma, como encontrar algo ou usar uma funcionalidade, e não de conteúdo de curso.

## Como Funciona

Quando o Tutor de IA está ativado para um curso, os formandos veem uma interface de chat onde podem:

* **Fazer perguntas** sobre o conteúdo do curso
* **Obter explicações** de conceitos abordados no curso
* **Receber orientação** sem esperar pela resposta do professor

Dentro de um curso, o Tutor de IA utiliza o contexto desse curso para fornecer respostas relevantes. Destina-se a complementar o seu ensino, não a substituí-lo.

## Ativar o Tutor de IA

O Tutor de IA requer dois níveis de configuração:

1. **Nível da plataforma** — O administrador deve ativar os assistentes de IA e configurar pelo menos um fornecedor de IA (consulte [Configuração de IA](../../admin-guide/integrations/ai-configuration.md))
2. **Nível do curso** — O Tutor de IA deve ser ativado nas definições do curso (um simples interruptor ligar/desligar). O fornecedor utilizado para o chat é o configurado pelo administrador.

## A Interface de Chat

![A interface de chat do Tutor de IA a mostrar uma conversa entre um formando e a IA](/.gitbook/assets/ai-tutor-chat.png)

O Tutor de IA aparece como um **painel de chat ancorado** dentro do curso. Os formandos podem:

* Escrever mensagens e receber respostas geradas por IA
* Ver o histórico da conversa
* Reiniciar a conversa para começar de novo

A interface de chat mostra a troca entre o formando e a IA num formato de mensagens familiar.

## Comportamento Importante

* **Limitado ao local onde é aberto** — Dentro de um curso, o Tutor de IA só responde sobre esse curso; aberto fora de qualquer curso, passa a tratar de perguntas gerais sobre a utilização da plataforma. O modo da plataforma (fora do curso) é um interruptor separado que o administrador controla independentemente do interruptor por curso.
* **Desativado durante exames** — O Tutor de IA é automaticamente desativado quando um formando está a realizar um exercício, para evitar fraude
* **Conversa por formando** — Cada formando tem a sua própria conversa privada com o Tutor de IA, e o contexto do prompt inclui apenas as mensagens mais recentes
* **Failover de fornecedor** — Se o fornecedor configurado falhar, o Chamilo recorre a outro fornecedor disponível para que o chat continue a funcionar

## Como Professor

Deve ter em conta que:

* O Tutor de IA pode nem sempre dar respostas perfeitas — incentive os formandos a verificar informações importantes
* Pode rever a utilização do Tutor de IA através do acompanhamento da plataforma
* O Tutor de IA é um complemento ao seu ensino, não um substituto. Utilize-o em conjunto com fóruns, anúncios e mensagens diretas para um apoio abrangente aos formandos.

## Dicas

* **Defina expectativas** — Informe os formandos no início do curso de que está disponível um Tutor de IA e explique como o utilizar de forma adequada
* **Incentive o pensamento crítico** — Recorde aos formandos que devem pensar de forma crítica sobre as respostas geradas por IA
* **Utilize para perguntas frequentes** — O Tutor de IA é especialmente útil para tratar perguntas comuns que, de outro modo, teria de responder repetidamente