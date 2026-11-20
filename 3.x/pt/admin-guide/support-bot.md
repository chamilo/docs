# Bot de suporte (assistente de árvore de decisão)

O **Bot de suporte** é um assistente de ajuda configurável, construído a partir de uma árvore de decisão fixa. Foi implementado no [PR #9224](https://github.com/chamilo/chamilo-lms/pull/9224) para a [issue #8754](https://github.com/chamilo/chamilo-lms/issues/8754). **Não é um chatbot de IA generativa**: os administradores redigem perguntas e respostas selecionáveis que orientam os utilizadores para uma explicação, uma página ou um ticket de suporte.

## Ativar

1. Em **Administração > Definições de configuração > Tickets**, ative `ticket.ticket_support_bot_enabled` (desativado por predefinição).
2. Abra **Administração > Bot de suporte** e crie uma árvore de decisão em **rascunho**. Indique um título e pelo menos um nó de entrada com opções.
3. Defina a pergunta ou a informação em cada nó e associe as opções à ação seguinte.
4. Publique uma árvore válida. Apenas uma árvore publicada com um nó de entrada válido e opções selecionáveis fica disponível para os utilizadores.

O motor seleciona a árvore publicada para o URL de acesso atual; a sua disponibilidade é, portanto, limitada ao portal. Um administrador deve ter `ROLE_ADMIN` para gerir as árvores.

## Conceber um fluxo de suporte

Cada opção pode executar uma de quatro ações:

| Ação | Resultado |
| --- | --- |
| **Ir para outro nó** | Continuar a conversa noutra pergunta da mesma árvore |
| **Abrir uma ligação** | Ligar a uma página do Chamilo através de um caminho relativo do mesmo sítio, por exemplo `/tickets` |
| **Terminar a conversa** | Marcar o problema como resolvido e, opcionalmente, apresentar uma mensagem de encerramento |
| **Criar ticket de suporte** | Encaminhar a conversa para o sistema de Tickets |

Para o escalamento de tickets, selecione um **Projeto de ticket predefinido** e uma categoria pertencente a esse projeto. As categorias que exigem um curso não podem ser utilizadas para este escalamento do bot de suporte. O ticket criado contém a transcrição da árvore de decisão do utilizador, para que a equipa de suporte possa ver as escolhas que conduziram ao escalamento.

O editor valida a estrutura da árvore antes da publicação. As versões **Publicada** e **Arquivada** são apenas de leitura; utilize **Duplicar** para criar um novo rascunho editável. A publicação de uma substituição arquiva a versão anteriormente publicada no mesmo âmbito. A partir da lista, os administradores também podem importar ou exportar uma árvore e rever o respetivo histórico de conversas. Uma árvore publicada tem de ser arquivada antes da eliminação, e uma árvore com histórico de conversas não pode ser eliminada.

## Importar exemplos e rever conversas

Abra **Administração > Bot de suporte** e selecione **Importar**. A caixa de diálogo de importação oferece **Transferir exemplo JSON** e **Transferir exemplo CSV**. Transfira um exemplo, substitua as respetivas perguntas e opções pelas suas e, em seguida, selecione o ficheiro `.json` ou `.csv` editado e importe-o. Todas as árvores importadas começam como um **novo rascunho**; reveja-o e publique-o explicitamente quando estiver pronto.

Os exemplos não exigem um projeto de tickets existente. Se o seu fluxo de trabalho deve criar tickets, configure o projeto necessário e a categoria elegível após a importação.

Na lista de árvores, utilize **Ver conversas** para inspecionar os registos de conversas de uma árvore específica, incluindo árvores cujo número de conversas é zero. Os históricos de conversas permanecem limitados ao utilizador e ao portal relevantes. Consulte [PR #9419](https://github.com/chamilo/chamilo-lms/pull/9419).

## Como os utilizadores acedem

Quando a definição está ativa e o portal tem uma árvore publicada válida, os utilizadores com sessão iniciada veem um contacto **Bot de suporte** no chat ancorado. Respondem escolhendo as opções apresentadas. O bot pode resolver a conversa, abrir uma página do mesmo sítio ou criar um ticket e mostrar a ligação para o mesmo. Os utilizadores podem iniciar uma nova conversa depois de uma anterior terminar.

Isto é distinto do **Tutor de IA**, que responde a perguntas de aprendizagem abertas. O bot de suporte segue apenas os percursos e as opções configurados pelos administradores.

## Resolução de problemas e segurança

* **Sem bot no chat:** verifique a definição de Tickets, que uma árvore está publicada para o portal atual e que o respetivo nó de entrada tem opções.
* **Não é possível publicar:** reveja nós em falta, nós de destino não resolvidos e ações inválidas no rascunho.
* **Não é possível criar o ticket:** verifique o projeto e a categoria de ticket selecionados. Não utilize uma categoria de ticket que exija um curso.
* **Conversas mais antigas em falta:** os administradores podem rever o histórico de conversas a partir da árvore correspondente; as conversas estão associadas a um utilizador e a um URL de acesso.

Para a definição relacionada, consulte [Definições de Tickets](platform-settings/ticket-settings.md).