# Caixa de Ferramentas de IA

A **Caixa de Ferramentas de IA** é uma ferramenta do curso que gera aplicações educacionais interativas a partir das instruções do professor. O Chamilo empacota cada aplicação gerada como **SCORM 1.2**, de modo que o progresso, a pontuação e os dados de retomada do estudante sejam acompanhados pela plataforma.

> O administrador deve habilitar tanto `ai_helpers.enable_ai_helpers` quanto `ai_helpers.toolbox` em **Administração > Parâmetros de configuração > Auxiliares de IA**, e pelo menos um provedor de IA de texto deve estar configurado.

## Criação de uma aplicação interativa

1. Abra a **Caixa de Ferramentas de IA** no curso.
2. Clique em **Criar**.
3. Informe um **Título** e, opcionalmente, uma **Descrição**.
4. Em **O que a aplicação deve fazer?**, descreva a atividade completa desejada. Inclua o objetivo de aprendizagem, as regras, os níveis, a pontuação e o que deve acontecer quando o estudante concluir.
5. Escolha o **provedor de IA** quando houver mais de um disponível.
6. Clique em **Gerar**.

A primeira geração é armazenada como **versão 1**. Ela começa como rascunho, para que você possa pré-visualizá-la antes de torná-la visível aos estudantes.

## Aprimoramento e versionamento

Abra as **Configurações** de uma aplicação para gerenciá-la. Você pode:

* pré-visualizar ou baixar a aplicação atual;
* usar **Aprimorar com IA** para descrever uma alteração e gerar uma nova versão;
* consultar o **Histórico de versões**;
* pré-visualizar, baixar ou restaurar uma versão anterior;
* publicar ou ocultar a aplicação;
* abrir **Relatórios** para revisar o acompanhamento dos estudantes.

Gerar um aprimoramento não exclui as versões anteriores. Restaurar uma versão anterior torna essa versão a atual novamente.

## Adição de uma aplicação a um percurso de aprendizagem

No [construtor de Percursos de aprendizagem](../adding-content/learning-paths.md), os professores podem selecionar uma aplicação gerada pela Caixa de Ferramentas de IA como recurso. A aplicação deve ter uma versão gerada, mas não precisa estar publicada antes de o professor adicioná-la ao percurso de aprendizagem. Uma aplicação não publicada continua indisponível para os estudantes até ser publicada.

Quando um professor autorizado abre o conteúdo da Caixa de Ferramentas no **modo de pré-visualização**, o Chamilo exibe **“O progresso e a pontuação não são salvos no modo de pré-visualização.”** Testar a atividade dessa forma não cria acompanhamento do estudante nem atualiza uma pontuação. Use a experiência normal do estudante para verificar o progresso e as pontuações SCORM após a publicação.

## Validação da geração e solução de problemas

Após a geração por IA, o Chamilo verifica o código-fonte da aplicação gerada antes de disponibilizar uma versão. Isso inclui verificações de sintaxe ou estrutura de JavaScript e restrições a APIs de navegador inseguras. Se a validação falhar, o Chamilo solicita ao provedor de IA que **repare o resultado uma vez**; se a versão reparada ainda falhar, a geração é interrompida com um erro. Uma validação bem-sucedida não substitui o teste das regras de aprendizagem da atividade, da acessibilidade e da pontuação SCORM antes da publicação.

Se a geração informar **HTTP 504**, o servidor web ou o gateway deixou de aguardar a solicitação. Isso é diferente de um tempo limite imposto pelo provedor de texto de IA. O erro pode incluir o tempo aproximado decorrido; tente uma solicitação de atividade mais simples e peça ao administrador que verifique os tempos limite do gateway, do PHP/servidor web e do provedor. Um erro de tempo limite ou de limite de taxa do provedor exige, em vez disso, a verificação do modelo configurado e das configurações do provedor. Não presuma que a aplicação foi salva com sucesso após um erro.

Essas melhorias de validação e diagnóstico foram introduzidas no [PR #9198](https://github.com/chamilo/chamilo-lms/pull/9198).

## Experiência do estudante

Os estudantes só veem as aplicações que foram publicadas. Na Caixa de Ferramentas, eles podem abrir uma aplicação, continuar a partir do estado SCORM mais recente e ver seu **Progresso** e sua **Pontuação**. Quando uma nova tentativa é permitida, **Tentar novamente** inicia uma nova tentativa.

As aplicações da Caixa de Ferramentas são executadas no ambiente de execução do Percurso de aprendizagem em um iframe restrito e reportam seu estado SCORM de volta ao Chamilo. Elas são gerenciadas a partir da Caixa de Ferramentas, e não da lista normal de Percursos de aprendizagem.

Clientes MCP autorizados também podem criar ou atualizar aplicações da Caixa de Ferramentas quando as mesmas configurações da Caixa de Ferramentas de IA estiverem habilitadas.