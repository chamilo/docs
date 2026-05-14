# Tutor de IA

O Tutor de IA é um chatbot integrado ao Chamilo que os alunos podem usar para fazer perguntas relacionadas ao curso. Ele fornece respostas instantâneas e contextuais, alimentadas por um modelo de linguagem avançado.

## Como Funciona

Quando o Tutor de IA está ativado para um curso, os alunos veem uma interface de chat onde podem:

* **Fazer perguntas** sobre o conteúdo do curso
* **Obter explicações** sobre conceitos abordados no curso
* **Receber orientação** sem precisar esperar pela resposta do professor

O Tutor de IA utiliza o contexto do curso para fornecer respostas relevantes. Ele foi projetado para complementar seu ensino, não para substituí-lo.

## Ativando o Tutor de IA

O Tutor de IA exige dois níveis de configuração:

1. **Nível da plataforma** — O administrador deve habilitar os assistentes de IA e configurar pelo menos um provedor de IA (consulte [Configuração de IA](../../admin-guide/integrations/ai-configuration.md))
2. **Nível do curso** — O Tutor de IA deve ser ativado nas configurações do curso (uma simples opção de ligar/desligar). O provedor utilizado para o chat é aquele configurado pelo administrador.

## A Interface de Chat

![A interface de chat do Tutor de IA mostrando uma conversa entre um aluno e a IA](/.gitbook/assets/ai-tutor-chat.png)

O Tutor de IA aparece como um **painel de chat fixo** dentro do curso. Os alunos podem:

* Digitar mensagens e receber respostas geradas pela IA
* Visualizar o histórico de suas conversas
* Reiniciar a conversa para começar do zero

A interface de chat exibe a troca de mensagens entre o aluno e a IA em um formato familiar de mensagens.

## Comportamento Importante

* **Contexto do curso apenas** — O Tutor de IA está disponível somente dentro de um curso, não na plataforma geral
* **Desativado durante exames** — O Tutor de IA é automaticamente desativado quando um aluno está realizando um exercício, para evitar trapaças
* **Conversa por aluno** — Cada aluno tem sua própria conversa privada com o Tutor de IA, e o contexto do prompt inclui apenas as mensagens mais recentes
* **Alternativa de provedor** — Se o provedor configurado falhar, o Chamilo recorre a outro provedor disponível para que o chat continue funcionando

## Como Professor

Você deve estar ciente de que:

* O Tutor de IA pode não fornecer respostas sempre perfeitas — incentive os alunos a verificarem informações importantes
* Você pode revisar o uso do Tutor de IA por meio do rastreamento da plataforma
* O Tutor de IA é um complemento ao seu ensino, não um substituto. Use-o junto com fóruns, anúncios e mensagens diretas para um suporte abrangente aos alunos.

## Dicas

* **Defina expectativas** — Informe os alunos no início do curso que um Tutor de IA está disponível e explique como usá-lo de forma apropriada
* **Incentive o pensamento crítico** — Lembre os alunos de pensarem criticamente sobre as respostas geradas pela IA
* **Use para perguntas frequentes** — O Tutor de IA é especialmente útil para lidar com perguntas comuns que você teria que responder repetidamente