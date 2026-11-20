# Bot de Suporte (Assistente de Árvore de Decisão)

O **Bot de Suporte** é um assistente de ajuda configurável, construído a partir de uma árvore de decisão fixa. Foi implementado no [PR #9224](https://github.com/chamilo/chamilo-lms/pull/9224) para a [issue #8754](https://github.com/chamilo/chamilo-lms/issues/8754). **Não é um chatbot de IA generativa**: os administradores redigem perguntas e respostas selecionáveis que orientam os usuários até uma explicação, uma página ou um ticket de suporte.

## Como ativá-lo

1. Em **Administração > Parâmetros de configuração > Tickets**, ative `ticket.ticket_support_bot_enabled` (desativado por padrão).
2. Abra **Administração > Bot de suporte** e crie uma árvore de decisão em **rascunho**. Informe um título e pelo menos um nó de entrada com opções.
3. Defina a pergunta ou a informação em cada nó e vincule as opções à próxima ação.
4. Publique uma árvore válida. Somente uma árvore publicada com um nó de entrada válido e opções selecionáveis fica disponível para os usuários.

O mecanismo seleciona a árvore publicada para a URL de acesso atual; sua disponibilidade é, portanto, limitada ao portal. Um administrador deve ter `ROLE_ADMIN` para gerenciar as árvores.

## Projetar um fluxo de suporte

Cada opção pode executar uma das quatro ações:

| Ação | Resultado |
| --- | --- |
| **Ir para outro nó** | Continuar a conversa em outra pergunta da mesma árvore |
| **Abrir um link** | Vincular a uma página do Chamilo usando um caminho relativo do mesmo site, por exemplo `/tickets` |
| **Encerrar conversa** | Marcar o problema como resolvido e, opcionalmente, exibir uma mensagem de encerramento |
| **Criar ticket de suporte** | Encaminhar a conversa para o sistema de Tickets |

Para o encaminhamento de tickets, selecione um **Projeto de ticket padrão** e uma categoria pertencente a esse projeto. Categorias que exigem um curso não podem ser usadas neste encaminhamento do bot de suporte. O ticket criado contém a transcrição da árvore de decisão do usuário, para que a equipe de suporte possa ver as escolhas que levaram ao encaminhamento.

O editor valida a estrutura da árvore antes da publicação. As versões **Publicada** e **Arquivada** são somente leitura; use **Duplicar** para criar um novo rascunho editável. Publicar uma substituição arquiva a versão anteriormente publicada no mesmo escopo. Na lista, os administradores também podem importar ou exportar uma árvore e revisar seu histórico de conversas. Uma árvore publicada deve ser arquivada antes da exclusão, e uma árvore com histórico de conversas não pode ser excluída.

## Importar exemplos e revisar conversas

Abra **Administração > Bot de suporte** e selecione **Importar**. A caixa de diálogo de importação oferece **Baixar exemplo JSON** e **Baixar exemplo CSV**. Baixe um exemplo, substitua suas perguntas e opções pelas suas e, em seguida, selecione o arquivo `.json` ou `.csv` editado e importe-o. Toda árvore importada começa como um **novo rascunho**; revise-a e publique-a explicitamente quando estiver pronta.

Os exemplos não exigem um projeto de ticket existente. Se o seu fluxo de trabalho deve criar tickets, configure o projeto necessário e a categoria elegível após a importação.

Na lista de árvores, use **Ver conversas** para inspecionar os registros de conversas de uma árvore específica, inclusive árvores cujo número de conversas é zero. Os históricos de conversas permanecem limitados ao usuário e ao portal correspondentes. Consulte o [PR #9419](https://github.com/chamilo/chamilo-lms/pull/9419).

## Como os usuários acessam

Quando a configuração está ativada e o portal possui uma árvore publicada válida, os usuários autenticados veem um contato **Bot de suporte** no chat acoplado. Eles respondem escolhendo as opções oferecidas. O bot pode resolver a conversa, abrir uma página do mesmo site ou criar um ticket e exibir o link para ele. Os usuários podem iniciar uma nova conversa depois que uma anterior termina.

Isso é independente do **Tutor de IA**, que responde a perguntas de aprendizagem abertas. O bot de suporte segue apenas os caminhos e as opções configurados pelos administradores.

## Solução de problemas e segurança

* **Nenhum bot no chat:** verifique a configuração de Tickets, se uma árvore está publicada para o portal atual e se o nó de entrada possui opções.
* **Não é possível publicar:** revise nós ausentes, nós de destino não resolvidos e ações inválidas no rascunho.
* **Não é possível criar o ticket:** verifique o projeto e a categoria de ticket selecionados. Não use uma categoria de ticket que exija curso.
* **Conversas antigas ausentes:** os administradores podem revisar o histórico de conversas a partir da árvore correspondente; as conversas estão vinculadas a um usuário e a uma URL de acesso.

Para a configuração relacionada, consulte [Configurações de Tickets](platform-settings/ticket-settings.md).